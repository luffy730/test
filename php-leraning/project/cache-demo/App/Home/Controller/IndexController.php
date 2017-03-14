<?php namespace Home\Controller;

use Hdphp\Controller\Controller;

//测试控制器
class IndexController extends Controller{

	//构造函数
	public function __init()
	{
	}

    //动作
    public function index(){
				$model = new \Common\Model\Category;

				// $data = $model->getAll();
				// p($data);
				// //第二次查询的时候会直接调取静态变量
				$data = $model->getAll();
				p($data);

				// $data = $model->getOne(1);
				// p($data);


    }


}










?>
