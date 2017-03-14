<?php 
//创建存储过程
create procedure a()
begin
	select 'a';
end
$

//带有参数的存储过程
create procedure get_cid(in name char(10))
begin
	select cid from ccshop_category where cname=name;
end
$





//实现删除班级同时删除学生
create procedure del_class_stu(in id int)
begin
	delete from class where cid=id;
	delete from student where cid=id;
end
$
//调用
call del_class_stu(2)$



//删除存储过程
drop procedure a$

//查看存储过程
show procedure status$



//in
//可以输出外面传入的值
//不可以改变外面的变量
create procedure a(in id int)
begin
	select id;
	set id = 100;
end
$
set @num = 1$
call a(@num)$

//out
//不可以输出外面传入的值
//可以改变外面的变量
create procedure b(out id int)
begin
	select id;
	set id = 100;
end
$
set @id=1$
call b(@id)$


//select into
create procedure c()
begin
declare x int;
declare y char(20);
select cid,cname into x,y from c65.class limit 1;
select x;
select y;
end
$


























 ?>