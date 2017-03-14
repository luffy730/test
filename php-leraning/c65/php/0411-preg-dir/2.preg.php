<?php 
include "../function.php";
//i不区分大小写
//$preg = '/a/i';
//$str = 'Abc';
//echo preg_match($preg, $str);


//$str = <<<str
//<div>后盾网</div><DIV>
//新浪</div>
//str;
////s 将字符串视为单行
//$preg = "/<div>(.*?)<\/div>/is";
//preg_match_all($preg, $str,$arr);
//p($arr);


////方法1：e 把字符串变为可以执行的代码(将要被淘汰)
//$preg = '/^([a-z]{1,10}):(\w{6,10})$/ie';
//$user1 = 'admin:admin888';
//$user2 = 'user:aaaaaaa';
//$user3 = 'guest:bbbbbb';
//echo preg_replace($preg, '"\1:" . md5("\2")', $user3);


//方法2：代替上面的 /e模式，是未来使用的方法
//$preg = '/^([a-z]{1,10}):(\w{6,10})$/i';
//$user1 = 'admin:admin888';
//$user2 = 'user:aaaaaaa';
//$user3 = 'guest:bbbbbb';
//echo preg_replace_callback($preg, 'func', $user1);
//function func($var){
//	return $var[1] . ':' . md5($var[2]);
//}















































 ?>