<div id="info">
<div id="sanpham">
       
        <div class="khung">
      

        <div class="thanh_title"><h2><?=$title_detail?></h2></div>
        <div class="noidung">
		 <h1 style="color:#44662E; font-size:20px;"> <?=$tintuc[0]['ten_'.$lang]?></h1>
         <span style=" color:rgba(153,153,153,1);">Ngày Đăng : <?=date('d/m/Y - g:i A',$tintuc[0]['ngaytao']);?></span><br />
         <?=$tintuc[0]['noidung_'.$lang]?>
		</div>
        
<div style="clear:left;"></div><br /><br />
<span style=" padding-left:10px; text-transform:uppercase; font-weight:bold;"><?=_othernews?></span>

                    <?php foreach($tinkhac as $tinkhac){?>
                    <div style="padding-left:10px; height:auto;"><a href="<?=$com?>/<?=$tinkhac['tenkhongdau']?>.html" style="text-decoration:none;"><img src="images/sao.png" border="0" />&nbsp;&nbsp;<span style="font-size:14px; color:#666;"><?=$tinkhac['ten_'.$lang]?></span></a><span style="color:#0099FF;"> (<?=make_date($tinkhac['ngaytao'])?>)</span></div>
                    
                    <?php }?>
                      </div>      
        
</div></div>
     