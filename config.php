<?php
error_reporting(1);
date_default_timezone_set('Asia/Ho_Chi_Minh');
session_start();
//$domain = $_SERVER['HTTP_HOST']; 
//$domain = trim($domain,"www.");
$domain = 'localhost';
$connect = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'hou'
);
class System_Core
{

    public function connect_db()
    {
        global $connect;
        $conn = mysqli_connect($connect['hostname'], $connect['username'], $connect['password'], $connect['database']) or die("Bảo trì nâng cấp server");
        mysqli_select_db($conn, $connect['database']) or die("Bảo trì nâng cấp server");
        $conn->set_charset("utf8");
        return $conn;
    }

    public function __construct()
    {
        $this->connect_db();
    }
    public function home_url()
    {
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $domain   = $_SERVER['HTTP_HOST'];
        if ($domain == 'localhost') {
            return $protocol . $domain . '/hou_realease';
        }
        return $protocol . $domain;
    }

    public function home_uri()
    {
        $domain = $_SERVER['REQUEST_URI'];
        return $domain;
    }
    public function to_slug($str)
    {
        $str = trim(mb_strtolower($str));
        $str = preg_replace('/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/', 'a', $str);
        $str = preg_replace('/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/', 'e', $str);
        $str = preg_replace('/(ì|í|ị|ỉ|ĩ)/', 'i', $str);
        $str = preg_replace('/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/', 'o', $str);
        $str = preg_replace('/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/', 'u', $str);
        $str = preg_replace('/(ỳ|ý|ỵ|ỷ|ỹ)/', 'y', $str);
        $str = preg_replace('/(đ)/', 'd', $str);
        $str = preg_replace('/[^a-z0-9-\s]/', '', $str);
        $str = preg_replace('/([\s]+)/', '-', $str);
        return $str;
    }
    public function auth()
    {
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `users`  WHERE username = '" . $_SESSION['username'] . "' ");
        $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row;
    }
    public function teacher()
    {
        $result = mysqli_query($this->connect_db(), "SELECT * FROM `admin`  WHERE username = '" . $_SESSION['teacher'] . "' ");
        $row    = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $row;
    }
    public function anti_text($text)
    {
        $text = html_entity_decode(trim($text), ENT_QUOTES, 'UTF-8');
        //$text=str_replace(" ","-", $text);
        $text = str_replace("--", "", $text);
        $text = str_replace("@", "", $text);
        $text = str_replace("/", "", $text);
        $text = str_replace("\\", "", $text);
        $text = str_replace(":", "", $text);
        $text = str_replace("\"", "", $text);
        $text = str_replace("'", "", $text);
        $text = str_replace("<", "", $text);
        $text = str_replace(">", "", $text);
        $text = str_replace(",", "", $text);
        $text = str_replace("?", "", $text);
        $text = str_replace(";", "", $text);
        $text = str_replace(".", "", $text);
        $text = str_replace("[", "", $text);
        $text = str_replace("]", "", $text);
        $text = str_replace("(", "", $text);
        $text = str_replace(")", "", $text);
        $text = str_replace("́", "", $text);
        $text = str_replace("̀", "", $text);
        $text = str_replace("̃", "", $text);
        $text = str_replace("̣", "", $text);
        $text = str_replace("̉", "", $text);
        $text = str_replace("*", "", $text);
        $text = str_replace("!", "", $text);
        //$text=str_replace("$","-",$text);
        //$text=str_replace("&","-and-",$text);
        $text = str_replace("%", "", $text);
        $text = str_replace("#", "", $text);
        $text = str_replace("^", "", $text);
        $text = str_replace("=", "", $text);
        $text = str_replace("+", "", $text);
        $text = str_replace("~", "", $text);
        $text = str_replace("`", "", $text);
        //$text=str_replace("--","-",$text);
        $text = strtolower($text);
        return $text;
    }
    public function upload_imgur($images)
    {
        $file     = file_get_contents($images);
        $dataPost = array(
            'image' => base64_encode($file)
        );
        $ch       = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_POST, 1);
        $header[] = 'Authorization: Client-ID d32a28252795ab8';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataPost);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    function site($data, $domain)
    {
        $this->connect_db();
        $row = $this->connect_db()->query("SELECT * FROM `options` WHERE`domain`= '$domain' ")->fetch_array();
        return $row[$data];
    }
    function query($sql)
    {
        $row = $this->connect_db()->query($sql);
        return $row;
    }
    function cong($table, $data, $sotien, $where)
    {
        $row = $this->connect_db()->query("UPDATE `$table` SET `$data` = `$data` + '$sotien' WHERE $where ");
        return $row;
    }
    function tru($table, $data, $sotien, $where)
    {
        $row = $this->connect_db()->query("UPDATE `$table` SET `$data` = `$data` - '$sotien' WHERE $where ");
        return $row;
    }
    function insert($table, $data)
    {
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value) {
            $field_list .= ",$key";
            $value_list .= ",'" . mysqli_real_escape_string($this->connect_db(), $value) . "'";
        }
        $sql = 'INSERT INTO ' . $table . '(' . trim($field_list, ',') . ') VALUES (' . trim($value_list, ',') . ')';

        return mysqli_query($this->connect_db(), $sql);
    }
    function update($table, $data, $where)
    {
        $sql = '';
        foreach ($data as $key => $value) {
            $sql .= "$key = '" . mysqli_real_escape_string($this->connect_db(), $value) . "',";
        }
        $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where;
        return mysqli_query($this->connect_db(), $sql);
    }
    function remove($table, $where)
    {
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->connect_db(), $sql);
    }
    function update_value($table, $data, $where, $value1)
    {
        $sql = '';
        foreach ($data as $key => $value) {
            $sql .= "$key = '" . mysqli_real_escape_string($this->connect_db(), $value) . "',";
        }
        $sql = 'UPDATE ' . $table . ' SET ' . trim($sql, ',') . ' WHERE ' . $where . ' LIMIT ' . $value1;
        return mysqli_query($this->connect_db(), $sql);
    }
    function get_list($sql)
    {
        $result = mysqli_query($this->connect_db(), $sql);
        if (!$result) {
            die('Lỗi? Help DuogXaoLin');
        }
        $return = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    function get_row($sql)
    {
        $result = mysqli_query($this->connect_db(), $sql);
        if (!$result) {
            die('Lỗi? Help DuogXaoLin');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
    function num_rows($sql)
    {
        $result = mysqli_query($this->connect_db(), $sql);
        if (!$result) {
            die('Lỗi? Help DuogXaoLin');
        }
        $row = mysqli_num_rows($result);
        mysqli_free_result($result);
        if ($row) {
            return $row;
        }
        return false;
    }
}
$duogxaolin = new System_Core;
function sendTele($message, $domain)
{
    global $duogxaolin;

    $tele_token = $duogxaolin->site('bot', $domain);
    $tele_chatid = $duogxaolin->site('idtele', $domain);

    $data = http_build_query([
        'chat_id' => $tele_chatid,
        'text' => $message,
    ]);

    $url = 'https://api.telegram.org/bot' . $tele_token . '/sendMessage';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_REFERER, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Win) AppleWebKit/1000.0 (KHTML, like Gecko) Chrome/65.663 Safari/1000.01');
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    if ($data) {
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
function format_date($time)
{
    return date("H:i:s d/m/Y", $time);
}
function sendCSM($mail_nhan, $ten_nhan, $chu_de, $noi_dung, $bcc, $domain)
{
    global $duogxaolin;
    // PHPMailer Modify
    $mail = new PHPMailer();
    $mail->SMTPDebug = 0;
    $mail->Debugoutput = "html";
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $duogxaolin->site('email', $domain); // GMAIL STMP
    $mail->Password = $duogxaolin->site('pass_email', $domain); // PASS STMP
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
    $mail->setFrom($duogxaolin->site('email', $domain), $bcc);
    $mail->addAddress($mail_nhan, $ten_nhan);
    $mail->addReplyTo($duogxaolin->site('email', $domain), $bcc);
    $mail->isHTML(true);
    $mail->Subject = $chu_de;
    $mail->Body    = $noi_dung;
    $mail->CharSet = 'UTF-8';
    $send = $mail->send();
    return $send;
}
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

function excel_export($list, $name)
{
    $fileName = $name . '.xlsx';
    $excel = new Spreadsheet();
    $writer = new Xlsx($excel);
    $sheet = $excel->getActiveSheet();
    //Chọn trang cần ghi (là số từ 0->n)
    $excel->setActiveSheetIndex(0);
    //Tạo tiêu đề cho trang. (có thể không cần)
    $sheet->setTitle('data card');
    //Xét chiều rộng cho từng, nếu muốn set height thì dùng setRowHeight()
    $sheet->getColumnDimension('A')->setWidth(15);
    //Xét in đậm cho khoảng cột
    $sheet->getStyle('A1:K1')->getFont()->setBold(true);
    //Tạo tiêu đề cho từng cột
    $sheet->setCellValue('A1', 'usn');
    // thực hiện thêm dữ liệu vào từng ô bằng vòng lặp
    // dòng bắt đầu = 2 vì dòng đầu đã có tiêu đề
    $numRow = 2;
    foreach ($list as $row) {
        $sheet->setCellValue('A' . $numRow, $row['username']);
        $numRow++;
    }
    header('Content-type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    $writer->save('php://output');
}
function excel_import_sv($list)
{
   global $duogxaolin;
       // Tạo đối tượng đọc tệp Excel
       $reader = IOFactory::createReader('Xlsx');

       // Load tệp Excel
       $spreadsheet = $reader->load($list);

  //  $spreadsheet = IOFactory::load($duogxaolin->home_url()."path/excel/students.xlsx");
    $worksheet = $spreadsheet->getActiveSheet();
    // Lặp qua các dòng trong bảng tính và chèn dữ liệu vào cơ sở dữ liệu MySQL
    foreach ($worksheet->getRowIterator() as $row) {
        // Lấy các giá trị trong cột A và B
        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(FALSE);
        $column_a = ''; //mã sinh viên
   /*     $column_b = ''; //họ và tên
        $column_c = ''; //căn cước công dân
        $column_d = ''; //ngày sinh
        $column_e = ''; //giới tính
        $column_f = ''; //khóa
        $column_g = ''; //lớp
        $column_h = ''; //số điện thoại 
        $column_i = ''; //email */
        foreach ($cellIterator as $cell) {
            if ($cell->getColumn() == 'A') {
                $column_a = $cell->getValue();
            }
        /*    if ($cell->getColumn() == 'B') {
                $column_b = $cell->getValue();
            }
            if ($cell->getColumn() == 'C') {
                $column_c = $cell->getValue();
            }
            if ($cell->getColumn() == 'D') {
                $column_d = $cell->getValue();
            }
            if ($cell->getColumn() == 'E') {
                $column_e = $cell->getValue();
            }
            if ($cell->getColumn() == 'F') {
                $column_f = $cell->getValue();
            }
            if ($cell->getColumn() == 'G') {
                $column_g = $cell->getValue();
            }
            if ($cell->getColumn() == 'H') {
                $column_h = $cell->getValue();
            }
            if ($cell->getColumn() == 'I') {
                $column_i = $cell->getValue();
            } */
        }
        // Chèn dữ liệu vào cơ sở dữ liệu MySQL
        $sql = "INSERT INTO users (username) VALUES ('$column_a')";
        if (mysqli_query($duogxaolin->connect_db(), $sql)) {
            return true;
        } else {
           return false;
        }
    }
}
function gettime()
{
    return date('Y/m/d H:i:s', time());
}
function check_string($data)
{
    return trim(htmlspecialchars(addslashes($data)));
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function score($s1, $s2, $s3)
{
    return ($s1 + ($s2 * 2) + ($s3 * 7)) / 10;
    //return str_replace(array('<',"'",'>','?','/',"\\",'--','eval(','<php'),array('','','','','','','','',''),htmlspecialchars(addslashes(strip_tags($data))));
}
function format_cash($price)
{
    return str_replace(",", ".", number_format($price));
}
function curl_get($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $data = curl_exec($ch);

    curl_close($ch);
    return $data;
}
function random($string, $int)
{
    return substr(str_shuffle($string), 0, $int);
}
function pheptru($int1, $int2)
{
    return $int1 - $int2;
}
function phepcong($int1, $int2)
{
    return $int1 + $int2;
}
function phepnhan($int1, $int2)
{
    return $int1 * $int2;
}
function phepchia($int1, $int2)
{
    return $int1 / $int2;
}
function check_img($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("png", "jpeg", "jpg", "PNG", "JPEG", "JPG", "gif", "GIF");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}
function msg_error3($text)
{
    return '<div class="alert alert-danger alert-dismissible alert-custom">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>' . $text . '</div>';
}
function msg_success3($text)
{
    return '<div class="alert alert-success alert-dismissible alert-custom">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>' . $text . '</div>';
}


function msg_success2($text)
{
    return die('<div class="alert alert-success alert-dismissible alert-custom ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <ul class="mb-0 pl-3"><li>' . $text . '</li></ul></div>');
}
function msg_error2($text)
{
    return die('<div class="alert alert-danger alert-dismissible alert-custom ">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <ul class="mb-0 pl-3"><li>' . $text . '</li></ul></div>');
}
function msg_warning2($text)
{
    return die('<div class="alert alert-warning alert-dismissible alert-custom">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>' . $text . '</div>');
}
function msg_success($text, $url, $time)
{
    return die('<div class="alert alert-success alert-dismissible alert-custom">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>' . $text . '</div><script type="text/javascript">setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function msg_error($text, $url, $time)
{
    return die('<div class="alert alert-danger alert-dismissible alert-custom">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>' . $text . '</div><script type="text/javascript">setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function msg_warning($text, $url, $time)
{
    return die('<div class="alert alert-warning alert-dismissible alert-custom">
    <a href="#" class="close" data-dismiss="alert" aria-badge="close">×</a>' . $text . '</div><script type="text/javascript">setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function admin_msg_success($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thành Công", "' . $text . '","success");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function admin_msg_error($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "' . $text . '","error");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function admin_msg_error2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thất Bại", "' . $text . '","error");</script>');
}
function admin_msg_warning($text, $url, $time)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "' . $text . '","warning");
    setTimeout(function(){ location.href = "' . $url . '" },' . $time . ');</script>');
}
function admin_msg_warning2($text)
{
    return die('<script type="text/javascript">Swal.fire("Thông Báo", "' . $text . '","warning");</script>');
}
function XoaDauCach($text)
{
    return trim(preg_replace('/\s+/', ' ', $text));
}
function status($data)
{
    if ($data == 1) {
        $show = '
        <span class="badge badge-pill badge-success">Đã hoàn thành</span>';
    } else {
        $show = '<span class="badge badge-pill badge-warning">Trượt</span>';
    }
    return $show;
}


function check_username($data)
{
    if (preg_match('/^[a-zA-Z0-9_-]{3,16}$/', $data, $matches)) {
        return True;
    } else {
        return False;
    }
}
function check_email($data)
{
    if (preg_match('/^.+@.+$/', $data, $matches)) {
        return True;
    } else {
        return False;
    }
}
function check_phone($data)
{
    if (preg_match('/^[0-9]{10}+$/', $data, $matches)) {
        return True;
    } else {
        return False;
    }
}
function check_url($url)
{
    $c = curl_init();
    curl_setopt($c, CURLOPT_URL, $url);
    curl_setopt($c, CURLOPT_HEADER, 1);
    curl_setopt($c, CURLOPT_NOBODY, 1);
    curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($c, CURLOPT_FRESH_CONNECT, 1);
    if (!curl_exec($c)) {
        return false;
    } else {
        return true;
    }
}
function check_zip($img)
{
    $filename = $_FILES[$img]['name'];
    $ext = explode(".", $filename);
    $ext = end($ext);
    $valid_ext = array("zip", "ZIP");
    if (in_array($ext, $valid_ext)) {
        return true;
    }
}
function typestring($string)
{
    return md5(md5($string));
}
function myip()
{
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip_address = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip_address = $_SERVER['REMOTE_ADDR'];
    }
    return $ip_address;
}
function myagent()
{
    $ip_address = $_SERVER['HTTP_USER_AGENT'];
    return $ip_address;
}
function PHPSESSID()
{
    $ip_address = $_COOKIE['PHPSESSID'];
    return $ip_address;
}
function timeAgo($time_ago)
{
    $time_ago   = date("Y-m-d H:i:s", $time_ago);
    $time_ago   = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed;
    $minutes    = round($time_elapsed / 60);
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400);
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640);
    $years      = round($time_elapsed / 31207680);
    // Seconds
    if ($seconds <= 60) {
        return "$seconds giây trước";
    }
    //Minutes
    else if ($minutes <= 60) {
        return "$minutes phút trước";
    }
    //Hours
    else if ($hours <= 24) {
        return "$hours tiếng trước";
    }
    //Days
    else if ($days <= 7) {
        if ($days == 1) {
            return "Hôm qua";
        } else {
            return "$days ngày trước";
        }
    }
    //Weeks
    else if ($weeks <= 4.3) {
        return "$weeks tuần trước";
    }
    //Months
    else if ($months <= 12) {
        return "$months tháng trước";
    }
    //Years
    else {
        return "$years năm trước";
    }
}
if (isset($_SESSION['username'])) {
    $getUsers = $duogxaolin->auth();
    if ($getUsers['ip'] != myip()) {
        session_start();
        session_destroy();
        header('location: /');
    }
    if ($getUsers['agent_id'] != myagent()) {
        session_start();
        session_destroy();
        header('location: /');
    }
    if ($getUsers['php'] != PHPSESSID()) {
        session_start();
        session_destroy();
        header('location: /');
    }
    $auth = $duogxaolin->auth();
    $getUser = $auth;
}
if (isset($_SESSION['teacher'])) {
    $getUsers = $duogxaolin->teacher();
    if ($getUsers['ip'] != myip()) {
        session_start();
        session_destroy();
        header('location: /');
    }
    if ($getUsers['agent_id'] != myagent()) {
        session_start();
        session_destroy();
        header('location: /');
    }
    if ($getUsers['php'] != PHPSESSID()) {
        session_start();
        session_destroy();
        header('location: /');
    }
    $auth = $duogxaolin->teacher();
    $getUser = $auth;
}
