<?php namespace Hdphp\Libs;
/**
 * 执行应用类
 */
class App{
	public static function run(){
		//1.初始化框架
		self::init();
		//2.自动载入
		
		//3.执行应用
		self::appRun();
	}
	
	private static function appRun(){
		include "./App/Home/Controller/IndexController.php";
		$c = new \Hdphp\Controller\IndexController;
		$c->index();
	}
	
	private static function init(){
		//开启session
		session_id() || session_start();
		//设置时区
		date_default_timezone_set('PRC');
		
	}
}










 ?>