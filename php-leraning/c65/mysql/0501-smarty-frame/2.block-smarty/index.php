<?php 
function p($arr){
	echo '<pre>';
	print_r($arr);
	echo '</pre>';
	echo '<hr/>';
}
//载入Smarty类库
include "./smarty/Smarty.class.php";
include "./Model.class.php";
 //实例化Smarty对象
$smarty = new Smarty();
//模版目录
$smarty->template_dir = "template"; 
//编译目录
$smarty->compile_dir = "temp/compile";
//开始定界符
$smarty->left_delimiter = "{{"; 
 //结束定界符
$smarty->right_delimiter = '}}';

//载入模板
//加上$_SERVER['REQUEST_URI'] 是为了缓存文件保证唯一性，比如分页的时候，每一个分页都要单独生成一个缓存文件
$smarty->display('index.html',$_SERVER['REQUEST_URI']);











 ?>