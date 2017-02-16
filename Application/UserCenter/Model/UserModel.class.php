<?php
namespace UserCenter\Model;

use Think\Model;
require_once VENDOR_PATH . 'TopSdk/TopSdk.php';
// +----------------------------------------------------------------------
// | Copyright (c) 1989-2016 David Shan
// +----------------------------------------------------------------------
// | Author: David Shan <shandawei@me.com>
// +----------------------------------------------------------------------
// | Create Time: 2016年4月15日 下午8:41:04
// +----------------------------------------------------------------------
// | File Description: 用户对应的模型,作为医生和会员最基本的信息
// +----------------------------------------------------------------------

class UserModel extends Model {
	protected $tableName = 'user_info_base';
	// // 用来记录密码撒盐的值
	// protected $salt = '';
	
	// protected $readonlyField = array('uid', 'reg_time','reg_ip');
	// /* 用户模型自动验证 */
	// protected $_validate = array(
	// /* 验证用户名 */
	// array('username', '4,30', '用户名长度不合法', self::EXISTS_VALIDATE, 'length'), //用户名长度不合法
	// array('username', 'checkDenyUser','此用户名已经禁止注册', self::EXISTS_VALIDATE, 'callback'), //用户名禁止注册
	// array('username', '','用户名已经存在', self::EXISTS_VALIDATE, 'unique'), //用户名被占用
	
	// /* 验证密码 */
	// array('password', '6,30', -4, self::EXISTS_VALIDATE, 'length'), //密码长度不合法
	
	// /* 验证邮箱 */
	// array('email', 'email', -5, self::EXISTS_VALIDATE), //邮箱格式不正确
	// array('email', '1,32', -6, self::EXISTS_VALIDATE, 'length'), //邮箱长度不合法
	// array('email', 'checkDenyEmail', -7, self::EXISTS_VALIDATE, 'callback'), //邮箱禁止注册
	// array('email', '', -8, self::EXISTS_VALIDATE, 'unique'), //邮箱被占用
	
	// /* 验证手机号码 */
	// array('mobile', '//', -9, self::EXISTS_VALIDATE), //手机格式不正确 TODO:
	// array('mobile', 'checkDenyMobile', -10, self::EXISTS_VALIDATE, 'callback'), //手机禁止注册
	// array('mobile', '', -11, self::EXISTS_VALIDATE, 'unique'), //手机号被占用
	// );
	
	// /* 自动完成规则 */
	// protected $_auto = array(
	// array('salt', 'getSalt', self::MODEL_INSERT, 'callback'),
	// array('status', 1, self::MODEL_INSERT, 'string'),
	// array('update_time', 'time', self::MODEL_BOTH, 'function'),
	// array('password', 'encryPassword', self::MODEL_INSERT, 'callback'),
	// array('reg_time', NOW_TIME, self::MODEL_INSERT),
	// array('reg_ip', 'get_client_ip', self::MODEL_INSERT, 'function', 1),
	// array('update_time', NOW_TIME),
	// );
	
	// 生成撒盐的参数,用来进行密码多层加密
	private function getSalt() {
		// 生成6位随机字符串
		$salt = substr ( uniqid ( rand () ), - 6 );
		$this->salt = $salt;
		return $salt;
	}
	
	// 加密密码
	private function encryPassword($password, $salt) {
		$encryptPwd = md5 ( $password . $salt );
		return $encryptPwd;
	}
	
	// 检测用户信息，用户名和email是否允许注册
	public function checkDenyUser($account, $type) {
		$accountKind = $this->checkAccoutKind ( $account );
		if (! empty ( $type )) {
			if ($accountKind != $type) {
				$exceptionMessage = generateReturnJson ( false, '用户名或者邮箱格式不正确' );
				throw new \Exception ( $exceptionMessage );
			}
		}
		switch ($accountKind) {
			case 'email' :
				$this->checkDenyEmail ( $account );
				break;
			case 'username' :
				$this->checkDenyUsername ( $account );
				break;
			default :
				$exceptionMessage = generateReturnJson ( false, '似乎服务器出现问题了?我也不太清楚' );
				throw new \Exception ( $exceptionMessage );
				break;
		}
		
		return generateReturnJson ( true, "邮箱或者用户名可以使用" );
	}
	
