
    <?php 
      $sql_tintuc = "select * from #_album where hienthi=1 order by id desc";
      $d->query($sql_tintuc);
      $album = $d->result_array();
      
/*    var_dump($album);
      die();*/
    ?>
<div class="sanpham_nb">
	<div class="container">

    <div class="hd-cttb clear_fix"><p><?=_congtrinh?></p> </div>
		<div>
      <div class="congtrinh_tb">

        <?php for($j=0;$j<count($album);$j++){?>
        <div>
          <div class="box_album_index">
              <div class="album">
                  <img src="<?=_upload_album_l.$album[$j]['thumb']?>" alt="<?=$album[$j]['tenkhongdau']?>">
                  
                  <div class="hover_tuyensinh">
                      <h3><a href="cong-trinh/<?=$album[$j]['tenkhongdau']?>.html"><?=$album[$j]['ten_'.$lang]?></a> </h3>
                     
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