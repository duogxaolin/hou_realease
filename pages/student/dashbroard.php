<?php
if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
if ($auth['banned'] == '1') {
  die("<script type='text/javascript'>alert('Á à chưa đóng học phí mà đòi dùng á? đi đóng r nói chuyện tiếp');;setTimeout(function(){ location.href = '".$duogxaolin->home_url()."/student/peee' },1000);</script>");
}
require_once('includes/header.php');
require_once('includes/navbar.php');
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
                  <li class="breadcrumb-item active" aria-current="page">Trang Chủ</li>
                </ol>
              </nav>
            </div>
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tổng Môn Học</h5>
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->num_rows("SELECT * FROM `subject`  "));?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        <i class="ni ni-active-40"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tổng Số Tín Chỉ</h5>
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `subject` WHERE `tinchi` > 0 ")['SUM(`tinchi`)']);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        <i class="ni ni-chart-pie-35"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Tín Hoàn Thành</h5>
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".$auth['username']."' AND `status` = 1 ")['SUM(`tinchi`)']);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        <i class="ni ni-money-coins"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Số Tín Chưa Học</h5>
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `subject` WHERE `tinchi` > 0 ")['SUM(`tinchi`)'] - $duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".$auth['username']."' AND `status` = 1 ")['SUM(`tinchi`)'])?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                        <i class="ni ni-chart-bar-32"></i>
                      </div>
                    </div>
                  </div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
      <div class="col-xl-8">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Thông báo</h3>
                </div>
               
              </div>
            </div>
            <div class="card-body">
          <div class="mb-1">
        <?php  foreach ($duogxaolin->get_list(" SELECT * FROM `notification` ORDER BY id DESC LIMIT 5") as $rows) { ?>
          <div class="media media-comment">
            <img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="https://hou.edu.vn/assets/frontend/img/logo/logovien.png">
            <div class="media-body">
                <div class="media-comment-text">
                    <h6 class="h5 mt-0">Phòng đào tạo </h6>
                    <small><?=$rows['time']?></small>
                    <p class="text-sm lh-160"><?=$rows['content']?></p>
                 
                </div>
            </div>
         </div>
        <hr>
          <?php } ?>
    </div>
</div>
</div>
    </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Profile</h3>
                </div>
                <div class="col text-right">
                  <a href="<?=$duogxaolin->home_url()?>/student/profile" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col"><?=$auth['fullname']?></th>
                    <th scope="col"></th>
                  </tr>
                  <tr>
                    <th scope="col">Khóa</th>
                    <th scope="col"><?=$auth['course']?></th>
                    <th scope="col"></th>
                  </tr>
                  <tr>
                    <th scope="col">Lớp</th>
                    <th scope="col"><?=$auth['class']?></th>
                    <th scope="col"></th>
                  </tr>
                </thead>

              </table>
            </div>
          </div>
        </div>
      </div>