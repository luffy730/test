<?php 
//用户配置项
$userConfig = include "./UserConfig.php";
//框架配置项
$frameConfig = include "./FrameConfig.php";

//加载配置项*************
//加载框架配置项
C($frameConfig);
//加载用户配置项（优先级更高）
C($userConfig);

//获取指定的配置项
echo C('DB_NAME');

//获取最终配置项
echo '<pre>';
print_r(C());
echo '</pre>';



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



 ?>