<?php namespace Admin\Controller;

use Hdphp\Controller\Controller;

//测试控制器
class IndexController extends Controller{

	//构造函数
	public function __init()
	{
	}

    //动作
    public function index(){
			if(IS_POST){
				$model = new \Common\Model\Category;
				if($model->store()) View::success('添加成功');
				View::error($model->getError());
			}
			$this->display();


    }


}










?>
