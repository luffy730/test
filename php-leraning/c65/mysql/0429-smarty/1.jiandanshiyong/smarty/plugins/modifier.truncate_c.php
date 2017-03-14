<?php
/**
 * @author [马震宇] <[<houdunwangmzy@163.com>]>
 * [smarty_modifier_truncate_c 截取汉字函数]
 * @param  [string] $string [传入的字符串]
 * @param  [int] $len        [截取的长度]
 * @return [string]         [返回的处理过的字符串]
 */
function smarty_modifier_truncate_c($string,$len,$etc='...')
{
	$str = mb_substr($string, 0,$len,'UTF-8');
	//如果文字的长度大于截取的长度
	//例子：文字是10个，截取5个
	if(mb_strlen($string,'utf-8') > $len){
		return $str . $etc;
	}
    return $str;
}








?>
