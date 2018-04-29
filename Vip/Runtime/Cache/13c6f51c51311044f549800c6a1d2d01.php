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
<script language='javascript'>
 function CheckForm(){
	if(confirm('您确定提现金额 '+document.form1.ePoints.value+' 吗？'))
	{
	  return true;
	}else{
       return false;
    }
}
function yhServer(Ful){
	str = $F(Ful).replace(/^\s+|\s+$/g,"");
	ThinkAjax.send('__URL__/check_CCuser/','ajax=1&userid='+str,'',Ful+'1');
}
</script>
<div class="ncenter_box">
<div class="accounttitle"><h1>提现申请 </h1></div>
<form name="form1" method="post" action="__URL__/frontCurrencyConfirm" onSubmit="{return CheckForm();}">
  <table width="100%" border="0" cellpadding="3" cellspacing="0">
    
      <tr>
        <td>&nbsp;</td>
        <td width="45%">&nbsp;</td>
        <td width="30%">&nbsp;</td>
      </tr>
      <tr>
        <td height="30" align="right">现金币：</td>
        <td colspan="2"><span class="hong"><?php echo ($rs['agent_use']); ?></span></td></tr>
		
	 <!-- <tr>
        <td height="30" align="right">提现账户：</td>
        <td colspan="2"><span class="hong"><?php echo ($rs['agent_xf']); ?></span></td></tr>
		
      <tr> -->
        <td width="25%" height="30">&nbsp;</td>
        <td colspan="2"><span style="color:red;">提现手续费 <?php echo ($menber); ?> %，最低提现金额为 <?php echo ($minn); ?> 。</span></td>
      </tr>
      <tr>
        <td height="30" align="right"><?php echo ($User_namex); ?>：</td>
        <td><input name="UserID" type="text" readonly="readonly" value="<?php echo ($rs['user_id']); ?>"/></td>
        <td></td>
      </tr>
      <tr>
        <td height="30" align="right">提现类型：</td>
        <td>
        <select name="ttype">
        <option value="0">提取现金账户</option>
		<!-- <option value="1">提取现金账户</option> -->
        </select>
        </td>
        <td></td>
      </tr>
       <tr>
        <td height="30" align="right">提现平台：</td>
        <td>
        <select name="type">
        <option value="0">银行卡</option>
        <option value="1">支付宝</option>
        <option value="2">微信</option>
        </select>
        </td>
        <td></td>
      </tr>
      <tr>
        <td height="30" align="right">提现金额：</td>
        <td><input name="ePoints" type="text" id="ePoints" value=""/></td>
        <td></td>
      </tr>
      <tr>
        <td height="30" align="right">&nbsp;</td>
        <td><input type="submit" name="Submit" value="确定提现" class="button_text" /></td>
        <td>&nbsp;</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
  </table></form>
<br />
<table width="100%" class="tab3" border="0" cellpadding="3" cellspacing="1" id="tb1" bgcolor="#b9c8d0">
	<thead>
		<tr>
			<th><span><?php echo ($User_namex); ?></span></th>
			<th><span>提现金额</span></th>
			<th><span>扣手续费</span></th>
			<th><span>实发金额</span></th>
			<!--<th><span>等于人民币</span></th>-->
			<th><span>提现时间</span></th>
			<th><span>提现类型</span></th>
			<th><span>银行卡号</span></th>
            <th><span>提现状态</span></th>
        </tr>
	</thead>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">
    <td><?php echo ($rs['user_id']); ?></td>
    <td><span style="color: #F00;"><?php echo ($vo['money']); ?></span></td>
    <td><?php echo ($vo['x1']); ?> %</span></td>
    <td><span style="color: #F00;"><?php echo ($vo['money_two']); ?></td>
    <!-- <td><?php echo (cx_cname($vo['money_two'])); ?></span></td> -->
    <td><?php echo (date('Y-m-d H:i:s',$vo["rdt"])); ?></td>
    <td><?php if(($vo['t_type']) == "0"): ?>提取现金币<?php else: ?>提取钛宝提现账户<?php endif; ?></td>
    <td><?php echo ($rs['bank_card']); ?></td>
    <td><?php if(($vo['is_pay']) == "0"): ?><span style="color: #FF3300;">未确认</span>
          <!-- |<a id="aa" href="__URL__/frontCurrencyDel/id/<?php echo ($vo['id']); ?>"><span style="color: #0000FF;">删除</span></a> --><?php endif; ?>  
          <?php if(($vo['is_pay']) == "1"): ?>已确认<?php endif; ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td align="center"><?php echo ($page); ?></td>
    </tr>
</table>
</div>
</body>
</html>
<script language="javascript">
new TableSorter("tb1");
</script>