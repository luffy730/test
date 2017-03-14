<?php 
//这个文件是饭店
$food = $_POST['f'];
//如果用户点的是番茄炒西红柿那么就回答有！
if($food == '番茄炒西红柿'){
	echo 1;
}else{
	echo 0;
}

 ?>