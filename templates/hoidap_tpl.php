  <?php include _template."layout/dieuhuong_new.php";?>

  <link href="css/bootstrap.css" type="text/css" rel="stylesheet" />
  <link href="css/faq/faq.css" type="text/css" rel="stylesheet" />
  <link rel="stylesheet" href="css/faq/colorbox/example3/colorbox.css" />
  <script src="css/faq/colorbox/jquery.colorbox.js"></script>
  <script type="text/javascript">
    $(document).ready(function(e) {
    // $(".inline").colorbox({inline:true, width:"40%"});
    // $('.question_frm').click(function(e) {
    //   if($(this).next().hasClass('mo')){
    //     $(this).next().removeClass('mo');
    //     $(this).next().addClass('dong');
    //     $(this).next().slideUp(200);
    //   }else{
    //     $(this).next().removeClass('dong');
    //     $(this).next().addClass('mo');
    //     $(this).next().slideDown(200);
    //   }

    //   return false;
    // });


  });
  </script>

  <link href="reCaptcha/style.css" rel="stylesheet" type="text/css">
  <script>
    $(document).ready(function() { 
 // refresh captcha
 $('img#captcha-refresh').click(function() {    
  change_captcha();
});
 function change_captcha()
 {
  document.getElementById('captcha').src="reCaptcha/get_captcha.php?rnd=" + Math.random();
}
});
  </script>

  <div id="info">
    <div class="col-md-9 col-lg-9 col-sm-12 col-xx-12 col-xs-12">
      <div class="row">
        <div class="khung"> 

          <div id="traloi">
            <div class="thanh_title"><h1>Câu hỏi thường gặp</h1></div>

            <div class="clear"></div>


            <div>

              <div style='display:block'>
                <div id='inline_content' style='padding:20px 10px; background:#fff;'>
                  <div class="noidung1">
                    <div class="dathoi"><h2>Đặt câu hỏi</h2></div>

                    <form class="" role="search" method="post" name="gui_cauhoi" action="">
                      <div class="input-group">
                        <span class="input-group-addon"><img src="css/faq/img/accuont.png" alt="icon" /></span>
                        <input type="text" class="form-control" placeholder="Họ tên" name="hoten" required="required">
                      </div>

                      <div class="input-group">
                        <span class="input-group-addon"><img src="css/faq/img/batquai.png" alt="icon" /></span>
                        <input type="email" class="form-control" placeholder="Email" name="email"  required="required">
                      </div>
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-sticky-note-o"></i></span>
                        <input type="text" class="form-control" placeholder="Tiêu đề" name="tieude"  required="required">
                      </div>
                      <div class="input-group">
                        <textarea cols="10" rows="5" name="chude" class="form-control" placeholder="Nhập câu hỏi . "  required="required"></textarea>
                      </div>

                      <div class="btn-primary">
                        <button type="submit">Gửi câu hỏi</button>
                      </div>

                    </form>
                    <div class="clear"></div>
                    <br />

                    <div class="clear"></div>
                  </div>
                </div>
              </div><div class="clear"></div>

              <ul> 
                <?php for($i=0;$i<count($tintuc);$i++){?>
                <li>
                  <div class="question_frm">
                    <img src="images/avartar.png" alt="<?=$tintuc[$i]['ten_vi']?>">
                    <a style="cursor:pointer" href="hoi-dap/<?=$tintuc[$i]['tenkhongdau']?>.html">[Hỏi] <?=$tintuc[$i]['tieude']?></a>
                    <span> bởi:<?=$tintuc[$i]['ten']?> - <?=date('d/m/Y - g:i A',$tintuc[$i]['ngaytao']);?></span>
                  </div>

                </li>
                <div class="clear"></div>
                <?php }?>
              </ul>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
          </div>
          <div class="clear"></div>
        </div>
        <div align="center" ><div class="paging"><?=$paging?></div></div>
      </div>
    </div>


    <div class="col-md-3 col-lg-3 col-sm-12 col-xx-12 col-xs-12">
      <div class="row">
        <?php include _template."layout/left_bv.php";?> 
      </div>
    </div>

  </div>
<!-- info -->