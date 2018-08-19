<?php  if(!defined('_source')) die("Error");
	$id =  addslashes($_GET['id']);

	if($id!='')
	{
		$sl_lv='';
		for ($i=0; $i <$config['type'][$type]['level'] ; $i++) 
		{ 
			$sl_lv.=',id_lv'.$i;
		}
		#tin tuc chi tiet
		$d->reset();
		$sql="select id $sl_lv,ten_$lang as ten,ngaytao,luotxem,noidung_$lang as noidung,title_$lang as title,keywords_$lang as keywords,description_$lang as description,photo from #_tintuc where hienthi=1 and tenkhongdau_$lang='$id' and type='$type'";
		$d->query($sql);
		$tintuc_detail=$d->fetch_array();

		$llinkdan='';
		$arr_list = array(0 => '.l', 1=>'.c');
		for ($i=0; $i <$config['type'][$type]['level'] ; $i++) { 
			$d->reset();
			$sql="select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_tintuc_list where hienthi=1 and level='$i' and type='$type' and id='".$tintuc_detail['id_lv'.$i]."'";
			$d->query($sql);
			$tmp=$d->fetch_array();				
			if($tmp)
			{
				$llinkdan.=' &raquo; <a href="'.$com.'/'.$tmp['tenkhongdau'].$arr_list[$i].'">'.$tmp['ten'].'</a>';
			}
		}

		$linkdan="&raquo; <a href='$com'>$title_tcat</a> $llinkdan &raquo; ".$tintuc_detail['ten'];	
		
		if($tintuc_detail['id']=='')
		{
			redirect("http://".$config_url."/404");	
		}
		
		if($tintuc_detail['title']!="")
		{
			$tit_c=$tintuc_detail['title'];
		}
		else
		{
			$title_bar=$tintuc_detail['ten']." - ";	
		}
		$title_tcat=$tintuc_detail['ten'];
		$keywords_c=$tintuc_detail['keywords'];
		$description_c=$tintuc_detail['description'];
		$sharefb_img='http://'.$config_url.'/'._upload_tintuc_l.$tintuc_detail['photo'];
		
		#Lấy tin cung loai
		$d->reset();
		$sql="select tenkhongdau_$lang as tenkhongdau,ten_$lang as ten,ngaytao from #_tintuc where hienthi =1 and id<>".$tintuc_detail['id']." and type='$type' order by stt,id desc limit 0,8";
		$d->query($sql);
		$tintuc=$d->result_array();
		
		## Update luot xem
		$d->reset();
		$sql_lanxem = "UPDATE #_tintuc SET luotxem=luotxem+1  WHERE id='".$tintuc_detail['id']."'";
		$d->query($sql_lanxem);
		
	}else{
		#tin tuc chi tiet
		$d->reset();
		$sql="select id,ten_$lang as ten,noidung_$lang as noidung,title_$lang as title,keywords_$lang as keywords,description_$lang as description from #_tintuc where hienthi=1 and type='$type'";
		$d->query($sql);
		$tintuc_detail=$d->fetch_array();	

		// if($tintuc_detail['id']=='')
		// {
		// 	redirect("http://".$config_url."/404");	
		// }
		
		if($tintuc_detail['title']!="")
		{
			$tit_c=$tintuc_detail['title'];
		}
		else
		{
			$title_bar=$title_tcat." - ";	
		}
		$title_tcat=$tintuc_detail['ten'];
		$keywords_c=$tintuc_detail['keywords'];
		$description_c=$tintuc_detail['description'];
	
	}
	$left_check = true;

	$d->reset();
	$sql="select id,ten_$lang as ten,tenkhongdau_$lang as tenkhongdau from #_tintuc where hienthi=1 and type='gioi-thieu' order by stt,id desc";
	$d->query($sql);
	$danhmucbaiviet=$d->result_array();
?>