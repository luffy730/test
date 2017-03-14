<?php
//3的阶乘 3*2的阶乘
//2的阶乘 2*1的阶乘
//1的阶乘 1


echo facto(5); 
//获得阶乘
function facto($num){
	if($num > 1){
		//$result = 3 * facto(2);
		//$result = 2 * facto(1);
		$result = $num * facto($num - 1);
	}else{
		$result = 1;
	}
	return $result;
}







 ?>