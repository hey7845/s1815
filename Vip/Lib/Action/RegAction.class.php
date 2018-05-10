<?php
class RegAction extends CommonAction{
	function _initialize() {
		$this->_inject_check(0);//调用过滤函数
		$this->_Config_name();
		$this->_checkUser();
		header("Content-Type:text/html; charset=utf-8");
	}

	public function add(){
		
		$this->display('add');
	}
	  public function adduserdd(){
      $fck = M ('fck');
      $field = 'id,user_id,p_level,p_path';
      $re_rs = $fck ->where('is_pay>0')->order('p_level asc,id asc')->field($field)->select();
      
      foreach($re_rs as $vo){
        $faid=$vo['id'];
        $count = $fck->where("is_pay>0 and father_id=".$faid)->count();

        if ( is_numeric($count) == false){
          $count = 0;
        }

        if ($count<2){
          $father_id=$vo['id'];
          $father_name=$vo['user_id'];
          $TreePlace=$count;
          $p_level=$vo['p_level']+1;
          $p_path=$vo['p_path'].$vo['id'].',';
          $u_pai=$vo['u_pai']*2+$TreePlace;
    
          $arry=array();
          $arry['father_id']=$father_id;
          $arry['father_name']=$father_name;
          $arry['treeplace']=$TreePlace;
          $arry['p_level']=$p_level;
          $arry['p_path']=$p_path;
         
          return $arry;
          break;
        }
      }
    }
	/**
	 * 会员注册
	 * **/
	public function users($Urlsz=0){
		$this->_checkUser();
	
		$data=$this->adduserdd();
		
		$fck = M('fck');
		$fee = M ('fee');
		$RID = (int) $_GET['RID'];
		$FID = (int) $_GET['FID'];
		$TP = (int) $_GET['TPL'];
		if (empty($TPL))$TPL = 0;
		$TPL = array();
		for($i=0;$i<5;$i++){
			$TPL[$i] = '';
		}
		$TPL[$TP] = 'selected="selected"';
		
		// print_r($data);die;
		//===报单中心
		$zzc = array();
		$where = array();
		$where['id'] = $_SESSION[C('USER_AUTH_KEY')];
		$field ='user_id,is_agent,agent_cash,shop_name';
		$rs = $fck ->where($where)->field($field)->find();
		$money = $rs['agent_cash'];
		$mmuserid = $rs['user_id'];
		if ($rs['is_agent'] >= 2){
			$zzc[1] = $rs['user_id'];
		}else{
			$mrs = M('fck')->where('id=1')->field('id,user_id')->find();
			$zzc[1] = $mrs['user_id'];
		}
		$this->assign('myid',$_SESSION[C('USER_AUTH_KEY')]);

		//===招商代表
		$where['id'] = $RID;
		$field ='user_id,is_agent';
		$rs = $fck ->where($where)->field($field)->find();
		if ($rs){
			$zzc[2] = $rs['user_id'];
		}else{
			$zzc[2] = $mmuserid;
		}
		//$zzc[2] = $mmuserid;
		//===接点人
		

		$where['id'] = $FID;
		$field ='user_id,is_agent';
		$rs = $fck ->where($where)->field($field)->find();
		if ($rs){
			$zzc[3] = $rs['user_id'];
		}else{
			$zzc[3] =$data['father_name'];
		}

		$arr = array();
		$arr['UserID'] = $this->_getUserID();
		$this->assign('flist',$arr);

		$pwhere = array();
		$product = M ('product');
		$pwhere['is_reg'] = array("eq",1);
		$prs = $product->where($pwhere)->select();
		$this->assign('plist',$prs);



		$fee_s = $fee->field('*')->find();
		$s9 = $fee_s['s9'];
		$s9 = explode('|',$s9);
		$s2 = explode('|',$fee_s['s2']);

		$i4 = $fee_s['i4'];
		if ($i4==0){
			$openm=1;
		}else{
			$openm=0;
		}
		$youka = explode('|',$fee_s['str17']);
		//输出银行
		$bank = explode('|',$fee_s['str29']);
		//输出级别名称
        $Level = explode('|',C('Member_Level'));
		//输出注册单数
		$Single = explode('|',C('Member_Single'));
		//输出一单的金额
		
		$lang= explode('|',$fee_s['str24']);
		$countrys = explode('|',$fee_s['str25']);

		$wentilist = explode('|',$fee_s['str99']);
		$region = M('region');
		$dizhi=$region->where('pid=1')->select();
		$this->assign('s9',$s9);
		$this->assign('s2',$s9);
		$this->assign('openm',$openm);
		$this->assign('youka',$youka);
		$this->assign('bank',$bank);
        $this->assign('Level',$Level);
		$this->assign('Single',$Single);
		$this->assign('Money',$fee_s['s2']);
		$this->assign('Money1',$money);
		$this->assign('wentilist',$wentilist);

		$this->assign('dizhi', $dizhi);
		
		$this->assign('lang',$lang);
		$this->assign('countrys',$countrys);

		unset($bank,$Level,$Level,$data);

	    $this->assign('TPL',$TPL);
		$this->assign('zzc',$zzc);

		unset($fck,$TPL,$where,$field,$rs,$data_temp,$temp_rs,$rs);
	if (!empty($_SERVER['HTTP_X_REQUESTED_WITH'])) {
        $mm=!empty($_POST['id'])?$_POST['id']:0;
        $dizhi=$region->where('pid='.$mm)->select();
        $sk=json_encode($dizhi);
        echo $sk;
      die;
}
		$this->display('users');
	}
	
