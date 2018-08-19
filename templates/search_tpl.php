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
    <div class="thanh_title"> <h2> <span> Search ' <?=$_GET['keywords']?> ' </span></h2> </div>

    <div class="khung">
      <?php if(count($product)!=0){?>
      <div class="khung_bootstrap">
        <div class="wap_flex">
          <?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
          <?php $type_ar = $product[$j]['type']; ?>

          <div class="box_new">
            <div class="box_new_img">
              <a href="<?=$com_s[$type_ar]?>/<?=$product[$j]['tenkhongdau']?>.html" ><img src="<?=_upload_baiviet_l.$product[$j]['thumb']?>" border="0" alt="<?=$product[$j]['ten_'.$lang]?>"  /></a>
            </div>
            <div class="box_new_info">
              <a href="<?=$com_s[$type_ar]?>/<?=$product[$j]['tenkhongdau']?>.html" ><h2><?=$product[$j]['ten_'.$lang]?></h2></a>
              <?php if($com=='tin-tuc') {?>
              <span style=" color:rgba(153,153,153,1);"> <?=_ngaydang?> : <?=date('d/m/Y - g:i A',$product[$j]['ngaytao']);?></span><br />
              <?php } ?>
              <?=_substr($product[$j]['mota_'.$lang],150)?>
              <p>
                <span class="total-view"> <?=$product[$j]['luotxem']?></span>
                <span class="xemtiep"><a href="<?=$com_s[$type_ar]?>/<?=$product[$j]['tenkhongdau']?>.html" > <?=_xemtiep?> </a></span>
              </p>
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="clear"></div>
        <div class="paging"><?=$paging?></div> 
      </div>
      <?php } else {?><div style="text-align:center; color:#FF0000; font-weight:bold; font-size:22px; text-transform:uppercase;" >Chưa Có Tin Cho Mục này .</div> <?php }?>

    </div>
  </div>


</div> 