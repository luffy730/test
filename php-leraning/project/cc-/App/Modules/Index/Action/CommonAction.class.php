<?php
class CommonAction extends Action{
	public function _initialize(){
		$cart_goods_num = 0;
		if(isset($_SESSION['cart'])){
			$cart_goods_num = count($_SESSION['cart']);
		}
		$cart_goods_num = $cart_goods_num > 0 ? $cart_goods_num : 0;
		$this->cart_goods_num = $cart_goods_num;




		// 随机顺序调取T恤分类下的商品
		// $data = M('goods')->field('gname,pic,click,shopprice')->where(array('cid' => 13))->order('rand()')->select();
		// $this->data = $data;
		
		

		//判断浏览器类型
		$agent = $_SERVER["HTTP_USER_AGENT"];
		if(strpos($agent,"MSIE 6.0")){
			$this->ie6 = true;
		}else{
			$this->ie6 = false;
		}



	}



	//递归获取商品的分类，存入数组
	protected function get_path($cid){
		static $path = array();
		$data = M('category')->field('pid,cname,cid')->where(array('cid' => $cid))->select();
		$path[$data[0]['cid']] = $data[0]['cname']; 
		if($data[0]['pid'] != 0){
			$this->get_path($data[0]['pid']);
		}
		return $path;
	}




}