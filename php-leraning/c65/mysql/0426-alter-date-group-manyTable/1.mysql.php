<?php 
//修改表名
alter table arc rename article;
//修改字段，同时改名change
alter table article change des d varchar(100) not null default '';



//修改字段，不改名称modify
alter table article modify d varchar(150) not null default '';
//修改字段同时放到第一个位置
alter table article modify d varchar(150) not null default '' first;
//修改字段同时放到aid的后面
 alter table article modify d varchar(150) not null default '' after aid;

//取消
\c
//追加字段
alter table article add sendtime int unsigned not null default 0;

//删除字段
alter table article drop d;

//1.增加主键
alter table article add primary key(aid);
//2.增加自增
alter table article modify aid int unsigned auto_increment;

//1.删除自增
alter table article modify aid int unsigned;
//2.删除主键
alter table article drop primary key;


//date类型的使用
create table user(
uid int unsigned primary key auto_increment,
name char(20) not null default '',
birthday date
);
//录入数据
insert into user set name='王小平',birthday=19900101;


//输出当前时间
select now();
+---------------------+
| now()               |
+---------------------+
| 2016-04-26 10:25:51 |
+---------------------+


//获得年
select year('2015-1-1');

select name,year(birthday) from user;
+-----------+----------------+
| name      | year(birthday) |
+-----------+----------------+
| 王习平    |           1990 |
| 王小平    |           1990 |
| 王小平    |           1990 |
+-----------+----------------+

//统计user表里面有多少数据
select count(*) from user;
//找出数据中最小的uid
select min(uid) from user;
//找出数据中最大的uid
select max(uid) from user;
//获得click的总数（求和）
select sum(click) from article;
//获得每篇文章的平均点击次数
select avg(click) from article;
//按照性别分成两组
select * from user group by sex;
+-----+-----------+------------+-----+
| uid | name      | birthday   | sex |
+-----+-----------+------------+-----+
|   1 | 王习平    | 1990-01-01 | 男  |
|   5 | 小红      | NULL       | 女  |
+-----+-----------+------------+-----+

//按照性别分组，然后再把“男”的一组拿出来
select * from user group by sex having sex='男';

====================表关系===================

================1:1==============
姓名表
sid        name            
 1         小红             
 2         小蓝             
 3         小白             

//通过sid知道身份证号是谁的
身份证表
id          number            sid
 1          123456             2
 2          345678             3
 3          789123             1


===================1:N=================
//多的保存少的
班级表
cid        cname       
 1          65          
 2          66
 3          67

学生表（关联字段放在多的一方）
 sid       sname              cid
  1        习小平 			   2
  2        路川				   1
  3        马乐                 1
  4        谷永庆               1
  5        小青                 3
  6        许仙                 2



//笛卡尔积
select * from stu,class
//如果不明确指定cid会报错，因为两张表里面都有cid
//ambiguous 是有歧义的意思
select * from stu,class where cid=cid;
ERROR 1052 (23000): Column 'cid' in where clause is ambiguous
//需要明确的指定cid就不会报错了
select * from stu,class where stu.cid=class.cid;

+-----+-----------+-----+-----+-------+
| sid | sname     | cid | cid | cname |
+-----+-----------+-----+-----+-------+
|   1 | 马乐      |   1 |   1 | 65    |
|   2 | 钱云      |   1 |   1 | 65    |
|   3 | 侯亚楠    |   1 |   1 | 65    |
|   4 | 路川      |   1 |   1 | 65    |
|   5 | 小青      |   2 |   2 | 66    |
|   6 | 许仙      |   3 |   3 | 67    |
|   7 | 法海      |   2 |   2 | 66    |
+-----+-----------+-----+-----+-------+

//别名
select sname,cname,s.cid from stu as s,class as c where s.cid=c.cid;
+-----------+-------+-----+
| sname     | cname | cid |
+-----------+-------+-----+
| 马乐      | 65    |   1 |
| 钱云      | 65    |   1 |
| 侯亚楠    | 65    |   1 |
| 路川      | 65    |   1 |
| 小青      | 66    |   2 |
| 许仙      | 67    |   3 |
| 法海      | 66    |   2 |
+-----------+-------+-----+


//以后我们的表关联用inner join
select * from stu as s inner join class as c on s.cid=c.cid;
+-----+-----------+-----+-----+-------+
| sid | sname     | cid | cid | cname |
+-----+-----------+-----+-----+-------+
|   1 | 马乐      |   1 |   1 | 65    |
|   2 | 钱云      |   1 |   1 | 65    |
|   3 | 侯亚楠    |   1 |   1 | 65    |
|   4 | 路川      |   1 |   1 | 65    |
|   5 | 小青      |   2 |   2 | 66    |
|   6 | 许仙      |   3 |   3 | 67    |
|   7 | 法海      |   2 |   2 | 66    |
+-----+-----------+-----+-----+-------+

//关联完毕使用where查询65期的同学
select * from stu as s join class as c on s.cid=c.cid where cname='65';
+-----+-----------+-----+-----+-------+
| sid | sname     | cid | cid | cname |
+-----+-----------+-----+-----+-------+
|   1 | 马乐      |   1 |   1 | 65    |
|   2 | 钱云      |   1 |   1 | 65    |
|   3 | 侯亚楠    |   1 |   1 | 65    |
|   4 | 路川      |   1 |   1 | 65    |
+-----+-----------+-----+-----+-------+


