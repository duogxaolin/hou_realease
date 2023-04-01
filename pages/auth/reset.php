<?php
    require_once("../../config.php");
    if (isset($_SESSION['username'])) {
        header("location: / ");
        exit();
    }
    $title = 'QUÊN MẬT KHẨU | '.$duogxaolin->site('tenweb',$domain);
    $check = check_string($_GET['type']);
    if($check=='teacher'){
        $type = 'admin';
    }else if($check=='student'){
        $type = 'users';
    }
    if(!isset($_GET['username']) && !isset($_GET['code']) ){
        header('location:/');
        exit();
} else {
    $username = check_string($_GET['username']);
    $code = check_string($_GET['code']);
    $row2 = $duogxaolin->get_row(" SELECT * FROM `$type` WHERE `username` = '$username' ");
    if (!$row2) {
        die("<script type='text/javascript'>alert('Tài Khoản Không Tồn Tại Trên Hệ Thống!');;setTimeout(function(){ location.href = '/' },1000);</script>");
    }
    if ($row2['otp'] != $code) {
        die("<script type='text/javascript'>alert('Lệnh Không Tồn Tại!');;setTimeout(function(){ location.href = '/' },1000);</script>");
    }
    if ($row2['otp'] == NULL) {
        die("<script type='text/javascript'>alert('Lệnh Không Tồn Tại!');;setTimeout(function(){ location.href = '/' },1000);</script>");
    }
    if ($row2['otp'] == 'NULL') {
        die("<script type='text/javascript'>alert('Lệnh Không Tồn Tại!');;setTimeout(function(){ location.href = '/' },1000);</script>");
    }
}
        require_once("../../includes/head.php");
        ?>

<body>
<form submit-ajax="duogxaolin" action="<?=$duogxaolin->home_url();?>/ajaxs/reset.php" method="post" class="mt-4">
    <input type="hidden" class="form-control" id="username"
                                                    value="<?= $username ?>">
   <input type="hidden" class="form-control" id="type"
                                                    value="<?= $type ?>">
                                  <input type="hidden" class="form-control" id="otp"
                                                    value="<?= $code ?>">
    <div class="wrapper">
        <div class="container main-login">
            <div class="row row-login">
                <div class="col-md-6 side-image">
                    <img src="./assets/image/logo-dai-hoc-mo-ha-noi-inkythuatso-01.png" alt="">
                    <div class="text">
                        <h2>HOU</h2>
                        <p>Khoa Điện-Điện Tử</p>
                    </div>
                </div>
             
                <div class="col-md-6 right">
                    <div class="input-box">
                        <h2>Đăng Nhập</h2>
                        <div class="input-field">
                        <input type="text" class="input"
                                                   name="password" 
                                                   id="password"/>
                            <label for="email">Mật Khẩu Mới</label>
                        </div>

                     

                        <div class="input-field">
                        <button type="submit"  id="submit"class="btn btn-primary btn-default font-weight-bold">Xác nhận</button>

                        </div>

                      
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>
<?php 
require_once('../../includes/foot.php');
?>
