<?php
defined('APP_NAME') or die;
return array(
	//'配置项'=>'配置值'
	//自定义模板替换字符串
	'TMPL_PARSE_STRING' => array(
		'__PUBLIC__' => __ROOT__ . '/' . APP_NAME . '/Modules/' . GROUP_NAME . '/Tpl/Public',
		'__UPLOAD__' => __ROOT__ . '/Uploads',
        '__UPLOADIFY__' => __ROOT__ . '/Public/Uploadify',

	/**********************************验证码******************************************/
    "CODE_FONT"                     => APP_PATH . "Lib/Data/Font/font.ttf",       //字体
    "CODE_STR"                      => "1234567890abcdefghijklmnopqrstuvwxyz", //验证码种子
    "CODE_WIDTH"                    => 72,         //宽度
    "CODE_HEIGHT"                   => 30,          //高度
    "CODE_BG_COLOR"                 => "#CCE8CF",   //背景颜色
    "CODE_LEN"                      => 4,           //文字数量
    "CODE_FONT_SIZE"                => 16,          //字体大小
    "CODE_FONT_COLOR"               => "",          //字体颜色


    // 关闭伪静态后缀名
    'URL_HTML_SUFFIX' => '',



	),
);
?>