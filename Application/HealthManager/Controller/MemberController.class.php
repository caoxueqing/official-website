<?php

namespace HealthManager\Controller;

use Think\Controller;
use Org\Util\String;

require_once VENDOR_PATH . 'oss_php/oss_functions.php';


class MemberController extends CommonController {
	public function index() {
		$this->show ( '<style type="text/css">*{ padding: 0; margin: 0; } div{ padding: 4px 48px;} body{ background: #fff; font-family: "微软雅黑"; color: #333;font-size:24px} h1{ font-size: 100px; font-weight: normal; margin-bottom: 12px; } p{ line-height: 1.8em; font-size: 36px } a,a:hover{color:blue;}</style><div style="padding: 24px 48px;"> <h1>:)</h1><p>欢迎使用 <b>ThinkPHP</b>！</p><br/>版本 V{$Think.version}</div><script type="text/javascript" src="http://ad.topthink.com/Public/static/client.js"></script><thinkad id="ad_55e75dfae343f5a1"></thinkad><script type="text/javascript" src="http://tajs.qq.com/stats?sId=9347272" charset="UTF-8"></script>', 'utf-8' );
	}
	
	// 概况总览
	public function dashboard() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '2' );
		// 设置界面显示
		$this->assign ( "title", "健康报表" );
// 		$this->assign ( "discription", "健康报表的数据将会在这里进行显示" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );

		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		//获取健康报表数据
		$reportData = M('result_report')->where('uid='.$uid)->group('report_type')->order ( 'add_time DESC' )->select();
		//调取获取首页报告数据方法
		$reportArray = $this->p_dashboard($reportData);
		
		$this->assign ( "reportArray", $reportArray );
		
		$this->display ();
	}
	
	// 设备绑定
	public function deviceBinding() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
	
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '26' );
		// 设置界面显示
		$this->assign ( "title", "设备绑定" );
		// 		$this->assign ( "discription", "健康报表的数据将会在这里进行显示" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "laptop" );
		$this->assign ( "parentTitle", "设备管理" );
	
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$this->display ();
	}
	
	//设备设置
	public function devicesSettingUp() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
	
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '27' );
		// 设置界面显示
		$this->assign ( "title", "设备设置" );
// 		$this->assign ( "discription", "健康报表的数据将会在这里进行显示" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "laptop" );
		$this->assign ( "parentTitle", "设备管理" );
	
		// 设置用户信息
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$this->display ();
	}
	
	
	
	//获取首页报告数据的方法
	public function p_dashboard($reportData){
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			if($v['report_type'] == 1){
				//十二导联报告
				$reportArray[] = $v;
			}elseif ($v['report_type'] == 2){
				//一体机报告
				$reportArray[] = $v;
			}elseif ($v['report_type'] == 3){
				//心电贴报告
				$sstData = M('data_sst')->where('id='.$v['detect_id'])->find();
				$avgHr = $sstData['avg_hr'];
				$v['avg_hr'] = $avgHr;
		
				$reportArray[] = $v;
			}elseif ($v['report_type'] == 4){
				//血压计报告
				$dbpData = M('data_dynamic_bp')->where('detect_id='.$v['detect_id'])->find();
				$avgSp = $dbpData['avg_sp'];
				$avgDp = $dbpData['avg_dp'];
				$avgHr = $dbpData['avg_hr'];
				$v['avg_sp'] = $avgSp;//舒张压
				$v['avg_dp'] = $avgDp;//收缩压
				$v['avg_hr'] = $avgHr;//心率
		
				$reportArray[] = $v;
			}elseif ($v['report_type'] == 5){
				//血糖报告
				$bsData = M('data_blood_sugar')->where('blood_sugar_id='.$v['detect_id'])->find();
				$bloodSugar = $bsData['blood_sugar'];
				$v['data'] = $bloodSugar;
		
				$reportArray[] = $v;
			}elseif ($v['report_type'] == 6){
				//血氧报告
				$boData = M('data_blood_oxygen')->where('blood_oxygen_id='.$v['detect_id'])->find();
				$bloodOxygen = $boData['blood_oxygen'];
				$heartbeat = $boData['heartbeat'];
				$v['data'] = $bloodOxygen;
		
				$reportArray[] = $v;
			}elseif ($v['report_type'] == 7){
				//尿常规
				$reportArray[] = $v;
			}elseif ($v['report_type'] == 8){
				//体温
				$trData = M('data_tempe_rature')->where('tempe_rature_id='.$v['detect_id'])->find();
				$tempeRature = $trData['tempe_rature'];
				$v['data'] = $tempeRature;
		
				$reportArray[] = $v;
			}
				
		}
		return $reportArray;
	}

	//获取新闻列表的方法
	public function getNewsList() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '29' );
		// 设置界面显示
		$this->assign ( "title", "新闻列表" );
		$this->assign ( "discription", "此界面将会显示您的您的新闻列表" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "newspaper-o" );
		$this->assign ( "parentTitle", "新闻资讯" );
		
		$m = M('info_article');
		$count = $m->count();
		$p = getpage($count,5);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
		
		$newsData = M('info_article')->group('article_id')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		$spokenHisMindData = M('info_article')->where('type=1')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();//心里话
		$cardiovascularData = M('info_article')->where('type=2')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();//心血管
		$maleData = M('info_article')->where('type=3')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();//男性
		$gynaecologyData = M('info_article')->where('type=4')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();//妇科
		$parentingData = M('info_article')->where('type=5')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();//育儿
		$healthData = M('info_article')->where('type=6')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();//养生
		$bisexualData = M('info_article')->where('type=7')->order ( 'create_time DESC' )->limit($p->firstRow, $p->listRows)->select();//男性
		
		
		$this->assign ( "newsData", $newsData );
		$this->assign ( "spokenHisMindData", $spokenHisMindData );
		$this->assign ( "cardiovascularData", $cardiovascularData );
		$this->assign ( "maleData", $maleData );
		$this->assign ( "gynaecologyData", $gynaecologyData );
		$this->assign ( "parentingData", $parentingData );
		$this->assign ( "healthData", $healthData );
		$this->assign ( "bisexualData", $bisexualData );
		
		
		$this->display ();
	}
	
	// 获取健康视频列表
	public function getHealthVideoList() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '31' );
		// 设置界面显示
		$this->assign ( "title", "视频列表" );
		$this->assign ( "discription", "此界面将会显示您的您的视频列表" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-file-video-o" );
		$this->assign ( "parentTitle", "健康视频" );
		
		$videoData = $this->p_getHealthVideoList ();
		$this->assign ( "videoData", $videoData );

		$this->display ();
	}
	
	// 获取健康视频的方法
	private function p_getHealthVideoList() {
		$url = 'http://develop.nap.ainia.com.cn/api.php/Index/getVideosList';
	
		$data = array ();
		$result = get ( $url, $data );
		$array = json_decode ( $result, true );
	
		$resultArray = array ();
	
		foreach ( $array as $new ) {
			$tempArray = array ();
			$tempArray ['title'] = $new ['title'];
			$tempArray ['videoDescription'] = $new ['description'];
			$tempArray ['coverUrl'] = $new ['cover_url'];
			$tempArray ['videoId'] = $new ['id'];
			$tempArray ['videoUrl'] = $new ['url'];
			$tempArray ['addTime'] = time_format ( $new ['create_time'] );
			$tempArray ['updateTime'] = time_format ( $new ['update_time'] );
			$tempArray ['source'] = $new ['source'];
			$tempArray ['sourceUrl'] = $new ['source_url'];
			$tempArray ['viewTimes'] = $new ['view'];
				
			$resultArray [] = $tempArray;
		}
	
		return $resultArray;
	}
	
	
	//健康信息 start
	//心电贴报告列表
	public function sstReportList(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '11' );
		// 设置界面显示
		$this->assign ( "title", "心电信息" );
		$this->assign ( "discription", "此界面将会显示您的您的心电信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',3);
		
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,5);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
		
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			$sstData = M('data_sst')->where('id='.$v['detect_id'])->find();
			$avgHr = $sstData['avg_hr'];
			$v['avg_hr'] = $avgHr;
			$reportArray[] = $v;
			
		}
		$this->assign ( "reportArray", $reportArray );
