
<?php //include _template."layout/dieuhuong_new.php";?>

<div id="info">
	<div id="sanpham">        
		<div class="khung">

			<div class="thanh_title"><h1> <span> <?=$title_detail?></span></h1> </div>
			<div class="clear"></div>
			<div class="noidung">
				<div class="banggia">


					<ul id="tabs">
						<?php for ($i=0; $i < count($row_bg_list); $i++) { ?>
						<li><a href="#" title="tab_<?=$row_bg_list[$i]['id']?>"><?=$row_bg_list[$i]['ten_'.$lang]?></a></li>
						<?php } ?>
						
					</ul>

					<div id="contenttabs"> 
						<?php for ($i=0; $i < count($row_bg_list); $i++) { ?>
						<?php 
							$d->reset();
							$sql = "select ten_$lang,id from #_baiviet_cat where hienthi=1 and type='".$type_bar."' and id_list='".$row_bg_list[$i]['id']."' order by stt,id";
							$d->query($sql);
							$row_bg_cat = $d->result_array();
						?>

						<div class="hidden1 tab_hidden" id="tab_<?=$row_bg_list[$i]['id']?>">
							<?php for ($j=0; $j <count($row_bg_cat) ; $j++) {  ?>
							<?php 
								$d->reset();
								$sql = "select ten_$lang,id,giaban from #_baiviet where hienthi=1 and type='".$type_bar."' and id_cat='".$row_bg_cat[$j]['id']."' order by stt,id";
								$d->query($sql);
								$row_bg = $d->result_array();
							?>
							<div>
							<ul>
								<h3><?=$row_bg_cat[$j]['ten_'.$lang]?></h3>
							</ul>
								
								<?php for ($t=0; $t < count($row_bg); $t++) {  ?>
								<ul>
									<li><?=$row_bg[$t]['ten_'.$lang]?></li>
									<li><?=$row_bg[$t]['giaban']?></li>
								</ul>
								<?php } ?>
							</div>
							<?php } ?>

						</div>
						<?php } ?>

					</div>

				</div>


			</div>
			<div class="clear"></div>
		</div>
	</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>


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