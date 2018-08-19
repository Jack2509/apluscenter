  <?php include _template."layout/dieuhuong_new.php";?>

  <div id="info">
    <?php if($_GET['idc']!='') {?>

    <?php 

    $d->reset();
    $sql = "select id,ten_$lang,tenkhongdau from #_baiviet_cat where hienthi=1 and type='".$type_bar."'  ";
    $d->query($sql);
    $diadiem_cat = $d->fetch_array();

    $d->reset();
    $sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and type='".$type_bar."' and tenkhongdau='".$diadiem_cat['idl']."' ";
    $d->query($sql);
    $diadiem_list = $d->fetch_array();


    ?>

    <div class="khung">       
      <div class="thanh_title"><h1><?=$title_detail?></h1></div>
      <div class="content_diemban">
        <?php 
        $d->reset();
        $sql = "select id,ten_$lang,tenkhongdau from #_baiviet where hienthi=1 and type='".$type_bar."' and id_cat='".$diadiem_cat['id']."' ";
        $d->query($sql);
        $diadiem = $d->result_array();
        ?>

        <div class="title_diemban"><?=$diadiem_cat['ten_'.$lang]?></div>
        <div class="clear"></div>
        <div style="margin: 0 -1px;">
          <?php for ($j=0; $j < count($diadiem); $j++) {  ?>
          <div class="content_box_diadiem">
            <div class="box_diadiem">
              <a href="diem-ban/<?=$diadiem[$j]['tenkhongdau']?>.html"><?=$diadiem[$j]['ten_'.$lang]?></a>
            </div>
          </div>
          <?php } ?>
          <div class="clear"></div>
        </div>
        <div class="clear"></div>
      </div>
    </div>

    <?php } elseif($idl!='') {?>

        <?php 
        $d->reset();
        $sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and id='".$row_detail['id']."' and type='".$type_bar."' ";
        $d->query($sql);
        $diadiem_list = $d->result_array();
        ?>

        <div class="khung">       
          <div class="thanh_title"><h1><?=$title_detail?></h1></div>
          <div class="content_diemban">
            <?php for($i=0, $count_tt=count($diadiem_list);$i<$count_tt;$i++){  ?>
            <?php 
            $d->reset();
            $sql = "select id,ten_$lang,tenkhongdau from #_baiviet_cat where hienthi=1 and type='".$type_bar."' and id_list='".$diadiem_list[$i]['id']."' ";
            $d->query($sql);
            $diadiem_cat = $d->result_array();
            ?>

              <div class="title_diemban"><?=$diadiem_list[$i]['ten_'.$lang]?></div>
              <div class="clear"></div>
              <div style="margin: 0 -1px;">
              <?php for ($j=0; $j < count($diadiem_cat); $j++) {  ?>
              <div class="content_box_diadiem">
                  <div class="box_diadiem">
                    <a href="diem-ban/<?=$diadiem_list[$i]['tenkhongdau']?>/<?=$diadiem_cat[$j]['tenkhongdau']?>"><?=$diadiem_cat[$j]['ten_'.$lang]?></a>
                  </div>
              </div>
              <?php } ?>
              <div class="clear"></div>
              </div>
            <?php }?>
            <div class="clear"></div>
          </div>
        </div>

    <?php }  elseif($idlo!='') {?>

        <?php 
        $d->reset();
        $sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and id in (".$row_detail['id_list'].") and type='".$type_bar."' ";
        $d->query($sql);
        $diadiem_list = $d->result_array();
        ?>

        <div class="khung">       
          <div class="thanh_title"><h1><?=$title_detail?></h1></div>
          <div class="content_diemban">
            <?php for($i=0, $count_tt=count($diadiem_list);$i<$count_tt;$i++){  ?>
            <?php 
            $d->reset();
            $sql = "select id,ten_$lang,tenkhongdau from #_baiviet_cat where hienthi=1 and type='".$type_bar."' and id_list='".$diadiem_list[$i]['id']."' ";
            $d->query($sql);
            $diadiem_cat = $d->result_array();
            ?>

              <div class="title_diemban"><?=$diadiem_list[$i]['ten_'.$lang]?></div>
              <div class="clear"></div>
              <div style="margin: 0 -1px;">
              <?php for ($j=0; $j < count($diadiem_cat); $j++) {  ?>
              <div class="content_box_diadiem">
                  <div class="box_diadiem">
                    <a href="diem-ban/<?=$diadiem_list[$i]['tenkhongdau']?>/<?=$diadiem_cat[$j]['tenkhongdau']?>"><?=$diadiem_cat[$j]['ten_'.$lang]?></a>
                  </div>
              </div>
              <?php } ?>
              <div class="clear"></div>
              </div>
            <?php }?>
            <div class="clear"></div>
          </div>
        </div>

    <?php } else { ?>

    <?php 
    $d->reset();
    $sql = "select id,ten_$lang,tenkhongdau from #_baiviet_list where hienthi=1 and type='".$type_bar."' ";
    $d->query($sql);
    $diadiem_loai = $d->result_array();
    ?>

    <div class="khung">       
      <div class="thanh_title"><h1><?=$title_detail?></h1></div>
      <div class="content_diemban">
        <?php for($i=0, $count_tt=count($diadiem_loai);$i<$count_tt;$i++){  ?>

          <div class="content_box_diadiem">
            <div class="box_diadiem">
              <a href="diem-ban/<?=$diadiem_loai[$i]['tenkhongdau']?>"><?=$diadiem_loai[$i]['ten_'.$lang]?></a>
            </div>
          </div>
        <?php }?>
        <div class="clear"></div>
      </div>
    </div>
    <?php } ?>

  </div> 

  <style type="text/css">
    .content_diemban{border: 1px solid #000099; padding:0 2px;    padding-bottom: 2px;}
    .title_diemban{border: 1px solid #000099;color: rgb(0, 0, 255); font-weight: bold; text-align: center; padding: 3px 0; text-transform: uppercase; margin-top: 2px; padding: 4px 0;}
    .content_box_diadiem{width: 33.33%; float: left; padding:0 1px;}
    .box_diadiem{border: 1px solid #000099; margin-top: 2px; width: 100%;text-align: center;    padding: 4px 0;}
    .box_diadiem:nth-child(3n){margin-right: 0;}
    .box_diadiem a{color: #006; text-transform: uppercase; font-size: 15px;  }
    .box_diadiem:hover a{color: #f00;}
  </style>