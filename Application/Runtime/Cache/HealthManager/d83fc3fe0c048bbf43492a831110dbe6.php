<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
	
	<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>
	
</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="/Public/AdminLTE/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap 3.3.6 font icon -->
<!-- <link rel="stylesheet" href="/Public/AdminLTE/bootstrap/css/font-awesome.css" rel="stylesheet"> -->
<link rel="stylesheet" href="/Public/AdminLTE/bootstrap/css/styles.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
<!-- Theme style -->
<link rel="stylesheet" href="/Public/AdminLTE/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="/Public/AdminLTE/dist/css/skins/_all-skins.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/Public/AdminLTE/plugins/iCheck/flat/blue.css">
<!-- Morris chart -->
<link rel="stylesheet" href="/Public/AdminLTE/plugins/morris/morris.css">
<!-- jvectormap -->
<link rel="stylesheet" href="/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="/Public/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
<!-- Font Awesome -->
<link rel="stylesheet"
	href="https://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet"
	href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet"
	href="/Public/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet"
	href="/Public/AdminLTE/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet"
	href="/Public/AdminLTE/dist/css/skins/_all-skins.min.css">
<script src="/Public/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.5 -->
<script src="/Public/AdminLTE/bootstrap/js/bootstrap.min.js"></script>

<!-- Bootstrap 3.3.5 -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]> <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script> <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> <![endif]--> 
</head>

<body class="skin-blue sidebar-mini wysihtml5-supported">
	<div class="wrapper">
		<!-- 导入Header bar -->
		
	<header class="main-header">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.4.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- DataTables -->
<link rel="stylesheet" href="/Public/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
<!-- Theme style -->
<link rel="stylesheet" href="/Public/AdminLTE/dist/css/AdminLTE.min.css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet"
	href="/Public/AdminLTE/dist/css/skins/_all-skins.min.css">
	<!-- jQuery 2.1.4 -->
<script src="/Public/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
<script src="/Public/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="/Public/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/Public/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="/Public/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/Public/AdminLTE/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/Public/AdminLTE/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="/Public/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="/Public/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/Public/AdminLTE/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Public/AdminLTE/bootstrap/js/user.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Public/AdminLTE/bootstrap/js/doctor.js"></script>
<!-- echarts -->
<script src="/Public/AdminLTE/plugins/echarts/echarts.common.min.js"></script>
<!-- times -->

<script src="/Public/AdminLTE/plugins/wdate/bootstrap-datetimepicker.min.js" charset="utf-8"></script>	
<script src="/Public/AdminLTE/plugins/wdate/bootstrap-datetimepicker.fr.js" charset="utf-8"></script>	

<script type="text/javascript">
	//下面用于图片上传预览功能
	function setImagePreview(avalue) {
		var docObj = document.getElementById("doc");

		var imgObjPreview = document.getElementById("preview");
		if (docObj.files && docObj.files[0]) {
			//火狐下，直接设img属性
			imgObjPreview.style.display = 'block';
			imgObjPreview.style.width = '88px';
			imgObjPreview.style.height = '92px';
			//imgObjPreview.src = docObj.files[0].getAsDataURL();

			//火狐7以上版本不能用上面的getAsDataURL()方式获取，需要一下方式
			imgObjPreview.src = window.URL.createObjectURL(docObj.files[0]);
		} else {
			//IE下，使用滤镜
			docObj.select();
			var imgSrc = document.selection.createRange().text;
			var localImagId = document.getElementById("localImag");
			//必须设置初始大小
			localImagId.style.width = "88px";
			localImagId.style.height = "92px";
			//图片异常的捕捉，防止用户修改后缀来伪造图片
			try {
				localImagId.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod=scale)";
				localImagId.filters
						.item("DXImageTransform.Microsoft.AlphaImageLoader").src = imgSrc;
			} catch (e) {
				alert("您上传的图片格式不正确，请重新选择!");
				return false;
			}
			imgObjPreview.style.display = 'none';
			document.selection.empty();
		}
		return true;
	}
