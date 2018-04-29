<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo ($System_namex); ?></title>
<link href="__PUBLIC__/Css/body.css" rel="stylesheet" media="screen" type="text/css" />
<link href="__PUBLIC__/Css/menu.css" rel="stylesheet" media="screen" type="text/css" />
<link href="__PUBLIC__/Css/main.css" rel="stylesheet" media="all" type="text/css" />
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/Base.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/prototype.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/mootools.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/Ajax/ThinkAjax.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/Form/CheckForm.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/common.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/Util/ImageLoader.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/myfocus-1.0.4.min.js\"></sc"+"ript>")</script>
<script type="text/javascript">document.write("<scr"+"ipt src=\"__PUBLIC__/Js/all.js\"></sc"+"ript>")</script>
<script language="JavaScript">
ifcheck = true;
function CheckAll(form)
{
	for (var i=0;i<form.elements.length-2;i++)
	{
		var e = form.elements[i];
		e.checked = ifcheck;
	}
	ifcheck = ifcheck == true ? false : true;
}
</script>
<script>
//function checkLeave(){
//	window.parent.stateChangeIE();
//}
</script>
</head>
<body>

<link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet" />
<div class="ncenter_box">
<div class="accounttitle"><h1>添加新地址&nbsp;[ <a href="javascript:history.go(-1);">返回</a> ] </h1></div>
<form action="__URL__/addAddress" method="post" id="form1">
<table width="100%" class="tab3" border="0" cellpadding="0">
  <tr align="center">
    <td height="27" colspan="6" nowrap> 
        <fieldset>          
            <div class="form-group">
                <label class="lb">
                    <span class="required"><span style="color:#F00;">*</span></span>收货人姓名：</label>
                <input name="s_name" type="text" value="<?php echo ($rs['name']); ?>" id="s_name" tabindex="2"  />
                <span class="field">
                    <div id="ctl00_ContentPlaceHolder1_Order1_ApplyEntityNOTip">
                    </div>
                </span>
            </div>
            <div class="form-group">
                <label class="lb">
                   <span style="color:#F00;">*</span>收货人地址：</label>
                <input name="s_address" type="text" id="s_address" tabindex="3" class="ipt-t" value="<?php echo ($rs['address']); ?>"/>
            </div>
            <div class="form-group">
                <label class="lb">
                   <span style="color:#F00;">*</span>收货人电话：
                </label>
                <input type="text" id="s_tel" name="s_tel" value="<?php echo ($rs['tel']); ?>"/>
                <input type="hidden" id="ID" name="ID" value="<?php echo ($did); ?>"/>
            </div>
            <input type="submit" name="" class="btn btn-info btn-sm" value="立即添加常用地址" id="" />
        </fieldset>
        </td>
  </tr>
 
</table>
</form>
</div>
</body>
</html>