INSERT INTO "person" (id, username, password) VALUES (1, 'xamas', 'password');
INSERT INTO "person" (id, username, password) VALUES (2, 'mine4phatom', 'strong');
INSERT INTO "person" (id, username, password) VALUES (3, 'ranhocas', '2000');
INSERT INTO "person" (id, username, password, is_admin) VALUES (4, 'zaphrak', 'safest', true);
INSERT INTO "person" (id, username, password, is_admin) VALUES (5, 'adminzeco', '12345678', true);

INSERT INTO "user" (id, mail, name) VALUES(1,'xamasamigo@gmail.com', 'Xamas');
INSERT INTO "user" (id, mail, name) VALUES(2, 'mine4ghosts@gmail.com', 'Minecraft');
INSERT INTO "user" (id, mail, name) VALUES(3, 'zezocazaah@outlook.com', 'ZEZOCA');

INSERT INTO "link" (user1_id, user2_id) VALUES(1,2);
INSERT INTO "link" (user1_id, user2_id) VALUES(2,3);

INSERT INTO "group" (id, name) VALUES(1, 'MIEIC');
INSERT INTO "group" (id, name) VALUES(2, 'LBAW');

INSERT INTO "post" (user_id, description, "date") VALUES (1, 'Eu na Moita', '2020-03-11');
INSERT INTO "post" (user_id, description, "date", banned) VALUES (1, 'Eu na Asprela', '2020-12-12', true);
INSERT INTO "post" (user_id, description, "date", group_id) VALUES (1, 'Eu na Pasteleira', '2020-09-25', 1);
INSERT INTO "post" (user_id, description, "date", private) VALUES (3, 'Eu em Oaze', '2020-10-30', true);

INSERT INTO "like" (post_id, user_id, likes) VALUES(1, 2, TRUE);
INSERT INTO "like" (post_id, user_id, likes) VALUES(1, 3, TRUE);
INSERT INTO "like" (post_id, user_id, likes) VALUES(1, 1, FALSE);
INSERT INTO "like" (post_id, user_id, likes) VALUES(2, 2, TRUE);
INSERT INTO "like" (post_id, user_id, likes) VALUES(2, 3, TRUE);
INSERT INTO "like" (post_id, user_id, likes) VALUES(3, 1, FALSE);
INSERT INTO "like" (post_id, user_id, likes) VALUES(3, 2, FALSE);

INSERT INTO "comment" (post_id, "user_id", "text") VALUES(1, 1, 'A comment');
INSERT INTO "comment" (post_id, "user_id", "text") VALUES(1, 1, 'Another comment');
INSERT INTO "comment" (post_id, "user_id", "text") VALUES(2, 2, 'Comment on another post');
INSERT INTO "comment" (post_id, "user_id", "text", deleted) VALUES(2, 3, 'A VERY LARGE COMMENT THAT DOES NOT HAVE 250 + CHARACTERS AND HAS VERY WEIRD SYMBOLS LIKE $ AND % AND /// ZAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAh', TRUE);

INSERT INTO "report" (user_id, post_id) VALUES(2, 2);
INSERT INTO "report" (user_id, comment_id) VALUES(3, 2);
INSERT INTO "report" (user_id, comment_id) VALUES(2, 1);

INSERT INTO "user_group" (id, user_id, group_id) VALUES (1, 1, 1);
INSERT INTO "user_group" (id, user_id, group_id) VALUES (2, 2, 1);
INSERT INTO "user_group" (id, user_id, group_id) VALUES (3, 3, 2);

INSERT INTO "notification" (user_id) VALUES (1);
INSERT INTO "notification" (user_id) VALUES (1);
INSERT INTO "notification" (user_id) VALUES (2);
INSERT INTO "notification" (user_id) VALUES (2);
INSERT INTO "notification" (user_id) VALUES (2);
INSERT INTO "notification" (user_id) VALUES (2);
INSERT INTO "notification" (user_id) VALUES (2);
INSERT INTO "notification" (user_id) VALUES (3);
INSERT INTO "notification" (user_id) VALUES (3);
INSERT INTO "notification" (user_id) VALUES (3);


INSERT INTO "friend_request" (id, user_id_request) VALUES (1, 2);
INSERT INTO "friend_request" (id, user_id_request) VALUES (2, 3);

INSERT INTO "post_comment" (id, post_comment_id) VALUES (3, 1);
INSERT INTO "post_comment" (id, post_comment_id) VALUES (4, 3);

INSERT INTO "liked_post" (id, liked_post_id) VALUES(5, 1);
INSERT INTO "liked_post" (id, liked_post_id) VALUES(6, 2);

INSERT INTO "banned_post" (id, banned_post_id) VALUES (7, 1);

INSERT INTO "banned_comment" (id, banned_comment_id) VALUES (8, 4);

INSERT INTO "group_request" (id, group_id) VALUES (9, 1);
INSERT INTO "group_request" (id, group_id) VALUES (10, 2);

