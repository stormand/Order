SET character_set_client = utf8;
SET character_set_connection = utf8;
SET character_set_database = utf8;
SET character_set_results = utf8;
SET character_set_server = utf8;
SET collation_connection = utf8_general_ci;
SET collation_database = utf8_general_ci;
SET collation_server = utf8_general_ci;

create database diancai;
use diancai;

CREATE TABLE login(
id int auto_increment primary key,
username varchar(255) default null,
password varchar(255) default null,
num varchar(255) default null);


CREATE TABLE menu(
id int auto_increment primary key,
Name varchar(255) DEFAULT NULL COMMENT '中文菜名',
JapName varchar(255) DEFAULT NULL COMMENT '日文菜名',
KoreaName varchar(255) DEFAULT NULL COMMENT '韩文菜名',
EnglishName varchar(255) DEFAULT NULL COMMENT '英文菜名',
Price double(255,0) DEFAULT NULL COMMENT '价格',
photo varchar(255) DEFAULT NULL
);



CREATE TABLE orderdetail (
orderid int(11) DEFAULT NULL,
name varchar(255) DEFAULT NULL COMMENT '菜名',
quantity int(11) DEFAULT NULL COMMENT '点菜数量'
);




CREATE TABLE ordertab(
orderid int not null primary key,
num varchar(255) DEFAULT NULL COMMENT '桌号或者桌名',
totalprice varchar(255) DEFAULT NULL COMMENT '总价格',
date varchar(10) DEFAULT NULL COMMENT '日期,格式XXXX-XX-XX',
time varchar(8) DEFAULT NULL COMMENT '时间,格式xx:xx:xx',
foodquantity int(11) DEFAULT NULL COMMENT '点菜的样式数'
);
