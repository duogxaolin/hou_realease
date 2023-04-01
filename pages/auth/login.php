<?php
require_once('../../config.php');
$title = "Đăng Nhập - TMAS Điện Tử";
if(isset($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/home");
}
require_once('../../includes/head.php');
?>
<body>
<form submit-ajax="duogxaolin" action="<?=$duogxaolin->home_url()?>/ajaxs/login.php" method="post" class="mt-4">
<input type="hidden" id="type" name="type" value="Login">
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
                            <input type="text" class="input" id="username" name="username" required autocomplete="off">
                            <label for="email">Email hoặc MSV</label>
                        </div>

                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required>
                            <label for="Password">Password</label>
                        </div>

                        <div class="input-field">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary btn-default font-weight-bold">Đăng nhập</button>
                            <br>
                            <a href="<?=$duogxaolin->home_url()?>/login/teacher" class="btn btn-danger btn-default font-weight-bold">Giáo Vụ/Giáo Viên</a>
                        </div>

                        <div class="forgot">
                            <span>Không nhớ mật khẩu ? <a href="<?=$duogxaolin->home_url()?>/forgot-password/users">forgot password</a></span>
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