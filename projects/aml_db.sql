-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 23, 2017 at 06:26 AM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `admin_password`
--

DROP TABLE IF EXISTS `admin_password`;
CREATE TABLE IF NOT EXISTS `admin_password` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_password`
--

INSERT INTO `admin_password` (`id`, `name`, `email`, `password`) VALUES
(1, 'Admin', 'mostlikers@gmail.com', 'c21f969b5f03d33d43e04f8f136e7682');

-- --------------------------------------------------------

--
-- Table structure for table `assigned_waiters`
--

DROP TABLE IF EXISTS `assigned_waiters`;
CREATE TABLE IF NOT EXISTS `assigned_waiters` (
  `d_id` int(11) NOT NULL AUTO_INCREMENT,
  `waiter` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`d_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assigned_waiters`
--

INSERT INTO `assigned_waiters` (`d_id`, `waiter`, `time`, `date`) VALUES
(0, 'hello', '20:48:13', '2017-11-22'),
(1, 'ayie', '20:48:13', '2017-11-22'),
(2, 'Cynlai', '20:48:13', '2017-11-22'),
(3, 'sad', '20:48:13', '2017-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
CREATE TABLE IF NOT EXISTS `billing` (
  `bill_id` int(11) NOT NULL,
  `bill_time` time DEFAULT NULL,
  `bill_date` date DEFAULT NULL,
  `table_no` varchar(65) NOT NULL,
  `no_sc` int(100) DEFAULT NULL,
  `no_pax` int(100) DEFAULT NULL,
  `total_discounts` decimal(65,2) NOT NULL,
  `cash_rcvd` decimal(65,0) NOT NULL,
  `transac_no` varchar(65) NOT NULL,
  `total_bill` decimal(65,0) NOT NULL,
  `change` decimal(65,0) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `charge_db`
--

DROP TABLE IF EXISTS `charge_db`;
CREATE TABLE IF NOT EXISTS `charge_db` (
  `charged_id` int(11) NOT NULL,
  `charged_code` varchar(255) DEFAULT NULL,
  `charged_table` varchar(255) DEFAULT NULL,
  `charged_waiter` varchar(255) DEFAULT NULL,
  `charged_time` time DEFAULT NULL,
  `charged_date` date DEFAULT NULL,
  `charged_quantity` int(11) DEFAULT NULL,
  `charged_name` varchar(255) DEFAULT NULL,
  `charged_price` decimal(65,2) DEFAULT NULL,
  `charged_type` varchar(255) DEFAULT NULL,
  `charged_tprice` decimal(65,2) DEFAULT NULL,
  `charged_priority` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`charged_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `charge_history`
--

