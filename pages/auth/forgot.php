<?php
require_once('../../config.php');
$title = "Quên Mật Khẩu - TMAS Điện Tử";
if(isset($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/home");
}
$type = check_string($_GET['type']);
require_once('../../includes/head.php');
?>
<body>
<form submit-ajax="duogxaolin" action="<?=$duogxaolin->home_url();?>/ajaxs/forgot.php" method="post" class="mt-4">
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
                        <h2>Quên Mật Khẩu</h2>
                        <div class="input-field">
                            <input type="hidden" id="type" name="type" value="<?=$type?>">
                            <input type="text" class="input" id="email" name="email" required autocomplete="off">
                            <label for="email">Email Hoặc MSV</label>
                        </div>


                        <div class="input-field">
                            <button type="submit" id="submit" class="btn btn-primary btn-default font-weight-bold">Đăng nhập</button>

                        </div>

                        <div class="forgot">
                            <span>Tự nhiên nhớ lại mật khẩu ? <a href="<?=$duogxaolin->home_url()?>/login">Đăng nhập tại đây</a></span>
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