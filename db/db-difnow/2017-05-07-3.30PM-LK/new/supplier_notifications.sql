-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2017 at 09:06 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `direct2door_erp_new_phase_two`
--

-- --------------------------------------------------------

--
-- Table structure for table `supplier_notifications`
--

CREATE TABLE `supplier_notifications` (
  `id` int(11) NOT NULL,
  `supplierId` int(11) NOT NULL,
  `notificationText` text NOT NULL,
  `sentFrom` char(1) NOT NULL DEFAULT '1' COMMENT '1-system',
  `created` varchar(20) NOT NULL,
  `modified` datetime NOT NULL,
  `orderId` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-pendin, 1-confirm',
  `deleted` int(1) NOT NULL DEFAULT '0' COMMENT '0-no, 1-yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supplier_notifications`
--
ALTER TABLE `supplier_notifications`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supplier_notifications`
--
ALTER TABLE `supplier_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
