-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 15, 2025 at 04:41 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `product_cat`, `manufacture_date`, `expired_date`, `price`, `promotion_price`, `created`, `modified`) VALUES
(1, 'Basketball', 'A ball used in the NBA.', 0, '', '', 49.99, 0, '2015-08-02 12:04:03', '2024-12-28 09:31:15'),
(3, 'Gatorade', 'This is a very good drink for athletes.', 0, '', '', 1.99, 0, '2015-08-02 12:14:29', '2015-08-05 22:59:18'),
(4, 'Eye Glasses', 'It will make you read better.', 0, '', '', 6, 0, '2015-08-02 12:15:04', '2015-08-05 22:59:18'),
(5, 'Trash Can', 'It will help you maintain cleanliness.', 0, '', '', 3.95, 0, '2015-08-02 12:16:08', '2015-08-05 22:59:18'),
(6, 'Mouse', 'Very useful if you love your computer.', 0, '', '', 11.35, 0, '2015-08-02 12:17:58', '2015-08-05 22:59:18'),
(7, 'Earphone', 'You need this one if you love music.', 0, '', '', 7, 0, '2015-08-02 12:18:21', '2015-08-05 22:59:18'),
(8, 'Pillow', 'Sleeping well is important.', 0, '', '', 8.99, 0, '2015-08-02 12:18:56', '2015-08-05 22:59:18'),
(9, 'Apple', 'Fresh, Red', 0, '', '', 0, 0, '2024-12-13 02:09:00', '2024-12-13 02:09:00'),
(11, 'Cookies', 'Double Chocolate ', 0, '09/09/2024', '10/09/2026', 0, 0, '2024-12-13 03:03:58', '2024-12-13 03:03:58'),
(12, 'Banana', 'Yellow, sweet and healthy', 0, '09/09/2024', '10/10/2024', 0, 0, '2024-12-18 06:59:40', '2024-12-18 06:59:40'),
(13, 'Banana', 'Yellow', 0, '09/09/2024', '10/10/2024', 0, 0, '2024-12-20 04:40:18', '2024-12-20 04:40:18');

-- --------------------------------------------------------

--
-- Table structure for table `product_cat`
--

DROP TABLE IF EXISTS `product_cat`;
CREATE TABLE IF NOT EXISTS `product_cat` (
  `product_cat_id` int NOT NULL,
  `product_cat_name` varchar(30) NOT NULL,
  `product_cat_description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf16;

--
-- Dumping data for table `product_cat`
--

INSERT INTO `product_cat` (`product_cat_id`, `product_cat_name`, `product_cat_description`) VALUES
(0, 'sport', ''),
(0, 'hobby', ''),
(0, 'time', ''),
(2, 'bags', 'RM200, purple'),
(0, 'fruit', ''),
(1, 'fruit', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
