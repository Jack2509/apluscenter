<?php  if(!defined('_source')) die("Error");
		
	$com_s = array( "thietke" => "thiet-ke","xaydung" => "xin-phep-xay-dung","thicong" => "thi-cong","noithat" => "noi-that","bds" => "bat-dong-dan","tintuc" => "tin-tuc","tuyendung" => "tuyen-dung"); 



		$title_detail = _timkiem;

		$id_list=trim($_GET['id_list']);
		$key=trim($_GET['keywords']);
		$key_khong_dau=changeTitle($key);
		
		$per_page = 12; // Set how many records do you want to display per page.
		$startpoint = ($page * $per_page) - $per_page;
		$limit = ' limit '.$startpoint.','.$per_page;
		
		$where = " #_baiviet where hienthi=1 and type='dichvu'";
		$ten=trim($_POST['timkiem']);
		if($key!='')
		{
			$where.=" and (ten_$lang like'%$key%' or tenkhongdau like'%$key_khong_dau%') ";

		}
		if($id_list!='')
		{
			$where.=" and id_list='".$id_list."' ";
		}
		$where .= " order by stt,ngaytao desc";

		$sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,type,luotxem from $where $limit";
		$d->query($sql);
		$product = $d->result_array();

		$url = getCurrentPageURL();
		$paging = pagination($where,$per_page,$page,$url);

?>