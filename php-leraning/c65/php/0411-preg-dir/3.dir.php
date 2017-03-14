<?php 
include '../function.php';
//输出硬盘分区总大小 B->KB->MB->GB
//$totalSize = disk_total_space('.');
//echo $totalSize / pow(1024, 3);

//剩余空间大小
//$totalSize = disk_free_space('.');
//echo $totalSize / pow(1024, 3);


////通过不同大小换算不同单位
//$size = 1025;
////$size = disk_total_space('.');
//switch (true) {
//	case $size > pow(1024, 3):
//		$unit = array(3,'G');
//		break;
//	case $size > pow(1024, 2):
//		$unit = array(2,'M');
//		break;
//	case $size > pow(1024, 1):
//		$unit = array(1,'K');
//		break;
//	default:
//		$unit = array(0,'B');
//		break;
//}
//$result = $size / pow(1024, $unit[0]) . $unit[1];
//echo $result;


////获得目录的最后一部分
//$path = './wamp/www/1.jpg';
//$path = './wamp/www';
//echo basename($path);


//返回除了最后一部分的路径
//$path = './wamp/www/1.jpg';
//$path = './wamp/www';
//echo dirname($path);



////判断文件是否存在
//$bool = file_exists('../function.php');
//var_dump($bool);

//判断一个目录是否存在
//$bool = is_dir('../0409');
//var_dump($bool);

//如果a/b目录不存在
//if(!is_dir('./a/b')){
//	//创建目录，0777最高权限，true递归创建
//	mkdir('./a/b',0777,true);
//}



////如果目录存在
//if(is_dir('./c')){
//	//删除目录
//	rmdir('./c');
//}


////只能删除为空的目录
//rmdir('./a');


//扫描一个目录下面的所有的文件和文件夹
//$arr = glob('../0409/*');
//p($arr);

//删除文件
//unlink('./test.html');



















































































 ?>