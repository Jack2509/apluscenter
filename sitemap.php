<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<?php
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './libraries/');

	if(!isset($_SESSION['lang']))
	{
	$_SESSION['lang']='vi';
	}
	$lang=$_SESSION['lang'];
	
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	include_once _lib."class.database.php";
	include_once _lib."file_requick.php";
	

$header_xml = "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>\n<urlset xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\" xsi:schemaLocation=\"http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd\">

<author>".$row_setting['ten_'.$lang]."</author>";
$footer_xml = "<author>".$row_setting['ten_'.$lang]."</author></urlset>";
$file_topic = fopen("sitemap.xml", "w+");
fwrite($file_topic, $header_xml);

fwrite($file_topic, "<url><loc>http://".$config_url."/trang-chu.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/gioi-thieu.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/dich-vu.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/khach-hang.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/tuyen-dung.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");

fwrite($file_topic, "<url><loc>http://".$config_url."/lien-he.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");
fwrite($file_topic, "<url><loc>http://".$config_url."/bao-gia.html</loc><lastmod>1/12/2015 - 4:43 PM</lastmod><changefreq>daily</changefreq><priority>0.1</priority></url>");

$d->reset();
$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_baiviet where type='dichvu' order by stt,id desc ";
$d->query($sql);
$sanpham = $d->result_array();

for($i=0;$i<count($sanpham);$i++){
        
fwrite($file_topic, "<url><loc>http://".$config_url."/dich-vu/".$sanpham[$i]['tenkhongdau'].".html</loc><lastmod>".date('d/m/Y - g:i A',$sanpham[$i]['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
} 

$d->reset();
$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_baiviet where type='tintuc' order by stt,id desc ";
$d->query($sql);
$sanpham = $d->result_array();

for($i=0;$i<count($sanpham);$i++){
        
fwrite($file_topic, "<url><loc>http://".$config_url."/tin-tuc/".$sanpham[$i]['tenkhongdau'].".html</loc><lastmod>".date('d/m/Y - g:i A',$sanpham[$i]['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
} 

$d->reset();
$sql = "select ten_$lang,id,tenkhongdau,ngaytao from #_baiviet where type='khachhang' order by stt,id desc ";
$d->query($sql);
$sanpham = $d->result_array();

for($i=0;$i<count($sanpham);$i++){
        
fwrite($file_topic, "<url><loc>http://".$config_url."/khach-hang/".$sanpham[$i]['tenkhongdau'].".html</loc><lastmod>".date('d/m/Y - g:i A',$sanpham[$i]['ngaytao'])."</lastmod><changefreq>daily</changefreq><priority>1</priority></url>");
} 
 
fwrite($file_topic, $footer_xml);
fclose($file_topic);

transfer("Đã tạo xong sitemap ! ", "sitemap.xml");


?>