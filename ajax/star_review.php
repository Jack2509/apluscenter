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


$type = $_POST['type'];
$id = $_POST['id'];
$star = $_POST['star'];
$ip = $_POST['ip'];
$mota = $_POST['mota'];
$com = $_POST['com'];
$ten = $_POST['ten'];
$dienthoai = $_POST['dienthoai'];
$email = $_POST['email'];

	$d->reset();
	$sql = "select * from #_review where type='".$type."' and id_tour='".$id."' and thanhvien='".$ip."' order by stt,id desc";
	$d->query($sql);
	$row_review = $d->result_array();


var_dump($_POST) ; echo $row_review[0]['id'];


if(count($row_review)==0){

	$data['type'] = $_POST['type'];
	$data['id_tour'] = $_POST['id'];
	$data['star'] = $_POST['star'];
	$data['com'] = $_POST['com'];
	$data['mota_vi'] = magic_quote($_POST['mota']);
	$data['thanhvien'] = $ip;
	$data['ten'] = $_POST['ten'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];
	$data['hienthi'] = 1;
	$data['ngaytao'] = time();

	$d->setTable('review');
	if($d->insert($data)) {
		echo 1;
	} else {
		echo 2;
	}

} else {
	$data['type'] = $_POST['type'];
	$data['id_tour'] = $_POST['id'];
	$data['star'] = $_POST['star'];
	$data['com'] = $_POST['com'];
	$data['mota_vi'] = magic_quote($_POST['mota']);
	$data['thanhvien'] = $ip;
	$data['ten'] = $_POST['ten'];
	$data['dienthoai'] = $_POST['dienthoai'];
	$data['email'] = $_POST['email'];

	$data['hienthi'] = 1;
	$data['ngaytao'] = time();
	$d->setTable('review');
	$d->setWhere('id', $row_review[0]['id']);
	if($d->insert($data)) {
		echo 0;
	} else {
		echo 2;
	}

}
?>