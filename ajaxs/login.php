<?php 
    require_once("../config.php");
    require_once('../class/class.smtp.php');
    require_once('../class/PHPMailerAutoload.php');
    require_once('../class/class.phpmailer.php');
    if(empty($_POST['type']))
    {
        admin_msg_error2('Không hỗ trợ phương thức post');
    }

    if($_POST['type'] == 'Login' )
    {
        $username = check_string($_POST['username']);
        $password = (check_string($_POST['password']));
        if(empty($username))
        {
            admin_msg_error2("Vui lòng nhập tên đăng nhập !");
        }
        if(check_email($username) == True){
            $type = 'email';
        }else if(check_phone($username) == True){
            $type = 'phone';
        }else{
            $type = 'username';
        }
      //  admin_msg_error2($type);
            if(!$duogxaolin->get_row(" SELECT * FROM `users` WHERE `$type` = '$username'"))
            {
                admin_msg_error2('Tên đăng nhập không tồn tại');
            }
            if(empty($password))
            {
                admin_msg_error2("Vui lòng nhập mật khẩu !");
            }
            if(!$row = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `$type` = '$username' AND `password` = '$password' "))
            {
                admin_msg_error2('Mật khẩu đăng nhập không chính xác');
            }
            if($row['banned'] != 0)
            {
                admin_msg_error2('Tài khoản này đã bị khóa bởi BQT lý do: '.$row['reason_banned']);
            }
            $duogxaolin->update("users", [
                'otp'       => NULL,
                'agent_id'  => myagent(),
                'php'       => PHPSESSID(),
                'ip'        => myip()
            ], " `$type` = '$username' ");
            $_SESSION['username'] = $username;
            $guitoi = $row['email'];   
            $subject = 'CẢNH BÁO ĐĂNG NHẬP';
            $bcc = 'DUOGXAOLIN.DEV';
            $noi_dung = '<div id=":n5" class="a3s aiL ">
            <p><strong>Xin chào : </strong> '.$row['fullname'].' </p>
            <br>Bạn vừa đăng nhập trên<a href="'.$duogxaolin->home_url().'" target="_blank">'.$duogxaolin->home_url().'</a>
            <br>Địa chỉ IP:'.myip().'<br>
            <p>Nếu không phải bạn thực hiện vui lòng liên hệ với cán bộ nhà trường để có biện pháp xử lý.</p>

            </div>';
            sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);   
        
            admin_msg_success('Đăng nhập thành công ', $duogxaolin->home_url(), 0);
        }


?>