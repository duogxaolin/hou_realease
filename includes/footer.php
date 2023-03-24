<div class="modal fade" id="ChangePassword" tabindex="-1" role="dialog" aria-labelledby="ChangePasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ChangePasswordLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form submit-ajax="duogxaolin" action="<?= $duogxaolin->home_url() ?>/ajaxs/ChangePassword.php" method="post" class="mt-4">
        <div class="modal-body">

          <div class="form-group">
            <label for="password" class="col-form-label">Mật Khẩu Hiện Tại:</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>

          <div class="form-group">
            <label for="newpassword" class="col-form-label">Mật Khẩu Mới:</label>
            <input type="password" class="form-control" id="newpassword" name="newpassword">
          </div>
          <div class="form-group">
            <label for="renewpassword" class="col-form-label">Nhập Lại Mật Khẩu Mới:</label>
            <input type="password" class="form-control" id="renewpassword" name="renewpassword">
          </div>


        </div>
        <div class="modal-footer">
          <button type="summit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="submit" name="submit" class="btn btn-primary">Đổi mật khẩu</button>

        </div>
      </form>
    </div>
  </div>
</div>
<!-- Footer -->
<footer class="footer pt-0">
  <div class="row align-items-center justify-content-lg-between">
    <div class="col-lg-6">
      <div class="copyright text-center  text-lg-left  text-muted">
        &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a> & <a href="https://themesberg.com?ref=creative-tim" class="font-weight-bold ml-1" target="_blank">Themesberg</a>
      </div>
    </div>
    <div class="col-lg-6">
      <ul class="nav nav-footer justify-content-center justify-content-lg-end">
        <li class="nav-item">
          <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
        </li>
        <li class="nav-item">
          <a href="https://themesberg.com" class="nav-link" target="_blank">Themesberg</a>
        </li>
        <li class="nav-item">
          <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
        </li>
        <li class="nav-item">
          <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
        </li>
        <li class="nav-item">
          <a href="https://www.creative-tim.com/license" class="nav-link" target="_blank">License</a>
        </li>
      </ul>
    </div>
  </div>
</footer>
</div>
</div>
<!-- Argon Scripts -->

</body>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/js-cookie/js.cookie.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/admin/plugins/jszip/jszip.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/admin/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/admin/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/admin/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/datatables.net-select/js/dataTables.select.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/js/duogxaolin.js?v=1.2.0"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/js/demo.min.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/src/dashboard/assets/vendor/glightbox/js/glightbox.js"></script>
<script src="<?= $duogxaolin->home_url() ?>/assets/js/ajax-duogxaolin.js"></script>

<!-- Page specific script -->
</body>

</html>