-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2022 at 07:59 PM
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
-- Database: `system_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `midlename` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `user_name` varchar(10) NOT NULL,
  `passw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `firstname`, `midlename`, `lastname`, `user_name`, `passw`) VALUES
(1, 'jane', '', 'doe', 'fix', 'admincontrol'),
(2, 'smith', '', 'smith', 'smith', 'smithcontrol');

-- --------------------------------------------------------

--
-- Table structure for table `brancha`
--

CREATE TABLE `brancha` (
  `id` int(11) UNSIGNED NOT NULL,
  `Product` varchar(50) NOT NULL,
  `Prod_id` varchar(50) NOT NULL,
  `Brand` varchar(50) NOT NULL,
  `Quan` int(255) NOT NULL,
  `Date_Created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brancha`
--

INSERT INTO `brancha` (`id`, `Product`, `Prod_id`, `Brand`, `Quan`, `Date_Created`) VALUES
(39, ' 5535    ', '              ', '              ', 0, '2022-11-08 13:39:18'),
(40, '444', '', '', 0, '2022-11-08 13:39:18'),
(41, 'Hi B', '', '', 0, '2022-11-08 13:39:18'),
(42, 'bewbs', 'whaat', 'smuch', 333, '2022-11-08 13:39:18'),
(45, '   hoiours   ', ' 222       22221', '      ', 0, '2022-11-08 13:40:29'),
(47, 'need', '', '', 0, '2022-11-09 17:36:03');

-- --------------------------------------------------------

--
-- Table structure for table `branchb`
--

CREATE TABLE `branchb` (
  `id` int(255) NOT NULL,
  `Product` varchar(100) NOT NULL,
  `Prod_id` varchar(100) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Quan` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branchb`
--

INSERT INTO `branchb` (`id`, `Product`, `Prod_id`, `Brand`, `Quan`) VALUES
(4, '   Hi A   ', '      ', '      ', 199),
(5, ' bews', '', '', 0),
(6, 'HI AGAIN', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sent_ab`
--

CREATE TABLE `sent_ab` (
  `Product` varchar(100) NOT NULL,
  `Prod_id` varchar(100) NOT NULL,
  `Brand` varchar(100) NOT NULL,
  `Quan` int(255) NOT NULL,
  `Date/Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sent_ab`
--

INSERT INTO `sent_ab` (`Product`, `Prod_id`, `Brand`, `Quan`, `Date/Time`) VALUES
(' 222 ', '', '', 4, '2022-11-10 01:59:40');

-- --------------------------------------------------------

--
-- Table structure for table `sent_ba`
--

CREATE TABLE `sent_ba` (
  `Product` varchar(255) NOT NULL,
  `Prod_id` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `Quan` int(255) NOT NULL,
  `Date/Time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brancha`
--
ALTER TABLE `brancha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branchb`
--
ALTER TABLE `branchb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sent_ab`
--
ALTER TABLE `sent_ab`
  ADD PRIMARY KEY (`Prod_id`);

--
-- Indexes for table `sent_ba`
--
ALTER TABLE `sent_ba`
  ADD PRIMARY KEY (`Product`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brancha`
--
ALTER TABLE `brancha`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `branchb`
--
ALTER TABLE `branchb`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
