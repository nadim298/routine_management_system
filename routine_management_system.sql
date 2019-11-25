-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2019 at 08:01 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `routine_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', '404nadim@gmail.com', '4d813d28f0aaaa4e9da0fb6e55293607');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` int(11) NOT NULL,
  `batch` varchar(10) NOT NULL,
  `program_id` int(11) NOT NULL,
  `cr_email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `batch`, `program_id`, `cr_email`, `password`) VALUES
(10, '57-A', 3, 'nadimboss29@gmail.com', 'ad6a280417a0f533d8b670c61667e1a0');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course` varchar(100) NOT NULL,
  `program_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course`, `program_id`) VALUES
(8, 'CSE 403,Data Structure', 3),
(9, 'CSE 311,OOP', 3),
(10, 'CSE 432,COA', 3),
(11, 'EEE 102,Electrical Circuiut', 2),
(12, 'EEE201,Basic Electrical ', 2),
(13, 'EEE301,Electrical Circuiut Lab', 2),
(14, 'civil-201,Basic Math', 6);

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `email` varchar(100) NOT NULL,
  `otp` varchar(6) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`email`, `otp`, `created_on`) VALUES
('404nadim@gmail.com', '7821', '2019-11-17 13:48:46'),
('nadimboss29@gmail.com', '3476', '2019-11-17 15:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `designation`, `email`, `password`) VALUES
(17, 'Sourabh', 'Lecturer', 'sourabhsaha942@gmail.com', '85b954cf9565b9c54add85f09281a50b'),
(18, 'Ibrahim', 'Lecturer', 'ibrahimsarkar99@gmail.com', '85b954cf9565b9c54add85f09281a50b'),
(19, 'Moon', 'Lecturer', 'moon1234@gmail.com', '85b954cf9565b9c54add85f09281a50b'),
(20, 'Nadim', 'Sn.Lecturer', '404nadim@gmail.com', '4d813d28f0aaaa4e9da0fb6e55293607');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `program_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`) VALUES
(2, 'EEE'),
(3, 'CSE'),
(4, 'BBA'),
(5, 'English'),
(6, 'Civil');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  `trimester_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `faculty_id`, `trimester_id`, `status`) VALUES
(16, 17, 38, 0),
(17, 19, 38, 0),
(18, 19, 39, 0),
(19, 17, 39, 0),
(23, 20, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `room_no` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `room_no`) VALUES
(2, '504'),
(3, '505'),
(4, '501'),
(5, '503'),
(6, '502'),
(7, '506'),
(8, 'LAB A'),
(9, 'LAB B'),
(10, 'LAB C');

-- --------------------------------------------------------

--
-- Table structure for table `routine`
--

CREATE TABLE `routine` (
  `id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `day` varchar(11) NOT NULL,
  `period` int(11) NOT NULL,
  `room_no` varchar(10) NOT NULL,
  `course_teacher_id` int(11) NOT NULL,
  `trimester_id` int(11) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routine`
--

INSERT INTO `routine` (`id`, `batch_id`, `p_id`, `course_id`, `day`, `period`, `room_no`, `course_teacher_id`, `trimester_id`, `status`) VALUES
(75, 10, 3, 8, 'Saturday', 1, '4', 19, 39, 0),
(76, 10, 3, 9, 'Saturday', 2, '4', 19, 39, 0),
(77, 11, 3, 9, 'Saturday', 1, '3', 17, 39, 0),
(78, 11, 3, 8, 'Saturday', 2, '7', 17, 39, 0),
(79, 10, 3, 9, 'Saturday', 1, '6', 17, 40, 0),
(80, 10, 3, 9, 'Saturday', 1, '5', 20, 41, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trimester`
--

CREATE TABLE `trimester` (
  `id` int(11) NOT NULL,
  `session` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trimester`
--

INSERT INTO `trimester` (`id`, `session`, `start_date`, `end_date`, `status`) VALUES
(40, 'Summer 2019', '2019-09-03', '2019-09-05', 0),
(41, 'Spring 2019', '2019-11-17', '2019-11-20', 0),
(42, 'Summer 2019', '2019-11-17', '2019-11-21', 0),
(43, 'Spring 2019', '2019-11-24', '2019-11-28', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `routine`
--
ALTER TABLE `routine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trimester`
--
ALTER TABLE `trimester`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `routine`
--
ALTER TABLE `routine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `trimester`
--
ALTER TABLE `trimester`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
