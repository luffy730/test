<?php
/**
 * 商品类型管理 控制器
 */
class TypeAction extends CommonAction{

	public function index(){
		$this->type = M('type')->select();
		$this->display();
	}

	public function add(){
		if(IS_POST){
			if(M('type')->add($_POST)){
				$this->success('添加商品类型成功', 'index');
				die;
			}else{
				$this->error('添加商品类型失败');
				die;
			}
		}

		$this->display();
	}

	public function edit(){

	}

	public function del(){

	}


}