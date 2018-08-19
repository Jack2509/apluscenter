<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	
	@define ( '_lib' , '../libraries/');
    
	include_once _lib."config.php";
	include_once _lib."constant.php";;
	include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
    
	$d = new database($config['database']);
	
	@$id = $_GET['id'];
	settype($id,'int');
    $d->reset();
	$sql="select id,ten_vi,links from #_video where id=".$id." and hienthi=1 order by stt desc";
	$d->query($sql);
	$video = $d->result_array();
?>
                <?php  $arr =explode("=", $video[0]['links']); ?>

<iframe width="100%" height="175" src="//www.youtube.com/embed/<?=$arr[1]?>?rel=0" frameborder="0" allowfullscreen></iframe><p><?=$video[0]['ten_vi']?></p>