<?php 
//验证码类
class Code{
	//验证码宽度
	private $width;
	//验证码高度
	private $height;
	
	public function __construct($width=200,$height=80){
		$this->width = $width;
		$this->height = $height;
	}
	
	
	/**
	 * 显示验证码
	 */
	public function show(){
		//1.发送头部
		header('Content-type:image/png');
		//2.创建并填充画布
		$this->createBg();
		//3.写字
		$this->write();
		//4.干扰
		$this->makeTrouble();
		//5.输出
		imagepng(资源)
		//6.销毁
		imagedestroy(资源);
		
	}
	
	/**
	 * 创建干扰
	 */
	private function makeTrouble(){
		
	}
	
	/**
	 * 写字
	 */
	private function write(){
		imagettftext($image, $size, $angle, $x, $y, $color, $fontfile, $text)
	}
	
	
	/**
	 * 创建背景
	 */
	private function createBg(){
		//创建画布
		$img = imagecreatetruecolor($this->width, $this->height);
		//填充
		
	}
	
	
	
	
}

$code = new Code();
$code->show();








 ?>