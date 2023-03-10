-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 08, 2023 lúc 09:47 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `hou`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `class_id` text NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL,
  `course` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `course_id` text NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `open_class`
--

CREATE TABLE `open_class` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `open_class_id` text NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL,
  `subject` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `tenweb` text NOT NULL,
  `mota` text NOT NULL,
  `tukhoa` text NOT NULL,
  `logo` text NOT NULL,
  `email` text NOT NULL,
  `pass_email` text NOT NULL,
  `noidung_naptien` text NOT NULL,
  `thongbao` text NOT NULL,
  `anhbia` text NOT NULL,
  `favicon` text NOT NULL,
  `baotri` text NOT NULL,
  `chinhsach` text NOT NULL,
  `min_ruttien` text NOT NULL,
  `phi_chuyentien` text NOT NULL,
  `status_chuyentien` text NOT NULL,
  `hotline` text NOT NULL,
  `facebook` text NOT NULL,
  `theme_color` text NOT NULL,
  `modal_thongbao` text NOT NULL,
  `status_muathe` text NOT NULL,
  `status_napbank` text NOT NULL,
  `status_demo` text NOT NULL,
  `email_admin` text NOT NULL,
  `phi_rut_tien` float NOT NULL,
  `script_live_chat` text NOT NULL,
  `status_blog` text NOT NULL,
  `api_autocard` text NOT NULL,
  `autock` text NOT NULL,
  `chenhlech` float NOT NULL,
  `chenhlech1` float NOT NULL,
  `chenhlech2` float NOT NULL,
  `bot` text NOT NULL,
  `tele` text NOT NULL,
  `idtele` text NOT NULL,
  `bankttv` text NOT NULL,
  `api_buy` text NOT NULL,
  `api_bank` text NOT NULL,
  `zing` text NOT NULL,
  `poster` text NOT NULL,
  `partner_id` text NOT NULL,
  `wallet_number` text NOT NULL,
  `partner_key` text NOT NULL,
  `checklog` text NOT NULL,
  `domainv3` text NOT NULL,
  `domain` text NOT NULL,
  `affiliate` float NOT NULL,
  `token_rut` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `tenweb`, `mota`, `tukhoa`, `logo`, `email`, `pass_email`, `noidung_naptien`, `thongbao`, `anhbia`, `favicon`, `baotri`, `chinhsach`, `min_ruttien`, `phi_chuyentien`, `status_chuyentien`, `hotline`, `facebook`, `theme_color`, `modal_thongbao`, `status_muathe`, `status_napbank`, `status_demo`, `email_admin`, `phi_rut_tien`, `script_live_chat`, `status_blog`, `api_autocard`, `autock`, `chenhlech`, `chenhlech1`, `chenhlech2`, `bot`, `tele`, `idtele`, `bankttv`, `api_buy`, `api_bank`, `zing`, `poster`, `partner_id`, `wallet_number`, `partner_key`, `checklog`, `domainv3`, `domain`, `affiliate`, `token_rut`) VALUES
