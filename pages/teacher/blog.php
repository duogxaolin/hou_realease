<?php 
    require_once("../../config.php");
    if (isset($_SESSION['teacher'])) {
        $return = array(
            'error' => 0
        );
        $title = check_string($_POST['title']);
        $content = $_POST['content'];
        $slug = $duogxaolin->to_slug($title);
        $random_code = rand(0,1000);
            $uploads_dir = '../../assets/image/';
            $tmp_name = $_FILES['images']['tmp_name'];
            $create = move_uploaded_file($tmp_name, $uploads_dir."/".$title."_".$random_code.".png");  
        if($create){
            $duogxaolin->insert("blogs", [
                'title'     => $title,
                'content'   => $content,
                'slug'   => $slug,
                'img'       => $duogxaolin->home_url().'/assets/images/'.$title."_".$random_code.".png",
                'view'      => 0,
                'time'      => gettime(),
                'thoigian'  => time()
            ]);
            $return['msg']        = 'Thêm bài viết thành công !';
            die(json_encode($return));
        }else{
            $return['error']      = 1;
            $return['msg']        = 'lỗi !';
            die(json_encode($return));
        }

}
?>