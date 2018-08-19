<?php
$d->reset();
$sql = "select photo,mota_$lang, ten_$lang,tenkhongdau,ngaytao from #_baiviet where type='thicong' and noibat<>0 order by stt,id limit 0,6";
$d->query($sql);
$duan_nb = $d->result_array();
?>
<div class="clear"></div>
<div class="tintuc_index">
	<div class="container">
		<div class="thanh_title"><h2> Dự án thi công </h2> </div>
		<div class="thicong_slick content_mar_20">
			<?php for($i=0;$i<count($duan_nb);$i++){?>
			<div class="">
				<div class="item_tuyensinh wow fadeInUp" data-wow-duration="<?=0.1*$i*3?>s" >
					<div class="color_tuyensinh ">
						<a href="thi-cong/<?=$duan_nb[$i]['tenkhongdau']?>.html"><img src="thumb/375x245/1/<?=_upload_baiviet_l.$duan_nb[$i]['photo']?>" alt="<?=$duan_nb[$i]['ten_'.$lang]?>"></a>
					</div>
					<div class="hover_tuyensinh">
						<div class="ts_ngaytao">
						<p class="ts_day"><b><?=date('d',$duan_nb[$i]['ngaytao']);?></b></p>
							<p>Tháng</p>
							<p class="ts_mon"><b><?=date('m',$duan_nb[$i]['ngaytao']);?></b></p>
						</div>
						<a href="thi-cong/<?=$duan_nb[$i]['tenkhongdau']?>.html"><h3><?=$duan_nb[$i]['ten_'.$lang]?> </h3></a>
						<?=catchuoi($duan_nb[$i]['mota_'.$lang],150)?>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
		<div class="chitiet_pro"><p><a href="thi-cong.html" title="">Xem dự án đang triển khai</a></p></div>

		<div class="clear"></div>
		
	</div>
</div>
<script type="text/javascript">
	$().ready(function(){
		$('.thicong_slick').slick({
			dots: false,
			infinite: true,
			speed: 1500,
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 4,
					slidesToScroll: 1,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					arrows:false
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					arrows:false
				}
			},
			{
				breakpoint: 450,
				settings: {
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows:false
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
			]
		});
	});
</script>