<?php 
//头部
header('Content-type:image/png');
//1.创建画布
$w = 200;
$h = 80;
$img = imagecreatetruecolor($w, $h);
//2.调色
$white = imagecolorallocate($img, 255, 255, 255);
//3.填充画布
imagefill($img, 0, 0, $white);
//4.写字
//验证码长度
$len = 4;
//验证码种子
$seed = 'QWERYUIOASDFJKZXCVBM1234567890';
for ($i=0; $i < $len; $i++) {
	//每一位验证码的x坐标
	$x = ($w / $len) * $i + 10; 
	//每一位验证码的y坐标
	$y = ($h + 30) / 2;
	//随机取得一个字符
	$text = $seed[mt_rand(0, strlen($seed) - 1)];
	//字体颜色
	$color = imagecolorallocate($img, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
	//写字
	imagettftext($img, 30, 0, $x, $y, $color, './font.ttf', $text);
}
//制造干扰
//线
for ($i=0; $i < 10; $i++) {
	$color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255)); 
	imageline($img, mt_rand(0, $w), mt_rand(0, $h), mt_rand(0, $w), mt_rand(0, $h), $color);
}
//圆
for ($i=0; $i < 10; $i++) {
	$wh = mt_rand(0, 30); 
	$color = imagecolorallocate($img, mt_rand(0, 255), mt_rand(0, 255), mt_rand(0, 255)); 
	imageellipse($img, mt_rand(0, $w), mt_rand(0, $h), $wh, $wh, $color);
}

//5.输出图像
imagepng($img);
//6.销毁资源
imagedestroy($img);








 ?>