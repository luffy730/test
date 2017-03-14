<?php
// 连接mysql
mysql -uroot -p

// 创建c65数据库编码为utf8
create database c65 charset utf8;

// 显示所有的数据库
show databases;

//使用数据库（把数据库理解成文件夹，相当于打开一个文件夹）
use c65;

//删除c65库
drop database c65;

//先使用库 再创建学生表
//tinyint(1) 不代表只能存1位
//char(10) 代表最多只能存10个字符
create table stu(sid tinyint(1),name char(10),money decimal(5,2));

//录入数据
insert into stu set sid=20,name='小红',money=100.02;

//查询表中的数据
select * from stu;

//删除学生表
drop table stu;



//字符串类型*****************
//
//varchar和char的区别
//在速度上面char是优于varchar的
//在空间存储上面varchar是优于char的
//
//char(20) 最能能存20个字符
//char(300) 是不对的，因为超过了255
CHAR 			0-255字符 定长字符串
//varchar(300)
VARCHAR 		0-65535字符 变长字符串


//文章的内容用TEXT
TEXT 			0-65535字符 长文本数据


//创建文章表
create table arc(
	aid smallint,
	title char(50),
	des varchar(100),
	content text
);

//录入数据
insert into arc set aid=1,title='今天的第一篇日记',des='今天的第一篇日记的描述',content='内容';


//查询
select * from arc;
+------+--------------------------+-----------------------------------+---------+
| aid  | title                    | des                               | content |
+------+--------------------------+-----------------------------------+---------+
|    1 | 今天的第一篇日记            | 今天的第一篇日记的描述               | 内容    |
+------+--------------------------+-----------------------------------+---------+



//类型修饰******************
//zerofill 前导零填充（可以阻止负值）
//tinyint(5) 如果数字不够5位的时候前面用0来补充,不是代表能存5位的整数
create table wish(wid tinyint(5) zerofill);
insert into wish set wid=200;



//unsigned 非负(变成整数范围)
create table msg(mid smallint unsigned);


//enum 枚举，类似于单选项，比如：性别
create table user(uid int unsigned,sex enum('男','女'));
insert into user set uid=1,sex='男';

//set 多选
create table user(uid int unsigned,hobby set('篮球','排球','足球'));
insert into user set uid=1,hobby='篮球,足球';


//查询表结构
desc stu;
+-------+--------------+------+-----+---------+-------+
| Field | Type         | Null | Key | Default | Extra |
+-------+--------------+------+-----+---------+-------+
| sid   | tinyint(1)   | YES  |     | NULL    |       |
| name  | char(10)     | YES  |     | NULL    |       |
| money | decimal(5,2) | YES  |     | NULL    |       |
+-------+--------------+------+-----+---------+-------+




//default 给默认值的目的为了避免NULL类型出现，因为NULL类型查询比较慢
//not null 不允许为null值
//
//数字的默认值为0
//字符串默认值为空字符串
create table goods(
	gid int unsigned not null default 0,
	gname char(120) not null default ''
);



//unique 非重
//username指定了非重unique那么就不能有重复的用户名了
create table user(
	uid int unsigned,
	username char(20) not null default '' unique,
	password char(32) not null default ''
);

//注册一个admin用户，再次注册admin用户就会报错
insert into user set uid=1,username='admin',password=md5('admin888');




//primary key 主键是唯一的
//auto_increment 自增
//
//声明sid为主键并且自增
create table student(
	sid int unsigned primary key auto_increment,
	sname char(20) not null default ''
);


select * from student;
+-----+-----------+
| sid | sname     |
+-----+-----------+
|   1 | 周斌      |
|   2 | 钱云      |
|   3 | 马化腾    |
+-----+-----------+
//查找sid为3的用户
select * from student where sid=3;
+-----+-----------+
| sid | sname     |
+-----+-----------+
|   3 | 马化腾    |
+-----+-----------+
//删除sid为2的用户
delete from student where sid=2;




//复制stu的表结构给c1
create table c1 like stu;
//复制表数据
insert into c1 select * from stu;
//复制表结构同时复制表数据
create table c1 select * from stu;




//作业：
//（1）创建学生表，包含字段id（主键自增）,学生姓名,性别,年龄

//（2）创建学生日记表，包含标题，内容，查看次数

//（3）许愿墙

// (4) 周一上讲台考试



























