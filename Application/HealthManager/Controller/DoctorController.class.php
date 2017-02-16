<?php

namespace HealthManager\Controller;

use Think\Controller;
use Org\Util\String;

require_once VENDOR_PATH . 'oss_php/oss_functions.php';


class DoctorController extends CommonController {
	public function index() {
		$this->show ( '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8' );
	}
	
	// 获取用户信息
	public function getUserInfo() {
		setHeader ();
		$data = $uid;
		// 		p($data);die;
		$user = D ( 'UserCenter/User' );
		$result = runExceptionMethon ( 'getUserInfo', $user );
		echo $result;
	}
	
	// 概况总览
	public function dashboard() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=2')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '32' );
		
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
// 		//获取健康报表数据
// 		$reportData = M('result_report')->where('uid='.$uid)->group('report_type')->order ( 'add_time DESC' )->select();
// 		foreach ($reportData as $k=>$v){
// 			$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
// 			$reportArray[] = $v;
// 		}
		
// 		$this->assign ( "reportArray", $reportArray );

		//获取咨询列表数据
		$map['doctor_id'] = $uid;
		$consultationData = M('info_ask')->where($map)->limit(10)->select();
		//获取咨询详情数据
		foreach ($consultationData as $v){
			$uid = $v['uid'];
			$doctorId = $v['doctor_id'];
			//跨模块调用userCenter模型,获取用户信息
// 			$userData = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->select ();
			$userData = R ( 'UserCenter/Api/getInfo', array("$uid") );
			$doctorData = R ( 'UserCenter/Api/getInfo', array("$doctorId") );
			//用户信息
			$v['userTinyName'] = $userData['tinyName'];
			$v['userAvatar'] = $userData['avatar'];
			//医生信息
			$v['DoctorTinyName'] = $doctorData['tinyName'];
			$v['DoctorAvatar'] = $doctorData['avatar'];
			
			$consultationArray[] = $v;
		}
// 		p($consultationArray);
		$this->assign('consultationArray',$consultationArray);
		
		$this->display ();
	}
	
	//会员管理
	public function userList(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '40' );
		// 设置界面显示
		$this->assign ( "title", "会员列表" );
		$this->assign ( "discription", "此界面将会显示您的您的会员信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "icon-user" );
		$this->assign ( "parentTitle", "会员管理" );
		
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$this->display ();
	}
	
	//咨询管理
	public function userAskList(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '42' );
		// 设置界面显示
		$this->assign ( "title", "咨询列表" );
		$this->assign ( "discription", "此界面将会显示您的您的患者咨询信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "icon-user" );
		$this->assign ( "parentTitle", "咨询管理" );
	
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$this->display ();
	}
	
	//档案列表
	public function archivesList(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '46' );
		// 设置界面显示
		$this->assign ( "title", "档案列表" );
		$this->assign ( "discription", "此界面将会显示您的您的患者档案信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "icon-user" );
		$this->assign ( "parentTitle", "档案管理" );
		
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$map['doctor_id'] = $uid;
		//从档案表获取患者id
		$healthRecordData = M('info_health_record')->where($map)->find();
		$userId = $healthRecordData['uid'];
		
		$match['uid'] = $userId;
		//获取档案数据
		$healthRecordArray = D('UserHealthRecord')->where($match)->select();
		$this->assign('healthRecordArray',$healthRecordArray);
		
		$this->display ();
	}
	
	//添加健康档案
	public function addArchives(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '44' );
		// 设置界面显示
		$this->assign ( "title", "添加健康档案" );
		$this->assign ( "discription", "此界面将会显示您的患者健康档案信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-th-list" );
		$this->assign ( "parentTitle", "健康档案管理" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		//获取用户id
		$uid = $userInfo['uid'];
	
	
		$this->display ();
	}
	
	//编辑健康档案
	public function editArchives(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '45' );
		// 设置界面显示
		$this->assign ( "title", "编辑健康档案" );
		$this->assign ( "discription", "此界面将会显示您的患者健康档案信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-th-list" );
		$this->assign ( "parentTitle", "健康档案管理" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		//获取用户id
		$uid = $userInfo['uid'];
	
	
		$this->display ();
	}
	
	//获取医生回复该条问诊的数据
	public function ajax_getAnswerData(){
		//获取医生id
		$userInfo = session ( 'userInfo' );
		$doctorId = $userInfo['uid'];
		//获取用户id
		$uid = I_E('uid');
		//获取问诊id
		$askId = I_E('askId');
	
		//获取咨询列表数据
		$map['doctor_id'] = $doctorId;
		$consultationData = M('info_ask')->where($map)->select();
		//获取咨询详情数据
		foreach ($consultationData as $v){
			$uid = $v['uid'];
			$doctorId = $v['doctor_id'];
			//跨模块调用userCenter模型,获取用户信息
			$userData = R ( 'UserCenter/Api/getInfo', array("$uid") );
			$doctorData = R ( 'UserCenter/Api/getInfo', array("$doctorId") );
			//用户信息
			$v['userTinyName'] = $userData['tinyName'];
			$v['userAvatar'] = $userData['avatar'];
			//医生信息
			$v['DoctorTinyName'] = $doctorData['tinyName'];
			$v['DoctorAvatar'] = $doctorData['avatar'];
			
			$consultationArray[] = $v;
		}
		p($consultationArray);
		p($result);die;
	
// 		if($result > 0){
// 			$this -> ajaxReturn($result);
// 		}else{
// 			$returnArray=array();
// 			$returnArray['status']=0;
// 			$this -> ajaxReturn($returnArray);
	
// 		}
	
// 		die;
	
	}
	
	//健康信息 start
	//心电贴报告列表
	public function sstReportList(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '11' );
		// 设置界面显示
		$this->assign ( "title", "心电信息" );
		$this->assign ( "discription", "此界面将会显示您的您的心电信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',3);
		
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,5);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
		
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			$reportArray[] = $v;
			
		}
		$this->assign ( "reportArray", $reportArray );
