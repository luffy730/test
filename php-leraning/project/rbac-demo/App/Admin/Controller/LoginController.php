<?php namespace Admin\Controller;
use Hdphp\Controller\Controller;

//登陆控制器
class LoginController extends Controller{

    //登陆显示页面
    public function index(){
      if(IS_POST){
        $username = Q('post.username');
        $password = Q('post.password','','md5');
        $userInfo = Db::table('adminuser')->where("username='{$username}'")->get();
        if(!$userInfo){
          View::error('用户名不存在');
        }
        if($password != $userInfo[0]['password']){
          View::error('密码错误');
        }
        $_SESSION['uid'] = $userInfo[0]['uid'];
        $_SESSION['adminname'] = $userInfo[0]['username'];
        View::success('登陆成功',U('Index/index'));
      }
      View::make();
    }

    public function out(){
      session_unset();
      session_destroy();
      View::success('退出成功',U('Login/index'));
    }
}









?>
