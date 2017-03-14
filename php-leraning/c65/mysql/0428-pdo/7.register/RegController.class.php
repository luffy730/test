<?php 
class RegController{
	//注册页面
	public function index(){
		if(IS_POST){
			//接收用户提交的信息
			$username = $_POST['username'];
			$password = md5($_POST['password']);
			//执行插入数据库
			M()->e("INSERT INTO user (username,password) VALUES ('$username','$password')");
			//成功提示
			success('注册成功','index.php');

		}
		include "./tpl/Reg/index.html";
	}
}







 ?>