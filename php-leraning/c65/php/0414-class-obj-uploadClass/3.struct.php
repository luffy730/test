<?php 
header('Content-type:text/html;charset=utf-8');
class Human{
	//构造方法，在类被new实例化的时候执行
	public function __construct($param1,$param2){
		echo '我的参数是' . $param1 . '|' . $param2 . '<br/>';
		echo '我出生了<br/>';
	}
	
	public function run(){
		echo 'run<br/>';
	}
	//析构方法，在对象被销毁的时候执行
	public function __destruct(){
		echo '我死掉了';
	}
}
$obj = new Human('A','B');
$obj->run();




















 ?>