-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 05:20 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank_blood_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` bigint(20) NOT NULL,
  `user_name` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `user_name`, `password`) VALUES
(0, 'admin', '12345'),
(0, 'admin', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `donor_table`
--

CREATE TABLE `donor_table` (
  `donor_id` bigint(20) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `blood_type` varchar(50) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` int(11) NOT NULL,
  `healthy_file` varchar(1000) NOT NULL,
  `Statuse` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donor_table`
--

INSERT INTO `donor_table` (`donor_id`, `full_name`, `user_name`, `password`, `blood_type`, `phone_number`, `address`, `age`, `healthy_file`, `Statuse`) VALUES
(11, 'Rabab', 'a', '202cb962ac59075b964b07152d234b70', 'O-', '987979879', 'sdsd', 0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donor_table`
--
ALTER TABLE `donor_table`
  ADD PRIMARY KEY (`donor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donor_table`
--
ALTER TABLE `donor_table`
  MODIFY `donor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
