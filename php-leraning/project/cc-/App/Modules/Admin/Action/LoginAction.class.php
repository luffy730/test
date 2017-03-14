<?php
// 后台登录控制器
class LoginAction extends Action{
	/**
	 * 构造方法，自动最先运行的方法，如果已登录且不是退出动作，就跳转到后台主页
	 * @return [type] [description]
	 */
	public function _initialize(){
		if(ACTION_NAME != 'logout' && isset($_SESSION['uid'])){
			$this->redirect(GROUP_NAME . '/Index/index');
			exit;
		}
	}

	/**
	 * 管理员登录
	 * @return [type] [description]
	 */
	public function index(){
		// 登录表单数据验证，如果不是POST提交过来的，就die掉
		if(IS_POST){
			// //不是提交表单过来的非法
			// if(!isset($_POST['sub'])){
			// 	$this->error('非法请求');
			// }

			// // 验证 验证码错误	验证码接过来需要实体化吗？？？
			// if(strtoupper($_POST['verify']) != $_SESSION['code']){
			// 	$this->error('验证码错误');
			// }

			// // 验证账号
			// // 双引号和单引号都实体化，防止注入，如果不是5-30位即非法
			// $account = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
			// if(preg_match('/^\w{5,30}$/is', $account) === 0){
			// 	$this->error('非法帐号');
			// }

			// // 验证用户
			// // $user = M('admin')->where(array('adminaccount' => $account))->find();
			// // if($user === NULL){
			// // 	$this->error('账号或密码错误');
			// // }

			// // //引入passwordHash加密类库
			// // import('Lib.Class.PasswordHash', APP_PATH);
			// // // 初始化散列器为不可移植
			// // $hash = new PasswordHash(8, false);

			// // 密码比对
			// // if($hash->checkPassword($_POST['password'], $user['adminpwd']) === false){
			// // 	$this->error('账号或密码错误');
			// // }

			// // 检测用户锁定
			// if($user['islock'] > 0){
			// 	$this->error('该账号已被锁定');
			// }

			// //更新登录时间与IP
			// $update = array(
			// 	'aid' => $user['aid'],
			// 	'logintime' => $_SERVER['REQUEST_TIME'],
			// 	'loginip' => get_client_ip()
			// 	);
			// M('admin')->save($update);

			// //保存登录信息于session中
			// $_SESSION['uid'] = $user['aid'];
			// $_SESSION['uname'] = $user['adminname'];
			// $_SESSION['logintime'] = date('Y-m-d H:i:s', $user['logintime']);
			// $_SESSION['loginip'] = $user['loginip'];
			// $_SESSION['curtime'] = date('Y-m-d H:i:s', $update['logintime']);
			// $_SESSION['curip'] = $update['loginip'];
			// //用于判断登入后台后是否出现欢迎框，刚登录就出现，刷新不出现
			// $_SESSION['welcome'] = 1;

			// 登录成功，跳转到后台首页
			redirect(__GROUP__);

		}

		// 显示登录页视图
		$this->display();
	}

	/**
	 * 退出登录
	 * @return [type] [description]
	 */
	public function logout(){
		session_unset();
		session_destroy();
		$this->success('退出成功，请登录','index');
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

	/**
	 * 异步验证验证码输入是否正确
	 * @return [type] [description]
	 */
	public function checkverify(){
		if(strtoupper(htmlspecialchars($_POST['code'])) == $_SESSION['code']){
			echo json_encode(
				array(
					'stat' => 1
					)
				);
		}else{
			echo json_encode(
				array(
					'stat' => 0
				)
			);
		}
	}






}