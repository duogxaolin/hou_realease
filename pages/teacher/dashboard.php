<?php
require_once('includes/login-admin.php');
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
        <div class="media media-comment"><img alt="Image placeholder" class="avatar avatar-lg media-comment-avatar rounded-circle" src="https://hou.edu.vn/assets/frontend/img/logo/logovien.png">
            <div class="media-body">
                <div class="media-comment-text">
                    <h6 class="h5 mt-0">Phòng đào tạo</h6>
                    <p class="text-sm lh-160">Cras sit amet nibh libero nulla vel metus scelerisque ante sollicitudin. Cras purus odio vestibulum in vulputate viverra turpis.</p>
                 
                </div>
            </div>
         </div>
        <hr>
    </div>
</div>
</div>
    </div>
        <div class="col-xl-4">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Số Lớp quản lý: <?=format_cash($duogxaolin->num_rows("SELECT * FROM `class` WHERE `leader` = '".$auth['username']."'  "));?></h3>
                </div>
                <div class="col text-right">
                  <a href="<?=$duogxaolin->home_url()?>/teacher/class/list" class="btn btn-sm btn-primary">See all</a>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                <tr>
                    <th scope="col">Khóa</th>
                    <th scope="col">Lớp</th>
                  </tr>
                </thead>
                <tbody>
                            <?php $i = 1; 
                            foreach ($duogxaolin->get_list(" SELECT * FROM `class` WHERE `leader` = '".$auth['username']."' ORDER BY id DESC") as $row) { ?>
                                <tr>
                                   
                                    <td><?=$row['course']?></td>
                                    <td><?=$row['name']?></td>
                                </tr>
                        <?php } ?>

                            </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>