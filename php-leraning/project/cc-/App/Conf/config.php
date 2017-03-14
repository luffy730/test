<?php
defined('THINK_PATH') || die;
//共用配置项
return array(
	//'配置项'=>'配置值'
	
	//独立分组 配置项
	//开启独立分组
	'APP_GROUP_MODE' => 1,
	// 分组列表
	'APP_GROUP_LIST' => 'Index,Admin,Member',
	// 默认分组
	'DEFAULT_GROUP' => 'Index',
	// 分组目录名称
	'APP_GROUP_PATH' => 'Modules',

	// 数据库连接参数
	'DB_HOST' => '127.0.0.1',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_NAME' => 'project',
	'DB_PREFIX' => 'ccshop_',

	//扩展配置文件
	'LOAD_EXT_CONFIG' => '',

	'LOAD_EXT_FILE' => '',

	// URL伪静态后缀
	'URL_HTML_SUFFIX' => 'html',

	// URL生成模式为重写
	'URL_MODEL' => 2,

	// 点语法只解析数组
	'TMPL_VAR_IDENTIFY' => 'array',

	// session存储模式为数据库
	// 'SESSION_TYPE' => 'db',


	/********************************验证码********************************/
    "CODE_FONT"                     => APP_PATH . "Lib/Data/Font/font.ttf",       //字体
    "CODE_STR"                      => "1234567890abcdefghijklmnopqrstuvwxyz", //验证码种子
    "CODE_WIDTH"                    => 100,         //宽度
    "CODE_HEIGHT"                   => 30,          //高度
    "CODE_BG_COLOR"                 => "#CCE8CF",   //背景颜色
    "CODE_LEN"                      => 4,           //文字数量
    "CODE_FONT_SIZE"                => 16,          //字体大小
    "CODE_FONT_COLOR"               => "",          //字体颜色


    // 开启路由功能
	'URL_ROUTER_ON' => true,
	// 定义路由规则
	'URL_ROUTE_RULES' => array(
		// 'c/:id' => 'Index/List/index'
		// 列表页路由
		'/^c\/(\d+)((_\d+)+)/is' => 'Index/List/index?cid=:1&param=:2',
		// 商品展示页路由
		':gid\d' => 'Index/Show/index',

		)

	

);
?>