-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2021 at 02:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `denzel`
--

-- --------------------------------------------------------

--
-- Table structure for table `codee`
--

CREATE TABLE `codee` (
  `ID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `CODE` int(11) NOT NULL,
  `Created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Expiration` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codee`
--

INSERT INTO `codee` (`ID`, `userID`, `CODE`, `Created`, `Expiration`) VALUES
(1, 13, 719853, '2021-04-25 01:04:02', '2021-04-25 09:09:02'),
(2, 1, 104580, '2021-04-25 01:22:41', '2021-04-25 09:27:41'),
(3, 1, 518763, '2021-04-25 20:57:41', '2021-04-26 05:02:41'),
(4, 1, 129078, '2021-04-25 20:58:57', '2021-04-26 05:03:57'),
(5, 1, 770589, '2021-04-26 02:27:59', '2021-04-26 10:32:59'),
(6, 1, 731884, '2021-04-27 01:22:31', '2021-04-27 09:27:31'),
(7, 1, 681062, '2021-04-27 01:33:12', '2021-04-27 09:38:12'),
(8, 1, 281109, '2021-04-27 00:07:33', '2021-04-27 08:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(11) NOT NULL,
  `ACTIVITY` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `date_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`event_id`, `ACTIVITY`, `user_id`, `date_time`) VALUES
(1, 'LOGIN', 'ADMIN', '2021-04-27 08:07:33'),
(2, 'LOGIN SUCCESSFULLY', 'ADMIN', '2021-04-27 08:07:45'),
(3, 'LOGOUT', 'ADMIN', '2021-04-27 08:08:11'),
(4, 'FORGOT PASSWORD', 'dinzil', '2021-04-27 08:08:48'),
(5, 'CHANGE PASSWORD', 'dinzil', '2021-04-27 08:09:17'),
(6, 'LOGOUT', 'ADMIN', '2021-04-27 08:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `regform`
--

CREATE TABLE `regform` (
  `id` int(11) NOT NULL,
  `usernamee` varchar(30) NOT NULL,
  `paswordd` varchar(30) NOT NULL,
  `emaill` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `regform`
--

INSERT INTO `regform` (`id`, `usernamee`, `paswordd`, `emaill`) VALUES
(1, 'ADMIN', 'ADMIN123', 'admin@gmail.com'),
(13, 'dinzil', 'denDENZZ@24', 'den@yahoo.com'),
(23, 'denzel', 'denDEN@24', 'ardenzpolicarpio@yahoo.com'),
(24, 'arabella', 'araARA123@', 'arabellap659@gmail.com'),
(25, 'joel', 'joelLEOJ@24', 'joel@yahoo.com'),
(44, 'ara', 'araARA@23', 'arabellaap659@gmail.com'),
(47, 'adaaa', 'asdASD123@', 'ardenzpolicarpio@yahoo.com'),
(48, 'denz', 'denDENN@23', 'denz@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codee`
--
ALTER TABLE `codee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `regform`
--
ALTER TABLE `regform`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codee`
--
ALTER TABLE `codee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `regform`
--
ALTER TABLE `regform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
