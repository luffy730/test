<?php
// 首页控制器类
class IndexAction extends CommonAction {
    public function index(){
    	// $constants = get_defined_constants(true);
    	// p($constants['user']);
    	

    	// 随机顺序调取T恤分类下的商品
		$data1 = M('goods')->field('gid,gname,pic,click,shopprice')->where(array('cid' => 13))->order('rand()')->limit(10)->select();
		$this->data1 = $data1;
		$data2 = M('goods')->field('gid,gname,pic,click,shopprice')->where(array('cid' => 13))->order('rand()')->limit(10)->select();
		$this->data2 = $data2;
		$data3 = M('goods')->field('gid,gname,pic,click,shopprice')->where(array('cid' => 13))->order('rand()')->limit(10)->select();
		$this->data3 = $data3;


		//获取 上衣 子分类
		$jacket = M('category')->field('cid,cname')->where(array('pid' => 4))->select();
		$this->jacket = $jacket;






		$this->display();
    }
}