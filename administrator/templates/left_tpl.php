<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="images/logo.png"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>

  <?php /*?>
  <li class="product_li <?php if($_GET['com']=='product' || $_GET['com']=='order' || $_GET['com']=='excel') echo ' activemenu' ?>" id="menu2"><a href="" title="" class="exp"><span>Sản phẩm</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['act']=='man_list') echo ' class="this"' ?>><a href="index.php?com=product&act=man_list&type=product">Quản lý danh mục 1</a></li>
      <li<?php if($_GET['act']=='man_cat') echo ' class="this"' ?>><a href="index.php?com=product&act=man_cat&type=product">Quản lý danh mục 2</a></li>
      <li<?php if($_GET['act']=='man_item') echo ' class="this"' ?>><a href="index.php?com=product&act=man_item&type=product">Quản lý danh mục 3</a></li>
      <li<?php if($_GET['act']=='man' && $_GET['com']!='order') echo ' class="this"' ?>><a href="index.php?com=product&act=man&type=product">Quản lý sản phẩm</a></li>
    <li<?php if($_GET['type']=='thongtinsp') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=thongtinsp">Thông tin sản phẩm</a></li>
    </ul>
  </li>  


  <li class="article_li <?php if($_GET['type']=='thietke') echo ' activemenu' ?>" id="menu_dv"><a href="" title="" class="exp"><span>Thiết kế</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='thietke') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=thietke">Danh mục cấp 1</a></li>
      <li<?php if($_GET['type']=='thietke') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_cat&type=thietke">Danh mục cấp 2</a></li>
      <li<?php if($_GET['type']=='thietke') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=thietke">Quản lý dịch vụ</a></li>
    </ul>
  </li>
<?php */?>
  <li class="article_li <?php if($_GET['type']=='dichvu') echo ' activemenu' ?>" id="menu_dv"><a href="" title="" class="exp"><span><!-- Dịch vụ --> giảng viên</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='dichvu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=dichvu">Danh mục cấp 1</a></li>
      
      <li<?php if($_GET['type']=='dichvu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=dichvu">Quản lý <!-- dịch vụ --> giảng viên</a></li>
    
    </ul>
  </li>

  <li class="article_li <?php if($_GET['type']=='duan') echo ' activemenu' ?>" id="menu_dv"><a href="" title="" class="exp"><span><!-- Dự án -->giáo án</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['type']=='duan') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man_list&type=duan">Danh mục cấp 1</a></li>
      
      <li<?php if($_GET['type']=='duan') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=duan">Quản lý <!-- dự án -->giáo án</a></li>
    
    </ul>
  </li>

<li class="article_li <?php if($_GET['com']=='baiviet') echo ' activemenu' ?>" id="menu_gt"><a href="" title="" class="exp"><span>Bài viết</span><strong></strong></a>
  <ul class="sub">

    <li<?php if($_GET['type']=='tintuc') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tintuc">Quản lý tin tức</a></li>

