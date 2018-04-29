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
<div class="accounttitle"><h1>会员管理 </h1></div>
<div><h1>总业绩：<?php echo ($f4_count22); ?> </h1></div>
<form name="form3" method="post" action="__URL__/adminMenberAC">
<table width="100%" class="tab3" border="0" cellpadding="3" cellspacing="1" id="tb1" bgcolor="#b9c8d0">
	<thead>
    <tr align="center">
        <th></th>
        <th><span>会员编号</span></th>
		<th><span>推荐人</span></th>
        <th><span>姓名</span></th>
        <th><span>昵称</span></th>
        <th><span>会员级别</span></th>
        <th><span>联系电话</span></th>
        <th><span>报单中心</span></th>
        <th><span>合伙人</span></th>
        <!-- <th><span>管理员</span></th> -->
        <th><span>实体服务中心</span></th>
        <th><span>开通时间</span></th>
        <th><span>注册金额</span></th>
        <th><span>单数</span></th>
         <th><span>复投单数</span></th>
        <th><span>提现总额</span></th>
       <!--  <th><span>内部认购</span></th>
		<th><span>投资配股</span></th>
		<th><span>买入股票</span></th>
		<th><span>平仓配股</span></th>
		<th><span>赠送股票</span></th> -->
        <th><span>状态</span></th>
     <!--   <th><span>分红</span></th>-->
        <th><span>是否奖金</span></th>
        </tr>
    </thead>
    <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="content_td lz" align="center">
        <td><input type="checkbox" name="tabledb[]" value="<?php echo ($vo['id']); ?>" class="btn2" /></td>
        <td><a href="__URL__/adminuserData/PT_id/<?php echo ($vo['id']); ?>"><?php echo ($vo['user_id']); ?></a></td>
		<td><?php echo ($vo['re_name']); ?></td>
        <td><?php echo ($vo['user_name']); ?></td>
        <td><?php echo ($vo['nickname']); ?></td>
        <td><?php echo ($voo[$vo['u_level']]); ?></td>
        <td><?php echo ($vo['user_tel']); ?></td>
        <td><?php if(($vo['is_agent']) == "2"): ?><span style="color:BLUE;">是</span><?php else: ?>否<?php endif; ?></td>
        <td><?php if(($vo['sh_level']) == "0"): ?>否<?php endif; ?>
            <?php if(($vo['sh_level']) == "1"): ?><span style="color:BLUE;">合伙人</span><?php endif; ?>
        	<?php if(($vo['sh_level']) == "2"): ?><span style="color:BLUE;">市场总监</span><?php endif; ?>
            <?php if(($vo['sh_level']) == "3"): ?><span style="color:BLUE;">市场监理</span><?php endif; ?>
            <?php if(($vo['sh_level']) == "4"): ?><span style="color:BLUE;">市场董事</span><?php endif; ?>
            <?php if(($vo['sh_level']) == "5"): ?><span style="color:BLUE;">全国董事</span><?php endif; ?>
        <td><?php if(($vo['is_aa']) == "1"): ?><span style="color:BLUE;">是</span><?php else: ?>否<?php endif; ?></td>
        <td><?php echo (date('Y-m-d H:i:s',$vo["pdt"])); ?></td>
        <td><?php echo ($vo['cpzj']); ?></td>
          <td><?php echo ($vo['f4']); ?></td>
        <td><?php echo ($vo['is_cc']); ?></td>
        <td><?php echo ($vo['shang_ach']); ?></td>
		<!-- <td><?php echo ($vo['out_gupiao']); ?></td>
		<td><?php echo ($vo['buy_gupiao']); ?></td>
		<td><?php echo ($vo['flat_gupiao']); ?></td>
		<td><?php echo ($vo['give_gupiao']); ?></td> -->
        <td><?php if(($vo['is_lock']) == "0"): ?><span style="color: #FF0000;">未锁定</span><?php else: ?>已锁定<?php endif; if(($vo['is_pay']) == "2"): ?>[空单]<?php endif; ?></td>
        <!--<td><?php if(($vo['is_aa']) == "0"): ?><span style="color: #FF0000;">正常</span><?php else: ?>出局<?php endif; ?></td>-->
        <td><?php if(($vo['is_fenh']) == "0"): ?><span style="color: #FF0000;">开启奖金</span><?php else: ?>关闭奖金<?php endif; ?></td>
        </tr><?php endforeach; endif; else: echo "" ;endif; ?>


<!--<tr style="display:none">
<td colspan="13" align="center"><font color="#FF0000">总业绩： <?php echo ($f4_count); ?></font></td>
</tr>-->
</table>


