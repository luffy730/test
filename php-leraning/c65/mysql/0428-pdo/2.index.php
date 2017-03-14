<?php 
//连接数据库并且查询数据**********
include "../function.php";
//连接的信息
$dsn = 'mysql:host=127.0.0.1;dbname=c65';
$username = 'root';
$password = '';
try {
    //连接数据库
    //如果连接出错那么会抛出异常，然后就会被catch接到
	$pdo = new PDO($dsn,$username,$password);
	//发送字符集
	$pdo->query("SET NAMES UTF8");
	//发送查询(返回结果集对象)
	$result = $pdo->query("SELECT * FROM student");
	$data = $result->fetchAll(PDO::FETCH_ASSOC);
	
} catch (PDOException $e) {
	//catch里面捕获PDO的异常错误
    echo '<span style="color:red">' . $e->getMessage() . '</span>';
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







