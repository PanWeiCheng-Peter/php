-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 12, 2025 at 07:25 AM
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
  `gender` varchar(8) NOT NULL,
  `dateofbirth` datetime NOT NULL,
  `registrationdate` datetime NOT NULL,
  `accountstatus` varchar(15) NOT NULL,
  PRIMARY KEY (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`user_name`, `password`, `firstname`, `lastname`, `gender`, `dateofbirth`, `registrationdate`, `accountstatus`) VALUES
('pwc@gmail.com', 'pan2005', 'Pan', 'Wen Chong', 'Male', '2010-12-07 00:00:00', '2025-12-01 00:00:00', 'Active'),
('pqq@gmail.com', 'paa2100', 'Pan', 'Wei Yu', 'Female', '2005-11-17 00:00:00', '2024-12-18 07:14:33', 'Active'),
('phc@gmail.com', 'phc0909', 'pom', 'hang cuang', 'Male', '2005-12-02 00:00:00', '2024-12-20 06:18:09', 'Non-Active'),
('panweicheng@gmail.com', 'pwc1007', 'pan', 'Wei Cheng', 'Male', '2005-12-02 00:00:00', '2025-01-08 04:54:13', 'Active'),
('pan@gmail.com', 'pwc1234', 'Pang', 'Wei Cheng', 'Male', '2000-07-10 12:02:34', '2025-02-12 06:31:55', 'Active'),
('james@gmail.com', 'james1000', 'James', 'Woo', 'Female', '2000-07-10 12:02:34', '2025-02-12 06:35:55', 'Non-Active');

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `manufacture_date`, `expired_date`, `price`, `promotion_price`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 1, '09/08/2024', '-', 49.99, 34.99, '2015-08-02 12:04:03', '2025-01-22 05:27:16'),
(2, 'Gatorade', 'This is a very good drink for athletes.', 1, '09/09/2024', '09/01/2025', 1.99, 0.99, '2015-08-02 12:14:29', '2025-01-22 05:27:33'),
(3, 'Eye Glasses', 'It will make you read better.', 2, '09/09/2024', '-', 6, 3, '2015-08-02 12:15:04', '2025-02-05 06:10:31'),
(4, 'Trash Can', 'It will help you maintain cleanliness.', 3, '09/09/2024', '-', 3.95, 1.99, '2015-08-02 12:16:08', '2025-02-05 06:10:26'),
(5, 'Mouse', 'Very useful if you love your computer.', 2, '09/09/2024', '-', 11.35, 9.45, '2015-08-02 12:17:58', '2025-02-05 06:10:21'),
(6, 'Earphone', 'You need this one if you love music.', 2, '09/09/2024', '-', 7, 3.99, '2015-08-02 12:18:21', '2025-02-05 06:10:13'),
(7, 'Pillow', 'Sleeping well is important.', 3, '09/09/2024', '-', 8.99, 6.49, '2015-08-02 12:18:56', '2025-02-05 06:10:08'),
(8, 'Apple', 'Fresh, Red', 5, '09/09/2024', '12/09/2024', 5, 4, '2024-12-13 02:09:00', '2025-01-22 05:18:35'),
(9, 'Cookies', 'Double Chocolate ', 4, '09/09/2024', '10/09/2026', 7.5, 5, '2024-12-13 03:03:58', '2025-01-15 06:25:44'),
(10, 'Banana', 'Yellow, sweet and healthy', 5, '09/09/2024', '10/10/2024', 7.5, 5, '2024-12-18 06:59:40', '2025-01-15 06:25:56'),
(11, 'Strawberry', 'Red, sour and sweet', 5, '09/09/2024', '01/10/2024', 7.5, 6, '2025-01-15 06:00:22', '2025-01-17 14:48:39'),
(12, '100 plux', 'good to drink', 1, '09/09/2024', '10/10/2025', 4.99, 0, '2025-01-22 04:50:08', '2025-02-12 06:34:35'),
(19, '100 plux', '1', 0, '09/09/2024', '10/10/2025', 0, 0, '2025-01-22 04:52:16', '2025-01-22 04:52:16'),
(20, '100 plux', '1', 0, '09/09/2024', '10/10/2025', 0, 0, '2025-01-22 04:53:37', '2025-01-22 04:53:37'),
(21, '100 plux', '1', 0, '09/09/2024', '10/10/2025', 0, 0, '2025-01-22 04:54:00', '2025-01-22 04:54:00'),
(22, '100 plux', '1', 0, '09/09/2024', '10/10/2025', 0, 0, '2025-01-22 04:56:25', '2025-01-22 04:56:25'),
(23, '100 plux', '1', 0, '09/09/2024', '10/10/2025', 0, 0, '2025-01-22 04:59:09', '2025-01-22 04:59:09'),
(24, '100 plux', '1', 0, '09/09/2024', '10/10/2025', 0, 0, '2025-01-22 04:59:44', '2025-01-22 04:59:44');

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
(2, 'electronic_product', ''),
(3, 'furniture', ''),
(4, 'dessert ', ''),
(5, 'fruit', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
