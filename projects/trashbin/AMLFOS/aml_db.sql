-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 21, 2017 at 11:43 PM
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
(1, 'Admin', 'mostlikers@gmail.com', '12345');

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
(0, 'Cynlai', '06:02:27', '2017-11-22'),
(1, 'Jay', '06:02:27', '2017-11-22'),
(2, 'Neil', '06:02:27', '2017-11-22'),
(3, 'Leonard', '06:02:27', '2017-11-22');

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
  `type_discounts` varchar(65) DEFAULT NULL,
  `cash_rcvd` decimal(65,0) NOT NULL,
  `transac_no` varchar(65) NOT NULL,
  `total_bill` decimal(65,0) NOT NULL,
  `change` decimal(65,0) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `change_db`
--

DROP TABLE IF EXISTS `change_db`;
CREATE TABLE IF NOT EXISTS `change_db` (
  `change_id` int(11) NOT NULL AUTO_INCREMENT,
  `change_table` varchar(65) NOT NULL,
  `change_change` decimal(65,2) NOT NULL,
  PRIMARY KEY (`change_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `change_db`
--

INSERT INTO `change_db` (`change_id`, `change_table`, `change_change`) VALUES
(1, 'A01', '100.00'),
(2, 'A01', '0.00'),
(3, 'A01', '0.00'),
(4, 'A01', '0.00'),
(5, 'A01', '0.00'),
(6, 'A01', '0.00'),
(7, 'A01', '0.00'),
(12, 'A01', '0.00');

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
  `charged_price` double DEFAULT NULL,
  `charged_type` varchar(255) DEFAULT NULL,
  `charged_tprice` double DEFAULT NULL,
  `charged_priority` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`charged_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `charge_db`
--

INSERT INTO `charge_db` (`charged_id`, `charged_code`, `charged_table`, `charged_waiter`, `charged_time`, `charged_date`, `charged_quantity`, `charged_name`, `charged_price`, `charged_type`, `charged_tprice`, `charged_priority`) VALUES
(1, '60', 'A01', 'Jay', '12:48:39', '2017-11-21', 1, 'Cold Cuts', 320, 'Dine In', 320, '1'),
(2, '61', 'A01', 'Jay', '12:48:54', '2017-11-21', 1, 'Cold Cuts', 350, 'Dine In', 350, '1'),
(3, '52', 'B01', 'Jay', '15:47:25', '2017-11-08', 2, '1/2 Fried Chicken', 0, 'Dine In', 0, '1'),
(4, '63', 'B02', 'Leonard', '19:18:46', '2017-11-21', 1, 'Shanghai Fried Rice', 95, 'Dine In', 95, '1'),
(7, '55', 'B01', 'Jay', '15:51:51', '2017-11-08', 1, 'Lechon Kawali', 130, 'Dine In', 3112, '1'),
(8, '56', 'A02', 'Jay', '00:16:00', '2017-11-08', 4, 'Mushroom Soup', 120, 'Dine In', 480, '1'),
(9, '42', 'C01', 'Jay', '02:41:43', '2017-11-08', 1, '1/2 Sizzling Chicken', 210, 'Dine In', 210, '1'),
(10, '43', 'A03', '', '15:45:11', '2017-11-08', 3, 'Pork Barbeque', 70, 'Dine In', 1190, '1'),
(11, '43', 'A03', 'Jay', '15:45:21', '2017-11-08', 6, 'Green Mango Shake', 140, 'Dine In', 1190, '1'),
(12, '43', 'A03', 'Jay', '15:45:35', '2017-11-08', 1, 'Mango Shake', 140, 'Dine In', 1190, '1'),
(13, '61', 'A03', 'Jay', '17:48:52', '2017-11-08', 2, 'Pork Barbeque', 70, 'Dine In', 140, '1'),
(15, '71', 'A01', 'Neil', '05:37:07', '2017-11-22', 3, 'Plain Margarita', 90, 'Dine In', 270, '1'),
(16, '71', 'A01', 'Leonard', '05:37:15', '2017-11-22', 1, 'Long Island Tea', 110, 'Dine In', 110, '1'),
(17, '71', 'A01', 'Steven', '05:37:31', '2017-11-22', 2, 'Choco Mudslide', 90, 'Dine In', 180, '1'),
(18, '72', 'D01', 'Steven', '05:37:38', '2017-11-22', 1, 'Cold Cuts', 320, 'Dine In', 320, '1'),
(25, '74', 'B03', 'Cynlai', '06:13:33', '2017-11-22', 1, '1/2 Fried Chicken', 180, 'Dine In', 180, '1');

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
-- Table structure for table `expense_db`
--

DROP TABLE IF EXISTS `expense_db`;
CREATE TABLE IF NOT EXISTS `expense_db` (
  `exp_id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_name` varchar(255) DEFAULT NULL,
  `exp_amt` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_db`
--

DROP TABLE IF EXISTS `menu_db`;
CREATE TABLE IF NOT EXISTS `menu_db` (
  `menuitem_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_happyprice` double NOT NULL,
  `item_regularprice` double DEFAULT NULL,
  `item_availability` enum('not available','available') DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `item_commission` double DEFAULT NULL,
  `item_discount` double DEFAULT NULL,
  PRIMARY KEY (`menuitem_id`)
) ENGINE=MyISAM AUTO_INCREMENT=192 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_db`
--

INSERT INTO `menu_db` (`menuitem_id`, `name`, `item_category`, `item_happyprice`, `item_regularprice`, `item_availability`, `code`, `item_commission`, `item_discount`) VALUES
(1, 'Cold Cuts', 'Appetizer', 320, 350, 'not available', 'AP01', 6, 0),
(2, 'Crispy Pata', 'Appetizer', 420, 440, 'available', 'AP02', 6, 0),
(3, '1/2 Fried Chicken', 'Appetizer', 180, 200, 'available', 'AP03', 6, 0),
(4, '1/2 Fried Chicken Garlic Sauce', 'Appetizer', 200, 220, 'available', 'AP04', 6, 0),
(5, 'Buttered Chicken', 'Appetizer', 200, 220, 'available', 'AP05', 6, 0),
(6, 'Chicken Wings', 'Appetizer', 180, 190, 'available', 'AP06', 6, 0),
(7, 'Chicken Lollipo', 'Appetizer', 180, 190, 'available', 'AP07', 6, 0),
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
(60, 'Beef Mami', 'Noodles/Soup', 75, 75, 'available', 'NS06', 0, 0),
(61, 'Chicken Mami', 'Noodles/Soup', 75, 75, 'available', 'NS07', 0, 0),
(62, 'Lomi', 'Noodles/Soup', 100, 100, 'available', 'NS08', 0, 0),
(63, 'Plain Margarita', 'Cocktails', 90, 100, 'available', 'CT1', 2, 0),
(64, 'Blue Margarita', 'Cocktails', 90, 100, 'available', 'CT2', 2, 0),
(65, 'Tequila Sunrise', 'Cocktails', 90, 95, 'available', 'CT3', 2, 0),
(66, 'Zombie', 'Cocktails', 90, 100, 'available', 'CT4', 2, 0),
(67, 'Mai Tai', 'Cocktails', 90, 95, 'available', 'CT5', 2, 0),
(68, 'Pina Colada', 'Cocktails', 90, 100, 'available', 'CT6', 2, 0),
(69, 'Blue Hawaiian', 'Cocktails', 90, 95, 'available', 'CT7', 2, 0),
(70, 'Weng Weng', 'Cocktails', 110, 120, 'available', 'CT8', 2, 0),
(71, 'Sex on the Beach', 'Cocktails', 90, 100, 'available', 'CT9', 2, 0),
(72, 'Choco Mudslide', 'Cocktails', 90, 100, 'available', 'CT10', 2, 0),
(73, 'Caramel Mudslide', 'Cocktails', 90, 100, 'not available', 'CT11', 2, 0),
(74, 'Long Island Tea', 'Cocktails', 110, 120, 'not available', 'CT12', 2, 0),
(75, 'Kamikaze', 'Cocktails', 90, 95, 'not available', 'CT13', 2, 0),
(76, 'Blue Lagoon', 'Cocktails', 90, 95, 'not available', 'CT14', 2, 0),
(77, 'Black Russian', 'Cocktails', 90, 95, 'not available', 'CT15', 2, 0),
(78, 'White Russian', 'Cocktails', 90, 95, 'not available', 'CT16', 2, 0),
(79, 'Cosmopolitan', 'Cocktails', 90, 95, 'not available', 'CT17', 2, 0),
(80, 'Sweet Martini', 'Cocktails', 90, 95, 'not available', 'CT18', 2, 0),
(81, 'Dry Martini', 'Cocktails', 90, 95, 'not available', 'CT19', 2, 0),
(82, 'Bull Jagger', 'Cocktails', 110, 120, 'not available', 'CT20', 2, 0),
(83, 'Weng Weng', 'Pitcher Cocktails', 620, 650, 'not available', 'PC1', 2, 0),
(84, 'Zombie', 'Pitcher Cocktails', 580, 600, 'not available', 'PC2', 2, 0),
(85, 'Margarita', 'Pitcher Cocktails', 580, 600, 'not available', 'PC3', 2, 0),
(86, 'Blow Job', 'Shooters', 90, 100, 'not available', 'SH1', 2, 0),
(87, 'Slippery Nipple', 'Shooters', 90, 100, 'not available', 'SH2', 2, 0),
(88, 'Flaming Orgasm', 'Shooters', 90, 100, 'not available', 'SH3', 2, 0),
(89, 'Vodka Snipper', 'Shooters', 90, 100, 'not available', 'SH4', 2, 0),
(90, 'B-51', 'Shooters', 90, 100, 'not available', 'SH5', 2, 0),
(91, 'Absolute Blue(Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 100, 'not available', 'TG1', 2, 0),
(92, 'Absolute Citron (Single Shot)', 'Tequila/Gin/Rum/Vodka', 95, 110, 'not available', 'TG2', 2, 0),
(93, 'Smirnoff (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 100, 'not available', 'TG3', 2, 0),
(94, 'Cuervo Gold (Single Shot)', 'Tequila/Gin/Rum/Vodka', 95, 110, 'not available', 'TG4', 2, 0),
(95, 'Bacardi Gold (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 90, 'not available', 'TG5', 2, 0),
(96, 'Tangueray Gin (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 90, 'not available', 'TG6', 2, 0),
(97, 'Absolute Blue (750ml)', 'Tequila/Gin/Rum/Vodka', 1900, 2000, 'not available', 'TG7', 19, 0),
(98, 'Absolute Citron (750ml)', 'Tequila/Gin/Rum/Vodka', 2100, 2200, 'not available', 'TG8', 19, 0),
(99, 'Smirnoff (750ml)', 'Tequila/Gin/Rum/Vodka', 1400, 1500, 'not available', 'TG9', 19, 0),
(100, 'Cuervo Gold (750ml)', 'Tequila/Gin/Rum/Vodka', 2100, 2200, 'not available', 'TG10', 19, 0),
(101, 'Bacardi Gold (750ml)', 'Tequila/Gin/Rum/Vodka', 1400, 1500, 'not available', 'TG11', 19, 0),
(102, 'Tangueray gin (750ml)', 'Tequila/Gin/Rum/Vodka', 1700, 1500, 'not available', 'TG12', 19, 0),
(103, 'Johnny Walker Black (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'not available', 'SC1', 2, 0),
(104, 'Chivas Regal (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'available', 'SC2', 2, 0),
(105, 'J & B (Single Shot)', 'Scotch/Cognac/Brandy', 90, 95, 'available', 'SC3', 2, 0),
(106, 'Remy Martin (Single Shot)', 'Scotch/Cognac/Brandy', 170, 180, 'available', 'SC4', 2, 0),
(107, 'Henessy V.S.O.P (Single Shot)', 'Scotch/Cognac/Brandy', 175, 190, 'available', 'SC5', 2, 0),
(108, 'Carlos 1 (Single Shot)', 'Scotch/Cognac/Brandy', 130, 150, 'available', 'SC6', 2, 0),
(109, 'Fundador (Single Shot)', 'Scotch/Cognac/Brandy', 90, 95, 'available', 'SC7', 2, 0),
(110, 'Jack Daniel (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'available', 'SC8', 2, 0),
(111, 'Jim Beam (Single Shot)', 'Scotch/Cognac/Brandy', 100, 110, 'available', 'SC9', 2, 0),
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
(144, 'Tequila Rose (Single Shot)', 'Liquers', 100, 110, 'available', 'LQ4', 2, 0),
(145, 'Jager Miester (Single Shot)', 'Liquers', 100, 110, 'available', 'LQ5', 2, 0),
(146, 'Gold Schalger (750ml)', 'Liquers', 2300, 2400, 'available', 'LQ6', 19, NULL),
(147, 'Baileys (750ml)', 'Liquers', 1900, 2000, 'available', 'LQ7', 19, 0),
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
(174, 'SET 1', 'COMBO', 800, 800, NULL, 'CB01', 22, 0),
(175, 'SET 2', 'COMBO', 1200, 1200, NULL, 'CB02', 20, 0),
(176, 'SET 3', 'COMBO', 1500, 1500, NULL, 'CB03', 22, 0),
(177, 'SET 4', 'COMBO', 1800, 1800, NULL, 'CB04', 22, 0),
(191, 'asdsad', 'Appetizer', 321, 123, NULL, 'AP24', 1, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paid_db`
--

INSERT INTO `paid_db` (`paid_id`, `paid_code`, `paid_table`, `paid_waiter`, `paid_time`, `paid_date`, `paid_quantity`, `paid_name`, `paid_price`, `paid_type`, `paid_tprice`) VALUES
(42, '25', 'A07', 'Leonard', '17:08:33', '2017-11-18', 1, 'Garlic Rice', 35, 'Dine In', 130),
(43, '25', 'A07', 'Leonard', '17:08:33', '2017-11-18', 1, 'Shanghai Fried Rice', 95, 'Dine In', 130),
(97, '48', 'A03', 'Jay', '15:33:54', '2017-11-19', 1, '', 9.99, 'Dine In', 19.98),
(103, '51', 'A01', 'Jay', '15:59:06', '2017-11-19', 1, '', 9.99, 'Dine In', 39.96),
(104, '51', 'A01', 'Jay', '15:59:06', '2017-11-19', 1, '', 9.99, 'Dine In', 39.96),
(105, '51', 'A01', 'Jay', '15:59:06', '2017-11-19', 1, '', 9.99, 'Dine In', 39.96),
(106, '51', 'A01', 'Jay', '15:59:06', '2017-11-19', 1, '', 9.99, 'Dine In', 39.96),
(107, '52', 'A02', 'Jay', '16:06:09', '2017-11-19', 2, '', 9.99, 'Dine In', 39.96),
(108, '52', 'A02', 'Jay', '16:06:09', '2017-11-19', 1, '', 9.99, 'Dine In', 39.96),
(109, '52', 'A02', 'Jay', '16:06:09', '2017-11-19', 1, '', 9.99, 'Dine In', 39.96),
(110, '53', 'A02', 'Jay', '16:07:47', '2017-11-19', 3, '', 9.99, 'Dine In', 39.96),
(111, '53', 'A02', 'Jay', '16:07:47', '2017-11-19', 1, '', 9.99, 'Dine In', 39.96),
(112, '54', 'A01', 'N/A', '16:20:23', '2017-11-19', 5, '', 9.99, 'Dine In', 49.95),
(113, '55', 'A01', 'Jay', '16:23:49', '2017-11-19', 2, 'Chicken Sandwich', 60, 'Dine In', 510),
(114, '55', 'A01', 'Jay', '16:23:49', '2017-11-19', 3, 'Clubhouse Sandwich', 130, 'Dine In', 510),
(115, '56', 'A01', 'Jay', '16:25:42', '2017-11-19', 1, 'Shanghai Fried Rice', 95, 'Dine In', 435),
(116, '56', 'A01', 'Jay', '16:25:42', '2017-11-19', 2, 'Seafood Fried Rice', 105, 'Dine In', 435),
(117, '56', 'A01', 'Jay', '16:25:42', '2017-11-19', 1, 'Lechon Rice', 130, 'Dine In', 435),
(118, '57', 'A01', 'Jay', '16:27:28', '2017-11-19', 1, 'Flaming Orgasm', 90, 'Dine In', 360),
(119, '57', 'A01', 'Jay', '16:27:28', '2017-11-19', 3, 'Slippery Nipple', 90, 'Dine In', 360);

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
(22, '73', 'A01', 'Cynlai', '06:22:07', '2017-11-22', 1, 'Crispy Pata', 420, 'Dine In', 1260, '2'),
(24, '73', 'A01', 'Cynlai', '06:22:08', '2017-11-22', 4, 'Chicken Sandwich', 60, 'Dine In', 240, '2'),
(25, '74', 'B03', 'Cynlai', '06:22:06', '2017-11-22', 1, '1/2 Fried Chicken', 180, 'Dine In', 180, '1'),
(26, '73', 'A01', 'Cynlai', '06:22:09', '2017-11-22', 1, 'Clubhouse Sandwich', 130, 'Dine In', 130, '2'),
(27, '75', 'D06', 'Jay', '06:22:10', '2017-11-22', 1, 'Toss Green Salad', 100, 'Take Out', 100, '2'),
(28, '76', 'C18', 'Jay', '06:22:11', '2017-11-22', 1, '1/2 Sizzling Chicken', 220, 'Dine In', 220, '2'),
(29, '76', 'C18', 'Jay', '06:22:12', '2017-11-22', 1, 'Crispy Pata', 440, 'Dine In', 440, '2'),
(30, '77', 'A07', 'Cynlai', '06:22:13', '2017-11-22', 3, '1/2 Sizzling Chicken', 210, 'Dine In', 630, '2');

-- --------------------------------------------------------

--
-- Table structure for table `table_db`
--

DROP TABLE IF EXISTS `table_db`;
CREATE TABLE IF NOT EXISTS `table_db` (
  `table_id` int(25) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(10) NOT NULL,
  `table_column` varchar(10) NOT NULL,
  `table_number` int(11) DEFAULT NULL,
  PRIMARY KEY (`table_id`),
  UNIQUE KEY `table_name_2` (`table_name`),
  KEY `table_name` (`table_name`)
) ENGINE=MyISAM AUTO_INCREMENT=202 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `table_db`
--

INSERT INTO `table_db` (`table_id`, `table_name`, `table_column`, `table_number`) VALUES
(144, 'A5', 'A', 5),
(145, 'A6', 'A', 6),
(140, 'A1', 'A', 1),
(141, 'A2', 'A', 2),
(142, 'A3', 'A', 3),
(143, 'A4', 'A', 4),
(146, 'A7', 'A', 7),
(147, 'A8', 'A', 8),
(148, 'A9', 'A', 9),
(149, 'A10', 'A', 10),
(150, 'B1', 'B', 1),
(151, 'B2', 'B', 2),
(152, 'B3', 'B', 3),
(153, 'B4', 'B', 4),
(154, 'B5', 'B', 5),
(155, 'B6', 'B', 6),
(156, 'B7', 'B', 7),
(157, 'B8', 'B', 8),
(158, 'B9', 'B', 9),
(159, 'B10', 'B', 10),
(160, 'C1', 'C', 1),
(161, 'C2', 'C', 2),
(162, 'C3', 'C', 3),
(163, 'C4', 'C', 4),
(164, 'C5', 'C', 5),
(165, 'C6', 'C', 6),
(166, 'C7', 'C', 7),
(167, 'C8', 'C', 8),
(168, 'C9', 'C', 9),
(169, 'C10', 'C', 10),
(170, 'D1', 'D', 1),
(171, 'D2', 'D', 2),
(172, 'D3', 'D', 3),
(173, 'D4', 'D', 4),
(174, 'D5', 'D', 5),
(175, 'D6', 'D', 6),
(176, 'D7', 'D', 7),
(177, 'D8', 'D', 8),
(178, 'D9', 'D', 9),
(179, 'D10', 'D', 10),
(180, 'BAR1', 'BAR', 1),
(181, 'BAR2', 'BAR', 2),
(182, 'BAR3', 'BAR', 3),
(183, 'BAR4', 'BAR', 4),
(184, 'BAR5', 'BAR', 5),
(185, 'BAR6', 'BAR', 6),
(186, 'BAR7', 'BAR', 7),
(187, 'BAR8', 'BAR', 8),
(188, 'BAR9', 'BAR', 9),
(189, 'BAR10', 'BAR', 10),
(190, 'S1', 'S', 1),
(191, 'S2', 'S', 2),
(192, 'S3', 'S', 3),
(193, 'S4', 'S', 4),
(194, 'S5', 'S', 5),
(195, 'S6', 'S', 6),
(196, 'S7', 'S', 7),
(197, 'S8', 'S', 8),
(198, 'S9', 'S', 9),
(199, 'S10', 'S', 10),
(200, 'S11', 'S', 11),
(201, 'S12', 'S', 12);

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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

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
(58, 0, 0, '2017-11-19 08:38:41'),
(59, 0, 0, '2017-11-19 08:39:30'),
(60, 0, 0, '2017-11-20 19:00:32'),
(61, 0, 0, '2017-11-20 19:48:53'),
(62, 0, 0, '2017-11-21 04:27:48'),
(63, 0, 0, '2017-11-21 04:50:20'),
(64, 0, 0, '2017-11-21 11:12:46'),
(65, 0, 0, '2017-11-21 11:13:24'),
(66, 0, 0, '2017-11-21 11:31:01'),
(67, 0, 0, '2017-11-21 20:33:28'),
(68, 0, 0, '2017-11-21 20:48:58'),
(69, 0, 0, '2017-11-21 20:49:34'),
(70, 0, 0, '2017-11-21 20:50:00'),
(71, 0, 0, '2017-11-21 20:57:48'),
(72, 0, 0, '2017-11-21 21:34:31'),
(73, 0, 0, '2017-11-21 22:07:16'),
(74, 0, 0, '2017-11-21 22:09:42'),
(75, 0, 0, '2017-11-21 22:18:55'),
(76, 0, 0, '2017-11-21 22:20:26'),
(77, 0, 0, '2017-11-21 22:21:26');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`transacH_id`, `transacH_time`, `transacH_date`, `transacH_table`, `transacH_cash`, `transacH_card`, `transacH_total`, `transacH_change`) VALUES
(1, '15:33:56', '2017-11-19', 'A03', '20', '', '20', '0'),
(2, '15:59:09', '2017-11-19', 'A01', '160', '', '160', '0'),
(3, '16:01:36', '2017-11-19', 'A02', '120', '', '120', '0'),
(4, '16:04:26', '2017-11-19', 'A02', '120', '', '120', '0'),
(5, '16:06:10', '2017-11-19', 'A02', '120', '', '120', '0'),
(6, '16:09:51', '2017-11-19', 'A02', '0', '', '0', '0'),
(9, '16:18:34', '2017-11-19', 'A01', '0', '', '0', '0'),
(10, '16:20:25', '2017-11-19', 'A01', '50', '', '50', '0'),
(11, '16:23:51', '2017-11-19', 'A01', '1050', '', '1020', '30'),
(12, '16:25:44', '2017-11-19', 'A01', '1500', '', '1305', '195'),
(13, '16:27:30', '2017-11-19', 'A01', '800', '', '720', '80');

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
(22, 'Rrhyy', 'Rrhy', 'Bacwaden', '12345', 'rrrhybacwaden@gmail.com', 'Admin', NULL),
(36, 'Princes', 'Princes', 'Criste', 'abc', 'princes@gmail.com', 'Checker', NULL),
(35, 'Steven', 'Steven', 'Bitmead', '12345', 'Steven@gmail.com', 'Admin', 'Active'),
(34, 'Niel', 'Niel', 'Gallego', '12345', 'niel@gmail.com', 'Cashier', NULL),
(33, 'Leonard', 'Leonard', 'Tagarino', '12345', 'leo@gmail.com', 'Cashier', NULL),
(31, 'Cynlai', 'Cynlai', 'Osorio', '12345', 'cynlaii@gmail.com', 'Checker', NULL),
(38, 'Jay', 'Jay', 'De Guzman', '12345', 'jay@gmail.com', 'Checker', NULL),
(55, '1995', 'Neil Kevin', 'Gallego', '0915', 'neilkevingallego@gmail.com', 'checker', 'Active'),
(56, '12345678910', 'fddf', 'fgdf', '$2y$10$QmdqXkknaWTZ.cGpCfNs4OVwLMGtqwdsbx/pGYLYfsSRCq0i8bg7S', '', 'Checker', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `waiter_commission`
--

DROP TABLE IF EXISTS `waiter_commission`;
CREATE TABLE IF NOT EXISTS `waiter_commission` (
  `comm_id` int(11) NOT NULL AUTO_INCREMENT,
  `item_comm` double DEFAULT NULL,
  `item_type` enum('drinks','dish') DEFAULT NULL,
  `time` time NOT NULL,
  `date` date NOT NULL,
  `waiter_name` varchar(255) NOT NULL,
  `i_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`comm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiter_commission`
--

INSERT INTO `waiter_commission` (`comm_id`, `item_comm`, `item_type`, `time`, `date`, `waiter_name`, `i_name`) VALUES
(1, 2, NULL, '15:58:51', '2017-11-19', 'Jay', ''),
(2, 2, NULL, '15:58:51', '2017-11-19', 'Jay', ''),
(3, 2, NULL, '15:58:51', '2017-11-19', 'Jay', ''),
(4, 2, NULL, '15:58:51', '2017-11-19', 'Jay', ''),
(5, 2, NULL, '16:01:18', '2017-11-19', 'Jay', ''),
(6, 2, NULL, '16:01:18', '2017-11-19', 'Jay', ''),
(7, 2, NULL, '16:01:18', '2017-11-19', 'Jay', ''),
(8, 6, NULL, '16:07:34', '2017-11-19', 'Jay', ''),
(9, 6, NULL, '16:07:34', '2017-11-19', 'Jay', ''),
(10, 6, NULL, '16:20:03', '2017-11-19', 'N/A', ''),
(11, 0, NULL, '16:21:48', '2017-11-19', 'Jay', 'Chicken Sandwich'),
(12, 0, NULL, '16:21:48', '2017-11-19', 'Jay', 'Clubhouse Sandwich'),
(13, 0, NULL, '16:24:55', '2017-11-19', 'Jay', 'Shanghai Fried Rice'),
(14, 0, NULL, '16:24:55', '2017-11-19', 'Jay', 'Seafood Fried Rice'),
(15, 0, NULL, '16:24:55', '2017-11-19', 'Jay', 'Lechon Rice'),
(16, 2, NULL, '16:27:16', '2017-11-19', 'Jay', 'Flaming Orgasm'),
(17, 2, NULL, '16:27:16', '2017-11-19', 'Jay', 'Slippery Nipple'),
(18, 6, NULL, '16:38:41', '2017-11-19', 'Leonard', 'Cold Cuts'),
(19, 0, NULL, '16:39:31', '2017-11-19', 'Jay', 'Coleslaw Salad'),
(20, 6, NULL, '03:00:32', '2017-11-21', 'Jay', 'Cold Cuts'),
(21, 6, NULL, '03:48:53', '2017-11-21', 'Leonard', 'Cold Cuts'),
(22, 6, NULL, '12:27:48', '2017-11-21', 'Steven', '1/2 Sizzling Chicken'),
(23, 0, NULL, '12:50:20', '2017-11-21', 'Steven', 'Shanghai Fried Rice'),
(24, 0, NULL, '19:13:24', '2017-11-21', 'Jay', 'Coleslaw Salad'),
(25, 6, NULL, '19:31:01', '2017-11-21', 'Leonard', 'Cold Cuts'),
(26, 2, NULL, '04:33:28', '2017-11-22', 'Leonard', 'Plain Margarita'),
(27, 2, NULL, '04:33:28', '2017-11-22', 'Leonard', 'Long Island Tea'),
(28, 2, NULL, '04:33:28', '2017-11-22', 'Leonard', 'Choco Mudslide'),
(29, 6, NULL, '04:48:58', '2017-11-22', 'Leonard', 'Cold Cuts'),
(30, 0, NULL, '04:49:34', '2017-11-22', 'Leonard', 'Clubhouse Sandwich'),
(31, 2, NULL, '04:50:00', '2017-11-22', 'Leonard', 'Plain Margarita'),
(32, 2, NULL, '04:50:00', '2017-11-22', 'Leonard', 'Blue Margarita'),
(33, 2, NULL, '04:50:01', '2017-11-22', 'Leonard', 'Tequila Sunrise'),
(34, 2, NULL, '04:57:48', '2017-11-22', 'Leonard', 'Plain Margarita'),
(35, 2, NULL, '04:57:48', '2017-11-22', 'Leonard', 'Long Island Tea'),
(36, 2, NULL, '04:57:48', '2017-11-22', 'Leonard', 'Choco Mudslide'),
(37, 6, NULL, '05:34:31', '2017-11-22', 'Jay', 'Cold Cuts'),
(38, 6, NULL, '05:34:31', '2017-11-22', 'Jay', 'Crispy Pata'),
(39, 6, NULL, '05:34:32', '2017-11-22', 'Jay', '1/2 Fried Chicken'),
(40, 6, NULL, '05:34:32', '2017-11-22', 'Jay', '1/2 Fried Chicken Garlic Sauce'),
(41, 6, NULL, '06:07:17', '2017-11-22', 'Cynlai', 'Crispy Pata'),
(42, 6, NULL, '06:07:17', '2017-11-22', 'Cynlai', '1/2 Fried Chicken'),
(43, 0, NULL, '06:07:17', '2017-11-22', 'Cynlai', 'Chicken Sandwich'),
(44, 6, NULL, '06:09:42', '2017-11-22', 'Neil', '1/2 Fried Chicken'),
(45, 0, NULL, '06:18:55', '2017-11-22', 'Jay', 'Toss Green Salad'),
(46, 6, NULL, '06:20:26', '2017-11-22', 'Jay', '1/2 Sizzling Chicken'),
(47, 6, NULL, '06:20:26', '2017-11-22', 'Jay', 'Crispy Pata'),
(48, 6, NULL, '06:21:26', '2017-11-22', 'Cynlai', '1/2 Sizzling Chicken');

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
(5, 'Steven', 'hidalgo', 'Waiter'),
(6, 'v', 'v vv', 'Waiter'),
(7, 'Cynlai', 'Osorio', 'Waiter'),
(8, 'Jay', 'd', 'Waiter'),
(9, 'Neil', 'bb', 'Waiter'),
(10, 'peps', 'pit', 'Waiter'),
(13, 'hello', 'world', 'Waiter'),
(14, 'pet', 'malu', 'Waiter'),
(15, 'ry', 'yr', 'Waiter'),
(16, 'ayie', 'bubits', 'Waiter'),
(17, 'ayie', 'hidalgo', 'Waiter'),
(18, 'Leonard', 'hidalgo', 'Waiter');

-- --------------------------------------------------------

--
-- Table structure for table `waiter_history`
--

DROP TABLE IF EXISTS `waiter_history`;
CREATE TABLE IF NOT EXISTS `waiter_history` (
  `commission` double NOT NULL,
  `charges` double NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `waiter_history`
--

INSERT INTO `waiter_history` (`commission`, `charges`, `date`, `time`) VALUES
(2, 30, '2017-11-01', '06:18:20'),
(4, 3, '2017-11-08', '11:31:27'),
(10, 5, '2017-11-01', '05:13:14'),
(5, 6, '2017-11-01', '04:17:11');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
