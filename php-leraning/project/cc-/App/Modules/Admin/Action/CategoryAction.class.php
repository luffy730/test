<?php
class CategoryAction extends CommonAction{
	public function index(){
		$cate = M('category')->order('sort')->select();
		$this->cate = level($cate);
		$this->display();
	}

	/**
	 * 添加分类
	 */
	public function add(){
		if(IS_POST){
			if(M('category')->add($_POST)){
				$this->success('添加成功', U('index'));
				die;
			}else{
				$this->error('添加失败');
				die;
			}
		}

		//分配父级ID
		$this->pid = isset($_GET['pid']) ? (int) $_GET['pid'] : 0;

		//如果添加的是子分类，分配类型选择，即顶级分类没有类型
		if($this->pid > 0){
			$this->type = M('type')->select();
		}

		$this->display();


	}

	public function edit(){

	}

	public function del(){
		$cid = (int) $_GET['cid'];
		$field = array('cid', 'pid');
		$cate = M('category')->field($field)->select();
		$cids = get_childs_id($cate, $cid);
		$cids[] = $cid;
		$where = array('cid' => array('IN', $cids));
		if(M('category')->where($where)->delete()){
			$this->success('删除成功', U('index'));
		}else{
			$this->error('删除失败');
		}
	}



}
