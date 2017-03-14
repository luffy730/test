<?php /* Smarty version 2.6.26, created on 2016-05-02 10:38:53
         compiled from index.html */ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<?php echo time(); ?>

		<hr />
		<table border="1" cellspacing="" cellpadding="">
			<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
			<tr><td><?php echo $this->_tpl_vars['v']['sname']; ?>
</td></tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
	</body>
</html>