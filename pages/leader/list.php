<?php 
require_once('../../config.php');
$title = "Xem Điểm - TMAS Điện Tử";
if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
if($auth['level'] == 'leader' and $auth['class'] == $_GET['class'] and $auth['course'] == $_GET['course']){

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
                  <li class="breadcrumb-item active" aria-current="page">Danh sách lớp</li>
                </ol>
              </nav>
            </div>
          </div>
          
          <!-- Card stats -->
          <div class="row">
          <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Số Thành Viên</h5>
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->num_rows("SELECT * FROM `users` WHERE `class` = '".$auth['class']."' AND `course` = '".$auth['course']."'  "));?></span>
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

            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Nam</h5>
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->num_rows("SELECT * FROM `users` WHERE `class` = '".$auth['class']."' AND `sex` = 'Male' AND `course` = '".$auth['course']."'  "));?></span>
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

            <div class="col-xl-4 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Nữ</h5>
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->num_rows("SELECT * FROM `users` WHERE `class` = '".$auth['class']."' AND `sex` = 'Female' AND `course` = '".$auth['course']."' "));?></span>
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
                  <h3 class="mb-0">Danh sách sinh viên : <a href="#"><strong style="color:red"><?=$auth['course']?>-<?=$auth['class']?> </strong> </a></h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
                      
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Mã sinh viên</th>
                                    <th>Họ và tên</th>
                                    <th>Ngày Sinh</th>
                                    <th>Giới tính</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>        
                                    <th>Hành Động</th>                                  
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; 
                            foreach ($duogxaolin->get_list(" SELECT * FROM `users` WHERE `class` = '".$auth['class']."' AND `course` = '".$auth['course']."' ORDER BY id DESC") as $row) { ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['username']?></td>
                                    <td><?=$row['fullname']?></td>
                                    <td><?=$row['birth']?></td>
                                    <td><?=$row['sex']?></td>
                                    <td><?=$row['email']?></td>
                                    <td><?=$row['phone']?></td>
                                    <td><span class="dtr-data">
                                        <a type="button" href="<?=$duogxaolin->home_url()?>/leader/view/<?=$row['username']?>" class="btn btn-primary">
                                       <i class="fas fa-edit"></i>
                                      <span>Xem Điểm</span>
                                        </a>
                                      </span></td>
                                </tr>
                        <?php } ?>

                            </tbody>
                            </table>
            </div>
          </div>
        </div>
      </div>
      <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
  });
</script>
<?php
} else { 
    header("Location: /");
}
require_once('../../includes/footer.php')  ?>