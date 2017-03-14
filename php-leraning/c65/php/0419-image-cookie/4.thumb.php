<?php 
//缩略图的制作过程**********************
header('Content-type:image/jpeg');
//目标图(画布)***************
$dstW = 400;
$dstH = 200;
$dstImg = imagecreatetruecolor($dstW, $dstH);

//源图(大图)*****************
$srcImg = imagecreatefromjpeg('./11.jpg');
$srcW = imagesx($srcImg);
$srcH = imagesy($srcImg);
//把大图贴到画布上去
imagecopyresized($dstImg, $srcImg, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);
//输出
imagejpeg($dstImg);
//销毁
imagedestroy($srcImg);
imagedestroy($dstImg);






 ?>