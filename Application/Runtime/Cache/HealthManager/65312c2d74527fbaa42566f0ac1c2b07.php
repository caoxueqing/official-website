<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>健康管理平台</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="/Public/AdminLTE/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/Public/AdminLTE/dist/css/AdminLTE.min.css">
<!-- iCheck -->
<link rel="stylesheet" href="/Public/AdminLTE/plugins/iCheck/square/blue.css">
<!-- jQuery 2.2.3 -->
<script src="/Public/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/Public/AdminLTE/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/Public/AdminLTE/plugins/iCheck/icheck.min.js"></script>
<script src="/Public/AdminLTE/bootstrap/js/doctor.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
	<div class="login-box" style="margin: 7% auto 2% auto;">
		<div class="login-logo">
			<a href="<?php echo U(signIn);?>">医生管理登录</a>
		</div>
		<!-- /.login-logo -->
		<div class="login-box-body">
			<p class="login-box-msg" id="login-title">请使用邮箱账号和密码登陆</p>
			<div action="ajax_signIn" method="post">
				<div class="form-group has-feedback">
					<input type="email" id="email" class="form-control" placeholder="Email"> 
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" id="password" class="form-control" placeholder="Password"> 
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row">
					<div class="col-xs-8">
						<input type="checkbox" class="check" checked>记住我
					</div>
					<input type="hidden" value="1" name="remember" id="remember" />
					<!-- /.col -->
					<div class="col-xs-4">
						<button onclick="login();" class="btn btn-primary btn-block btn-flat">登录</button>
					</div>
					<!-- /.col -->
				</div>
			</div>

			<!-- /.social-auth-links -->

			<a href="<?php echo U('resetPassword');?>">忘记密码！</a><br> <a
				href="<?php echo U('signUp');?>" class="text-center">注册</a>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->
	<div class="row">
		<div style="margin: 0px auto 2% auto; width: 387px;padding: 0px 20px 0px 30px;">
			<!--<h3><small> 其他平台</small></h3>-->
			<div class="social-login-buttons">
				<!-- <a class="btn btn-link-1" style="background: #4862a3; color: #ffffff;" href="<?php echo U('Member/signIn');?>"> 
					<i class="fa fa-user-md"></i> 个人管理平台
				</a> 
				<a class="btn btn-link-1" style="background: #55acee; color: #ffffff;margin-left: 70px;" href="<?php echo U('Group/signIn');?>">
					<i class="fa fa-institution"></i> 群组管理平台
				</a> -->
				<!-- <a class="btn btn-link-1" style="background: #dd4b39; color: #ffffff;" href="<?php echo U('EarlyWarning/signIn');?>">
					<i class="fa fa-bell"></i> 预警管理平台
				</a> -->
			</div>
		</div>
	</div>
</body>
</html>