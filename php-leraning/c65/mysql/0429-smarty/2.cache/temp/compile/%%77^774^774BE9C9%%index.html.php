<?php /* Smarty version 2.6.26, created on 2016-04-29 12:13:05
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'nocache', 'index.html', 10, false),)), $this); ?>
<?php $this->_cache_serials['temp/compile/%%77^774^774BE9C9%%index.html.inc'] = '7945ee4d7761dcf69f1e5a9e79de23f3'; ?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<hr />
		<!--用nocache包裹的块会不缓存-->
		<?php if ($this->caching && !$this->_cache_including): echo '{nocache:7945ee4d7761dcf69f1e5a9e79de23f3#0}'; endif;$this->_tag_stack[] = array('nocache', array()); $_block_repeat=true;nocache($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		<div>
			<!--如果session里面的uname存在就算登陆-->
			<?php if ($_SESSION['uname']): ?>
				欢迎 <?php echo $_SESSION['uname']; ?>
 回来 <a href="./out.php">退出</a>
			<?php else: ?>
				<a href="./login.php">登陆</a>
			<?php endif; ?>
		</div>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo nocache($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); if ($this->caching && !$this->_cache_including): echo '{/nocache:7945ee4d7761dcf69f1e5a9e79de23f3#0}'; endif;?>
		<hr />
		<p>第<?php echo $_GET['p']; ?>
页</p>
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