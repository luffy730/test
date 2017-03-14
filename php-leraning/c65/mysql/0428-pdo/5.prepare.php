<?php 
//预准备prepare********************
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
	
	//实现预准备
	//功能1->防SQL注入：SQL和用户输入的信息如果一起解析有可能会出现安全问题,那么解决的方案：就是先解析sql,然后再绑定参数，这样就可以分离了
	//功能2->执行速度更快：如果执行100万条数据变的只有cid，那么之前的方式会解析100万次sql,如果采用预准备，那么只需要解析一次，所以预准备更快
	$st = $pdo->prepare('SELECT * FROM student WHERE cid=? AND sex=?');
	//用户的参数
	$cid = 0;
	$sex = '女';
	//绑定参数
	$st->bindParam(1,$cid,PDO::PARAM_INT);
	$st->bindParam(2,$sex,PDO::PARAM_STR);
	//执行
	$st->execute();
	//获得结果
	$data = $st->fetchAll(PDO::FETCH_ASSOC);
	p($data);
	
	
	
	
} catch (PDOException $e) {
	//catch里面捕获PDO的异常错误
    echo '<span style="color:red">' . $e->getMessage() . '</span>';
	exit;
}










