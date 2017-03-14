<?php namespace Hdphp\Libs;
//总控制器，将来要放一些公共方法
class Controller extends SmartyView{
	protected function success($msg,$url){
		header('Content-type:text/html;charset=utf-8');
		$str = <<<str
<script>
alert('$msg');
location.href='{$url}';
</script>
str;
		echo $str;exit;
	}
	
}



 ?>