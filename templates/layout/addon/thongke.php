<div class="clear"></div>

<ul>
	<li> <img src="images/tk1.png" alt="Thống kê truy cập"><?=_dangonline?> : <span><?php $count=count_online();echo $tong_xem=$count['dangxem'];?></span></li>
	<li>  <img src="images/tk2.png" alt="Thống kê truy cập"> Thống kê tuần : <span> <?=$week_visitors?></span> </li>
	<li>  <img src="images/tk3.png" alt="Thống kê truy cập"> Thống kê tháng : <span>	<?=$month_visitors?></span></li>
	<li> <img src="images/tk4.png" alt="Thống kê truy cập"> <?=_tongtruycap?> : <span><?=$all_visitors?></span></li>
	
</ul>