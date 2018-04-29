-- 表的结构: xt_access --
CREATE TABLE `xt_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `module` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  KEY `groupId` (`role_id`) USING BTREE,
  KEY `nodeId` (`node_id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_address --
CREATE TABLE `xt_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `tel` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `moren` int(11) NOT NULL COMMENT '是否为默认地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_bonus --
CREATE TABLE `xt_bonus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `did` int(11) NOT NULL,
  `s_date` int(11) NOT NULL,
  `e_date` int(11) NOT NULL,
  `b0` decimal(12,2) NOT NULL,
  `b1` decimal(12,2) NOT NULL,
  `b2` decimal(12,2) NOT NULL,
  `b3` decimal(12,2) NOT NULL,
  `b4` decimal(12,2) NOT NULL,
  `b5` decimal(12,2) NOT NULL,
  `b6` decimal(12,2) NOT NULL,
  `b7` decimal(12,2) NOT NULL,
  `b8` decimal(12,2) NOT NULL,
  `b9` decimal(12,2) NOT NULL,
  `b11` decimal(12,2) NOT NULL,
  `b12` decimal(12,2) NOT NULL,
  `b10` decimal(12,2) NOT NULL,
  `b13` double(12,2) DEFAULT '0.00',
  `b14` double(12,2) DEFAULT '0.00',
  `b15` double(12,2) DEFAULT '0.00',
  `b16` double(12,2) DEFAULT '0.00',
  `b17` double(12,2) DEFAULT '0.00',
  `b18` double(12,2) DEFAULT '0.00',
  `b19` double(12,2) DEFAULT '0.00',
  `b20` double(12,2) DEFAULT '0.00',
  `b21` double(12,0) DEFAULT '0',
  `encash_l` int(11) NOT NULL,
  `encash_r` int(11) NOT NULL,
  `encash` int(11) NOT NULL,
  `is_count_b` int(11) NOT NULL,
  `is_count_c` int(11) NOT NULL,
  `is_pay` int(11) NOT NULL,
  `u_level` int(11) NOT NULL,
  `type` smallint(2) NOT NULL DEFAULT '0',
  `additional` varchar(50) NOT NULL COMMENT '额外奖',
  `encourage` varchar(50) NOT NULL COMMENT '阶段鼓励奖',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=40054 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_bonus1 --
CREATE TABLE `xt_bonus1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `did` int(11) NOT NULL,
  `s_date` int(11) NOT NULL,
  `e_date` int(11) NOT NULL,
  `b0` decimal(12,2) NOT NULL,
  `b1` decimal(12,2) NOT NULL,
  `b2` decimal(12,2) NOT NULL,
  `b3` decimal(12,2) NOT NULL,
  `b4` decimal(12,2) NOT NULL,
  `b5` decimal(12,2) NOT NULL,
  `b6` decimal(12,2) NOT NULL,
  `b7` decimal(12,2) NOT NULL,
  `b8` decimal(12,2) NOT NULL,
  `b9` decimal(12,2) NOT NULL,
  `b11` decimal(12,2) NOT NULL,
  `b12` decimal(12,2) NOT NULL,
  `b10` decimal(12,2) NOT NULL,
  `b13` double(12,2) DEFAULT '0.00',
  `b14` double(12,2) DEFAULT '0.00',
  `b15` double(12,2) DEFAULT '0.00',
  `b16` double(12,2) DEFAULT '0.00',
  `b17` double(12,2) DEFAULT '0.00',
  `b18` double(12,2) DEFAULT '0.00',
  `b19` double(12,2) DEFAULT '0.00',
  `b20` double(12,2) DEFAULT '0.00',
  `b21` double(12,0) DEFAULT '0',
  `encash_l` int(11) NOT NULL,
  `encash_r` int(11) NOT NULL,
  `encash` int(11) NOT NULL,
  `is_count_b` int(11) NOT NULL,
  `is_count_c` int(11) NOT NULL,
  `is_pay` int(11) NOT NULL,
  `u_level` int(11) NOT NULL,
  `type` smallint(2) NOT NULL DEFAULT '0',
  `additional` varchar(50) NOT NULL COMMENT '额外奖',
  `encourage` varchar(50) NOT NULL COMMENT '阶段鼓励奖',
  `nums` int(11) DEFAULT '0',
  `re_nums` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39556 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_bonushistory --
CREATE TABLE `xt_bonushistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `did` int(11) NOT NULL,
  `d_user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `action_type` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pdt` int(11) NOT NULL,
  `epoints` decimal(12,2) NOT NULL,
  `prep` decimal(12,2) NOT NULL,
  `allp` decimal(12,2) NOT NULL,
  `bz` text COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(1) NOT NULL COMMENT '充值0明细1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_card --
