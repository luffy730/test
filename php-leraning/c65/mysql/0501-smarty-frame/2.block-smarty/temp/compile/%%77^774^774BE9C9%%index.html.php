<?php /* Smarty version 2.6.26, created on 2016-05-01 03:57:11
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'stu', 'index.html', 9, false),)), $this); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>Document</title>
</head>
<body>
	<table border="1" cellspacing="" cellpadding="">
		<?php $this->_tag_stack[] = array('stu', array('cid' => '3','row' => '2')); $_block_repeat=true;smarty_block_stu($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
			<tr>
				<td>[$f.sname]</td>
				<td>[$f.sex]</td>
			</tr>
		<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_stu($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		
		
		
	</table>
	
	
	
	
	
</body>
</html>