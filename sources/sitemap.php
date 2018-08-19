<?php  if(!defined('_source')) die("Error");
	$title_='Sitemap';
	
	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_product_list where hienthi=1 order by stt asc";
	$d->query($sql);
	$result_spl = $d->result_array();


	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_baiviet where hienthi=1 and type='dichvu' order by stt asc";
	$d->query($sql);
	$result_dichvu = $d->result_array();

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_baiviet_list where hienthi=1 and type='tintuc' order by stt asc";
	$d->query($sql);
	$result_tintuc_list = $d->result_array();

	$d->reset();
	$sql = "select id,tenkhongdau,ten_$lang from #_album where hienthi=1 and type='album' order by stt asc";
	$d->query($sql);
	$result_album = $d->result_array();


						
?>