<div id="info">
      
      <div class="khung">       

      <div class="thanh_title"><h2><?=$title_detail?></h2></div>
      <div>
      <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){  ?> 
        <div class="download_box">
            <img src="<?=_upload_hinhanh_l.$tintuc[$i]['thumb']?>" border="0" alt='<?=$tintuc[$i]['ten']?>' align="left" width="230"  />
            <h3><?=$tintuc[$i]['ten']?></h3>
            <a href="<?=_upload_hinhanh_l.$tintuc[$i]['file']?>" >Download</a>
        </div>
       <?php }?>
       </div>
       <div align="center" ><div class="paging"><?=$paging?></div></div>
      </div>
</div> 