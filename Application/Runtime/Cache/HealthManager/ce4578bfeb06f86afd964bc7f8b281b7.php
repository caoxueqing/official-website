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
<link rel="stylesheet"
	href="/Public/AdminLTE/bootstrap/css/bootstrap.min.css">
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
<link rel="stylesheet" type="text/css" href="/Public/AdminLTE/plugins/wdate/bootstrap-datetimepicker.min.css"/> 
<!-- jQuery 2.1.4 -->
<script src="/Public/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
	<!-- Bootstrap 3.3.5 -->
<script src="/Public/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script
	src="/Public/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script
	src="/Public/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script
	src="/Public/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/Public/AdminLTE/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/Public/AdminLTE/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script
	src="/Public/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script
	src="/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script
	src="/Public/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script
	src="/Public/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="/Public/AdminLTE/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Public/AdminLTE/bootstrap/js/user.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/Public/AdminLTE/bootstrap/js/doctor.js"></script>
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
			<?php elseif($userData["user_type"] == 2): ?>
				<b>医生健康管理平台</b>
			<?php else: ?>
				<b>群组健康管理平台</b><?php endif; ?>
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
								<a href="#" class="btn btn-default btn-flat" data-toggle="modal" data-target="#changeAvatar">修改头像 </a>
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

			
<script src="/Public/AdminLTE/Js/jquery.validate.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript">
		////<![CDATA[
		//$(document).ready(function(){
			$(".bianji").validate();
		//});
		//]]>
		jQuery.validator.addMethod("isMobile", function(value, element) {
			var length = value.length;
			var mobile = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
			return this.optional(element) || (length == 11 && mobile.test(value));
		}, "请正确填写手机号码");
	</script>
	
<section class="content">

	<div class="row">
		<div class="col-xs-12">
			<!-- /.box -->
			<!-- general form elements disabled -->
			<div class="box box-primary">
				<!-- /.box-header -->
				<div class="box-body">
					<form role="form"  method="post" id="change-user-form">
						<!-- text input -->
						<?php if($userData['username'] == null): ?><div class="form-group">
								<label>用户名</label> 
								<input name="username" onkeyup="value=value.replace(/[^\w\.\/]/ig,'')"  style="ime-mode:disabled" type="text" value="<?php echo ($userData["username"]); ?>" id="username" class="form-control" placeholder="请输入您的用户名,用户名不能为中文">
							</div>
						<?php else: endif; ?>
						<div class="form-group">
							<label>昵称</label> <input name="nickname" type="text"
								value="<?php echo ($userData["nickname"]); ?>" class="form-control" placeholder="请输入您的昵称">
						</div>
						<div class="form-group">
							<label>真实姓名</label> <input name="tiny_name" type="text"
								value="<?php echo ($userData["tinyName"]); ?>" class="form-control" placeholder="请输入您的真实姓名">
						</div>
						<div class="form-group">
							<span>性别：</span> 
							<input type="radio" name="sex" id="" value="2" <?php if($userData["sex"] == 1): ?>checked="checked"<?php endif; ?>  />
							<span class="man">男</span>
							<input type="radio" name="sex" id="" checked="checked" value="1" <?php if($userData["sex"] == 2): ?>checked="checked"<?php endif; ?>/>
							<span class="man">女</span>
						</div>
						<div class="form-group">
							<label>手机号</label> <input name="mobile" type="text"
								value="<?php echo ($userData["mobile"]); ?>" class="form-control" placeholder="请输入您的手机号">
						</div>
						<div class="form-group">
							<label>身份证号</label> <input name="idno" type="text"
								value="<?php echo ($userData["idno"]); ?>" class="form-control" placeholder="请输入您的身份证号">
						</div>
						<!-- <div class="form-group">
							<label>身高</label> <input name="stature" type="text"
								value="<?php echo ($userData["stature"]); ?>" class="form-control" placeholder="请输入您的身高">
						</div>
						<div class="form-group">
							<label>体重</label> <input name="weight" type="text"
								value="<?php echo ($userData["weight"]); ?>" class="form-control" placeholder="请输入您的体重">
						</div> -->
						<div class="form-group">
							<label>出生日期</label> <input name="birthday" type="text"
								value="<?php echo ($userData["birthday"]); ?>" class="form-control" placeholder="请输入您的出生日期例如:1900-00-00">
						</div>
						<div class="form-group">
							<label>邮箱</label> <input name="email" type="text"
								value="<?php echo ($userData["email"]); ?>" class="form-control" placeholder="请输入您的邮箱">
						</div>
						<div class="form-group">
							<label>QQ</label> <input name="qq" type="text"
								value="<?php echo ($userData["qq"]); ?>" class="form-control" placeholder="请输入您的QQ">
						</div>
						<div class="form-group">
							<label>地址</label> <input name="address" type="text"
								value="<?php echo ($userData["address"]); ?>" class="form-control" placeholder="请输入您的地址">
						</div>
						<input type="hidden" value="<?php echo ($_SESSION['Sess_']['userInfo']['uid']); ?>" name="uid" id="uid" />
						<input type="hidden" value="1" name="user_type" id="userType" />
						<button type="button" onclick="updateUserInfo();" style="float: right" id="updateUserInfo" class="btn btn-danger">修改</button>
						<script type="text/javascript">
							//更新用户资料
							$('#updateUserInfo').click(function(){
								$.ajax({
									cache: false,
									type: "POST",
									url: 'ajax_updateUserInfo',
									data: $('#change-user-form').serialize(), // 你的formid 
									async: false,
									error: function(request) {},
									success: function(data) {
										if (data.status) {
											alert("更新用户信息成功");
											window.location.href = 'accountBaseInfo';
										} else {
											alert('更新用户信息失败');
										}
	
									}
								});
							});
                    	</script>
						<!-- <input class="btn btn-danger" style="float: right" id="updateUserInfo" type="submit" value="提交"> -->
					</form>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->
	</div>

</section>




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