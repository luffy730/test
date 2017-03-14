<?php
//先使用数据库,查看数据库里面所有的表
show tables;
//查询stu表的所有的内容
select * from stu;
//只查询sid,name
select sid,name from stu;
//起别名
select sid as s,name as n from stu;
+------+--------+
| s    | n      |
+------+--------+
|   20 | 小红   |
+------+--------+


//查询money>200的
select * from stu where money>200;
+------+--------+--------+
| sid  | name   | money  |
+------+--------+--------+
|   23 | 小黑   | 500.00 |
+------+--------+--------+

//查询money>200并且名字叫小蓝
select * from stu where money>200 and name='小蓝';
//查询money>200或者名字叫小蓝
select * from stu where money>200 or name='小蓝';


//连接字符串并且起了一个别名
select concat(sid,'-',name) as c from stu;
+-----------+
| c         |
+-----------+
| 20-小红   |
| 21-小王   |
| 22-小蓝   |
| 23-小黑   |
+-----------+

//money>100如果是大于的同学是1，否则是0
select name,money>100 as m from stu;
+--------+------+
| name   | m    |
+--------+------+
| 小红   |    1 |
| 小王   |    0 |
| 小蓝   |    0 |
| 小黑   |    1 |
+--------+------+

//把name字段重复的数据过滤掉
select distinct(name) from stu;
//查询null的数据必须用is null
select * from stu where sid is null;
//if的使用
select name,if(money>100,'有钱人','穷人') as i from stu;
+--------+-----------+
| name   | i         |
+--------+-----------+
| 小红   | 有钱人    |
| 小王   | 穷人      |
| 小蓝   | 穷人      |
| 小黑   | 有钱人    |
| 小黑   | 穷人      |
+--------+-----------+
//按照money升序排列
//desc 降序
//asc 升序
 select * from stu order by money asc;
+------+--------+--------+
| sid  | name   | money  |
+------+--------+--------+
| NULL | 小黑   |   NULL |
|   22 | 小蓝   |  10.00 |
|   21 | 小王   | 100.00 |
|   20 | 小红   | 100.02 |
|   23 | 小黑   | 500.00 |
+------+--------+--------+

//获得最有钱的一个人，按照money降序排序然后截取一条
select * from stu order by money desc limit 1;

//limit 1,2 从1位置开始截取2条
select * from stu limit 1,2;
+------+--------+--------+
| sid  | name   | money  |
+------+--------+--------+
|   21 | 小王   | 100.00 |
|   22 | 小蓝   |  10.00 |
+------+--------+--------+

//查询money100-500之间的数据，包含100和500
select * from stu where money between 100 and 500;
+------+--------+--------+
| sid  | name   | money  |
+------+--------+--------+
|   20 | 小红   | 100.02 |
|   21 | 小王   | 100.00 |
|   23 | 小黑   | 500.00 |
+------+--------+--------+

//查询money为10或者100或者500的数据
select * from stu where money in(10,100,500);
+------+--------+--------+
| sid  | name   | money  |
+------+--------+--------+
|   21 | 小王   | 100.00 |
|   22 | 小蓝   |  10.00 |
|   23 | 小黑   | 500.00 |
+------+--------+--------+

//名字包含“习”的同学
select * from stu where name like "%习%";
//查询姓“习”的同学，以“习”开头后面是任意字符
select * from stu where name like "习%";
//查询以“习”结尾的同学
select * from stu where name like "%习";

//查询以“习”开头但是后面只能有一个字符的同学
select * from stu where name like "习_";

//把name字段从左边截取1个字符
select left(name,1) from stu;
//从name字段的第2个位置开始截取2个字符
select mid(name,2,2) from stu;

//随机得到3个同学
select * from stu order by rand() limit 3;
+------+--------+--------+
| sid  | name   | money  |
+------+--------+--------+
|   21 | 小王   | 100.00 |
| NULL | 习哥   |   NULL |
|   20 | 小红   | 100.02 |
+------+--------+--------+


//客户端是什么编码就设置什么编码
set names utf8;


//插入数据（arc title）
insert into arc (aid,title) values (1,'今天'),(2,'后天'),(3,'明天'),(5,'前天');

//清除整个表的数据
truncate arc;

//根据主键aid如果没有就添加，如果有就替换
replace into arc (aid,title) values (6,'昨天');

//修改aid为1的数据
update arc set title='今天天气好晴朗' where aid=1;


//删除 aid为1的数据
delete from arc where aid=1;


//查询喜欢篮球的同学
方法1：select * from s where hobyy like '%篮球%';
方法2：select * from s where find_in_set('篮球',hobyy);
+-----+--------+---------------+
| sid | sname  | hobyy         |
+-----+--------+---------------+
|   1 | 小王   | 篮球          |
|   2 | 小张   | 篮球,足球     |
|   3 | 小李   | 篮球,PHP      |
+-----+--------+---------------+













