<?php namespace Common\Model;
use Hdphp\Model\Model;
//标签操作模型
class Tag extends Model{
	//指定模型操作的表(固定的写法)
    protected $table = "tag";
	//自动验证
	protected $validate = array(
		array('tname','required','标签名称不能为空',3,3)
	);
	
	//添加数据
	public function addData(){
		if(!$this->create()) return false;
		//把字符串变为数组
		$tag = explode('|', Q('post.tname'));
		//遍历添加
		foreach ($tag as $tname) {
			//键名为字段名，键值就是要插入的值
			$data = array('tname'=>$tname);
			$this->add($data);
		}
		return true;
	}
	
	//传入文章数据获得标签，然后反出
	public function getTag($data){
		foreach ($data as $k => $v){
			$data[$k]['tag'] = Db::table('article_tag')
								->join('tag','tag_tid','=','tid')
								->where("article_aid={$v['aid']}")
								->get();
		}
		return $data;
	}
}





