-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2014 at 07:40 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `indus_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `person_id` int(11) NOT NULL,
  `house_no` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `auctioner`
--

CREATE TABLE IF NOT EXISTS `auctioner` (
  `auctioner_id` int(11) NOT NULL,
  `auction_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collector`
--

CREATE TABLE IF NOT EXISTS `collector` (
  `collector_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `person_id` int(11) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `landline` varchar(15) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cost_price`
--

CREATE TABLE IF NOT EXISTS `cost_price` (
  `item_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `customer_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `selling_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dealer`
--

CREATE TABLE IF NOT EXISTS `dealer` (
  `dealer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL,
  `salary` decimal(10,0) NOT NULL,
  `doj` date NOT NULL COMMENT 'Date of joining'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `condition` varchar(100) NOT NULL,
  `collector_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE IF NOT EXISTS `person` (
`person_id` int(11) NOT NULL,
  `f_name` varchar(100) NOT NULL COMMENT 'First Name',
  `l_name` varchar(100) DEFAULT NULL COMMENT 'last name',
  `dob` date NOT NULL COMMENT 'Date of birth',
  `sex` char(1) NOT NULL COMMENT 'Gender',
  `age` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `regular_worker`
--

CREATE TABLE IF NOT EXISTS `regular_worker` (
  `emp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE IF NOT EXISTS `seller` (
  `seller_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `selling_price`
--

CREATE TABLE IF NOT EXISTS `selling_price` (
  `item_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `specialist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE IF NOT EXISTS `specialist` (
  `emp_id` int(11) NOT NULL,
  `item_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(10) unsigned NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
 ADD KEY `idx_addresses` (`person_id`);

--
-- Indexes for table `auctioner`
--
ALTER TABLE `auctioner`
 ADD KEY `idx_auctioner` (`auctioner_id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
 ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `collector`
--
ALTER TABLE `collector`
 ADD UNIQUE KEY `idx_collector` (`collector_id`), ADD KEY `idx_collector_0` (`item_id`), ADD KEY `idx_collector_1` (`client_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD KEY `idx_contact` (`person_id`);

--
-- Indexes for table `cost_price`
--
ALTER TABLE `cost_price`
 ADD PRIMARY KEY (`item_id`), ADD KEY `idx_cost_price` (`client_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD KEY `idx_customer` (`customer_id`), ADD KEY `idx_customer_0` (`item_id`);

--
-- Indexes for table `dealer`
--
ALTER TABLE `dealer`
 ADD KEY `idx_dealer` (`dealer_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
 ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`), ADD KEY `idx_item` (`collector_id`), ADD KEY `idx_item_0` (`customer_id`), ADD KEY `idx_item_1` (`client_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
 ADD PRIMARY KEY (`person_id`);

--
-- Indexes for table `regular_worker`
--
ALTER TABLE `regular_worker`
 ADD KEY `idx_regular_worker` (`emp_id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
 ADD KEY `idx_seller` (`seller_id`);

--
-- Indexes for table `selling_price`
--
ALTER TABLE `selling_price`
 ADD PRIMARY KEY (`item_id`), ADD KEY `idx_selling_price` (`specialist_id`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
 ADD KEY `idx_spcialist` (`emp_id`), ADD KEY `idx_spcialist_0` (`item_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
ADD CONSTRAINT `fk_addresses_persons` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `auctioner`
--
ALTER TABLE `auctioner`
ADD CONSTRAINT `fk_auctioner_client` FOREIGN KEY (`auctioner_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
ADD CONSTRAINT `fk_client_person` FOREIGN KEY (`client_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `collector`
--
ALTER TABLE `collector`
ADD CONSTRAINT `fk_collector_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_collector_employee` FOREIGN KEY (`collector_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_collector_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
ADD CONSTRAINT `fk_contact_person` FOREIGN KEY (`person_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `cost_price`
--
ALTER TABLE `cost_price`
ADD CONSTRAINT `fk_cost_price_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_cost_price_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
ADD CONSTRAINT `fk_customer_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_customer_person` FOREIGN KEY (`customer_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `dealer`
--
ALTER TABLE `dealer`
ADD CONSTRAINT `fk_dealer_client` FOREIGN KEY (`dealer_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
ADD CONSTRAINT `fk_employee_persons` FOREIGN KEY (`emp_id`) REFERENCES `person` (`person_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
ADD CONSTRAINT `fk_item_client` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE SET NULL ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_item_collector` FOREIGN KEY (`collector_id`) REFERENCES `collector` (`collector_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `regular_worker`
--
ALTER TABLE `regular_worker`
ADD CONSTRAINT `fk_regular_worker_employee` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `seller`
--
ALTER TABLE `seller`
ADD CONSTRAINT `fk_seller_client` FOREIGN KEY (`seller_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `selling_price`
--
ALTER TABLE `selling_price`
ADD CONSTRAINT `fk_selling_price_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `specialist`
--
ALTER TABLE `specialist`
ADD CONSTRAINT `fk_spcialist_employee` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`) ON DELETE CASCADE ON UPDATE NO ACTION,
ADD CONSTRAINT `fk_spcialist_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE SET NULL ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