	// 验证用户名称是否被禁用
	public function checkDenyUsername($username) {
		$match = array ();
		$match ['username'] = $username;
		$count = $this->where ( $match )->count ();
		if ($count > 0) {
			$exceptionMessage = generateReturnJson ( false, '用户名称已经被注册' );
			throw new \Exception ( $exceptionMessage );
		}
		return true;
	}
	
	// 验证邮箱是否被禁用
	public function checkDenyEmail($email) {
		// 判断邮箱是否被注册了
		$match = array ();
		$match ['email'] = $email;
		$count = $this->where ( $match )->count ();
		if ($count > 0) {
			$exceptionMessage = generateReturnJson ( false, '邮箱已经被注册了' );
			throw new \Exception ( $exceptionMessage );
		}
		return true;
	}
	
	// 验证密码是否可用
	public function checkDenyPwd($pwd) {
		if (strlen ( $pwd ) < 6) {
			$exceptionMessage = generateReturnJson ( false, '密码要大于6位才可以' );
			throw new \Exception ( $exceptionMessage );
		}
		return true;
	}
	
	// 验证手机号是否被禁用
	public function checkDenyMobile($mobile) {
		$match = array ();
		$match ['mobile'] = $mobile;
		$count = $this->where ( $match )->count ();
		if ($count > 0) {
			$exceptionMessage = generateReturnJson ( false, '手机号码已经存在' );
			throw new \Exception ( $exceptionMessage );
		}
	}
	
	// 验证密码
	public function checkPwd($userInfo, $userPwd) {
		$dbSalt = $userInfo ['salt'];
		$dbPassword = $userInfo ['password'];
		// 根据用户输入的密码结合数据库存放的salt生成密码进行对比
		$userEncryPwd = $this->encryPassword ( $userPwd, $dbSalt );
		if ($userEncryPwd == $dbPassword) {
			// 登陆成功,生成token，写入数据库并返回用户信息。
		} else {
			// 登陆失败，密码错误
			$exceptionMessage = generateReturnJson ( false, '密码错误，登陆失败' );
			throw new \Exception ( $exceptionMessage );
		}
	}
	
	// 注册
	public function signUp() {
		// 获取手机号和密码
		$account = I_UE ( 'account' );
		$pwd = I_UE ( 'password' );
		$userType = I_UE ( 'userType' );
		// 检测用户账户是否允许注册
		$this->checkDenyUser ( $account );
		$this->checkDenyPwd ( $pwd );
		// 判断用户(用户名)种类，进行处理
		$accountKind = $this->checkAccoutKind ( $account );
		// 生成盐
		$salt = $this->getSalt ();
		// 密码加密
		$encryPassword = $this->encryPassword ( $pwd, $salt );
		
		// 往基础表写数据
		$userProfile = D ( 'UserProfile' );
		$userData = array ();
		$userData [$accountKind] = $account;
		$userData ['salt'] = $salt;
		$userData ['password'] = $encryPassword;
		$userData ['reg_time'] = time_format ( time () );
		$userData ['reg_ip'] = get_client_ip ();
		$userData ['user_type'] = $userType;
		$result = $userProfile->add ( $userData );
		
// 		// 往用户详情表写数据
// 		$DetailsInfo = array ();
// 		$DetailsInfo ['sex'] = 0;
// 		$userProfile->DetailsInfo = $DetailsInfo;
// 		// 添加到数据库
// 		$result = $userProfile->relation ( true )->add ();
		
		// 获取userId
		$userId = $result;
		$username = $account;
		
		// 添加到openIM里
		$topData = $this->addImUser ( $userId, $pwd, $username, $userType );
		
		// 获取openImId
		$topimData = ( array ) $topData->uid_succ->string;
		$topimId = $topimData [0];
		
		// 组合数据
		$topImRelationData ['uid'] = $userId;
		$topImRelationData ['topim_id'] = $topimId;
		$topImRelationData ['role'] = $userType;
		$topImRelationData ['create_time'] = time_format ( time () );
		
		// 将用户userId和openImId添加到openIM关系表
		M ( 'info_topim_id_relation' )->add ( $topImRelationData );
		
		if ($result) {
			$returnData = array ();
			$returnData ['uid'] = $result;
			return generateReturnJson ( true, '注册成功', $returnData );
		} else {
			$exceptionMessage = generateReturnJson ( false, '注册失败,请稍后重试' );
			throw new \Exception ( $exceptionMessage );
		}
	}
	
