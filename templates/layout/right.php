<?php
$d->reset();
$sql = "select * from #_baiviet where  hienthi=1 and noibat<>0 and type='khuyenmai' order by stt,id desc";
$d->query($sql);
$row_khuyenmai = $d->result_array();
?>
<div id="right">
 <div class="danhmuc">
  <div class="menu_left">
    <?php for ($i=0; $i < count($row_khuyenmai); $i++) {  ?>
    <div class="box_khuyenmai">
      <a href="khuyen-mai/<?=$row_khuyenmai[$i]['tenkhongdau']?>.html">
        <img src="<?=_upload_baiviet_l.$row_khuyenmai[$i]['thumb']?>" alt="<?=$row_khuyenmai[$i]['ten_'.$lang]?>">
      </a>
    </div>
    <?php } ?>
  </div>


</div>

</div>