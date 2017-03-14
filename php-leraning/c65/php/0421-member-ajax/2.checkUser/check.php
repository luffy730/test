<?php 
//接收到通过js异步发送过来的用户名
$username = $_POST['u'];
//载入数据库
$data = include './data.php';
//遍历看用户名是否存在
foreach ($data as $v) {
	if($username == $v['username']){
		echo 1;exit;
	}
}
//用户名不存在
echo 0;


 ?>