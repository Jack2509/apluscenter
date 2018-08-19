<?php 
$d->reset();
$sql_banner_top= "select ten_$lang, id from #_product_list where type='product'";
$d->query($sql_banner_top);
$row_listtim = $d->result_array();


?>

<script type="text/javascript">
  $(document).ready(function() {
   $('.frm_timkiem').submit(function(){
    var timkiem = $('#name_tk').val();
    var idl=$('#idl').val(); 

    if(!timkiem){
      alert('Bạn chưa nhập từ khóa . ');
    } else {
      window.location.href="tim-kiem.html&keywords="+timkiem+"&list="+idl;
    }
    return false;
  })
 });
</script>

<div id="timkiem">
 <form action="tim-kiem.html" method="" name="frm2" class="frm_timkiem">
  <input type="text" name="timkiem" id="name_tk" class="input" placeholder="Nhập từ khóa.">
  <?php /* ?>
  <select name="" id="idl">
    <option value="">Tất cả</option>
    <?php for ($i=0; $i < count($row_listtim); $i++) { ?>

    <option value="<?=$row_listtim[$i]['id']?>" 
      <?php if($row_listtim[$i]['id']==$idl){echo 'selected="selected"';} ?>><?=$row_listtim[$i]['ten_'.$lang]?>
    </option>
    <?php } ?>
  </select> */?>

  <button type="submit" value="" class="nut_tim"></button>
</form>
</div>