</script>
	<!-- Logo -->
	<a href="<?php echo U('dashboard');?>" class="logo">
		<!-- <span class="logo-mini"> <b>A</b>LT </span>  -->
		<span class="logo-lg"> 
			<?php if($userData["user_type"] == 1): ?><b>个人健康管理平台</b>
			<!--<?php elseif($userData["user_type"] == 2): ?>
				<b>医生健康管理平台</b>
			<?php else: ?>
				<b>群组健康管理平台</b>--><?php endif; ?>
		</span>
	</a>
	<!-- Header Navbar: style can be found in header.less -->
	<nav class="navbar navbar-static-top">
		<!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas"
			role="button"> <span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<li class="dropdown messages-menu" onclick="messageCenter();">
					<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> 
						<i class="fa fa-envelope-o"></i> 
						<!-- 未读消息数 -->
						<?php if($noReadMessageCount == 0): ?><span class="label label-success"></span>
						<?php else: ?>
							<span class="label label-success"><?php echo ($noReadMessageCount); ?></span><?php endif; ?>
					</a>
				</li>
				<!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
						<?php if($userData["avatar"] != null): ?><img src="http://ainia.oss-cn-beijing.aliyuncs.com/<?php echo ($userData["avatar"]); ?>" class="user-image">
						<?php else: ?>
							<img src="https://img.alicdn.com/tps/TB1BsZ6JpXXXXaZXpXXXXXXXXXX-81-81.png" class="user-image" alt="User Image"><?php endif; ?>
						
						<?php if($userData["nickname"] != null): ?><span class="hidden-xs"><?php echo ($userData["nickname"]); ?></span>
						<?php else: ?>
							<span class="hidden-xs"><?php echo ($userData["email"]); ?></span><?php endif; ?>
					</a>
					<ul class="dropdown-menu">
						<!-- User image -->
						<li class="user-header">
							<?php if($userData["avatar"] != null): ?><img src="http://ainia.oss-cn-beijing.aliyuncs.com/<?php echo ($userData["avatar"]); ?>" class="user-image" style="float:none">
							<?php else: ?>
								<img src="https://img.alicdn.com/tps/TB1BsZ6JpXXXXaZXpXXXXXXXXXX-81-81.png" class="user-image" alt="User Image" style="float:none"><?php endif; ?>
							<p>
								<?php if($userData["nickname"] != null): echo ($userData["nickname"]); ?> 
								<?php else: ?>
									<?php echo ($userData["email"]); endif; ?>
								<small>注册时间:<?php echo ($userData["reg_time"]); ?></small>
							</p>
						</li>
						<!-- Menu Footer-->
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat" data-type="1" onclick="headerOn(event)">修改头像 </a>
							</div>
							<div class="pull-right">
								<a href="<?php echo U('signOut');?>" class="btn btn-default btn-flat">退出登录</a>
							</div>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</nav>
</header>

<!-- Modal -->
<div class="modal fade" id="changeAvatar" tabindex="-1" role="dialog"
	aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"
					aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
				<h4 class="modal-title" id="myModalLabel">修改头像</h4>
			</div>
			<div class="modal-body">
				<!-- /.box-header -->
				<!-- form start-->
				<form id="uploadForm" class="form-horizontal" name="fileinfo" method="post" enctype="multipart/form-data">
					<div class="form-group">
					 	<div class="touxiang" style="margin-left:15px">
					 		<div class="img" id="localImag">
						 		<?php if($userData["avatar"] != null): ?><img src="http://ainia.oss-cn-beijing.aliyuncs.com/<?php echo ($userData["avatar"]); ?>" alt="" id="preview" style="margin-top:0px;width:88px;height:92px;margin-bottom: 10px;"/>
	                           	<?php else: ?>
	                           		<img src="https://img.alicdn.com/tps/TB1BsZ6JpXXXXaZXpXXXXXXXXXX-81-81.png" alt="" id="preview" style="margin-top:0px;width:88px;height:92px;margin-bottom: 10px;"/><?php endif; ?>	
                           		<input type="file" style="height:30px;" name="avatar" id="doc" onchange="javascript:setImagePreview();"/>
                           	</div>
					 	</div>
						<input type="hidden" value="<?php echo ($userData["uid"]); ?>" name="uid" id="uid" />
					</div>
					<!-- /.box-footer -->
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				<button type="button"  class="btn btn-danger" onclick="changeAvatar();">修改</button>
			</div>
		</div>
	</div>
</div>
<!-- <script type="text/javascript">
    $(document).ready(function () {
        GetMsgCount();
    });
    function GetMsgCount() {
        $.ajax({
            type: "GET",
            url: "ajax_getMsgCount",
            async: false,
            dataType: "json",
            data: { LField: '[{"Not":false,"Value":' + $("#hidUID").val() + ',"Operator":0,"PropertyName":"UserId"},{"Not":false,"Value":1,"Operator":0,"PropertyName":"Status"}]' },
            success: function (data) {
                if (data.status == 0) {
                    if (data.Obj != 0) {
                        $("#msgcount").empty();
                        $("#msgcount").text(data.Obj);
                    } else {
                        $("#msgcount").empty();
                    }
                }
            }
        });
    }
</script>
 -->
 

		
	<aside class="main-sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar" style="height: auto;">
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
			<?php if(is_array($menu)): $i = 0; $__LIST__ = $menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mainMenu): $mod = ($i % 2 );++$i;?><li class="treeview" id="treeview-<?php echo ($mainMenu['id']); ?>">
					<a href="#">
						<i class="fa fa-<?php echo ($mainMenu['icon']); ?>"></i> <span><?php echo ($mainMenu['title']); ?></span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>
					<ul class="treeview-menu">
						<?php if(is_array($mainMenu['subTitles'])): $i = 0; $__LIST__ = $mainMenu['subTitles'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$subMenu): $mod = ($i % 2 );++$i;?><li id="treeview-menu-<?php echo ($subMenu['id']); ?>">
								<a href="/index.php/HealthManager/<?php echo ($subMenu['url']); ?>"><i class="fa fa-circle-o"></i><?php echo ($subMenu['title']); ?></a>
							</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
			<li>
				<a href="documentation" target="_blank">
					<i class="fa fa-book"></i>
					<span>开发文档</span>
				</a>
			</li>
			<li class="header">导航栏目</li>
			<li>
				<a href="<?php echo U('dashboard');?>">
					<i class="fa fa-circle-o text-red"></i>
					<span>懿加乐个人健康管理平台</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- /.sidebar -->
