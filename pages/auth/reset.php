<?php
    require_once("../../config.php");
    if (isset($_SESSION['username'])) {
        header("location: / ");
        exit();
    }
    $title = 'QUÊN MẬT KHẨU | '.$duogxaolin->site('tenweb',$domain);
    if(!isset($_GET['username']) && !isset($_GET['code']) ){
        header('location:/');
        exit();
} else {
    $username = mysqli_escape_string($duogxaolin->connect_db(), addslashes($_GET['username']));
    $code = mysqli_escape_string($duogxaolin->connect_db(), addslashes($_GET['code']));
    $row2 = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username' ");
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
        require_once("../../includes/header.php");
        ?>

<body>
    <form>
    <input type="hidden" class="form-control" id="username"
                                                    value="<?= $username ?>">
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
                        <div id="thongbao"></div>
                        <div class="input-field">
                        <input type="text" class="input"
                                                   name="password" 
                                                   id="password"/>
                            <label for="email">Mật Khẩu Mới</label>
                        </div>

                     

                        <div class="input-field">
                        <button type="submit"  id="reset"class="btn btn-primary btn-default font-weight-bold">Xác nhận</button>

                        </div>

                        <div class="forgot">
                            <span>Không nhớ mật khẩu ? <a href="<?=$duogxaolin->home_url()?>/forgot-password">forgot password</a></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </form>

<script type="text/javascript">
$("#reset").on("click", function () {
    $("#reset").html("ĐANG XỬ LÝ").prop("disabled", true);
    $.ajax({
        url: "<?=$duogxaolin->home_url();?>/ajaxs/reset.php",
        method: "POST",
        data: {
            username: $("#username").val(),
            otp: $("#otp").val(),
            password: $("#password").val()
        },
        success: function (_0x3e47x1) {
            $("#thongbao").html(_0x3e47x1);
            $("#reset").html("Đổi mật khẩu").prop("disabled", false)
        }
    })
})
</script>
<?php 
require_once('../../includes/footer.php');
?>
