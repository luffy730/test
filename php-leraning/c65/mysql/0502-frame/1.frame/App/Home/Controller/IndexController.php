<?php namespace Home\Controller;
use \Hdphp\Libs\Controller;
/**
 * 默认控制器
 */
class IndexController extends Controller{
	/**
	 * 默认方法
	 */
	public function index(){
		$data = M()->q('SELECT * FROM student');
		$this->assign('data',$data);
		$this->display();
	}
	
	public function add(){
		$this->display();
	}
	
	public function code(){
		$code = new \Hdphp\Tool\Code;
		$code->show();
	}
}






 ?>