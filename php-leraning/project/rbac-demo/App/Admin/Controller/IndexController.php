<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//后台默认控制器
class IndexController extends CommonController{

    //动作
    public function index(){
      p($_SESSION);
			echo 'houtaishouye';
      View::make();
    }
}







?>
