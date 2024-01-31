-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 09:47 AM
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
(36, 13, 'CS8762', 3, 17, 8, '2024-01-26', 'friday', 1),
(37, 13, 'CS8762', 3, 22, 8, '2024-01-26', 'friday', 1),
(38, 13, 'CS7724', 1, 17, 8, '2024-01-26', 'friday', 1),
(39, 13, 'CS7724', 1, 22, 8, '2024-01-26', 'friday', 1),
(40, 13, 'CS7724', 2, 17, 8, '2024-01-26', 'friday', 1),
(41, 13, 'CS7724', 2, 22, 8, '2024-01-26', 'friday', 1),
(42, 13, 'CS7724', 5, 17, 8, '2024-01-26', 'friday', 1),
(43, 13, 'CS7724', 5, 22, 8, '2024-01-26', 'friday', 1),
(44, 13, 'CS2891', 4, 17, 8, '2024-01-26', 'friday', 1),
(45, 13, 'CS2891', 4, 22, 8, '2024-01-26', 'friday', 1),
(46, 13, 'CS8762', 4, 17, 8, '2024-01-25', 'thursday', 1),
(47, 13, 'CS8762', 4, 22, 8, '2024-01-25', 'thursday', 1),
(48, 13, 'CS7724', 2, 17, 8, '2024-01-25', 'thursday', 1),
(49, 13, 'CS7724', 2, 22, 8, '2024-01-25', 'thursday', 1),
(50, 13, 'CS2891', 3, 17, 8, '2024-01-25', 'thursday', 1),
(51, 13, 'CS2891', 3, 22, 8, '2024-01-25', 'thursday', 0),
(52, 13, 'CS2764', 1, 17, 8, '2024-01-25', 'thursday', 0),
(53, 13, 'CS2764', 1, 22, 8, '2024-01-25', 'thursday', 0),
(54, 13, 'CS2764', 5, 17, 8, '2024-01-25', 'thursday', 0),
(55, 13, 'CS2764', 5, 22, 8, '2024-01-25', 'thursday', 1),
(56, 13, 'CS8762', 2, 17, 8, '2024-01-24', 'wednesday', 0),
(57, 13, 'CS8762', 2, 22, 8, '2024-01-24', 'wednesday', 1),
(58, 13, 'CS9968', 3, 17, 8, '2024-01-24', 'wednesday', 0),
(59, 13, 'CS9968', 3, 22, 8, '2024-01-24', 'wednesday', 1),
(60, 13, 'CS9968', 4, 17, 8, '2024-01-24', 'wednesday', 1),
(61, 13, 'CS9968', 4, 22, 8, '2024-01-24', 'wednesday', 1),
(62, 13, 'CS2891', 1, 17, 8, '2024-01-24', 'wednesday', 1),
(63, 13, 'CS2891', 1, 22, 8, '2024-01-24', 'wednesday', 1),
(64, 13, 'CS2764', 5, 17, 8, '2024-01-24', 'wednesday', 1),
(65, 13, 'CS2764', 5, 22, 8, '2024-01-24', 'wednesday', 1),
(66, 13, 'CS9968', 2, 17, 8, '2024-01-23', 'tuesday', 1),
(67, 13, 'CS9968', 2, 22, 8, '2024-01-23', 'tuesday', 1),
(68, 13, 'CS9968', 4, 17, 8, '2024-01-23', 'tuesday', 1),
(69, 13, 'CS9968', 4, 22, 8, '2024-01-23', 'tuesday', 1),
(70, 13, 'CS7724', 1, 17, 8, '2024-01-23', 'tuesday', 0),
(71, 13, 'CS7724', 1, 22, 8, '2024-01-23', 'tuesday', 0),
(72, 13, 'CS2891', 3, 17, 8, '2024-01-23', 'tuesday', 1),
(73, 13, 'CS2891', 3, 22, 8, '2024-01-23', 'tuesday', 1),
(74, 13, 'CS2891', 5, 22, 8, '2024-01-23', 'tuesday', 0),
(75, 13, 'CS2891', 5, 17, 8, '2024-01-23', 'tuesday', 1),
(76, 13, 'CS8762', 5, 17, 8, '2024-01-22', 'monday', 1),
(77, 13, 'CS8762', 5, 22, 8, '2024-01-22', 'monday', 1),
(78, 13, 'CS9968', 1, 17, 8, '2024-01-22', 'monday', 1),
(79, 13, 'CS9968', 1, 22, 8, '2024-01-22', 'monday', 1),
(80, 13, 'CS2891', 2, 17, 8, '2024-01-22', 'monday', 0),
(81, 13, 'CS2891', 2, 22, 8, '2024-01-22', 'monday', 1),
(82, 13, 'CS2891', 4, 17, 8, '2024-01-22', 'monday', 0),
(83, 13, 'CS2891', 4, 22, 8, '2024-01-22', 'monday', 0),
(84, 13, 'CS2764', 3, 17, 8, '2024-01-22', 'monday', 1),
(85, 13, 'CS2764', 3, 22, 8, '2024-01-22', 'monday', 0);

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
(7, 2020, 2024, 3, 'EEE', 'BE'),
(8, 2020, 2024, 1, 'MECH', 'BE'),
(9, 2021, 2025, 1, 'ECE', 'BE'),
(12, 12312, 12321, 3, 'ECE', 'MBA'),
(13, 2024, 2028, 1, 'CSE', 'BE'),
(14, 2024, 2028, 2, 'EEE', 'BE');

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
(6, 'cta@1', '$2y$10$WZxQYEUe800HmaqL5okcK.k1rpuLOlyQE/YGjx/Unsg.EZG94y1ji', '2334999', 'admin', '', '', 0, 'Abraham', 'Thomas', '', '2023-12-10 16:13:42', 0, 0),
(7, 'cta@2', '$2y$10$x85S7zGqgNFtcMQ.VuA75OtUwQ.YaweIa.ErEb0LXXR0xC0jJiufy', '9442723543', 'admin', '', '', 0, 'Abraham', 'Timothy', '', '2023-12-07 13:07:00', 0, 0),
(8, 'muthu@1', '$2y$10$oEIXB6BH5eOug9vtsT9PJ.DsDhsx8T87qo.ZqvLZbdKv8EnIoucJu', '81209381', 'faculty', '', '', 0, 'Raman', 'Muthu', '', '2024-01-24 07:38:47', 0, 0),
(9, 'hello@1', '$2y$10$XVA/8ZRttEU2vVqkkcT9Kux6rVya0RCQH2G7sagXLL1RTA1xPN8hq', '12312', 'admin', '', '', 0, 'Kong', 'King', '', '2023-12-07 13:38:40', 0, 0),
(10, 'asa@1', '$2y$10$JScnPNB5R5/4aT.PtYy13uHVYTKwOLQV5Y.o.T4ARqbMylxGAL7Dy', '0981230', 'faculty', '', '', 0, 'asda', 'asd', '', '2023-12-07 14:00:56', 0, 0),
(17, 'thesai@1', '$2y$10$Jn/13Md3Yw/EAoJdx3SmYen0YHiZgKAzXb5opr7ssHSQdkOt7YL/m', '901280381', 'student', 'BE', 'CSE', 13, 'Jebas', 'Thesai', '', '2024-01-30 09:20:19', 1, 1),
(18, 'asds@1', '$2y$10$48a5KG0b5GGWrZmeg014o.tVZ31TWCzJMWNvIIUhPdLNrdEkoO0Iq', '342342', 'faculty', '', '', 0, 'asdas', 'fgdfr', '', '2023-12-09 12:37:47', 0, 0),
(20, 'mani@1', '$2y$10$dq8bGQbUPdT6oel933iUHOch4OF/uoCz2iKKrtkVhovO/vtIlJuXW', '9442723653', 'faculty', '', '', 0, 'Sakaran', 'Manickam ', '', '2024-01-15 13:19:19', 0, 0),
(21, 'malik@1', '$2y$10$9nJ5S5W.P1B0lA1IVr8bPui14d55qvulcfDmHjHyeMICHOv2yagKa', '091823298', 'faculty', '', '', 0, 'Shyam', 'Malick', '', '2024-01-15 13:24:07', 0, 0),
(22, 'svan@1', '$2y$10$U5X9fE46tzKbgeJ4ITm/.eVV2mjq.4mHqxicTz1YhI1MPlB5rpxkS', '8798123782', 'student', 'BE', 'EEE', 13, 'Svan', 'Sudhan ', '', '2024-01-30 10:00:10', 1, 1);

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
(9, 17, '2024-01-30', 'semester/sports', '3600/500'),
(10, 22, '2024-01-30', 'semester/sports', '3600/500');

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
(6, 'CS2764', 'Python Programming', 8, 13),
(9, 'EC1233', 'Electronics and Engineering', 8, 9),
(10, 'EC9283', 'Sensor and Light', 8, 9),
(11, 'EC9837', 'Wireless Communication', 8, 9),
(12, 'EC2398', 'Microprocessors and architecture', 8, 9),
(13, 'EC2039', 'Transistors and switches', 8, 9);

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
(150, 13, 'friday', '5', 'CS7724'),
(151, 9, 'monday', '1', 'EC1233'),
(152, 9, 'monday', '2', 'EC9837'),
(153, 9, 'monday', '3', 'EC2398'),
(154, 9, 'monday', '4', 'EC2398'),
(155, 9, 'monday', '5', 'EC2039'),
(156, 9, 'tuesday', '1', 'EC9283'),
(157, 9, 'tuesday', '2', 'EC2039'),
(158, 9, 'tuesday', '3', 'EC2398'),
(159, 9, 'tuesday', '4', 'EC2039'),
(160, 9, 'tuesday', '5', 'EC9837'),
(161, 9, 'wednesday', '1', 'EC9283'),
(162, 9, 'wednesday', '2', 'EC1233'),
(163, 9, 'wednesday', '3', 'EC2039'),
(164, 9, 'wednesday', '4', 'EC2398'),
(165, 9, 'wednesday', '5', 'EC2039'),
(166, 9, 'thursday', '1', 'EC2039'),
(167, 9, 'thursday', '2', 'EC2398'),
(168, 9, 'thursday', '3', 'EC9837'),
(169, 9, 'thursday', '4', 'EC1233'),
(170, 9, 'thursday', '5', 'EC9283'),
(171, 9, 'friday', '1', 'EC9837'),
(172, 9, 'friday', '2', 'EC9837'),
(173, 9, 'friday', '3', 'EC1233'),
(174, 9, 'friday', '4', 'EC2039'),
(175, 9, 'friday', '5', 'EC2398');

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
-- Indexes for table `erp_fees`
--
ALTER TABLE `erp_fees`
  ADD PRIMARY KEY (`feesId`);

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
  MODIFY `admissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `erp_attendance`
--
ALTER TABLE `erp_attendance`
  MODIFY `attendanceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `erp_class`
--
ALTER TABLE `erp_class`
  MODIFY `classId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `erp_course`
--
ALTER TABLE `erp_course`
  MODIFY `courseId` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `erp_fees`
--
ALTER TABLE `erp_fees`
  MODIFY `feesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `erp_login`
--
ALTER TABLE `erp_login`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `erp_permission`
--
ALTER TABLE `erp_permission`
  MODIFY `permissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `erp_receipt`
--
ALTER TABLE `erp_receipt`
  MODIFY `receiptId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
