<?php 
class Hd{
	//执行
	public static function run(){
		//1.创建目录
		self::createDir();
		//2.复制文件
		self::copyFile();
		//3.载入核心文件
		self::loadCore();
		//4.执行应用类
		\Hdphp\Libs\App::run();
		
	}
	private static function loadCore(){
		$file = array(
			'./Hdphp/Libs/function.php',
			'./Hdphp/Libs/App.php',
		);
		foreach ($file as $f) {
			require_once $f;
		}
	}
	
	
	private static function copyFile(){
		//复制默认控制器
		copy('./Hdphp/Common/IndexController.php', './App/Home/Controller/IndexController.php');
		//复制默认的模板
		copy('./Hdphp/Common/index.html', './App/Home/View/Index/index.html');
	}
	
	//创建所需目录，让用户知道代码写在哪里
	private static function createDir(){
		$dir = array(
			'./App',
			//放控制器的目录
			'./App/Home/Controller',
			//模板的目录
			'./App/Home/View',
			//默认给IndexController建立一个模板目录
			'./App/Home/View/Index'
		);
		foreach($dir as $d){
			is_dir($d) || mkdir($d,0777,true);
		}
	}
	
}
Hd::run();









 ?>