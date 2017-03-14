<?php 
header('Content-type:text/html;charset=utf-8');
class Model{
	public static $link = NULL;
	//静态调用不会执行构造方法，因为没有实例化
	public function __construct(){
		echo '我执行了';
	}
	public static function add(){
		echo 'add';
	}
}
////静态调用方法
//Model::add();
////静态调用属性
//var_dump(Model::$link);
class Db extends Model{
	private static $cake = '蛋糕';
	
	public static function getAdd(){
		parent::add();
		//$this->add()是错误的，因为没有实例化就没有对象，也就是没有当前对象$this
		echo self::$cake;
	}
}
Db::getAdd();


//如果通过::调用，例：Db::getAdd()，那么getAdd必须是静态方法
//如果parent::add()，那么add是静态方法












 ?>