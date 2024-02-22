-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 06:04 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `erp_admission`
--

CREATE TABLE `erp_admission` (
  `admissionId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `erp_attendance`
--

CREATE TABLE `erp_attendance` (
  `attendanceId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `subjectCode` varchar(200) NOT NULL,
  `period` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `staffId` int(11) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_attendance`
--

INSERT INTO `erp_attendance` (`attendanceId`, `classId`, `subjectCode`, `period`, `studentId`, `staffId`, `date`, `day`, `status`) VALUES
(136, 13, 'CS2891', 4, 23, 8, '2024-02-13', 'monday', 0),
(137, 13, 'CS2891', 4, 25, 8, '2024-02-13', 'monday', 1),
(138, 13, 'CS2764', 3, 22, 8, '2024-02-13', 'monday', 0),
(139, 13, 'CS2764', 3, 23, 8, '2024-02-13', 'monday', 1),
(140, 13, 'CS2764', 3, 25, 8, '2024-02-13', 'monday', 1),
(141, 13, 'CS9968', 2, 22, 8, '2024-02-13', 'tuesday', 1),
(142, 13, 'CS8762', 5, 22, 8, '2024-02-12', 'monday', 1),
(143, 13, 'CS8762', 5, 23, 8, '2024-02-12', 'monday', 1),
(144, 13, 'CS8762', 5, 25, 8, '2024-02-12', 'monday', 1),
(145, 13, 'CS9968', 1, 22, 8, '2024-02-12', 'monday', 1),
(146, 13, 'CS9968', 1, 23, 8, '2024-02-12', 'monday', 1),
(147, 13, 'CS9968', 1, 25, 8, '2024-02-12', 'monday', 0),
(148, 13, 'CS2891', 2, 22, 8, '2024-02-12', 'monday', 0),
(149, 13, 'CS2891', 2, 23, 8, '2024-02-12', 'monday', 0),
(150, 13, 'CS2891', 2, 25, 8, '2024-02-12', 'monday', 1),
(151, 13, 'CS2891', 4, 22, 8, '2024-02-12', 'monday', 1),
(152, 13, 'CS2891', 4, 23, 8, '2024-02-12', 'monday', 1),
(153, 13, 'CS2891', 4, 25, 8, '2024-02-12', 'monday', 1),
(154, 13, 'CS2764', 3, 22, 8, '2024-02-12', 'monday', 1),
(155, 13, 'CS2764', 3, 23, 8, '2024-02-12', 'monday', 0),
(156, 13, 'CS2764', 3, 25, 8, '2024-02-12', 'monday', 1),
(157, 13, 'CS9968', 2, 23, 8, '2024-02-13', 'tuesday', 1),
(158, 13, 'CS9968', 2, 25, 8, '2024-02-13', 'tuesday', 0),
(159, 13, 'CS9968', 4, 22, 8, '2024-02-13', 'tuesday', 0),
(160, 13, 'CS9968', 4, 23, 8, '2024-02-13', 'tuesday', 1),
(161, 13, 'CS9968', 4, 25, 8, '2024-02-13', 'tuesday', 1),
(162, 13, 'CS7724', 1, 23, 8, '2024-02-13', 'tuesday', 1),
(163, 13, 'CS7724', 1, 22, 8, '2024-02-13', 'tuesday', 1),
(164, 13, 'CS7724', 1, 25, 8, '2024-02-13', 'tuesday', 1),
(165, 13, 'CS2891', 3, 22, 8, '2024-02-13', 'tuesday', 1),
(166, 13, 'CS2891', 3, 23, 8, '2024-02-13', 'tuesday', 1),
(167, 13, 'CS2891', 3, 25, 8, '2024-02-13', 'tuesday', 1),
(168, 13, 'CS2891', 5, 22, 8, '2024-02-13', 'tuesday', 1),
(169, 13, 'CS2891', 5, 23, 8, '2024-02-13', 'tuesday', 0),
(170, 13, 'CS2891', 5, 25, 8, '2024-02-13', 'tuesday', 1),
(171, 13, 'CS8762', 2, 22, 8, '2024-02-14', 'wednesday', 1),
(172, 13, 'CS8762', 2, 23, 8, '2024-02-14', 'wednesday', 1),
(173, 13, 'CS8762', 2, 25, 8, '2024-02-14', 'wednesday', 1),
(174, 13, 'CS9968', 3, 22, 8, '2024-02-14', 'wednesday', 1),
(175, 13, 'CS9968', 3, 23, 8, '2024-02-14', 'wednesday', 1),
(176, 13, 'CS9968', 3, 25, 8, '2024-02-14', 'wednesday', 1),
(177, 13, 'CS9968', 4, 22, 8, '2024-02-14', 'wednesday', 1),
(178, 13, 'CS9968', 4, 23, 8, '2024-02-14', 'wednesday', 1),
(179, 13, 'CS9968', 4, 25, 8, '2024-02-14', 'wednesday', 1),
(180, 13, 'CS2891', 1, 22, 8, '2024-02-14', 'wednesday', 1),
(181, 13, 'CS2891', 1, 23, 8, '2024-02-14', 'wednesday', 1),
(182, 13, 'CS2891', 1, 25, 8, '2024-02-14', 'wednesday', 0),
(183, 13, 'CS2764', 5, 22, 8, '2024-02-14', 'wednesday', 0),
(184, 13, 'CS2764', 5, 23, 8, '2024-02-14', 'wednesday', 0),
(185, 13, 'CS2764', 5, 25, 8, '2024-02-14', 'wednesday', 0),
(186, 13, 'CS8762', 4, 22, 8, '2024-02-15', 'thursday', 0),
(187, 13, 'CS8762', 4, 23, 8, '2024-02-15', 'thursday', 1),
(188, 13, 'CS8762', 4, 25, 8, '2024-02-15', 'thursday', 1),
(189, 13, 'CS7724', 2, 22, 8, '2024-02-15', 'thursday', 1),
(190, 13, 'CS7724', 2, 23, 8, '2024-02-15', 'thursday', 1),
(191, 13, 'CS7724', 2, 25, 8, '2024-02-15', 'thursday', 1),
(192, 13, 'CS2891', 3, 23, 8, '2024-02-15', 'thursday', 0),
(193, 13, 'CS2891', 3, 22, 8, '2024-02-15', 'thursday', 1),
(194, 13, 'CS2891', 3, 25, 8, '2024-02-15', 'thursday', 1),
(195, 13, 'CS2764', 1, 22, 8, '2024-02-15', 'thursday', 1),
(196, 13, 'CS2764', 1, 23, 8, '2024-02-15', 'thursday', 1),
(197, 13, 'CS2764', 1, 25, 8, '2024-02-15', 'thursday', 1),
(198, 13, 'CS2764', 5, 22, 8, '2024-02-15', 'thursday', 1),
(199, 13, 'CS2764', 5, 23, 8, '2024-02-15', 'thursday', 1),
(200, 13, 'CS2764', 5, 25, 8, '2024-02-15', 'thursday', 1),
(201, 13, 'CS8762', 3, 22, 8, '2024-02-16', 'friday', 1),
(202, 13, 'CS8762', 3, 25, 8, '2024-02-16', 'friday', 0),
(203, 13, 'CS8762', 3, 23, 8, '2024-02-16', 'friday', 0),
(204, 13, 'CS7724', 1, 22, 8, '2024-02-16', 'friday', 1),
(205, 13, 'CS7724', 1, 25, 8, '2024-02-16', 'friday', 1),
(206, 13, 'CS7724', 1, 23, 8, '2024-02-16', 'friday', 1);

-- --------------------------------------------------------

--
-- Table structure for table `erp_class`
--

CREATE TABLE `erp_class` (
  `classId` int(11) NOT NULL,
  `startingYear` int(11) NOT NULL,
  `endingYear` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_class`
--

INSERT INTO `erp_class` (`classId`, `startingYear`, `endingYear`, `semester`, `department`, `course`) VALUES
(13, 2024, 2028, 1, 'CSE', 'BE'),
(18, 2024, 2028, 1, 'ECE', 'BE');

-- --------------------------------------------------------

--
-- Table structure for table `erp_course`
--

CREATE TABLE `erp_course` (
  `courseId` int(100) NOT NULL,
  `courseName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_course`
--

INSERT INTO `erp_course` (`courseId`, `courseName`) VALUES
(2, 'BE'),
(3, 'ME'),
(4, 'MBA'),
(5, 'AIDS'),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `erp_exam`
--

CREATE TABLE `erp_exam` (
  `examId` int(11) NOT NULL,
  `examName` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_exam`
--

INSERT INTO `erp_exam` (`examId`, `examName`) VALUES
(5, 'IAT1'),
(6, 'IAT2'),
(7, 'IAT3'),
(8, 'University Exam');

-- --------------------------------------------------------

--
-- Table structure for table `erp_fees`
--

CREATE TABLE `erp_fees` (
  `feesId` int(11) NOT NULL,
  `feeName` varchar(200) NOT NULL,
  `classId` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_fees`
--

INSERT INTO `erp_fees` (`feesId`, `feeName`, `classId`, `amount`) VALUES
(6, 'sports', 6, 250),
(7, 'semester', 13, 3600),
(8, 'sports', 13, 500),
(9, 'semester', 14, 3700),
(10, 'sports', 14, 780);

-- --------------------------------------------------------

--
-- Table structure for table `erp_grade`
--

CREATE TABLE `erp_grade` (
  `gradeId` int(11) NOT NULL,
  `subjectCode` varchar(200) NOT NULL,
  `subjectName` varchar(200) NOT NULL,
  `studentId` int(11) NOT NULL,
  `studentName` varchar(200) NOT NULL,
  `semester` int(11) NOT NULL,
  `examName` varchar(200) NOT NULL,
  `mark` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_grade`
--

INSERT INTO `erp_grade` (`gradeId`, `subjectCode`, `subjectName`, `studentId`, `studentName`, `semester`, `examName`, `mark`, `date`) VALUES
(58, 'CS8762', 'Computer and Fundamentals', 17, 'Thesai Jebas', 1, 'IAT1', 57, '2024-02-07'),
(59, 'CS8762', 'Computer and Fundamentals', 22, 'Sudhan  Svan', 1, 'IAT1', 76, '2024-02-07'),
(60, 'CS8762', 'Computer and Fundamentals', 23, 'Gowtham  S', 1, 'IAT1', 87, '2024-02-07'),
(64, 'CS9968', 'Compiler Design', 17, 'Thesai Jebas', 1, 'IAT2', 78, '2024-02-07'),
(65, 'CS9968', 'Compiler Design', 22, 'Sudhan  Svan', 1, 'IAT2', 98, '2024-02-07'),
(66, 'CS9968', 'Compiler Design', 23, 'Gowtham  S', 1, 'IAT2', 75, '2024-02-07'),
(67, 'CS7724', 'Data Structures and Algorithms', 17, 'Thesai Jebas', 1, 'IAT1', 78, '2024-02-07'),
(68, 'CS7724', 'Data Structures and Algorithms', 22, 'Sudhan  Svan', 1, 'IAT1', 78, '2024-02-07'),
(69, 'CS7724', 'Data Structures and Algorithms', 23, 'Gowtham  S', 1, 'IAT1', 99, '2024-02-07'),
(70, 'CS2891', 'Problem Solving', 17, 'Thesai Jebas', 1, 'IAT1', 67, '2024-02-07'),
(71, 'CS2891', 'Problem Solving', 22, 'Sudhan  Svan', 1, 'IAT1', 67, '2024-02-07'),
(72, 'CS2891', 'Problem Solving', 23, 'Gowtham  S', 1, 'IAT1', 56, '2024-02-07'),
(73, 'CS2764', 'Python Programming', 17, 'Thesai Jebas', 1, 'IAT1', 78, '2024-02-07'),
(74, 'CS2764', 'Python Programming', 22, 'Sudhan  Svan', 1, 'IAT1', 76, '2024-02-07'),
(75, 'CS2764', 'Python Programming', 23, 'Gowtham  S', 1, 'IAT1', 98, '2024-02-07'),
(76, 'CS9968', 'Compiler Design', 17, 'Thesai Jebas', 1, 'IAT1', 73, '2024-02-07'),
(77, 'CS9968', 'Compiler Design', 22, 'Sudhan  Svan', 1, 'IAT1', 86, '2024-02-07'),
(78, 'CS9968', 'Compiler Design', 23, 'Gowtham  S', 1, 'IAT1', 78, '2024-02-07'),
(79, 'CS8762', 'Computer and Fundamentals', 17, 'Thesai Jebas', 1, 'IAT2', 67, '2024-02-07'),
(80, 'CS8762', 'Computer and Fundamentals', 22, 'Sudhan  Svan', 1, 'IAT2', 98, '2024-02-07'),
(81, 'CS8762', 'Computer and Fundamentals', 23, 'Gowtham  S', 1, 'IAT2', 56, '2024-02-07'),
(82, 'CS7724', 'Data Structures and Algorithms', 17, 'Thesai Jebas', 1, 'IAT2', 49, '2024-02-07'),
(83, 'CS7724', 'Data Structures and Algorithms', 22, 'Sudhan  Svan', 1, 'IAT2', 95, '2024-02-07'),
(84, 'CS7724', 'Data Structures and Algorithms', 23, 'Gowtham  S', 1, 'IAT2', 94, '2024-02-07'),
(85, 'CS2891', 'Problem Solving', 17, 'Thesai Jebas', 1, 'IAT2', 92, '2024-02-07'),
(86, 'CS2891', 'Problem Solving', 22, 'Sudhan  Svan', 1, 'IAT2', 28, '2024-02-07'),
(87, 'CS2891', 'Problem Solving', 23, 'Gowtham  S', 1, 'IAT2', 95, '2024-02-07'),
(88, 'CS2764', 'Python Programming', 17, 'Thesai Jebas', 1, 'IAT2', 75, '2024-02-07'),
(89, 'CS2764', 'Python Programming', 22, 'Sudhan  Svan', 1, 'IAT2', 37, '2024-02-07'),
(90, 'CS2764', 'Python Programming', 23, 'Gowtham  S', 1, 'IAT2', 96, '2024-02-07'),
(91, 'CS8762', 'Computer and Fundamentals', 22, 'Sudhan  Svan', 1, 'IAT3', 78, '2024-02-17'),
(92, 'CS8762', 'Computer and Fundamentals', 23, 'Gowtham  S', 1, 'IAT3', 65, '2024-02-17'),
(93, 'CS8762', 'Computer and Fundamentals', 25, 'Timothy Abraham', 1, 'IAT3', 89, '2024-02-17');

-- --------------------------------------------------------

--
-- Table structure for table `erp_login`
--

CREATE TABLE `erp_login` (
  `user_id` int(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `log_pwd` varchar(100) NOT NULL COMMENT 'login password',
  `phone` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `course` varchar(200) NOT NULL,
  `department` varchar(200) NOT NULL,
  `classId` int(11) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `yearOfAdmission` varchar(100) NOT NULL,
  `log_session` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'login session(timestamp)',
  `active` int(5) NOT NULL DEFAULT 1 COMMENT 'active status\r\n(active -1,inactive - 0)',
  `paymentStatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_login`
--

INSERT INTO `erp_login` (`user_id`, `userName`, `log_pwd`, `phone`, `role`, `course`, `department`, `classId`, `l_name`, `f_name`, `yearOfAdmission`, `log_session`, `active`, `paymentStatus`) VALUES
(6, 'cta@gmail.com', '$2y$10$WZxQYEUe800HmaqL5okcK.k1rpuLOlyQE/YGjx/Unsg.EZG94y1ji', '2334999', 'admin', '', '', 0, 'Abraham', 'Thomas', '', '2024-02-21 17:33:17', 0, 0),
(7, 'cta@2', '$2y$10$x85S7zGqgNFtcMQ.VuA75OtUwQ.YaweIa.ErEb0LXXR0xC0jJiufy', '9442723543', 'admin', '', '', 0, 'Abraham', 'Timothy', '', '2023-12-07 13:07:00', 0, 0),
(8, 'muthu@gmail.com', '$2y$10$oEIXB6BH5eOug9vtsT9PJ.DsDhsx8T87qo.ZqvLZbdKv8EnIoucJu', '81209381', 'faculty', '', 'CSE', 0, 'Raman', 'Muthu', '', '2024-02-21 17:30:10', 0, 0),
(9, 'hello@1', '$2y$10$XVA/8ZRttEU2vVqkkcT9Kux6rVya0RCQH2G7sagXLL1RTA1xPN8hq', '12312', 'admin', '', '', 0, 'Kong', 'King', '', '2023-12-07 13:38:40', 0, 0),
(10, 'asa@1', '$2y$10$JScnPNB5R5/4aT.PtYy13uHVYTKwOLQV5Y.o.T4ARqbMylxGAL7Dy', '0981230', 'faculty', '', '', 0, 'asda', 'asd', '', '2023-12-07 14:00:56', 0, 0),
(17, 'thesai@gmail.com', '$2y$10$Jn/13Md3Yw/EAoJdx3SmYen0YHiZgKAzXb5opr7ssHSQdkOt7YL/m', '901280381', 'student', '', '', 0, 'Jebas', 'Thesai', '', '2024-02-21 17:03:04', 1, 0),
(18, 'asds@1', '$2y$10$48a5KG0b5GGWrZmeg014o.tVZ31TWCzJMWNvIIUhPdLNrdEkoO0Iq', '342342', 'faculty', '', '', 0, 'asdas', 'fgdfr', '', '2023-12-09 12:37:47', 0, 0),
(20, 'mani@1', '$2y$10$dq8bGQbUPdT6oel933iUHOch4OF/uoCz2iKKrtkVhovO/vtIlJuXW', '9442723653', 'faculty', '', '', 0, 'Sakaran', 'Manickam ', '', '2024-01-15 13:19:19', 0, 0),
(21, 'malik@1', '$2y$10$9nJ5S5W.P1B0lA1IVr8bPui14d55qvulcfDmHjHyeMICHOv2yagKa', '091823298', 'faculty', '', '', 0, 'Shyam', 'Malick', '', '2024-01-15 13:24:07', 0, 0),
(22, 'svan@1', '$2y$10$U5X9fE46tzKbgeJ4ITm/.eVV2mjq.4mHqxicTz1YhI1MPlB5rpxkS', '8798123782', 'student', 'BE', 'EEE', 13, 'Svan', 'Sudhan ', '', '2024-01-30 10:00:10', 1, 1),
(23, 'gowtham@1', '$2y$10$VnZDi/wo5Xfdi/p9Br/K1ukgaafdk8KPYz1LRosspSM2riw3ovoHi', '43543532', 'student', 'BE', 'CSE', 13, 'S', 'Gowtham ', '', '2024-02-06 11:20:07', 1, 1),
(25, 'timo@1', '$2y$10$ZhjpNs784PPF45fzLTOmku.EDh.2KuXHRHo2IoCQrwfd8FRQ3aeja', '123412312', 'student', 'BE', 'CSE', 13, 'Abraham', 'Timothy', '', '2024-02-10 06:40:58', 1, 0),
(27, 'manickam@1', '$2y$10$KZpN0sXubQka3jhUvGgfM.V/Vxiy.h6U4ObOtgajPRnHU5tepc3sC', '34234323', 'admin', '', '', 0, 'Sakarai', 'Manickam', '', '2024-02-10 06:17:56', 0, 0),
(28, 'richard@1', '$2y$10$JjpNAkSwxRXGFKydLTZbXepv.D5HgnZmK05iummNfnjqEFcSjBx0y', '9347343', 'faculty', '', 'CSE', 0, 'Daniel', 'Richard', '', '2024-02-10 06:56:13', 0, 0),
(33, '.cta@gmail.com', '$2y$10$l0g7aEX9pnX4mHPdRylCq.o2ebrQa/EgXltiedJCTDUoenwDyNgoC', '09385341273', 'student', 'BE', 'CSE', 13, 'Abraham', 'Thomas', '', '2024-02-17 07:43:30', 1, 1),
(36, 'jesus@gmail.com', '$2y$10$SOYI4R5o9B.4mskbDqxiRewe8qiIPNVMLKiMAmJgG4wLC54eEcVG2', '12312', 'admin', '', '', 0, 'Christ', 'Jes', '', '2024-02-21 14:07:16', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `erp_permission`
--

CREATE TABLE `erp_permission` (
  `permissionId` int(11) NOT NULL,
  `permissionName` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_permission`
--

INSERT INTO `erp_permission` (`permissionId`, `permissionName`) VALUES
(15, 'tttt'),
(17, 'asdastt');

-- --------------------------------------------------------

--
-- Table structure for table `erp_receipt`
--

CREATE TABLE `erp_receipt` (
  `receiptId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `date` date NOT NULL,
  `feeName` varchar(500) NOT NULL,
  `amount` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_receipt`
--

INSERT INTO `erp_receipt` (`receiptId`, `studentId`, `date`, `feeName`, `amount`) VALUES
(10, 22, '2024-01-30', 'semester/sports', '3600/500'),
(11, 23, '2024-02-06', 'semester/sports', '3600/500'),
(13, 33, '2024-02-17', 'semester/sports', '3600/500');

-- --------------------------------------------------------

--
-- Table structure for table `erp_role`
--

CREATE TABLE `erp_role` (
  `roleId` bigint(20) NOT NULL COMMENT 'role id',
  `roleName` varchar(30) NOT NULL COMMENT 'role name',
  `access` varchar(500) NOT NULL COMMENT 'role access',
  `roleDescription` varchar(20) NOT NULL COMMENT 'role description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_role`
--

INSERT INTO `erp_role` (`roleId`, `roleName`, `access`, `roleDescription`) VALUES
(7, 'admin', 'tttt', ''),
(8, 'student', 'tttt', ''),
(9, 'faculty', 'tttt', '');

-- --------------------------------------------------------

--
-- Table structure for table `erp_subject`
--

CREATE TABLE `erp_subject` (
  `subjectId` int(100) NOT NULL,
  `subjectCode` varchar(200) NOT NULL,
  `subjectName` varchar(200) NOT NULL,
  `staffId` int(11) NOT NULL,
  `classId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_subject`
--

INSERT INTO `erp_subject` (`subjectId`, `subjectCode`, `subjectName`, `staffId`, `classId`) VALUES
(2, 'CS8762', 'Computer and Fundamentals', 8, 13),
(3, 'CS9968', 'Compiler Design', 8, 13),
(4, 'CS7724', 'Data Structures and Algorithms', 8, 13),
(5, 'CS2891', 'Problem Solving', 8, 13),
(6, 'CS2764', 'Python Programming', 8, 13);

-- --------------------------------------------------------

--
-- Table structure for table `erp_timetable`
--

CREATE TABLE `erp_timetable` (
  `timeTableId` int(11) NOT NULL,
  `classId` int(11) NOT NULL,
  `day` varchar(200) NOT NULL,
  `period` varchar(200) NOT NULL,
  `subjectCode` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_timetable`
--

INSERT INTO `erp_timetable` (`timeTableId`, `classId`, `day`, `period`, `subjectCode`) VALUES
(126, 13, 'monday', '1', 'CS9968'),
(127, 13, 'monday', '2', 'CS2891'),
(128, 13, 'monday', '3', 'CS2764'),
(129, 13, 'monday', '4', 'CS2891'),
(130, 13, 'monday', '5', 'CS8762'),
(131, 13, 'tuesday', '1', 'CS7724'),
(132, 13, 'tuesday', '2', 'CS9968'),
(133, 13, 'tuesday', '3', 'CS2891'),
(134, 13, 'tuesday', '4', 'CS9968'),
(135, 13, 'tuesday', '5', 'CS2891'),
(136, 13, 'wednesday', '1', 'CS2891'),
(137, 13, 'wednesday', '2', 'CS8762'),
(138, 13, 'wednesday', '3', 'CS9968'),
(139, 13, 'wednesday', '4', 'CS9968'),
(140, 13, 'wednesday', '5', 'CS2764'),
(141, 13, 'thursday', '1', 'CS2764'),
(142, 13, 'thursday', '2', 'CS7724'),
(143, 13, 'thursday', '3', 'CS2891'),
(144, 13, 'thursday', '4', 'CS8762'),
(145, 13, 'thursday', '5', 'CS2764'),
(146, 13, 'friday', '1', 'CS7724'),
(147, 13, 'friday', '2', 'CS7724'),
(148, 13, 'friday', '3', 'CS8762'),
(149, 13, 'friday', '4', 'CS2891'),
(150, 13, 'friday', '5', 'CS7724');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `erp_admission`
--
ALTER TABLE `erp_admission`
  ADD PRIMARY KEY (`admissionId`);

--
-- Indexes for table `erp_attendance`
--
ALTER TABLE `erp_attendance`
  ADD PRIMARY KEY (`attendanceId`);

--
-- Indexes for table `erp_class`
--
ALTER TABLE `erp_class`
  ADD PRIMARY KEY (`classId`);

--
-- Indexes for table `erp_course`
--
ALTER TABLE `erp_course`
  ADD PRIMARY KEY (`courseId`);

--
-- Indexes for table `erp_exam`
--
ALTER TABLE `erp_exam`
  ADD PRIMARY KEY (`examId`);

--
-- Indexes for table `erp_fees`
--
ALTER TABLE `erp_fees`
  ADD PRIMARY KEY (`feesId`);

--
-- Indexes for table `erp_grade`
--
ALTER TABLE `erp_grade`
  ADD PRIMARY KEY (`gradeId`);

--
-- Indexes for table `erp_login`
--
ALTER TABLE `erp_login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `log_id` (`userName`);

--
-- Indexes for table `erp_permission`
--
ALTER TABLE `erp_permission`
  ADD PRIMARY KEY (`permissionId`);

--
-- Indexes for table `erp_receipt`
--
ALTER TABLE `erp_receipt`
  ADD PRIMARY KEY (`receiptId`);

--
-- Indexes for table `erp_role`
--
ALTER TABLE `erp_role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `erp_subject`
--
ALTER TABLE `erp_subject`
  ADD PRIMARY KEY (`subjectId`);

--
-- Indexes for table `erp_timetable`
--
ALTER TABLE `erp_timetable`
  ADD PRIMARY KEY (`timeTableId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `erp_admission`
--
ALTER TABLE `erp_admission`
  MODIFY `admissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `erp_attendance`
--
ALTER TABLE `erp_attendance`
  MODIFY `attendanceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `erp_class`
--
ALTER TABLE `erp_class`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `erp_course`
--
ALTER TABLE `erp_course`
  MODIFY `courseId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `erp_exam`
--
ALTER TABLE `erp_exam`
  MODIFY `examId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `erp_fees`
--
ALTER TABLE `erp_fees`
  MODIFY `feesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `erp_grade`
--
ALTER TABLE `erp_grade`
  MODIFY `gradeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `erp_login`
--
ALTER TABLE `erp_login`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `erp_permission`
--
ALTER TABLE `erp_permission`
  MODIFY `permissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `erp_receipt`
--
ALTER TABLE `erp_receipt`
  MODIFY `receiptId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `erp_role`
--
ALTER TABLE `erp_role`
  MODIFY `roleId` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `erp_subject`
--
ALTER TABLE `erp_subject`
  MODIFY `subjectId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `erp_timetable`
--
ALTER TABLE `erp_timetable`
  MODIFY `timeTableId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=176;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
