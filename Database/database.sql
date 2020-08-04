-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2019 lúc 07:42 AM
-- Phiên bản máy phục vụ: 10.1.40-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eng_online_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `username` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `PASS` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `AVATAR` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`username`, `PASS`, `role_id`, `create_date`, `AVATAR`) VALUES
('admin', 'admin', 'admin', '2019-11-19 00:00:00', 'avt.png'),
('std_ngocmn', '12345678', 'student', '2019-11-04 00:00:00', '51076298_2989441557748001_39945613919387648_n.png'),
('std_ngocmn1', '1235756', 'teacher', '2019-11-17 00:00:00', '1378546-lavender-flower-wallpaper-1920x1200-large-resolution.jpg'),
('std_ngocmn2', '123456', 'student', '2019-11-10 00:00:00', '53435126_3089506194408203_4628828048949510144_n.png'),
('std_ngocmn3', '0123456', 'student', '2019-11-10 00:00:00', 'Capture.PNG'),
('std_ngocmn4', '123456', 'student', '2019-11-16 00:00:00', '52823409_2366051810123882_2530041294202339328_n.jpg'),
('std_ngocmn5', '07548', 'student', '2019-10-27 00:00:00', '1378546-lavender-flower-wallpaper-1920x1200-large-resolution.jpg'),
('std_ngocmn6', '1', 'student', '2019-10-27 00:00:00', '1378546-lavender-flower-wallpaper-1920x1200-large-resolution.jpg'),
('teacher_ngocmn', '123456', 'teacher', '2019-11-03 00:00:00', '1378546-lavender-flower-wallpaper-1920x1200-large-resolution.jpg'),
('teacher_ngocmn1', '123456', 'teacher', '2019-11-20 00:00:00', 'avt.png'),
('teacher_ngocmn3', '123456', 'teacher', '2019-11-17 00:00:00', 'icon-teacher.jpg'),
('teacher_ngocmn4', '123456', 'teacher', '2019-11-17 00:00:00', 'icon3.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `CLASS_ID` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `CLASS_NAME` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TEACHER` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COURSE_ID` int(11) DEFAULT NULL,
  `INFO` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BEGIN` date DEFAULT NULL,
  `END` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`CLASS_ID`, `CLASS_NAME`, `TEACHER`, `COURSE_ID`, `INFO`, `BEGIN`, `END`) VALUES
('ENG01', 'ENGLISH 01', 'teacher_ngocmn3', 4, 'phantan_1.txt', '2019-10-10', '2019-11-10'),
('ENG02', 'ENGLISH 02', 'teacher_ngocmn4', 3, 'PhanTan_KT1.txt', '0000-00-00', NULL),
('ENG03', 'ENGLISH 03', 'teacher_ngocmn3', 3, 'PhanTan_KT1.txt', '0000-00-00', NULL),
('ENG04', 'ENGLISH 04', 'teacher_ngocmn4', 4, 'phantan_1.txt', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `COURSE_ID` int(11) NOT NULL,
  `COURSE_NAME` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FEE` int(11) DEFAULT NULL,
  `DESCRIPTION` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`COURSE_ID`, `COURSE_NAME`, `FEE`, `DESCRIPTION`) VALUES
