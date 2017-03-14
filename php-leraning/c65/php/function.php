<?php 
header('Content-type:text/html;charset=utf-8');
//设置时区
date_default_timezone_set('PRC');
/**
 * 打印函数
 */
function p($arr){
	echo '<pre style="border:1px solid grey;padding:10px;border-radius:5px;background:#ccc">';
	print_r($arr);
	echo '</pre>';
}
//定义是否提交IS_POST常量
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	define('IS_POST',true);
}else{
	define('IS_POST',false);
}
//成功提示函数
function success($msg,$url='./index.php'){
	$jsStr = <<<str
<script>
alert('{$msg}');
location.href = '{$url}';
</script>
str;
	echo $jsStr;exit;
}

function dataToFile($data,$file='./data.php'){
	$phpCode = var_export($data,true);
	$str = <<<str
<?php
return {$phpCode};
?>
str;
	file_put_contents($file, $str);
}









 ?>