<?php 
    require_once("../config.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    $email = check_string($_POST['email']);
    if(empty($email))
    {
        msg_error2("Vui lòng nhập địa chỉ email vào ô trống");
    }
    if(check_email($email) == True){
        $type = 'email';
    }else if(check_phone($email) == True){
        $type = 'phone';
    }else{
        $type = 'username';
    }
    
        $row = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `$type` = '$email'");
        if(!$row)
        {
            msg_error2('Tài khoản không tồn tại trong hệ thống');
        }
        $otp = random('0123456789qwertyuiopasdfghjklzxcvbnm', '32').time();
        $duogxaolin->update("users", array(
            'otp' => $otp
        ), " `username` = '".$row['username']."'" );
        $guitoi = $row['email'];   


    $subject = 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU';
    $bcc = 'DUOGXAOLIN.DEV';;
    $hoten ='Client';
$noi_dung = '<div id=":n5" class="a3s aiL ">
<p><strong>Xin chào : </strong> '.$row['fullname'].' </p>
Bạn vừa yêu cầu cấp lại mật khẩu. Vui lòng <a href="'.$duogxaolin->home_url().'/student/reset?username='.$row['username'].'&code='.$otp.'" target="_blank"> bấm vào đây </a> để thực hiện lấy lại mật khẩu.
<br>Địa chỉ IP:'.myip().'
<br>Thời gian yêu cầu: '.date('d/m/Y H:i:s').'<br>
<p>Để đăng nhập vào hệ thống quản lý đào tạo, vui lòng xác nhận thay đổi mật khẩu.</p>

</div>';
    sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);   
    msg_success('Chúng tôi đã gửi mã xác minh vào địa chỉ Email của bạn, vui lòng thao tác theo hướng dẫn trong email !', '/', 4000);
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