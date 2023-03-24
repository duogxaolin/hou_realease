<?php
require_once('../../config.php');
$title = "Quên Mật Khẩu - TMAS Điện Tử";
if(isset($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/home");
}
require_once('../../includes/head.php');
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
                        <h2>Quên Mật Khẩu</h2>
                        <div id="thongbao"></div>
                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email" required autocomplete="off">
                            <label for="email">Email Hoặc MSV</label>
                        </div>


                        <div class="input-field">
                            <button type="submit" id="forgot" class="btn btn-primary btn-default font-weight-bold">Đăng nhập</button>

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
    <script type="text/javascript">
$("#forgot").on("click", function() {

    $('#forgot').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý').prop('disabled',
        true);
    $.ajax({
        url: "<?=$duogxaolin->home_url();?>/ajaxs/forgot.php",
        method: "POST",
        data: {
            email: $("#email").val()
        },
        success: function(response) {
            $("#thongbao").html(response);
            $('#forgot').html(
                    'Xác nhận')
                .prop('disabled', false);
        }
    });
});
</script>
    <?php
    require_once('../../includes/foot.php');
    ?>