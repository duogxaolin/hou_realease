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
        if(check_email($username) != True){
            if(!$duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username'"))
            {
                admin_msg_error2('Tên đăng nhập không tồn tại');
            }
            if(empty($password))
            {
                admin_msg_error2("Vui lòng nhập mật khẩu !");
            }
            if(!$row = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' "))
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
            ], " `username` = '$username' ");
            $_SESSION['username'] = $username;
            $guitoi = $row['email'];   
            $subject = 'CẢNH BÁO ĐĂNG NHẬP';
            $bcc = 'DUOGXAOLIN.DEV';
            $noi_dung = '<div style="Margin:0;box-sizing:border-box;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;min-width:100%;padding:0;text-align:left;width:100%!important">
            <span style="color:#fff;display:none!important;font-size:1px;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden"></span>
            <table class="m_-8878546904072771419body" style="Margin:0;background-color:#f6f7f8;border-collapse:collapse;border-color:transparent;border-spacing:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;height:100%;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;width:100%">
        
                <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                        <td align="center" valign="top" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                            <center style="min-width:580px;width:100%">
                                <table style="Margin:0 auto;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td height="0" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:40px;font-weight:400;line-height:40px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" class="m_-8878546904072771419container" style="Margin:0 auto;background:0 0;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px;max-width:580px">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                <table class="m_-8878546904072771419collapse" style="background:0 0;border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tbody>
                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                            <th class="m_-8878546904072771419small-12 m_-8878546904072771419columns" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:0;padding-right:0;text-align:left;width:200px">
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                            <th valign="middle" height="49" style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:middle;height:49px">
                                                                                <img width="200" class="m_-8878546904072771419header-logo CToWUd" src='.$duogxaolin->site('logo',$domain).' alt="" style="clear:both;display:block;max-width:220px;width:auto;height:auto;outline:0;text-decoration:none;max-height:49px" data-bit="iit">
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                            <th class="m_-8878546904072771419small-12 m_-8878546904072771419columns" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:0;padding-right:0;text-align:right;width:320px;vertical-align:middle">
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:right;vertical-align:top">
                                                                            <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:right">
                                                                                
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="Margin:0 auto;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td height="32px" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:32px;font-weight:400;line-height:32px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table cellpadding="0" cellspacing="0" border="0" align="center" class="m_-8878546904072771419container" style="Margin:0 auto;border-bottom-left-radius:3px;border-bottom-right-radius:3px;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px;max-width:580px">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                <img width="580" height="8" src="https://ci6.googleusercontent.com/proxy/TrysT9m2r_3Mgiw5C-O-lQpReM7Ios88mACv9ttbSUyTeBchfl5rqS1iBCeqw6iXyghMZd7FbikJadfwCWrK-0Bdg32MJiGhCRlaSDu1f19LQb5A6HihbBznVFLA42btFpkaYlqxB7zePUdsNEriiBc=s0-d-e1-ft#https://my.tino.org/templates/lagom/core/extensions/EmailStyle/styles/depth/img/border-top.png" alt="" style="min-width:100%!important;clear:both;display:block;width:100%!important;max-width:580px;outline:0;text-decoration:none;border-top-left-radius:3px;border-top-right-radius:3px" class="CToWUd" data-bit="iit">
                                                <table class="m_-8878546904072771419container-radius" style="border-top-width:0;border-top-color:#e6e6e6;border-left-width:1px;border-right-width:1px;border-bottom-width:1px;border-bottom-color:#e6e6e6;border-right-color:#e6e6e6;border-left-color:#e6e6e6;border-style:solid;border-bottom-left-radius:3px;border-bottom-right-radius:3px;display:table;padding-bottom:32px;border-spacing:48px 0;border-collapse:separate;width:100%;background:#fff;max-width:580px">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top"></tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="m_-8878546904072771419mobile-hide" style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                            <td height="32px" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:32px;font-weight:400;line-height:32px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                                
                                                                <p><strong>Xin chào : </strong> '.$row['fullname'].' </p>
                                                                
                                                                <p><strong style="color:#0fa54a">Tài Khoản Của Bạn Vừa Tiến Hành Đăng Nhập Tại IP: '.myip().' </strong></p>
                                                                <table>
                                                                    <tbody>
                                                                
                                                                        <tr>
                                                                            <td style="color:#606060;font-family:Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" width="100%">Ngày:'.date("H:i d-m-Y").'</td>
                                                                            
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                                <p>Nếu không phải bạn thực hiện vui lòng liên hệ với cán bộ nhà trường để có biện pháp xử lý.</p>
                                          
                                                                
                                                                <p>&nbsp;</p>
                                                                
                                                                
                                                                <p style="font-size:12px;font-family:Arial,sans-serif" align="center">&nbsp;</p>
                                                                <p style="font-size:12px;font-family:Arial,sans-serif">---------<br>
        
                                                                <div class="col-md-3 my-4">
                                                                <div class="footer-item">
                                                                    <div class="footer-item_logo">
                                                                    </div>
                                                                    <div class="footer-item_text">
                                                                       tmas - HOU điện tử
                                                                    </div>
                                                                </div>
                                                            </div></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="Margin:0 auto;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <hr align="center" style="background:#dddedf;border:none;color:#dddedf;height:1px;margin-bottom:0;margin-top:0">
                                <table align="center" class="m_-8878546904072771419container" style="Margin:0 auto;background:#f6f7f8;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tbody>
                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                            <td>
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                            <th class="m_-8878546904072771419small-12 m_-8878546904072771419columns" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0!important;padding-bottom:16px;text-align:left;width:532px">
                                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                                    <tbody>
                                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                                            <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left">
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                            </th>
                                                                                            <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0"></th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="yj6qo"></div>
            <div class="adL">
            </div>
        </div>';
            sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);   
        
            admin_msg_success('Đăng nhập thành công ', $duogxaolin->home_url(), 0);
        }else{
            if(!$duogxaolin->get_row(" SELECT * FROM `users` WHERE `email` = '$username'"))
            {
                admin_msg_error2('Tên đăng nhập không tồn tại');
            }
            if(empty($password))
            {
                admin_msg_error2("Vui lòng nhập mật khẩu !");
            }
            if(!$row = $duogxaolin->get_row(" SELECT * FROM `users` WHERE `email` = '$username' AND `password` = '$password' "))
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
            ], " `email` = '$username' ");
            $_SESSION['username'] = $row['username'];
            $guitoi = $row['email'];   
            $subject = 'CẢNH BÁO ĐĂNG NHẬP';
            $bcc = 'DUOGXAOLIN.DEV';
            $noi_dung = '<div style="Margin:0;box-sizing:border-box;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;min-width:100%;padding:0;text-align:left;width:100%!important">
            <span style="color:#fff;display:none!important;font-size:1px;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden"></span>
            <table class="m_-8878546904072771419body" style="Margin:0;background-color:#f6f7f8;border-collapse:collapse;border-color:transparent;border-spacing:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;height:100%;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;width:100%">
        
                <tbody>
                    <tr style="padding:0;text-align:left;vertical-align:top">
                        <td align="center" valign="top" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                            <center style="min-width:580px;width:100%">
                                <table style="Margin:0 auto;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td height="0" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:40px;font-weight:400;line-height:40px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table align="center" class="m_-8878546904072771419container" style="Margin:0 auto;background:0 0;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px;max-width:580px">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                <table class="m_-8878546904072771419collapse" style="background:0 0;border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tbody>
                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                            <th class="m_-8878546904072771419small-12 m_-8878546904072771419columns" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:0;padding-right:0;text-align:left;width:200px">
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                            <th valign="middle" height="49" style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:middle;height:49px">
                                                                                <img width="200" class="m_-8878546904072771419header-logo CToWUd" src='.$duogxaolin->site('logo',$domain).' alt="" style="clear:both;display:block;max-width:220px;width:auto;height:auto;outline:0;text-decoration:none;max-height:49px" data-bit="iit">
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                            <th class="m_-8878546904072771419small-12 m_-8878546904072771419columns" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0;padding-bottom:0;padding-left:0;padding-right:0;text-align:right;width:320px;vertical-align:middle">
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:right;vertical-align:top">
                                                                            <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:right">
                                                                                
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </th>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="Margin:0 auto;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td height="32px" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:32px;font-weight:400;line-height:32px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                &nbsp;
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table cellpadding="0" cellspacing="0" border="0" align="center" class="m_-8878546904072771419container" style="Margin:0 auto;border-bottom-left-radius:3px;border-bottom-right-radius:3px;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px;max-width:580px">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                <img width="580" height="8" src="https://ci6.googleusercontent.com/proxy/TrysT9m2r_3Mgiw5C-O-lQpReM7Ios88mACv9ttbSUyTeBchfl5rqS1iBCeqw6iXyghMZd7FbikJadfwCWrK-0Bdg32MJiGhCRlaSDu1f19LQb5A6HihbBznVFLA42btFpkaYlqxB7zePUdsNEriiBc=s0-d-e1-ft#https://my.tino.org/templates/lagom/core/extensions/EmailStyle/styles/depth/img/border-top.png" alt="" style="min-width:100%!important;clear:both;display:block;width:100%!important;max-width:580px;outline:0;text-decoration:none;border-top-left-radius:3px;border-top-right-radius:3px" class="CToWUd" data-bit="iit">
                                                <table class="m_-8878546904072771419container-radius" style="border-top-width:0;border-top-color:#e6e6e6;border-left-width:1px;border-right-width:1px;border-bottom-width:1px;border-bottom-color:#e6e6e6;border-right-color:#e6e6e6;border-left-color:#e6e6e6;border-style:solid;border-bottom-left-radius:3px;border-bottom-right-radius:3px;display:table;padding-bottom:32px;border-spacing:48px 0;border-collapse:separate;width:100%;background:#fff;max-width:580px">
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top"></tr>
                                                                    </tbody>
                                                                </table>
                                                                <table class="m_-8878546904072771419mobile-hide" style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                            <td height="32px" style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:32px;font-weight:400;line-height:32px;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                                
                                                                <p><strong>Xin chào : </strong> '.$row['fullname'].' </p>
                                                                
                                                                <p><strong style="color:#0fa54a">Tài Khoản Của Bạn Vừa Tiến Hành Đăng Nhập Tại IP: '.myip().' </strong></p>
                                                                <table>
                                                                    <tbody>
                                                                
                                                                        <tr>
                                                                            <td style="color:#606060;font-family:Arial,sans-serif;font-size:14px;line-height:150%;text-align:left" width="100%">Ngày:'.date("H:i d-m-Y").'</td>
                                                                            
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                
                                                                <p>Nếu không phải bạn thực hiện vui lòng liên hệ với cán bộ nhà trường để có biện pháp xử lý.</p>
                                          
                                                                
                                                                <p>&nbsp;</p>
                                                                
                                                                
                                                                <p style="font-size:12px;font-family:Arial,sans-serif" align="center">&nbsp;</p>
                                                                <p style="font-size:12px;font-family:Arial,sans-serif">---------<br>
        
                                                                <div class="col-md-3 my-4">
                                                                <div class="footer-item">
                                                                    <div class="footer-item_logo">
                                                                    </div>
                                                                    <div class="footer-item_text">
                                                                       tmas - HOU điện tử
                                                                    </div>
                                                                </div>
                                                            </div></p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                
                                                
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table style="Margin:0 auto;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:100%">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                <hr align="center" style="background:#dddedf;border:none;color:#dddedf;height:1px;margin-bottom:0;margin-top:0">
                                <table align="center" class="m_-8878546904072771419container" style="Margin:0 auto;background:#f6f7f8;border-collapse:collapse;border-color:transparent;border-spacing:0;float:none;margin:0 auto;padding:0;text-align:center;vertical-align:top;width:580px">
                                    <tbody>
                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                            <td style="Margin:0;border-collapse:collapse!important;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0;text-align:left;vertical-align:top;word-wrap:break-word">
                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tbody>
                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                            <td>
                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;display:table;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                    <tbody>
                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                            <th class="m_-8878546904072771419small-12 m_-8878546904072771419columns" style="Margin:0 auto;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0 auto;padding:0!important;padding-bottom:16px;text-align:left;width:532px">
                                                                                <table style="border-collapse:collapse;border-color:transparent;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                                                    <tbody>
                                                                                        <tr style="padding:0;text-align:left;vertical-align:top">
                                                                                            <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left">
                                                                                                
                                                                                                
                                                                                                
                                                                                                
                                                                                            </th>
                                                                                            <th style="Margin:0;color:#0a0a0a;font-family:Roboto,sans-serif;font-size:16px;font-weight:400;line-height:1.3;margin:0;padding:0!important;text-align:left;width:0"></th>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </center>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <div class="yj6qo"></div>
            <div class="adL">
            </div>
        </div>';
            sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc,$domain);   
        
            admin_msg_success("Đăng nhập thành công", $duogxaolin->home_url(),1500);
        }

    }

?>