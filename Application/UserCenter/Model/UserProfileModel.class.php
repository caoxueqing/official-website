<?php

namespace UserCenter\Model;

use Think\Model\RelationModel;

class UserProfileModel extends RelationModel {
	protected $tableName = 'user_info_base';
	protected $_map = array (
			'regIp' => 'reg_ip',
			'lastLoginIp' => 'last_login_ip',
			'lastLoginTime' => 'last_login_time',
			'updateTime' => 'update_time',
			'regTime' => 'reg_time',
			'emailVerify' => 'email_verify',
			'userType' => 'user_type' 
	);
	protected $_link = array (
			//用户详情表
			'DetailsInfo' => array (
					'mapping_type' => self::HAS_ONE,
					'class_name' => 'user_info_details',
					'foreign_key' => 'uid',
					'as_fields' => 'nickname,birthday,sex,address,avatar,qq' 
			),
			
			//额外信息表
			'ExtraInfo' => array (
					'mapping_type' => self::HAS_ONE,
					'class_name' => 'user_info_extra',
					'foreign_key' => 'uid',
					'as_fields' => 'hospital_id:hospitalId,department_id:departmentId,subdiscipline_id:subdisciplineId,position_id:positionId,profile,skill,phone,clinical',
			),
			
			//认证信息表
			'CertificationInfo' => array (
					'mapping_type' => self::HAS_ONE,
					'class_name' => 'user_info_certification',
					'foreign_key' => 'uid',
					'as_fields' => 'tiny_name:tinyName,certification_url:certificationUrl,certification_status:certificationStatus',
			),
			
			//绑定信息表
			'BindInfo' => array (
					'mapping_type' => self::HAS_MANY,
					'class_name' => 'user_bind',
					'foreign_key' => 'uid',
					'as_fields' => 'bind_type:bindType,bind_user_info:bindUserInfo,add_time:addTime,update_time:updateTime' 
			) 
	);
	
	// public $viewFields = array(
	// 'UserBaseInfo' => array(
	// 'uid',
	// 'username',
	// 'email',
	// 'salt',
	// 'password',
	// 'mobile',
	// 'reg_ip',
	// 'last_login_ip',
	// 'last_login_time',
	// 'update_time',
	// 'reg_time',
	// '_table' => "sdw_user_info_base"
	// ),
	// 'UserExtraInfo' => array(
	// 'uid',
	// 'birthday',
	// 'sex',
	// 'address',
	// 'avatar',
	// 'role',
	// 'note',
	// '_on' => 'UserBaseInfo.uid=UserExtraInfo.uid',
	// '_table' => "sdw_user_info_extra"
	// )
	// );
}

?>