(1, 'HOU.EDU.VN', 'Hệ thống đổi thẻ cào sang tiền mặt phí tốt nhất thị trường - tự động xử lý thẻ trong vài giây!', 'autocard, doi the, đổi thẻ cào sang tiền mặt, doi the sieu nhanh, the sieu re, doi the nhanh, doi the cao sang tien mat, card24, card exchange, tst, tsr, tsn, doicardnhanh, doi thẻ cào, trum the cào, đổi thẻ giá rẻ, mua thẻ cào giá rẻ, mua thẻ cào, card online, card giá rẻ', 'https://hou.edu.vn/assets/frontend/img/dhmohn.png', 'duog03@gmail.com', 'iqkihskimxxtdaew', 'thenhanh', '<div class=\"section-heading_desc\"><p style=\"margin-bottom: 4px; font-family: roboto, sans-serif; font-size: 14px;\"><u style=\"color: rgb(18, 20, 21);\"><span arial=\"\" black\";\"=\"\"><font color=\"#ff0000\"><span style=\"font-weight: 700;\">  Thông Báo : </span></font> </span></u><span style=\"font-weight: bolder;\"><font color=\"#121415\"><br></font></span></p><p style=\"margin-bottom: 4px; font-family: roboto, sans-serif; font-size: 14px;\"><span style=\"font-weight: bolder;\"><font color=\"#121415\">► Miễn Phí Nạp Rút Auto Min Qua Momo </font></span><em style=\"font-weight: 700;\"><font color=\"#121415\">10,000VNĐ</font></em><span style=\"font-weight: bolder;\"><font color=\"#121415\"> , ATM </font><em><font color=\"#121415\">10,000VNĐ </font></em></span></p><p style=\"margin-bottom: 4px; font-family: roboto, sans-serif; font-size: 14px;\"><span style=\"font-weight: bolder;\"><font color=\"#121415\" style=\"font-style: italic;\">► </font><font style=\"\" color=\"#ff0000\"><u>Hót : </u></font></span><em style=\"font-weight: bolder;\"><font color=\"#121415\">Admin Đã Mở Bắng Tài Khoản Chính 4 Mạng (Viettell,Vina,Mobi,Vnmb </font></em><a style=\"font-size: 13px; background-color: rgb(255, 255, 255); color: red; transition: back 0.2s ease-out 0s; font-family: SanFrancisco; font-weight: 700;\">Chỉ áp dụng cho thuê bao trả trước</a><em style=\"font-weight: bolder;\"><font color=\"#121415\">) Mời Ace Lên Đơn... </font></em><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABoAAAANCAYAAAC3mX7tAAAAAXNSR0IArs4c6QAAAARzQklUCAgICHwIZIgAAADJSURBVDiNvVQxDsMgDDxHSMmerW9gzGPyDV6Sb+QxGfuGbNmbiQ7EyDGmUtWkJyHwYR82RgAHJsQ4IUYIXMkRk9IpgOhqriDvgpPGa0tz15c2ryUkzzGWDgA0AURaQIsu7WxmKXnLh7kAIvft1T0f9qGcoKyCMSFGV9JJzG+jKebXxOfrVftLO8OjjDUP+oRcUQsM+5j7xAnwrCs3eyQz1vDrmEc1iQPDnnwCiJpfnnftkWgUPer6c7C09V4trub3t5/hVN6df90brPKXAkom/w8AAAAASUVORK5CYII=\" data-filename=\"image.png\" style=\"width: 26px;\"></p><p style=\"margin-bottom: 4px; font-family: roboto, sans-serif; font-size: 14px;\"><span style=\"color: rgb(18, 20, 21); font-weight: 700;\">► </span><span style=\"color: rgb(18, 20, 21);\"><b>Hệ Thống Nạp Cước Trả Trước , Gạch Cước Trả Sau Qua My Đã Hoạt Động (Otp Đang Cập Nhật Hoàn Thành Trong Thời Gian Sớm Nhất...)</b></span><span style=\"font-weight: bolder;\"><em><font color=\"#121415\"><br></font></em></span></p><p style=\"margin-bottom: 4px;\"><font face=\"roboto, sans-serif\"><span style=\"color: rgb(18, 20, 21); font-size: 14px;\">► </span><i style=\"\"><b style=\"font-size: 14px;\"><font color=\"#121415\">Đổi Thẻ Quá 5P Mà Vẫn Trạng Thái</font><font color=\"#efc631\"> \"Thẻ chờ\"</font><font color=\"#ffff00\"> </font><font color=\"#121415\">Tức Là Thẻ Đó Đang Bị Treo Do Quá Tải </font></b><span style=\"color: rgb(18, 20, 21); font-size: 14px;\"><b>»</b></span><b style=\"color: rgb(18, 20, 21); font-size: 14px;\"> Bạn Hãy Liên Hệ </b></i></font><u style=\"color: rgb(18, 20, 21); font-size: 14px;\"><span arial=\"\" black\";\"=\"\"><font color=\"#ff0000\"><span style=\"font-weight: 700;\"> Admin</span></font></span></u><font face=\"roboto, sans-serif\"><i style=\"\"><b style=\"color: rgb(18, 20, 21); font-size: 14px;\"> Để Xữ Lý ! </b></i></font><span style=\"color: rgb(51, 51, 51); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px;\"> </span><img alt=\"\" src=\"https://doithe1s.vn/storage/userfiles/files/t%E1%BA%A3i%20xu%E1%BB%91ng.gif\" style=\"border: 0px; color: rgb(51, 51, 51); font-family: Roboto, Arial, Helvetica, sans-serif; font-size: 14px; height: 9px; width: 20px;\"> </p><p style=\"margin-bottom: 4px;\"><span style=\"color: rgb(18, 20, 21); font-size: 14px;\">► <b>Sai Mệnh Giá Trừ -50% Thực Nhận Mệnh Giá Nhỏ Hơn .</b></span></p><p style=\"margin-bottom: 4px;\"><span style=\"color: rgb(18, 20, 21); font-size: 14px;\">► <b>Quý Khách Cần Điền Đúng Seri , Sai Seri Sẽ Bị Xử Lý Chậm ...</b></span><br></p><p style=\"margin-bottom: 4px;\"><span style=\"color: rgb(18, 20, 21); font-family: roboto, sans-serif; font-size: 14px;\"></span></p><p style=\"margin-bottom: 4px; font-family: roboto, sans-serif; font-size: 14px;\"><font color=\"#121415\">► </font><span style=\"font-weight: bolder; font-family: Roboto, sans-serif;\"><em style=\"\"><font color=\"#121415\">Quý Khách Có Sản Lượng Ổn Định , 1-3TR / Ngày Liên Hệ </font></em></span><u style=\"color: rgb(18, 20, 21);\"><span arial=\"\" black\";\"=\"\"><font color=\"#ff0000\"><span style=\"font-weight: 700;\"> Admin</span></font></span></u><span style=\"font-weight: bolder; font-family: Roboto, sans-serif;\"><em style=\"\"><font color=\"#121415\"> Để Lên  </font><font color=\"#0000ff\">Đại Lý Vip </font></em></span><img alt=\"\" src=\"https://doithe1s.vn/storage/userfiles/files/new(1)%20(1).gif\" style=\"color: rgb(51, 51, 51); font-family: Roboto, Arial, Helvetica, sans-serif; font-weight: 700; border: 0px; height: 10px; width: 20px;\"></p><p style=\"margin-bottom: 4px; font-family: roboto, sans-serif; font-size: 14px;\">►<b>Tuyển API chiết khấu tất cả các nhà mạng siêu tốt, Gạch thẻ tự động 100%,Tốc độ xử lý cực nhanh, Hỗ trợ 24/7 !</b></p><p style=\"margin-bottom: 4px;\"><font style=\"\"><span style=\"font-family: roboto, sans-serif; font-size: 14px;\"><font color=\"#121415\"><span style=\"background-color: rgb(245, 245, 245);\">► </span></font></span></font><u style=\"color: rgb(18, 20, 21); font-size: 14px;\"><span arial=\"\" black\";\"=\"\"><font color=\"#ff0000\"><span style=\"font-weight: 700;\">Nhóm Telegram Hỗ Trợ Khách Hàng Gạch Thẻ (</span></font></span></u><a href=\"https://t.me/hotrothenhanh365\" target=\"_blank\">https://t.me/hotrothenhanh365</a><b style=\"font-size: 14px; color: rgb(255, 0, 0); text-decoration-line: underline;\">)</b></p><p style=\"margin-bottom: 4px;\"><span style=\"color: rgb(18, 20, 21); font-size: 14px;\">► </span><u style=\"color: rgb(18, 20, 21); font-size: 14px;\"><span arial=\"\" black\";\"=\"\"><font color=\"#ff0000\"><span style=\"font-weight: 700;\">Nhóm Zalo Hỗ Trợ Khách Hàng Nạp Cước </span></font></span></u>(<a href=\"https://zalo.me/g/muibss900\" target=\"_blank\" style=\"background-color: rgb(245, 245, 245);\">https://zalo.me/g/muibss900</a>)</p>            </div>', 'https://i.imgur.com/slCoqBo.png', 'https://i.imgur.com/46aRfrx.png', 'ON', '<p>BẰNG VIỆC SỬ DỤNG C&Aacute;C DỊCH VỤ HOẶC MỞ MỘT T&Agrave;I KHOẢN, BẠN CHO BIẾT RẰNG BẠN CHẤP NHẬN, KH&Ocirc;NG R&Uacute;T LẠI, C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG SỬ DỤNG C&Aacute;C DỊCH VỤ CỦA CH&Uacute;NG T&Ocirc;I HAY TRUY CẬP TRANG WEB. NẾU BẠN DƯỚI 18 TUỔI HOẶC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot;PH&Ugrave; HỢP Ở NƠI BẠN SỐNG, BẠN PHẢI XIN PH&Eacute;P CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P ĐỂ MỞ MỘT T&Agrave;I KHOẢN V&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P PHẢI ĐỒNG &Yacute; VỚI C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y. NẾU BẠN KH&Ocirc;NG BIẾT BẠN C&Oacute; THUỘC &quot;ĐỘ TUỔI TRƯỞNG TH&Agrave;NH&quot; Ở NƠI BẠN SỐNG HAY KH&Ocirc;NG, HOẶC KH&Ocirc;NG HIỂU PHẦN N&Agrave;Y, VUI L&Ograve;NG KH&Ocirc;NG TẠO T&Agrave;I KHOẢN CHO ĐẾN KHI BẠN Đ&Atilde; NHỜ CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA BẠN GI&Uacute;P ĐỠ. NẾU BẠN L&Agrave; CHA MẸ HOẶC NGƯỜI GI&Aacute;M HỘ HỢP PH&Aacute;P CỦA MỘT TRẺ VỊ TH&Agrave;NH NI&Ecirc;N MUỐN TẠO MỘT T&Agrave;I KHOẢN, BẠN PHẢI CHẤP NHẬN C&Aacute;C ĐIỀU KHOẢN DỊCH VỤ N&Agrave;Y THAY MẶT CHO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; V&Agrave; BẠN SẼ CHỊU TR&Aacute;CH NHIỆM ĐỐI VỚI TẤT CẢ HOẠT ĐỘNG SỬ DỤNG T&Agrave;I KHOẢN HAY C&Aacute;C DỊCH VỤ, BAO GỒM C&Aacute;C GIAO DỊCH MUA H&Agrave;NG DO TRẺ VỊ TH&Agrave;NH NI&Ecirc;N THỰC HIỆN, CHO D&Ugrave; T&Agrave;I KHOẢN CỦA TRẺ VỊ TH&Agrave;NH NI&Ecirc;N Đ&Oacute; ĐƯỢC MỞ V&Agrave;O L&Uacute;C N&Agrave;Y HAY ĐƯỢC TẠO SAU N&Agrave;Y V&Agrave; CHO D&Ugrave; TRẺ VỊ TH&Agrave;NH NI&Ecirc;N C&Oacute; ĐƯỢC BẠN GI&Aacute;M S&Aacute;T TRONG GIAO DỊCH MUA H&Agrave;NG Đ&Oacute; HAY KH&Ocirc;NG.</p>\r\n', '10000', '1000', 'ON', '0333052439', 'https://www.facebook.com/NguyenThanhSang67G1', '#B938CE', '<p style=\"color: rgb(18, 20, 21); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"color: rgb(192, 57, 43);\"><span style=\"font-weight: bolder;\">VÍ THENHANH365- HỆ THỐNG MUA BÁN CARD TỰ ĐỘNG - RÚT TIỀN  MIỄN PHÍ  AUTO 24/24</span></span></p><p style=\"color: rgb(18, 20, 21); font-family: Roboto, sans-serif; font-size: 14px; background-color: rgb(255, 255, 255); text-align: center;\"><span style=\"color: rgb(192, 57, 43);\">✪✪✪✪✪✪</span></p><p style=\"font-family: roboto, sans-serif; margin-bottom: 4px;\"><u style=\"color: rgb(18, 20, 21); font-size: 14px;\"><span arial=\"\" black\";\"=\"\"><font color=\"#ff0000\"><b>  NEW :</b></font> </span></u><b><span courier=\"\" new\";=\"\" font-size:=\"\" 1rem;=\"\" font-weight:=\"\" bolder;\"=\"\" style=\"color: rgb(18, 20, 21); font-size: 14px;\"><font color=\"#0000ff\">Website Không Khóa Bất Kỳ Tài Khoản Nào , Chúng Tôi Tiếp Nhận Toàn Bộ Các API Xả Thẻ, Thời Vụ, Chọn Lọc Mệnh Giá...Vv </font></span><img alt=\"\" src=\"https://doithe1s.vn/storage/userfiles/files/new(1)%20(1).gif\" style=\"font-family: Roboto, Arial, Helvetica, sans-serif; border: 0px; color: rgb(51, 51, 51); height: 10px; width: 20px;\"></b></p><p style=\"font-family: roboto, sans-serif; margin-bottom: 4px;\"><b><span style=\"color: rgb(18, 20, 21); font-family: roboto, sans-serif; font-size: 14px;\">►  </span>100% nạp tự động, giá thật không ảo, không nuốt thẻ như các web nạp thủ cộng mệnh giá 200+, tự động rút tiền cực nhanh miễn phí...</b></p><p style=\"font-family: roboto, sans-serif; margin-bottom: 4px;\"><b><span style=\"color: rgb(18, 20, 21); font-family: roboto, sans-serif; font-size: 14px;\">►  </span>Hệ Thống Nạp Thẻ Qua Sđt Hoạt Động 24/24 (Nạp Qua MyVt , MyVina ,MyMobi...)</b></p><p style=\"font-family: roboto, sans-serif; margin-bottom: 4px;\"><b><span style=\"color: rgb(18, 20, 21); font-family: roboto, sans-serif; font-size: 14px;\">►  </span>Hệ Thống Đang Cập Nhật Chức Nâng Nạp Qua <span style=\"font-family: roboto, sans-serif;\">Otp Hoạt Động Trong Thời Giang Sớm Nhất...</span></b></p> ', 'ON', 'ON', 'OFF', ' TheNhanh365@gmail.Com', 0, '', 'ON', '74544302711', 'ON', 1, 0.5, 0.5, '5650627662:AAF1vDiRADsTbSyC6VslwFwi2cSFji9v3Qk', 'ON', '-407031803', 'ON', 'b8e030256edbfd20e608ff4c6436dca8', 'a8ae1a97fe39f490dadd9874702ebe8d', '', 'https://thenhanh365.com/assets/images/logo.png', '7359305683', '0096564032', 'bbc581b30f5fa1a32442a24109919048', '50dfff9c7341c97ec9de7a852d463d57', '', 'localhost', 0.2, 'c93b651ce825ef950fa5ffb0736357de');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `tinchi` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `name_subject` text NOT NULL,
  `id_subject` varchar(250) NOT NULL,
  `score1` float NOT NULL,
  `score2` float NOT NULL,
  `score3` float NOT NULL,
  `mark` text NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `note` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `score`
