----------SELECT---------

-- SELECT01 User's Information

SELECT * FROM "person" JOIN "user" ON "user".id = "person".id WHERE "user".id = $id;

-- SELECT02 User's Friends

SELECT "user2_id" FROM link WHERE "user1_id" = $id
UNION ALL
SELECT "user1_id" FROM link WHERE "user2_id" = $id

-- SELECT03 One User's posts

SELECT "id", "user_id", "picture", "description", "date", "private", "group_id"
FROM "post"
WHERE "post"."user_id" = $id and "banned" = false ORDER BY "post".date

-- SELECT04 General Recent Posts

SELECT "id", "user_id", "picture", "description", "date", "private", "group_id"
FROM "post"
WHERE "banned" = false and ("private" = false
	or "user_id" in (
		SELECT "user2_id" as "friend_id" FROM link WHERE "user1_id" = $id
		UNION ALL
		SELECT "user1_id" as "friend_id" FROM link WHERE "user2_id" = $id))
ORDER BY "date" DESC

-- SELECT05 Friends Recent Posts

SELECT "id", "user_id", "picture", "description", "date", "private", "group_id"
FROM "post"
WHERE "banned" = false and
	"user_id" in (
		SELECT "user2_id" as "friend_id" FROM link WHERE "user1_id" = $id
		UNION ALL
		SELECT "user1_id" as "friend_id" FROM link WHERE "user2_id" = $id)
ORDER BY "date" DESC

-- SELECT06 Number of likes and dislikes

SELECT SUM(CASE WHEN "likes" = true THEN 1 ELSE 0 END) AS likes,
	SUM(CASE WHEN "likes" = false THEN 1 ELSE 0 END ) AS dislikes
FROM "like" JOIN "post" on "post"."id" = "like"."post_id"
WHERE "post"."id" = $id

SELECT COUNT(*)
FROM "post" JOIN "comment" on "post"."id" = "comment"."post_id"
WHERE "post"."id" = $id and "comment"."deleted" = false





-- SELECT07 Group Members

SELECT * FROM "user_group" WHERE "group_id" = $id

-- SELECT08 Group post

SELECT * FROM "post" WHERE "group_id" = $id

-- SELECT09 User's Notifications

SELECT "notification"."id", "user_id", "user_id_request", "post_comment_id", "liked_post_id", "banned_post_id", "banned_comment_id", "group_id"  FROM "notification"
LEFT OUTER JOIN "friend_request" ON "friend_request"."id" = "notification"."id"
LEFT OUTER JOIN "post_comment" ON "post_comment"."id" = "notification"."id"
LEFT OUTER JOIN "liked_post" ON "liked_post"."id" = "notification"."id"
LEFT OUTER JOIN "banned_post" ON "banned_post"."id" = "notification"."id"
LEFT OUTER JOIN "banned_comment" ON "banned_comment"."id" = "notification"."id"
LEFT OUTER JOIN "group_request" ON "group_request"."id" = "notification"."id"
WHERE "user_id" = $id
ORDER BY "notification"."id"

-- SELECT10 Comments from post

SELECT "text"
FROM "comment" JOIN "post" on "post"."id" = "comment"."post_id"
WHERE "post"."id" = $id and "deleted" = false

-- SELECT11 My groups

SELECT "group"."name" FROM "user_group" JOIN "user" ON "user"."id" = "user_group"."user_id" JOIN "group" ON "group"."id" = "user_group"."group_id" WHERE "user"."id" = $id

-- SELECT12 All reports

SELECT "user_id", "post_id", "comment_id"
FROM "report"


-- SELECT13 General Relevant Posts

SELECT "id", "user_id", "picture", "description", "date", "private", "group_id", "likes" - "dislikes" as "ratio"
FROM "post" JOIN (
	SELECT SUM(CASE WHEN "likes" = true THEN 1 ELSE 0 END) AS likes,
		SUM(CASE WHEN "likes" = false THEN 1 ELSE 0 END ) AS dislikes,
		"post_id"
	FROM "like" GROUP BY "post_id") as "table"
	ON "post"."id" = "table"."post_id"
WHERE "banned" = false and ("private" = false  or
	"user_id" in (
		SELECT "user2_id" as "friend_id" FROM link WHERE "user1_id" = $user_id
		UNION ALL
		SELECT "user1_id" as "friend_id" FROM link WHERE "user2_id" = $user_id))
ORDER BY ratio

-- SELECT14 Friends Relevant Posts


SELECT "id", "user_id", "picture", "description", "date", "private", "group_id", "likes" - "dislikes" as "ratio"
FROM "post" JOIN (
	SELECT SUM(CASE WHEN "likes" = true THEN 1 ELSE 0 END) AS likes,
		SUM(CASE WHEN "likes" = false THEN 1 ELSE 0 END ) AS dislikes,
		"post_id"
	FROM "like" GROUP BY "post_id") as "table"
	ON "post"."id" = "table"."post_id"
