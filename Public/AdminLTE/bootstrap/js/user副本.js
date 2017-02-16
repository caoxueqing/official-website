//根据日期获取报告数据数据
function getBSData(type) {
	if(type == 1){
		//血糖
		var text = '血糖趋势图';
		var subtext = '标准范围值6-9-mmol/L';
		var data = '血糖浓度';
		var name = '血糖浓度';
	}else if(type==2){
		//体温
		var text = '体温趋势图';
		var subtext = '36度--37.2度';
		var data = '体温';
		var name = '体温';
	}else if(type==3){
		//血压
		var text = '血压趋势图';
		var subtext = '标准范围值:舒张压<90--140mmHg>,收缩压<60--90mmHg>';
		var data = '舒张压, 收缩压';
		var name = '舒张压';
		var name1 = '收缩压';
	}else if(type==4){
		//血氧
		var text = '血氧趋势图';
		var subtext = '标准范围值:血糖(94%--100%),心率(60--100)';
		var data = '血氧浓度,心率';
		var name = '血氧浓度';
		var name1 = '心率';
	}
	//获取用户传入的日期并格式化日期
	var ttDates = $('#rtime').val();
	var rtime = ttDates.replace(/(\d{4}).(\d{1,2}).(\d{1,2}).+/mg, '$1-$2-$3');
	//获取用户选择的日/周/月
	var rdotime = $('#rdotime').val();
	if(rtime == ''){
		alert('请先选择测量日期');
	}

	$.ajax({
		cache : false,
		type : "POST",
		url : "ajax_getBSData",
		data : {
			rtime : rtime,
			rdotime : rdotime,
			type : type,
		},
		async : false,
		error : function(request) {
		},
		success : function(data) {
			//定义X轴和Y的数据变量
			var _a = [];
			var _b = [];
			var _c = [];
			for (var i = 0; i < data.length; i++) {
				_a.push(data[i].time);
				_b.push(data[i].sugar);
				_c.push(data[i].value);
			}
			// 基于准备好的dom，初始化echarts实例
			var myChart = echarts.init(document.getElementById('main'));

			// 指定图表的配置项和数据
			var option = {
				title : {
					text : text,
					subtext : subtext
				},
				tooltip: {
		            trigger: 'axis'
		        },
		        legend: {
		            data: [data]
		        },
				//与series中的name对应
				toolbox: {
		            show: true,
		            feature: {
		                magicType: { show: true, type: ['line', 'bar'] },
		                restore: { show: true },
		                saveAsImage: { show: true }
		            }
		        },
		        calculable: true,
				xAxis : {
					type: 'category',
					data : _a //指定x轴分组["2016-11-07 09:29:09","2016-11-07 10:29:09"] 
				},
				yAxis: [
					{
					    type: 'value',
					    splitArea: { show: true }
					}
				],
				series : [ //添加对应的name柱形图
							{
								name : name,	//类别
								type : 'bar',	//图表数据类型
								data : _b		//高度[14.3,12.6]
							}, 
			            	{
				                name: name1,
				                type: 'bar',
				                data: _c
			
				            }
				        ]
			};
			// 使用刚指定的配置项和数据显示图表。
			myChart.setOption(option);
		}
	})
}

// 找回密码
function postAccount() {
	// 获取账号
	var email = $('#email').val();
}

// 注册
function signUp() {
	var email = $('#email').val();
	var password = $('#password').val();
	$.ajax({
		cache : false,
		type : "POST",
		url : "/HealthManager/Member/ajax_signUp",
		data : {
			password : password,
			email : email,
		},
		async : true,
		error : function(request) {
		},
		success : function(data) {
			if (data.status) {
				alert("注册成功");
				window.location.href = '/HealthManager/Member/signIn';
			} else {
				$("#login-title").text(data.message);
				setTimeout(disappear, 100);
			}

		}
	});
}

// 登陆
function login() {
	var email = $('#email').val();
	var password = $('#password').val();
	var remember = $('#remember').val();
	$.ajax({
		cache : false,
		type : "POST",
		url : "/HealthManager/Member/ajax_signIn",
		data : {
			"password" : password,
			"email" : email,
			"remember" : remember,
		},
		async : true,
		error : function(request) {
		},
		success : function(data) {
			if (data.status) {
				window.location.href = '/HealthManager/Member/dashboard';
			} else {
				$("#login-title").text(data.message);
				setTimeout(disappear, 100);
			}

		}
	});
}