	/**
	 * 测试 注册时添加一条数据到openIM
	 */
	private function addImUser($userId, $pwd, $username, $userType) {
		$c = new \TopClient ();
		if ($userType == 1) {
			// 用户
			$c->appkey = '23418714';
			$c->secretKey = '8c23e3603f91b467a9fa823821624700';
		} elseif ($userType == 2) {
			// 医生
			$c->appkey = '23448167';
			$c->secretKey = 'b74350829a3cccc4659ff546ffbe0f6d';
		}
		$req = new \OpenimUsersAddRequest ();
		$userinfos = new \Userinfos ();
		$userinfos->userid = md5 ( $userType . '-' . $userId );
		$userinfos->password = md5 ( $pwd );
		$userinfos->nick = $username;
		$req->setUserinfos ( json_encode ( $userinfos ) );
		$resp = $c->execute ( $req );
		return $resp;
	}
	
	// 登录
	public function signIn() {
		$account = I_UE ( 'account' );
		$pwd = I_UE ( 'password' );
		$userType = I_UE ( 'userType' );
		// 判断用户种类，进行处理
		$accountKind = $this->checkAccoutKind ( $account );
		// 从数据库读取用户信息，进行密码编码对比
		$match = array ();
		$match [$accountKind] = $account;
		$userProfile = D ( 'UserProfile' );
		$userInfo = $userProfile->where ( $match )->field ( "$accountKind,password,salt,uid,reg_time" )->find ();
		
		if (empty ( $userInfo )) {
			// 用户不存在则返回提示
			$exceptionMessage = generateReturnJson ( false, '用户不存在，请查证后重试' );
			throw new \Exception ( $exceptionMessage );
		}
		
		$this->checkPwd ( $userInfo, $pwd );
		$userId = $userInfo ['uid'];
		
		//登陆成功生成token
		$token = generateToken ( $userId );
		
		// 生成token后写入im
		$password = $token;
		$this->updateImUser ( $userId, $password, $userType );
		
		// 写入token返回userinfo
		$this->writeToken ( $token, $userId );
		$userProfile = $this->p_getUserInfo ( $userId );
		$userProfile ['token'] = $token;
		
		return generateReturnJson ( true, '登陆成功', $userProfile );
	}
	
	/**
	 * 测试 登录时更新用户密码
	 */
	private function updateImUser($userId, $pwd, $userType) {
		$userInfo = D ( 'UserProfile' )->where ( "uid = '$userId'" )->find ();
		$userSexInfo = M ( 'user_info_details' )->where ( 'uid=' . $userId )->find ();
		$sex = $userSexInfo ['sex'];
		if ($sex == 0) {
			$gender = M;
		} elseif ($sex == 1) {
			$gender = F;
		} else {
			$gender = M;
		}
		// 修改IM用户信息
		$c = new \TopClient ();
		if ($userType == 1) {
			// 用户
			$c->appkey = '23418714';
			$c->secretKey = '8c23e3603f91b467a9fa823821624700';
		} elseif ($userType == 2) {
			// 医生
			$c->appkey = '23448167';
			$c->secretKey = 'b74350829a3cccc4659ff546ffbe0f6d';
		}
		$req = new \OpenimUsersUpdateRequest ();
		$userinfos = new \Userinfos ();
		$userinfos->userid = md5 ( $userType . '-' . $userId );
		$userinfos->password = md5 ( $pwd );
		$userinfos->mobile = $userInfo ['mobile'];
		$userinfos->gender = $gender;
		$req->setUserinfos ( json_encode ( $userinfos ) );
		$resp = $c->execute ( $req );
		// p($resp);
		return $resp;
	}
	
