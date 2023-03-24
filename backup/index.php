<?php 
require_once('config.php');
$title = "TMAS Điện Tử - Trang chủ";
if(empty($_SESSION['username'])) {
    header("Location: ".$duogxaolin->home_url()."/login");
}
require_once('includes/header.php');
require_once('includes/navbar.php');
?>

<!-- DIV -->
<?php 
require_once('includes/footer.php');
?>
