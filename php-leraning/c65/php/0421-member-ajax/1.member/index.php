<?php 
include "../../function.php";
session_start();
//如果有sessionID证明session已经开启了
//session_id() || session_start();
//自动载入
function __autoload($className){
	include "./{$className}.class.php";
}

//控制器对象*****
$c = isset($_GET['c']) ? $_GET['c'] : 'Index';
//首字母转为大写，因为类名的首字母是大写的
$c = ucfirst($c);
//控制器名称
$name = "{$c}Controller";
$obj = new $name;

//方法******
$a = isset($_GET['a']) ? $_GET['a'] : 'index';
$obj->$a();


 ?>