<?php namespace Home\Controller;
use Hdphp\Libs\Controller;
/**
 * 默认控制器
 */
class IndexController extends Controller{
	/**
	 * 显示班级
	 */
	public function index(){
		$data = M()->q("SELECT * FROM class");
		$this->assign('data',$data);
		$this->display();
	}
	
	//删除班级
	public function del(){
		$id = (int)$_GET['id'];
		$sql = "DELETE FROM class WHERE cid={$id}";
		M()->e($sql);
		$this->success('删除成功','./index.php');
	}
	
	//添加班级
	public function add(){
		if(IS_POST){
			$cname = $_POST['cname'];
			$sql = "INSERT INTO class (cname) VALUES ('{$cname}')";
			M()->e($sql);
			$this->success('添加成功','./index.php');
		}
		$this->display();
	}
	
	//编辑班级
	public function edit(){
		$cid = (int)$_GET['id'];
		//修改
		if(IS_POST){
			$cname = $_POST['cname'];
		    $sql = "UPDATE class SET cname='{$cname}' WHERE cid={$cid}";
			M()->e($sql);
		    $this->success('修改成功','./index.php');
		}
		//获取旧数据
		$oldData = M()->q("SELECT * FROM class WHERE cid={$cid}");
		//p($oldData);
		$this->assign('oldData',$oldData[0]);
		$this->display();
	}
	
}






 ?>