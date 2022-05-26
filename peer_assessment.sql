-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2022 at 02:58 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peer_assessment`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `assignment_title` varchar(50) NOT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `unit_id`, `assignment_title`, `navbar_status`, `status`, `created_at`) VALUES
(6, 1, 'Assignment 2', 1, 1, '2022-05-18 13:56:15'),
(7, 2, 'Assignment 1', 0, 0, '2022-05-18 13:56:15'),
(12, 2, 'Assignment 1', 0, 0, '2022-05-18 14:32:06'),
(13, 6, 'Assignment 3', 1, 1, '2022-05-18 14:33:35'),
(16, 6, 'Assignment 123', 1, 1, '2022-05-18 14:35:41'),
(17, 6, 'Assignment 374', 1, 1, '2022-05-18 14:37:07'),
(30, 2, 'Assignment 12123', 1, 1, '2022-05-22 06:07:54'),
(31, 8, 'Final Report', 1, 1, '2022-05-24 13:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `group_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `group_number` int(11) NOT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`group_id`, `assignment_id`, `group_number`, `navbar_status`, `status`, `created_at`) VALUES
(2, 17, 3, 1, 0, '2022-05-19 12:38:35'),
(3, 12, 2, 0, 1, '2022-05-19 13:30:34'),
(5, 16, 10, 1, 1, '2022-05-22 06:22:03'),
(6, 16, 9, 1, 1, '2022-05-22 06:13:46'),
(7, 17, 5, 1, 1, '2022-05-22 06:29:13'),
(8, 13, 1, 1, 1, '2022-05-24 14:58:49'),
(9, 6, 3, 1, 1, '2022-05-24 23:14:36'),
(10, 6, 4, 1, 1, '2022-05-24 23:14:54'),
(11, 17, 10, 1, 1, '2022-05-24 23:22:46'),
(12, 17, 8, 1, 1, '2022-05-24 23:23:03'),
(13, 16, 2, 1, 1, '2022-05-24 23:25:45');

-- --------------------------------------------------------

--
-- Table structure for table `joins`
--

CREATE TABLE `joins` (
  `join_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joins`
--

INSERT INTO `joins` (`join_id`, `student_id`, `group_id`) VALUES
(1, 's123333', 3),
(2, 's123456', 3),
(3, 's312005', 3),
(4, 's322698', 3);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `join_id` int(11) NOT NULL,
  `criterion_1` int(2) NOT NULL,
  `criterion_2` int(2) NOT NULL,
  `criterion_3` int(2) NOT NULL,
  `criterion_4` int(2) NOT NULL,
  `submit_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `join_id`, `criterion_1`, `criterion_2`, `criterion_3`, `criterion_4`, `submit_id`) VALUES
(1, 1, 35, 35, 35, 35, 's123333'),
(2, 1, 35, 35, 35, 35, 's123456'),
(3, 1, 25, 25, 25, 25, 's312005'),
(4, 1, 25, 25, 25, 25, 's322698'),
(5, 2, 35, 35, 35, 35, 's123333'),
(6, 2, 35, 35, 35, 35, 's123456'),
(7, 2, 25, 25, 25, 25, 's312005'),
(8, 2, 25, 25, 25, 25, 's322698'),
(9, 3, 15, 15, 15, 15, 's123333'),
(10, 3, 15, 15, 15, 15, 's123456'),
(11, 3, 25, 25, 25, 25, 's312005'),
(12, 3, 25, 25, 25, 25, 's322698'),
(13, 4, 15, 15, 15, 15, 's123333'),
(14, 4, 15, 15, 15, 15, 's123456'),
(15, 4, 25, 25, 25, 25, 's312005'),
(16, 4, 25, 25, 25, 25, 's322698');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` varchar(255) NOT NULL,
  `student_firstname` varchar(255) NOT NULL,
  `student_lastname` varchar(255) NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_firstname`, `student_lastname`, `status`, `created_at`) VALUES
('s123333', 'Eric1234', '1234', 1, '2022-05-20 01:27:04'),
('s123456', 'Eric ', 'Eric', 1, '2022-05-25 01:01:45'),
('s312005', 'Michael', 'Abrahams', 1, '2022-05-26 02:21:48'),
('s322698', 'Eric ', 'heng', 1, '2022-05-26 02:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `unit_id` int(11) NOT NULL,
  `unit_code` varchar(255) NOT NULL,
  `unit_name` varchar(255) NOT NULL,
  `unit_year` year(4) NOT NULL,
  `unit_semester` tinyint(1) NOT NULL,
  `navbar_status` tinyint(1) DEFAULT 0,
  `status` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`unit_id`, `unit_code`, `unit_name`, `unit_year`, `unit_semester`, `navbar_status`, `status`, `created_at`) VALUES
(1, 'HIT226', 'Mobile Web Structure', 2012, 1, 1, 0, '2022-05-17 12:25:52'),
(2, 'HIT237', 'Building Interactive Website', 2021, 0, 1, 0, '2022-05-17 12:26:37'),
(3, 'HIT339', 'Distributed Development', 2012, 0, 1, 0, '2022-05-17 12:27:19'),
(6, 'HIT374', 'Networking', 2013, 0, 1, 1, '2022-05-17 13:21:10'),
(8, 'HIT353', 'Business Intelligence and Data Mining', 2020, 1, 1, 1, '2022-05-22 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_role` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `randSalt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`, `status`, `created_at`, `randSalt`) VALUES
(1, '', '123', 'abc', 'abc', 'abc@abc.com', 1, 0, '2022-05-15 12:31:23', ''),
(2, '', '123', 'abc1', 'abc1', 'abc1@bac1.com', 0, 0, '2022-05-15 12:31:58', ''),
(3, '', 'abcd', 'abcd', 'abcde', 'abcd@abcd.com', 0, 0, '2022-05-15 12:40:44', ''),
(4, '', '123', 'abc', 'abc', 'abcd@abcd.coma', 1, 0, '2022-05-15 12:43:13', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`group_id`),
  ADD KEY `assignment_id` (`assignment_id`);

--
-- Indexes for table `joins`
--
ALTER TABLE `joins`
  ADD PRIMARY KEY (`join_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `join_id` (`join_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `joins`
--
ALTER TABLE `joins`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`unit_id`) ON DELETE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`assignment_id`) REFERENCES `assignments` (`assignment_id`) ON DELETE CASCADE;

--
-- Constraints for table `joins`
--
ALTER TABLE `joins`
  ADD CONSTRAINT `joins_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `joins_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`join_id`) REFERENCES `joins` (`join_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
