<?php
//后台主页控制器
class IndexAction extends CommonAction{
	/**
	 * 后台主页模板显示控制器
	 * @return [type] [description]
	 */
	public function index(){
		$date = $this->_get_format_time();
		$this->assign('date',$date);
		$this->display();
		//登录后，再刷新，欢迎框也不出现了
		$_SESSION['welcome'] = 0;
	}

	/**
	 * 获取服务器当前格式化时间，包括年月日和星期
	 * @return [type] [description]
	 */
	private function _get_format_time(){
		$arr = array();
		//获取年月日
		$date = date('Y年n月j日');
		$arr['date'] = $date;
		// 获取周几
		$today = getdate();
    	$week = $today['wday'];
    	$weekarr = array('日','一','二','三','四','五','六');
    	$weekday = $weekarr[$week];
    	$arr['weekday'] = $weekday;
    	return $arr;
	}

	/**
	 * 系统信息和管理员信息
	 * @return [type] [description]
	 */
	public function info(){
		$sys = array(
			'os' => PHP_OS,
			'version' => PHP_VERSION,
			'server' => $_SERVER['SERVER_SOFTWARE'],
			'mysql' => mysql_get_server_info(),
			);
		$this->sys = $sys;
		$this->display();
	}





}