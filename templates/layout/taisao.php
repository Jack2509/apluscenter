<?php
$d->reset();
$sql = "select thumb, ten_$lang,mota_$lang,name_$lang from #_baiviet where type='visao' order by stt,id ";
$d->query($sql);
$row_visao = $d->result_array();
?>
<div class="wap_taisao">
	<div class="margin_auto">
		
		<div class="mogioi">
			<div class="thanh_title "><h2> Vì sao chọn chúng tôi</h2> </div>
			<div class="content_mogioi">
				<div class="mogioi_slick">
					<?php for ($i=0; $i < count($row_visao); $i++) { ?>
					<div>
						<div class="box_mogioi wow bounceInUp center" data-wow-duration="<?=0.2*$i*3?>s">
							<div class="box_mogioi_img"><span> <img src="<?=_upload_baiviet_l.$row_visao[$i]['thumb']?>" alt="<?=$row_visao[$i]['ten_'.$lang]?>"></span></div>
							<div class="mogioi_info">
								<h4><?=$row_visao[$i]['ten_'.$lang]?></h4>
								<?=$row_visao[$i]['mota_'.$lang]?>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		
	</div>
</div>
<script type="text/javascript">
	$().ready(function(){
		$('.mogioi_slick').slick({
			dots: false,
			infinite: true,
			speed: 1500,
			slidesToShow: 3,
			slidesToScroll: 1,
			autoplay: true,
			arrows:false,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
					infinite: true,
					dots: true
				}
			},
			{
				breakpoint: 768,
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