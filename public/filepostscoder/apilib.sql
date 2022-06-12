-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 19, 2022 lúc 03:23 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `apilib`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book`
--

CREATE TABLE `book` (
  `Id` int(11) NOT NULL,
  `NameBook` text NOT NULL,
  `DescribeBook` text NOT NULL,
  `StatusBook` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book`
--

INSERT INTO `book` (`Id`, `NameBook`, `DescribeBook`, `StatusBook`) VALUES
(1, 'OnePiece', 'Truyện tranh', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderbook`
--

CREATE TABLE `orderbook` (
  `Id` int(11) NOT NULL,
  `Book_Ids` int(11) NOT NULL,
  `User_Ids` int(11) NOT NULL,
  `TimeBook` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orderbook`
--

INSERT INTO `orderbook` (`Id`, `Book_Ids`, `User_Ids`, `TimeBook`) VALUES
(1, 1, 10, '2022-05-19 17:57:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `FullName` text NOT NULL,
  `UserName` text NOT NULL,
  `Pass` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`Id`, `FullName`, `UserName`, `Pass`) VALUES
(8, 'Nghia1x', 'nghia', '123'),
(9, '', 'tri', '1'),
(10, 'Van Teo', 'teo', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `orderbook`
--
ALTER TABLE `orderbook`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `PK_Order_User` (`User_Ids`),
  ADD KEY `PK_Order_Book` (`Book_Ids`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `book`
--
ALTER TABLE `book`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `orderbook`
--
ALTER TABLE `orderbook`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderbook`
--
ALTER TABLE `orderbook`
  ADD CONSTRAINT `PK_Order_Book` FOREIGN KEY (`Book_Ids`) REFERENCES `book` (`Id`),
  ADD CONSTRAINT `PK_Order_User` FOREIGN KEY (`User_Ids`) REFERENCES `user` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
