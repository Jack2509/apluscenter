<style>
#sanpham p{
	padding-left:20px;
	color:rgba(0,102,153,1);
	padding-top:5px;
}
</style>
<div id="info">
<div id="sanpham">

<div class="thanh_title"><h2>Đơn hàng hoàn tất</h2></div>
     
<div class="dathang_tc">
    <div style="clear:left;"></div>
    <div class="col-md-3 col-sm-3 col-xx-3 col-xs-12">
         <img src="images/icon/ok.png" alt="" />
    </div>
   
    
    <ul class="donhang_ht col-md-9 col-sm-9 col-xx-9 col-xs-12">
        <li><h2>Cảm ơn bạn đã đặt hàng tại <a href="http://<?=$config_url?>/" target="_blank">Cửa hàng chúng tôi</a></h2></li>
        <li>Mã số đơn hàng của bạn là : <b><?=$_GET['id']?></b></li>
        <li>Để theo dõi trạng thái đơn hàng xin vui lòng vào " Kiểm tra đơn hàng "</li>
        <li><a href="trang-chu.html" class="muatiep">Tiếp tục mua hàng</a></li>
        <li>Điện thoại hổ trợ mua hàng : <span><?=$row_setting['hotline']?></span></li>
    </ul>
    
    <p></p>
</div>

</div>
</div>