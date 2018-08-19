<style type="text/css">
@media(max-width: 800px){
  .box_vid{width:100%;clear:left;}
  .other_vid{width:100%;}
}
</style>
<div id="info">
<div id="sanpham">
<div class="container" style="margin-right:-40px;">

    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 col-xx-12"></div> 
    <div class="form_product col-lg-10 col-md-10 col-sm-12 col-xs-12 col-xx-12" style="padding-bottom:50px;">
        <div class="thanh_title"><h2><?=$title_detail?></h2></div><div class="clear" style="height:5px;"></div>
        <div class="content-2">
      

       <!-- <object width="100%" height="500"><param name="movie" value="//www.youtube.com/v/<?=youtobi($row_detail['links'])?>?version=3&amp;hl=vi_VN&amp;rel=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/<?=youtobi($row_detail['links'])?>?version=3&amp;hl=vi_VN&amp;rel=0" type="application/x-shockwave-flash" width="100%" height="500" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" ></embed></object> -->
      <div class="box_vid">
        <iframe width="100%" src="https://www.youtube.com/embed/<?=youtobi($row_detail['links'])?>?autoplay=1" frameborder="0" allowfullscreen></iframe>
        <div class="clear" style="height:10px;"></div>
        <h1><?=$row_detail['ten_vi']?></h1>
        <div class="clear"></div>
        <div class="vid_cmt">
        <div class="luotxem"><?=$row_detail['luotxem']?> views</span> - <span class="ngaydang_vid"><?=date('d/m/Y',$row_detail['ngaytao']);?></div>

         <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-55a5ff5b3a9222b9" async="async"></script>
                    <script src="https://apis.google.com/js/platform.js" async defer></script>
                   <?=get_social('','share');?>

          <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.5";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
          <div class="fb-comments" data-href="<?=getCurrentPageURL()?>" data-width="100%" data-numposts="5"></div>
        </div>
      </div>

        <div class="other_vid">
          <div class="title_other">Video khác</div><div class="clear"></div>
          <?php for($i=0, $count_tt=count($tintuc);$i<$count_tt;$i++){ ?> 
          <div class="box_video_detail">
              <a href="video/<?=$tintuc[$i]['tenkhongdau']?>.html" >
                <img src="http://img.youtube.com/vi/<?=youtobi($tintuc[$i]['links'])?>/sddefault.jpg" border="0" align="left" />
              </a>
              <div class="vid_info">
                <a href="video/<?=$tintuc[$i]['tenkhongdau']?>.html" title="<?=$tintuc[$i]['ten_vi']?>"><h3><?=$tintuc[$i]['ten_'.$lang]?></h3></a>
                <span class="view_vid"><?=$tintuc[$i]['luotxem']?> views</span> - <span class="ngaydang_vid"><?=date('d/m/Y',$tintuc[$i]['ngaytao']);?></span>
              </div>
          </div>
          <div class="clear"></div>
         <?php }?>
        </div>
      </div>
    </div><!-- form_product -->

</div><div class="clear"></div>
</div>
</div>