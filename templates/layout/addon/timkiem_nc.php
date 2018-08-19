<?php

    $d->reset();
    $sql = "select * from #_tinh where hienthi=1 order by stt,id desc ";
    $d->query($sql);
    $tinhthanh = $d->result_array();

    $d->reset();
    $sql = "select * from #_gia where hienthi=1 order by stt,id desc ";
    $d->query($sql);
    $gia = $d->result_array();

    $d->reset();
    $sql = "select * from #_dientich where hienthi=1 order by stt,id desc ";
    $d->query($sql);
    $dientich = $d->result_array();

?>

<script type="text/javascript">
  $(document).ready(function($) {
    var id_tinh = '<?=@$item['tinhthanh']?>';
    var id_quan = '<?=@$item['quanhuyen']?>'; 

    $.ajax ({
      type: "POST",
      url: "ajax/quanhuyen.php",
      data:{id_tinh:id_tinh,id_quan:id_quan},
      success: function(result) { 
        $('#quanhuyen').html(result);
      }
    });


    $('#tinhthanh').change(function(event) {
      /* Act on the event */
      var id_tinh = $(this).val(); 
      $.ajax ({
        type: "POST",
        url: "ajax/quanhuyen.php",
        data:{id_tinh:id_tinh},
        success: function(result) { 
          $('#quanhuyen').html(result);
        }
      });
    });

    $('#btnSearch').click(function(event) {
      /* Act on the event */
      var keywords = $("input[name='keywords']").val();
      var loaihinh = $("select[name='loaihinh']").val();
      var tinhthanh = $("select[name='tinhthanh']").val();
      var quanhuyen = $("select[name='quanhuyen']").val();
      var dientich = $("select[name='dientich']").val();
      var gia = $("select[name='gia']").val();
      window.location.href='tim-kiem.html&keywords='+keywords+'&loaihinh='+loaihinh+'&tinhthanh='+tinhthanh+'&quanhuyen='+quanhuyen+'&dientich='+dientich+'&gia='+gia;
    });

  });
</script>

<form id="frmPrjSearch" name="frmPrjSearch" method="get" action="tim-kiem.html">
        <div class="comboboxs">
            <input type="text" id="txtAutoComplete" name="keywords" value="" placeholder="Nhập địa điểm, vd: Sunrise City" class="ui-autocomplete-input">
        </div> <!-- .#keyword, .comboboxs-->
        <div id="divCategoryRe" class="comboboxs advance-select-box">
            <select name="loaihinh" id="loaihinh">
                <option value="">Chọn loại nhà đất</option>
                <?php for($i=0;$i<count($row_list);$i++){?>
                <option value="<?=$row_list[$i]['ten_'.$lang]?>"><?=$row_list[$i]['ten_'.$lang]?></option>
                <?php } ?>
            </select>
        </div>
        <div id="divCity" class="comboboxs advance-select-box">
            <select id="tinhthanh" name="tinhthanh">
                <option value="">Chọn Tỉnh/Thành phố</option>
                <?php for($i=0;$i<count($tinhthanh);$i++){?>
                <option value="<?=$tinhthanh[$i]['id']?>"><?=$tinhthanh[$i]['ten']?></option>
                <?php } ?>
                
        </select>
        </div><!-- #divCity-->
        <div id="divDistrict" class="comboboxs advance-select-box" title="">
            <select id="quanhuyen" name="quanhuyen">
            <option value="">Chọn Quận/Huyện</option>
            </select>
        </div>
        <div id="divArea" class="comboboxs advance-select-box">
            <select id="dientich" name="dientich">
                <option value="">Chọn diện tích</option>
                <?php for($i=0;$i<count($dientich);$i++){?>
                <option value="<?=$dientich[$i]['dientichtu']?>-<?=$dientich[$i]['dientichden']?>"><?=$dientich[$i]['ten_vi']?></option>
                <?php } ?>
        </select>
        </div> <!-- #divArea-->
        <div id="divPrice" class="comboboxs advance-select-box">
            <select id="gia" name="gia">
                <option value="">Chọn mức giá</option>
                 <?php for($i=0;$i<count($gia);$i++){?>
                <option value="<?=$gia[$i]['giatu']?>-<?=$gia[$i]['giaden']?>"><?=$gia[$i]['ten_vi']?></option>
                <?php } ?>

        </select>
        </div> <!-- #divPrice -->
        <div class="search-btn">
            <input type="button" name="btnSearch" id="btnSearch" value="Tìm Kiếm">
        </div> <!-- .search-btn-->
</form>
 

