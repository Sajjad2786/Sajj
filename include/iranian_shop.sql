-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 12, 2025 at 05:47 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iranian shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `orderdate` datetime NOT NULL,
  `pro_code` int(10) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_price` float NOT NULL,
  `totalprice` int(11) NOT NULL,
  `mobile` varchar(11) COLLATE utf8_persian_ci NOT NULL,
  `adress` varchar(400) COLLATE utf8_persian_ci NOT NULL,
  `trackcode` varchar(24) COLLATE utf8_persian_ci NOT NULL,
  `state` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `username`, `orderdate`, `pro_code`, `pro_qty`, `pro_price`, `totalprice`, `mobile`, `adress`, `trackcode`, `state`) VALUES
(8, 'sdcsfv', '2025-05-12 11:32:47', 1, 6, 3000, 18000, 'sdfsdfvcsd', 'dsfsdfdsfsfd', '000000000000000000000000', 2),
(10, 'mmad', '2025-05-12 17:38:10', 1, 2, 30500, 61000, '31254', 'ssssssssssssssssssssssssss', '000000000000000000000000', 3),
(12, 'mmad', '2025-05-12 17:40:57', 1, 2, 30500, 61000, '31254', 'ssssssssssssssssssssssssss', '000000000000000000000000', 3),
(13, 'mmad', '2025-05-12 17:41:15', 1, 2, 30500, 61000, '31254', 'ssssssssssssssssssssssssss', '000000000000000000000000', 0),
(14, 'mmad', '2025-05-12 17:42:27', 1, 2, 30500, 30500, '2000', 'ssssssssssssssssssssssssss', '000000000000000000000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(2000) COLLATE utf8_persian_ci NOT NULL,
  `description` text COLLATE utf8_persian_ci NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `image`, `description`, `qty`) VALUES
(1, 'Ø¯ÙˆØ±Ø¨ÛŒÙ† hd', 30500, '1747050796_download (1).jpg', 'Ø¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒ ÙˆØ¨Ø³ÛŒØ§Ø± Ù…Ù†Ø§Ø³Ø¨', 9),
(5, 'Ø¯ÙˆØ±Ø¨ÛŒÙ†', 3000, 'dont-touch-min.jpg', 'Ø¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒØ¯ÙˆØ±Ø¨ÛŒÙ† Ø¨Ø§ Ú©ÛŒÙÛŒØª Ø¹Ø§Ù„ÛŒ', 2),
(10, 'Ø±ÙˆÚ©Ø´ ÙØ±Ù…Ø§Ù† Ø®ÙˆØ¯Ø±Ùˆ', 45000, 'download (2).jpg', 'Ø¬Ù†Ø³ Ø®Ø¨ Ùˆ Ù…Ù‚Ø§Ø±Ù…', 6),
(6, 'ØµÙ†Ø¯Ù„ÛŒ Ú†Ø±Ù…', 45000, 'download.jpg', 'Ø¬Ù†Ø³ Ø®ÙˆØ¨ Ùˆ Ù…Ù‚Ø§Ø±Ù…', 6);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `realname` varchar(80) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(30) COLLATE utf8_persian_ci NOT NULL,
  `meli` varchar(10) COLLATE utf8_persian_ci NOT NULL,
  `password` int(20) NOT NULL,
  `email` varchar(60) COLLATE utf8_persian_ci NOT NULL,
  `type` tinyint(1) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`meli`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`realname`, `username`, `meli`, `password`, `email`, `type`, `create_at`) VALUES
('Sajjad12', 'lostst', '1234567891', 12365, 'shodow@gmail.com', 1, '2025-04-11 18:11:48');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