//left join 偏向左边的表无论左边的表记录是否匹配结果都要出来
//right join 偏向右边表
select * from class left join stu on class.cid=stu.cid;
+-----+-------+------+-----------+------+
| cid | cname | sid  | sname     | cid  |
+-----+-------+------+-----------+------+
|   1 | 65    |    1 | 马乐      |    1 |
|   1 | 65    |    2 | 钱云      |    1 |
|   1 | 65    |    3 | 侯亚楠    |    1 |
|   1 | 65    |    4 | 路川      |    1 |
|   2 | 66    |    5 | 小青      |    2 |
|   3 | 67    |    6 | 许仙      |    3 |
|   2 | 66    |    7 | 法海      |    2 |
|   4 | 70    | NULL | NULL      | NULL |
+-----+-------+------+-----------+------+



//查询没有学生的班级
select * from class left join stu on class.cid=stu.cid where sid is null;
+-----+-------+------+-------+------+
| cid | cname | sid  | sname | cid  |
+-----+-------+------+-------+------+
|   4 | 70    | NULL | NULL  | NULL |
+-----+-------+------+-------+------+

//统计每个班有多少个学生
select cname,count(*) from stu as s join class as c on s.cid=c.cid group by cname;
+-------+----------+
| cname | count(*) |
+-------+----------+
| 65    |        4 |
| 66    |        2 |
| 67    |        1 |
+-------+----------+



//得到和“马乐”在同一个班级的同学
//方法1：
（1）select * from stu where sname='马乐';
+-----+--------+-----+
| sid | sname  | cid |
+-----+--------+-----+
|   1 | 马乐   |   1 |
+-----+--------+-----+
(2)select * from stu where cid=1 and sname!='马乐';
+-----+-----------+-----+
| sid | sname     | cid |
+-----+-----------+-----+
|   2 | 钱云      |   1 |
|   3 | 侯亚楠    |   1 |
|   4 | 路川      |   1 |
+-----+-----------+-----+

//方法2：
//子查询
select * from stu where cid=(select cid from stu where sname='马乐') and sname!='马乐';
+-----+-----------+-----+
| sid | sname     | cid |
+-----+-----------+-----+
|   2 | 钱云      |   1 |
|   3 | 侯亚楠    |   1 |
|   4 | 路川      |   1 |
+-----+-----------+-----+

//方法3：
//自关联
select * from stu as s1 join stu as s2 on s1.cid=s2.cid;
+-----+-----------+-----+-----+-----------+-----+
| sid | sname     | cid | sid | sname     | cid |
+-----+-----------+-----+-----+-----------+-----+
|   1 | 马乐      |   1 |   1 | 马乐      |   1 |
|   2 | 钱云      |   1 |   1 | 马乐      |   1 |
|   3 | 侯亚楠    |   1 |   1 | 马乐      |   1 |
|   4 | 路川      |   1 |   1 | 马乐      |   1 |
|   1 | 马乐      |   1 |   2 | 钱云      |   1 |
|   2 | 钱云      |   1 |   2 | 钱云      |   1 |
|   3 | 侯亚楠    |   1 |   2 | 钱云      |   1 |
|   4 | 路川      |   1 |   2 | 钱云      |   1 |
|   1 | 马乐      |   1 |   3 | 侯亚楠    |   1 |
|   2 | 钱云      |   1 |   3 | 侯亚楠    |   1 |
|   3 | 侯亚楠    |   1 |   3 | 侯亚楠    |   1 |
|   4 | 路川      |   1 |   3 | 侯亚楠    |   1 |
|   1 | 马乐      |   1 |   4 | 路川      |   1 |
|   2 | 钱云      |   1 |   4 | 路川      |   1 |
|   3 | 侯亚楠    |   1 |   4 | 路川      |   1 |
|   4 | 路川      |   1 |   4 | 路川      |   1 |
|   5 | 小青      |   2 |   5 | 小青      |   2 |
|   7 | 法海      |   2 |   5 | 小青      |   2 |
|   6 | 许仙      |   3 |   6 | 许仙      |   3 |
|   5 | 小青      |   2 |   7 | 法海      |   2 |
|   7 | 法海      |   2 |   7 | 法海      |   2 |
+-----+-----------+-----+-----+-----------+-----+

//得到最终结果需要打印出来不断的看
select * from stu as s1 join stu as s2 on s1.cid=s2.cid where s2.sname='马乐' and s1.sname!='马乐';
+-----+-----------+-----+-----+--------+-----+
| sid | sname     | cid | sid | sname  | cid |
+-----+-----------+-----+-----+--------+-----+
|   2 | 钱云      |   1 |   1 | 马乐   |   1 |
|   3 | 侯亚楠    |   1 |   1 | 马乐   |   1 |
|   4 | 路川      |   1 |   1 | 马乐   |   1 |
+-----+-----------+-----+-----+--------+-----+











===============N:N====================

学生表（stu）
 sid       sname              			  
  2        路川			   
  3        马乐                 
  4        谷永庆               
               
中间表(stu_lesson)
sid        lid
 2          1
 2          2
 3          1
 4          2
 4          3

课程表(lesson)
lid            lname        
 1              php          
 2              JS
 3              HTML5 

//3张表关联
select * from stu join stu_lesson on stu.sid=stu_lesson.sid join lesson on stu_lesson.lid=lesson.lid;














//作业：
// 1.查找所有90后的女同学
// 2.查找班级年龄最小同学
// 3.得到没有班级的学生名?

//文章表(arc) 
aid      title
 1        今天是阴天
 2        明天是周三
 3        马老师真帅
 4        后盾网


//中间表(arc_tag) 
aid     tid
 1       1
 1       4
 2       2
 3       1
 3       3
 4       1
 4       5


//标签表(tag)
tid        tname
1           赞
2           真慢
3           胡扯
4           不爽
5           good



// 例:检索出文章的标签id
// 例:检索出“后盾网”都对应的标签名
// 例:检索出和“后盾网”拥有一样标签的文章(不要求完全一样)
// 例:检索出每篇文章所对应的标签
// 例:检索出每个标签所对应文章的数量














 ?>