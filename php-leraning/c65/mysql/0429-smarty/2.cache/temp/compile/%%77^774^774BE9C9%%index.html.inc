<?php /* Smarty version 2.6.26, created on 2016-04-29 12:13:05
         compiled from index.html */

$this->_cache_serials['temp/compile/%%77^774^774BE9C9%%index.html.inc'] = '7945ee4d7761dcf69f1e5a9e79de23f3';

?><?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'nocache', 'index.html', 10, false),)), $this); ?>
<?php
function _smarty_tplfunc_7945ee4d7761dcf69f1e5a9e79de23f3_0(&$_smarty)
{
$_smarty->_tag_stack[] = array('nocache', array()); $_block_repeat=true;nocache($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], null, $_smarty, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
		<div>
			<!--如果session里面的uname存在就算登陆-->
			<?php if ($_SESSION['uname']): ?>
				欢迎 <?php echo $_SESSION['uname']; ?>
 回来 <a href="./out.php">退出</a>
			<?php else: ?>
				<a href="./login.php">登陆</a>
			<?php endif; ?>
		</div>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo nocache($_smarty->_tag_stack[count($_smarty->_tag_stack)-1][1], $_block_content, $_smarty, $_block_repeat); }  array_pop($_smarty->_tag_stack); 
}



?>
