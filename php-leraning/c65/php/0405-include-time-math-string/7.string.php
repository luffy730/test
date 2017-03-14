<?php 
header('Content-type:text/html;charset=utf-8');
//单引号(不可以解析变量)
//$hd = '后盾网';
//$str1 = 'houdu\'nwang$hd';
//echo $str1;
//echo '<hr/>';

//双引号(可以解析变量)
$hd = '后盾网';
//{}分离变量
$str2 = "{$hd}hd\"w\$a\\";
echo $str2;
echo '<hr/>';








//定界符(可以解析变量)
//$hd = '后盾网';
//$str3 = <<<hd
//	{$hd}www.houdunwang.com
//hd;
//echo $str3;














 ?>