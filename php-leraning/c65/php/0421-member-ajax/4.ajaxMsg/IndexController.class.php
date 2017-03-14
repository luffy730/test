<?php 
class IndexController{
	private $db;
	public function __construct(){
		$this->db = include "./data.php";
	}
	
	public function index(){
		$data = $this->db;
		include "./tpl/index.html";
	}
	
	//添加
	public function add(){
		$this->db = include "./data.php";
		$_POST['time'] = date('Y-m-d H:i:s');
		$this->db[] = $_POST;
		dataToFile($this->db,'./data.php');
		//返回给js json数据
		echo json_encode($_POST);
	}
}






 ?>