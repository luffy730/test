<?php
function p($arr){
	echo '<pre>' . print_r($arr, true) . '</pre>';
}

/**
 * 递归无限级分类组合一维数组 
 * @return [type] [description]
 */
function level($cate, $html = '──────', $pid = 0, $lv = 0){
	$arr = array();
	foreach($cate as $v){
		if($v['pid'] == $pid){
			$v['html'] = str_repeat($html, $lv);
			$v['level'] = $lv + 1;
			$arr[] = $v;
			$arr = array_merge($arr, level($cate, $html, $v['cid'], $lv + 1));
		}
	}
	return $arr;
}

/**
 * 传递一个父级ID返回所有子级ID
 */
function get_childs_id($cate, $pid){
	$arr = array();
	foreach($cate as $v){
		if($v['pid'] == $pid){
			$arr[] = $v['cid'];
			$arr = array_merge($arr, get_childs_id($cate, $v['cid']));
		}
	}
	return $arr;
}