// 		p($reportArray);

		$this->display ();
	
	}
	
	//血糖报告列表
	public function bloodSugartList(){
// 		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '12' );
		// 设置界面显示
		$this->assign ( "title", "血糖信息" );
		$this->assign ( "discription", "此界面将会显示您的您的血糖信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
 		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',5);
	
// 		$m = M('result_report');
// 		$count = $m->count();
// 		$p = getpage($count,1);
// 		$this->assign('select', $list); // 赋值数据集
// 		$this->assign('page', $p->show()); // 赋值分页输出->limit($p->firstRow, $p->listRows)
	
		$reportData = M('result_report')->where($map)->order ( 'add_time ASC' )->select();
		//历史数据
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			$bsData = M('data_blood_sugar')->where('blood_sugar_id='.$v['detect_id'])->find();
			//获取测量时间和血糖值
			$bloodSugar = $bsData['blood_sugar'];
			$detectTime = $bsData['detect_time'];
			$v['blood_sugar'] = $bloodSugar;
			$v['detect_time'] = $detectTime;
			$reportArray[] = $v;
				
		}

		$this->assign ( "reportArray", $reportArray );
		
		//获取当天的日期的时间
		$rtime = date('Y-m-d',time());
// 		$rtime = '2016-11-07';//测试
		//获取默认选择的日/周/月
		$rdotime = 1;
		//图形分析
		$bsArray = M('data_blood_sugar')->where('uid='.$uid)->select();
		foreach($bsArray as $key=>$value){
			$addtime = get_time_stamp($value['add_time']);
			$bsArray[$key]['addtime'] = date('Y-m-d',$addtime);
			$bsArray[$key]['month'] = date('Y-m',$addtime);
			$bsArray[$key]['time'] = date('H:i:s',$addtime);
			$bsArray[$key]['mon'] = date('m-d',$addtime);
		}
		//日
		//二维数组去重
		$tmpArray = array();
		foreach($bsArray as $k => $v){
			if($v['addtime'] != $rtime){
				$newbloodSugar = '';
			}
			if(in_array($v['addtime'], $tmpArray)){
				//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
				//unset($goods[$k]);
			}else{
				$tmpArray[] = $v['addtime'];
			}
		}
		foreach($tmpArray as $key => $val){
			$tmp[$key][] = $val;
		}
		//按日重组数组
		foreach($bsArray as $k=>$v){
			foreach($tmp as $kk=>$vv){
				if($v['addtime'] == $vv[0]){
					$resultArray[$vv[0]][] = $v;
				}
			}
		}
		//获取用户传入的数据
		foreach($resultArray as $key=>$value){
			if($rtime == $key){
				foreach ($value as $val){
					$tempArr['time'] = $val['detect_time'];
					$tempArr['sugar'] = $val['blood_sugar'];
					$newArr[] = $tempArr;
				}
			}
		}
		$newbloodSugar = array();
		foreach ($newArr as $v){
			$result[$v['time']] = $v['sugar'];
		}
		
		$this->assign('result',$result);
	
	
		$this->display ();
	
	}
	
	//保存血糖数据
	public function ajax_saveBSData(){
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取测量时间
		$detectTime = I_E ( 'detect_time' );
		//获取浓度值
		$bloodSugar = I_E ( 'blood_sugar' );
		
		$detectData = array();
		$detectData['uid'] = $uid;
		$detectData['detect_time'] = $detectTime;
		$detectData['blood_sugar'] = $bloodSugar;
		$detectData['add_time'] = time_format ( time () );
		
		$result = M('data_blood_sugar')->where('uid='.$uid)->add($detectData);
		
		if($result){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
				
		}
	}
	
	//根据条件获取柱状图数据
	public function ajax_getBSData(){
		//获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
// // 		//获取用户填写的时间
		$stime = I ( 'rtime' );
		$rtime = ltrim($stime);
// 		获取用户选择的日/周/月
		$rdotime = I ( 'rdotime' );
	 	//获取用户选择的报告类型
	 	$type = I('type');
	 	
// 	 	$type = 1;
// 	 	$rdotime = 1;
// 	 	$rtime = '2016-11-07';
	 	if($type == 1){
	 		//查询血糖表
	 		$bsArray = M('data_blood_sugar')->where('uid='.$uid)->select();
	 	}elseif ($type == 2){
	 		//查询体温表
	 		$bsArray = M('data_tempe_rature')->where('uid='.$uid)->select();
	 	}elseif ($type == 3){
	 		//查询血压表
	 		$bsArray = M('data_dynamic_bp')->where('uid='.$uid)->select();
	 	}elseif($type == 4){
	 		//查询血氧表
	 		$bsArray = M('data_blood_oxygen')->where('uid='.$uid)->select();
	 	}
	 	
		//调用根据筛选条件获取相应的数据方法
		$result = $this->getDetectData($uid,$rtime,$rdotime,$bsArray,$type);
		if($result){
			$this -> ajaxReturn($result);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($result);

		}
	}
	
	//根据条件获取血糖数据
	public function getDetectData($uid,$rtime,$rdotime,$bsArray,$type){
		foreach($bsArray as $key=>$value){
			$addtime = get_time_stamp($value['add_time']);
			$bsArray[$key]['addtime'] = date('Y-m-d',$addtime);
			$bsArray[$key]['month'] = date('Y-m',$addtime);
			$bsArray[$key]['time'] = date('H:i:s',$addtime);
			$bsArray[$key]['mon'] = date('m-d',$addtime);
		}
		
		if($rdotime == 1){
			//日
			//二维数组去重
			$tmpArray = array();
			foreach($bsArray as $k => $v){
				if(in_array($v['addtime'], $tmpArray)){
					//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
					//unset($goods[$k]);
				}else{
					$tmpArray[] = $v['addtime'];
				}
			}
			foreach($tmpArray as $key => $val){
				$tmp[$key][] = $val;
			}
			//按日重组数组
			foreach($bsArray as $k=>$v){
				foreach($tmp as $kk=>$vv){
					if($v['addtime'] == $vv[0]){
						$resultArray[$vv[0]][] = $v;
					}
				}
			}
			//根据用户传入的日期筛选并重组数组
			foreach($resultArray as $key=>$value){
				if($rtime == $key){
					foreach ($value as $val){
						if($type == 1){
							//血糖值
							$tempArr['sugar'] = $val['blood_sugar'];
							$tempArr['time'] = $val['detect_time'];
						}elseif ($type == 2){
							//体温值
							$tempArr['sugar'] = $val['tempe_rature'];
							$tempArr['time'] = $val['detect_time'];
						}elseif ($type == 3){
							//血压值
							$tempArr['sugar'] = $val['avg_sp'];//舒张压
							$tempArr['value'] = $val['avg_dp'];//收缩压
							$tempArr['time'] = $val['detect_start_time'];
						}elseif ($type == 4){
							//血氧值
							$tempArr['sugar'] = $val['blood_oxygen'];//血氧浓度
							$tempArr['value'] = $val['heartbeat'];//心率
							$tempArr['time'] = $val['detect_time'];
						}
						$newArr[] = $tempArr;
					}
				}
			}
			$resultData = $newArr;
		}elseif ($rdotime == 2){
			//周
			//二维数组去重
			$tmpArray = array();
			foreach($bsArray as $k => $v){
				if(in_array($v['addtime'], $tmpArray)){
					//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
					//unset($goods[$k]);
				}else{
					$tmpArray[] = $v['addtime'];
				}
			}
			foreach($tmpArray as $key => $val){
				$tmp[$key][] = $val;
			}
			//按周重组数组
			foreach($bsArray as $k=>$v){
				foreach($tmp as $kk=>$vv){
					if($v['addtime'] == $vv[0]){
						$resultArray[$vv[0]][] = $v;
					}
				}
			}
			//获取用户传入日期的后7天的日期的数据
			$beginTime = get_time_stamp($rtime)+3600*24*7;
			//获取用户传入的数据
			foreach($resultArray as $k=>$v){
				if(get_time_stamp($k) >= get_time_stamp($rtime) && get_time_stamp($k) < $beginTime){
					$result[] = $v;
				}
			}
			
			//根据用户传入的日期筛选并重组数组
			foreach($result as $key=>$value){
				foreach ($value as $val){
					if($type == 1){
						//血糖值
						$tempArr['sugar'] = $val['blood_sugar'];
						$tempArr['time'] = $val['detect_time'];
					}elseif ($type == 2){
						//体温值
						$tempArr['sugar'] = $val['tempe_rature'];
						$tempArr['time'] = $val['detect_time'];
					}elseif ($type == 3){
						//血压值
						$tempArr['sugar'] = $val['avg_sp'];//舒张压
						$tempArr['value'] = $val['avg_dp'];//收缩压
						$tempArr['time'] = $val['detect_start_time'];
					}elseif ($type == 4){
						//血氧值
						$tempArr['sugar'] = $val['blood_oxygen'];//血氧浓度
						$tempArr['value'] = $val['heartbeat'];//心率
						$tempArr['time'] = $val['detect_time'];
					}
					$newArr[] = $tempArr;
				}
			}
			$resultData = $newArr;
		}else{
			//月
			//二维数组去重
			$tmpArray = array();
			foreach($bsArray as $k => $v){
				if(in_array($v['month'], $tmpArray)){
					//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
					//unset($goods[$k]);
				}else{
					$tmpArray[] = $v['month'];
				}
			}
			foreach($tmpArray as $key => $val){
				$tmp[$key][] = $val;
			}
			//按月重组数组
			foreach($bsArray as $k=>$v){
				foreach($tmp as $kk=>$vv){
					if($v['month'] == $vv[0]){
						$resultArray[$vv[0]][] = $v;
					}
				}
			}
			
			//截取用户传入的日期
			$time = substr($rtime, 0,7);
			//获取用户传入月份的数据
			foreach($resultArray as $key=>$value){
				//根据用户传入的日期筛选并重组数组
				if($time == $key){
					foreach ($value as $val){
						if($type == 1){
							//血糖值
							$tempArr['sugar'] = $val['blood_sugar'];
							$tempArr['time'] = $val['detect_time'];
						}elseif ($type == 2){
							//体温值
							$tempArr['sugar'] = $val['tempe_rature'];
							$tempArr['time'] = $val['detect_time'];
						}elseif ($type == 3){
							//血压值
							$tempArr['sugar'] = $val['avg_sp'];//舒张压
							$tempArr['value'] = $val['avg_dp'];//收缩压
							$tempArr['time'] = $val['detect_start_time'];
						}elseif ($type == 4){
							//血氧值
							$tempArr['sugar'] = $val['blood_oxygen'];//血氧浓度
							$tempArr['value'] = $val['heartbeat'];//心率
							$tempArr['time'] = $val['detect_time'];
						}
						$newArr[] = $tempArr;
					}
				}
			}
			
			$resultData = $newArr;
			
		}
		return $resultData;
	}
	
	
	//十二导联报告列表
	public function twelveECGReportList(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '13' );
		// 设置界面显示
		$this->assign ( "title", "十二导联信息" );
		$this->assign ( "discription", "此界面将会显示您的您的十二导联信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',1);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			$reportArray[] = $v;
	
		}
		
		$this->assign ( "reportArray", $reportArray );
		//p($reportArray);
	
		$this->display ();
	
	}
	
	//血压计报告列表
	public function dbpReportList(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '14' );
		// 设置界面显示
		$this->assign ( "title", "血压信息" );
		$this->assign ( "discription", "此界面将会显示您的您的血压信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',4);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			$dbpData = M('data_dynamic_bp')->where('detect_id='.$v['detect_id'])->find();
			$avgSp = $dbpData['avg_sp'];
			$avgDp = $dbpData['avg_dp'];
			$avgHr = $dbpData['avg_hr'];
			
			$v['avg_sp'] = $avgSp;//舒张压
			$v['avg_dp'] = $avgDp;//收缩压
			$v['avg_hr'] = $avgHr;//心率
			$reportArray[] = $v;
	
		}
		
		$this->assign ( "reportArray", $reportArray );

		//获取当天的日期的时间
		$rtime = date('Y-m-d',time());
