<?php
require_once('../../config.php');
require_once('../../class/class.smtp.php');
require_once('../../class/PHPMailerAutoload.php');
require_once('../../class/class.phpmailer.php');
if (isset($_GET['course']) and isset($_GET['class'])  and isset($_SESSION['teacher'])) {
    $rows = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `course` = '" . check_string($_GET['course']) . "' AND `class` = '" . check_string($_GET['class']) . "' ");
    if (!$rows) {
        die("<script type='text/javascript'>alert('Class không tồn tại');;setTimeout(function(){ location.href = '" . $duogxaolin->home_url() . "/teacher/class/list' },500);</script>");
    }
} else {
    header("Location: " . $duogxaolin->home_url() . "/teacher/class/list");
}

if (isset($_SESSION['teacher']) and isset($_POST['btnCreate'])) {
    $return = array(
        'error' => 0
    );
    $title = check_string($_POST['title']);
    $content = $_POST['content'];
    foreach ($duogxaolin->get_list(" SELECT * FROM `users` WHERE `course` = '" . check_string($_GET['course']) . "' AND `class` = '" . check_string($_GET['class']) . "' ") as $mail) {
        $guitoi = $mail['email'];
        $subject = $title;
        $bcc = 'DUOGXAOLIN.DEV';
        $noi_dung = '<div id=":n5" class="a3s aiL ">
        <p><strong>Xin chào : </strong> ' . $mail['fullname'] . ' </p>
        <br>' . $content . '<br>
        <p>Tmas - Hệ Thống Quản Lý Đào Tạo</p>
        </div>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc, $domain);
        $duogxaolin->insert("mail", [
            'title'     => $title,
            'content'   => $content,
            'time'      => gettime(),
            'thoigian'  => time(),
            'student'   => $mail['username'],
            'teacher'   => $auth['username']
        ]);
    }

    die("<script type='text/javascript'>alert('Gửi Thông Báo Thành Công !');;setTimeout(function(){ location.href = '" . $duogxaolin->home_uri() . "' },1000);</script>");
}

$title = "Gửi Email";
require_once('../../includes/login-admin.php');
require_once('../../includes/header.php');
require_once('../../includes/navbar.php');
?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
                <div class="col-lg-6 col-7">
                    <h6 class="h2 text-white d-inline-block mb-0">Tmas Hou</h6>
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                        <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                            <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tìm Sinh Viên</li>
                        </ol>
                    </nav>
                </div>
            </div>

            <!-- Card stats -->
            <div class="row">

            </div>
        </div>
    </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Thêm Bài Viết</h3>
                        </div>

                    </div>
                </div>
                <form action="<?= $duogxaolin->home_uri() ?>" enctype="multipart/form-data" method="post" class="mt-4">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Tiêu đề bài viết</label>
                            <div class="col-sm-9">
                                <div class="form-line">
                                    <input type="text" name="title" placeholder="Nhập tiêu đề bài viết" class="form-control" require>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Nội dung bài viết</label>
                            <div class="col-sm-9">
                                <div class="form-line">
                                    <textarea class="textarea" name="content"></textarea>
                                </div>
                            </div>
                        </div>
                        <button type="submit" name="btnCreate" class="btn btn-primary btn-block">
                            <span>THÊM NGAY</span></button>
                    </div>

                </form>
                <div class="table-responsive py-4">
                    <table class="table table-flush" id="datatable-buttons">

                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên</th>
                                <th>Nội dung</th>
                                <th>Mã Sinh Viên</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1;
                            foreach ($duogxaolin->get_list(" SELECT * FROM `mail` WHERE `teacher` = '" . $auth['username'] . "' ORDER BY id DESC") as $row) {

                            ?>
                                <tr>
                                    <td><?= $i++ ?></td>
                                    <td><?= $row['title'] ?></td>
                                    <td> <?= $row['content'] ?></td>
                                    <td><a type="button" href="<?= $duogxaolin->home_url() ?>/teacher/view/student/ <?= $row['student'] ?>">
                                            <?= $row['student'] ?></a></td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
    $(function() {
        // Summernote
        $('.textarea').summernote()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
    })
</script>
<?php
require_once('../../includes/footer.php')  ?>