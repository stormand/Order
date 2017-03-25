SET character_set_client=utf8;
SET character_set_connection=utf8;
SET character_set_database=utf8;
SET character_set_results=utf8;
SET character_set_server=utf8;
SET collation_connection=utf8_general_ci;
SET collation_database=utf8_general_ci;
SET collation_server=utf8_general_ci;

create database diancai;
use diancai;

CREATE TABLE login(
id int auto_increment primary key,
username varchar(255) default null,
password varchar(255) default null,
num varchar(255) default null);

INSERT INTO login VALUE(null,'jun','123456','100');
INSERT INTO login VALUE(null,null,null,null);

CREATE TABLE menu(
id int auto_increment primary key,
Name varchar(255) DEFAULT NULL COMMENT '中文菜名',
JapName varchar(255) DEFAULT NULL COMMENT '日文菜名',
KoreaName varchar(255) DEFAULT NULL COMMENT '韩文菜名',
EnglishName varchar(255) DEFAULT NULL COMMENT '英文菜名',
Price double(255,0) DEFAULT NULL COMMENT '价格',
photo varchar(255) DEFAULT NULL
);

INSERT INTO menu VALUES('1','糖醋排骨','日文排骨','韩文排骨','英文排骨','30RMB','http://192.168.253.3/Order/images/paigu.jpg');
INSERT INTO menu VALUES('2','梅菜扣肉','日文扣肉','韩文扣肉','英文扣肉','40RMB','http://192.168.253.3/Order/images/kourou.jpg');
INSERT INTO menu VALUES('3','红烧茄子','日文茄子','韩文茄子','英文茄子','50RMB','http://192.168.253.3/Order/images/qiezi.jpg');
INSERT INTO menu VALUES('4','盐水菜心','日文菜心','韩文菜心','英文菜心','60RMB','http://192.168.253.3/Order/images/caixin.jpg');

CREATE TABLE orderdetail(
orderid int(11) DEFAULT NULL,
name varchar(255) DEFAULT NULL COMMENT '菜名',
quantity int(11) DEFAULT NULL COMMENT '点菜数量'
);

INSERT INTO orderdetail VALUES ('1','红烧茄子','1');
INSERT INTO orderdetail VALUES ('1','红烧排骨','2');
INSERT INTO orderdetail VALUES ('2','梅菜扣肉','1');
INSERT INTO orderdetail VALUES ('2','红烧猪蹄','1');
INSERT INTO orderdetail VALUES ('1','北京烤鸭','1');
INSERT INTO orderdetail VALUES ('4','香菇炖鸡','2');
INSERT INTO orderdetail VALUES ('7','糖醋排骨','2');
INSERT INTO orderdetail VALUES ('7','梅菜扣肉','1');


CREATE TABLE ordertab(
orderid int not null primary key,
num varchar(255) DEFAULT NULL COMMENT '桌号或者桌名',
totalprice varchar(255) DEFAULT NULL COMMENT '总价格',
date varchar(10) DEFAULT NULL COMMENT '日期,格式XXXX-XX-XX',
time varchar(8) DEFAULT NULL COMMENT '时间,格式xx:xx:xx',
foodquantity int(11) DEFAULT NULL COMMENT '点菜的样式数'
);

INSERT INTO ordertab VALUES('1','2','220','2014-06-07','14:20:35','2'); 
INSERT INTO ordertab VALUES('2','6','280','2014-06-07','14:24:35','3'); 
INSERT INTO ordertab VALUES('4','5','220','2014-06-07','14:55:35','1'); 
INSERT INTO ordertab VALUES('7','qa','125','2014-08-04','17:08:23','3'); 