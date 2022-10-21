-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2022 at 04:19 AM
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
-- Database: `ploy_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `or_id` int(11) NOT NULL,
  `or_uid` int(10) NOT NULL,
  `or_rid` int(10) NOT NULL,
  `or_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`or_id`, `or_uid`, `or_rid`, `or_timestamp`) VALUES
(7, 12, 1, '2022-10-06 07:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `r_id` int(10) NOT NULL,
  `r_name` varchar(100) NOT NULL,
  `r_detail` varchar(150) NOT NULL,
  `r_quan` int(10) NOT NULL,
  `r_img` varchar(100) NOT NULL,
  `r_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`r_id`, `r_name`, `r_detail`, `r_quan`, `r_img`, `r_timestamp`) VALUES
(1, 'ซูพีเรีย คิง (Superior King)', '1 เตียงเดี่ยว\r\n\r\nขนาดห้อง: 25 ตารางเมตร\r\n\r\nห้องปลอดบุหรี่\r\n\r\nฝักบัว\r\n\r\nฟรี! Wi-Fi', 23, '1.jpg', '2022-10-06 06:06:28'),
(2, 'ดีลักซ์ คิง (Deluxe King.)', '1 เตียงคิงไซส์\r\n\r\nขนาดห้อง: 28 ตารางเมตร\r\n\r\nห้องปลอดบุหรี่\r\n\r\nฝักบัว\r\n\r\nฟรี! Wi-Fi', 35, '2.jpg', '2022-10-06 06:06:28'),
(3, 'ห้องดีลักซ์สวีทเตียงคิงไซส์ (Deluxe King Suite)', '1 เตียงคิงไซส์\r\n\r\nขนาดห้อง: 30 ตารางเมตร\r\n\r\nฝักบัว\r\n\r\nฟรี! Wi-Fi', 0, '3.jpg', '2022-10-06 06:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) NOT NULL,
  `user_name` varchar(250) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_address`, `user_timestamp`) VALUES
(12, 'user01', '12345', 'thailand', '2022-10-06 03:43:23'),
(13, 'user02', '123456', 'thailand', '2022-10-06 03:44:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`or_id`),
  ADD KEY `or_rid` (`or_rid`),
  ADD KEY `or_uid` (`or_uid`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `or_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `r_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`or_rid`) REFERENCES `rooms` (`r_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`or_uid`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
