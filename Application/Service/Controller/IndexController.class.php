<?php

namespace Service\Controller;

use Think\Controller;

require_once VENDOR_PATH . 'aliyun-openapi-php-sdk/aliyun-php-sdk-core/Config.php';
use \Dm\Request\V20151123 as Dm;
use \Sms\Request\V20160927 as Sms;
use Org\Util\String;

class IndexController extends Controller {
	public function index() {
		$this->show ( '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8' );
	}
	
	// 发送邮箱验证邮件
	public function sendEmialVerify($toEmail) {
		// 获取邮件模板
		// 生成
		$code = String::randString ( 4, 1 );
		$this->assign ( "verifyCode", $code );
		$this->assign ( "toMail", $toEmail );
		$content = $this->fetch ( 'Email:verify' );
		$paras = array ();
		$paras [] = "no-reply@notify.shandawei.com";
		$paras [] = $toEmail;
		$paras [] = "平台邮箱验证";
		$paras [] = $content;
		
		$servicer = D ( 'Servicer' );
		
		$returnObject = runExceptionMethon ( 'sendEmail', $servicer, $paras );
		
		$result = json_encode ( $returnObject, true );
		
		if ($result ['status']) {
			
			$serverCodeKey = 'verify-code-' . $toEmail;
			S ( $serverCodeKey, $code, 86400 );
			echo generateReturnJson ( true, '验证码发送成功', array (
					'codeKey' => $serverCodeKey 
			) );
		} else {
			echo generateReturnJson ( false, '验证码发送失败,请稍后重试' );
		}
	}
	
	// 发送邮箱验证邮件
	public function modifyPasswordToSendMail($toEmail) {
		// 获取邮件模板
		// 生成
		$this->assign ( "toMail", $toEmail );
		$content = $this->fetch ( 'Email:resetPwd' );
		$paras = array ();
		$paras [] = "no-reply@notify.shandawei.com";
		$paras [] = $toEmail;
		$paras [] = "平台邮箱验证";
		$paras [] = $content;
	
		$servicer = D ( 'Servicer' );
	
		$returnObject = runExceptionMethon ( 'sendEmail', $servicer, $paras );
	
		$result = json_encode ( $returnObject, true );
	
		if ($result ['status']) {
				
			echo generateReturnJson ( true, '邮件发送成功');
		} else {
			echo generateReturnJson ( false, '邮件发送失败,请稍后重试' );
		}
	}
	
	// 发送手机验证码
	public function sendVerifyCode($mobile) {
		$paras = array ();
		$paras [] = $mobile;
		$paras [] = 'SMS_18370296';
		$paras [] = "推送精灵";
		
		$code = String::randString ( 4, 1 );
		
		$cacheKey = String::keyGen ();
		
		$paras [] = array ("code" => "$code");
		
		// return ;
		
		$servicer = D ( 'Servicer' );
		
		$returnObject = runExceptionMethon ( 'sendSms', $servicer, $paras );
		
		$result = json_encode ( $returnObject, true );
		
		if ($result ['status']) {
			S ( "$cacheKey", $code, 1800 );
			echo generateReturnJson ( true, '验证码发送成功', array ('codeKey' => $cacheKey) );
		} else {
			echo generateReturnJson ( false, '验证码发送失败,请稍后重试' );
		}
		
		// dump($returnObject);
	}
	
	// 进行验证码验证的操作
	public function checkVerifyCode($codeKey, $code) {
		if (empty ( $codeKey ) || empty ( $code )) {
			echo generateReturnJson ( false, '必须参数不能为空' );
		} else {
			$serverCode = S ( $codeKey );
			if (empty ( $serverCode )) {
				echo generateReturnJson ( false, '验证码已经过期,请重新发送' );
			} else {
				if ($serverCode == $code) {
					S ( $codeKey, NULL );
					echo generateReturnJson ( true, '验证码正确' );
				} else {
					echo generateReturnJson ( false, '验证码不正确' );
				}
			}
		}
	}
	public function verifyEmail($email, $code) {
		$serverCodeKey = 'verify-code-' . $email;
		if (empty ( $email ) || empty ( $code )) {
			echo generateReturnJson ( false, '必须参数不能为空' );
		} else {
			$serverCode = S ( $serverCodeKey );
			if (empty ( $serverCode )) {
				echo generateReturnJson ( false, '已经过期,请重新发送' );
			} else {
				if ($serverCode == $code) {
					S ( $serverCodeKey, NULL );
					echo generateReturnJson ( true, '验证码正确' );
				} else {
					echo generateReturnJson ( false, '验证码不正确' );
				}
			}
		}
	}
}