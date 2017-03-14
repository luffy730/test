<?php

//作业：
// 1.查找所有90后的女同学
select * from student where sex='女' and year(birthday)>=1990;
+-----+--------+-----+------------+
| sid | sname  | sex | birthday   |
+-----+--------+-----+------------+
|   2 | 小蓝   | 女  | 1995-01-01 |
|   4 | 小红   | 女  | 1995-10-15 |
+-----+--------+-----+------------+
// 2.查找班级年龄最小同学
select * from student order by birthday desc limit 1;
+-----+--------+-----+------------+
| sid | sname  | sex | birthday   |
+-----+--------+-----+------------+
|   4 | 小红   | 女  | 1995-10-15 |
+-----+--------+-----+------------+
// 3.得到没有班级的学生名?
select * from student as s left join class as c on s.cid=c.cid where c.cid is null;
+-----+--------+-----+------------+-----+------+-------+
| sid | sname  | sex | birthday   | cid | cid  | cname |
+-----+--------+-----+------------+-----+------+-------+
|   4 | 小红   | 女  | 1995-10-15 |   0 | NULL | NULL  |
+-----+--------+-----+------------+-----+------+-------+


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
select * from arc as a join arc_tag as at on a.aid=at.aid;
+-----+-----------------+-----+-----+
| aid | title           | aid | tid |
+-----+-----------------+-----+-----+
|   1 | 今天是阴天      |   1 |   1 |
|   1 | 今天是阴天      |   1 |   4 |
|   2 | 明天是周三      |   2 |   2 |
|   3 | 马老师真帅      |   3 |   1 |
|   3 | 马老师真帅      |   3 |   3 |
|   4 | 后盾网          |   4 |   1 |
|   4 | 后盾网          |   4 |   5 |
+-----+-----------------+-----+-----+
// 例:检索出“后盾网”都对应的标签名
select * from arc as a join arc_tag as at on a.aid=at.aid join tag as t on at.tid=t.tid where title='后盾网';
+-----+-----------+-----+-----+-----+-------+
| aid | title     | aid | tid | tid | tname |
+-----+-----------+-----+-----+-----+-------+
|   4 | 后盾网    |   4 |   1 |   1 | 赞    |
|   4 | 后盾网    |   4 |   5 |   5 | good  |
+-----+-----------+-----+-----+-----+-------+

// 例:检索出和“后盾网”拥有一样标签的文章(不要求完全一样)
//(1)得到后盾网所对应的标签id
select * from arc as a join arc_tag as at on a.aid=at.aid where title='后盾网';
//(2)根据标签id查询文章
select * from arc as a join arc_tag as at on a.aid=at.aid where tid in(1,5) and title!='后盾网';
+-----+-----------------+-----+-----+
| aid | title           | aid | tid |
+-----+-----------------+-----+-----+
|   1 | 今天是阴天      |   1 |   1 |
|   3 | 马老师真帅      |   3 |   1 |
+-----+-----------------+-----+-----+

// 例:检索出每篇文章所对应的标签
select * from arc as a join arc_tag as at on a.aid=at.aid join tag as t on at.tid=t.tid;
+-----+-----------------+-----+-----+-----+--------+
| aid | title           | aid | tid | tid | tname  |
+-----+-----------------+-----+-----+-----+--------+
|   1 | 今天是阴天      |   1 |   1 |   1 | 赞     |
|   1 | 今天是阴天      |   1 |   4 |   4 | 不爽   |
|   2 | 明天是周三      |   2 |   2 |   2 | 真慢   |
|   3 | 马老师真帅      |   3 |   1 |   1 | 赞     |
|   3 | 马老师真帅      |   3 |   3 |   3 | 胡扯   |
|   4 | 后盾网          |   4 |   1 |   1 | 赞     |
|   4 | 后盾网          |   4 |   5 |   5 | good   |
+-----+-----------------+-----+-----+-----+--------+

// 例:检索出每个标签所对应文章的数量
 select tname,count(*) from arc_tag as at join tag as t on at.tid=t.tid group by tname;
+--------+----------+
| tname  | count(*) |
+--------+----------+
| good   |        1 |
| 不爽   |        1 |
| 真慢   |        1 |
| 胡扯   |        1 |
| 赞     |        3 |
+--------+----------+









