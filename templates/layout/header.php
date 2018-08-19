<?php
$d->reset();
$sql_banner_top= "select thumb_$lang from #_photo where type='logo'";
$d->query($sql_banner_top);
$logo_top = $d->fetch_array();
$d->reset();
$sql_banner_top= "select photo_$lang from #_photo where type='bannermb'";
$d->query($sql_banner_top);
$bannermb = $d->fetch_array();
$d->reset();
$sql_banner_top= "select thumb_$lang from #_photo where type='banner'";
$d->query($sql_banner_top);
$banner_top = $d->fetch_array();

$d->reset();
$sql = "select * from #_photo where type='slogan' limit 0,1";
$d->query($sql);
$slogan = $d->fetch_array();
?>
<!--  <a href="tel:<?=$row_setting['hotline']?>"><div class="callto"></div></a>  -->

  <div class="top_header">
    <div class="margin_auto">
          <marquee width="40%" direction="left"><h4 style="text-transform:uppercase"><?=$row_setting['slogan_vi']?></h4>  </marquee>
          
          <div class="hea_right">
            <span class="sohl"><?=$row_setting['hotline']?></span>
              <?php include _template."layout/addon/lienkettop.php"; ?>
          </div>
    </div>
  </div>

<!-- banner -->






<div id="banner" class="clear_fix keo_chuot_menu">
   <div class="margin_auto">
        <div id="logo">
          <a href="index.html" > <img src="<?=_upload_hinhanh_l.$logo_top['thumb_'.$lang]?>" alt="Banner"> </a>
        </div>
        <div id="main_menu"><?php include _template."layout/menu.php";?></div>

   </div>
</div>