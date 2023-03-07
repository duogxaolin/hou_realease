<?php 
    require_once("../config.php");

    if(empty($_POST['type']))
    {
        msg_error2('Không hỗ trợ phương thức post');
    }

    if($_POST['type'] == 'Login' )
    {
        $username = check_string($_POST['username']);
        $password = (check_string($_POST['password']));
        if(empty($username))
        {
            msg_error2("Vui lòng nhập tên đăng nhập !");
        }
        if(check_email($username) != True){
            if(!$duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username'"))
            {
                msg_error2('Tên đăng nhập không tồn tại');
            }
            if(empty($password))
            {
                msg_error2("Vui lòng nhập mật khẩu !");
            }
            if(!$row = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' "))
            {
                msg_error2('Mật khẩu đăng nhập không chính xác');
            }
            if($row['banned'] != 0)
            {
                msg_error2('Tài khoản này đã bị khóa bởi BQT lý do: '.$row['reason_banned']);
            }
            $duogxaolin->update("users", [
                'otp'       => NULL,
                'agent_id'  => myagent(),
                'php'       => PHPSESSID(),
                'ip'        => myip()
            ], " `username` = '$username' ");
            $_SESSION['username'] = $username;
            msg_success('Đăng nhập thành công ', $duogxaolin->home_url(), 0);
        }else{
            if(!$duogxaolin->get_row(" SELECT * FROM `users` WHERE `email` = '$username'"))
            {
                msg_error2('Tên đăng nhập không tồn tại');
            }
            if(empty($password))
            {
                msg_error2("Vui lòng nhập mật khẩu !");
            }
            if(!$row = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `email` = '$username' AND `password` = '$password' "))
            {
                msg_error2('Mật khẩu đăng nhập không chính xác');
            }
            if($row['banned'] != 0)
            {
                msg_error2('Tài khoản này đã bị khóa bởi BQT lý do: '.$row['reason_banned']);
            }
            $duogxaolin->update("users", [
                'otp'       => NULL,
                'agent_id'  => myagent(),
                'php'       => PHPSESSID(),
                'ip'        => myip()
            ], " `email` = '$username' ");
            $_SESSION['username'] = $row['username'];
            msg_success('Đăng nhập thành công ', $duogxaolin->home_url(), 0);
        }

    }

