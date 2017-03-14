<?php namespace Hdphp\Libs;
include "./Hdphp/Org/smarty/smarty.class.php";
//smartyView是框架和smarty的桥梁
class SmartyView{
	private static $smarty = NULL;
	//因为IndexController继承Controller,Controller继承SmartyView，继承相当于实例化
	//所以构造方法会执行
	public function __construct(){
		if(!is_null(self::$smarty)) return;
		//实例化Smarty对象
		$smarty = new \Smarty();
		//模版目录
		//例如：./App/Home/View/Index
		$tplDir = './App/'.MODULE.'/View/' . CONTROLLER;
		$smarty->template_dir = $tplDir; 
		//编译目录
		$comDir = './Storge/compile/' . MODULE;
		is_dir($comDir) || mkdir($comDir,0777,true);
		$smarty->compile_dir = $comDir;
		//缓存目录
		$cacheDir = './Storge/cache/' . MODULE;
		is_dir($cacheDir) || mkdir($cacheDir,0777,true);
		$smarty->cache_dir = $cacheDir;
		//是否缓存
		$smarty->caching = C('SMARTY_CACHING');
		//缓存时间（秒）
		$smarty->cache_lifetime = C('SMARTY_LIFETIME');
		//开始定界符
		$smarty->left_delimiter = C('SMARTY_LEFT'); 
		 //结束定界符
		$smarty->right_delimiter =  C('SMARTY_RIGHT'); 
		//局部不缓存
		$smarty->register_block("nocache", "nocache", false);
		//存入静态属性
		self::$smarty = $smarty;
	}
	//载入模板
	protected function display(){
		$path = './App/'.MODULE.'/View/' . CONTROLLER . '/' . ACTION . '.html';
		if(!is_file($path)){
			halt(" {$path} 模板不存在 ):");
		}
		//调用smarty的display
		self::$smarty->display(ACTION . '.html',$_SERVER['REQUEST_URI']);
	}
	//载入模板
	protected function assign($name,$value){
		self::$smarty->assign($name,$value);
	}
	//判断缓存是否失效
	protected function is_cached(){
		return self::$smarty->is_cached(ACTION.'.html',$_SERVER['REQUEST_URI']);
	}
	
	//删除缓存
	protected function clear_cache(){
		self::$smarty->clear_cache();
	}
}



 ?>