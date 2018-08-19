<div id="info">

  <div class="khung">       

    <div class="thanh_title"><h2><?=$title_detail?></h2></div>

    <div class="khung_bootstrap">
      <div class="wap_flex">
        <?php for($j=0,$count_sp=count($tintuc);$j<$count_sp;$j++){?>
        <div class="wap_item2">
          <div class="item2 wow fadeInUp" data-wow-duration="<?=0.1*$j*3?>s">
            <div class="product_img">
              <a href="<?=$com?>/<?=$tintuc[$j]['tenkhongdau']?>.html">
                <img src="<?=_upload_baiviet_l.$tintuc[$j]['thumb']?>" alt="<?=$tintuc[$j]['ten_'.$lang]?>" />
              </a>
            </div>
            <a href="<?=$com?>/<?=$tintuc[$j]['tenkhongdau']?>.html"><h3><?=$tintuc[$j]['ten_'.$lang]?></h3></a>
              <div class="info">
                <?=$tintuc[$j]['mota_'.$lang]?>
              </div>

            <div class="clear"></div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="clear"></div>
      <div class="paging"><?=$paging?></div> 
    </div>






  </div>
</div> 