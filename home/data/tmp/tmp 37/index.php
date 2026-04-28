<?php 
session_start();
ob_start();
$url = "home/data/tmp/tmp 37/096 dingo-master/";
$komponen = "home/data/tmp/tmp 37/";
include 'home/include/all_include.php';
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Dingo</title>
    <link rel="icon" href="<?php echo $url; ?>img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/bootstrap.min.css">
    <!-- animate CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/animate.css">
    <!-- owl carousel CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/owl.carousel.min.css">
    <!-- themify CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/themify-icons.css">
    <!-- flaticon CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/flaticon.css">
    <!-- font awesome CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/magnific-popup.css">
    <!-- swiper CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/slick.css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/gijgo.min.css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/nice-select.css">
    <link rel="stylesheet" href="<?php echo $url; ?>css/all.css">
      <script type="importmap">
  {
    "imports": {
      "sweetalert2": "./node_modules/sweetalert2/dist/sweetalert2.all.js"
    }
  }
  </script>
    <!-- style CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>css/style.css">
</head>

<body>
    <!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="<?php echo $url; ?>index.html"><!--  <img src="<?php echo $url; ?>img/logo.png" alt="logo"> --> <img width="50" src="admin/data/image/logo/logo.png" alt="">&nbsp;<?php echo  ucwords($judul);?></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav">
                               <!-- MENU -->
<?php
$m = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
foreach($m as $i){if($i->t == 's' ){
?>
<!-- SINGLE -->
        <?php $apa = $i->n;
        if ($apa=="Login")
        {
            $token="";
            if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
            {
                $kodene = decrypt($_COOKIE["kodene"]);
                $ip = $_SERVER['REMOTE_ADDR']; 
                $useragent = $_SERVER['HTTP_USER_AGENT'];
                $token = sha1($ip.$useragent.$key);
                $token = crypt($token, $key);
                
                if ($_COOKIE['token_user'] == $token)
                {
                    $token = "ada";
                }
                else
                {
                    $token = "null";
                }
                $kode = cek_database("","","","select * from data_user where id_user='$kodene'");
            }
            else
            {
                $token = "";
                $kode ="";
            }
            
            if ($kode=="ada" && $token=="ada")
            {
                
            ?> 
            <li class="nav-item text-white"> <a class="nav-link " href="index.php?p=login&action=logout">Logout</a> </li>
            <?php    
            }
            else
            {
                
            ?>
            <li class="nav-item " style='color:#ffff'> <a class="nav-link text-white" href="index.php?p=login&action=logout"><?php echo $i->n;?></a> </li>
            <?php
            }
            
        }elseif($apa=="Home"){
            $token="";
            if ((isset($_COOKIE["kodene"])) && (isset($_COOKIE["token_user"])))
            {
                $kodene = decrypt($_COOKIE["kodene"]);
                $ip = $_SERVER['REMOTE_ADDR']; 
                $useragent = $_SERVER['HTTP_USER_AGENT'];
                $token = sha1($ip.$useragent.$key);
                $token = crypt($token, $key);
                
                if ($_COOKIE['token_user'] == $token)
                {
                    $token = "ada";
                }
                else
                {
                    $token = "null";
                }
                $kode = cek_database("","","","select * from data_user where id_user='$kodene'");
            }
            else
            {
                $token = "";
                $kode ="";
            }
            
            if ($kode=="ada" && $token=="ada")
            {
                
            ?> 
            <li class="nav-item text-white"> <a class="nav-link " href="index.php?p=dashboard user">Dashboard User</a> </li>
            <?php    
            }
            else
            {
                
            ?>
            <li class="nav-item " style='color:#ffff'> <a class="nav-link text-white" href="index.php?p=home">Home</a> </li>
            <?php
            }
        }else{
            if($i->n=='Home'){
                ?>
            <li class="nav-item"> <a class="nav-link" href="index.php?p=home">Home</a> </li>
        <?php
            }else{
        ?>
         <li class="nav-item" > <a  style='color:#fff' class="text-white" href="<?php echo $i->l;?>"><?php echo $i->n;?></a> </li>
        <?php } 
        }
        ?>
<!-- /SINGLE -->
<?php
}else if($i->t == 'm' ){
     $idmenu = $i->id;
?>
<!-- MULTI -->
        <li  class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $i->n;?><b class="caret hidden"></b></a>
        <ul class="dropdown-menu agile_short_dropdown">
        <?php
        $m1 = new SimpleXMLElement('home/include/settings/menu.xml', null, true);
        foreach($m1 as $i1) {
        if($i1->s=="$idmenu" and $i1->t=="sm" ){
        ?>
            <li><li>
            <a class="item" onclick="window.location = '<?php echo $i1->l;?>'">
            <?php echo $i1->n;?></a>
            </li></li>
        <?php }} ?>
        </ul>
        </li>
<!-- /MULTI -->
        <?php }} ?>