WHERE "banned" = false and
	"user_id" in (
		SELECT "user2_id" as "friend_id" FROM link WHERE "user1_id" = $user_id
		UNION ALL
		SELECT "user1_id" as "friend_id" FROM link WHERE "user2_id" = $user_id)
ORDER BY ratio


-- SELECT15 Search by user

SELECT *
FROM "user" JOIN "person" on "user"."id" = "person"."id"
WHERE UPPER(name) LIKE UPPER(CONCAT($search, '%')) OR UPPER(username) LIKE UPPER(CONCAT($search, '%'))
OR to_tsvector("name" || ' ' || "username") @@ plainto_tsquery($search)

-- SELECT16 Search by post

SELECT *
FROM "post" JOIN "user" ON "user"."id" = "post"."user_id"
WHERE to_tsvector("post"."description" || ' ' || "user"."name" || ' ' || "user"."username") @@ plainto_tsquery($search)

-- SELECT17 Search by group

SELECT *
FROM "group"
WHERE UPPER(name) LIKE UPPER(CONCAT($search, '%'))

----------INSERTS---------

--INSERT01 Add user

INSERT INTO 'person' ("id", "username", "password") VALUES($id, $username, $password)
INSERT INTO 'user' ("id", "mail", "name") VALUES($id, $mail, $name)

--INSERT02 Add post

INSERT INTO "post" ("user_id", "picture", "description", "date", "private", "group_id") VALUES ($user_id, $picture, $description, $date, $private, $group_id)

--INSERT03 Add a link

INSERT INTO "link" ("user1_id", "user2_id") VALUES($id, $friend_id)

--INSERT04 Create a group

INSERT INTO "group" ("id", "name") VALUES($name)

--INSERT05 Add a like/dislike to a post

INSERT INTO "like" ("post_id", "user_id", "likes") VALUES($post_id, $id, $like)

--INSERT06 Add a comment to a post

INSERT INTO "comment" ("post_id", "user_id", "text") VALUES($post_id, $user_id, $text)

-- INSERT07 Report a post

INSERT INTO "report" ("user_id", "post_id") VALUES($user_id, $post_id)

-- INSERT08 Report a comment

INSERT INTO "report" ("user_id", "comment_id") VALUES($user_id, $comment_id)

-- INSERT09 Add a user to a group

INSERT INTO "user_group" ("user_id", "group_id") VALUES($user_id, $group_id)

-- INSERT10 Add a friend request notification

INSERT INTO "notification" ("id", "user_id") VALUE($id, $user_id)
INSERT INTO "friend_request" ("id", "user_id_request") VALUES ($id, $user_id_request)

-- INSERT11 Add a post comment notification

INSERT INTO "notification" ("id", "user_id") VALUE($id, $user_id)
INSERT INTO "post_comment" ("id", "post_comment_id") VALUES (3, 1)

-- INSERT12 Add a liked notification

INSERT INTO "notification" ("id", "user_id") VALUE($id, $user_id)
INSERT INTO "liked_post" ("id", "liked_post_id") VALUES($id, $liked_post_id)


-- INSERT13 Add a banned post notification

INSERT INTO "notification" ("id", "user_id") VALUE($id, $user_id)
INSERT INTO "banned_post" ("id", "banned_post_id") VALUES ($id, $banned_post_id)

-- INSERT14 Add a banned comment notification

INSERT INTO "notification" ("id", "user_id") VALUE($id, $user_id)
INSERT INTO "banned_comment" ("id", "banned_comment_id") VALUES ($id, $banned_comment_id)


-- INSERT15 Add a group requesst notification

INSERT INTO "notification" ("id", "user_id") VALUE($id, $user_id)
INSERT INTO "group_request" ("id", 'group_id') VALUES ($id, $group_id)



-----------DELETES---------

-- DELETE01 unlike/undislike a post

DELETE FROM "like"
WHERE "post_id" = $post_id and "user_id" = $user_id

-- DELETE02 delete link

DELETE FROM "link"
WHERE "user1_id" = $id or "user2_id" = $id

-- DELETE03 leave group

DELETE FROM "user_group"
WHERE "user_id" = $id and "group_id" = $group_id

-----------UPDATES-----------

-- UPDATE01 Change to dislike/like

UPDATE "like"
SET "likes" = $likes
WHERE "post_id" = $post_id AND "user_id" = $user_id

-- UPDATE02 Delete User

UPDATE "user"
SET "deleted" = $deleted
WHERE "id" = $id

-- UPDATE03 Ban Post

UPDATE "post"
SET "banned" = $banned
WHERE "id" = $id

-- UPDATE04 Delete Comment

UPDATE "comments"
SET "deleted" = $deleted
WHERE "id" = $id
