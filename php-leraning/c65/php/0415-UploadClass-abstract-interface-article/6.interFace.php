<?php 
header('Content-type:text/html;charset=utf-8');
//接口作为了解********至少打一遍而且明白
interface DbInterface{
	//接口里面的方法必须被子类重写
	//连接
	public function connect();
	//查询
	public function query($sql);
}

class DbMysqli implements DbInterface{
	public function connect(){
		echo 'mysqli的方式连接';
	}
	
	public function query($sql){
		echo "{$sql}执行了";
	}
}
$db = new DbMysqli;
$db->query("select * from stu");







 ?>