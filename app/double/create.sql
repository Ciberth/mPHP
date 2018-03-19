create database mtest;

use mtest; 

create table items(id INT NOT NULL PRIMARY KEY AUTO_INCREMENT, name CHAR(25), price INT(6));

insert into items (id, name, price) values (null, 'Pizza', '5'); 
insert into items (id, name, price) values (null, 'Pc', '1000'); 
insert into items (id, name, price) values (null, 'Tv', '600'); 