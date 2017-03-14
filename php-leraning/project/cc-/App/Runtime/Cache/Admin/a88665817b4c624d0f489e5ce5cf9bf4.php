<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="__ROOT__/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
</head>
<body>
	<div class="container-fluid">
	<div class="row-fluid">
	<div class="span12">

	<form action="<?php echo U('Common/sort');?>" method='post'>
		<table class="table table-bordered table-hover">
			<thead>	
				<tr>
					<th>品牌ID</th>
					<th>品牌名称</th>
					<th>LOGO</th>
					<th>排序</th>
					<th>是否热门</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($brand)): foreach($brand as $key=>$v): ?><tr class="info">
						<td><?php echo ($v["bid"]); ?></td>
						<td><?php echo ($v["bname"]); ?></td>
						<td>
							<img src="__UPLOAD__/Logo/<?php echo ($v["logo"]); ?>" alt="" />
						</td>
						<td>
							<input type="text" name='<?php echo ($v["bid"]); ?>' value='<?php echo ($v["sort"]); ?>'/>
						</td>
						<td>
							<?php if($v["ishot"]): ?>是<?php endif; ?>
						</td>
						<td>
							<a href="" class="btn btn-warning"><i class="icon-pencil icon-white"></i>修改</a>
							<a href="" class="btn btn-danger"><i class="icon-trash icon-white"></i>删除</a>
						</td>
					</tr><?php endforeach; endif; ?>
				<tr>
					<td colspan='6' align='center'>
						<input type="hidden" name='table' value='brand'/>
						<input type="submit" value='排序' class="btn btn-success" />
					</td>
				</tr>
				</tbody>
		</table>
	</form>
	
	</div>
	</div>
	</div>
</body>
</html>