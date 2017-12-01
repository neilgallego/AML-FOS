-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2017 at 10:06 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Nname` varchar(10) NOT NULL,
  `Position` varchar(10) NOT NULL,
  `Lname` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Nname`, `Position`, `Lname`) VALUES
('\0', '\0', ''),
('\0', '\0', ''),
('papit', 'waiter', ''),
('papitaaaa', 'waiter', ''),
('pol', 'manager', ''),
('tokmol', 'puss', 'papiiii'),
('Mark', 'Waiter', ''),
('Kevin', 'Checker', ''),
('Karl', 'waiter', ''),
('Mike', 'Waiter', ''),
('Paolo', 'Waiter', ''),
('Kevin', 'Baker', '');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `Tno` varchar(10) NOT NULL,
  `Tbill` int(10) DEFAULT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `time`, `Tno`, `Tbill`, `date`) VALUES
(1, '10:00', 'c15', 3500, '9-09-17'),
(2, '2:30', 'b2', 1300, '5-04-17'),
(3, '3:30', 'A2', 1200, '5-02-17'),
(4, '1:30', 'c3', 500, '6-06-17'),
(5, '8:15', 'c4', 350, '2-18-17'),
(6, '9:46', 'c1', 320, '4-15-17'),
(7, '', '', NULL, ''),
(8, '3:30', 'r3', 430, '4-17-11'),
(9, '2:20', 'x3', 550, '4-18-17'),
(10, '1:30', 'a4', 267, '3-16-17'),
(11, '1:40', 'a6', 290, '2-15-17'),
(12, '4:50', 'c6', 420, '5-18-17'),
(13, '8:30', 'c1', 320, '5-23-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