<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1">
    <tr>
   	  <td width="60%">
      <input name="全选" type="button" class="button_text" id="全选" onclick="CheckAll(this.form)" value="全选" />	  &nbsp;&nbsp;
	  <input type="submit" name="action" value="开启会员" class="button_text" onclick="{if(confirm('确定要开启会员吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="锁定会员" class="button_text" onclick="{if(confirm('确定要锁定会员吗?')){return true;}return false;}">&nbsp;&nbsp;
      <input type="submit" name="action" value="删除会员" class="button_text" onclick="{if(confirm('确定要删除会员吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="开启奖金" class="button_text" onclick="{if(confirm('确定要开启奖金吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="关闭奖金" class="button_text" onclick="{if(confirm('确定要关闭奖金吗?')){return true;}return false;}">&nbsp;&nbsp;
  	  <input type="submit" name="action" value="设为实体服务中心" class="button_text" onclick="{if(confirm('确定要设为实体服务中心吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="解除实体服务中心" class="button_text" onclick="{if(confirm('确定要解除实体服务中心吗?')){return true;}return false;}">&nbsp;&nbsp;
   	  <input type="submit" name="action" value="设为服务中心管理员" class="button_text" onclick="{if(confirm('确定要设为服务中心管理员吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="解除服务中心管理员" class="button_text" onclick="{if(confirm('确定要解除服务中心管理员吗?')){return true;}return false;}">&nbsp;&nbsp;
      <!--<input type="submit" name="action" value="开启打卡奖" class="button_text" onclick="{if(confirm('确定要开启打卡奖吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="关闭打卡奖" class="button_text" onclick="{if(confirm('确定要关闭打卡奖吗?')){return true;}return false;}">&nbsp;&nbsp;-->
    <!--  <input type="submit" name="action" value="开启分红奖" class="button_text" onclick="{if(confirm('确定要开启会员分红奖吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="关闭分红奖" class="button_text" onclick="{if(confirm('确定要关闭会员分红奖吗?')){return true;}return false;}">&nbsp;&nbsp;
      <input type="submit" name="action" value="设为代理商" class="button_text" onclick="{if(confirm('确定要将选中的会员设为代理商吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="取消代理商" class="button_text" onclick="{if(confirm('确定要将选中的会员取消代理商资格吗?')){return true;}return false;}">&nbsp;&nbsp;-->
	  <!--<input type="submit" name="action" value="设为财务管理" class="button_text" onclick="{if(confirm('确定要将选中的会员设为财务管理吗?')){return true;}return false;}">&nbsp;&nbsp;
      <input type="submit" name="action" value="设为物流管理" class="button_text" onclick="{if(confirm('确定要将选中的会员设为物流管理吗?')){return true;}return false;}">&nbsp;&nbsp;
	  <input type="submit" name="action" value="取消管理员" class="button_text" onclick="{if(confirm('确定要将选中的会员取消管理员资格吗?')){return true;}return false;}">&nbsp;&nbsp;-->
     <!--  <input type="submit" name="action" value="设为报单中心" class="button_text" onclick="{if(confirm('确定要将选中会员设为报单中心吗?')){return true;}return false;}">&nbsp;&nbsp; -->
	  <!--<input type="submit" name="action" value="奖金转注册币" class="button_text" onclick="{if(confirm('确定要将此会员的K币账户全部转为注册币吗?')){return true;}return false;}">--></td>
    </tr>
</table>
<table width="100%" class="tab3_bottom" border="0" cellpadding="0" cellspacing="1">
    <tr>
        <td><?php echo ($page); ?></td>
    </tr>
</table>
</form>
<table width="100%" align="center">
    <tr>
    <td align="center">
    <form method='post' action="__URL__/adminMenber/">搜索会员：<input type="text" name="UserID" title="帐号查询">
    &nbsp;&nbsp;
    <select name="ulevel">
    <option value="0">全部</option>
    <?php if(is_array($voo)): $i = 0; $__LIST__ = $voo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ulv): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"><?php echo ($level[$key-1]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
    </select>
    &nbsp;&nbsp;
    <input type="submit" name="Submit" value="查询"  class="button_text"/>
    &nbsp;
    <input name="button3" type="button" onclick="window.location.href='__URL__/financeDaoChu_MM/'" value="将所有会员导出Excel表格" class="button_text" />
    </form></td>
    </tr>
</table>
<table width="100%" align="center" style="display:none">
    <tr>
    <td align="center"><form method='post' action="__URL__/adminMenber/">搜索会员业绩：
    开始日期：<input name="sNowDate" type="text" id="sNowDate" onFocus="showCalendar(this)" readonly /> 
     &nbsp;结束日期：  <input name="endNowDate" type="text" id="endNowDate" onFocus="showCalendar(this)" readonly />
    
    会员编号 ： <input type="text" name="RID" title="帐号查询">
    <input type="submit" name="Submit" value="查询"  class="button_text"/>
    &nbsp;
    </form></td>
    </tr>
</table>
</div>
</body>
</html>
<script>new TableSorter("tb1");</script>