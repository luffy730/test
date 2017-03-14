<?php 
//连接数据库**************
//连接的信息
$dsn = 'mysql:host=127.0.0.1;dbname=c65';
$username = 'root';
$password = '';
try {
    //连接数据库
    //如果连接出错那么会抛出异常，然后就会被catch接到
	$pdo = new PDO($dsn,$username,$password);
} catch (PDOException $e) {
	//catch里面捕获PDO的异常错误
    echo '<span style="color:red">' . $e->getMessage() . '</span>';
}










 ?>