	/**
	 * 注册确认
	 * **/
	public function usersConfirm() {
		$this->_checkUser();
		$region = M('region');
		$id = $_SESSION[C('USER_AUTH_KEY')];
		$fck    = M ('fck');
		$rs = $fck -> field('is_pay,agent_cash') -> find($id);
		if($rs['is_pay'] == 0){
			$this->error('临时会员不能注册会员！');
			exit;
		}
		if (strlen($_POST['UserID'])<1){
			$this->error('会员编号不能少！');
			exit;
		}
		 
		 
			
		// if (empty($_POST['s_province'])){
		// 	$this->error('请选择省份！');
		// 	exit;
		// }
		// if (empty($_POST['s_city'])){
		// 	$this->error('请选择城市！');
		// 	exit;
		// }
		// if (empty($_POST['s_county'])){
		// 	$this->error('请选择区、县');
		// 	exit;
		// }
		
		
		$this->assign('UserID',$_POST['UserID']);

		$data = array();  //创建数据对象
		$shopid = trim($_POST['shopid']);  //所属报单中心帐号
		if (empty($shopid)){
			$this->error('请输入报单中心编号！');
			exit;
		}
		//检测招商代表
		$RID = trim($_POST['RID']);  //获取推荐会员帐号
		$mapp  = array();
		$mapp['user_id']	= $RID;
		$mapp['is_pay']	    = array('gt',0);
		$authInfoo = $fck->where($mapp)->field('id,user_id,re_level,re_path,is_agent,l,r')->find();
		if ($authInfoo){
		    $this->assign('RID',$RID);
		    $data['re_id'] = $authInfoo['id'];
		}else{
		    $this->error('推荐人不存在！');
		    exit;
		}
		unset($mapp);
		
		$smap = array();
		$smap['user_id'] = $shopid;
		$smap['is_agent'] = array('gt',1);
		$shop_rs = $fck->where($smap)->field('id,user_id')->find();
		if (!$shop_rs){
			$this->error('没有该报单中心！');
			exit;
		}else{
		    // 如果报单中心与推荐人相等
    	    if ($authInfoo['id'] == $shop_rs['id'] && $authInfoo['is_agent'] == 2) {
    	        $this->assign('shopid',$shopid);
    	    } else {
    	        $spResult = $fck->where('p_path like "%,' . $shop_rs['id'] . ',%" and is_pay=1 and id = '.$authInfoo['id'])->find();
    	        if (!$spResult) {
    	            $this->error('请填写网体上级的报单中心！');
    	            exit;
    	        }
    	        $this->assign('shopid',$shopid);
    	    }
		}
		unset($smap,$shop_rs,$shopid);

 		// 根据左右区人数判断滑落地点
		$FID = $this->positionRecuision($authInfoo['id'],$authInfoo['user_id'],$authInfoo['l'],$authInfoo['r']);
 		$mappp  = array();
 		$mappp['user_id'] = $FID['user_id'];
 		$authInfoo = $fck->where($mappp)->field('id,p_path,p_level,user_id,is_pay,tp_path')->find();
 		if ($authInfoo){
 			$this->assign('FID',$FID);
 			$fatherispay = $authInfoo['is_pay'];
 			$data['father_id'] = $authInfoo['id'];                        //上节点ID
 			$tp_path = $authInfoo['tp_path'];
 		}else{
 			$this->error('上级会员不存在！');
 			exit;
 		}
 		unset($authInfoo,$mappp);
  		$TPL = $FID['treeplace'];
 		$where = array();
 		$where['father_id'] = $data['father_id'];
 		$where['treeplace'] = $TPL;
 		$rs = $fck->where($where)->field('id')->find();
 		if ($rs){
 			$this->error('该位置已经注册！');
 			exit;
 		}
 		if($TPL==0){
 			$zy_n = "1区";
 		}elseif($TPL==1){
 			$zy_n = "2区";
 		}elseif($TPL==2){
 			$zy_n = "3区";
 		}else{
 			$TPL = 0;
 			$zy_n = "1区";
 		}
 		$this->assign('zy_n',$zy_n);
 		$this->assign('TPL',$TPL);

//  		if($fatherispay==0&&$TPL>0){
//  			$this->error('接点人开通后才能在此位置注册！');
//  			exit;
//  		}

		// $renn = $fck->where('re_id='.$data['re_id'].' and is_pay=0 and treeplace=0')->count();
		// if($renn==1){
		// 		$this->error('左区开通之后才能在右区注册！');
		// 		exit;
			
			
		// }
		// if($renn<1){
		// 	$tjnn = $renn+1;
		// 	if($renn==0){
		// 		$oktp = 0;
		// 		$errtp = "左区";
		// 	}
		// 	$zz_id = $this->pd_left_us($data['re_id'],$oktp);
		// 	$zz_rs = $fck->where('id='.$zz_id)->field('id,user_id')->find();
		// 	if($zz_id!=$data['father_id']){
		// 		$this->error('推荐第'.$tjnn.'人必须放在'.$zz_rs['user_id'].'的'.$errtp.'！');
		// 		exit;
		// 	}
		// 	if($TPL!=$oktp){
		// 		$this->error('推荐第'.$tjnn.'人必须放在'.$zz_rs['user_id'].'的'.$errtp.'！');
		// 		exit;
		// 	}
		// }
		unset($rs,$where,$TPL);

		$fwhere = array();//检测帐号是否存在
		$fwhere['user_id'] = trim($_POST['UserID']);
		$frs = $fck->where($fwhere)->field('id')->find();
		if ($frs){
			$this->error('该会员编号已存在！');
			exit;
		}
		$kk = stripos($fwhere['user_id'],'-');
		if($kk){
			$this->error('会员编号中不能有扛(-)符号！');
			exit;
		}
		unset($fwhere,$frs);

		$errmsg="";
		if(empty($_POST['wenti_dan'])){
			$errmsg.="<li>密保答案不能为空！</li>";
		}
		$this->assign('wenti_dan',$_POST['wenti_dan']);
		
// 		if(empty($_POST['lang'])){
// 			$errmsg.="<li>语言不能为空！</li>";
// 		}
// 		$this->assign('lang',$_POST['lang']);
		
// 		if(empty($_POST['countrys'])){
// 			$errmsg.="<li>国家不能为空！</li>";
// 		}
		$this->assign('countrys',$_POST['countrys']);
		
		
		if(empty($_POST['BankCard'])){
			$errmsg.="<li>银行卡号不能为空！</li>";
		}
		$this->assign('BankCard',$_POST['BankCard']);

		$huhu=trim($_POST['UserName']);
		if(empty($huhu)){
			$errmsg.="<li>请填写开户姓名！</li>";
		}
		$this->assign('UserName',$_POST['UserName']);
		$this->assign('UserName',$_POST['UserName']);
		if(empty($_POST['UserCode'])){
			$errmsg.="<li>请填写身份证号码！</li>";
		}
		
		if(empty($_POST['UserTel'])){
			$errmsg.="<li>请填写电话号码！</li>";
		}
		$this->assign('UserTel',$_POST['UserTel']);
		if(empty($_POST['qq'])){
			$errmsg.="<li>请填写支付宝！</li>";
		}
		if(empty($_POST['f4'])){
			$errmsg.="<li>请填写单数</li>";
		}
		$this->assign('qq',$_POST['qq']);
// 		if(empty($_POST['UserEmail'])){
// 			$errmsg.="<li>请填写您的邮箱地址，找回密码时需使用！</li>";
// 		}
		$this->assign('UserEmail',$_POST['UserEmail']);
		$usercc=trim($_POST['UserTel']);	
		if(!preg_match("/^1[34578]\d{9}$/",$_POST['UserTel'])){
			$this->error('手机号码格式不正确！');
			exit;
		}	
		$count_pho=$fck->where("is_pay>0 and user_tel=".$usercc)->count();
		// if($count_pho>=3){
		// 	$this->error("同一个手机号码最多只能注册3个账号");
		// 	exit;
		// }
		$usercc=trim($_POST['UserCode']);
		if(!preg_match("/\d{17}[\d|X]|\d{15}/", $_POST['UserCode'])){
			$errmsg.="<li>身份证号码格式不正确！</li>";
		}		
		$count_pho=$fck->where("is_pay>0 and user_code=".$usercc)->count();
		if($count_pho>=1){
			$this->error("同一个身份证号码最多只能注册1个账号");
			exit;
		}
		$this->assign('UserCode',$_POST['UserCode']);

		if(strlen($_POST['Password']) < 1 or strlen($_POST['Password']) > 16 or strlen($_POST['PassOpen']) < 1 or strlen($_POST['PassOpen']) > 16){
			$this->error('密码应该是1-16位！');
			exit;
		}
		if($_POST['Password'] != $_POST['rePassword']){  //一级密码
			$this->error('一级密码两次输入不一致！');
			exit;
		}
		if($_POST['PassOpen'] != $_POST['rePassOpen']){  //二级密码
			$this->error('二级密码两次输入不一致！');
			exit;
		}
		if($_POST['Password'] == $_POST['PassOpen']){  //二级密码
			$this->error('一级密码与二级密码不能相同！');
			exit;
		}
		$this->assign('Password',$_POST['Password']);
		$this->assign('PassOpen',$_POST['PassOpen']);
		
//		if($_POST['BankProvince'] == "请选择"){  //省份
//			$this->error('请选择省份！');
//			exit;
//		}
//		if($_POST['BankCity'] == "请选择"){  //城市
//			$this->error('请选择城市！');
//			exit;
//		}
		
		
		$us_name = $_POST['us_name'];
		$us_address = $_POST['us_address'];
		$us_tel = $_POST['us_tel'];
		$f4 = $_POST['f4'];
		// if(empty($us_name)){
		// 	$errmsg.="<li>请输入收货人姓名！</li>";
		// }
		// if(empty($us_address)){
		// 	$errmsg.="<li>请输入收货地址！</li>";
		// }
		// if(empty($us_tel)){
		// 	$errmsg.="<li>请输入收货人电话！</li>";
		// }
		$this->assign('us_name',$_POST['us_name']);
		$this->assign('us_address',$_POST['us_address']);
		$this->assign('us_tel',$_POST['us_tel']);

		$s_err = "<ul>";
		$e_err = "</ul>";
		if(!empty($errmsg)){
			$out_err = $s_err.$errmsg.$e_err;
			$this->error($out_err);
			exit;
		}


		$uLevel = $_POST['u_level'];

		$this->assign('u_level',$_POST['u_level']);
		$fee  = M ('fee') -> find();
		$s    = $fee['s9'];
		$s10 = explode('|',$fee['s10']);
		$this->assign('uarray',$s10);
		$s9 = explode('|',$fee['s9']);
		
		$u_money = $s9[$uLevel];
		
		//======产品========
		// $product = M ('product');
		// $ydate = time();
		// $cpid = $_POST['uid'];//所以产品的ID
		// if (empty($cpid)){
		// 	$this->error('请选择产品！');
		// 	exit;
		// }
		// $pro_where = array();
		// $pro_where['id'] = array ('in',$cpid);
		// $pro_rs = $product->where($pro_where)->field('id,money,a_money,name')->select();
		// $cpmoney = 0;//产品总价
		// $cparray = array();
		// $txt = "";
		// $cpi = 0;
		// foreach ($pro_rs as $pvo){
		// 	$aa = "shu".$pvo['id'];
		// 	$cc = (int)$_POST[$aa];
		// 	if ($cc >0) {
		// 		$cpmoney = $cpmoney + $pvo['a_money'] * $cc;
		// 		$txt .= $pvo['id'] .',';
		// 		$cparray[$cpi]['id'] = $pvo['id'];
		// 		$cparray[$cpi]['a_money'] = $pvo['a_money'];
		// 		$cparray[$cpi]['name'] = $pvo['name'];
		// 		$cparray[$cpi]['buynub'] = $cc;
		// 		$cpi++;
		// 	}
		// }
		// unset($product,$pro_rs);
		// $this->assign('cparray',$cparray);//产品
		// // if($cpmoney!=$u_money){
		// // 	$this->error('产品金额和级别对不上，请重新选择！');
		// // 	exit;
		// // }
		// $this->assign('cpmoney',$cpmoney);
		//======产品END=====
		$this->assign('money',$u_money);
		$this->assign('f4',$f4);
		$this->assign('s_province',$_POST['s_province']);
		$this->assign('s_city',$_POST['s_city']);
		$this->assign('s_county',$_POST['s_county']);

		$this->assign('youkakName',$_POST['youkakName']);
		$this->assign('YouCard',$_POST['YouCard']);
		
		$this->assign('nickname',$_POST['nickname']);
		$this->assign('BankName',$_POST['BankName']);
		$this->assign('BankProvince',$_POST['BankProvince']);
		$this->assign('BankCity',$_POST['BankCity']);
		$this->assign('BankAddress',$_POST['BankAddress']);
		
		$this->assign('UserAddress',$_POST['UserAddress']);
		$this->assign('qq',$_POST['qq']);
		
		$this->display();

	}
	
