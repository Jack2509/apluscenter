<?php
$d->reset();
$sql = "select id, ten_$lang,links from #_video where hienthi=1 and type='video' order by stt asc";
$d->query($sql);
$result_video = $d->result_array();
?>
<div class="container_video">
	<div class="container">
		<div class="thanh_title"><h4> <?=_videoclip?></h4></div>
		<div class="video_slider clear_fix">
			<div id="box_video">
				<?php  $arr =explode("=", $result_video[0]['links']); ?>
				<iframe width="100%" height="495" src="https://www.youtube.com/embed/<?=$arr[1]?>" frameborder="0" allowfullscreen></iframe>
			</div>
			<div class="select_video"  >
				<div class="slick_video">
					<?php for ($i=0; $i <count($result_video) ; $i++) {?>
					<div>
						<div class="Box_vi">
							<img data-href="https://www.youtube.com/embed/<?=youtobi($result_video[$i]['links'])?>" src="http://img.youtube.com/vi/<?=youtobi($result_video[$i]['links'])?>/0.jpg" border="0"/>
							<h6><?=$result_video[$i]['ten_'.$lang]?></h6>
						</div>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
