<?php 
include "../function.php";
$data = array(
	array('title'=>'标题1','des'=>'描述1'),
	array('title'=>'标题2','des'=>'描述2'),
);
//如果不需要$k的时候可以省略
foreach ($data as $v) {
	p($v['title']);
}




 ?>