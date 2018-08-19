<?php

	// $d->reset();
	// $sql = "select * from #_baiviet_list where tenkhongdau='".$idl."' ";
	// $d->query($sql);
	// $row_detail_list = $d->fetch_array();


	// $d->reset();
	// $sql = "select * from #_baiviet_cat where tenkhongdau='".$idc."' ";
	// $d->query($sql);
	// $row_detail_cat = $d->fetch_array();
	// echo $sql;

	// $d->reset();
	// $sql = "select * from #_baiviet_list where id_cat='".$row_detail_cat['id']."' ";
	// $d->query($sql);
	// $row_detail_list = $d->fetch_array();

?>
<script type="text/javascript">
$(document).ready(function(){
	$('.cont-filter-attr input').click(function(){
		$('.cont-filter-attr input:checked').each(function(){
			var checkedValue = $(this).val();
			if(checkedValue){
				var id = $(this).val();
				link = link+''+id;
			}
		});
		window.location.href=link;
	});
});
</script>

<div class="dieuhuong">  

    <a href="" itemprop="url" title="<?=_trangchu?>"><span itemprop="title"><?=_trangchu?></span></a>
    <a href="<?=$com?>.html" itemprop="url" title="<?=$com?>"><span itemprop="title"><?=$title_detail?></span></a>
	<?php if($idl!=''){?>
		<a title="<?=$row_detail_list['ten_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail_list['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_list['ten_'.$lang]?></span></a>
	<?php } ?>

	<?php if($row_detail_cat['id']!=''){?>
		<a title="<?=$row_detail_list['ten_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail_list['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_list['ten_'.$lang]?></span></a>


		<a title="<?=$row_detail_cat['ten_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail_list['tenkhongdau']?>/<?=$row_detail_cat['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_cat['ten_'.$lang]?></span></a>
	<?php } ?>

	<?php if($row_detail_item['id']!=''){?>
	<a title="<?=$row_detail_item['ten_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail_list['tenkhongdau']?>/<?=$row_detail_cat['tenkhongdau']?>/<?=$row_detail_item['tenkhongdau']?>"><span itemprop="title"><?=$row_detail_item['ten_'.$lang]?></span></a>
	<?php } ?>

 	<a title="<?=$row_detail['ten_'.$lang]?>" itemprop="url" href="<?=$com?>/<?=$row_detail['tenkhongdau']?>.html"><span itemprop="title"><?=$row_detail['ten_'.$lang]?></span></a> 
	<div class="clear"></div>
</div>

