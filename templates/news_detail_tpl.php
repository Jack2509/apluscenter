  <?php //include _template."layout/dieuhuong_new.php";?>

  <div id="info">
    <div id="sanpham">
      <?php //include _template."layout/left_bv.php";?> 

      <div class="khung">
        <div class="hd-cttb clear_fix"><p><?=$title_detail?></p> </div>
        <div class="noidung">
          <h1 class="tieude"> <?=$row_detail['ten_'.$lang]?></h1>

          <?=$row_detail['noidung_'.$lang]?>
          <div class="clear"></div>
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-574cff40f17ff9c4"></script>
          <!-- Go to www.addthis.com/dashboard to customize your tools -->
          <div class="addthis_native_toolbox"></div>

        </div>

        <div style="clear:left;"></div><br /><br />
        <?php //include _template."layout/comment.php"; ?>
        <div class="hd-cttb clear_fix"><p><?=_othernews?></p> </div>
        <?php foreach($tintuc as $tinkhac){?>
        <div style="padding-left:10px; height:auto;"><h5><a href="<?=$com?>/<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><img src="images/sao.png" border="0" />&nbsp;&nbsp;<span style="font-size:14px; color:#666;"><?=$tinkhac['ten_'.$lang]?></span></a></h5></div>

        <?php }?>
      </div>  
      
    </div>
  </div>
