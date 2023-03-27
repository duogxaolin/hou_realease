<?php 
require_once('../../config.php');
$title = "Xem Điểm - TMAS Điện Tử";
if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
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
                  <li class="breadcrumb-item active" aria-current="page">Điểm cá nhân</li>
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
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Tất cả môn học</h3>
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
                                   
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; 
                            foreach ($duogxaolin->get_list(" SELECT * FROM `subject`  ORDER BY id DESC") as $row) { ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['id_subject']?></td>
                                    <td><?=$row['name_subject']?></td>
                                    <td><?=$row['tinchi']?></td>
                                </tr>
                        <?php } ?>

                            </tbody>
                            </table>
            </div>
          </div>
        </div>
      </div>
      <script>
var DatatableBasic1 = (function() {
// Variables
var $dtBasic1 = $('#datatable-basic1');
// Methods
function init($this) {
    // Basic options. For more options check out the Datatables Docs:
    // https://datatables.net/manual/options
    var options = {
        keys: !0,
        select: {
            style: "multi"
        },
        language: {
            paginate: {
                previous: "<i class='fas fa-angle-left'>",
                next: "<i class='fas fa-angle-right'>"
            }
        },
    };
    // Init the datatable
    var table = $this.on('init.dt', function() {
        $('div.dataTables_length select').removeClass('custom-select custom-select-sm');
    }).DataTable(options);
}
//Events
if ($dtBasic1.length) {
    init($dtBasic1);
}
})();
</script>
<?php require_once('../../includes/footer.php')  ?>