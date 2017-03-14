<?php 
header('Content-type:text/html;charset=utf-8');
////简单运算
//$a = 1;
//$b = 1;
//echo $a - $b;


//$a = '1';
//$b = 1;
////全等，不但要求值要相等，类型也要一样
//if($a === $b){
//	echo 'yes';
//}else{
//	echo 'no';
//}

//三元表达式
//$default = false ? 1 : 0;
//echo $default;
//$page = isset($_GET['page']) ? $_GET['page'] : 0;
//echo $page;

//逻辑与
//$a = true;
//$b = false;
//if($a && $b){
//	echo 'yes';
//}else{
//	echo 'no';
//}


//$str1 = '后盾网';
//$str2 = '马震宇';
//$result = $str1 . $str2;
//echo $result;

//连等于
//$str1 = '后盾网';
////连接上之前的字符串
//$str1 .= '马震宇';
//echo $str1;

//分支结构
//$data = 3;
//if($data == 1){
//	echo '1是美女';
//}elseif($data == 2){
//	echo '2是帅哥';
//}else{
//	echo '别乱输，小心揍你！💢';
//}

//$data = 20;
//switch ($data) {
//	case 1:
//		echo '1是美女';
//		break;
//	case 2:
//		echo '2也是美女';
//		break;
//	
//	default:
//		echo '别乱输，小心揍你！💢';
//		break;
//}



//while循环
//$a = 1;
//while ($a <= 10) {
//	echo $a . '<hr/>';
//	$a++;
//}


for ($i=0; $i < 10; $i++) {
	if($i == 5){
		//跳出循环
		//break;
		//跳出本次循环
		continue;
	} 
	echo $i . '<hr/>';
}





































 ?>