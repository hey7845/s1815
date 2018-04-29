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

<style>
.STYLE1 {color:#F00;}
.STYLE2 {color:#00F;}
</style>
<div class="ncenter_box">
<div class="accounttitle"><h1><?php echo ($title); ?> </h1></div>

<table width="100%" class="tab3" border="0" cellpadding="0" cellspacing="1" bgcolor="#b9c8d0">
  <tr>
    <td width="100%" class="tabletd">
    <form method='post' action="__URL__/adminLogistics">
	<div class="fLeft"><span id="key">查询：<input type="text" name="UserID" title="帐号查询">
	<select name="type">
    <option value="0">全部</option>
    <option value="1">未发货</option>
    <option value="2">已发货</option>
    <option value="3">已确认收货</option>
    </select>
  <input type="submit" name="Submit" value="查 询"  class="btn1"/>
</span></div>
<div  id="searchM" class=" none search cBoth" ></div>
</form>	 </td>
    </tr>
</table>
<form name="form3" method="post" action="__URL__/adminLogisticsAC">
<table width="100%" class="tab3" border="0" cellpadding="0" cellspacing="1" bgcolor="#b9c8d0" id="tb1">
        <tr align="center">
          <th><input type="checkbox" name="chkall" value="checkbox" onclick="CheckAll(this.form)"  class="btn2" id="chkall" /></th>
          <th><span>购货时间</span></th>
          <th><span>发货时间</span></th>
          <th><span>会员编号</span></th>
          <th><span>收货人</span></th>
          <th><span>收货地址</span></th>
          <th><span>电话</span></th>
          <th><span>产品名称</span></th>
          <th><span>数量</span></th>
          <th><span>总价</span></th>
          <th><span>确认发货人</span></th>
		  <th><span>确认收货人</span></th>
          <th><span>状态</span></th>
        </tr>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="content_td lz" align="center">
          <td><input type="checkbox" name="tabledb[]" value="<?php echo ($vo['id']); ?>" class="btn2" /></td>
          <td><?php echo (date('Y-m-d H:i:s',$vo["pdt"])); ?></td>
          <td><?php if(($vo["fhdt"]) > "0"): echo (date('Y-m-d H:i:s',$vo["fhdt"])); endif; ?></td>
          <td><?php echo ($vo['user_id']); ?></td>
          <td><?php echo ($vo['us_name']); ?></td>
          <td><?php echo ($vo['us_address']); ?></td>
          <td><?php echo ($vo['us_tel']); ?></td>
          <td><?php echo ($voo[$vo['did']]); ?></td>
          <td><?php echo ($vo['shu']); ?></td>
          <td><?php echo ($vo['cprice']); ?></td>
          <td><?php echo ($vo['guquan']); ?></td>
		  <td><?php echo ($vo['ccxhbz']); ?></td>
          <td>
          <?php if(($vo['ispay']) == "1"): ?>已确认收货
          <?php else: ?>
          <?php if(($vo['isfh']) == "0"): ?><span class="STYLE1">未发货</span><?php endif; ?>
          <?php if(($vo['isfh']) == "1"): ?><span class="STYLE2">已发货</span><?php endif; endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1" bgcolor="#b9c8d0">
<tr>
    <td>
    <input name="全选" type="button" class="btn1" id="全选" onclick="CheckAll(this.form)" value="全选" />&nbsp;&nbsp;
    <input type="submit" name="action" value="确认发货" onclick="{if(confirm('您确定要给会员发货吗?')){return true;}return false;}" class="btn1" id="action" />&nbsp;&nbsp;
    <input type="submit" name="action" value="确定收货" onclick="{if(confirm('要确定已收到货吗?')){return true;}return false;}" class="btn1" id="action" />&nbsp;&nbsp;
    <!--  <input type="submit" name="action" value="删除" onclick="{if(confirm('确定要删除选中的物流信息吗?')){return true;}return false;}" class="btn1" id="action" />-->
     <input name="button3" type="button" onclick="window.location.href='__URL__/financeDaoChu_MM/'" value="导出Excel表格" class="button_text" />
    </td>
</tr>
</table>
</form>


<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1" bgcolor="#b9c8d0">
    <tr>
    	<td><?php echo ($page); ?></td>
    </tr>
</table>
</div>
</body>
</html>
<script>new TableSorter("tb1");</script>