<?php 
//设置错误类型为异常类型**********
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
	//发送查询(返回结果集对象)
	$result = $pdo->query("SELECT * FROM student");
	$data = $result->fetchAll(PDO::FETCH_ASSOC);
	p($data);
	
} catch (PDOException $e) {
	//catch里面捕获PDO的异常错误
    echo '<span style="color:red">' . $e->getMessage() . '</span>';
	exit;
}


 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<table border="" cellspacing="" cellpadding="">
 		<?php foreach($data as $v): ?>
 		<tr><td><?php echo $v['sid'] ?></td><td><?php echo $v['sname'] ?></td></tr>
 		<?php endforeach ?>
 	</table>
 </body>
 </html>







