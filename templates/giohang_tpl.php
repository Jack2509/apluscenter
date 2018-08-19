<?php
	// if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
	// 	remove_product($_REQUEST['pid']);
	// }
	// 	else if($_REQUEST['command']=='clear'){
	// 	unset($_SESSION['cart']);
	// }


?>


<?php
if($_REQUEST['command']=='delete' && $_REQUEST['pid']>0){
	remove_product($_REQUEST['pid']);
}
else if($_REQUEST['command']=='clear'){
	unset($_SESSION['cart']);
}
else if($_REQUEST['command']=='update'){
	$max=count($_SESSION['cart']);
	for($i=0;$i<$max;$i++){
		$pid=$_SESSION['cart'][$i]['productid'];
		$q=$_SESSION['cart'][$i]['qty'];
		$color=$_SESSION['cart'][$i]['mausp'];
		$q=$_REQUEST['product'.$pid];
		if($q>0 && $q<=999){
			$soluong = str_replace(",", '.', $q);
			$_SESSION['cart'][$i]['qty']=$soluong;
		}
		else{
			$msg='Some proudcts not updated!, quantity must be a number between 1 and 999';
		}
	}
}
?>
<?php// dump($_SESSION['cart']); ?>
<script language="javascript">
	function xoa(pid){
		if(confirm('<?=_xoaspnay?> ')){
			document.form1.pid.value=pid;
			document.form1.command.value='delete';
			document.form1.submit();
		}
	}
	function clear_cart(){
		if(confirm('<?=_bancomuonxoa?>')){
			document.form1.command.value='clear';
			document.form1.submit();
		}
	}

	$(document).ready(function() {
	$(document).ready(function() {
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
	});
	});

</script>
<?php //dump($_SESSION['cart']); ?>

<link href="css/giohang.css" rel="stylesheet" type="text/css" />
<div id="info">
	<div id="sanpham">
		<div class="thanh_title"><h2><?=_giohang?></h2></div>
		<div class="khung">

			<form name="form1" method="post">
				<input type="hidden" name="pid" />
				<input type="hidden" name="command" />
				<table border="0" cellpadding="5px" cellspacing="1px" width="100%" class="giohang_tk">
					<?php if(is_array($_SESSION['cart'])){?>
					<tr class="menu_giohang" >
						<td class="res_cart">&nbsp;</td>
						<td class="res_cart">&nbsp;</td>
						<td><?=_sanpham?></td>
						<td><?=_gia?></td>
						<td><?=_soluong?></td>
						<td class="res_cart"><?=_tonggia?></td>
					</tr>

					<?php 



					$max=count($_SESSION['cart']);
					for($i=0;$i<$max;$i++){
						$pid=$_SESSION['cart'][$i]['productid'];
						$q=$_SESSION['cart'][$i]['qty'];
						$size=$_SESSION['cart'][$i]['size'];

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
							<td width="5%" class="res_cart product-remove"> <a href="javascript:void(0)" class="remove" onclick="xoa(<?=$pid?>)">x</a></td>
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
							<td colspan="7" ><?=_tonggia?> : <b class="capnhat_full"><?=number_format(get_order_total(),0, ',', '.')?>&nbsp;vnd</b></td>
						</tr>
						<?php }	else{ echo "<tr bgColor='#FFFFFF'><td colspan='7'>"._chuacosp."</td>"; } ?>

					</table>

					<input type="button" value="<?=_muatiep?>" onclick="window.location='trang-chu.html'" class="g_muatiep">
					<input type="button" value="<?=_xoatatca?>" onclick="clear_cart()" class="g_muatiep">
					<input type="button" value="<?=_thanhtoan?>" onclick="window.location='thanh-toan.html'" class="g_muatiep">
					

				</form>

			</div>
		</div>
	</div>