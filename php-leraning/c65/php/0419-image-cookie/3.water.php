<?php 
//水印制作过程**************************
header('Content-type:image/jpeg');
//源图（小图，水印图）*************
$srcImg = imagecreatefrompng('./logo.png');
//源图的宽高
$srcW = imagesx($srcImg);
$srcH = imagesy($srcImg);

//目标图（大图）***************
$dstImg = imagecreatefromjpeg('./11.jpg');
//目标图的宽高
$dstW = imagesx($dstImg) - 20;
$dstH = imagesy($dstImg) - 20;


//要贴到目标图的x,y坐标
$x = $dstW - $srcW;
$y = $dstH - $srcH;

//把小图粘贴到大图上（把logo放到大图上）
//imagecopy($dstImg, $srcImg, $x, $y, 0, 0, $srcW, $srcH);
//和上面的imagecopy参数基本是一样的最后多一个透明度的设置
imagecopymerge($dstImg, $srcImg, $x, $y, 0, 0, $srcW, $srcH,30);
//输出图像
imagejpeg($dstImg);

//销毁
imagedestroy($dstImg);
imagedestroy($srcImg);





 ?>