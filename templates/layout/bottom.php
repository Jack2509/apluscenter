<?php
$d->reset();
$sql = "select ten_$lang,id,mota_$lang,thumb from #_baiviet where hienthi=1 and type='gioithieu' order by stt,id desc ";
$d->query($sql);
$row_tc = $d->result_array();

$d->reset();
$sql = "select ten_$lang,id,mota_$lang,tenkhongdau from #_info where type='thongtin' order by stt,id desc ";
$d->query($sql);
$row_thongtin = $d->fetch_array();

?>

<div id="tieuchuan">

  <?php for ($i=0; $i < count($row_tc) ; $i++) { ?>
  <div class="box_tieuchuan">
    <img src="<?=_upload_baiviet_l.$row_tc[$i]['thumb']?>" alt="<?=$row_tc[$i]['ten_'.$lang]?>">
    <h3><?=$row_tc[$i]['ten_'.$lang]?></h3>
    <p><?=$row_tc[$i]['mota_'.$lang]?></p>
  </div>
  <?php } ?>

</div>
<div id="thoigian">
  <div class="box_tg nhakhoa">
    <div class="box_nhakhoa">
      <h4><?=$row_thongtin['ten_'.$lang]?></h4>
      <div class="nhakhoa_info">
        <?=$row_thongtin['mota_'.$lang]?>
      </div>
      <div class="xemthem_gt"> <a href="thong-tin-nha-khoa.html" title="">Xem thêm</a> </div>


    </div>
  </div>
  <div class="box_tg giolam">
    <div class="title_giolam"> <p> Giờ làm việc</p></div>
    <p>Chúng tôi hân hạnh được phục vụ quý khách vào tất cả các ngày trong tuần với lịch làm việc như sau.</p>
    <ul>
      <li> <label> T2 - T7:</label> <b><?=$row_setting['thu2']?></b></li>
      <li> <label>Chủ nhật:</label> <b><?=$row_setting['chunhat']?></b></li>
    </ul>
  </div>
  <div class="box_tg">
    <div class="title_datlich"> <p>Đặt lịch hẹn</p> </div>
    <div class="datlich">
      <form method="post" name="frm" action="" enctype="multipart/form-data">
        <p><label><?=_hovaten?> : </label><input name="ten" type="text" class="tflienhe" id="ten" /></p>
        <p><label><?=_address?> : </label><input name="diachi" type="text"  class="tflienhe" id="diachi"/></p>
        <p><label><?=_dienthoai?> : </label> <input name="dienthoai" type="text" class="tflienhe" id="dienthoai"/></p>
        <!-- <p><label>Email : </label><input name="email" type="text" class="tflienhe" id="email"  /></p> -->
        <p><label><?=_noidung?> : </label>
          <textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
        </p>
        <p><label>&nbsp </label>
          <button type="button" onclick="js_submit12();">Đặt hẹn</button>
          </p> 
      </form>
    </div>
  </div>

</div>

<script language="javascript" src="js/my_script.js"></script>
<script language="javascript">
  function js_submit12(){
    if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
      document.getElementById('ten').focus();
      return false;
    }
    if(isEmpty(document.getElementById('diachi'), "Xin nhập Địa Chỉ.")){
      document.getElementById('diachi').focus();
      return false;
    }

    if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
      document.getElementById('dienthoai').focus();
      return false;
    }

    if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
      document.getElementById('dienthoai').focus();
      return false;
    }

    // if(!check_email(document.frm.email.value)){
    //   alert("Email không hợp lệ");
    //   document.frm.email.focus();
    //   return false;
    // }

    // if(isEmpty(document.getElementById('tieude'), "Xin nhập Chủ đề.")){
    //   document.getElementById('tieude').focus();
    //   return false;
    // }

    if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
      document.getElementById('noidung').focus();
      return false;
    }

    document.frm.submit();
  }
</script>