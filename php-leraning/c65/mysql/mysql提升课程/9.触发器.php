<?php 
\d $
//查看触发器
show triggers\G
//删除触发器
drop trigger del_class$

//删除班级同时删除学生
//删除班级数据的时候自动触发
create trigger after_del_class after delete on class
for each row
begin
	delete from student where cid=old.cid;
end
$


//录入数据的时候设置默认值
create trigger insert_class before insert on class
for each row
begin
	if new.num is null then
	set new.num=100;
	end if;
end
$
//作业
//1.创建文章表含标题、作者、发布时间字段
//2.使用触发器完成，如果只添加了标题，
//发布时间字段自动设置为当前时间，作者字段设置为后盾网
select unix_timestamp(now())$








 ?>