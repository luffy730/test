<?php 
include "../function.php";
//定义正则
//$preg = '/houdunwang/';
//$str = 'www.houdunwang.com';
////正则匹配
//$int = preg_match($preg, $str);
//var_dump($int);


//原子（元字符）
//$preg = "/\d/";
//$str = 'abc123';
//echo preg_match($preg, $str);

//数字，字母，下划线
//$preg = "/\w/";
//$str = '--_-';
//echo preg_match($preg, $str);


//字符转义
//$str = 'abc*';
////因为*有特殊意义，我们需要通过转义把它变成普通字符
//$preg = "/\*/";
//echo preg_match($preg, $str);


////只要匹配到0-9中的任意一个数字，就算匹配成功
//$preg = '/[0-9]/';
//$str = 'abc123';
//echo preg_match($preg, $str);

////只要匹配到除了0-9中的任意一个字符，就算匹配成功
//$preg = '/[^0-9]/';
//$str = 'abc123';
//echo preg_match($preg, $str);

////数字，字母，下划线，只要匹配到其中任意一个都算成功
//$preg = '/[0-9a-zA-Z_]/';
//$str = 'ABC';
//echo preg_match($preg, $str);

////匹配普通字符 .，需要转义的
//$preg = '/\./';
//$str = 'abc.';
//echo preg_match($preg, $str);


////通过正则的形式，把字符串变为数组
//$str = "1.jpg,2.jpg,3.png#4.jpg|5.bmp";
////匹配,#|其中任意一个字符
//$preg = '/[,#|]/';
//$arr = preg_split($preg, $str);
//p($arr);


/*
//把houdunwang中的houdun变成红色
$str = "后盾官网www.houdunwang.com后盾论坛http://bbs.houdunwang.com我在后盾的网名叫houdun";
$preg = "/(houdun)wan(g)/";
//正则替换
$newStr = preg_replace($preg, '<span style="color:red">\1</span>wan<span style="color:green">\2</span>', $str);
echo $newStr;
 */

/*
//选择修饰符
$str = "http://www.baidu.com与新浪网http://www.sina.com";
$preg = "/\.(baidu|sina)\./";
echo preg_replace($preg, '.houdunwang.', $str);
 */

//* 重复0次或者更多次
//$preg = "/\d*/";
//$str = 'abc';
//echo preg_match($preg, $str);

//// + 代表重复一次或者更多次（至少有一次）
//$preg = '/\w+/';
//$str = '----a';
//echo preg_match($preg, $str);

////? 重复零次或一次
//$preg = "/[3-9]?/";
//$str = '3333abc';
//echo preg_match($preg, $str);


//只要数字重复了3次，就算匹配成功
//$preg = "/\d{3}/";
//$str = 'abc123333333';
//echo preg_match($preg, $str);

//把数字至少重复5次
//$preg = '/[0-9]{5,}/';
//$str = '123455555';
//echo preg_match($preg, $str);

//把数字重复1到3次就算成功
//$preg = "/\d{1,3}/";
//$str = 'abc123123';
//echo preg_match($preg, $str);


//手机号码正则 ^ 以什么开始 $ 以什么结束
//$preg = '/^(138|139|155|186)\d{8}$/';
//$number = '18612694053';
//echo preg_match($preg, $number);






































 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 




























































 ?>