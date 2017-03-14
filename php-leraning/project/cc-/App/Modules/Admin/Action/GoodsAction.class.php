<?php
/**
 * 商品管理
 */
class GoodsAction extends CommonAction{
	/**
	 * 商品列表
	 * @return [type] [description]
	 */
	public function index(){
		//true参数表示除了数组中列出的字段
		$field = array('aid', 'bid', 'cid', 'pic');
		$goods = M('goods')->field($field, true)->select();
		foreach ($goods as $key => $value) {
			$inventory = M('goods_list')->field('inventory')->where(array('gid' => $value['gid']))->select();
			$sum = 0;
			foreach ($inventory as $v) {
				$sum += $v['inventory'];
			}
			$goods[$key]['sum'] = $sum;
		}
		$this->goods = $goods;
		// p($goods);die;
		$this->display();
	}

	/**
	 * 添加商品
	 */
	public function add(){
		if (IS_POST)
		{	
			// p($_POST);die;
			if (D('GoodsRelation')->addGoods())
			{
				$this->success('添加成功', U('index'));
				die;
			}
			else
			{
				$this->error('添加失败');
			}
		}
		//选择分类
		$cate = M('category')->order('sort')->select();
		$this->cate = level($cate);

		//选择品牌
		$this->brand = M('brand')->order('sort')->select();
		$this->display();
	}

	/**
	 * 异步获取商品属性
	 */
	public function getAttr()
	{
		$tid = (int) $_POST['tid'];
		$where = array('tid' => $tid);
		$attr = M('type_attr')->where($where)->select();
		if ($attr === null)
		{
			echo 0;
		}
		else
		{
			echo json_encode($attr);
		}
	}

	/**
	 * 列表图上传
	 */
	public function uploadPic()
	{
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->savePath = './Uploads/Pic/';
		$upload->allowExts = array('gif', 'png', 'jpg', 'jpeg');
		if (!$upload->upload())
		{
			echo json_encode(array(
				'status' => 0,
				'msg' => $upload->getErrorMsg()
				));
		}
		else
		{
			$info = $upload->getUploadFileInfo();
			echo json_encode(array(
				'status' => 1,
				'name' => $info[0]['savename']
				));
		}
	}

	/**
	 * 商品图册上传
	 */
	public function uploadPhoto()
	{
		$config = array(
			// 允许上传的文件后缀 留空不作后缀检查
	        'allowExts' => array('gif', 'jpeg', 'jpg', 'png'),
	        // 使用对上传图片进行缩略图处理
	        'thumb' =>  true,
	        // 缩略图最大宽度
	        'thumbMaxWidth' => '400,100',
	        // 缩略图最大高度
	        'thumbMaxHeight' => '400,100',
	        // 缩略图前缀
	        'thumbPrefix' => 'medium_,mini_',
	        // 缩略图保存路径
	        'thumbPath' => '',
	        // 缩略图文件名
	        'thumbFile' => '',
	        // 启用子目录保存文件
	        'autoSub' =>  true,
	        // 子目录创建方式 可以使用hash date custom
	        'subType' => 'date',
	        'dateFormat' =>  'Ym',
	        'savePath'  =>  './Uploads/Photo/',// 上传文件保存路径
        );
        import('ORG.Net.UploadFile');
		$upload = new UploadFile($config);
		if (!$upload->upload())
		{
			echo json_encode(array(
				'status' => 0,
				'msg' => $upload->getErrorMsg()
				));
		}
		else
		{
			$info = $upload->getUploadFileInfo();
			$max = $info[0]['savename'];
			$path = explode('/', $max);
			echo json_encode(array(
				'status' => 1,
				'max' => $max,
				'medium' => $path[0] . '/medium_' . $path[1],
				'mini' => $path[0] . '/mini_' . $path[1]
				));
		}
	}

	/**
	 * 异步删除图片
	 */
	public function delPic()
	{
		$state = true;
		foreach ($_POST as $v)
		{
			if (!unlink('./Uploads/Photo/' . $v))
			{
				$state = false;
			}
		}
		echo $state ? 1 : 0;
	}

	/**
	 * 编辑器图片上传
	 */
	public function uploadEditor()
	{
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->savePath = './Uploads/Editor/';
		$upload->allowExts = array('gif', 'png', 'jpg', 'jpeg');
		if (!$upload->upload())
		{
			echo json_encode(array(
				'state' => $upload->getErrorMsg()
				));
		}
		else
		{
			$info = $upload->getUploadFileInfo();
			echo json_encode(array(
				'url' 		=> $info[0]['savename'],
				'title' 	=> htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
				'original' 	=> $info[0]['name'],
				'state' => 'SUCCESS'
				));
		}
	}

	public function edit(){

	}

	public function del(){

	}




}