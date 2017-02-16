<?php

namespace HealthManager\Model;

use Think\Model\ViewModel;

// 认证表和健康档案表关联model
class DoctorHealthRecordModel extends ViewModel {
	protected $_map = array (
			'tinyName' => 'tiny_name',
			'updateTime' => 'update_time',
			'certificationUrl' => 'CERTIFICATION_URL',
			'certificationStatus' => 'CERTIFICATION_STATUS',
			'doctorId' => 'doctor_id',
			'createTime' => 'create_time',
	);
	public $viewFields = array (
			'DocumentBase' => array (
					'uid',
					'tiny_name',
					'certification_url',
					'certification_status',
					'update_time',
					'idno',
					'_table' => "hm_user_info_certification" 
			),
			'DocumentContent' => array (
					'id',
					'uid',
// 					'key',
// 					'value',
					'number',
					'doctor_id',
					'create_time',
					'_on' => 'DocumentBase.uid=DocumentContent.doctor_id',
					'_table' => "hm_info_health_record" 
			) 
	);
}

?>
