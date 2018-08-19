<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	
	@define ( '_lib' , '../libraries/');
    
	include_once _lib."config.php";
	include_once _lib."constant.php";;
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
    
	$d = new database($config['database']);
	
	$pid = $_POST['pid'];
	$soluong = $_POST['soluong'];
	$color = $_POST['color'];

	addtocart($pid,$soluong,$color);

	echo count($_SESSION['cart']);
?>