	/**
	 * 注册处理
	 * **/
	public function usersAdd() {
		$this->_checkUser();
		$id = $_SESSION[C('USER_AUTH_KEY')];
		$fck    = M ('fck');  //注册表

		$rs = $fck -> field('is_pay,agent_cash') -> find($id);
		$m = $rs['agent_cash'];
		if($rs['is_pay'] == 0){
			$this->error('临时会员不能注册会员！');
			exit;
		}
		if (strlen($_POST['UserID'])<1){
			$this->error('会员编号不能少！');
			exit;
		}

		$data = array();  //创建数据对象
		//检测报单中心
		$shopid = trim($_POST['shopid']);  //所属报单中心帐号
		if (empty($shopid)){
			$this->error('请输入服务中心编号！');
			exit;
		}
		//检测招商代表
		$RID = trim($_POST['RID']);  //获取推荐会员帐号
		$mapp  = array();
		$mapp['user_id']	= $RID;
		$mapp['is_pay']	    = array('gt',0);
		$authInfoo = $fck->where($mapp)->field('id,user_id,re_level,re_path,is_agent,l,r')->find();
		if ($authInfoo){
		    $data['re_path'] = $authInfoo['re_path'].$authInfoo['id'].',';  //推荐路径
		    $data['re_id'] = $authInfoo['id'];                              //招商代表ID
		    $data['re_name'] = $authInfoo['user_id'];                       //招商代表帐号
		    $data['re_level'] = $authInfoo['re_level'] + 1;                 //代数(绝对层数)
		}else{
		    $this->error('招商代表不存在！');
		    exit;
		}
		unset($mapp);
		
		$smap = array();
		$smap['user_id'] = $shopid;
		$smap['is_agent'] = array('gt',1);
		$shop_rs = $fck->where($smap)->field('id,user_id')->find();
		// print_r($shop_rs);die;
		if (!$shop_rs){
			$this->error('没有该报单中心！');
			exit;
		}else{
		    // 如果报单中心与推荐人相等
    	    if ($authInfoo['id'] == $shop_rs['id'] && $authInfoo['is_agent'] == 2) {
    	        $data['shop_id']   = $shop_rs['id'];      //隶属会员中心编号
		        $data['shop_name'] = $shop_rs['user_id']; //隶属会员中心帐号
    	    } else {
    	        $spResult = $fck->where('p_path like "%,' . $shop_rs['id'] . ',%" and is_pay=1 and id = '.$authInfoo['id'])->find();
    	        if (!$spResult) {
    	            $this->error('请填写网体上级的报单中心！');
    	            exit;
    	        }
    	        $data['shop_id']   = $shop_rs['id'];      //隶属会员中心编号
    	        $data['shop_name'] = $shop_rs['user_id']; //隶属会员中心帐号
    	    }
		}
		unset($smap,$shop_rs,$shopid);

        // 根据左右区人数判断滑落地点
		$FID = $this->positionRecuision($authInfoo['id'],$authInfoo['user_id'],$authInfoo['l'],$authInfoo['r']);
 		$mappp  = array();
 		$mappp['user_id'] = $FID['user_id'];
// 		$mappp['is_pay']  = array('gt',0);
 		$authInfoo = $fck->where($mappp)->field('id,p_path,p_level,user_id,is_pay,tp_path')->find();
 		if ($authInfoo){
 			$fatherispay = $authInfoo['is_pay'];
 			$data['p_path'] = $authInfoo['p_path'].$authInfoo['id'].',';  //绝对路径
 			$data['father_id'] = $authInfoo['id'];                        //上节点ID
 			$data['father_name'] = $authInfoo['user_id'];                 //上节点帐号
 			$data['p_level'] = $authInfoo['p_level'] + 1;                 //上节点ID
 			$tp_path = $authInfoo['tp_path'];
 		}else{
 			$this->error('上级会员不存在！');
 			exit;
 		}
 		unset($authInfoo,$mappp);
  		$TPL = $FID['treeplace'];
 		$where = array();
 		$where['father_id'] = $data['father_id'];
 		$where['treeplace'] = $TPL;
 		$rs = $fck->where($where)->field('id')->find();
 		if ($rs){
 			$this->error('该位置已经注册！');
 			exit;
 		}else{
 			$data['treeplace'] = $TPL;
 			if(strlen($tp_path)==0){
 				$data['tp_path'] = $TPL;
 			}else{
 				$data['tp_path'] = $tp_path.",".$TPL;
 			}
 		}

//  		if($fatherispay==0&&$TPL>0){
//  			$this->error('接点人开通后才能在此位置注册！');
//  			exit;
//  		}

		// $renn = $fck->where('re_id='.$data['re_id'].' and is_pay=0 and treeplace=0')->count();
		// if($renn==1){
		// 		$this->error('左区开通之后才能在右区注册！');
		// 		exit;
			
		// }
		// if($renn<1){
		// 	$tjnn = $renn+1;
		// 	if($renn==0){
		// 		$oktp = 0;
		// 		$errtp = "左区";
		// 	}
		// 	$zz_id = $this->pd_left_us($data['re_id'],$oktp);
		// 	$zz_rs = $fck->where('id='.$zz_id)->field('id,user_id')->find();
			// if($zz_id!=$data['father_id']){
			// 	$this->error('推荐第'.$tjnn.'人必须放在'.$zz_rs['user_id'].'的'.$errtp.'！');
			// 	exit;
			// }
			// if($TPL!=$oktp){
			// 	$this->error('推荐第'.$tjnn.'人必须放在'.$zz_rs['user_id'].'的'.$errtp.'！');
			// 	exit;
			// }
		// }
		unset($rs,$where,$TPL);

		$fwhere = array();//检测帐号是否存在
		$fwhere['user_id'] = trim($_POST['UserID']);
		$frs = $fck->where($fwhere)->field('id')->find();
		if ($frs){
			$this->error('该会员编号已存在！');
			exit;
		}
		$kk = stripos($fwhere['user_id'],'-');
		if($kk){
			$this->error('会员编号中不能有扛(-)符号！');
			exit;
		}
		unset($fwhere,$frs);

		$errmsg="";
		if(empty($_POST['wenti_dan'])){
			$errmsg.="<li>密保答案不能为空！</li>";
		}
		if(empty($_POST['BankCard'])){
			$errmsg.="<li>银行卡号不能为空！</li>";
		}
		$huhu=trim($_POST['UserName']);
		if(empty($huhu)){
			$errmsg.="<li>请填写开户姓名！</li>";
		}
		// if(empty($_POST['UserCode'])){
		// 	$errmsg.="<li>请填写身份证号码！</li>";
		// }
		if(empty($_POST['UserTel'])){
			$errmsg.="<li>请填写电话号码！</li>";
		}
		if(empty($_POST['qq'])){
			$errmsg.="<li>请填写支付宝！</li>";
		}
// 		if(empty($_POST['UserEmail'])){
// 			$errmsg.="<li>请填写您的邮箱地址，找回密码时需使用！</li>";
// 		}

		$usercc=trim($_POST['UserTel']);		
		if(!preg_match("/^1[34578]\d{9}$/",$_POST['UserTel'])){
			$this->error('手机号码格式不正确！');
			exit;
		}	
		$count_pho=$fck->where("is_pay>0 and user_tel=".$usercc)->count();
		// if($count_pho>=3){
		// 	$this->error("同一个手机号码最多只能注册3个账号");
		// 	exit;
		// }

		if(strlen($_POST['Password']) < 1 or strlen($_POST['Password']) > 16 or strlen($_POST['PassOpen']) < 1 or strlen($_POST['PassOpen']) > 16){
			$this->error('密码应该是1-16位！');
			exit;
		}
		if($_POST['Password'] == $_POST['PassOpen']){  //二级密码
			$this->error('一级密码与二级密码不能相同！');
			exit;
		}

		$us_name = $_POST['us_name'];
		$us_address = $_POST['us_address'];
		$us_tel = $_POST['us_tel'];
// 		if(empty($us_name)){
// 			$errmsg.="<li>请输入收货人姓名！</li>";
// 		}
// 		if(empty($us_address)){
// 			$errmsg.="<li>请输入收货地址！</li>";
// 		}
// 		if(empty($us_tel)){
// 			$errmsg.="<li>请输入收货人电话！</li>";
// 		}
		
		$this->assign('us_name',$_POST['us_name']);
		$this->assign('us_address',$_POST['us_address']);
		$this->assign('us_tel',$_POST['us_tel']);
		

		$s_err = "<ul>";
		$e_err = "</ul>";
		if(!empty($errmsg)){
			$out_err = $s_err.$errmsg.$e_err;
			$this->error($out_err);
			exit;
		}


		$uLevel = $_POST['u_level'];
		$fee  = M ('fee') -> find();
		$s    = $fee['s9'];
		$s2 = explode('|',$fee['s2']);
		$s9 = explode('|',$fee['s9']);

		// $F4     = $s2[$uLevel];//认购单数
		$F4     = $_POST['f4'];//认购单数
		$ul     = $s9[$uLevel];
		
		//======产品========
		// $product = M ('product');
		// $gouwu = M ('gouwu');
		// $ydate = time();
		// $cpid = $_POST['uid'];//所以产品的ID
		// if (empty($cpid)){
		// 	$this->error('请选择产品！');
		// 	exit;
		// }
		// $pro_where = array();
		// $pro_where['id'] = array ('in',$cpid);
		// $pro_rs = $product->where($pro_where)->field('id,money,a_money,name')->select();
		// $cpmoney = 0;//产品总价
		// $txt = "";
		// foreach ($pro_rs as $pvo){
		// 	$aa = "shu".$pvo['id'];
		// 	$cc = (int)$_POST[$aa];
		// 	if ($cc >0) {
		// 		$cpmoney = $cpmoney + $pvo['money'] * $cc;
		// 		$txt .= $pvo['id'] .',';
		// 	}
		// }
		// unset($pro_rs);
		// if($cpmoney!=$ul){
		// 	$this->error('产品金额和级别对不上，请重新选择！');
		// 	exit;
		// }
		//======产品END=====
		// echo $uLevel;die;
		$Money = explode('|',C('Member_Money'));  //注册金额数组
		//当前日期  
        $sdefaultDate = date("Y-m-d");
        //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期  
        $first=1;  
        //获取当前周的第几天 周日是 0 周一到周六是 1 - 6  
        $w=date('w',strtotime($sdefaultDate));
        //获取本周开始日期，如果$w是0，则表示周日，减去 6 天  
        // $week_start=date('Y-m-d',strtotime("$sdefaultDate -".($w ? $w - $first : 6).' days'));
        $week_strt=strtotime("$sdefaultDate -".($w ? $w - $first : 6).' days');
		$new_userid = $_POST['UserID'];
		$sum=$F4*$ul;
		$data['user_id']             = $new_userid;
		$data['bind_account']        = '3333';
		$data['last_login_ip']       = '';                            //最后登录IP
		$data['verify']              = '0';
		$data['status']              = 1;                             //状态(?)
		$data['type_id']             = '0';
		$data['last_login_time']     = time();                        //最后登录时间
		$data['login_count']         = 0;                             //登录次数
		$data['info']                = '信息';
		$data['name']                = '名称';
		$data['password']            = md5(trim($_POST['Password']));  //一级密码加密
		$data['passopen']            = md5(trim($_POST['PassOpen']));  //二级密码加密
		$data['pwd1']                = trim($_POST['Password']);       //一级密码不加密
		$data['pwd2']                = trim($_POST['PassOpen']);       //二级密码不加密

		$data['wenti']				= trim($_POST['wenti']);  //密保问题
		$data['wenti_dan']			= trim($_POST['wenti_dan']);  //密保答案
		
		$data['lang']           = $_POST['lang'];             //语言
		$data['countrys']           = $_POST['countrys']; //国家

		$data['bank_name']           = $_POST['BankName'];             //银行名称
		$data['bank_card']           = $_POST['BankCard'];             //帐户卡号
		$data['user_name']           = $_POST['UserName'];             //姓名
		$data['nickname']			  = $_POST['nickname'];//$_POST['nickname'];  //昵称
		$data['bank_province']       = $_POST['BankProvince'];  //省份
		$data['bank_city']           = $_POST['BankCity'];      //城市
		$data['bank_address']        = $_POST['BankAddress'];          //开户地址
		//$data['user_post']           = $_POST['UserPost']; 		   //
		$data['user_code']           = $_POST['UserCode'];             //身份证号码
		$data['user_address']        = $_POST['UserAddress'];          //联系地址
		$data['email']               = $_POST['UserEmail'];            //电子邮箱
		$data['qq']              	 = $_POST['qq'];            	   //qq
		$data['user_tel']            = $_POST['UserTel'];              //联系电话
		$data['s_province']            = $_POST['s_province'];
		$data['s_city']            = $_POST['s_city'];
		$data['s_county']            = $_POST['s_county'];

		$data['youname']            = $_POST['youkakName'];
		$data['youcar']            = $_POST['YouCard'];

		$data['is_pay']              = 0;                              //是否开通
		$data['vip4']              = 1; 
		$data['rdt']                 = time();                         //注册时间
		//$data['pdt']                 = time();
		$data['u_level']             = $uLevel+1;                      //注册等级
		$data['cpzj']                = $sum;                          //注册金额
		$data['_times']                  = $sdefaultDate;							//单量
		$data['f4']                  = $F4;							//单量
		$data['wlf']                 = 0;                             
		$data['is_fh']                 = 1;                              
		$data['is_sf']                 = 1;                            
		$result = $fck->add($data);

		unset($data,$fck);
		if($result) {
			
			// //======产品========
			// $where1['id'] = array ('in',$txt.'0');
			// $rs1 = $product->where($where1)->select();
			// foreach ($rs1 as $b) {
			// 	$id = $b['id'];
			// 	$cpid = $b['id'];
			// 	$aa1 = "shu" . $b['id'];
			// 	$cc1 = (int)$_POST[$aa1];
			// 	if ($cc1 > 0) {
			// 		$hy1 = $b['a_money'];
			// 		$p1 = $hy1 * $cc1;
			
			// 		$gwd = array();
			// 		$gwd['uid'] = $result;
			// 		$gwd['user_id'] = $new_userid;
			// 		$gwd['did'] = $cpid;
			// 		$gwd['lx'] = 0;
			// 		$gwd['ispay'] = 0;
			// 		$gwd['pdt'] = time();
			// 		$gwd['money'] = $hy1;
			// 		$gwd['shu'] = $cc1;
			// 		$gwd['cprice'] = $p1;
			// 		$gwd['us_name'] = $us_name;
			// 		$gwd['us_address'] = $us_address;
			// 		$gwd['us_tel'] = $us_tel;
			// 		$gouwu->add($gwd);
			// 		unset($gwd);
			// 	}
			// }
			// unset($product,$gouwu,$rs1);
			// ======产品END=====
			
			M('fee')->query("update __TABLE__ set us_num=us_num+1");

			$_SESSION['new_user_reg_id'] = $result;

			echo "<script>window.location='".__URL__."/users_ok/';</script>";
			exit;
		}else{
			$this->error('会员注册失败！');
			exit;
		}
	}
	
