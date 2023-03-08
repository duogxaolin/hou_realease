
<body>
    <header class="header-area">
    
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
    
                    <div class="col-6 col-md-9 col-lg-8">
                        <div class="top-header-content">
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="Nhà B101, phố Nguyễn Hiền, phường Bách Khoa, quận Hai Bà Trưng, TP Hà Nội"><i class="fa fa-map-marker"></i> <span>Nhà B101, phố Nguyễn Hiền, phường Bách Khoa, quận Hai Bà Trưng, TP Hà Nội</span></a>
                            <a href="#" data-toggle="tooltip" data-placement="bottom" title="mhn@hou.edu.vn"><i class="fa fa-envelope"></i> <span><span class="__cf_email__" data-cfemail="7c15121a135218191208133c1b111d1510521f1311">mhn@hou.edu.vn</span></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    
    
        <div class="main-header-area sticky">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
    
                    <nav class="classy-navbar justify-content-between" id="houNav">
    
                        <a class="nav-brand" href="<?=$duogxaolin->home_url()?>"><img src="<?=$duogxaolin->site('logo',$domain)?>" style="height:50px" alt="">
                        </a>
    
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>
    
                        <div class="classy-menu">
    
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span>
                                </div>
                            </div>
    
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="index.html">Home</a>
                                    </li>
                                    <li><a href="#">Lịch học</a>
                                        <ul class="dropdown">
                                            <li><a href="timetable.html">- Lịch học</a>
                                            </li>
                                            <li><a href="service.html">- Lịch thi</a>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="#">Điểm</a>
                                        <ul class="dropdown">
                                            <li><a href="<?=$duogxaolin->home_url()?>/student/check-point">- Xem điểm</a>
                                            </li>
                                            <li><a href="test-exam.html">- Lịch sử</a>
                                            </li>
                                        </ul>
                                    <li><a href="survay.html">Khảo sát</a>
                                    </li>
                                    <li><a href="pee.html">Học phí</a>
                                    </li>
                                    <li><a href="./contact.html">Liên hệ</a>
                                    </li>
                                </li>
                                <li><a data-toggle="modal" data-target="#ChangePassword">Đổi mật khẩu</a>
                                </li>
                                </ul>
                            </div>
    
                        </div>
    
                        <a href="<?=$duogxaolin->home_url()?>/logout" class="btn hou-btn change-pw-btn">Đăng Xuất</a>
                    </nav>
                </div>
            </div>
        </div>
    </header>