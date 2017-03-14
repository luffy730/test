<?php namespace Admin\Controller; 
use Hdphp\Controller\Controller;

//后台登陆控制器
class LoginController extends Controller{

	
    //登陆页面
    public function index(){
    		if(IS_POST){
    			//接收post里面的username
    			$username = Q('post.username');
			//接收密码
			//给密码默认值，然后md5加密
			$password = Q('post.password','','md5');
			//查询数据库
			//"SELECT * FROM user WHERE username='{$username}' AND password='{$password}'";
			$userData = Db::table('user')->where("username='{$username}' AND password='{$password}'")->get();
			if($userData){
				//把从数据库拿到的信息放入到session
				$_SESSION['uid'] = $userData[0]['uid'];
				$_SESSION['username'] = $userData[0]['username'];
				//跳转到后台首页
				$this->success('登陆成功',U('Admin/Index/index'));
			}else{
				//出错就回调到原网页
				$this->error('用户名或密码错误');
			}
			
			
    		}

    		View::make();
    }
	
	/**
	 * 退出
	 */
	public function out(){
	    session_unset();
		session_destroy();
		go(U('index'));
	}
	
}