CREATE TABLE `xt_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL DEFAULT '0',
  `buser_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `card_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `card_pw` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `c_time` int(11) NOT NULL DEFAULT '0',
  `f_time` int(11) NOT NULL DEFAULT '0',
  `l_time` int(11) NOT NULL DEFAULT '0',
  `b_time` int(11) NOT NULL DEFAULT '0',
  `is_sell` int(3) NOT NULL DEFAULT '0',
  `is_use` int(3) NOT NULL DEFAULT '0',
  `money` decimal(12,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=150 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_cash --
CREATE TABLE `xt_cash` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bid` int(11) NOT NULL DEFAULT '0',
  `b_user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rdt` int(11) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `money_two` decimal(12,2) NOT NULL,
  `epoint` int(11) NOT NULL DEFAULT '0',
  `is_pay` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_card` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `x1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sellbz` text COLLATE utf8_unicode_ci NOT NULL,
  `s_type` smallint(3) NOT NULL DEFAULT '0',
  `is_buy` int(11) NOT NULL DEFAULT '0',
  `is_out` int(11) NOT NULL DEFAULT '0',
  `bdt` int(11) NOT NULL DEFAULT '0',
  `ldt` int(11) NOT NULL DEFAULT '0',
  `okdt` int(11) NOT NULL DEFAULT '0',
  `bz` text COLLATE utf8_unicode_ci NOT NULL,
  `is_sh` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_cashhistory --
CREATE TABLE `xt_cashhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) NOT NULL,
  `order_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `did` int(11) NOT NULL,
  `d_order_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `action_type` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pdt` int(11) NOT NULL,
  `epoints` decimal(12,2) NOT NULL,
  `allp` decimal(12,2) NOT NULL,
  `bz` text COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(1) NOT NULL COMMENT '充值0明细1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_cashpp --
CREATE TABLE `xt_cashpp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pp_orderid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_order_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `uid` int(11) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bid` int(11) NOT NULL DEFAULT '0',
  `b_user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `rdt` int(11) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `money_two` decimal(12,2) NOT NULL,
  `epoint` int(11) NOT NULL DEFAULT '0',
  `is_pay` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_card` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `x1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sellbz` text COLLATE utf8_unicode_ci NOT NULL,
  `s_type` smallint(3) NOT NULL DEFAULT '0',
  `is_buy` int(11) NOT NULL DEFAULT '0',
  `bdt` int(11) NOT NULL DEFAULT '0',
  `ldt` int(11) NOT NULL DEFAULT '0',
  `okdt` int(11) NOT NULL DEFAULT '0',
  `bz` text COLLATE utf8_unicode_ci NOT NULL,
  `is_sh` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_chongzhi --
CREATE TABLE `xt_chongzhi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_bin NOT NULL,
  `epoint` decimal(12,2) NOT NULL,
  `huikuan` decimal(12,2) NOT NULL,
  `zhuanghao` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `rdt` int(11) NOT NULL,
  `pdt` int(11) NOT NULL DEFAULT '0',
  `is_pay` smallint(2) NOT NULL,
  `stype` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=283 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- <fen> --
