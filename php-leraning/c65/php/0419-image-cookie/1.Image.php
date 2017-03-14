<?php 
//1.发送头部
header('Content-type:image/png');
//2.创建画布(返回画布的资源)
$image = imagecreatetruecolor(500, 500);
//3.调色
$black = imagecolorallocate($image, 0, 0, 0);
//4.绘画
imagefill($image, 0, 0, $black);
//5.输出图像（第二个参数可以保存图片，同名会覆盖）
imagepng($image,'./black.png');
//6.释放图像资源
imagedestroy($image);



 ?>