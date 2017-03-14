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
       View::make();
    }


    //uploadify异步上传
	public function upload()
	{
	    $file = Upload::path('Upload/Content/' . date('y/m'))->make();
	    if (empty($file)) {
	        // 相当于：echo json_encode(Upload::getError());exit;
	        $this->ajax(Upload::getError());
	    } else {
	        /** $file内部就是以下这个数组
	            $file = array(
	                0 => array(
		                'path' => 'Upload/Content/15/8/123981239172.jpg'    ,
		                'url' => 'http://localhost/cms_edu/Upload/Content/15/8/123981239172.jpg',
		                'image' => 1
	            ),
	        );**/
	        //上传成功，把上传好的信息返给js 也就是uploadify
	        $data = $file[0];
	        // 相当于：echo json_encode($data);exit;
	        $this->ajax($data);
	    }
	}












}
