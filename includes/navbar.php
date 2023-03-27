
<?php if(isset($_SESSION['username'])){
  ?>
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="<?=$duogxaolin->home_url()?>">
          <img src="<?=$duogxaolin->site('logo',$domain)?>" height="40" class="navbar-brand-img" alt="...">
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner"> 
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link active active-pro" href="<?=$duogxaolin->home_url()?>">
              <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Trang chủ</span>
              </a>
            </li>
            <?php if($auth['level'] == 'leader'){ ?>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-leader" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-leader">
              <i class="ni ni-map-big text-danger"></i>
                <span class="nav-link-text">Quản Lý Lớp</span>
              </a>
              <div class="collapse" id="navbar-leader">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/leader/list/<?=$auth['course']?>/<?=$auth['class']?>" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách lớp </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a class="nav-link" href="<?=$duogxaolin->home_url()?>/student/profile">
              <i class="ni ni-single-02"></i>
                <span class="nav-link-text">Trang cá nhân</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Lịch</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="#l" class="nav-link">
                      <span class="sidenav-mini-icon"> L </span>
                      <span class="sidenav-normal"> Lịch Học </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Lịch thi </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#navbar-check" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-check">
              <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Điểm cá nhân</span>
              </a>
              <div class="collapse" id="navbar-check">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/student/check-point" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Tất cả </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/student/check-point/pass" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal">Môn đã qua </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/student/check-point/nonpass" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal">Môn trượt </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#ChangePassword">
              <i class="ni ni-align-left-2 text-default"></i>
                <span class="nav-link-text">Đổi mật khẩu</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=$duogxaolin->home_url()?>/logout">
              <i class="ni ni-send text-primary"></i>
                <span class="nav-link-text">Đăng xuất</span>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="https://graph.facebook.com/100054399369841/picture?width=500&amp;height=500&amp;access_token=2712477385668128|b429aeb53369951d411e1cae8e810640">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?=$auth['fullname']?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="<?=$duogxaolin->home_url()?>/student/profile" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a  data-toggle="modal" data-target="#ChangePassword" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Đổi mật khẩu</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?=$duogxaolin->home_url()?>/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Đăng Xuất</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <?php }else if(isset($_SESSION['teacher'])){ ?>

      <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  d-flex  align-items-center">
        <a class="navbar-brand" href="<?=$duogxaolin->home_url()?>">
          <img src="<?=$duogxaolin->site('logo',$domain)?>" height="40" class="navbar-brand-img" alt="...">
        </a>
        <div class=" ml-auto ">
          <!-- Sidenav toggler -->
          <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
            <div class="sidenav-toggler-inner">
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
              <i class="sidenav-toggler-line"></i>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar-inner"> 
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link active active-pro" href="<?=$duogxaolin->home_url()?>">
              <i class="ni ni-shop text-primary"></i>
                <span class="nav-link-text">Trang chủ</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-leader" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-leader">
              <i class="ni ni-map-big text-danger"></i>
                <span class="nav-link-text">Quản Lý Lớp</span>
              </a>
              <div class="collapse" id="navbar-leader">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/teacher/class/list" class="nav-link">
                      <span class="sidenav-mini-icon"> D </span>
                      <span class="sidenav-normal"> Danh sách lớp </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=$duogxaolin->home_url()?>/student/profile">
              <i class="ni ni-single-02"></i>
                <span class="nav-link-text">Trang cá nhân</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-examples">
                <i class="ni ni-ungroup text-orange"></i>
                <span class="nav-link-text">Lịch</span>
              </a>
              <div class="collapse" id="navbar-examples">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="#l" class="nav-link">
                      <span class="sidenav-mini-icon"> L </span>
                      <span class="sidenav-normal"> Lịch Học </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Lịch thi </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#navbar-check" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="navbar-check">
              <i class="ni ni-map-big text-primary"></i>
                <span class="nav-link-text">Điểm cá nhân</span>
              </a>
              <div class="collapse" id="navbar-check">
                <ul class="nav nav-sm flex-column">
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/student/check-point" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal"> Tất cả </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/student/check-point/pass" class="nav-link">
                      <span class="sidenav-mini-icon"> P </span>
                      <span class="sidenav-normal">Môn đã qua </span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="<?=$duogxaolin->home_url()?>/student/check-point/nonpass" class="nav-link">
                      <span class="sidenav-mini-icon"> T </span>
                      <span class="sidenav-normal">Môn trượt </span>
                    </a>
                  </li>

                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#ChangePassword">
              <i class="ni ni-align-left-2 text-default"></i>
                <span class="nav-link-text">Đổi mật khẩu</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?=$duogxaolin->home_url()?>/logout">
              <i class="ni ni-send text-primary"></i>
                <span class="nav-link-text">Đăng xuất</span>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>

          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="https://graph.facebook.com/100054399369841/picture?width=500&amp;height=500&amp;access_token=2712477385668128|b429aeb53369951d411e1cae8e810640">
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?=$auth['fullname']?></span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu  dropdown-menu-right ">
                <div class="dropdown-header noti-title">
                  <h6 class="text-overflow m-0">Welcome!</h6>
                </div>
                <a href="<?=$duogxaolin->home_url()?>/student/profile" class="dropdown-item">
                  <i class="ni ni-single-02"></i>
                  <span>My profile</span>
                </a>
                <a  data-toggle="modal" data-target="#ChangePassword" class="dropdown-item">
                  <i class="ni ni-settings-gear-65"></i>
                  <span>Đổi mật khẩu</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?=$duogxaolin->home_url()?>/logout" class="dropdown-item">
                  <i class="ni ni-user-run"></i>
                  <span>Đăng Xuất</span>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
      <?php } ?>