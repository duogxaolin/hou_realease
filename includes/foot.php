
<footer class="bg-dark text-white page-footer font-small stylish-color-dark pt-4" style="padding-left: 0px;">

<!-- Footer Links -->
<div class="container text-center text-md-left">

  <!-- Grid row -->
  <div class="row">

    <!-- Grid column -->
    <div class="col-md-6 mx-auto">
      <!-- Content -->
      <a class="nav-brand" href="<?=$duogxaolin->home_url()?>"><img src="<?=$duogxaolin->site('logo',$domain)?>" style="height:50px" alt="">
                        </a>
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4">TMAS System Hanoi Open University</h5>
      <section class="mb-4">
        <h9>
            Trường Đại Học Mở Hà Nội
            <br>
           Mở ra cơ hội học tập cho mọi người
</h9>
      </section>
     

    </div>
    <!-- Grid column -->
    <hr class="clearfix w-100 d-md-none">

    <!-- Grid column -->
    <div class="col-md-4 mx-auto">

      <!-- Links -->
      <h5 class="font-weight-bold text-uppercase mt-3 mb-4">Thông tin liên hệ: </h5>

      <ul class="list-unstyled">
        <li>
        <a href="https://www.hou.edu.vn" >  
                        <a title="https://www.hou.edu.vn" href="https://www.hou.edu.vn" class="btn btn-outline-light btn-floating m-1" role="button">
                            <i  class="fas fa-home me-3"></i>
                            <span>  hou.edu.vn</span>
                        </a>
                  
                </a>
        </li>
        <li>
        <a href="https://www.facebook.com/HOUNews">  
                        <a title="https://www.facebook.com/HOUNews" class="btn btn-outline-light btn-floating m-1" href="https://www.facebook.com/HOUNews" role="button">
                            <i class="fab fa-facebook-f"></i>
                            <span>facebook.com/HOUNews</span>
                        </a>
                 
                </a>
        </li>
        <li>
        <a href="mailto:mhn@hou.edu.vn" >  
                            <a style="cursor: default;" title="mhn@hou.edu.vn" href="mailto:mhn@hou.edu.vn" class="btn btn-outline-light btn-floating m-1 " role="button">
                                <i class="fas fa-envelope"></i>
                                <span>mhn@hou.edu.vn</span>
                            </a>
                      
                    </a>
        </li>
        
      </ul>

    </div>
    <!-- Grid column -->

  </div>
  <!-- Grid row -->

</div>
<!-- Footer Links -->

<hr>

<!-- Call to action -->
<ul class="list-unstyled list-inline text-center py-2">
  <li class="list-inline-item">
    <h5 class="mb-1">Bạn đang đăng nhập với tên:</h5>
  </li>
  <li class="list-inline-item">
  <h5 class="mb-1" style="color:red"> <?=$auth['fullname']?></h5>
  </li>
</ul>
<!-- Call to action -->

<hr>

<!-- Social buttons -->
<ul class="list-unstyled list-inline text-center">
  <li class="list-inline-item">
    <a class="btn-floating btn-fb mx-1 waves-effect waves-light">
      <i class="fab fa-facebook-f"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-tw mx-1 waves-effect waves-light">
      <i class="fab fa-twitter"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-gplus mx-1 waves-effect waves-light">
      <i class="fab fa-google-plus-g"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-li mx-1 waves-effect waves-light">
      <i class="fab fa-linkedin-in"> </i>
    </a>
  </li>
  <li class="list-inline-item">
    <a class="btn-floating btn-dribbble mx-1 waves-effect waves-light">
      <i class="fab fa-dribbble"> </i>
    </a>
  </li>
</ul>
<!-- Social buttons -->

<!-- Copyright -->
<div class="footer-copyright text-center py-3">© 2023 Copyright:
  <a href="/"> duogxaolin</a>
</div>
<!-- Copyright -->

</footer>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/assets/js/apps.js"></script> 
    <!-- DataTables -->
    <script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/glightbox/js/glightbox.js"></script>
    <script src="<?= $duogxaolin->home_url() ?>/assets/js/ajax-duogxaolin.js"></script>

<script src="<?=$duogxaolin->home_url()?>/assets/js/popper.min.js"></script>

<script src="<?=$duogxaolin->home_url()?>/assets/js/dento.bundle.js"></script>
<script src="<?=$duogxaolin->home_url()?>/assets/js//active.js"></script>
<!-- DataTables -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables-responsive/2.4.0/dataTables.responsive.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-responsive-bs4/2.4.0/responsive.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.6/clipboard.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
   </body>
</html>
