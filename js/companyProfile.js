
//  	公司简介
$('.profiles').on('click','.liProfiles a',function(){
	$('.liProfiles a').css({"color":"#555"})
	$(this).css({"color":"#ed6c00"});
	
	$('.pull').text('');
	$('.pulls').text($(this).text());
	$('.pull').text($(this).text());
});




