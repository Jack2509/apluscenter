<?php 
	/**
	 * NINA Framework
	 * Vertion 1.0
	 * Author NINA Co.,Ltd. (nina@nina.vn)
	 * Copyright (C) 2015 NINA Co.,Ltd. All rights reserved
	*/
	 
	if(!defined('_lib')) die("Error");
		error_reporting(0);


	function nettuts_error_handler($number, $message, $file, $line, $vars)
	{
		if ( ($number !== E_NOTICE) && ($number < 2048) ) {
			include 'templates/error_tpl.php';
			die();
		}
	}
	//set_error_handler('nettuts_error_handler');
	//error_reporting(0);

	date_default_timezone_set('Asia/Ho_Chi_Minh');

	$config_url=$_SERVER["SERVER_NAME"];
	$config['debug']=1;    #Bật chế độ debug dành cho developer
	$config['lang']="vi";
	$config_email="account@acapital.vn";
	$config_pass="VFWtoIlEF";
	$config_ip="210.2.87.3";

	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = 'root';
	$config['database']['database'] = 'acapitalvn_1';
	$config['database']['refix'] = 'table_';

	// ngonngu

	// $config['lang']=array('vi'=>'Tiếng Việt','en'=>'Tiếng Việt');#Danh sách ngôn ngữ hỗ trợ
	// $config['lang_default'] = 'en';#Ngôn ngữ mặc định


?>