-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 08:29 PM
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
  `pm_out` varchar(255) DEFAULT NULL,
  `setup` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`entry_id`, `user_id`, `month`, `day`, `year`, `am_in`, `am_out`, `pm_in`, `pm_out`, `setup`) VALUES
(8, 1, '04', '21', '2022', '3:14:45 AM', '3:24:16 AM', '3:55:18 AM', '3:55:37 AM', 1),
(9, 4, '04', '21', '2022', '3:32:49 AM', '3:34:49 AM', '3:32:53 AM', '3:37:25 AM', 1),
(11, 6, '04', '21', '2022', '4:06:57 AM', '4:07:07 AM', '4:07:14 AM', '4:07:22 AM', 1),
(12, 2, '04', '21', '2022', '12:50:01 PM', '12:50:06 PM', '12:50:14 PM', '12:50:17 PM', 1),
(14, 3, '04', '21', '2022', '1:46:48 PM', '1:50:11 PM', '1:50:20 PM', '1:50:22 PM', 1),
(15, 6, '04', '22', '2022', '12:00:11 AM', '12:28:09 PM', '12:30:21 PM', NULL, 1),
(16, 3, '04', '22', '2022', '12:01:52 AM', NULL, NULL, NULL, 1),
(17, 2, '04', '22', '2022', '12:31:26 PM', NULL, NULL, NULL, 1),
(18, 3, '06', '30', '2022', '1:53:47 PM', '1:54:06 PM', '1:55:05 PM', NULL, 1),
(19, 2, '07', '01', '2022', '1:54:14 AM', '1:54:44 AM', '9:18:03 PM', '9:18:03 PM', 1),
(20, 4, '07', '01', '2022', '9:18:31 PM', '11:52:13 PM', NULL, NULL, 1),
(37, 2, '07', '02', '2022', '1:04:32 AM', '1:04:32 AM', '1:04:32 AM', '1:04:32 AM', 2),
(38, 6, '07', '02', '2022', '1:20:56 AM', '1:20:56 AM', '1:20:56 AM', '1:20:56 AM', 2),
(39, 1, '07', '02', '2022', '2:19:56 AM', '2:19:56 AM', '2:19:56 AM', '2:19:56 AM', 2),
(42, 3, '07', '02', '2022', '3:53:02 AM', '3:53:02 AM', '3:53:02 AM', '3:53:02 AM', 2),
(43, 3, '07', '03', '2022', '1:13:11 AM', '1:13:13 AM', '1:13:14 AM', '1:13:15 AM', 1),
(44, 2, '07', '03', '2022', '2:19:11 AM', '2:19:12 AM', '2:19:13 AM', '2:19:14 AM', 1);

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
  `agency` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `profile_picture`, `username`, `password`, `fullname`, `agency`) VALUES
(1, 0x89504e470d0a1a0a0000000d4948445200000040000000400806000000aa6971de000000017352474200aece1ce90000023649444154789ced5a5b8ec4200cebacf60adcff801c62f70b09214ae23c7047c59fd314129364c0e5536bfdbb5e8c1fb6036c1c02d80eb07108603bc0461a01a594ab9492357c1844025a20d660d0f7347345920b65003269ad553de66cdcbbb9a2b34a24a0d6aa0e06c52c98d55cbd7d944fb426a859c9de2623f8eb22112005df0738da466723f56f7015cc8a84489809b07662a4b965f59e1eb40c68c149416693f09b35b0f4d776f75c5b1651800940bb7773faa9bb423501b55668c3d2ded1fcd68f3366413671500fe81d436a5713c48e8637c3678724d608b006e97d7f852d043c19470f603bc0c62180ed001b8700b6036cbc9e00f556f86e37c7dac145c19d011615f74992394c401349c795ef0f334f094e03971e9079d44545506b897e451394b2cab3006e456867ba672846ae0cd0a4a997a0b1df489980f6209880bed9f54eae6c7b1b545293e6b87ba625c19401688342a431d4a6b745b2a5c15502daef782b9b8c1e82100737418d1688968746f2b2968e041501e8c052bd6ac7d3f40254951e016540d4be1fcd22647ed4c7b42f435e6803f12eca57ec0433f17a025425f0ed67fe155e9f018700b6036c1c02d80eb0f17a02e0b3c093ff122d770a4502c6412559ca73b131fa52a4e694a92e01ebbd1dcf79df720a5d49f6334097a5a515f1968a55d5598d2521ecba7c749fd8d56be01e705db840b91a3733504df698f4801d72b85632bb7b366bde333b9100a4a1cc9e5b5678e7c7963051742663457ec5c9b23ff704d90eb07108603bc0c63f97244aa2201a4ae30000000049454e44ae426082, 'test', '$2y$10$xyAQEUkQ0Nlu2kyAeiCNIemTLE7NV.A57vhdWCYar3qg1gEUIA69O', 'test', 'test'),
(2, NULL, 'admin', '$2y$10$5trHhiGXRnAgn.iSkFCH4.vacMEldrVk7.avfL33HHzACMWb9bBH2', 'admin', 'admin'),
(3, NULL, 'jovanny', '$2y$10$K/coVSmwrltCiIQzAaVS2uz.KmNpoY9zep2OdT3qZnJ5RNi3oKBZ6', 'Jovanny E. Trillo', 'AMA'),
(4, NULL, 'jovany', '$2y$10$BxW8.OVfuAWHXQl6FGt1EOaJgdU0Yv1TO1SNsEhWSD5Dbpc8jRP4W', 'asd', 'asd'),
(6, NULL, 'emot', '$2y$10$AZ5VemYqBKA0Ck.wnx.h2uooiFrkTJ/mWnW9sxHTV3yfTI0mKUGOW', 'Emoty the cat', 'emot agency');

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
  MODIFY `entry_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
