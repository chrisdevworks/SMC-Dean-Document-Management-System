-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2022 at 01:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `document_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(250) NOT NULL,
  `document_code` varchar(200) NOT NULL,
  `document_name` varchar(200) NOT NULL,
  `document_classification_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `document_code`, `document_name`, `document_classification_id`) VALUES
(16, 'ABSIM', 'Absences Monitoring', 5),
(17, 'aare', 'Academic Advising Report', 5),
(18, 'ATDN', 'Attendance', 5);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(255) NOT NULL,
  `user_id` int(200) DEFAULT NULL,
  `tracking_number` varchar(200) NOT NULL,
  `title` varchar(100) NOT NULL,
  `recipient` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `purpose` text NOT NULL,
  `remarks` text NOT NULL,
  `uploaded_files` varchar(100) NOT NULL,
  `date_created` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `user_id`, `tracking_number`, `title`, `recipient`, `type`, `purpose`, `remarks`, `uploaded_files`, `date_created`, `date_updated`) VALUES
(47, NULL, '', 'dasdasd', '', '', '', '', 'assets/dist/uploads/803877bryantampz.jpg', '2022-10-12 12:16:42', '2022-11-16 12:56:06'),
(48, 32, '', 'Assessment', '', '', '', '', 'assets/dist/uploads/47952bryantampz.jpg', '2022-10-12 12:24:57', '2022-11-16 12:56:06'),
(49, 32, '', 'Assessment', '', '', '', '', 'assets/dist/uploads/387231bryantampz.jpg', '2022-10-12 12:26:28', '2022-11-16 12:56:06'),
(50, 11, '2022-1129-4452-6179', 'TEST', 'College of Education', 'Academic Advising Report', 'TEST', 'TEST', '', '2022-11-30 00:50:15', '2022-11-30 00:50:15'),
(51, 11, '2022-1129-4452-6179', 'TEST', 'VP Academics Office', 'Attendance', 'TEST', 'TEST', '', '2022-11-30 00:52:03', '2022-11-30 00:52:03'),
(52, 11, '2022-1129-4452-6179', 'TEST', 'College of Education', 'Academic Advising Report', 'TEST', 'TEST', '', '2022-11-30 00:53:46', '2022-11-30 00:53:46'),
(53, 11, '2022-1129-4452-6179', 'ADAS', 'College of Arts and Sciences', 'Academic Advising Report', 'ASDAS', 'ASDAS', '', '2022-11-30 00:54:58', '2022-11-30 00:54:58'),
(54, 11, '2022-1129-4452-6179', 'asdas', 'College of Engineering & Computer Studies', 'Absences Monitoring', 'das', 'asd', '', '2022-11-30 01:05:09', '2022-11-30 01:05:09'),
(55, 11, '2022-1129-4452-6179', 'asdas', 'College of Education', 'Attendance', 'asdas', 'asdasd', '', '2022-11-30 01:05:52', '2022-11-30 01:05:52'),
(56, 11, '2022-1129-4452-6179', 'asda', 'College of Education', 'Attendance', 'asda', 'asd', '', '2022-11-30 01:20:07', '2022-11-30 01:20:07'),
(57, 11, '2022-1129-4452-6179', 'asda', 'College of Education', 'Attendance', 'asda', 'asd', '', '2022-11-30 01:20:31', '2022-11-30 01:20:31'),
(58, 11, '2022-1129-4452-6179', 'dasd', 'College of Engineering & Computer Studies', 'Academic Advising Report', 'dasdas', 'dasdsad', '', '2022-11-30 01:21:22', '2022-11-30 01:21:22'),
(59, 11, '2022-1129-4452-6179', 'test', 'College of Education', 'Academic Advising Report', 'ada', 'asd', '', '2022-11-30 01:24:27', '2022-11-30 01:24:27'),
(60, 11, '2022-1129-4452-6179', 'DASDSA', 'College of Education', 'Absences Monitoring', 'DSASD', 'ASD', '', '2022-11-30 01:27:30', '2022-11-30 01:27:30'),
(61, 11, '2022-1129-4452-6179', 'DASD', 'College of Education', 'Attendance', 'ASDAS', 'ASDA', '', '2022-11-30 01:34:40', '2022-11-30 01:34:40'),
(62, 11, '2022-1129-4452-6179', 'asdasd', 'College of Education', 'Academic Advising Report', 'asdas', 'asdas', '', '2022-11-30 01:41:04', '2022-11-30 01:41:04'),
(63, 11, '2022-1129-4452-6179', 'asdas', 'College of Engineering & Computer Studies', 'Absences Monitoring', 'asasd', 'asdasd', 'assets/dist/uploads/299762bryantampz.jpg', '2022-11-30 01:48:16', '2022-11-30 01:48:16'),
(64, 11, '2022-1129-4452-6179', 'TEST', 'College of Education', 'Academic Advising Report', 'TEST', 'TEST', 'assets/dist/uploads/960057bryantampz.jpg', '2022-11-30 01:50:27', '2022-11-30 01:50:27'),
(65, 11, '2022-1129-8141-5964', 'asdsad', 'College of Engineering & Computer Studies', 'Academic Advising Report', 'dasd', 'asdads', 'assets/dist/uploads/916839cute-teacup-dog-breeds-4587847-hero-4e1112e93c68438eb0e22f505f739b74.jpg', '2022-11-30 02:00:14', '2022-11-30 02:00:14');

