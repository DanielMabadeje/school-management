-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 03, 2021 at 06:49 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `week` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `course_id`, `name`, `week`, `created_at`, `updated_at`) VALUES
(1, 1, 'PHY 111 Attendance', '1', '2021-06-19 19:16:09', '2021-06-19 19:16:09');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_list`
--

CREATE TABLE `attendance_list` (
  `id` int(30) NOT NULL,
  `attendance_id` varchar(30) NOT NULL,
  `student_reg_no` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance_list`
--

INSERT INTO `attendance_list` (`id`, `attendance_id`, `student_reg_no`, `created_at`, `updated_at`) VALUES
(1, '1', '12345', '2021-06-20 17:04:02', '2021-06-20 17:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `level` varchar(30) NOT NULL,
  `department` varchar(30) DEFAULT '*',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `level`, `department`, `created_at`, `updated_at`) VALUES
(1, 'PHY 111', NULL, '100', '*', '2021-06-11 19:37:35', '2021-06-11 19:37:35'),
(2, 'CHM 111', NULL, '100', '*', '2021-06-11 19:37:35', '2021-06-11 19:37:35'),
(3, 'MTH 111', 'Mathematics\r\n                            ', '100', '*', '2021-06-20 16:09:53', '2021-06-20 16:09:53');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(30) NOT NULL,
  `faculty_id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `faculty_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Computer Engineering', '', '2021-06-11 19:30:52', '2021-06-11 19:30:52'),
