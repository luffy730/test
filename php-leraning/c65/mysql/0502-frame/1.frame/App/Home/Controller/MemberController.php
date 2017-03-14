<?php namespace Home\Controller;
use \Hdphp\Libs\Controller;
/**
 * 默认控制器
 */
class MemberController extends Controller{
	/**
	 * 默认方法
	 */
	public function index(){
		$this->display();
	}
	
	public function add(){
		echo 'member add';
	}
}






 ?>