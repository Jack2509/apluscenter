<?php 

function count_star($com,$type,$id){
	global $d,$lang;

	$d->reset();
	$sql = "select * from #_review where hienthi=1 and  id_tour='".$id."' and type='".$type."' ";
	$d->query($sql);
	$row = $d->result_array();

	if(count($row)>0){
		for($i=0;$i<count($row);$i++){
			$tong = $tong + $row[$i]['star'];
		}

		$star = $tong / count($row) ;
	} else {
		$star = 0;
	}	

	$dem_sao = explode('.',$star);

	$sao_1 = '<i class="fa fa-star" aria-hidden="true"></i>';
	$sao_05 = '<i class="fa fa-star-half-o" aria-hidden="true"></i>';
	$sao_0 = '<i class="fa fa-star-o" aria-hidden="true"></i>';

	for($i=0;$i<$dem_sao[0];$i++){
		$xuat_star .= $sao_1;
	}

	$saocon = 5 - $dem_sao[0];

	if($dem_sao[1] > 0){
		$xuat_star .= $sao_05;
		for($i=1;$i<$saocon;$i++){
			$xuat_star .= $sao_0;
		}
	} else {
		for($i=0;$i<$saocon;$i++){
			$xuat_star .= $sao_0;
		}
	}

	return $xuat_star;

}

function count_review($com,$type,$id){
	global $d,$lang;

	$d->reset();
	$sql = "SELECT COUNT(*) as num FROM #_review where hienthi=1 and id_tour='".$id."' and type='".$type."' ";
	$d->query($sql);
	$count_tour = $d->fetch_array();

	return $count_tour['num'];

}

function count_star_1($star){
	global $d,$lang;

	$sao_1 = '<i class="fa fa-star" aria-hidden="true"></i>';
	$sao_0 = '<i class="fa fa-star-o" aria-hidden="true"></i>';

	for($i=0;$i<$star;$i++){
		$xuat_star .= $sao_1;
	}
	$saocon = 5 - $star;
	for($i=0;$i<$saocon;$i++){
		$xuat_star .= $sao_0;
	}

	return $xuat_star;
}


function danhgia_star_1($star){
	global $d,$lang;

	if($star > 4){
		$xuat_star = _xuatxac;
	} else if($star > 3){
		$xuat_star = _tot;
	} else if($star > 2){
		$xuat_star = _trungbinh;
	} else if($star > 1){
		$xuat_star = _khangheo;
	} else if($star > 0) {
		$xuat_star = _xau;
	} else {
		$xuat_star = _chuacodanhgia;
	}

	return $star.'.0 - '.$xuat_star;

}

?>
<?php 
$d->reset();
$sql = "select star from #_review where hienthi=1 and star='5' and id_tour='".$row_detail['id']."' and type='".$type."' order by stt,id desc";
$d->query($sql);
$star5 = $d->result_array();

$d->reset();
$sql = "select star from #_review where hienthi=1 and star='4' and id_tour='".$row_detail['id']."' and type='".$type."' order by stt,id desc";
$d->query($sql);
$star4 = $d->result_array();

$d->reset();
$sql = "select star from #_review where hienthi=1 and star='3' and id_tour='".$row_detail['id']."' and type='".$type."' order by stt,id desc";
$d->query($sql);
$star3 = $d->result_array();

$d->reset();
$sql = "select star from #_review where hienthi=1 and star='2' and id_tour='".$row_detail['id']."' and type='".$type."' order by stt,id desc";
$d->query($sql);
$star2 = $d->result_array();

$d->reset();
$sql = "select star from #_review where hienthi=1 and star='1' and id_tour='".$row_detail['id']."' and type='".$type."' order by stt,id desc";
$d->query($sql);
$star1 = $d->result_array();

?>
<link type="text/css" rel="stylesheet" href="js/rate/style.css" />
<link type="text/css" rel="stylesheet" href="css/rate.css" />
<link href="css/font-awesome/css/font-awesome.min.css" type="text/css" rel="stylesheet" />
<link href="js/bootstrap-3.3.5-dist/css/bootstrap.min.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/colorbox/jquery.colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="js/colorbox/colorbox.css" media="screen" />
<script type="text/javascript">
	$(document).ready(function(){
		$('.review_button').click(function(event) {
			var star = $('#rating-input-2').val();
			var mota = $('#mota_review').val();
			var ten = $('#ten_review').val();
			var email = $('#email_review').val();
			var dienthoai = $('#dienthoai_review').val();
			var id = '<?=$row_detail["id"]?>';
			var type = '<?=$row_detail["type"]?>';
			var ip =  '<?=$ip?>';
		    var com = '<?=$com?>';
		    // alert();
			$.ajax({
				type:'POST',
				url:'ajax/star_review.php',
				data:{star:star,id:id,type:type,ip:ip,ten:ten,dienthoai:dienthoai,email:email,mota:mota,com:com},
						success: function(result) { alert(result); exit();
							if(result==1){
								alert('Cảm ơn bạn đã đánh giá bài viết của chúng tôi . ');
								$.colorbox.close();
							} else if(result==0){
								alert('Bạn đã cập nhật đánh giá thành công . ');
								$.colorbox.close();
							}  else {
								alert(' Hệ thống đang bận vui lòng thực hiện lại trong vài giây . ');
								$.colorbox.close();
							}
						}
			});

		});
		$(".colorbox").colorbox({inline:true, width:"50%"});


	});
