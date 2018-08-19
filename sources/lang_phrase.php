<?php
$d = new database($config['database']);

$sql = "select phrase,noidung from table_phrase";
$d->query($sql);
$ngonngu=$d->result_array();

foreach ($ngonngu as $key => $value) {
	$meanLang=json_decode($value['noidung'],true);
	@define($value['phrase'],$meanLang[$lang]);
}
?>