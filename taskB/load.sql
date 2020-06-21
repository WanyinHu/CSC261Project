LOAD DATA LOCAL INFILE 'restaurant.csv'
INTO TABLE restaurant
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS 
(rest_id,rest_tel,rest_add,rest_name,rest_type,rest_takeout,rest_delivery);

LOAD DATA LOCAL INFILE 'user.csv'
INTO TABLE user
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS 
(user_id,user_name,user_tel,user_add,user_email);

LOAD DATA LOCAL INFILE 'collection.csv'
INTO TABLE collection
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS 
(coll_id,coll_name,coll_owner);

LOAD DATA LOCAL INFILE 'rest_list.csv'
INTO TABLE rest_list
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS 
(coll_id,rest_id);

LOAD DATA LOCAL INFILE 'review.csv'
INTO TABLE review
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"'
LINES TERMINATED BY '\n'
IGNORE 1 ROWS 
(review_id,rest_id,rate,user_id,content,@review_date)
SET review_date = STR_TO_DATE(@review_date, '%m/%d/%y');

INSERT INTO type
VALUES (1,'American'),(2,'Fast Food'),(3,'Italian'),(4,'French'),(5,'Chinese'),(6,'Japanese'),(7,'Korean'),(8,'Thai'),(9,'Vietnam'),(10,'Bar'),
	(11,'Café'),(12,'Bakery'),(13,'Buffet'),(14,'Steak House'),(15,'Ice Cream'),(16,'Indian'),(17,'Pizza'),(18,'Dominican'),(19,'Mediterranean'),
	(20,'Delis'),(21,'Bubble Tea');