(2, 1, 'Mechanical Engineering', '', '2021-06-11 19:30:52', '2021-06-11 19:30:52'),
(3, 3, 'Computer Science', '', '2021-06-11 19:31:43', '2021-06-11 19:31:43'),
(4, 2, 'Micro Biology', '', '2021-06-11 19:31:43', '2021-06-11 19:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `course_id` varchar(30) NOT NULL,
  `department_id` varchar(30) NOT NULL,
  `date` date DEFAULT NULL,
  `time` time(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `description`, `course_id`, `department_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 'PHY 11 Exams', 'Exams', '1', '1', NULL, NULL, '2021-06-17 19:35:50', '2021-06-17 19:35:50'),
(2, 'PHY 11 Exams', 'gddg\r\n                            ', '1', '1', '2021-06-10', '13:53:00.000000', '2021-06-19 20:51:52', '2021-06-19 20:51:52'),
(3, 'CHM111', '\r\n                            GD', '2', '1', '2021-06-03', '14:32:00.000000', '2021-06-19 21:29:11', '2021-06-19 21:29:11'),
(4, 'CHM111 Test', '\r\n                            fsdf', '2', '1', '2021-06-09', '16:30:00.000000', '2021-06-19 21:30:09', '2021-06-19 21:30:09');

-- --------------------------------------------------------

--
-- Table structure for table `faculties`
--

CREATE TABLE `faculties` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Engineering', NULL, '2021-06-11 19:25:13', '2021-06-11 19:25:13'),
(2, 'Science', NULL, '2021-06-11 19:25:13', '2021-06-11 19:25:13'),
(3, 'Mathematics & Statistics', NULL, '2021-06-11 19:25:55', '2021-06-11 19:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `membership_groups`
--

CREATE TABLE `membership_groups` (
  `groupId` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `allowSignup` varchar(10) DEFAULT '0',
  `needsApproval` varchar(10) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membership_groups`
--

INSERT INTO `membership_groups` (`groupId`, `name`, `description`, `allowSignup`, `needsApproval`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '0', '0', '2021-06-09 19:58:04', '2021-06-09 19:58:04'),
(2, 'student', 'A student', '0', '0', '2021-06-13 19:35:29', '2021-06-13 19:35:29'),
(3, 'staff', 'A staff', '0', '0', '2021-06-13 19:35:46', '2021-06-13 19:35:46');

-- --------------------------------------------------------

--
-- Table structure for table `staffs`
--

CREATE TABLE `staffs` (
  `id` int(11) NOT NULL,
  `user_id` int(30) NOT NULL,
  `department_id` int(30) NOT NULL,
  `course_id` int(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staffs`
--

INSERT INTO `staffs` (`id`, `user_id`, `department_id`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, NULL, '2021-06-13 19:34:37', '2021-06-13 19:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `regNo` varchar(30) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `regNo`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, '12345', 'Daniel', '2021-06-09 20:34:24', '2021-06-09 20:34:24'),
(4, 4, '23456', 'Richard', '2021-06-20 18:22:54', '2021-06-20 18:22:54'),
(5, 5, '34567', 'Michael', '2021-06-20 18:22:54', '2021-06-20 18:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `students_profile`
--

CREATE TABLE `students_profile` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `reg_no` varchar(30) NOT NULL,
  `faculty_id` varchar(30) NOT NULL,
  `department_id` varchar(30) NOT NULL,
  `level` varchar(4) DEFAULT NULL,
  `paid_fees` varchar(30) NOT NULL DEFAULT 'true',
  `paid_hostel_fees` varchar(30) NOT NULL DEFAULT 'false',
  `gpa` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students_profile`
--

INSERT INTO `students_profile` (`id`, `user_id`, `reg_no`, `faculty_id`, `department_id`, `level`, `paid_fees`, `paid_hostel_fees`, `gpa`, `created_at`, `updated_at`) VALUES
(1, 1, '12345', '1', '1', '100', 'true', 'false', '5.0', '2021-06-11 19:22:16', '2021-06-12 19:51:52'),
(2, 4, '23456', '2', '2', '100', 'true', 'false', '', '2021-06-20 18:26:03', '2021-06-20 18:26:03'),
(3, 5, '34567', '3', '3', '200', 'true', 'false', '', '2021-06-20 18:26:03', '2021-06-20 18:26:03');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `reg_no` int(30) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `score` varchar(30) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(100) NOT NULL,
  `course_id` int(30) NOT NULL,
  `department_id` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time(6) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `description`, `course_id`, `department_id`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 'PHY 111 Test', '\r\n                            ggdeg', 1, '1', '2021-06-11', '14:34:00.000000', '2021-06-19 20:32:44', '2021-06-19 20:32:44'),
(2, 'PHY 11 Exams', '\r\n                            d', 1, '1', '2021-06-17', '13:52:00.000000', '2021-06-19 20:49:39', '2021-06-19 20:49:39'),
(3, 'CHM111 Test', 'fdf\r\n                            ', 2, '1', '2021-06-02', '14:34:00.000000', '2021-06-19 21:31:14', '2021-06-19 21:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `memberId` varchar(30) DEFAULT 'student',
  `password` varchar(350) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `groupId` varchar(10) DEFAULT NULL,
  `isBanned` varchar(10) NOT NULL DEFAULT '0',
  `isApproved` varchar(10) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `memberId`, `password`, `username`, `email`, `groupId`, `isBanned`, `isApproved`, `created_at`, `updated_at`) VALUES
(1, 'student', '$2y$10$8uOzZzPNbTmWqXa1EcWfK.ibbCo29IFsA7w0WYsnsUesz4kKywade', 'John', 'mabadejedaniel1@gmail.com', '2', '0', '1', '2021-06-09 20:31:33', '2021-06-30 11:19:51'),
(2, 'admin', '$2y$10$8uOzZzPNbTmWqXa1EcWfK.ibbCo29IFsA7w0WYsnsUesz4kKywade', NULL, 'admin@admin.com', '1', '0', '1', '2021-06-10 18:55:54', '2021-06-30 11:28:30'),
(3, 'staff', '$2y$10$8uOzZzPNbTmWqXa1EcWfK.ibbCo29IFsA7w0WYsnsUesz4kKywade', 'staff', 'staff@email.com', '3', '0', '1', '2021-06-13 19:33:11', '2021-06-30 11:28:57'),
(4, 'student', '$2y$10$7v4qBlBqevuDlAXVUkqnuewNKz9/haE2V9KltORC1px9UWfunIl6G', 'Richard', 'richard@gmail.com', '2', '0', '1', '2021-06-20 18:22:36', '2021-06-20 18:22:36'),
(5, 'student', '$2y$10$7v4qBlBqevuDlAXVUkqnuewNKz9/haE2V9KltORC1px9UWfunIl6G', 'Michael', 'michael@gmail.com', '2', '0', '1', '2021-06-20 18:22:36', '2021-06-20 18:22:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance_list`
--
ALTER TABLE `attendance_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membership_groups`
--
ALTER TABLE `membership_groups`
  ADD PRIMARY KEY (`groupId`);

--
-- Indexes for table `staffs`
--
ALTER TABLE `staffs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regNo` (`regNo`);

--
-- Indexes for table `students_profile`
--
ALTER TABLE `students_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance_list`
--
ALTER TABLE `attendance_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `membership_groups`
--
ALTER TABLE `membership_groups`
  MODIFY `groupId` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `staffs`
--
ALTER TABLE `staffs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students_profile`
--
ALTER TABLE `students_profile`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
