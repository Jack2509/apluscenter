<?php  if(!defined('_source')) die("Error");

$id =  addslashes($_GET['id']);

if(isset($_POST['email'])){

	$data['ten'] = $_POST['hoten'];
	$data['tieude'] = $_POST['tieude'];

	$data['email'] = $_POST['email'];
				// $data['diachi_vi'] = $_POST['diachi'];
				// $data['dienthoai'] = $_POST['dienthoai'];
	$data['ten_vi'] = $_POST['chude'];
	$data['tenkhongdau'] = changeTitle($_POST['tieude']);
	$data['type'] = 'hoidap';
	$data['hienthi'] = 0;
	$data['ngaytao'] = time();
	$d->setTable('hoidap');
	if($d->insert($data))
	{                
		transfer("Gửi câu hỏi thành công", "hoi-dap.html");
	}
	else {
		transfer("Gửi câu hỏi thất bại", "hoi-dap.html");
	}

}

if($id!=''){



	$sql_lanxem = "UPDATE #_hoidap SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
	$d->query($sql_lanxem);

	$sql = "select ten_vi,noidung_$lang,ngaytao,luotxem,ten,tenkhongdau,tieude from #_hoidap where hienthi=1 and tenkhongdau='".$id."'";
	$d->query($sql);
	$row_detail = $d->fetch_array();
			// dump($row_detail);

	$title_detail = 'Hỏi đáp';
	$title_bar .= $row_detail['title'];
	$keyword_bar .= $row_detail['keywords'];
	$description_bar .= $row_detail['description'];

			#cÃ¡c tin cu hon
	$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau from #_baiviet where hienthi=1 and type='chamsoc' order by stt,ngaytao desc limit 0,10";
	$d->query($sql_khac);
	$tintuc_khac = $d->result_array();

} else {
	$d->reset();
	$sql = "select * from #_hoidap where hienthi=1 and type='hoidap' order by stt,id asc";
	$d->query($sql);
	$tintuc = $d->result_array();
			// cac tin tuc
			// $per_page = 100; // Set how many records do you want to display per page.
			// $startpoint = ($page * $per_page) - $per_page;
			// $limit = ' limit '.$startpoint.','.$per_page;

			// $where = " #_baiviet where hienthi=1 and type='chamsoc' order by id desc";

			// $sql = "select ten_$lang,thumb,tenkhongdau,id,ngaytao,mota_$lang,noidung_$lang from $where $limit";
			// $d->query($sql);
			// $tintuc = $d->result_array();

			// $url = getCurrentPageURL();
			// $paging = pagination($where,$per_page,$page,$url);

			// $title_detail = _tintuc;

			        $d->reset();
        $sql = "select * from #_meta where com_meta='".$_GET['com']."' limit 0,1";
    	$d->query($sql);
    	$meta = $d->fetch_array();
        $title_bar = $meta['title'];
        $keyword_bar = $meta['keywords'];
        $description_bar = $meta['description'];
	

}

?>