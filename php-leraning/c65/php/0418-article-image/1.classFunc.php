<?php 
include "../function.php";
class IndexController{
	private $db;
	public $path = './data.php';
	
	public function index(){
		
	}
	
	public function add(){
		
	}
	
	public function test($id){
		echo '我是test方法,我的ID：' . $id;
	}
	
}
//获得类里面的方法，返回是一个数组
$me = get_class_methods('IndexController');
//p($me);

//获得类里面的属性（public），返回是一个数组
$vars = get_class_vars('IndexController');
//p($vars);

//获得对象里面的属性（public），返回是一个数组
$obj = new IndexController;
$vars = get_object_vars($obj);
//p($vars);

/*
//通过回调函数的方式来调用对象里面的方法并且可以传参
$obj = new IndexController;
call_user_func_array(array($obj,'test'), array(1));
*/

/*
//检测IndexController里面的index方法是否存在
if(method_exists('IndexController', 'index')){
	echo 'yes';
}else{
	echo 'no';
}
*/

























 ?>