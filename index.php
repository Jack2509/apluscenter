<?php
session_start();
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
include_once _lib."functions_share.php";
include_once _lib."class.database.php";
include_once _source."lang_$lang.php";
include_once _lib."functions_giohang.php";
include_once _lib."file_requick.php";
include_once _lib."counter.php";
if($_REQUEST['command']=='add' && $_REQUEST['productid']>0){
    $pid=$_REQUEST['productid'];
    $soluong=1;
    addtocart($pid,$soluong);
    // redirect("thanh-toan.html");
}
if($_GET['lang']!=''){
    $_SESSION['lang']=$_GET['lang'];
    header("location:".$_SESSION['links']);
} else {
    $_SESSION['links']=getCurrentPageURL();
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <base href="http://<?=$config_url?>/">
    <link id="favicon" rel="shortcut icon" href="<?=_upload_hinhanh_l.$favicon['thumb_'.$lang]?>" type="image/x-icon" />
    <title><?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?></title>
    <meta name="description" content="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>">
    <meta name="keywords" content="<?php if($keywords_bar!='') echo $keywords_bar; else echo $row_setting['keywords']; ?>">
    <meta name="viewport" content="width=1200">
    <meta name="robots" content="noodp,index,follow" />
    <meta name="google" content="notranslate" />
    <meta name='revisit-after' content='1 days' />
    <meta name="ICBM" content="<?=$row_setting['toado']?>">
    <meta name="geo.position" content="<?=$row_setting['toado']?>">
    <meta name="geo.placename" content="<?=$row_setting['diachi_'.$lang]?>">
    <meta name="author" content="<?=$row_setting['ten_'.$lang]?>">
    <?php if($share_facebook!=''){ echo $share_facebook ; }
    else {
        $share_facebook = '<meta property="og:url" content="'.getCurrentPageURL().'" />';
        $share_facebook .= '<meta property="og:type" content="website" />';
        $share_facebook .= '<meta property="og:title" content="'.$row_setting['ten_'.$lang].'" />';
        $share_facebook .= '<meta property="og:description" content="'.$row_setting['description'].'" />';
        $share_facebook .= '<meta property="og:image" content="http://'.$config_url.'/'._upload_hinhanh_l.$favicon['thumb_'.$lang].'" />';
        echo $share_facebook;
    }
    ?>
    <!-- Dublin Core-->
    <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
    <meta name="DC.title" content="<?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?>">
    <meta name="DC.identifier" content="http://<?=$config_url?>/">
    <meta name="DC.description" content="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>">
    <meta name="DC.subject" content="<?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?>">
    <meta name="DC.language" scheme="UTF-8" content="vi">
    <!--Geo Meta Tags-->
    <meta name="geo.region" content="VN" />
    <meta name="geo.position" content="<?=$row_setting['toado']?>">
    <meta name="geo.placename" content="<?=$row_setting['diachi_'.$lang]?>">
    <meta name="ICBM" content="<?=$row_setting['toado']?>">
    <meta name="author" content="<?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?>">
    <!-- Thẻ Twitter Card -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="<?php if($title_bar!='') echo $title_bar; else echo $row_setting['title']; ?>" />
    <meta name="twitter:description" content="<?php if($description_bar!='') echo $description_bar; else echo $row_setting['description']; ?>" />
    <!-- Thẻ Canonical -->
    <link rel="canonical" href="<?=getCurrentPageURL_index()?>" />
    <script language="javascript" type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
    <link rel="stylesheet" href="css/muangay.css">
    <link rel="stylesheet" type="text/css" href="js/ddsmoothmenu.css" />
    <link rel="stylesheet" type="text/css" href="js/ddsmoothmenu-v.css" />

    <link href="style.css" rel="stylesheet" type="text/css" />
    <link href="css/elements.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="js/bootstrap-3.3.5-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="js/slick.css"/>
    <link rel="stylesheet" type="text/css" href="js/animate.css"/>
    <link rel="stylesheet" type="text/css" href="css/font-awesome-4.5.0/css/font-awesome.css"/>
    <link rel="stylesheet" type="text/css" href="js/owl_carousel/assets/owl.carousel.css" />

    <style type="text/css">
        body{
            font-family: Arial;
            font-size:14px;

            background-color:<?=$row_background['mauneen']?>;
            background-attachment:<?=$row_background['fix_bg']?>;
            height: 100%;
            background-color: #fff;
            color: #515151;
            min-width: 1200px;
        }
    </style>
    <address class="vcard" style='display: none'>
        <span class="org"><?=$row_setting['ten_'.$lang]?></span>,
        <span class="adr"><?=$row_setting['diachi_'.$lang]?></span>
        <span class="street-address"><?=$row_setting['diachi_'.$lang]?></span>,
        <span class="locality"><?=$row_setting['toado']?></span>,
        <span class="postal-code"></span>,
        <span class="country-name">Việt Nam</span>.
        <span class="tel"><?=$row_setting['hotline']?></span>
    </address>
    <?=$row_setting['head']?>
</head>
<body itemscope itemtype="http://schema.org/WebPage" >
<?=$row_setting['body_top']?>
<?php include _template."layout/menu_mobile.php";?>
<div id="container">
    <header id="header">
        <?php include _template."layout/header.php"; ?>
    </header>
    <?php if($source=='index' ){?>
        <div id="slide_show">
            <?php include _template."layout/quake_slider.php";?>
        </div>

    <?php } ?>
    <main id="main">
        <div class="margin_auto">
            <section id="content" class="clear_fix">
                <?php if($source=='index' ) {?>
                    <?php //include _template.$template."_tpl.php";?>
                <?php } else { ?>
                    <?php include _template.$template."_tpl.php";?>
                <?php } ?>
            </section>
        </div>
    </main>
    <?php if($source=='index' ){?>
        <?php //include _template."layout/sp_noibat.php";?>
        <?php include _template."layout/dichvunb.php";?>
        <?php include _template."layout/gioithieu_dtac.php";?>
        <?php include _template."layout/duanin.php";?>

        <?php include _template."layout/center.php";?>
        <?php include _template."layout/addon/nhantin.php"; ?>

        <?php// include _template."layout/new.php";?>

    <?php } ?>
    <?php //include _template."layout/addon/nhantin.php";?>
    <?php// include _template."layout/doitac.php";?>
    <footer id="footer">
        <?php include _template."layout/footer.php"; ?>
    </footer>
</div>
<?php include _template."layout/top_index.php"; ?>
<?php include _template."layout/addon/chat.php"; ?>
<?php include _template."layout/hotline_nhay.php"; ?>
<?php include _template."layout/btn_show_homework_form_popup.php"; ?>
<?=$row_setting['vchat']?>
<?php if($_GET['com']=='' || $_GET['com']=='index' || $_GET['com']=='trang-chu'){?>
    <?php //include _template."layout/addon/popup.php"; ?>
<?php } ?>
<?=$row_setting['body_bottom']?>
<script type="text/javascript" src="js/ddsmoothmenu.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript">
    new WOW().init();
</script>
<script type="text/javascript" charset="utf-8" >
    $().ready(function(){
        var widthsc = screen.width;

        $(window).scroll(function(){
            if($(window).scrollTop()>115){
                $("#main_menu").addClass('fixed');
            }else{
                $("#main_menu").removeClass('fixed');
            }
        });

    });
    ddsmoothmenu.init({
        mainmenuid: "smoothmenu1", //menu DIV id
        orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
        classname: 'ddsmoothmenu', //class added to menu's outer DIV
        //customtheme: ["#1c5a80", "#18374a"],
        contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
    })

    $(document).ready(function() {
        $('.Box_vi img').click(function (){
            var str = $(this).attr('data-href');
            $('#box_video iframe').attr('src', str);
            return false;
        });
        $('.slick_video').slick({
            dots: false,
            infinite: true,
            speed: 1500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            arrows:false,
            // vertical:true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 800,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        arrows:false
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        arrows:false
                    }
                },
                {
                    breakpoint: 450,
                    settings: {
                        slidesToShow: 4,
                        slidesToScroll: 1,
                        arrows:false
                    }
                }
            ]

        });

        $('.slick_sp').slick({
            dots: false,
            infinite: true,
            speed: 1500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            arrows:true,
        });
    });
</script>
<?php if($source=='product') {?>
    <script type="text/javascript">
        ddsmoothmenu.init({
            mainmenuid: "smoothmenu2", //Menu DIV id
            orientation: 'v', //Horizontal or vertical menu: Set to "h" or "v"
            classname: 'ddsmoothmenu-v', //class added to menu's outer DIV
            //customtheme: ["#804000", "#482400"],
            contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
        })

    </script>
<?php } ?>
<?php if($source!='index') {?>
    <script type="text/javascript">
        // $(document).ready(function(e) {
        //   $(window).scroll(function(e) {
        //     var body = $("body");
        //     var top = body.scrollTop();

        //       });
        //   $('html,body').animate({
        //   scrollTop: $('#main').offset().top},'slow'
        //   );
        //   });
    </script>
<?php } ?>
</body>

</html>