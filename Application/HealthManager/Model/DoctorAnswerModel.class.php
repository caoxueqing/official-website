<?php

namespace HealthManager\Model;

use Think\Model\ViewModel;

// 认证表和回答表关联model
class DoctorAnswerModel extends ViewModel {
	protected $_map = array (
			'answerId' => 'answer_id',
			'createTime' => 'create_time',
			'askId' => 'ask_id',
			'tinyName' => 'tiny_name',
			'updateTime' => 'update_time',
			'certificationUrl' => 'CERTIFICATION_URL',
			'certificationStatus' => 'CERTIFICATION_STATUS',
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
					'answer_id',
					'content',
					'create_time',
					'uid',
					'ask_id',
					'status',
					'_on' => 'DocumentBase.uid=DocumentContent.uid',
					'_table' => "hm_info_answer" 
			) 
	);
}

?>
