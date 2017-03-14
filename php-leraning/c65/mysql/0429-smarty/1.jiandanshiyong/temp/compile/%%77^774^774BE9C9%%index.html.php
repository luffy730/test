<?php /* Smarty version 2.6.26, created on 2016-04-29 11:19:43
         compiled from index.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'index.html', 20, false),array('modifier', 'default', 'index.html', 26, false),array('modifier', 'lower', 'index.html', 31, false),array('modifier', 'upper', 'index.html', 31, false),array('modifier', 'truncate', 'index.html', 34, false),array('modifier', 'truncate_c', 'index.html', 97, false),array('function', 'js', 'index.html', 99, false),)), $this); ?>
<!DOCTYPE html>
<html>
	<head>
		<!--载入公共的头部-->
		<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => './header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
		<hr />
				<hr />
		<?php echo $this->_tpl_vars['d']['webname']; ?>

		<hr />
		<?php echo $this->_tpl_vars['a']['web']['age']; ?>

		<hr />
		<!--获得get参数-->
		<?php echo $_GET['page']; ?>

		<hr />
		<!--获得常量WWW-->
		<?php echo @WWW; ?>

		<hr />
		<!--获得当前时间-->
		<?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, "%y-%m-%d %H:%M") : smarty_modifier_date_format($_tmp, "%y-%m-%d %H:%M")); ?>

		<hr />
		<table border="1" cellspacing="" cellpadding="">
			<!--foreach循环-->
			<?php $_from = $this->_tpl_vars['arcData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<!--设置默认值-->
				<tr><td><?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, '我是默认值：后盾网www.houdunwang.com') : smarty_modifier_default($_tmp, '我是默认值：后盾网www.houdunwang.com')); ?>
</td></tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		<hr />
		<!--将字符串转为小写-->
		<?php echo ((is_array($_tmp=((is_array($_tmp='ABC')) ? $this->_run_mod_handler('lower', true, $_tmp) : smarty_modifier_lower($_tmp)))) ? $this->_run_mod_handler('upper', true, $_tmp) : smarty_modifier_upper($_tmp)); ?>

		<hr />
		<!--截取字符串-->
		<?php echo ((is_array($_tmp='中国人要写好中国字')) ? $this->_run_mod_handler('truncate', true, $_tmp, 6) : smarty_modifier_truncate($_tmp, 6)); ?>

		<hr />
		<!--用literal包裹的部分不解析-->
		<?php echo '
			手册说明：调用变量：{{$b}}
		'; ?>

		<hr />
		<!--if的使用-->
		<?php if ($this->_tpl_vars['a']['web']['name'] == '后盾网' && $this->_tpl_vars['a']['web']['age'] == '30'): ?>
			这就是后盾网
		<?php else: ?>
			这不是后盾网
		<?php endif; ?>
		<hr />
		<!--foreach循环-->
		<table border="1" cellspacing="" cellpadding="">
			<?php $_from = $this->_tpl_vars['arcData']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<tr>
					<td>$k的值是：<?php echo $this->_tpl_vars['k']; ?>
</td>
					<td>标题是：<?php echo ((is_array($_tmp=@$this->_tpl_vars['v']['title'])) ? $this->_run_mod_handler('default', true, $_tmp, '我是默认值') : smarty_modifier_default($_tmp, '我是默认值')); ?>
</td>
				</tr>
			<?php endforeach; endif; unset($_from); ?>
		</table>
		<hr />
		<!--section复杂的循环-->
		<table border="1">
			<!--简单写法-->
			<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['arcData']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
				<tr><td><?php echo $this->_tpl_vars['arcData'][$this->_sections['n']['index']]['title']; ?>
</td></tr>
			<?php endfor; endif; ?>
		</table>
		<hr />
		<table border="1">
			<!--复杂写法-->
			<!--
			loop是循环谁
			name就是loop后面数组的下标
			start从哪里开始
			max截取多少条
			step跳步
			-->
			<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['arcData']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['start'] = (int)1;
$this->_sections['n']['max'] = (int)5;
$this->_sections['n']['step'] = ((int)2) == 0 ? 1 : (int)2;
$this->_sections['n']['show'] = true;
if ($this->_sections['n']['max'] < 0)
    $this->_sections['n']['max'] = $this->_sections['n']['loop'];
if ($this->_sections['n']['start'] < 0)
    $this->_sections['n']['start'] = max($this->_sections['n']['step'] > 0 ? 0 : -1, $this->_sections['n']['loop'] + $this->_sections['n']['start']);
else
    $this->_sections['n']['start'] = min($this->_sections['n']['start'], $this->_sections['n']['step'] > 0 ? $this->_sections['n']['loop'] : $this->_sections['n']['loop']-1);
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = min(ceil(($this->_sections['n']['step'] > 0 ? $this->_sections['n']['loop'] - $this->_sections['n']['start'] : $this->_sections['n']['start']+1)/abs($this->_sections['n']['step'])), $this->_sections['n']['max']);
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
				<tr><td><?php echo $this->_tpl_vars['arcData'][$this->_sections['n']['index']]['title']; ?>
</td></tr>
			<?php endfor; endif; ?>
		</table>
		<hr />
		<table border="1" >
			<?php unset($this->_sections['n']);
$this->_sections['n']['loop'] = is_array($_loop=$this->_tpl_vars['arcData']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['n']['name'] = 'n';
$this->_sections['n']['show'] = true;
$this->_sections['n']['max'] = $this->_sections['n']['loop'];
$this->_sections['n']['step'] = 1;
$this->_sections['n']['start'] = $this->_sections['n']['step'] > 0 ? 0 : $this->_sections['n']['loop']-1;
if ($this->_sections['n']['show']) {
    $this->_sections['n']['total'] = $this->_sections['n']['loop'];
    if ($this->_sections['n']['total'] == 0)
        $this->_sections['n']['show'] = false;
} else
    $this->_sections['n']['total'] = 0;
if ($this->_sections['n']['show']):

            for ($this->_sections['n']['index'] = $this->_sections['n']['start'], $this->_sections['n']['iteration'] = 1;
                 $this->_sections['n']['iteration'] <= $this->_sections['n']['total'];
                 $this->_sections['n']['index'] += $this->_sections['n']['step'], $this->_sections['n']['iteration']++):
$this->_sections['n']['rownum'] = $this->_sections['n']['iteration'];
$this->_sections['n']['index_prev'] = $this->_sections['n']['index'] - $this->_sections['n']['step'];
$this->_sections['n']['index_next'] = $this->_sections['n']['index'] + $this->_sections['n']['step'];
$this->_sections['n']['first']      = ($this->_sections['n']['iteration'] == 1);
$this->_sections['n']['last']       = ($this->_sections['n']['iteration'] == $this->_sections['n']['total']);
?>
				<!--如果是第一条的话就变成红色-->
				<?php if ($this->_sections['n']['first']): ?>
					<tr style="color:red"><td><?php echo $this->_tpl_vars['arcData'][$this->_sections['n']['index']]['title']; ?>
</td></tr>
				<?php else: ?>
					<!--如果是第234条变为绿色-->
					<?php if ($this->_sections['n']['index'] >= 1 && $this->_sections['n']['index'] <= 3): ?>
						<tr style="color: green;"><td><?php echo $this->_tpl_vars['arcData'][$this->_sections['n']['index']]['title']; ?>
</td></tr>
					<?php else: ?>
						<tr><td><?php echo $this->_tpl_vars['arcData'][$this->_sections['n']['index']]['title']; ?>
</td></tr>
					<?php endif; ?>
				<?php endif; ?>
			<?php endfor; endif; ?>
		</table>
		<hr />
		<!--测试自定义好的变量调节器-->
		<?php echo ((is_array($_tmp='汉字是中国字')) ? $this->_run_mod_handler('truncate_c', true, $_tmp, 5) : smarty_modifier_truncate_c($_tmp, 5)); ?>

		<hr />
		<?php echo smarty_function_js(array('file' => "./index.js"), $this);?>

		

		
	</body>
</html>




