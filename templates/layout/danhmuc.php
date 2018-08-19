<?php

    $d->reset();
    $sql = "select * from #_product_list where hienthi=1 and type='product' order by stt,id desc";
    $d->query($sql);
    $row_list1 = $d->result_array();



    $d->reset();
    $sql = "select ten_$lang,giaban, thumb,tenkhongdau from #_product where hienthi=1 and type='product' order by stt,id desc";
    $d->query($sql);
    $productnb_left = $d->result_array();
?>
<script type="text/javascript" src="js/jquery.hoverIntent.minified.js"></script>
<script type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>

<script>
  $().ready(function(e) {
        $('.accordion-2').dcAccordion({
      eventType: 'hover',
      autoClose: true,
      menuClose   : true,  
      classExpand : 'dcjq-current-parent',
      saveState: false,
      disableLink: false,
      showCount: false,
      hoverDelay   : 50,
      speed: 'slow'
    });

    });
</script>

<div id="danhmuc" style="float: left;">


  <div class="danhmuc">
    <div class="thanh"><h4> Danh mục sản phẩm</h4></div>
    <div class="clear"></div>
    <div class="danhmuc_left" >
      <ul class="accordion accordion-2">
        <?php for($i=0,$count_xem=count($row_list1);$i<$count_xem;$i++){?>

        <?php
        $d->reset();
        $sql = "select * from #_product where hienthi=1 and type='product' and id_list=".$row_list1[$i]['id']." order by stt,id desc";
        $d->query($sql);
        $row_product1 = $d->result_array();

        $d->reset();
        $sql = "select * from #_product_cat where hienthi=1 and id_list='".$row_list1[$i]['id']."' and type='product' order by stt,id desc";
        $d->query($sql);
        $row_cat = $d->result_array();
        ?>
        <li><a class="show" href="san-pham/<?=$row_list1[$i]['tenkhongdau']?>"><?=$row_list1[$i]['ten_'.$lang]?>(<?=count($row_product1)?>)</a>
          <ul class="hide1">
            <?php for($j=0,$count_cat=count($row_cat);$j<$count_cat;$j++){ ?>
            <li><a href="san-pham/<?=$row_list1[$i]['tenkhongdau']?>/<?=$row_cat[$j]['tenkhongdau']?>"><?=$row_cat[$j]['ten_'.$lang]?></a>
            </li>
            <?php } ?>
          </ul>         
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>




</div>