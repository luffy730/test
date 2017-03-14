<?php 
//执行没有结果集(delete,update,insert)的操作**********
include "../function.php";
//连接的信息
$dsn = 'mysql:host=127.0.0.1;dbname=c65';
$username = 'root';
$password = '';
try {
    //连接数据库
    //如果连接出错那么会抛出异常，然后就会被catch接到
	$pdo = new PDO($dsn,$username,$password);
	
	//设置下面的语句都为异常错误，这样才能被try catch接收
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	//发送字符集
	$pdo->query("SET NAMES UTF8");
	//执行没有结果集的操作
	$num = $pdo->exec("DELETE FROM student");
	echo "共删除了{$num}条数据";
	
	
} catch (PDOException $e) {
	//catch里面捕获PDO的异常错误
    echo '<span style="color:red">' . $e->getMessage() . '</span>';
	exit;
}










