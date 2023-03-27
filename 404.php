<?php require_once('config.php'); ?>
 <!--
//////////////////////////////////////////////////////////////////////
//  Thế gian không nợ ta điều gì, nhân quả báo ứng không chừa một ai//
//                          _ooOoo_                               ////
//                         o8888888o                              ////
//                         88" . "88                              ////
//                         (| ^_^ |)                              ////
//                         O\  =  /O                              ////
//                      ____/`---'\____                           ////
//                    .'  \\|     |//  `.                         ////
//                   /  \\|||  :  |||//  \                        ////
//                  /  _||||| -:- |||||-  \                       ////
//                  |   | \\\  -  /// |   |                       ////
//                  | \_|  ''\---/''  |   |                       ////
//                  \  .-\__  `-`  ___/-. /                       ////
//                ___`. .'  /--.--\  `. . ___                     ////
//              ."" '<  `.___\_<|>_/___.'  >'"".                  ////
//            | | :  `- \`.;`\ _ /`;.`/ - ` : | |                 ////
//            \  \ `-.   \_ __\ /__ _/   .-` /  /                 ////
//      ========`-.____`-.___\_____/___.-`____.-'========         ////
//                           `=---='                              ////
//      ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^        ////
//               Phật pháp từ bi, quay đầu là bờ                  ////
//          Mong đức phật phụ hồ code con không bugs              ////
/////////////////////////////////////////////////////////////////////-->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="DuogXaoLin">
  <title>Hỗ trợ sinh viên</title>
    <meta name="description" content="<?=$duogxaolin->site('mota',$domain);?>">
    <meta name="keywords" content="<?=$duogxaolin->site('tukhoa',$domain);?>">
    <!-- Open Graph data -->
    <meta property="og:title" content="<?=$duogxaolin->site('tenweb',$domain);?>">
    <meta property="og:type" content="Website">
    <meta property="og:url" content=" <?=$duogxaolin->home_url();?>">
    <meta property="og:image" content="<?=$duogxaolin->site('anhbia',$domain);?>">
    <meta property="og:description" content="<?=$duogxaolin->site('mota',$domain);?>">
    <meta property="og:site_name" content="<?=$duogxaolin->site('tenweb',$domain);?>">
    <meta property="article:section" content="<?=$duogxaolin->site('mota',$domain);?>">
    <meta property="article:tag" content="<?=$duogxaolin->site('tukhoa',$domain);?>">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="<?=$duogxaolin->site('anhbia',$domain);?>">
    <meta name="twitter:site" content="@wmt24h">
    <meta name="twitter:title" content="<?=$duogxaolin->site('tenweb',$domain);?>">
    <meta name="twitter:description" content="<?=$duogxaolin->site('mota',$domain);?>">
    <meta name="twitter:creator" content="@wmt24h">
    <meta name="twitter:image:src" content="<?=$duogxaolin->site('anhbia',$domain);?>">
    <link rel="shortcut icon" href="<?=$duogxaolin->site('favicon',$domain);?>">
    <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link type="text/css" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/prismjs/themes/prism.css" rel="stylesheet">
    <link type="text/css" href="<?=$duogxaolin->home_url()?>/src/front/assets/css/front.css" rel="stylesheet">
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
</head>

<body>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>




    <main>
        <div class="preloader bg-soft flex-column justify-content-center align-items-center">
            <div class="loader-element"><span class="loader-animated-dot"></span> <img src="<?=$duogxaolin->site('favicon',$domain)?>" height="40" alt="Impact logo">
            </div>
        </div>
        <section class="vh-100 d-flex align-items-center justify-content-center">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center d-flex align-items-center justify-content-center">
                        <div>
                            <a href="/"><img class="img-fluid w-75" src="<?=$duogxaolin->home_url()?>/src/front/assets/img/illustrations/404.svg" alt="404 not found">
                            </a>
                            <h1 class="mt-5">Page not <span class="font-weight-bolder text-primary">found</span></h1>
                            <p class="lead my-4">Oops! Looks like you followed a bad link. If you think this is a problem with us, please tell us.</p><a class="btn btn-primary animate-hover" href="../../index.html"><i class="fas fa-chevron-left mr-3 pl-2 animate-left-3"></i>Go back home</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/headroom.js/dist/headroom.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/countup.js/dist/countUp.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/prismjs/prism.js"></script>
    <script async defer="defer" src="https://buttons.github.io/buttons.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/src/front/assets/js/front.js"></script>
   </body>

</html>