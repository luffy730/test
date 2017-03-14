<?php
//mysqL导出
mysqldump -uroot -p qqproject>qq.sql

//mysql导入
//1.先创建数据库
create database qqproject charset utf8;
//2.导入
mysql -uroot -p qqproject<qq.sql