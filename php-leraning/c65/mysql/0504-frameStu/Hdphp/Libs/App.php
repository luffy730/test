<?php namespace Hdphp\Libs;
/**
 * 执行应用类
 */
class App{
	public static function run(){
		//1.初始化框架
		self::init();
		//2.自动载入
		//找到当前类里面的aload方法，给它赋予自动载入功能，而且这个方法规定必须是静态的
		spl_autoload_register(array(__CLASS__,'aload'));
		//3.执行应用
		self::appRun();
	}
	//自动载入
	private static function aload($className){
		//如果是控制器
		if(substr($className, -10) == 'Controller'){
			//$className的值是Home\Controller\IndexController
			$path = './App/' . str_replace('\\', '/', $className) . '.php';
		}else{//否则是工具类（验证码类，上传类，图像处理类...）
			//$className Hdphp\Tool\Code
			$path = './' . str_replace('\\', '/', $className) . '.php';
		}
		require $path;
	}
	//执行应用
	private static function appRun(){
		$m = MODULE;
		$c = CONTROLLER;
		$a = ACTION;
		
		$cName = "\\{$m}\Controller\\{$c}Controller";
		$obj = new $cName;
		$obj->$a();
	}
	
	private static function init(){
		define('IS_POST', ($_SERVER['REQUEST_METHOD'] == 'POST') ? TRUE : FALSE);
		
		//模块名称
		$m = isset($_GET['m']) ? ucfirst($_GET['m']) : 'Home';
		//控制器名称
		$c = isset($_GET['c']) ? ucfirst($_GET['c']) : 'Index';
		//方法名称
		$a = isset($_GET['a']) ? $_GET['a'] : 'index';
		
		//定义模块为常量
		define('MODULE', $m);
		//定义控制器为常量
		define('CONTROLLER', $c);
		//定义方法为常量
		define('ACTION', $a);
		
		//加载配置项
		//加载框架配置项
		$frameConfig = include "./Hdphp/Config.php";
		C($frameConfig);
		//加载公共配置项
		$commonConfig = include "./App/Common/Config/Config.php";
		C($commonConfig);
		//加载用户配置项
		$userConfig = include "./App/".MODULE."/Config/Config.php";
		C($userConfig);
		
		//开启session
		session_id() || session_start();
		//设置时区
		date_default_timezone_set(C('TIMEZONE'));
		
	}
}










 ?>