// 重置密码(忘记密码)
function resetPassword() {
	var email = $('#email').val();
	var password = $('#password').val();
	$.ajax({
		cache : false,
		type : "POST",
		url : '/HealthManager/Member/ajax_resetPassword',
		data : {
			"password" : password,
			"email" : email
		}, // 你的formid
		async : false,
		error : function(request) {
		},
		success : function(data) {
			if (data.status) {
				alert("修改密码成功，请重新登录");
				window.location.href = '/HealthManager/Member/signIn';
			} else {
				$("#change-pwd-tip").text("密码无效请重新输入");
				setTimeout(resetToTipChangePwd, 100);
			}

		}
	});
}

// 记住我
$(function() {
	//    $('input').iCheck({
	//      checkboxClass: 'icheckbox_square-blue',
	//      radioClass: 'iradio_square-blue',
	//      increaseArea: '20%' // optional
	//    });

	// 记住我
	$('.check').change(function() {
		if (this.checked == true) {
			$('#remember').attr('value', '1');
		} else {
			$('#remember').attr('value', '0');
		}
	});

});

// 修改密码
function changePwd() {
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_changePwd',
		data : $('#change-pwd-form').serialize(), // 你的formid
		async : false,
		error : function(request) {
		},
		success : function(data) {
			if (data.status == 0) {
				$("#change-pwd-tip").html("");
				$("#change-pwd-tip").html("原始密码错误或新密码输入不一致");
				// setTimeout(resetToTipChangePwd, 100);
			} else {
				alert("修改密码成功，请重新登录");
				window.location.href = 'signIn';
			}

		}
	});
}

// 修改头像
function changeAvatar() {
	var uid = $('#uid').val();
	var formData = new FormData();
	formData.append("file", $("#doc")[0].files[0]);
	formData.append("uid", uid);

	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_updateUserAvatar',
		data : formData, // 发送的数据
		// 告诉jQuery不要去处理发送的数据
		processData : false,
		// 告诉jQuery不要去设置Content-Type请求头
		contentType : false,
		beforeSend : function() {
			console.log("正在进行，请稍候");
		},
		async : false,
		error : function(request) {
			console.log("error");
		},
		success : function(data) {
			if (data.status == 0) {
				alert('修改头像失败');
			} else {
				alert("修改头像成功");
				window.location.href = 'dashboard';
			}

		}
	});
}

function disappear() {

	$("#login-title").text("用户名或密码输入错误");

}

function resetToTipChangePwd() {

	$("#change-pwd-tip").text("密码不小于6位，并且是字母和数字的混合，其他类型不接受!请注意哦！");

}

function messageCenter() {
	window.location.href = 'messageCenter';
}

// 选择科室显示该科室下的医生
function selectDoctor() {
	// 获取科室id
	var did = $('#did').val();
	$.ajax({
		cache : false,
		type : "post",
		url : 'ajax_getDoctorInfo',
		data : {
			did : did
		},
		dataType : "json",
		// async: false,
		error : function(request) {
		},
		success : function(data) {
			if (data) {
				var item = '';
				$.each(data, function(i, result) {
					item += '<tr>';
					item += '<td><img src="' + result.avatar
							+ '" style="width: 80px"></td>';
					item += '<td>' + result.tinyName + '</td>';
					item += '<td>' + result.positionName + '</td>';
					item += '<td>' + result.hospitalName + '</td>';
					item += '<td>' + result.departmentName + '</td>';
					item += '<td>' + result.skill + '</td>';
					item += '</tr>';
					$('.content').html(item);
				});
			} else {
				$('#mainTable').append('该科室下没有医生');
			}
		}
	});
}

// 获取未读消息数
function GetMsgCount() {

}

// 保存血糖数据到血糖表
function saveBSData() {
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_BSData',
		data : $('#save-bg-form').serialize(), // 你的formid
		async : false,
		error : function(request) {
		},
		success : function(data) {
			if (data.status == 1) {
				alert("保存成功");
				window.location.href = 'bloodSugartList';
			} else {
				alert("保存失败");
			}

		}
	});
}

