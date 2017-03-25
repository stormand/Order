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
Name varchar(255) DEFAULT NULL COMMENT '���Ĳ���',
JapName varchar(255) DEFAULT NULL COMMENT '���Ĳ���',
KoreaName varchar(255) DEFAULT NULL COMMENT '���Ĳ���',
EnglishName varchar(255) DEFAULT NULL COMMENT 'Ӣ�Ĳ���',
Price double(255,0) DEFAULT NULL COMMENT '�۸�',
photo varchar(255) DEFAULT NULL
);



CREATE TABLE orderdetail (
orderid int(11) DEFAULT NULL,
name varchar(255) DEFAULT NULL COMMENT '����',
quantity int(11) DEFAULT NULL COMMENT '�������'
);




CREATE TABLE ordertab(
orderid int not null primary key,
num varchar(255) DEFAULT NULL COMMENT '���Ż�������',
totalprice varchar(255) DEFAULT NULL COMMENT '�ܼ۸�',
date varchar(10) DEFAULT NULL COMMENT '����,��ʽXXXX-XX-XX',
time varchar(8) DEFAULT NULL COMMENT 'ʱ��,��ʽxx:xx:xx',
foodquantity int(11) DEFAULT NULL COMMENT '��˵���ʽ��'
);
