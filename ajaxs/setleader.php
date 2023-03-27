<?php 
    require_once("../config.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
    if ($_REQUEST) {
        $return = array(
            'error' => 0
        );
    $type = check_string($_POST['type']);
    $username = check_string($_POST['student']);
    $href = check_string($_POST['href']);
    if(empty($type))
    {
        admin_msg_error2('Sinh viên không tồn tại');
    }
    if(empty($username))
    {
        admin_msg_error2('Sinh viên không tồn tại');
    }
    $rows = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username' ");
    if(!$rows){
        admin_msg_error2('Sinh viên không tồn tại');
    }
    if($type == 'add'){
    if($rows['level'] == 'leader'){
        admin_msg_error2('Sinh viên đã là cán bộ rồi!');
    }else{
        $duogxaolin->update("users", [
            'level' => 'leader',
            'otp'       => NULL,
            'agent_id'  => myagent(),
            'php'       => PHPSESSID(),
            'ip'        => myip()
        ], " `username` = '$username' ");
        $guitoi = $rows['email'];   
        $subject = 'Giáo vụ thông báo';
        $bcc = 'DUOGXAOLIN.DEV';
        $noi_dung = '<div id=":n5" class="a3s aiL ">
        <p><strong>Xin chào : </strong> '.$rows['fullname'].' </p>
        <br>Bạn vừa được chỉ định là cán bộ của lớp, thích nhé <3
        <br>
        <p>Nếu không phải bạn thực hiện vui lòng liên hệ với cán bộ nhà trường để có biện pháp xử lý.</p>
    
        </div>';
        sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);  
        admin_msg_success('Thay đổi thành công thành công !', $href, 0);
    }
    }else if($type == 'del'){
            $duogxaolin->update("users", [
                'level' => NULL,
                'otp'       => NULL,
                'agent_id'  => myagent(),
                'php'       => PHPSESSID(),
                'ip'        => myip()
            ], " `username` = '$username' ");
            $guitoi = $rows['email'];   
            $subject = 'Giáo vụ thông báo';
            $bcc = 'DUOGXAOLIN.DEV';
            $noi_dung = '<div id=":n5" class="a3s aiL ">
            <p><strong>Xin chào : </strong> '.$rows['fullname'].' </p>
            <br>Bạn vừa bị xóa quyền cán bộ của lớp.
            <br>
            <p>Nếu không phải bạn thực hiện vui lòng liên hệ với cán bộ nhà trường để có biện pháp xử lý.</p>
        
            </div>';
            sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);  
            admin_msg_success('Thay đổi thành công thành công !', $href, 0);
         
    }

}
?>