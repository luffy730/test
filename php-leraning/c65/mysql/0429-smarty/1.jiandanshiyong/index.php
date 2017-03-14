<?php 
date_default_timezone_set('PRC');
//载入Smarty类库
include "./smarty/Smarty.class.php"; 
 //实例化Smarty对象
$smarty = new Smarty();
//模版目录
$smarty->template_dir = "template"; 
//编译目录
$smarty->compile_dir = "temp/compile";
//缓存目录
$smarty->cache_dir = "temp/cache";
//开始定界符
$smarty->left_delimiter = "{{"; 
 //结束定界符
$smarty->right_delimiter = '}}';

$data = array('webname'=>'后盾网');
//把$data变量放到index.html页面名字叫$d
$smarty->assign('d',$data);

$arr = array("web"=>array("name"=>"后盾网","age"=>30));
$smarty->assign('a',$arr);

//定义常量(常量是全局的不用分配assign)
define('WWW', 'www.houdunwang.com');

$arcData = array(
	array(
		'title'=>'我是第1篇文章',
	),
	array(
		'title'=>'我是第2篇文章',
	),
	array(
		'title'=>'我是第3篇文章',
	),
	array(
		'title'=>'我是第4篇文章',
	),
	array(
		'title'=>'我是第5篇文章',
	),
	array(
		'title'=>'我是第6篇文章',
	),
	array(
		'title'=>'我是第7篇文章',
	),
	array(
		'title'=>'',
	),
);
$smarty->assign('arcData',$arcData);




//载入模板
$smarty->display('index.html');











 ?>