<!-- /MENU -->
                            </ul>
                        </div>
                        <!-- <div class="menu_btn">
                            <a href= "#" class="btn_1 d-none d-sm-block">book a tabel</a>
                        </div> -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header part end-->

    <!-- banner part start-->    
     <?php if(isset($_GET['p']) && $_GET['p']=="home") { ?>
    <section class="banner_part"style="background:url(home/data/image/background/fitnes2.jpg) no-repeat; ">
        <div class="container" style="background-color: rgba(0, 0, 0, 0.5);" >
            <div class="row align-items-center" >
                <div class="col-lg-6" >
                    <div class="banner_text">
                        <div class="banner_text_iner">
                            <h5>LET'S MAKE IT !</h5>
                            <h1 class='text-white'>Mulai Latih dan Bentuk Ototmu </h1>
                            <p style='color:#fa4000'>Dengan latihan rutin mengikuti program latihan dari kami, badan ideal anda dapat menjadi kenyataan ayo daftar sekarang</p>
                            <div class="banner_btn">
                                <div class="banner_btn_iner" >
                                    <a href= "index.php?p=login" style='background-color:#fff'class="btn_2 rounded-pill">Login <img src="<?php echo $url; ?>img/icon/left_1.svg" alt=""></a>
                                </div>
                                <!-- <a href= "" class="popup-youtube video_popup text-white">
                                    <span ><img src="<?php echo $url; ?>img/icon/play.svg" alt=""></span> y</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><?php }else{ ?>
    <!-- banner part start-->
    <section class="breadcrumb breadcrumb_bg" style="background:url(home/data/image/background/fittness.jpg)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="breadcrumb_iner text-center">
                        <div class="breadcrumb_iner_item">
                            <h2><?php echo $_GET['p']; ?></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><?php } ?>

    <!--::exclusive_item_part start::-->
  

    <!-- about part start-->
    <section class="" style='background-color:#fff'>
        <div class="container">
            <div class="rows"><?php include 'halaman.php';?>
<h2>&nbsp;</h2>
               
            </div>
        </div>
    </section>

    <!-- footer part start-->
    <footer class="footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="single-footer-widget footer_1">
                        <h4>About Us</h4>
                        <p>Website ini ditujukan untuk membantu kalangan yang ingin mendapatkan tubuh yang ideal dan prima melaui program-program khusus yang kami tawarkan.</p>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-2 col-lg-3">
                    <div class="single-footer-widget footer_2">
                        <h4>Important Link</h4>
                        <div class="contact_info">
                            <ul>
                                <li><a href= "index.php?p=home">Home</a></li>
                                <li><a href= "index.php?p=profil"> Profil</a></li>
                                <li><a href= "index.php?p=login">Login</a></li>
    
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-3 col-lg-3">
                    <div class="single-footer-widget footer_2">
                        <h4>Contact us</h4>
                        <div class="contact_info">
                            <p><span> Address :</span><?php echo $alamat; ?> </p>
                            <p><span> Phone :</span> <?php echo $telepon; ?></p>
                            <p><span> Email : </span><?php echo $email; ?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-footer-widget footer_3">
                        <!-- <h4>Newsletter</h4>
                        <p>Heaven fruitful doesn't over lesser in days. Appear creeping seas</p>
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Email Address'
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="fas fa-paper-plane"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form> -->
                    </div>
                </div>
            </div>
            <div class="copyright_part_text">
                <div class="row">
                    <div class="col-lg-8">
                        <p class="footer-text m-0"><?php echo $copyright; ?>
                    </div>
                    <div class="col-lg-4">
                        <div class="copyright_social_icon text-right">
                       <a href="<?php echo $facebook;?>"><i class="fab fa-facebook"></i></a>
<a href="<?php echo $twitter;?>"><i class="fab fa-twitter"></i></a>
<a href="<?php echo $google;?>"><i class="fabfN fa-google"></i></a>
<a href="<?php echo $instagram;?>"><i class="fab fa-instagram"></i></a>
<a href="<?php echo $youtube;?>"><i class="fab fa-youtube"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer part end-->

    <!-- jquery plugins here-->
    <!-- jquery -->
    <script src="<?php echo $url; ?>js/jquery-1.12.1.min.js"></script>
    <!-- popper js -->
    <script src="<?php echo $url; ?>js/popper.min.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo $url; ?>js/bootstrap.min.js"></script>
    <!-- easing js -->
    <script src="<?php echo $url; ?>js/jquery.magnific-popup.js"></script>
    <!-- swiper js -->
    <script src="<?php echo $url; ?>js/swiper.min.js"></script>
    <!-- swiper js -->
    <script src="<?php echo $url; ?>js/masonry.pkgd.js"></script>
    <!-- particles js -->
    <script src="<?php echo $url; ?>js/owl.carousel.min.js"></script>
    <!-- swiper js -->
    <script src="<?php echo $url; ?>js/slick.min.js"></script>
    <script src="<?php echo $url; ?>js/gijgo.min.js"></script>
    <script src="<?php echo $url; ?>js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="<?php echo $url; ?>js/custom.js"></script>
</body>

</html>