</aside>
 

		<div class="content-wrapper" style="min-height: 800px;">

			<section class="content-header">
				<h1>
					<?php echo ($title); ?> <small><?php echo ($discription); ?></small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="<?php echo ($parentUrl); ?>"><i class="fa <?php echo ($parentIcon); ?>"></i>
							<?php echo ($parentTitle); ?></a></li>
					<li class="active"><?php echo ($title); ?></li>
				</ol>
			</section>

			
<style type="text/css">
	.form-horizontal .control-label {
		text-align: left;
	}
</style>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<!-- /.box-header -->
			<div class="box-body">
				<div class="contentpanel">
					<div class="row">
						<div class="col-md-12 mb20">
							<ul class="nav nav-tabs nav-dark" style="background: #ddd;">
								<li class="active">
									<a href="#baseinfo" data-toggle="tab"><strong>基本信息</strong></a>
								</li>
							</ul>
							<div class="panel-body">
								<div class="tab-content">
									<div class="tab-pane active">
										<div class="row">
											<div class="col-lg-12">
												<section class="panel">
													<div class="panel-body form-horizontal tasi-form ">
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%;">姓名：</label>
																	<div class="col-lg-2">
																		<input id="txtName" type="text" class="form-control"  value="黄丹丹"  onclick="LoadUserList()" readonly="readonly" data-toggle="modal" data-target="#myModal">
																		<input id="hidUserId" type="hidden" value="303">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">性别：</label>
																	<div class="col-lg-2">
																		<select id="selSex" class="form-control">
																			<option value="1">男</option>
																			<option value="2" selected="selected">女</option>
																		</select>
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">出生日期：</label>
																	<div class="col-lg-2">
																		<input type="text" id="txtbirth" class="form-control" readonly="readonly" value="1990-12-2" onclick="WdatePicker({ dateFmt: 'yyyy-MM-dd' })">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">详细现住址：</label>
																	<div class="col-lg-6">
																		<input id="addressnow" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">所属社区：</label>
																	<div class="col-lg-2">
																		<input id="shequ" type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">详细户籍住址：</label>
																	<div class="col-lg-6">
																		<input id="addressold" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">籍贯：</label>
																	<div class="col-lg-2">
																		<input id="jiguan" type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">住房面积：</label>
																	<div class="col-lg-2">
																		<input id="mianji" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">常住人口：</label>
																	<div class="col-lg-2">
																		<input type="text" id="renkou" class="form-control">
																	</div>

																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">户主姓名：</label>
																	<div class="col-lg-2">
																		<input id="huzhu" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">与户主关系：</label>
																	<div class="col-lg-2">
																		<input type="text" id="guanxi" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">证件类型：</label>
																	<div class="col-lg-2">
																		<select id="selZhengjian" class="form-control">
																			<option value="1" selected="selected">身份证</option>
																			<option value="2">居住证</option>
																			<option value="3">军人证</option>
																		</select>
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">身份证号：</label>
																	<div class="col-lg-4">
																		<input id="IdCard" type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">民族：</label>
																	<div class="col-lg-2">
																		<select id="selnation" class="form-control">
																			<option value="0" selected="selected">请选择</option>
																			<option value="1">汉族</option>
																			<option value="2">蒙古族</option>
																			<option value="3">回族</option>
																			<option value="4">藏族</option>
																			<option value="5">维吾尔族</option>
																			<option value="6">苗族</option>
																			<option value="7">彝族</option>
																			<option value="8">壮族</option>
																			<option value="9">布依族</option>
																			<option value="10">朝鲜族</option>
																			<option value="11">满族</option>
																			<option value="12">侗族</option>
																			<option value="13">瑶族</option>
																			<option value="14">白族</option>
																			<option value="15">土家族</option>
																			<option value="16">哈尼族</option>
																			<option value="17">哈萨克族</option>
																			<option value="18">傣族</option>
																			<option value="19">黎族</option>
																			<option value="20">傈僳族</option>
																			<option value="21">佤族</option>
																			<option value="22">畲族</option>
																			<option value="23">高山族</option>
																			<option value="24">拉祜族</option>
																			<option value="25">水族</option>
																			<option value="26">东乡族</option>
																			<option value="27">纳西族</option>
																			<option value="28">景颇族</option>
																			<option value="29">柯尔克孜族</option>
																			<option value="30">土族</option>
																			<option value="31">达斡尔族</option>
																			<option value="32">仫佬族</option>
																			<option value="33">羌族</option>
																			<option value="34">布朗族</option>
																			<option value="35">撒拉族</option>
																			<option value="36">毛难族</option>
																			<option value="37">仡佬族</option>
																			<option value="38">锡伯族</option>
																			<option value="39">阿昌族</option>
																			<option value="40">普米族</option>
																			<option value="41">塔吉克族</option>
																			<option value="42">怒族</option>
																			<option value="43">乌孜别克族</option>
																			<option value="44">俄罗斯族</option>
																			<option value="45">鄂温克族</option>
																			<option value="46">崩龙族</option>
																			<option value="47">保安族</option>
																			<option value="48">裕固族</option>
																			<option value="49">京族</option>
																			<option value="50">塔塔尔族</option>
																			<option value="51">独龙族</option>
																			<option value="52">鄂伦春族</option>
																			<option value="53">赫哲族</option>
																			<option value="54">门巴族</option>
																			<option value="55">珞巴族</option>
																			<option value="56">基诺族</option>
																		</select>
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">血型：</label>
																	<div class="col-lg-2">
																		<select id="selbloodtype" class="form-control">
																			<option value="5">不详</option>
																			<option value="1">A型</option>
																			<option value="2">B型</option>
																			<option value="3">O型</option>
																			<option value="4">AB型</option>
																		</select>
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">RH 血型：</label>
																	<div class="col-lg-2">
																		<input id="RHxuexing" type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">文化程度：</label>
																	<div class="col-lg-2">
																		<select id="selWenHuaChengDu" class="form-control">
																			<option value="1">博士</option>
																			<option value="2">硕士</option>
																			<option value="3" selected="selected">本科</option>
																			<option value="4">大专</option>
																			<option value="5">中专</option>
																			<option value="6">中技</option>
																			<option value="7">高中</option>
																			<option value="8">初中</option>
																			<option value="9">小学</option>
																			<option value="10">半文盲</option>
																			<option value="11">文盲</option>
																		</select>
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">婚姻状况：</label>
																	<div class="col-lg-2">
																		<select id="selHunYingZhuangKuang" class="form-control">
																			<option value="0" selected="selected">请选择</option>
																			<option value="1">已婚</option>
																			<option value="2">未婚</option>
																			<option value="3">离异</option>
																			<option value="4">丧偶</option>
																		</select>
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">职业：</label>
																	<div class="col-lg-2">
																		<input type="text" id="ZhiYe" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">工作单位：</label>
																	<div class="col-lg-2">
																		<input id="GongZuoDanWei" type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">本人固话：</label>
																	<div class="col-lg-2">
																		<input id="JiaTinDianHua" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">本人手机：</label>
																	<div class="col-lg-2">
																		<input id="BenRenDianHua" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">本人邮件：</label>
																	<div class="col-lg-2">
																		<input id="BenRenEmial" type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">联系人姓名：</label>
																	<div class="col-lg-2">
																		<input id="LianXiRenName" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">联系人电话：</label>
																	<div class="col-lg-2">
																		<input id="LianXiRenDianHua" type="text" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">联系人邮件：</label>
																	<div class="col-lg-2">
																		<input id="LianXiRenEmail" type="text" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">身高(cm)：</label>
																	<div class="col-lg-2">
																		<input id="txtheight" type="text" onkeyup="clearNoNum(this)" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">体重(kg)：</label>
																	<div class="col-lg-2">
																		<input id="txtwidth" type="text" onkeyup="clearNoNum(this)" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">腰围(cm)：</label>
																	<div class="col-lg-2">
																		<input id="txtyaowei" type="text" onkeyup="clearNoNum(this)" class="form-control">
																	</div>
																</div>
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">医疗支付：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline"><input name="YiLiao" type="checkbox" value="1">城镇职工基本医疗保险</label>
																<label class="checkbox-inline"><input name="YiLiao" type="checkbox" value="2">城镇居民基本医疗保险</label>
																<label class="checkbox-inline"><input name="YiLiao" type="checkbox" value="3">新型农村合作医疗</label>
																<label class="checkbox-inline"><input name="YiLiao" type="checkbox" value="4">贫困救助</label>
																<label class="checkbox-inline"><input name="YiLiao" type="checkbox" value="5">商业医疗保险</label>
																<label class="checkbox-inline"><input name="YiLiao" type="checkbox" value="6">全公费</label>
																<label class="checkbox-inline"><input name="YiLiao" type="checkbox" value="7">全自费</label>
															</div>
														</div>
														<!--饮食情况-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">饮食情况：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline"><input name="DietHabit" type="checkbox" value="1">清淡</label>
																<label class="checkbox-inline"><input name="DietHabit" type="checkbox" value="2">偏咸</label>
																<label class="checkbox-inline"><input name="DietHabit" type="checkbox" value="3">偏甜</label>
															</div>
														</div>

														<!--吸烟史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">吸烟史：</label>
															<div class="col-lg-2">
																<label class="radio-inline"><input type="radio" name="Somke" value="1">无</label>
																<label class="radio-inline"><input type="radio" name="Somke" value="2">有</label>
															</div>
															<label class="col-sm-2 control-label">
			                                                每天/支
			                                            </label>
															<div class="col-lg-2">
																<input id="SomkeDay" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                &nbsp;
			                                            </label>
															<label class="col-sm-2 control-label">开始吸烟年龄</label>
															<div class="col-lg-2">
																<input id="SomkeStart" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" placeholder="岁">
															</div>
															<label class="col-sm-2 control-label">开始戒烟年龄</label>
															<div class="col-lg-2">
																<input id="SomkeEnd" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" placeholder="岁">
															</div>
														</div>

														<!--饮酒史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">饮酒史：</label>
															<div class="col-lg-2">
																<label class="radio-inline"><input type="radio" name="DrinkRate" value="1">无</label>
																<label class="radio-inline"><input type="radio" name="DrinkRate" value="2">有</label>
															</div>
															<label class="col-sm-2 control-label">
			                                                日饮酒量
			                                            </label>
															<div class="col-lg-2">
																<input id="DrinkRateDay" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" placeholder="平均/两">
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">&nbsp;</label>
															<label class="col-sm-2 control-label">开始饮酒年龄</label>
															<div class="col-lg-2">
																<input id="DrinkRateStart" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" placeholder="岁">
															</div>
															<label class="col-sm-2 control-label">开始戒酒年龄</label>
															<div class="col-lg-2">
																<input id="DrinkRateEnd" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" placeholder="岁">
															</div>
														</div>

														<!--锻炼情况-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">锻炼情况：</label>
															<div class="col-lg-2">
																<label class="radio-inline">
			                                                    <input type="radio" name="DuanLian" value="1">无</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="DuanLian" value="2">有</label>
															</div>

															<label class="col-sm-2 control-label" style="width: 12%">每天/分钟</label>
															<div class="col-lg-2">
																<input id="DuanLianDay" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control">
															</div>

															<label class="col-sm-2 control-label" style="width: 12%">坚持/年</label>
															<div class="col-lg-2">
																<input id="DuanLianYear" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control">
															</div>
														</div>
														<!--视力情况-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                视力情况
			                                            </label>
															<div class="col-lg-4">
																<input id="ShiLi" type="text" class="form-control">
															</div>
														</div>
														<!--牙齿情况-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">牙齿情况：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YaChi" value="1" checked="checked">正常</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YaChi" value="2">缺齿</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YaChi" value="3">义齿</label>
																<label class="radio-inline">
			                                                    <input type="text" id="YaChiOther" class="form-control" placeholder="其他"></label>
															</div>
														</div>
														<!--睡眠时间-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                睡眠时间(小时/天)：
			                                            </label>
															<div class="col-lg-2">
																<input id="SleepData" type="text" onkeyup="value=value.replace(/[^\d]/g,'')" class="form-control" placeholder="小时">
															</div>
														</div>
														<!--药物过敏史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">药物过敏史：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="Drug" value="1">青霉素</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="Drug" value="2">磺胺</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="Drug" value="3">链霉素</label>
																<label class="radio-inline">
			                                                    <input type="text" id="DrugOther" class="form-control" placeholder="其他"></label>
															</div>
														</div>
														<!--暴露史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">暴露史：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="BaoLu" value="1">化学品</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="BaoLu" value="2">毒物</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="BaoLu" value="3">射线</label>

															</div>
														</div>
														<!--01疾病史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                01疾病史：
			                                            </label>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                <input type="checkbox" name="JiBing" value="1">
			                                                高血压</label>
															<label class="col-sm-2 control-label">诊断时间</label>
															<div class="col-sm-3">
																<input type="text" id="JBDate1" class="form-control" placeholder="年-月-日">
															</div>
															<label class="col-sm-2 control-label">用药与剂量</label>
															<div class="col-sm-3">
																<input type="text" id="JBName1" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                <input type="checkbox" name="JiBing" value="2">
			                                                糖尿病</label>
															<label class="col-sm-2 control-label">诊断时间</label>
															<div class="col-sm-3">
																<input type="text" id="JBDate2" class="form-control" placeholder="年-月-日">
															</div>
															<label class="col-sm-2 control-label">用药与剂量</label>
															<div class="col-sm-3">
																<input type="text" id="JBName2" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                <input type="checkbox" name="JiBing" value="3">
			                                                冠心病</label>
															<label class="col-sm-2 control-label">诊断时间</label>
															<div class="col-sm-3">
																<input type="text" id="JBDate3" class="form-control" placeholder="年-月-日">
															</div>
															<label class="col-sm-2 control-label">用药与剂量</label>
															<div class="col-sm-3">
																<input type="text" id="JBName3" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                <input type="checkbox" name="JiBing" value="4">
			                                                脑血管病</label>
															<label class="col-sm-2 control-label">诊断时间</label>
															<div class="col-sm-3">
																<input type="text" id="JBDate4" class="form-control" placeholder="年-月-日">
															</div>
															<label class="col-sm-2 control-label">用药与剂量</label>
															<div class="col-sm-3">
																<input type="text" id="JBName4" class="form-control">
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 10%">
			                                                <input type="checkbox" name="JiBing" value="5">
			                                                其他1</label>
															<div class="col-sm-2">
																<input type="text" id="JBOther5" class="form-control">
															</div>
															<label class="col-sm-2 control-label" style="width: 10%">诊断时间</label>
															<div class="col-sm-2">
																<input type="text" id="JBDate5" class="form-control" placeholder="年-月-日">
															</div>
															<label class="col-sm-2 control-label">用药与剂量</label>
															<div class="col-sm-2">
																<input type="text" id="JBName5" class="form-control">
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 10%">
			                                                <input type="checkbox" name="JiBing" value="6">
			                                                其他2</label>
															<div class="col-sm-2">
																<input type="text" id="JBOther6" class="form-control">
															</div>
															<label class="col-sm-2 control-label" style="width: 10%">诊断时间</label>
															<div class="col-sm-2">
																<input type="text" id="JBDate6" class="form-control" placeholder="年-月-日">
															</div>
															<label class="col-sm-2 control-label">用药与剂量</label>
															<div class="col-sm-2">
																<input type="text" id="JBName6" class="form-control">
															</div>
														</div>

														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">
			                                                <input type="checkbox" name="JiBing" value="7">
			                                                其他慢性病</label>
														</div>
														<!--02手术史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">02手术史：</label>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">名称1</label>
																	<div class="col-sm-3">
																		<input type="text" id="SSName1" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">时间</label>
																	<div class="col-sm-3">
																		<input type="text" id="SSDate1" class="form-control" placeholder="年-月-日">
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">名称2</label>
																	<div class="col-sm-3">
																		<input type="text" id="SSName2" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">时间</label>
																	<div class="col-sm-3">
																		<input type="text" id="SSDate2" class="form-control" placeholder="年-月-日">
																	</div>
																</div>
															</div>
														</div>
														<!--03外伤史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">03外伤史：</label>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">名称1</label>
																	<div class="col-sm-3">
																		<input type="text" id="WSName1" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">时间：</label>
																	<div class="col-sm-3">
																		<input type="text" id="WSDate1" class="form-control" placeholder="年-月-日">
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">名称2</label>
																	<div class="col-sm-3">
																		<input type="text" id="WSName2" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">时间：</label>
																	<div class="col-sm-3">
																		<input type="text" id="WSDate2" class="form-control" placeholder="年-月-日">
																	</div>
																</div>
															</div>
														</div>
														<!--04输血史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">04输血史：</label>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">名称1</label>
																	<div class="col-lg-3">
																		<input type="text" id="SXName1" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">时间</label>
																	<div class="col-lg-3">
																		<input type="text" id="SXDate1" class="form-control" placeholder="年-月-日">
																	</div>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="col-lg-10">
																<div class="row">
																	<label class="col-sm-2 control-label" style="width: 15%">名称2</label>
																	<div class="col-lg-3">
																		<input type="text" id="SXName2" class="form-control">
																	</div>
																	<label class="col-sm-2 control-label" style="width: 15%">时间</label>
																	<div class="col-lg-3">
																		<input type="text" id="SXDate2" class="form-control" placeholder="年-月-日">
																	</div>
																</div>
															</div>
														</div>
														<!--05家族史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">05家族史</label>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">1.父亲</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="1">高血压</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="2">糖尿病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="3">冠心病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="4">慢性阻塞性肺疾病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="5">恶性肿瘤</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="6">脑卒中</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="7">重性精神病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="8">结核病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="9">肝炎</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="FQ" value="10">先天畸形</label>
																<label class="radio-inline">
			                                                    <input type="text" id="FQOther" class="form-control" placeholder="其他"></label>

															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">2.母亲</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="1">高血压</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="2">糖尿病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="3">冠心病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="4">慢性阻塞性肺疾病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="5">恶性肿瘤</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="6">脑卒中</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="7">重性精神病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="8">结核病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="9">肝炎</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="MQ" value="10">先天畸形</label>
																<label class="radio-inline">
			                                                    <input type="text" id="MQOther" class="form-control" placeholder="其他"></label>

															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">3.兄弟姐妹</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="1">高血压</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="2">糖尿病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="3">冠心病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="4">慢性阻塞性肺疾病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="5">恶性肿瘤</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="6">脑卒中</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="7">重性精神病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="8">结核病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="9">肝炎</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="XD" value="10">先天畸形</label>
																<label class="radio-inline">
			                                                    <input type="text" id="XDOther" class="form-control" placeholder="其他"></label>

															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">4.子女</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="1">高血压</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="2">糖尿病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="3">冠心病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="4">慢性阻塞性肺疾病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="5">恶性肿瘤</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="6">脑卒中</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="7">重性精神病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="8">结核病</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="9">肝炎</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="ZN" value="10">先天畸形</label>
																<label class="radio-inline">
			                                                    <input type="text" id="ZNOther" class="form-control" placeholder="其他"></label>

															</div>
														</div>
														<!--06遗传病史-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">06遗传病史：</label>
															<div class="col-lg-10">
																<label class="radio-inline">
			                                                    <input type="radio" name="YiChuan" value="1" checked="checked">无</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="YiChuan" value="2">有</label>
																<label class="radio-inline">
			                                                    <input id="YCName" type="text" class="form-control" placeholder="遗传病名称"></label>

															</div>
														</div>
														<!--07残疾情况-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">07残疾情况：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input name="CanJi" type="checkbox" value="1" checked="checked">无残疾</label>
																<label class="checkbox-inline">
			                                                    <input name="CanJi" type="checkbox" value="2">视力残疾</label>
																<label class="checkbox-inline">
			                                                    <input name="CanJi" type="checkbox" value="3">听力残疾</label>
																<label class="checkbox-inline">
			                                                    <input name="CanJi" type="checkbox" value="4">言语残疾</label>
																<label class="checkbox-inline">
			                                                    <input name="CanJi" type="checkbox" value="5">肢体残疾</label>
																<label class="checkbox-inline">
			                                                    <input name="CanJi" type="checkbox" value="6">智力残疾</label>
																<label class="checkbox-inline">
			                                                    <input name="CanJi" type="checkbox" value="7">精神残疾</label>

															</div>
														</div>
														<!--08生活环境-->
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">08生活环境：</label>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">1.厨房排风设施</label>
															<div class="col-lg-10">
																<label class="radio-inline">
			                                                    <input type="radio" name="ChuFang" value="1">无</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="ChuFang" value="2">油烟机</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="ChuFang" value="3">换气扇</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="ChuFang" value="4">烟</label>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">2.燃料类型：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="RanLiao" value="1">液化气</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="RanLiao" value="2">煤气</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="RanLiao" value="3">天然气</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="RanLiao" value="4">沼气</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="RanLiao" value="5">柴火</label>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">3.饮水：</label>
															<div class="col-lg-10">
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YinShui" value="1">自来水</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YinShui" value="2">经净化过滤的水</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YinShui" value="3">井水</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YinShui" value="4">河湖水</label>
																<label class="checkbox-inline">
			                                                    <input type="checkbox" name="YinShui" value="5">糖水</label>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">4.厕所</label>
															<div class="col-lg-10">
																<label class="radio-inline">
			                                                    <input type="radio" name="CeSuo" value="1">卫生厕所</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="CeSuo" value="2">一格或两格粪池式</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="CeSuo" value="3">马桶</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="CeSuo" value="4">露天粪坑</label>
																<label class="radio-inline">
			                                                    <input type="radio" name="CeSuo" value="5">简易棚侧</label>
															</div>
														</div>
														<div class="form-group">
															<label class="col-sm-2 control-label" style="width: 15%">5.禽兽栏</label>
															<div class="col-lg-10">
																<label class="radio-inline"><input type="radio" name="Fowl" value="1" checked="checked">无</label>
																<label class="radio-inline"><input type="radio" name="Fowl" value="2">禽兽栏</label>
																<label class="radio-inline"><input type="radio" name="Fowl" value="3">室内</label>
																<label class="radio-inline"><input type="radio" name="Fowl" value="4">室外</label>
															</div>
														</div>

														<div class="form-group">
															<div class="col-lg-offset-2 col-lg-12">
																<button class="btn btn-danger" id="btnarch" type="button" onclick="SaveInfo()">保 存</button>
															</div>
														</div>

													</div>
												</section>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>




		</div>

		
	<footer class="main-footer">
	<div class="pull-right hidden-xs">
		<b>Version</b> 2.3.6
	</div>
	<strong>Copyright © 2014-2016
        <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
