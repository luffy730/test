<?php
/**
 * 货品列表
 */
class GoodsListAction extends CommonAction
{
	public function index()
	{
		$gid = (int) $_GET['gid'];
		$tid = (int) $_GET['tid'];
		//商品规格
		$where = array('tid' => $tid, 'class' => 1);
		$spec = M('type_attr')->field('taid,taname')->where($where)->select();
		//规格选择
		$db = M('goods_attr');
		$field = array('gtid', 'gtvalue');
		foreach ($spec as $k => $v)
		{
			$where = array('gid' => $gid, 'taid' => $v['taid']);
			$spec[$k]['opt'] = $db->field($field)->where($where)->select();
		}

		//已添加货品
		$where = array('gid' => $gid);
		$list = M('goods_list')->where($where)->select();
		foreach ($list as $k => $v)
		{
			$where = array('gtid' => array('IN', $v['combine']));
			$list[$k]['spec'] = M('goods_attr')->where($where)->getField('gtvalue', true);
		}
		
		$this->list = $list;
		$this->spec = $spec;

		//已添加货品总数（不是指库存）
		$goods_num = count($list);
		//货品可能情况数目，如果已添加数目小于可能情况数目，才出现添加货品的输入框
		$possible = 1;
		foreach ($spec as $s) {
			$possible *= count($s['opt']);
		}
		$this->is_show = $goods_num < $possible ? 1 : 0;
		

		$this->display();
	}

	/**
	 * 添加货品
	 */
	public function add()
	{
		if ($_POST['number'] == '')
		{
			$_POST['number'] = date('ymd') . $_POST['gid'] . implode('', $_POST['spec']);
		}
		$_POST['inventory'] = (int) $_POST['inventory'];
		$_POST['combine'] = implode(',', $_POST['spec']);
		if (M('goods_list')->add($_POST))
		{
			$this->success('添加成功', U('index',array('gid' => $_POST['gid'], 'tid' => $_POST['tid'])));
		}
		else
		{
			$this->error('添加失败', U('index',array('gid' => $_POST['gid'], 'tid' => $_POST['tid'])));
		}
	}

	/**
	 * 异步检测货品是否已存在
	 */
	public function check()
	{
		$where = array('gid' => (int) $_GET['gid'], 'combine' => implode(',', $_GET['spec']));
		echo M('goods_list')->where($where)->count() ? 0 : 1;
	}


	public function edit(){

	}


	public function del(){
		
	}




}