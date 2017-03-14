<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__ROOT__/Public/Bootstrap/Css/bootstrap.min.css" />
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
	<script type="text/javascript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
	<style type="text/css">
		body{
			margin-bottom: 100px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
	<div class="row-fluid">
	<div class="span12">

	<?php if($is_show): ?><form action="<?php echo U('add');?>" method='post'><?php endif; ?>
		<table class='table table-bordered table-hover'>
			<tr>
				<th>货品ID</th>

				<?php if(is_array($spec)): foreach($spec as $key=>$v): ?><th><?php echo ($v["taname"]); ?></th><?php endforeach; endif; ?>

				<th>库存</th>
				<th>货号</th>
				<th>操作</th>
			</tr>

			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr class="info">
					<td><?php echo ($v["glid"]); ?></td>
					<?php if(is_array($v["spec"])): foreach($v["spec"] as $key=>$s): ?><td><?php echo ($s); ?></td><?php endforeach; endif; ?>
					<td><?php echo ($v["inventory"]); ?></td>
					<td><?php echo ($v["number"]); ?></td>
					<td>
						<a href="<?php echo U('edit', array('glid' => $v['glid']));?>" class="btn btn-warning"><i class="icon-pencil icon-white"></i>修改</a>
						<a href="<?php echo U('del', array('glid' => $v['glid']));?>" class="btn btn-danger"><i class="icon-trash icon-white"></i>删除</a>
					</td>
				</tr><?php endforeach; endif; ?>

			<!-- 如果已添加数目小于可能情况数目，才出现添加货品的输入框 -->
			<?php if($is_show): ?><tr class="info">
				<td>添加货品</td>
		
				<?php if(is_array($spec)): foreach($spec as $key=>$v): ?><td>
						<select name="spec[]">
							<option value="0">-请选择-</option>
							<?php if(is_array($v["opt"])): foreach($v["opt"] as $key=>$s): ?><option value="<?php echo ($s["gtid"]); ?>"><?php echo ($s["gtvalue"]); ?></option><?php endforeach; endif; ?>
						</select>
					</td><?php endforeach; endif; ?>


				<td>
					<input type="text" name='inventory'/>
				</td>
				<td>
					<input type="text" name='number' value="" />
				</td>
				<td></td>
			</tr><?php endif; ?>
		</table>

	<?php if($is_show): ?><input type="hidden" name='gid' value='<?php echo ($_GET['gid']); ?>'/>
		<input type="hidden" name='tid' value='<?php echo ($_GET['tid']); ?>'/>
		<input type="submit" value='保存添加' class="btn btn-primary"/>
	</form><?php endif; ?>

	</div>
	</div>
	</div>


<script type="text/javascript">
	var sel = $('select[name="spec[]"]');
	var len = sel.length;
	sel.change(function () {
		var remote = {
			'gid' : <?php echo ($_GET['gid']); ?>,
			'spec' : {}
		};
		for (var i = 0; i < len; ++i)
		{
			if (sel.eq(i).val() == 0)
			{
				return;
			}
			else
			{
				remote.spec[i] = sel.eq(i).val();
			}
		}
		$.ajax({
			url : '<?php echo U("check");?>',
			type : 'get',
			data : remote,
			dataType : 'json',
			success : function(data)
			{
				if (data == 0)
				{
					alert('货品已存在，如果要修改库存，请点击修改');
					for (var i = 0; i < len; ++i)
					{
						sel.eq(i).val(0);
					}
				}
			}
		});
	});
</script>
</body>
</html>