	// 重置密码
	public function resetPassword() {
		$newPwd = I_UE ( 'password' );
		$account = I_UE ( 'account' );
		// 判断用户种类，进行处理
		$accountKind = $this->checkAccoutKind ( $account );
		$match = array ();
		$match [$accountKind] = $account;
		// 获取盐
		$salt = $this->getSalt ();
		// 密码加密
		$savePwd = $this->encryPassword ( $newPwd, $salt );
		
		$data = array ();
		$data ['salt'] = $salt;
		$data ['password'] = $savePwd;
		$data ['update_time'] = time_format ( time () );
		$result = $this->where ( $match )->save ( $data );
		
		if ($result) {
			return generateReturnJson ( true, '密码更新成功' );
		} else {
			$exceptionMessage = generateReturnJson ( false, '用户不存在，请查证后重试' );
			throw new \Exception ( $exceptionMessage );
		}
	}
	
	// 修改密码
	public function changePwd() {
		$userId = I_UE ( 'uid' );
		$pwd = I_UE ( 'password' );
		$newPwd = I_UE ( 'newPassword' );
		$passwordAgain = I_UE ( 'passwordAgain' );
		// 监测是否正确格式pwd
		$this->checkDenyPwd ( $newPwd );
		
		$match = array ();
		$match ['uid'] = $userId;
		$userProfile = D ( 'UserProfile' );
		$userInfo = $userProfile->where ( $match )->field ( 'password,salt' )->find ();
		if (empty ( $userInfo )) {
			// 用户不存在则返回提示
			$exceptionMessage = generateReturnJson ( false, '用户不存在，请查证后重试' );
			throw new \Exception ( $exceptionMessage );
		}
		
		// 检测原始密码
		$isPwdOk = $this->checkPwd ( $userInfo, $pwd );
		
		if ( $isPwdOk || $newPwd == $passwordAgain ) {
			// 获取生成的盐并给密码加密
			$salt = $this->getSalt ();
			$savePwd = $this->encryPassword ( $newPwd, $salt );
			
			$data = array ();
			$data ['salt'] = $salt;
			$data ['password'] = $savePwd;
			$data ['update_time'] = time_format ( time () );
			$result = $userProfile->where ( $match )->save ( $data );
			if ($result) {
				return generateReturnJson ( true, '密码更新成功' );
			} else {
				$exceptionMessage = generateReturnJson ( false, '密码更新失败，稍后再试' );
				throw new \Exception ( $exceptionMessage );
			}
		} else {
			// 修改失败
			$exceptionMessage = generateReturnJson ( false, '原始密码错误或两次输入密码不一致，请查证后重试' );
			throw new \Exception ( $exceptionMessage );
		}
	}
	
	// 设置邮箱验证状态为已验证
	public function setEmailVerified() {
		// 获得上传的用户的相关信息
		$userId = I_UE ( 'uid' );
		$email = I ( 'email' );
		$match = array ();
		$match ['uid'] = $userId;
		$userProfile = D ( 'UserProfile' );
		
		$baseData = array ();
		$baseData ['email_verify'] = 1;
		
		if (! empty ( $email )) {
			if (check ( $email, 'email' )) {
				$this->checkDenyEmail ( $email );
				$baseData ['email'] = $email;
			} else {
				$exceptionMessage = generateReturnJson ( false, '邮箱格式错误' );
				throw new \Exception ( $exceptionMessage );
			}
		}
		
		$result = $userProfile->where ( $match )->relation ( true )->save ( $baseData );
		
		if ($result) {
			return generateReturnJson ( true, '更新成功' );
		}
		$exceptionMessage = generateReturnJson ( false, '更新失败，请稍后再试' );
		throw new \Exception ( $exceptionMessage );
	}
	
