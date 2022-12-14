-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 12:16 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminusers`
--

CREATE TABLE `adminusers` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `type` int(11) NOT NULL,
  `activity_status` int(11) NOT NULL,
  `activate_code` int(11) NOT NULL,
  `Reg_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adminusers`
--

INSERT INTO `adminusers` (`id`, `name`, `email`, `password`, `type`, `activity_status`, `activate_code`, `Reg_date`) VALUES
(1, 'sahan senarathna', 'sahan@gmail.com', 'N1BMamNadzNTbnpQSG4zZ1pvZWR4Zz09', 0, 0, 2563, '2022-11-14 11:35:19'),
(2, 'malith deshan', 'malith@gmail.com', 'T1lNV21qbnJsM3YvTEw3R2pMU0tVdz09', 1, 1, 1793, '2022-11-14 16:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_doller`
--

CREATE TABLE `deposit_doller` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` text NOT NULL,
  `tran_id` text NOT NULL,
  `lkramt` double NOT NULL,
  `dolleramt` double NOT NULL,
  `adminid` int(11) DEFAULT NULL,
  `adminname` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` text NOT NULL,
  `up_date` datetime NOT NULL,
  `partnercode` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `subscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deposit_doller`
--

INSERT INTO `deposit_doller` (`id`, `userid`, `name`, `tran_id`, `lkramt`, `dolleramt`, `adminid`, `adminname`, `message`, `image`, `up_date`, `partnercode`, `status`, `subscription`) VALUES
(5, 2, 'kasun kavinda', '1670208770', 12500, 33.97, NULL, NULL, NULL, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-12388851.jpg', '2022-12-05 03:52:50', 0, 0, 0),
(6, 2, 'kasun kavinda', '1670209477', 2312, 6.28, NULL, NULL, NULL, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-30220186.jpg', '2022-12-05 04:04:37', 0, 0, 0),
(7, 2, 'kasun kavinda', '1670209549', 2312, 6.28, NULL, NULL, NULL, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-7973431.jpg', '2022-12-05 04:05:49', 0, 0, 0),
(8, 2, 'kasun kavinda', '1670209652', 34142, 92.78, NULL, NULL, NULL, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-1428538.jpg', '2022-12-05 04:07:32', 0, 0, 0),
(9, 2, 'kasun kavinda', '1670210087', 12500, 33.97, NULL, NULL, NULL, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-33340918.jpg', '2022-12-05 04:14:47', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `doller_rate`
--

CREATE TABLE `doller_rate` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `rate` double NOT NULL,
  `add_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doller_rate`
--

INSERT INTO `doller_rate` (`id`, `admin_id`, `rate`, `add_date`) VALUES
(1, 1, 370.36, '2022-12-02'),
(2, 1, 368, '2022-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `email_verification` int(11) NOT NULL,
  `language` text NOT NULL,
  `mobile_no` text NOT NULL,
  `mobile_status` int(11) NOT NULL,
  `password` text NOT NULL,
  `dob` date NOT NULL,
  `address` text DEFAULT NULL,
  `street` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `zip_code` int(11) NOT NULL,
  `account_status` int(11) NOT NULL,
  `address_status` int(11) NOT NULL,
  `subcription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `email`, `email_verification`, `language`, `mobile_no`, `mobile_status`, `password`, `dob`, `address`, `street`, `country`, `city`, `zip_code`, `account_status`, `address_status`, `subcription`) VALUES
(2, 'kasun', 'kavinda', 'sahan1@gmail.com', 2319, 'English', '0777836963', 44983, 'c3gyb0w5blpJYjAzRWFvTGpYV3grUT09', '2022-11-17', NULL, NULL, NULL, NULL, 0, 3, 2, 0),
(3, 'malith', 'deshan', 'malith@gmail.coma', 8196, 'English', '0777852365', 58336, 'c3gyb0w5blpJYjAzRWFvTGpYV3grUT09', '2022-11-16', NULL, NULL, NULL, NULL, 0, 1, 0, 0),
(4, 'sahan', 'senarath', 'sahan@gmail.com', 9727, 'English', '0777856532', 67923, 'N0VqMjJiN09tcjllUTBwWm1uMGFGZz09', '2022-11-25', 'hakmana road', 'wakwella ', 'sri lanka', 'matar', 82000, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_images`
--

CREATE TABLE `user_images` (
  `id` int(11) NOT NULL,
  `nic_Image` text DEFAULT NULL,
  `address_img` text DEFAULT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_images`
--

INSERT INTO `user_images` (`id`, `nic_Image`, `address_img`, `status`, `user_id`) VALUES
(6, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-69545261.jpg', NULL, 0, 2),
(7, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-68057335.jpg', NULL, 0, 2),
(8, '0', NULL, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `warrning_tbl`
--

CREATE TABLE `warrning_tbl` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `warrning_tbl`
--

INSERT INTO `warrning_tbl` (`id`, `user_id`, `name`, `message`, `date`, `status`) VALUES
(2, 1, 'name', 'message', '2022-12-04 18:23:54', 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw_doller`
--

CREATE TABLE `withdraw_doller` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `name` text NOT NULL,
  `tran_id` text NOT NULL,
  `lkramt` double NOT NULL,
  `dolleramt` double NOT NULL,
  `adminid` int(11) DEFAULT NULL,
  `adminname` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `image` text NOT NULL,
  `up_date` datetime NOT NULL,
  `bankusername` text NOT NULL,
  `bank` text NOT NULL,
  `branch` text NOT NULL,
  `account_no` text NOT NULL,
  `status` int(11) NOT NULL,
  `subscription` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `withdraw_doller`
--

INSERT INTO `withdraw_doller` (`id`, `userid`, `name`, `tran_id`, `lkramt`, `dolleramt`, `adminid`, `adminname`, `message`, `image`, `up_date`, `bankusername`, `bank`, `branch`, `account_no`, `status`, `subscription`) VALUES
(17, 2, 'kasun kavinda', '1670302178', 350, 128800, NULL, NULL, NULL, 'upload/MEM1djlKRWpNUXJZKzdOMisyODdMQT09/N-73590065.jpeg', '2022-12-06 05:49:38', 'kasun kavinda', 'HNB', 'matara', '5643851634515', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminusers`
--
ALTER TABLE `adminusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deposit_doller`
--
ALTER TABLE `deposit_doller`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doller_rate`
--
ALTER TABLE `doller_rate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_images`
--
ALTER TABLE `user_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_PersonOrder` (`user_id`);

--
-- Indexes for table `warrning_tbl`
--
ALTER TABLE `warrning_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `withdraw_doller`
--
ALTER TABLE `withdraw_doller`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminusers`
--
ALTER TABLE `adminusers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deposit_doller`
--
ALTER TABLE `deposit_doller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `doller_rate`
--
ALTER TABLE `doller_rate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_images`
--
ALTER TABLE `user_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `warrning_tbl`
--
ALTER TABLE `warrning_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `withdraw_doller`
--
ALTER TABLE `withdraw_doller`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_images`
--
ALTER TABLE `user_images`
  ADD CONSTRAINT `FK_PersonOrder` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
