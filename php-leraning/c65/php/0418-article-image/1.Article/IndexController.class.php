<?php 
//默认控制器
class IndexController{
	//将来放数据库
	private $db;
	public function __construct(){
		//因为下面的每一个方法都需要载入data.php，所以初始化的时候就载入
		$this->db = include "./data.php";
	}
	
	
	//首页
	public function index(){
		$data = $this->db;
		//载入首页
		include "./Tpl/index.html";
	}
	
	//添加
	public function add(){
		if(IS_POST){
			$_POST['time'] = time();
			$this->db[] = $_POST;
			//写入到数据库
			dataToFile($this->db);
			success('发布成功', './index.php');
		}
		include './Tpl/add.html';
	}
	
	public function edit(){
		//1.获取旧内容
		$id = $_GET['id'];
		$oldData = $this->db[$id];
		//2.修改内容
		if(IS_POST){
			$_POST['time'] = time();
			$this->db[$id] = $_POST;
			//写入到数据库
			dataToFile($this->db);
			success('编辑成功');
		}
		include "./Tpl/edit.html";
	}
	
	/**
	 * 删除
	 */
	public function del(){
		$id = $_GET['id'];
		//删除数组
		unset($this->db[$id]);
		//写入数据库
		dataToFile($this->db);
		success('删除成功', './index.php');
	}
	
	/**
	 * 显示文章
	 */
	public function show(){
		
	}
	
	
	
	
	
	
	
	
	
}

 ?>