<?php
$d->reset();
$sql = "select * from #_baiviet_list where hienthi=1 and type='dichvu' order by stt,id desc";
$d->query($sql);
$row_thietke_list = $d->result_array();

$d->reset();
$sql = "select * from #_baiviet where hienthi=1 and type='gioithieu' order by stt,id desc";
$d->query($sql);
$row_gioithieu = $d->result_array();

$d->reset();
$sql = "select * from #_baiviet where hienthi=1 and type='thoikhoabieu' order by stt,id desc";
$d->query($sql);
$row_tkb = $d->result_array();

$d->reset();
$sql = "select * from #_baiviet_list where hienthi=1 and type='duan' order by stt,id desc";
$d->query($sql);
$row_duan_list = $d->result_array();
?>
<nav id="smoothmenu1" class="ddsmoothmenu">
    <ul>
        <li class="icon <?php if($_GET['com']=='trang-chu' || $_GET['com']=='' || $_GET['com']=='index'){?>active<?php }?>"><a href="trang-chu.html"><span><?=_trangchu?></span></a>
        </li>
        <li class="icon <?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a href="javascript:void()"><span><?=_gioithieu?></span></a>
            <ul>
                <?php foreach($row_gioithieu as $k=>$v) {?>
                <li><a href="gioi-thieu/<?=$v['tenkhongdau']?>.html"><?=$v['ten_'.$lang]?></a></li>
                <?php } ?>
            </ul>
        </li>

        <li class="icon menu_dv <?php if($_GET['com']=='giang-vien'){?>active<?php }?>"><a href="javascript:void()"><span>Giảng viên</span> </a>
            <ul class="hover_dv">
                <?php for ($i=0; $i < count($row_thietke_list); $i++) { ?>
                <li><a href="giang-vien/<?=$row_thietke_list[$i]['tenkhongdau']?>"><?=$row_thietke_list[$i]['ten_'.$lang]?></a></li>
                <?php } ?>
            </ul>
        </li>

        <li class="icon menu_dv <?php if($_GET['com']=='giao-an'){?>active<?php }?>"><a href="javascript:void()"><span>giáo án</span> </a>
            <ul class="hover_dv">
                <?php for ($i=0; $i < count($row_duan_list); $i++) { ?>
                <li><a href="giao-an/<?=$row_duan_list[$i]['tenkhongdau']?>"><?=$row_duan_list[$i]['ten_'.$lang]?></a>
                   
                </li>
                <?php } ?>
            </ul>
        </li>

        <li class="icon <?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a href="javascript:void()"><span>Thời khoá biểu</span></a>
            <ul>
                <?php foreach($row_tkb as $k=>$v) {?>
                <li><a href="thoi-khoa-bieu/<?=$v['tenkhongdau']?>.html"><?=$v['ten_'.$lang]?></a></li>
                <?php } ?>
            </ul>
        </li>

        <li class="icon <?php if($_GET['com']=='tin-tuc'){?>active<?php }?>"><a href="tin-tuc.html"><span><?=_tintuc?></span></a> </li>
        <li class="icon <?php if($_GET['com']=='tuyen-dung'){?>active<?php }?>"><a href="tuyen-dung.html"><span>Tuyển dụng</span></a> </li>
              
       <li class=" <?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a href="lien-he.html"> <span> <?=_lienhe?> </span></a></li> 
       <?php include _template."layout/addon/timkiem.php"; ?> 
       
        <div class="clear"></div>
    </ul>
</nav>
<a href="#menu_mobi" class="ui-link">
    <div class="icon_menu">
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom1"></span>
    </div>
</a>