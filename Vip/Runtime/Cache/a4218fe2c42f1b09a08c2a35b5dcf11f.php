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

<script type="text/javascript" src="__PUBLIC__/Js/UserJs.js"></script>
<div class="ncenter_box">
<div class="accounttitle"><h1>复投 </h1></div>
    <div class="c_p5"><div class="tips">首次申请报单中心，请填写申请备注。 </div></div>
	<table width="100%" border="0" cellpadding="3" cellspacing="0">
		<form name="form1" method='post' id="form1" action="__URL__/agentsAC1">
     

		<tr>
			<td width="25%" height="30" align="right">会员编号：</td>
			<td width="75%"><?php echo ($fck_rs['user_id']); ?></td>
		</tr>
		<tr>
			<td width="25%" height="30" align="right">现金币：</td>
			<td width="75%"><?php echo ($fck_rs['agent_use']); ?></td>
		</tr>
		<tr>
			<td width="25%" height="30" align="right">复投币：</td>
			<td width="75%"><?php echo ($fck_rs['agent_xf']); ?></td>
		</tr>
		<tr>
			<td width="25%" height="30" align="right">复投单数：</td>
			<td width="75%"><?php echo ($fck_rs['is_cc']); ?></td>
		</tr>
		 <tr>
			<td width="25%" height="30" align="right">复投类型：</td>
			<td>
            
            <select name="futou" >
              <option value="1">请选择复投类型</option>
              <option value="2">现金币复投</option>
              <option value="3">复投币复投</option>
            </select>
           </td>
		</tr>
		<!-- <tr>
			<td width="25%" height="30" align="right">申请油卡时间：</td>
		  <td><?php if(($fck_rs['idt']) == "0"): else: echo (date('Y-m-d H:i:s',$fck_rs['idt'])); endif; ?></td>
		</tr> -->
		<!-- <tr>
			<td width="25%" height="30" align="right">开通报单中心时间：</td>
		  <td><?php if(($fck_rs['adt']) == "0"): else: echo (date('Y-m-d H:i:s',$fck_rs['adt'])); endif; ?></td>
		</tr> -->
  
      
       <!--  <script language = JavaScript>
        var s=["s1","s2"];
        var opt0 = ["请选择","请选择"];
        function setup()
        {
            for(i=0;i<s.length-1;i++)
            document.getElementById(s[i]).onchange=new Function("change("+(i+1)+")");
            change(0);
        }
        setup();
      </script>
       
		<tr>
			<td align="right">备注：</td>
		  <td><textarea name="content" id="content" cols="40" rows="8"></textarea></td>
		</tr> -->
		<tr>
			<td align="right">复投单数</td>
		  <td><input type="text" name="nums"></td>
		</tr>
		<tr>
			<td height="30">&nbsp;</td>
		  <td><input name="submit" type="submit"  class="button_text" value="复投" /></td>
		</tr>
	
		</form>
	</table>
</div>
</body>
</html>