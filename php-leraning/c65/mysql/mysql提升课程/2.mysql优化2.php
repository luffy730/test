<?php 
//维度********************
//维度=不重复的条数/总条数

//1.要为维度高的列创建索引
//2.性别维度过低不适合创建索引

//显示创建表的语句
// show create table user;


//前缀索引
select count(distinct(left(gname,1)))/count(*) from ccshop_goods;
+-----------------------------------------+
| count(distinct(left(gname,1)))/count(*) |
+-----------------------------------------+
|                                  0.3333 |
+-----------------------------------------+

alter table ccshop_goods add index gname_key(gname(1));


//组合索引
 alter table ccshop_goods add index price_click_key(shopprice,click);



//通过explain 查询到的结果

           id: 1
  select_type: SIMPLE
        table: ccshop_goods
         type: const----------------用到的索引的类型
possible_keys: PRIMARY
          key: PRIMARY
      key_len: 4
          ref: const
         rows: 1--------------------查询的条数
        Extra: NULL






cid(int)    cname
1      娱乐


aid     title           cid(int)
 1      今天是周二         1










 ?>

