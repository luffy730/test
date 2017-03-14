<?php namespace Admin\Controller; 
use Hdphp\Controller\Controller;

//后台公共控制器
class CommonController extends Controller{
	public function __construct(){
		//为了防止覆盖父级的构造方法
		parent::__construct();
		//如果用户没有登录
    		if(!isset($_SESSION['uid'])){
    			//跳转到登陆页面
    			go(U('Admin/Login/index'));
    		}
	}
}