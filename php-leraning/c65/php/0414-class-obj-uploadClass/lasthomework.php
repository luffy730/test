<?php 
include "../function.php";
cp('./a','./b/a');

function cp($source,$dest){
	//如果$source不是一个目录那么就返回false
	if(!is_dir($source)) return false;
	//如果目标$dest不是一个目录就创建
	is_dir($dest) || mkdir($dest,0777,true);
	//扫描源目录所有内容
	foreach(glob($source . '/*') as $v){
		$newDest = $dest . '/' . basename($v);
		is_dir($v) ? cp($v,$newDest) : copy($v, $newDest);
	}
	return true;
}







 ?>