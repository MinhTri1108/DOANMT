-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 12, 2022 lúc 01:05 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `doan1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `boxchat`
--

CREATE TABLE `boxchat` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chat_forums`
--

CREATE TABLE `chat_forums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `msg` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chat_forums`
--

INSERT INTO `chat_forums` (`id`, `name`, `msg`, `created_at`, `updated_at`) VALUES
(19, 'tri ne', 'hi', '2022-05-12 08:30:58', '2022-05-12 08:30:58'),
(20, 'thuye', 'aaaaa', '2022-05-12 09:15:37', '2022-05-12 09:15:37'),
(21, 'DemoMinhTri', 'sao', '2022-05-12 09:16:00', '2022-05-12 09:16:00'),
(22, 'gì', 'đây', '2022-05-12 09:17:31', '2022-05-12 09:17:31'),
(23, 'tui k biết', 'no no no', '2022-05-12 09:17:51', '2022-05-12 09:17:51'),
(24, 'tri1', 'askdalsdasdas;dl', '2022-05-12 09:18:11', '2022-05-12 09:18:11'),
(25, 'tri', 'trường đẹp lắm em', '2022-05-12 09:18:22', '2022-05-12 09:18:22'),
(26, 'vi', 'em bị khùng', '2022-05-12 09:18:33', '2022-05-12 09:18:33'),
(27, 'giấu tên', 'má nó', '2022-05-12 09:18:41', '2022-05-12 09:18:41'),
(28, '1000', 'sao r', '2022-05-12 09:18:45', '2022-05-12 09:18:45'),
(29, 'sợ t', 'sao r', '2022-05-12 09:18:51', '2022-05-12 09:18:51'),
(30, 'ủa', 'ủa', '2022-05-12 09:19:46', '2022-05-12 09:19:46'),
(31, 'thúy', 'tui nè', '2022-05-12 09:25:28', '2022-05-12 09:25:28'),
(32, '11', 'hay chưa', '2022-05-12 09:25:48', '2022-05-12 09:25:48'),
(33, '12', 'quá hay lun ché', '2022-05-12 09:26:04', '2022-05-12 09:26:04'),
(34, 'khuyên', 'sao em', '2022-05-12 09:30:14', '2022-05-12 09:30:14'),
(35, 'giấu teen', 'trường mình đẹp k ạ', '2022-05-12 09:31:36', '2022-05-12 09:31:36'),
(36, 'thúy', 'đẹp lắm em ơi', '2022-05-12 09:32:10', '2022-05-12 09:32:10'),
(37, 'thúy', 'xấu nữa', '2022-05-12 09:32:22', '2022-05-12 09:32:22'),
(38, 'Đoàn Minh Trí 2', 'đẹp lắm em gái', '2022-05-12 09:50:22', '2022-05-12 09:50:22'),
(39, 'abc', 'xin chafo', '2022-05-13 03:33:41', '2022-05-13 03:33:41'),
(40, 'aa', 'sao do', '2022-05-13 03:34:03', '2022-05-13 03:34:03'),
(41, 'abc', 'toi là toi', '2022-05-13 03:35:19', '2022-05-13 03:35:19'),
(42, 'a', 'aaa', '2022-05-13 03:35:33', '2022-05-13 03:35:33'),
(43, 'acn', 'aa', '2022-05-13 03:35:49', '2022-05-13 03:35:49'),
(44, 'Đoàn Minh Trí 2', 'aaaaaa', '2022-05-13 03:39:26', '2022-05-13 03:39:26'),
(45, 'abc', 'asdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasdasd', '2022-05-13 03:48:28', '2022-05-13 03:48:28'),
(46, 'Đoàn Minh Trí 2', 'hi', '2022-05-13 09:09:30', '2022-05-13 09:09:30'),
(47, 'clgv', '?', '2022-05-13 09:09:40', '2022-05-13 09:09:40'),
(48, 'SV: Đoàn Minh Trí 2', 'sv đây', '2022-05-13 09:15:54', '2022-05-13 09:15:54'),
(49, 'GV: Nguyễn Văn A', 'thầy tụi m đây', '2022-05-13 09:16:04', '2022-05-13 09:16:04'),
(50, 'sao đó', 'nè', '2022-05-14 07:04:13', '2022-05-14 07:04:13'),
(51, 'thúy', 'chào mn', '2022-05-14 07:04:36', '2022-05-14 07:04:36'),
(52, 'cc', '1', '2022-05-14 07:04:54', '2022-05-14 07:04:54'),
(53, 'SV: Đoàn Minh Trí 2', 'sao đó các bạn', '2022-05-14 07:05:15', '2022-05-14 07:05:15'),
(54, 'GV: Nguyễn Văn A', 'thay chao cac em', '2022-05-14 09:15:26', '2022-05-14 09:15:26'),
(55, 'GV: Nguyễn Văn A', 'chafo', '2022-05-14 09:15:37', '2022-05-14 09:15:37'),
(56, 'SV: Đoàn Minh Trí', 'chao thay`', '2022-05-14 09:15:43', '2022-05-14 09:15:43'),
(57, 'thúy', 'chào mn', '2022-05-15 16:59:39', '2022-05-15 16:59:39'),
(58, 'khien', 'xin chao', '2022-05-16 00:28:10', '2022-05-16 00:28:10'),
(59, 'tri', 'xin hcaof', '2022-05-16 02:34:47', '2022-05-16 02:34:47'),
(60, 'tri', 'chao', '2022-05-17 13:11:06', '2022-05-17 13:11:06'),
(61, 'thuy', 'xin chao', '2022-05-19 09:17:12', '2022-05-19 09:17:12'),
(62, 'GV: Nguyễn Văn A', 'sao em', '2022-05-19 09:17:47', '2022-05-19 09:17:47'),
(63, 'GV: Nguyễn Văn A', 'hello', '2022-05-19 09:18:54', '2022-05-19 09:18:54'),
(64, 'ADMIN: Đoàn Minh Trí', 'hi', '2022-05-22 07:25:09', '2022-05-22 07:25:09'),
(65, 'tri', 'minhtri', '2022-05-23 01:02:06', '2022-05-23 01:02:06'),
(66, 'ADMIN: Đoàn Minh Trí 2', 'tri', '2022-05-23 01:02:32', '2022-05-23 01:02:32'),
(67, 'tri', 'hello', '2022-05-30 03:48:15', '2022-05-30 03:48:15'),
(68, 'SV: Đoàn Minh Trí 2', 'sao', '2022-05-30 04:44:43', '2022-05-30 04:44:43'),
(69, 'ADMIN: Đoàn Minh Trí', 'xin chao', '2022-06-05 08:35:32', '2022-06-05 08:35:32'),
(70, 'SV: Đoàn Minh Trí', 'hi', '2022-06-06 02:45:27', '2022-06-06 02:45:27'),
(71, 'Trí', 'Xin chào các bạn', '2022-06-12 06:30:46', '2022-06-12 06:30:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idposts` int(11) NOT NULL,
  `matk` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `idposts`, `matk`, `iduser`, `content`, `created_at`, `updated_at`) VALUES
