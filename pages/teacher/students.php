<?php
require_once('../../config.php');
if(isset($_GET['username']) AND isset($_SESSION['teacher'])) {
    $rows = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '".check_string($_GET['username'])."' ");
    if(!$rows)
    {
        die("<script type='text/javascript'>alert('Người dùng này không tồn tại');;setTimeout(function(){ location.href = '".$duogxaolin->home_url()."/teacher/class/list' },500);</script>");
    }
}else{
    header("Location: ".$duogxaolin->home_url()."/teacher/class/list");
}
$title = "Sinh Viên -".$_GET['username'];
require_once('../../includes/login-admin.php');
require_once('../../includes/header.php');
require_once('../../includes/navbar.php');
?>
<div class="header pb-6 d-flex align-items-center" style="min-height: 500px; background-image: url(https://hou.edu.vn/files/photos/4/banner_website_3.jpg); background-size: cover; background-position: center top;"> <span class="mask bg-gradient-default opacity-8"></span>
    <div class="container-fluid d-flex align-items-center">
        <div class="row">
            <div class="col-lg-7 col-md-10">
                <h1 class="display-2 text-white"> <?=$auth['fullname']?></h1>
                <p class="text-white mt-0 mb-5">Đây là profile của sinh viên <?=$auth['fullname']?></p>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
    <div class="row">
        <div class="col-xl-4 order-xl-2">
            <div class="card card-profile"><img src="https://hou.edu.vn/files/photos/4/banner_website_3.jpg" alt="Image placeholder" class="card-img-top">
                <div class="row justify-content-center">
                    <div class="col-lg-3 order-lg-2">
                        <div class="card-profile-image">
                            <a href="#"><img src="https://graph.facebook.com/100054399369841/picture?width=500&amp;height=500&amp;access_token=2712477385668128|b429aeb53369951d411e1cae8e810640" class="rounded-circle">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                    <div class="d-flex justify-content-between">
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col">
                            <div class="card-profile-stats d-flex justify-content-center">
                                <div><span class="heading"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".check_string($_GET['username'])."' AND `status` = 1 ")['SUM(`tinchi`)']);?></span> <span class="description">Tín</span>
                                </div>
                                <div><span class="heading"><?=format_cash($duogxaolin->num_rows("SELECT * FROM `score` WHERE `tinchi` > 0 AND `username` = '".check_string($_GET['username'])."' AND `status` = 1   "));?></span> <span class="description">Môn</span>
                                </div>
                                <div><span class="heading"><?=round($duogxaolin->get_row("SELECT SUM(`score4`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".check_string($_GET['username'])."' AND `status` = 1 ")['SUM(`score4`)']  / $duogxaolin->num_rows("SELECT * FROM `score` WHERE `tinchi` > 0 AND `username` = '".check_string($_GET['username'])."' AND `status` = 1   "),2);?></span> <span class="description">Điểm tổng</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="h3"><?=$auth['fullname']?><span class="font-weight-light"></span></h5>
                        <div class="h5 font-weight-300"><i class="ni location_pin mr-2"></i> Mã Sinh Viên:<?=$auth['username']?></div>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8 order-xl-1">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card bg-gradient-info border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Tín hoàn thành</h5>   <span class="h2 font-weight-bold mb-0 text-white"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".check_string($_GET['username'])."' AND `status` = 1 ")['SUM(`tinchi`)']);?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow"><i class="ni ni-active-40"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card bg-gradient-danger border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0 text-white">Tín chưa học</h5>     <span class="h2 font-weight-bold mb-0 text-white"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `subject` WHERE `tinchi` > 0 ")['SUM(`tinchi`)'] - $duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".check_string($_GET['username'])."' AND `status` = 1 ")['SUM(`tinchi`)'])?></span>
                
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-white text-dark rounded-circle shadow"><i class="ni ni-spaceship"></i>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">Thông Tin cá nhân</h3>
                        </div>
                        <div class="col-4 text-right"><a data-toggle="modal" data-target="#ChangePassword" class="btn btn-sm btn-primary" style="color:#fff">Đổi mật khẩu</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <h6 class="heading-small text-muted mb-4">User information</h6>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-username">Họ và tên</label>
                                        <input type="text" id="input-username" class="form-control" value="<?=$auth['fullname']?>" /disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Mã sinh viên</label>
                                        <input type="email" id="input-email" class="form-control" value="<?=$auth['username']?>" /disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Ngày Sinh</label>
                                        <input type="date" id="input-first-name" class="form-control" value="<?=$auth['birth']?>" /disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Giới tính</label>
                                        <input type="text" id="input-last-name" class="form-control" value="<?=$auth['sex']?>" /disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-address">Email</label>
                                        <input id="input-address" class="form-control" type="email" value="<?=$auth['email']?>" /disabled>
                                    </div>
                                </div>
                           
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Số điện thoại</label>
                                        <input type="text" id="input-country" class="form-control" value="<?=$auth['phone']?>" /disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Khóa</label>
                                        <input type="text" id="input-postal-code" class="form-control" value="<?=$auth['course']?>" /disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Lớp</label>
                                        <input type="text" id="input-postal-code" class="form-control" value="<?=$auth['class']?>" /disabled>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-country">Ngày nhập học</label>
                                        <input type="date" id="input-postal-code" class="form-control" value="<?=$auth['createdate']?>" /disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Bảng điểm sinh viên :<?=$row['fullname']?> </strong></h3>
                </div>
               
              </div>
            <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
                      
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã môn</th>
                                    <th>Môn học</th>
                                    <th>Số tín chỉ</th>
                                    <th>Lần thi</th>
                                    <th>Chuyên cần</th>
                                    <th>Điểm giữa kỳ</th>
                                    <th>Điểm thi </th> 
                                    <th>Điểm môn học </th> 
                                    <th>Điểm chữ </th>  
                                    <th>Thời gian học</th> 
                                    <th>Ghi chú</th>          
                                    <th>Trạng thái</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; 
                            foreach ($duogxaolin->get_list(" SELECT * FROM `score` WHERE `username` = '".check_string($_GET['username'])."' ORDER BY id DESC") as $row) { ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['id_subject']?></td>
                                    <td><?=$row['name_subject']?></td>
                                    <td><?=$row['tinchi']?></td>
                                    <td><?=$row['amount']?></td>
                                    <td><?=$row['score1']?></td>
                                    <td><?=$row['score2']?></td>
                                    <td><?=$row['score3']?></td>
                                    <td><?=$row['score4']?></td>
                                    <td><?=$row['mark']?></td>
                                    <td><?=$row['date']?></td>
                                    <td><?=$row['note']?></td>
                                    <td><?=status($row['status'])?></td>
                                </tr>
                        <?php } ?>

                            </tbody>
                            </table>
            </div>
          </div>
        </div>
        </div>
        </div>
    <?php
    require_once('../../includes/footer.php');
    ?>

