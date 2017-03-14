<?php namespace Admin\Controller; 
use Hdphp\Controller\Controller;

//标签管理控制器
class TagController extends CommonController{
	private $model;
	public function __construct(){
		parent::__construct();
		$this->model = new \Common\Model\Tag;
	}
	//删除
	public function del(){
	    
	}
	//编辑标签
	public function edit(){
	    View::make();
	}
	//添加标签
	public function add(){
		if(IS_POST){
			//调用模型添加
			if($this->model->addData()) View::success('添加成功',U('index'));
			View::error($this->model->getError());
		}
	    View::make();
	}
	//显示标签
	public function index(){
		View::with('data',$this->model->get());
	    View::make();
	}
}