	// 更新用户信息
	public function updateUserInfo() {
		// 获得上传的用户的相关信息
		$userId = I_UE ( 'uid' );
		$userType = I_UE ( 'userType' ); //用户角色
		$match = array ();
		$match ['uid'] = $userId;
		$userProfile = D ( 'UserProfile' );
		
		$baseData = array ();
		if (I_UE ( 'username' )) {
			$baseData ['username'] = I_UE ( 'username' );
		}
		if (I_UE ( 'email' )) {
			$baseData ['email'] = I_UE ( 'email' );
		}
		if (I_UE ( 'mobile' )) {
			$baseData ['mobile'] = I_UE ( 'mobile' );
		}
		
		$detailsData = array ();
		$detailsData ['uid'] = $userId;
		if (I_UE ( 'birthday' )) {
			$detailsData ['birthday'] = I_UE ( 'birthday' );
		}
		if (I_UE ( 'sex' )) {
			$detailsData ['sex'] = I_UE ( 'sex' );
		}
		if (I_UE ( 'address' )) {
			$detailsData ['address'] = I_UE ( 'address' );
		}
		if (I_UE ( 'avatar' )) {
			$detailsData ['avatar'] = I_UE ( 'avatar' );
		}
		if (I_UE ( 'stature' )) {
			$detailsData ['stature'] = I_UE ( 'stature' );
		}
		if (I_UE ( 'weight' )) {
			$detailsData ['weight'] = I_UE ( 'weight' );
		}
		if (I_UE ( 'qq' )) {
			$detailsData ['qq'] = I_UE ( 'qq' );
		}
		if (I_UE ( 'nickname' )) {
			$detailsData ['nickname'] = I_UE ( 'nickname' );
		}
		// 详情表数据
		$baseData ['DetailsInfo'] = $detailsData;
		
		// 更新用户表数据
		if ($baseData) {
			$baseResult = M ( 'user_info_base' )->where ( $match )->save ( $baseData );
		}
		
		// 查询详情表是否有这条数据,如果没有就添加,有就修改
		$detailsInfo = M ( 'user_info_details' )->where ( $match )->find ();
		if ($detailsInfo) {
			$detailsResult = M ( 'user_info_details' )->where ( $match )->save ( $detailsData );
		} else {
			$detailsResult = M ( 'user_info_details' )->where ( $match )->add ( $detailsData );
		}
		
		// 更新openIM数据
		$this->updateImUserInfo ( $userId, $baseData, $userType );
		
		if ($baseResult || $detailsResult) {
			return generateReturnJson ( true, '更新成功' );
		} else {
			$exceptionMessage = generateReturnJson ( false, '没有内容需要更新' );
			throw new \Exception ( $exceptionMessage );
		}
	}
	
