-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2017 at 08:59 AM
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
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `callcenter`
--

CREATE TABLE `callcenter` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT 'spanrupasinghe11@gmail.com',
  `address` text NOT NULL,
  `city` int(11) NOT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cid` int(11) NOT NULL,
  `did` int(11) NOT NULL,
  `cname` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` char(12) NOT NULL,
  `value` float NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-available, 1-used'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `latitude` varchar(12) DEFAULT NULL,
  `longitude` varchar(12) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `created` varchar(20) NOT NULL,
  `modified` varchar(20) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT 'spanrupasinghe11@gmail.com',
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `latitude` varchar(12) DEFAULT NULL,
  `longitude` varchar(12) DEFAULT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `vehicleNo` varchar(10) NOT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `status` char(1) NOT NULL,
  `rate` int(1) NOT NULL DEFAULT '1' COMMENT '1-one star,2-two star,3-threstar,4-four star,5-five star'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `delivery_notifications`
--

CREATE TABLE `delivery_notifications` (
  `id` int(11) NOT NULL,
  `deliveryId` int(11) NOT NULL,
  `notificationText` text NOT NULL,
  `sentFrom` char(1) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `orderId` int(11) NOT NULL,
  `status` int(1) NOT NULL COMMENT '0-pending, 1-took all, 2-delevered',
  `deleted` int(1) NOT NULL DEFAULT '0' COMMENT '0-no, 1-yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `did` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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

-- --------------------------------------------------------

--
-- Table structure for table `order_products`
--

CREATE TABLE `order_products` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_quantity` varchar(10) NOT NULL,
  `product_price` float NOT NULL COMMENT 'for a one item of the product',
  `supplier_id` int(11) NOT NULL,
  `status_s` int(1) NOT NULL COMMENT '0-pending, 1-available, 2-not available, 3-ready, 4-delivery handed over, 9-cancel',
  `status_d` int(1) NOT NULL DEFAULT '0' COMMENT '0-pending, 1-took over',
  `deleted` int(1) NOT NULL DEFAULT '0' COMMENT '0-no, 1-yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package_type`
--

CREATE TABLE `package_type` (
  `id` int(11) NOT NULL,
  `type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `name_si` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `name_ta` varchar(200) CHARACTER SET utf8 DEFAULT NULL,
  `sku` varchar(200) NOT NULL,
  `description` text,
  `price` float NOT NULL,
  `package` int(11) NOT NULL,
  `availability` char(1) NOT NULL COMMENT '1-available,2-not available',
  `image` varchar(255) DEFAULT NULL,
  `supplierId_removed` int(11) NOT NULL,
  `status` char(1) NOT NULL COMMENT '0-disabled,1-enabled',
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product_suppliers`
--

CREATE TABLE `product_suppliers` (
  `product_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT 'spanrupasinghe11@gmail.com',
  `address` varchar(255) NOT NULL,
  `city` int(11) NOT NULL,
  `latitude` varchar(12) DEFAULT NULL,
  `longitude` varchar(12) DEFAULT NULL,
  `contactNo` varchar(20) DEFAULT NULL,
  `mobileNo` varchar(20) NOT NULL,
  `faxNo` varchar(20) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `regNo` varchar(100) DEFAULT NULL,
  `rate` int(1) NOT NULL DEFAULT '1' COMMENT '1-one star,2-two star,3-threstar,4-four star,5-five star',
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `status_d` int(1) NOT NULL DEFAULT '0' COMMENT '0-pending, 1-took over',
  `deleted` int(1) NOT NULL DEFAULT '0' COMMENT '0-no, 1-yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_type` char(1) NOT NULL COMMENT '1-admin,2-callcenter,3-supplier,4-delivery',
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1' COMMENT '0-disabled,1-enabled'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `id` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `notification` varchar(300) NOT NULL,
  `type` int(2) NOT NULL COMMENT '1-add new order, 2-product available, 3-product not available, 4-product ready, 5-product handover to delivery staff 6-product took over by delivery staff 7-order took over 8-order delivered 9-order cancelled 10-order completed',
  `seen` int(1) NOT NULL DEFAULT '0' COMMENT '0-not seen 1-seen',
  `created` varchar(20) DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `deleted` int(1) NOT NULL DEFAULT '0' COMMENT '0-no, 1-yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `watchdog`
--

CREATE TABLE `watchdog` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `loggedIn` varchar(20) NOT NULL,
  `loggedOut` varchar(20) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callcenter`
--
ALTER TABLE `callcenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `cname` (`cname`),
  ADD KEY `cname_2` (`cname`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_notifications`
--
ALTER TABLE `delivery_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_products`
--
ALTER TABLE `order_products`
  ADD PRIMARY KEY (`order_id`,`product_id`);

--
-- Indexes for table `package_type`
--
ALTER TABLE `package_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_suppliers`
--
ALTER TABLE `product_suppliers`
  ADD PRIMARY KEY (`product_id`,`supplier_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier_notifications`
--
ALTER TABLE `supplier_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watchdog`
--
ALTER TABLE `watchdog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `callcenter`
--
ALTER TABLE `callcenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2089;
--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=431;
--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `delivery_notifications`
--
ALTER TABLE `delivery_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=935;
--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=935;
--
-- AUTO_INCREMENT for table `package_type`
--
ALTER TABLE `package_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3811;
--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `supplier_notifications`
--
ALTER TABLE `supplier_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2103;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12384;
--
-- AUTO_INCREMENT for table `watchdog`
--
ALTER TABLE `watchdog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
