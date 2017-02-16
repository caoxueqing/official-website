<?php
//生日转换成年龄
function birthday($birthday){
	$age = strtotime($birthday);
	if($age === false){
		return false;
	}
	list($y1,$m1,$d1) = explode("-",date("Y-m-d",$age));
	$now = strtotime("now");
	list($y2,$m2,$d2) = explode("-",date("Y-m-d",$now));
	$age = $y2 - $y1;
	if((int)($m2.$d2) < (int)($m1.$d1))
		$age -= 1;
		return $age;
}

//用户名、邮箱、手机账号中间字符串以*隐藏 
function hideStar($str) { 
    if (strpos($str, '@')) { 
        $email_array = explode("@", $str); 
        $prevfix = (strlen($email_array[0]) < 4) ? "" : substr($str, 0, 3); //邮箱前缀 
        $count = 0; 
        $str = preg_replace('/([\d\w+_-]{0,100})@/', '***@', $str, -1, $count); 
        $rs = $prevfix . $str; 
    } else { 
        $pattern = '/(1[3458]{1}[0-9])[0-9]{4}([0-9]{4})/i'; 
        if (preg_match($pattern, $str)) { 
            $rs = preg_replace($pattern, '$1****$2', $str); // substr_replace($name,'****',3,4); 
        } else { 
            $rs = substr($str, 0, 3) . "***" . substr($str, -1); 
        } 
    } 
    return $rs; 
}

//从定义上传图片名称规则
function guid(){
	if (function_exists('com_create_guid')){
		return com_create_guid();
	}else{
		$uuid = md5(uniqid(rand(), true));
		return $uuid;
	}
}
// 进行网络请求的内容
function get($url, $param = array()) {
	if (! is_array ( $param )) {
		throw new Exception ( "参数必须为array" );
	}
	$p = '';
	foreach ( $param as $key => $value ) {
		$p = $p . $key . '=' . $value . '&';
	}
	if (preg_match ( '/\?[\d\D]+/', $url )) { // matched ?c
		$p = '&' . $p;
	} else if (preg_match ( '/\?$/', $url )) { // matched ?$
		$p = $p;
	} else {
		$p = '?' . $p;
	}
	$p = preg_replace ( '/&$/', '', $p );
	$url = $url . $p;
	// echo $url;
	$httph = curl_init ( $url );
	curl_setopt ( $httph, CURLOPT_SSL_VERIFYPEER, 0 );
	curl_setopt ( $httph, CURLOPT_SSL_VERIFYHOST, 1 );
	curl_setopt ( $httph, CURLOPT_RETURNTRANSFER, 1 );
	// curl_setopt($httph, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");
	
	curl_setopt ( $httph, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $httph, CURLOPT_HEADER, 0 );
	$rst = curl_exec ( $httph );
	curl_close ( $httph );
	return $rst;
}

/*
 * post method
 */
