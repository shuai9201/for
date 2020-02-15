<?php
$_conn = mysqli_connect($_clean['host'],$_clean['user'],$_clean['pwd'],$_clean['dbname']);
$_user = "CREATE TABLE SS_user(
		s_id mediumint(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
		s_xh char(11) NOT NULL ,
		s_user varchar(20) NOT NULL COMMENT '//用户名',
		s_pwd varchar(20) NOT NULL COMMENT '//密码',
		s_sex int(1) NOT NULL,
		s_class int(4) NOT NULL COMMENT '//班级',
		s_name varchar(6) NOT NULL COMMENT '//名字',
		s_brith date NOT NULL COMMENT '//生日',
		s_xg_num tinyint(8) NOT NULL,
	  	s_xg_cloumn tinyint(2) NOT NULL COMMENT '//修改项目',
	  	s_state tinyint(1) NOT NULL COMMENT '//用户状态',
	  	s_xg_r varchar(20) NOT NULL,
	  	s_xg_ip varchar(15) NOT NULL,
	 	s_xg_date datetime NOT NULL,
	 	s_check char(8) NOT NULL COMMENT '//查询码',
	  	s_check_num tinyint(8) NOT NULL COMMENT '//查询次数',
	  	s_num tinyint(8) NOT NULL,
	  	s_ip varchar(15) NOT NULL,
	  	s_date datetime NOT NULL,
	  	s_add_r varchar(20) NOT NULL,
  		s_browser varchar(160) NOT NULL
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
$_score = "CREATE TABLE ss_score(
		s_id mediumint(8) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	  	s_xh char(11) NOT NULL,
	  	s_sx tinyint(3) NOT NULL,
	  	s_yw tinyint(3) NOT NULL,
	  	s_yy tinyint(3) NOT NULL,
	  	s_hx tinyint(3) NOT NULL,
	  	s_wl tinyint(3) NOT NULL,
	  	s_ls tinyint(3) NOT NULL,
	  	s_dl tinyint(3) NOT NULL,
	  	s_sw tinyint(3) NOT NULL,
	  	s_zz tinyint(3) NOT NULL,
	  	s_add_r varchar(20) NOT NULL,
	  	s_add_ip varchar(15) NOT NULL,
	  	s_add_browser varchar(160) NOT NULL,
	  	s_add_date datetime NOT NULL,
	  	s_xg_r varchar(20) NOT NULL,
	 	s_xg_ip varchar(15) NOT NULL,
	 	s_xg_num tinyint(8) NOT NULL,
	  	s_xg_cloumn tinyint(2) NOT NULL,
	  	s_xg_browser varchar(160) NOT NULL,
	  	s_xg_date datetime NOT NULL
	) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1";
?>