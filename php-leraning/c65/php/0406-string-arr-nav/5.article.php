<?php 
$arr = array(
	array(
		'title' => '今天天气好晴朗',
		'click' => 100
	),
	array(
		'title' => '处处好风光',
		'click' => 300
	),
	array(
		'title' => '那次是我不经意的离开',
		'click' => 300
	),
	array(
		'title' => '兄弟抱一下，说说心里话',
		'click' => 500
	),
	
);

 ?>
  <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<table border="1" cellspacing="" cellpadding="">
 		<tr>
 			<th>ID</th>
 			<th>标题</th>
 			<th>点击次数</th>
 			<th>操作</th>
 		</tr>
 		<?php foreach($arr as $k => $v){?>
 			<tr>
 				<td><?php echo $k ?></td>
 				<td><?php echo $v['title'] ?></td>
 				<td><?php echo $v['click'] ?></td>
 				<td><a href="">编辑</a>|<a href="">删除</a></td>
 			</tr>
 		<?php } ?>
 		
 		
 		
 		
 		
 		
 		
 		
 		
 	</table>
 </body>
 </html>
