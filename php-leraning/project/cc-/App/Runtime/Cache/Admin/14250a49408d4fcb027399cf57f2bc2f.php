<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
	<title></title>
	<link rel="stylesheet" href="__ROOT__/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
</head>
<body>
	<form action="" method='post'>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<fieldset>
					<legend>添加商品分类</legend> 
					<table class="table table-bordered table-hover">
						<?php if($type): ?><tr class="info">
								<td>所属类型</td>
								<td>
									<select name="tid" >
										<option value="0">请选择</option>
										<?php if(is_array($type)): foreach($type as $key=>$v): ?><option value="<?php echo ($v["tid"]); ?>"><?php echo ($v["tname"]); ?></option><?php endforeach; endif; ?>
									</select>
								</td>
							</tr><?php endif; ?>
						<tr class="info">
							<td>分类名称</td>
							<td>
								<input type="text" name='cname'/>
							</td>
						</tr>
						<tr>
							<td colspan="2" align="center">
								<input type="hidden" name='pid' value='<?php echo ($pid); ?>'/>
								<input type="submit" value="添加分类" class="btn btn-primary" />
							</td>
						</tr>
					</table>
					</fieldset>
				</div>
			</div>
		</div>
	</form>
</body>
</html>