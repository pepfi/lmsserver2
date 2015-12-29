DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` tinyint(20) DEFAULT NULL,
  `blocked` enum('1','0') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`email`,`password`,`role`,`blocked`) values (1,'admin','admin@autelan.com','2ab64f4ee279e5baf7ab7059b15e6d12',0,'0');

DROP TABLE IF EXISTS 'tbl_ap_slow_cmds';

CREATE TABLE `tbl_ap_slow_cmds` (
  `ap_mac` varchar(17) NOT NULL,
  `slow_cmd` varchar(1024) NOT NULL DEFAULT '',
  PRIMARY KEY (`ap_mac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8

DROP TABLE IF EXISTS 'tbl_ap_reg_infos';

CREATE TABLE `tbl_ap_reg_infos` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `ap_mac` varchar(255) NOT NULL DEFAULT '0',
  `ap_sn` varchar(64) NOT NULL DEFAULT '0',
  `ap_vendor` varchar(64) NOT NULL DEFAULT '0',
  `ap_model` varchar(64) NOT NULL DEFAULT '0',
  `ap_ver` varchar(64) NOT NULL DEFAULT '0',
  `pcba_model` varchar(64) NOT NULL DEFAULT '0',
  `pcba_version` varchar(64) NOT NULL DEFAULT '0',
  `hw_mac` varchar(64) NOT NULL DEFAULT '0',
  `hw_pn` varchar(64) NOT NULL DEFAULT '0',
  `hw_ver` varchar(64) NOT NULL DEFAULT '0',
  `memory_size` varchar(64) NOT NULL DEFAULT '0',
  `flash_size` varchar(64) NOT NULL DEFAULT '',
  `flash_vendor` varchar(64) NOT NULL DEFAULT '',
  `flash_psn` varchar(64) NOT NULL DEFAULT '',
  `hdd_vendor` varchar(64) NOT NULL DEFAULT '',
  `hdd_model` varchar(64) NOT NULL DEFAULT '',
  `hdd_s_n` varchar(64) NOT NULL DEFAULT '',
  `hdd_disksize` varchar(64) NOT NULL DEFAULT '',
  `hdd_fw_ver` varchar(64) NOT NULL DEFAULT '',
  `sd_model` varchar(64) NOT NULL DEFAULT '',
  `sd_disksize` varchar(64) NOT NULL DEFAULT '',
  `ext_wifi_model` varchar(64) NOT NULL DEFAULT '',
  `ext_wifi_m_a_c` varchar(64) NOT NULL DEFAULT '',
  `ext_wifi_s_n` varchar(64) NOT NULL DEFAULT '',
  `c_wan_count` varchar(64) NOT NULL DEFAULT '',
  `c_wan0_model` varchar(64) NOT NULL DEFAULT '',
  `c_wan0_meid` varchar(64) NOT NULL DEFAULT '',
  `c_wan0_fw_ver` varchar(64) NOT NULL DEFAULT '',
  `c_wan0_iccid` varchar(64) NOT NULL DEFAULT '',
  `c_wan0_carrier` varchar(64) NOT NULL DEFAULT '',
  `c_wan1_model` varchar(64) NOT NULL DEFAULT '',
  `c_wan1_meid` varchar(64) NOT NULL DEFAULT '',
  `c_wan1_fw_ver` varchar(64) NOT NULL DEFAULT '',
  `c_wan1_iccid` varchar(64) NOT NULL DEFAULT '',
  `c_wan1_carrier` varchar(64) NOT NULL DEFAULT '',
  `sw_ver` varchar(64) NOT NULL DEFAULT '',
  `web_frame_ver` varchar(64) NOT NULL DEFAULT '',
  `web_rsrc_ver` varchar(64) NOT NULL DEFAULT '',
  `cfg_ver` varchar(64) NOT NULL DEFAULT '',
  `last_login_time` datetime NOT NULL,
  `last_login_lat` varchar(64) NOT NULL DEFAULT '',
  `last_login_lng` varchar(64) NOT NULL DEFAULT '',
  `first_login_time` datetime NOT NULL,
  `first_login_lat` varchar(64) NOT NULL DEFAULT '',
  `first_login_lng` varchar(64) NOT NULL DEFAULT '',
  `dev_ip` varchar(64) DEFAULT NULL,
  `dev_on_off_status` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8
