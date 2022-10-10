  <?php

  # Whitelist IP's
  $aIps[] = '213.127.4.137';
  $aIps[] = '84.107.121.219'; // Shanna
  $aIps[] = '217.122.223.247';
  $aIps[] = '79.144.225.68'; // Ghita

  if (in_array($_SERVER['REMOTE_ADDR'], $aIps))  {

       ini_set('error_reporting', E_ALL);
       ini_set("display_errors", 1);
  }
  else {

       //exit('Site closed for scheduled maintenance');
  }

  include('lib_com.php');

  ?>
  <!DOCTYPE html>
  <html>
  <head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <link rel="profile" href="http://gmpg.org/xfn/11">
       <title><?php echo $meta[$page]['title'] ?></title>
     <?php
       if ($page == 'npk-fertilizer')    {
            echo '<META NAME="robots" CONTENT="noindex,nofollow">';
       }
       ?>

       <meta name="description" content="<?php echo $meta[$page]['description'] ?>" />

       <meta property="og:type" content="website" />
       <meta property="og:title" content="<?php echo $meta[$page]['title'] ?>" />
       <meta property="og:description" content="<?php echo $meta[$page]['description'] ?>" />
       <meta property="og:url" content="<?php echo BASE_URL ?>" />
       <meta property="og:site_name" content="Dutch Ground Control" />
       <meta property="og:locale" content="en_US" />
       <meta name="twitter:text:title" content="<?php echo $meta[$page]['title'] ?>" />
       <meta name="twitter:card" content="<?php echo $meta[$page]['description'] ?>" />

       <script defer type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
       <!-- <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" /> -->
       <!-- <link href="/vendor/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet" /> -->
       <!-- <link href="/vendor/animate.css/animate.min.css" rel="stylesheet" /> -->
       <link href="/css/style.css?v=1" rel="stylesheet" />
       <link href="/css/flags.min.css" rel="stylesheet" />
       <link href="/vendor/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css" rel="stylesheet" />
       <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500,600,900" rel="stylesheet">
       <link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">

       <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
       <link rel="icon" href="/favicon.ico" type="image/x-icon">

       <?php
       if($page == 'retail' || $page == 'contact'){
            echo "
            <script src='https://www.google.com/recaptcha/api.js'></script>
            ";
       }
       ?>

  </head>
  <body class="page-<?php echo $page; ?>">
       <header class="container-fluid" style="box-shadow: 0px 3px 6px #999;">
            <div class="container pl-0 pr-0" style="height:86px;">
                 <nav class="navbar navbar-expand-md navbar-light">
                      <a class="navbar-brand logo" href="/" style="box-shadow: 0px 3px 6px #999;"></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                           <i class="fa fa-bars"></i>
                      </button>

                      <div class="contact font-sm d-none d-md-block">
                           <span class="font-green"><i class="fab fa-whatsapp"></i></span>
                           <span class="font-bold"><?= constant('PHONE'); ?></span>
                      </div>
                      <div class="collapse navbar-collapse footer_text" id="navbarText">
                           <ul class="navbar-nav mr-auto font-bold h-100" >
                                <li>
                                     <button class="navbar-toggler" type="button" style="top:10px;right:10px;" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                                          <i class="fa fa-times"></i>
                                     </button>
                                </li>
                                <li class="nav-item<?php if ($page == 'home') echo ' active'; ?>">
                                     <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item<?php if ($page == 'mycorrhiza-mix') echo ' active'; ?>">
                                     <a class="nav-link" href="/mycorrhiza-mix">MYCORRHIZA MIX<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item<?php if ($page == 'rhizobac-mix') echo ' active'; ?>">
                                     <a class="nav-link" href="/rhizobac-mix">RHiZOBAC MIX<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item<?php if ($page == 'usage') echo ' active'; ?>">
                                     <a class="nav-link" href="/usage">User Guides<span class="sr-only">(current)</span></a>
                                </li>

                                <!-- <li class="nav-item<?php if ($page == 'fertilizer') echo ' active'; ?>">
                                     <a class="nav-link" href="/npk-fertilizer">NPK FERTILIZER<span class="sr-only">(current)</span></a>
                                </li> -->
                                <li class="nav-item<?php if ($page == 'about-us') echo ' active'; ?>">
                                     <a class="nav-link" href="/about-us">About us<span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item<?php if ($page == 'contact') echo ' active'; ?>">
                                     <a class="nav-link" href="/contact">Contact<span class="sr-only">(current)</span></a>
                                </li>
                           </ul>
                      </div>
                 </nav>
            </div>
       </header>

       <content>
            <div id="slider" class="container-fluid pl-0 pr-0">
                 <div id="slide-1" class="slide">
                      <div class="container-fluid">

                      </div>
                 </div>
            </div>

            <?php
            require_once($page.'.php');
            ?>



            <?php //require($page.'.php'); ?>
            <footer class="container-fluid bg-brown text-white">
                 <div class="container pl-0 pr-0">
                      <div class="row">

                           <!-- Block links -->
                           <div class="col-12 col-md-4 pl-md-5 footer_text">

                                <h3 class="footer-title text-left font-sm" data-collapsed="1">
                                     <i class="fas fa-caret-right"></i>
                                     <?= constant('FOOTER_BLOCK_1_TITLE'); ?>
                                </h3>
                                <div class="footer-mob-collapse">
                                     <ul class="list-unstyled">
                                          <br>
                                          <li><a href="/<?= constant('NAV_LINK_HOME_URL'); ?>"><?= constant('NAV_LINK_HOME'); ?></a></li>
                                          <li style="line-height: 2rem;"><a href="/<?= constant('NAV_LINK_MYCOR_MIX_URL'); ?>"><?= constant('NAV_LINK_MYCOR_MIX'); ?></a></li>
                                          <li style="line-height: 2rem;"><a href="/<?= constant('NAV_LINK_RHIZOBAC-MIX_URL'); ?>"><?= constant('NAV_LINK_RHIZOBAC-MIX'); ?></a></li>
  <!--                                        <li style="line-height: 2rem;"><a href="/--><?//= constant('NAV_LINK_NPK_FERTILIZER_URL'); ?><!--">--><?//= constant('NAV_LINK_NPK_FERTILIZER'); ?><!--</a></li>-->
                                          <li style="line-height: 2rem;"><a href="/<?= constant('NAV_LINK_CONTACT_URL'); ?>"><?= constant('NAV_LINK_CONTACT'); ?></a></li>
                                     </ul>
                                </div>
                           </div>

                           <!-- Block about -->
                           <div class="col-12 col-md-4 pr-md-5 footer_text" data-collapsed="1">

                                <h3 class="footer-title text-left font-sm">
                                     <i class="fas fa-caret-right "></i>
                                     <?= constant('FOOTER_BLOCK_4_TITLE'); ?>
                                </h3>

                                <div class="footer-mob-collapse">
                                     <p>
                                          <br><?= constant('FOOTER_BLOCK_4_P'); ?>
                                     </p>
                                </div>
                           </div>

                           <!-- Block contact -->
                           <div class="col-12 col-md-4 pl-3 footer_text" data-collapsed="1">

                                <h3 class="footer-title text-left font-sm">
                                     <i class="fas fa-caret-right"></i>
                                     <?= constant('FOOTER_BLOCK_3_TITLE'); ?>
                                </h3>

                                <div class="footer-mob-collapse">
                                     <p>
                                          <br><?= constant('FOOTER_BLOCK_3_ADDRESS'); ?>
                                     </p>
                                     <h2 class="pt-2 mb-4 font-sm"><?= constant('PHONE'); ?></h2>

                                </div>
                           </div>
                      </div>
                 </div>
            </footer>

            <div class="container-fluid text-center  pt-3 pb-3" style="background-color:#83624e;">
                 © <?php echo date("Y"); ?> Dutch Ground Control B.V.
            </div>
            <script defer type="text/javascript" src="/js/main.js"></script>
            <script defer type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>

            <!-- Global site tag (gtag.js) - Google Analytics -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=UA-169398720-1"></script>
            <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-169398720-1');
       </script>

       <script>
         function onSubmit(token) {
           document.getElementById("contact-form").submit();
         }
         </script>


       <script type="text/javascript">
       /* First CSS File */
       var giftofspeed = document.createElement('link');
       giftofspeed.rel = 'stylesheet';
       giftofspeed.href = '/vendor/bootstrap/css/bootstrap.min.css';
       giftofspeed.type = 'text/css';
       var godefer = document.getElementsByTagName('link')[0];
       godefer.parentNode.insertBefore(giftofspeed, godefer);

       /* Second CSS File */
       var giftofspeed2 = document.createElement('link');
       giftofspeed2.rel = 'stylesheet';
       giftofspeed2.href = '/vendor/fontawesome-free-5.0.13/web-fonts-with-css/css/fontawesome-all.min.css';
       giftofspeed2.type = 'text/css';
       var godefer2 = document.getElementsByTagName('link')[0];
       godefer2.parentNode.insertBefore(giftofspeed2, godefer2);


  </script>

  </body>
  </html>
