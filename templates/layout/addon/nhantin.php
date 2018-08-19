<script type="text/javascript">
	$(document).ready(function() {
		$('.dangkymail').submit(function(event) {
			var ten = $('.dangkymail #ten').val();
			var email = $('.dangkymail #email').val();
			var dienthoai = $('.dangkymail #dienthoai').val();
			if(ten==''){
				alert('Bạn chưa nhập tên');
				$('.dangkymail #ten').focus();
			} else if(email==''){
				alert('Bạn chưa nhập email');
				$('.dangkymail #email').focus();
			} else if(dienthoai==''){
				alert('Bạn chưa nhập điện thoại');
				$('.dangkymail #dienthoai').focus();
			} else {
				$.ajax ({
					type: "POST",
					url: "ajax/dangky_email.php",
					data: {email:email,ten:ten,dienthoai:dienthoai},
					success: function(result) {
						if(result==0){
							$('.dangkymail input').attr('value','');
							alert('Đăng ký thành công ! ');
							$('.dangkymail input').attr('value','');
						} else if(result==1){
							alert('Email đã được đăng ký ! ');
							$('.dangkymail input').attr('value','');
						} else if(result==2){
							alert(' ! Đăng ký không thành công . Vui lòng thử lại ');
						}
					}
				});
			}
			return false;
		});
	});
</script>
<div class="box_nhantin">
	<div class="container">
		<div class="content_nhantin">

			<div class="title" >
				<h2 class="t-l-c">đăng ký nhận tin</h2> 
			</div>
			<form action="" method="post" name="dangkymail" class="dangkymail">
				
				<div class="row">
				  <div class="col-md-4"> <input name="ten" type="text" id="ten" class="input" placeholder="Nhập tên của bạn..."></div>
				  <div class="col-md-4"> <input name="dienthoai" id="dienthoai" type="number" class="input" placeholder="Nhập điện thoại của bạn.."></div>
				  <div class="col-md-4"> <input name="email" id="email" type="text" class="email" required="required" placeholder="Nhập email của bạn"></div>
				</div>

				<div class="row">
				  <div class="col-md-12"><input name="ten" type="text" id="ten" class="input" placeholder="Nhập địa chỉ của bạn..."></div>
				</div>
				<?php /*?>
				<div class="row">
				  <div class="col-md-12"> <textarea style="width: 100%; height: 105px;" name="noidung" id="noidung"></textarea>
				</div>
				<?php */?>
				<button type="submit" value="">Gửi thông tin</button>
			</form>
		</div>
	</div>
</div>
</div>

<div class="clear"></div>
<?php if($_GET['com']=='' || $_GET['com']=='index' || $_GET['com']=='trang-chu' ){?>
	<div id="map_canvas_bt" ></div>
<?php }?>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyCDZ8PMgQPqUlX72gXhASUK-Mlw--KjpqM&sensor=false"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDIcgayYKPPDnRhRPUdgsCi63XC3-VB12k">
 </script>
<script>
  function initialize_bt() {
    var myLatlng = new google.maps.LatLng(<?=$row_setting['toado']?>);
    var mapOptions = {
      zoom: 17,
      center: myLatlng
    };
    var map = new google.maps.Map(document.getElementById('map_canvas_bt'), mapOptions);
    var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#039BB2; font-weight:bold; text-transform: uppercase;'><a class='link_title' target='_blank' href='https://www.google.com/maps/place/<?=$row_setting['toado']?>'><?=$row_setting['ten_'.$lang]?></a></th></tr><tr><th><a class='link_title' target='_blank' href='https://www.google.com/maps/place/<?=$row_setting['toado']?>'>Địa chỉ : <?=$row_setting['diachi_'.$lang]?></th></tr><tr></a><th>Điện thoại : <?=$row_setting['dienthoai']?></th></tr><tr><th>Email : <?=$row_setting['email']?></th></tr></table>";
    var infowindow = new google.maps.InfoWindow({
      content: contentString
    });
    var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: "<?=$row_setting['ten_'.$lang]?>"
    });
    infowindow.open(map, marker);
  }
  google.maps.event.addDomListener(window, 'load', initialize_bt);
</script>