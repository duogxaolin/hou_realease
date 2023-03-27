<?php
require_once('../../config.php');
if(isset($_GET['del']) and isset($_SESSION['teacher'])){
    $id = check_string($_GET['del']);
    $duogxaolin->remove("blogs", " `id` = '$id' ");
    die("<script type='text/javascript'>alert('Xóa bài viết thành công !');;setTimeout(function(){ location.href = '".$duogxaolin->home_url()."/teacher/createBlogs' },1000);</script>");
}
if (isset($_SESSION['teacher']) and isset($_POST['btnCreate'])) {
    $return = array(
        'error' => 0
    );
    $title = check_string($_POST['title']);
    $content = $_POST['content'];
    $slug = $duogxaolin->to_slug($title);
    $random_code = rand(0,1000);
        $uploads_dir = '../../assets/image/';
        $tmp_name = $_FILES['images']['tmp_name'];
        $create = move_uploaded_file($tmp_name, $uploads_dir."/".$slug."_".$random_code.".png");  
    if($create){
        $duogxaolin->insert("blogs", [
            'title'     => $title,
            'content'   => $content,
            'slug'   => $slug,
            'img'       => $duogxaolin->home_url().'/assets/image/'.$title."_".$random_code.".png",
            'view'      => 0,
            'time'      => gettime(),
            'thoigian'  => time()
        ]);
        die("<script type='text/javascript'>alert('Thêm bài viết thành công !');;setTimeout(function(){ location.href = '".$duogxaolin->home_url()."/teacher/createBlogs' },1000);</script>");
    }else{
        $return['error']      = 1;
        $return['msg']        = 'lỗi !';
        die(json_encode($return));
    }

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
                            <h3 class="mb-0">Thêm Bài Viết</h3>
                        </div>

                    </div>
                </div>
                <form action="<?= $duogxaolin->home_url() ?>/pages/teacher/blogs.php" enctype="multipart/form-data" method="post" class="mt-4">
                    <div class="card-body">
                    <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Tiêu đề bài viết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input type="text" name="title" placeholder="Nhập tiêu đề bài viết"
                                            class="form-control" require>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Ảnh mô tả</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <input class="form-control" type="file" name="images" multiple require>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Nội dung bài viết</label>
                                <div class="col-sm-9">
                                    <div class="form-line">
                                        <textarea class="textarea" name="content"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="btnCreate" class="btn btn-primary btn-block">
                                <span>THÊM NGAY</span></button>
                    </div>

                </form>
                <div class="table-responsive py-4">
            <table class="table table-flush" id="datatable-buttons">
                      
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Tên</th>
                                    <th>IMG</th>
                                    <th></th>                              
                                </tr>
                            </thead>
                            <tbody>
                            <?php $i = 1; 
                            foreach ($duogxaolin->get_list(" SELECT * FROM `blogs` ORDER BY id DESC") as $row) { 
                            
                                ?>
                                <tr>
                                    <td><?=$i++?></td>
                                    <td><?=$row['title']?></td>
                                    <td> <img src="<?=$row['img']?>" style="height:50px"></td>
                                   
                                    <td>
                                        <a href="<?=$duogxaolin->home_url()?>/teacher/editBlogs/<?=$row['id']?>" class="btn btn-primary">Sửa</a>
                                        <a onclick="return confirm('bạn có đồng ý xóa Không ?');" href="<?=$duogxaolin->home_url()?>/teacher/createBlogs?del=<?=$row['id']?>" class="btn btn-danger">Xóa</a>
                                    </td>
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
    $(function() {
        // Summernote
        $('.textarea').summernote()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });
    })
</script>
<?php
require_once('../../includes/footer.php')  ?>