// 保存血压数据到血压表
function saveDBPData() {
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_saveDBPData',
		data : $('#save-bg-form').serialize(), // 你的formid
		async : false,
		error : function(request) {
		},
		success : function(data) {
			if (data.status == 1) {
				alert("保存成功");
				window.location.href = 'dbpReportList';
			} else {
				alert("保存失败");
			}

		}
	});
}

// 保存血氧数据到血氧表
function saveBOData() {
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_saveBOData',
		data : $('#save-bg-form').serialize(), // 你的formid
		async : false,
		error : function(request) {
		},
		success : function(data) {
			if (data.status == 1) {
				alert("保存成功");
				window.location.href = 'bloodOxygenList';
			} else {
				alert("保存失败");
			}

		}
	});
}

// 保存尿常规数据到尿常规表
function saveURData() {
	var formData = new FormData();
	formData.append("file", $("#doc")[0].files[0]);

	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_saveURData',
		data : formData, // 发送的数据
		// 告诉jQuery不要去处理发送的数据
		processData : false,
		// 告诉jQuery不要去设置Content-Type请求头
		contentType : false,
		beforeSend : function() {
			console.log("正在进行，请稍候");
		},
		async : false,
		error : function(request) {
			console.log("error");
		},

		success : function(data) {
			if (data.status == 0) {
				alert('保存失败');
			} else {
				alert("保存成功");
				window.location.href = 'urineRoutineList';
			}

		}
	});
}

// 保存体温数据到体温表
function saveTRData() {
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_saveTRData',
		data : $('#save-bg-form').serialize(), // 你的formid
		async : false,
		error : function(request) {
		},
		success : function(data) {
			if (data.status == 1) {
				alert("保存成功");
				window.location.href = 'tempeRatureList';
			} else {
				alert("保存失败");
			}

		}
	});
}

// 获取医生回复的问诊信息
function getAnswerData(did, aid) {
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_getAnswerData',
		data : {
			doctorId : did,
			askId : aid,
		},
		async : false,
		error : function(request) {
		},
		success : function(data) {
			if (data) {
				$('.hid').html();
				var item = '';
				item += '<ul class="media-list comment-list">';
				item += '<li class="media"><div class="media-body">';
				item += '<h4>' + data.tiny_name + '</h4>';
				item += '<span class="text-muted">' + data.create_time
						+ '</span>';
				item += '<p>' + data.content + '</p>';
				item += '</div></li></ul>';
				$('.panel-body').html(item);
			} else {
			}

		}
	});
}

/* 重置密码给邮箱发邮件 */
function resetPwdByEmail() {
	var email = $("#myEmail").val();
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_resetPwdByEmail',
		data : {
			email : email,
		},
		async : false,
		error : function(request) {
			alert('网络错误,请重试!');
		},
		success : function(data) {
			if (data.status == false) {
				alert(data.message);
			} else {
				// 跳转到设置密码页面
				alert('发送成功,请到邮箱读取新邮件');
				// window.location.href = 'setPassword';
			}

		}
	});

}

// 给input一个获取焦点和失去焦点事件
// $('#setPassword').focus(function(){
// alert(1);
// $('.u-tips').find('span').html('密码不小于6位，并且是字母和数字的混合，其他类型不接受!请注意哦！');
// });
// $('#setPassword').blur(function(){
// $('.u-tips').find('span').html('');
// });

/* 验证手机 */
function verifyCode(event) {
	var button = $(event.target);
	var code = $("#verifyCode").val();
	var mobile = $("#targetMobile").val();
	button.attr('disabled', true);
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_verifyMobile',
		data : {
			"mobile" : mobile,
			'code' : code
		}, // 你的formid
		async : true,
		error : function(request) {
			alert('网络错误请重试');
			button.attr('disabled', false);
		},
		success : function(data) {
			button.attr('disabled', false);
			if (data.status) {
				$('#changeMobileModal').modal('hide');
			} else {
			}
			alert(data.message);
		}
	});
}

