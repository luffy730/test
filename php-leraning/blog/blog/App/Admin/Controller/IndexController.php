<?php namespace Admin\Controller; 
use Hdphp\Controller\Controller;

//后台默认控制器
class IndexController extends CommonController{
	
	
    //默认后台首页
    public function index(){
    		View::make();
    }
	
	/**
	 * 欢迎界面
	 */
	public function welcome(){
	    View::make();
	}
	
	/**
	 * 修改密码
	 */
	public function updatePassword(){
		if(IS_POST){
			//1.判断旧密码是否正确****
			$oldPassword = Q('post.oldPassword','','md5');
			//获得当前用户登陆的数据
			$userData = Db::table('user')->where("uid={$_SESSION['uid']}")->get();
			//如果原密码错误
			if($userData[0]['password'] != $oldPassword){
				$this->error('原密码错误');
			}
			//2.判断两次密码是否相同****
			if(Q('post.newPassword') != Q('post.confirmPassword')){
				$this->error('两次密码不相同');
			}
			//3.修改****
			$password = Q('post.newPassword','','md5');
			//UPDATE user SET password='{$password}' WHERE uid={$_SESSION['uid']};
			Db::table('user')->where("uid={$_SESSION['uid']}")->update(array('password'=>$password));
			//删除session,让其重新登陆
			session_unset();
			session_destroy();
			//跳转到登陆页面
			$url = U('Login/index');
			$str = <<<str
<script>
parent.location.href = '{$url}';
</script>
str;
			echo $str;exit;
		}
	    View::make();
	}
	
}





