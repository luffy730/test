<?php 
//这个文件明白，如果子类和父类有相同的属性或者方法，子类就会覆盖父类
header('Content-type:text/html;charset=utf-8');
class Father{
	protected $money = '1000W';
	
	public function __construct(){
		echo '父亲的构造方法<br/>';
	}
	
	public function run(){
		echo '老爸跑<br/>';
	}
	
	public function walk(){
		echo '老爸走<br/>';
	}
}


class Son extends Father{
	//会覆盖父级的money属性，必须有同样的权限
	protected $money = '500W';
	
	public function __construct(){
		//因为子类会覆盖父类的构造方法，所以先调取一下
		parent::__construct();
		echo '儿子的构造方法<br/>';
	}
	
	public function getMoney(){
		echo $this->money;
	}
	//覆盖父级的run方法
	public function run(){
		echo '儿子跑<br/>';
	}
	
}
$obj = new Son;



$obj->run();
$obj->walk();











 ?>