<!--     <li<?php if($_GET['type']=='tuvan') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tuvan">Quản lý tư vấn</a></li>
 -->
    <li<?php if($_GET['type']=='tuyendung') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=tuyendung">Quản lý tuyển dụng</a></li>

    <li<?php if($_GET['type']=='gioithieu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=gioithieu">Quản lý tin giới thiệu</a></li>

    <li<?php if($_GET['type']=='thoikhoabieu') echo ' class="this"' ?>><a href="index.php?com=baiviet&act=man&type=thoikhoabieu">Quản lý Thời khóa biểu</a></li>

  </ul>
</li>
<?php /*?>
<li class="article_li <?php if($_GET['com']=='download') echo ' activemenu' ?>" id="menu_gt"><a href="" title="" class="exp"><span>Download</span><strong></strong></a>
  <ul class="sub">
    <li<?php if($_GET['type']=='download') echo ' class="this"' ?>><a href="index.php?com=download&act=man&type=download">Hồ sơ năng lực</a></li>
  </ul>
</li>

<li class="album_li<?php if($_GET['com']=='album') echo ' activemenu' ?>" id="menu_abs"><a href="#" title="" class="exp"><span>Công trình</span><strong></strong></a>
    <ul class="sub">
      <li<?php if($_GET['act']=='man') echo ' class="this"' ?>><a href="index.php?com=album&act=man&type=album" title=""> Album công trình </a></li>
    </ul>
  </li> 

<li class="article_li <?php if($_GET['com']=='info' || $_GET['type']=='ha_gt') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
  <ul class="sub">
    <li<?php if($_GET['type']=='gioithieu') echo ' class="this"' ?>><a href="index.php?com=info&act=capnhat&type=gioithieu">Giới thiệu</a></li>
  </ul>
</li> 
<?php */?>
<li class="video_li<?php if($_GET['com']=='video') echo ' activemenu' ?>" id="menu_v"><a href="#" title="" class="exp"><span>Video</span><strong></strong></a>
  <ul class="sub">
    <li<?php if($_GET['com']=='video') echo ' class="this"' ?>><a href="index.php?com=video&act=man&type=video" title="">Video</a></li>
  </ul>
</li>

<li class="template_li<?php if($_GET['com']=='setting' || $_GET['com']=='newsletter' || $_GET['com']=='bannerqc'  || $_GET['com']=='company') echo ' activemenu' ?>" id="menu5"><a href="#" title="" class="exp"><span>Thông tin công ty</span><strong></strong></a>
  <ul class="sub">
    <li<?php if($_GET['type']=='logo') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=logo" title="">Logo</a></li>
    <li<?php if($_GET['type']=='favicon') echo ' class="this"' ?>><a href="index.php?com=bannerqc&act=capnhat&type=favicon" title="">Favicon</a></li>
    <li<?php if($_GET['type']=='lienhe') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=lienhe" title="
    ">Liên hệ</a></li>
    <?php /* ?><li<?php if($_GET['type']=='footer') echo ' class="this"' ?>><a href="index.php?com=company&act=capnhat&type=footer" title="
    ">Footer</a></li> */?> 

    <li<?php if($_GET['type']=='slogan') echo ' class="this"' ?>><a href="index.php?com=slogan&act=capnhat&type=slogan" title="">Câu Slogan</a></li>

    <li<?php if($_GET['com']=='setting') echo ' class="this"' ?>><a href="index.php?com=setting&act=capnhat" title="">Cấu hình chung</a></li>
    <li<?php if($_GET['com']=='newsletter') echo ' class="this"' ?>><a href="index.php?com=newsletter&act=man" title="">Gửi Mail</a></li> 

  </ul>
</li>

<li class="marketing_li<?php if($_GET['com']=='yahoo' || $_GET['com']=='lkweb') echo ' activemenu' ?>" id="menu6"><a href="#" title="" class="exp"><span>Hổ Trợ Online</span><strong></strong></a>
  <ul class="sub">

    <li <?php if($_GET['com']=='lkweb') echo ' class="this"' ?>><a href="index.php?com=lkweb&act=man&type=lkweb" title="">Liên kết mạng xã hội </a></li>
     <li <?php if($_GET['com']=='lkweb') echo ' class="this"' ?>><a href="index.php?com=lkweb&act=man&type=lkwebft" title="">Liên kết mạng xã hội footer</a></li> 
    <!-- <li <?php if($_GET['com']=='yahoo') echo ' class="this"' ?>><a href="index.php?com=yahoo&act=man&type=yahoo" title="">Quản lý yahoo</a></li> -->

  </ul>
</li>

<li class="gallery_li<?php if($_GET['com']=='photo') echo ' activemenu' ?>" id="menu7"><a href="#" title="" class="exp"><span>Hình Ảnh - Slider</span><strong></strong></a>
  <ul class="sub">
    <li<?php if($_GET['type']=='slider') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=slider" title="">Hình ảnh slider</a></li>
    <li<?php if($_GET['type']=='doitac') echo ' class="this"' ?>><a href="index.php?com=photo&act=man_photo&type=doitac" title="">Hình ảnh đối tác </a></li>
  </ul>
</li>




</ul>