<?php
// 商品详情显示页控制器类
class ShowAction extends CommonAction
{
	// 用于存储数量可能要加1的session中货品元素
	// 不管用，传不到另一个方法中，每次请求这个脚本这个值都重新赋初值？？？那么改存session中吧
	// private $which;
	

	public function index()
	{
		$gid = isset($_GET['gid']) ? (int) $_GET['gid'] : 0;
		if ($gid < 1)
		{
			redirect(__ROOT__);
			die;
		}
		$where = array('gid' => $gid);
		$goods = D('ShowView')->where($where)->find();

		// echo D('ShowView')->getLastSql();die;
		// p($goods);die;
		
		if ($goods === null)
		{
			redirect(__ROOT__);
			die;
		}

		$goods['small'] = explode(',', $goods['small']);
		$goods['medium'] = explode(',', $goods['medium']);
		$goods['big'] = explode(',', $goods['big']);

		$result = M('goods_attr')->field('gid', true)->where(array('gid' => $gid))->select();
		$attr = array();
		foreach ($result as $v)
		{
			$attr[$v['taid']][] = $v;
		}


		$attrs = array();
		$spec = array();
		foreach ($attr as $k => $v)
		{
			$typeAttr = M('type_attr')->field(array('taname', 'class'))->find($k);
			if ($typeAttr['class'] == 0)
			{
				$attrs[] = array(
					'name' => $typeAttr['taname'],
					'value' => $v[0]['gtvalue']
					);
			}
			else
			{
				$spec[] = array(
					'name' => $typeAttr['taname'],
					'option' => $v
					);
			}
		}
		$goods['attr'] = $attrs;
		$goods['spec'] = $spec;

		$inventoryList = M('goods_list')->field('inventory')->where(array('gid' => $gid))->select();
		$inventory = 0;
		foreach ($inventoryList as $value) {
			$inventory += $value['inventory'];
		}
		$goods['inventory'] = $inventory;

		// p($goods);die;
		$this->gid = $gid;
		$this->goods = $goods;
		$this->small = $goods['small'];
		$this->medium = $goods['medium'];
		$this->big = $goods['big'];


		//调取评论数据,分页
		import('ORG.Util.Page');
		$count = M('remark')->where(array('gid' => $gid))->count();
		$page = new Page($count, 5);
		$limit = $page->firstRow . ',' . $page->listRows;
		$remark = M('remark')->field('content,uname,time')->where(array('gid' => $gid))->order('time DESC')->limit($limit)->select();
		$this->remark = $remark;
		$this->page = $page->show();


		//获取当前商品所属分类路径
		$cid = M('goods')->field('cid')->where(array('gid' => $gid))->find();
		// $cate = M('category')->field('cname,pid')->where(array('cid' => $cid['cid']))->find();
		// $this->cname = $cate['cname'];
		// $pname = M('category')->field('cname')->where(array('cid' => $cate['pid']))->find();
		// $this->pname = $pname['cname'];
		$path = $this->get_path($cid['cid']);
		ksort($path);
		// p($path);die;
		$this->path = $path;

		



		// 随机顺序调取T恤分类下的商品
		$data1 = M('goods')->field('gid,gname,pic,click,shopprice')->where(array('cid' => 13))->order('rand()')->limit(10)->select();
		$this->data1 = $data1;







		$this->display();
	}


	/**
	 * 查询不同规格的货品
	 * @return [type] [description]
	 */
	public function getGoodsList(){
		$combine = htmlspecialchars($_POST['combine']);
		$combine = isset($combine) ? $combine : '';
		if($combine == ''){
			echo json_encode(array(
					'stat' => 0,
					'info' => '非法请求'
				));
			die;
		}

		$where = array('combine' => $combine);
		$field = array('glid','number','inventory','gid');
		$goodsList = M('goods_list')->field($field)->where($where)->find();
		if(count($goodsList) == 0){
			echo json_encode(array(
					'stat' => 0,
					'info' => '所选规格的货品库存为0，请挑选其它的颜色或尺码'
				));
		}else{
			if($goodsList['inventory'] == 0){
				echo json_encode(array(
					'stat' => 0,
					'info' => '所选规格的货品库存为0，请挑选其它的颜色或尺码'
				));
			}else{
				$attr = explode(',', $combine);
				$where0 = array('gtid' => $attr[0]);
				$added0 = M('goods_attr')->field('added')->where($where0)->find();
				$where1 = array('gtid' => $attr[1]);
				$added1 = M('goods_attr')->field('added')->where($where1)->find();
				$extra = $added0['added'] + $added1['added'];
				$goodsList['extra'] = $extra;
				echo json_encode(array(
					'stat' => 1,
					'info' => $goodsList
					));
			}
		}
		
	}


