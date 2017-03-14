<?php
class LoginAction extends CommonAction{
	public function index(){
		$this->display();
	}


	/**
	 * 登录
	 * @return [type] [description]
	 */
	public function login(){
		// 登录表单数据验证，如果不是POST提交过来的，就die掉
		// if(IS_POST){
		// 	//不是提交表单过来的非法
		// 	if(!isset($_POST['sub'])){
		// 		$this->error('非法请求');
		// 	}

		// 	// 验证账号
		// 	// 双引号和单引号都实体化，防止注入，如果不是5-30位即非法
		// 	$account = htmlspecialchars($_POST['loginname'], ENT_QUOTES, 'UTF-8');
		// 	if(preg_match('/^\w{4,20}$/is', $account) === 0){
		// 		$this->error('非法帐号');
		// 	}

		// 	// 验证用户
		// 	$user = M('user')->where(array('account' => $account))->find();
		// 	if($user === NULL){
		// 		$this->error('账号或密码错误');
		// 	}

		// 	//引入passwordHash加密类库
		// 	import('Lib.Class.PasswordHash', APP_PATH);
		// 	// 初始化散列器为不可移植
		// 	$hash = new PasswordHash(8, false);

		// 	// 密码比对
		// 	if($hash->checkPassword($_POST['loginpwd'], $user['password']) === false){
		// 		$this->error('账号或密码错误');
		// 	}

		// 	//保存登录信息于session中
		// 	$_SESSION['userid'] = $user['uid'];
		// 	$_SESSION['username'] = $user['account'];
			
		// 	// 登录成功，跳转到首页
		// 	redirect(__ROOT__);

		// }
	}



	/**
	 * 退出登录
	 * @return [type] [description]
	 */
	public function logout(){
		session_unset();
		session_destroy();
		redirect($_SERVER['HTTP_REFERER']);
	}





}