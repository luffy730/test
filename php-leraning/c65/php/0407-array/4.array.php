<?php 
include '../function.php';
//$arr = array('a','b','c');
//返回当前单元的键名
//echo key($arr);//0
//next($arr);
//echo key($arr);//1
//next($arr);
//echo key($arr);//2
//next($arr);
//var_dump(key($arr));//NULL

//返回当前单元的键值
//echo current($arr);
//next($arr);
//echo current($arr);



//$arr = array('a','b',array('c','d'));
////统计数组的单元个数
//echo count($arr);
//echo count($arr[2]);






//1.创建一个函数，函数的作用：检测文件是否为图片*************
//方法1：
//$file1 = '1.1.jpg';
//$file2 = '2.png';
//$file3 = '3.txt';
//function checkPic($name){
//	$ext = strrchr($name, '.');
//	$ext = ltrim($ext,'.');
//	if($ext == 'jpg' || $ext == 'png'){
//		return true;
//	}
//	return false;
//}
//$bool = checkPic($file3);
//var_dump($bool);


//$arr = array('jpg','png','gif');
////检测一个单元是否在一个数组中
//$bool = in_array('text', $arr);
//var_dump($bool);

//方法2：
//function checkPic($name){
//	$typeArr = array('jpg','png','gif','bmp');
//	//得到.jpg
//	$ext = strrchr($name, '.');
//	//去掉左边的.
//	$ext = ltrim($ext,'.');
//	//转为小写(因为有的文件名后缀名可能是大写的)
//	$ext = strtolower($ext);
//	//检测文件的后缀名是否在这个数组里面
//	return in_array($ext, $typeArr);
//}
//$file1 = '1.1.JPG';
//$file2 = '2.png';
//$file3 = '3.txt';
//var_dump(checkPic($file3));
//1.创建一个函数，函数的作用：检测文件是否为图片*************


//搜索一个键名是否在数组中
//$arr = array('a'=>'A','b'=>'B','c'=>'C');
//$bool = array_key_exists('a', $arr);
//var_dump($bool);



//用的不是很多，作为了解
//$arr = array('yule','bingdu','yundong');
//$newArr = array_filter($arr,'func');
//function func($v){
//	//只要return false 就可以把当前单元去掉，这是固定的规定
//	return ($v == 'bingdu') ? false : true;
//}
//p($newArr);




//题目：将每一个数组单元都连接上houdunwang
//方法1：
//将回调函数作用到给定数组的单元上
//$arr = array('a','b','c');
//$newArr = array_map('f', $arr);
//function f($v){
//	return $v . 'houdunwang';
//}
//p($newArr);

//方法2：(重点)
//$arr = array('a','b','c');
//foreach ($arr as $k => $v) {
//	$arr[$k] = $v . 'houdunwang';
//}
//p($arr);


//给数组追加一个或者多个单元
//$arr = array('a','b');
//array_push($arr,'c','d',array('e'));
//p($arr);


//追加
//$arr = array('a','b');
//$arr[] = 'c';
//$arr[] = 'd';
//p($arr);


//$arr = array('a','b','c','d');
////将数组最后一个单元弹出
//$last = array_pop($arr);
//p($arr);
//p($last);



//$arr = array('a','b','c','d');
////将数组第一个单元弹出
//$first = array_shift($arr);
//p($arr);


//在数组开头插入一个或多个单元
//$arr = array('a','b','c','d');
//array_unshift($arr,'1','2','3');
//p($arr);


//获得所有的键名
//$arr = array('a'=>'A','b'=>'B','c'=>'C');
//$keys = array_keys($arr);
//p($keys);


//获得所有的键值
//$arr = array('a'=>'A','b'=>'B','c'=>'C');
//$values = array_values($arr);
//p($values);

//合并两个索引数组
//$arr1 = array('a','b','c');
//$arr2 = array('d','e','f');
//$newArr = array_merge($arr1,$arr2);
//p($newArr);
//合并两个关联数组(相同索引会覆盖，而且后面的优先级更高)
//$arr1 = array('a'=>'A','b'=>'B','c'=>'C');
//$arr2 = array('a'=>'---','e'=>'E','f'=>'F');
//$newArr = array_merge($arr1,$arr2);
//p($newArr);


//将数组的键名转为大小写，默认是转为小写的
//只能转换一层
//$arr = array('a'=>'A','b'=>'B','c'=>'C',array('e'=>'E'));
//$newArr = array_change_key_case($arr,CASE_UPPER);
//p($newArr);































































 ?>