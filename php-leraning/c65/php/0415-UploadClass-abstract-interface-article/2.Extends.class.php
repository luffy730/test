<?php 
//这个文件明白protected public private 三个的不同权限
header('Content-type:text/html;charset=utf-8');
class Father{
	//public 最公开的状态(外部，内部，子类都可以访问)
	public $name = '父亲的名字';
	//protected 受保护的（内部，子类，可以访问）
	protected $money = '金钱';
	//private 私有的（只有内部可以访问）
	private $socks = '袜子';
}


class Son extends Father{
	public function getName(){
		echo $this->name;
	}
	
	public function getMoney(){
		echo $this->money;
	}
	
	public function getSocks(){
		echo $this->socks;
	}
	
}
$obj = new Son;
$obj->getSocks();












 ?>