	/**
	 * 注册完成
	 * **/
	public function users_ok(){
		$this->_checkUser();
		$gourl = __APP__."/Reg/users/";
		if(!empty($_SESSION['new_user_reg_id'])){

			$fck = M('fck');
			$fee_rs = M ('fee') -> find();

			$this -> assign('s8',$fee_rs['s8']);
			$this -> assign('alert_msg',$fee_rs['str28']);
			$this -> assign('s17',$fee_rs['s17']);

			$myrs = $fck->where('id='.$_SESSION['new_user_reg_id'])->find();
			$this->assign('myrs',$myrs);

			$this->assign('gourl',$gourl);
			unset($fck,$fee_rs);
			$this->display();
		}else{
			echo "<script>window.location='".$gourl."';</script>";
			exit;
		}
	}
	
	
	
	//前台注册
	public function us_reg(){
		$fck = M ('fck');
		$fee = M ('fee');
		$reid = (int)$_GET['rid'];
		
		$fee_rs = $fee->field('s2,s9,str21,str27,str29,str99')->find();
		$this->assign('fflv',$fee_rs['str21']);
		$this->assign('str27',$fee_rs['str27']);
		$s9 = $fee_rs['s9'];
		$s9 = explode('|',$s9);
		$this->assign('s9',$s9);
		$s2 = explode('|',$fee_rs['s9']);
		$this->assign('s2',$s2);
		$bank = explode('|',$fee_rs['str29']);
		$this->assign('bank',$bank);
		$wentilist = explode('|',$fee_rs['str99']);
		$this->assign('wentilist',$wentilist);
		
		$arr = array();
		$arr['UserID'] = $this->_getUserID();
		$this->assign('flist',$arr);
		
		//检测招商代表
		$where = array();
		$where['id'] = $reid;
		$where['is_pay'] = array('gt',0);
		$field ='id,user_id,nickname,us_img,is_agent,shop_name';
		$rs = $fck ->where($where)->field($field)->find();
		if($rs){
			if(empty($rs['us_img'])){
				$rs['us_img'] = "__PUBLIC__/Images/tirns.jpg";
			}
			if($rs['is_agent']==2){
				$this->assign('shopname',$rs['user_id']);
			}else{
				$shopname = '100000';
				$this->assign('shopname',$shopname);
			}
			$this->assign('rs',$rs);
			$this->assign('reid',$reid);
		}else{
			$shopname = '100000';
			$this->assign('shopname',$shopname);
		}
		$plan = M ('plan');
		$prs = $plan->find(4);
		$this->assign('prs',$prs);
		$this->display();
	}
	
