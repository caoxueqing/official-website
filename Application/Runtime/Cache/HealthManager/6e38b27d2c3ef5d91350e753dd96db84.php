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

			
	<!--content start-->
<style type="text/css">
	.buttonTr{
		position: relative;
	}
	.buttons{
		opacity: 0;
		height: 73px;
		position: absolute;
		top:106px;
		left: 0;
		z-index: 1000;
	}	
</style>

<div style="padding: 0px 15px 15px 15px; width: 100%;">
	<div class="row">
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-aqua">
				<i class="glyphicon glyphicon-user" style="font-size: 35px;"></i>
			</span>

				<div class="info-box-content">
					<span class="info-box-text">我的会员</span>
					<span class="info-box-number">1</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-red">
				<i class="glyphicon glyphicon-file" style="font-size: 35px;"></i>
			</span>

				<div class="info-box-content">
					<span class="info-box-text">会员档案</span>
					<span class="info-box-number">1</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->

		<!-- fix for small devices only -->
		<div class="clearfix visible-sm-block"></div>

		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-green">
				<i class="glyphicon glyphicon-envelope" style="font-size: 35px;"></i>
			</span>
				<div class="info-box-content">
					<span class="info-box-text">咨询信息</span>
					<span class="info-box-number">1</span>
				</div>
			</div>
		</div>
		<div class="col-md-3 col-sm-6 col-xs-12">
			<div class="info-box">
				<span class="info-box-icon bg-yellow">
				<i class="ion ion-ios-people-outline" style="font-size: 35px;"></i>
			</span>

				<div class="info-box-content">
					<span class="info-box-text">总用户</span>
					<span class="info-box-number">1</span>
				</div>
				<!-- /.info-box-content -->
			</div>
			<!-- /.info-box -->
		</div>
		<!-- /.col -->
	</div>
	<!-- /.row -->
	<section class="content">
	<div class="row">
		<div class="col-lg-4">
			<!--user info table start-->
			<section class="panel" style="height: 384.417px">
				<div class="panel-body">
					<a href="javascript:void(0)" class="task-thumb">
						<?php if($userData["avatar"] != null): ?><img src="http://ainia.oss-cn-beijing.aliyuncs.com/<?php echo ($userData["avatar"]); ?>" style="width: 90px; height: 83px;" id="idocimg">
							<?php else: ?>
							<img src="https://img.alicdn.com/tps/TB1BsZ6JpXXXXaZXpXXXXXXXXXX-81-81.png" alt="User Image" style="width: 90px; height: 83px;" id="idocimg"><?php endif; ?>
					</a>
					<div class="task-thumb-details">
						<h1>
						<?php if($userData["nickname"] != null): ?><a href="javascript:;" id="idocname"><?php echo ($userData["nickname"]); ?></a> <?php else: ?>
						<a href="javascript:;" id="idocname"><?php echo ($userData["email"]); ?></a><?php endif; ?>
					</h1>

					</div>
				</div>
				<a id="CModel" data-toggle="modal" href="#iCreateUserModel" onclick="bind()"></a>
				<table class="table table-hover personal-task">
					<tbody>
						<tr class="buttonTr" style="cursor: pointer">
							<td><i class="icon-user"></i></td>
							<td style="text-align: center">新建会员</td>
							<td>+</td>
							<button onmouseover="over()" onmouseleave="down()" class="buttons table table-hover personal-task" data-type="1" onclick="showIndex(event)"></button>
						</tr>
						<tr style="cursor: pointer">
							<td><i class="icon-file"></i></td>
							<td style="text-align: center">新建档案</td>
							<td>+</td>
						</tr>
						<tr onclick="DoOpen(3);" style="cursor: pointer">
							<td><i class="icon-print"></i></td>
							<td style="text-align: center">打印报告</td>
							<td>+</td>
						</tr>
						<tr onclick="DoOpen(4);" style="cursor: pointer">
							<td><i class="icon-cloud-upload"></i></td>
							<td style="text-align: center">上传报告</td>
							<td>+</td>
						</tr>
					</tbody>
				</table>
			</section>
			<!--user info table end-->
		</div>
		<!--体检报告-->
		<div class="col-lg-8">
			<section class="panel">
				<header class="panel-heading">
					检测报告
					<div style="float: right; font-size: 14px; cursor: pointer">
						<a href="/doctor/other/medical.aspx" target="_self"><i class="icon-double-angle-right"></i></a>
					</div>
				</header>
				<table class="table table-striped table-advance table-hover" id="tijian">
					<thead>
						<tr>
							<th>姓名</th>
							<th>性别</th>
							<th>家庭住址</th>
							<!-- <th>生日</th>-->
							<th>注册时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<a href="/doctor/user/index.aspx?a=1&amp;u=6059">余彬</a>
							</td>
							<td>男</td>
							<td>北京市昌平区沙河镇小沙河村</td>
							<td>2017-01-09 10:02:21</td>
							<td>
								<button class="btn btn-primary btn-xs" onclick="DoPrint()">查看</button>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
		</div>
		<!--体检报告end-->
	</div>
	<div class="row">
		<!--安全预警-->
		<div class="col-lg-4">
			<section class="panel">
				<header class="panel-heading">
					安全预警
					<div style="float: right; font-size: 14px; cursor: pointer">
						<a href="/doctor/warning/safety.aspx?a=5" target="_self"><i class="icon-double-angle-right"></i></a>
					</div>
				</header>
				<table class="table table-striped table-advance table-hover" id="SecurityWarning">
					<thead>
						<tr>
							<th>姓名</th>
							<th>性别</th>
							<th>定位时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<a href="/doctor/user/index.aspx?a=1&amp;u=5789">郭善兵</a>
							</td>
							<td>男</td>
							<td>2017-01-09 16:48:17</td>
							<td>
								<a data-toggle="modal" href="#iSecurityWarning" onclick="GetPosition(5789,445413)"><button class="btn btn-primary btn-xs" onclick="()">查看</button></a>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
		</div>
		<!--安全预警end-->
		<!--健康预警-->
		<div class="col-lg-8">
			<section class="panel">
				<header class="panel-heading">
					健康预警
					<div style="float: right; font-size: 14px; cursor: pointer">
						<a href="/doctor/warning/health.aspx?a=5" target="_self"><i class="icon-double-angle-right"></i></a>
					</div>
				</header>
				<table class="table table-striped table-advance table-hover" id="HealthWarning">
					<thead>
						<tr>
							<th>姓名</th>
							<th>测量项目</th>
							<th>异常数值</th>
							<th>状态</th>
							<th>测量日期</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<a href="/doctor/user/index.aspx?a=1&amp;u=4991">张恒</a>
							</td>
							<td>体温</td>
							<td>体温-35.1</td>
							<td>偏低</td>
							<td>2017-01-10 14:33:34</td>
							<td>
								<a  onclick="saveid()"><button data-type="2" onclick="showIndex(event)" class="btn btn-primary btn-xs">提醒</button></a>
							</td>
						</tr>
					</tbody>
				</table>
			</section>
		</div>
		<!--健康预警end-->
	</div>
	<div class="row">

		<!--重点关注-->
		<div class="col-lg-4">
			<section class="panel">
				<header class="panel-heading">
					重点关注
					<div style="float: right; font-size: 14px; cursor: pointer">
						<a href="/doctor/other/focus.aspx" target="_self"><i class="icon-double-angle-right"></i></a>
					</div>
				</header>
				<table class="table table-striped table-advance table-hover" id="focus">
					<thead>
						<tr>
							<th>姓名</th>
							<th>性别</th>
							<th>注册时间</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<a href="/doctor/user/index.aspx?a=1&amp;u=6043">张怀宇</a>
							</td>
							<td>男</td>
							<td>2017-01-06</td>
							<td> <button class="btn btn-primary btn-xs" onclick="javascript:window.location.href = '/doctor/user/index.aspx?a=1&amp;u=6043'">查看</button> </td>
						</tr>
					</tbody>
				</table>
			</section>
		</div>
		<!--重点关注end-->
		<!--健康咨询-->
		<div class="col-lg-8">
			<section class="panel">
				<header class="panel-heading">
					健康咨询
					<div style="float: right; font-size: 14px; cursor: pointer">
						<a href="/doctor/consult/index.aspx?a=2" target="_self"><i class="icon-double-angle-right"></i></a>
					</div>
				</header>
				<table class="table table-striped table-advance table-hover" id="consult">
					<thead>
						<tr>
							<th>姓名</th>
							<th>内容</th>
							<th>时间</th>
							<th>状态</th>
							<th>操作</th>
						</tr>
					</thead>
					<tbody>
						<?php if(is_array($consultationArray)): $i = 0; $__LIST__ = $consultationArray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td>
									<a href="#"><?php echo ($v["userTinyName"]); ?></a>
								</td>
								<td><?php echo ($v["content"]); ?></td>
								<td><?php echo ($v["create_time"]); ?></td>
								<?php if($v["status"] == 0): ?><td>未回复</td>
									<?php else: ?>
									<td>已回复</td><?php endif; ?>
								<td>
									<a>    <!--   onclick="getAnswerData(<?php echo ($v["ask_id"]); ?>,<?php echo ($v["uid"]); ?>)"-->
										<button  data-type="3" onclick="showIndex(event)" class="btn btn-primary btn-xs">回复</button>
									</a>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
				</table>
			</section>
		</div>
		<!--健康咨询end-->
	</div>
	</section>
