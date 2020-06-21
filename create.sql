CREATE TABLE restaurant(
	rest_id int NOT NULL,
	rest_tel bigint,
	rest_add varchar(250) NOT NULL,
	rest_name varchar(250) NOT NULL,
	rest_type int,
	rest_takeout int,
	rest_delivery int,
	PRIMARY KEY(rest_id)
);

CREATE TABLE user(
	user_id int NOT NULL,
	user_name varchar(50) DEFAULT 'New User',
	user_tel bigint,
	user_add varchar(250),
	user_email varchar(100),
	PRIMARY KEY(user_id)
);

CREATE TABLE collection(
	coll_id int NOT NULL,
	coll_name varchar(50) DEFAULT 'New Collection',
	coll_owner int,
	PRIMARY KEY(coll_id),
	FOREIGN KEY(coll_owner)
		REFERENCES user(user_id)
		ON DELETE CASCADE
);

CREATE TABLE rest_list(
	coll_id int NOT NULL,
	rest_id int NOT NULL,
	FOREIGN KEY(coll_id)
		REFERENCES collection(coll_id)
		ON DELETE CASCADE,
	FOREIGN KEY(rest_id)
		REFERENCES restaurant(rest_id)
		ON DELETE CASCADE
);

CREATE TABLE review(
	review_id int NOT NULL,
	rest_id int NOT NULL,
	rate int NOT NULL,
	user_id int NOT NULL,
	content varchar(250),
	review_date date,
	PRIMARY KEY(review_id),
	FOREIGN KEY(user_id)
		REFERENCES user(user_id)
		ON DELETE CASCADE
);

CREATE TABLE type(
	type_id int NOT NULL,
	type varchar(150) NOT NULL,
	PRIMARY KEY(type_id)
);