(1, 6, 22021, 21, 'a', '2022-05-30 04:20:50', '2022-05-30 04:20:50'),
(2, 6, 22021, 21, 'no no', '2022-05-30 04:28:33', '2022-05-30 04:28:33'),
(3, 6, 22021, 21, 'aaaa', '2022-05-30 04:32:09', '2022-05-30 04:32:09'),
(4, 6, 22021, 21, 'xin chafo', '2022-05-30 04:43:00', '2022-05-30 04:43:00'),
(5, 5, 22021, 21, 'inbox', '2022-05-30 04:44:00', '2022-05-30 04:44:00'),
(6, 6, 2021, 6, 'sao', '2022-05-30 17:59:15', '2022-05-30 17:59:15'),
(7, 5, 2021, 6, 'inbox', '2022-05-30 17:59:30', '2022-05-30 17:59:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dangkymonhoc`
--

CREATE TABLE `dangkymonhoc` (
  `MaDK` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `idhocphan` int(11) NOT NULL,
  `HocPhi` int(11) NOT NULL,
  `NgayDangKy` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dangkymonhoc`
--

INSERT INTO `dangkymonhoc` (`MaDK`, `MaSV`, `idhocphan`, `HocPhi`, `NgayDangKy`) VALUES
(43, 21, 7, 900000, '2022-05-11 16:29:22'),
(44, 20, 10, 300000, '2022-05-11 16:29:35'),
(45, 20, 7, 900000, '2022-05-11 16:29:36'),
(46, 21, 8, 900000, '2022-05-13 15:50:28'),
(48, 21, 10, 300000, '2022-05-16 13:28:09'),
(49, 20, 11, 900000, '2022-05-16 13:28:47'),
(50, 21, 12, 900000, '2022-05-19 17:06:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdanh`
--

CREATE TABLE `diemdanh` (
  `iddiemdanh` int(11) NOT NULL,
  `MaDK` int(11) NOT NULL,
  `DiemDanh` int(11) NOT NULL,
  `Ngay` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `diemdanh`
--

INSERT INTO `diemdanh` (`iddiemdanh`, `MaDK`, `DiemDanh`, `Ngay`) VALUES
(28, 45, 1, '2022-05-13'),
(29, 43, 0, '2022-05-13'),
(30, 45, 1, '2022-05-12'),
(31, 43, 1, '2022-05-12'),
(32, 45, 0, '2022-05-14'),
(34, 43, 0, '2022-05-14'),
(35, 44, 1, '2022-05-16'),
(36, 45, 1, '2022-05-16'),
(37, 43, 0, '2022-05-16'),
(38, 46, 1, '2022-06-05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsadmin`
--

CREATE TABLE `dsadmin` (
  `MaAdmin` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `NgaySinh` date NOT NULL,
  `cccd` text NOT NULL,
  `GioiTinh` text NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` text NOT NULL,
  `Email` text NOT NULL,
  `Status` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `idloaitk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsadmin`
--

INSERT INTO `dsadmin` (`MaAdmin`, `fname`, `lname`, `password`, `NgaySinh`, `cccd`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `Status`, `avatar`, `idloaitk`) VALUES
(6, 'Đoàn', 'Minh Trí', 1108, '2021-10-11', '52155645', 'Nam', 'Quy Nhơn', '0396305400', 'minhtridoan118@gmail.com', 'Active now', 'csdlqnusss.png', 1),
(7, 'Doan', 'Minh Tri', 1, '2022-04-03', '3123123', 'Nam', 'quảng ngãi', '0396305400', 'minhtridoan118@gmail.com', 'offline', 'csdlqnusss.png', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdiem`
--

CREATE TABLE `dsdiem` (
  `iddiem` int(11) NOT NULL,
  `MaDK` int(11) NOT NULL,
  `DiemCC` double NOT NULL,
  `DiemGK` double NOT NULL,
  `DiemThi` double NOT NULL,
  `DiemTBMon` float NOT NULL,
  `Diem4` int(11) NOT NULL,
  `DiemChu` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsdiem`
--

INSERT INTO `dsdiem` (`iddiem`, `MaDK`, `DiemCC`, `DiemGK`, `DiemThi`, `DiemTBMon`, `Diem4`, `DiemChu`) VALUES
(22, 46, 7, 7, 6, 6.3, 2, 'C'),
(37, 48, 10, 5, 6, 6.2, 2, 'C'),
(54, 43, 10, 10, 8, 8.6, 4, 'A'),
(55, 50, 10, 7, 9, 8.5, 4, 'A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdiemtbhocki`
--

CREATE TABLE `dsdiemtbhocki` (
  `id` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `idhocki` int(11) NOT NULL,
  `DiemTB` double NOT NULL,
  `DiemTB4` double NOT NULL,
  `SoTC` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsdiemtbhocki`
--

INSERT INTO `dsdiemtbhocki` (`id`, `MaSV`, `idhocki`, `DiemTB`, `DiemTB4`, `SoTC`, `created_at`, `updated_at`) VALUES
(3, 21, 1, 7.27, 2.86, 7, '2022-05-17 07:57:08', '2022-05-19 10:02:34'),
(5, 21, 2, 8.5, 4, 3, '2022-05-19 10:06:59', '2022-05-19 10:06:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsdiemtichluysv`
--

CREATE TABLE `dsdiemtichluysv` (
  `id` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `idhocki` int(11) NOT NULL,
  `SoTC` int(11) NOT NULL,
  `DiemTichLuy10` double NOT NULL,
  `DiemTichLuy4` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsdiemtichluysv`
--

INSERT INTO `dsdiemtichluysv` (`id`, `MaSV`, `idhocki`, `SoTC`, `DiemTichLuy10`, `DiemTichLuy4`, `created_at`, `updated_at`) VALUES
(1, 21, 1, 7, 7.27, 2.86, '2022-05-19 10:02:34', '2022-05-19 10:02:34'),
(2, 21, 2, 10, 7.64, 3.2, '2022-05-19 10:06:59', '2022-05-19 10:06:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsgiaovien`
--

CREATE TABLE `dsgiaovien` (
  `MaGV` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `NgaySinh` date NOT NULL,
  `cccd` varchar(255) NOT NULL,
  `GioiTinh` varchar(255) NOT NULL,
  `DiaChi` varchar(255) NOT NULL,
  `SDT` text NOT NULL,
  `Email` text NOT NULL,
  `Status` varchar(30) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `idloaitk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsgiaovien`
--

INSERT INTO `dsgiaovien` (`MaGV`, `fname`, `lname`, `password`, `NgaySinh`, `cccd`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `Status`, `avatar`, `idloaitk`) VALUES
(27, 'Đoàn', 'Minh Trí', 1108, '2021-10-11', '123123123', 'Nữ', 'Quy Nhơn', '0136965420', 'minhtridoan118@gmail.com', 'Active now', 'uploadaws.png', 2),
(28, 'Nguyễn', 'Văn A', 2303, '2022-04-05', '11231232', 'Nam', 'Quy Nhơn', '213123123', 'a1@gmail.com', 'Active now', 'uploadaws.png', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dskhoa`
--

CREATE TABLE `dskhoa` (
  `MaKhoa` int(11) NOT NULL,
  `TenKhoa` varchar(255) NOT NULL,
  `slug_khoa` varchar(255) NOT NULL,
  `DiaChiKhoa` varchar(255) NOT NULL,
  `SDTKhoa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dskhoa`
--

INSERT INTO `dskhoa` (`MaKhoa`, `TenKhoa`, `slug_khoa`, `DiaChiKhoa`, `SDTKhoa`) VALUES
(1, 'Công nghệ thông tin', 'cong-nghe-thong-tin', 'Văn phòng 1', '0123456789'),
(4, 'Kinh tế và kế toán', 'kinh-te-va-ke-toan', 'quy nhơn', '054845121212'),
(6, 'Ngoại ngữ', 'ngoai-ngu', 'quy nhơn', '054845121212');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dskhoahoc`
--

CREATE TABLE `dskhoahoc` (
  `MaKhoaHoc` int(11) NOT NULL,
  `TenKhoaHoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dskhoahoc`
--

INSERT INTO `dskhoahoc` (`MaKhoaHoc`, `TenKhoaHoc`) VALUES
(1, 'K41'),
(2, 'K42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dslop`
--

CREATE TABLE `dslop` (
  `MaLop` int(11) NOT NULL,
  `TenLop` text NOT NULL,
  `slug_lop` varchar(255) NOT NULL,
  `MaKhoa` int(11) NOT NULL,
  `MaKhoaHoc` int(11) NOT NULL,
  `MaHeDT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dslop`
--

INSERT INTO `dslop` (`MaLop`, `TenLop`, `slug_lop`, `MaKhoa`, `MaKhoaHoc`, `MaHeDT`) VALUES
(1, 'Kỹ thuật phầm mềm', 'ky-thuat-phan-mem', 1, 1, 1),
(2, 'Công nghệ thông tin', 'cong-nghe-thong-tin', 1, 1, 1),
(4, 'kế toán', 'ke-toan', 4, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsmonhoc`
--

CREATE TABLE `dsmonhoc` (
  `MaMonHoc` int(11) NOT NULL,
  `TenMonHoc` text NOT NULL,
  `SoTinChi` int(11) NOT NULL,
  `LT` int(11) NOT NULL,
  `TH` int(11) NOT NULL,
  `TL` int(11) NOT NULL,
  `TT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsmonhoc`
--

INSERT INTO `dsmonhoc` (`MaMonHoc`, `TenMonHoc`, `SoTinChi`, `LT`, `TH`, `TL`, `TT`) VALUES
(11, 'Đại cương về Tin học', 3, 30, 30, 0, 0),
(12, 'Đại số tuyến tính', 3, 45, 0, 0, 0),
(13, 'Giải tích', 3, 45, 0, 0, 0),
(14, 'Những NLCB của chủ nghĩa Mác-Lênin 1', 2, 20, 0, 20, 0),
(15, 'Thực hành máy tính (lắp ráp, cài đặt, bảo trì)', 1, 0, 30, 0, 0),
(16, 'Tiếng Anh 1', 3, 45, 0, 0, 0),
(17, 'Giáo dục thể chất 1', 1, 4, 26, 0, 0),
(18, 'Giới thiệu ngành và hướng nghiệp', 2, 30, 0, 0, 0),
(19, 'Hệ quản trị cơ sở dữ liệu', 2, 30, 30, 0, 0),
(20, 'Lập trình cơ bản', 2, 45, 30, 0, 0),
(22, 'Những NLCB của chủ nghĩa Mác-Lênin 2', 3, 30, 0, 30, 0),
(25, 'Toán', 1, 0, 0, 40, 40);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dsphonghoc`
--

CREATE TABLE `dsphonghoc` (
  `idphong` int(11) NOT NULL,
  `SoPhong` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dsphonghoc`
--

INSERT INTO `dsphonghoc` (`idphong`, `SoPhong`) VALUES
(1, 'A1.101'),
(2, 'A1.102'),
(3, 'A1.103'),
(4, 'A1.104'),
(5, 'A1.105'),
(6, 'A1.106'),
(7, 'A1.107'),
(8, 'A1.108'),
(9, 'A1.109');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dssinhvien`
--

CREATE TABLE `dssinhvien` (
  `MaSV` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `NgaySinh` date NOT NULL,
  `cccd` int(11) NOT NULL,
  `GioiTinh` text NOT NULL,
  `DiaChi` text NOT NULL,
  `SDT` text NOT NULL,
  `Email` text NOT NULL,
  `Status` varchar(30) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `MaLop` int(11) NOT NULL,
  `idloaitk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dssinhvien`
--

INSERT INTO `dssinhvien` (`MaSV`, `fname`, `lname`, `password`, `NgaySinh`, `cccd`, `GioiTinh`, `DiaChi`, `SDT`, `Email`, `Status`, `avatar`, `MaLop`, `idloaitk`) VALUES
(20, 'Đoàn', 'Minh Trí', '1108', '2022-04-01', 785455545, 'Nam', 'Quy Nhơn', '0396305400', 'minhtridoan118@gmail.com', 'Active now', 'uploadaws.png', 1, 3),
(21, 'Đoàn', 'Minh Trí 2', '1108', '2022-04-12', 123123123, 'Nam', 'Quy Nhơn', '0396305400', 'hi123aly@gmail.com', 'Active now', 'uploadaws.png', 1, 3),
(23, 'Đoàn', 'Minh Trí 3', '111', '2022-05-12', 3123123, 'Nữ', 'quảng ngãi', '0123123123', 'hi123aly@gmail.com', 'Offline now', 'Untitled.png', 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dstiethoc`
--

CREATE TABLE `dstiethoc` (
  `idtiethoc` int(11) NOT NULL,
  `TietHoc` varchar(50) NOT NULL,
  `GioHocBD` time NOT NULL,
  `GioHocKT` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dstiethoc`
--

INSERT INTO `dstiethoc` (`idtiethoc`, `TietHoc`, `GioHocBD`, `GioHocKT`) VALUES
(1, 'Tiết 1-2', '07:00:00', '08:40:00'),
(2, 'Tiết 3-5', '09:00:00', '11:30:00'),
(3, 'Tiết 6-7', '13:00:00', '14:40:00'),
(4, 'Tiết 8-10', '15:00:00', '17:30:00'),
(5, 'Tiết 1-5', '07:00:00', '11:30:00'),
(6, 'Tiết 6-10', '13:00:00', '17:30:00'),
(7, 'Tiết 3-4', '09:00:00', '10:40:00'),
(8, 'Tiết 8-9', '15:00:00', '16:40:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hedaotao`
--

CREATE TABLE `hedaotao` (
  `MaHeDT` int(11) NOT NULL,
  `TenHDT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hedaotao`
--

INSERT INTO `hedaotao` (`MaHeDT`, `TenHDT`) VALUES
(1, 'Chính quy'),
(2, 'Không chính quy');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocki`
--

CREATE TABLE `hocki` (
  `idhocki` int(11) NOT NULL,
  `idnamhoc` int(11) NOT NULL,
  `HocKi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocki`
--

INSERT INTO `hocki` (`idhocki`, `idnamhoc`, `HocKi`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 2, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocphi`
--

CREATE TABLE `hocphi` (
  `SoTinChi` int(11) NOT NULL,
  `GiaTien` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hocphi`
--

INSERT INTO `hocphi` (`SoTinChi`, `GiaTien`) VALUES
(1, 300000),
(2, 600000),
(3, 900000),
(4, 1200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichhoc`
--

CREATE TABLE `lichhoc` (
  `idlichhoc` int(11) NOT NULL,
  `idhocphan` int(11) NOT NULL,
  `idthu` int(11) NOT NULL,
  `idtiethoc` int(11) NOT NULL,
  `idphong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichhoc`
--

INSERT INTO `lichhoc` (`idlichhoc`, `idhocphan`, `idthu`, `idtiethoc`, `idphong`) VALUES
(24, 7, 2, 1, 3),
(25, 8, 2, 5, 6),
(26, 7, 2, 5, 1),
(27, 7, 5, 6, 8),
(28, 10, 3, 7, 5),
(31, 12, 4, 7, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichlamviec`
--

CREATE TABLE `lichlamviec` (
  `id` int(11) NOT NULL,
  `MaAdmin` int(11) NOT NULL,
  `images` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `NoiDung` varchar(255) NOT NULL,
  `DiaDiem` varchar(255) NOT NULL,
  `Ngay` date NOT NULL,
  `Gio` time NOT NULL,
  `GhiChu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `lichlamviec`
--

INSERT INTO `lichlamviec` (`id`, `MaAdmin`, `images`, `link`, `NoiDung`, `DiaDiem`, `Ngay`, `Gio`, `GhiChu`) VALUES
(6, 6, 'https://kcntt.qnu.edu.vn/Temp/ArticleImage/0e632382-5670-4374-af6e-3eee2ece37fe-Alphatech-52.png', 'lớp ktpm', 'ALPHATECH THÔNG BÁO TUYỂN DỤNG', 'Quy nhơn', '2022-04-15', '19:14:59', 'đi đầy đủ nhe'),
(7, 6, 'https://kcntt.qnu.edu.vn/Temp/ArticleImage/92969b7f-50be-4ae9-bf2e-c7daa233c561-QNU_TMA_Ico-12.jpg', 'đi đầy đủ', 'QNU Job Fair 2022 (Ngày hội Việc làm QNU do Tập đoàn Công nghệ TMA phối hợp cùng Khoa CNTT tổ chức)', 'Quy Nhơn', '2022-04-15', '19:14:59', 'đi đầy đủ'),
(9, 6, 'https://kcntt.qnu.edu.vn/Temp/ArticleImage/6d5a7043-a09f-455f-80de-70f4e9b3d6c1-CONGty-23.jpg', 'link', 'CÔNG TY TNHH CHUYỂN ĐỔI SỐ TOÀN CẦU THÔNG BÁO TUYỂN DỤNG', 'Quy Nhơn', '2022-04-15', '19:21:45', 'lớp ktpm'),
(10, 6, 'https://kcntt.qnu.edu.vn/Temp/ArticleImage/97183a76-6560-4bd9-b44b-6421ba3fb5a3-image001-42.png', 'đi đầy đủ', 'Công ty TMA Solutions Bình Định thông báo tuyển sinh viên thực tập Khóa 10', 'TMA', '2022-04-15', '19:22:39', 'đi đầy đủ'),
(11, 6, 'https://kcntt.qnu.edu.vn/Temp/ArticleImage/cb2145aa-ca13-4da1-8222-be37ea27fb11-images-40.png', 'abc', 'CÔNG TY SYSTEMEXE VIỆT NAM_THÔNG BÁO CHƯƠNG TRÌNH FRESHER TRAINING PROGRAM 2022', 'Quy Nhơn', '2022-04-15', '23:36:00', 'Nhớ có mặt'),
(12, 6, 'https://kcntt.qnu.edu.vn/Resources/Images/SubDomain/kcntt/Pic_2022/Pic_5_2022/7fa675d2-7c62-43c3-8393-17b88cce21d9.jpg', 'https://kcntt.qnu.edu.vn/vi/co-hoi-viec-lam-sinh-vien/evncpc-thong-bao-tuyen-dung-lao-dong', 'EVNCPC thông báo tuyển dụng lao động', 'Quy Nhơn', '2022-05-31', '07:00:00', 'Nhớ có mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mahocphan`
--

CREATE TABLE `mahocphan` (
  `idhocphan` int(11) NOT NULL,
  `MaGV` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `idhocki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `mahocphan`
--

INSERT INTO `mahocphan` (`idhocphan`, `MaGV`, `MaMonHoc`, `idhocki`) VALUES
(7, 28, 13, 1),
(8, 28, 11, 1),
(9, 28, 18, 1),
(10, 28, 17, 1),
(11, 27, 16, 1),
(12, 28, 12, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `incoming_msg_id` int(11) NOT NULL,
  `outgoing_msg_id` int(11) NOT NULL,
  `msg` varchar(2048) NOT NULL,
  `ThoiGian` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `messages`
--

INSERT INTO `messages` (`id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`, `ThoiGian`) VALUES
(34, 20, 21, 'a', '2022-05-10 22:25:58'),
(35, 21, 20, 'gif', '2022-05-10 23:41:26'),
(36, 21, 20, 'cc', '2022-05-10 23:42:08'),
(37, 21, 20, 'cc', '2022-05-10 23:42:10'),
(38, 21, 20, 'c', '2022-05-10 23:42:12'),
(39, 21, 20, 'c', '2022-05-10 23:42:13'),
(40, 20, 21, 'sao', '2022-05-10 23:42:41'),
(41, 21, 21, 'sua', '2022-05-10 23:42:45'),
(42, 20, 21, 'clg', '2022-05-10 23:42:59'),
(43, 20, 21, 'gif c', '2022-05-10 23:45:12'),
(44, 20, 21, 'qwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'d', '2022-05-10 23:46:00'),
(45, 20, 21, 'qwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'dqwjkhdkasdhasldkadasdl;alsdasd;asdkasdkas;\'d', '2022-05-10 23:46:05'),
(46, 21, 20, 'met', '2022-05-10 23:46:45'),
(47, 20, 21, 'sao', '2022-05-11 13:27:16'),
(48, 21, 20, 'met he', '2022-05-11 13:27:23'),
(49, 20, 21, 'met he', '2022-05-11 13:27:34'),
(50, 21, 20, 'ò', '2022-05-11 13:27:48'),
(51, 20, 21, 'cc', '2022-05-11 13:27:57'),
(52, 20, 21, 'là sao', '2022-05-11 13:28:17'),
(53, 20, 21, 'hum', '2022-05-11 13:28:22'),
(54, 21, 20, 'ke', '2022-05-11 13:28:26'),
(55, 21, 20, 'cac', '2022-05-12 13:04:15'),
(56, 21, 20, 'sao đây', '2022-05-12 15:32:55'),
(57, 21, 20, 'cmm', '2022-05-12 15:33:03'),
(58, 21, 20, 'gì', '2022-05-12 15:46:11'),
(59, 20, 21, 'sao đó', '2022-05-16 00:08:04'),
(60, 20, 21, 'tui nè', '2022-05-16 00:08:06'),
(61, 20, 21, 'sao', '2022-05-28 15:48:39'),
(62, 20, 21, 'hi', '2022-05-30 13:50:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_12_131547_create_chat_forums_table', 2),
(6, '2022_05_30_105750_create_comments_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoccualop`
--

CREATE TABLE `monhoccualop` (
  `idmonhoccualop` int(11) NOT NULL,
  `MaLop` int(11) NOT NULL,
  `MaMonHoc` int(11) NOT NULL,
  `idhocki` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `monhoccualop`
--

INSERT INTO `monhoccualop` (`idmonhoccualop`, `MaLop`, `MaMonHoc`, `idhocki`) VALUES
(1, 1, 13, 1),
(2, 1, 14, 1),
(3, 1, 22, 1),
(4, 1, 25, 1),
(6, 1, 11, 1),
(7, 1, 17, 1),
(8, 1, 16, 1),
(9, 1, 12, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `idnamhoc` int(11) NOT NULL,
  `namhoc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`idnamhoc`, `namhoc`) VALUES
(1, '2018-2019'),
(2, '2019-2020');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `idposts` int(11) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `attached` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`idposts`, `MaSV`, `content`, `attached`, `time`) VALUES
(1, 21, 'bài này làm sao thế mấy atrai`', 'laravelfw.png', '2022-05-26 06:07:50'),
(2, 21, 'cách tính điểm là sao vậy ạ mn', NULL, '2022-05-26 06:16:26'),
(3, 21, 'bài này làm sao vậy mọi người', 'csdlqnusss.png', '2022-05-26 06:27:48'),
(4, 21, 'bài này làm sao vậy mọi người', 'laravelfw.png', '2022-05-26 06:27:48'),
(5, 21, 'bài này làm sao vậy mọi người', 'seletcheck.png', '2022-05-26 06:27:48'),
(6, 21, 'chỉ mình làm bài này với ạ', 'Bài thực hành số 09-Đoàn Minh Trí.docx', '2022-05-28 07:36:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen`
--

CREATE TABLE `quyen` (
  `idloaitk` int(11) NOT NULL,
  `matk` text NOT NULL,
  `tentk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `quyen`
--

INSERT INTO `quyen` (`idloaitk`, `matk`, `tentk`) VALUES
(1, '02021', 'ADMIN'),
(2, '12021', 'Giáo Viên'),
(3, '22021', 'Sinh Viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tailieu`
--

CREATE TABLE `tailieu` (
  `id` int(11) NOT NULL,
  `IdUser` int(11) NOT NULL,
  `idquyen` int(11) NOT NULL,
  `MoTa` varchar(255) NOT NULL,
  `File` varchar(255) NOT NULL,
  `ThoiGianFile` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tailieu`
--

INSERT INTO `tailieu` (`id`, `IdUser`, `idquyen`, `MoTa`, `File`, `ThoiGianFile`) VALUES
(36, 21, 3, 'Tai lieu ne cac ban', 'minhtri_codecommit_credentials.csv', '2022-05-25 13:59:05'),
(37, 21, 3, 'Tai lieu ne cac ban', 'dangnhap.txt', '2022-05-25 13:59:05'),
(38, 21, 3, 'Tai lieu ne cac ban', 'FILE_20220515_222048.zip', '2022-05-25 13:59:05'),
(40, 21, 3, 'xin chafo', 'apilib.sql', '2022-05-26 12:48:33'),
(41, 21, 3, 'xin chafo', 'dangnhap.txt', '2022-05-26 12:48:33'),
(42, 21, 3, 'xin chafo', 'FILE_20220515_222048.zip', '2022-05-26 12:48:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaogv`
--

CREATE TABLE `thongbaogv` (
  `idgv` int(11) NOT NULL,
  `MaAdmin` int(11) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `MaGV` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbaogv`
--

INSERT INTO `thongbaogv` (`idgv`, `MaAdmin`, `noidung`, `MaGV`, `ThoiGian`, `status`) VALUES
(2, 6, 'Anh được tăng lương', 28, '2022-04-15 03:13:28', 1),
(3, 6, 'Anh bị trừ lương', 28, '2022-04-15 10:14:22', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongbaosv`
--

CREATE TABLE `thongbaosv` (
  `id` int(11) NOT NULL,
  `MaAdmin` int(11) NOT NULL,
  `noidung` varchar(2048) NOT NULL,
  `MaSV` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thongbaosv`
--

INSERT INTO `thongbaosv` (`id`, `MaAdmin`, `noidung`, `MaSV`, `ThoiGian`, `status`) VALUES
(7, 6, 'em được nhận học bổng', 21, '2022-04-15 03:12:25', 1),
(8, 6, 'Em chưa đóng học phí', 21, '2022-04-27 15:28:46', 1),
(9, 6, 'Ngành KHMT trình độ thạc sĩ đào tạo những kiến thức nâng cao của ngành cho những người đã tốt nghiệp đại học các ngành thuộc nhóm ngành CNTT, Sư phạm Tin học, Điện tử - Viễn thông. Học viên học ngành này sẽ được trang bị những kiến thức cập nhật, hiện đại', 21, '2022-04-27 10:08:29', 1),
(10, 6, 'Ngành KHMT trình độ thạc sĩ đào tạo những kiến thức nâng cao của ngành cho những người đã tốt nghiệp đại học các ngành thuộc nhóm ngành CNTT, Sư phạm Tin học, Điện tử - Viễn thông. Học viên học ngành này sẽ được trang bị những kiến thức cập nhật, hiện đại của KHMT như: Trí tuệ nhân tạo, Học máy, Khoa học dữ liệu, … Phương pháp học là đào sâu, tư duy và trao đổi.\r\n\r\nThời gian đào tạo 2 năm, chia thành 4 học kỳ. Trong đó 3 học kỳ để học các học phần và 1 học kỳ làm luận văn tốt nghiệp.\r\n\r\nTrong quá trình học, học viên sẽ được nghe các bài giảng của các giáo sư đầu ngành được mời thỉnh giảng. Sau khi học học viên có thể giảng dạy tại các trường đại học, cao đẳng; làm việc tại các cơ quan nhà nước với vị trí quản lý CNTT; làm việc tại các doanh nghiệp phần mềm, mạng và hệ thống,… Hoặc phát huy tốt hơn nữa vai trò của mình tại nơi đang làm việc.', 20, '2022-04-27 10:10:15', 1),
(11, 6, 'Các em được nghỉ lễ 30-4, 1-5', 20, '2022-04-27 15:31:46', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thungay`
--

CREATE TABLE `thungay` (
  `idthu` int(11) NOT NULL,
  `thumay` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `thungay`
--

INSERT INTO `thungay` (`idthu`, `thumay`) VALUES
(1, 'Thứ 2'),
(2, 'Thứ 3'),
(3, 'Thứ 4'),
(4, 'Thứ 5'),
(5, 'Thứ 6'),
(6, 'Thứ 7'),
(7, 'Chủ nhật');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timeopendkhp`
--

CREATE TABLE `timeopendkhp` (
  `idtime` int(11) NOT NULL,
  `MaAdmin` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `timeopendkhp`
--

INSERT INTO `timeopendkhp` (`idtime`, `MaAdmin`, `start`, `end`) VALUES
(1, 6, '2022-04-27 00:00:00', '2022-06-15 00:00:00'),
(2, 6, '2022-08-27 00:00:00', '2022-08-28 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `boxchat`
--
ALTER TABLE `boxchat`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chat_forums`
--
ALTER TABLE `chat_forums`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpostt` (`idposts`);

--
-- Chỉ mục cho bảng `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  ADD PRIMARY KEY (`MaDK`),
  ADD KEY `sv` (`MaSV`),
  ADD KEY `mh` (`idhocphan`);

--
-- Chỉ mục cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`iddiemdanh`),
  ADD KEY `madkk` (`MaDK`);

--
-- Chỉ mục cho bảng `dsadmin`
--
ALTER TABLE `dsadmin`
  ADD PRIMARY KEY (`MaAdmin`),
  ADD KEY `idloaitkadmin` (`idloaitk`);

--
-- Chỉ mục cho bảng `dsdiem`
--
ALTER TABLE `dsdiem`
  ADD PRIMARY KEY (`iddiem`),
  ADD KEY `mamondiem` (`MaDK`);

--
-- Chỉ mục cho bảng `dsdiemtbhocki`
--
ALTER TABLE `dsdiemtbhocki`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masvdbhk` (`MaSV`),
  ADD KEY `hkdtb` (`idhocki`);

--
-- Chỉ mục cho bảng `dsdiemtichluysv`
--
ALTER TABLE `dsdiemtichluysv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `masvtld` (`MaSV`),
  ADD KEY `hockidtl` (`idhocki`);

--
-- Chỉ mục cho bảng `dsgiaovien`
--
ALTER TABLE `dsgiaovien`
  ADD PRIMARY KEY (`MaGV`),
  ADD KEY `quyengv` (`idloaitk`);

--
-- Chỉ mục cho bảng `dskhoa`
--
ALTER TABLE `dskhoa`
  ADD PRIMARY KEY (`MaKhoa`);

--
-- Chỉ mục cho bảng `dskhoahoc`
--
ALTER TABLE `dskhoahoc`
  ADD PRIMARY KEY (`MaKhoaHoc`);

--
-- Chỉ mục cho bảng `dslop`
--
ALTER TABLE `dslop`
  ADD PRIMARY KEY (`MaLop`),
  ADD KEY `makhoa` (`MaKhoa`),
  ADD KEY `makhoahoc` (`MaKhoaHoc`),
  ADD KEY `mahedt` (`MaHeDT`);

--
-- Chỉ mục cho bảng `dsmonhoc`
--
ALTER TABLE `dsmonhoc`
  ADD PRIMARY KEY (`MaMonHoc`),
  ADD KEY `stc` (`SoTinChi`);

--
-- Chỉ mục cho bảng `dsphonghoc`
--
ALTER TABLE `dsphonghoc`
  ADD PRIMARY KEY (`idphong`);

--
-- Chỉ mục cho bảng `dssinhvien`
--
ALTER TABLE `dssinhvien`
  ADD PRIMARY KEY (`MaSV`),
  ADD KEY `malop` (`MaLop`),
  ADD KEY `quyensv` (`idloaitk`);

--
-- Chỉ mục cho bảng `dstiethoc`
--
ALTER TABLE `dstiethoc`
  ADD PRIMARY KEY (`idtiethoc`);

--
-- Chỉ mục cho bảng `hedaotao`
--
ALTER TABLE `hedaotao`
  ADD PRIMARY KEY (`MaHeDT`);

--
-- Chỉ mục cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD PRIMARY KEY (`idhocki`),
  ADD KEY `nam` (`idnamhoc`);

--
-- Chỉ mục cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  ADD PRIMARY KEY (`SoTinChi`);

--
-- Chỉ mục cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD PRIMARY KEY (`idlichhoc`),
  ADD KEY `idthu` (`idthu`),
  ADD KEY `idphong` (`idphong`),
  ADD KEY `id` (`idtiethoc`),
  ADD KEY `idhocphan` (`idhocphan`);

--
-- Chỉ mục cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nguoiupdate` (`MaAdmin`);

--
-- Chỉ mục cho bảng `mahocphan`
--
ALTER TABLE `mahocphan`
  ADD PRIMARY KEY (`idhocphan`),
  ADD KEY `magvv` (`MaGV`),
  ADD KEY `monhoc` (`MaMonHoc`),
  ADD KEY `idhocki` (`idhocki`);

--
-- Chỉ mục cho bảng `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mess` (`outgoing_msg_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monhoccualop`
--
ALTER TABLE `monhoccualop`
  ADD PRIMARY KEY (`idmonhoccualop`),
  ADD KEY `mamhh` (`MaMonHoc`),
  ADD KEY `malopp` (`MaLop`),
  ADD KEY `a` (`idhocki`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`idnamhoc`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idposts`),
  ADD KEY `masvpost` (`MaSV`);

--
-- Chỉ mục cho bảng `quyen`
--
ALTER TABLE `quyen`
  ADD PRIMARY KEY (`idloaitk`);

--
-- Chỉ mục cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idquyenn` (`idquyen`);

--
-- Chỉ mục cho bảng `thongbaogv`
--
ALTER TABLE `thongbaogv`
  ADD PRIMARY KEY (`idgv`),
  ADD KEY `maadmingv` (`MaAdmin`),
  ADD KEY `maggv` (`MaGV`);

--
-- Chỉ mục cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maadm` (`MaAdmin`),
  ADD KEY `massv` (`MaSV`);

--
-- Chỉ mục cho bảng `thungay`
--
ALTER TABLE `thungay`
  ADD PRIMARY KEY (`idthu`);

--
-- Chỉ mục cho bảng `timeopendkhp`
--
ALTER TABLE `timeopendkhp`
  ADD PRIMARY KEY (`idtime`),
  ADD KEY `ad` (`MaAdmin`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `boxchat`
--
ALTER TABLE `boxchat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT cho bảng `chat_forums`
--
ALTER TABLE `chat_forums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  MODIFY `MaDK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  MODIFY `iddiemdanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `dsadmin`
--
ALTER TABLE `dsadmin`
  MODIFY `MaAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dsdiem`
--
ALTER TABLE `dsdiem`
  MODIFY `iddiem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `dsdiemtbhocki`
--
ALTER TABLE `dsdiemtbhocki`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dsdiemtichluysv`
--
ALTER TABLE `dsdiemtichluysv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dsgiaovien`
--
ALTER TABLE `dsgiaovien`
  MODIFY `MaGV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT cho bảng `dskhoa`
--
ALTER TABLE `dskhoa`
  MODIFY `MaKhoa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `dskhoahoc`
--
ALTER TABLE `dskhoahoc`
  MODIFY `MaKhoaHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dslop`
--
ALTER TABLE `dslop`
  MODIFY `MaLop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `dsmonhoc`
--
ALTER TABLE `dsmonhoc`
  MODIFY `MaMonHoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `dsphonghoc`
--
ALTER TABLE `dsphonghoc`
  MODIFY `idphong` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `dssinhvien`
--
ALTER TABLE `dssinhvien`
  MODIFY `MaSV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `dstiethoc`
--
ALTER TABLE `dstiethoc`
  MODIFY `idtiethoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hedaotao`
--
ALTER TABLE `hedaotao`
  MODIFY `MaHeDT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hocki`
--
ALTER TABLE `hocki`
  MODIFY `idhocki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `hocphi`
--
ALTER TABLE `hocphi`
  MODIFY `SoTinChi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  MODIFY `idlichhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `mahocphan`
--
ALTER TABLE `mahocphan`
  MODIFY `idhocphan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `monhoccualop`
--
ALTER TABLE `monhoccualop`
  MODIFY `idmonhoccualop` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `idnamhoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `idposts` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `quyen`
--
ALTER TABLE `quyen`
  MODIFY `idloaitk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT cho bảng `thongbaogv`
--
ALTER TABLE `thongbaogv`
  MODIFY `idgv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `thungay`
--
ALTER TABLE `thungay`
  MODIFY `idthu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `timeopendkhp`
--
ALTER TABLE `timeopendkhp`
  MODIFY `idtime` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `idpostt` FOREIGN KEY (`idposts`) REFERENCES `posts` (`idposts`);

--
-- Các ràng buộc cho bảng `dangkymonhoc`
--
ALTER TABLE `dangkymonhoc`
  ADD CONSTRAINT `dangkymonhoc_ibfk_1` FOREIGN KEY (`idhocphan`) REFERENCES `mahocphan` (`idhocphan`),
  ADD CONSTRAINT `sv` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `madkk` FOREIGN KEY (`MaDK`) REFERENCES `dangkymonhoc` (`MaDK`);

--
-- Các ràng buộc cho bảng `dsadmin`
--
ALTER TABLE `dsadmin`
  ADD CONSTRAINT `idloaitkadmin` FOREIGN KEY (`idloaitk`) REFERENCES `quyen` (`idloaitk`);

--
-- Các ràng buộc cho bảng `dsdiem`
--
ALTER TABLE `dsdiem`
  ADD CONSTRAINT `madk` FOREIGN KEY (`MaDK`) REFERENCES `dangkymonhoc` (`MaDK`);

--
-- Các ràng buộc cho bảng `dsdiemtbhocki`
--
ALTER TABLE `dsdiemtbhocki`
  ADD CONSTRAINT `hkdtb` FOREIGN KEY (`idhocki`) REFERENCES `hocki` (`idhocki`),
  ADD CONSTRAINT `masvdbhk` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `dsdiemtichluysv`
--
ALTER TABLE `dsdiemtichluysv`
  ADD CONSTRAINT `hockidtl` FOREIGN KEY (`idhocki`) REFERENCES `hocki` (`idhocki`),
  ADD CONSTRAINT `masvtld` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `dsgiaovien`
--
ALTER TABLE `dsgiaovien`
  ADD CONSTRAINT `quyengv` FOREIGN KEY (`idloaitk`) REFERENCES `quyen` (`idloaitk`);

--
-- Các ràng buộc cho bảng `dslop`
--
ALTER TABLE `dslop`
  ADD CONSTRAINT `mahedt` FOREIGN KEY (`MaHeDT`) REFERENCES `hedaotao` (`MaHeDT`),
  ADD CONSTRAINT `makhoa` FOREIGN KEY (`MaKhoa`) REFERENCES `dskhoa` (`MaKhoa`),
  ADD CONSTRAINT `makhoahoc` FOREIGN KEY (`MaKhoaHoc`) REFERENCES `dskhoahoc` (`MaKhoaHoc`);

--
-- Các ràng buộc cho bảng `dsmonhoc`
--
ALTER TABLE `dsmonhoc`
  ADD CONSTRAINT `stc` FOREIGN KEY (`SoTinChi`) REFERENCES `hocphi` (`SoTinChi`);

--
-- Các ràng buộc cho bảng `dssinhvien`
--
ALTER TABLE `dssinhvien`
  ADD CONSTRAINT `malop` FOREIGN KEY (`MaLop`) REFERENCES `dslop` (`MaLop`),
  ADD CONSTRAINT `quyensv` FOREIGN KEY (`idloaitk`) REFERENCES `quyen` (`idloaitk`);

--
-- Các ràng buộc cho bảng `hocki`
--
ALTER TABLE `hocki`
  ADD CONSTRAINT `nam` FOREIGN KEY (`idnamhoc`) REFERENCES `namhoc` (`idnamhoc`);

--
-- Các ràng buộc cho bảng `lichhoc`
--
ALTER TABLE `lichhoc`
  ADD CONSTRAINT `id` FOREIGN KEY (`idtiethoc`) REFERENCES `dstiethoc` (`idtiethoc`),
  ADD CONSTRAINT `idhocphan` FOREIGN KEY (`idhocphan`) REFERENCES `mahocphan` (`idhocphan`),
  ADD CONSTRAINT `idphong` FOREIGN KEY (`idphong`) REFERENCES `dsphonghoc` (`idphong`),
  ADD CONSTRAINT `idthu` FOREIGN KEY (`idthu`) REFERENCES `thungay` (`idthu`);

--
-- Các ràng buộc cho bảng `lichlamviec`
--
ALTER TABLE `lichlamviec`
  ADD CONSTRAINT `nguoiupdate` FOREIGN KEY (`MaAdmin`) REFERENCES `dsadmin` (`MaAdmin`);

--
-- Các ràng buộc cho bảng `mahocphan`
--
ALTER TABLE `mahocphan`
  ADD CONSTRAINT `idhocki` FOREIGN KEY (`idhocki`) REFERENCES `hocki` (`idhocki`),
  ADD CONSTRAINT `magvv` FOREIGN KEY (`MaGV`) REFERENCES `dsgiaovien` (`MaGV`),
  ADD CONSTRAINT `monhoc` FOREIGN KEY (`MaMonHoc`) REFERENCES `dsmonhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `mess` FOREIGN KEY (`outgoing_msg_id`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `monhoccualop`
--
ALTER TABLE `monhoccualop`
  ADD CONSTRAINT `a` FOREIGN KEY (`idhocki`) REFERENCES `hocki` (`idhocki`),
  ADD CONSTRAINT `malopp` FOREIGN KEY (`MaLop`) REFERENCES `dslop` (`MaLop`),
  ADD CONSTRAINT `mamhh` FOREIGN KEY (`MaMonHoc`) REFERENCES `dsmonhoc` (`MaMonHoc`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `masvpost` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `tailieu`
--
ALTER TABLE `tailieu`
  ADD CONSTRAINT `idquyenn` FOREIGN KEY (`idquyen`) REFERENCES `quyen` (`idloaitk`);

--
-- Các ràng buộc cho bảng `thongbaogv`
--
ALTER TABLE `thongbaogv`
  ADD CONSTRAINT `maadmingv` FOREIGN KEY (`MaAdmin`) REFERENCES `dsadmin` (`MaAdmin`),
  ADD CONSTRAINT `maggv` FOREIGN KEY (`MaGV`) REFERENCES `dsgiaovien` (`MaGV`);

--
-- Các ràng buộc cho bảng `thongbaosv`
--
ALTER TABLE `thongbaosv`
  ADD CONSTRAINT `maadm` FOREIGN KEY (`MaAdmin`) REFERENCES `dsadmin` (`MaAdmin`),
  ADD CONSTRAINT `massv` FOREIGN KEY (`MaSV`) REFERENCES `dssinhvien` (`MaSV`);

--
-- Các ràng buộc cho bảng `timeopendkhp`
--
ALTER TABLE `timeopendkhp`
  ADD CONSTRAINT `ad` FOREIGN KEY (`MaAdmin`) REFERENCES `dsadmin` (`MaAdmin`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
