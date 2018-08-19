<?php
session_start();
@define ( '_template' , '../templates/');
@define ( '_lib' , '../libraries/');
@define ( '_source' , '../sources/');
if(!isset($_SESSION['lang']))
{
	$_SESSION['lang']='vi';
}
$lang=$_SESSION['lang'];
include_once _lib."config.php";
include_once _lib."constant.php";
include_once _lib."functions.php";
include_once _lib."functions_share.php";
include_once _lib."class.database.php";
include_once _source."lang_$lang.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
include_once _lib."counter.php";
include_once "class_paging_ajax.php";
$d = new database($config['database']);
if(isset($_POST["page"]))
{
	if($_POST["dieukien"] ) {
		$dieukien = " and ".$_POST["dieukien"]."<>0 ";
	}
	$paging = new paging_ajax();
	
	$paging->class_pagination = "pagination";
	$paging->class_active = "active";
	$paging->class_inactive = "inactive";
	$paging->class_go_button = "go_button";
	$paging->class_text_total = "total";
	$paging->class_txt_goto = "txt_go_button";
	$paging->per_page = 4;
	$paging->page = $_POST["page"];
	$paging->text_sql = "select ten_$lang,id,photo,tenkhongdau,giaban from table_product where type='product' and hienthi=1  $dieukien  order by stt,id asc ";
	$result_pag_data = $paging->GetResult();
	//dump($result_pag_data);
	$message = '';
	$paging->data = "" . $message . "";
}
?>
<div class="khung_bootstrap">
	<div class="wap_flex">
		<?php
		$j=0;
		while ($row = mysql_fetch_array($result_pag_data)) { $j++;?>
		<div class="wap_item2">
		<div class="item2 wow fadeInUp" data-wow-duration="<?=0.1*$j*3?>s" >
			<div class="product_img">
				<a href="san-pham/<?=$row['tenkhongdau']?>.html"><img src="thumb/230x220/2/<?=_upload_product_l.$row['photo']?>" alt="<?=$row['ten_'.$lang]?>" /></a>		
			</div>
			<a href="san-pham/<?=$row['tenkhongdau']?>.html"><h3><?=$row['ten_'.$lang]?></h3></a>
			<div class="chitiet_pro"><a href="san-pham/<?=$row['tenkhongdau']?>.html" title="">Chi tiết</a></div>
		</div>
		</div>
		<?php }
		if($j==0) echo "Chưa có sản phẩm ...."; else{ echo $paging->Load();}
		?>
	</div>
</div>
<div class="clear"></div>