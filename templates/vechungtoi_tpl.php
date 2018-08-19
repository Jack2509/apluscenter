
<?php //include _template."layout/dieuhuong_new.php";?>
<?php 
$d->reset();
$sql = "select id,ten_$lang,tenkhongdau,thumb,mota_$lang from #_baiviet where hienthi=1 and type='baiviet' order by stt,id ";
$d->query($sql);
$row_bv = $d->result_array();

$d->reset();
$sql = "select id,ten_$lang,mota_$lang from #_baiviet where hienthi=1 and type='taisao' order by stt,id ";
$d->query($sql);
$row_taisao = $d->result_array();

$d->reset();
$sql = "select thumb_vi,id,ten_$lang from #_photo where hienthi=1 and type='trungtam' order by stt,id ";
$d->query($sql);
$row_trungtam = $d->result_array();
?>
<div id="info">
	<div id="sanpham">        
		<div class="khung">

			<div class="thanh_title"><h1> <span> <?=$title_detail?></span></h1> </div>
			<div class="clear"></div>
			<div class="noidung">
				<?=$row_detail['noidung_'.$lang]?>

				<div id="content_bv">
					<?php for ($i=0; $i < count($row_bv); $i++) {  ?>
					<div class="baiviet_gt">
						<div class="baiviet_gt_img">
							<span>
								<img src="<?=_upload_baiviet_l.$row_bv[$i]['thumb']?>" alt="<?=$row_bv[$i]['ten_'.$lang]?>">
							</span>
						</div>
						<div class="baiviet_gt_info">
							<h5><?=$row_bv[$i]['ten_'.$lang]?></h5>
							<p><?=$row_bv[$i]['mota_'.$lang]?></p>
						</div>
					</div>
					<?php } ?>
				</div>

				<div id="content_trungtam">
					<div class="box_trungtam">
						<div class="title_ttam"> <h4>Hình ảnh <b>trung tâm</b> </h4> </div>
						<div>
							<ul class="bxslider">
								<?php for ($i=0; $i < count($row_trungtam); $i++) {  ?>
								<li><img src="<?=_upload_hinhanh_l.$row_trungtam[$i]['thumb_vi']?>" alt="<?=$row_trungtam[$i]['ten_'.$lang]?>" /></li>
								<?php } ?>
								
							</ul>
						</div>
					</div>
					<div class="box_trungtam">
						<div class="title_ttam"> <h4>TẠI SAO <b> CHỌN VINASMILE </b></h4> </div>
						<div class="taisao">
							<?php for ($i=0; $i <count($row_taisao) ; $i++) {  ?>
							<div class="box_taisao">
								<div class="title_ts"><?=$row_taisao[$i]['ten_'.$lang]?></div>
								<div class="info_ts"><?=$row_taisao[$i]['mota_'.$lang]?></div>
							</div>
							<?php } ?>
						</div>
					</div>
				</div>

			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>

<script src="js/jquery.bxslider.min.js"></script>
<!-- bxSlider CSS file -->
<link href="css/jquery.bxslider.css" rel="stylesheet" />

<script type="text/javascript" charset="utf-8" >
	jQuery(document).ready(function($) {
		$(".taisao .box_taisao:first .info_ts").show(); // Show first tab content
		$('.info_ts').css('display', 'none');
		var title_click = $('.box_taisao .title_ts');
		title_click.click(function(event) {
			
			if( title_click.hasClass('active') ){
				$('.info_ts').css('display', 'none');
				$('.box_taisao .title_ts').removeClass('active');
				$(this).removeClass('active');
				$(this).next().show();
				// $(this).next().hide();
				// $(this).removeClass('active');
			} else {
				$('.info_ts').css('display', 'none');
				$('.box_taisao .title_ts').removeClass('active');
				$(this).addClass('active');
				$(this).next().show();
			}
		});
	});
</script>