--

INSERT INTO `score` (`id`, `username`, `tinchi`, `amount`, `name_subject`, `id_subject`, `score1`, `score2`, `score3`, `mark`, `status`, `date`, `note`) VALUES
(1, '21a120100061', 3, 1, 'Lập trình hướng đối tượng', 'LTHDT_DT', 10, 10, 9.8, 'A+', 1, '2023-03-07 10:10:12', 'Cần học ít hơn'),
(2, '21a120100061', 3, 1, 'Đại số', 'DS_DT', 10, 9.5, 9.8, 'A+', 1, '2023-03-07 10:10:12', 'Cần học ít hơn!!'),
(3, '21a120100061', 3, 1, 'Kỹ thuật điện', 'KTD_DT', 10, 9.5, 9.8, 'A+', 1, '2023-03-07 10:10:12', 'Cần học ít hơn!!');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `semester`
--

CREATE TABLE `semester` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `semester_id` text NOT NULL,
  `start` text NOT NULL,
  `end` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `name_subject` text NOT NULL,
  `id_subject` text NOT NULL,
  `tinchi` int(11) NOT NULL,
  `conditions` text NOT NULL,
  `loai` int(11) NOT NULL,
  `Knowledge_block` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`id`, `name_subject`, `id_subject`, `tinchi`, `conditions`, `loai`, `Knowledge_block`) VALUES
