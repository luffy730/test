<?php namespace Common\Model;
use Hdphp\Model\Model;
//文章操作模型
class Arc extends Model{
	//指定模型操作的表(固定的写法)
    protected $table = "article";
	//自定验证（固定写法）需要通过create方法才触发
	protected $validate = array( 
		array('title','required','文章标题不能为空',3,3)
    );
	//自动完成，需要通过create方法才触发
	protected $auto = array(
		array('sendtime','time','function',3,1),
		array('updatetime','time','function',3,2),
		//调用当前类的up方法处理上传
		array('thumb','up','method',3,3),
		array('user_uid','uid','method',3,1)
	);
	
	public function uid(){
		return $_SESSION['uid'];
	}
	
	//处理上传
	public function up(){
		//如果有隐藏域，证明是修改，直接返回原地址
		if($thumb = Q('post.thumb')) return $thumb;
		//$_FILES能打印出来才能上传
		//sp($_FILES);exit;
		$files = Upload::type('jpg,png,gif')->size(2000000)->make();
		//如果上传成功
		if($files){
			//此处return的值会存入thumb字段
			return $files[0]['path'];
		}else{//否则上传失败
			//如果用户有上传但是上传失败，用户不上传就不压错误了，因为我们允许用户不上传
			if($_FILES['thumb']['error'] != 4){
				//这个时候把上传的错误压入到模型的error属性里面，这样外面控制器的getError方法就可以调取到错误了
				$this->error = Upload::getError();
			}
			//返回空字符串给thumb字段
			return '';
			
		}
		
		
	}
	
	//添加
	public function addData(){
		//一、验证***************************
		//表article验证失败 返回假
		if(!$this->create()) return false;
		//如果有上传压入的错误 返回假
		if($this->error) return false;
		//表article_data验证失败 返回假
		$arcDataModel = new \Common\Model\ArcData;
		if(!$arcDataModel->create()){
			//把arcData模型里面的错误压入当前模型，因为控制器调用的就是当前模型的错误
			$this->error = $arcDataModel->getError();
			return false;
		}
		
		//二、添加************************
		//1.添加article表，add方法会返回自增id
		$aid = $this->add();
		//2.添加article_tag中间表
		$arcTagModel = new \Common\Model\ArcTag;
		//循环提交过来的标签tid,默认给空数组防止循环报错
		foreach (Q('post.tid',array()) as $tid) {
			$data = array(
				'article_aid' => $aid,
				'tag_tid' => $tid
			);
			$arcTagModel->add($data);
		}
		//3.添加article_data
		$data = array(
			'keywords'=>Q('post.keywords'),
			'des'=>Q('post.des'),
			'content'=>Q('post.content'),
			'article_aid'=>$aid
		);
		$arcDataModel->add($data);
		
		return true;
		
	}
	
	//删除文章
	public function del($aid){
		//1.删除article
		$this->where("aid={$aid}")->delete();
		//2.删除article_data
		$arcDataModel = new \Common\Model\ArcData;
		$arcDataModel->where("article_aid={$aid}")->delete();
		//3.删除article_tag
		$arcTagModel = new \Common\Model\ArcTag;
		$arcTagModel->where("article_aid={$aid}")->delete();
	}
	
	//编辑文章
	public function editData(){
		//一、验证***************************
		//表article验证失败 返回假
		if(!$this->create()) return false;
		//如果有上传压入的错误 返回假
		if($this->error) return false;
		//表article_data验证失败 返回假
		$arcDataModel = new \Common\Model\ArcData;
		if(!$arcDataModel->create()){
			//把arcData模型里面的错误压入当前模型，因为控制器调用的就是当前模型的错误
			$this->error = $arcDataModel->getError();
			return false;
		}
		
		//二、修改***************
		//修改article
		$this->save();
		$aid = Q('post.aid',0,'intval');
		//修改article_data
		$arcDataModel->where("article_aid={$aid}")->save();
		//修改article_tag（中间表）
		//(1) 先删除
		$arcTagModel = new \Common\Model\ArcTag;
		$arcTagModel->where("article_aid=$aid")->delete();
		//(2) 再添加
		foreach (Q('post.tid',array()) as $tid) {
			$data = array(
				'article_aid'=>$aid,
				'tag_tid'=>$tid
			);
			$arcTagModel->add($data);
		}
		
		
		return true;
		
	}
	
	
}





