<?php
class BrandAction extends CommonAction{
	public function index(){
		$this->brand = M('brand')->order('sort')->select();
		$this->display();
	}

	/**
	 * 添加品牌
	 */
	public function add(){
		if (IS_POST){
			$_POST['ishot'] = isset($_POST['ishot']) ? 1 : 0;
			if(M('brand')->add($_POST)){
				$this->success('添加品牌成功', U('index'));
				die;
			}else{
				$this->error('添加品牌失败');
				die;
			}
		}
		$this->display();
	}

	public function edit(){

	}

	public function del(){

	}

	/**
	 * 品牌LOGO图上传
	 * @return [type] [description]
	 */
	public function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->savePath = './Uploads/Logo/';
		$upload->allowExts = array('gif', 'png', 'jpg', 'jpeg');
		if(!$upload->upload()){
			echo json_encode(array(
				'status' => 0,
				'msg' => $upload->getErrorMsg()
				));
		}else{
			$info = $upload->getUploadFileInfo();
			echo json_encode(array(
				'status' => 1,
				'name' => $info[0]['savename']
				));
		}
	}




}