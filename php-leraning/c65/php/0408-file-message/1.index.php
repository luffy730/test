<?php 
include "../function.php";
//作业1：创建递归函数完成多维数组键名的大小写转换
$arr = array(
	'a' => 'A',
	'b' => 'B',
	'c' => array(
		'd' => 'D',
		'e' => array('f'=>'F')
	),
);



function changeCase($arr){
	$arr = array_change_key_case($arr,CASE_UPPER);
	foreach ($arr as $k => $v) {
		if(is_array($v)){
			$arr[$k] = changeCase($v);
		}
	}
	return $arr;
}
$newArr = changeCase($arr);
p($newArr);











 ?>
