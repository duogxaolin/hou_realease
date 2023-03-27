<?php 
require_once('config.php');
$title = "TMAS Điện Tử - Trang chủ";
if(empty($_SESSION['username']) && empty($_SESSION['teacher'])){
    header("Location: ".$duogxaolin->home_url()."/login");
}
if(isset($_SESSION['username'])){
 require_once('pages/student/dashbroard.php');
}else if(isset($_SESSION['teacher'])){
 require_once('pages/teacher/dashboard.php');
}
?>
<?php require_once('includes/footer.php')  ?>