<?php 
    require_once("../config.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
if ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest') {
    $type = check_string($_POST['type']);
    $username = check_string($_POST['username']);
    $otp = check_string($_POST['otp']);
    $password = check_string($_POST['password']);
    if(empty($username))
    {
        $return['error'] = 1;
        $return['msg']   = 'Vui lòng nhập tên đăng nhập ! ';
        die(json_encode($return));
    }
    if(empty($otp))
    {
        $return['error'] = 1;
        $return['msg']   = 'Vui lòng nhập OTP ! ';
        die(json_encode($return));
    }
    if($otp=='NULL')
    {
        $return['error'] = 1;
        $return['msg']   = 'OTP không tồn tại trong hệ thống';
        die(json_encode($return));
    }
    if(empty($password))
    {
        $return['error'] = 1;
        $return['msg']   = 'Bạn chưa nhập mật khẩu mới';
        die(json_encode($return));
    }
    $row2 = $duogxaolin->get_row(" SELECT * FROM `$type` WHERE `username` = '$username' ");
    if(!$row2)
    {
        $return['error'] = 1;
        $return['msg']   = 'Tên đăng nhập không tồn tại ';
        die(json_encode($return));
    }
    if($row2['otp'] != $otp){
        $return['error'] = 1;
        $return['msg']   = 'OTP không chính xác ';
        die(json_encode($return));
    }
    $row1 = $duogxaolin->get_row(" SELECT * FROM `$type` WHERE `otp` = '$otp' AND `username` = '$username' ");
    if(!$row1)
    {
        $return['error'] = 1;
        $return['msg']   = 'OTP không tồn tại trong hệ thống';
        die(json_encode($return));
    }
    if($row1['otp'] == NULL){
        $return['error'] = 1;
        $return['msg']   = 'OTP không tồn tại trong hệ thống';
        die(json_encode($return));
    }
    
    if(strlen($password) < 5)
    {
        $return['error'] = 1;
        $return['msg']   = 'Vui lòng nhập mật khẩu có ích nhất 5 ký tự';
        die(json_encode($return));
    }
    $duogxaolin->update("$type", [
        'otp' => 'NULL',
        'password' => $password,
    ], " `username` = '".$username."' ");

    $return['href'] = $duogxaolin->home_url();
    $return['msg']   = 'Mật khẩu của bạn đã được thay đổi thành công ! ';
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