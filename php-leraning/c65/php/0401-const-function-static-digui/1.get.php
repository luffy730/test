<?php 
header('Content-type:text/html;charset=utf-8');
echo 'get是' . $_GET['p'];
echo '<hr/>';
echo 'post是' . $_POST['p'];
echo '<hr/>';
echo 'request是' . $_REQUEST['p'];


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="" method="post">
		<input type="text" name="p" id="">
		<br>
		<input type="submit" value="提交">
	</form>










</body>
</html>