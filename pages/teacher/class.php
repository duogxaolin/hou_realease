<?php
require_once('../../config.php');

require_once('../../includes/login-admin.php');
if (isset($_GET['course']) and isset($_GET['class'])  and isset($_SESSION['teacher'])) {
  $rows = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `course` = '" . check_string($_GET['course']) . "' AND `class` = '" . check_string($_GET['class']) . "' ");
  if (!$rows) {
    die("<script type='text/javascript'>alert('Class không tồn tại');;setTimeout(function(){ location.href = '" . $duogxaolin->home_url() . "/teacher/class/list' },500);</script>");
  }
} else {
  header("Location: " . $duogxaolin->home_url() . "/teacher/class/list");
}
$title = "Danh sách sinh viên " . $_GET['course'] . "-" . $_GET['class'];
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
<div id="thongbao"></div>
      <!-- Card stats -->
      <div class="row">
        <div class="col-xl-4 col-md-6">
          <div class="card card-stats">
            <!-- Card body -->
            <div class="card-body">
              <div class="row">
                <div class="col">
                  <h5 class="card-title text-uppercase text-muted mb-0">Số Thành Viên</h5>
                  <span class="h2 font-weight-bold mb-0"><?= format_cash($duogxaolin->num_rows("SELECT * FROM `users` WHERE `class` = '" . check_string($_GET['class']) . "' AND `course` = '" . check_string($_GET['course']) . "'  ")); ?></span>
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
                  <span class="h2 font-weight-bold mb-0"><?= format_cash($duogxaolin->num_rows("SELECT * FROM `users` WHERE `class` = '" . check_string($_GET['class']) . "' AND `course` = '" . check_string($_GET['course']) . "' AND `sex` = 'Male' ")); ?></span>
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
                  <span class="h2 font-weight-bold mb-0"><?= format_cash($duogxaolin->num_rows("SELECT * FROM `users` WHERE `class` = '" . check_string($_GET['class']) . "' AND `course` = '" . check_string($_GET['course']) . "' AND `sex` = 'Female'  ")); ?></span>
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
              <h3 class="mb-0">Danh sách sinh viên : <a href="#"><strong style="color:red"><?= $_GET['course'] ?>-<?= $_GET['class'] ?> </strong> </a></h3>
            </div>

          </div>
        </div>
        <div class="table-responsive py-4">
          <table class="table table-flush" id="datatable-buttons">

            <thead>
              <tr>
                <th></th>
                <th>STT</th>
                <th>Mã sinh viên</th>
                <th>Họ và tên</th>
                <th>Ngày Sinh</th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Số điện thoại</th>

              </tr>
            </thead>
            <tbody>
              <?php $i = 1;
              foreach ($duogxaolin->get_list(" SELECT * FROM `users` WHERE `class` = '" . check_string($_GET['class']) . "' AND `course` = '" . check_string($_GET['course']) . "' ORDER BY id DESC") as $row) { ?>
                <tr>
                
                <td><span class="dtr-data">
                  <?php if($row['level'] ==  'leader') { ?>
                    <form>
                    <input type="hidden" name="type" value="del" id="type">
                    <input type="hidden" name="student" value="<?=$row['username']?>" id="student">
                    <input type="hidden" name="href" value="<?=$duogxaolin->home_uri()?>" id="href">
                    <button type="sumbit" onclick="return confirm('bạn có đồng ý xóa <?=$row['fullname']?> khỏi danh sách cán bộ của lớp <?=$row['class']?> Không ?');"  id="Leader" class="btn btn-outline-danger"><i class="fas fa-edit"></i>  <span>Xóa cán bộ lớp</span></button>   
                    <a type="button" href="<?= $duogxaolin->home_url() ?>/teacher/view/student/<?= $row['username'] ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        <span>Xem Điểm</span>
                      </a>
                  </form>
                      <?php }else{ ?>
                        <form>
                    <input type="hidden" name="type" value="add" id="type">
                    <input type="hidden" name="student" value="<?=$row['username']?>" id="student">
                    <input type="hidden" name="href" value="<?=$duogxaolin->home_uri()?>" id="href">
                    <button type="sumbit" onclick="return confirm('bạn có đồng ý thêm <?=$row['fullname']?> vào danh sách cán bộ của lớp <?=$row['class']?> Không ?');"  id="Leader" class="btn btn-outline-danger"><i class="fas fa-edit"></i>  <span>Thêm cán bộ lớp</span></button>   
                    <a type="button" href="<?= $duogxaolin->home_url() ?>/teacher/view/student/<?= $row['username'] ?>" class="btn btn-primary">
                        <i class="fas fa-edit"></i>
                        <span>Xem Điểm</span>
                      </a>
                  </form>
                      
                        <?php } ?>

                   <!--   <a type="button"  onclick="return confirm('bạn có đồng ý xóa <?=$row['fullname']?> khỏi danh sách  lớp <?=$row['class']?> Không ?');" href="<?= $duogxaolin->home_url() ?>/teacher/view/student/<?= $row['username'] ?>" class="btn btn-info">
                        <i class="fas fa-edit"></i>
                        <span>Xóa khỏi lớp</span>
                      </a> -->
                    </span></td>
                  <td><?= $i++ ?></td>
                  <td><?= $row['username'] ?></td>
                  <td><?= $row['fullname'] ?></td>
                  <td><?= $row['birth'] ?></td>
                  <td><?= $row['sex'] ?></td>
                  <td><?= $row['email'] ?></td>
                  <td><?= $row['phone'] ?></td>

                </tr>
              <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script>
    $(function() {
      $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $("#example2").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
  </script>
      <script type="text/javascript">
$("#Leader").on("click", function () {
    $("#Leader").html('<i class="fas fa-spinner fa-spin"></i> Đang xử lý...').prop("disabled", true);
    $.ajax({
        url: "<?=$duogxaolin->home_url()?>/ajaxs/setleader.php",
        method: "POST",
        data: {
            student: $("#student").val(),
            type: $("#type").val(),
            href: $("#href").val()
        },
        success: function (_0x2d24x1) {
            $("#thongbao").html(_0x2d24x1);
            $("#Leader").html("Thay đổi").prop("disabled", false)
        }
    })
})
    </script>
  <?php
  require_once('../../includes/footer.php')  ?>