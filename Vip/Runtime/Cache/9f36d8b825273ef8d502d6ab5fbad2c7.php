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

<script language=javascript src="__PUBLIC__/Js/wpCalendar.js"></script>
<div class="ncenter_box">
<div class="accounttitle"><h1>提现管理 </h1></div>
<!-- 列表显示区域  -->
<form name="form3" method="post" action="__URL__/adminCurrencyAC">
<table width="100%" cellpadding=3 border=0 cellspacing="1" id="tb1" bgcolor="#b9c8d0" class="tab3">
<thead>
    <tr class="content_td" align="center">
        <th >
            <input type="checkbox" name="chkall" value="checkbox" onclick="CheckAll(this.form)"  class="btn2" id="chkall" />
          </th>
        <th nowrap ><span>会员编号</span></th>
        <th nowrap ><span>开户名</span></th>
        <th nowrap ><span>开户银行</span></th>
        <th nowrap ><span>银行账号</span></th>
        <th nowrap ><span>电话号码</span></th>
        <!-- <th nowrap ><span>微信</span></th> -->
        <th nowrap ><span>类型</span></th>
        <th nowrap ><span>提现金额</span></th>
        <th nowrap ><span>实发金额</span></th>
        <th nowrap ><span>具体开户行地址</span></th>
        <th nowrap ><span>提现时间</span></th>
        <th nowrap ><span>状态</span></th>

    </tr>
</thead>
<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">
	<td><input type="checkbox" name="tabledb[]" value="<?php echo ($vo['id']); ?>" class="btn2" /></td>
	<td><?php echo ($vo['user_id']); ?></td>
	<td><?php echo ($vo['user_name']); ?></td>
	<td><?php echo ($vo['bank_name']); ?></td>
	<td><?php echo ($vo['bank_card']); ?></td>
	<td><?php echo ($vo['user_tel']); ?></td>
    <!-- <td></td>
    <td><?php echo ($vo['qq']); ?></td> -->
    <td>
        <?php if(($vo['type']) == "0"): ?>银行卡：<?php echo ($vo['bank_card']); endif; ?>
        <?php if(($vo['type']) == "1"): ?>支付宝：<?php echo ($vo['qq']); endif; ?>
        <?php if(($vo['type']) == "2"): ?>微信：<?php echo ($vo['email']); endif; ?>
    </td>
	<td><span style="color: #F00;"><?php echo ($vo['money']); ?></span></td>
	<td><span style="color: #F00;"><?php echo ($vo['money_two']); ?></span></td>
	<td><?php echo ($vo['bank_address']); ?></td>
	<!--<td><?php if(($vo['t_type']) == "0"): ?>提取K币账户<?php else: ?>提取分红帐户<?php endif; ?></td>-->
	<td><?php echo (date('Y-m-d H:i:s',$vo["rdt"])); ?></td>
	<td><?php if(($vo['is_pay']) == "1"): ?><span style="color: #F00;">已确认</span><?php endif; if(($vo['is_pay']) == "0"): ?><span style="color: #090;">未确认</span><?php endif; ?></td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1">
    <tr>
    	<td width="50%"><input name="全选" type="button" class="button_text" id="全选" onclick="CheckAll(this.form)" value="全选" />	  &nbsp; &nbsp;
	  <input type="submit" name="action" value="确认" class="button_text" onclick="{if(confirm('确定吗?')){return true;}return false;}">
	  &nbsp; &nbsp;
	  <input type="submit" name="action" value="删除" class="button_text" onclick="{if(confirm('确定删除吗?')){return true;}return false;}"> &nbsp; &nbsp;
	  <input name="button3" type="button" onclick="window.location.href='__URL__/DaoChu'" value="导出Excel" class="button_text" />
    &nbsp;&nbsp;&nbsp;
    <input name="button4" type="button" onclick="window.location.href='__URL__/DaoChu1'" value="导出WPS" class="button_text" />&nbsp;&nbsp;&nbsp;总提现金额(未确认)：<?php echo ($alltiqumoney); ?>
    </td>
    </tr>
</table>
</form>
<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1">
	<tr>
		<td align="center"><?php echo ($page); ?></td>
    </tr>
</table>
<table width="600" align="center">
    <tr>
    <td align="center">
    <form method='post' action="__URL__/adminCurrency">
		会员编号：
		    <input name="UserID" type="text"id="UserID" title="帐号查询" maxlength="200" >
		  <input type="submit" name="Submit" value="搜索"  class="button_text"/>
		</form>
    </td>
    </tr>
</table>
</div>
</body>
</html>
<script>new TableSorter("tb1");</script>