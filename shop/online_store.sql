-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 22, 2025 at 04:40 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `user_name` varchar(50) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `registrationdate` datetime NOT NULL,
  `accountstatus` tinyint(1) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_name`, `password`, `firstname`, `lastname`, `gender`, `dateofbirth`, `registrationdate`, `accountstatus`) VALUES
('pwc@gmail.com', 'ppp1000', 'Pan', 'Wei Cheng', 0, '2005-10-17 00:00:00', '2024-12-18 07:11:32', 1),
('pqq@gmail.com', 'paa2100', 'Pan', 'Wei Yu', 0, '2005-11-17 00:00:00', '2024-12-18 07:14:33', 0),
('phc@gmail.com', 'phc0909', 'pom', 'hang cuang', 0, '2005-12-02 00:00:00', '2024-12-20 06:18:09', 1),
('panweicheng@gmail.com', 'pwc1007', 'pan', 'Wei Cheng', 0, '2005-12-02 00:00:00', '2025-01-08 04:54:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `product_cat` int NOT NULL,
  `manufacture_date` text NOT NULL,
  `expired_date` text NOT NULL,
  `price` double NOT NULL,
  `promotion_price` double NOT NULL,
  `created` datetime NOT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `manufacture_date`, `expired_date`, `price`, `promotion_price`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 1, '', '', 49.99, 34.99, '2015-08-02 12:04:03', '2025-01-15 06:24:41'),
(2, 'Gatorade', 'This is a very good drink for athletes.', 2, '', '', 1.99, 0.99, '2015-08-02 12:14:29', '2025-01-15 06:24:49'),
(3, 'Eye Glasses', 'It will make you read better.', 2, '', '', 6, 3, '2015-08-02 12:15:04', '2025-01-15 06:24:55'),
(4, 'Trash Can', 'It will help you maintain cleanliness.', 2, '', '', 3.95, 1.99, '2015-08-02 12:16:08', '2025-01-15 06:25:06'),
(5, 'Mouse', 'Very useful if you love your computer.', 2, '', '', 11.35, 9.45, '2015-08-02 12:17:58', '2025-01-15 06:25:13'),
(6, 'Earphone', 'You need this one if you love music.', 2, '', '', 7, 3.99, '2015-08-02 12:18:21', '2025-01-15 06:25:19'),
(7, 'Pillow', 'Sleeping well is important.', 2, '', '', 8.99, 6.49, '2015-08-02 12:18:56', '2025-01-15 06:25:24'),
(8, 'Apple', 'Fresh, Red', 5, '', '', 5, 4, '2024-12-13 02:09:00', '2025-01-15 06:25:37'),
(9, 'Cookies', 'Double Chocolate ', 4, '09/09/2024', '10/09/2026', 7.5, 5, '2024-12-13 03:03:58', '2025-01-15 06:25:44'),
(10, 'Banana', 'Yellow, sweet and healthy', 5, '09/09/2024', '10/10/2024', 7.5, 5, '2024-12-18 06:59:40', '2025-01-15 06:25:56'),
(11, 'Strawberry', 'Red, sour and sweet', 5, '09/09/2024', '01/10/2024', 7.5, 6, '2025-01-15 06:00:22', '2025-01-17 14:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` int NOT NULL AUTO_INCREMENT,
  `product_cat_name` varchar(30) NOT NULL,
  `product_cat_description` text NOT NULL,
  PRIMARY KEY (`product_cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
(1, 'sport', ''),
(2, 'hobby', ''),
(3, 'time', ''),
(4, 'dessert ', ''),
(5, 'fruit', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