	//前台注册处理
	public function us_regAC() {
		$fck    = M ('fck');  //注册表

		if (strlen($_POST['UserID'])<1){
			$this->error('会员编号不能少！');
			exit;
		}

		$data = array();  //创建数据对象
		
		//检测招商代表
		$RID = trim($_POST['RID']);  //获取推荐会员帐号
		$mapp  = array();
		$mapp['user_id']	= $RID;
		$mapp['is_pay']	    = array('gt',0);
		$authInfoo = $fck->where($mapp)->field('id,user_id,re_level,re_path,p_path,is_agent,l,r')->find();
		if ($authInfoo){
		    $data['re_path'] = $authInfoo['re_path'].$authInfoo['id'].',';  //推荐路径
		    $data['re_id'] = $authInfoo['id'];                              //招商代表ID
		    $data['re_name'] = $authInfoo['user_id'];                       //招商代表帐号
		    $data['re_level'] = $authInfoo['re_level'] + 1;                 //代数(绝对层数)
		}else{
		    $this->error('推荐人不存在！');
		    exit;
		}
		//检测报单中心
		$shopid = trim($_POST['shopid']);  //所属报单中心帐号
		if (empty($shopid)){
			$this->error('请输入报单中心编号！');
			exit;
		}
		$smap = array();
		$smap['user_id'] = $shopid;
		$smap['is_agent'] = array('gt',1);
		$shop_rs = $fck->where($smap)->field('id,user_id')->find();
		if (!$shop_rs){
			$this->error('没有该报单中心！');
			exit;
		}else{
		    // 如果报单中心与推荐人相等
    	    if ($authInfoo['id'] == $shop_rs['id'] && $authInfoo['is_agent'] == 2) {
    	        $data['shop_id']   = $shop_rs['id'];      //隶属会员中心编号
		        $data['shop_name'] = $shop_rs['user_id']; //隶属会员中心帐号
    	    } else {
    	        $spResult = $fck->where('p_path like "%,' . $shop_rs['id'] . ',%" and is_pay=1 and id = '.$authInfoo['id'])->find();
    	        if (!$spResult) {
    	            $this->error('请填写网体上级的报单中心！');
    	            exit;
    	        }
    	        $data['shop_id']   = $shop_rs['id'];      //隶属会员中心编号
    	        $data['shop_name'] = $shop_rs['user_id']; //隶属会员中心帐号
    	    }
    	    
		}
		unset($smap,$shop_rs,$shopid);

        // 根据左右区人数判断滑落地点
		$FID = $this->positionRecuision($authInfoo['id'],$authInfoo['user_id'],$authInfoo['l'],$authInfoo['r']);
		$mappp  = array();
		$mappp['user_id'] = $FID['user_id'];
//		$mappp['is_pay']  = array('gt',0);
		$authInfoo = $fck->where($mappp)->field('id,p_path,p_level,user_id,is_pay,tp_path')->find();
		if ($authInfoo){
			$fatherispay = $authInfoo['is_pay'];
			$data['p_path'] = $authInfoo['p_path'].$authInfoo['id'].',';  //绝对路径
			$data['father_id'] = $authInfoo['id'];                        //上节点ID
			$data['father_name'] = $authInfoo['user_id'];                 //上节点帐号
			$data['p_level'] = $authInfoo['p_level'] + 1;                 //上节点ID
			$tp_path = $authInfoo['tp_path'];
		}else{
			$this->error('上级会员不存在！');
			exit;
		}
		unset($authInfoo,$mappp);
 		$TPL = $FID['treeplace'];
		$where = array();
		$where['father_id'] = $data['father_id'];
		$where['treeplace'] = $TPL;
		$rs = $fck->where($where)->field('id')->find();
		if ($rs){
			$this->error('该位置已经注册！');
			exit;
		}else{
			$data['treeplace'] = $TPL;
			if(strlen($tp_path)==0){
				$data['tp_path'] = $TPL;
			}else{
				$data['tp_path'] = $tp_path.",".$TPL;
			}
		}

// 		if($fatherispay==0&&$TPL>0){
// 			$this->error('接点人开通后才能在此位置注册！');
// 			exit;
// 		}

//		$renn = $fck->where('re_id='.$data['re_id'].' and is_pay>0')->count();
//		if($renn<1){
//			$tjnn = $renn+1;
//			if($renn==0){
//				$oktp = 0;
//				$errtp = "A部门";
//			}
//			$zz_id = $this->pd_left_us($data['re_id'],$oktp);
//			$zz_rs = $fck->where('id='.$zz_id)->field('id,user_id')->find();
//			if($zz_id!=$data['father_id']){
//				$this->error('推荐第'.$tjnn.'人必须放在'.$zz_rs['user_id'].'的'.$errtp.'！');
//				exit;
//			}
//			if($TPL!=$oktp){
//				$this->error('推荐第'.$tjnn.'人必须放在'.$zz_rs['user_id'].'的'.$errtp.'！');
//				exit;
//			}
//		}
		unset($rs,$where,$TPL);

		$fwhere = array();//检测帐号是否存在
		$fwhere['user_id'] = trim($_POST['UserID']);
		$frs = $fck->where($fwhere)->field('id')->find();
		if ($frs){
			$this->error('该会员编号已存在！');
			exit;
		}
		$kk = stripos($fwhere['user_id'],'-');
		if($kk){
			$this->error('会员编号中不能有扛(-)符号！');
			exit;
		}
		unset($fwhere,$frs);

		$errmsg="";
		if(empty($_POST['wenti_dan'])){
			$errmsg.="<li>密保答案不能为空！</li>";
		}
		if(empty($_POST['BankCard'])){
			$errmsg.="<li>银行卡号不能为空！</li>";
		}
		$huhu=trim($_POST['UserName']);
		if(empty($huhu)){
			$errmsg.="<li>请填写开户姓名！</li>";
		}
		if(empty($_POST['UserCode'])){
			$errmsg.="<li>请填写身份证号码！</li>";
		}
		if(empty($_POST['UserTel'])){
			$errmsg.="<li>请填写电话号码！</li>";
		}
		if(empty($_POST['qq'])){
			$errmsg.="<li>请填写QQ号码！</li>";
		}
		if(empty($_POST['f4'])){
			$errmsg.="<li>请填写单数</li>";
		}
// 		if(empty($_POST['UserEmail'])){
// 			$errmsg.="<li>请填写您的邮箱地址，找回密码时需使用！</li>";
// 		}

		$usercc=trim($_POST['UserCode']);

		if(strlen($_POST['Password']) < 1 or strlen($_POST['Password']) > 16 or strlen($_POST['PassOpen']) < 1 or strlen($_POST['PassOpen']) > 16){
			$this->error('密码应该是1-16位！');
			exit;
		}
		if($_POST['Password'] == $_POST['PassOpen']){  //二级密码
			$this->error('一级密码与二级密码不能相同！');
			exit;
		}
		
		
		if($_POST['BankProvince'] == "请选择"){  //省份
			$this->error('请选择省份！');
			exit;
		}
		if($_POST['BankCity'] == "请选择"){  //城市
			$this->error('请选择城市！');
			exit;
		}
		$usercc=trim($_POST['UserCode']);
		if(!preg_match("/\d{17}[\d|X]|\d{15}/", $_POST['UserCode'])){
			$errmsg.="<li>身份证号码格式不正确！</li>";
		}		
		$count_pho=$fck->where("is_pay>0 and user_code=".$usercc)->count();
		if($count_pho>=1){
			$this->error("同一个身份证号码最多只能注册1个账号");
			exit;
		}
		
//		$us_name = $_POST['us_name'];
//		$us_address = $_POST['us_address'];
//		$us_tel = $_POST['us_tel'];
//		if(empty($us_name)){
//			$errmsg.="<li>请输入收货人姓名！</li>";
//		}
//		if(empty($us_address)){
//			$errmsg.="<li>请输入收货地址！</li>";
//		}
//		if(empty($us_tel)){
//			$errmsg.="<li>请输入收货人电话！</li>";
//		}

		$s_err = "<ul>";
		$e_err = "</ul>";
		if(!empty($errmsg)){
			$out_err = $s_err.$errmsg.$e_err;
			$this->error($out_err);
			exit;
		}


		$uLevel = $_POST['u_level'];
		$fee  = M ('fee') -> find();
		$s    = $fee['s9'];
		$s2 = explode('|',$fee['s2']);
		$s9 = explode('|',$fee['s9']);
		$s15 = explode('|',$fee['s15']);

		// $F4     = $s2[$uLevel];//认购单数
		// $ul     = $s9[$uLevel];
		// $gp     = $s9[$uLevel];

		$F4     = $_POST['f4'];//认购单数
		$ul     = $s9[$uLevel];
		$gp     = $s9[$uLevel];

			$Money = explode('|',C('Member_Money'));  //注册金额数组
		//当前日期  
        $sdefaultDate = date("Y-m-d");
        //$first =1 表示每周星期一为开始日期 0表示每周日为开始日期  
        $first=1;  
        //获取当前周的第几天 周日是 0 周一到周六是 1 - 6  
        $w=date('w',strtotime($sdefaultDate));
        //获取本周开始日期，如果$w是0，则表示周日，减去 6 天  
        // $week_start=date('Y-m-d',strtotime("$sdefaultDate -".($w ? $w - $first : 6).' days'));
        $week_strt=strtotime("$sdefaultDate -".($w ? $w - $first : 6).' days');
		$new_userid = $_POST['UserID'];
		$sum=$F4*$ul;
		$data['user_id']             = $new_userid;
		$data['bind_account']        = '3333';
		$data['verify']              = '0';
		$data['status']              = 1;                             //状态(?)
		$data['type_id']             = '0';
		$data['last_login_time']     = time();                        //最后登录时间
		$data['login_count']         = 0;                             //登录次数
		$data['info']                = '信息';
		$data['name']                = '名称';
		$data['password']            = md5(trim($_POST['Password']));  //一级密码加密
		$data['passopen']            = md5(trim($_POST['PassOpen']));  //二级密码加密
		$data['pwd1']                = trim($_POST['Password']);       //一级密码不加密
		$data['pwd2']                = trim($_POST['PassOpen']);       //二级密码不加密

		$data['wenti']				= trim($_POST['wenti']);  //密保问题
		$data['wenti_dan']			= trim($_POST['wenti_dan']);  //密保答案
		
		// $data['lang']           = $_POST['lang'];             //语言
		// $data['countrys']           = $_POST['countrys']; //国家

		$data['bank_name']           = $_POST['BankName'];             //银行名称
		$data['bank_card']           = $_POST['BankCard'];             //帐户卡号
		$data['user_name']           = $_POST['UserName'];             //姓名
		$data['nickname']			  = $_POST['nickname'];//$_POST['nickname'];  //昵称
		$data['bank_province']       = $_POST['BankProvince'];  //省份
		$data['bank_city']           = $_POST['BankCity'];      //城市
		$data['bank_address']        = $_POST['BankAddress'];          //开户地址
		//$data['user_post']           = $_POST['UserPost']; 		   //
		$data['user_code']           = $_POST['UserCode'];             //身份证号码
		// $data['user_address']        = $_POST['UserAddress'];          //联系地址
		$data['email']               = $_POST['UserEmail'];            //电子邮箱
		$data['qq']              	 = $_POST['qq'];            	   //qq
		$data['user_tel']            = $_POST['UserTel'];              //联系电话

		$data['is_pay']              = 0;                              //是否开通
		$data['vip4']              = 1; 
		$data['rdt']                 = time();                         //注册时间
		//$data['pdt']                 = time();
		$data['u_level']             = $uLevel+1;                      //注册等级
		$data['cpzj']                = $sum;                          //注册金额
		$data['_times']                  = $sdefaultDate;							//单量
		$data['f4']                  = $F4;							//单量
		$data['wlf']                 = 0;                             
		$data['is_fh']                 = 1;                              
		$data['is_sf']                 = 1;     
		// print_r($data);die;                       
		$result = $fck->add($data);

		unset($data,$fck);
		if($result) {
			echo "<script>";
			echo "alert('恭喜您注册成功，您的账户编号：".$new_userid."，请及时开通正式会员！');";
			echo "window.location='".__APP__."/Public/login/';";
			echo "</script>";
			exit;
		}else{
			$this->error('会员注册失败！');
			exit;
		}
	}
	// 递归判定位置是否有人注册
	public function positionRecuision($father_id,$father_name,$l = 0,$r = 0){
	    $data = array();
        $reWhere = array();
        $fck = M('fck');
        if ($l <= $r) {
            $reWhere['father_id']	= $father_id;
            $reWhere['treeplace']	= 0;
            $fckL = $fck->where($reWhere)->field('id,user_id,l,r')->find();
            if (!$fckL) {
                $data['user_id'] = $father_name;
                $data['treeplace'] = 0;
                return $data;
            } else {
                $data = $this->positionRecuision($fckL['id'],$fckL['user_id'],$fckL['l'],$fckL['r']);
            }
        } else {
            $reWhere['father_id']	= $father_id;
            $reWhere['treeplace']	= 1;
            $fckR = $fck->where($reWhere)->field('id,user_id,l,r')->find();
            if (!$fckR) {
                $data['user_id'] = $father_name;
                $data['treeplace'] = 1;
                return $data;
            } else {
                $data = $this->positionRecuision($fckR['id'],$fckR['user_id'],$fckR['l'],$fckR['r']);
            }
        }
        return $data;
	}
	
