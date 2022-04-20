-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2022 at 10:09 PM
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
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `entry_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `month` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `am_in` varchar(255) DEFAULT NULL,
  `am_out` varchar(255) DEFAULT NULL,
  `pm_in` varchar(255) DEFAULT NULL,
  `pm_out` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`entry_id`, `user_id`, `month`, `day`, `year`, `am_in`, `am_out`, `pm_in`, `pm_out`) VALUES
(8, 1, '04', '21', '2022', '3:14:45 AM', '3:24:16 AM', '3:55:18 AM', '3:55:37 AM'),
(9, 4, '04', '21', '2022', '3:32:49 AM', '3:34:49 AM', '3:32:53 AM', '3:37:25 AM'),
(10, 3, '04', '21', '2022', '3:57:13 AM', '3:57:16 AM', '3:57:19 AM', '3:57:25 AM'),
(11, 6, '04', '21', '2022', '4:06:57 AM', '4:07:07 AM', '4:07:14 AM', '4:07:22 AM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `fullname` varchar(1000) NOT NULL,
  `agency` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `agency`) VALUES
(1, 'test', '$2y$10$xyAQEUkQ0Nlu2kyAeiCNIemTLE7NV.A57vhdWCYar3qg1gEUIA69O', 'test', 'test'),
(2, 'admin', '$2y$10$5trHhiGXRnAgn.iSkFCH4.vacMEldrVk7.avfL33HHzACMWb9bBH2', 'admin', 'admin'),
(3, 'jovanny', '$2y$10$K/coVSmwrltCiIQzAaVS2uz.KmNpoY9zep2OdT3qZnJ5RNi3oKBZ6', 'Jovanny E. Trillo', 'AMA'),
(4, 'jovany', '$2y$10$BxW8.OVfuAWHXQl6FGt1EOaJgdU0Yv1TO1SNsEhWSD5Dbpc8jRP4W', 'asd', 'asd'),
(6, 'emot', '$2y$10$AZ5VemYqBKA0Ck.wnx.h2uooiFrkTJ/mWnW9sxHTV3yfTI0mKUGOW', 'Emoty the cat', 'emot agency');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`entry_id`),
  ADD KEY `user_id fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `entry`
--
ALTER TABLE `entry`
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `user_id fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
