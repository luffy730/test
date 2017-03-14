<?php namespace Admin\Controller; 
use Hdphp\Controller\Controller;

//分类管理控制器
class CateController extends CommonController{
	private $model;
	public function __construct(){
		parent::__construct();
		//实例化自定义的模型
		$this->model = new \Common\Model\Cate;
	}
	
	//编辑分类
	public function edit(){
		//3.修改
		if(IS_POST){
			if($this->model->editData()) View::success('修改成功',U('index'));
			View::error($this->model->getError());
		}
		
		//1.获得旧数据
		$cid = Q('get.cid',0,'intval');
		$oldData = $this->model->where("cid={$cid}")->find();
		//sp($oldData);
		View::with('oldData',$oldData);
		//2.处理所属分类（父级分类不能是自己和自己的子集）
		$cate = $this->model->getNoMy($cid);
		$cate = Data::tree($cate,'cname');
		View::with('cate',$cate);
		
	    View::make();
	}
	//删除分类
	public function del(){
		//接收get传递过来的cid
		$cid = Q('get.cid',0,'intval');
		//1.在删除当前分类之前获得当前分类的pid
		$data = $this->model->where("cid={$cid}")->find();
		$pid = $data['pid'];
		//2.找到要删除的当前的分类所有的子集，然后更改它们的pid为要删除分类的pid
		$this->model->where("pid={$cid}")->update(array('pid'=>$pid));
		//3.删除
		//DELETE FROM category WHERE cid={$cid};
		$this->model->where("cid={$cid}")->delete();
		View::success('删除成功');
	}
	//添加顶级分类
	public function add(){
		if(IS_POST){
			//调用模型的添加方法
			if($this->model->addData()){
		  		//把数组转为json
				echo json_encode(
					array(
						'status'=>1,
						'message'=>'添加成功'
					)
				);
				exit;
			}
			//把数组转为json
			echo json_encode(
				array(
					'status'=>0,
					'message'=>$this->model->getError()
				)
			);
			exit;

		}
	    View::make();
	}
	
	//添加子分类
	public function addSon(){
		if(IS_POST){
		   	//调用模型的添加方法
			if($this->model->addData()){
		  		View::success('添加成功',U('index'));
			}
			View::error($this->model->getError());
		}
		//获得所属分类的名称和cid************
		//接收get里面的cid,默认值为0,强制转整
		$cid = Q('get.cid',0,'intval');
		//SELECT cid,cname FROM category WHERE cid=$cid;
		$data = $this->model->where("cid={$cid}")->field('cid,cname')->find();
		View::with('data',$data);
	    View::make();
	}
	
	
	//显示分类
	public function index(){
		//获得所有的分类数据
		$data = $this->model->get();
		//让数据呈树状形式显示
		$treeData = Data::tree($data,'cname','cid','pid');
		//sp($treeData);
		View::with('data',$treeData);
	    View::make();
	}
}