(3, 'FOR CHILDREN', 40, 'phantan_1.txt'),
(4, 'FOR HIGH SCHOOL', 73, 'phantan_1.txt'),
(5, 'FOR CHILD', 55, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `QUESTION_ID` int(11) NOT NULL,
  `TEST_ID` int(11) NOT NULL,
  `CONTENT` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OPTION1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OPTION2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `OPTION3` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ANSWER` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`QUESTION_ID`, `TEST_ID`, `CONTENT`, `OPTION1`, `OPTION2`, `OPTION3`, `ANSWER`) VALUES
(25, 14, 'He failed in the election just because he ___________ his opponent.', 'overestimated', 'underestimated', 'understated', 2),
(26, 14, 'They ________because it is a national holiday.', 'donâ€™t work', 'wonâ€™t work', 'arenâ€™t working', 3),
(27, 14, 'Sheâ€™s finished the course, ____________?', 'isnâ€™t she', 'hasnâ€™t she', 'under control', 2),
(28, 14, 'â€œWould you like a beer?â€ â€œ Not while Iâ€™m ___________â€', 'in the act', 'in order', 'on duty', 3),
(29, 14, 'Some friends of mine are really fashion-conscious, while __________ are quite simple.', 'some other', 'some others', 'anothers', 2),
(30, 14, 'According to some historians, If Napoleon had not invaded Russia, he _________ the rest of the world.', 'had conquered', 'would conquer', 'would have conquered', 3),
(49, 20, 'He failed in the election just because he ___________ his opponent.', 'overestimated', 'underestimated', 'understated', 2),
(50, 20, 'They ________because it is a national holiday.', 'donâ€™t work', 'wonâ€™t work', 'arenâ€™t working', 3),
(51, 20, 'Sheâ€™s finished the course, ____________?', 'isnâ€™t she', 'hasnâ€™t she', 'under control', 2),
(52, 20, 'â€œWould you like a beer?â€ â€œ Not while Iâ€™m ___________â€', 'in the act', 'in order', 'on duty', 3),
(53, 20, 'Some friends of mine are really fashion-conscious, while __________ are quite simple.', 'some other', 'some others', 'anothers', 2),
(54, 20, 'According to some historians, If Napoleon had not invaded Russia, he _________ the rest of the world.', 'had conquered', 'would conquer', 'would have conquered', 3),
(61, 13, 'He failed in the election just because he ___________ his opponent.', 'overestimated', 'underestimated', 'understated', 2),
(62, 13, 'They ________because it is a national holiday.', 'donâ€™t work', 'wonâ€™t work', 'arenâ€™t working', 3),
(63, 13, 'Sheâ€™s finished the course, ____________?', 'isnâ€™t she', 'hasnâ€™t she', 'under control', 2),
(64, 13, 'â€œWould you like a beer?â€ â€œ Not while Iâ€™m ___________â€', 'in the act', 'in order', 'on duty', 3),
(65, 13, 'Some friends of mine are really fashion-conscious, while __________ are quite simple.', 'some other', 'some others', 'anothers', 2),
(66, 13, 'According to some historians, If Napoleon had not invaded Russia, he _________ the rest of the world.', 'had conquered', 'would conquer', 'would have conquered', 3),
(67, 13, 'According to some historians', 'some other', 'some others', 'anothers', 1),
(68, 21, 'He failed in the election just because he ___________ his opponent.', 'overestimated', 'underestimated', 'understated', 2),
(69, 21, 'They ________because it is a national holiday.', 'donâ€™t work', 'wonâ€™t work', 'arenâ€™t working', 3),
(70, 21, 'Sheâ€™s finished the course, ____________?', 'isnâ€™t she', 'hasnâ€™t she', 'under control', 2),
(71, 21, 'â€œWould you like a beer?â€ â€œ Not while Iâ€™m ___________â€', 'in the act', 'in order', 'on duty', 3),
(72, 21, 'Some friends of mine are really fashion-conscious, while __________ are quite simple.', 'some other', 'some others', 'anothers', 2),
(73, 21, 'According to some historians, If Napoleon had not invaded Russia, he _________ the rest of the world.', 'had conquered', 'would conquer', 'would have conquered', 3),
(74, 21, 'According to some historians', 'some other', 'some others', 'anothers', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `result`
--

CREATE TABLE `result` (
  `USERNAME` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `TEST_ID` int(11) NOT NULL,
  `TIMES` int(11) NOT NULL,
  `POINT` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `result`
--

INSERT INTO `result` (`USERNAME`, `TEST_ID`, `TIMES`, `POINT`) VALUES
('std_ngocmn', 14, 1, 5),
('std_ngocmn', 14, 2, 10),
('std_ngocmn', 21, 1, 5.71429),
('std_ngocmn', 21, 2, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `ROLE_ID` char(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`ROLE_ID`) VALUES
('admin'),
('student'),
('teacher');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `USERNAME` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `FULLNAME` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DOB` date DEFAULT NULL,
  `SEX` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDRESS` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHONE` char(12) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`USERNAME`, `FULLNAME`, `DOB`, `SEX`, `EMAIL`, `ADDRESS`, `PHONE`) VALUES
('std_ngocmn', 'Mai NhÆ° Ngá»c', '2019-10-27', 'femal', 'ngoc@gmail.com', 'HCM City', '0137635'),
('std_ngocmn2', 'Mai NhÆ° Ngá»c 2', '2019-10-27', 'male', 'ngoc2@gmail.com', 'HCM City', '0762425'),
('std_ngocmn3', 'Mai NhÆ° Ngá»c 3', '1999-07-07', 'femal', 'ngoc3@gmail.com', 'HCM City', '082346359'),
('std_ngocmn4', 'MNN', '2019-10-27', 'femal', 'ngoc4@gmail.com', 'HCM City', '0762924646'),
('std_ngocmn5', 'Mai NhÆ° Ngá»c 5', '2019-05-28', 'male', 'ngoc5@gmail.com', 'HCM', '0765438587'),
('std_ngocmn6', 'Mai NhÆ° Ngá»c', '2019-10-27', 'male', 'ngoc6@gmail.com', 'HCM', '1786345683');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `study`
--

