<?php 
class IndexController{
	//首页
	public function index(){
		$data = M()->q('SELECT * FROM user');
		include "./tpl/Index/index.html";
	}
}



 ?>