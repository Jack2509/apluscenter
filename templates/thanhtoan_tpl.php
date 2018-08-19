<?php 


$d->reset();
$sql_detail = "select id,ten_$lang,giaban from #_baiviet where hienthi=1 and type='vanchuyen' order by stt,id";
$d->query($sql_detail);
$phivanchuyen  = $d->result_array();

$d->reset();
$sql_detail = "select noidung_$lang from #_info where type='chuyenkhoan' ";
$d->query($sql_detail);
$row_thanhtoan123 = $d->fetch_array();

if($_SESSION['login_web']["id"]!='') {

	$d->reset();
	$sql_detail = "select diemkhuyenmai,diemtichluy from #_thanhvien where id='".$_SESSION['login_web']["id"]."' ";
	$d->query($sql_detail);
	$row_thanhvien = $d->fetch_array();
	// echo = $row_thanhvien['diemtichluy'];

	$diemkhuyenmai = $row_thanhvien['diemkhuyenmai'];
	if($diemkhuyenmai>0){

		$d->reset();
		$sql_detail = "select * from table_order where id_tv='".$_SESSION['login_web']["id"]."'    ";
		$d->query($sql_detail);
		$khuyenmai = $d->result_array();
		$lanmuahang = 2;//count($khuyenmai);
		if($lanmuahang>=1){
			$flag_km = true;
		}

	}

}
?>
<script language="javascript">
	function xoa(pid){
		if(confirm('Xóa sản phẩm này ! ')){
			document.form_giohang.pid.value=pid;
			document.form_giohang.command.value='delete';
			document.form_giohang.submit();
		}
	}
</script>

<form name="form_giohang" action="index.php?com=thanh-toan" method="get">
	<input type="hidden" name="com" value="thanh-toan" />
	<input type="hidden" name="pid" />
	<input type="hidden" name="command" />
</form>

<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
	remove_pro_thanh($_REQUEST['pid']);
}
else if($_REQUEST['command']=='clear'){
	unset($_SESSION['cart']);
}
?>
<script language="javascript" src="js/my_script.js"></script>

