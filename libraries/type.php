<?php
	$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";	
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$act = explode('_',$act);
	if(count($act>1)){
		$act = $act[1];
	} else {
		$act = $act[0];
	}
	switch($type){
		//-------------product------------------
		case 'product':
			switch($act){
				case 'list':
					$title_main = "Danh mục cấp 1";
					$config_images = "false";
					$config_mota= "false";
					@define ( _width_thumb , 395 );
					@define ( _height_thumb , 545 );
					@define ( _style_thumb , 1 );
					$ratio_ = 1;
					break;
				default:
					$title_main = "Sản phẩm";
					$config_images = "false";
					$config_mota= "true";
					$config_list = "true";
					$config_cat = "true";
					$config_item = "true";
					$config_sub = "false";
					@define ( _width_thumb , 280 );
					@define ( _height_thumb , 260 );
					@define ( _style_thumb , 2 );
					$ratio_ = 3;
					break;
				}
				@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			break;


		case 'dichvu':
			$title_main = "Dịch vụ";
			$config_images = "true";
			$config_images_l = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "true";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 385 );
			@define ( _height_thumb , 270 );
			@define ( _width_thumb_l , 385 );
			@define ( _height_thumb_l , 270 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'duan':
			$title_main = "Dự án";
			$config_images = "true";
			$config_images_l = "false";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "true";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 385 );
			@define ( _height_thumb , 270 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;




		case 'thietke':
			$title_main = "Thiết kế kiến trúc";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "true";
			$config_cat = "true";
			$config_item = "false";
			$config_noibat = "true";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 245 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;


		case 'thicong':
			$title_main = "Thi công";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 245 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'noithat':
			$title_main = "Nội thất";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 245 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bds':
			$title_main = "Bất động sản";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 245 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'tuyendung':
			$title_main = "Tuyển dụng";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 375 );
			@define ( _height_thumb , 245 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'tintuc':
			$title_main = "Tin tức";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 370 );
			@define ( _height_thumb , 240 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		case 'tuvan':
			$title_main = "Tư vấn";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 370 );
			@define ( _height_thumb , 240 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'gioithieu':
			$title_main = "Giới thiệu";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 370 );
			@define ( _height_thumb , 240 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		 case 'thoikhoabieu':
			$title_main = "thời khoá biểu";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 370 );
			@define ( _height_thumb , 240 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;


		case 'baogia':
			$title_main = "Báo giá";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "true";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 245 );
			@define ( _height_thumb , 145 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;


		case 'xaydung':
			$title_main = "Xây dựng";
			$config_images = "true";
			$config_ten = "true";
			$config_mota= "true";
			$config_noidung= "true";
			$config_list = "false";
			$config_cat = "false";
			$config_item = "false";
			$config_noibat = "false";
			$config_banchay = "false";
			$config_noibat_l = "false";
			$config_sub = "false";
			@define ( _width_thumb , 245 );
			@define ( _height_thumb , 145 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'download':
			$title_main = "Download File";
			$config_images = "true";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 250 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		
		case 'album':
			$title_main = "Album";
			$config_images = "true";
			$config_list = "false";
			$config_mota= "true";
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			@define ( _width_thumb , 270 );
			@define ( _height_thumb , 295 );
			@define ( _style_thumb , 1 );
			$ratio_ = 2;
			break;

		case 'album_list':
			$title_main = "danh mục album";
			$config_images = "true";
			$config_list = "false";
			@define ( _width_thumb , 200 );
			@define ( _height_thumb , 160 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------info------------------
		case 'slogan':
			$title_main = 'Slogan';
			$config_ten = 'true';
			break;
		case 'tags':
			$title_main = 'tags';
			$config_ten = 'true';
			break;
			
		case 'trangchu':
			$title_main = 'Trang chủ';
			$config_images = 'true';
			$config_ten = 'true';
			@define ( _width_thumb , 590 );
			@define ( _height_thumb , 260 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'hinhanh':
			$title_main = 'Hình ảnh';
			$config_ten = 'true';
			break;
		case 'chamsoc':
			$title_main = 'chăm sóc khách hàng';
			$config_ten = 'true';
			break;
		case 'lienhe':
			$title_main = 'Liên hệ';
			$config_ten = 'true';
			break;

		case 'banner':
			$title_main = 'Banner';
			@define ( _width_thumb , 395 );
			@define ( _height_thumb , 100 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF|swf' );
			$ratio_ = 1;
			break;

		case 'logo':
			$title_main = 'Logo';
			@define ( _width_thumb , 90);
			@define ( _height_thumb , 110 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'popup':
			$title_main = 'Popup';
			$links_ = 'true';
			$config_hienthi = 'true';
			@define ( _width_thumb , 900 );
			@define ( _height_thumb , 500 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bando':
			$title_main = 'Bản đồ';
			@define ( _width_thumb , 320 );
			@define ( _height_thumb , 180 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'favicon':
			$title_main = 'Favicon';
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;

		case 'bgweb':
			$title_main = 'background web';
			@define ( _width_thumb , 500 );
			@define ( _height_thumb , 120 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			break;
		//-------------photo------------------
		case 'slider':
			$title_main = "Hình ảnh slider";
			$config_mota= "false";
			@define ( _width_thumb , 1366 );
			@define ( _height_thumb , 520 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;

		case 'ha_gt':
			$title_main = "Hình ảnh giới thiệu";
			$config_mota= "false";
			@define ( _width_thumb , 340 );
			@define ( _height_thumb , 215 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;


		case 'doitac':
		    $title_main = "Đối tác";
			@define ( _width_thumb , 155 );
			@define ( _height_thumb , 130 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;

		case 'quancao':
		    $title_main = "Hình ảnh quảng cáo";
			@define ( _width_thumb , 390 );
			@define ( _height_thumb , 180 );
			@define ( _style_thumb , 1 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;



		case 'lkweb':
		    $title_main = "Liên kết web";
			@define ( _width_thumb , 15 );
			@define ( _height_thumb , 20 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;

		case 'lkwebft':
		    $title_main = "Liên kết web footer";
			@define ( _width_thumb , 40 );
			@define ( _height_thumb , 40 );
			@define ( _style_thumb , 2 );
			@define ( _img_type , 'jpg|gif|png|jpeg|PNG|JPG|JPEG|GIF' );
			$ratio_ = 1;
			$links_ = "true";
			break;



		//--------------defaut---------------
		default: 
			$source = "";
			$template = "index";
			break;
	}

?>