	/**
	 * 测试 修改openIM用户信息或头像
	 */
	private function updateImUserInfo($userId, $baseData, $userType) {
		$userInfo = D ( 'UserProfile' )->where ( "uid = '$userId'" )->find ();
		$sex = $baseData ['sex'];
		if ($sex == 0) {
			$gender = M;
		} elseif ($sex == 1) {
			$gender = F;
		} else {
			$gender = M;
		}
		if ($baseData ['ExtraInfo'] ['avatar']) {
			// 修改IM用户信息（头像）
			$c = new \TopClient ();
			if ($userType == 1) {
				// 用户
				$c->appkey = '23418714';
				$c->secretKey = '8c23e3603f91b467a9fa823821624700';
			} elseif ($userType == 2) {
				// 医生
				$c->appkey = '23448167';
				$c->secretKey = 'b74350829a3cccc4659ff546ffbe0f6d';
			}
			$req = new \OpenimUsersUpdateRequest ();
			$userinfos = new \Userinfos ();
			$userinfos->userid = md5 ( $userType. '-' . $userId );
			$userinfos->nick = $userInfo ['nickname'];
			$userinfos->mobile = $userInfo ['mobile'];
			$userinfos->icon_url = "http://ainia.oss-cn-beijing.aliyuncs.com/" . $baseData;
			$userinfos->email = $userInfo ['email'];
			$userinfos->address = $userInfo ['address'];
			$userinfos->name = $userInfo ['tiny_name'];
			$userinfos->gender = $gender;
			$req->setUserinfos ( json_encode ( $userinfos ) );
			$resp = $c->execute ( $req );
			// p($resp);
			return $resp;
		} else {
			// 修改IM用户信息
			$c = new \TopClient ();
			// 修改IM用户信息
			if ($userType == 1) {
				// 用户
				$c->appkey = '23418714';
				$c->secretKey = '8c23e3603f91b467a9fa823821624700';
			} elseif ($userType == 2) {
				// 医生
				$c->appkey = '23448167';
				$c->secretKey = 'b74350829a3cccc4659ff546ffbe0f6d';
			}
			$req = new \OpenimUsersUpdateRequest ();
			$userinfos = new \Userinfos ();
			$userinfos->userid = md5 ( $userType. '-' . $userId );
			$userinfos->nick = $baseData ['nickname'];
			$userinfos->mobile = $userInfo ['mobile'];
			$userinfos->icon_url = "http://ainia.oss-cn-beijing.aliyuncs.com/" . $userInfo ['avatar'];
			$userinfos->email = $baseData ['email'];
			$userinfos->address = $baseData ['address'];
			$userinfos->name = $baseData ['tiny_name'];
			$userinfos->gender = $gender;
			$req->setUserinfos ( json_encode ( $userinfos ) );
			$resp = $c->execute ( $req );
			// p($resp);
			return $resp;
		}
	}
	
	// 获取用户信息
	public function getUserInfo() {
		$userId = I_UE ( 'uid' );
		$userProfile = $this->p_getUserInfo ( $userId );
		if (empty ( $userProfile )) {
			$exceptionMessage = generateReturnJson ( false, '用户不存在' );
			throw new \Exception ( $exceptionMessage );
		} else {
			return generateReturnJson ( true, '获取用户信息成功', $userProfile );
		}
	}
	
	// 获取用户信息
	private function p_getUserInfo($userId) {
		$match = array ();
		$match ['uid'] = $userId;
		$userProfile = D ( 'UserProfile' )->where ( $match )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
		return $userProfile;
	}
	
	//个人健康管理调用该模型返回数据
	public function getUInfo($uid){
		$userProfile = D ( 'UserCenter/UserProfile' )->where ( 'uid='.$uid )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
		return $userProfile;
	}
	
	// 检测账户类型，自动进行分类
	public function checkAccoutKind($account) {
		// 用户名验证的正则表达式
		$usernameRegx = "/^[a-za-z]{1}[a-za-z0-9]{3,19}$/";
		// 邮箱的正则表达式
		$emailRegx = "/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i";
		// 手机号的正则表达式
		
		$isUsername = preg_match ( $usernameRegx, $account );
		$isEmail = preg_match ( $emailRegx, $account );
		$isMobile = $account;
		
		if ($isUsername) {
			return 'username';
		} elseif ($isEmail) {
			return 'email';
		} elseif ($isMobile) {
			return 'mobile';
		} else {
			$exceptionMessage = generateReturnJson ( false, '用户名或者邮箱格式不正确' );
			throw new \Exception ( $exceptionMessage );
		}
	}
	
	// 写入token的方法
	private function writeToken($token, $userId) {
		// 没有插入,存在更新
		$match = array ();
		$match ['uid'] = $userId;
		$tokenCount = D ( 'user_login_token' )->where ( $match )->count ();
		if ($tokenCount > 0) {
			$insertData = $match;
			$insertData ['token'] = $token;
			$insertData ['update_time'] = time_format ( time () );
			D ( 'user_login_token' )->where ( $match )->save ( $insertData );
		} else {
			$insertData = $match;
			$insertData ['add_time'] = time_format ( time () );
			$insertData ['token'] = generateToken ( $userId );
			D ( 'user_login_token' )->where ( $match )->add ( $insertData );
		}
	}

}

?>