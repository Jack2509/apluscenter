<?php 
$d->reset();
$sql= "select ten_$lang,id,tenkhongdau from #_baiviet_list where hienthi=1   and type='dichvu' order by stt,id desc";
$d->query($sql);
$productlist = $d->result_array();
/*var_dump($productlist);
die();*/

?>


<div class="sanpham_nb">
	<div class="container">
    <?php for($i=0; $i< count($productlist); $i++){
      $d->reset();
      $sql= "select ten_$lang,id,tenkhongdau,thumb,mota_$lang from #_baiviet where hienthi=1  and type='dichvu' and id_list='".$productlist[$i]['id']."' order by stt,id desc";
      $d->query($sql);
      $productnb = $d->result_array();
    ?>
    <div class="hd-sp-new-left clear_fix"><p><?=$productlist[$i]['ten_'.$lang]?> </p><span class="so_ttspl">0<?=$i+1?></span> </div>
		<div>
      <div class="sanpham_tb">
        <?php for($j=0,$count_sp=count($productnb);$j<$count_sp;$j++){?>
        <div>
          <div class="item1 " >
            <div class="box_item1">
              <a href="dich-vu/<?=$productnb[$j]['tenkhongdau']?>.html">
                <div class="product_img">
                  <img src="thumb/280x200/1/<?=_upload_baiviet_l.$productnb[$j]['thumb']?>" alt="<?=$productnb[$j]['ten_'.$lang]?>" />
                </div>
              </a>
              <a href="dich-vu/<?=$productnb[$j]['tenkhongdau']?>.html"><h3><?=$productnb[$j]['ten_'.$lang]?></h3></a>
              <div class="clear"></div>
                <div class="mota"><?=catchuoi($productnb[$j]['mota_'.$lang],120)?></div>
                <div class="xemthem_pro"><a href="dich-vu/<?=$productnb[$j]['tenkhongdau']?>.html"><?=_xemthem?></a> </div>
              <div class="clear"></div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <?php }?>








  </div>
</div>

<script type="text/javascript">
  $().ready(function(){
    $('.sanpham_tb').slick({
      dots: false,
      infinite: true,
      speed: 1500,
      slidesToShow: 4,
      slidesToScroll: 1,
      autoplay: true,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 800,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 450,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
      ]
    });
  });

</script>