<?php 
function nocache($params, $content, &$smarty) {
    return $content;
}
function C($var=NULL){
	//第一次默认是空数组，后面就可以把配置项保存起来
	static $config = array();
	//如果是加载配置项的时候
	if(is_array($var)){
		//1.第一次框架配置项和空数组合并完成之后把框架的配置项保存到静态变量里去
		//2.第二次是用户配置项和框架配置项合并完成之后把结果保存到静态变量里去
		$config = array_merge($config,$var);
	}
	//如果要获得指定的配置项
	if(is_string($var)){
		//return $config['CODE_LEN'];
		return $config[$var];
	}
	//如果没有传参数，那么返回全部最终配置项
	if(is_null($var)){
		return $config;
	}
}
function halt($msg){
	header('Content-type:text/html;charset=utf-8');
	echo $msg;exit;
}

function M(){
	$model = new \Hdphp\Tool\Model;
	return $model;
}
/**
 * 打印函数
 */
function p($arr){
	echo '<pre style="border:1px solid grey;padding:10px;border-radius:5px;background:#ccc">';
	print_r($arr);
	echo '</pre>';
}









 ?>