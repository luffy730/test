<?php
/**
 * 商品展示视图模型
 */
class ShowViewModel extends ViewModel
{
	protected $viewFields = array(
		'goods' => array(
			'gid', 'gname', 'unit', 'marketprice', 'shopprice', 'click', 'time',
			'_type' => 'LEFT'
			),
		'detail' => array(
			'small', 'medium', 'big', 'intro', 'service',
			'_on' => 'goods.gid = detail.gid',
			'_type' => 'LEFT'
			),
		'brand' => array(
			'logo',
			'_on' => 'goods.bid = brand.bid'
			)
		);
}