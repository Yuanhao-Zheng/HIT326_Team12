-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2022 at 05:37 AM
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
(32, 12, 'Data science group project 1', 0, 1, '2022-05-29 11:10:23'),
(33, 12, 'Data science group project 2', 0, 1, '2022-05-29 11:10:34'),
(34, 11, 'Simulation Project', 0, 1, '2022-05-29 11:11:05'),
(35, 13, 'Written Assignment', 0, 1, '2022-05-29 11:11:32'),
(36, 13, 'Software Project', 0, 1, '2022-05-29 11:11:40'),
(37, 10, 'Group Project proposal', 0, 1, '2022-05-29 11:12:08'),
(38, 10, 'Group Web application report', 0, 1, '2022-05-29 11:12:18');

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
(15, 32, 1, 0, 1, '2022-05-29 11:13:03'),
(16, 32, 2, 0, 1, '2022-05-29 11:13:07'),
(17, 32, 3, 0, 1, '2022-05-29 11:13:11'),
(18, 33, 1, 0, 1, '2022-05-29 11:13:23'),
(19, 33, 2, 0, 1, '2022-05-29 11:13:30'),
(20, 33, 3, 0, 1, '2022-05-29 11:13:35'),
(21, 34, 4, 0, 1, '2022-05-29 11:13:52'),
(22, 34, 5, 0, 1, '2022-05-29 11:14:01'),
(23, 34, 6, 0, 1, '2022-05-29 11:14:06'),
(24, 36, 10, 0, 1, '2022-05-29 11:14:20'),
(25, 38, 8, 0, 0, '2022-05-29 11:14:31'),
(26, 38, 9, 0, 1, '2022-05-29 11:14:37');

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
(8, 's312005', 15),
(9, 's322698', 15),
(10, 's319817', 15),
(11, 's320346', 15),
(12, 's322698', 21),
(13, 's335834', 21),
(14, 's343644', 21);

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
(35, 8, 35, 35, 35, 35, 's312005'),
(36, 9, 35, 35, 35, 35, 's312005'),
(37, 10, 15, 15, 15, 15, 's312005'),
(38, 11, 15, 15, 15, 15, 's312005'),
(39, 8, 35, 35, 35, 35, 's322698'),
(40, 9, 35, 35, 35, 35, 's322698'),
(41, 10, 15, 15, 15, 15, 's322698'),
(42, 11, 15, 15, 15, 15, 's322698'),
(43, 8, 25, 25, 25, 25, 's319817'),
(44, 9, 25, 25, 25, 25, 's319817'),
(45, 10, 25, 25, 25, 25, 's319817'),
(46, 11, 25, 25, 25, 25, 's319817'),
(47, 8, 25, 25, 25, 25, 's320346'),
(48, 9, 25, 25, 25, 25, 's320346'),
(49, 10, 25, 25, 25, 25, 's320346'),
(50, 11, 25, 25, 25, 25, 's320346'),
(51, 12, 34, 34, 34, 34, 's322698'),
(52, 13, 33, 33, 33, 33, 's322698'),
(53, 14, 33, 33, 33, 33, 's322698'),
(54, 12, 34, 34, 34, 34, 's335834'),
(55, 13, 33, 33, 33, 33, 's335834'),
(56, 14, 33, 33, 33, 33, 's335834'),
(57, 12, 34, 34, 34, 34, 's343644'),
(58, 13, 33, 33, 33, 33, 's343644'),
(59, 14, 33, 33, 33, 33, 's343644');

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
('s312005', 'Mike', 'Abrahams', 1, '2022-05-29 11:19:31'),
('s319817', 'Kenzie', 'Chandra', 1, '2022-05-29 11:20:17'),
('s320346', 'Gede Tomi Adi', 'Wirnaya', 1, '2022-05-29 11:21:02'),
('s322698', 'Eric', 'Heng', 1, '2022-05-29 11:18:37'),
('s335834', 'Rupesh', 'Shrestha', 1, '2022-05-29 11:18:22'),
('s343644', 'Hoang Phong', 'Tran', 1, '2022-05-29 11:17:30');

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
(9, 'HIT339', 'Distributed Development', 2022, 0, 1, 1, '2022-05-29 11:05:09'),
(10, 'HIT326', 'Database-Driven Web Application', 2022, 1, 1, 1, '2022-05-29 11:06:29'),
(11, 'HIT274', 'Network Engineering Applications', 2022, 0, 1, 1, '2022-05-29 11:07:20'),
(12, 'HIT140', 'Foundations of Data Science', 2022, 0, 1, 1, '2022-05-29 11:07:47'),
(13, 'PRT585', 'Software Engineering Practice', 2022, 0, 1, 1, '2022-05-29 11:08:31');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_role`, `status`, `created_at`) VALUES
(12, '', '$2y$12$rTwrCL/XwXLt/C9Tnm7xB.0JWEK7N2wDWvU7zyIJiCh3waUHaOFby', 'Stephen', 'Curry', 'admin@admin.com', 1, 0, '2022-05-29 05:56:23'),
(13, '', '$2y$12$JmlFtAymm0Klk4nQDKFiuONMYfnQKi470LTwb7GkqRlfV8fbjZ/dG', 'Lebron', 'James', 'lecturer@lecturer.com', 0, 0, '2022-05-29 05:58:18');

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
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `joins`
--
ALTER TABLE `joins`
  MODIFY `join_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
