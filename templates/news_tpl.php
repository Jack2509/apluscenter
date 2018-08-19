<?php //include _template."layout/dieuhuong_new.php";?>
<div id="info">
  <?php //include _template."layout/left_bv.php";?>
  <div class="khung">
    <div class="hd-cttb clear_fix"><p><?=$title_detail?></p> </div>
    <div class="box_content">
      <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){  ?>
      <div class="box_new">
        <div class="box_new_img">
          <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" ><img src="<?=_upload_baiviet_l.$tintuc[$i]['thumb']?>" border="0" alt="<?=$tintuc[$i]['ten_'.$lang]?>"  /></a>
        </div>
        <div class="box_new_info">
          <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" ><h2><?=$tintuc[$i]['ten_'.$lang]?></h2></a>
          <?php if($com=='tin-tuc') {?>
          <span style=" color:rgba(153,153,153,1);"> <?=_ngaydang?> : <?=date('d/m/Y - g:i A',$tintuc[$i]['ngaytao']);?></span><br />
          <?php } ?>
          <?=_substr($tintuc[$i]['mota_'.$lang],150)?>
          <p>
            <span class="total-view"> <?=$tintuc[$i]['luotxem']?></span>
            <span class="xemtiep"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>.html" > <?=_xemtiep?> </a></span>
          </p>
        </div>
      </div>
      <?php }?>
      <div class="clear"></div>
    </div>
    <div align="center" ><div class="paging"><?=$paging?></div></div>
  </div>
</div>