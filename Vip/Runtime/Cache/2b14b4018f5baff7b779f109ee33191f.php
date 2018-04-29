<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<meta name=”renderer” content=”webkit”>
<meta http-equiv=”X-UA-Compatible” content=”IE=Edge,chrome=1″ >
<head>
<meta charset="utf-8">
<title>登录页</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="__PUBLIC__/Css/login/css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__PUBLIC__/Css/login/js/jquery.js"></script>
<script type="text/javascript" src="__PUBLIC__/Css/login/js/jquery.superslide.2.1.2.js"></script>

</head>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/jquery-1.7.2.min.js\"></sc"+"ript>")</script>

<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/Base.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/prototype.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/mootools.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/Ajax/ThinkAjax.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/Form/CheckForm.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/common.js\"></sc"+"ript>")</script>

<script type="text/JavaScript" language="JavaScript" src="__PUBLIC__/Js/jquery.SuperSlide.2.1.1.source.js"> </script> 
 

<script src="__PUBLIC__/Js/jquery.min.js"></script>
<script type="text/javascript"> 
jQuery.noConflict();
jQuery(document).ready(function(){ 
    jQuery(".input_0").focus(function(e){
        jQuery(this).siblings(".input_hint").hide();
    });
    jQuery(".input_0").blur(function(e){
        jQuery(this).val(jQuery.trim(jQuery(this).val()));
        if((jQuery(this).val()).length == 0)
            jQuery(this).siblings(".input_hint").show();
    });
    jQuery(".input_hint").click(function(e){
        e.stopPropagation();
        jQuery(this).siblings(".input_0").focus();
    });
});
</script> 

<script>
jQuery(document).ready(function(){ 
    var set=setInterval('fade()',1000);
});
    
     var i=0;
     function fade(){
        //fadeOut(淡出花费的时间[,淡出后的操作])
        /*
        1、定时器调用轮播函数
        2、先让当前的banner淡出，淡出完之后，获取下一张图片的src值，再替换到background
        3、再让banner淡入
        */
    jQuery('.banner').fadeOut(2000,function(){
            i++;
            if(i>3) i=0;
            var src=jQuery('.banner ul li').eq(i).find('img').attr('src')
            jQuery('.banner').css({"background":"url(" + src + ")","background-position":"center top"});
        })
        jQuery('.banner').fadeIn(2000);
    }
</script>
<body>
	<div class="login-layout">
    	<div class="logo"><img src="__PUBLIC__/Css/login/picture/loginimg.png"></div>
        <form method='post' name="login" id="form1" onsubmit="return false">
            <div class="login-form" style="position: relative">
                <div class="formContent">
                	<div class="title">管理中心</div>
                    <div class="formInfo">
                    	<div class="formText">
                        	<i class="icon icon-user"></i>
                            <input type="text" name="account" autocomplete="off" class="input-text" value="" placeholder="用户名" />
                        </div>
                        <div class="formText">
                        	<i class="icon icon-pwd"></i>
                            <input type="password" name="password" autocomplete="off" class="input-text" value="" placeholder="密  码" />
                        </div>
                        <div class="formText">
                            <i class="icon icon-chick"></i>
                            <input type="text" name="verify" autocomplete="off" class="input-text chick_ue" value="" placeholder="验证码" />
                      <span class="input-group-addon" >
                        <img id="verifyImg" src="__URL__/verify/" width="55" onClick="fleshVerify()" border="0" alt="点击刷新验证码" style="cursor:pointer" align="absmiddle" />
                        </span>

                        </div>
                       <!--  <div class="formText">
                            <a href="/index.php/admin/Admin/forget_pwd" class="forget_pwd">忘记密码？</a>
                        </div> -->
						<div class="formText submitDiv">
                          <span class="submit_span">
                          	<input type="submit" name="submit" class="sub" id="btn_submit" value="登录" onClick="ThinkAjax.sendForm('form1','__URL__/checkLogin/',loginHandle,'result')">
                            <input type="hidden" name="ajax" value="1">
                          </span>
                       </div>
                    </div>
                </div>
                <div id="error" style="position: absolute;left:0px;bottom: 12px;text-align: center;width:441px;">

                </div>
            </div>
            <div class="form-group"><div class="error"><span id="result"></span></div></div>
        </form>
    </div>
    <div id="bannerBox">
        <ul id="slideBanner" class="slideBanner">
            <li><img src="__PUBLIC__/Css/login/picture/banner_1.jpg"></li>
            <li><img src="__PUBLIC__/Css/login/picture/banner_2.jpg"></li>        
        </ul>
    </div>
    <!--<script type="text/javascript" src="js/jquery.purebox.js"></script> -->   
    <script type="text/javascript">
    	$("#bannerBox").slide({mainCell:".slideBanner",effect:"fold",interTime:3500,delayTime:500,autoPlay:true,autoPage:true,endFun:function(i,c,s){
			$(window).resize(function(){
				var width = $(window).width();
				var height = $(window).height();
				s.find(".slideBanner,.slideBanner li").css({"width":width,"height":height});
			});
		}});
		


    </script>


</body>
<script type="text/javascript">             
jQuery(".focusBox").hover(function(){ jQuery(this).find(".prev,.next").stop(true,true).fadeTo("show",0.2) },function(){ jQuery(this).find(".prev,.next").fadeOut() });              
jQuery(".focusBox").slide({ mainCell:".pic",effect:"fold", autoPlay:true, delayTime:600, trigger:"click"}); 
</script> 
</html>
<script language="JavaScript">
<!--
var PUBLIC   =   '__PUBLIC__';
ThinkAjax.image = [  '__PUBLIC__/Images/loading2.gif', '__PUBLIC__/Images/ok.gif','__PUBLIC__/Images/update.gif' ]
ThinkAjax.updateTip =   '登录中～';
function loginHandle(data,status){
if (status==1)
{
$('result').innerHTML   =   '<span style="color:blue"><img SRC="__PUBLIC__/Images/ok.gif" WIDTH="20" HEIGHT="20" BORDER="0" ALT="" align="absmiddle" > 登录成功！3 秒后跳转～</span>';
$('form1').reset();
window.location = '__URL__';
}
}
function keydown(e){
    var e = e || event;
    if (e.keyCode==13)
    {
    ThinkAjax.sendForm('form1','__URL__/checkLogin/',loginHandle,'result');
    }
}
function fleshVerify(type){
//重载验证码
var timenow = new Date().getTime();
if (type)
{
$('verifyImg').src= '__URL__/verify/adv/1/'+timenow;
}else{
$('verifyImg').src= '__URL__/verify/'+timenow;
}

}
function checkRadio(){
    alert("您不是该地区的ID");
    window.location = '__URL__/login';
}

//-->
</script>