// 		$rtime = '2016-11-09';//测试
		//获取默认选择的日/周/月
		$rdotime = 1;
		//图形分析
		$bsArray = M('data_dynamic_bp')->where('uid='.$uid)->select();
		foreach($bsArray as $key=>$value){
			$addtime = get_time_stamp($value['add_time']);
			$bsArray[$key]['addtime'] = date('Y-m-d',$addtime);
			$bsArray[$key]['month'] = date('Y-m',$addtime);
			$bsArray[$key]['time'] = date('H:i:s',$addtime);
			$bsArray[$key]['mon'] = date('m-d',$addtime);
		}
		//日
		//二维数组去重
		$tmpArray = array();
		foreach($bsArray as $k => $v){
			if($v['addtime'] != $rtime){
				$newbloodSugar = '';
			}
			if(in_array($v['addtime'], $tmpArray)){
				//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
				//unset($goods[$k]);
			}else{
				$tmpArray[] = $v['addtime'];
			}
		}
		foreach($tmpArray as $key => $val){
			$tmp[$key][] = $val;
		}
		//按日重组数组
		foreach($bsArray as $k=>$v){
			foreach($tmp as $kk=>$vv){
				if($v['addtime'] == $vv[0]){
					$resultArray[$vv[0]][] = $v;
				}
			}
		}
		
		//获取用户传入的数据
		foreach($resultArray as $key=>$value){
			if($rtime == $key){
				foreach ($value as $val){
					$tempArr['time'] = $val['detect_start_time'];
					$tempArr['sugar'] = $val['avg_sp'];
					$newArr[] = $tempArr;
						
					$temp['time'] = $val['detect_start_time'];
					$temp['sugar'] = $val['avg_dp'];
					$newArr1[] = $temp;
				}
			}
		}
		
		$newbloodSugar = array();
		foreach ($newArr as $v){
			$result[$v['time']] = $v['sugar'];
		}
		
		$newbloodSugar1 = array();
		foreach ($newArr1 as $v){
			$result1[$v['time']] = $v['sugar'];
		}
		
		$this->assign('result',$result);
		$this->assign('result1',$result1);
	
		$this->display ();
	
	}
	
	//保存血压数据
	public function ajax_saveDBPData(){
		// 获取用户id
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取测量时间
		$detectTime = I_E ( 'detect_start_time' );
		//获取收缩压
		$avgSp = I_E ( 'avg_sp' );
		//获取舒张压
		$avgDp = I_E ( 'avg_dp' );
		//获取心率
		$avgHr = I_E ( 'avg_hr' );
	
		$detectData = array();
		$detectData['uid'] = $uid;
		$detectData['detect_start_time'] = $detectTime;
		$detectData['avg_sp'] = $avgSp;
		$detectData['avg_dp'] = $avgDp;
		$detectData['avg_hr'] = $avgHr;
		$detectData['add_time'] = time_format ( time () );
	
		$result = M('data_dynamic_bp')->where('uid='.$uid)->add($detectData);
	
		if($result){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
	
		}
	}
	
	//血氧报告列表
	public function bloodOxygenList(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '15' );
		// 设置界面显示
		$this->assign ( "title", "血氧信息" );
		$this->assign ( "discription", "此界面将会显示您的您的血氧信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',6);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			$boData = M('data_blood_oxygen')->where('blood_oxygen_id='.$v['detect_id'])->find();
			$bloodOxygen = $boData['blood_oxygen'];
			$heartbeat = $boData['heartbeat'];
			$v['blood_oxygen'] = $bloodOxygen;
			$v['heartbeat'] = $heartbeat;
			$reportArray[] = $v;
	
		}
	
		$this->assign ( "reportArray", $reportArray );
		
		//获取当天的日期的时间
		$rtime = date('Y-m-d',time());