CREATE TABLE `study` (
  `USERNAME` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `CLASS_ID` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `RESULT` float DEFAULT NULL,
  `RANK` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `study`
--

INSERT INTO `study` (`USERNAME`, `CLASS_ID`, `RESULT`, `RANK`) VALUES
('std_ngocmn', 'ENG01', 7.67857, 'GOOD');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `USERNAME` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `FULLNAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `SEX` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADDRESS` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PHONE` char(12) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CERTIFICATE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`USERNAME`, `FULLNAME`, `DOB`, `SEX`, `EMAIL`, `ADDRESS`, `PHONE`, `CERTIFICATE`) VALUES
('teacher_ngocmn', 'Mai Nhu Ngoc ', '2019-11-28', 'female', 'ngoc3@gmail.com', 'HCM', '0773819097', 'B'),
('teacher_ngocmn3', 'NGOC 3', '2019-11-18', 'female', 'ngoc33@gmail.com', 'HCM', '087642554', 'B'),
('teacher_ngocmn4', 'NGOC 4', '2019-11-18', 'female', 't_ngoc4@gmail.com', 'HCM', '087365962', 'A');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test`
--

CREATE TABLE `test` (
  `TEST_ID` int(11) NOT NULL,
  `TEST_NAME` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMG` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CLASS_ID` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TIMELIMMIT` int(11) DEFAULT NULL,
  `USERNAME` char(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `test`
--

INSERT INTO `test` (`TEST_ID`, `TEST_NAME`, `IMG`, `CLASS_ID`, `TYPE`, `TIMELIMMIT`, `USERNAME`) VALUES
(13, 'Vocabulary', '10.png', 'ENG01', 'free', 5, 'admin'),
(14, 'Vocabulary 2', '20.png', 'ENG01', 'todo', 20, 'admin'),
(20, 'Vocabulary 3', 'icon-class.jpg', 'ENG03', 'todo', 4, 'admin'),
(21, 'Vocabulary 3', '19.png', 'ENG01', 'todo', 5, 'admin');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD KEY `account_role_FK` (`role_id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`CLASS_ID`),
  ADD KEY `CLASS_TEACHER_FK` (`TEACHER`),
  ADD KEY `CLASS_COURSE_FK` (`COURSE_ID`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`COURSE_ID`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`QUESTION_ID`,`TEST_ID`),
  ADD KEY `q_t_FK` (`TEST_ID`);

--
-- Chỉ mục cho bảng `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`USERNAME`,`TEST_ID`,`TIMES`),
  ADD KEY `KQ_BT_FK` (`TEST_ID`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ROLE_ID`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Chỉ mục cho bảng `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`USERNAME`,`CLASS_ID`),
  ADD KEY `STUDY_CLASS_FK` (`CLASS_ID`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`USERNAME`);

--
-- Chỉ mục cho bảng `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`TEST_ID`),
  ADD KEY `TEST_CLASS_FK` (`CLASS_ID`),
  ADD KEY `TEST_ACCOUNT_FK` (`USERNAME`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `COURSE_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `QUESTION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `test`
--
ALTER TABLE `test`
  MODIFY `TEST_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_role_FK` FOREIGN KEY (`role_id`) REFERENCES `role` (`ROLE_ID`);

--
-- Các ràng buộc cho bảng `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `CLASS_COURSE_FK` FOREIGN KEY (`COURSE_ID`) REFERENCES `course` (`COURSE_ID`),
  ADD CONSTRAINT `CLASS_TEACHER_FK` FOREIGN KEY (`TEACHER`) REFERENCES `teacher` (`USERNAME`);

--
-- Các ràng buộc cho bảng `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `q_t_FK` FOREIGN KEY (`TEST_ID`) REFERENCES `test` (`TEST_ID`);

--
-- Các ràng buộc cho bảng `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `KQ_BT_FK` FOREIGN KEY (`TEST_ID`) REFERENCES `test` (`TEST_ID`),
  ADD CONSTRAINT `KQ_TK_FK` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`username`);

--
-- Các ràng buộc cho bảng `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `STU_ACC_FK` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`username`);

--
-- Các ràng buộc cho bảng `study`
--
ALTER TABLE `study`
  ADD CONSTRAINT `STUDY_CLASS_FK` FOREIGN KEY (`CLASS_ID`) REFERENCES `class` (`CLASS_ID`),
  ADD CONSTRAINT `STUDY_STUDENT_FK` FOREIGN KEY (`USERNAME`) REFERENCES `student` (`USERNAME`);

--
-- Các ràng buộc cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `TEACHER_ACC_FK` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`username`);

--
-- Các ràng buộc cho bảng `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `TEST_ACCOUNT_FK` FOREIGN KEY (`USERNAME`) REFERENCES `account` (`username`),
  ADD CONSTRAINT `TEST_CLASS_FK` FOREIGN KEY (`CLASS_ID`) REFERENCES `class` (`CLASS_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