</footer>
<aside class="control-sidebar control-sidebar-dark">
	<!-- Create the tabs -->
	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li class="active">
			<a href="#control-sidebar-theme-demo-options-tab" data-toggle="tab">
				<i class="fa fa-wrench"></i>
			</a>
		</li>
		<li>
			<a href="#control-sidebar-home-tab" data-toggle="tab">
				<i class="fa fa-home"></i>
			</a>
		</li>
		<li>
			<a href="#control-sidebar-settings-tab" data-toggle="tab">
				<i class="fa fa-gears"></i>
			</a>
		</li>
	</ul>
	<!-- Tab panes -->
	<div class="tab-content">
		<!-- Home tab content -->
		<div class="tab-pane" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-user bg-yellow"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

							<p>New phone +1(800)555-1234</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

							<p>nora@example.com</p>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<i class="menu-icon fa fa-file-code-o bg-green"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

							<p>Execution time 5 seconds</p>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
                            Custom Template Design
                            <span class="label label-danger pull-right">70%</span>
                        </h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
                            Update Resume
                            <span class="label label-success pull-right">95%</span>
                        </h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-success" style="width: 95%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
                            Laravel Integration
                            <span class="label label-warning pull-right">50%</span>
                        </h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-warning" style="width: 50%"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="javascript:void(0)">
						<h4 class="control-sidebar-subheading">
                            Back End Framework
                            <span class="label label-primary pull-right">68%</span>
                        </h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-primary" style="width: 68%"></div>
						</div>
					</a>
				</li>
			</ul>
			<!-- /.control-sidebar-menu -->

		</div>
		<div id="control-sidebar-theme-demo-options-tab" class="tab-pane active">
			<div>
				<h4 class="control-sidebar-heading">Layout Options</h4>
				<div class="form-group">
					<label class="control-sidebar-subheading"><input type="checkbox" data-layout="fixed" class="pull-right">
                        Fixed layout</label>
					<p>Activate the fixed layout. You can't use fixed and boxed layouts together</p>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading"><input type="checkbox" data-layout="layout-boxed" class="pull-right">
                        Boxed Layout</label>
					<p>Activate the boxed layout</p>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading"><input type="checkbox" data-layout="sidebar-collapse" class="pull-right">
                        Toggle Sidebar</label>
					<p>Toggle the left sidebar's state (open or collapse)</p>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading"><input type="checkbox" data-enable="expandOnHover" class="pull-right">
                        Sidebar Expand on Hover</label>
					<p>Let the sidebar mini expand on hover</p>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading"><input type="checkbox" data-controlsidebar="control-sidebar-open" class="pull-right">
                        Toggle Right Sidebar Slide</label>
					<p>Toggle between slide over content and push content effects</p>
				</div>
				<div class="form-group">
					<label class="control-sidebar-subheading"><input type="checkbox" data-sidebarskin="toggle" class="pull-right">
                        Toggle Right Sidebar Skin</label>
					<p>Toggle between dark and light skins for the right sidebar</p>
				</div>
				<h4 class="control-sidebar-heading">Skins</h4>
				<ul class="list-unstyled clearfix">
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-blue" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
								<span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin">Blue</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-black" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
								<span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
								<span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #222;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin">Black</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-purple" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
								<span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin">Purple</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-green" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
								<span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin">Green</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-red" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
								<span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin">Red</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-yellow" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
								<span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin">Yellow</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-blue-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
								<span class="bg-light-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin" style="font-size: 12px">Blue Light</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-black-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
								<span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
								<span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin" style="font-size: 12px">Black Light</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-purple-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
								<span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin" style="font-size: 12px">Purple Light</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-green-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
								<span class="bg-green" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin" style="font-size: 12px">Green Light</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-red-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
								<span class="bg-red" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin" style="font-size: 12px">Red Light</p>
					</li>
					<li style="float:left; width: 33.33333%; padding: 5px;">
						<a href="javascript:void(0);" data-skin="skin-yellow-light" style="display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)" class="clearfix full-opacity-hover">
							<div>
								<span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
								<span class="bg-yellow" style="display:block; width: 80%; float: left; height: 7px;"></span>
							</div>
							<div>
								<span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
								<span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
							</div>
						</a>
						<p class="text-center no-margin" style="font-size: 12px;">Yellow Light</p>
					</li>
				</ul>
			</div>
		</div>
		<!-- /.tab-pane -->
		<!-- Stats tab content -->
		<div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
		<!-- /.tab-pane -->
		<!-- Settings tab content -->
		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked="">
                    </label>

					<p>
						Some information about this general settings option
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked="">
                    </label>

					<p>
						Other sets of options are available
					</p>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked="">
                    </label>

					<p>
						Allow the user to show his name in blog posts
					</p>
				</div>
				<!-- /.form-group -->

				<h3 class="control-sidebar-heading">Chat Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked="">
                    </label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
				</div>
				<!-- /.form-group -->

				<div class="form-group">
					<label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </label>
				</div>
				<!-- /.form-group -->
			</form>
		</div>
		<!-- /.tab-pane -->
	</div>
</aside>

<div class="control-sidebar-bg" style="position: fixed; height: auto;"></div> 
		<!-- 导入底部的脚本文件等内容 -->
		<!-- /.content -->

		
	<!-- jQuery 2.2.3 -->
<script src="/Public/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://cdn.bootcss.com/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
	$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->
<script src="/Public/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="https://cdn.bootcss.com/raphael/2.1.0/raphael-min.js"></script>
<script src="/Public/AdminLTE/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/Public/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/Public/AdminLTE/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdn.bootcss.com/moment.js/2.11.2/moment.min.js"></script>
<script src="/Public/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/Public/AdminLTE/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/Public/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/Public/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/Public/AdminLTE/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/Public/AdminLTE/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/Public/AdminLTE/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Public/AdminLTE/dist/js/demo.js"></script>

<script src="/Public/jQuery/timer.jquery.min.js"></script>

 
		 
			<script>
				var treeMenuNode = $('#treeview-menu-<?php echo ($menuId); ?>');
				if (treeMenuNode != undefined) {
					treeMenuNode.addClass("active");
					treeMenuNode.parent().parent().addClass("active");
				}
			</script> 
		
</body>

</html>