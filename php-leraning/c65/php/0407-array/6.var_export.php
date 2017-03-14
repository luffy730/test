<?php 
//载入数据库（必须放在if的外面）
$data = include './data.php';
//如果用户在提交的时候才写入数据库
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	//在原有数据库上追加一条
	$data[] = $_POST;
	//1.返回合法的PHP代码,如果传递第二个参数true,不会直接打印了
	$phpCode = var_export($data,true);
	//2.组合字符串
	$str = <<<str
<?php 
return {$phpCode};
?>
str;
	//3.把$str写入到data.php（数据库）文件里面
	file_put_contents('./data.php', $str);
}


 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<table border="1" cellspacing="" cellpadding="">
 		<tr><td>昵称</td><td>内容</td></tr>
 		<?php foreach($data as $v){ ?>
	 		<tr>
	 			<td><?php echo $v['nickname'] ?></td>
	 			<td><?php echo $v['content'] ?></td>
	 		</tr>
 		<?php } ?>
 	</table>
 	<hr />
 	<form action="" method="post">
 		昵称：
 		<input type="text" name="nickname" id="" />
 		<br />
 		内容：
 		<textarea name="content" rows="" cols=""></textarea>
 		<br />
 		<input type="submit" value="提交"/>
 	</form>
 </body>
 </html>
 
 
 
 
 
 
 
