<?php 
$file=$_GET['file'];
//二进制文件
header("Content-type:application/octet-stream");
//获得文件名
$fileName = basename($file);
//下载窗口中显示的文件名
header("Content-Disposition:attachment;filename={$fileName}");
//文件尺寸单位
header("Accept-ranges:bytes");
//文件大小
header("Accept-length:".filesize($file));
//读出文件内容
readfile($file);


 ?>