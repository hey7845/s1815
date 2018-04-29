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
<div class="accounttitle"><h1>待审核会员 </h1></div>
<form name="form3" method="post" action="__URL__/agentUpLevelConfirm">
<table width="100%" class="tab3" border="0" cellpadding="3" cellspacing="1" id="tb1" bgcolor="#b9c8d0">
	<thead>
    <tr align="center">
        <th></th>
        <th><span>会员编号</span></th>
		<th><span>晋级前</span></th>
        <th><span>晋级后</span></th>
        <th><span>补充差额</span></th>
        <th><span>申请时间</span></th>
        <th><span>确认时间</span></th>
        <th><span>备注</span></th>
        <th><span>状态</span></th>
    </tr>
    </thead>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr align="center">
    	<td>
	    	<?php if(($vo['is_pay']) == "0"): ?><input type="checkbox" name="tabledb[]" value="<?php echo ($vo['id']); ?>" class="btn2" />
	       	<?php else: ?>
	       		<input type="checkbox" disabled = "true" name="tabledb[]" value="<?php echo ($vo['id']); ?>" class="btn2" /><?php endif; ?>
       	</td>
        <td><?php echo ($vo['user_id']); ?></td>
        <td><?php echo ($vo['u_level']); ?></td>
		<td><?php echo ($vo['up_level']); ?></td>
        <td><?php echo ($vo['money']); ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$vo["pdt"])); ?></td>
        
        <td><?php echo ($vo['user_name']); ?></td>
        <td>
        	<?php if(($vo['is_pay']) == "0"): ?><span style="color: #FF0000;">未确认</span>
        	<?php else: ?>已确认<?php endif; ?>
        </td>
    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1">
    <tr>
    	<td>
        <input name="全选" type="button" class="bt_tj" id="全选" onclick="CheckAll(this.form)" value="全选" />
        &nbsp;&nbsp;
        <input type="submit" name="action" value="确认升级" onclick="{if(confirm('您确定要升级会员吗?')){return true;}return false;}" class="bt_tj">
        </td>
    </tr>
</table>
</form>
<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1">
    <tr>
        <td align="center"><?php echo ($page); ?></td>
    </tr>
</table>
</div>
</body>
</html>
<script>new TableSorter("tb1");</script>