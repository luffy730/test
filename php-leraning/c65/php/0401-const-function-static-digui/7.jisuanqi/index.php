<?php 
//接收两个数字，默认是 0
$num1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
$num2 = isset($_POST['num2']) ? $_POST['num2'] : 0;
//接收运算符，默认是 + 
$yunsuan =  isset($_POST['yunsuan']) ? $_POST['yunsuan'] : '+';
//根据不同的运算符进行计算
switch ($yunsuan) {
	case '+':
		$result = $num1 + $num2;
		break;
	case '-':
		$result = $num1 - $num2;
		break;
	// * / 两种情况
	
}



 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<h2>结果：<span style="color: red;"><?php echo $result ?></span></h2>
 	<form action="" method="post">
 		数字1：<input type="text" name="num1" id="" />
 		<br />
 		数字2：<input type="text" name="num2" id="" />
 		<br />
 		运算符：
 		<select name="yunsuan" id="">
 			<option value="+">+</option>
 			<option value="-">-</option>
 			<option value="*">*</option>
 			<option value="/">/</option>
 		</select>
 		<br />
 		<input type="submit" value="计算"/>
 	</form>
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 	
 </body>
 </html>