<?php 
//获取cookie中的a
//echo $_COOKIE['a'];

//获取cookie中的hd
$data =  $_COOKIE['hd'];
//反序列化，把序列化的字符串变为数组或者对象了
$arr = unserialize($data);
print_r($arr);



 ?>