<?php 
$d->reset();
$sql = "select thumb_$lang from #_photo where type='bg_camnang' ";
$d->query($sql);
$bg_camnang = $d->fetch_array();

$d->reset();
$sql = "select ten_$lang,tenkhongdau,id from #_baiviet_list where hienthi=1 and type='camnang' and noibat<>0 order by stt,id ";
$d->query($sql);
$camnang_list = $d->result_array();
?>
<style type="text/css" media="screen">
	.wap_camnang{
		background:#229bdd url(<?=_upload_hinhanh_l.$bg_camnang['thumb_'.$lang]?>) no-repeat top center ;
	}
</style>
<?php if(count($camnang_list)>0) {?>
<div class="wap_camnang">
	<div class="container">
		<div class="title_camnang"> <h5>Cẩm nang sài gòn</h5> 
			<ul id="tabs">
				<?php for ($i=0; $i < count($camnang_list); $i++) {  ?>
				<li><a href="#" title="tab<?=$i?>" ><?=$camnang_list[$i]['ten_'.$lang]?></a></li>
				<?php } ?>
			</ul>

		</div>
		<div>
			<div id="contenttabs"> 
				<?php for ($i=0; $i < count($camnang_list); $i++) {  ?>
				<?php 
				$d->reset();
				$sql = "select ten_$lang,tenkhongdau,id,photo,mota_$lang from #_baiviet where hienthi=1 and type='camnang' and id_list='".$camnang_list[$i]['id']."' and noibat<>0 order by stt,id limit 0,6";
				$d->query($sql);
				$camnang = $d->result_array();
				?>
				<?php if(count($camnang)>0) {?>
				<div class="hidden1" id="tab<?=$i?>">
					<div class="camnang_left">
						<div class="camnang">
							<a href="cam-nang-sai-gon/<?=$camnang[0]['tenkhongdau']?>.html" title="<?=$camnang[0]['ten_'.$lang]?>">
								<img src="thumb/607x452/1/<?=_upload_baiviet_l.$camnang[0]['photo']?>" alt="<?=$camnang[0]['ten_'.$lang]?>">
							</a>
							<div class="camnang_info">
								<a href="cam-nang-sai-gon/<?=$camnang[0]['tenkhongdau']?>.html" title="<?=$camnang[0]['ten_'.$lang]?>">
									<h3><?=$camnang[0]['ten_'.$lang]?></h3>
								</a>
								<?=$camnang[0]['mota_'.$lang]?>
							</div>
						</div>
					</div>
					<div class="camnang_right">
						<?php for ($j=1; $j < count($camnang); $j++) { ?>
						<div class="lex_camnang wow bounceInUp center" data-wow-duration="<?=0.2*$j*3?>s">
							<div class="camnang">
								<a href="cam-nang-sai-gon/<?=$camnang[$j]['tenkhongdau']?>.html" title="<?=$camnang[$j]['ten_'.$lang]?>">
									<img src="thumb/277x221/1/<?=_upload_baiviet_l.$camnang[$j]['photo']?>" alt="<?=$camnang[$j]['ten_'.$lang]?>">
								</a>
								<div class="camnang_info">
									<a href="cam-nang-sai-gon/<?=$camnang[$j]['tenkhongdau']?>.html" title="<?=$camnang[$j]['ten_'.$lang]?>">
										<h3><?=$camnang[$j]['ten_'.$lang]?></h3>
									</a>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<div class="clear"></div>
				</div>
				<?php } ?>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>

<script>
	$(document).ready(function() {
    $("#contenttabs .hidden1").hide(); // Initially hide all contenttabs
    $("#tabs li:first").attr("id","current"); // Activate first tab
    $("#contenttabs div.hidden1:first").fadeIn(); // Show first tab content
    
    $('#tabs a').click(function(e) {
    	e.preventDefault();        
        $("#contenttabs .hidden1").hide(); //Hide all contenttabs
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('title')).fadeIn(); // Show contenttabs for current tab
    });
})
</script>