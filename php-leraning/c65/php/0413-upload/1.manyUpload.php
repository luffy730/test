<?php 
include "../function.php";
$pathArr = array();
if(IS_POST){
	//上传
	$pathArr = upload();
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
 		文件1： <input type="file" name="a[]" id="" />
 		<br />
 		文件2： <input type="file" name="a[]" id="" />
 		<br />
 		<input type="submit" value="上传"/>
 	</form>
 	<hr />
 	<?php foreach($pathArr as $v): ?>
 		<img src="<?php echo $v ?>"/>
 	<?php endforeach ?>
 	
 	
 	
 	
 	
 	
 </body>
 </html>