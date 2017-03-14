<?php
class RegisterAction extends CommonAction{
	public function index(){
		$this->display();
	}


	/**
	 * 注册
	 * @return [type] [description]
	 */
	public function register(){
		// if(IS_POST){
		// 	//不是提交表单过来的非法
		// 	if(!isset($_POST['sub'])){
		// 		$this->error('非法请求');
		// 	}

		// 	// 验证 验证码错误	验证码接过来需要实体化吗？？？
		// 	if(strtoupper($_POST['code']) != $_SESSION['code']){
		// 		$this->error('验证码错误');
		// 	}

		// 	// 验证账号
		// 	// 双引号和单引号都实体化，防止注入，如果不是5-30位即非法
		// 	$account = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
		// 	if(preg_match('/^\w{4,20}$/is', $account) === 0){
		// 		$this->error('帐号格式不正确');
		// 	}

		// 	if($_POST['pwd'] != $_POST['pwded']){
		// 		$this->error('两次密码输入不一致');
		// 	}

		// 	//引入passwordHash加密类库
		// 	import('Lib.Class.PasswordHash', APP_PATH);
		// 	// 初始化散列器为不可移植
		// 	$hash = new PasswordHash(8, false);

		// 	// 生成加密密码
		// 	$password = $hash->HashPassword($_POST['pwd']);

		// 	//注册入数据库
		// 	$data = array(
		// 		'account' => $account,
		// 		'password' => $password
		// 		);
		// 	if($id = M('user')->add($data)){
		// 		//注册成功即是登录状态，保存信息于session中
		// 		$_SESSION['userid'] = $id;
		// 		$_SESSION['username'] = $account;

		// 		// 注册成功，跳转到首页
		// 		$this->success('注册成功,即将跳转到首页',__ROOT__);
		// 	}else{
		// 		$this->error('注册失败');
		// 	}

			

		// }
	}


	/**
	 * 显示验证码
	 * @return [type] [description]
	 */
	public function verify(){
		import('Lib.Class.Code',APP_PATH);
		$obj = new Code();
		$obj->show();
	}


	#异步验证用户名
	public function username(){
		if (!IS_AJAX) 
			$this->error('页面不存在');
		$uname = htmlspecialchars($_POST['uname']);
		$where = array('account' => $uname);
		if (M('user')->where($where)->find()){
			echo 0;
		}else{
			echo 1;
		}
	}


	#异步验证码
	public function code(){
		if (!IS_AJAX) 
			$this->error('页面不存在');
		$code = strtoupper($_POST['code']);
		if ($code != $_SESSION['code']){
			echo 0;
		}else{
			echo 1;
		}
	}





	
}