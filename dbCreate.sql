DROP DATABASE IF EXISTS inventory;

CREATE DATABASE inventory;

USE inventory;

CREATE TABLE User (
    user_id int NOT NULL AUTO_INCREMENT,
    username varchar(25) NOT NULL,
    password varchar(25) NOT NULL,
    salt varchar(25) NOT NULL,
    email varchar(35) NOT NULL,
    sex varchar(15) NOT NULL,
    CONSTRAINT User_pk PRIMARY KEY (user_id)
);

CREATE TABLE Inven (
	inv_id int NOT NULL AUTO_INCREMENT,
	inv_name varchar(25) NOT NULL,
	inv_pic varchar(250) NOT NULL,
	CONSTRAINT Inven_pk PRIMARY KEY (inv_id)
);

insert into User (user_id, username, password, salt, email, sex) values (1, 'Michael', 'sjA0FyAt', 'lC40Pu5', 'mjacobs0@omniture.com', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (2, 'Timothy', 'WZiWYx', 'zHK2u2M', 'twilliamson1@google.cn', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (3, 'Helen', '6SnATZJ5', 'EDKlPJrVAoG0', 'hcarpenter2@blogger.com', 'Female');
insert into User (user_id, username, password, salt, email, sex) values (4, 'Russell', 'KiLCn2RP', 'pKDGOsutR2', 'rcarr3@marriott.com', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (5, 'Harry', 'ABbpQQH', 'bExnpzAcgb2Y', 'hthomas4@unesco.org', 'Male');

insert into Inven (inv_id, inv_name, inv_pic) values (1, 'TV', 'http://eventsbyfabulous.com/wp-content/uploads/2013/09/samsung-tv-front.jpg');
insert into Inven (inv_id, inv_name, inv_pic) values (2, 'Microwave', 'http://i5.walmartimages.com/dfw/dce07b8c-bfb2/k2-_5684ebd2-1e98-4786-8f9b-afac9552e51a.v1.jpg');
insert into Inven (inv_id, inv_name, inv_pic) values (3, 'Couch', 'http://ak1.ostkcdn.com/images/products/P13318481L.jpg');
insert into Inven (inv_id, inv_name, inv_pic) values (4, 'Dog', 'http://g-ecx.images-amazon.com/images/G/01/img15/pet-products/small-tiles/23695_pets_vertical_store_dogs_small_tile_8._CB312176604_.jpg');
insert into Inven (inv_id, inv_name, inv_pic) values (5, 'Rock', 'http://www.bryanrock.com/application/files/7914/3349/4593/rock.png');