</script>
<script type="text/javascript" src="js/star-rating.js"></script>
<link rel="stylesheet" href="js/star-rating.css" media="all" rel="stylesheet" type="text/css"/>

<div class="tile_danhgia">Khách hàng nhận xét</div>
<div class="content_danhgia">

	<div class="dg_hientai">
		<p>
			<?=count_star($com,$type_bar,$row_detail['id'])?>
			<?=count_review($com,$type_bar,$row_detail['id'])?> Đánh giá
		</p>
	</div>

	<div id="review">

		<div class="item_sao">
			<div class="rating-num">5 sao</div>
			<?php $width_sao5 = count($star5)*180/count_review('tour',$row_detail['type'],$row_detail['id']) ;?>
			<div class="progress">
				<div class="progress-bar progress-bar-success" style="width: <?=$width_sao5?>px;">
					<span class="sr-only"><?=$width_sao5?>px Complete</span>
				</div>
			</div>
			<span class="rating-num-total"><?=count($star5)?></span>
		</div>
		<div class="item_sao">
			<div class="rating-num">4 sao</div>
			<?php  $width_sao4 = count($star4)*180/count_review('tour',$row_detail['type'],$row_detail['id']) ;?>

			<div class="progress">
				<div class="progress-bar progress-bar-success" style="width:<?=$width_sao4?>px;">
					<span class="sr-only"><?=$width_sao4?>px Complete</span>
				</div>
			</div>
			<span class="rating-num-total"><?=count($star4)?></span>
		</div>
		<div class="item_sao">
			<div class="rating-num">3 sao</div>
			<?php  $width_sao3 = count($star3)*180/count_review('tour',$row_detail['type'],$row_detail['id']) ;?>

			<div class="progress">
				<div class="progress-bar progress-bar-success" style="width:<?=$width_sao3?>px;">
					<span class="sr-only"><?=$width_sao3?>px Complete</span>
				</div>
			</div>
			<span class="rating-num-total"><?=count($star3)?></span>
		</div>
		<div class="item_sao">
			<div class="rating-num">2 sao</div>
			<?php  $width_sao2 = count($star2)*180/count_review('tour',$row_detail['type'],$row_detail['id']) ;?>

			<div class="progress">
				<div class="progress-bar progress-bar-success" style="width:<?=$width_sao2?>px;">
					<span class="sr-only"><?=$width_sao2?>px Complete</span>
				</div>
			</div>
			<span class="rating-num-total"><?=count($star2)?></span>
		</div>
		<div class="item_sao">
			<div class="rating-num">1 sao</div>
			<?php  $width_sao1 = count($star1)*180/count_review('tour',$row_detail['type'],$row_detail['id']) ;?>

			<div class="progress">
				<div class="progress-bar progress-bar-success" style="width:<?=$width_sao1?>px;">
					<span class="sr-only"><?=$width_sao1?>px Complete</span>
				</div>
			</div>
			<span class="rating-num-total"><?=count($star1)?></span>
		</div>

	</div>
	<div class="nhanxet_danggia">
		<p>Chia sẻ nhận xét về sản phẩm</p>
		<div class="add_review">
			<a href="#inline_content_dg" class="colorbox">Viết nhận xét của bạn</a>
		</div>
	</div>
	<div id="pre_review">
		<ul>
			<?php for($i=0;$i<count($danhgia_tou);$i++){ ?>
			<li>
				<div class="hinh_review col-md-3 col-sm-4 col-xx-4 col-xs-4">
					<img src="<?=_upload_thanhvien_l.$nguoidang['thumb']?>" alt="<?=$nguoidang['thumb']?>" />
					<h3><?php //$nguoidang['ten']?></h3>
				</div>

				<div class="noidung_pre col-md-9 col-sm-8 col-xx-8 col-xs-8">
					<div class="top_review">
						<p class="p11"><?=count_star_1($danhgia_tou[$i]['star'])?></p>
						<p class="p12"><?=danhgia_star_1($danhgia_tou[$i]['star'])?></p>
						<p class="p13"><?=_ngaydang ?> <?=date('d-m-Y',$danhgia_tou[$i]['ngaytao'])?></p>
					</div>
					<p><?=$danhgia_tou[$i]['mota_vi']?></p>

				</div>

			</li>
			<?php } ?>
		</ul>
	</div>
</div>

<div style='display:none'>
	<div id='inline_content_dg' style='padding:10px; background:#fff;'>
		<div id="danggia_tour">
			<form action="" method="get" name="danhgia_tour">
				<h2>Nhập nội dung đánh giá</h2>

				<input value="4" type="number" id="rating-input-2" class="rating" min=0 max=5 step=1 data-size="lg">
				<div class="form-group form-group-lg ">

					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-info-circle" aria-hidden="true"></i></div>
						<input name="ten" type="text" class="validate[required] form-control" id="ten_review" placeholder="Nhập tên"/>
					</div>
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></div>
						<input name="dienthoai" type="text" class="validate[required] form-control" id="dienthoai_review" placeholder="Nhập điện thoại"/>
					</div>
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
						<input name="email" type="text" class="validate[required] form-control" id="email_review" placeholder="Nhập email"/>
					</div>
					<div class="input-group">
						<div class="input-group-addon"><i class="fa fa-file-text-o" aria-hidden="true"></i></div>
						<textarea name="mota" id="mota_review" class="validate[required] form-control" placeholder="Nhập nội dung đánh giá"></textarea>
					</div>
				</div> 
				<input type="button" name="danhgia" value="Đánh giá" class="review_button" />
			</form>

		</div>

	</div>
</div>