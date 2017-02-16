<?php

namespace Service\Model;

require_once VENDOR_PATH . 'aliyun-openapi-php-sdk/aliyun-php-sdk-core/Config.php';
use \Dm\Request\V20151123 as Dm;
use \Sms\Request\V20160927 as Sms;

class ServicerModel {
	protected $trueTableName = 'sdw_iphone7_push_info';
	protected $accessKeyId = "QLYEGXfbIGz0HLXT";
	protected $accessSecret = "Vu0Iqs5Dv9kiQmmxhCGYW9j0RoKneA";
	
	//发送邮件
	public function sendEmail($fromEmail, $toEmail, $subject, $content, $fromAlias = "", $tagName = "") {
		// 判断参数异常
		if (! check ( $fromEmail, 'email' )) {
			myThrow ( '发送者的邮箱地址格式有问题' );
		}
		if (! check ( $toEmail, 'email' )) {
			myThrow ( '接受者的邮箱地址格式有问题' );
		}
		if (empty ( $subject )) {
			myThrow ( '邮件主题不能为空' );
		}
		if (empty ( $content )) {
			myThrow ( '邮件内容不能为空' );
		}
		
		$iClientProfile = \DefaultProfile::getProfile ( "cn-beijing", $this->accessKeyId, $this->accessSecret );
		$client = new \DefaultAcsClient ( $iClientProfile );
		$request = new Dm\SingleSendMailRequest ();
		$request->setAccountName ( $fromEmail ); // 发件人邮箱
		$request->setFromAlias ( $fromAlias ); // 发件人昵称
		$request->setAddressType ( 1 );
		$request->setTagName ( $tagName ); // 控制台创建的标签
		$request->setReplyToAddress ( "true" );
		$request->setToAddress ( $toEmail ); // 收件人邮箱
		$request->setSubject ( $subject ); // 邮件主题
		
		$request->setHtmlBody ( $content );
		try {
			$response = $client->getAcsResponse ( $request );
			// print_r($response);
			return generateReturnJson ( true, '发送邮件成功' );
		} catch ( \ClientException $e ) {
			// print_r($e->getErrorCode());
			// print_r($e->getErrorMessage());
			myThrow ( $e->getErrorMessage () );
		} catch ( \ServerException $e ) {
			// print_r($e->getErrorCode());
			// print_r($e->getErrorMessage());
			myThrow ( $e->getErrorMessage () );
		}
	}
	
	//发送短信
	public function sendSms($mobile, $templateCode, $signName, $paramaters) {
		$iClientProfile = \DefaultProfile::getProfile ( "cn-beijing", $this->accessKeyId, $this->accessSecret );
		$client = new \DefaultAcsClient ( $iClientProfile );
		$request = new Sms\SingleSendSmsRequest ();
		$request->setSignName ( $signName ); /* 签名名称 */
		$request->setTemplateCode ( $templateCode ); /* 模板code */
		$request->setRecNum ( $mobile ); /* 目标手机号 */
		$request->setParamString ( json_encode ( $paramaters ) ); /* 模板变量，数字一定要转换为字符串 */
		try {
			$response = $client->getAcsResponse ( $request );
			// print_r($response);
			return generateReturnJson ( true, '发送短信成功' );
		} catch ( \ClientException $e ) {
			// print_r($e->getErrorCode());
			// print_r($e->getErrorMessage());
			myThrow ( $e->getErrorMessage () );
		} catch ( \ServerException $e ) {
			// print_r($e->getErrorCode());
			// print_r($e->getErrorMessage());
			myThrow ( $e->getErrorMessage () );
		}
	}
}

?>
