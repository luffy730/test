<?php namespace Common\Model;
use Hdphp\Model\Model;
class Category extends Model{
  protected $table = 'category';

  /**
   * [getAll 获得所有的数据]
   * @return [type] [description]
   */
  public function getAll(){
    static $cateData = NULL;
    if($cateData) return $cateData;
    //获取缓存
    $data = S('category');
    //如果缓存不存在，那么查询数据库，重新设置缓存
    if(!$data){
      //查询数据库
      $temp = $this->get();
      $data = array();
      foreach ($temp as $v) {
        //把cid主键作为键名
        $data[$v['cid']] = $v;
      }
      //设置缓存
      S('category',$data);
    }
    //存入静态变量
    $cateData = $data;
    return $data;
  }

  /**
   * [getOne 获得单条数据]
   * @param  [type] $id [主键id]
   * @return [type]     [description]
   */
  public function getOne($id){
    //获取所有的数据
    $data = $this->getAll();
    if(isset($data[$id])){
        return $data[$id];
    }

  }

  /**
   * [updateCache 更新缓存]
   * @return [type] [description]
   */
  public function updateCache(){
    //清除缓存
    Cache::del('category');
  }

  /**
   * [store 添加]
   * @return [type] [description]
   */
  public function store(){
    if(!$this->create()) return false;
    //更新缓存
    $this->updateCache();
    return $this->add();
  }

}










 ?>
