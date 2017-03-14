<?php 
include "../../function.php";
function __autoload($className){
	include "./{$className}.class.php";
}

$obj = new IndexController;
$a = isset($_GET['a']) ? $_GET['a'] : 'index';
$obj->$a();


 ?>