</div>

<!----------------------------------弹窗---------------------------------------->

<!----- 弹窗（新建会员）---->
<div class="modal fade" id="myModa1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
				</button>
				<h4 class="modal-title" id="myModalLabel" style="text-align: center;">新建会员</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="tab-content tasi-tab">
						<div class="tab-pane active" id="popular">
							<div class="cmxform form-horizontal tasi-form">
								
								<form id="newName" action="" method="post">
									<div class="form-group">
										<label for="uname" class="col-lg-2 control-label name">姓名</label>
										<div class="col-lg-4">
											<input class="form-control" onblur="" id="uname" name="uname" type="text" placeholder="请输入您的真实姓名">
										</div>
										<label class="col-lg-2 control-label">性别</label>
										<div class="col-lg-4" style="padding-top: 9px; line-height: 23px">
											<label class="label_radio" for="radman" style="">
					                            <input name="radsex" id="radman" value="1" style="top: 10px" checked="checked" type="radio">男&nbsp;&nbsp;
					                        </label>
											<label class="label_radio" for="radwomen">
					                             <input name="radsex" id="radwomen" value="2" type="radio">女
					                        </label>
										</div>
									</div>
									<div class="form-group">
										<label for="ulogname" class="col-lg-2 control-label">登录名称</label>
										<div class="col-lg-4">
											<input class="form-control" id="ulogname" name="ulogname" type="text" placeholder="输入您的邮箱地址">
										</div>
									</div>
									<div class="form-group ">
										<label for="upass" class="control-label col-lg-2">登录密码</label>
										<div class="col-lg-4">
											<input class="form-control " id="upass" name="upass" type="password" placeholder="输入您的登陆密码">
										</div>
										<label for="uconpass" class="control-label col-lg-2">确认密码</label>
										<div class="col-lg-4">
											<input class="form-control " id="uconpass" name="uconpass" type="password" placeholder="与登陆密码保持一致">
										</div>
									</div>
									<div class="form-group">
										<label for="uidcard" class="col-lg-2 control-label">身份证号</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="uidcard" name="uidcard" placeholder="身份证包含字母的请输入大写">
										</div>
									</div>
									<div class="form-group">
										<label for="uphone" class="col-lg-2 control-label">手机</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="uphone" name="uphone" placeholder="输入您常用手机号码">
										</div>
									</div>
									<div class="form-group">
										<label for="uemail" class="col-lg-2 control-label">邮箱</label>
										<div class="col-lg-6">
											<input type="text" class="form-control" id="uemail" name="uemail" placeholder="请输入您的邮箱地址">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">联系地址</label>
										<div class="col-lg-8">
											<input type="text" class="form-control" id="uaddress" name="uaddress" placeholder="请输入您的现居家庭住址">
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">所属分组</label>
										<div class="col-lg-4">
											<select class="form-control" id="selCreateUser">
												<option value="-1" selected="selected">默认分组</option>
												<option value="106">第二市场</option>
											</select>
										</div>
									</div>
									<div class="modal-footer">
										<span id="content" style="color: red; margin-right: 20px;"></span>
										<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
										<button type="button" class="btn btn-danger" id="newMember">提交</input>
									</div>
									
								</form>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	//新建会员表单验证
    $("#newMember").on("click",function(){
    		var username = $("#uname").val();
    		var ulognames = $("#ulogname").val();
    		var reg=/^[a-zA-Z0-9]{1,12}@[a-zA-Z0-9]{1,5}(\.[a-zA-Z0-9]{1,5})+$/;
    		var pwd = $("#upass").val();
    		var pwds = $("#uconpass").val();
    		var uidcard = $("#uidcard").val();
    		var uphone = $("#uphone").val();
    		var ph = /^(13[0-9]{9})|(18[0-9]{9})|(14[0-9]{9})|(17[0-9]{9})|(15[0-9]{9})$/;
    		var isIDCard = /^[1-9]\d{7}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}$|^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
    		var uemail = $("#uemail").val();
		if(username == ""){
		    $("#content").text("请输入您的姓名!");
			return false;
		}else if(ulognames == ""){
			$("#content").text("请输入您的登陆名称!");
			return false;
		}else if(reg.test(ulognames) == false){
			$("#content").text("请输入正确的登陆名称，要求为邮箱地址!");
			return false;
		}else if(pwd == ""){
			$("#content").text("请输入您的登陆密码!");
			return false;
		}else if(pwds!= pwd){
			$("#content").text("	确认密码必须与登陆密码保持一致!");
			return false;
		}else if(uidcard == ""){
			$("#content").text("身份证不能为空!");
			return false;
		}else if(isIDCard.test(uidcard) == false){
			$("#content").text("身份证格式不正确!");
			return false;
		}else if(ph.test(uphone) == false){
			$("#content").text("请确认您的手机号是否正确!");
			return false;
		}else if(reg.test(uemail) == false){
			$("#content").text("邮箱格式不正确!");
			return false;
		}else{
			alert("恭喜您！新建会员成功");
			$("#newName").submit();
		};
    });
