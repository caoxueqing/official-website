<?php

namespace UserCenter\Controller;

use Think\Controller;

header ( 'Content-Type:application/json' );
//
class ApiController extends Controller {
	public function testxx() {
		// 设置json的Head头
		echo generateReturnJson ( '1', 'post report info sucessfully' );
	}
	
	/**
	 * @Description: 用户注册的方法
	 * @Function: signUp
	 * @Create Time: 2016年8月31日 下午3:34:02
	 *
	 * @author : Shandawei
	 * @return :nil
	 */
	public function signUp() {
		$data = I ();
		$user = D ( 'User' );
		// 接收异常信息,如果不接收,thinkphp就提示系统错误
		$result = runExceptionMethon ( 'signUp', $user );
		echo $result;
	}
	
	// 登录
	public function signIn() {
		$user = D ( 'User' );
		$result = runExceptionMethon ( 'signIn', $user );
		echo $result;
	}
	
	
	//重置密码
	public function resetPassword() {
		$data = I ();
		$user = D ( 'User' );
		$result = runExceptionMethon ( 'resetPassword', $user );
		echo $result;
	}
	
	//修改密码
	public function changePwd() {
		$data = I ();
		$user = D ( 'User' );
		$result = runExceptionMethon ( 'changePwd', $user );
		echo $result;
	}
	
	public function checkDenyUser() {
		$user = D ( 'User' );
		$result = runExceptionMethon ( 'checkDenyUser', $user, [ I ( 'account' ),I ( 'type' ) ] );
		echo $result;
	}
	
	// 验证用户名
	public function checkUsername() {
		$user = D ( 'User' );
		$user->checkAccoutKind ( I_E ( 'account' ) );
		$result = runExceptionMethon ( 'checkAccoutKind', $user );
		echo $result;
	}
	
	// 获取用户信息
	public function getUserInfo() {
		setHeader ();
		$data = I ();
		$user = D ( 'User' );
		$result = runExceptionMethon ( 'getUserInfo', $user );
		echo $result;
	}
	
	//个人健康管理调取该接口返回用户信息的数据
	public function getInfo($uid) {
		setHeader ();
		$result = D('UserCenter/User') -> getUInfo($uid);
		return $result;
	}
	
	// 更新用户信息
	public function updateUserInfo() {
		$data = I ();
		$user = D ( 'User' );
		$result = runExceptionMethon ( 'updateUserInfo', $user );
		echo $result;
	}
	
	//设置邮箱验证状态
	public function setEmailVerified() {
		$data = I ();
		$user = D ( 'User' );
		$result = runExceptionMethon ( 'setEmailVerified', $user );
		echo $result;
	}
	
	
	// 注册用户的接口
	public function registerUser() {
		$data = I ();
		$user = D ( 'User' );
		$result = $user->create ( $data );
		if ($result) {
			$user->add ();
		} else {
			dump ( $user->getError () );
		}
	}
	
	public function index() {
		$this->show ( '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8' );
	}
	
	public function testUser() {
		$data = I ();
		$user = D ( 'User' );
		$result = $user->create ( $data );
		
		if ($result) {
			
			$user->add ();
		} else {
			
			dump ( $user->getError () );
		}
	}
	
	// 获取用户ip
	public function getIp() {
		echo get_client_ip ();
	}
	
	
	public function test() {
		dump ( $_REQUEST );
		dump ( $_POST );
		
		return;
		$data = $_POST ['password'];
		dump ( $data );
		$user = D ( 'User' );
		$user->create ( $data );
		$user->login ();
	}
}
