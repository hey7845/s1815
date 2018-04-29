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

<script type="text/javascript" src="__PUBLIC__/Js/Ajax/ThinkAjax-1.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/UserJs.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/juyu.js"></script>
<script language="javascript">
function yhServer(Ful,lx){
  var str = $F(Ful).replace(/^\s+|\s+$/g,"");
  var re = /[^(\w){6,20}$]/g;
  str = str.replace(re,"");
  document.getElementById(Ful).value = str;
  if (str != ""){
    if(lx==0){ThinkAjax.send('__APP__/Fck/check_shopid/','ajax=1&shopid='+str,'',Ful+'1');}
    if(lx==1){ThinkAjax.send('__APP__/Fck/check_reid/','ajax=1&reid='+str,'',Ful+'1');}
    if(lx==2){ThinkAjax.send('__APP__/Fck/check_fid/','ajax=1&fid='+str,'',Ful+'1');}
    if(lx==3){ThinkAjax.send('__APP__/Fck/check_userid/','ajax=1&userid='+str,'',Ful+'1');}
  }
}
function guolv(Ful){
  var str = $F(Ful).replace(/^\s+|\s+$/g,"");
  var re = /[^(\w){6,20}$]/g;
  str = str.replace(re,"");
  document.getElementById(Ful).value = str;
}
function ajaxagent(){
  var divp = document.getElementById("showagent");
  if(divp.style.display=="none"){
    var xmlHttp;
    try{
      //FF Opear 8.0+ Safair
      xmlHttp=new XMLHttpRequest();
    }
    catch(e){
      try{
        xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch(e){
        alert("您的浏览器不支持AJAX");
        return false;    
      }
    }
    xmlHttp.onreadystatechange=function(){
      if(xmlHttp.readyState==4){
        var valuet = xmlHttp.responseText;
        document.getElementById("agentall").innerHTML=valuet;
        window.parent.turnHeight('main');
      }
    }
    var url="__URL__/find_agent/";
    url+="/sid/"+Math.random();
    xmlHttp.open("GET",url,true);
    xmlHttp.send(null);
    divp.style.display="block";
  }else{
    divp.style.display="none";
  }
}
</script>

<style>
#agentall{ width:100%;}
#agentall li{ width:230px; float:left; padding:5px; line-height:22px;}
</style>
<div class="ncenter_box">
<div class="accounttitle"><h1>注册</h1></div>
<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tab1">
  <tr>
    <td>
    <form method='post' id="form1" name="form1" action="__URL__/usersConfirm"/>
    <table width="100%" border="0" cellpadding="3" cellspacing="0" class="tab4">
      <tr>
        <td width="20%" align="right"><span class="zc_hong">*</span> 所属服务中心：</td>
        <td width="20%"><input name="shopid" type="text" id="shopid" value="" class="ipt" onKeyUp="guolv(this.name)" /></td>
        <td width="60%"><div id="shopid1" class="info"><div id="0" class="focus_r"><div class="msg_tip">请填写所属服务中心编号</div></div></div></td>
      </tr>
      <tr id="showagent" style="display:none">
        <td align="left" colspan="3"><div id="agentall"></div></td>
      </tr>
      <tr>
        <td width="20%" align="right"><span class="zc_hong">*</span> 推荐人：</td>
        <td width="20%"><input name="RID" id="RID" type="text"  class="ipt" onKeyUp="guolv(this.name)" onFocus="notice('1','')" onBlur="javascript:yhServer(this.name,'1');notice('1','none')" /></td>
        <td width="60%"><div id="RID1" class="info"><div id="1" class="focus_r" style="display:none;"><div class="msg_tip">请填写招商代表。</div></div></div> </td>
      </tr>
      <!--  
      <tr>
        <td align="right"><span class="zc_hong">*</span> 接点人：</td>
        <td><input name="FID" id="FID" type="text"  value="<?php echo ($zzc[3]); ?>" class="ipt" onKeyUp="guolv(this.name)" onFocus="notice('2','')" onBlur="javascript:yhServer(this.name,'2');notice('2','none')" /></td>
        <td><div id="FID1" class="info"><div id="2" class="focus_r" style="display:none;"><div class="msg_tip">请填写接点人。</div></div></div></td>
      </tr>
      -->
      <?php if(empty($User_namex)): else: ?>
      <tr>
        <td align="right"><span class="zc_hong">*</span> 注册姓名：</td>
        <td>
        <input name="UserID" id="UserID" type="text"  value="" class="ipt" onKeyUp="guolv(this.name)" onFocus="notice('3','')" onBlur="javascript:yhServer(this.name,'3');notice('3','none')" />
        </td>
        <td><div id="UserID1" class="info"><div id="3" class="focus_r" style="display:none;"><div class="msg_tip">此会员编号用于登录系统使用。</div></div></div></td>
      </tr><?php endif; ?>
      <?php if(empty($Nick_namex)): else: ?>
      <tr>
        <td align="right"><span class="zc_hong">*</span> <?php echo ($Nick_namex); ?>：</td>
        <td><input name="nickname" type="text" class="ipt" id="nickname" onFocus="notice('9','')"  onblur="notice('9','none')"  onKeyUp="javascript:Null_Full(this.name)" maxlength="10"/></td>
        <td><div id="nickname1" class="info"><div id="14" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的昵称。</div></div></div></td>
      </tr><?php endif; ?>
      <tr>
        <td colspan="3" style="height:5px;"><hr></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span> 一级密码：</td>
        <td><input name="Password" type="password" class="ipt"  id="Password" onFocus="notice('4','')"  onblur="javascript:yhPass(this.name);notice('4','none');" value="1"/></td>
        <td><div id="Password1" class="info"><div id="4" class="focus_r" style="display:none;"><div class="msg_tip">请使用字母加数字或符号的组合密码。</div></div></div></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span> 确认一级密码：</td>
        <td><input name="rePassword" type="password" class="ipt"  id="rePassword" onFocus="notice('5','')"  onblur="javascript:yhrePass(this.name,'Password');notice('5','none')" value="1"/></td>
        <td><div id="rePassword1" class="info"><div id="5" class="focus_r" style="display:none;"><div class="msg_tip">确认一级密码。</div></div></div></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span> 二级密码：</td>
        <td><input name="PassOpen" type="password" class="ipt"  id="PassOpen" onFocus="notice('6','')"  onblur="javascript:yhPass(this.name);notice('6','none')" value="2"/></td>
        <td><div id="PassOpen1" class="info"><div id="6" class="focus_r" style="display:none;"><div class="msg_tip">请使用字母加数字或符号的组合密码。</div></div></div></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span> 确认二级密码：</td>
        <td><input name="rePassOpen" type="password" class="ipt"  id="rePassOpen" onFocus="notice('7','')"  onblur="javascript:yhrePass(this.name,'PassOpen');notice('7','none')" value="2"/></td>
        <td><div id="rePassOpen1" class="info"><div id="7" class="focus_r" style="display:none;"><div class="msg_tip">确认二级密码。</div></div></div></td>
      </tr>
      <tr style="display:none">
        <td align="right"><span class="zc_hong">*</span> 密保问题：</td>
        <td>
        <select name="wenti">
          <?php if(is_array($wentilist)): $i = 0; $__LIST__ = $wentilist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($voo); ?>" <?php if(($key) == "0"): ?>selected<?php endif; ?> ><?php echo ($voo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select></td>
        <td></td>
      </tr>
    
    
      <tr style="display:none">
        <td align="right"><span class="zc_hong">*</span> 密保答案：</td>
        <td><input name="wenti_dan" type="text" class="ipt"  id="wenti_dan" onFocus="notice('wenti_dan1','')"  onblur="notice('wenti_dan1','none')" value="xx" maxlength="255"/></td>
        <td><div id="wenti_dan1" class="info" style="display:none;"><div class="focus_r"><div class="msg_tip">输入密保答案。</div></div></div></td>
      </tr>
      <tr>
        <td colspan="3" style="height:5px;"><hr></td>
      </tr>
    <!-- <tr style="display:none;">
        <td align="right"><span class="zc_hong">*</span> 语言：</td>
        <td><select name="lang">
          <?php if(is_array($lang)): $i = 0; $__LIST__ = $lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($lang[$key]); ?>"><?php echo ($lang[$key]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select></td>
        <td>&nbsp;</td>
      </tr>
     <tr  style="display:none;">
        <td align="right"><span class="zc_hong">*</span> 国家：</td>
        <td><select name="countrys" >
          <?php if(is_array($countrys)): $i = 0; $__LIST__ = $countrys;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($countrys[$key]); ?>"><?php echo ($countrys[$key]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select></td>
        <td>&nbsp;</td>
      </tr>-->
  <!--    <tr>
        <td align="right"><span class="zc_hong">*</span> 油卡类别：</td>
        <td><select name="youkakName" onChange="javasctip:bank_us(this.value);">
          <?php if(is_array($youka)): $i = 0; $__LIST__ = $youka;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($youka[$key]); ?>"><?php echo ($youka[$key]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select></td>
        <td>&nbsp;</td>
      </tr> -->
    <!-- 
      <tr>
        <td align="right"><span class="zc_hong">*</span> <span id="bank_id">油卡卡号</span>：</td>
        <td><input name="YouCard" type="text" class="ipt" id="BankCard" onFocus="notice('8','')"  onblur="notice('8','none')" onKeyUp="javascript:Null_Full(this.name)" value="1" maxlength="19" /></td>
        <td><div id="BankCard1" class="info"><div id="8" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的号码。</div></div></div></td>
      </tr> -->

      <tr>
        <td align="right"><span class="zc_hong">*</span> 开户银行：</td>
        <td><select name="BankName" onChange="javasctip:bank_us(this.value);">
          <?php if(is_array($bank)): $i = 0; $__LIST__ = $bank;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$voo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($bank[$key]); ?>"><?php echo ($bank[$key]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
        </select></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span> <span id="bank_id"><?php if(($bank[0]) == "财付通"): ?>财付通号<?php else: ?>银行卡号<?php endif; ?></span>：</td>
        <td><input name="BankCard" type="text" class="ipt" id="BankCard" onFocus="notice('8','')"  onblur="notice('8','none')" onKeyUp="javascript:Null_Full(this.name)" value="1" maxlength="19" /></td>
        <td><div id="BankCard1" class="info"><div id="8" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的号码。</div></div></div></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span> 开户姓名：</td>
        <td><input name="UserName" type="text" class="ipt"  id="UserName" onFocus="notice('9','')"  onblur="notice('9','none')" onKeyUp="javascript:Null_Full(this.name)" value="1" maxlength="10" /></td>
        <td><div id="UserName1" class="info"><div id="9" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的姓名。</div></div></div></td>
      </tr>
      <tr >
      <td align="right">开户省份：</td>
            <td><select name="BankProvince" id="s1" >
                <option></option>
              </select></td>
            <td>&nbsp;</td>
      </tr>
      <tr >
       <td align="right">开户城市：</td>
            <td><select name="BankCity" id="s2" >
                <option></option>
              </select></td>
            <td>&nbsp;</td>
      </tr>
    
    <!--     <tr>
        <td align="right"><span class="zc_hong">*</span> 开户城市：</td>
        <td><input name="BankCity" type="text" class="ipt"  id="BankCity" onFocus="notice('9','')"  onblur="notice('9','none')" onKeyUp="javascript:Null_Full(this.name)" value="" maxlength="10" /></td>
        <td><div id="UserName1" class="info"><div id="9" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的姓名。</div></div></div></td>
      </tr>
 -->
      <tr>
        <td align="right">详细开户地址：</td>
        <td><input name="BankAddress" type="text" class="ipt" id="BankAddress" value="" /></td>
        <td><div id="BankAddress1" class="info"><div id="10" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的详细开户地址。</div></div></div></td>
      </tr>
       <script language = JavaScript>
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
        <td colspan="3" style="height:5px;"><hr></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span>身份证号：</td>
        <td><input name="UserCode" type="text" class="ipt" id="UserCode" onFocus="notice('11','')"  onblur="notice('11','none')" onKeyUp="javascript:Null_Full(this.name)" value="8888888888888888" maxlength="18" /></td>
        <td><div id="UserCode1" class="info"><div id="11" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的身份证号。</div></div></div></td>
      </tr>


    <!--   <tr  >
            <td align="right">省份：</td>
            <td><select id="s_province" name="s_province"></select>&nbsp;&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr >
            <td align="right">城市：</td>
            <td><select id="s_city" name="s_city" ></select>&nbsp;&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
           <tr>
            <td align="right">区、县：</td>
            <td><select id="s_county" name="s_county"></select></td>
            <td>&nbsp;</td>
          </tr>
      <tr> -->
        <td align="right">联系地址：</td>
        <td><input name="UserAddress" type="text" class="ipt" id="UserAddress" onFocus="notice('12','')"  onblur="notice('12','none')" onKeyUp="javascript:Null_Full(this.name)" value="123" /></td>
        <td><div id="UserAddress1" class="info"><div id="12" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的联系地址。</div></div></div></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span>微信：</td>
        <td><input name="UserEmail" type="text" class="ipt"  id="UserEmail" value="1" /></td>
        <td><div id="UserEmail1" class="info"><div id="15" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的 E-Mail。（找回密码时使用，请认真填写）</div></div></div></td>
      </tr>
      <tr>
        <td align="right">支付宝：</td>
        <td><input name="qq" type="text"  id="qq" class="ipt"  value="1254123" /></td>
        <td><div id="qq1" class="info"><div id="16" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的 Q Q。</div></div></div></td>
      </tr>
      <tr>
        <td align="right"><span class="zc_hong">*</span>联系电话：</td>
        <td><input name="UserTel" type="text" class="ipt"  id="UserTel" onFocus="notice('13','')"  onblur="notice('13','none')" onKeyUp="javascript:Null_Full(this.name)" value="1"/></td>
        <td><div id="UserTel1" class="info"><div id="13" class="focus_r" style="display:none;"><div class="msg_tip">请输入您的联系电话。</div></div></div></td>
      </tr>
       <tr>
            <td align="right">申请级别：</td>
            <td colspan="2">
            <?php if(is_array($s2)): $i = 0; $__LIST__ = $s2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$svo): $mod = ($i % 2 );++$i; if(($key) == "0"): ?><input name="u_level" type="radio" id="radio" value="<?php echo ($key); ?>" checked="checked"  />
            <strong><span class="STYLE3"><?php echo ($s9[$key]); ?> </span></strong>
            <?php else: ?>
            <input name="u_level" type="radio" id="radio" value="<?php echo ($key); ?>"/>
            <strong><span class="STYLE3"><?php echo ($s9[$key]); ?> </span></strong><?php endif; endforeach; endif; else: echo "" ;endif; ?>

            </td>
      </tr>
    <tr>
        <td align="right"><span class="zc_hong">*</span>单数：</td>
        <td><input name="f4" type="text"  id="qq" class="ipt"  value="1" /></td>
        
      </tr>
   <!--  <tr>
        <td colspan="3" align="center">
        
        <table width="90%" class="tab3" border="0" cellpadding="3" cellspacing="1" id="tb1" bgcolor="#b9c8d0">
        
          <tr align="center" class="size14">
            <th width="20%" nowrap height="25">产品编号</th>
            <th width="20%" nowrap height="25">产品名称</th>
            <th width="20%" nowrap>产品价格</th>
            <th width="20%" nowrap>数量</th>
            <th width="20%" nowrap>总金额</th>
          </tr>
        
            <?php if(is_array($plist)): $i = 0; $__LIST__ = $plist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">
              <td nowrap><?php echo ($vo['cid']); ?></td>
              <td nowrap height="22"><?php echo ($vo["name"]); ?></td>
              <td nowrap><?php echo ($vo["a_money"]); ?></td>
              <td nowrap><input name="shu<?php echo ($vo["id"]); ?>" type="text" onKeyUp="he<?php echo ($vo["id"]); ?>.value=this.value*<?php echo ($vo["a_money"]); ?>;value=value.replace(/[^0-9]/g,'');" onClick="this.select()" onblur="{if(this.value=='')this.value=0;}" value="0" size="6" maxlength="5" />
                <input type="hidden" name="uid[]" value="<?php echo ($vo["id"]); ?>"/></td>
              <td nowrap><input name="he<?php echo ($vo["id"]); ?>" type="text" size="6" value="0" readonly /></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        
        </table>
        
        </td>
      </tr> -->
   <!--    <tr>
        <td colspan="3" align="center">
        <table width="90%" class="tab3" border="0" cellpadding="0" cellspacing="1" bgcolor="#b9c8d0">
          <tr>
            <td colspan="2"><span style="padding-left:18%;"><b>请填写收货人信息</b></span></td>
          </tr>
          <tr>
            <td width="20%" align="right"><span class="hong">* </span>收货人姓名：</td>
            <td align="left"><input name="us_name" type="text" id="us_name" maxlength="20" value="1" /></td>
          </tr>
          <tr>
            <td align="right"><span class="hong">* </span>收货地址：</td>
            <td align="left"><input name="us_address" type="text" id="us_address" size="50" maxlength="100" value="2"/></td>
          </tr>
          <tr>
            <td align="right"><span class="hong">* </span>收货人电话：</td>
            <td align="left"><input name="us_tel" type="text" id="us_tel" maxlength="20" value="3"/></td>
          </tr>
        </table>
        </td>
      </tr> -->
      <tr>
        <td align="right">&nbsp;</td>
        <td><span class="center">
          <input name="submit1" id="Access" type="submit" class="button_text" value="注册" />
&nbsp;&nbsp;
<input name="重置" type="reset" class="button_text" value="重置" id="重置" />
        </span></td>
        <td>&nbsp;</td>
      </tr>
    </table>
    </form>
    </td>
  </tr>
</table>

</div>



</body>
</html>