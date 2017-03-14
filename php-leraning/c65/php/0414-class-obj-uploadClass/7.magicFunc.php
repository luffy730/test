<?php 
header('Content-type:text/html;charset=utf-8');
class IndexController{
	public function index(){
		echo '首页';
	}
	
	public function add(){
		echo '添加';
	}
	
	public function del(){
		echo '删除';
	}
	
	public function edit(){
		echo '编辑';
	}
	
	//调用未定义方法会自动执行
	//$func 未定义方法的名称
	//$param 未定义方法里面的参数
	public function __call($func,$param){
		echo "方法{$func}不存在，请重试 ):";
		
	}
	
	
}
//实例化对象（实例化控制器）
$obj = new IndexController;
//通过get参数控制不同的方法
$action = isset($_GET['a']) ? $_GET['a'] : 'index';
//执行方法
$obj->$action();



 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<ul>
 		<li><a href="./7.magicFunc.php">首页</a></li>
 		<li><a href="./7.magicFunc.php?a=add">添加</a></li>
 		<li><a href="./7.magicFunc.php?a=edit">编辑</a></li>
 		<li><a href="./7.magicFunc.php?a=del">删除</a></li>
 	</ul>
 </body>	
 </html>







