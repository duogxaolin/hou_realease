<?php
require_once('../../config.php');
$title = "Xem Điểm - TMAS Điện Tử";
if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
require_once('../../includes/header.php');
require_once('../../includes/navbar.php');
?>
    <section class="section-tmas">
        <div class="container">
            <div class="row">
                <div class="col-3">
             <!--   <div class="shadow-box profile-sidebar" style="background: white;">

<div class="profile-userpic">
    <img src="https://accounts.hou.edu.vn//resources/images/hou-logo.png" alt="">
</div>


<div class="profile-usertitle">
    <div class="profile-usertitle-name">
        Nguyễn Thái Dương                        </div>
    <div class="profile-usertitle-uniid">
        21A120100061                        </div>
</div>

<div class="profile-usermenu">
    <ul class="nav nav-pills nav-stacked" id="myTab">
        <li class="">
            <a href="#overview" class="hvr-icon-forward" data-toggle="tab" aria-expanded="false">
                <i class="glyphicon glyphicon-home"></i>
                <i class="glyphicon glyphicon-menu-right pull-right hvr-icon"></i>
                Tổng quan </a>
        </li>
        <li class="active">
            <a href="#profile-setting" class="hvr-icon-forward" data-toggle="tab" aria-expanded="true">
                <i class="glyphicon glyphicon-user"></i>
                <i class="glyphicon glyphicon-menu-right pull-right hvr-icon"></i>
                Thông tin cá nhân</a>
        </li>

        
        <li class="">
            <a href="#security" class="hvr-icon-forward" data-toggle="tab" aria-expanded="false">
                <i class="glyphicon glyphicon-lock"></i>
                <i class="glyphicon glyphicon-menu-right pull-right hvr-icon"></i>
                Bảo mật </a>
        </li>
        <li class="">
            <a href="#help" class="hvr-icon-forward" data-toggle="tab" aria-expanded="false">
                <i class="glyphicon glyphicon-flag"></i>
                <i class="glyphicon glyphicon-menu-right pull-right hvr-icon"></i>
                Giúp đỡ </a>
        </li>
    </ul>
</div>

</div>-->
                </div>
                <div class="col-9">
                    <div class="profile-tmas">
                        <h4>Thông tin cá nhân</h4>
                    </div>

                    <div class="profile__body">
                        <ul class="profile__body-list">
                            
                            
                            <label for="basic-url">Thông tin cá nhân</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Họ và Tên: </span>
                                </div>
                              <input type="text" class="form-control" value="<?=$auth['fullname']?>" aria-label="Username" aria-describedby="basic-addon1" /disabled>
                            </div>
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Mã Sinh Viên: </span>
                                </div>
                              <input type="text" class="form-control" value="<?=$auth['username']?>" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Giới Tính: </span>
                                </div>
                                <input type="text" class="form-control" placeholder="girl" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Ngày sinh: </span>
                                </div>
                                <input type="text" class="form-control" placeholder="30-08-2003" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Địa chỉ: </span>
                                </div>
                                <input type="text" class="form-control" placeholder="Long bien" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            </div>
                            
                            <label for="basic-url">CMND/Căn cước/Hộ chiếu:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Số: </span>
                                </div>
                              <input type="text" class="form-control" placeholder="038203" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Ngày cấp: </span>
                                </div>
                              <input type="text" class="form-control" placeholder="01-01-2019 " aria-label="Amount (to the nearest dollar)">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Dân tộc: </span>
                                </div>
                              <input class="form-control" placeholder="Kinh" aria-label="With textarea"></input>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Nơi cấp: </span>
                                </div>
                              <input type="text" class="form-control" placeholder="cục cảnh sát" aria-label="Amount (to the nearest dollar)">
                            </div>

                            <label for="basic-url">Thông tin học tập:</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Mã tài khoản: </span>
                                </div>
                              <input type="text" class="form-control" placeholder="dunghouk240987654" id="basic-url" aria-describedby="basic-addon3">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Khóa: </span>
                                </div>
                                <input type="text" class="form-control" placeholder="K24" id="basic-url" aria-describedby="basic-addon3">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Chuyên ngành: </span>
                                </div>
                                <input type="text" class="form-control" placeholder="kỹ thuật điện tử viễn thông" id="basic-url" aria-describedby="basic-addon3">
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Ngày nhập học: </span>
                                </div>
                                <input type="text" class="form-control" placeholder="19-9-2021" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                        </ul>
                    </div>
                </div>  

            </div>
        </div>
    </section>



    <script>
        $(document).ready(function() {
    var table = $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'print', 'excel', 'pdf']
    });

});
</script>
    <?php
    require_once('../../includes/footer.php');
    ?>

