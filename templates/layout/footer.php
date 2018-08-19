<?php
$d->reset();
$sql = "select noidung_$lang from #_company where type='footer' ";
$d->query($sql);
$footer = $d->fetch_array();
$d->reset();
$sql_banner_top= "select ten_$lang,tenkhongdau,id from #_baiviet where hienthi=1 and type='hotro' order by stt,id ";
$d->query($sql_banner_top);
$row_hotro = $d->result_array();
?>
<div id="bottom">
	<div class="container ">
		<div class="row">
			<div class="bottom">
				<div class="col-md-6 col-lg-6 col-sm-6 col-xx-12 col-xs-12 box_thongke wow fadeInRight  animated" data-wow-duration="0.5s" data-wow-delay="0.5s">
					<div class="title_ft">
							<h4> <?=$row_setting['ten_'.$lang]?></h4>
					</div>
					<div class="thongtin_bt" >
						<ul>
							<li><img src="images/ft1.png" alt="<?=$row_setting['diachi_'.$lang]?>"><?=$row_setting['diachi_'.$lang]?> </li>
							<li><img src="images/ft2.png" alt="<?=$row_setting['hotline']?>"><?=$row_setting['hotline']?> </li>
							<li><img src="images/ft3.png" alt="<?=$row_setting['email']?>"><?=$row_setting['email']?> </li>
							<li><img src="images/ft4.png" alt="<?=$row_setting['website']?>"><?=$row_setting['website']?> </li>
						</ul>
					</div>
					<div class="clear"></div>
					<?php include _template."layout/addon/lienket.php"; ?>
				</div>

				<div class="col-md-3 col-lg-3 col-sm-3 col-xx-12 col-xs-12 box_hethong wow fadeInRight  animated" data-wow-duration="0.5s" data-wow-delay="0.5s">
					<div class="title_ft">
							<h4> Liên kết trang</h4>
					</div>
					<ul>
						 <li ><a href="gioi-thieu.html"><span><?=_gioithieu?></span></a></li>

						 <li ><a href="giang-vien.html"><span>Giảng viên</span> </a>
						    
						 </li>


						 <li ><a href="giao-an.html"><span>Giáo án</span></a> </li>

						 <li ><a href="tin-tuc.html"><span><?=_tintuc?></span></a> </li>
						
						<li ><a href="tuyen-dung.html"><span><?=_tuyendung?></span></a> </li>
						
						<li ><a href="lien-he.html"> <span> <?=_lienhe?> </span></a></li> 
					</ul>
					<div class="clear"></div>
				</div>

				<div class="col-md-3 col-lg-3 col-sm-3 col-xx-12 col-xs-12 box_hethong wow fadeInRight  animated" data-wow-duration="0.5s" data-wow-delay="0.5s">
					<div class="title_ft">
							<h4> Thống kê truy cập</h4>
					</div>

					<div class="thongke">
						<?php include _template."layout/addon/thongke.php"; ?>
					</div>
					<div class="clear"></div>
				</div>

				
				<div class="clear"></div>
			</div>
		</div>
	</div>
</div>
<div class="copy">
	<div class="container">
		Copyright © 2017 <?=$row_setting['website']?>. All rights reserved. Web design : NiNa Co., Ltd
<ul>
	<li><?=_dangonline?> : <span><?php $count=count_online();echo $tong_xem=$count['dangxem'];?></span></li>

	<li><?=_tongtruycap?> : <span><?=$all_visitors?></span></li>
	
</ul>
	</div>
</div>
<div id="footer1" style="z-index:9999999;position: fixed;bottom: 0;width: 100%;left: 0;">
	<table style="width:100%;text-align:center;margin:auto;background: #056bca;z-index:9999999;
	border: 3px solid #e8e8e8;" cellpadding="0" cellspacing="0">
	<tbody>
		<tr>
			<td><a class="link_title blink_me" href="tel:<?=$row_setting["hotline"]?>"><img src="http://yensaotamyen.com/images/goidien.png"> Gọi điện</a></td>
			<td height="50"><a class="link_title" target="_blank" href="sms:<?=$row_setting["hotline"]?>"><img src="http://yensaotamyen.com/images/tuvan.png"> SMS</a></td>
			<td><a class="link_title" href="lien-he.html"><img src="http://yensaotamyen.com/images/chiduong.png">Chỉ Đường</a></td>
		</tr>
	</tbody>
</table>
</div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD5Mevy_rl8U4ZyBB8i5jmdxfvb9Cg5UoE&sensor=false"></script>
<script>
	function initialize_bt() {
		var myLatlng = new google.maps.LatLng(<?=$row_setting['toado']?>);
		var mapOptions = {
			zoom: 17,
			center: myLatlng
		};
		var map = new google.maps.Map(document.getElementById('map_canvas_bt'), mapOptions);
// var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#039BB2; font-weight:bold; text-transform: uppercase;'><?=$row_setting['ten_'.$lang]?></th></tr><tr><th>Địa chỉ : <?=$row_setting['diachi_'.$lang]?></th></tr><tr><th>Điện thoại : <?=$row_setting['dienthoai']?></th></tr><tr><th>Email : <?=$row_setting['email']?></th></tr></table>";
// var infowindow = new google.maps.InfoWindow({
// 	content: contentString
// });
var marker = new google.maps.Marker({
	position: myLatlng,
	map: map,
	title: "<?=$row_setting['ten_'.$lang]?>"
});
// infowindow.open(map, marker);
}
google.maps.event.addDomListener(window, 'load', initialize_bt);
</script>