<?php
// 列表页控制器类
class ListAction extends CommonAction
{
	/**
	 * 列表页视图
	 */
	public function index()
	
	{
		$cid = isset($_GET['cid']) ? (int) $_GET['cid'] : 0;

		// 无效参数跳转
		if ($cid < 1)
		{
			redirect(__ROOT__);
			die;
		}

		// 获取当前分类栏目下所有的所属商品ID
		if (!$gids = S('List/gids' . $cid))
		{
			$gids = $this->_getGids($cid);
			// 生成缓存
			S('List/gids' . $cid, $gids, 3600);
		}

		// 当前分类下所有商品所含属性
		if (!$attr = S('List/attr' . $cid))
		{
			$attr = $this->_getAttrs($gids);
			// 生成缓存
			S('List/attr' . $cid, $attr, 3600);
		}
		$this->attr = $attr;


		$num = count($attr);


		$param = isset($_GET['param']) ? explode('_', trim($_GET['param'], '_')) : 0;


		// 非法传参 
		if ($param ===0)
		{
			redirect(__ROOT__);
			die;
		}
		$filter = count($param) != $num ? array_fill(0, $num, 0) : $param;


		// 取得已选择筛选的商品属性ID条件
		$goodsId = array();
		$prefix = C('DB_PREFIX');
		$db = M();
		foreach ($filter as $v)
		{
			if ($v > 0)
			{
				$sql = 'SELECT DISTINCT a.`gid` FROM `' . $prefix . 'goods_attr` a INNER JOIN `' . $prefix . 'goods_attr` b WHERE a.`gtvalue` = b.`gtvalue` AND b.gtid = ' . $v;
				$goodsId[] = $db->query($sql);
			}
		}

		// 组合筛选后最终的查询条件
		$where = '`gid` IN(' . implode(',', $gids) . ')';
		if (!empty($goodsId))
		{
			foreach ($goodsId as $k => $v)
			{
				foreach ($v as $key => $value)
				{
					$goodsId[$k][$key] = $value['gid'];
				}
				$where .= ' AND `gid` IN(' . implode(',', $goodsId[$k]) . ')';
			}
		}

		//分页
		import('ORG.Util.Page');
		$count = M('goods')->where($where)->count();
		$count = isset($count) ? $count : 0;
		$page = new Page($count, 8);
		$limit = $page->firstRow . ',' . $page->listRows;
		
		$field = array('gid', 'gname', 'marketprice', 'shopprice', 'pic');
		$goods = M('goods')->field($field)->where($where)->order('time DESC')->limit($limit)->select();

		;
		$preg = '/(<a.*?href=[\'"]).*?\/p\/(\d+)?.*?([\'"].*?>)/is';
		$this->page = preg_replace($preg, '\\1' . U('/c/' . $cid . '_' . implode('_', $filter), '', '') . '?p=\\2.' . C('URL_HTML_SUFFIX') . '\\3', $page->show());
		$this->goods = $goods;
		$this->count = $count;
		$this->filter = $filter;





		// 随机顺序调取T恤分类下的商品
		$data1 = M('goods')->field('gid,gname,pic,click,shopprice')->where(array('cid' => 13))->order('rand()')->limit(4)->select();
		$this->data1 = $data1;
		$data2 = M('goods')->field('gid,gname,pic,click,shopprice')->where(array('cid' => 13))->order('rand()')->limit(5)->select();
		$this->data2 = $data2;


		//调取 上衣 分类下的子分类
		$clos = M('category')->field('cid,cname')->where(array('pid' => 4))->select();
		$this->clos = $clos;


		// 当前所查询的分类的名称
		$cname = M('category')->field('cname')->where(array('cid' => $cid))->find();
		$this->cname = $cname['cname'];



		//获取当前所查询分类路径
		$path = $this->get_path($cid);
		ksort($path);
		$this->path = $path;






		$this->display();
	}

	/**
	 * 获取当前分类栏目下所有的所属商品ID
	 */
	private function _getGids($cid)
	{
		$field = array('cid', 'pid');
		$cate = M('category')->field($field)->select();

		import('Lib.Class.Unlimited', APP_PATH);
		$cids = Unlimited::getChildsId($cate, $cid);
		$cids[] = $cid;
		
		$where = array('cid' => array('IN', $cids));
		$gids = M('goods')->where($where)->getField('gid', true);
		return $gids;
	}

	/**
	 * 当前分类下所有商品所含属性
	 */
	private function _getAttrs($gids)
	{
		$field = array('gtid', 'gtvalue', 'taid');
		$where = array('gid' => array('IN', $gids));
		$attr = M('goods_attr')->field($field)->where($where)->group('gtvalue')->select();
		
		// 属性归类
		$values = array();
		foreach ($attr as $v)
		{
			$values[$v['taid']][] = array(
				'id' => $v['gtid'],
				'value' => $v['gtvalue']
				);
		}

		// 重组属性筛选数组
		$attr = array();
		foreach ($values as $k => $v)
		{
			$where = array('taid' => $k);
			$type = M('type_attr')->where($where)->getField('taname');
			$attr[] = array(
				'name' => $type,
				'option' => $v
				);
		}
		return $attr;
	}
}