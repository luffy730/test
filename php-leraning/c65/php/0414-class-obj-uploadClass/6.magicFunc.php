<?php 
header('Content-type:text/html;charset=utf-8');
//作为了解****
/*
class Human{
	private $secret='秘密';
	//检测私有属性是否存在会被自动被调用
	public function __isset($var){
		return isset($this->$var);
	}
	
}
$obj = new Human;
$bool = isset($obj->secret);
var_dump($bool);
*/


/*
class Human{
	private $secret = '秘密';
	
	//删除私有属性的时候会自动触发此方法，会把属性的名称传入
	public function __unset($var){
		//通过内部删除
		unset($this->$var);
	}
	
	public function test(){
		$bool = isset($this->secret);
		var_dump($bool);
	}
	
}
$obj = new Human;
unset($obj->secret);
//看一下私有属性是否被删除
$obj->test();
*/

/*
class Human{
	private $cake = '蛋糕';
	//访问一个私有的或者不存在的属性会自动调用此方法，会传入属性的名称
	public function __get($var){
		echo "{$var}属性不存在";
	}
}
$obj = new Human;
echo $obj->cake;
 */
 
 
/*
class Human{
	private $data = array();
	//当给未定义属性赋值的时候会自动触发此方法
	//传入属性的名称和值
	public function __set($name,$value){
		//$this->data['a'] = 'A';
		$this->data[$name] = $value;
	}
	
	public function __get($name){
		//return $this->data['a'];
		return $this->data[$name];
	}
	
}
$obj = new Human;
//会触发__set
$obj->a = 'A';
//会触发__get
echo $obj->a;
*/
 

 
















 ?>