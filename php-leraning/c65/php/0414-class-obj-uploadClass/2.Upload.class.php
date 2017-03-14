<?php 
include "../function.php";
class Upload{
	//上传
	public function up(){
		//1.重组数组
		$arr = $this->resetArr();
		//2.循环数组
		foreach ($arr as $v) {
			//3.过滤
			if($this->filter($v)){
				//4.上传
				$this->upFiles($v);
			}
			
		}
	}
	//上传文件
	private function upFiles($v){
		
	}
	
	
	//过滤（需要返回true和false）
	private function filter($v){
		//1.是否是合法的上传文件
		//2.判断类型是否允许
		//3.判断大小是否允许
		//4.error的4种错误
	}
	
	//重组数组
	public function resetArr(){
		$arr = array();
		foreach ($_FILES as $v) {
			//如果$v['name']是数组，证明多文件上传通过foreach来实现
			if(is_array($v['name'])){
				foreach ($v['name'] as $key => $name) {
					$arr[] = array(
						'name' => $name,
						'type' => $v['type'][$key],
						'tmp_name' => $v['tmp_name'][$key],
						'error' => $v['error'][$key],
						'size' => $v['size'][$key],
					);
				}
			}else{//单文件上传
				$arr[] = $v;
			}
		}
		return $arr;
	}
	
	
	
	
	
	
}

if(IS_POST){
	$obj = new Upload;
	$obj->up();
}





 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<form action="" method="post" enctype="multipart/form-data">
 		文件：
 		<input type="file" name="up" id="" />
 		<input type="submit" value="上传"/>
 	</form>
 </body>
 </html>








