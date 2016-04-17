DROP DATABASE IF EXISTS inventory;

CREATE DATABASE inventory;

USE inventory;

CREATE TABLE User (
    user_id int NOT NULL AUTO_INCREMENT,
    username varchar(25) NOT NULL,
    password varchar(25) NOT NULL,
    salt varchar(25) NOT NULL,
    email varchar(35) NOT NULL,
    sex varchar(15) NOT NULL
);

CREATE TABLE Inven (
	inv_id int NOT NULL AUTO_INCREMENT,
	inv_name varchar(25) NOT NULL,
	inv_pic varchar(250) NOT NULL
);

insert into User (user_id, username, password, salt, email, sex) values (1, 'Michael', 'sjA0FyAt', 'lC40Pu5', 'mjacobs0@omniture.com', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (2, 'Timothy', 'WZiWYx', 'zHK2u2M', 'twilliamson1@google.cn', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (3, 'Helen', '6SnATZJ5', 'EDKlPJrVAoG0', 'hcarpenter2@blogger.com', 'Female');
insert into User (user_id, username, password, salt, email, sex) values (4, 'Russell', 'KiLCn2RP', 'pKDGOsutR2', 'rcarr3@marriott.com', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (5, 'Harry', 'ABbpQQH', 'bExnpzAgcb2Y', 'hthomas4@unesco.org', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (6, 'Philip', 'aPOcLJfGAuXJ', 'bjS7aj', 'proberts5@google.com', 'Male');
insert into User (user_id, username, password, salt, email, sex) values (7, 'Emily', 'rB6EHq', 'gstelsnEo', 'ecastillo6@desdev.cn', 'Female');
insert into User (user_id, username, password, salt, email, sex) values (8, 'Kathy', 'zmtFoUu', 'VnxuEp', 'kwright7@stumbleupon.com', 'Female');
insert into User (user_id, username, password, salt, email, sex) values (9, 'Nicole', 'D3oscMmDA', 'J9y7qZ4yJ', 'nortiz8@moonfruit.com', 'Female');
insert into User (user_id, username, password, salt, email, sex) values (10, 'Norma', '0jg04HVadB', 'Xww5b98SeSC1', 'ncole9@t-online.de', 'Female');

insert into Inven (inv_id, inv_name, inv_pic) values (1, 'imperdiet et', 'http://dummyimage.com/179x199.jpg/ff4444/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (2, 'tortor quis', 'http://dummyimage.com/130x197.jpg/ff4444/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (3, 'nulla suspendisse potenti', 'http://dummyimage.com/235x116.jpg/5fa2dd/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (4, 'a feugiat et', 'http://dummyimage.com/212x238.jpg/ff4444/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (5, 'sit amet nulla', 'http://dummyimage.com/238x249.jpg/ff4444/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (6, 'luctus', 'http://dummyimage.com/165x197.jpg/ff4444/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (7, 'pede', 'http://dummyimage.com/109x203.jpg/cc0000/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (8, 'tristique est et', 'http://dummyimage.com/248x117.jpg/cc0000/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (9, 'odio', 'http://dummyimage.com/173x112.jpg/cc0000/ffffff');
insert into Inven (inv_id, inv_name, inv_pic) values (10, 'quisque', 'http://dummyimage.com/246x178.jpg/dddddd/000000');
