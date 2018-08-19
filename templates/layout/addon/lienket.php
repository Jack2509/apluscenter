<?php
$d->reset();
$sql = "select * from #_lkweb where hienthi=1 and type='lkwebft' order by stt,id desc ";
$d->query($sql);
$lienket = $d->result_array();
?>
<div class="lienket">
	<p>Kết nối với chúng tôi</p> 
	<ul class="ds_lk">
		<?php for($i=0;$i<count($lienket);$i++){?>
		<li><a href="<?=$lienket[$i]['url']?>" target="_blank"><img src="<?=_upload_hinhanh_l.$lienket[$i]['photo']?>" alt="<?=$lienket[$i]['ten']?>" />  </a></li>
		<?php } ?>
	</ul>
</div>