<?php 
require_once('../../config.php');
$title = "Danh sách lớp hành chính quản lý";
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
                  <li class="breadcrumb-item active" aria-current="page">Danh sách lớp</li>
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
                  <h3 class="mb-0">Danh sách lớp hành chính quản lý </h3>
                </div>
               
              </div>
            </div>
            <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
                      
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Khóa</th>
                                    <th>Lớp</th>
                                    <th>Số sinh viên</th>
                                    <th>Cán bộ lớp</th>
                                    <th></th>                              
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; 
                            foreach ($duogxaolin->get_list(" SELECT * FROM `class` WHERE `leader` = '".$auth['username']."' ORDER BY id DESC") as $row) { 
                               $nums_students = $duogxaolin->num_rows("SELECT * FROM `users` WHERE `course` = '".$row['course']."' AND `class` = '".$row['class_id']."'  ");
                                ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['course']?></td>
                                    <td><?=$row['name']?></td>
                                    <td><?=$nums_students?></td>
                                    <td><?php foreach($duogxaolin->get_list(" SELECT * FROM `users` WHERE `level` = 'leader' AND `course` = '".$row['course']."' AND `class` = '".$row['class_id']."' ORDER BY id DESC") as $lead)
                                    {
                                        echo '<a href="'.$duogxaolin->home_url().'/teacher/view/student/'.$lead['username'].'">'.$lead['fullname'].' </a><br>';
                                    }
                                    ?></td>
                                    <td><span class="dtr-data">
                                        <a type="button" href="<?=$duogxaolin->home_url()?>/teacher/view/class/<?=$row['course']?>-<?=$row['class_id']?>" class="btn btn-primary">
                                       <i class="fas fa-edit"></i>
                                      <span>Quản lý</span>
                                        </a>
                                      </span>
                                      <span class="dtr-data">
                                        <a type="button" href="<?=$duogxaolin->home_url()?>/teacher/mail/class/<?=$row['course']?>-<?=$row['class_id']?>" class="btn btn-success">
                                       <i class="fas fa-edit"></i>
                                      <span>Gửi Email</span>
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
require_once('../../includes/footer.php')  ?>