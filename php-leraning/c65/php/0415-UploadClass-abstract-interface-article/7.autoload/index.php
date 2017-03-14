<?php 
header('Content-type:text/html;charset=utf-8');
//当使用一个未载入的类会自动执行此方法
//会把类名传入
function __autoload($className){
	include  "./{$className}.class.php";
}

$obj = new Upload;
$obj->up();
//$obj = new Image;
//$obj->thumb();
//$obj = new Code;
//$obj->show();





 ?>