function post($url, $param = array()) {
	if (! is_array ( $param )) {
		throw new Exception ( "参数必须为array" );
	}
	$httph = curl_init ( $url );
	curl_setopt ( $httph, CURLOPT_SSL_VERIFYPEER, 0 );
	curl_setopt ( $httph, CURLOPT_SSL_VERIFYHOST, 1 );
	curl_setopt ( $httph, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $httph, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)" );
	curl_setopt ( $httph, CURLOPT_POST, 1 ); // 设置为POST方式
	curl_setopt ( $httph, CURLOPT_POSTFIELDS, $param );
	curl_setopt ( $httph, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt ( $httph, CURLOPT_HEADER, 0 );
	$rst = curl_exec ( $httph );
	curl_close ( $httph );
	return $rst;
}

/**
 * api接口返回json字符串的方法
 *
 * api接口返回json,包含status,提示,要获取的数据
 *
 * @param $isOk boolval
 *        	是否api获取数据有效
 * @param $message String
 *        	api的操作信息提示
 * @param $data Array
 *        	需要返回的数据值
 * @return 输出 json字符串
 */
function apiReturn($isOk, $message, $data) {
	setHeader ();
	$status = $isOk ? '1' : '0';
	echo generateReturnJson ( $isOk, $message, $data );
	exit ();
}

// 检测请求是否ok包含两个内容，一个是验证sign是否合法，另外就是验证token是否OK,如果OK则进行相应的请求操作否则返回相应错误

/**
 * undocumented function summary
 *
 * Undocumented function long description
 *
 * @param
 *        	数组array vars 传入所有传递过来的参数
 *        	
 */

// 用户种类，如果UserKind为1则为用户，Kind为2则为医生
function isRequestOK($vars, $needCheckToken, $userKind) {
	setHeader ();
	// 先判断是否为空
	if (! isUnEmptyArray ( $vars )) {
		echo generateReturnJson ( '0', 'NO vars' );
		exit ();
	}
	// 先判断sign是否ok
	if (! checkSign ( $vars )) {
		echo generateReturnJson ( '0', 'Sign is  Unvaild' );
		exit ();
	}
	
	// 判断是否传递的有必须的参数没有传递
	getUnEmptyArrayValue ( $vars, 'appVersion' );
	getUnEmptyArrayValue ( $vars, 'appBuild' );
	getUnEmptyArrayValue ( $vars, 'apiVersion' );
	
	// 检测需要检测token
	if (! $needCheckToken) {
		
		return true;
	}
	
	if (checkToken ( $vars ['userId'], $vars ['appId'], $vars ['token'], $userKind )) {
	} else {
		
		echo generateReturnJson ( '4009', "登录已失效,请重新登录" );
		
		exit ();
	}
}

// 验证Token值是否正确的方法
function checkToken($userId, $appId, $token, $userKind) {
	checkUnEmptyString ( $userId, 'userId' );
	checkUnEmptyString ( $appId, 'appId' );
	checkUnEmptyString ( $token, 'token' );
	
	if ($userKind == 1) {
		
		$role = 1;
	} else {
		$role = 2;
	}
	
	$userInfo = M ( 'info_user_token' )->where ( "USER_ID = '$userId' and APP_ID = '$appId' and ROLE = $role" )->field ( 'TOKEN' )->find ();
	$userToken = $userInfo ['token'];
	
	if ($token === $userToken) {
		
		return true;
	} else {
		return false;
	}
}

// 生成结果集的Json数据，主要用于与软件的交互
function generateReturnJson($status, $message, $data = array()) {
	$returnArray ['status'] = $status;
	$returnArray ['message'] = $message;
	$returnArray ['data'] = $data;
	
	$returnArrayJson = json_encode ( $returnArray );
	
	$returnJson = stripslashes ( preg_replace ( "#\\\u([0-9a-f]{4})#ie", "iconv('UCS-2BE', 'UTF-8', pack('H4', '\\1'))", $returnArrayJson ) );
	
	return "$returnJson";
}

function echoReturnJson($status, $message, $data = array()) {
	header ( 'Content-type: application/json' ); // json
	echo generateReturnJson ( $status, $message, $data );
	exit ();
}

// 生成token的值,根据用户Id和时间戳生成Token
function generateToken($userId) {
	checkUnEmptyString ( $userId, 'userId' );
	$string = '{' . '[' . "$userId" . ']' . '[' . time () . ']' . '}';
	
	return md5 ( $string );
}
function isUnEmptyArray($array) {
	return count ( $array ) > 0;
}

// 用于验证请求是否合法的问题,传入参数为所有传递过来的参数
function checkSign($values) {
	
	// 获得签名值
	$sign = getUnEmptyArrayValue ( $values, 'sign' );
	
	// 获得用户Id
	$userId = getUnEmptyArrayValue ( $values, 'userId' );
	// 获得AppId
	$appId = getUnEmptyArrayValue ( $values, 'appId' );
	// 获得随机的字符串
	$append = getUnEmptyArrayValue ( $values, 'append' );
	// 获得对应的日期
	$date = getUnEmptyArrayValue ( $values, 'date' );
	
	// 如果此处获得的参数不正确则会出现404错误
	
	$appInfo = M ( 'info_app' )->where ( "APP_ID = $appId" )->field ( 'APP_SECRET' )->find ();
	
	$appSecret = $appInfo ['app_secret'];
	
	$mixString = '{[' . $userId . '].[' . $appId . '].[' . $appSecret . '].[' . $date . '].[' . $append . ']}';
	
	// echo "$mixString";
	
	$mixStringMD5 = md5 ( $mixString );
	
	// echo "$mixStringMD5";
	
	// 判断签名值是否正确
	if ($mixStringMD5 === $sign) {
		return true;
	}
	return false;
}

// 返回数组的值，为空则退出，否则则返回对应的值
function getUnEmptyArrayValue($array, $stringKey) {
	$stringValue = $array [$stringKey];
	if (strlen ( $stringValue ) === 0) {
		echo generateReturnJson ( '0', "$stringKey can not be null or empty" );
		exit ();
	}
	return $stringValue;
}

// 检测字符串为空则直接退出
function checkUnEmptyString($string, $stringKey) {
	if (strlen ( $string ) === 0) {
		echo generateReturnJson ( '0', "$stringKey can not be null or empty" );
		exit ();
	}
	return $string;
}

// 如果获得字符串为空则返回错误I代表获得参数的函数，E代表空或者Exit
function I_E($key) {
	$value = I ( $key );
	if (strlen ( $value ) === 0) {
		echo generateReturnJson ( '0', "$key can be null or empty" );
		exit ();
	}
	return $value;
}
// 字符串为空则返回
function I_UE($key) {
	$value = I ( $key );
	if (strlen ( $value ) === 0) {
		return false;
	}
	return $value;
}

// 设置api返回的头信息
function setHeader() {
	header ( 'Content-Type:application/json' );
}

// 执行exception方法,获取异常与成功执行的返回值
function runExceptionMethon($methonName, $object, $args = array()) {
	try {
		$result = call_user_func_array ( array (
				&$object,
				$methonName 
		), $args );
	} catch ( \Exception $e ) {
		$result = $e->getMessage ();
	}
	return $result;
}

// 默认的正则表达式
function regex($value, $rule) {
	$validate = array (
			'require' => '/\S+/',
			'email' => '/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/',
			'url' => '/^http(s?):\/\/(?:[A-za-z0-9-]+\.)+[A-za-z]{2,4}(:\d+)?(?:[\/\?#][\/=\?%\-&~`@[\]\':+!\.#\w]*)?$/',
			'currency' => '/^\d+(\.\d+)?$/',
			'number' => '/^\d+$/',
			'zip' => '/^\d{6}$/',
			'integer' => '/^[-\+]?\d+$/',
			'double' => '/^[-\+]?\d+(\.\d+)?$/',
			'english' => '/^[A-Za-z]+$/' 
	);
	// 检查是否有内置的正则表达式
	if (isset ( $validate [strtolower ( $rule )] ))
		$rule = $validate [strtolower ( $rule )];
	return preg_match ( $rule, $value ) === 1;
}

// 验证字符串规则
function check($value, $rule, $type = 'regex') {
	$type = strtolower ( trim ( $type ) );
	switch ($type) {
		case 'in' : // 验证是否在某个指定范围之内 逗号分隔字符串或者数组
		case 'notin' :
			$range = is_array ( $rule ) ? $rule : explode ( ',', $rule );
			return $type == 'in' ? in_array ( $value, $range ) : ! in_array ( $value, $range );
		case 'between' : // 验证是否在某个范围
		case 'notbetween' : // 验证是否不在某个范围
			if (is_array ( $rule )) {
				$min = $rule [0];
				$max = $rule [1];
			} else {
				list ( $min, $max ) = explode ( ',', $rule );
			}
			return $type == 'between' ? $value >= $min && $value <= $max : $value < $min || $value > $max;
		case 'equal' : // 验证是否等于某个值
		case 'notequal' : // 验证是否等于某个值
			return $type == 'equal' ? $value == $rule : $value != $rule;
		case 'length' : // 验证长度
			$length = mb_strlen ( $value, 'utf-8' ); // 当前数据长度
			if (strpos ( $rule, ',' )) { // 长度区间
				list ( $min, $max ) = explode ( ',', $rule );
				return $length >= $min && $length <= $max;
			} else { // 指定长度
				return $length == $rule;
			}
		case 'expire' :
			list ( $start, $end ) = explode ( ',', $rule );
			if (! is_numeric ( $start ))
				$start = strtotime ( $start );
			if (! is_numeric ( $end ))
				$end = strtotime ( $end );
			return NOW_TIME >= $start && NOW_TIME <= $end;
		case 'ip_allow' : // IP 操作许可验证
			return in_array ( get_client_ip (), explode ( ',', $rule ) );
		case 'ip_deny' : // IP 操作禁止验证
			return ! in_array ( get_client_ip (), explode ( ',', $rule ) );
		case 'regex' :
		default : // 默认使用正则验证 可以使用验证类中定义的验证名称
		          // 检查附加规则
			return regex ( $value, $rule );
	}
}
function myThrow($message) {
	$exceptionMessage = generateReturnJson ( '2002', $message );
	throw new \Exception ( $exceptionMessage );
}

/**
 * 时间戳格式化
 * 
 * @param int $time        	
 * @return string 完整的时间显示
 * @author huajie <banhuajie@163.com>
 */
function time_format($time = NULL, $format = 'Y-m-d H:i:s') {
	$time = $time === NULL ? NOW_TIME : intval ( $time );
	return date ( $format, $time );
}

/**
 * 转化时间戳
 * 
 * @param
 *        	string 完整的时间显示
 * @return int 时间戳
 * @author shandawei <shandawei@me.com>
 */
function get_time_stamp($time) {
	return strtotime ( $time );
}

// 格式化输出
function p($var, $title) 
// 使用方法 $var需要解析的数组 $title 数组的含义
{
	header ( "Content-Type: text/html; charset=utf-8" );
	if (! empty ( $title )) {
		echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>↓↓↓↓<span style='color:red;'>{$title}</span>↓↓↓↓</pre>";
	}
	
	if (is_bool ( $var )) {
		var_dump ( $var );
	} else if (is_null ( $var )) {
		var_dump ( NULL );
	} else {
		echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r ( $var, true ) . "</pre>";
	}
	echo "<br/>";
}



