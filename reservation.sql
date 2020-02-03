-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2020 at 12:55 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `equipment_admin`
--

CREATE TABLE `equipment_admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `equipmentname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `created_by` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment_admin`
--

INSERT INTO `equipment_admin` (`id`, `equipmentname`, `description`, `created_by`) VALUES
(5, 'ewossjshfhhso', 'sueiitieiit', '2019-04-19 14:11:42'),
(6, 'ssssssssssssss', 'wwwwwwwwwwwww', '2019-04-21 00:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `facilities_admin`
--

CREATE TABLE `facilities_admin` (
  `faci_id` bigint(20) UNSIGNED NOT NULL,
  `facilityname` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL,
  `created_by` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `facilities_admin`
--

INSERT INTO `facilities_admin` (`faci_id`, `facilityname`, `description`, `created_by`) VALUES
(5, 'qqqqqqqqqqqqqq', 'ffffffffffffff', '2019-04-19 14:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `reservation_system`
--

CREATE TABLE `reservation_system` (
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `faci_id` varchar(50) NOT NULL,
  `id` varchar(50) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_place` varchar(40) NOT NULL,
  `guest` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `created_by` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation_system`
--

INSERT INTO `reservation_system` (`reservation_id`, `faci_id`, `id`, `event_name`, `event_place`, `guest`, `date`, `created_by`) VALUES
(8, '', 'flag', 'Palaro', 'Multi Purpose', 'Mika', '2019-12-28', '2019-05-10 22:25:00'),
(9, '', 'l;xclz', 'test', 'test test', 'test guest', '2019-01-01', '2019-05-12 09:53:44'),
(10, '', 'sssssssssssss', 'Palaro', 'assssssssssssss', 'sssssssssssss', '2019-12-31', '2019-05-13 13:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `users_admin`
--

CREATE TABLE `users_admin` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `contact_number` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `user_type` varchar(15) NOT NULL,
  `created_by` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_admin`
--

INSERT INTO `users_admin` (`user_id`, `username`, `password`, `fullname`, `contact_number`, `address`, `user_type`, `created_by`) VALUES
(3, 'papa', '0ac6cd34e2fac333bf0ee3cd06bdcf96', 'papa', 9097, 'papa', 'student', '2019-04-19 11:42:57'),
(4, 'michelle', 'e10adc3949ba59abbe56e057f20f883e', 'Michelle Panganiban', 2147483647, 'Salvacion Baybay Calabanga Camarines Sur', 'student', '2019-04-23 21:37:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipment_admin`
--
ALTER TABLE `equipment_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `facilities_admin`
--
ALTER TABLE `facilities_admin`
  ADD PRIMARY KEY (`faci_id`),
  ADD UNIQUE KEY `faci_id` (`faci_id`);

--
-- Indexes for table `reservation_system`
--
ALTER TABLE `reservation_system`
  ADD PRIMARY KEY (`reservation_id`),
  ADD UNIQUE KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `users_admin`
--
ALTER TABLE `users_admin`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipment_admin`
--
ALTER TABLE `equipment_admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `facilities_admin`
--
ALTER TABLE `facilities_admin`
  MODIFY `faci_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation_system`
--
ALTER TABLE `reservation_system`
  MODIFY `reservation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_admin`
--
ALTER TABLE `users_admin`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
