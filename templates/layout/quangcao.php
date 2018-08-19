<?php
$d->reset();
$sql = "select ten_$lang,id,link,thumb_vi from #_photo where hienthi=1 and type='quancao' order by stt,id desc ";
$d->query($sql);
$row_quancao = $d->result_array();
?>
<div id="quangcao">
	<div class="margin_auto">
		<div class="slick_quangcao">
			<?php for ($i=0; $i < count($row_quancao); $i++) {  ?>
				<div>
					<div class="box_qc effect-v1">
						<a href="<?=$row_quancao[$i]['link']?>" title=""><img src="thumb/390x180/1/<?=_upload_hinhanh_l.$row_quancao[$i]['thumb_vi']?>" alt="<?=$row_quancao[$i]['ten_vi']?>"> </a>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
