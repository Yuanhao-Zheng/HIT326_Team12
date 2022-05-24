-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2022 at 12:45 PM
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
(6, 1, 'Assignment 2', 0, 0, '2022-05-18 13:56:15'),
(7, 2, 'Assignment 1', 0, 0, '2022-05-18 13:56:15'),
(12, 2, 'Assignment 1', 0, 0, '2022-05-18 14:32:06'),
(13, 6, 'Assignment 3', 1, 0, '2022-05-18 14:33:35'),
(16, 6, 'Assignment 123', 1, 1, '2022-05-18 14:35:41'),
(17, 6, 'Assignment 374', 1, 1, '2022-05-18 14:37:07'),
(30, 2, 'Assignment 12123', 1, 1, '2022-05-22 06:07:54');

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
(7, 17, 5, 1, 1, '2022-05-22 06:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `criterion_1` int(2) NOT NULL,
  `criterion_2` int(2) NOT NULL,
  `criterion_3` int(2) NOT NULL,
  `criterion_4` int(2) NOT NULL,
  `submit_student_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `group_id`, `student_id`, `criterion_1`, `criterion_2`, `criterion_3`, `criterion_4`, `submit_student_id`) VALUES
(1, 3, 's123333', 12, 12, 12, 12, 's123333');

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
('s123333', 'Eric1234', '1234', 1, '2022-05-20 01:27:04');

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
(2, 'HIT237', 'Building Interactive Website', 2021, 0, 1, 1, '2022-05-17 12:26:37'),
(3, 'HIT339', 'Distributed Development', 2012, 0, 1, 0, '2022-05-17 12:27:19'),
(6, 'HIT374', 'Networking', 2013, 0, 0, 1, '2022-05-17 13:21:10'),
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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`),
  ADD KEY `group_id` (`group_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `submit_student_id` (`submit_student_id`);

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
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`group_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`submit_student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
