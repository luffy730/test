<?php 

//创建银行表
create table bank(bid int,name char(20),money decimal(6,2));

insert into bank (bid,name,money) values (1,'马老师',1000),(2,'钱云',1000);

//1.开启事务
begin;
//2.关闭自动提交
set autocommit=0;
//3. 执行操作
select * from bank;
+------+-----------+---------+
| bid  | name      | money   |
+------+-----------+---------+
|    1 | 马老师    |  900.00 |
|    2 | 钱云      | 1100.00 |
+------+-----------+---------+

update bank set money=money-100 where bid=1;
update bank set money=money+100 where bid=2;

// 4.如果没有问题，那么就确认，如果有问题，那么就rollback
commit;












 ?>