<?php 
include "../function.php";
//声明人类
class Human{
	//名字
	public $name;
	//性别
	public $sex;
	//眼睛颜色
	public $eyes;
	//__construct 固定的
	//构造方法，当类被实例化的时候会自动执行
	public function __construct(){
		echo '我出生了</br>';
	}
	
	//会说话
	public function talk(){
		echo '我的名字叫' . $this->name . "<br/>";
		echo '我的性别:' . $this->sex . "<br/>";
		echo '我的眼睛颜色是' . $this->eyes . "<br/>";
		echo '我正在说话';
	}
	//会思考
	public function think(){
		echo $this->name . '思考';
	}
	
}

//把类实例化（从类中取出具体的一个对象）
$obj1 = new Human;
$obj1->name = '路川';
$obj1->sex = '男';
$obj1->eyes = '红色';
$obj1->talk();

echo '<hr/>';

$obj2 = new Human;
$obj2->name = '胖友';
$obj2->sex = '女';
$obj2->eyes = '没有颜色';
$obj2->talk();









 ?>