
<div class="modal fade" id="ChangePassword" tabindex="-1" role="dialog" aria-labelledby="ChangePasswordLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ChangePasswordLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form>
     <div id="thongbaopw"></div>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="ChangePasswords" class="btn btn-primary">Đổi mật khẩu</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
$("#ChangePasswords").on("click", function () {
    $("#ChangePasswords").html("ĐANG XỬ LÝ").prop("disabled", true);
    $.ajax({
        url: "<?=$duogxaolin->home_url()?>/ajaxs/ChangePassword.php",
        method: "POST",
        data: {
            type: "ChangePassword",
            password: $("#password").val(),
            newpassword: $("#newpassword").val(),
            renewpassword: $("#renewpassword").val()
        },
        success: function (_0x2d24x1) {
            $("#thongbaopw").html(_0x2d24x1);
            $("#ChangePasswords").html("Đổi mật khẩu").prop("disabled", false)
        }
    })
})
    </script>
<footer>

</footer>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script src="<?=$duogxaolin->home_url()?>/assets/js/apps.js"></script> 
    <!-- DataTables -->

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>

   
   </body>
</html>
