-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2022 at 09:54 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtr`
--

-- --------------------------------------------------------

--
-- Table structure for table `accomplished_work`
--

CREATE TABLE `accomplished_work` (
  `entry_id` int(11) NOT NULL,
  `work_id` int(11) NOT NULL,
  `accomplished_work` varchar(1000) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accomplished_work`
--

INSERT INTO `accomplished_work` (`entry_id`, `work_id`, `accomplished_work`, `month`, `day`, `year`) VALUES
(25, 8, 'test1', '07', '11', '2022'),
(26, 9, 'test2', '07', '11', '2022'),
(27, 10, 'test3', '07', '11', '2022'),
(28, 11, 'I am working from home', '07', '11', '2022');

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `entry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `setup` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`entry_id`, `user_id`, `month`, `day`, `year`, `setup`) VALUES
(25, 2, '07', '11', '2022', 1),
(26, 5, '07', '11', '2022', 1),
(27, 6, '07', '11', '2022', 2),
(28, 7, '07', '11', '2022', 2);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE `time` (
  `entry_id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `inserted_at` time NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `time`
--

INSERT INTO `time` (`entry_id`, `type`, `time`, `inserted_at`) VALUES
(25, 'am_in', '3:10:21 AM', '03:10:21'),
(26, 'am_in', '3:10:25 AM', '03:10:25'),
(26, 'am_out', '3:10:29 AM', '03:10:29'),
(25, 'am_out', '3:10:30 AM', '03:10:30'),
(25, 'pm_in', '3:10:35 AM', '03:10:35'),
(26, 'pm_in', '3:10:36 AM', '03:10:36'),
(25, 'pm_out', '3:10:40 AM', '03:10:40'),
(26, 'pm_out', '3:10:43 AM', '03:10:43'),
(27, 'am_in', '3:12:06 AM', '03:12:06'),
(27, 'am_out', '3:12:06 AM', '03:12:06'),
(27, 'pm_in', '3:12:06 AM', '03:12:06'),
(27, 'pm_out', '3:12:06 AM', '03:12:06'),
(28, 'am_in', '3:41:33 AM', '03:41:33'),
(28, 'am_out', '3:41:33 AM', '03:41:33'),
(28, 'pm_in', '3:41:33 AM', '03:41:33'),
(28, 'pm_out', '3:41:33 AM', '03:41:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `profile_picture` longblob DEFAULT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `fullname` varchar(1000) NOT NULL,
  `agency` varchar(1000) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `profile_picture`, `username`, `password`, `fullname`, `agency`, `role`) VALUES
(1, NULL, 'admin', '$2y$10$5trHhiGXRnAgn.iSkFCH4.vacMEldrVk7.avfL33HHzACMWb9bBH2', 'SYSTEM ADMIN', 'CSC', 'Admin'),
(2, NULL, 'jovany.trillo', '$2y$10$VV.C2JwmqJ30z2oDs8RtUO0Pudd0Dk/1GLI7NPoJUJR9tgkadEIzy', 'Jovany E Trillo', 'CSC', 'Staff'),
(3, NULL, 'test.test', '$2y$10$Grf.I6bJDk.ncvh2MAPsh.cWgFx8juwzTsVRhX1cp8DxUlzO/Lmgq', 'Test T Test', 'Test', 'Admin'),
(5, NULL, 'johnex.doe', '$2y$10$kXkizgx68xI2EaNrNw.hYesdOAG0G1BKqz1jx.esDU7slJwevclM6', 'John Ex L Doe', 'ASD', 'Staff'),
(6, NULL, 'emot.cat', '$2y$10$SOl.z.kyehXhWk4XdbLtTOxjprxHHtbY7NW5THOxe4X9uaNKEAxA2', 'Emot The Cat', 'CAT', 'Staff'),
(7, NULL, 'mikeryan.trillo', '$2y$10$Jb8kgbcQi5O5HWNyQLDRPe6b5QmwmDW3ZdQVdG4VyrTwjtNNDlXv2', 'Mike Ryan E Trillo', 'CSC', 'Staff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accomplished_work`
--
ALTER TABLE `accomplished_work`
  ADD PRIMARY KEY (`work_id`),
  ADD KEY `accomplished_work_ibfk_2` (`entry_id`);

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `user_id fk` (`user_id`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD KEY `entry_id` (`entry_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accomplished_work`
--
ALTER TABLE `accomplished_work`
  MODIFY `work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accomplished_work`
--
ALTER TABLE `accomplished_work`
  ADD CONSTRAINT `accomplished_work_ibfk_2` FOREIGN KEY (`entry_id`) REFERENCES `entry` (`entry_id`) ON DELETE CASCADE;

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `user_id fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `time`
--
ALTER TABLE `time`
  ADD CONSTRAINT `time_ibfk_1` FOREIGN KEY (`entry_id`) REFERENCES `entry` (`entry_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