	/**
	 * 加入购物车
	 */
	public function addCart(){
		$quantity = (int)$_POST['quantity'];
		$quantity = isset($quantity) ? $quantity : 1;
		$combine = htmlspecialchars($_POST['combine']);
		$combine = isset($combine) ? $combine : '';
		if($combine == ''){
			echo json_encode(array(
					'stat' => 0,
					'info' => '非法请求'
				));
			die;
		}

		$where = array('combine' => $combine);
		$field = array('glid','combine','number','inventory','gid');
		$goodsList = M('goods_list')->field($field)->where($where)->find();

		if(isset($_SESSION['cart'])){
			if($already = $this->_already($goodsList['glid'], $_SESSION['cart'])){
				//存储可能要数量加一的货品在$_SESSION['cart']数组中的键值
				$_SESSION['which'] = $already['which'];
				echo json_encode(array(
					'stat' => 2,
					'info' => $_SESSION['which']
					));
				die;
			}
		}
		
		if(count($goodsList) == 0){
			echo json_encode(array(
					'stat' => 0,
					'info' => '所选规格的货品库存为0，请挑选其它的颜色或尺码'
				));
		}else{
			if($goodsList['inventory'] == 0){
				echo json_encode(array(
					'stat' => 0,
					'info' => '所选规格的货品库存为0，请挑选其它的颜色或尺码'
					));
			}else{
				$_SESSION['cart'][] = array('glid' => $goodsList['glid'], 'quantity' => $quantity);
				$sum = count($_SESSION['cart']);
				echo json_encode(array(
					'stat' => 1,
					'info' => $sum
					));
			}
		}
	}

	/**
	 * 判断货品是否在session中存在的私有方法
	 * @param  [type] $glid [description]
	 * @param  [type] $arr  [description]
	 * @return [type]       [description]
	 */
	private function _already($glid, $arr){
		$return = array();
		foreach ($arr as $key => $value) {
			if(in_array($glid, $value)){
				$return['already'] = true;
				$return['which'] = $key;
				return $return;
			}
		}
		return false;
	}


	/**
	 * 如果将相同的货品加入购物车，就将数量加1
	 * @return [type] [description]
	 */
	public function more(){
		if(isset($_POST['more'])){
			$key = $_SESSION['which'];
			if(++$_SESSION['cart'][$key]['quantity']){
				echo json_encode(array(
					'stat' => 1
					));
			}
			
		}
	}



	/**
	 * 显示发表评论验证码
	 * @return [type] [description]
	 */
	public function verify(){
		import('Lib.Class.Code',APP_PATH);
		$obj = new Code();
		$obj->show();
	}



	/**
	 * 发表评论
	 * @return [type] [description]
	 */
	public function remark(){
		if(strtoupper($_POST['verify']) != $_SESSION['code']){
			$this->error('验证码错误');
		}
		if(trim($_POST['content']) == ''){
			$this->error('评论内容不能为空');
		}
		if(!isset($_SESSION['userid'])){
			$this->error('你还没有登录，请登录后再发表评论');
		}

		$gid = (int)$_POST['gid'];
		$data = array(
			'content' => htmlspecialchars($_POST['content']),
			'time' => time(),
			'gid' => $gid,
			'uid' => $_SESSION['userid'],
			'uname' => $_SESSION['username']
			);

		if(M('remark')->add($data)){
			$this->success('发表评论成功',U('Show/index', array('gid' => $gid)));
		}else{
			$this->error('发表评论失败');
		}


	}







}