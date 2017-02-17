//  新闻展示超出部分以省略号显示
var texts = document.querySelectorAll(".p");
for(var i=0;i<texts.length; i++){
		str = texts[i].innerHTML;
		textLeng = 38;
		if(str.length > textLeng ){
          texts[i].innerHTML = str.substring(0,textLeng )+"...";
    }
}
