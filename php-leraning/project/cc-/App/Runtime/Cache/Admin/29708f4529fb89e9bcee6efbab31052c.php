<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="__ROOT__/Public/Bootstrap/Css/bootstrap.min.css" />
</head>
<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span12">
				<table class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>
								属性ID
							</th>
							<th>
								属性名称
							</th>
							<th>
								属性类别
							</th>
							<th>
								属性值
							</th>
							<th>
								操作
							</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr class="success">
							<td>
								<?php echo ($v["taid"]); ?>
							</td>
							<td>
								<?php echo ($v["taname"]); ?>
							</td>
							<td>
								<?php if($v["class"] > 0): ?>规格<?php else: ?>属性<?php endif; ?>
							</td>
							<td>
								<?php echo ($v["tavalue"]); ?>
							</td>
							<td>
								<a href="<?php echo U('TypeAttr/edit');?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i>修改</a>
								<a href="<?php echo U('TypeAttr/del');?>" class="btn btn-danger"><i class="icon-trash icon-white"></i>删除</a>
							</td>
						</tr><?php endforeach; endif; ?>
						<tr>
							<td colspan='5' align='center'>
								<a href="<?php echo U('add', array('tid' => $_GET['tid']));?>"  class="btn btn-primary"><i class="icon-pencil icon-white"></i>添加属性</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>