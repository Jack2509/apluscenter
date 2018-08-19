  <?php include _template."layout/dieuhuong_new.php";?>

  <link rel="stylesheet" type="text/css" href="plugin/dkdn_custom/style.css">

  <?php 
  $d->reset();
  $sql="select count(id) as cid from #_comment where url='http://$config_url/$com/".$row_detail['tenkhongdau'].".html'";
  $d->query($sql);
  $ccm12=$d->fetch_array();


  ?>
  
      <div class="thanh_title"><h1><?=$title_detail?> về: <?=$row_detail['tieude']?></h1> </div>

      <div class="dkdn_box" style="width:100%;">
        <div class="ask-info">
          <img src="images/avartar.png" alt="<?=$row_detail['ten_vi']?>"><h2>[HỎI] <?=$row_detail['tieude']?> </h2>
          <ul>
            <li class="reply"><?=$ccm12['cid']?> trả lời</li>
            <li class="view"><?=$row_detail['luotxem']?> lượt xem</li>                       

            <li class="ques">bởi: <span><?=$row_detail['ten']?></span></li>
            <li class="time"><?=ngay_thang($row_detail['ngaytao'])?> ngày trước</li>
          </ul>
        </div>
        <div class="news-description">
          <p><?=$row_detail['ten_vi']?></p>
          <?=$row_detail['noidung_vi']?>
        </div>
        <?php include _template."layout/comment.php"; ?>


      </div>




