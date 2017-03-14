<?php 
session_start();
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
//是否缓存
$smarty->caching = true;
//缓存时间（秒）
$smarty->cache_lifetime = 30;
//开始定界符
$smarty->left_delimiter = "{{"; 
 //结束定界符
$smarty->right_delimiter = '}}';
//echo '<pre>';
//print_r($_SERVER);
//如果缓存过期那么重新读取数据库内容，这样就不用频繁的读取数据库了
if(!$smarty->is_cached('index.html',$_SERVER['REQUEST_URI'])){
	echo '跑了数据库<br/>';
	//数据库操作
	include "./Model.class.php";
	$model = new Model;
	$data = $model->q("SELECT * FROM student");
	$smarty->assign('data',$data);
}

//以下全为固定写法不要纠结
$smarty->register_block("nocache", "nocache", false);
function nocache($params, $content, &$smarty) {
    return $content;
}

//载入模板
//加上$_SERVER['REQUEST_URI'] 是为了缓存文件保证唯一性，比如分页的时候，每一个分页都要单独生成一个缓存文件
$smarty->display('index.html',$_SERVER['REQUEST_URI']);











 ?>