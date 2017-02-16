<?php

namespace HealthManager\Controller;

use Think\Controller;

class CommonController extends Controller {
	function _initialize() {
		// 在此处进行相关的参数操作是否合法
		$appId = I ( 'appId' );
		if (! empty ( $appId )) {
			if (! ($this->isOwnApp ( $appId ))) {
				E ( '无操作权限' );
			}
		}
		
	}
	// /判断本用户是否
	private function isOwnApp($appId) {
		$appIds = session ( 'appIds' );
		return in_array ( array ('app_id' => $appId), $appIds );
	}
	
	//上传图片
	public  function upload(){
		$upload = new \Think\Upload();// 实例化上传类
		$upload->maxSize   =     3145728 ;// 设置附件上传大小
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
		$upload->rootPath  =     './Public/Uploads/'; // 设置附件上传根目录
		$upload->savePath  =     ''; // 设置附件上传（子）目录
		$upload->saveName = array('guid', '');//上传文件的保存规则
		$upload->autoSub  = false;//禁用子目录
		 
		// 上传文件
		$info   =   $upload->upload();
	
		return $info;
// 		if(!$info) {// 上传错误提示错误信息
// 			//$this->error($upload->getError());
// 			$errorMessage=$upload->getError();
// 			$return['status']=0;
// 			$return['message']=$errorMessage;
// 		}else{// 上传成功
// 			// $this->success('上传成功!');
// 			$return['status']=1;
// 		}
		
// 		$this->ajaxReturn($return);
		 
	}
	
}