(1, 'Tin học đại cương', 'THDK_DT', 3, '', 1, 'K1'),
(2, 'Giải tích 1\r\n', 'GT1_DT', 3, '', 1, 'K1'),
(3, 'Vật lý 1\r\n', 'VL1_DT', 2, '', 1, 'K1'),
(4, 'Tiếng Anh cơ bản 1', 'TACB1_DT', 3, '', 1, 'K1'),
(5, 'Pháp luật đại cương', 'PLDK_DT', 2, '', 1, 'K1'),
(6, 'Triết học Mác - Lênin\r\n', 'THM-LN_DT', 3, '', 1, 'K1'),
(7, 'Đại số\r\n', 'DS-DT', 2, '', 1, 'K1'),
(8, 'Giải tích 2\r\n', 'DT2-DT', 3, '', 1, 'K1'),
(9, 'Vật lý 2\r\n', 'VL2-DT', 3, '', 1, 'K1'),
(10, 'Tiếng Anh cơ bản 2\r\n', 'TACB2-DT', 3, '', 1, 'K1'),
(11, 'Nhập môn ngành Điều khiển và Tự động hóa\r\n', 'DK-TDH', 2, '', 1, 'K5'),
(12, 'Tín hiệu và điều chế\r\n', 'THVDC-DT', 2, '', 1, 'K4'),
(13, 'Thực hành máy tính\r\n', 'THMT-DT', 2, '', 1, 'K7'),
(14, 'Kinh tế chính trị Mác - Lênin\r\n', 'KTCTM-LN', 2, '', 1, 'K1'),
(15, 'Xác suất thống kê\r\n', 'XSTK-DT', 2, '', 1, 'K1'),
(16, 'Tiếng Anh cơ bản 3\r\n', 'TACB3-DT', 3, '', 1, 'K1'),
(17, 'Vật liệu và linh kiện điện tử\r\n', 'VLLK-DT', 3, '', 1, 'K4'),
(18, 'Ngôn ngữ lập trình - Cấu trúc dữ liệu\r\n', 'NNLT-CTDL', 3, '', 1, 'K4'),
(19, 'Thực tập cơ bản\r\n', 'TTCB-DT', 2, '', 1, 'K7'),
(20, 'Lý thuyết mạch điện 1\r\n', 'LTMD1-DT', 3, '', 1, 'K5'),
(21, 'Chủ nghĩa xã hội khoa học\r\n', 'CNXHKH', 2, '', 1, 'K1'),
(22, 'Kỹ thuật số và mạch logic\r\n', 'KTSVMLG-DT', 3, '', 1, 'K4'),
(23, 'Kỹ thuật mạch\r\n', 'KTM', 3, '', 1, 'K4'),
(24, 'Nguyên lý kinh tế\r\n', 'NLKT-DT', 2, '', 2, 'K3'),
(25, 'Quản trị học\r\n', 'QTH-DT', 2, '', 2, 'K3'),
(26, 'Lý thuyết mạch điện 2\r\n', 'LTMD2-DT', 2, '', 1, 'K5'),
(27, 'Lý thuyết điều khiển 1\r\n', 'LTDK1-DT', 3, '', 1, 'K5'),
(28, 'Tư tưởng Hồ Chí Minh\r\n', 'TTHCM-DT', 2, '', 1, 'K1'),
(29, 'Kỹ thuật vi xử lý\r\n', 'KTVXL-DT', 3, '', 1, 'K4'),
(30, 'Điện tử công suất\r\n', 'DTCS-DT', 3, '', 1, 'K6'),
(31, 'Lịch sử Đảng Cộng sản Việt Nam\r\n', 'LSDCSVN', 2, '', 1, 'K1'),
(32, 'Đồ án 1\r\n', 'DA1-DT', 2, '', 1, 'K6'),
(33, 'Đo lường điện tử\r\n', 'DLDT-DT', 3, '', 1, 'K4'),
(34, 'Máy điện và khí cụ điện\r\n', 'MDVKCD-DT', 3, '', 1, 'K5'),
(35, 'Điều khiển logic\r\n', 'LOGIC-DT', 3, '', 1, 'K6'),
(36, 'Lý thuyết điều khiển 2\r\n', 'LTDK2-DT', 2, '', 2, 'K6'),
(37, 'Hệ thống điều khiển số\r\n', 'HTDKS-DT', 2, '', 2, 'K6'),
(38, 'Trang bị điện\r\n', 'TBD-DT', 2, '', 2, 'K6'),
(39, 'Điều khiển máy điện\r\n', 'DKMD-DT', 2, '', 2, 'K6'),
(40, 'Thiết kế thiết bị đo\r\n', 'TKTBD-DT', 2, '', 2, 'K6'),
(41, 'Mạng cảm biến\r\n', 'MCB-DT', 2, '', 2, 'K6'),
(42, 'Trí tuệ nhân tạo\r\n', 'TTNT-DT', 2, '', 2, 'K6'),
(43, 'Hệ thống nhúng\r\n', 'HTN-DT', 2, '', 2, 'K6'),
(44, 'Đồ án 2\r\n', 'DA2-DT', 2, '', 1, 'K6'),
(45, 'Thí nghiệm chuyên ngành Tự động hóa\r\n', 'TNCNTDH', 2, '', 1, 'K6'),
(46, 'Hệ thống cung cấp điện\r\n', 'HTCCD-DT', 3, '', 1, 'K6'),
(47, 'Lập trình PLC\r\n', 'PLC', 2, '', 1, 'K6'),
(48, 'Truyền động điện\r\n', 'TDD', 3, '', 1, 'K6'),
(49, 'Điều khiển quá trình\r\n', 'DKQT', 3, '', 1, 'K6'),
(50, 'Matlab và ứng dụng\r\n', 'MATLAB', 2, '', 1, 'K5'),
(51, 'Kỹ thuật phần mềm ứng dụng\r\n', 'KTPMUD-DT', 2, '', 1, 'K6'),
(52, 'Thực hành mô phỏng mạch điện\r\n', 'THMPMD-DT', 2, '', 1, 'K7'),
(53, 'Xử lý số tín hiệu\r\n', 'XLSTH-DT', 3, '', 1, 'K6'),
(54, 'Vi điều khiển và ứng dụng\r\n', 'VDKVUD-DT', 3, '', 1, 'K6'),
(55, 'Lập trình ứng dụng\r\n', 'LTUD-DT', 2, '', 1, 'K6'),
(56, 'Kĩ thuật Robot\r\n', 'ROBOT-DT', 2, '', 1, 'K6'),
(57, 'Hệ SCADA\r\n', 'SCADA-DT', 2, '', 1, 'K6'),
(58, 'Điều khiển mờ và mạng nơron\r\n', 'NORON-DT', 3, '', 1, 'K6'),
(59, 'BMS\r\n', 'BMS-DT', 2, '', 1, 'K6'),
(60, 'Điều khiển hệ cơ điện tử\r\n', 'DKHCDT-DT', 2, '', 1, 'K6'),
(61, 'Hệ thống năng lượng tái tạo\r\n', 'HTNLTT-DT', 2, '', 1, 'K6'),
(62, 'Thiết kế thiết bị điều khiển\r\n', 'TKTBDK-DT', 2, '', 1, 'K6'),
(63, 'Đồ án 3\r\n', 'DA3-DT', 2, '', 1, 'K6'),
(64, 'Thực tập tốt nghiệp\r\n', 'TTTN-DT', 4, '', 1, 'K7'),
(65, 'Đồ án tốt nghiệp kỹ sư\r\n', 'DATNKS-DT', 8, '', 1, 'K8');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `banned` int(11) NOT NULL DEFAULT 0,
  `createdate` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `reason_banned` text DEFAULT NULL,
  `agent_id` text DEFAULT NULL,
  `php` text DEFAULT NULL,
  `otp` varchar(255) NOT NULL,
  `ip` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `banned`, `createdate`, `email`, `reason_banned`, `agent_id`, `php`, `otp`, `ip`, `time`, `phone`, `fullname`) VALUES
(1, '21a120100061', '12345678', '', 0, '2023-03-07 11:55:06', '21a120100061@students.hou.edu.vn', NULL, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/110.0.0.0 Safari/537.36', 'fkku4csn0bv4jedo1n1uigf3h7', '', '::1', '', '', 'Nguyễn Thái Dương'),
(2, '21a120100049', '12345678', '', 0, NULL, '21a120100049@students.hou.edu.vn', NULL, NULL, NULL, '', '', '', '', 'Nguyễn Văn Dũng'),
(3, '21a120100302', '12345678', '', 0, NULL, '21a120100302@students.hou.edu.vn', NULL, NULL, NULL, '', '', '', '', 'Trần Văn Tuấn');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `open_class`
--
ALTER TABLE `open_class`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `open_class`
--
ALTER TABLE `open_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `semester`
--
ALTER TABLE `semester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