// 		$rtime = '2016-11-29';//测试
		//获取默认选择的日/周/月
		$rdotime = 1;
		//图形分析
		$bsArray = M('data_blood_oxygen')->where('uid='.$uid)->select();
		foreach($bsArray as $key=>$value){
			$addtime = get_time_stamp($value['add_time']);
			$bsArray[$key]['addtime'] = date('Y-m-d',$addtime);
			$bsArray[$key]['month'] = date('Y-m',$addtime);
			$bsArray[$key]['time'] = date('H:i:s',$addtime);
			$bsArray[$key]['mon'] = date('m-d',$addtime);
		}
		//日
		//二维数组去重
		$tmpArray = array();
		foreach($bsArray as $k => $v){
			if($v['addtime'] != $rtime){
				$newbloodSugar = '';
			}
			if(in_array($v['addtime'], $tmpArray)){
				//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
				//unset($goods[$k]);
			}else{
				$tmpArray[] = $v['addtime'];
			}
		}
		foreach($tmpArray as $key => $val){
			$tmp[$key][] = $val;
		}
		//按日重组数组
		foreach($bsArray as $k=>$v){
			foreach($tmp as $kk=>$vv){
				if($v['addtime'] == $vv[0]){
					$resultArray[$vv[0]][] = $v;
				}
			}
		}
		
		//获取用户传入的数据
		foreach($resultArray as $key=>$value){
			if($rtime == $key){
				foreach ($value as $val){
					$tempArr['time'] = $val['detect_time'];
					$tempArr['sugar'] = $val['blood_oxygen'];
					$newArr[] = $tempArr;
					
					$temp['time'] = $val['detect_time'];
					$temp['sugar'] = $val['heartbeat'];
					$newArr1[] = $temp;
				}
			}
		}
		
		$newbloodSugar = array();
		foreach ($newArr as $v){
			$result[$v['time']] = $v['sugar'];
		}
		
		$newbloodSugar1 = array();
		foreach ($newArr1 as $v){
			$result1[$v['time']] = $v['sugar'];
		}
		
		$this->assign('result',$result);
		$this->assign('result1',$result1);
	
		$this->display ();
	
	}
	
	//保存血氧数据
	public function ajax_saveBOData(){
		// 获取用户id
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取测量时间
		$detectTime = I_E ( 'detect_time' );
		//获取浓度值
		$bloodOxygen = I_E ( 'blood_oxygen' );
		//获取心跳值
		$heartbeat = I_E ( 'heartbeat' );
	
		$detectData = array();
		$detectData['uid'] = $uid;
		$detectData['detect_time'] = $detectTime;
		$detectData['blood_oxygen'] = $bloodOxygen;
		$detectData['heartbeat'] = $heartbeat;
		$detectData['add_time'] = time_format ( time () );
	
		$result = M('data_blood_oxygen')->where('uid='.$uid)->add($detectData);
	
		if($result){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
	
		}
	}
	
	//尿常规报告列表
	public function urineRoutineList(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '17' );
		// 设置界面显示
		$this->assign ( "title", "尿常规信息" );
		$this->assign ( "discription", "此界面将会显示您的您的尿常规信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',7);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			
			$reportArray[] = $v;
		}
	
		$this->assign ( "reportArray", $reportArray );
		//p($reportArray);
	
		$this->display ();
	
	}
	
	//发送尿常规数据
	public function postURContent(){
		// 获取用户id
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$info = $this->upload();
		
		if(!$info){//判断图片是否上传成功
			echo '未上传图片';
		}else{
			$bucket = 'ainia';
			$fileKey = "apps/nap/askAttachment/".$info['file']['savename'];
			$filePath =  'Public/Uploads/'.$info['file']['savename'];
			$fileType = $info['file']['ext'];
			$ossData = upload_oss_resource($bucket, $fileKey, $filePath, $fileType);
				
			//添加附件到附件表
			$appendixData = array();
			$appendixData['url'] = $fileKey;
			$appendixData['create_time'] = time_format ( time () );
			$appendixId = M('info_appendix')->add($appendixData);
			
			$this->assign ( "fileKey", $fileKey );
		
			//添加数据到尿常规表
			$data = array ();
			$data ['uid'] = $uid;
			$data ['appendix_id'] = $appendixId;
			$data ['detect_time'] = time_format ( time () );
			$data ['add_time'] = time_format ( time () );
			M('data_urine_routine')->where('uid='.$uid)->add($data);
				
			$this->success('保存成功','urineRoutineList');
		
		}
			
	}
	
	//体温报告列表
	public function tempeRatureList(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '18' );
		// 设置界面显示
		$this->assign ( "title", "体温信息" );
		$this->assign ( "discription", "此界面将会显示您的您的体温信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-envelope-o" );
		$this->assign ( "parentTitle", "健康信息" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map = array();
		$map['uid'] = $uid;
		$map['report_type'] = array('eq',8);
	
		$m = M('result_report');
		$count = $m->count();
		$p = getpage($count,2);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
	
		$reportData = M('result_report')->where($map)->order ( 'add_time ASC' )->limit($p->firstRow, $p->listRows)->select();
		
		foreach ($reportData as $k=>$v){
			if(!empty($v['report_url'])){
				$v['report_url'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['report_url'];
			}
			$trData = M('data_tempe_rature')->where('tempe_rature_id='.$v['detect_id'])->find();
			$tempeRature = $trData['tempe_rature'];
			$v['tempe_rature'] = $tempeRature;
			$reportArray[] = $v;
	
		}
		
		$this->assign ( "reportArray", $reportArray );
		
		//获取当天的日期的时间
		$rtime = date('Y-m-d',time());
// 		$rtime = '2016-11-30';//测试
		//获取默认选择的日/周/月
		$rdotime = 1;
		//图形分析
		$bsArray = M('data_tempe_rature')->where('uid='.$uid)->select();
		foreach($bsArray as $key=>$value){
			$addtime = get_time_stamp($value['add_time']);
			$bsArray[$key]['addtime'] = date('Y-m-d',$addtime);
			$bsArray[$key]['month'] = date('Y-m',$addtime);
			$bsArray[$key]['time'] = date('H:i:s',$addtime);
			$bsArray[$key]['mon'] = date('m-d',$addtime);
		}
		//日
		//二维数组去重
		$tmpArray = array();
		foreach($bsArray as $k => $v){
			if($v['addtime'] != $rtime){
				$newbloodSugar = '';
			}
			if(in_array($v['addtime'], $tmpArray)){
				//搜索$v[$key]是否在$tmp_arr数组中存在，若存在返回true
				//unset($goods[$k]);
			}else{
				$tmpArray[] = $v['addtime'];
			}
		}
		foreach($tmpArray as $key => $val){
			$tmp[$key][] = $val;
		}
		//按日重组数组
		foreach($bsArray as $k=>$v){
			foreach($tmp as $kk=>$vv){
				if($v['addtime'] == $vv[0]){
					$resultArray[$vv[0]][] = $v;
				}
			}
		}
		//获取用户传入的数据
		foreach($resultArray as $key=>$value){
			if($rtime == $key){
				foreach ($value as $val){
					$tempArr['time'] = $val['detect_time'];
					$tempArr['sugar'] = $val['tempe_rature'];
					$newArr[] = $tempArr;
				}
			}
		}
		$newbloodSugar = array();
		foreach ($newArr as $v){
			$result[$v['time']] = $v['sugar'];
		}
		
		$this->assign('result',$result);
	
		$this->display ();
	
	}
	
	//保存体温规数据
	public function ajax_saveTRData(){
		// 获取用户id
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取测量时间
		$detectTime = I_E ( 'detect_time' );
		//获取体温值
		$tempeRature = I_E ( 'tempe_rature' );
	
		$detectData = array();
		$detectData['uid'] = $uid;
		$detectData['detect_time'] = $detectTime;
		$detectData['tempe_rature'] = $tempeRature;
		$detectData['add_time'] = time_format ( time () );
	
		$result = M('data_tempe_rature')->where('uid='.$uid)->add($detectData);
	
		if($result){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
	
		}
	}
	
	//健康信息 end
	
	//健康咨询 start
	//我要咨询
	public function userSendConsultingInfo(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '20' );
		// 设置界面显示
		$this->assign ( "title", "我要咨询" );
		$this->assign ( "discription", "此界面将会显示您的您的我要咨询信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-edit" );
		$this->assign ( "parentTitle", "健康咨询" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		//获取科室信息
		$departmentInfo = M('info_hospital_department')->select();
		$this->assign('departmentInfo',$departmentInfo);
		
		//所有科室下的医生
// 		$map['department_id'] = I('get.did');
		$map['user_type'] = array('eq',2);
		
// 		$m = D ( 'UserCenter/UserProfile' );
// 		$count = $m->count();
// 		$p = getpage($count,1);
// 		$this->assign('select', $list); // 赋值数据集
// 		$this->assign('page', $p->show()); // 赋值分页输出
// 		->limit($p->firstRow, $p->listRows)
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->select ();
		$doctorArray = $this->getHSPName ( $userInfo );
		
		foreach ($doctorArray as $k=>$v){
			$v['avatar'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['avatar'];
			$doctorListArray[] = $v;
		}
		
// 		p($doctorListArray);
		$this->assign('doctorListArray',$doctorListArray);
		
		$this->display ();
	
	}
	
	//异步筛选查询所属科室的医生
	public function ajax_getDoctorInfo(){
		//获取科室id
		$did = I_E ( 'did' );
		$map['user_type'] = array('eq',2);
		
		$userData = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->select ();
		foreach ($userData as $v){
			if($v['departmentId'] == $did){
				$userArray[] = $v;
			}else{
				$returnArray=array();
				$returnArray['status']=0;
				$this -> ajaxReturn($returnArray);
			}
		}
		
		if($userData){
// 			$m = D ( 'UserCenter/UserProfile' );
// 			$count = $m->count();
// 			$p = getpage($count,1);
// 			$this->assign('select', $list); // 赋值数据集
// 			$this->assign('page', $p->show()); // 赋值分页输出
				
// 			$userArray = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->limit($p->firstRow, $p->listRows)->select ();
				
			$doctorArray = $this->getHSPName ( $userArray );
				
			foreach ($doctorArray as $k=>$v){
				$v['avatar'] = "http://ainia.oss-cn-beijing.aliyuncs.com/".$v['avatar'];
				$doctorListArray[] = $v;
			}
			
			$this -> ajaxReturn($doctorListArray);
			
		}
	}
	
	// 获取医院.科室.职称名称
	private function getHSPName($doctorInfo) {
		foreach ( $doctorInfo as $v ) {
			// 获取用户的医院id、职称id、科室id
			$userId = $v ['uid'];
			// 获取用户的医院id、职称id、科室id
			$info = M ( 'user_info_extra' )->where ( 'uid=' . $userId )->find ();
			$hospitalId = $info ['hospital_id'];
			$departmentId = $info ['department_id'];
			$subdisciplineId = $info ['subdiscipline_id'];
			$positionId = $info ['position_id'];
				
			if ($hospitalId) {
				// 获取用户的医院名称
				$hospitalInfo = M ( 'info_hospital' )->where ( 'id=' . $hospitalId )->find ();
				$hospitalName = $hospitalInfo ['name'];
	
				// 获取科室名称
				$departmentInfo = M ( 'info_hospital_department' )->where ( 'department_id=' . $departmentId )->find ();
				$departmentName = $departmentInfo ['department_name'];
				
				// 获取分科室名称
				$subdisciplineInfo = M ( 'info_hospital_subdiscipline' )->where ( 'subdiscipline_id=' . $subdisciplineId )->find ();
				$subdisciplineName = $subdisciplineInfo ['subdiscipline_name'];
	
				// 获取职称名称
				$positionInfo = M ( 'info_hospital_position' )->where ( 'position_id=' . $positionId )->find ();
				$positionName = $positionInfo ['position_name'];
			} else {
				$hospitalName = '';
				$subdisciplineName = '';
				$positionName = '';
			}
				
			$v ['hospitalName'] = $hospitalName;
			$v ['departmentName'] = $departmentName;
			$v ['subdisciplineName'] = $subdisciplineName;
			$v ['positionName'] = $positionName;
				
			$doctorListArray [] = $v;
		}
	
		return $doctorListArray;
	}
	
	//发送咨询数据
	public function postAskContent(){
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		//获取咨询医生id
		$doctorId = I_E('uid');
		$content = I_E('content');
		
		$info = $this->upload();
		
		if($info){
			//判断图片是否上传成功
			$bucket = 'ainia';
			$fileKey = "apps/nap/askAttachment/".$info['file']['savename'];
			$filePath =  'Public/Uploads/'.$info['file']['savename'];
			$fileType = $info['file']['ext'];
			$ossData = upload_oss_resource($bucket, $fileKey, $filePath, $fileType);
			
			//添加附件到附件表
			$appendixData = array();
			$appendixData['url'] = $fileKey;
			$appendixData['create_time'] = time_format ( time () );
			$appendixId = M('info_appendix')->add($appendixData);
				
		}
		if(!$appendixId){
			$appendixId = 0;
		}
		
		//组合咨询数据,写入问诊表
		$data = array ();
		$data ['uid'] = $uid;
		$data ['doctor_id'] = $doctorId;
		$data ['content'] = $content;
		$data ['appendix_id'] = $appendixId;
		$data ['create_time'] = time_format ( time () );
			
		// 查询问诊表是否有这条问诊数据,如果有consultation_id就为askId,没有就添加
		$map = array ();
		$map ['uid'] = $uid;
		$map ['doctor_id'] = $doctorId;
			
		$askArray = M ( 'info_ask' )->where ( $map )->find ();
		$consultationId = $askArray ['consultation_id'];
			
		if ($askArray) {
			$result = M ( 'info_ask' )->add ( $data );
			$cid = $consultationId;
			// 更新咨询id
			M ( 'info_ask' )->where ( 'ask_id=' . $result )->setField ( 'consultation_id', $consultationId );
			M ( 'info_ask' )->where ( 'consultation_id=' . $consultationId )->setField ( 'status', "0" );
		} else {
			$result = M ( 'info_ask' )->add ( $data );
			// 更新咨询id
			M ( 'info_ask' )->where ( 'ask_id=' . $result )->setField ( 'consultation_id', $result );
			$cid = $result;
		}
		
		$this->success('咨询成功',U('getUserConsultingList'));
		$this->display('userSendConsultingInfo');
	}
	
	//咨询历史
	public function getUserConsultingList(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '21' );
		// 设置界面显示
		$this->assign ( "title", "咨询历史" );
		$this->assign ( "discription", "此界面将会显示您的您的咨询历史信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-edit" );
		$this->assign ( "parentTitle", "健康咨询" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		//获取已回复数据
		$map['uid'] = $uid;
		$map['status'] = array('eq',2);
		$alreadyReplyArray = M('info_ask')->where($map)->select();
		$this->assign('alreadyReplyArray',$alreadyReplyArray);
		
		//获取未回复数据
		$map['uid'] = $uid;
		$map['status'] = array('eq',0);
		$noReplyArray = M('info_ask')->where($map)->select();
		foreach ($noReplyArray as $k=>$v){
			if($v['appendix_id']){
				$appendixArray = M('info_appendix')->where('appendix_id='.$v['appendix_id'])->find();
				$url = 'http://ainia.oss-cn-beijing.aliyuncs.com/'.$appendixArray['url'];
				$noReplyArray[$k]['url'] = $url;
			}
		}
		$this->assign('noReplyArray',$noReplyArray);
		
		$this->display();
	}
	
	//获取医生回复该条问诊的数据
	public function ajax_getAnswerData(){
		//获取咨询医生id
		$doctorId = I_E('doctorId');
		//获取问诊id
		$askId = I_E('askId');
		
		//查询回答表数据
		$map['ask_id'] = $askId;
		$map['uid'] = $doctorId;
		
		$result = D('DoctorAnswer')->where($map)->order ( 'create_time DESC' )->find();
		
		if($result > 0){
			$this -> ajaxReturn($result);
		}else{
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
		
		}
		
		exit();
		
	}
	//健康咨询 end
	
	//健康档案
	public function healthFile(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '23' );
		// 设置界面显示
		$this->assign ( "title", "健康档案" );
		$this->assign ( "discription", "此界面将会显示您的健康档案信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-th-list" );
		$this->assign ( "parentTitle", "健康档案" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$map['uid'] = $uid;
		//从档案表获取医生id
		$healthRecordData = M('info_health_record')->where($map)->find();
		$doctorId = $healthRecordData['doctor_id'];
		
		$match['doctor_id'] = $doctorId;
		//获取档案数据
		$healthRecordArray = D('DoctorHealthRecord')->where($match)->select();
		$this->assign('healthRecordArray',$healthRecordArray);
		
		$this->display ('healthFile');
	}
	
	//健康档案
	public function healthFileDetail(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '24' );
		// 设置界面显示
		$this->assign ( "title", "健康档案详情" );
		$this->assign ( "discription", "此界面将会显示您的健康档案详情信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-th-list" );
		$this->assign ( "parentTitle", "健康档案" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
	
		$map['uid'] = $uid;
		
		//获取患者信息
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
		$this->assign('userInfo',$userInfo);
	
		$this->display ();
	}
	
	// 账户基础信息
	public function accountBaseInfo() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '4' );
		// 设置界面显示
		$this->assign ( "title", "基本信息" );
		$this->assign ( "discription", "此界面将会显示您的账户信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-object-ungroup" );
		$this->assign ( "parentTitle", "账户中心" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$match = array ();
		$match ['uid'] = $uid;
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $match )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
		$this->assign('userInfo',$userInfo);
		
		$this->display ();
	}
	
	//消息中心
	public function messageCenter(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '9' );
		// 设置界面显示
		$this->assign ( "title", "消息提醒" );
		$this->assign ( "discription", "此界面将会显示您的您的消息信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-comment" );
		$this->assign ( "parentTitle", "消息中心" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		$m = M('info_message');
		$count = $m->count();
		$p = getpage($count,1);
		$this->assign('select', $list); // 赋值数据集
		$this->assign('page', $p->show()); // 赋值分页输出
		
		
		//获取系统消息0为系统消息 1为公司活动 2为报告(报告是自动生成的不在消息表中) 3banner活动4.问诊数据5.医生群发消息6.名医问诊
		$map['type'] = array('eq',0);
		$systemMessageArray = $m->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		$this->assign ( 'systemMessageArray', $systemMessageArray );
		
		//获取健康消息
		$map['type'] = array('eq',5);
		$healthMessageArray = $m->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		$this->assign ( 'healthMessageArray', $healthMessageArray );
		
		
		//获取通知消息
		$map['type'] = array('eq',6);
		$askMessageArray = $m->where($map)->order ( 'add_time DESC' )->limit($p->firstRow, $p->listRows)->select();
		$this->assign ( 'askMessageArray', $askMessageArray );
		
		$this->display ('messageCenter');
	}
	
	//消息详情
	public function messageDetail(){
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '9' );
		// 设置界面显示
		$this->assign ( "title", "消息提醒" );
		$this->assign ( "discription", "此界面将会显示您的您的消息信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-comment" );
		$this->assign ( "parentTitle", "消息中心" );
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		//获取消息id
		$messageId = I_E ( 'message_id' );
		$map['message_id'] = $messageId;
		$messageInfo = M('info_message')->where($map)->find();
		$this->assign ( 'messageInfo', $messageInfo );
		
		$this->display ('messageDetail');
	}
	
	//修改消息状态
	public function ajax_changeStatus(){
		//获取消息id
		$mid = I_E ( 'mid' );
		$map['message_id'] = $mid;
		$result = M('info_message')->where($map)->setField('status',1);
		
		if($result > 0){
			$returnArray=array();
			$returnArray['status']=1;
			$this -> ajaxReturn($returnArray);
				
		}else{
				
			$returnArray=array();
			$returnArray['status']=0;
			$this -> ajaxReturn($returnArray);
				
		}
		
		exit();
	}
	
	// 账户认证信息
	public function accountVerifyInfo() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '8' );
		// 设置界面显示
		$this->assign ( "title", "认证信息" );
		$this->assign ( "discription", "此界面将会显示您的您的账户认证信息" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-object-ungroup" );
		$this->assign ( "parentTitle", "账户中心" );
		
		$this->display ();
	}
	
	// 安全中心
	public function safeCenter() {
		// 设置菜单
		$info = M ( 'menu' )->where('role=1')->select ();
		$menu = $this->processMenuArray ( $info );
		
		session ( 'menu', $menu );
		$this->assign ( "menu", session ( 'menu' ) );
		$this->assign ( "menuId", '5' );
		// 设置界面显示
		$this->assign ( "title", "安全中心" );
		$this->assign ( "discription", "此处进行安全的相关操作" );
		$this->assign ( "parentUrl", "#" );
		$this->assign ( "parentIcon", "fa-object-ungroup" );
		$this->assign ( "parentTitle", "账户中心" );
		
		// 获取用户id
		$userInfo = session ( 'userInfo' );
		$uid = $userInfo['uid'];
		
		
		$this->display ();
	}
	
	// 开发文档
	public function documentation() {
		$this->display ();
	}
	
	// 登录页面
	public function signIn() {
		$this->display ();
	}
	
	// 注册页面
	public function signUp() {
		$this->display ();
	}
	
	// 重置密码页面
	public function resetPassword() {
		$this->display ();
	}
	
	// 退出登录
	public function signOut() {
// 		session ( null );
		session('[destroy]');
		$this->redirect ( "signIn" );
	}
	
	//重置密码--第一步找回方式
	public function resetpwdDo(){
		//获取用户账号
		$email = I( "email" );
		$map['email'] = $email;
		$userInfo = D ( 'UserCenter/UserProfile' )->where ( $map )->field ( 'salt,password,reg_ip,last_login_ip,last_login_time,update_time', true )->relation ( true )->find ();
// 		$mobile = hideStar($userInfo['mobile']);
// 		$account = hideStar($account);
		$mobile = $userInfo['mobile'];
		$this->assign ( "email", $email );
		$this->assign ( "mobile", $mobile );
		
		$this->display();
	}
	
	//重置密码--第二步(1)通过保密邮箱找回密码
	public function resetPwdByEmailStep1(){
		//获取用户账号
		$email = I( "email" );
		$mobile = I( "mobile" );
		$this->assign ( "email", $email );
		$this->assign ( "mobile", $mobile );
		
		$array = explode('.', $email);
		$str = $array[0];
		$e = end(explode('@', $str));
		$this->assign ( "e", $e );
		
		$this->display();
	}
	
	//重置密码--第二步(2)通过手机找回密码
	public function resetPwdByMobileStep1(){
		//获取用户账号
		$email = I( "email" );
		$mobile = I( "mobile" );
		$this->assign ( "email", $email );
		$this->assign ( "mobile", $mobile );
		
		$this->display();
	}
	
	//重置密码--通过邮箱获取新密码
	public function getPassword(){
		//获取用户账号
		$email = I( "email" );
		$mobile = I( "mobile" );
		$pwd = I ( "password" );
		$confirmPassword = I ( "confirmPassword" );
		
		$this->display();
	}
	
	//重置密码--设置密码
	public function setPassword(){
		$email = I( "email" );
		$mobile = I( "mobile" );
		$pwd = I ( "password" );
		$confirmPassword = I ( "confirmPassword" );
		$postData = array ();
		$postData ['account'] = $email;
		$postData ['password'] = $pwd;
		$postData ['confirmPassword'] = $confirmPassword;
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/resetPassword';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$this->success('重置密码成功','signIn');
		} else {
			$this->error('重置密码失败,请重试','resetPassword');
		}
		
	}
	
	//重置密码的方法
	public function ajax_resetPassword() {
		$account = I_E ( "email" );
		$pwd = I_E ( "password" );
		
		$postData = array ();
		$postData ['account'] = $account;
		$postData ['password'] = $pwd;
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/resetPassword';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
				
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	
	//修改密码的方法
	public function ajax_changePwd() {
		$data = I();
		$postData = array ();
		$postData = $data;
		
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/changePwd';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
	
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = 0;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	//更新用户头像
	public function ajax_updateUserAvatar(){
		//获取用户id
		$uid = I_E('uid');
		$userType = 1;//用户类型
		$info = $this->upload();
		
		if(!$info){//判断图片是否上传成功
			$returnArray ['message'] = '未上传图片';
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}else{
			$bucket = 'ainia';
			$fileKey = "users/avatars/".$info['file']['savename'];
			$filePath =  'Public/Uploads/'.$info['file']['savename'];
			$fileType = $info['file']['ext'];
			$ossData = upload_oss_resource($bucket, $fileKey, $filePath, $fileType);
			
			// 保存当前数据对象
			$postData = array ();
			$postData ['uid'] = $uid;
			$postData['avatar'] = $fileKey;
			
			$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/updateUserInfo';
			$returnString = get ( $url, $postData );
			$returnObject = json_decode ( $returnString, true );
			
			if ($returnObject) {
				$returnArray ['status'] = $returnObject ['status'];
				$returnArray ['message'] = $returnObject ['message'];
			
				$this->ajaxReturn ( $returnArray );
			} else {
				// 账户中心模块有问题
				$returnArray ['status'] = 0;
				$this->ajaxReturn ( $returnArray );
			}
				
		}
		
		
	}
	
	//更新用户信息
	public function ajax_updateUserInfo(){
		$uid = I_E ( 'uid' );
		$data = I();
		$postData = array ();
		$postData = $data;
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/updateUserInfo';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
	
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	
	}
	
	// 登录方法
	public function ajax_signIn() {
		$account = I_E ( "email" );
		$pwd = I_E ( "password" );
		$remember = I_E ( "remember" );
		$postData = array ();
		$postData ['account'] = $account;
		$postData ['password'] = $pwd;
		$postData ['userType'] = 1;
// 		if ($remember == 1) {
// 			setcookie('email', $account, time() + 3600 * 24 * 365);
// 			setcookie('password', $pwd, time() + 3600 * 24 * 365);
// 			setcookie('remember', $remember, time() + 3600 * 24 * 365);
// 		}else{
// 			setcookie('email',$account,time()-3600 * 24 * 365);
// 			setcookie('password',$pwd,time()-3600 * 24 * 365);
// 			setcookie('remember',$remember,time()-3600 * 24 * 365);
// 		}
		
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/signIn';
// 		http://develop.hm.ainia.com.cn/index.php/UserCenter/Api/signIn
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			
			// 设置userInfo到session
			$userInfo = $returnObject ['data'];
			session ( 'userInfo', $userInfo );
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 注册方法
	public function ajax_signUp() {
		$account = I_E ( "email" );
		$pwd = I_E ( "password" );
		$userType = 1;
		
		$postData = array ();
		$postData ['account'] = $account;
		$postData ['password'] = $pwd;
		$postData ['userType'] = $userType;
		
		$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/signUp';//调用userCenter/Api/signUp方法
		
		//用户注册
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
		
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
		
	}
	
	// 重置密码给邮箱发邮件
	public function ajax_resetPwdByEmail() {
		$email = I_E ( 'email' );
		$postData = array ();
		$postData ['toEmail'] = $email;
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/modifyPasswordToSendMail';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$returnArray ['data'] = $returnObject ['data'];
				
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 发送验证码
	public function ajax_sendVerifyCode() {
		$mobile = I_E ( 'mobile' );
		$postData = array ();
		$postData ['mobile'] = $mobile;
		
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/sendVerifyCode';
		
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			// $returnArray['data'] = $returnObject['data'];
			if ($returnObject ['status']) {
				$codeKey = $returnObject ['data'] ['codeKey'];
				session ( 'mobileVerifyCodeKey', $codeKey );
				session ( 'mobileVerify', $mobile );
			}
			
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 验证手机号
	public function ajax_verifyMobile() {
		$mobile = I_E ( 'mobile' );
		$code = I_E ( 'code' );
		if (session ( 'mobileVerify' ) != $mobile) {
			
			$returnArray ['status'] = false;
			$returnArray ['message'] = '验证出现问题,请重新发送验证码';
			$this->ajaxReturn ( $returnArray );
			return;
		}
		
		$postData = array ();
		$postData ['codeKey'] = session ( 'mobileVerifyCodeKey' );
		$postData ['code'] = $code;
		
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/checkVerifyCode';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 发送验证码到邮箱
	public function ajax_sendVerifyEmail() {
		$userInfo = session ( "userInfo" );
		$email = I_E ( 'email' );
		$isNew = I_E ( 'isNew' );
		if ($isNew == "true") {
			// 检测是否被占有
			$postData = array ();
			$postData ['account'] = $email;
			$postData ['type'] = 'email';
			
			$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/checkDenyUser';
			$returnString = get ( $url, $postData );
			$returnObject = json_decode ( $returnString, true );
			if ($returnObject) {
				if (! $returnObject ['status']) {
					$returnArray ['status'] = false;
					$returnArray ['message'] = $returnObject ['message'];
					$this->ajaxReturn ( $returnArray );
					return;
				}
			} else {
				// 账户中心模块有问题
				$returnArray ['status'] = false;
				$this->ajaxReturn ( $returnArray );
			}
		} else {
			if ($userInfo ['email'] != $email) {
				$returnArray ['status'] = false;
				$returnArray ['message'] = '操作非法';
				$this->ajaxReturn ( $returnArray );
				return;
			}
		}
		$postData = array ();
		$postData ['toEmail'] = $email;
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/sendEmialVerify';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$returnArray ['data'] = $returnObject ['data'];
			
			$this->ajaxReturn ( $returnArray );
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	// 邮箱是否验证
	public function ajax_verifyEmailCode() {
		$email = I ( 'email' );
		$userInfo = session ( 'userInfo' );
		
		if (empty ( $email )) {
			$email = $userInfo ['email'];
			if ($userInfo ['email_verify'] == '1') {
				echoReturnJson ( true, '邮箱已经验证,无需操作' );
			}
		}
		
		$code = I_E ( 'code' );
		
		$postData = array ();
		$postData ['email'] = $email;
		$postData ['code'] = $code;
		
		$url = C ( "MODULE_URL_SERVICE" ) . 'Index/verifyEmail';
		$returnString = get ( $url, $postData );
		$returnObject = json_decode ( $returnString, true );
		if ($returnObject) {
			$returnArray ['status'] = $returnObject ['status'];
			$returnArray ['message'] = $returnObject ['message'];
			$returnArray ['data'] = $returnObject ['data'];
			
			$postData = array ();
			$postData ['userId'] = $userInfo ['uid'];
			$postData ['email'] = $email;
			$url = C ( "MODULE_URL_ACCOUNT_CENTER" ) . 'Api/setEmailVerified';
			$ucReturnString = get ( $url, $postData );
			$ucReturnObject = json_decode ( $ucReturnString, true );
			if ($ucReturnObject) {
				$returnArray ['status'] = $ucReturnObject ['status'];
				$returnArray ['message'] = $ucReturnObject ['message'];
				if ($ucReturnObject ['status']) {
					$returnArray ['message'] = $returnObject ['message'];
					$userInfo ['email_verify'] = 1;
					$userInfo ['email'] = $email;
					session ( 'userInfo', $userInfo );
				}
				$this->ajaxReturn ( $returnArray );
			} else {
				// 账户中心模块有问题
				$returnArray ['status'] = false;
				$returnArray ['message'] = $returnObject ['message'];
				$this->ajaxReturn ( $returnArray );
			}
		} else {
			// 账户中心模块有问题
			$returnArray ['status'] = false;
			$this->ajaxReturn ( $returnArray );
		}
	}
	
	
	// 获取权限
	private function processMenuArray($menuArray) {
		
		// 获得权限列表先
		$auth = new \Think\Auth ();
		
		$mainMenu = array ();
		// 添加主菜单
		foreach ( $menuArray as $key => $value ) {
			
			if ($value ['p_id'] == 0) {
				
				$mainMenu [] = $value;
				unset ( $menuArray [$key] );
			} else {
				
				$fullUrl = 'HealthManager' . '/' . $value ['url'];
				// 先不做权限验证
				
				// $userInfo = session('memberInfo');
				// $right = $auth->check($fullUrl, $userInfo['id']);
				// if (! $right) {
				// //unset($menuArray[$key]);
				// }
			}
		}
		// 添加子菜单
		
		foreach ( $mainMenu as $key => $value ) {
			
			$id = $value ['id'];
			
			$subMenu = array ();
			foreach ( $menuArray as $key1 => $value1 ) {
				
				if ($value1 ['p_id'] == $id) {
					
					$subMenu [] = $value1;
					unset ( $menuArray [$key1] );
				}
			}
			
			if (empty ( $subMenu )) {
				unset ( $mainMenu [$key] );
			} else {
				$mainMenu [$key] ['subTitles'] = $subMenu;
			}
		}
		
		return $mainMenu;
	}
	
	
}