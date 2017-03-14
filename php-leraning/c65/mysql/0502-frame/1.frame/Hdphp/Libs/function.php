<?php 

function halt($msg){
	header('Content-type:text/html;charset=utf-8');
	echo $msg;exit;
}

function M(){
	$model = new \Hdphp\Tool\Model;
	return $model;
}
/**
 * 打印函数
 */
function p($arr){
	echo '<pre style="border:1px solid grey;padding:10px;border-radius:5px;background:#ccc">';
	print_r($arr);
	echo '</pre>';
}









 ?>