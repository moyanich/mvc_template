-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2020 at 08:03 PM
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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `id` int(11) NOT NULL,
  `birth_date` date NOT NULL,
  `first_name` varchar(14) NOT NULL,
  `middle_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(16) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `empDOB` date DEFAULT NULL,
  `retirementDate` date DEFAULT NULL,
  `hire_date` date NOT NULL,
  `trn` char(9) NOT NULL,
  `nis` char(9) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `birth_date`, `first_name`, `middle_name`, `last_name`, `gender`, `empDOB`, `retirementDate`, `hire_date`, `trn`, `nis`) VALUES
(10001, '1963-09-02', 'Dorris', NULL, 'Bodhi', 'M', NULL, NULL, '1996-06-26', '', ''),
(10002, '1974-06-02', 'Bryanna', NULL, 'Kolleen', 'F', NULL, NULL, '1995-11-21', '', ''),
(10003, '1969-12-03', 'Rayner', NULL, 'Colt', 'M', NULL, NULL, '1996-08-28', '', ''),
(10004, '1964-05-01', 'Tanner', NULL, 'Clifford', 'M', NULL, NULL, '1996-12-01', '', ''),
(10005, '1965-01-21', 'Trent', NULL, 'Dolph', 'M', NULL, NULL, '1999-09-12', '', ''),
(10006, '1963-04-20', 'Ashlee', NULL, 'Cristen', 'F', NULL, NULL, '1999-06-02', '', ''),
(10007, '1967-05-23', 'Irene', NULL, 'Yazmin', 'F', NULL, NULL, '1999-02-10', '', ''),
(10008, '1968-02-19', 'Terence', NULL, 'Dalton', 'M', NULL, NULL, '2004-09-15', '', ''),
(10009, '1962-04-19', 'Regina', NULL, 'Wayland', 'F', NULL, NULL, '1995-02-18', '', ''),
(10010, '1973-06-01', 'Shanon', NULL, 'Mortimer', 'F', NULL, NULL, '1999-08-24', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
