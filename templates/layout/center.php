<?php

$d->reset();
$sql = "select id,ten_$lang,mota_$lang,ngaytao,photo,tenkhongdau from #_baiviet where hienthi=1 and type='tintuc' order by stt asc";
$d->query($sql);
$row_tintuc = $d->result_array();

$d->reset();
$sql = "select id, ten_$lang,links from #_video where hienthi=1 and type='video' order by stt asc";
$d->query($sql);
$result_video = $d->result_array();
?>
<script src="js/ImageScroller.js" language="javascript"></script>
<div id="center">
  <div class="container">
    <div class="video-clip1"> 
      <div class="title_ttsk" >
        <h2 class="gioithieutinh" style="color: #000">Fanpage </h2> 
      </div>
      <div class="fanpage_fabook" >
        
        <div id="fb-root"></div>
        <script>(function(d, s, id) {
          var js, fjs = d.getElementsByTagName(s)[0];
          if (d.getElementById(id)) return;
          js = d.createElement(s); js.id = id;
          js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.6";
          fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
        <div class="fb-page" data-href="<?=$row_setting['facebook']?>" data-tabs="timeline" data-width="380" data-height="325" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="<?=$row_setting['facebook']?>"><a href="<?=$row_setting['facebook']?>">Facebook</a></blockquote></div></div>
      </div>
      <div class="clear"></div>

    </div><!-- .End video-clip -->
    <div class="box_center">
      <div class="video-clip" >
        <div class="title_ttsk" >
          <h2 class="gioithieutinh" style="color: #000">Tin tức sự kiện </h2> 
        </div>
        <div class="content_video">
        <div class="tin_nhat">
          <div class="tin_nhat_img">
            <a href="tin-tuc/<?=$row_tintuc[0]['tenkhongdau']?>.html" title=""><img src="thumb/370x240/1/<?=_upload_baiviet_l.$row_tintuc[0]['photo']?>" alt="<?=$row_tintuc[0]['ten_'.$lang]?>"></a>
          </div>
          <h5><a href="tin-tuc/<?=$row_tintuc[0]['tenkhongdau']?>.html" title=""><?=$row_tintuc[0]['ten_'.$lang]?></a></h5>
          <?=catchuoi($row_tintuc[0]['mota_'.$lang],180)?>
          <?php /*?>
          <div class="xemthem_tin"><a href="tin-tuc/<?=$row_tintuc[0]['tenkhongdau']?>.html" title="">
            <?=_xemthem?>
          </a></div>
          <?php */?>
        </div>
          <div id="ctsdivch" style="text-align:center; position:relative;  overflow:hidden; height: 375px;">
            <table width="100%" border="0" cellspacing="0" cellpadding="0" id="ctstblch" style="position:relative; margin:0px">
              <?php for ($i=0; $i <count($row_tintuc) ; $i++) {  ?>
              <tr>
                <td valign="top">
                  <table width="100%" cellspacing="0" cellpadding="0" border="0">
                    <tr>
                      <td valign="top" class="box_tinnb">
                        <div class="box_tinnb_img effect-v1">
                          <a href="tin-tuc/<?=$row_tintuc[$i]['tenkhongdau']?>.html" title="<?=$row_tintuc[$i]['ten_'.$lang]?>">
                            <img src="thumb/150x100/1/<?=_upload_baiviet_l.$row_tintuc[$i]['photo']?>" alt="<?=$row_tintuc[$i]['ten_'.$lang]?>">
                          </a>
                        </div>
                        <a href="tin-tuc/<?=$row_tintuc[$i]['tenkhongdau']?>.html" ><h4><?=$row_tintuc[$i]['ten_'.$lang]?></h4></a>
                        <?=catchuoi($row_tintuc[$i]['mota_'.$lang],120)?>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <?php } ?>
            </table>
            <script type="text/javascript">createScroller("myScroller", "ctsdivch", "ctstblch",0,50,1,0,1);</script>
          </div>
        </div>
      </div>
    </div><!-- . End center -->
    <div class="clear"></div>
  </div><!-- container -->
</div>