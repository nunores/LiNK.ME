DROP TABLE IF EXISTS group_request CASCADE;
DROP TABLE IF EXISTS banned_comment CASCADE;
DROP TABLE IF EXISTS banned_post CASCADE;
DROP TABLE IF EXISTS liked_post CASCADE;
DROP TABLE IF EXISTS post_comment CASCADE;
DROP TABLE IF EXISTS friend_request CASCADE;
DROP TABLE IF EXISTS notification CASCADE;
DROP TABLE IF EXISTS user_group CASCADE;
DROP TABLE IF EXISTS report CASCADE;
DROP TABLE IF EXISTS comment CASCADE;
DROP TABLE IF EXISTS "like" CASCADE;
DROP TABLE IF EXISTS "post" CASCADE;
DROP TABLE IF EXISTS "group" CASCADE;
DROP TABLE IF EXISTS link CASCADE;
DROP TABLE IF EXISTS "user" CASCADE;
DROP TABLE IF EXISTS person CASCADE;

DROP FUNCTION IF EXISTS one_report_per_post_per_user();
DROP FUNCTION IF EXISTS one_report_per_comment_per_user();
DROP FUNCTION IF EXISTS auto_ban();
DROP FUNCTION IF EXISTS comment_notification();
DROP FUNCTION IF EXISTS liked_post_notification();
DROP FUNCTION IF EXISTS banned_comment_notification();
DROP FUNCTION IF EXISTS banned_post_notification();

DROP TRIGGER IF EXISTS one_report_per_post_per_user ON report;
DROP TRIGGER IF EXISTS one_report_per_comment_per_user on report;
DROP TRIGGER IF EXISTS auto_ban on post;
DROP TRIGGER IF EXISTS comment_notification on "comment";
DROP TRIGGER IF EXISTS liked_notification on "like";
DROP TRIGGER IF EXISTS banned_comment_notification on comment;
DROP TRIGGER IF EXISTS banned_post_notification on "post";

-- Tables

CREATE TABLE person (
	id SERIAL PRIMARY KEY,
	username text NOT NULL CONSTRAINT uk_person_username UNIQUE,
	password text NOT NULL,
    is_admin boolean NOT NULL DEFAULT FALSE
);

CREATE TABLE "user" (
    id INTEGER PRIMARY KEY REFERENCES person (id) ON UPDATE CASCADE ON DELETE CASCADE,
    mail text NOT NULL CONSTRAINT uk_user_email UNIQUE,
    name text NOT NULL,
    deleted boolean DEFAULT FALSE
);


CREATE TABLE link (
    user1_id INTEGER REFERENCES "user" (id) NOT NULL,
    user2_id INTEGER REFERENCES "user" (id),
    PRIMARY KEY (user1_id, user2_id),
    CONSTRAINT ck_link_different_users CHECK (user1_id != user2_id)
);

CREATE TABLE "group" (
	id SERIAL PRIMARY KEY,
	name text NOT NULL CONSTRAINT uk_group_name UNIQUE
);

CREATE TABLE "post" (
	id SERIAL PRIMARY KEY,
    user_id INTEGER REFERENCES "user" (id) NOT NULL,
	picture text,
	description text CONSTRAINT ck_post_description_size CHECK (length(description) <= 250) ,
	"date" TIMESTAMP WITH TIME zone DEFAULT now() NOT NULL CONSTRAINT ck_post_date_before_now CHECK ("date" <= now()),
	banned boolean NOT NULL DEFAULT FALSE,
	private boolean NOT NULL DEFAULT FALSE,
 	group_id INTEGER REFERENCES "group" (id)
	CONSTRAINT ck_post_picture_andor_description CHECK (description != NULL OR picture != NULL),
    CONSTRAINT ck_group_post_private CHECK ((group_id != NULL AND private is FALSE) OR (group_id = NULL))
);


CREATE TABLE "like" (
    post_id INTEGER NOT NULL REFERENCES "post" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    likes boolean NOT NULL, --false means dislike, true means like
    PRIMARY KEY (post_id, user_id)
);

CREATE TABLE comment (
    id SERIAL PRIMARY KEY,
    post_id INTEGER NOT NULL REFERENCES "post" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    "text" text NOT NULL,
    deleted boolean NOT NULL DEFAULT FALSE,
    CONSTRAINT ck_comment_text_length CHECK (length(text) <= 250)
);

CREATE TABLE report (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    post_id INTEGER REFERENCES "post" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    comment_id INTEGER REFERENCES comment (id) ON UPDATE CASCADE ON DELETE CASCADE,
    CONSTRAINT ck_report_postid_commentid_xor CHECK ( (post_id IS NOT NULL AND comment_id IS NULL) OR (post_id IS NULL AND comment_id IS NOT NULL) )
);

