<?php
$d->reset();
$sql_slider = "select mota_$lang,ten_$lang,thumb from #_baiviet where type='gioithieu' and noibat=1 order by stt,id ";
$d->query($sql_slider);
$row_gioithieu = $d->fetch_array();

$d->reset();
$sql= "select * from #_photo where hienthi=1 and type='doitac' order by stt,id desc";
$d->query($sql);
$doitac = $d->result_array();
?>
<div id="gioithieu_dtac">
	<div class="margin_auto">
		<div class="gt">
			<div class="title_gioithieu" >
				<a href="gioi-thieu.html" title="Giới thiệu"><h2 class="gioithieutinh"><?=$row_gioithieu['ten_'.$lang]?></h2> </a>
			</div>
			<div class="info_gioithieu">
				<?=$row_gioithieu['mota_'.$lang]?>
			</div>
			<div class="clear"></div>
			<div class="xemthem_gt"> <a href="gioi-thieu.html" title="Giới thiệu"><?=_xemthem?></a> </div>
		</div>
		<div class="dtac">
			<div class="title_gioithieu" >
				<a href="gioi-thieu.html" title="Giới thiệu"><h2 class="gioithieutinh">Khách hàng tiêu biểu</h2> </a>
			</div>
			<div class="slick_doitac">
				<?php for($j=0,$count_ch=count($doitac);$j<$count_ch;$j+=2){?>
				<div>
				<div class="col1dv">
					<div class="box_doitac">
						<a href="<?=$doitac[$j]['link']?>" target="_blank">
						<img src="<?=_upload_hinhanh_l.$doitac[$j]['thumb_vi']?>" alt="<?=$doitac[$j]['ten_'.$lang]?>" />
						</a>
					</div>
					<?php if($j+1<$count_ch){ ?>
					<div class="box_doitac">
						<a href="<?=$doitac[$j+1]['link']?>" target="_blank">
						<img src="<?=_upload_hinhanh_l.$doitac[$j+1]['thumb_vi']?>" alt="<?=$doitac[$j+1]['ten_'.$lang]?>" />
						</a>
					</div>
					<?php } ?>
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
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2,
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