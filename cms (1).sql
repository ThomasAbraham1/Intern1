-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2024 at 02:42 PM
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
-- Table structure for table `erp_login`
--

CREATE TABLE `erp_login` (
  `user_id` int(20) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `log_pwd` varchar(100) NOT NULL COMMENT 'login password',
  `phone` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `l_name` varchar(200) NOT NULL,
  `f_name` varchar(200) NOT NULL,
  `course` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `yearOfAdmission` varchar(100) NOT NULL,
  `log_session` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'login session(timestamp)',
  `active` int(5) NOT NULL DEFAULT 1 COMMENT 'active status\r\n(active -1,inactive - 0)',
  `log_secqn` varchar(50) NOT NULL COMMENT 'security question',
  `log_ans` varchar(50) NOT NULL COMMENT 'answer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `erp_login`
--

INSERT INTO `erp_login` (`user_id`, `userName`, `log_pwd`, `phone`, `role`, `l_name`, `f_name`, `course`, `department`, `yearOfAdmission`, `log_session`, `active`, `log_secqn`, `log_ans`) VALUES
(6, 'cta@1', '$2y$10$WZxQYEUe800HmaqL5okcK.k1rpuLOlyQE/YGjx/Unsg.EZG94y1ji', '2334999', 'admin', 'Abraham', 'Thomas', '', '', '', '2023-12-10 16:13:42', 0, '', ''),
(7, 'cta@2', '$2y$10$x85S7zGqgNFtcMQ.VuA75OtUwQ.YaweIa.ErEb0LXXR0xC0jJiufy', '9442723543', 'admin', 'Abraham', 'Timothy', '', '', '', '2023-12-07 13:07:00', 0, '', ''),
(8, 'muthu@1', '$2y$10$oEIXB6BH5eOug9vtsT9PJ.DsDhsx8T87qo.ZqvLZbdKv8EnIoucJu', '8120938', 'faculty', 'Raman', 'Muthu ', '', '', '', '2023-12-07 13:36:47', 0, '', ''),
(9, 'hello@1', '$2y$10$XVA/8ZRttEU2vVqkkcT9Kux6rVya0RCQH2G7sagXLL1RTA1xPN8hq', '12312', 'admin', 'Kong', 'King', '', '', '', '2023-12-07 13:38:40', 0, '', ''),
(10, 'asa@1', '$2y$10$JScnPNB5R5/4aT.PtYy13uHVYTKwOLQV5Y.o.T4ARqbMylxGAL7Dy', '0981230', 'faculty', 'asda', 'asd', '', '', '', '2023-12-07 14:00:56', 0, '', ''),
(16, 'mani@1', '$2y$10$p1YQC9YXHTt2uqxigkfQIew3YfAfFumGnwwK8tEF9wf4427X/RSjK', '0918230981', 'admin', 'Mani', 'Monkey ', '', '', '', '2023-12-09 12:10:39', 0, '', ''),
(17, 'thesai@1', '$2y$10$Jn/13Md3Yw/EAoJdx3SmYen0YHiZgKAzXb5opr7ssHSQdkOt7YL/m', '901280381', 'student', 'Jebas', 'Thesai', '', '', '', '2023-12-09 12:22:11', 0, '', ''),
(18, 'asds@1', '$2y$10$48a5KG0b5GGWrZmeg014o.tVZ31TWCzJMWNvIIUhPdLNrdEkoO0Iq', '342342', 'faculty', 'asdas', 'fgdfr', '', '', '', '2023-12-09 12:37:47', 0, '', '');

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

--
-- Indexes for dumped tables
--

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
-- Indexes for table `erp_role`
--
ALTER TABLE `erp_role`
  ADD PRIMARY KEY (`roleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `erp_login`
--
ALTER TABLE `erp_login`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `erp_permission`
--
ALTER TABLE `erp_permission`
  MODIFY `permissionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `erp_role`
--
ALTER TABLE `erp_role`
  MODIFY `roleId` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
