<?php

namespace HealthManager\Behavior;

use Think\Controller;

/**
 * 用来检测是否登陆以及是否有操作权限的行为
 */
class CheckAccessBehavior extends Controller {
	public function run(&$params) {
// 		return;
		$this->checkLogin ();
	}
	
	/**
	 * 检测是否需要登陆的内容
	 *
	 * 检测是否登陆
	 *
	 * @param
	 *        	无
	 *        	
	 */
	private function checkLogin() {
		$name = MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME;
		// 判断是否是登陆页面
// 		if ($name == 'HealthManager/Member/signIn') {
// 			return;
// 		}
		if ($name == 'HealthManager/Doctor/signIn') {
			return;
		}
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		if (!$userInfo) {
			
			// $this->redirect('admin.ainia.com.cn');
			// 跳转到初始页面
			$this->redirect('/index.php/HealthManager/Doctor/signIn');
			//redirect ( 'signIn' );
		} else {
			// 登录之后才检测权限
			$this->checkAuthority ($uid);
		}
	}
	
	// 检测权限的函数
	private function checkAuthority($uid) {
		// 初始化Auth类
		$auth = new \Think\Auth ();
		// 需要验证的规则列表,支持逗号分隔的权限规则或索引数组
		$name = MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME;
// 		echo "$name";die;
		// 当前用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo ['uid'];
		//公共头部返回信息
		//获取用户信息
		$userData = D ( 'UserCenter/UserProfile' )->where ( 'uid='.$uid )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
		$this->assign ( "userData", $userData );
		
// 		//个人健康管理获取未读消息数
// 		$map['type'] = array('neq',5);
// 		$map['to_user_id'] = array('neq','all');
// 		$map['status'] = array('eq',0);
// 		$type = 1;
// // 		医生健康管理获取未读消息数
		$map['user_id'] = $uid;
		$map['to_user_id'] = array('eq','all');
		$map['status'] = array('eq',0);
		$noReadMessageCount = M('info_message')->where($map)->count();
		$this->assign ( 'noReadMessageCount', $noReadMessageCount );
		$type = 2;//用户角色2为医生
		
		if ($auth->check ( $name, $uid, $type)) {
		} else {
			$this->redirect ( '/DefaultPage/show404' );
			
			// echo "验证不通过";
			// $this->display('DefaultPage:500');
			die ( '无权限' );
			exit ();
		}
	}
}

?>
