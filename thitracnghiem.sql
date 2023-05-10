-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 10, 2023 lúc 04:24 PM
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
-- Cơ sở dữ liệu: `thitracnghiem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `Type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`username`, `password`, `name`, `Type`) VALUES
('admin1', '123', 'Phạm Minh Quang', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baithi`
--

CREATE TABLE `baithi` (
  `username` varchar(50) NOT NULL,
  `id` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `ordinal_exam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cauhoi`
--

CREATE TABLE `cauhoi` (
  `id` int(20) NOT NULL,
  `question` varchar(300) NOT NULL,
  `option_a` varchar(300) NOT NULL,
  `option_b` varchar(300) NOT NULL,
  `option_c` varchar(300) NOT NULL,
  `option_d` varchar(300) NOT NULL,
  `answer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cauhoi`
--

INSERT INTO `cauhoi` (`id`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `answer`) VALUES
(1, 'When my farther was youn', 'A.can', 'B.could', 'C.will', 'D.should', 'B'),
(2, 'He.......have committed the crime because he was with me that day.', 'A.mustn\'t', 'B.shouldn\'t', 'C.won\'t', 'D.can\'t', 'D'),
(3, 'Since we have to be there by 830, we.......take a taxi', 'A.must', 'B.may', 'C.ought', 'D.are able to', 'C'),
(4, 'It ..........rain this evening. Why don\'t you take an umbrella ? ', 'A. could', 'B. must', 'C. might', 'D. can', 'A'),
(5, '............. you help me with the homework ?', 'A. May', 'B. Shall', 'C. Should', 'D. Will', 'D'),
(6, 'She hasn\'t eaten annything since yesterday. She............ be really hungry.', 'A. might', 'B. will', 'C. must', 'D. can', 'C'),
(7, 'I put my key on the table , but now it\'s gone . Someone .............. have taken it.', 'A. may', 'B. can', 'C. should', 'D. would', 'C'),
(8, 'Daisy is reading her English test because she has a test tomorrow.She.............studying.', 'A. will', 'B. should', 'C. must', 'D. can', 'B'),
(9, 'We......... put the fish in the fridge before it spoils.', 'A. had to', 'B. may', 'C. can', 'D. should', 'C'),
(10, 'Mr Borwn is very rich. He.............. work hard for a living.', 'A. mustn\'t', 'B. shouldn\'t', 'C. can\'t', 'D. needn\'t', 'D'),
(11, 'Tom has just got a new job.He............. be very pleased', 'A. might', 'B. must', 'C. should', 'D. Will', 'B'),
(12, 'Tom painted his room black.It looks dark and dreary .He........... have chosen another color.', 'A. should', 'B. must', 'C. could', 'D. may', 'A'),
(13, '..........I carry this bag for you ?', 'A. Should', 'B. May', 'C. Will', 'D. Shall', 'D'),
(15, 'When my farther was ...... work he garden for long hours?', 'A.can', 'B.could', 'C.will', 'D.should', 'B');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `username` varchar(100) NOT NULL,
  `password` varchar(125) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`username`, `password`, `email`, `phone`) VALUES
('hiep123', '123', 'hiep123@gmail.com', 344444444),
('pmq123', '123', 'quang12@gmail.com', 346991600);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Chỉ mục cho bảng `baithi`
--
ALTER TABLE `baithi`
  ADD PRIMARY KEY (`username`,`id`);

--
-- Chỉ mục cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cauhoi`
--
ALTER TABLE `cauhoi`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
