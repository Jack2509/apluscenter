<?php
	## Current url

// dump(getCurrentPageURL());
	$cu=getCurrentPageURL();
	$cm_success=false;
	
		
	##Xu ly binh luan khi post
	if(isset($_POST['cm']))
	{
		if(strtolower($cm['hoten'])!='admin')
		{

			$cm=$_POST['cm'];
			$cm['hienthi']=0;
			$cm['stt']=get_stt('comment');
			$cm['ngaydang']=time();
			$cm['url']=$cu;
			// dump($cu);
			$d->setTable('comment');

			if($d->insert($cm))
			{
				$_SESSION['cm_success']=true;
				redirect($_SERVER['HTTP_REFERER']);
				// dump('dfdf');
			}
		}
	}

	##Lay tat ca binh luan co url bang voi url hien tai
	
	$d->reset();
	$sql="select * from #_comment where hienthi=1 and url='$cu' and pid=0 order by stt desc,id asc";
	$d->query($sql);
	$comment=$d->result_array();


	// dump($comment);
?>
<div class="w-cm">
	<div class="ctsp-tit">Có <?=count($comment)?> bình luận về <strong><?=$title_detail?></strong></div>
	<?php if($_SESSION['cm_success']==true){?>
    	<div class="success">Cám ơn bạn đã bình luận về sản phẩm của chúng tôi!</div>
        <script type="text/javascript">
			$(document).ready(function(e) {
                $('html body').animate({
					scrollTop:$('.w-cm').offset().top
				},800)	
            });
		</script>
    <?php $_SESSION['cm_success']=false; }?>
<form name="frm_cm" action="" method="post" class="frm_cm">
	<div><textarea name="cm[noidung]" placeholder="Mời bạn thảo luận. Vui lòng nhập Tiếng Việt có dấu, tối thiểu 10 ký tự." required="required" minlength="10" rows="5"></textarea></div>
    <div class="btn-cmt"><input type="button" value="Gửi" /></div>
    <div class="btn-cms"><input type="text" name="cm[hoten]" placeholder="Họ và tên" required="required" /></div>
    <div class="btn-cms"><input type="text" name="cm[email]" placeholder="Email" required="required"/></div>
    <div class="btn-cms"><input type="submit" value="Xác nhận" /></div>
</form>

<style type="text/css">
	.w-cm{     max-width: 100%;    padding: 10px;}
	.frm_cm{}
	.ctsp-tit{padding: 3px 0;}
	.frm_cm textarea{ width:100%; padding:5px; box-sizing:border-box; -webkit-box-sizing:border-box; -moz-box-sizing:border-box;}
	.frm_cm div{ margin-bottom:10px;}
	.frm_cm input[type="text"]{ width:300px; max-width:100%; padding:5px; box-sizing:border-box; -webkit-box-sizing:border-box; -moz-box-sizing:border-box;}
	.frm_cm input[type="button"]{padding: 5px 15px;border: none; background: #32c68a;color: #fff;}
	.frm_cm input[type="submit"]{ background:#4a90e2; color:#FFF; padding:5px 15px; border:none;}
	.btn-cms{ display:none;FFF;}
	.btn-cmt{ text-align:right; display:none;}
	
	.box-cm{ margin-bottom:10px;}
	.box-cm-c{ color:#FFF; background:#CCC; text-align:center; padding:0px 5px; text-transform:uppercase; float:left; margin-right:5px;}
	.box-cm-info{ margin-left:30px;}
	.box-cm-tl{ color:#4a90e2; cursor:pointer; float:left;}
	.box-cm-name{ font-weight:bold; color:#666;}
	.box-cm-namead{ font-weight:bold; color:#F00;}
	.w-cm-rl{ background:#f1f1f1; border:1px solid #e7e7e7; padding:10px; margin-top:10px; position:relative;}
	.w-cm-rl:before{ position:absolute; width: 0;height: 0;border-left: 15px solid transparent;border-right: 15px solid transparent;border-bottom: 15px solid #f1f1f1; display:block; content:""; left:6px; top:-15px;}
</style>

<script type="text/javascript">
	$(document).ready(function(e) {
		$('.frm_cm textarea').focusin(function(e) {
			$(this).parent().parent().children('.btn-cmt').show();
		});
		
		$('.frm_cm textarea').focusout(function(e) {
            if($(this).val().length<10)
			{
				$('.btn-cmt').hide();	
			}
		});
		
		$('.btn-cmt').click(function(){
			$(this).hide();
			$('.btn-cms').slideDown();	
		})
		
		//Tra loi binh luan
		$('.box-cm-tl').click(function(){
			$('.frm_cmcl .hdpid').val($(this).attr('data-pid'));
			var $frm_cm=$('.frm_cmcl').clone();
			$frm_cm.removeClass('frm_cmcl');
			if($(this).next().children('form').length==0)
			{
				$(this).next().append($frm_cm);	
			}
		})
    });
</script>

<?php for($i=0;$i<count($comment);$i++){?>
	<div class="box-cm">
    	<div class="w-clear">
        	<div class="box-cm-c">
            	<?=get_char_name($comment[$i]['hoten']);?> 
            </div>
            <div class="box-cm-name <?php if(strtolower($comment[$i]['hoten'])=='admin'){echo ' box-cm-namead';}?>">
            	<?=$comment[$i]['hoten']?>
            	 <span style=" color:rgba(153,153,153,1); float:right;"> <?=date('d/m/Y - g:i A',$comment[$i]['ngaydang']);?></span>
            </div>
        </div>
        <div class="box-cm-info">
        	<?=$comment[$i]['noidung']?>
            <div class="clear"></div>
           <div class="box-cm-tl" data-pid="<?=$comment[$i]['id']?>">Trả lời</div>
           <div class="clear"></div>
           <?php 
		   		$ccm=get_show_comment($comment[$i]['id']);
		   ?>
           <?php if(count($ccm)>0){?>
           <div class="w-cm-rl">
           <?php for($j=0;$j<count($ccm);$j++){?>  
           		<div class="box-cm">
                    <div class="w-clear">
                        <div class="box-cm-c">
                            <?=get_char_name($ccm[$j]['hoten']);?>
                        </div>
                        <div class="box-cm-name <?php if(strtolower($ccm[$j]['hoten'])=='admin'){echo ' box-cm-namead';}?>">
                            <?=$ccm[$j]['hoten']?>
                        </div>
                    </div>
                    <div class="box-cm-info">
                        <?=$ccm[$j]['noidung']?>
                        <div class="clear"></div>
                       <div class="box-cm-tl" data-pid="<?=$comment[$i]['id']?>">Trả lời</div>
                       <div class="clear"></div>
                    </div>
                </div>
           		<?php }?>     
           </div>
           <?php }?>
        </div>
    </div>
<?php }?>
</div>

<div style="display:none;">
<form name="frm_cm" action="" method="post" class="frm_cm frm_cmcl">
	<div><input type="text" name="cm[hoten]" placeholder="Họ và tên" required="required" /></div>
    <div><input type="text" name="cm[email]" placeholder="Email" required="required"/></div>
	<div><textarea name="cm[noidung]" placeholder="Mời bạn thảo luận. Vui lòng nhập Tiếng Việt có dấu, tối thiểu 10 ký tự." required="required" minlength="10" rows="5"></textarea></div>
    <input type="hidden" name="cm[pid]" class="hdpid" />
    <div><input type="submit" value="Trả lời" /></div>
</form>

</div>