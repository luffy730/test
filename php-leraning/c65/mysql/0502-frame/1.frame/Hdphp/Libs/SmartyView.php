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
		$tplDir = './App/Home/View/' . CONTROLLER;
		$smarty->template_dir = $tplDir; 
		//编译目录
		$comDir = './Storge/compile';
		is_dir($comDir) || mkdir($comDir,0777,true);
		$smarty->compile_dir = $comDir;
		//开始定界符
		$smarty->left_delimiter = "{{"; 
		 //结束定界符
		$smarty->right_delimiter = '}}';
		//存入静态属性
		self::$smarty = $smarty;
	}
	//载入模板
	protected function display(){
		$path = './App/Home/View/' . CONTROLLER . '/' . ACTION . '.html';
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
}



 ?>