	// 递归检测报单中心
	public function find_shopid($id,$recommend_id,$shop_rs) {
	    $result = array();
	    // 如果报单中心与推荐人相等
	    if ($recommend_id == $user_id) {
	        return $shop_rs;
	    }
	    $result = $fck->where('p_path like "%,' . $id . ',%" and is_pay=1 and is_agent = 2 and id = '.$recommend_id)->find();
	    
	}
	
	//生成会员编号
	private function _getUserID(){
		$fck = M('fck');
//		$fee = M('fee');
//		$fee_rs = $fee->field('us_num')->find(1);
//		$us_num = $fee_rs['us_num'];
//		$first_n = 800000000;
//		$mynn = $first_n+$us_num;
		
		$mynn = ''.rand(1000000,9999999);
		
//		if($us_num<10){
//			$mynn = "00000".$us_num;
//		}elseif($us_num<100){
//			$mynn = "0000".$us_num;
//		}elseif($us_num<1000){
//			$mynn = "000".$us_num;
//		}elseif($us_num<10000){
//			$mynn = "00".$us_num;
//		}elseif($us_num<100000){
//			$mynn = "0".$us_num;
//		}else{
//			$mynn = $us_num;
//		}
		$fwhere['user_id'] = $mynn;
		$frss = $fck->where($fwhere)->field('id')->find();
		if ($frss){
			return $this->_getUserID();
		}else{
			unset($fck,$fee);
			return $mynn;
		}
	}
	
