

var texts = document.querySelectorAll(".solutionp p");
for(var i=0;i<texts.length; i++){
		str = texts[i].innerHTML;
		textLeng = 60;
		if(str.length > textLeng ){
          texts[i].innerHTML = str.substring(0,textLeng )+"...";
    }
};

//  下拉标题
$('.proDucts').on('click','.proDuct',function(){
	$(".proDuct").removeClass("active");
	$(this).addClass("active");
	
	$('.pull').text($(this).children('.a').text());
	$('.pullst').text($(this).children('.a').text());
});

//  下拉内容
$('.profiles').on('click','.liProfiles a',function(){
	$('.liProfiles a').css({"color":"#555"});
	$(this).css({"color":"#ed6c00"});
	
	$('.pulls').text($(this).text());
	$('.pull').text($(this).parent().parent().prev().text());
	$('.pullst').text($(this).parent().parent().prev().text());
});

