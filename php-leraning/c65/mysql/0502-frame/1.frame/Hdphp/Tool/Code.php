<?php namespace Hdphp\Tool;
//验证码类
class Code{
	//验证码宽度
	private $width;
	//验证码高度
	private $height;
	//背景颜色
	private $bgColor;
	//图像资源
	private $img;
	//文字大小
	private $size;
	//验证码长度
	private $len;
	//验证码种子
	private $seed = 'QWERTYUIOPASDFGHJKLZXCVBNM1234567890';
	//验证码字体文件
	private $fontFile = './Hdphp/Tool/font.ttf';
	
	public function __construct($width=200,$height=80,$bgColor='#ffffff',$size=20,$len=4){
		$this->width = $width;
		$this->height = $height;
		$this->bgColor = $bgColor;
		$this->size = $size;
		$this->len = $len;
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
//		//5.输出
		imagepng($this->img);
//		//6.销毁
		imagedestroy($this->img);
		
	}
	
	/**
	 * 创建干扰
	 */
	private function makeTrouble(){
		for ($i=0; $i < 5; $i++) {
			$color = imagecolorallocate($this->img, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200)); 
			imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $color);
		}
	}
	
	/**
	 * 写字
	 */
	private function write(){
		$font = '';
		for ($i=0; $i < $this->len; $i++) {
			//XY坐标
			$x = $this->width / $this->len * $i + 10; 
			$y = ($this->height + $this->size) / 2;
			//颜色
			$color = imagecolorallocate($this->img, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
			//随机的文字
			$text = $this->seed[mt_rand(0, strlen($this->seed)-1)];
			$font .= $text;
			imagettftext($this->img, $this->size, mt_rand(-45, 45), $x, $y, $color, $this->fontFile, $text);
		}
		//把验证码的文字存入到session到时候就方便比对了
		$_SESSION['code'] = strtolower($font);

	}
	
	
	/**
	 * 创建背景
	 */
	private function createBg(){
		//创建画布
		$img = imagecreatetruecolor($this->width, $this->height);
		//把16进制#ffffff转换成10进制的数字
		$bgColor = hexdec($this->bgColor);
		//填充的颜色需要用10进制的数字
		imagefill($img, 0, 0, $bgColor);
		//赋值给属性这样各个方法可以共用
		$this->img = $img;
		
	}
	
	
	
	
}








 ?>