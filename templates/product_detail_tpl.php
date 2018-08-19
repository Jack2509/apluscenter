
<link href="js/magiczoomplus/magiczoomplus.css" rel="stylesheet" type="text/css" media="screen"/>
<script src="js/magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.thanhtoannhanh').click(function(e) {
      var pid = $(this).data('id');
      var soluong = $('.soluong_12').val();
      if(soluong <= 0){
        alert('Bạn chưa chọn số lượng !');
        return false;
      }
      $.ajax({
        type: "POST",
        url: "ajax/add_giohang.php",
        data: {pid:pid,soluong:soluong},
        success: function(string){
          var getData = $.parseJSON(string);
          var result = getData.result_giohang;
          var count = getData.count;
          if(result > 0) {
            alert('Bạn đã thêm thành công sản phẩm này vào giỏ hàng');
            window.location.href="gio-hang.html";
          }
          else if (result == -1)alert('Sản phẩm này không tồn tại');
          else if (result == 0)
            { alert('Sản phẩm này đã có trong giỏ hàng'); window.location.href="gio-hang.html";
        }
      }
    });
    });
  });
</script>
<script language="javascript">
  function addtocart(pid){
    document.form_giohang.productid.value=pid;
    document.form_giohang.command.value='add';
    document.form_giohang.submit();
  }
</script>
<form name="form_giohang" action="index.php" method="post">
  <input type="hidden" name="productid" />
  <input type="hidden" name="command" />
</form>
<?php //include _template."layout/dieuhuong_detail.php";?>
<div class="clear"></div>
<div id="info">
  <div id="sanpham">
      <?php include _template."layout/left.php";?>

    <div class="info">
      <div class="khung">
        <div class="thanh_title"> <h2> <span class="dau_dau"><?=$title_detail?> <?=_chitiet?></span></h2></div>
        <div class="khung_1 col-md-12 col-sm-12 col-xx-12 col-xs-12 box_content">
          <div class="clear"></div>
          <div class="frame_images col-md-6 col-sm-6 col-xx-12 col-xs-12" >
            <div class="row">
              <div class="app-figure" id="zoom-fig">
                <a href="<?=_upload_product_l.$row_detail['photo']?>" id="Zoom-1" class="MagicZoom" title="<?=$row_detail['ten_'.$lang]?> .">
                  <img src="<?=_upload_product_l.$row_detail['photo']?>" alt="<?=$row_detail['ten_'.$lang]?>" width="250" />
                </a>
              </div>
              <div class="selectors">
                <?php include _template."layout/jssor.php";?>
              </div>
            </div>
          </div>
          <ul class="khung_thongtin col-md-6 col-sm-6 col-xx-12s col-xs-12">
            <li><h1><?=$row_detail['ten_'.$lang]?></h1></li>
            <li class="MASP"><b><?=_masp?> :</b> <?=$row_detail['masp']?></li>
            <li class="MASP"><b>Chất liệu :</b> <?=$row_detail['chatlieu']?></li>
            <li class="MASP"><b>Màu sắc :</b> <?=$row_detail['mausac']?></li>
            <li class="MASP"><b>Kích thước :</b> <?=$row_detail['kichthuoc']?></li>
            <li class="MASP"><b>Xuất xứ :</b> <?=$row_detail['xuatxu']?></li>
            <li class="MASP"><b>Tình trạng :</b> <?=$row_detail['tinhtranghang']?></li>

            <li class="MASP"><b><?=_luotxem?> :</b> <?=$row_detail['luotxem']?></li>
            <?php if($row_detail['giacu']>0){ ?><li class="giacu_detail">Giá trước đây : <span><?php if($row_detail['giacu']==0) echo _lienhe; else echo number_format ($row_detail['giacu'],0,",",".")." VNĐ";?></span></li> <?php } ?>
              <li class="gia_detail"><b><?=_gia?> :</b> <?php if($row_detail['giaban']==0) echo _lienhe; else echo number_format ($row_detail['giaban'],0,",",".")." VNĐ";?></li>
              <?php /* ?> <li class="MASP">Số lượng : <input type="number" size="1" class="soluong_12" value="1" /> <div class="thanhtoannhanh" data-id="<?=$row_detail['id']?>">Đặt hàng ngay</div> </li>*/?>
              <li>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-574cff40f17ff9c4"></script>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <div class="addthis_native_toolbox"></div>
              </li>
            </ul>
            <!-- khungthongtin -->
            <div class="clear"></div>
            <div id="container_product">
              <div id="tabs">
                <ul>
                  <li class="thongtinsp">Thông số kỹ thuật</li>
                </ul>
                <div class="clear"></div>
                <div id="tab-1" style="display: block;">
                  <div class="noidung_ta" style="clear:left;"><?=$row_detail['noidung_'.$lang]?>
                    <div class="phantrang"></div>
                  </div>
                </div>
              </div>
            </div> <!-- container_product -->
          </div>
          <div class="clear"></div>
          <!--    <div class="title-center" style="margin:10px 0"> <h4>Mời bạn đánh giá câu hỏi</h4> <div class="clear"></div></div> -->
          <?php //include _template."layout/comment.php"; ?>
          <div class="thanh_title"><h4> <span> <?=_sanphamcungloai?></span></h4></div>
          <div class="khung_bootstrap">
            <div class="wap_flex">
              <?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
              <div class="wap_item1">
                <div class="item2 wow fadeInUp" data-wow-duration="<?=0.1*$j*3?>s" >
                  <div class="product_img">
                    <a href="<?=$com?>/<?=$product[$j]['tenkhongdau']?>.html"><img src="thumb/280x260/2/<?=_upload_product_l.$product[$j]['photo']?>" alt="<?=$product[$j]['ten_'.$lang]?>" /></a>

                  </div>
                  <a href="<?=$com?>/<?=$product[$j]['tenkhongdau']?>.html"><h3><?=$product[$j]['ten_'.$lang]?></h3></a>
                  <div class="chitiet_pro"><a href="<?=$com?>/<?=$product[$j]['tenkhongdau']?>.html" title="">Chi tiết</a></div>
                </div>
              </div>
              <?php } ?>
            </div>
            <div class="clear"></div>
            <div class="paging"><?=$paging?></div>
          </div>
        </div><!-- khung -->
      </div>
    </div>
  </div>
    <!-- info -->