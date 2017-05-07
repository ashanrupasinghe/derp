-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2017 at 08:54 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `direct2door_erp_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `latitude` varchar(12) DEFAULT NULL,
  `longitude` varchar(12) DEFAULT NULL,
  `callcenterId` int(11) NOT NULL,
  `deliveryId` int(11) NOT NULL,
  `subTotal` float NOT NULL,
  `tax` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `couponCode` varchar(50) DEFAULT NULL,
  `total` float NOT NULL,
  `deliveryDate` date NOT NULL,
  `deliveryTime` time NOT NULL,
  `note` varchar(250) DEFAULT NULL,
  `supplier_note` text NOT NULL,
  `paymentStatus` char(1) NOT NULL DEFAULT '1' COMMENT '''1''=>''pending'',''2''=>''cash'',''3''=>''card'', ''4''=>''credit''',
  `status` char(1) NOT NULL DEFAULT '1' COMMENT '1-pending,2-supplier_informed,3-products_ready,4-delivery_tookover,5-delivered,6-completed,7-driver informed 9-cancelled',
  `created` varchar(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0' COMMENT '0-no, 1-yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
