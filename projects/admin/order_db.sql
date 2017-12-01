-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 06:30 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aml_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `order_db`
--

CREATE TABLE `order_db` (
  `order_id` int(11) NOT NULL,
  `order_code` varchar(255) DEFAULT NULL,
  `order_table` varchar(255) DEFAULT NULL,
  `order_waiter` varchar(255) DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `order_served` varchar(10) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `order_name` varchar(45) DEFAULT NULL,
  `order_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_db`
--

INSERT INTO `order_db` (`order_id`, `order_code`, `order_table`, `order_waiter`, `order_time`, `order_served`, `order_date`, `order_quantity`, `order_name`, `order_price`) VALUES
(38, '40', NULL, 'w4', NULL, '', NULL, 1, 'Kilawen Tanguigui', 225),
(39, '41', NULL, 'w1\n', NULL, '', NULL, 1, 'Kilawen Tanguigui', 225),
(40, '42', NULL, 'w2', NULL, '', NULL, 1, 'Kilawen Tanguigui', 225),
(41, '43', NULL, 'w4', NULL, '', NULL, 1, 'Kilawen Tanguigui', 225),
(42, '43', NULL, 'w4', NULL, '', NULL, 1, '1/2 Fried Chicken Garlic Sauce', 200),
(43, '44', NULL, 'w3', NULL, '', NULL, 1, 'Kilawen Tanguigui', 225),
(44, '44', NULL, 'w3', NULL, '', NULL, 1, '1/2 Fried Chicken Garlic Sauce', 200),
(45, '44', NULL, 'w3', NULL, '', NULL, 1, 'Blue Margarita', 90),
(46, '45', NULL, 'w4', NULL, '', NULL, 1, 'Kilawen Tanguigui', 225),
(47, '45', NULL, 'w4', NULL, '', NULL, 1, '1/2 Fried Chicken Garlic Sauce', 200),
(48, '45', NULL, 'w4', NULL, '', NULL, 1, 'Blue Margarita', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `order_db`
--
ALTER TABLE `order_db`
  ADD PRIMARY KEY (`order_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `order_db`
--
ALTER TABLE `order_db`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
