  <?php //include _template."layout/dieuhuong_new.php";?>
<? /*
  <script language="javascript" src="js/my_script.js"></script>
  <script language="javascript">
  	function js_submit12(){
  		if(isEmpty(document.getElementById('ten'), "Xin nhập Họ tên.")){
  			document.getElementById('ten').focus();
  			return false;
  		}
  		if(isEmpty(document.getElementById('diachi'), "Xin nhập Địa Chỉ.")){
  			document.getElementById('diachi').focus();
  			return false;
  		}
  		
  		if(isEmpty(document.getElementById('dienthoai'), "Xin nhập Số điện thoại.")){
  			document.getElementById('dienthoai').focus();
  			return false;
  		}
  		
  		if(!isNumber(document.getElementById('dienthoai'), "Số điện thoại không hợp lệ.")){
  			document.getElementById('dienthoai').focus();
  			return false;
  		}
  		
  		if(!check_email(document.frm.email.value)){
  			alert("Email không hợp lệ");
  			document.frm.email.focus();
  			return false;
  		}
  		
  		if(isEmpty(document.getElementById('tieude'), "Xin nhập Chủ đề.")){
  			document.getElementById('tieude').focus();
  			return false;
  		}
  		
  		if(isEmpty(document.getElementById('noidung'), "Xin nhập Nội dung.")){
  			document.getElementById('noidung').focus();
  			return false;
  		}
  		
  		document.frm.submit();
  	}
  </script>
  */?>
  <div id="info">
  	<div id="sanpham">
  		
  		<div class="khung">
        <div class="hd-cttb clear_fix"><p><?=_contact?></p> </div>

  			<div class="khung_trai">

  				<div class="form_contact">
  					<p><?=$row_detail['noidung_'.$lang]?></p>
  				</div>

  			</div>

  			<div class="form_lh">
  				<form method="post" name="frm" action="lien-he.html" enctype="multipart/form-data">
  					<fieldset>
  						<legend> <?=_formlienhe?> </legend>
  						<p><label><?=_hovaten?> : </label><b style="color:#990000;"></b><input name="ten" type="text" class="tflienhe" id="ten" /></p>
  						<p><label><?=_address?> : </label><b style="color:#990000;"></b><input name="diachi" type="text"  class="tflienhe" id="diachi"/></p>
  						<p><label><?=_dienthoai?> : </label> <b style="color:#990000;"></b><input name="dienthoai" type="text" class="tflienhe" id="dienthoai"/></p>
  						<p><label>Email : </label><b style="color:#990000;"></b><input name="email" type="text" class="tflienhe" id="email"  /></p>
  						<p><label><?=_chude?> : </label><b style="color:#990000;"></b><input name="tieude" type="text" class="tflienhe" id="tieude" /></p>
  						<p><label><?=_dinhkemfile?> : </label><input name="file" type="file" class="contact-file-input" /></p>
  						<p><label><?=_noidung?> : </label><b style="color:#990000;"></b>
  							<textarea name="noidung" cols="50" rows="5" class="ta_noidung" id="noidung" style="background-color:#FFFFFF; color:#666666;"></textarea>
  						</p>
  						<p><label>&nbsp </label>
  							<button type="button" onclick="js_submit12();"><?=_gui?></button>
  							<button type="reset">Reset</button>   
  						</p> 
  					</fieldset>              
  				</form>
  			</div>

  			<div class="khung_phai">
  				<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyD5Mevy_rl8U4ZyBB8i5jmdxfvb9Cg5UoE&sensor=false"></script>
  				<script>
  					function initialize() {
  						var myLatlng = new google.maps.LatLng(<?=$row_setting['toado']?>);
  						var mapOptions = {
  							zoom: 17,
  							center: myLatlng
  						};

  						var map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);

  						var contentString = "<table style='text-align:left; font-weight:100;'><tr><th style='font-size:16px; color:#039BB2; font-weight:bold; text-transform: uppercase;'><?=$row_setting['ten_'.$lang]?></th></tr><tr><th>Địa chỉ : <?=$row_setting['diachi_'.$lang]?></th></tr><tr><th>Điện thoại : <?=$row_setting['dienthoai']?></th></tr><tr><th>Email : <?=$row_setting['email']?></th></tr></table>";

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

  					google.maps.event.addDomListener(window, 'load', initialize);


  				</script>
  				<div id="map_canvas"></div>
  			</div>
  			
  			
  			
  		</div></div></div>