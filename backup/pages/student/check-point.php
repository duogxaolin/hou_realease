<?php
require_once('../../config.php');
$title = "Xem Điểm - TMAS Điện Tử";
if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
require_once('../../includes/header.php');
require_once('../../includes/navbar.php');
?>
        <subheader>
            <div class="sb-header">
                <div class="container">
                    <div class="sub-main">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Bảng Điểm</li>
                                <li class="breadcrumb-item"><a href=""><i class="fa fa-home"></i></a></li>
                            </ol>
                          </nav>
                    </div>
                </div>
            </div>
        </subheader>
        <section class="content">
        <content class="content-area">
            <div class="container">
               <div class="row">
                   
                        <div class="card-header">
                            <h4 class="card-title">
                            Bảng điểm sinh viên : <a href="<?=$duogxaolin->home_url()?>/student/profile"><strong style="color:red"><?=$auth['fullname']?> </strong> </a>
                            </h4>
                        </div>
                        <div class="card">
                        <div class="table-responsive">
                            <table id="example1" class="table table-striped table-bordered" style="width:100%">
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
                            foreach ($duogxaolin->get_list(" SELECT * FROM `score` WHERE `username` = '" . $auth['username'] . "' ORDER BY id DESC") as $row) { ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['id_subject']?></td>
                                    <td><?=$row['name_subject']?></td>
                                    <td><?=$row['tinchi']?></td>
                                    <td><?=$row['amount']?></td>
                                    <td><?=$row['score1']?></td>
                                    <td><?=$row['score2']?></td>
                                    <td><?=$row['score3']?></td>
                                    <td><?=round(($row['score1'] + $row['score3'] + $row['score3'])/3,1)?></td>
                                    <td><?=$row['mark']?></td>
                                    <td><?=$row['date']?></td>
                                    <td><?=$row['note']?></td>
                                    <td><?=$row['status']?></td>
                                </tr>
                        <?php } ?>

                            </tbody>
                            </table>
                           </div>
                           </div>
                  
               </div>
            </div>
            
        </content>
        </section>
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
    require_once('../../includes/footer.php');
    ?>

