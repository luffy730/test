<?php 
//为了将来可以使用p函数还有头部
include './function.php';
$arr = array(
	array(
		'title' => '今天天气好晴朗',
		'click' => 100
	),
	array(
		'title' => '处处好风光',
		'click' => 300
	),
	array(
		'title' => '那次是我不经意的离开',
		'click' => 300
	),
);
//找到“今天天气好晴朗”
//p($arr[0]['title']);

//先打印整体数组看一下
//p($arr);
foreach ($arr as $k => $v) {
	//打印键名
	//p($k);
	//打印键值
	//p($v);
	//打印每个$v里面的title
	p($v['title']);
}



 ?>







