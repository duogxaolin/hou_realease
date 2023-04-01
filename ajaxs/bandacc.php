<?php 
    require_once("../config.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
    if ($_REQUEST) {
        $return = array(
            'error' => 0
        );
    if(empty($_SESSION['teacher'])){
            $return['error'] = 1;
            $return['msg'] = 'Không có quyền';
            die(json_encode($return));
        }
    $banned = check_string($_POST['banned']);
    $username = check_string($_POST['username']);
    $reason_banned = check_string($_POST['reason_banned']);
    if(empty($username))
    {
        $return['error'] = 1;
        $return['msg']   = 'Sinh viên không tồn tại';
        die(json_encode($return));
    }
    $rows = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username' ");
    if(!$rows){
        $return['error'] = 1;
        $return['msg']   = 'Sinh viên không tồn tại';
        die(json_encode($return));
    }
    if($banned == $row['banned'] && $row['reason_banned'] == $reason_banned){
        $return['msg']   = 'Không có thay đổi';
        die(json_encode($return));
    }
    if($banned == 0){
        $duogxaolin->update("users", [
            'banned' => $banned,
            'reason_banned'       => NULL,
        ], " `username` = '$username' ");
        $guitoi = $rows['email'];   
        $subject = 'Giáo vụ thông báo';
        $bcc = 'DUOGXAOLIN.DEV';
        $noi_dung = '<div id=":n5" class="a3s aiL ">
        <p><strong>Xin chào : </strong> '.$rows['fullname'].' </p>
        <br>Bạn đã được mở khóa tài khoản trên tmas <3
        <br>
        <p>Tmas - Hệ Thống Quản Lý Đào Tạo.</p>
    
        </div>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);  
    }else{
        $duogxaolin->update("users", [
            'banned' => $banned,
            'reason_banned'       => $reason_banned,
        ], " `username` = '$username' ");
        $guitoi = $rows['email'];   
        $subject = 'Giáo vụ thông báo';
        $bcc = 'DUOGXAOLIN.DEV';
        $noi_dung = '<div id=":n5" class="a3s aiL ">
        <p><strong>Xin chào : </strong> '.$rows['fullname'].' </p>
        <br>Bạn vừa bị khóa tài khoản trên hệ thống tmas
        <br>Lý do : '.$reason_banned.'
        <p>Tmas - Hệ Thống Quản Lý Đào Tạo.</p>
        </div>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);  
    }

    $return['href']  = $duogxaolin->home_url().'/teacher/finds';
    $return['msg']   = 'Thay Đổi Thành Công';
    die(json_encode($return));

}
?>