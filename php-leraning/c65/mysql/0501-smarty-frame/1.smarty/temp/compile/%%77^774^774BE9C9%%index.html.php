<?php /* Smarty version 2.6.26, created on 2016-05-01 08:40:56
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'css', 'index.html', 6, false),array('modifier', 'color', 'index.html', 11, false),)), $this); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<?php echo smarty_function_css(array('file' => './index.css'), $this);?>


	</head>
	<body>
		<hr />
		<?php echo ((is_array($_tmp='中国人中国字')) ? $this->_run_mod_handler('color', true, $_tmp, 'green') : smarty_modifier_color($_tmp, 'green')); ?>

		<hr />
		<table border="1" >
			<tr>
				<td>sid</td>
				<td>姓名</td>
				<td>性别</td>
				<td>操作</td>
			</tr>
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
			<tr>
				<td><?php echo $this->_tpl_vars['v']['sid']; ?>
</td>
				<td><?php echo $this->_tpl_vars['v']['sname']; ?>
</td>
				<td><?php echo $this->_tpl_vars['v']['sex']; ?>
</td>
				<td><a href="./del.php?id=<?php echo $this->_tpl_vars['v']['sid']; ?>
">删除</a></td>
			</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	</body>
</html>