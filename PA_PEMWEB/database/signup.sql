-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2023 at 10:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posttest5`
--

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `username`, `password`) VALUES
(1, 'aryuka', '$2y$10$QT3IhfWd3LzvVnrgsXwMc.or357uNz/rOqNUHC3uJWUhUbpugInia'),
(2, 'lala', '$2y$10$73K8npeGKKQui9ZtvAypCuMTfEhylYz8N2Xq8I9RmCJ9.rhVEYjt2'),
(3, 'wer', '$2y$10$9j.pXU11CQyv2M5s3/6cRuqQrDEMcCJII1obLANtaX47YY38NZ6C2'),
(4, 'yuka', '$2y$10$yOBb/Q8nQVAQLkYCrErOoOGwqGjKhKHIE.EinftKTdoqDH0uKAv.2'),
(5, 'user', '$2y$10$VlIZ8SGJxAJRBkQJYxQhYu2R0IFXwXsk8ULN3fCSIyvoYLtHTDWIq'),
(6, 'yuka aja deh', '$2y$10$kURXvagKzLMv80YqL66jt.OPenBqOoh4YiwYSqSvN92Hma5l//3ja'),
(7, 'aryukapn', '$2y$10$yC20Pkkacgsm/pBYQSVhUefrwqL1gmteG5GTbuxpyvQZJlm7O8agO'),
(8, 'puput', '$2y$10$a.6Wt15yda8/P3QYQ2BO6.ZaW.VpZOWBcHe0hxeZnhwZBQ6EPxjTC'),
(9, 'yukaaja', '$2y$10$0T0nxktZQXEMNvZ9hJHEDuY1iurvgvTRs0W3hVi3tiIZbAcklX5aG'),
(10, 'rara', '$2y$10$bDallvja8oYLQg9NoYR6OOWdwsmeaBiLctAoJeaH0Kbgsmn3lGXnu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
