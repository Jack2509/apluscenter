
    <?php 
      $sql_tintuc = "select * from #_baiviet_list where type='dichvu' and hienthi=1 order by id desc";
      $d->query($sql_tintuc);
      $album = $d->result_array();
      
/*    var_dump($album);
      die();*/
    ?>
<div class="sanpham_nb">
	<div class="container">

    <div class="hd-cttb clear_fix"><p>giảng viên</p> </div>
		<div>
      <div class="congtrinh_tb">

        <?php for($j=0;$j<count($album);$j++){?>
        <div>
          <div class="box_album_index">
              <div class="album">
                  <img src="<?=_upload_baiviet_l.$album[$j]['thumb']?>" alt="<?=$album[$j]['tenkhongdau']?>">
                  <div class="phongto">
                    <div class="ten_tbmm">
                    <a href="giang-vien/<?=$album[$j]['tenkhongdau']?>"><?=$album[$j]['ten_'.$lang]?></a> 
                    </div>
                    <p><?=catchuoi($album[$j]['mota_vi'],60)?></p>
                    <div class="xemthem_gt">
                    <a href="giang-vien/<?=$album[$j]['tenkhongdau']?>"><?=_xemthem?></a>
                    </div>
                  </div>
              </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>









  </div>
</div>

<script type="text/javascript">
  $().ready(function(){
    $('.congtrinh_tb').slick({
      dots: true,
      infinite: true,
      speed: 1500,
      slidesToShow: 3,
      slidesToScroll: 1,
      autoplay: true,
      arrows: true,
      responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
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