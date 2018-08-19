<?php
$d->reset();
$sql = "select * from #_gia where hienthi=1 order by stt,id desc";
$d->query($sql);
$row_giaban = $d->result_array();

$d->reset();
$sql = "select * from #_yahoo where hienthi=1 order by stt";
$d->query($sql);
$row_yahoo = $d->result_array();

$d->reset();
$sql_banner_top= "select thumb_$lang from #_photo where type='banner_qc_hotro'";
$d->query($sql_banner_top);
$banner_hotro = $d->fetch_array();

?>


</script>

<div id="left_slider">

  <div class="hotro_tuvan">
    <img src="images/bghotro.png" alt="Tư vấn hỗ trợ">
    <div class="box_hotro_tuvan">
      <p>Tổng đài tư vấn</p>
      <p class="box_hot_hotro"><?=$row_setting['hotline']?></p>
      <div class="hoidap"><a href="hoi-dap.html"> Gửi câu hỏi</a></div>
    </div>
  </div>
  <img src="<?=_upload_hinhanh_l.$banner_hotro['thumb_'.$lang]?>" alt="Banner hỗ trợ">
  
</div>




