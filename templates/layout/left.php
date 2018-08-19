<?php
$d->reset();
$sql = "select * from #_product_list where hienthi=1 and type='product' order by stt,id desc";
$d->query($sql);
$row_list_tin = $d->result_array();
?>


<div id="left">
	<div class="danhmuc">
		<div class="thanh"><h4>Danh mục sản phẩm</h4></div>
		<div class="left1" class="ddsmoothmenu-v left1" id="smoothmenu2">
			<ul >
				<?php for($i=0,$count_xem=count($row_list_tin);$i<$count_xem;$i++){ ?>
				<?php
				$d->reset();
				$sql = "select * from #_product_cat where hienthi=1 and id_list='".$row_list_tin[$i]['id']."' and type='product' order by stt,id desc";
				$d->query($sql);
				$row_cat = $d->result_array();
				?>

				<li><a href="san-pham/<?=$row_list_tin[$i]['tenkhongdau']?>"><i class="fa fa-circle-o-notch" aria-hidden="true"></i><?=$row_list_tin[$i]['ten_'.$lang]?></a>
					<ul>
						<?php for($j=0,$count_cat=count($row_cat);$j<$count_cat;$j++){?>
						<li><a href="san-pham/<?=$row_list_tin[$i]['tenkhongdau']?>/<?=$row_cat[$j]['tenkhongdau']?>"><?=$row_cat[$j]['ten_'.$lang]?></a></li>
						<?php } ?>
					</ul>
				</li>
				<?php } ?>
			</ul>
		</div>
	</div>     <!-- danhmuc -->
	<div class="danhmuc">
		<div class="thanh"> <h4> Video </h4></div>
		<div class="left ">
			<?=get_video_youtube(250,250,true)?>
		</div>
	</div>     <!-- danhmuc -->

	<div class="danhmuc">
		<div class="thanh"> <h4> Sản phẩm nổi bật</h4></div>
		<div class="left1 ">
			<?php include _template."layout/run_image.php";?>
		</div>
	</div>     <!-- danhmuc -->
</div>