DROP TABLE IF EXISTS `charge_history`;
CREATE TABLE IF NOT EXISTS `charge_history` (
  `chargedid_history` int(11) NOT NULL,
  `chargedcode_history` varchar(255) DEFAULT NULL,
  `chargedtable_history` varchar(255) DEFAULT NULL,
  `chargedwaiter_history` varchar(255) DEFAULT NULL,
  `chargedtime_history` time DEFAULT NULL,
  `chargeddate_history` date DEFAULT NULL,
  `chargedquantity_history` int(11) DEFAULT NULL,
  `chargedname_history` varchar(255) DEFAULT NULL,
  `chargedprice_history` decimal(65,2) DEFAULT NULL,
  `chargedtype_history` varchar(255) DEFAULT NULL,
  `chargedtprice_history` decimal(65,2) DEFAULT NULL,
  `chargedpriority_history` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`chargedid_history`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `config_time`
--

DROP TABLE IF EXISTS `config_time`;
CREATE TABLE IF NOT EXISTS `config_time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `happyhour_from` time NOT NULL,
  `happyhour_to` time NOT NULL,
  `reghour_from` time NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `config_time`
--

INSERT INTO `config_time` (`time_id`, `happyhour_from`, `happyhour_to`, `reghour_from`) VALUES
(1, '08:00:00', '10:00:00', '09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `Nname` varchar(255) DEFAULT NULL,
  `Position` varchar(255) DEFAULT NULL,
  `Lname` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `Nname`, `Position`, `Lname`) VALUES
(2, 'Jay', 'waiter2', NULL),
(3, 'Neil', 'waiter3', NULL),
(4, 'Steven', NULL, NULL),
(5, 'Leonard', NULL, NULL),
(6, 'mark', 'Waiter', 'agustin');

-- --------------------------------------------------------

--
-- Table structure for table `item_histroy`
--

DROP TABLE IF EXISTS `item_histroy`;
CREATE TABLE IF NOT EXISTS `item_histroy` (
  `itemH_id` int(65) NOT NULL AUTO_INCREMENT,
  `itemH_name` varchar(65) NOT NULL,
  `itemH_qty` int(65) NOT NULL,
  `itemH_date` date NOT NULL,
  PRIMARY KEY (`itemH_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_db`
--

DROP TABLE IF EXISTS `menu_db`;
CREATE TABLE IF NOT EXISTS `menu_db` (
  `menuitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `item_category` varchar(255) DEFAULT NULL,
  `item_happyprice` double DEFAULT NULL,
  `item_regularprice` double DEFAULT NULL,
  `item_availability` enum('not available','available') DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `item_commission` double DEFAULT NULL,
  `item_discount` double DEFAULT NULL,
  PRIMARY KEY (`menuitem_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=197 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_db`
--

INSERT INTO `menu_db` (`menuitem_id`, `name`, `item_category`, `item_happyprice`, `item_regularprice`, `item_availability`, `code`, `item_commission`, `item_discount`) VALUES
(1, 'Cold Cuts', 'Appetizer', 320, 350, 'available', 'AP01', 6, 0),
(2, 'Crispy Pata', 'Appetizer', 420, 440, 'available', 'AP02', 6, 0),
(3, '1/2 Fried Chicken', 'Appetizer', 180, 200, 'available', 'AP03', 6, 0),
(4, '1/2 Fried Chicken Garlic Sauce', 'Appetizer', 200, 220, 'available', 'AP04', 6, 0),
(5, 'Buttered Chicken', 'Appetizer', 200, 220, 'available', 'AP05', 6, 0),
(6, 'Chicken Wings', 'Appetizer', 180, 190, 'available', 'AP06', 6, 0),
(7, 'Chicken Lollipop', 'Appetizer', 180, 190, 'available', 'AP07', 6, 0),
(8, 'Chicharon Bulaklak', 'Appetizer', 150, 160, 'available', 'AP08', 6, 0),
(9, 'Lechon Kawali', 'Appetizer', 130, 140, 'available', 'AP09', 6, 0),
(10, 'Nilasing na Hipon', 'Appetizer', 200, 220, 'available', 'AP10', 6, 0),
(11, 'Camaron Rebosado', 'Appetizer', 190, 200, 'available', 'AP11', 6, 0),
(12, 'Calamares', 'Appetizer', 210, 2200, 'available', 'AP12', 6, 0),
(13, 'Fried Onion Rings', 'Appetizer', 100, 120, 'available', 'AP13', 3, 0),
(14, 'Shanghai Lumpia', 'Appetizer', 120, 140, 'available', 'AP14', 6, 0),
(15, 'Beef Tapa', 'Appetizer', 150, 160, 'available', 'AP15', 6, 0),
(16, 'Tokwa\'t Baboy', 'Appetizer', 100, 120, 'available', 'AP16', 3, 0),
(17, 'Kilawen Tanguigui', 'Appetizer', 225, 240, 'available', 'AP17', 6, 0),
(18, 'Hotdog with Onions', 'Appetizer', 100, 120, 'available', 'AP18', 3, 0),
(19, 'French Fried', 'Appetizer', 120, 140, 'available', 'AP19', 6, 0),
(20, 'Chicharon Baboy', 'Appetizer', 90, 100, 'available', 'AP20', 3, 0),
(21, 'Sliced Cucumber', 'Appetizer', 75, 85, 'available', 'AP21', 0, 0),
(22, 'Cheese Lumpia', 'Appetizer', 80, 90, 'available', 'AP22', 0, 0),
(23, 'Peanut', 'Appetizer', 75, 75, 'available', 'AP23', 0, 0),
(24, '1/2 Sizzling Chicken', 'Sizzling', 210, 220, 'available', 'SZ01', 6, 0),
(26, 'Sizzling Gambas', 'Sizzling', 215, 230, 'available', 'SZ02', 6, 0),
(27, 'Sizzling Fried Shrimp with Garlic Sauce', 'Sizzling', 215, 230, 'available', 'SZ03', 6, 0),
(28, 'Sizzling Mushroom w/G.Sauce', 'Appetizer', 180, 200, 'available', 'SZ04', 6, 0),
(29, 'Sizzling Pusit', 'Sizzling', 220, 240, 'available', 'SZ05', 6, 0),
(30, 'Sizzling Beef Tips', 'Sizzling', 200, 210, 'available', 'SZ06', 6, 0),
(31, 'Sizzling Tanguigui', 'Sizzling', 250, 280, 'available', 'SZ07', 6, 0),
(32, 'Sizzling Porkchop', 'Sizzling', 175, 190, 'available', 'SZ08', 6, 0),
(33, 'Sizzling Hotdog', 'Sizzling', 140, 150, 'available', 'SZ09', 6, 0),
(34, 'Alberto\'s Special', 'Sandwiches', 150, 150, 'available', 'SW01', 0, 0),
(35, 'Clubhouse Sandwich', 'Sandwiches', 130, 130, 'available', 'SW02', 0, 0),
(36, 'Chicken Sandwich', 'Sandwiches', 60, 60, 'available', 'SW03', 0, 0),
(37, 'Ham & Egg Sandwich', 'Sandwiches', 60, 60, 'available', 'SW04', 0, 0),
(38, 'Ham & Chess Sandwich', 'Sandwiches', 60, 60, 'available', 'SW05', 0, 0),
(39, 'Inihaw na Pusit', 'Barbeques', 260, 275, 'available', 'BQ01', 6, 0),
(40, 'Inihaw na Baboy', 'Barbeques', 110, 120, 'available', 'BQ02', 6, 0),
(41, 'Chicken Barbeque', 'Barbeques', 100, 100, 'available', 'BQ03', 3, 0),
(42, 'Pork Barbeque', 'Barbeques', 70, 75, 'available', 'BQ04', 3, 0),
(43, 'Fried Chicken Rice', 'Rice Toppings', 130, 130, 'available', 'RT01', 0, 0),
(44, 'Porkchop Rice', 'Rice Toppings', 130, 130, 'available', 'RT02', 0, 0),
(45, 'Lechon Rice', 'Rice Toppings', 130, 130, 'available', 'RT03', 0, 0),
(46, 'Seafood Fried Rice', 'Rice Toppings', 105, 105, 'available', 'RT04', 0, 0),
(47, 'Shanghai Fried Rice', 'Rice Toppings', 95, 105, 'available', 'RT05', 0, 0),
(48, 'Garlic Rice', 'Rice Toppings', 35, 35, 'available', 'RT06', 0, 0),
(49, 'Plain Rice', 'Rice Toppings', 30, 30, 'available', 'RT07', 0, 0),
(50, 'Mixed Fruits', 'Salads', 350, 400, 'available', 'SD01', 6, 0),
(51, 'Chef\'s Salad', 'Salads', 110, 120, 'available', 'SD02', 0, 0),
(52, 'Vegetable Sticks', 'Salads', 120, 130, 'available', 'SD03', 0, 0),
(53, 'Toss Green Salad', 'Salads', 100, 100, 'available', 'SD04', 0, 0),
(54, 'Coleslaw Salad', 'Salads', 90, 100, 'available', 'SD05', 0, 0),
(55, 'Pancit Bihon Guisado', 'Noodles/Soup', 120, 120, 'available', 'NS01', 0, 0),
(56, 'Sotangon Guisado', 'Noodles/Soup', 120, 120, 'available', 'NS02', 0, 0),
(57, 'Pancit Canton', 'Noodles/Soup', 130, 130, 'available', 'NS03', 0, 0),
(58, 'Hottotay Soup', 'Noodles/Soup', 120, 120, 'available', 'NS04', 0, 0),
(59, 'Mushroom Soup', 'Noodles/Soup', 120, 120, 'available', 'NS05', 0, 0),
(60, '	\nBeef Mami', 'Noodles/Soup', 75, 75, 'available', 'NS06', 0, 0),
(61, 'Chicken Mami', 'Noodles/Soup', 75, 75, 'available', 'NS07', 0, 0),
(62, 'Lomi', 'Noodles/Soup', 100, 100, 'available', 'NS08', 0, 0),
(63, 'Plain Margarita', 'Cocktails', 90, 100, 'available', 'CT1', 2, 0),
(64, 'Blue Margarita', 'Cocktails', 90, 100, 'available', 'CT2', 2, 0),
(65, 'Tequila Sunrise', 'Cocktails', 90, 95, 'available', 'CT3', 2, 0),
(66, 'Zombie', 'Cocktails', 90, 100, 'available', 'CT4', 2, 0),
(67, 'Mai Tai', 'Cocktails', 90, 95, 'available', 'CT5', 2, 0),
(68, '	\nPina Colada', 'Cocktails', 90, 100, 'available', 'CT6', 2, 0),
(69, 'Blue Hawaiian', 'Cocktails', 90, 95, 'available', 'CT7', 2, 0),
(70, 'Weng Weng', 'Cocktails', 110, 120, 'available', 'CT8', 2, 0),
(71, 'Sex on the Beach', 'Cocktails', 90, 100, 'available', 'CT9', 2, 0),
(72, 'Choco Mudslide', 'Cocktails', 90, 100, 'available', 'CT10', 2, 0),
(73, 'Caramel Mudslide', 'Cocktails', 90, 100, 'not available', 'CT11', 2, 0),
(74, 'Long Island Tea', 'Cocktails', 110, 120, 'not available', 'CT12', 2, 0),
(75, 'Kamikaze', 'Cocktails', 90, 95, 'not available', 'CT13', 2, 0),
(76, '	\nBlue Lagoon', 'Cocktails', 90, 95, 'not available', 'CT14', 2, 0),
(77, 'Black Russian', 'Cocktails', 90, 95, 'not available', 'CT15', 2, 0),
(78, 'White Russian', 'Cocktails', 90, 95, 'not available', 'CT16', 2, 0),
(79, 'Cosmopolitan', 'Cocktails', 90, 95, 'not available', 'CT17', 2, 0),
(80, 'Sweet Martini', 'Cocktails', 90, 95, 'not available', 'CT18', 2, 0),
(81, 'Dry Martini', 'Cocktails', 90, 95, 'not available', 'CT19', 2, 0),
(82, 'Bull Jagger', 'Cocktails', 110, 120, 'not available', 'CT20', 2, 0),
(85, 'Margarita', 'Pitcher Cocktails', 580, 600, 'not available', 'PC3', 2, 0),
(86, 'Blow Job', 'Shooters', 90, 100, 'not available', 'SH1', 2, 0),
(87, 'Slippery Nipple', 'Shooters', 90, 100, 'not available', 'SH2', 2, 0),
(88, 'Flaming Orgasm', 'Shooters', 90, 100, 'not available', 'SH3', 2, 0),
(89, 'Vodka Snipper', 'Shooters', 90, 100, 'not available', 'SH4', 2, 0),
(90, 'B-51', 'Shooters', 90, 100, 'not available', 'SH5', 2, 0),
(91, 'Absolute Blue(Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 100, 'not available', 'TG1', 2, 0),
(92, '	\nAbsolute Citron (Single Shot)', 'Tequila/Gin/Rum/Vodka', 95, 110, 'not available', 'TG2', 2, 0),
(93, 'Smirnoff (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 100, 'not available', 'TG3', 2, 0),
(94, 'Cuervo Gold (Single Shot)', 'Tequila/Gin/Rum/Vodka', 95, 110, 'not available', 'TG4', 2, 0),
(95, 'Bacardi Gold (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 90, 'not available', 'TG5', 2, 0),
(96, 'Tangueray Gin (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 90, 'not available', 'TG6', 2, 0),
(97, 'Absolute Blue (750ml)', 'Tequila/Gin/Rum/Vodka', 1900, 2000, 'not available', 'TG7', 19, 0),
(98, 'Absolute Citron (750ml)', 'Tequila/Gin/Rum/Vodka', 2100, 2200, 'not available', 'TG8', 19, 0),
(99, 'Smirnoff (750ml)', 'Tequila/Gin/Rum/Vodka', 1400, 1500, 'not available', 'TG9', 19, 0),
(100, 'Cuervo Gold (750ml)', 'Tequila/Gin/Rum/Vodka', 2100, 2200, 'not available', 'TG10', 19, 0),
(101, 'Bacardi Gold (750ml)', 'Tequila/Gin/Rum/Vodka', 1400, 1500, 'not available', 'TG11', 19, 0),
(102, 'Henessy V.S.O.P (Single Shot)', 'Tequila/Gin/Rum/Vodka', 1700, 1500, 'not available', 'TG12', 19, 0),
(103, 'Johnny Walker Black (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'not available', 'SC1', 2, 0),
(104, 'Chivas Regal (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'available', 'SC2', 2, 0),
(105, 'J & B (Single Shot)', 'Scotch/Cognac/Brandy', 90, 95, 'available', 'SC3', 2, 0),
(106, 'Remy Martin (Single Shot)', 'Scotch/Cognac/Brandy', 170, 180, 'available', 'SC4', 2, 0),
(107, '	\nHenessy V.S.O.P (Single Shot)', 'Scotch/Cognac/Brandy', 175, 190, 'available', 'SC5', 2, 0),
(108, 'Carlos 1 (Single Shot)', 'Scotch/Cognac/Brandy', 130, 150, 'available', 'SC6', 2, 0),
(109, '	\nFundador (Single Shot)', 'Scotch/Cognac/Brandy', 90, 95, 'available', 'SC7', 2, 0),
(110, 'Jack Daniel (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'available', 'SC8', 2, 0),
(111, '	\nJim Beam (Single Shot)', 'Scotch/Cognac/Brandy', 100, 110, 'available', 'SC9', 2, 0),
(112, 'Johnny Walker Black (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC10', 19, 0),
(123, 'Chivas Regal (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC11', 19, 0),
(124, 'J & B (750ml)', 'Scotch/Cognac/Brandy', 1900, 1800, 'available', 'SC12', 19, 0),
(125, 'Remy Martin (750ml)', 'Scotch/Cognac/Brandy', 3500, 3600, 'available', 'SC13', 19, 0),
(126, 'Henessy V.S.O.P (750ml)', 'Scotch/Cognac/Brandy', 3700, 3800, 'available', 'SC14', 19, 0),
(127, 'Carlos 1 (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC15', 19, 0),
(128, 'Fundador (750ml)', 'Scotch/Cognac/Brandy', 1400, 1500, 'available', 'SC16', 19, 0),
(129, 'Jack Daniel (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC17', 19, 0),
(130, 'Jim Beam (750ml)', 'Scotch/Cognac/Brandy', 1700, 1800, 'available', 'SC18', 19, 0),
(131, 'Beer Tower', 'Smb Draft/ Bottled Beer', 600, 640, 'available', 'SB1', 10, 0),
(132, 'Barrel', 'Smb Draft/ Bottled Beer', 590, 560, 'available', 'SB2', 6, NULL),
(133, 'Pitcher', 'Smb Draft/ Bottled Beer', 200, 220, 'available', 'SB3', 2, 0),
(134, 'Mug', 'Smb Draft/ Bottled Beer', 50, 60, 'available', 'SB4', 0, 0),
(135, 'San Miguel Pale Pilsen', 'Smb Draft/ Bottled Beer', 50, 60, 'available', 'SB5', 0.5, 0),
(136, 'San Miguel Light', 'Smb Draft/ Bottled Beer', 55, 65, 'available', 'SB6', 0.5, 0),
(137, 'San Miguel Light (Apple/Lemon)', 'Smb Draft/ Bottled Beer', 55, 65, 'available', 'SB7', 0.5, 0),
(138, 'Red Horse', 'Smb Draft/ Bottled Beer', 50, 65, 'available', 'SB8', 0.5, 0),
(140, 'Cali', 'Smb Draft/ Bottled Beer', 50, 65, 'available', 'SB9', 0.5, 0),
(141, 'Gold Schalger (Singe Shot)', 'Liquers', 110, 120, 'available', 'LQ1', 2, 0),
(142, 'Baileys (Single Shot)', 'Liquers', 90, 100, 'available', 'LQ2', 2, NULL),
(143, 'Kahlua (Single Shot)', 'Liquers', 90, 95, 'available', 'LQ3', 2, 0),
(144, '	\nTequila Rose (Single Shot)', 'Liquers', 100, 110, 'available', 'LQ4', 2, 0),
(145, 'Jager Miester (Single Shot)', 'Liquers', 100, 110, 'available', 'LQ5', 2, 0),
(146, '	\nGold Schalger (750ml)', 'Liquers', 2300, 2400, 'available', 'LQ6', 19, NULL),
(147, '	\nBaileys (750ml)', 'Liquers', 1900, 2000, 'available', 'LQ7', 19, 0),
(148, 'Kahlua (750ml)', 'Liquers', 1700, 1800, 'available', 'LQ8', 19, 0),
(149, 'Tequila Rose (750ml)', 'Liquers', 1900, 2000, 'available', 'LQ9', 19, 0),
(150, 'Jager Miester (750ml)', 'Liquers', 1900, 2000, 'available', 'LQ10', 19, 0),
(151, 'Four Season', 'Mocktail Hot and Cold Beverages', 85, 85, 'available', 'MT1', 0, 0),
(152, 'Shirley Temple', 'Mocktail Hot and Cold Beverages', 75, 75, 'available', 'MT2', 0, 0),
(153, 'Iced Lemonde', 'Mocktail Hot and Cold Beverages', 70, 70, 'available', 'MT3', 0, 0),
(154, 'Cranberry Cocktail', 'Mocktail Hot and Cold Beverages', 80, 80, 'available', 'MT4', 0, 0),
(155, 'Cali Temple', 'Mocktail Hot and Cold Beverages', 85, 85, 'available', 'MT5', 0, 0),
(156, 'Orange Juice', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT6', 0, 0),
(157, 'Pineapple Juice', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT7', 0, 0),
(158, 'Mango Juice', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT8', 0, 0),
(159, 'Iced Tea', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT9', 0, 0),
(160, 'Iced Choco', 'Mocktail Hot and Cold Beverages', 70, 70, 'available', 'MT10', 0, 0),
(161, 'Iced Coffee', 'Mocktail Hot and Cold Beverages', 70, 70, 'available', 'MT11', 0, 0),
(162, 'Hot Calamansi', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT12', 0, 0),
(163, 'Cold Calamansi', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT13', 0, 0),
(164, 'Hot Choco', 'Mocktail Hot and Cold Beverages', 50, 50, 'available', 'MT14', 0, 0),
(165, 'Hot Coffee', 'Mocktail Hot and Cold Beverages', 45, 45, 'available', 'MT15', 0, 0),
(166, 'Coke', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT16', 0, 0),
(167, 'Sprite', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT17', 0, 0),
(168, 'Strawberry Shake', 'Fruit Shakes', 150, 160, 'available', 'FS1', 0, 0),
(169, 'Pineapple Shake', 'Fruit Shakes', 110, 120, 'available', 'FS2', 0, 0),
(170, 'Apple Shake', 'Fruit Shakes', 110, 120, 'available', 'FS3', 0, 0),
(171, 'Orange Shake', 'Fruit Shakes', 130, 140, 'available', 'FS4', 0, 0),
(172, 'Mango Shake', 'Fruit Shakes', 140, 150, 'available', 'FS5', 0, 0),
(173, 'Green Mango Shake', 'Fruit Shakes', 140, 150, 'available', 'FS6', 0, 0),
(194, 'cocktails', 'Mocktail Hot and Cold Beverages', 112, 123, NULL, 'MT1233', 123, 123),
(193, 'chicken adobo', 'Appetizer', 100, 230, NULL, 'AP25', 3, 123),
(195, 'Broken Glass', 'Appetizer', 30, 30, 'available', 'OTHERS', 0, 0),
(196, 'DSAASD', 'Appetizer', 1, 1, NULL, 'AP26', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_db`
--

DROP TABLE IF EXISTS `order_db`;
CREATE TABLE IF NOT EXISTS `order_db` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_code` varchar(255) DEFAULT NULL,
  `order_table` varchar(255) DEFAULT NULL,
  `order_waiter` varchar(255) DEFAULT NULL,
  `order_time` time DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `order_quantity` int(11) DEFAULT NULL,
  `order_name` varchar(45) DEFAULT NULL,
  `order_price` double DEFAULT NULL,
  `order_type` varchar(255) DEFAULT NULL,
  `order_tprice` double DEFAULT NULL,
  `order_priority` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `paid_db`
--

DROP TABLE IF EXISTS `paid_db`;
CREATE TABLE IF NOT EXISTS `paid_db` (
  `paid_id` int(11) NOT NULL AUTO_INCREMENT,
  `paid_code` varchar(255) DEFAULT NULL,
  `paid_table` varchar(255) DEFAULT NULL,
  `paid_waiter` varchar(255) DEFAULT NULL,
  `paid_time` time DEFAULT NULL,
  `paid_date` date DEFAULT NULL,
  `paid_quantity` int(11) DEFAULT NULL,
  `paid_name` varchar(45) DEFAULT NULL,
  `paid_price` double DEFAULT NULL,
  `paid_type` varchar(255) DEFAULT NULL,
  `paid_tprice` double DEFAULT NULL,
  PRIMARY KEY (`paid_id`),
  KEY `paid_id` (`paid_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sales_db`
--

DROP TABLE IF EXISTS `sales_db`;
CREATE TABLE IF NOT EXISTS `sales_db` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `total_item_sale` double DEFAULT NULL,
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `served_db`
--

DROP TABLE IF EXISTS `served_db`;
CREATE TABLE IF NOT EXISTS `served_db` (
  `served_id` int(11) NOT NULL,
  `served_code` varchar(255) DEFAULT NULL,
  `served_table` varchar(255) DEFAULT NULL,
  `served_waiter` varchar(255) DEFAULT NULL,
  `served_time` time DEFAULT NULL,
  `served_date` date DEFAULT NULL,
  `served_quantity` int(11) DEFAULT NULL,
  `served_name` varchar(255) DEFAULT NULL,
  `served_price` double DEFAULT NULL,
  `served_type` varchar(255) DEFAULT NULL,
  `served_tprice` double DEFAULT NULL,
  `served_priority` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`served_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `served_db`
--

INSERT INTO `served_db` (`served_id`, `served_code`, `served_table`, `served_waiter`, `served_time`, `served_date`, `served_quantity`, `served_name`, `served_price`, `served_type`, `served_tprice`, `served_priority`) VALUES
(10, '118', 'S01', 'hello', '22:24:44', '2017-11-22', 1, 'chicken adobo', 230, 'Dine In', 230, '2'),
(11, '119', 'A01', 'hello', '22:24:45', '2017-11-22', 1, 'Cuervo Gold (Single Shot)', 95, 'Dine In', 95, '2');

-- --------------------------------------------------------

--
-- Table structure for table `table_db`
--

DROP TABLE IF EXISTS `table_db`;
CREATE TABLE IF NOT EXISTS `table_db` (
  `table_id` int(25) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(20) DEFAULT NULL,
  `table_column` varchar(45) DEFAULT NULL,
  `table_number` int(65) NOT NULL,
  PRIMARY KEY (`table_id`)
) ENGINE=MyISAM AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_db`
--

INSERT INTO `table_db` (`table_id`, `table_name`, `table_column`, `table_number`) VALUES
(1, 'A01', 'A', 0),
(2, 'A02', 'A', 0),
(3, 'A03', 'A', 0),
(4, 'A04', 'A', 0),
(5, 'A05', 'A', 0),
(6, 'A06', 'A', 0),
(7, 'A07', 'A', 0),
(8, 'B01', 'B', 0),
(9, 'B02', 'B', 0),
(10, 'B03', 'B', 0),
(11, 'B04', 'B', 0),
(12, 'B05', 'B', 0),
(13, 'B06', 'B', 0),
(14, 'B07', 'B', 0),
(15, 'B08', 'B', 0),
(16, 'B09', 'B', 0),
(17, 'B10', 'B', 0),
(18, 'B11', 'B', 0),
(19, 'B12', 'B', 0),
(20, 'B13', 'B', 0),
(21, 'B14', 'B', 0),
(22, 'B15', 'B', 0),
(23, 'B16', 'B', 0),
(24, 'B17', 'B', 0),
(25, 'B18', 'B', 0),
(26, 'B19', 'B', 0),
(27, 'B20', 'B', 0),
(28, 'B21', 'B', 0),
(29, 'B22', 'B', 0),
(30, 'B23', 'B', 0),
(31, 'B24', 'B', 0),
(32, 'B25', 'B', 0),
(33, 'B26', 'B', 0),
(34, 'B27', 'B', 0),
(35, 'B28', 'B', 0),
(36, 'B29', 'B', 0),
(37, 'B30', 'B', 0),
(38, 'B31', 'B', 0),
(39, 'B32', 'B', 0),
(40, 'B33', 'B', 0),
(41, 'C01', 'C', 0),
(42, 'C02', 'C', 0),
(43, 'C03', 'C', 0),
(44, 'C04', 'C', 0),
(45, 'C05', 'C', 0),
(46, 'C06', 'C', 0),
(47, 'C07', 'C', 0),
(48, 'C08', 'C', 0),
(49, 'C09', 'C', 0),
(50, 'C10', 'C', 0),
(51, 'C11', 'C', 0),
(52, 'C12', 'C', 0),
(53, 'C13', 'C', 0),
(54, 'C14', 'C', 0),
(55, 'C15', 'C', 0),
(56, 'C16', 'C', 0),
(57, 'C17', 'C', 0),
(58, 'C18', 'C', 0),
(59, 'C19', 'C', 0),
(60, 'C20', 'C', 0),
(61, 'C21', 'C', 0),
(62, 'C22', 'C', 0),
(63, 'C23', 'C', 0),
(64, 'C24', 'C', 0),
(65, 'C25', 'C', 0),
(66, 'D01', 'D', 0),
(67, 'D02', 'D', 0),
(68, 'D03', 'D', 0),
(69, 'D04', 'D', 0),
(70, 'D05', 'D', 0),
(71, 'D06', 'D', 0),
(72, 'D07', 'D', 0),
(73, 'D08', 'D', 0),
(74, 'D09', 'D', 0),
(75, 'D10', 'D', 0),
(76, 'D11', 'D', 0),
(77, 'D12', 'D', 0),
(78, 'D13', 'D', 0),
(80, 'D14', 'D', 0),
(82, 'S01', 'S', 0),
(83, 'S02', 'S', 0),
(84, 'S03', 'S', 0),
(85, 'S04', 'S', 0),
(86, 'S05', 'S', 0),
(87, 'S06', 'S', 0),
(88, 'S07', 'S', 0),
(89, 'S08', 'S', 0),
(90, 'S09', 'S', 0),
(91, 'S10', 'S', 0),
(92, 'S11', 'S', 0),
(93, 'S12', 'S', 0),
(94, 'S13', 'S', 13),
(95, 'A08', 'A', 8);

-- --------------------------------------------------------

--
-- Table structure for table `table_orders`
--

DROP TABLE IF EXISTS `table_orders`;
CREATE TABLE IF NOT EXISTS `table_orders` (
  `table_orders_id` int(255) NOT NULL AUTO_INCREMENT,
  `table_orders_serverid` int(255) NOT NULL,
  `table_orders_tableid` int(255) NOT NULL,
  `table_order_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`table_orders_id`)
) ENGINE=MyISAM AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_orders`
--

INSERT INTO `table_orders` (`table_orders_id`, `table_orders_serverid`, `table_orders_tableid`, `table_order_timestamp`) VALUES
(1, 0, 0, '2017-11-15 23:12:13'),
(2, 0, 0, '2017-11-15 23:12:53'),
(3, 0, 0, '2017-11-15 23:37:06'),
(4, 0, 0, '2017-11-15 23:40:29'),
(5, 0, 0, '2017-11-15 23:49:10'),
(6, 0, 0, '2017-11-16 00:04:44'),
(7, 0, 0, '2017-11-16 00:22:49'),
(8, 0, 0, '2017-11-16 00:32:28'),
(9, 0, 0, '2017-11-16 00:33:56'),
(10, 0, 0, '2017-11-16 00:35:32'),
(11, 0, 0, '2017-11-16 00:40:11'),
(12, 0, 0, '2017-11-16 00:41:06'),
(13, 0, 0, '2017-11-16 00:42:45'),
(14, 0, 0, '2017-11-16 00:48:21'),
(15, 0, 0, '2017-11-16 00:48:56'),
(16, 0, 0, '2017-11-16 10:25:18'),
(17, 0, 0, '2017-11-16 10:26:46'),
(18, 0, 0, '2017-11-16 10:36:50'),
(19, 0, 0, '2017-11-16 10:43:24'),
(20, 0, 0, '2017-11-16 10:44:15'),
(21, 0, 0, '2017-11-18 08:12:50'),
(22, 0, 0, '2017-11-18 08:13:04'),
(23, 0, 0, '2017-11-18 08:17:25'),
(24, 0, 0, '2017-11-18 09:06:55'),
(25, 0, 0, '2017-11-18 09:07:34'),
(26, 0, 0, '2017-11-18 09:07:48'),
(27, 0, 0, '2017-11-18 09:08:01'),
(28, 0, 0, '2017-11-18 09:08:11'),
(29, 0, 0, '2017-11-18 09:43:35'),
(30, 0, 0, '2017-11-18 14:03:59'),
(31, 0, 0, '2017-11-18 14:04:50'),
(32, 0, 0, '2017-11-18 18:53:12'),
(33, 0, 0, '2017-11-18 19:18:56'),
(34, 0, 0, '2017-11-18 19:19:05'),
(35, 0, 0, '2017-11-18 19:23:00'),
(36, 0, 0, '2017-11-18 19:23:09'),
(37, 0, 0, '2017-11-18 19:23:18'),
(38, 0, 0, '2017-11-18 19:23:28'),
(39, 0, 0, '2017-11-18 19:26:59'),
(40, 0, 0, '2017-11-18 19:35:59'),
(41, 0, 0, '2017-11-18 19:46:53'),
(42, 0, 0, '2017-11-18 19:58:52'),
(43, 0, 0, '2017-11-18 20:28:38'),
(44, 0, 0, '2017-11-18 20:30:59'),
(45, 0, 0, '2017-11-18 20:32:31'),
(46, 0, 0, '2017-11-18 20:36:49'),
(47, 0, 0, '2017-11-18 20:57:46'),
(48, 0, 0, '2017-11-18 21:45:59'),
(49, 0, 0, '2017-11-19 07:32:57'),
(50, 0, 0, '2017-11-19 07:33:13'),
(51, 0, 0, '2017-11-19 07:58:51'),
(52, 0, 0, '2017-11-19 08:01:18'),
(53, 0, 0, '2017-11-19 08:07:34'),
(54, 0, 0, '2017-11-19 08:20:03'),
(55, 0, 0, '2017-11-19 08:21:48'),
(56, 0, 0, '2017-11-19 08:24:55'),
(57, 0, 0, '2017-11-19 08:27:16'),
(58, 0, 0, '2017-11-19 08:33:52'),
(59, 0, 0, '2017-11-19 08:42:16'),
(60, 0, 0, '2017-11-19 08:42:47'),
(61, 0, 0, '2017-11-19 08:43:13'),
(62, 0, 0, '2017-11-19 08:43:31'),
(63, 0, 0, '2017-11-20 17:22:53'),
(64, 0, 0, '2017-11-20 17:23:54'),
(65, 0, 0, '2017-11-20 17:23:56'),
(66, 0, 0, '2017-11-20 17:24:07'),
(67, 0, 0, '2017-11-20 17:24:17'),
(68, 0, 0, '2017-11-20 17:28:25'),
(69, 0, 0, '2017-11-20 17:28:34'),
(70, 0, 0, '2017-11-20 17:59:48'),
(71, 0, 0, '2017-11-20 17:59:56'),
(72, 0, 0, '2017-11-20 18:40:06'),
(73, 0, 0, '2017-11-20 18:40:29'),
(74, 0, 0, '2017-11-20 18:49:49'),
(75, 0, 0, '2017-11-20 18:50:00'),
(76, 0, 0, '2017-11-20 18:50:14'),
(77, 0, 0, '2017-11-20 18:51:49'),
(78, 0, 0, '2017-11-20 21:47:45'),
(79, 0, 0, '2017-11-20 21:48:36'),
(80, 0, 0, '2017-11-20 21:48:52'),
(81, 0, 0, '2017-11-20 21:49:12'),
(82, 0, 0, '2017-11-21 00:07:24'),
(83, 0, 0, '2017-11-21 00:22:16'),
(84, 0, 0, '2017-11-21 00:24:08'),
(85, 0, 0, '2017-11-21 06:35:48'),
(86, 0, 0, '2017-11-21 06:36:21'),
(87, 0, 0, '2017-11-21 06:36:36'),
(88, 0, 0, '2017-11-21 06:36:56'),
(89, 0, 0, '2017-11-21 06:48:28'),
(90, 0, 0, '2017-11-21 06:48:43'),
(91, 0, 0, '2017-11-21 06:48:54'),
(92, 0, 0, '2017-11-21 06:49:12'),
(93, 0, 0, '2017-11-21 06:49:31'),
(94, 0, 0, '2017-11-21 06:49:46'),
(95, 0, 0, '2017-11-21 11:05:00'),
(96, 0, 0, '2017-11-21 11:05:58'),
(97, 0, 0, '2017-11-21 11:06:28'),
(98, 0, 0, '2017-11-21 11:55:48'),
(99, 0, 0, '2017-11-21 14:14:41'),
(100, 0, 0, '2017-11-21 14:27:21'),
(101, 0, 0, '2017-11-21 14:36:05'),
(102, 0, 0, '2017-11-21 14:49:28'),
(103, 0, 0, '2017-11-21 17:19:38'),
(104, 0, 0, '2017-11-21 17:54:00'),
(105, 0, 0, '2017-11-23 01:10:48'),
(106, 0, 0, '2017-11-23 01:14:57'),
(107, 0, 0, '2017-11-23 01:24:28'),
(108, 0, 0, '2017-11-23 01:30:46'),
(109, 0, 0, '2017-11-23 01:32:57'),
(110, 0, 0, '2017-11-23 01:35:22'),
(111, 0, 0, '2017-11-23 01:35:33'),
(112, 0, 0, '2017-11-23 04:48:42'),
(113, 0, 0, '2017-11-23 04:49:13'),
(114, 0, 0, '2017-11-23 04:51:23'),
(115, 0, 0, '2017-11-23 04:51:26'),
(116, 0, 0, '2017-11-23 04:51:42'),
(117, 0, 0, '2017-11-23 04:51:45'),
(118, 0, 0, '2017-11-23 05:26:29'),
(119, 0, 0, '2017-11-23 05:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transac_id` int(11) NOT NULL AUTO_INCREMENT,
  `transac_time` time NOT NULL,
  `transac_date` date NOT NULL,
  `transac_table` varchar(65) DEFAULT NULL,
  `transac_cash` decimal(65,2) NOT NULL,
  `transac_card` varchar(65) DEFAULT NULL,
  `transac_total` decimal(65,2) NOT NULL,
  `transac_change` double NOT NULL,
  PRIMARY KEY (`transac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

DROP TABLE IF EXISTS `transaction_history`;
CREATE TABLE IF NOT EXISTS `transaction_history` (
  `transacH_id` int(11) NOT NULL AUTO_INCREMENT,
  `transacH_time` time NOT NULL,
  `transacH_date` date NOT NULL,
  `transacH_table` varchar(65) DEFAULT NULL,
  `transacH_cash` decimal(65,0) NOT NULL,
  `transacH_card` varchar(65) NOT NULL,
  `transacH_total` decimal(65,0) NOT NULL,
  `transacH_change` decimal(65,0) NOT NULL,
  PRIMARY KEY (`transacH_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `password`, `email`, `position`, `status`) VALUES
(22, 'Rrhyy', 'Rrhy', 'Bacwaden', '12345', 'rrrhybacwaden@gmail.com', 'Admin', 'Active'),
(36, 'Princes', 'Princes', 'Criste', 'abc', 'princes@gmail.com', 'Checker', 'Active'),
(35, 'Steven', 'Steven', 'Bitmead', '12345', 'Steven@gmail.com', 'Admin', 'Active'),
(34, 'Niel', 'Niel', 'Gallego', '12345', 'niel@gmail.com', 'Cashier', 'Active'),
(33, 'Leonard', 'Leonard', 'Tagarino', '12345', 'leo@gmail.com', 'Cashier', 'Active'),
(31, 'Cynlai', 'Cynlai', 'Osorio', '12345', 'cynlaii@gmail.com', 'Checker', 'Active'),
(38, 'checker', 'Neil Kevin', 'Gallego', '12345', 'Neil@gmail.com', 'Checker', 'Active'),
(55, 'cashier', 'Cynlai', 'Osorio', '12345', 'cynlai@gmail.com', 'Cashier', 'Active'),
(56, 'admin', 'Steven', 'Bitmead', '12345', 'steven@gmail.com', 'Admin', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `waitercomm_history`
--

DROP TABLE IF EXISTS `waitercomm_history`;
CREATE TABLE IF NOT EXISTS `waitercomm_history` (
  `commid_history` int(11) NOT NULL AUTO_INCREMENT,
  `itemcomm_history` decimal(65,2) DEFAULT NULL,
  `itemtype_history` enum('drinks','dish') DEFAULT NULL,
  `time_history` time NOT NULL,
  `date_history` date NOT NULL,
  `waitername_history` varchar(255) NOT NULL,
  `iname_history` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`commid_history`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `waiter_commission`
--

DROP TABLE IF EXISTS `waiter_commission`;
CREATE TABLE IF NOT EXISTS `waiter_commission` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_comm` decimal(65,2) DEFAULT NULL,
  `item_type` enum('drinks','dish') DEFAULT NULL,
  `time` time NOT NULL,
  `waiter_date` date NOT NULL,
  `waiter_name` varchar(255) NOT NULL,
  `i_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `waiter_db`
--

DROP TABLE IF EXISTS `waiter_db`;
CREATE TABLE IF NOT EXISTS `waiter_db` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiter_db`
--

INSERT INTO `waiter_db` (`id`, `firstname`, `lastname`, `position`) VALUES
(11, 'gg', 'hadid', 'Waiter'),
(12, 'gg', 'ka', 'Waiter'),
(5, 'ayie', 'hidalgo', 'Waiter'),
(6, 'v', 'v vv', 'Waiter'),
(7, 'Cynlai', 'Osorio', 'Waiter'),
(8, 'Jay', 'd', 'Waiter'),
(9, 'sad', 'bb', 'Waiter'),
(10, 'peps', 'pit', 'Waiter'),
(13, 'hello', 'world', 'Waiter'),
(14, 'pet', 'malu', 'Waiter'),
(15, 'ry', 'yr', 'Waiter'),
(16, 'ayie', 'bubits', 'Waiter'),
(17, 'ayie', 'hidalgo', 'Waiter'),
(18, 'ayie', 'hidalgo', 'Waiter');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
