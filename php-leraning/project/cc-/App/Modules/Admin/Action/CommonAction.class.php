<?php
// 公共控制器类，除了LoginAction，每个控制器都继承这个控制器，
// 主要完成验证是否登录等功能，没有登录就跳转到登录控制器
class CommonAction extends Action{
	public function _initialize(){
		//解决某些浏览器Uploadify上传时丢失SESSION问题
		// if(isset($_POST[session_name()]) && empty($_SESSION)){
		// 	session_destroy();
		// 	session_id($_POST[session_name()]);
		// 	session_start();
		// }
		//因为上面的解决session丢失的方法时好时坏，不知什么时候就会上传不了，总报302错误，
		//所以用下面的方法解决，判断如果请求的方法名是uploadify提交目的方法，就不必登录，所以没有登录也能上传
		// echo ACTION_NAME;die;

		//如果没有登录就跳转到登录页
		//如果不是uploadify请求的方法再跳转到登录页
		// if(!isset($_SESSION['uid']) && ACTION_NAME != 'upload' && ACTION_NAME != 'uploadPic' && ACTION_NAME != 'uploadPhoto'){
		// 	$this->redirect(GROUP_NAME . '/Login/index');
		// }

		


	}





	/**
	 * 公共的排序方法,如果不同表的主键不全是id，那么可以通过$db->getPk()获取表主键名，也可以用获取表一样的
	 * 方法，即在表单中通过隐藏域将表主键名传过来
	 * @return [type] [description]
	 */
	public function sort(){
		$table = array_pop($_POST);			// 即 $table = $_POST['table']，因为下面要遍历，所以将它弹出
		$db = M($table);
		$id = $db->getPk();			//获取主键名
		foreach($_POST as $k => $v){
			$db->save(array(
				$id => $k,
				'sort' => $v
				));
		}
		redirect($_SERVER['HTTP_REFERER']);
	}




}