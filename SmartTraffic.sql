-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2021 at 01:04 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SmartTraffic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `lastname` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `sex` enum('Male','Female') COLLATE latin1_general_ci NOT NULL,
  `contactno` bigint(12) NOT NULL,
  `email` varchar(24) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `otp` varchar(10) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `sex`, `contactno`, `email`, `password`, `otp`) VALUES
(1, 'Test', 'Number1', 'Female', 9123456789, 'Test1@gmail.com', 'test1', '70350'),
(2, 'Test', 'Number 2', 'Male', 9123456789, 'Test2@gmail.com', 'test2', ''),
(3, 'Test', 'Number 3', 'Female', 9123456789, 'Test3@gmail.com', 'test3', ''),
(4, 'Test', 'Number 4', 'Male', 9123456789, 'Test4@gmail.com', 'test4', ''),
(5, 'Joshua', 'Tiansing', 'Male', 9123456789, 'jynnjy7@gmail.com', '123', '27134'),
(6, 'Test 5', 'Number 5', 'Male', 9123456789, 'Test5@gmail.com', 'test5', ''),
(7, 'mengmeg', 'pusa', 'Male', 9123456789, 'jel.delatado@gmail.com', '123', ''),
(8, 'Test6', 'Number6', 'Male', 9123456789, 'Test6@gmail.com', '123', '');

-- --------------------------------------------------------

--
-- Table structure for table `otp_verify`
--

CREATE TABLE `otp_verify` (
  `id` int(11) NOT NULL,
  `otp` varchar(10) COLLATE latin1_general_ci NOT NULL,
  `is_expired` int(11) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
