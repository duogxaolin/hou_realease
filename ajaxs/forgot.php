<?php 
    require_once("../config.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    $email = check_string($_POST['email']);
    $table = check_string($_POST['type']);
    if(empty($email))
    {
        $return['error'] = 1;
        $return['msg']   = 'Vui lòng nhập email, số điện thoại hoặc mã sinh viên ! ';
        die(json_encode($return));
    }
    if(check_email($email) == True){
        $type = 'email';
    }else if(check_phone($email) == True){
        $type = 'phone';
    }else{
        $type = 'username';
    }
    
        $row = $duogxaolin->get_row(" SELECT * FROM `$table` WHERE `$type` = '$email'");
        if(!$row)
        {
            $return['error'] = 1;
            $return['msg']   = 'Tên đăng nhập không tồn tại ';
            die(json_encode($return));
        }
        $otp = random('0123456789qwertyuiopasdfghjklzxcvbnm', '32').time();
        $duogxaolin->update("$table", array(
            'otp' => $otp
        ), " `username` = '".$row['username']."'" );
        $guitoi = $row['email'];   
if($table == 'users'){
$check = 'student';
}else if( $table == 'admin'){
    $check = 'teacher';
}

    $subject = 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU';
    $bcc = 'DUOGXAOLIN.DEV';;
    $hoten ='Client';
$noi_dung = '<div id=":n5" class="a3s aiL ">
<p><strong>Xin chào : </strong> '.$row['fullname'].' </p>
Bạn vừa yêu cầu cấp lại mật khẩu. Vui lòng <a href="'.$duogxaolin->home_url().'/reset/'.$check.'/'.$row['username'].'/'.$otp.'" target="_blank"> bấm vào đây </a> để thực hiện lấy lại mật khẩu.
<br>Địa chỉ IP:'.myip().'
<br>Thời gian yêu cầu: '.date('d/m/Y H:i:s').'<br>
<p>Để đăng nhập vào hệ thống quản lý đào tạo, vui lòng xác nhận thay đổi mật khẩu.</p>

</div>';
    sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);   
    $return['msg']   = 'Chúng tôi đã gửi mã xác minh vào địa chỉ Email của bạn, vui lòng thao tác theo hướng dẫn trong email !';
    die(json_encode($return));
}else if ($_POST) {
    $data = [
        "Message" => 'The requested resource does not support http method POST'
    ];
    die(json_encode($data, JSON_PRETTY_PRINT));
} else {
    $data = [
        "Message" => 'The requested resource does not support http method GET'
    ];
    die(json_encode($data, JSON_PRETTY_PRINT));
}