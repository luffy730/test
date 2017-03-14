<?php 
include "../../function.php";
//一、载入数据库*********
$data = include './data.php';
if(IS_POST){
	//二、追加一条*******
	$data[] = $_POST;
	
	//三、重新写入数据库*********
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
	//重新用JS跳转
	success('添加成功');
}
//载入页面
include './tpl/index.html';







 ?>