CREATE TABLE user_group (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE,
    group_id INTEGER NOT NULL REFERENCES "group" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE notification (
    id SERIAL PRIMARY KEY,
    user_id INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE friend_request (
	id INTEGER PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
	user_id_request INTEGER NOT NULL REFERENCES "user" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE post_comment (
    id INTEGER PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    post_comment_id INTEGER NOT NULL REFERENCES "post" (id) ON UPDATE CASCADE ON DELETE CASCADE
);


CREATE TABLE liked_post (
    id INTEGER PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    liked_post_id INTEGER NOT NULL REFERENCES "post" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE banned_post (
    id INTEGER PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    banned_post_id INTEGER NOT NULL REFERENCES "post" (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE banned_comment (
    id INTEGER PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    banned_comment_id INTEGER NOT NULL REFERENCES comment (id) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE group_request (
    id INTEGER PRIMARY KEY REFERENCES notification (id) ON UPDATE CASCADE ON DELETE CASCADE,
    group_id INTEGER NOT NULL REFERENCES "group" (id) ON UPDATE CASCADE ON DELETE CASCADE
);


----- INDEXES -----

CREATE INDEX link_id1 ON "link" USING hash(user1_id);

CREATE INDEX link_id2 ON "link" USING hash(user2_id);

CREATE INDEX comment_post_id ON "comment" USING hash(post_id);

CREATE INDEX like_post_id ON "like" USING hash(post_id);

CREATE INDEX post_user_id ON "post" USING hash(user_id);

CREATE INDEX user_group_user_id ON "user_group" USING hash(user_id);

CREATE INDEX user_name_idx ON "user" USING GIN (to_tsvector('english', "name"));

CREATE INDEX person_username_idx ON "person" USING GIN (to_tsvector('english', "username"));

CREATE INDEX description_idx ON post USING GIST (to_tsvector('english', "description"));



----- TRIGGERS ------

CREATE FUNCTION auto_ban() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT user_id, COUNT(*) FROM "post"
        WHERE NEW."user_id" = "post"."user_id" AND "banned" = TRUE GROUP BY "user_id" HAVING COUNT(*) >= 3) THEN
        UPDATE "user" SET "banned" = true WHERE "user"."id" = NEW."user_id";
    END IF;
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER auto_ban
    AFTER INSERT OR UPDATE ON post
    FOR EACH ROW
    EXECUTE PROCEDURE auto_ban();



CREATE FUNCTION one_report_per_post_per_user() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM "report" WHERE NEW.user_id = user_id AND NEW.post_id = post_id AND post_id != NULL) THEN
    RAISE EXCEPTION 'A post cannot be reported twice by the same user.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER one_report_per_post_per_user
    BEFORE INSERT OR UPDATE ON report
    FOR EACH ROW
    EXECUTE PROCEDURE one_report_per_post_per_user();




CREATE FUNCTION one_report_per_comment_per_user() RETURNS TRIGGER AS
$BODY$
BEGIN
    IF EXISTS (SELECT * FROM report
                WHERE NEW.comment_id = comment_id AND comment_id != NULL
                    AND New.user_id = user_id ) THEN
            RAISE EXCEPTION 'A comment cannot be reported twice by the same user.';
    END IF;
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER one_report_per_comment_per_user
    BEFORE INSERT OR UPDATE ON report
    FOR EACH ROW
    EXECUTE PROCEDURE one_report_per_comment_per_user();


CREATE FUNCTION comment_notification() RETURNS TRIGGER AS
$BODY$
BEGIN
    WITH "return" as (
        INSERT INTO notification (user_id) (
            SELECT user_id
            FROM post
            WHERE post.id = New.post_id)
        RETURNING "id")
    INSERT INTO "post_comment" (id, post_comment_id) SELECT "return"."id", New.post_id FROM "return";
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;


CREATE TRIGGER comment_notification
    AFTER INSERT OR UPDATE ON comment
    FOR EACH ROW
    EXECUTE PROCEDURE comment_notification();


CREATE FUNCTION liked_post_notification() RETURNS TRIGGER AS
$BODY$
BEGIN
    DELETE FROM notification
        WHERE id in (
            SELECT notification.id
            FROM liked_post JOIN notification on liked_post.id = notification.id
            WHERE liked_post_id = New.post_id);
    DELETE FROM liked_post
        WHERE id in (
            SELECT liked_post.id
            FROM liked_post JOIN notification on liked_post.id = notification.id
            WHERE liked_post_id = New.post_id);

    WITH "return" as (
        INSERT INTO notification (user_id) (
            SELECT user_id
            FROM post
            WHERE post."id" = New.post_id)
        RETURNING "notification"."id" as "id")
    INSERT INTO liked_post ("id", liked_post_id) SELECT "return"."id", New.post_id FROM "return";
    RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER liked_post_notification
    AFTER INSERT OR UPDATE ON "like"
    FOR EACH ROW
    EXECUTE PROCEDURE liked_post_notification();


CREATE FUNCTION banned_post_notification() RETURNS TRIGGER AS
$BODY$
BEGIN
    WITH "return" as (
        INSERT INTO notification (user_id) (
            SELECT user_id
            FROM post
            WHERE post.id = New.id)
        RETURNING "id")
    INSERT INTO "banned_post" (id, banned_post_id) SELECT "return"."id", New.id FROM "return";
	RETURN NEW;
END
$BODY$
LANGUAGE plpgsql;

CREATE TRIGGER banned_post_notification
    AFTER INSERT OR UPDATE ON post
    FOR EACH ROW
    EXECUTE PROCEDURE banned_post_notification();

