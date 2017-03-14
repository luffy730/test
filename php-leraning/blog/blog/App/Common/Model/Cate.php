<?php namespace Common\Model;
use Hdphp\Model\Model;
//分类操作模型
class Cate extends Model{
	//指定模型操作的表(固定的写法)
    protected $table = "category";
	//自定验证（固定写法）
	protected $validate = array( 
		//array(字段名,验证方法,错误信息,验证条件,验证时间)
        array('cname','required','分类名称不能为空',3,3),
        array('ctitle','required','分类标题不能为空',3,3),
        array('csort','num:0,65535','分类排序必须为数字且是0-65535之间',3,3),
    );
	
	//此方法是自定义的，未来想添加的时候直接调这个方法就可以添加了
	public function addData(){
		//调用add方法之前，必须经过create，否则无法添加
		//create才会触发自动验证
		if($this->create()){
			//调用框架里面的添加方法
			$this->add();
			return true;
		}
		return false;
	}
	
	
	//修改
	public function editData(){
		if(!$this->create()) return false;
		//如果想不加where就能修改，那么必须在页面放主键的隐藏域
		$this->save();
		return true;
	}
	
	//获得除了自己和自己的所有的子集的分类
	public function getNoMy($cid){
		//获得所有子集分类的cid
		$cids = $this->getSon($this->get(), $cid);
		//把自己压进去
		$cids[] = $cid;
		//变成字符串形式 21,22,24,20
		$strCids = implode(',', $cids);
		//返回结果
		return $this->where("cid NOT IN({$strCids})")->get();
	}
	
	/**
	 * 递归获得所有的子集的cid
	 * @param $data 全部分类数据
	 * @param $cid 当前分类的cid
	 */
	public function getSon($data,$cid){
		$temp = array();
		foreach ($data as $v) {
			//找到了子集
			if($v['pid'] == $cid){
				$temp[] = $v['cid'];
				$temp = array_merge($temp,$this->getSon($data, $v['cid']));
			}
		}
		return $temp;
	}
	
	
	
}




