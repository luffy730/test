<?php 
include "./function.php";
//默认时区UTC
//中国时区是东八区（PRC）
date_default_timezone_set('PRC');

//格式化本地时间
//echo date('Y-m-d H:i:s');
//如果传递第二个参数，就是格式时间戳
//echo date('Y-m-d H:i:s',1459742390);

//获得时区
//echo date_default_timezone_get();

//返回当前的时间戳
//echo time();

//返回一个浮点数，便于计算
//echo microtime(true)	;

//字符串转为时间戳，为了将来好计算
//echo strtotime('2000-1-1');

//得到时间的信息数组
//$arr = getdate();
//p($arr);












 ?>