<?php /* Smarty version 2.6.26, created on 2016-05-04 11:15:52
         compiled from index.html */ ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="Public/bts/css/bootstrap.min.css"/>
	<style type="text/css">
		.box{
			margin: 20px auto;
			width: 680px;
		}
	</style>
</head>
<body>
	<div class="box">
		<div class="alert alert-success" role="alert">班级管理</div>
		<table class="table table-hover">
	  		<tr>
	  			<th width="80">班级ID</th>
	  			<th>名称</th>
	  			<th width="230">操作</th>
	  		</tr>
	  		<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
	  		<tr>
	  			<td><?php echo $this->_tpl_vars['v']['cid']; ?>
</td>
	  			<td><?php echo $this->_tpl_vars['v']['cname']; ?>
期</td>
	  			<td>
	  				<a href="index.php?c=Stu&a=add&id=<?php echo $this->_tpl_vars['v']['cid']; ?>
" class="btn btn-info btn-sm">添加学生</a>
	  				<a href="index.php?a=edit&id=<?php echo $this->_tpl_vars['v']['cid']; ?>
" class="btn btn-primary btn-sm">编辑</a>
	  				<a href="javascript:if(confirm('确定删除吗？')) location.href='./index.php?a=del&id=<?php echo $this->_tpl_vars['v']['cid']; ?>
';" class="btn btn-danger btn-sm">删除</a>
	  			</td>
	  		</tr>
	  		<?php endforeach; endif; unset($_from); ?>
	  		
		</table>
		<a href="index.php?a=add" class="btn btn-success btn-block">添加班级</a>
		<a href="" class="btn btn-primary btn-block">显示全部学生</a>
	</div>
	
	
	
	
	
	
	
	
</body>
</html>