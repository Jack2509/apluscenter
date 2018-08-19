<div id="info">
    <div id="sanpham">

        <div class="khung">

            <div class="thanh_title"><h2> <span> <?=$title_detail?></span></h2> </div><div class="clear"></div>
            <div class="wap_album">
                <?php if(count($album)!=0){?>
                <?php for($j=0;$j<count($album);$j++){?>
                <div class="box_album">
                    <div class="album">
                        <img src="<?=_upload_album_l.$album[$j]['thumb']?>" alt="<?=$album[$j]['tenkhongdau']?>">
                        
                        <div class="hover_tuyensinh">
                            <h3><a href="<?=$com?>/<?=$album[$j]['tenkhongdau']?>.html"><?=$album[$j]['ten_'.$lang]?></a> </h3>
                            <a href="<?=$com?>/<?=$album[$j]['tenkhongdau']?>.html"><?=$album[$j]['mota_'.$lang]?></a>
                        </div>

                    </div>
                </div>
                <?php }?>

                <?php } else { ?><div style="text-align:center; color:#FF0000; font-weight:900; font-size:22px; text-transform:uppercase;" >Chưa Có Tin Cho Mục này .</div> <?php }?>
            </div>
            <div class="clear"></div>
            <div class="paging"><?=$paging?></div> 

        </div>

    </div>
</div>

<h1 class="visit_hidden"><?=$row_setting['ten_'.$lang]?></h1></div>