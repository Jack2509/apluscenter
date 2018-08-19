<?php  if(!defined('_source')) die("Error");

$cu=getCurrentPageURL_index();
$cm_success=false;

		// $com =  $_GET['com'];

$id =  $_GET['id'];
$idl =  addslashes($_GET['idl']);
$idc =  addslashes($_GET['idc']);
$idlo =  addslashes($_GET['idlo']);

		if($id!=''){

			$sql_lanxem = "UPDATE #_baiviet SET luotxem=luotxem+1  WHERE tenkhongdau ='".$id."'";
			$d->query($sql_lanxem);

			$sql = "select * from #_baiviet where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$id."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$sql = "select * from #_baiviet_list where hienthi=1 and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();


			if(!$row_detail)
			{
				redirect('http://'.$config_url.'/404.html');
			}


			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL_index().'" />';
			$share_facebook .= '<meta property="og:type" content="website" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail['mota_'.$lang].'" />';
			$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';

			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];



					#các tin cu hon
			$sql_khac = "select ten_$lang,ngaytao,id,tenkhongdau,luotxem,thumb,mota_$lang from #_baiviet where hienthi=1 and id !='".$row_detail['id']."' and type='".$type_bar."' order by stt,ngaytao desc limit 0,10";
			$d->query($sql_khac);
			$tintuc = $d->result_array();


		} elseif($idl!=''){

			$d->reset();
			$sql = "select * from #_baiviet_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idl."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$per_page = 10; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_list='".$row_detail['id']."'  order by stt,ngaytao desc";

			$sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,luotxem,ngaytao from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL_index();
			$paging = pagination($where,$per_page,$page,$url);

			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL_index().'" />';
			$share_facebook .= '<meta property="og:type" content="website" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail['mota_'.$lang].'" />';
			$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail['photo'].'" />';



		} elseif($idc!=''){

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,id_list,title,keywords,description from #_baiviet_cat where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$idc."'";
			$d->query($sql);
			$row_detail = $d->fetch_array();

			$d->reset();
			$sql = "select * from #_baiviet_list where hienthi=1 and type='".$type_bar."' and id='".$row_detail['id_list']."'";
			$d->query($sql);
			$row_detail_list = $d->fetch_array();

			$d->reset();
			$sql = "select id,ten_$lang,tenkhongdau,thumb from #_baiviet_item where hienthi=1 and type='".$type_bar."' and id_cat='".$row_detail['id']."' order by stt,ngaytao desc";
			$d->query($sql);
			$row_item_tt = $d->result_array();

			$per_page = 30; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			//$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and id_cat='".$row_detail['id']."'  order by stt,ngaytao desc";
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' and FIND_IN_SET('".$row_detail['id']."', id_cat)  order by stt,ngaytao desc";
			

			$sql = "select ten_$lang,id,thumb,mota_$lang,tenkhongdau,luotxem from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();

			$url = getCurrentPageURL_index();
			$paging = pagination($where,$per_page,$page,$url);


			$title_detail = $row_detail['ten_'.$lang];
			$title_bar .= $row_detail['title'];
			$keyword_bar .= $row_detail['keywords'];
			$description_bar .= $row_detail['description'];

			$share_facebook = '<meta property="og:url" content="'.getCurrentPageURL_index().'" />';
			$share_facebook .= '<meta property="og:type" content="website" />';
			$share_facebook .= '<meta property="og:title" content="'.$row_detail_list['ten_'.$lang].'" />';
			$share_facebook .= '<meta property="og:description" content="'.$row_detail_list['mota_'.$lang].'" />';
			$share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_baiviet_l.$row_detail_list['photo'].'" />';



		}  else {


			$d->reset();
			$sql = "select * from #_meta where com_meta='".$_GET['com']."' limit 0,1";
			$d->query($sql);
			$meta = $d->fetch_array();
			$title_bar = $meta['title'];
			$keyword_bar = $meta['keywords'];
			$description_bar = $meta['description'];		


			// cac tin tuc
			$per_page = 10; // Set how many records do you want to display per page.
			$startpoint = ($page * $per_page) - $per_page;
			$limit = ' limit '.$startpoint.','.$per_page;
			
			$where = " #_baiviet where hienthi=1 and type='".$type_bar."' order by stt,id desc";

			$sql = "select ten_$lang,thumb,tenkhongdau,id,ngaytao,mota_$lang,photo,luotxem from $where $limit";
			$d->query($sql);
			$tintuc = $d->result_array();
			// dump($tintuc[0]['mota_'.$lang]);

			$url = getCurrentPageURL_index();
			$paging = pagination($where,$per_page,$page,$url);





		}

		?>