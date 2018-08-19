<?php  if(!defined('_source')) die("Error");



	$d->reset();
	$sql = "select ten_$lang,id from #_baiviet_list where hienthi=1 and type='".$type_bar."' order by stt,id";
	$d->query($sql);
	$row_bg_list = $d->result_array();

	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];


     //    $d->reset();
     //    $sql = "select * from #_meta where com_meta='".$_GET['com']."' limit 0,1";
    	// $d->query($sql);
    	// $meta = $d->fetch_array();
     //    $title_bar = $meta['title'];
     //    $keyword_bar = $meta['keywords'];
     //    $description_bar = $meta['description'];

?>