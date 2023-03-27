<?php 
require_once('../../config.php');

if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
if(isset($_GET['usn']) && $auth['level'] == 'leader')
{
    $rows = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '".check_string($_GET['usn'])."' ");
    if(!$rows)
    {
        die("<script type='text/javascript'>alert('Người dùng này không tồn tại');;setTimeout(function(){ location.href = '".$duogxaolin->home_url()."' },500);</script>");
    }
}
else
{
    die("<script type='text/javascript'>alert('Liên kết không tồn tại');;setTimeout(function(){ location.href = '".$duogxaolin->home_url()."' },500);</script>");
}
if($auth['level'] == 'leader' and $auth['class'] == $rows['class'] and $auth['course'] == $rows['course']){
  $title = "Bảng điểm - ".$rows['fullname'];
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
                  <li class="breadcrumb-item active" aria-current="page">Điểm-<?=$rows['fullname']?></li>
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
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".$rows['username']."' AND `status` = 1 ")['SUM(`tinchi`)']);?></span>
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
                      <span class="h2 font-weight-bold mb-0"><?=format_cash($duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `subject` WHERE `tinchi` > 0 ")['SUM(`tinchi`)'] - $duogxaolin->get_row("SELECT SUM(`tinchi`) FROM `score` WHERE `tinchi` > 0 AND `username` = '".$rows['username']."' AND `status` = 1 ")['SUM(`tinchi`)'])?></span>
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
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Điểm : <a href="#"><strong style="color:red"><?=$rows['fullname']?> </strong> </a></h3>
                </div>
               
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
                            foreach ($duogxaolin->get_list(" SELECT * FROM `score` WHERE `username` = '" . $rows['username'] . "' ORDER BY id DESC") as $row) { ?>
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