	//判断最左区
	public function pd_left_us($uid,&$tp){
		$fck = M('fck');
		$c_l = $fck->where('father_id='.$uid.' and treeplace='.$tp.'')->field('id')->find();
		if($c_l){
			$n_id = $c_l['id'];
			$tp = 0;
			$ren_id = $this->pd_left_us($n_id,$tp);
		}else{
			$ren_id = $uid;
		}
		unset($fck,$c_l);
		return $ren_id;
	}
	
	//
	public function find_agent(){
		$fck = M('fck');
		$where = "is_agent=2 and is_pay>0";
		$s_echo = '<table width="100%" border="0" cellpadding="0" cellspacing="0" class="tab1"><tr><td>';
		$e_echo = '</td></tr></table>';
		$m_echo = "";
		$c_l = $fck->where($where)->field('user_id,user_name,shop_a')->select();
		foreach($c_l as $ll){
			$m_echo .= "<li><b>".$ll['user_id']."</b>(".$ll['user_name'].")<br>".$ll['shop_a']."</li>";
		}
		unset($fck,$c_l);
		echo $s_echo.$m_echo.$e_echo;
	}
	
	
	
	// 找回密码1
	public function find_pw() {
		$_SESSION['us_openemail']="";
		$this->display('find_pw');
	}

