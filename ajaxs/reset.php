<?php 
    require_once("../config.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    $username = check_string($_POST['username']);
    $otp = check_string($_POST['otp']);
    $password = check_string($_POST['password']);
    if(empty($username))
    {
        msg_error2("Bạn chưa nhập Username");
    }
    if(empty($otp))
    {
        msg_error2("Bạn chưa nhập OTP");
    }
    if($otp=='NULL')
    {
        msg_error2("OTP không tồn tại trong hệ thống");
    }
    if(empty($password))
    {
        msg_error2("Bạn chưa nhập mật khẩu mới");
    }
    $row2 = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username' ");
    if(!$row2)
    {
        msg_error2("Tài khoản không tồn tại trong hệ thống");
    }
    if($row2['otp'] != $otp){
        msg_error2("OTP không đúng");
    }
    $row1 = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `otp` = '$otp' AND `username` = '$username' ");
    if(!$row1)
    {
        msg_error2("OTP không tồn tại trong hệ thống");
    }
    if($row1['otp'] == NULL){
        msg_error2("OTP không tồn tại trong hệ thống");
    }
    
    if(strlen($password) < 5)
    {
        msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
    }
    $duogxaolin->update("users", [
        'otp' => 'NULL',
        'password' => $password,
    ], " `username` = '".$username."' ");

    msg_success2("Mật khẩu của bạn đã được thay đổi thành công !");
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