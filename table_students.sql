-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2024 lúc 02:29 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qlsv_nguyendinhducthinh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `table_students`
--

CREATE TABLE `table_students` (
  `id` int(50) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `dob` date NOT NULL,
  `gender` int(10) NOT NULL,
  `hometown` varchar(250) NOT NULL,
  `level` int(10) NOT NULL,
  `group_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `table_students`
--

INSERT INTO `table_students` (`id`, `fullname`, `dob`, `gender`, `hometown`, `level`, `group_id`) VALUES
(10, 'Nguyễn Gia Bảo ', '2005-04-17', 1, 'Bắc Giang', 1, 6),
(11, 'Ngô Hoàng Hiệp', '2005-12-27', 1, 'Hà Nội', 2, 6),
(13, 'Hoàng Minh Quyết ', '2005-05-10', 1, 'Hà Nội', 1, 6),
(14, 'Vũ Đức Thắng', '2005-12-20', 1, 'Thái Bình', 0, 6),
(15, 'Trần Trường Giang', '2005-11-24', 1, 'Phú Thọ', 1, 6),
(16, 'Bùi Viết Đạt', '2005-12-27', 1, 'Hà Nội', 3, 6),
(17, 'Nguyễn Đình Đức Thịnh', '2005-03-09', 1, 'Thanh Hóa', 2, 6);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `table_students`
--
ALTER TABLE `table_students`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `table_students`
--
ALTER TABLE `table_students`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
