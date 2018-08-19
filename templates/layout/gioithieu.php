<?php
$d->reset();
$sql_slider = "select mota_$lang,ten_$lang,thumb from #_info where type='gioithieu' ";
$d->query($sql_slider);
$row_gioithieu = $d->fetch_array();

$d->reset();
$sql = "select thumb_vi,link,mota_$lang,ten_$lang from #_photo where hienthi=1 and type='ha_gt' order by stt,id desc";
$d->query($sql);
$ha_gt = $d->result_array();
?>
<div class="contant_gioithieu">
	<div class="margin_auto">
		<div class="box_gt">
			<div class=" clear_fix">
				<div class="box_gt_ha">
					<div class="box_ha">
						<a href="<?=$ha_gt[$i]["link"]?>" title=""><img src="thumb/500x355/1/<?=_upload_hinhanh_l.$row_gioithieu["thumb"]?>" alt="<?=$row_gioithieu['ten_'.$lang]?>"></a>
					</div>
					<span class="khung_nho"></span>
				</div>
				<div class="box_gt_mota wow fadeInUp animated" data-wow-duration="1s">
					<div class="title_gioithieu" >
						<a href="gioi-thieu.html" title="Giới thiệu"><h2 class="gioithieutinh"><?=$row_gioithieu['ten_'.$lang]?></h2> </a>
					</div>
					<div class="info_gioithieu">
						<?=$row_gioithieu['mota_'.$lang]?>
					</div>
					<div class="clear"></div>
					<div class="xemthem_gt"> <a href="gioi-thieu.html" title="Giới thiệu"><?=_xemthem?></a> </div>
				</div>

			</div>
			
		</div>
	</div>
</div>