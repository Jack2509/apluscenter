<?php

	$com = (isset($_REQUEST['com'])) ? addslashes($_REQUEST['com']) : "";
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$d = new database($config['database']);
	
	$page = (int)(!isset($_GET["page"]) ? 1 : $_GET["page"]);
	if ($page <= 0) $page = 1;
	
	$d->reset();
	$sql_setting = "select * from #_setting limit 0,1";
	$d->query($sql_setting);
	$row_setting= $d->fetch_array();

	$d->reset();
	$sql_setting = "select * from #_bgweb where type='bgweb' limit 0,1";
	$d->query($sql_setting);
	$row_background= $d->fetch_array();

	$d->reset();
    $sql = "select thumb_$lang from #_photo where type='favicon'";
    $d->query($sql);
    $favicon = $d->fetch_array();

    $d->reset();
    $sql_banner_top= "select photo_$lang from #_photo where type='banner'";
    $d->query($sql_banner_top);
    $banner_top = $d->fetch_array();
    
	
	switch($com){
		case 'video':
			$source = "video";
			$template = isset($_GET['id']) ? "video_detail" : "video";
			break;
			
		case 'hoi-dap':
			$source = "hoidap";
			$template = isset($_GET['id']) ? "hoidap_detail" : "hoidap";
			$title_detail = 'Hỏi đáp';
			break;

		case 'ban-do':
			$source = "map";
			$template ="map";
			break;
		case 'download':
			$source = "download";
			$template = isset($_GET['id']) ? "download_detail" : "download";
			$type_bar = 'download';
			$title_detail = "Download";
			break;
		case 'hoat-dong':
			$source = "album";
			$template = isset($_GET['id']) ? "album_detail" : "album";
			$type_bar = 'album';
			$title_detail = "Hoạt động";
			break;
		case 'site-map':
			$source = "sitemap";
			$template ="sitemap";
			break;


		case 'dang-nhap':
			$source = "login";
			$template ="login";
			break;
		case 'tags':
			$source = "tags";
			$template ="tags";
			break;

		case 'hinh-anh':
			$source = "gallery";
			$template = "gallery_detail";			
			break;

		case 'cong-trinh':
			$source = "album";
			$template = isset($_GET['id']) ? "album_detail" : "album";
			$type_bar = 'album';
			$title_detail = _congtrinh;
			break;
	



		case 'xin-phep-xay-dung':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'xaydung';
			$title_detail = 'Xin phép xây dựng';
			break;

		case 'thiet-ke':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'thietke';
			$title_detail = 'Thiết kế';
			break;

		case 'giang-vien':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'dichvu';
			$title_detail = 'giảng viên';
			break;

		case 'thoi-khoa-bieu':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'thoikhoabieu';
			$title_detail = 'thời khoá biểu';
			break;

		case 'thi-cong':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'thicong';
			$title_detail = 'Thi công';
			break;

		case 'noi-that':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'noithat';
			$title_detail = 'Nội thất';
			break;

		case 'bat-dong-san':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'bds';
			$title_detail = 'Bất động sản';
			break;

		case 'tin-tuc':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tintuc';
			$title_detail = _tintuc;
			break;

		case 'giao-an':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'duan';
			$title_detail = "giáo án";
			break;

		case 'tu-van':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tuvan';
			$title_detail = "Tư vấn";
			break;

		case 'tuyen-dung':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tuyendung';
			$title_detail = "Tuyển dụng";
			break;

		case 'gioi-thieu':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'gioithieu';
			$title_detail = "Giới thiệu";
			break;

		case 'bao-gia':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'baogia';
			$title_detail = _baogia;
			break;

		case 'tuyen-dung':
			$source = "news";
			$template = isset($_GET['id']) ? "news_detail" : "news";
			$type_bar = 'tuyendung';
			$title_detail = _tuyendung;
			break;

		case 'san-pham':
			$source = "product";
			$template = isset($_GET['id']) ? "product_detail" : "product";
			$type_bar = 'product';
			$title_detail = _sanpham;
			break;

		case 'lien-he':
			$source = "contact";
			$template = "contact";
			break;

		case 'giao-hang-toan-quoc':
			$source = "giaohang";
			$template = "giaohang";
			break;



		case 'dat-hang-thanh-cong':
			$source = "success";
			$template = "success";
			break;


		
		case 'tim-kiem':
			$source = "search";
			$template = "search";
			break;
		case 'gio-hang':
			$source = "giohang";
			$template = "giohang";
			break;	
		case 'thanh-toan':
			$source = "thanhtoan";
			$template = "thanhtoan";
			break;
		case 'xac-nhan':
			$source = "xacnhan";
			$template = "xacnhan";
			break;		

		case '404':
			$template = "404";
			break;

		case '':
			$source = "index";
			$template = "index";
			break;

		case 'trang-chu':
			$source = "index";
			$template = "index";
			break;

		case 'index':
			$source = "index";
			$template = "index";
			break;


		default: 
			$template = "404";
			break;
	}
	
	if($source!="") include _source.$source.".php";
	
	if($_REQUEST['com']=='logout')
	{
	session_unregister($login_name);
	header("Location:index.php");
	}		
?>