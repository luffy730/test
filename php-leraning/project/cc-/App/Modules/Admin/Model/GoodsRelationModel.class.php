<?php
/**
 * 添加商品关联模型
 */
class GoodsRelationModel extends RelationModel
{
	//主表名称
	protected $tableName = 'goods';

	//定义关联关系
	protected $_link = array(
		'detail' => array(
			'mapping_type' => HAS_ONE,
			'foreign_key' => 'gid'
			),
		'goods_attr' => array(
			'mapping_type' => HAS_MANY,
			'foreign_key' => 'gid'
			)
		);

	//插入数据
	public function addGoods()
	{
		$data = $this->_createData();
		return $this->relation(true)->add($data);
	}

	private function _createData()
	{
		$data = array(
			'gname'		=> $_POST['gname'],
			'unit'		=> $_POST['unit'],
			'marketprice'	=> (int) $_POST['marketprice'],
			'shopprice'		=> (int) $_POST['shopprice'],
			'pic'		=> $_POST['pic'],
			'click'		=> (int) $_POST['click'],
			'time'		=> time(),
			'aid'		=> $_SESSION['uid'],
			'bid'		=> (int) $_POST['bid'],
			'cid'		=> $_POST['cid'],
			'tid'		=> $_POST['tid'],
			'detail'	=> array(
				'small'		=> implode(',', $_POST['mini']),
				'medium'	=> implode(',', $_POST['medium']),
				'big'		=> implode(',', $_POST['max']),
				'intro'		=> $_POST['intro'],
				'service'	=> $_POST['service']
				),
			'goods_attr' => array()
			);

		foreach ($_POST['attr'] as $k => $v)
		{
			$data['goods_attr'][] = array(
				'gtvalue'	=> $v,
				'added' => 0,
				'taid'	=> $k
				);
		}
		foreach ($_POST['spec'] as $k => $v)
		{
			for ($i = 0; $i < count($v['tavalue']); ++$i)
			{
				$data['goods_attr'][] = array(
					'gtvalue' => $v['tavalue'][$i],
					'added' => (int) $v['added'][$i],
					'taid'	=> $k
					);
			}
		}
		return $data;
	}
}