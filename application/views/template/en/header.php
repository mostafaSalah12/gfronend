<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="" />
<meta name="keywords" content="" />
<meta name="author" content="Platform House" />

<!-- Page Title -->
<title>Geyushi Motors</title>

<!-- Favicon and Touch Icons -->
<link href="<?= asset_url(); ?>images/logo/small_logo.png" rel="shortcut icon" type="image/png">
<link href="<?= asset_url(); ?>images/logo/small_logo.png" rel="apple-touch-icon">
<link href="<?= asset_url(); ?>images/logo/small_logo.png" rel="apple-touch-icon" sizes="72x72">
<link href="<?= asset_url(); ?>images/logo/small_logo.png" rel="apple-touch-icon" sizes="114x114">
<link href="<?= asset_url(); ?>images/logo/small_logo.png" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->
<link href="<?= asset_url(); ?>css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/animate.css" rel="stylesheet" type="text/css">
<link href="<?= asset_url(); ?>css/css-plugin-collections.css" rel="stylesheet"/>
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="<?= asset_url(); ?>css/menuzord-skins/menuzord-rounded-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="<?= asset_url(); ?>css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="<?= asset_url(); ?>css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="<?= asset_url(); ?>css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="<?= asset_url(); ?>css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="<?= asset_url(); ?>js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="<?= asset_url(); ?>js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="<?= asset_url(); ?>js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="<?= asset_url(); ?>css/colors/theme-skin-red.css" rel="stylesheet" type="text/css">

<!-- CSS | Custome style file -->
<link href="<?= asset_url(); ?>css/style.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->
<script src="<?= asset_url(); ?>js/jquery-2.2.4.min.js"></script>
<script src="<?= asset_url(); ?>js/jquery-ui.min.js"></script>
<script src="<?= asset_url(); ?>js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="<?= asset_url(); ?>js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="<?= asset_url(); ?>js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="<?= asset_url(); ?>js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body class="has-side-panel side-panel-right fullwidth-page side-push-panel">
<div class="body-overlay"></div>    
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img class="ml-5" src="<?= asset_url(); ?>images/preloaders/3.gif" alt="">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
  </div>
  
  <!-- Header -->
  <header id="header" class="header">
    <div class="header-top bg-black-333 sm-text-center border-top-theme-color-3px p-0">
      
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="widget no-border m-0">
              <ul class="list-inline xs-text-center text-white mt-5">
                <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-theme-colored"></i> 19927</a> </li>
                <li class="m-0 pl-10 pr-10"> 
                  <a href="#" class="text-white"><i class="fa fa-envelope-o text-theme-colored"></i> contact@geyushimotors.com</a> 
                </li>
                <li class="m-0 pl-10 pr-10"> 
                  <a href="<?=base_url();?>ar" class="text-white">العربية <img src="<?= asset_url(); ?>images/flags/arabic.png" style="width: 30px"/></a> 
                </li>
              </ul>
            </div>
          </div>
          <div class="col-md-4 pr-0">
            <div class="widget no-border m-0">
              <ul class="styled-icons icon-dark icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                <li><a href="https://www.facebook.com/geyushimotors/" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                <li><a href="https://www.linkedin.com/company/9372097/" target="_blank"><i class="fa fa-linkedin text-white"></i></a></li>
                <!--
                <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li>
                -->
              </ul>
            </div>
          </div>
          <div class="col-md-2">
            <?php
            //$this->session->unset_userdata('user_info');
              if ($this->session->has_userdata('user_info')){
                $user_info = $this->session->userdata('user_info');
                $_fName = $user_info->user->firstName;
                $_lName = $user_info->user->lastName;
                ?>
                  <a class="btn btn-colored btn-flat btn-theme-colored pb-10" href="<?=base_url();?>my-profile"><?php echo $_fName.' '.$_lName; ?></a>
                <?php 
              }else {
            ?>
              <a class="btn btn-colored btn-flat btn-theme-colored pb-10 ajaxload-popup" href="<?=base_url();?>login-register">Login/Register</a>
              <?php } ?>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-white" <?php if($this->uri->segment(1) === "my-profile") echo 'style="border-bottom:1px solid rgb(238, 238, 238);"'; ?> >
        <div class="container">
          <nav id="menuzord-right" class="menuzord default">
            <a class="menuzord-brand pull-left flip xs-pull-center mt-20" href="<?=base_url();?>">
              <img class="" src="<?= asset_url(); ?>images/logo/logo_original.png" alt="">
            </a>
            <ul class="menuzord-menu">
              <li <?php if($this->uri->segment(1) === "home") echo 'class="active"'; ?>><a href="<?=base_url();?>home">Home</a></li>
              <li <?php if($this->uri->segment(1) === "about") echo 'class="active"'; ?>><a href="<?=base_url();?>about">About us</a></li>
              <?php if (isset($result)){ ?>
              <li><a href="#">Cars</a>
                <ul class="dropdown">
                  
                  <?php
                    foreach($result as $car){
                      echo '<li><a href="'.base_url().'car/'.$car->brandNameEn.'">'.$car->brandNameEn.'</a></li>';
                    }
                  ?>
                </ul>
              </li>
              <?php } ?>
              <li <?php if($this->uri->segment(1) === "showrooms") echo 'class="active"'; ?>><a href="<?=base_url();?>showrooms">Showrooms</a></li>
              <li <?php if($this->uri->segment(1) === "service-centers") echo 'class="active"'; ?>><a href="<?=base_url();?>service-centers">Service Centers</a></li>
              <!--<li><a href="#">Media Center</a>
                <ul class="dropdown">
                <li><a href="#">Blogs</a></li>
                    <li><a href="#">News</a></li>
                </ul>
              </li>-->
              <li <?php if($this->uri->segment(1) === "contact") echo 'class="active"'; ?>><a href="<?=base_url();?>contact">Contact us</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- Start main-content -->
  <div class="main-content">