<?php namespace Home\Controller;
use Hdphp\Libs\Controller;
/**
 * 学生管理控制器
 */
class StuController extends Controller{
	public function index(){
	    
	}
	//学生添加
	public function add(){
		if(IS_POST){
			$sname = $_POST['sname'];
			$cid = (int)$_GET['id'];
		    $sql = "INSERT INTO stu (sname,cid) VALUES ('$sname',$cid)";
			M()->e($sql);
		    $this->success('添加成功','index.php');
		}
	    $this->display();
	}
	
	
	public function edit(){
	    
	}
	
	public function del(){
	    
	}
	
	
	
	
	
	
}