-- --------------------------------------------------------

--
-- Table structure for table `document_classification`
--

CREATE TABLE `document_classification` (
  `document_classification_id` int(250) NOT NULL,
  `document_classification_code` varchar(200) NOT NULL,
  `document_classification_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `document_classification`
--

INSERT INTO `document_classification` (`document_classification_id`, `document_classification_code`, `document_classification_name`) VALUES
(2, 'fffff', 'asdasd'),
(3, 'QMAN', 'Quality Manual'),
(4, 'PROC', 'Procedures'),
(5, 'RECD', 'Records'),
(6, 'SDOC', 'Support Documents');

-- --------------------------------------------------------

--
-- Table structure for table `office`
--

CREATE TABLE `office` (
  `office_id` int(250) NOT NULL,
  `office_code` varchar(200) NOT NULL,
  `office_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `office`
--

INSERT INTO `office` (`office_id`, `office_code`, `office_name`) VALUES
(15, 'CAS', 'College of Arts and Sciences'),
(16, 'CED', 'College of Education'),
(17, 'CECS', 'College of Engineering & Computer Studies'),
(18, 'CBAA', 'College of Business Administration and Accountancy'),
(19, 'CHM', 'College of Hospitality Management'),
(20, 'CON', 'College of Nursing'),
(21, 'COC', 'College of Criminology'),
(22, 'GS', 'Graduate School'),
(23, 'VPA', 'VP Academics Office'),
(24, 'GAC', 'Guidance and Counseling Office	'),
(25, 'REG', 'Registrars Office'),
(26, 'FIN', 'Finance Office	'),
(27, 'RES', 'Research Office'),
(28, 'DSA', 'Department of Student Affairs Office'),
(29, 'FAC', 'Faculty Office'),
(30, 'CLIN', 'Clinic'),
(31, 'LIB', 'Library'),
(32, 'LAB', 'Laboratory'),
(33, 'ITC', 'Information Technology Center'),
(35, 'xxxxx', 'dasdas');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `id` int(200) NOT NULL,
  `document_id` int(200) NOT NULL,
  `position_id` int(200) NOT NULL,
  `sent_from` varchar(200) NOT NULL,
  `sent_to` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(255) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `smc_id` varchar(10) NOT NULL,
  `year_level` int(11) NOT NULL,
  `paddress` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `birthdate` date NOT NULL,
  `civilstatus` varchar(100) NOT NULL,
  `department` varchar(200) NOT NULL,
  `course` varchar(200) NOT NULL,
  `religion` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `mothersname` varchar(200) NOT NULL,
  `fathersname` varchar(200) NOT NULL,
  `parents_address` text NOT NULL,
  `parents_contact` int(30) NOT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstname`, `middlename`, `lastname`, `gender`, `smc_id`, `year_level`, `paddress`, `email`, `birthdate`, `civilstatus`, `department`, `course`, `religion`, `contact`, `mothersname`, `fathersname`, `parents_address`, `parents_contact`, `profile_pic`, `date_created`, `date_updated`) VALUES
(1, 'Bryant Angelo', 'Patayan', 'Ampo', 'Male', 'asda', 0, 'asdasd', 'adsasd@gmail.com', '1111-11-11', 'Single', 'CED', 'BACHELOR OF ARTS IN ENGLISH LANGUAGE', 'Roman Catholic', '09123456789', 'asdasd', 'sdasd', 'sadasdas', 2147483647, 'assets/dist/uploads/646576bryantampz.jpg', '2022-09-27 15:39:58', '2022-10-10 09:23:45'),
(31, 'Student1', 'Student1', 'Student1', 'Male', 'C22-1234', 1, 'SADASDAS', 'Student1@gmail.com', '0022-02-22', 'Single', 'CECS', 'BACHELOR OF SCIENCE IN COMPUTER ENGINEERING', 'Roman Catholic', '09123456789', 'sadasd', 'sadasd', 'asda', 0, 'assets/dist/uploads/445712download.jpg', '2022-10-11 11:19:29', '2022-10-11 11:19:29'),
(32, 'Student2', 'Student2', 'Student2', 'Female', 'C22-3213', 1, 'sdasd', 'Student2@gmail.com', '0002-02-22', 'Single', 'CECS', 'BACHELOR OF ARTS IN ENGLISH LANGUAGE', 'Baptist', '09123456789', 'asdasdsadasd', 'asdasd', 'asda', 0, 'assets/dist/uploads/934006dog-puppy-on-garden-royalty-free-image-1586966191.jpg', '2022-10-11 11:20:34', '2022-10-11 11:20:34'),
(33, 'Faculty', 'Faculty', 'Faculty', 'Male', 'asd', 0, 'asd', 'asasda@adsas.adasd', '0011-11-11', 'Widow', 'CAS', 'dasd', 'Roman Catholic', '09123456789', 'dsadasd', 'adasasd', 'asdasda', 2147483647, 'assets/dist/uploads/846259bryantampz.jpg', '2022-10-12 08:00:11', '2022-10-12 08:00:11'),
(34, 'Faculty', 'Faculty', 'Faculty', 'Male', 'asd', 0, 'asd', 'asasda@adsas.adasd', '0011-11-11', 'Widow', 'CAS', 'dasd', 'Roman Catholic', '09123456789', 'dsadasd', 'adasasd', 'asdasda', 2147483647, 'assets/dist/uploads/146707bryantampz.jpg', '2022-10-12 08:21:58', '2022-10-12 08:21:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `middlename` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `position` varchar(100) NOT NULL,
  `authority_level` varchar(200) NOT NULL,
  `office_id` int(250) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `position`, `authority_level`, `office_id`, `date_created`, `date_updated`) VALUES
(11, 'admin@admin.com', '0192023a7bbd73250516f069df18b500', '', '', '', 'Dean', '', 0, '2022-09-27 17:43:44', '2022-11-13 11:06:10'),
(14, 'cas@gmail.com', '25f9e794323b453885f5181f1b624d0b', '', '', '', 'Dean', '', 0, '2022-10-11 09:03:42', '2022-10-11 09:03:42'),
(15, 'BryantAmpz@gmail.com', '0192023a7bbd73250516f069df18b500', '', '', '', 'Faculty', '', 0, '2022-10-11 09:13:43', '2022-10-11 21:46:27'),
(16, 'admin2@admin.com', '0192023a7bbd73250516f069df18b500', 'xxxxxxxx', 'xxxxxx', 'asdasdas', 'Service Head', '', 0, '2022-10-11 11:23:05', '2022-11-19 20:05:24'),
(20, 'cxcvxcvc', 'fb0e22c79ac75679e9881e6ba183b354', 'sdasdasd', 'asasdasd', 'asdasd', 'Quality Assurance Management Director', '', 0, '2022-11-18 20:23:22', '2022-11-18 20:23:22'),
(30, 'aaaaa', 'bcfd3203056c535aace7c6c4b810d83b', 'sdasdasd', 'asasdasd', 'asdasd', 'Quality Assurance Management Director', '', 0, '2022-11-18 23:56:08', '2022-11-18 23:56:08'),
(31, 'ffffffff', '71f396e4134a1160d90bb1439876df31', 'fffffff', 'fffffff', 'ffff', 'Quality Assurance Management Director', '', 31, '2022-11-18 23:56:52', '2022-11-18 23:56:52'),
(32, 'dasd', 'e10adc3949ba59abbe56e057f20f883e', 'asdasd', 'asdas', 'asdas', 'Service Head', '', 33, '2022-11-19 11:52:24', '2022-11-19 11:52:24'),
(33, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin firstname', 'admin middle', 'admin lastname', 'Quality Assurance Management Director', '', 33, '2022-11-19 12:03:17', '2022-11-19 20:14:41'),
(34, 'admin123', '0192023a7bbd73250516f069df18b500', 'a', 'b', 'c', 'Central Administration', '', 30, '2022-11-19 13:46:32', '2022-11-19 13:46:32'),
(35, 'aaaaa', '71f50dec679266871c996179e13456d2', 'sdasdasd', 'asasdasd', 'asdasd', 'Quality Assurance Management Director', '', 0, '2022-11-19 19:23:53', '2022-11-19 19:23:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `document_classification`
--
ALTER TABLE `document_classification`
  ADD PRIMARY KEY (`document_classification_id`);

--
-- Indexes for table `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`office_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `document_classification`
--
ALTER TABLE `document_classification`
  MODIFY `document_classification_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `office`
--
ALTER TABLE `office`
  MODIFY `office_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
