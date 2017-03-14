<?php 
//作业1：完成图像处理类（包括缩略和水印）(明天提问思路)
class Image{
	/**
	 * 加盖水印
	 */
	public function water($pic,$logo){
		//源图（小图，水印图）*************
		//获得图像的类型
		$info = getimagesize($logo);
		$type = ltrim(strrchr($info['mime'], '/'),'/');
		//根据不同的图片类型调用不同函数
		$fn = "imagecreatefrom" . $type;
		$srcImg = $fn($logo);
		//源图的宽高
		$srcW = imagesx($srcImg);
		$srcH = imagesy($srcImg);
		
		//目标图（大图）***************
		//获得图像的类型
		$info = getimagesize($pic);
		$type = ltrim(strrchr($info['mime'], '/'),'/');
		//根据不同的图片类型调用不同函数
		$fn = "imagecreatefrom" . $type;
		$dstImg = $fn($pic);
		//目标图的宽高
		$dstW = imagesx($dstImg) - 20;
		$dstH = imagesy($dstImg) - 20;
		
		
		//要贴到目标图的x,y坐标
		$x = $dstW - $srcW;
		$y = $dstH - $srcH;
		
		//把小图粘贴到大图上（把logo放到大图上）
		//和上面的imagecopy参数基本是一样的最后多一个透明度的设置
		imagecopymerge($dstImg, $srcImg, $x, $y, 0, 0, $srcW, $srcH,30);
		//输出图像
		$fn = "image{$type}";
		//./a/b/11.jpg ./a/b/11_water.jpg
		$dstType = strrchr($pic, '.');
		$fullPath = str_replace($dstType, '_water' . $dstType, $pic);
		//保存
		$fn($dstImg,$fullPath);
		
		//销毁
		imagedestroy($dstImg);
		imagedestroy($srcImg);
		
	}
	
	/**
	 * 图像缩略
	 */
	public function thumb($pic,$dstW,$dstH){
		//目标图(画布)***************
		$dstImg = imagecreatetruecolor($dstW, $dstH);
		
		//源图(大图)*****************
		$info = getimagesize($pic);
		//获得源图的类型
		$type = ltrim(strrchr($info['mime'], '/'),'/');
		//组合变量函数
		$fn = "imagecreatefrom{$type}";
		$srcImg = $fn($pic);
		$srcW = imagesx($srcImg);
		$srcH = imagesy($srcImg);
		//把大图贴到画布上去
		imagecopyresized($dstImg, $srcImg, 0, 0, 0, 0, $dstW, $dstH, $srcW, $srcH);
		//保存
		$fn = "image{$type}";
		//完整路径 把.jpg 替换成 _thumb.jpg   
		$dstType = strrchr($pic, '.');
		//由./11.jpg  替换成  ./11_thumb.jpg
		$fullPath = str_replace($dstType, '_thumb' . $dstType, $pic);
		$fn($dstImg,$fullPath);
		//销毁
		imagedestroy($srcImg);
		imagedestroy($dstImg);
	}
}

$img = new Image;
//把logo.png盖到11.jpg上面
//$img->water('./11.jpg', './logo.png');
//把11.jpg缩小到200*100
$img->thumb('./11.jpg', 200, 100);










 ?>