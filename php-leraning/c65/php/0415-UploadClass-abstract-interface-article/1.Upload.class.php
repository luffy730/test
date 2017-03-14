<?php 
include "../function.php";
class Upload{
	//保存错误信息
	public $error = array();
	//上传目录
	private $path;
	//允许类型
	private $typeArr;
	
	//构造方法
	public function __construct($pathDir='./Upload/',$typeArr = array('jpeg','gif','png')){
		//上传目录
		$this->path = $pathDir;
		//允许类型
		$this->typeArr = $typeArr;
	}
	
	
	//上传
	public function up(){
		//1.重组数组
		$arr = $this->resetArr();
		//2.循环数组
		foreach ($arr as $v) {
			//3.过滤,如果不符合条件则return false不走下面
			if(!$this->filter($v)){
				return false;
			}
		}
		$fullPathArr = array();
		//如果走到下面证明都允许
		foreach ($arr as $v) {
			//4.上传
			$fullPathArr[] = $this->upFiles($v);
		}
		//返回上传的路径（也就是返回true）
		return $fullPathArr;
	}
	//上传文件
	private function upFiles($v){
		//处理上传目录
		$path = $this->path;
		$path = rtrim($path, '/') . '/';
		is_dir($path) || mkdir($path,0777,true);
		//获得类型
		$type = ltrim(strrchr($v['type'], '/'), '/');
		//文件名
		$fileName = time() . mt_rand(0, 9999) . '.' . $type;
		//完整路径
		$fullPath = $path . $fileName;
		//移动上传
		move_uploaded_file($v['tmp_name'], $fullPath);
		//返回完整路径
		return $fullPath;
	}
	
	
	//过滤（需要返回true和false）
	private function filter($v){
		//获得上传文件的类型
		$type = ltrim(strrchr($v['type'], '/'),'/');
		switch (true) {
			//1.是否是合法的上传文件
			case !is_uploaded_file($v['tmp_name']):
				$this->error[] = '不是一个合法的上传文件';
				return false;
			//2.判断类型是否允许
			case !in_array($type, $this->typeArr):
				$this->error[] = '上传类型不允许';
				return false;
			//3.判断大小是否允许
			case $v['size'] > 2000000:
				$this->error[] = '上传大小不允许';
				return false;
			//4.error的4种错误
			case $v['error'] == 1:
				$this->error[] = '大小超过了 php.ini 中 upload_max_filesize 限制值';
				return false;
			default:
				return true;
		}
		
	}
	
	//重组数组
	public function resetArr(){
		$arr = array();
		foreach ($_FILES as $v) {
			//如果$v['name']是数组，证明多文件上传通过foreach来实现
			if(is_array($v['name'])){
				foreach ($v['name'] as $key => $name) {
					$arr[] = array(
						'name' => $name,
						'type' => $v['type'][$key],
						'tmp_name' => $v['tmp_name'][$key],
						'error' => $v['error'][$key],
						'size' => $v['size'][$key],
					);
				}
			}else{//单文件上传
				$arr[] = $v;
			}
		}
		return $arr;
	}
}


$pathArr = array();
//如果用户点击了上传
if(IS_POST){
	//实例化上传类
	$obj = new Upload('./up',array('zip'));
	//执行上传
	$pathArr = $obj->up();
	//如果上传失败
	if(!$pathArr){
		success($obj->error[0],'./1.Upload.class.php');
	}
}





 ?>
 <!doctype html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8" />
 	<title>Document</title>
 </head>
 <body>
 	<?php foreach($pathArr as $v): ?>
 		<img src="<?php echo $v ?>"/>
 	<?php endforeach ?>
 	<hr />
 	<form action="" method="post" enctype="multipart/form-data">
 		文件1：
 		<input type="file" name="up[]" id="" />
 		文件2：
 		<input type="file" name="up[]" id="" />
 		<input type="submit" value="上传"/>
 	</form>
 </body>
 </html>








