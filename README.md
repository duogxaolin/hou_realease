# hou_realease
# hướng dẫn sử dụng:
 b1: tải về và học cách sử dụng visual studio code và xampp 
 b2: mở xampp start 2 port đầu (apache, mysql)
 b3: mở visual studio code và mở file htdocs trong folder xampp
 b4: chạy lệnh git clone https://github.com/duogxaolin/hou_realease.git
 b5: vào http://localhost/phpmyadmin/ tạo một database mới tên là hou và dán file hou.sql vào
 b6: tiến hành config tại file config.php đối với xampp thì giữ nguyên là có thể sử dụng
 ```php
 
 $connect = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'hou'
);
```
* Sau khi sửa xong tiến hành commit code như sau:
```php
git add .
git commit -m "nội dung chỉnh sửa"
git push
```
* mỗi lần tiến hành sửa code chạy lệnh : git pull để lấy data mới nhất
7/3/2023