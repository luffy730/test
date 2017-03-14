<?php 
//del.php执行删除的文件
//载入函数
include "../../function.php";
//一、载入数据库********
$data = include "./data.php";

//二、删除********
//(1)接收要删除哪条的下标
$id = $_GET['id'];
//(2)删除数组（并没有改变data.php文件）
unset($data[$id]);

//三、写入数据库********
//代码合法化
$phpCode = var_export($data,true);
//组合字符串
$str = <<<str
<?php
return {$phpCode};
?>
str;
//写入数据库
file_put_contents('./data.php', $str);
//成功提示
success('删除成功');

 ?>