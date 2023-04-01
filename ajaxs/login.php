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
            $return['error'] = 1;
            $return['msg']   = 'Vui lòng nhập tên đăng nhập ! ';
            die(json_encode($return));
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
                $return['error'] = 1;
                $return['msg']   = 'Tên đăng nhập không tồn tại ';
                die(json_encode($return));
            }
            if(empty($password))
            {
                $return['error'] = 1;
                $return['msg']   = 'Vui lòng nhập mật khẩu ! ';
                die(json_encode($return));
            }
            if(!$row = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `$type` = '$username' AND `password` = '$password' "))
            {
                $return['error'] = 1;
                $return['msg']   = 'Mật khẩu đăng nhập không chính xác';
                die(json_encode($return));
            }
            if($row['banned'] != 0)
            {
                $return['error'] = 1;
                $return['msg']   = $row['reason_banned'];
                die(json_encode($return));
            }
            $duogxaolin->update("users", [
                'otp'       => NULL,
                'agent_id'  => myagent(),
                'php'       => PHPSESSID(),
                'ip'        => myip()
            ], " `$type` = '$username' ");
         
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
            $_SESSION['username'] = $row['username'];
            $_SESSION['type']  = 'users';
            $return['href'] = $duogxaolin->home_url();
            $return['msg']   = 'Đăng nhập thành công ';
            die(json_encode($return));

        }

        if($_POST['type'] == 'Admin' )
        {
            $username = check_string($_POST['username']);
            $password = (check_string($_POST['password']));
            if(empty($username))
            {
                $return['error'] = 1;
                $return['msg']   = 'Vui lòng nhập tên đăng nhập ! ';
                die(json_encode($return));
            }
            if(check_email($username) == True){
                $type = 'email';
            }else if(check_phone($username) == True){
                $type = 'phone';
            }else{
                $type = 'username';
            }
          //  admin_msg_error2($type);
                if(!$duogxaolin->get_row(" SELECT * FROM `admin` WHERE `$type` = '$username'"))
                {
                    $return['error'] = 1;
                    $return['msg']   = 'Tên đăng nhập không tồn tại ';
                    die(json_encode($return));
                }
                if(empty($password))
                {
                    $return['error'] = 1;
                    $return['msg']   = 'Vui lòng nhập mật khẩu ! ';
                    die(json_encode($return));
                }
                if(!$row = $duogxaolin->get_row(" SELECT * FROM `admin` WHERE `$type` = '$username' AND `password` = '$password' "))
                {
                    $return['error'] = 1;
                    $return['msg']   = 'Mật khẩu đăng nhập không chính xác';
                    die(json_encode($return));
                }
                if($row['banned'] != 0)
                {
                    $return['error'] = 1;
                    $return['msg']   = $row['reason_banned'];
                    die(json_encode($return));
                }
                $duogxaolin->update("admin", [
                    'otp'       => NULL,
                    'agent_id'  => myagent(),
                    'php'       => PHPSESSID(),
                    'ip'        => myip()
                ], " `$type` = '$username' ");
             
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
                $_SESSION['teacher'] = $row['username'];
                $_SESSION['type']   = 'admin';
                $return['href'] = $duogxaolin->home_url();
                $return['msg']   = 'Đăng nhập thành công ';
                die(json_encode($return));
            }
?>