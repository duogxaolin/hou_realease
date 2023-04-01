<?php require_once('../config.php'); 
$row = $duogxaolin->get_blogs(check_string($_GET['slug']));
if(!$row){
    header('location:/');
  }
?>
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
<?php require_once("../includes/minify.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
    <meta name="author" content="DuogXaoLin">
    <title><?=$row['title']?></title>
    <meta name="description" content="<?= $duogxaolin->site('mota', $domain); ?>">
    <meta name="keywords" content="<?= $duogxaolin->site('tukhoa', $domain); ?>">
    <!-- Open Graph data -->
    <meta property="og:title" content="<?= $duogxaolin->site('tenweb', $domain); ?>">
    <meta property="og:type" content="Website">
    <meta property="og:url" content=" <?= $duogxaolin->home_url(); ?>">
    <meta property="og:image" content="<?= $duogxaolin->site('anhbia', $domain); ?>">
    <meta property="og:description" content="<?= $duogxaolin->site('mota', $domain); ?>">
    <meta property="og:site_name" content="<?= $duogxaolin->site('tenweb', $domain); ?>">
    <meta property="article:section" content="<?= $duogxaolin->site('mota', $domain); ?>">
    <meta property="article:tag" content="<?= $duogxaolin->site('tukhoa', $domain); ?>">
    <!-- Twitter Card data -->
    <meta name="twitter:card" content="<?= $duogxaolin->site('anhbia', $domain); ?>">
    <meta name="twitter:site" content="@wmt24h">
    <meta name="twitter:title" content="<?= $duogxaolin->site('tenweb', $domain); ?>">
    <meta name="twitter:description" content="<?= $duogxaolin->site('mota', $domain); ?>">
    <meta name="twitter:creator" content="@wmt24h">
    <meta name="twitter:image:src" content="<?= $duogxaolin->site('anhbia', $domain); ?>">
    <link rel="shortcut icon" href="<?= $duogxaolin->site('favicon', $domain); ?>">
    <link rel="stylesheet" href="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link type="text/css" href="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/prismjs/themes/prism.css" rel="stylesheet">
    <link type="text/css" href="<?= $duogxaolin->home_url() ?>/src/front/assets/css/front.css" rel="stylesheet">
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
    <header class="header-global">
        <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg headroom py-lg-3 px-lg-6 navbar-dark navbar-theme-primary">
            <div class="container">
                <a class="navbar-brand @@logo_classes" href="<?= $duogxaolin->home_url() ?>"><img class="navbar-brand-dark common" src="<?= $duogxaolin->site('logo', $domain); ?>" height="50px" alt="Logo light"> <img class="navbar-brand-light common" src="<?= $duogxaolin->site('logo', $domain); ?>" height="35" alt="Logo dark">
                </a>
                <div class="navbar-collapse collapse" id="navbar_global">
                    <div class="navbar-collapse-header">
                        <div class="row">
                            <div class="col-6 collapse-brand">
                                <a href="<?= $duogxaolin->home_url() ?>"><img src="<?= $duogxaolin->site('logo', $domain); ?>" height="50" alt="Logo Impact">
                                </a>
                            </div>
                            <div class="col-6 collapse-close">
                                <a href="#navbar_global" role="button" class="fas fa-times" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"></a>
                            </div>
                        </div>
                    </div>
                    <ul class="navbar-nav navbar-nav-hover justify-content-center">
                        <li class="nav-item"><a href="<?= $duogxaolin->home_url() ?>/src/dashboard/index.html" class="nav-link">Trang chủ</a>
                        </li>
                    </ul>
                </div>
                <div class="d-none d-lg-block @@cta_button_classes"><a href="/" class="btn btn-md btn-outline-white animate-up-2 mr-3"><i class="fas fa-book mr-1"></i>Tmas</a>
                </div>
                <div class="d-flex d-lg-none align-items-center">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                    </button>
                </div>
            </div>
        </nav>
    </header>




    <main>
        <div class="preloader bg-soft flex-column justify-content-center align-items-center">
            <div class="loader-element"><span class="loader-animated-dot"></span> <img src="<?= $duogxaolin->site('favicon', $domain); ?>" height="40" alt="Impact logo">
            </div>
        </div>
        <section class="section-header bg-primary text-white pb-7 pb-lg-11">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 text-center">
                        <h1 class="display-2 mb-4"><?=$row['title']?></h1>
                        <p class="lead">sinh viên có thể tìm kiếm vấn đề của mình tại đây trước khi hỏi giáo vụ để tiết kiệm thời gian và tra cứu được kịp thời nhất</p>
                        <form action="<?=$duogxaolin->home_url()?>/helpers" method="GET">
                            <div class="form-group bg-white shadow-soft rounded-pill mb-4 px-3 py-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="input-group input-group-merge shadow-none">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-0">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                            <input name="select" type="text" class="search form-control border-0 form-control-flush shadow-none pb-2" placeholder="Nhập dữ liệu: tên vấn đề,..." />
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-block btn-primary rounded-pill">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="pattern bottom"></div>
        </section>
            <div class="section section-sm bg-white pt-5 text-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-12 col-lg-8">
                            <h3><?=$row['title']?></h3>
                            <?=$row['content']?>
                                </div>
                    </div>

                </div>
            </div>
        </article>

        <footer class="footer section pt-6 pt-md-8 pt-lg-10 pb-3 bg-primary text-white overflow-hidden">
            <div class="pattern pattern-soft top"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-4 mb-lg-0">
                        <a class="footer-brand mr-lg-5 d-flex" href="<?= $duogxaolin->home_url() ?>"><img src="<?= $duogxaolin->site('logo', $domain); ?>" height="50" class="mr-3" alt="Footer logo">
                        </a>
                        <p class="my-4">Trường Đại Học Mở Hà Nội - Mở ra cơ hội học tập cho mọi người</p>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-lg-0">
                        <h6>Website</h6>
                        <ul class="links-vertical">
                            <li><a target="_blank" href="https://Hou.edu.vn">Hou.edu.vn</a>
                            </li>

                            <li><a target="_blank" href="https://lms.hou.edu.vn">lms.hou.edu.vn</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-sm-3 col-lg-2 mb-4 mb-lg-0">
                        <h6>Mạng Xã Hội</h6>
                        <ul class="links-vertical">
                            <li><a target="_blank" href="#">Facebook</a>
                            </li>
                            <li><a target="_blank" href="#">Zalo</a>
                            </li>
                            <li><a target="_blank" href="#">Twitter</a>
                            </li>

                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-4">
                        <h6>Subscribe</h6>
                        <p class="font-small">The latest Rocket news, articles, and resources, sent straight to your inbox every month.</p>
                        <small class="mt-2 form-text">We’ll never share your details.</small>
                    </div>
                </div>
                <hr class="my-4 my-lg-5">
                <div class="row">
                    <div class="col pb-4 mb-md-0">
                        <div class="d-flex text-center justify-content-center align-items-center">
                            <p class="font-weight-normal mb-0">Copyright © <a href="<?= $duogxaolin->home_url() ?>" target="_blank"><?= $duogxaolin->site('tenweb', $domain); ?></a> <span class="current-year"></span>. All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </main>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/headroom.js/dist/headroom.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/onscreen/dist/on-screen.umd.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/nouislider/distribute/nouislider.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/waypoints/lib/jquery.waypoints.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/countup.js/dist/countUp.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/jquery-countdown/dist/jquery.countdown.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/prismjs/prism.js"></script>
    <script async defer="defer" src="https://buttons.github.io/buttons.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/src/front/assets/js/front.js"></script>
</body>

</html>