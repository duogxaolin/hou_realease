<?php
require_once('../../config.php');
$title = "Đăng Nhập - TMAS Điện Tử";
if(isset($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/home");
}
require_once('../../includes/header.php');
?>

<body>
    <form>
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
                            <input type="text" class="input" id="username" name="username" required autocomplete="off">
                            <label for="email">Email</label>
                        </div>

                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required>
                            <label for="Password">Password</label>
                        </div>

                        <div class="input-field">
                            <button type="submit" id="Login" class="btn btn-primary btn-default font-weight-bold">Đăng nhập</button>

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
$("#Login").on("click", function () {
    $("#Login").html("ĐANG XỬ LÝ").prop("disabled", true);
    $.ajax({
        url: "<?=$duogxaolin->home_url()?>/ajaxs/login.php",
        method: "POST",
        data: {
            type: "Login",
            username: $("#username").val(),
            password: $("#password").val()
        },
        success: function (_0x2d24x1) {
            $("#thongbao").html(_0x2d24x1);
            $("#Login").html("Đăng nhập tài khoản").prop("disabled", false)
        }
    })
})
    </script>
    <?php
    require_once('../../includes/footer.php');
    ?>