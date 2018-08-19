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
<div id="info">
  <div id="sanpham">
    <?php include _template."layout/left.php";?>
    <div class="info">
      <div class="khung">
        <div class="thanh_title"><h2> <span> <?=$title_detail?></span></h2> </div>
        <div class="khung_bootstrap">
          <div class="wap_flex">
            <?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
            <div class="wap_item1">
              <div class="item2 wow fadeInUp" data-wow-duration="<?=0.1*$j*3?>s" >
                <div class="product_img">
                  <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html"><img src="thumb/280x260/2/<?=_upload_product_l.$product[$j]['photo']?>" alt="<?=$product[$j]['ten_'.$lang]?>" /></a>
                </div>
                <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html"><h3><?=$product[$j]['ten_'.$lang]?></h3></a>
                <div class="chitiet_pro"><a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html" title="">Chi tiết</a></div>
              </div>
            </div>
            <?php } ?>
          </div>
          <div class="clear"></div>
          <div class="paging"><?=$paging?></div>
        </div>
      </div>
    </div>
  </div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>
<div style='display:none'>
  <div id='inline_content'></div>
</div>