<?php
$d->reset();
$sql = "select * from #_product_list where hienthi=1 and type='product' order by stt,id desc";
$d->query($sql);
$row_product_list = $d->result_array();

?>
<link type="text/css" rel="stylesheet" href="menu/src/css/jquery.mmenu.all.css" />
<script type="text/javascript" src="menu/src/js/jquery.mmenu.min.all.js"></script>
<script type="text/javascript">
    $(function() {
      $('nav#menu_mobi').mmenu();
  });
</script>

<nav id="menu_mobi" class="mm-menu mm-horizontal mm-offcanvas" style="font-family: 'RobotoMedium';">
  <ul>
    <li class="icon <?php if($_GET['com']=='gioi-thieu'){?>active<?php }?>"><a href="gioi-thieu.html"><span><?=_gioithieu?></span></a>
    </li>
    
    <li class="icon menu_dv <?php if($_GET['com']=='san-pham'){?>active<?php }?>"><a href="san-pham.html"><span><?=_sanpham?></span></a>
      <ul class="hover_dv">
        <?php for ($i=0; $i < count($row_product_list); $i++) { ?>
        <?php
        $d->reset();
        $sql = "select * from #_product_cat where hienthi=1 and id_list='".$row_product_list[$i]['id']."' and type='dichvu' order by stt,id desc";
        $d->query($sql);
        $row_product_cat = $d->result_array();
        ?>
        <li><a href="san-pham/<?=$row_product_list[$i]['tenkhongdau']?>"><?=$row_product_list[$i]['ten_'.$lang]?></a>
          <ul>
            <?php for ($j=0; $j <count($row_product_cat) ; $j++) {  ?>
            <li> <a href="san-pham/<?=$row_product_list[$i]['tenkhongdau']?>/<?=$row_product_cat[$j]['tenkhongdau']?>" title=""><?=$row_product_cat[$j]['ten_'.$lang]?></a> </li>
            <?php } ?>
          </ul>
        </li>
        <?php } ?>
      </ul>
    </li>
    <li class="icon <?php if($_GET['com']=='dich-vu'){?>active<?php }?>"><a href="dich-vu.html"><span><?=_dichvu?></span></a> </li>
    <li class="icon <?php if($_GET['com']=='tn-tuc-su-kien'){?>active<?php }?>"><a href="tin-tuc-su-kien.html"><span><?=_tintucsukien?></span></a> </li>
    <li class="icon <?php if($_GET['com']=='min-ngon-moi-ngay'){?>active<?php }?>"><a href="mon-ngon-moi-ngay.html"><span><?=_monngonmoingay?></span></a>  </li>
    <li class=" <?php if($_GET['com']=='lien-he'){?>active<?php }?>"><a href="lien-he.html"> <span> <?=_lienhe?> </span></a></li>
    <div class="clear"></div>
  </ul>
</nav>  