<script language="javascript">
	function clear_cart(){
		if(confirm('Bạn có muốn xóa tất giỏ hàng không ?')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}
	function update_cart(){
		document.form1.command.value='update';
		document.form1.submit();
	}
	$(document).ready(function() {
		$('.phuongthuc label').click(function(event) {
			var value = $('input[name=phuongthuc]:checked').val();
			if(value=='1'){ 
				$('.tknh').slideDown(500);
			} else {
				$('.tknh').slideUp(500);
			}

		});

		$('.capnhat_sl').keyup(function(event) {
			/* Act on the event */
			var soluong = $(this).val();
			var product = $(this).attr('name');
			$.ajax({
				type:'POST',
				url:'ajax/capnhat_giohang.php',
				data:{soluong:soluong,product:product},
				success: function(result) {
					var getData = $.parseJSON(result);
					$('.capnhat_price_'+product).html(getData.price_item);
					$('.capnhat_full').html(getData.full_item);
				}
			});
		});

		$('#tratien123').click(function(e){ 

			var ten = $('#ten').val();
			var dienthoai = $('#dienthoai').val();

			var diachi = $('#diachi').val();
			var email = $('#email').val();
			var noidung = $('#noidung').val();
			var phuongthuc = $('input[name=phuongthuc]:checked').val();
			// var phivanchuyen  =$('#phivanchuyen' ).val();
			// alert(phivanchuyen); die();

			if($('#khuyenmai').is(':checked')){
				var khuyenmai = 1;
			}
			if($('#tichdiem').is(':checked')){
				var tichdiem = 1;
			}
			var flag = true;
			if(ten==''){
				alert('<?=_banchuanhapten?> . ');
				$('#ten').focus();
				var flag = false;
				return false;
			} 
			if(dienthoai==''){
				alert('<?=_banchuanhapdienthoai?> . ');
				$('#dienthoai').focus();
				var flag = false;
				return false;
			} 
			if(dienthoai!=''){
				if($.isNumeric(dienthoai)==false){
					alert('<?=_sdtkhonghople?> . ');
					$('#dienthoai').focus();
					return false;
				} else{
					var lengthdt =dienthoai.length;					
					var rest = dienthoai.substr(0, 2);
					if(rest=='09' || rest=='08'){
						if(lengthdt!=10){
							alert('<?=_sdtkhonghople?> . ');
							$('#dienthoai').focus();
							var flag = false;
							return false;
						} 
					}
					if(rest=='01'){
						if(lengthdt!=11){
							alert('<?=_sdtkhonghople?> . ');
							$('#dienthoai').focus();
							var flag = false;
							return false;
						} 						
					}
				}

			} 
			if(diachi==''){
				alert('<?=_banchuanhapdiachi?> . ');
				$('#diachi').focus();
				var flag = false;
				return false;
			} 
			if(email==''){
				alert('<?=_banchuanhapemail?> . ');
				$('#email').focus();
				var flag = false;
				return false;
			}
			if(email!=''){
				if(!check_email(email)){
					alert('<?=_emailkhongtontai?> . ');
					$('#email').focus();
					var flag = false;
					return false;
				}
			} 
			// if(!phivanchuyen){
			// 	alert('Bạn chưa chọn địa điểm giao hàng . ');
			// 	var flag = false;
			// 	return false;
			// } 

			if(!phuongthuc){
				alert('<?=_banchuachonphuongthucthanhtoan?> . ');
				var flag = false;
				return false;
			} 

			if(flag==true) {
				$.ajax({
					type:'POST',
					url:'ajax/thanhtoan.php',
					data:{ten:ten,dienthoai:dienthoai,diachi:diachi,email:email,noidung:noidung,phuongthuc:phuongthuc},
					success: function(result) { //alert(result); return false;
						if(result!=0){
							alert("<?=_chucmungbandadatthanhcong?>.");
							window.location.href="dat-hang-thanh-cong/"+result+".html";
						} else{
							alert("<?=_hethongloithulai?>  .");
						} 
					}
				});
			}
		});



	});
</script>

<link href="css/giohang.css" rel="stylesheet" type="text/css" />

<div id="info">
	<div id="sanpham">
		<div class="thanh_title"><h2>Thanh Toán</h2> </div>
		<form method="post" name="frm_order" action="xac-nhan.html" enctype="multipart/form-data"  id="frm_order">
			<div class="khung">   
				<table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">

					<tr class="menu_giohang" >
						<td class="res_cart">&nbsp;</td>
						<td class="res_cart">&nbsp;</td>
						<td>Sản phẩm</td>
						<td><?=_gia?></td>
						<td>Số lượng</td>
						<td class="res_cart">Tổng giá</td>
					</tr>

					<?php 
					if(is_array($_SESSION['cart'])){
						$max=count($_SESSION['cart']);
						for($i=0;$i<$max;$i++){
							$pid=$_SESSION['cart'][$i]['productid'];
							$q=$_SESSION['cart'][$i]['qty'];
							$pname=get_product_name($pid);
							if($q==0) continue;
							?>
							<?php 
							$d->reset();
							$sql_detail = "select giacu from #_product where hienthi=1 and id='".$pid."'";
							$d->query($sql_detail);
							$row_detail = $d->fetch_array();

							$pgia = get_price($pid);
							$pgiagiam =  -(int)((($row_detail['giacu'] - $pgia)*100)/ $row_detail['giacu'])."%";
							?>
							
							<tr class="form_giohang">
								<td width="5%" class="res_cart product-remove"><a href="javascript:void(0)" class="remove" onclick="xoa(<?=$pid?>)">x</a></td>
								<td width="8%">
									<a href="san-pham/<?=changeTitle($pname)?>.html">
										<img src="upload/product/<?=get_thumb($pid)?>" alt="<?=$pname?>" class='img' />
									</a>
								</td>

								<td width="30%" class="tt_cart"><a href="san-pham/<?=changeTitle($pname)?>.html">
									<h3><?=$pname?> </h3>
									<?php if($row_detail['giacu']) {?>
									<span><?=number_format($row_detail['giacu'],0, ',', '.')?>&nbsp;vnd</span>
									<?php } ?>
								</a></td>
								<td width="10%" class="gia_gh">

									<!-- <span class="km_gh"><?=$pgiagiam?></span> -->
									<span> <?=number_format($pgia,0, ',', '.')?>&nbsp;vnd</span>
								</td> 

								<td width="10%"><input name="<?=$pid?>" value="<?=$q?>" class="capnhat_sl" data-index="<?=$i?>" /></td>     
								<td width="10%" class="res_cart capnhat_price_<?=$pid?>"><?=number_format(get_price($pid)*$q,0, ',', '.')?>&nbsp;vnd</td>

							</tr>
							<?php } ?>

							<tr class="tonggia">
								<?php if((get_order_total()>$row_setting['dkkm']) && $flag_km==true) { ?>
								<td colspan="3" width="30%" align="left" style="text-align: left;    text-align: left;font-weight: normal; font-size: 15px;" >
									<input type="checkbox" class="checkbox" id="khuyenmai" name="khuyenmai"/> Bạn có  <?=number_format($row_thanhvien['diemkhuyenmai'],0, ',', '.')?>&nbsp;VNĐ  trong tài khoản. Bạn có muốn sử dụng tiền khuyến mãi
								</td>
								<td colspan="3">Tổng giá : <b  class="capnhat_full" ><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>
								<?php } elseif($row_thanhvien['diemtichluy']>0){?>
								<td colspan="3" width="30%" align="left" style="text-align: left;    text-align: left;font-weight: normal; font-size: 15px;" >
									<input type="checkbox" class="checkbox" id="tichdiem" name="tichdiem"/>Bạn có <?=number_format($row_thanhvien['diemtichluy'],0, ',', '.')?>&nbsp;VNĐ  trong tài khoản. Bạn có muốn sử dụng tiền tích điểm

								</td>
								<td colspan="3">Tổng giá : <b  class="capnhat_full" ><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>

								<?php } else { ?>
								<td colspan="7">Tổng giá : <b  class="capnhat_full" ><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;đ</b></td>

								<?php } ?>
							</tr>
							<?php }	else{ echo "<tr  bgColor='#FFFFFF'><td colspan='7'>Bạn Không có sản phẩm nào trong giỏ hàng</td>"; } ?>

						</table>

						<div class="content_form_tt_left">
							<div class="thanh_title"><h2>Thông tin khách hàng</h2> </div>
							<div class=" cl_input">
								<label> Họ tên <span class="alert">*</span></label>
								<input name="ten" id="ten" class="formsubmit" value="<?=$thanhvien_tv['hoten']?>" required="required" />
							</div>

							<div class=" cl_input">
								<label> Điện thoại <span class="alert">*</span></label>
								<input name="dienthoai" id="dienthoai" class="formsubmit" value="<?=$thanhvien_tv['dienthoai']?>" required="required" />
							</div>
							<div class=" cl_input">
								<label> Địa chỉ <span class="alert">*</span></label>
								<input  name="diachi"  id="diachi" class="formsubmit" required="required"  value="<?=$thanhvien_tv['diachi']?>"/>
							</div>
							<div class=" cl_input">
								<label>E-mail<span class="alert">*</span></label>
								<input type="email" name="email" id="email" class="formsubmit" required="required"  value="<?=$thanhvien_tv['email']?>"/>
							</div>
							<div class=" cl_area">
								<label> Thông tin người nhận </label>
								<textarea name="noidung"><?=$_POST['noidung']?></textarea>
							</div>

						</div>

						<div class="content_form_tt_right">
							<!-- <div class="thanh_title"><h2>Phí vận chuyển</h2> </div>

							<div class=" cl_input">
								<label>Giao hàng đến<span class="alert">*</span></label>
								<select name="phivanchuyen" id="phivanchuyen"  >
									<option value=""> Chọn địa điểm giao hàng </option>
								<?php for ($i=0; $i < count($phivanchuyen); $i++) { ?>
									<option value="<?=$phivanchuyen[$i]['id']?>"> <?=$phivanchuyen[$i]['ten_'.$lang]?> </option>
								<?php } ?>
								</select>
							</div> -->
							<div class="clear"></div>

							<div  class="thanh_title"><h2>Phương thức thanh toán</h2> </div>


							<div class="phuongthuc">
								<p><label> <input type="radio" name="phuongthuc" value="Thanh toán khi nhận hàng" /><span> </span>Thanh toán khi nhận hàng  <br /></label></p>


								<p> <label> <input type="radio" name="phuongthuc" value="Thanh toán qua chuyển khoản" /> <span></span> Thanh toán qua chuyển khoản </label> <br />
									<div class="tknh" style="display:none;" >
										<strong style="color:rgba(102,102,102,1); text-transform:capitalize; font-weight:100;"><?=$row_thanhtoan123['noidung_'.$lang]?></strong>
									</div>
								</p>

							</div>
						</div>
						<div class="clear"></div>
						<div class="icon_thanh">
							<input id="tratien123" type="button" name="next" value="<?=_thanhtoan?>" class="g_muatiep" />
						</div>

					</div> 

				</form>

			</div>           
		</div>