/* 绑定手机 */
function bindMobileCode(event) {
	var button = $(event.target);
	var code = $("#verifyCode").val();
	var mobile = $("#targetMobile").val();
	button.attr('disabled', true);
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_bindMobile',
		data : {
			"mobile" : mobile,
			'code' : code
		}, // 你的formid
		async : true,
		error : function(request) {
			alert('网络错误请重试');
			button.attr('disabled', false);
		},
		success : function(data) {
			button.attr('disabled', false);
			if (data.status) {
				$('#changeMobileModal').modal('hide');
			} else {
			}
			alert(data.message);
		}
	});
}

/* 发送验证码 */
function sendVerifyCode(event) {
	var mobile = $("#targetMobile").val();
	var button = $(event.target);

	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_sendVerifyCode',
		data : {
			"mobile" : mobile
		}, // 你的formid
		async : true,
		error : function(request) {
		},
		success : function(data) {
			if (data.status) {

				sendTimer(button);
			} else {

			}

		}
	});

}

/* 根据type显示不同弹窗 */
function showAlert(event) {
	var button = $(event.target);
	var type = button.data('type');
	switch (type) {
	case 1:
		$('#changeEmailModal').modal('show');
		break;
	case 2:
		$('#changeMobileModal').modal('show');
		break;
	case 3:
		$('#verifyEmailModal').modal('show');
		break;
	case 4:
		$('#changePwdModal').modal('show');
		break;
	case 5:
		$('#bindMobileModal').modal('show');
		break;

	default:

	}

}

/* 发送验证到邮箱 isNes==true被占用 false未被占用 */
function sendEmailVerifyCode(button, email, isNew) {
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_sendVerifyEmail',
		data : {
			"email" : email,
			"isNew" : isNew
		}, // 你的formid
		async : true,
		error : function(request) {
		},
		success : function(data) {
			if (data.status) {
				sendTimer(button);
			} else {
				alert(data.message);
			}

		}
	});
}

/* 重新发送邮箱验证 */
function resendVerifyEmail(event) {
	var button = $(event.target);
	var email = $("#email").val();

	sendEmailVerifyCode(button, email, 'false');
}

/* 发送新邮箱 */
function sendVerifyEmailToNewEmail(event) {
	var button = $(event.target);
	var email = $("#new_email").val();

	sendEmailVerifyCode(button, email, 'true');
}

/* 验证码按钮时间 */
function sendTimer(button) {
	button.attr("disabled", true);
	button.timer({
		countdown : true,
		duration : '30s', // The time to countdown from. `seconds` and
		// `duration` are mutually exclusive
		callback : function() {

			setTimeout(function() {
				button.attr("disabled", false);
				button.text('重新发送');
				button.timer('remove');
			}, 1100);
		}, // If duration is set, this function is called after `duration` has
		// elapsed
		repeat : false, // If duration is set, `callback` will be called
		// repeatedly
		format : '%s秒'
	});
}

/* 验证新邮箱 */
function verifyNewEmail(event) {

	var new_email = $("#new_email").val();
	var code = $("#new_email_code").val();
	var button = $(event.target);
	button.attr('disabled', true);
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_verifyEmailCode',
		data : {
			"code" : code,
			"email" : new_email
		}, // 你的formid
		async : true,
		error : function(request) {
			button.attr('disabled', false);
			alert('网络错误,请重试!');
		},
		success : function(data) {
			button.attr('disabled', false);
			if (data.status) {
				$("#email").val(new_email);
				$('#changeEmailModal').modal('hide');
				alert(data.message);
			} else {
				alert(data.message);
			}

		}
	});

}

/* 验证邮箱 */
function verifyEmail(event) {
	var code = $("#verifyEmailCode").val();
	var button = $(event.target);
	button.attr('disabled', true);
	$.ajax({
		cache : false,
		type : "POST",
		url : 'ajax_verifyEmailCode',
		data : {
			"code" : code
		}, // 你的formid
		async : true,
		error : function(request) {
			button.attr('disabled', false);
			alert('网络错误,请重试!');
		},
		success : function(data) {
			button.attr('disabled', false);
			if (data.status) {
				$("#verifyEmailButton").remove();
				$('#verifyEmailModal').modal('hide');
				alert(data.message);
			} else {
				alert(data.message);
			}

		}
	});

}
