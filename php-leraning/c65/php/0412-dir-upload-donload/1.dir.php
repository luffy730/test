<?php 
include "../function.php";
/*
//如果当前有a目录
if(is_dir('./a')){
	//把a目录改为b目录
	rename('./a', './b');
}
*/


//把./1.dir.php复制一个叫b.php
//copy('./1.dir.php', './b.php');

/*
//获得指定目录的下面的所有东西
$arr = glob('*');
p($arr);
 */

////重复字符串
//echo str_repeat('A', 5);



function showDir($dirName,$level=1){
	//如果不是目录返回false
	if(!is_dir($dirName)) return false;
	//输出父级目录
	echo str_repeat('&nbsp;', $level) . '<span style="color:red">' . $dirName . '</span><br/>';
	//扫描目录
	$scDir = glob($dirName . '/*');
	//循环目录下面所有的文件和录
	foreach ($scDir as $v) {
		//是目录递归
		if(is_dir($v)) showDir($v,$level + 3);
		//是文件输出
		if(is_file($v)) echo str_repeat('&nbsp;', $level + 5) . '|--' . $v . '<br/>';
	}
}
showDir('../../c65');








































 ?>



