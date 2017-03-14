<?php 
include "../../function.php";
//edit.php修改操作
//二、修改***********
//(1)载入数据库
$data = include "./data.php";
$id = $_GET['id'];
//在用户提交的时候才修改
if(IS_POST){
	//(2)修改***********
	$data[$id] = $_POST;
	//(3)重新写入数据库**********
	$phpCode = var_export($data,true);
	$str = <<<str
<?php
return {$phpCode	};
?>
str;
	file_put_contents('./data.php', $str);
	success('修改成功');
}


//一、获得旧数据***********
$oldData = $data[$id];
include "./tpl/edit.html";









 ?>