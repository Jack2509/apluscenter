
<?php 
$d->reset();
$sql = "select thumb_$lang,link from #_photo where type='bg_duan' ";
$d->query($sql);
$banner_center = $d->fetch_array();

$d->reset();
$sql = "select ten_$lang,thumb,tenkhongdau from #_baiviet where hienthi=1 and type='duan' and noibat<>0 order by stt,id ";
$d->query($sql);
$result_dv = $d->result_array();

$d->reset();
$sql = "select noidung_$lang from #_info where type='title_duan'  ";
$d->query($sql);
$title_duan = $d->fetch_array();
?>
<style type="text/css" media="screen">
	.wap_dichvu{
		background: url(<?=_upload_hinhanh_l.$banner_center['thumb_'.$lang]?>) no-repeat top center ;
	}
</style>

<?php if(count($result_dv>0)) {?>
<div class="wap_dichvu">
	<div class="container mar_am">
		<div class="thanh_title title_duan"><h2> Dự án tiêu biểu</h2> </div>
		<div class="info_title_da"><?=$title_duan['noidung_'.$lang]?></div>
		<div class="slick_sp">
			<?php for ($i=0; $i < count($result_dv); $i++) {  ?>
			<div >
				<div class="item wow bounceInUp center" data-wow-duration="<?=0.2*$i*3?>s">
					<div class="item_img effect-v4">
						<a href="du-an/<?=$result_dv[$i]['tenkhongdau']?>.html">
							<img src="<?=_upload_baiviet_l.$result_dv[$i]['thumb']?>" alt="<?=$result_dv[$i]['ten_'.$lang]?>">
						</a>
					</div>
					<div class="ten-dm">
						<a href="du-an/<?=$result_dv[$i]['tenkhongdau']?>.html"> <?=$result_dv[$i]['ten_'.$lang]?></a>
					</div>

				</div>
			</div>
			<?php } ?>
		</div>
		<div class="clear"></div>
	</div>
</div>
<?php } ?>
<script type="text/javascript">
	$().ready(function(){
		$('.slick_sp').slick({
			dots: false,
			infinite: true,
			speed: 1500,
			slidesToShow: 2,
			slidesToScroll: 1,
			autoplay: true,
			arrows:false,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 800,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 1,
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
			]
		});
	});

</script>