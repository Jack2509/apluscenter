<script type="text/javascript">	
	
	function TreeFilterChanged2(){
		
				$('#validate').submit();
		
	}
</script>
<div class="wrapper">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=phrase&act=man"><span>Quản lý ngôn ngữ</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="supplier" id="validate" class="form" action="index.php?com=phrase&act=save" method="post" enctype="multipart/form-data">
	

	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>		
		<ul class="tabs">
           
           <li>
               <a href="#info">Ký hiệu</a>
           </li>
           <?php foreach ($config['lang'] as $key => $value) { ?>
           <li>
               <a href="#content_lang_<?=$key?>"><?=$value?></a>
           </li>
           <?php } ?>


       </ul>

       <!-- begin: info -->
       <div id="info" class="tab_content">
	        <div class="formRow">
				<label>Ký hiệu</label>
				<div class="formRight">
	                <input type="text" name="phrase" title="Nhập ký hiệu" id="phrase" class="tipS validate[required]" value="<?=@$item['phrase']?>" />
				</div>
				<div class="clear"></div>
			</div>
       </div>
        <!-- end: info -->

       <?php foreach ($config['lang'] as $key => $value) {?>
        <!-- begin: Content -->
       <div id="content_lang_<?=$key?>" class="tab_content">  
       		<div class="formRow">
                <label>Nội dung</label>
                <div class="formRight">
                    <input type="text" value="<?=getSettingtByLang(@$item['noidung'],$key)?>" name="phrase_mean[<?=$key?>][noidung]" title="Nhập nội dung" class="tipS" />
                </div>
                <div class="clear"></div>
            </div> 
       </div>
       <!-- end: Content -->
       <?php } ?>


		
		
		<div class="formRow">
			<div class="formRight">
                 <input type="hidden" name="id" id="id_this_lkweb" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
		
	</div>  
	
</form>        </div>