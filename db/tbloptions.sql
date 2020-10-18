-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 12, 2020 at 04:29 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiftdb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbloptions`
--

DROP TABLE IF EXISTS `tbloptions`;
CREATE TABLE IF NOT EXISTS `tbloptions` (
  `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `option_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `option_value` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbloptions`
--

INSERT INTO `tbloptions` (`option_id`, `option_name`, `option_value`) VALUES
(1, 'siteurl', 'TEST-SITE'),
(2, 'companyname', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
