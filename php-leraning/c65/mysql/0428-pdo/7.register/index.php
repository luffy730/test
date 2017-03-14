<?php 
include "../../function.php";
function __autoload($className){
	include "./{$className}.class.php";
}
function M(){
	$model = new Model;
	return $model;
}

//控制器和方法
$c = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
$a = isset($_GET['a']) ? $_GET['a'] : 'index';
//执行应用
$controller = $c . 'Controller';
$obj = new $controller;
$obj->$a();


 ?>