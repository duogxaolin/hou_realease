<?php
require_once('../../config.php');
$title = "Xem Điểm - TMAS Điện Tử";
if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
require_once('../../includes/header.php');
require_once('../../includes/navbar.php');
?>
<section class="col-lg-12 connectedSortable">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                           Bảng điểm sinh viên : <a href="<?=$duogxaolin->home_url()?>/student/profile"><strong style="color:red"><?=$auth['fullname']?> </strong> </a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                        <table id="datatable" class="table table-bordered table-striped table-hover">
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
                            <tfoot>
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
                            </tfoot>
                        </table>
                        </div>
                    </div>
                </div>
            </section>


    <script>
        $(document).ready(function() {
    var table = $('#datatable').DataTable({
        dom: 'Bfrtip',
        buttons: ['copy', 'csv', 'print', 'excel', 'pdf']
    });

});
</script>
    <?php
    require_once('../../includes/footer.php');
    ?>