	// 找回密码2
	public function find_pw_s() {
		if(empty($_SESSION['us_openemail'])){
			if(empty($_POST['us_name'])&&empty($_POST['us_email'])) {
				$_SESSION = array();
				$this->display('Public:LinkOut');
				return;
			}
			$ptname=$_POST['us_name'];
			$us_email=$_POST['us_email'];
			$fck = M('fck');
			$rs=$fck->where("user_id='".$ptname."'")->field('id,email,user_id,user_name,pwd1,pwd2')->find();
			if ($rs==false){
				$errarry['err']='<font color=red>注：找不到此会员编号！</font>';
				$this->assign('errarry',$errarry);
				$this->display('find_pw');
			}else{
				if($us_email<>$rs['email']){
					$errarry['err']='<font color=red>注：邮箱验证失败！</font>';
					$this->assign('errarry',$errarry);
					$this->display('find_pw');
				}else{

					$passarr=array();
					$passarr[0]=$rs['pwd1'];
					$passarr[1]=$rs['pwd2'];
					
					$title = '感谢您使用密码找回';
					
					$body="<table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" style=\"font-size:12px; line-height:24px;\">";
					$body=$body."<tr>";
					$body=$body."<td height=\"30\">尊敬的客户:".$rs['user_name']."</td>";
					$body=$body."</tr>";
					$body=$body."<tr>";
					$body=$body."<td height=\"30\">你的账户编号:".$rs['user_id']."</td>";
					$body=$body."</tr>";
					$body=$body."<tr>";
					$body=$body."<td height=\"30\">一级密码为:".$rs['pwd1']."</td>";
					$body=$body."</tr>";
					$body=$body."<tr>";
					$body=$body."<td height=\"30\">二级密码为:".$rs['pwd2']."</td>";
					$body=$body."</tr>";
					$body=$body."此邮件由系统发出，请勿直接回复。<br>";
					$body=$body."</td></tr>";
					$body=$body."<tr>";
					$body=$body."<td height=\"30\" align=\"right\">".date("Y-m-d H:i:s")."</td>";
					$body=$body."</tr>";
					$body=$body."</table>";

					$this->send_email($us_email,$title,$body);

					$_SESSION['us_openemail']=$us_email;
					$this->find_pw_e($us_email);
				}
			}
		}else{
			$us_email=$_SESSION['us_openemail'];
			$this->find_pw_e($us_email);
		}
	}

	// 找回密码3
	public function find_pw_e($us_email) {
		$this->assign('myask',$us_email);
		$this->display('find_pw_s');
	}
	
	public function send_email($useremail,$title='',$body='')
	{

		require_once "stemp/class.phpmailer.php";
		require_once "stemp/class.smtp.php";

		$arra=array();

		$mail = new PHPMailer();
		$mail->IsSMTP();                  // send via SMTP
		$mail->Host  = "smtp.163.com";   // SMTP servers
		$mail->SMTPAuth = true;           // turn on SMTP authentication
		$mail->Username = "yuyangtaoyecn";     // SMTP username     注意：普通邮件认证不需要加 @域名
		$mail->Password = "yuyangtaoyecn666";          // SMTP password
		$mail->From  = "yuyangtaoyecn@163.com";        // 发件人邮箱
		$mail->FromName =  "传奇梦";    // 发件人
		$mail->CharSet  = "utf-8";              // 这里指定字符集！
		$mail->Encoding = "base64";
		$mail->AddAddress("".$useremail."","".$useremail."");    // 收件人邮箱和姓名
		//$mail->AddAddress("119515301@qq.com","text");    // 收件人邮箱和姓名
		$mail->AddReplyTo("".$useremail."","163.com");
		$mail->IsHTML(true);    // send as HTML
		$mail->Subject  = $title; // 邮件主题
		$mail->Body = "".$body."";// 邮件内容
		$mail->AltBody ="text/html";
//		$mail->Send();

		if(!$mail->Send())
		{
		echo "Message could not be sent. <p>";
		echo "Mailer Error: " . $mail->ErrorInfo;
		exit;
		}
		//echo "Message has been sent";
	}

}
?>