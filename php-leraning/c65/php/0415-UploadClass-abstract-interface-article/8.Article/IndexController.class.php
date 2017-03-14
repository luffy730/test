<?php 
//默认控制器
class IndexController{
	//首页
	public function index(){
		$data = include './data.php';
		//载入首页
		include "./Tpl/index.html";
	}
	
	//添加
	public function add(){
		if(IS_POST){
			$data = include './data.php';
			$_POST['time'] = time();
			$data[] = $_POST;
			$phpCode = var_export($data,true);
			$str = <<<str
<?php
return {$phpCode};
?>
str;
			file_put_contents('./data.php', $str);
			success('发布成功', './index.php');
		}
		include './Tpl/add.html';
	}
	
	public function edit(){
		echo '编辑';
	}
	
	public function del(){
		echo '删除';
	}
	
	
	
	
	
	
	
	
	
}

 ?>