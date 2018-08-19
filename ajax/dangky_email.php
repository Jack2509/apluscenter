<?php
	session_start();
	@define ( '_template' , '../templates/');
	@define ( '_lib' , '../libraries/');
	@define ( '_source' , '../sources/');	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	
	$email=magic_quote($_POST['email']);
	$ten=magic_quote($_POST['ten']);	
	$dienthoai=magic_quote($_POST['dienthoai']);
	$noidung=magic_quote($_POST['noidung']);
	
	
	$d->reset();
	$sql = "select id from #_newsletter where email='".$_POST['email']."'";
	$d->query($sql);
	$maill = $d->result_array();
	
	if(count($maill)!=0){
		echo 1;
	} else {

		if(isset($_POST['email'])){
			$data['email'] = $_POST['email'];
			$data['ten'] = $_POST['ten'];
			$data['dienthoai'] = $_POST['dienthoai'];
			$data['noidung'] = $_POST['noidung'];
			$data['ngaytao'] = time();
			$d->setTable('newsletter');
			if($d->insert($data))
				echo 0;
			else
				echo 2;
		}
		
	}
		

?>

