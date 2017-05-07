-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2017 at 09:05 AM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_si` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `name_ta` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `sku` varchar(200) NOT NULL,
  `description` text,
  `price` float NOT NULL,
  `package` int(11) NOT NULL,
  `availability` char(1) NOT NULL COMMENT '1-available,2-not available',
  `image` varchar(255) DEFAULT NULL,
  `supplierId_removed` int(11) DEFAULT NULL,
  `status` char(1) NOT NULL COMMENT '0-disabled,1-enabled',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `is_featured` int(1) NOT NULL DEFAULT '0',
  `is_new` int(1) NOT NULL DEFAULT '0',
  `is_sale` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
