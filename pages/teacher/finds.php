<?php 
require_once('../../config.php');
$locs = check_string($_GET['find']);
if($locs != ''){
    $finds = " WHERE  `username` LIKE '%$locs%' or
    `fullname` LIKE '%$locs%' or `phone` LIKE '%$locs%' or
    `email` LIKE '%$locs%'  or `sex` LIKE '%$locs%' or
    `birth` LIKE '%$locs%' or `cccd` LIKE '%$locs%' or
    `createdate` LIKE '%$locs%' ";
}else{
    $finds = " LIMIT 0 ";
}

$title = "Tìm Kiếm Sinh Viên";
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
                  <h3 class="mb-0">Tìm Sinh Viên</h3>
                </div>
               
              </div>
            </div>
            <form action="" method="GET">
                            <div class="form-group bg-white shadow-soft rounded-pill mb-4 px-3 py-2">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <div class="input-group input-group-merge shadow-none">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-transparent border-0">
                                                    <i class="fas fa-search"></i>
                                                </span>
                                            </div>
                                            <input name="find" type="text" class="search form-control border-0 form-control-flush shadow-none pb-2" placeholder="Nhập dữ liệu: mã sinh viên,..." />
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-block btn-primary rounded-pill">Tìm kiếm</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        
                        <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
                      
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Khóa</th>
                                    <th>Lớp</th>
                                    <th>Tên</th>
                                    <th></th>
                                    <th></th>                              
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; 
                            foreach ($duogxaolin->get_list(" SELECT * FROM `users` $finds") as $row) { 
                                ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['course']?></td>
                                    <td><?=$row['class']?></td>
                                    <td><?=$row['fullname']?></td>
                                    <td><span class="dtr-data">
                                        <a type="button" href="<?=$duogxaolin->home_url()?>/teacher/view/student/<?=$row['username']?>" class="btn btn-primary">
                                       <i class="fas fa-edit"></i>
                                      <span>Xem</span>
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
<?php
require_once('../../includes/footer.php')  ?>