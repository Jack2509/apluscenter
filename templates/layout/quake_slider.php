<?php
$d->reset();
$sql = "select thumb_vi,link,mota_$lang from #_photo where hienthi=1 and type='slider' order by stt,id desc";
$d->query($sql);
$slide_s = $d->result_array();
?>
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
<script type="text/javascript" src="js/jquery.slider.js"></script>
<link type="text/css" rel="stylesheet" href="css/style_slider.css" />
<style>
.jssorb05 div {
background-position: -7px -7px !important;
}
.jssorb05 .av {
background-position: -67px -7px !important;
}
.jssorb05 div:hover, .jssorb05 .av:hover {
background-position: -37px -7px;
}
.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
position: absolute;
width: 16px;
height: 16px;
background: url('/theme/img/b05.png') no-repeat;
overflow: hidden;
cursor: pointer;
}
.jssorb05 div, .jssorb05 div:hover, .jssorb05 .av {
position: absolute;
width: 30px !important;
height: 30px !important;
background: url('images/b05.png') no-repeat;
overflow: hidden;
cursor: pointer;
}
.jssorb05 {
position: absolute;
bottom: 70px !important;
left: 50px !important;
}
</style>
<div class="slider" data-role="content">
  <div id="slider1_container" style="position: relative; top: 0px; width: 1366px;height:520px; overflow: hidden; margin:0 auto;">
    <div u="slides" style="cursor: move; position: absolute;margin:0 auto;  top: 0px; width: 1366px; height: 520px; overflow: hidden;">
      <?php for($i=0;$i<count($slide_s);$i++){?>
      <div>
        <a  u=image href="<?=$slide_s[$i]["link"]?>" target="_blank">
          <img u=image src="thumb/1349x520/1/<?=_upload_hinhanh_l.$slide_s[$i]["thumb_vi"]?>"  alt="slider" />
        </a>
      </div>
      <?php } ?>
    </div>
    <div data-u="navigator" class="jssorb05" style="bottom:16px;right:16px;" data-autocenter="1">
      <!-- bullet navigator item prototype -->
      <div data-u="prototype" style="width:16px;height:16px;"></div>
    </div>
  </div>

</div>