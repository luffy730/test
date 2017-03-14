<?php 
//1.发送头部
header('Content-type:image/png');
//2.创建画布(返回画布的资源)
$image = imagecreatetruecolor(500, 500);
//3.调色
$white = imagecolorallocate($image, 255, 255, 255);
//4.绘画
imagefill($image, 0, 0, $white);
//矩形**************
$red = imagecolorallocate($image, 255, 0, 0);
//空心的
imagerectangle($image, 0,0, 250, 250, $red);
//实心的
imagefilledrectangle($image, 250, 250, 500, 500, $red);
//圆***********
$green = imagecolorallocate($image, 0, 255, 0);
imageellipse($image, 250, 250, 200, 200, $green);
imagefilledellipse($image,250, 250, 100, 100, $green);
//线****************
$blue = imagecolorallocate($image, 0, 0, 255);
imageline($image, 500, 0, 0, 500, $blue);
//画10000随机颜色随机坐标的点**************
for ($i=0; $i < 100; $i++) {
	$color = imagecolorallocate($image, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255)); 
	imagesetpixel($image, mt_rand(0, 500), mt_rand(0, 500), $color);
}
//写字
$black = imagecolorallocate($image, 0, 0, 0);
//imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text)
imagettftext($image, 30, -30, 0, 30, $black, './font.ttf', 'A');

//5.输出图像
imagepng($image);
//6.释放图像资源
imagedestroy($image);

 ?>