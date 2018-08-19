<script language="javascript">
	function addtocart(pid){
		document.form_giohang.productid.value=pid;
		document.form_giohang.command.value='add';
		document.form_giohang.submit();
	}
</script>
<form name="form_giohang" action="index.php" method="post">
	<input type="hidden" name="productid" />
	<input type="hidden" name="command" />
</form>
<div id="info">
	<div id="sanpham">
		<div class="khung">
			<div class="thanh_title"><h2> Thiết kế kiến trúc</h2> </div>
			<div class="sp_right">
				
				<ul id="tabs" class="clear_fix">
					<?php for ($i=0; $i < count($product_l); $i++) {  ?>
					<li><a href="#" title="tab<?=$product_l[$i]['id']?>"><span><?=$product_l[$i]['ten_'.$lang]?></span></a></li>
					<?php } ?>
				</ul>
				<div id="contenttabs">
					<?php for ($i=0; $i < count($product_l); $i++) {  ?>
					<?php
					$d->reset();
					$sql = "select id,ten_$lang,thumb,tenkhongdau,mota_$lang from #_baiviet where hienthi=1 and type='thietke' and id_list='".$product_l[$i]['id']."' and noibat<>0 order by stt,id ";
					$d->query($sql);
					$product = $d->result_array();
					?>
					<div class="hiddentab" id="tab<?=$product_l[$i]['id']?>">
						<div class="owl-demo1">
							<?php for ($j=0; $j < count($product); $j++) {  ?>
							<div >
								<div class="item2 " >
									<div class="product_img">
										<a href="thiet-ke/<?=$product[$j]['tenkhongdau']?>.html"><img src="thumb/375x245/1/<?=_upload_baiviet_l.$product[$j]['thumb']?>" alt="<?=$product[$j]['ten_'.$lang]?>" /></a>
									</div>
									<div class="product_info">
										<a href="thiet-ke/<?=$product[$j]['tenkhongdau']?>.html"><h3><?=$product[$j]['ten_'.$lang]?></h3></a>
										<?=catchuoi($product[$j]['mota_'.$lang],170)?>
									</div>
								</div>
							</div>
							
							<?php } ?>
						</div>
						<div class="chitiet_pro"><p><a href="thiet-ke/<?=$product_l[$i]['tenkhongdau']?>" title="">Xem dự án đang triển khai</a></p></div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- info -->
<div class="clear"></div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<script type="text/javascript" src="js/owl_carousel/owl.carousel.min.js"></script>
<script>
	$(document).ready(function() {
		$(".owl-demo1").owlCarousel({
          autoPlay: 3000, //Set AutoPlay to 3 seconds
          items : 3,
          navigation: false,
          pagination: false,
          responsiveClass:false,
          responsive:{
          	0:{
          		items:1,
          		nav:false
          	},
          	600:{
          		items:2,
          		nav:false
          	},
          	800:{
          		items:3,
          		nav:false
          	},
          	1000:{
          		items:3,
          		nav:false,
          		loop:false,
         		pagination: false,
          	}
          }
      });

	});
</script>
<script>
	$(document).ready(function() {
		$("#contenttabs .hiddentab").hide(); // Initially hide all contenttabs
		$("#tabs li:first").attr("id","current"); // Activate first tab
		$("#contenttabs div.hiddentab:first").fadeIn(); // Show first tab content
		$('#tabs a').click(function(e) {
			e.preventDefault();
			$('.slick_sp').slick();
			$("#contenttabs .hiddentab").hide(); //Hide all contenttabs
			$("#tabs li").attr("id",""); //Reset id's
			$(this).parent().attr("id","current"); // Activate this
			$('#' + $(this).attr('title')).fadeIn(); // Show contenttabs for current tab
		});
	})
</script>
<?php /* ?>
<div class="khung_bootstrap">
	<div class="wap_flex">
		<?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
		<div class="wap_item2">
			<div class="item2 wow fadeInUp" data-wow-duration="<?=0.1*$j*3?>s" >
				<div class="product_img">
					<a href="thiet-ke/<?=$product[$j]['tenkhongdau']?>.html"><img src="thumb/280x260/1/<?=_upload_product_l.$product[$j]['thumb']?>" alt="<?=$product[$j]['ten_'.$lang]?>" /></a>
					<div class="info">
						<?=catchuoi($product[$j]['mota_'.$lang],170)?>
					</div>
				</div>
				<a href="thiet-ke/<?=$product[$j]['tenkhongdau']?>.html"><h3><?=$product[$j]['ten_'.$lang]?></h3></a>
				<p class="giaban"><?php if($product[$j]['giaban']==0) echo _lienhe; else echo number_format ($product[$j]['giaban'],0,",",".")." VNĐ";?></p>
			</div>
		</div>
		<?php } ?>
	</div>
	
</div>
*/?>