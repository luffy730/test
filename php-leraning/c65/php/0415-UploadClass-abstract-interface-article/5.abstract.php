<?php 
//抽象类作为了解*****至少打一遍而且明白
header('Content-type:text/html;charset=utf-8');
abstract class Tool{
	//运动方式，因为不确定子类以什么方式来运动
	//所以没有代码体也就是{}
	abstract protected function sport();
	//抽象类可以有普通方法
	public function test(){
		echo 'test';
	}
}
//飞机类Plane继承工具类Tool
class Plane extends Tool{
	public function sport(){
		echo '飞';
	}
}
$obj = new Plane;
$obj->sport();
$obj->test();

//车
class Car extends Tool{
	public function sport(){
		echo '跑';
	}
}
$obj = new Car;
$obj->sport();







 ?>