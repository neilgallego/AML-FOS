-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2017 at 05:33 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

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
-- Table structure for table `combo_db`
--

CREATE TABLE `combo_db` (
  `Combo_id` int(11) NOT NULL,
  `Combo_items` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu_db`
--

CREATE TABLE `menu_db` (
  `menuitem_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `item_category` varchar(255) NOT NULL,
  `item_happyprice` double NOT NULL,
  `item_regularprice` double DEFAULT NULL,
  `item_availability` enum('not available','available') DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `item_commission` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_db`
--

INSERT INTO `menu_db` (`menuitem_id`, `name`, `item_category`, `item_happyprice`, `item_regularprice`, `item_availability`, `code`, `item_commission`) VALUES
(1, 'Cold Cuts', 'Appetizer', 320, 350, 'available', 'AP01', 6),
(2, 'Crispy Pata', 'Appetizer', 420, 440, 'available', 'AP02', 6),
(3, '1/2 Fried Chicken', 'Appetizer', 180, 200, 'available', 'AP03', 6),
(4, '1/2 Fried Chicken Garlic Sauce', 'Appetizer', 200, 220, 'available', 'AP04', 6),
(5, 'Buttered Chicken', 'Appetizer', 200, 220, 'available', 'AP05', 6),
(6, 'Chicken Wings', 'Appetizer', 180, 190, 'available', 'AP06', 6),
(7, 'Chicken Lollipo', 'Appetizer', 180, 190, 'available', 'AP07', 6),
(8, 'Chicharon Bulaklak', 'Appetizer', 150, 160, 'available', 'AP08', 6),
(9, 'Lechon Kawali', 'Appetizer', 130, 140, 'available', 'AP09', 6),
(10, 'Nilasing na Hipon', 'Appetizer', 200, 220, 'available', 'AP10', 6),
(11, 'Camaron Rebosado', 'Appetizer', 190, 200, 'available', 'AP11', 6),
(12, 'Calamares', 'Appetizer', 210, 2200, 'available', 'AP12', 6),
(13, 'Fried Onion Rings', 'Appetizer', 100, 120, 'available', 'AP13', 3),
(14, 'Shanghai Lumpia', 'Appetizer', 120, 140, 'available', 'AP14', 6),
(15, 'Beef Tapas', 'SIZZLING', 15012312, 16023, 'available', 'AP15', 66),
(16, 'Tokwa\'t Baboy', 'Appetizer', 100, 120, 'available', 'AP16', 3),
(17, 'Kilawen Tanguigui', 'Appetizer', 225, 240, 'available', 'AP17', 6),
(18, 'Hotdog with Onions', 'Appetizer', 100, 120, 'available', 'AP18', 3),
(19, 'French Fried', 'Appetizer', 120, 140, 'available', 'AP19', 6),
(20, 'Chicharon Baboy', 'Appetizer', 90, 100, 'available', 'AP20', 3),
(21, 'Sliced Cucumber', 'Appetizer', 75, 85, 'available', 'AP21', 0),
(22, 'Cheese Lumpia', 'Appetizer', 80, 90, 'available', 'AP22', 0),
(23, 'Peanut', 'Appetizer', 75, 75, 'available', 'AP23', 0),
(24, '1/2 Sizzling Chicken', 'Sizzling', 210, 220, 'available', 'SZ01', 6),
(26, 'Sizzling Gambas', 'Sizzling', 215, 230, 'available', 'SZ02', 6),
(27, 'Sizzling Fried Shrimp with Garlic Sauce', 'Sizzling', 215, 230, 'available', 'SZ03', 6),
(28, 'Sizzling Mushroom w/G.Sauce', 'Sizzling', 180, 200, 'available', 'SZ04', 6),
(29, 'Sizzling Pusit', 'Sizzling', 220, 240, 'available', 'SZ05', 6),
(30, 'Sizzling Beef Tips', 'Sizzling', 200, 210, 'available', 'SZ06', 6),
(31, 'Sizzling Tanguigui', 'Sizzling', 250, 280, 'available', 'SZ07', 6),
(32, 'Sizzling Porkchop', 'Sizzling', 175, 190, 'available', 'SZ08', 6),
(33, 'Sizzling Hotdog', 'Sizzling', 140, 150, 'available', 'SZ09', 6),
(34, 'Alberto\'s Special', 'Sandwiches', 150, 150, 'available', 'SW01', 0),
(35, 'Clubhouse Sandwich', 'Sandwiches', 130, 130, 'available', 'SW02', 0),
(36, 'Chicken Sandwich', 'Sandwiches', 60, 60, 'available', 'SW03', 0),
(37, 'Ham & Egg Sandwich', 'Sandwiches', 60, 60, 'available', 'SW04', 0),
(38, 'Ham & Chess Sandwich', 'Sandwiches', 60, 60, 'available', 'SW05', 0),
(39, 'Inihaw na Pusit', 'Barbeques', 260, 275, 'available', 'BQ01', 6),
(40, 'Inihaw na Baboy', 'Barbeques', 110, 120, 'available', 'BQ02', 6),
(41, 'Chicken Barbeque', 'Barbeques', 100, 100, 'available', 'BQ03', 3),
(42, 'Pork Barbeque', 'Barbeques', 70, 75, 'available', 'BQ04', 3),
(43, 'Fried Chicken Rice', 'Rice Toppings', 130, 130, 'available', 'RT01', 0),
(44, 'Porkchop Rice', 'Rice Toppings', 130, 130, 'available', 'RT02', 0),
(45, 'Lechon Rice', 'Rice Toppings', 130, 130, 'available', 'RT03', 0),
(46, 'Seafood Fried Rice', 'Rice Toppings', 105, 105, 'available', 'RT04', 0),
(47, 'Shanghai Fried Rice', 'Rice Toppings', 95, 105, 'available', 'RT05', 0),
(48, 'Garlic Rice', 'Rice Toppings', 35, 35, 'available', 'RT06', 0),
(49, 'Plain Rice', 'Rice Toppings', 30, 30, 'available', 'RT07', 0),
(50, 'Mixed Fruits', 'Salads', 350, 400, 'available', 'SD01', 6),
(51, 'Chef\'s Salad', 'Salads', 110, 120, 'available', 'SD02', 0),
(52, 'Vegetable Sticks', 'Salads', 120, 130, 'available', 'SD03', 0),
(53, 'Toss Green Salad', 'Salads', 100, 100, 'available', 'SD04', 0),
(54, 'Coleslaw Salad', 'Salads', 90, 100, 'available', 'SD05', 0),
(55, 'Pancit Bihon Guisado', 'Noodles/Soup', 120, 120, 'available', 'NS01', 0),
(56, 'Sotangon Guisado', 'Noodles/Soup', 120, 120, 'available', 'NS02', 0),
(57, 'Pancit Canton', 'Noodles/Soup', 130, 130, 'available', 'NS03', 0),
(58, 'Hottotay Soup', 'Noodles/Soup', 120, 120, 'available', 'NS04', 0),
(59, 'Mushroom Soup', 'Noodles/Soup', 120, 120, 'available', 'NS05', 0),
(60, 'Beef Mami', 'Noodles/Soup', 75, 75, 'available', 'NS06', 0),
(61, 'Chicken Mami', 'Noodles/Soup', 75, 75, 'available', 'NS07', 0),
(62, 'Lomi', 'Noodles/Soup', 100, 100, 'available', 'NS08', 0),
(63, 'Plain Margarita', 'Cocktails', 90, 100, 'available', 'CT1', 2),
(64, 'Blue Margarita', 'Cocktails', 90, 100, 'available', 'CT2', 2),
(65, 'Tequila Sunrise', 'Cocktails', 90, 95, 'available', 'CT3', 2),
(66, 'Zombie', 'Cocktails', 90, 100, 'available', 'CT4', 2),
(67, 'Mai Tai', 'Cocktails', 90, 95, 'available', 'CT5', 2),
(68, 'Pina Colada', 'Cocktails', 90, 100, 'available', 'CT6', 2),
(69, 'Blue Hawaiian', 'Cocktails', 90, 95, 'available', 'CT7', 2),
(70, 'Weng Weng', 'Cocktails', 110, 120, 'available', 'CT8', 2),
(71, 'Sex on the Beach', 'Cocktails', 90, 100, 'available', 'CT9', 2),
(72, 'Choco Mudslide', 'Cocktails', 90, 100, 'available', 'CT10', 2),
(73, 'Caramel Mudslide', 'Cocktails', 90, 100, 'not available', 'CT11', 2),
(74, 'Long Island Tea', 'Cocktails', 110, 120, 'not available', 'CT12', 2),
(75, 'Kamikaze', 'Cocktails', 90, 95, 'not available', 'CT13', 2),
(76, 'Blue Lagoon', 'Cocktails', 90, 95, 'not available', 'CT14', 2),
(77, 'Black Russian', 'Cocktails', 90, 95, 'not available', 'CT15', 2),
(78, 'White Russian', 'Cocktails', 90, 95, 'not available', 'CT16', 2),
(79, 'Cosmopolitan', 'Cocktails', 90, 95, 'not available', 'CT17', 2),
(80, 'Sweet Martini', 'Cocktails', 90, 95, 'not available', 'CT18', 2),
(81, 'Dry Martini', 'Cocktails', 90, 95, 'not available', 'CT19', 2),
(82, 'Bull Jagger', 'Cocktails', 110, 120, 'not available', 'CT20', 2),
(83, 'Weng Weng', 'Pitcher Cocktails', 620, 650, 'not available', 'PC1', 2),
(84, 'Zombie', 'Pitcher Cocktails', 580, 600, 'not available', 'PC2', 2),
(85, 'Margarita', 'Pitcher Cocktails', 580, 600, 'not available', 'PC3', 2),
(86, 'Blow Job', 'Shooters', 90, 100, 'not available', 'SH1', 2),
(87, 'Slippery Nipple', 'Shooters', 90, 100, 'not available', 'SH2', 2),
(88, 'Flaming Orgasm', 'Shooters', 90, 100, 'not available', 'SH3', 2),
(89, 'Vodka Snipper', 'Shooters', 90, 100, 'not available', 'SH4', 2),
(90, 'B-51', 'Shooters', 90, 100, 'not available', 'SH5', 2),
(91, 'Absolute Blue(Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 100, 'not available', 'TG1', 2),
(92, 'Absolute Citron (Single Shot)', 'Tequila/Gin/Rum/Vodka', 95, 110, 'not available', 'TG2', 2),
(93, 'Smirnoff (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 100, 'not available', 'TG3', 2),
(94, 'Cuervo Gold (Single Shot)', 'Tequila/Gin/Rum/Vodka', 95, 110, 'not available', 'TG4', 2),
(95, 'Bacardi Gold (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 90, 'not available', 'TG5', 2),
(96, 'Tangueray Gin (Single Shot)', 'Tequila/Gin/Rum/Vodka', 85, 90, 'not available', 'TG6', 2),
(97, 'Absolute Blue (750ml)', 'Tequila/Gin/Rum/Vodka', 1900, 2000, 'not available', 'TG7', 19),
(98, 'Absolute Citron (750ml)', 'Tequila/Gin/Rum/Vodka', 2100, 2200, 'not available', 'TG8', 19),
(99, 'Smirnoff (750ml)', 'Tequila/Gin/Rum/Vodka', 1400, 1500, 'not available', 'TG9', 19),
(100, 'Cuervo Gold (750ml)', 'Tequila/Gin/Rum/Vodka', 2100, 2200, 'not available', 'TG10', 19),
(101, 'Bacardi Gold (750ml)', 'Tequila/Gin/Rum/Vodka', 1400, 1500, 'not available', 'TG11', 19),
(102, 'Tangueray gin (750ml)', 'Tequila/Gin/Rum/Vodka', 1700, 1500, 'not available', 'TG12', 19),
(103, 'Johnny Walker Black (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'not available', 'SC1', 2),
(104, 'Chivas Regal (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'available', 'SC2', 2),
(105, 'J & B (Single Shot)', 'Scotch/Cognac/Brandy', 90, 95, 'available', 'SC3', 2),
(106, 'Remy Martin (Single Shot)', 'Scotch/Cognac/Brandy', 170, 180, 'available', 'SC4', 2),
(107, 'Henessy V.S.O.P (Single Shot)', 'Scotch/Cognac/Brandy', 175, 190, 'available', 'SC5', 2),
(108, 'Carlos 1 (Single Shot)', 'Scotch/Cognac/Brandy', 130, 150, 'available', 'SC6', 2),
(109, 'Fundador (Single Shot)', 'Scotch/Cognac/Brandy', 90, 95, 'available', 'SC7', 2),
(110, 'Jack Daniel (Single Shot)', 'Scotch/Cognac/Brandy', 115, 130, 'available', 'SC8', 2),
(111, 'Jim Beam (Single Shot)', 'Scotch/Cognac/Brandy', 100, 110, 'available', 'SC9', 2),
(112, 'Johnny Walker Black (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC10', 19),
(123, 'Chivas Regal (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC11', 19),
(124, 'J & B (750ml)', 'Scotch/Cognac/Brandy', 1900, 1800, 'available', 'SC12', 19),
(125, 'Remy Martin (750ml)', 'Scotch/Cognac/Brandy', 3500, 3600, 'available', 'SC13', 19),
(126, 'Henessy V.S.O.P (750ml)', 'Scotch/Cognac/Brandy', 3700, 3800, 'available', 'SC14', 19),
(127, 'Carlos 1 (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC15', 19),
(128, 'Fundador (750ml)', 'Scotch/Cognac/Brandy', 1400, 1500, 'available', 'SC16', 19),
(129, 'Jack Daniel (750ml)', 'Scotch/Cognac/Brandy', 2300, 2400, 'available', 'SC17', 19),
(130, 'Jim Beam (750ml)', 'Scotch/Cognac/Brandy', 1700, 1800, 'available', 'SC18', 19),
(131, 'Beer Tower', 'Smb Draft/ Bottled Beer', 600, 640, 'available', 'SB1', 10),
(132, 'Barrel', 'Smb Draft/ Bottled Beer', 590, 560, 'available', 'SB2', 6),
(133, 'Pitcher', 'Smb Draft/ Bottled Beer', 200, 220, 'available', 'SB3', 2),
(134, 'Mug', 'Smb Draft/ Bottled Beer', 50, 60, 'available', 'SB4', 0),
(135, 'San Miguel Pale Pilsen', 'Smb Draft/ Bottled Beer', 50, 60, 'available', 'SB5', 0.5),
(136, 'San Miguel Light', 'Smb Draft/ Bottled Beer', 55, 65, 'available', 'SB6', 0.5),
(137, 'San Miguel Light (Apple/Lemon)', 'Smb Draft/ Bottled Beer', 55, 65, 'available', 'SB7', 0.5),
(138, 'Red Horse', 'Smb Draft/ Bottled Beer', 50, 65, 'available', 'SB8', 0.5),
(140, 'Cali', 'Smb Draft/ Bottled Beer', 50, 65, 'available', 'SB9', 0.5),
(141, 'Gold Schalger (Singe Shot)', 'Liquers', 110, 120, 'available', 'LQ1', 2),
(142, 'Baileys (Single Shot)', 'Liquers', 90, 100, 'available', 'LQ2', 2),
(143, 'Kahlua (Single Shot)', 'Liquers', 90, 95, 'available', 'LQ3', 2),
(144, 'Tequila Rose (Single Shot)', 'Liquers', 100, 110, 'available', 'LQ4', 2),
(145, 'Jager Miester (Single Shot)', 'Liquers', 100, 110, 'available', 'LQ5', 2),
(146, 'Gold Schalger (750ml)', 'Liquers', 2300, 2400, 'available', 'LQ6', 19),
(147, 'Baileys (750ml)', 'Liquers', 1900, 2000, 'available', 'LQ7', 19),
(148, 'Kahlua (750ml)', 'Liquers', 1700, 1800, 'available', 'LQ8', 19),
(149, 'Tequila Rose (750ml)', 'Liquers', 1900, 2000, 'available', 'LQ9', 19),
(150, 'Jager Miester (750ml)', 'Liquers', 1900, 2000, 'available', 'LQ10', 19),
(151, 'Four Season', 'Mocktail Hot and Cold Beverages', 85, 85, 'available', 'MT1', 0),
(152, 'Shirley Temple', 'Mocktail Hot and Cold Beverages', 75, 75, 'available', 'MT2', 0),
(153, 'Iced Lemonde', 'Mocktail Hot and Cold Beverages', 70, 70, 'available', 'MT3', 0),
(154, 'Cranberry Cocktail', 'Mocktail Hot and Cold Beverages', 80, 80, 'available', 'MT4', 0),
(155, 'Cali Temple', 'Mocktail Hot and Cold Beverages', 85, 85, 'available', 'MT5', 0),
(156, 'Orange Juice', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT6', 0),
(157, 'Pineapple Juice', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT7', 0),
(158, 'Mango Juice', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT8', 0),
(159, 'Iced Tea', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT9', 0),
(160, 'Iced Choco', 'Mocktail Hot and Cold Beverages', 70, 70, 'available', 'MT10', 0),
(161, 'Iced Coffee', 'Mocktail Hot and Cold Beverages', 70, 70, 'available', 'MT11', 0),
(162, 'Hot Calamansi', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT12', 0),
(163, 'Cold Calamansi', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT13', 0),
(164, 'Hot Choco', 'Mocktail Hot and Cold Beverages', 50, 50, 'available', 'MT14', 0),
(165, 'Hot Coffee', 'Mocktail Hot and Cold Beverages', 45, 45, 'available', 'MT15', 0),
(166, 'Coke', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT16', 0),
(167, 'Sprite', 'Mocktail Hot and Cold Beverages', 60, 60, 'available', 'MT17', 0),
(168, 'Strawberry Shake', 'Fruit Shakes', 150, 160, 'available', 'FS1', 0),
(169, 'Pineapple Shake', 'Fruit Shakes', 110, 120, 'available', 'FS2', 0),
(170, 'Apple Shake', 'Fruit Shakes', 110, 120, 'available', 'FS3', 0),
(171, 'Orange Shake', 'Fruit Shakes', 130, 140, 'available', 'FS4', 0),
(172, 'Mango Shake', 'Fruit Shakes', 140, 150, 'available', 'FS5', 0),
(173, 'Green Mango Shake', 'Fruit Shakes', 140, 150, 'available', 'FS6', 0),
(174, 'SET 1', 'COMBO', 800, 800, NULL, 'CB01', 22),
(175, 'SET 2', 'COMBO', 1200, 1200, NULL, 'CB02', 20),
(176, 'SET 3', 'COMBO', 1500, 1500, NULL, 'CB03', 22),
(177, 'SET 4', 'COMBO', 1800, 1800, NULL, 'CB04', 22);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `combo_db`
--
ALTER TABLE `combo_db`
  ADD PRIMARY KEY (`Combo_id`,`Combo_items`),
  ADD KEY `combo_items_idx` (`Combo_items`);

--
-- Indexes for table `menu_db`
--
ALTER TABLE `menu_db`
  ADD PRIMARY KEY (`menuitem_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu_db`
--
ALTER TABLE `menu_db`
  MODIFY `menuitem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `combo_db`
--
ALTER TABLE `combo_db`
  ADD CONSTRAINT `combo_id` FOREIGN KEY (`Combo_id`) REFERENCES `menu_db` (`menuitem_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `combo_items` FOREIGN KEY (`Combo_items`) REFERENCES `menu_db` (`menuitem_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
