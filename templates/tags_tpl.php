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

    
        
    <div class="khung">
    <div class="thanh_title"><h2><?=$title_detail?></h2> </div>
    <div>
		<?php if(count($product)!=0){?>
        <?php for($j=0,$count_sp=count($product);$j<$count_sp;$j++){?>
           <div class="item" >
                <a href="san-pham/<?=$product[$j]['tenkhongdau']?>.html">
                    <img src="<?=_upload_product_l.$product[$j]['thumb']?>" alt="<?=$product[$j]['ten_'.$lang]?>" />
                     <h3><?=$product[$j]['ten_'.$lang]?></h3>
                     <p class="giaban"> Giá bán : <span> <?php if($product[$j]['giaban']==0) echo 'Liên hệ'; else echo number_format ($product[$j]['giaban'],0,",",",").' '.VND ; ?></span></p>
        
                </a>
                <div class="giohang"><img src="images/giohang_m.png" alt="giỏ hàng" onclick="addtocart(<?=$product[$j]['id']?>);" /></div>
            </div> 
        <?php } ?>
		<?php } else { ?>
    <div style="text-align:center; color:#FF0000; font-weight:900; font-size:22px; text-transform:uppercase;"> Chưa Có Tin Cho Mục này . </div>
    <?php }?>

</div>
<div class="clear"></div>
<div class="paging"><?=$paging?></div> 

</div>
</div>
</div>
<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1>


<div style='display:none'>
<div id='inline_content'></div>
</div>