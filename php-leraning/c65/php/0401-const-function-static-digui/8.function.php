<?php 
header('Content-type:text/html;charset=utf-8');
//自定义打印函数
function p($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
}
//$arr1 = array(1,2,3);
//p($arr1);
//
//$arr2 = array('a','b','c');
//p($arr2);

////传递多个参数
//function add($num1,$num2){
//	return $num1 + $num2;
//}
//echo add(1,300);

//默认值
//function add($num1,$num2=100){
//	return $num1 + $num2;
//}
//echo add(10);


////下面这种情况给默认值是毫无意义的，因为第一个参数不管什么时候都需要传递
//function add($num1=100,$num2){
//	return $num1 + $num2;
//}
//echo add(10,10);


//函数可以没有参数
//function test(){
//	echo 'test';
//}
//test();


////如果函数没有return的话，那么结果是NULL
//function getResult(){
//	$num1 = 1;
//	$num2 = 2;
//	$result = $num1 + $num2;
//}
//$bool = getResult();
//var_dump($bool);

//如果p函数没有声明的时候，那么再定义
//if(!function_exists('p')){
//	function p($str){
//		echo $str;
//	}
//}
//$arr = array('a','b');
//p($arr);




//局部变量
//$hd = 100;
//function hd(){
//	$hd = 200;
//	echo $hd . '<br/>';
//}
//hd();//结果是200
//echo $hd;//结果是100


//全局变量(不太推荐)
//$hd = '后盾网';
//function hd(){
//	//相当于把外部的变量引入
//	global $hd;
//	echo $hd;
//	$hd = 'www.houdunwang.com';
//}
//hd();
//echo $hd;


////常量不需要理会变量的范围
//function hd(){
//	define('HD', 'www.houdunwang.com');
//}
//hd();
//echo HD;



//function hd(){
//	//静态变量 第一次使用时赋予一个初始值
//	//在多次调用的时候共享
//	static $a = 0;
//	$a++;
//	echo $a;
//}
//hd();
//hd();
//hd();



//参数传递-按值传递
//function hd($var){
//	$var = 1;
//}
//$hd = 100;
//hd($hd);
//echo $hd;

//参数传递-按址传递
//function hd(&$var){
//	$var = 1;
//}
//$hd = 100;
//hd($hd);
//echo $hd;



/*
//变量函数
$type = isset($_GET['type']) ? $_GET['type'] : 'gif';
//默认是：open_gif
$func = 'open_' . $type;
//变量函数调用
$func();

function open_gif(){
	echo '打开了gif图片';
}
function open_jpg(){
	echo '打开了jpg图片';
}
function open_png(){
	echo '打开了png图片';
}
*/


































 ?>