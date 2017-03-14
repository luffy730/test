<?php namespace Hdphp\Tool;
//导入全局空间的PDO类(注意)
use PDO;
class Model{
	private static $pdo = NULL;
	//构造方法实例化自动执行
	public function __construct(){
		//self::$pdo第一次是null
		//self::$pdo第二次就会保存数据库连接对象不是null了
		if(is_null(self::$pdo)){
			//连接数据库
			$dsn = 'mysql:host=127.0.0.1;dbname=c65';
			try {
				$pdo = new PDO($dsn,'root','');  
				//设置字符集
				$pdo->query("SET NAMES UTF8");
				//设置错误类型
				$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
				//把连接好的信息存入到静态属性中
				self::$pdo = $pdo;
			} catch (PDOException $e) {
				exit('<span style="color:red">' . $e->getMessage() . '</span>');
			}
		}
	}
	/**
	 * 执行有结果集的方法
	 */
	public function q($sql){
		try {
			//执行pdo的查询有结果集操作
		    $result = self::$pdo->query($sql);
			$data = $result->fetchAll(PDO::FETCH_ASSOC);
			//返回结果
			return $data;
		} catch (PDOException $e) {
			//有错误提示错误
			$this->errorMsg($sql,$e->getMessage());
		}
	}
	/**
	 * 执行没有结果集的方法
	 */
	public function e($sql){
		try {
			$num = self::$pdo->exec($sql);
			return $num;
		} catch (PDOException $e) {
			//有错误提示错误
		    $this->errorMsg($sql,$e->getMessage());
		}
	}
	
	
	private function errorMsg($sql,$error){
		echo 'SQL:<span style="color:red">' . $sql . '</span><br/>';
		echo '错误信息：<span style="color:red">' . $error . '</span>';
		exit;
	}
	
}











 ?>