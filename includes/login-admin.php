<?php
if(isset($_SESSION['username'])){
    header("Location: ".$duogxaolin->home_url()."/logout");
}
if(empty($_SESSION['teacher'])) {
    header("Location: ".$duogxaolin->home_url()."/login/teacher");
}