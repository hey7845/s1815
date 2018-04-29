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

<div class="ncenter_box">
<div class="accounttitle"><h1>注册会员确认 </h1></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tab1">
  <tr>
    <td>
    <form method='post' id="form1" name="form1" action="__URL__/usersAdd"/>
    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="tab4">
      <tr>
        <td width="25%" height="30" align="right"><span class="zc_hong">*</span> 所属服务中心：</td>
        <td><?php echo ($shopid); ?></td>
        </tr>
      <tr>
        <td width="25%" height="30" align="right"><span class="zc_hong">*</span> 推荐人：</td>
        <td><?php echo ($RID); ?></td>
        </tr>
      <!--  <tr style="display:none">
        <td height="30" align="right"><span class="zc_hong">*</span> 接点人：</td>
        <td><?php echo ($FID); ?></td>
        </tr>
        -->
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> <?php echo ($User_namex); ?>：</td>
        <td><?php echo ($UserID); ?></td>
        </tr>
        <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 昵称：</td>
        <td><?php echo ($nickname); ?></td>
        </tr>
   <!-- <tr>
        <td height="30" align="right">省份：</td>
        <td><?php echo ($s_province); ?></td>
        </tr>
      <tr>
        <td height="30" align="right">城市：</td>
        <td><?php echo ($s_city); ?></td>
        </tr>
      <tr>
        <td height="30" align="right">区县：</td>
        <td><?php echo ($s_county); ?></td>
        </tr>
      <tr>
 -->
      <tr>
        <td height="30" colspan="2" style="height:5px;"><hr></td>
      </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 一级密码：</td>
        <!-- <td><?php echo ($Password); ?></td> -->
        <td>******</td>
        </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 二级密码：</td>
        <!-- <td><?php echo ($PassOpen); ?></td> -->
        <td>******</td>
        </tr>
      <tr>
        <td height="30" colspan="2" style="height:5px;"><hr></td>
      </tr>
	   <!-- <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 语言：</td>
        <td><?php echo ($lang); ?></td>
        </tr>
		  <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 国家：</td>
        <td><?php echo ($countrys); ?></td>
        </tr>
	  -->
  <!--   <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 油卡类别：</td>
        <td><?php echo ($youkakName); ?></td>
        
        </tr>
      <tr>
        <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 油卡卡号：</td>
        <td><?php echo ($YouCard); ?></td>
        </tr>
      <tr>
	   -->
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 开户银行：</td>
        <td><?php echo ($BankName); ?></td>
        </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span>银行卡号：</td>
        <td><?php echo ($BankCard); ?></td>
        </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span> 开户姓名：</td>
        <td><?php echo ($UserName); ?></td>
        </tr>
      <tr>
        <td height="30" align="right">开户省份：</td>
        <td><?php echo ($BankProvince); ?></td>
        </tr>
      <tr>
        <td height="30" align="right">开户城市：</td>
        <td><?php echo ($BankCity); ?></td>
        </tr>
      <tr>
        <td height="30" align="right">详细开户地址：</td>
        <td><?php echo ($BankAddress); ?></td>
        </tr>
      <tr>
        <td height="30" colspan="2" style="height:5px;"><hr></td>
      </tr>
     <!--  <tr>
        <td height="30" align="right"><span class="zc_hong">*</span>身份证号：</td>
        <td><?php echo ($UserCode); ?></td>
        </tr>
      <tr> -->
        <td height="30" align="right">联系地址：</td>
        <td><?php echo ($UserAddress); ?></td>
        </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span>微信：</td>
        <td><?php echo ($UserEmail); ?></td>
        </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span>支付宝：</td>
        <td><?php echo ($qq); ?></td>
        </tr>



      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span>联系电话：</td>
        <td><?php echo ($UserTel); ?></td>
      </tr>
      <tr>
            <td height="30" align="right">申请级别：</td>
            <td><?php echo ($uarray[$u_level]); ?></td>
      </tr>

       <tr>
            <td height="30" align="right">注册金额：</td>
            <td><?php echo ($money); ?></td>
      </tr>
      <tr>
            <td height="30" align="right">单数：</td>
            <td><?php echo ($f4); ?></td>
      </tr>

   <!--    <tr>
            <td height="30" align="right">折算金额：</td>
            <td><?php echo ($money_j); ?></td>
      </tr> -->
