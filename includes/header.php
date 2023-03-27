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
<?php require_once(__DIR__."/minify.php");?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="DuogXaoLin">
  <title><?=$title;?></title>
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
  <!-- Favicon -->
  <link rel="icon" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/img/brand/favicon.png" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css"
        type="text/css">
    <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
    <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/quill/dist/quill.core.css" type="text/css">
    <script src="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/quill/dist/quill.min.js"></script>
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/fullcalendar/dist/fullcalendar.min.css">
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/sweetalert2/dist/sweetalert2.min.css">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/css/dashboards.css" type="text/css">
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/glightbox/css/glightbox.css" type="text/css">
  <link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
<link rel="stylesheet" href="<?=$duogxaolin->home_url()?>/src/dashboard/assets/vendor/datatables.net-select-bs4/css/select.bootstrap4.min.css">
</head>
    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>
<style>
  :root {
            --primary-color: #0a48b3!important;
        }
    </style>
</head>

<body>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>