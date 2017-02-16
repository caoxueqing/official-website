<?php
require_once 'sdk.class.php';
require_once 'util/oss_util.class.php';
require_once 'oss_base.php';

function upload_oss_resource_by_multiPart($bucket, $fileKey, $filePath, $fileType) {
	$oss = new ALIOSS ( OSS_ACCESS_ID, OSS_ACCESS_KEY, OSS_ENDPOINT );
	
	if (file_exists ( $filePath )) {
		
		echo "存在";
	} else {
		
		echo "bu存在" . $filePath;
	}
	
	// return;
	
	$options = array (
			ALIOSS::OSS_FILE_UPLOAD => $filePath,
			'partSize' => 5242880 
	)
	// 'Content-Type'=>$fileType,
	;
	$res = $oss->create_mpu_object ( $bucket, $fileKey, $options );
	
	if ($res) {
		
		echo "sucessfully";
	} else {
		
		echo "unsucessfully";
	}
}

// 根据objectKey和Bucket活动签名后的地址
function get_oss_resource_url($bucket, $fileKey) {
	$oss = new ALIOSS ( OSS_ACCESS_ID, OSS_ACCESS_KEY, OSS_ENDPOINT );
	$timeout = 3600;
	$response = $oss->get_sign_url ( $bucket, $fileKey, $timeout );
	return $response;
}

//上传图片到oss
function upload_oss_resource($bucket, $fileKey, $filePath, $fileType) {
	$oss = new ALIOSS ( OSS_ACCESS_ID, OSS_ACCESS_KEY, OSS_ENDPOINT );
	$timeout = 3600;
	
	// 通过file上传
	if (! file_exists ( $filePath )) {
		throw new OSS_Exception ( $filePath . OSS_FILE_NOT_EXIST );
	}
	
	$options = array (
			'Content-Type' => $fileType 
	);
	$response = $oss->presign_url ( $bucket, $fileKey, $timeout, "PUT", $options );
	// SampleUtil::my_echo("签名的URL为:" . $response);
	
	$request = new RequestCore ( $response );
	$request->set_method ( 'PUT' );
	$request->add_header ( 'Content-Type', $fileType );
	$request->set_read_file ( $filePath );
	$request->set_read_stream_size ( filesize ( $filePath ) );
	$request->send_request ();
	$res = new ResponseCore ( $request->get_response_header (), $request->get_response_body (), $request->get_response_code () );
	if ($res->isOK ()) {
// 		AiniaOSSUtil::my_echo ( "签名上传文件成功" );
	} else {
		AiniaOSSUtil::my_echo ( "签名上传字符串失败" );
	}
	;
}

?>
