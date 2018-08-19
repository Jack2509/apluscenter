<div id="info">
<div id="sanpham">
<div class="khung">
        <div class="thanh_title"><h2><?=$title_detail?></h2></div><div class="clear" style="height:5px;"></div>
          <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){ ?> 
          <div class="box_video col-md-3 col-md-3 col-sm-4 col-xx-6 col-xs-12">
              <a href="video/<?=$tintuc[$i]['tenkhongdau']?>.html" >
                <img src="http://img.youtube.com/vi/<?=youtobi($tintuc[$i]['links'])?>/sddefault.jpg" border="0" align="left" />
              </a>
              <a href="video/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=$tintuc[$i]['ten_vi']?>"><h3><?=$tintuc[$i]['ten_'.$lang]?></h3></a>
              <div class="video_info">
                <span class="view_vid"><?=$tintuc[$i]['luotxem']?> views</span> - <span class="ngaydang_vid"><?=date('d/m/Y',$tintuc[$i]['ngaytao']);?></span>
              </div>
          </div>
         <?php }?>
        <div align="center" ><div class="paging"><?=$paging?></div></div>

</div>
</div>
</div>