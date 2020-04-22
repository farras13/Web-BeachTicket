<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>/assets/img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/themify-icons.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/nice-select.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/gijgo.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/slick.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/slicknav.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/datepicker/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css">

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div id="sticky-header" class="main-header-area">
                <div class="container-fluid">
                    <div class="header_bottom_border">
                        <div class="row align-items-center">
                            <div class="col-xl-2 col-lg-2">
                                <div class="logo">
                                    <a href="<?= base_url(); ?>">
                                        <img src="<?= base_url(); ?>/assets/img/logo.png" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6">
                                <div class="main-menu  d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">
                                            <!-- <li style="padding-left: 0px; "><a class="active" href="<?= base_url(); ?>home/">home</a></li>
                                            <li><a href="about.html">About</a></li>
                                            <li><a class="" href="travel_destination.html">Destination</a></l/li> -->
                                            <!-- <li><a href="#">pages <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                        <li><a href="destination_details.html">Destinations details</a></li>
                                                        <li><a href="elements.html">elements</a></li>
                                                </ul>
                                            </li> -->
                                           <!--  <li><a href="#">blog <i class="ti-angle-down"></i></a>
                                                <ul class="submenu">
                                                    <li><a href="blog.html">blog</a></li>
                                                    <li><a href="single-blog.html">single-blog</a></li>
                                                </ul>
                                            </li> -->
                                            <!-- <li><a href="contact.html">Contact</a></li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                                <div class="social_wrap d-flex align-items-center justify-content-end">
                                    <!-- <div class="number">
                                        <p> <i class="fa fa-phone"></i> 10(256)-928 256</p>
                                    </div> -->
                                    <div class="social_links d-none d-xl-block">
                                        <ul style="padding-right: 10px;">
                                            <!-- <li><a href="#"> <i class="fa fa-instagram"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-linkedin"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-facebook"></i> </a></li>
                                            <li><a href="#"> <i class="fa fa-google-plus"></i> </a></li> -->
                                            <li><a class="active" href="<?= base_url(); ?>">Home</a></li>
                                            <!-- <li><a href="about.html">About</a></li> -->
                                            <li><a class="" href="<?= base_url(); ?>home/destination">Destination</a></li>
                                            <li><a href="contact.html">Contact</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="seach_icon">
                                <?php if ($userdata != null) : ?>
                                <a data-toggle="dropdown" href="#">
                                    <i class="fa fa-user"><br></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                    <a style="color: brown;" class="dropdown-item" href="<?= base_url();  ?>user/profil">Profile</a>
                                    <a style="color: brown;" class="dropdown-item" href="<?= base_url();  ?>home/booked">Booked</a>
                                    <a style="color: brown;" class="dropdown-item" href="<?= base_url();  ?>login/Logout">Logout</a>
                                </div>
                                <?php else : ?>
                                <a data-toggle="modal" href="<?= base_url();  ?>user/login">
                                    <a href="<?= base_url();  ?>login"><i class="fa fa-user"><br>login</i></a>
                                </a>
                                <?php endif ?> 
                            </div>
                            <div class="col-12">
                                <div class="mobile_menu d-block d-lg-none"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </header>
    <!-- header-end -->
