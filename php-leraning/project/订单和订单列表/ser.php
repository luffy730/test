<?php 
	create procedure del_class_stu(in id int)
	begin
		delete from class where cid=id;
		delete from stu where cid=id;
	end 
	$

	//调用
	call del_class_sut(2)$

	create procedure del_class_stu(in id int)
	begin
		delete from class where cid=id;
		delete from class where cid=id;
	end
	$


	//创建函数
	create  function get_cid(name char(20))
	return int 
	reads sql data
	begin 
		return (select cid from student where sname=name);
	end 
	$

	select * from class where cid=get_cid('小红')$

	create function get_cid(name char(20))
	return int
	reads sql data 
	begin 
		return (select cid from stu where sname=name);
	end 
	$

	select * from class where cid=get_cid('宋慧乔');

	//录入数据的时候设置默认值
	create trigger insert_class before insert on class 
	for each row
	begin 
		if new.num is null then 
			set new.num=100;
		endif
	end 
	$

	create trigger insert_article before insert on article
	for each row 
	begin 
		if new.sendtime is null then 
			set new.sendtime=select unix_timestamp(now());
		endif;
		if new.author is null then
			set new.author ='后盾网';
		endif;
	end
	$
 ?>