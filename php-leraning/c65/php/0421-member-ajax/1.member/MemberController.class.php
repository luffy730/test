<?php 
/**
 * 会员管理控制器
 */
class MemberController{
	/**
	 * 注册
	 */
	public function reg(){
		if(IS_POST){
			$data = include "./data.php";
			//判断用户名是否已经注册过了
			foreach ($data as $v	) {
				if($_POST['username'] == $v['username']){
					success('用户名已存在');
				}
			}
			
			//追加一条
			$data[] = array(
				'username' => $_POST['username'],
				'password' => md5($_POST['password'])
			);
			//写入数据库
			dataToFile($data,'./data.php');
			//成功提示
			success('注册成功','./index.php');
		}
		include "./tpl/reg.html";
	}
	
	/**
	 * 登陆
	 */
	public function login(){
		if(IS_POST){
			//对比验证码
			//strtolower 是为了比对不区分大小写
			if(strtolower($_POST['code']) != $_SESSION['code']){
				success('验证码错误','./index.php?c=member&a=login');
			}
			//载入数据库
			$data = include './data.php';
			foreach ($data as $v) {
				//如果用户名和密码和数据库对比匹配成功证明可以登陆了！
				if($v['username'] == $_POST['username'] && $v['password'] == md5($_POST['password'])){
					//把用户名存到session里面，以后判断如果session里面有用户名证明是登陆了，没有就是没有登陆
					$_SESSION['username'] = $_POST['username'];
					//判断用户是否点击了7天免登陆
					if(isset($_POST['auto'])){
						setcookie(session_name(),session_id(),time() + 3600 * 24 * 7,'/');
					}else{//如果用户没有点击7天免登陆那么cookie就是有效时间就是会话时间
						setcookie(session_name(),session_id(),0,'/');
					}
					success('登陆成功','./index.php');
				}
			}
			success('登陆失败','./index.php?c=member&a=login');
		}
		include "./tpl/login.html";
	}
	
	/**
	 * 退出
	 */
	public function out(){
		session_unset();
		session_destroy();
		success('退出成功','./index.php');
	}
	
	/**
	 * 显示验证码
	 */
	public function code(){
		include "./Code.class.php";
		$code = new Code(100,30,'#dddddd');
		$code->show();
	}
	
	
	
	
	
}


 ?>