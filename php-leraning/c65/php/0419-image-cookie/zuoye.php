<?php 
//作业1：完成图像处理类（包括缩略和水印）(明天提问思路)
class Image{
	/**
	 * 加盖水印
	 */
	public function water($pic,$logo){
		
		
	}
	
	/**
	 * 图像缩略
	 */
	public function thumb($pic,$width,$height){
		
	}
}

$img = new Image;
//把logo.png盖到11.jpg上面
$img->water('./11.jpg', './logo.png');
//把11.jpg缩小到200*100
$img->thumb('./11.jpg', 200, 100);

//作业2：复习cookie（明天提问cookie）
//首先要明白为什么要用cookie
//然后明白cookie的每一个参数










 ?>