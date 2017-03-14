<?php 
//一.开发支持多级目录创建的函数
$dirArr = array(
	'Module',
	'App',
	'Controller/Index'
);
makeDir($dirArr);
function makeDir($dirArr){
	if(!is_array($dirArr)) return false;
	foreach ($dirArr as $v) {
		//1.左边成立不执行右边
		//2.左边不成立才执行右边
		is_dir($v) || mkdir($v,0777,true);
	}
}

//rename就可以移动
//rename('./Module', './App/Module');





















 ?>