-- 表的结构: xt_cody --
CREATE TABLE `xt_cody` (
  `c_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `cody_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_cptype --
CREATE TABLE `xt_cptype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tpname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_id` int(11) NOT NULL DEFAULT '0',
  `s_id` int(11) NOT NULL DEFAULT '0',
  `t_pai` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_fck --
CREATE TABLE `xt_fck` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(64) DEFAULT NULL,
  `bind_account` varchar(50) DEFAULT NULL,
  `new_login_time` int(11) NOT NULL DEFAULT '0',
  `new_login_ip` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `last_login_time` int(11) unsigned DEFAULT '0',
  `last_login_ip` varchar(40) DEFAULT NULL,
  `create_ip` varchar(40) DEFAULT NULL,
  `login_count` mediumint(8) unsigned DEFAULT '0',
  `verify` varchar(32) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `type_id` tinyint(2) unsigned DEFAULT '0',
  `info` text,
  `name` varchar(25) DEFAULT NULL,
  `dept_id` smallint(3) DEFAULT NULL,
  `user_id` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '用户编号',
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '银行开户名',
  `password` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '一级密码',
  `pwd1` varchar(50) DEFAULT NULL COMMENT '一级密码不加密',
  `passopen` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '二级密码',
  `pwd2` varchar(50) DEFAULT NULL COMMENT '二级密码不加密',
  `passopentwo` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL COMMENT '三级密码',
  `pwd3` varchar(50) DEFAULT NULL COMMENT '三级密码不加密',
  `nickname` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '昵称',
  `qq` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'QQ',
  `bank_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '开户银行',
  `bank_card` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '银行卡号',
  `bank_province` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '开户银行所在省',
  `bank_city` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '开户银行所在城市',
  `bank_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '支行地址',
  `user_code` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '身份证',
  `user_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '联系地址',
  `user_post` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '联系方式',
  `user_tel` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '电话',
  `user_phone` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '手机',
  `rdt` int(11) NOT NULL COMMENT '注册时间',
  `treeplace` int(11) DEFAULT NULL COMMENT '区分左(中)右',
  `father_id` int(11) NOT NULL COMMENT '父节点',
  `father_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '父名',
  `re_id` int(11) NOT NULL COMMENT '推荐ID',
  `re_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '推荐人名称',
  `is_pay` int(11) NOT NULL COMMENT '是否开通(0,1)',
  `is_lock` int(11) NOT NULL COMMENT '是否锁定(0,1)',
  `is_lock_ok` int(3) NOT NULL DEFAULT '0',
  `shoplx` int(11) NOT NULL COMMENT '报单中心ID',
  `shop_a` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '//中心所在省',
  `shop_b` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '//中心所在县',
  `is_agent` int(11) NOT NULL COMMENT '报单中心(0,1,2)',
  `agent_max` decimal(12,2) NOT NULL COMMENT '申请报单总金额',
  `agent_use` decimal(12,2) NOT NULL COMMENT '奖金币',
  `agent_zc` decimal(12,2) NOT NULL DEFAULT '0.00',
  `agent_cash` decimal(12,2) NOT NULL COMMENT '报单币',
  `agent_kt` decimal(12,2) NOT NULL DEFAULT '0.00',
  `agent_xf` decimal(12,2) NOT NULL DEFAULT '0.00',
  `agent_cf` decimal(12,2) NOT NULL DEFAULT '0.00',
  `agent_gl` decimal(12,2) NOT NULL DEFAULT '0.00',
  `agent_gp` decimal(12,2) NOT NULL DEFAULT '0.00',
  `agent_sf` decimal(12,2) NOT NULL,
  `agent_sfo` decimal(12,2) DEFAULT '0.00',
  `agent_sfp` decimal(12,2) DEFAULT '0.00',
  `agent_sfw` decimal(12,2) DEFAULT '0.00',
  `gp_num` int(11) NOT NULL DEFAULT '0',
  `agent_lock` decimal(12,2) NOT NULL DEFAULT '0.00',
  `live_gupiao` int(11) NOT NULL DEFAULT '0',
  `in_gupiao` int(11) NOT NULL DEFAULT '0',
  `out_gupiao` int(11) NOT NULL DEFAULT '0',
  `buy_gupiao` int(11) NOT NULL DEFAULT '0',
  `flat_gupiao` int(11) NOT NULL DEFAULT '0',
  `give_gupiao` int(11) NOT NULL DEFAULT '0',
  `yuan_gupiao` int(11) NOT NULL DEFAULT '0',
  `all_gupiao` int(11) NOT NULL DEFAULT '0',
  `tx_num` int(3) NOT NULL DEFAULT '0',
  `lssq` decimal(12,2) NOT NULL,
  `zsq` decimal(12,2) NOT NULL,
  `adt` int(11) NOT NULL COMMENT '申请成报单中心时间',
  `l` int(11) NOT NULL COMMENT '左边总人数',
  `r` int(11) NOT NULL COMMENT '右边总人数',
  `benqi_l` int(11) NOT NULL COMMENT '本期左区新增',
  `benqi_r` int(11) NOT NULL COMMENT '本期右区新增',
  `shangqi_l` int(11) NOT NULL COMMENT '上期左区剩余',
  `shangqi_r` int(11) NOT NULL COMMENT '上期右区剩余',
  `peng_num` int(11) NOT NULL DEFAULT '0',
  `u_level` int(11) DEFAULT NULL COMMENT '等级(会员级别)',
  `u_levels` int(11) DEFAULT '0',
  `is_boss` int(11) NOT NULL COMMENT '管理人为1,其它为0',
  `idt` int(11) NOT NULL,
  `pdt` int(11) NOT NULL COMMENT '开通时间',
  `re_level` int(11) NOT NULL COMMENT '相对于推的代数',
  `p_level` int(11) NOT NULL COMMENT '绝对层数',
  `re_path` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '推荐的路径',
  `p_path` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '自已的路径',
  `tp_path` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_del` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL COMMENT '隶属报单ID',
  `shop_name` varchar(50) NOT NULL,
  `b0` decimal(12,2) NOT NULL COMMENT '每期总资金',
  `b1` decimal(12,2) NOT NULL COMMENT '奖1',
  `b2` decimal(12,2) NOT NULL COMMENT '奖2',
  `b3` decimal(12,2) NOT NULL COMMENT '奖3',
  `b4` decimal(12,2) NOT NULL COMMENT '奖4',
  `b5` decimal(12,2) NOT NULL COMMENT '奖5',
  `b6` decimal(12,2) NOT NULL COMMENT '奖6',
  `b7` decimal(12,2) NOT NULL COMMENT '奖7',
  `b8` decimal(12,2) NOT NULL COMMENT '奖8',
  `b9` decimal(12,2) NOT NULL COMMENT '奖9',
  `b12` decimal(12,2) NOT NULL COMMENT '奖12',
  `b11` decimal(12,2) NOT NULL COMMENT '奖11',
  `b10` decimal(12,2) NOT NULL COMMENT '奖10',
  `wlf` int(11) NOT NULL COMMENT '网络费',
  `wlf_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `cpzj` decimal(12,2) DEFAULT NULL COMMENT '注册金额',
  `zjj` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '总奖金',
  `re_money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '推荐总注册金额',
  `cz_epoint` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '冲值总金额',
  `lr` int(11) NOT NULL COMMENT '中间总单数',
  `shangqi_lr` int(11) NOT NULL COMMENT '中间上期剩余单数',
  `benqi_lr` int(11) NOT NULL COMMENT '中间本期单数',
  `user_type` varchar(200) NOT NULL COMMENT '多线登录限制',
  `re_peat_money` decimal(12,2) NOT NULL COMMENT 'x',
  `re_nums` smallint(4) NOT NULL DEFAULT '0' COMMENT 'x',
  `p_nums` smallint(4) NOT NULL DEFAULT '0',
  `is_path` smallint(4) NOT NULL DEFAULT '0',
  `outnums` smallint(4) NOT NULL DEFAULT '0',
  `sh_level` smallint(4) NOT NULL,
  `sh_one` smallint(4) NOT NULL DEFAULT '0',
  `sh_two` smallint(4) NOT NULL DEFAULT '0',
  `sh_three` smallint(4) DEFAULT '0',
  `sh_four` smallint(4) DEFAULT '0',
  `re_nums_b` int(11) NOT NULL DEFAULT '0',
  `re_nums_l` int(11) NOT NULL DEFAULT '0',
  `re_nums_r` int(11) NOT NULL DEFAULT '0',
  `duipeng` decimal(12,2) NOT NULL,
  `duipeng_p` varchar(255) DEFAULT '',
  `_times` int(11) NOT NULL,
  `fanli` int(11) NOT NULL,
  `fanli_time` int(11) NOT NULL,
  `fanli_num` int(11) NOT NULL,
  `fanli_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `is_fenh` smallint(2) NOT NULL,
  `open` smallint(2) NOT NULL,
  `f4` int(11) DEFAULT '0',
  `new_agent` smallint(1) NOT NULL DEFAULT '0' COMMENT '//是否新服务中心',
  `day_feng` decimal(12,2) NOT NULL DEFAULT '0.00',
  `get_date` int(11) DEFAULT '0',
  `get_numb` int(11) DEFAULT '0',
  `is_jb` int(11) DEFAULT '0',
  `sq_jb` int(11) DEFAULT '0',
  `jb_sdate` int(11) DEFAULT '0',
  `jb_idate` int(11) DEFAULT '0',
  `man_ceng` int(11) NOT NULL DEFAULT '0' COMMENT '//满层数',
  `prem` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '//权限',
  `wang_j` smallint(1) NOT NULL DEFAULT '0' COMMENT '//结构图',
  `wang_t` smallint(1) NOT NULL DEFAULT '0' COMMENT '//推荐图',
  `get_level` int(11) NOT NULL DEFAULT '0',
  `is_xf` smallint(11) NOT NULL DEFAULT '0',
  `xf_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `is_zy` int(11) NOT NULL DEFAULT '0',
  `zyi_date` int(11) NOT NULL DEFAULT '0',
  `zyq_date` int(11) NOT NULL DEFAULT '0',
  `mon_get` decimal(12,2) NOT NULL DEFAULT '0.00',
  `xy_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `xx_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `down_num` int(11) NOT NULL DEFAULT '0',
  `u_pai` int(11) NOT NULL DEFAULT '0',
  `n_pai` int(11) NOT NULL DEFAULT '0',
  `ok_pay` int(11) NOT NULL DEFAULT '0',
  `wenti` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wenti_dan` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_tj` int(11) NOT NULL DEFAULT '0',
  `re_f4` int(11) NOT NULL DEFAULT '0',
  `is_aa` int(3) NOT NULL DEFAULT '0',
  `is_bb` int(3) NOT NULL DEFAULT '0',
  `us_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `x_pai` int(11) NOT NULL DEFAULT '0',
  `x_out` int(3) NOT NULL DEFAULT '0',
  `x_num` int(11) NOT NULL DEFAULT '0',
  `is_lockqd` int(11) NOT NULL COMMENT '是否关闭签到',
  `is_lockfh` int(11) NOT NULL COMMENT '是否关闭分红',
  `seller_rate` int(11) NOT NULL DEFAULT '5',
  `is_fh` int(11) NOT NULL COMMENT '参与分红的次数',
  `is_sf` int(2) NOT NULL DEFAULT '0',
  `is_cc` int(11) NOT NULL COMMENT '国家',
  `ach` int(11) NOT NULL DEFAULT '0',
  `ach_s` int(11) DEFAULT '0',
  `gdt` int(11) DEFAULT '0' COMMENT '加入分红的时间',
  `pg_nums` int(11) DEFAULT '0' COMMENT '每周购买配股次数',
  `fh_nums` int(11) DEFAULT '0' COMMENT '分红次数',
  `is_cha` int(11) DEFAULT '0' COMMENT '分红点',
  `re_pathb` text CHARACTER SET utf8 COLLATE utf8_bin COMMENT '开通路径',
  `kt_id` int(11) NOT NULL DEFAULT '0' COMMENT '开通的ID',
  `tz_nums` int(11) DEFAULT '0' COMMENT '投资的次数',
  `shangqi_use` decimal(12,0) DEFAULT '0' COMMENT '上一次积分',
  `shangqi_tz` decimal(12,0) DEFAULT '0' COMMENT '上一次结算时的投资总额',
  `jia_nums` int(11) DEFAULT '0' COMMENT '加单',
  `vip4` int(11) DEFAULT '0',
  `vip5` int(11) DEFAULT '0',
  `vip6` int(11) DEFAULT '0',
  `zdt` int(11) DEFAULT '0',
  `shang_l` int(11) DEFAULT '0',
  `shang_r` int(11) DEFAULT '0',
  `shang_nums` int(11) DEFAULT '0',
  `shang_ach` int(11) DEFAULT '0',
  `z_date` int(11) DEFAULT '0',
  `c_date` int(11) DEFAULT '0',
  `l_nums` int(11) DEFAULT '0',
  `r_nums` int(11) DEFAULT '0',
  `ls` int(11) DEFAULT '0',
  `rs` int(11) DEFAULT '0',
  `s_province` varchar(200) DEFAULT '0',
  `s_city` varchar(200) DEFAULT '0',
  `s_county` varchar(200) DEFAULT '0',
  `is_p` int(2) DEFAULT '0' COMMENT '省级代理',
  `is_c` int(2) DEFAULT '0' COMMENT '市级代理',
  `is_cty` int(2) DEFAULT '0' COMMENT '县级代理',
  `youname` varchar(200) DEFAULT '0',
  `youcar` varchar(200) DEFAULT '0',
  `is_pp` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3910 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_fck2 --
CREATE TABLE `xt_fck2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ceng` int(11) DEFAULT '0',
  `numb` int(11) DEFAULT '0',
  `fend` int(11) DEFAULT '0',
  `jishu` int(11) NOT NULL DEFAULT '0' COMMENT '//����',
  `fck_id` int(11) DEFAULT '0',
  `user_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_pay` int(11) NOT NULL DEFAULT '1',
  `u_level` int(11) DEFAULT '0',
  `re_num` int(11) NOT NULL DEFAULT '0',
  `pdt` int(11) NOT NULL,
  `treeplace` int(11) DEFAULT '0',
  `father_id` int(11) DEFAULT '0',
  `father_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_level` int(11) DEFAULT '0',
  `p_path` text CHARACTER SET utf8 COLLATE utf8_bin,
  `u_pai` varchar(200) COLLATE utf8_unicode_ci DEFAULT '0',
  `is_over` smallint(1) NOT NULL DEFAULT '0' COMMENT '//�ж��Ƿ�Ϊ����',
  `is_out` smallint(1) NOT NULL DEFAULT '0' COMMENT '//�ж��Ƿ��Ѿ�����',
  `is_yinc` smallint(1) NOT NULL DEFAULT '0' COMMENT '//����',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_fck_shop --
CREATE TABLE `xt_fck_shop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `did` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `price` decimal(12,2) NOT NULL,
  `create_time` int(11) NOT NULL,
  `is_pay` smallint(1) NOT NULL DEFAULT '0',
  `pdt` int(11) NOT NULL,
  `type` smallint(2) NOT NULL DEFAULT '0',
  `num` int(11) NOT NULL DEFAULT '1',
  `content` text NOT NULL,
  `p_dt` int(11) NOT NULL COMMENT '退货时间',
  `p_is_pay` smallint(2) NOT NULL DEFAULT '0' COMMENT '状态',
  `out_type` smallint(2) NOT NULL DEFAULT '0' COMMENT '0为未评论，1为已评论',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_fee --
CREATE TABLE `xt_fee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `i1` int(12) DEFAULT '0',
  `i2` int(12) DEFAULT '0',
  `i3` int(12) DEFAULT '0',
  `i4` int(12) DEFAULT '0',
  `i5` int(12) DEFAULT '0',
  `i6` int(12) DEFAULT '0',
  `i7` int(12) DEFAULT '0',
  `i8` int(12) DEFAULT '0',
  `i9` int(12) DEFAULT '0',
  `i10` int(12) DEFAULT '0',
  `s1` varchar(200) DEFAULT NULL,
  `s2` varchar(200) DEFAULT NULL,
  `s3` varchar(200) DEFAULT NULL,
  `s4` varchar(200) DEFAULT NULL,
  `s5` varchar(200) DEFAULT NULL,
  `s6` varchar(200) DEFAULT NULL,
  `s7` varchar(200) DEFAULT NULL,
  `s8` varchar(200) DEFAULT NULL,
  `s9` varchar(200) DEFAULT NULL,
  `s10` varchar(200) DEFAULT NULL,
  `s11` varchar(200) DEFAULT NULL,
  `s12` varchar(200) DEFAULT NULL,
  `s13` varchar(200) DEFAULT NULL,
  `s14` varchar(200) DEFAULT NULL,
  `s15` varchar(200) DEFAULT NULL,
  `s16` varchar(200) DEFAULT NULL,
  `s17` varchar(200) DEFAULT NULL,
  `s18` varchar(200) DEFAULT NULL,
  `s19` varchar(200) DEFAULT NULL,
  `s20` varchar(200) DEFAULT NULL,
  `str1` varchar(200) DEFAULT NULL,
  `str2` varchar(200) DEFAULT NULL,
  `str3` varchar(200) DEFAULT NULL,
  `str4` varchar(200) DEFAULT NULL,
  `str5` varchar(200) DEFAULT NULL,
  `str6` varchar(200) DEFAULT NULL,
  `str7` varchar(200) DEFAULT NULL,
  `str8` varchar(200) DEFAULT NULL,
  `str9` varchar(200) DEFAULT NULL,
  `str10` varchar(200) DEFAULT NULL,
  `str11` varchar(200) DEFAULT NULL,
  `str12` varchar(200) DEFAULT NULL,
  `str13` varchar(200) DEFAULT NULL,
  `str14` varchar(200) DEFAULT NULL,
  `str15` varchar(200) DEFAULT NULL,
  `str16` varchar(200) DEFAULT NULL,
  `str17` varchar(200) DEFAULT NULL,
  `str18` varchar(200) DEFAULT NULL,
  `str19` varchar(200) DEFAULT NULL,
  `str20` varchar(200) DEFAULT NULL,
  `str21` varchar(200) DEFAULT NULL,
  `str22` varchar(200) DEFAULT NULL,
  `str23` varchar(200) DEFAULT NULL,
  `str24` varchar(200) DEFAULT NULL,
  `str25` varchar(200) DEFAULT NULL,
  `str26` varchar(200) DEFAULT NULL,
  `str27` varchar(200) DEFAULT NULL,
  `str28` varchar(200) DEFAULT NULL,
  `str29` varchar(200) DEFAULT NULL,
  `str30` varchar(200) DEFAULT NULL,
  `str99` text NOT NULL,
  `us_num` int(11) NOT NULL DEFAULT '0',
  `create_time` int(11) DEFAULT NULL COMMENT '清空数据时间截',
  `f_time` int(11) NOT NULL DEFAULT '0',
  `a_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `b_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `ff_num` int(11) NOT NULL DEFAULT '0',
  `gp_one` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '当前价格',
  `gp_open` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '开盘价格',
  `gp_close` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '关盘价格',
  `gp_kg` int(3) NOT NULL DEFAULT '0' COMMENT '开关',
  `gp_cnum` int(11) NOT NULL DEFAULT '0' COMMENT '拆股次数',
  `gp_perc` varchar(50) NOT NULL COMMENT '手续费',
  `gp_inm` varchar(50) NOT NULL COMMENT '交易分账',
  `gp_inn` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gp_cgbl` varchar(50) NOT NULL COMMENT '拆比例',
  `gp_fxnum` int(11) NOT NULL DEFAULT '0',
  `gp_senum` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_fenhong --
CREATE TABLE `xt_fenhong` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `f_num` decimal(12,2) NOT NULL DEFAULT '0.00',
  `f_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `pdt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_form --
CREATE TABLE `xt_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `e_title` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `e_content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `baile` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_form_class --
CREATE TABLE `xt_form_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `baile` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_game --
CREATE TABLE `xt_game` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `uid` int(12) NOT NULL,
  `g_money` decimal(12,2) NOT NULL,
  `used_money` decimal(12,2) NOT NULL,
  `get_time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=460 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_gouwu --
CREATE TABLE `xt_gouwu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `lx` int(11) NOT NULL,
  `ispay` smallint(2) NOT NULL,
  `pdt` int(11) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `shu` int(11) NOT NULL,
  `cprice` decimal(12,2) DEFAULT NULL,
  `pvzhi` decimal(12,2) DEFAULT NULL,
  `guquan` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_type` int(11) DEFAULT '0',
  `user_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_address` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `us_tel` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isfh` int(11) DEFAULT '0',
  `fhdt` int(11) DEFAULT '0',
  `okdt` int(11) DEFAULT '0',
  `ccxhbz` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `countid` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=135 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_gp --
CREATE TABLE `xt_gp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gp_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '股票名称',
  `danhao` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '股票单号',
  `opening` decimal(12,2) NOT NULL COMMENT '开盘价',
  `closing` decimal(12,2) NOT NULL COMMENT '收盘价',
  `today` decimal(12,2) NOT NULL COMMENT '当前报价',
  `most_g` decimal(12,2) NOT NULL COMMENT '最高价',
  `most_d` decimal(12,2) NOT NULL COMMENT '最低价',
  `up` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '涨幅',
  `down` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '跌幅',
  `gp_quantity` int(11) NOT NULL DEFAULT '0' COMMENT '股票数量',
  `cgp_num` int(11) NOT NULL DEFAULT '0',
  `gp_zongji` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '总价',
  `turnover` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '成交量',
  `f_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '发布时间',
  `status` int(11) NOT NULL COMMENT '状态（0关闭1开启）',
  `pao_num` int(11) NOT NULL DEFAULT '0',
  `ca_numb` int(11) NOT NULL DEFAULT '0',
  `all_sell` int(11) NOT NULL DEFAULT '0',
  `day_sell` int(11) NOT NULL DEFAULT '0',
  `yt_sellnum` int(11) NOT NULL DEFAULT '0',
  `buy_num` int(11) NOT NULL DEFAULT '0',
  `sell_num` int(11) NOT NULL DEFAULT '0',
  `fx_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_gp_sell --
CREATE TABLE `xt_gp_sell` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `uid` int(12) NOT NULL,
  `sNun` int(11) NOT NULL DEFAULT '0',
  `ispay` int(2) NOT NULL DEFAULT '0',
  `eDate` int(11) NOT NULL DEFAULT '0',
  `sell_mm` decimal(12,2) NOT NULL DEFAULT '0.00',
  `sell_ln` int(11) NOT NULL DEFAULT '0',
  `sell_mon` int(11) NOT NULL DEFAULT '0',
  `sell_num` int(11) NOT NULL DEFAULT '0',
  `sell_date` int(11) NOT NULL DEFAULT '0',
  `is_over` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5555 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_gupiao --
CREATE TABLE `xt_gupiao` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `uid` int(12) NOT NULL,
  `pid` int(12) NOT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `one_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `sNun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `used_num` int(12) NOT NULL,
  `lnum` int(12) NOT NULL,
  `ispay` int(2) NOT NULL,
  `status` smallint(2) NOT NULL,
  `eDate` int(11) NOT NULL,
  `type` smallint(2) NOT NULL,
  `is_en` smallint(1) NOT NULL DEFAULT '0',
  `sell_mon` int(11) NOT NULL DEFAULT '0',
  `sell_num` int(11) NOT NULL DEFAULT '0',
  `sell_date` int(11) NOT NULL DEFAULT '0',
  `is_over` smallint(1) NOT NULL DEFAULT '0',
  `bz` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `buy_s` decimal(12,2) NOT NULL DEFAULT '0.00',
  `buy_a` decimal(12,2) NOT NULL DEFAULT '0.00',
  `buy_nn` int(11) NOT NULL DEFAULT '0',
  `sell_g` decimal(12,2) NOT NULL DEFAULT '0.00',
  `is_cancel` int(11) NOT NULL DEFAULT '0',
  `spid` int(11) NOT NULL DEFAULT '0',
  `last_s` int(11) NOT NULL DEFAULT '0',
  `tpl` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15411 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_hgupiao --
CREATE TABLE `xt_hgupiao` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `uid` int(12) NOT NULL,
  `pid` int(12) NOT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `gprice` decimal(12,2) NOT NULL DEFAULT '0.00',
  `one_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `gmp` decimal(12,2) NOT NULL DEFAULT '0.00',
  `pmp` decimal(12,2) NOT NULL DEFAULT '0.00',
  `sNun` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ispay` int(2) NOT NULL,
  `eDate` int(11) NOT NULL,
  `type` smallint(2) NOT NULL,
  `is_en` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29292 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_history --
CREATE TABLE `xt_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `did` int(11) NOT NULL,
  `user_did` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `action_type` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pdt` int(11) NOT NULL,
  `epoints` decimal(12,2) NOT NULL,
  `allp` decimal(12,2) NOT NULL,
  `bz` text NOT NULL,
  `type` smallint(1) NOT NULL COMMENT '充值0明细1',
  `act_pdt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=657685 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_huikui --
CREATE TABLE `xt_huikui` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `touzi` varchar(255) CHARACTER SET latin1 NOT NULL,
  `zhuangkuang` varchar(255) CHARACTER SET latin1 NOT NULL,
  `hk` decimal(12,2) NOT NULL,
  `time_hk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_img --
CREATE TABLE `xt_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `c_time` int(11) NOT NULL DEFAULT '0',
  `small_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `img_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_item --
CREATE TABLE `xt_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `fsize` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `zip_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `zip_title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_read` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_jiadan --
CREATE TABLE `xt_jiadan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `adt` int(11) NOT NULL,
  `pdt` int(11) NOT NULL,
  `money` decimal(12,2) NOT NULL DEFAULT '0.00' COMMENT '金额',
  `danshu` smallint(5) NOT NULL DEFAULT '0' COMMENT '单数',
  `is_pay` smallint(3) NOT NULL DEFAULT '0',
  `up_level` smallint(2) NOT NULL DEFAULT '0',
  `out_level` smallint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_msg --
CREATE TABLE `xt_msg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `f_uid` int(11) NOT NULL DEFAULT '0',
  `f_user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `s_uid` int(11) NOT NULL DEFAULT '0',
  `s_user_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `f_time` int(11) NOT NULL DEFAULT '0',
  `f_del` smallint(3) NOT NULL DEFAULT '0',
  `s_del` smallint(3) NOT NULL DEFAULT '0',
  `f_read` smallint(3) NOT NULL DEFAULT '0',
  `s_read` smallint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=418 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_news_a --
CREATE TABLE `xt_news_a` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `n_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `n_content` text COLLATE utf8_unicode_ci NOT NULL,
  `n_top` int(11) NOT NULL DEFAULT '0',
  `n_status` tinyint(1) NOT NULL DEFAULT '1',
  `n_create_time` int(11) NOT NULL,
  `n_update_time` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_news_class --
CREATE TABLE `xt_news_class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `type` smallint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_peng --
CREATE TABLE `xt_peng` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(12) NOT NULL,
  `ceng` int(12) NOT NULL,
  `l` int(12) NOT NULL,
  `r` int(12) NOT NULL,
  `l1` int(12) NOT NULL,
  `r1` int(12) NOT NULL,
  `l2` int(12) NOT NULL,
  `r2` int(12) NOT NULL,
  `l3` int(12) NOT NULL,
  `r3` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_plan --
CREATE TABLE `xt_plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '奖励计划',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_product --
CREATE TABLE `xt_product` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `cid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cptype` int(11) NOT NULL DEFAULT '0',
  `ccname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `xhname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `money` decimal(12,2) DEFAULT '0.00',
  `a_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `b_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `create_time` int(11) DEFAULT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `yc_cp` int(11) NOT NULL DEFAULT '0',
  `countid` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `is_reg` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_promo --
CREATE TABLE `xt_promo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(12,2) NOT NULL,
  `money_two` decimal(12,2) NOT NULL,
  `u_level` smallint(3) NOT NULL DEFAULT '0' COMMENT '升级前级别',
  `uid` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `up_level` smallint(3) NOT NULL COMMENT '升级后级别',
  `danshu` smallint(2) NOT NULL COMMENT '单数',
  `pdt` int(11) NOT NULL,
  `is_pay` smallint(3) NOT NULL DEFAULT '0',
  `u_bank_name` smallint(2) NOT NULL DEFAULT '0' COMMENT '汇款银行',
  `type` smallint(2) NOT NULL DEFAULT '0' COMMENT '0标示晋级，1标示加单',
  `user_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1240 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_region --
CREATE TABLE `xt_region` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0',
  `name` varchar(120) NOT NULL DEFAULT '',
  `region_type` tinyint(1) NOT NULL DEFAULT '2',
  `agency_id` smallint(5) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`pid`),
  KEY `region_type` (`region_type`),
  KEY `agency_id` (`agency_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3409 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_remit --
CREATE TABLE `xt_remit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `b_uid` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `kh_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `or_time` int(11) NOT NULL DEFAULT '0',
  `orderid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `bankid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ok_time` int(11) NOT NULL DEFAULT '0',
  `ok_type` int(11) NOT NULL DEFAULT '0',
  `is_pay` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=108 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_shouru --
CREATE TABLE `xt_shouru` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL DEFAULT '0',
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `in_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `in_time` int(11) NOT NULL DEFAULT '0',
  `in_bz` text COLLATE utf8_unicode_ci NOT NULL,
  `in_type` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3831 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_times --
CREATE TABLE `xt_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `benqi` int(11) NOT NULL COMMENT '本期结算日期',
  `shangqi` int(11) NOT NULL COMMENT '上期结算日期',
  `is_count_b` int(11) NOT NULL,
  `is_count_c` int(11) NOT NULL,
  `is_count` int(11) NOT NULL,
  `type` smallint(2) NOT NULL DEFAULT '0' COMMENT '是否已经结算',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=370 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_times1 --
CREATE TABLE `xt_times1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `benqi` int(11) DEFAULT NULL COMMENT '本期结算日期',
  `shangqi` int(11) DEFAULT NULL COMMENT '上期结算日期',
  `is_count_b` int(11) DEFAULT NULL,
  `is_count_c` int(11) DEFAULT NULL,
  `is_count` int(11) DEFAULT NULL,
  `type` smallint(2) DEFAULT '0' COMMENT '是否已经结算',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=263 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_tiqu --
CREATE TABLE `xt_tiqu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rdt` int(11) NOT NULL,
  `money` decimal(12,2) NOT NULL,
  `money_two` decimal(12,2) NOT NULL,
  `epoint` decimal(12,2) NOT NULL,
  `is_pay` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_card` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_address` varchar(200) NOT NULL,
  `user_tel` varchar(200) NOT NULL,
  `x1` varchar(50) DEFAULT NULL,
  `x2` varchar(50) DEFAULT NULL,
  `x3` varchar(50) DEFAULT NULL,
  `x4` varchar(50) DEFAULT NULL,
  `t_type` int(3) NOT NULL DEFAULT '0',
  `email` varchar(200) DEFAULT '0',
  `qq` varchar(200) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=708 DEFAULT CHARSET=utf8;
-- <fen> --
-- 表的结构: xt_ulevel --
CREATE TABLE `xt_ulevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(12,2) DEFAULT NULL,
  `u_level` smallint(3) DEFAULT '0' COMMENT '升级前级别',
  `uid` int(11) DEFAULT NULL,
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `create_time` int(11) DEFAULT NULL,
  `up_level` smallint(3) DEFAULT NULL COMMENT '升级后级别',
  `danshu` smallint(2) DEFAULT NULL COMMENT '单数',
  `pdt` int(11) DEFAULT NULL,
  `is_pay` smallint(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_xfhistory --
CREATE TABLE `xt_xfhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `did` int(11) NOT NULL,
  `d_user_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `action_type` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `pdt` int(11) NOT NULL,
  `epoints` decimal(12,2) NOT NULL,
  `allp` decimal(12,2) NOT NULL,
  `bz` text COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(1) NOT NULL COMMENT '充值0明细1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_xiaof --
CREATE TABLE `xt_xiaof` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `user_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `rdt` int(11) NOT NULL,
  `pdt` int(11) NOT NULL DEFAULT '0',
  `money` decimal(12,2) NOT NULL,
  `money_two` int(11) NOT NULL DEFAULT '0',
  `epoint` decimal(12,2) NOT NULL,
  `fh_money` decimal(12,2) NOT NULL DEFAULT '0.00',
  `is_pay` int(11) NOT NULL,
  `user_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `bank_card` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `x1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `x4` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_xml --
CREATE TABLE `xt_xml` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `money` decimal(12,2) NOT NULL,
  `amount` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `x_date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_lock` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=266 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
-- <fen> --
-- 表的结构: xt_zhuanj --
CREATE TABLE `xt_zhuanj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `in_uid` int(11) DEFAULT NULL,
  `out_uid` int(11) DEFAULT NULL,
  `in_userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `out_userid` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `epoint` decimal(12,2) DEFAULT NULL,
  `rdt` int(11) DEFAULT NULL,
  `sm` varchar(200) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `type` int(11) DEFAULT '0',
  `is_gupiao` int(11) DEFAULT '0',
  `is_fh` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16946 DEFAULT CHARSET=utf8;
-- <fen> --