</script>

<!--健康预警弹窗-->
<div class="modal fade" id="wHealth" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title" style="text-align: center;">预警建议信息</h4>
			</div>
			<div class="modal-body">
				<div class="panel-body">
					<div class="tab-content tasi-tab">
						<div class="tab-pane active" id="popular">
							<div class="cmxform form-horizontal tasi-form">

								<div class="form-group">
									<label for="uidcard" class="col-lg-2 control-label"><b>内容</b></label>
									<div class="col-lg-10">
										<textarea class="form-control" c="" rows="10" id="txtMsg"></textarea>
									</div>
								</div>
								<div class="form-group" style="text-align: center;">
									<input class="btn btn-danger" type="button" onclick="DoSaveMsg()" value="提交">
									<input type="hidden" id="hidhealthinfoid" value="">
									<input type="hidden" id="hidhealthuid" value="">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!----健康咨询回复---->
<div class="modal fade" id="iConsult" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h4 class="modal-title">回复</h4>
			</div>
			<div class="panel-body">
				<div class="timeline-messages" id="messageslist">
					<div class="msg-time-chat">
						<a class="message-img" href="/doctor/user/index.aspx?a=1&amp;u=6055"> <img src="" class="avatar"></a>
						<div class="message-body msg-in"><span class="arrow"></span>
							<div class="text">
								<p class="attribution"><a href="/doctor/user/index.aspx?a=1&amp;u=6055">董刚</a>2017-01-10 11:50:50</p>
								<p>这几天有点头疼？</p>
							</div>
						</div>
					</div>
				</div>
				<div class="chat-form">
					<div class="input-cont ">
						<input class="form-control col-lg-12" id="txtConsultMsg" name="txtConsultMsg" placeholder="在这里输入回复信息..." minlength="2" type="text" required="">
					</div>
					<div class="form-group">
						<div class="pull-right chat-features">
							<button type="button" class="btn btn-send" onclick="DoSaveConsultMsg();">发送</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
//    新建会员鼠标经过
	function over(){
		$(".buttonTr").css({"background":"#f5f8fb"});
	}
	
	function down(){
		$(".buttonTr").css({"background":"#fff"});
	}
	
</script>




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