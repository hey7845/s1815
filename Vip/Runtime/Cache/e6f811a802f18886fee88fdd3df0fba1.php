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
<div class="accounttitle"><h1>财务明细&nbsp;&nbsp;[<a href='javascript:history.back()'>返回列表</a>] </h1></div>
<table width="100%" class="tab3" border="0" cellpadding="3" cellspacing="1" id="tb1" bgcolor="#b9c8d0">
	<thead>
		<tr>
			<th <?php if(empty($User_namex)): ?>style="display:none"<?php endif; ?>><span><?php echo ($User_namex); ?></span></th>
			<!--<th><span>名称</span></th>-->
			<th><span>金额</span></th>
			<th><span>时间</span></th>
			<th><span>备注</span></th>
		</tr>
	</thead>
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center" class="content_td">
		<td <?php if(empty($User_namex)): ?>style="display:none"<?php endif; ?>><?php echo ($vo['user_id']); ?></td>
		<!--<td><?php echo ($vo['action_type']); ?></td>-->
		<td class="hong"><?php echo ($vo['epoints']); ?></td>
		<td>
        <?php if(($vo['action_type'] == 3)): if(($vo['act_pdt']) > "0"): echo (date('Y-m-d H:i:s',$vo["act_pdt"])); ?>
        <?php else: ?>
        <?php echo (date('Y-m-d H:i:s',$vo["pdt"])); endif; ?>
        <?php else: ?>
        <?php echo (date('Y-m-d H:i:s',$vo["pdt"])); endif; ?></td>
		<td>
        &nbsp;
         <?php if(($vo['action_type']) == $vo["bz"]): if(($vo['action_type']) == "100"): echo ($s18['0']); endif; ?>
         <?php if(($vo['action_type']) == "1"): echo ($fee_s7[0]); endif; ?>
         <?php if(($vo['action_type']) == "2"): echo ($fee_s7[1]); endif; ?>
         <?php if(($vo['action_type']) == "3"): echo ($fee_s7[2]); endif; ?>
         <?php if(($vo['action_type']) == "4"): echo ($fee_s7[3]); endif; ?>
         <?php if(($vo['action_type']) == "5"): echo ($fee_s7[4]); endif; ?>
         <?php if(($vo['action_type']) == "6"): echo ($fee_s7[5]); endif; ?>
         <?php if(($vo['action_type']) == "7"): echo ($fee_s7[6]); endif; ?>
         <?php if(($vo['action_type']) == "8"): echo ($fee_s7[7]); endif; ?>
         <?php if(($vo['action_type']) == "9"): echo ($fee_s7[8]); endif; ?>
          <?php if(($vo['action_type']) == "10"): echo ($fee_s7[9]); endif; ?>
         <!--<?php if(($vo['action_type']) == "8"): ?>税收<?php endif; ?>
         <?php if(($vo['action_type']) == "9"): ?>报单奖<?php endif; ?>-->
         <?php if(($vo['action_type']) == "18"): ?>奖金提现<?php endif; ?>
         <?php if(($vo['action_type']) == "19"): ?>开通会员<?php endif; ?>
         <?php if(($vo['action_type']) == "20"): ?>货币转账<?php endif; ?>
         <?php if(($vo['action_type']) == "21"): ?>货币充值<?php endif; ?>
         <?php if(($vo['action_type']) == "31"): ?>CQ币交易收入<?php endif; ?>
         <?php else: echo ($vo["bz"]); endif; ?>
        </td>
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
<script>new TableSorter("tb1");</script>