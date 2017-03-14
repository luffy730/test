<?php namespace A;
function var_dump($str){
	echo $str;
}
//调用当前空间
var_dump(1);
//调用全局空间的函数
\var_dump(1);


 ?>