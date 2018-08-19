<?php  if(!defined('_source')) die("Error");

			// $per_page = 8; // Set how many records do you want to display per page.
			// $startpoint = ($page * $per_page) - $per_page;
			// $limit = ' limit '.$startpoint.','.$per_page;

			// $where = " #_product where hienthi=1 and type='product' and noibat<>0  order by stt,ngaytao desc";

			// $sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau from $where $limit";
			// $d->query($sql);
			// $product = $d->result_array();

			// $url = getCurrentPageURL();
			// $paging = pagination($where,$per_page,$page,$url);

		$d->reset();
		$sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and type='thietke' order by stt,id ";
		$d->query($sql);
		$product_l = $d->result_array();



?>
