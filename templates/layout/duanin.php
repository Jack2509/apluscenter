
<?php
$d->reset();
$sql= "select * from #_baiviet where hienthi=1 and type='duan' and noibat=1 order by stt,id desc";
$d->query($sql);
$doitac = $d->result_array();

?>

<div class="list_carousel_dt">
	<div class="margin_auto">
		<div class="hd-cttb clear_fix"><p>giáo án</p> </div>
		<div class="doitac">
			<div class="slick_duan">
				<?php for($j=0,$count_ch=count($doitac);$j<$count_ch;$j++){?>
				<div>
					<div class="box_doitac">
						<a href="giao-an/<?=$doitac[$j]['tenkhongdau']?>.html">
						<img src="<?=_upload_baiviet_l.$doitac[$j]['thumb']?>" alt="<?=$doitac[$j]['ten_'.$lang]?>" />
						</a>
						<div class="motamotdv">
							<a href="giao-an/<?=$doitac[$j]['tenkhongdau']?>.html"><h2><?=$doitac[$j]['ten_'.$lang]?></h2></a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$().ready(function(){
		$('.slick_duan').slick({
			dots: false,
			infinite: true,
			speed: 1500,
			slidesToShow: 4,
			slidesToScroll: 1,
			autoplay: true,
			arrows:false,
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
					slidesToShow: 4,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 450,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1
				}
			}
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
			]
		});
	});

</script>