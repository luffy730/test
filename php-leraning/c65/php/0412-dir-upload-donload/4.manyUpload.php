<?php 
include "../function.php";
//如果用户点了“上传文件”按钮
if(IS_POST){
	p($_FILES);
	foreach($_FILES['up']['name'] as $k => $v){
		//如果是一个合法的上传文件
		if(is_uploaded_file($_FILES['up']['tmp_name'][$k])){
			//指定上传目录
			$path = './Upload/';
			//如果不是一个目录则创建
			is_dir($path) || mkdir($path,0777,true);
			//上传的类型
			$type = strrchr($_FILES['up']['type'][$k], '/');
			$type = ltrim($type, '/');
			//文件名
			$fileName = time() . mt_rand(0, 99999) . '.' . $type;
			//组合完成路径
			$fullPath = $path . $fileName;
			//移动上传文件
			move_uploaded_file($_FILES['up']['tmp_name'][$k], $fullPath);
		}
	}
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
 		文件1：<input type="file" name="up[]" id="" />
 		<br />
 		文件2：<input type="file" name="up[]" id="" />
 		<br />
 		<input type="submit" value="上传文件"/>
 	</form>
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 </body>
 </html>