// 		p($reportArray);

		$this->display ();
	
	}
	
	//血糖报告列表
	public function bloodSugartList(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '12' );
		// 设置界面显示
		$this->assign ( "title", "血糖信息" );
		$this->assign ( "discription", "此界面将会显示您的您的血糖信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',5);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			$reportArray[] = $v;
				
		}

		$this->assign ( "reportArray", $reportArray );
		//p($reportArray);
	
		$this->display ();
	
	}
	
	//保存血糖数据
	public function ajax_saveBGData(){
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取测量时间
		$detectTime = I_E ( 'detect_time' );
		//获取浓度值
		$bloodSugar = I_E ( 'blood_sugar' );
		
		$detectData = array();
		$detectData['uid'] = $uid;
		$detectData['detect_time'] = $detectTime;
		$detectData['blood_sugar'] = $bloodSugar;
		$detectData['add_time'] = time_format ( time () );
		
		$result = M('data_blood_sugar')->where('uid='.$uid)->add($detectData);
		
		if($result){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
				
		}
	}
	
	//十二导联报告列表
	public function twelveECGReportList(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '13' );
		// 设置界面显示
		$this->assign ( "title", "十二导联信息" );
		$this->assign ( "discription", "此界面将会显示您的您的十二导联信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',1);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			$reportArray[] = $v;
	
		}
		
		$this->assign ( "reportArray", $reportArray );
		//p($reportArray);
	
		$this->display ();
	
	}
	
	//血压计报告列表
	public function dbpReportList(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '14' );
		// 设置界面显示
		$this->assign ( "title", "血压信息" );
		$this->assign ( "discription", "此界面将会显示您的您的血压信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',4);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			$reportArray[] = $v;
	
		}
		$this->assign ( "reportArray", $reportArray );
		//p($reportArray);
	
		$this->display ();
	
	}
	
	//保存血压数据
	public function ajax_saveDBPData(){
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取测量时间
		$detectTime = I_E ( 'detect_start_time' );
		//获取收缩压
		$avgSp = I_E ( 'avg_sp' );
		//获取舒张压
		$avgDp = I_E ( 'avg_dp' );
		//获取心率
		$avgHr = I_E ( 'avg_hr' );
	
		$detectData = array();
		$detectData['uid'] = $uid;
		$detectData['detect_start_time'] = $detectTime;
		$detectData['avg_sp'] = $avgSp;
		$detectData['avg_dp'] = $avgDp;
		$detectData['avg_hr'] = $avgHr;
		$detectData['add_time'] = time_format ( time () );
	
		$result = M('data_dynamic_bp')->where('uid='.$uid)->add($detectData);
	
		if($result){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
	
		}
	}
	
	//健康信息 end
	
	//健康咨询 start
	//我要咨询
	public function userSendConsultingInfo(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '16' );
		// 设置界面显示
		$this->assign ( "title", "我要咨询" );
		$this->assign ( "discription", "此界面将会显示您的您的我要咨询信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-edit" );
		$this->assign ( "parentTitle", "健康咨询" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		//获取科室信息
		$departmentInfo = M('info_hospital_department')->select();
		$this->assign('departmentInfo',$departmentInfo);
		
		//筛选
		
		$map['department_id'] = I('get.did');
		$map['user_type'] = array('eq',2);
		
		$m = D ( 'UserCenter/UserProfile' );
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
		
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->limit($p->firstRow, $p->listRows)->select ();
		
		$doctorArray = $this->getHSPName ( $userInfo );
		
		foreach ($doctorArray as $k=>$v){
			$v['avatar'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['avatar'];
			$doctorListArray[] = $v;
		}
		
// 		p($doctorListArray);
		$this->assign('doctorListArray',$doctorListArray);
		
		$this->display ();
	
	}
	
	//异步查询所属科室的医生
	public function ajax_getDoctorInfo(){
		//获取科室id
		$did = I_E ( 'did' );
		$map['department_id'] = $did;
		$map['user_type'] = array('eq',2);
		
		$userCount = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->count ();
		if($userCount > 0){
			$m = D ( 'UserCenter/UserProfile' );
			$count = $m->count();
			$p = getpage($count,1);
			$this->assign('select', $list); // 赋值数据集
			$this->assign('page', $p->show()); // 赋值分页输出
				
			$userArray = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->limit($p->firstRow, $p->listRows)->select ();
				
			$doctorArray = $this->getHSPName ( $userArray );
				
			foreach ($doctorArray as $k=>$v){
				$v['avatar'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['avatar'];
				$doctorListArray[] = $v;
			}
			
			$this -> ajaxReturn($doctorListArray);
			
		}else{
			
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
			
		}
	}
	
	// 获取医院.科室.职称名称
	private function getHSPName($doctorInfo) {
		foreach ( $doctorInfo as $v ) {
			// 获取用户的医院id、职称id、科室id
			$userId = $v ['uid'];
			// 获取用户的医院id、职称id、科室id
			$info = M ( 'user_info_extra' )->where ( 'uid=' . $userId )->find ();
			$hospitalId = $info ['hospital_id'];
			$departmentId = $info ['department_id'];
			$subdisciplineId = $info ['subdiscipline_id'];
			$positionId = $info ['position_id'];
				
			if ($hospitalId) {
				// 获取用户的医院名称
				$hospitalInfo = M ( 'info_hospital' )->where ( 'id=' . $hospitalId )->find ();
				$hospitalName = $hospitalInfo ['name'];
	
				// 获取科室名称
				$departmentInfo = M ( 'info_hospital_department' )->where ( 'department_id=' . $departmentId )->find ();
				$departmentName = $departmentInfo ['department_name'];
				
				// 获取分科室名称
				$subdisciplineInfo = M ( 'info_hospital_subdiscipline' )->where ( 'subdiscipline_id=' . $subdisciplineId )->find ();
				$subdisciplineName = $subdisciplineInfo ['subdiscipline_name'];
	
				// 获取职称名称
				$positionInfo = M ( 'info_hospital_position' )->where ( 'position_id=' . $positionId )->find ();
				$positionName = $positionInfo ['position_name'];
			} else {
				$hospitalName = '';
				$subdisciplineName = '';
				$positionName = '';
			}
				
			$v ['hospitalName'] = $hospitalName;
			$v ['departmentName'] = $departmentName;
			$v ['subdisciplineName'] = $subdisciplineName;
			$v ['positionName'] = $positionName;
				
			$doctorListArray [] = $v;
		}
	
		return $doctorListArray;
	}
	
	//发送咨询数据
	public function postAskContent(){
		//获取用户id
		$uid = I_E('uid');
		//获取咨询医生id
		$doctorId = I_E('doctorId');
		$content = I_E('content');
		
		$info = $this->upload();
		
		if(!$info){//判断图片是否上传成功
			$returnArray ['message'] = '未上传图片';
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}else{
			$bucket = 'ainia';
			$fileKey = "apps/nap/askAttachment/".$info['file']['savename'];
			$filePath =  'Public/Uploads/'.$info['file']['savename'];
			$fileType = $info['file']['ext'];
			$ossData = upload_oss_resource($bucket, $fileKey, $filePath, $fileType);
			
			//添加附件到附件表
			$appendixData = array();
			$appendixData['url'] = $fileKey;
			$appendixData['create_time'] = time_format ( time () );
			$appendixId = M('info_appendix')->add($appendixData);
				
			//添加数据到问诊表
			$data = array ();
			$data ['uid'] = $uid;
			$data ['doctor_id'] = $doctorId;
			$data ['content'] = $content;
			$data ['appendix_id'] = $appendixId;
			$data ['create_time'] = time_format ( time () );
			$askId = M('info_ask')->where("uid=".$uid)->add($data);
			M('info_ask')->where("ask_id=".$askId)->setField('consultation_id',$askId);
			
			$this->success('咨询成功','userSendConsultingInfo');
				
		}
		
	}
	
	//健康咨询 end
	
	//健康档案
	public function healthFile(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '18' );
		// 设置界面显示
		$this->assign ( "title", "健康档案" );
		$this->assign ( "discription", "此界面将会显示您的健康档案信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-th-list" );
		$this->assign ( "parentTitle", "健康档案" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		//获取用户id
		$uid = $userInfo['uid'];
		
		$map['uid'] = $uid;
		//从档案表获取医生id
		$healthRecordData = M('info_health_record')->where($map)->find();
		$doctorId = $healthRecordData['doctor_id'];
		
		$match['doctor_id'] = $doctorId;
		//获取档案数据
		$healthRecordArray = D('DoctorHealthRecord')->where($match)->select();
		$this->assign('healthRecordArray',$healthRecordArray);
		
		$this->display ('healthFile');
	}
	
	//健康档案
	public function healthFileDetail(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '18' );
		// 设置界面显示
		$this->assign ( "title", "健康档案详情" );
		$this->assign ( "discription", "此界面将会显示您的健康档案详情信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-th-list" );
		$this->assign ( "parentTitle", "健康档案" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		//获取用户id
		$uid = $userInfo['uid'];
	
		$map['uid'] = $uid;
		
		//获取患者信息
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
		$this->assign('userInfo',$userInfo);
	
		$this->display ();
	}
	
	// 账户基础信息
	public function accountBaseInfo() {
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '6' );
		// 设置界面显示
		$this->assign ( "title", "基本信息" );
		$this->assign ( "discription", "此界面将会显示您的账户信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-object-ungroup" );
		$this->assign ( "parentTitle", "账户中心" );
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		//获取用户id
		$userId = $userInfo['uid'];
		$match = array ();
		$match ['uid'] = $userId;
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $match )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
		$this->assign('userInfo',$userInfo);
		
		$this->display ();
	}
	
	//消息中心
	public function messageCenter(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '10' );
		// 设置界面显示
		$this->assign ( "title", "消息提醒" );
		$this->assign ( "discription", "此界面将会显示您的您的消息信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-comment" );
		$this->assign ( "parentTitle", "消息中心" );
		//获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$m = M('info_message');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
		
		
		//获取系统消息0为系统消息 1为公司活动 2为报告(报告是自动生成的不在消息表中) 3banner活动4.问诊数据5.医生群发消息6.名医问诊
		$map['type'] = array('eq',0);
		$systemMessageArray = $m->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		$this->assign ( 'systemMessageArray', $systemMessageArray );
		
		//获取健康消息
		$map['type'] = array('eq',5);
		$healthMessageArray = $m->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		$this->assign ( 'healthMessageArray', $healthMessageArray );
		
		
		//获取通知消息
		$map['type'] = array('eq',6);
		$askMessageArray = $m->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		$this->assign ( 'askMessageArray', $askMessageArray );
		
		$this->display ('messageCenter');
	}
	
	//消息详情
	public function messageDetail(){
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '9' );
		// 设置界面显示
		$this->assign ( "title", "消息提醒" );
		$this->assign ( "discription", "此界面将会显示您的您的消息信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-comment" );
		$this->assign ( "parentTitle", "消息中心" );
		//获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取消息id
		$messageId = I_E ( 'message_id' );
		$map['message_id'] = $messageId;
		$messageInfo = M('info_message')->where($map)->find();
		$this->assign ( 'messageInfo', $messageInfo );
		
		$this->display ('messageDetail');
	}
	
	//修改消息状态
	public function ajax_changeStatus(){
		//获取消息id
		$mid = I_E ( 'mid' );
		$map['message_id'] = $mid;
		$result = M('info_message')->where($map)->setField('status',1);
		
		if($result > 0){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
				
		}else{
				
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
				
		}
		
		die;
	}
	
	// 账户认证信息
	public function accountVerifyInfo() {
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '8' );
		// 设置界面显示
		$this->assign ( "title", "认证信息" );
		$this->assign ( "discription", "此界面将会显示您的您的账户认证信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-object-ungroup" );
		$this->assign ( "parentTitle", "账户中心" );
		
		$this->display ();
	}
	
	// 安全中心
	public function safeCenter() {
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '7' );
		// 设置界面显示
		$this->assign ( "title", "安全中心" );
		$this->assign ( "discription", "此处进行安全的相关操作" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-object-ungroup" );
		$this->assign ( "parentTitle", "账户中心" );
		
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		
		$this->display ();
	}
	
	// 开发文档
	public function documentation() {
		$this->display ();
	}
	
	// 登录页面
	public function signIn() {
		$this->display ();
	}
	
	// 注册页面
	public function signUp() {
		$this->display ();
	}
	
	// 重置密码页面
	public function resetPassword() {
		$this->display ();
	}
	
	// 退出登录
	public function signOut() {
		session ( null );
		$this->redirect ( "signIn" );
	}
	
	//重置密码--第一步找回方式
	public function resetpwdDo(){
		//获取用户账号
		$email = I( "email" );
		$map['email'] = $email;
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
// 		$mobile = hideStar($userInfo['mobile']);
// 		$account = hideStar($account);
		$mobile = $userInfo['mobile'];
		$this->assign ( "email", $email );
		$this->assign ( "mobile", $mobile );
		
		$this->display();
	}
	
	//重置密码--第二步(1)通过保密邮箱找回密码
	public function resetPwdByEmailStep1(){
		//获取用户账号
		$email = I( "email" );
		$mobile = I( "mobile" );
		$this->assign ( "email", $email );
		$this->assign ( "mobile", $mobile );
		
		$array = explode('.', $email);
		$str = $array[0];
		$e = end(explode('@', $str));
		$this->assign ( "e", $e );
		
		$this->display();
	}
	
	//重置密码--第二步(2)通过手机找回密码
	public function resetPwdByMobileStep1(){
		//获取用户账号
		$email = I( "email" );
		$mobile = I( "mobile" );
		$this->assign ( "email", $email );
		$this->assign ( "mobile", $mobile );
		
		$this->display();
	}
	
	//重置密码--通过邮箱获取新密码
	public function getPassword(){
		//获取用户账号
		$email = I( "email" );
		$mobile = I( "mobile" );
		$pwd = I ( "password" );
		$confirmPassword = I ( "confirmPassword" );
		
		$this->display();
	}
	
	//重置密码--设置密码
	public function setPassword(){
		$email = I( "email" );
		$mobile = I( "mobile" );
		$pwd = I ( "password" );
		$confirmPassword = I ( "confirmPassword" );
		$postData = array ();
		$postData ['account'] = $email;
		$postData ['password'] = $pwd;
		$postData ['confirmPassword'] = $confirmPassword;
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/resetPassword';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$this->success('重置密码成功','signIn');
		} else {
			$this->error('重置密码失败,请重试','resetPassword');
		}
		
	}
	
	//重置密码的方法
	public function ajax_resetPassword() {
		$account = I_E ( "email" );
		$pwd = I_E ( "password" );
		
		$postData = array ();
		$postData ['account'] = $account;
		$postData ['password'] = $pwd;
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/resetPassword';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
				
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	
	//修改密码的方法
	public function ajax_changePwd() {
		$data = I();
		$postData = array ();
		$postData = $data;
		
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/changePwd';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
	
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = 0;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	//更新用户头像
	public function ajax_updateUserAvatar(){
		//获取用户id
		$uid = I_E('uid');
		$userType = 2;//用户类型
		$info = $this->upload();
		
		if(!$info){//判断图片是否上传成功
			$returnArray ['message'] = '未上传图片';
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}else{
			$bucket = 'ainia';
			$fileKey = "users/avatars/".$info['file']['savename'];
			$filePath =  'Public/Uploads/'.$info['file']['savename'];
			$fileType = $info['file']['ext'];
			$ossData = upload_oss_resource($bucket, $fileKey, $filePath, $fileType);
			
			// 保存当前数据对象
			$postData = array ();
			$postData ['uid'] = $uid;
			$postData['avatar'] = $fileKey;
			
			$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/updateUserInfo';
			$returnString = get ( $url, $postData );
			$returnObject = json_decode ( $returnString, true );
			
			if ($returnObject) {
				$returnArray ['status'] = $returnObject ['status'];
				$returnArray ['message'] = $returnObject ['message'];
			
				$this->ajaxReturn ( $returnArray );
			} else {
				// 账户中心模块有问题
				$returnArray ['status'] = false;
				$this->ajaxReturn ( $returnArray );
			}
				
		}
		
		
	}
	
	//更新用户信息
	public function ajax_updateUserInfo(){
		$uid = I_E ( 'uid' );
		$data = I();
		$postData = array ();
		$postData = $data;
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/updateUserInfo';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
	
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	
	}
	
	// 登录方法
	public function ajax_signIn() {
		$account = I_E ( "email" );
		$pwd = I_E ( "password" );
		$remember = I_E ( "remember" );
		$postData = array ();
		$postData ['account'] = $account;
		$postData ['password'] = $pwd;
		$postData ['userType'] = 1;
// 		if ($remember == 1) {
// 			setcookie('email', $account, time() + 3600 * 24 * 365);
// 			setcookie('password', $pwd, time() + 3600 * 24 * 365);
// 			setcookie('remember', $remember, time() + 3600 * 24 * 365);
// 		}else{
// 			setcookie('email',$account,time()-3600 * 24 * 365);
// 			setcookie('password',$pwd,time()-3600 * 24 * 365);
// 			setcookie('remember',$remember,time()-3600 * 24 * 365);
// 		}
		
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/signIn';
// 		http://hm.ainia.com.cn/index.php/UserCenter/Api/signIn
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			
			// 设置userInfo到session
			$userInfo = $returnObject ['data'];
			session ( 'userInfo', $userInfo );
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 注册方法
	public function ajax_signUp() {
		$account = I_E ( "email" );
		$pwd = I_E ( "password" );
		$userType = 2;
		
		$postData = array ();
		$postData ['account'] = $account;
		$postData ['password'] = $pwd;
		$postData ['userType'] = $userType;
		
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/signUp';//调用userCenter/Api/signUp方法
		
		//用户注册
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
		
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
		
	}
	
	// 重置密码给邮箱发邮件
	public function ajax_resetPwdByEmail() {
		$email = I_E ( 'email' );
		$postData = array ();
		$postData ['toEmail'] = $email;
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/modifyPasswordToSendMail';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$returnArray ['data'] = $returnObject ['data'];
				
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 发送验证码
	public function ajax_sendVerifyCode() {
		$mobile = I_E ( 'mobile' );
		$postData = array ();
		$postData ['mobile'] = $mobile;
		
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/sendVerifyCode';
		
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			// $returnArray['data'] = $returnObject['data'];
			if ($returnObject ['status']) {
				$codeKey = $returnObject ['data'] ['codeKey'];
				session ( 'mobileVerifyCodeKey', $codeKey );
				session ( 'mobileVerify', $mobile );
			}
			
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 验证手机号
	public function ajax_verifyMobile() {
		$mobile = I_E ( 'mobile' );
		$code = I_E ( 'code' );
		if (session ( 'mobileVerify' ) != $mobile) {
			
			$returnArray ['status'] = false;
			$returnArray ['message'] = '验证出现问题,请重新发送验证码';
			$this->ajaxReturn ( $returnArray );
			return;
		}
		
		$postData = array ();
		$postData ['codeKey'] = session ( 'mobileVerifyCodeKey' );
		$postData ['code'] = $code;
		
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/checkVerifyCode';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 发送验证码到邮箱
	public function ajax_sendVerifyEmail() {
		$userInfo = session ( "userInfo" );
		$email = I_E ( 'email' );
		$isNew = I_E ( 'isNew' );
		if ($isNew == "true") {
			// 检测是否被占有
			$postData = array ();
			$postData ['account'] = $email;
			$postData ['type'] = 'email';
			
			$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/checkDenyUser';
			$returnString = get ( $url, $postData );
			$returnObject = json_decode ( $returnString, true );
			if ($returnObject) {
				if (! $returnObject ['status']) {
					$returnArray ['status'] = false;
					$returnArray ['message'] = $returnObject ['message'];
					$this->ajaxReturn ( $returnArray );
					return;
				}
			} else {
				// 账户中心模块有问题
				$returnArray ['status'] = false;
				$this->ajaxReturn ( $returnArray );
			}
		} else {
			if ($userInfo ['email'] != $email) {
				$returnArray ['status'] = false;
				$returnArray ['message'] = '操作非法';
				$this->ajaxReturn ( $returnArray );
				return;
			}
		}
		$postData = array ();
		$postData ['toEmail'] = $email;
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/sendEmialVerify';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$returnArray ['data'] = $returnObject ['data'];
			
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 邮箱是否验证
	public function ajax_verifyEmailCode() {
		$email = I ( 'email' );
		$userInfo = session ( 'userInfo' );
		
		if (empty ( $email )) {
			$email = $userInfo ['email'];
			if ($userInfo ['email_verify'] == '1') {
				echoReturnJson ( true, '邮箱已经验证,无需操作' );
			}
		}
		
		$code = I_E ( 'code' );
		
		$postData = array ();
		$postData ['email'] = $email;
		$postData ['code'] = $code;
		
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/verifyEmail';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$returnArray ['data'] = $returnObject ['data'];
			
			$postData = array ();
			$postData ['userId'] = $userInfo ['uid'];
			$postData ['email'] = $email;
			$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/setEmailVerified';
			$ucReturnString = get ( $url, $postData );
			$ucReturnObject = json_decode ( $ucReturnString, true );
			if ($ucReturnObject) {
				$returnArray ['status'] = $ucReturnObject ['status'];
				$returnArray ['message'] = $ucReturnObject ['message'];
				if ($ucReturnObject ['status']) {
					$returnArray ['message'] = $returnObject ['message'];
					$userInfo ['email_verify'] = 1;
					$userInfo ['email'] = $email;
					session ( 'userInfo', $userInfo );
				}
				$this->ajaxReturn ( $returnArray );
			} else {
				// 账户中心模块有问题
				$returnArray ['status'] = false;
				$returnArray ['message'] = $returnObject ['message'];
				$this->ajaxReturn ( $returnArray );
			}
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	
	// 获取权限
	private function processMenuArray($menuArray) {
		
		// 获得权限列表先
		$auth = new \Think\Auth ();
		
		$mainMenu = array ();
		// 添加主菜单
		foreach ( $menuArray as $key => $value ) {
			
			if ($value ['p_id'] == 0) {
				
				$mainMenu [] = $value;
				unset ( $menuArray [$key] );
			} else {
				
				$fullUrl = 'HealthManager' . '/' . $value ['url'];
				// 先不做权限验证
				
				// $userInfo = session('memberInfo');
				// $right = $auth->check($fullUrl, $userInfo['id']);
				// if (! $right) {
				// //unset($menuArray[$key]);
				// }
			}
		}
		// 添加子菜单
		
		foreach ( $mainMenu as $key => $value ) {
			
			$id = $value ['id'];
			
			$subMenu = array ();
			foreach ( $menuArray as $key1 => $value1 ) {
				
				if ($value1 ['p_id'] == $id) {
					
					$subMenu [] = $value1;
					unset ( $menuArray [$key1] );
				}
			}
			
			if (empty ( $subMenu )) {
				unset ( $mainMenu [$key] );
			} else {
				$mainMenu [$key] ['subTitles'] = $subMenu;
			}
		}
		
		return $mainMenu;
	}
	
	
}