<!-- 
	   <tr>
        <td height="30" colspan="2" style="height:5px;"><hr></td>
      </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span>收货人姓名：</td>
        <td><?php echo ($us_name); ?></td>
        </tr>
      <tr>
        <td height="30" align="right">收货地址：</td>
        <td><?php echo ($us_address); ?></td>
        </tr>
      <tr>
        <td height="30" align="right"><span class="zc_hong">*</span>收货人电话：</td>
        <td><?php echo ($us_tel); ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
        <table width="90%" class="tab3" border="0" cellpadding="3" cellspacing="1" id="tb1" bgcolor="#b9c8d0">
          <tr align="center" class="size14">
            <th width="25%" nowrap height="25">产品名称</th>
            <th width="25%" nowrap>产品价格</th>
            <th width="25%" nowrap>数量</th>
            <th width="25%" nowrap>总金额</th>
          </tr>
          <?php if(is_array($cparray)): $i = 0; $__LIST__ = $cparray;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">
            <td nowrap height="22"><?php echo ($vo["name"]); ?><input type="hidden" name="uid[]" value="<?php echo ($vo["id"]); ?>"/></td>
            <td nowrap><?php echo ($vo["a_money"]); ?></td>
            <td nowrap><?php echo ($vo["buynub"]); ?><input name="shu<?php echo ($vo["id"]); ?>" type="hidden" value="<?php echo ($vo["buynub"]); ?>"/></td>
            <td nowrap><?php echo ($vo['buynub']*$vo['a_money']); ?></td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
          <tr align="center">
            <td nowrap height="22" colspan="3" align="right">合计：</td>
            <td nowrap><?php echo ($cpmoney); ?></td>
          </tr>
        </table>
        </td>
      </tr> -->
	  
      <tr>
        <td height="30" align="right">
        <input name="shopid" type="hidden" id="shopid" value="<?php echo ($shopid); ?>" class="ipt"/>
        <input name="RID" id="RID" type="hidden" value="<?php echo ($RID); ?>" class="ipt"/>
        <input name="FID" id="FID" type="hidden"  value="<?php echo ($FID); ?>" class="ipt"/>
        <input name="f4" id="f4" type="hidden"  value="<?php echo ($f4); ?>" class="ipt"/>
        <input name="UserID" id="UserID" type="hidden"  value="<?php echo ($UserID); ?>" class="ipt"/>
        <input name="TPL" id="TPL" type="hidden"  value="<?php echo ($TPL); ?>" class="ipt"/>
        <input name="Password" type="hidden" class="ipt"  id="Password" value="<?php echo ($Password); ?>"/>
        <input name="PassOpen" type="hidden" class="ipt"  id="PassOpen" value="<?php echo ($PassOpen); ?>"/>
        <input name="wenti" type="hidden" class="ipt"  id="wenti" value="<?php echo ($wenti); ?>"/>
        <input name="wenti_dan" type="hidden" class="ipt"  id="wenti_dan" value="<?php echo ($wenti_dan); ?>"/>
		
		<input name="lang" type="hidden" class="ipt"  id="lang" value="<?php echo ($lang); ?>"/>
        <input name="countrys" type="hidden" class="ipt"  id="countrys" value="<?php echo ($countrys); ?>"/>
		
		
        
        <input name="nickname" type="hidden" class="ipt"  id="nickname" value="<?php echo ($nickname); ?>"/>
        <input name="BankName" type="hidden" class="ipt"  id="BankName" value="<?php echo ($BankName); ?>"/>
        <input name="BankCard" type="hidden" class="ipt"  id="BankCard" value="<?php echo ($BankCard); ?>"/>
        <input name="UserName" type="hidden" class="ipt"  id="UserName" value="<?php echo ($UserName); ?>"/>
        
        <input name="BankProvince" type="hidden" class="ipt"  id="BankProvince" value="<?php echo ($BankProvince); ?>"/>
        <input name="BankCity" type="hidden" class="ipt"  id="BankCity" value="<?php echo ($BankCity); ?>"/>
        <input name="BankAddress" type="hidden" class="ipt"  id="BankAddress" value="<?php echo ($BankAddress); ?>"/>
        
        <input name="UserCode" type="hidden" class="ipt"  id="UserCode" value="<?php echo ($UserCode); ?>"/>
        <input name="UserAddress" type="hidden" class="ipt"  id="UserAddress" value="<?php echo ($UserAddress); ?>"/>
        <input name="UserEmail" type="hidden" class="ipt"  id="UserEmail" value="<?php echo ($UserEmail); ?>"/>
        <input name="qq" type="hidden" class="ipt"  id="qq" value="<?php echo ($qq); ?>"/>
        <input name="UserTel" type="hidden" class="ipt"  id="UserTel" value="<?php echo ($UserTel); ?>"/>

        <input name="s_province" type="hidden" class="ipt"  id="s_province" value="<?php echo ($s_province); ?>"/>
        <input name="s_city" type="hidden" class="ipt"  id="s_city" value="<?php echo ($s_city); ?>"/>
        <input name="s_county" type="hidden" class="ipt"  id="s_county" value="<?php echo ($s_county); ?>"/>
        
        <input name="u_level" type="hidden" class="ipt"  id="u_level" value="<?php echo ($u_level); ?>"/>

        <input name="youkakName" type="hidden" class="ipt"  id="youkakName" value="<?php echo ($youkakName); ?>"/>
        <input name="YouCard" type="hidden" class="ipt"  id="YouCard" value="<?php echo ($YouCard); ?>"/>
		
		<input name="us_name" type="hidden" class="ipt"  id="us_name" value="<?php echo ($us_name); ?>"/>
        <input name="us_address" type="hidden" class="ipt"  id="us_address" value="<?php echo ($us_address); ?>"/>
        <input name="us_tel" type="hidden" class="ipt"  id="us_tel" value="<?php echo ($us_tel); ?>"/>
		
        </td>
        <td><span class="center">
          <input name="submit1" id="Access" type="submit" class="bt_tj" value="注册" />
          &nbsp;&nbsp;
          <input name="back" type="button" class="bt_tj" value="返回上一页" id="back" onclick="history.back(-1);" />
        </span></td>
        </tr>
    </table>
    </form>
    </td>
  </tr>
</table>
</div>
</body>
</html>