<?php
class CartAction extends CommonAction{

	/**
	 * 购物车内容显示
	 * @return [type] [description]
	 */
	public function index(){
		$info = array();
		if(isset($_SESSION['cart'])){
			foreach ($_SESSION['cart'] as $key => $value) {
				$info[$key]['glid'] = $value['glid'];
				$info[$key]['quantity'] = $value['quantity'];
				$goodsList = M('goods_list')->field('combine,gid,number')->where(array('glid' => $value['glid']))->find();
				$goods = M('goods')->field('gname,shopprice')->where(array('gid' => $goodsList['gid']))->find();
				$detail = M('detail')->field('small')->where(array('gid' => $goodsList['gid']))->find();
				$attr = explode(',', $goodsList['combine']);
				$color = M('goods_attr')->field('gtvalue,added')->where(array('gtid' => $attr[0]))->find();
				$size = M('goods_attr')->field('gtvalue,added')->where(array('gtid' => $attr[1]))->find();
				$info[$key]['gname'] = $goods['gname'];
				$info[$key]['price'] = $goods['shopprice'] + $color['added'] + $size['added'];
				$info[$key]['sum'] = $info[$key]['price'] * $value['quantity'];
				$pics =explode(',', $detail['small']);
				$info[$key]['pic'] = $pics[0];
				$info[$key]['color'] = $color['gtvalue'];
				$info[$key]['size'] = $size['gtvalue'];
				$info[$key]['session_key'] = $key;
				$info[$key]['gid'] = $goodsList['gid'];
				$info[$key]['number'] = $goodsList['number'];

			}
		}

		$totalPrice = 0;
		foreach ($info as $v) {
			$totalPrice += $v['sum'];
		}

		$this->totalPrice = $totalPrice;
		$this->info = $info;

		//将组合好的数组存入session，以便在 确认订单信息页 方法中用
		$_SESSION['info'] = $info;

		// p($info);die;

		$this->display();
	}


	/**
	 * 购物车中删除一个商品
	 * @return [type] [description]
	 */
	public function delOne(){
		$session_key = intval($_GET['session_key']);
		if(!isset($session_key)){
			die('非法操作');
		}
		unset($_SESSION['cart'][$session_key]);
		if(count($_SESSION['cart']) == 0){
			unset($_SESSION['cart']);
		}
		$this->redirect('index');
	}
	

	/**
	 * 同时删除购物车中多个商品
	 * @return [type] [description]
	 */
	public function delSome(){
		$keys = htmlspecialchars($_POST['keys']);
		$keys = isset($keys) ? $keys : '';
		if($keys == ''){
			echo json_encode(array(
				'stat' => 0,
				'info' => '请选择要删除的商品'
				));
			die;
		}
		$keysArr = explode(',', $keys);
		foreach ($keysArr as $v) {
			unset($_SESSION['cart'][$v]);
		}
		if(count($_SESSION['cart']) == 0){
			unset($_SESSION['cart']);
		}
		echo json_encode(array(
			'stat' => 1,
			'info' => '删除成功'
		));
	}


	/**
	 * 确认订单页面显示
	 * @return [type] [description]
	 */
	public function confirmOrder(){
		// echo ACTION_NAME;die;
		if(!isset($_SESSION['userid'])){
			$this->error('你还没有登录，请登录后再提交订单');
			die;
		}
		$info = $_SESSION['info'];
		$this->info = $info;

		$totalPrice = 0;
		foreach ($info as $v) {
			$totalPrice += $v['sum'];
		}

		$this->totalPrice = $totalPrice;
		
		$this->display('index');
	}


	/**
	 * 添加订单
	 */
	public function addOrder(){
		if(IS_AJAX){

			//订单号, 时间_用户ID_登录IP_随机数
			$orderNumber = date('YmdHis') . '_' . $_SESSION['userid'] . '_' . get_client_ip() . '_' . rand(0,1000);
			//收货人
			$consignee = htmlspecialchars($_POST['consignee']);
			//收货地址
			$address = htmlspecialchars($_POST['address']);
			//手机或电话
			$mobile = htmlspecialchars($_POST['mobile']);
			//价格总计
			$info = $_SESSION['info'];
			$total = 0;
			foreach ($info as $v) {
				$total += $v['sum'];
			}
			//备注说明
			$remark = htmlspecialchars($_POST['remark']);

			$data = array(
				'number' => $orderNumber,
				'consignee' => $consignee,
				'address' => $address,
				'mobile' => $mobile,
				'total' => $total,
				//订单生成时间
				'time' => time(),
				'remark' => $remark,
				//订单状态
				'status' => 1,
				//所属用户ID
				'uid' => $_SESSION['userid']
				);
			if($oid = M('order')->add($data)){
				$db = M('order_list');
				foreach ($info as $k => $v) {
					$list = array(
						'quantity' => $v['quantity'],
						'subtotal' => $v['sum'],
						'gid' => $v['gid'],
						'oid' => $oid,
						'glid' => $v['glid'],
						'glnumber' => $v['number']
						);
					$db->add($list);
				}

				//订单添加成功，将购物车中的商品信息清空
				unset($_SESSION['cart']);
				unset($_SESSION['info']);

				//订单添加成功，为异步返回值
				echo json_encode(array(
					'stat' => 1,
					'info' => '提交订单成功'
					));
			}else{
				echo json_encode(array(
					'stat' => 0,
					'info' => '提交订单失败'
					));
			}


		}
		
		

	}


	/**
	 * 添加订单成功 的提示页面
	 * @return [type] [description]
	 */
	public function successOrder(){
		$this->display('index');
	}


	/**
	 * 支付宝支付模拟页面
	 * @return [type] [description]
	 */
	public function alipay(){
		$total = M('order')->field('total')->where(array('uid' => $_SESSION['userid'], 'status' => 1))->find();
		$this->total = $total;
		$this->display();
	}


	/**
	 * 模拟支付
	 * @return [type] [description]
	 */
	public function pay(){
		if(IS_AJAX){
			$data = array('status' => 2);
			$where = array('uid' => $_SESSION['userid'], 'status' => 1);
			$row = M('order')->where($where)->save($data);
			if($row){
				echo json_encode(array(
					'stat' => 1,
					'info' => '订单状态修改成功'
					));
			}else{
				echo json_encode(array(
					'stat' => 0,
					'info' => '支付失败'
					));
			}
		}
	}


	/**
	 * 确认收货 的 页面显示
	 * @return [type] [description]
	 */
	public function buyOK(){
		$this->display('index');
	}






}

