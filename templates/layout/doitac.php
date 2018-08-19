
<?php
$d->reset();
$sql= "select * from #_photo where hienthi=1 and type='doitac' order by stt,id desc";
$d->query($sql);
$doitac = $d->result_array();

?>

<div class="list_carousel_dt">
	<div class="margin_auto">
		<div class="doitac">
			<div class="slick_doitac">
				<?php for($j=0,$count_ch=count($doitac);$j<$count_ch;$j++){?>
				<div>
					<div class="box_doitac">
						<a href="<?=$doitac[$j]['link']?>" target="_blank">
						<img src="thumb/165x95/1/<?=_upload_hinhanh_l.$doitac[$j]['thumb_vi']?>" alt="<?=$doitac[$j]['ten_'.$lang]?>" />
						</a>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	$().ready(function(){
		$('.slick_doitac').slick({
			dots: false,
			infinite: true,
			speed: 1500,
			slidesToShow: 6,
			slidesToScroll: 1,
			autoplay: true,
			arrows:true,
			responsive: [
			{
				breakpoint: 1024,
				settings: {
					slidesToShow: 5,
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