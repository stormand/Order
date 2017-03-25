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
Name varchar(255) DEFAULT NULL COMMENT '���Ĳ���',
JapName varchar(255) DEFAULT NULL COMMENT '���Ĳ���',
KoreaName varchar(255) DEFAULT NULL COMMENT '���Ĳ���',
EnglishName varchar(255) DEFAULT NULL COMMENT 'Ӣ�Ĳ���',
Price double(255,0) DEFAULT NULL COMMENT '�۸�',
photo varchar(255) DEFAULT NULL
);

INSERT INTO menu VALUES('1','�Ǵ��Ź�','�����Ź�','�����Ź�','Ӣ���Ź�','30RMB','http://192.168.253.3/Order/images/paigu.jpg');
INSERT INTO menu VALUES('2','÷�˿���','���Ŀ���','���Ŀ���','Ӣ�Ŀ���','40RMB','http://192.168.253.3/Order/images/kourou.jpg');
INSERT INTO menu VALUES('3','��������','��������','��������','Ӣ������','50RMB','http://192.168.253.3/Order/images/qiezi.jpg');
INSERT INTO menu VALUES('4','��ˮ����','���Ĳ���','���Ĳ���','Ӣ�Ĳ���','60RMB','http://192.168.253.3/Order/images/caixin.jpg');

CREATE TABLE orderdetail(
orderid int(11) DEFAULT NULL,
name varchar(255) DEFAULT NULL COMMENT '����',
quantity int(11) DEFAULT NULL COMMENT '�������'
);

INSERT INTO orderdetail VALUES ('1','��������','1');
INSERT INTO orderdetail VALUES ('1','�����Ź�','2');
INSERT INTO orderdetail VALUES ('2','÷�˿���','1');
INSERT INTO orderdetail VALUES ('2','��������','1');
INSERT INTO orderdetail VALUES ('1','������Ѽ','1');
INSERT INTO orderdetail VALUES ('4','�㹽����','2');
INSERT INTO orderdetail VALUES ('7','�Ǵ��Ź�','2');
INSERT INTO orderdetail VALUES ('7','÷�˿���','1');


CREATE TABLE ordertab(
orderid int not null primary key,
num varchar(255) DEFAULT NULL COMMENT '���Ż�������',
totalprice varchar(255) DEFAULT NULL COMMENT '�ܼ۸�',
date varchar(10) DEFAULT NULL COMMENT '����,��ʽXXXX-XX-XX',
time varchar(8) DEFAULT NULL COMMENT 'ʱ��,��ʽxx:xx:xx',
foodquantity int(11) DEFAULT NULL COMMENT '��˵���ʽ��'
);

INSERT INTO ordertab VALUES('1','2','220','2014-06-07','14:20:35','2'); 
INSERT INTO ordertab VALUES('2','6','280','2014-06-07','14:24:35','3'); 
INSERT INTO ordertab VALUES('4','5','220','2014-06-07','14:55:35','1'); 
INSERT INTO ordertab VALUES('7','qa','125','2014-08-04','17:08:23','3'); 