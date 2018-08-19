<script>

	$(document).ready(function(){
		var abc = $('.noidung_gopy');
		$('.gopy_click').click(function(){
			if($(this).hasClass('active')){
				$(this).removeClass('active');
				abc.slideDown(200);
			}else{
				$(this).addClass('active');
				abc.slideUp(100);
			}
		});

	}); 		
</script>
<div class="gopy">
	<div class="gopy_click"> <span><?=_gopydichvu?></span> </div>
	<div class="noidung_gopy">
	<form method="post" name="frm_gopy" action="index.html" enctype="multipart/form-data">

			<input placeholder="<?=_dienthoai?>" name="dienthoai_y" type="text" class="tflienhe" id="dienthoai_y"/>
			<input placeholder="Email" name="email_y" type="text" class="tflienhe" id="email_y"  />
			<textarea placeholder="<?=_noidung?>" name="noidung_y" cols="50" rows="5" class="ta_noidung" id="noidung_y" style="background-color:#FFFFFF; color:#666666;"></textarea>
			<button type="submit"  class="gui_gopy" ><?=_gui?></button>
		</form>

	</div>
</div>