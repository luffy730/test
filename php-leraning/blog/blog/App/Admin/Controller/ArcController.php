<?php namespace Admin\Controller; 
use Hdphp\Controller\Controller;

//文章管理控制器
class ArcController extends CommonController{
	private $model;
	public function __construct(){
		parent::__construct();
		$this->model = new \Common\Model\Arc;
	}
	//添加文章
	public function add(){
		//3.添加
		if(IS_POST){
			//添加成功
		   	if($this->model->addData()) View::success('添加成功',U('index'));
			//否则添加失败
			View::error($this->model->getError());
		}
		//1.处理所属分类
		$cateModel = new \Common\Model\Cate;
		$cateData = Data::tree($cateModel->get(),'cname');
		View::with('cateData',$cateData);
		//2.处理标签
		$tagModel = new \Common\Model\Tag;
		$tagData = $tagModel->get();
		View::with('tagData',$tagData);
		
		
	    View::make();
	}
	//显示
	public function index(){
		//分页处理***************
		//统计总数 SELECT count(*) FROM .....
		$total = Db::table('article')->join('category','category_cid','=','cid')->where("is_recycle=0")->count();
		//执行分页
		$page = Page::row(2)->make($total);
		View::with('page',$page);
		
		//数据处理***************
		//SELECT * FROM article JOIN category ON category_cid=cid;
		$data = Db::table('article')->join('category','category_cid','=','cid')->field('aid,title,cname')->limit(Page::limit())->where("is_recycle=0")->get();
		View::with('data',$data);
		
		
	    View::make();
	}
	
	//编辑
	public function edit(){
		//5.修改
		if(IS_POST){
		  	if($this->model->editData()) View::success('修改成功',U('index'));
		   	View::error($this->model->getError());
		}
		//1.处理所属分类
		$cateModel = new \Common\Model\Cate;
		$cateData = Data::tree($cateModel->get(),'cname');
		View::with('cateData',$cateData);
		//2.处理标签
		$tagModel = new \Common\Model\Tag;
		$tagData = $tagModel->get();
		View::with('tagData',$tagData);
		//3.获得旧数据
		$aid = Q('get.aid',0,'intval');
		$oldData = Db::table('article')->join('article_data','aid','=','article_aid')->where("aid={$aid}")->get();
		View::with('oldData',$oldData[0]);
		//4.获得当前文章选中了哪些标签
		$arcTagModel = new \Common\Model\ArcTag;
		$tids = $arcTagModel->where("article_aid={$aid}")->lists('tag_tid');
		//如果用户没有选标签，那么给默认值为空数组，这样页面的in_array就不会报错了
		$tids = $tids ? $tids : array();
		View::with('tids',$tids);
		
		
	    View::make();
	}
	
	//删除到回收站
	public function del(){
		
	}
	
	//真正删除
	public function realDel(){
		$this->model->del(Q('get.aid',0,'intval'));
		View::success('删除成功');
	}

}

