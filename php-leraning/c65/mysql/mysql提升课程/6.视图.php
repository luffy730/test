<?php 
//1.视图是虚表
//2.有些字段不想让开发者看到，那么可以创建的视图的时候不分配

//创建视图
create view bank_view as select bid,name from bank;
//修改视图
alter view bank_view as select name from bank;
//删除视图
drop view bank_view;
//查询视图
select * from bank_view;
//查看是否有视图
show table status where comment='VIEW'\G


 ?>