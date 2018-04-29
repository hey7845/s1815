<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/resource/css/normalize.css" />
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/resource/css/default.css">
	<link href="__PUBLIC__/resource/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/resource/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" />
    <link href="__PUBLIC__/resource/css/site.css" rel="stylesheet" type="text/css" />
	<link href="__PUBLIC__/Css/bootstrap.min.css" rel="stylesheet" />
	<link href="__PUBLIC__/Css/font-awesome.min.css" rel="stylesheet" />
	<link href="__PUBLIC__/Css/animate.min.css" rel="stylesheet" />
	<link href="__PUBLIC__/Css/style.min.css" rel="stylesheet" />
	<script src="__PUBLIC__/resource/js/jquery-1.11.0.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/resource/js/jquery.bootstrap.newsbox.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/resource/js/jquery.bootstrap.newsbox.js" type="text/javascript"></script>
	<script type="text/javascript">
	$(function() {
		$(".demo2").bootstrapNews({
			newsPerPage : 1,
			autoplay : true,
			pauseOnHover : true,
			navigation : false,
			direction : 'down',
			newsTickerInterval : 2500,
			onToDo : function() {
			}
		});
	});
	</script>
<style type="text/css">
.nav > li.active > a {
	color: #ffc729;
}
.nav > li > a {
	color: #ffc729;
	font-weight: 600;
	padding: 14px 20px 14px 25px;
}
.ibox-title{background-color: #ffb749}
.ibox-content{background-color: #ffb749}
.ss{margin-left: 20px;}
img{ border:none;}

.marquee {width:560px;height:260px;overflow:hidden;border:1px solid #333; margin-top:20px;}
.marquee li{ display:inline; float:left; margin-right:12px;}
.marquee li a{ width:230px; height:260px; display:block; float:left; text-align:center; font-size:14px;}
.marquee li a:hove{ text-decoration:none;}
.marquee li img {width:160px; height:160px;}
.marquee li em{font-style: normal; height:24px; line-height:24px; display:block; margin-top:8px;}

</style>
</head>
<body class="gray-bg">
<div class="center_Box">
        <div class="set">
    <div class="bar_cont">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
   
        <tr>
          <th align="right" width="100">推广链接：</th>
    <td colspan="3"><a href="http://<?php echo ($server); ?>/Reg/us_reg/rid/<?php echo ($fck_rs['id']); ?>/" target="_blank">http://<?php echo ($server); ?>/Reg/us_reg/rid/<?php echo ($fck_rs['id']); ?>/</a></td>
          </tr>
        </table>
        </div>
    </div>
</div>
<div class="col-xs-12 margin-top">
	<div class="panel-body">
		<div class="row">
			<ul class='demo2'>
				<?php foreach ($_SESSION['news'] as $key => $value){ ?>
				<li class='news-item'>
					<?php printf($value["title"])?> <a href='__APP__/News/News'>查看更多...</a>
				</li>
				<?php }; ?>
			</ul>
		</div>
	</div>
</div>
	<div class="container">
  <div class="row">
    <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>现金币余额</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['agent_use']); ?></h3>
        </div>
      </div>
    </div> 
   <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>复投币余额</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['agent_xf']); ?></h3>
        </div>
      </div>
    </div>
	<!--
    <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>公益基金</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['agent_cf']); ?></h3>
        </div>
      </div>
    </div> -->
 <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>电子币余额</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['agent_cash']); ?></h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>注册单数</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['f4']); ?></h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>复投单数</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['is_cc']); ?></h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>直推人数</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['re_nums']); ?></h3>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>总分红包</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['f4'] + $fck_rs['is_cc']); ?></h3>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>未出局分红包</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($in_counts); ?></h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>出局分红包</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($out_counts); ?></h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>销售总业绩</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($all_nmoney); ?></h3>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>团队人数</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($all_nn); ?></h3>
        </div>
      </div>
    </div>
    <div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>注册金额</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($fck_rs['cpzj']); ?></h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>会员级别</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins"><?php echo ($voo[$fck_rs['u_level']]); ?></h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>报单中心</h6>
        </div>
        <div class="ibox-content">
          <h3 class="no-margins">
          <?php if(($fck_rs['is_agent']) == "2"): ?>是<?php else: ?>否<?php endif; ?>
          </h3>
        </div>
      </div>
    </div>
	<div class="col-xs-6 col-sm-4">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h6>合伙人级别</h6>
        </div>
        <div class="ibox-content">
          <h4 class="no-margins">
          <?php if(($fck_rs['sh_level']) == "0"): ?>否<?php endif; ?>
          <?php if(($fck_rs['sh_level']) == "1"): ?>合伙人<?php endif; ?>
          <?php if(($fck_rs['sh_level']) == "2"): ?>市场总监<?php endif; ?>
          <?php if(($fck_rs['sh_level']) == "3"): ?>市场监理<?php endif; ?>
          <?php if(($fck_rs['sh_level']) == "4"): ?>市场董事<?php endif; ?>
          <?php if(($fck_rs['sh_level']) == "5"): ?>全国董事<?php endif; ?>
          </h4>
        </div>
      </div>
    </div>
</div>
</div>
</body>
</html>