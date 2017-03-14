<?php 
class Up{
	public function upload(){
		echo 'upload<br/>';
	}
	//如果方法名和类名是一样的时候，那么该方法就是构造方法
	public function up(){
		echo 'up';
	}
}
$obj = new Up;



 ?>