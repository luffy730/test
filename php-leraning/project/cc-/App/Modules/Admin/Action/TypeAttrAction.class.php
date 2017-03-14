<?php
/**
 * 类型属性 控制器
 */
class TypeAttrAction extends CommonAction{
	public function index(){
		$tid = (int) $_GET['tid'];
		$where = array('tid' => $tid);
		$this->attr = M('type_attr')->where($where)->select();
		$this->display();
	}

	public function add(){
		if(IS_POST){
			$_POST['tavalue'] = str_replace('|', ',', trim($_POST['tavalue']));
			if(M('type_attr')->add($_POST)){
				$this->success('添加成功', U('index', array('tid' => $_POST['tid'])));
				die;
			}else{
				$this->error('添加失败');
				die;
			}
		}
		$tid = (int) $_GET['tid'];
		$this->display();
	}

	public function edit(){

	}

	public function del(){

	}



}