<?php

	$title_bar .= "Thanh Toán";

if($_SESSION['login_web']!=''){
	$d->reset();
	$sql = "select * from #_thanhvien where id=".$_SESSION["login_web"]["id"]."  ";
	$d->query($sql);
	$thanhvien_tv = $d->fetch_array();

}
?>