<?php 
\d $
//创建函数
create function hello(s char(20))
returns char(50)
reads sql data
begin
	return concat('hello',s,'!');
end
$


create function get_cid(name char(20))
returns int
reads sql data
begin
	return (select cid from student where sname=name);
end
$

select * from class where cid=get_cid('小白')$
+-----+-------+
| cid | cname |
+-----+-------+
|   3 | 67    |
+-----+-------+

//显示存储函数
show function status$
//删除存储函数
drop function hello$











