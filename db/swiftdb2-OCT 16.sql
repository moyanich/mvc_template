-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 16, 2020 at 06:44 PM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swiftdb2`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `retireFemale` (IN `years` INT)  NO SQL
BEGIN
UPDATE tblemployees SET 
retirementDate = DATE_ADD(empDOB, INTERVAL years YEAR )
WHERE gender = "Female";
 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMaleRetirement` (IN `years` INT)  NO SQL
BEGIN
UPDATE tblemployees SET 
retirementDate = DATE_ADD(empDOB, INTERVAL years YEAR )
 WHERE gender = "Male";
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `archivesdepartmentemployee`
--

CREATE TABLE `archivesdepartmentemployee` (
  `id` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `deptID` char(6) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `date_changed` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `action` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `archivesdepartmentemployee`
--

INSERT INTO `archivesdepartmentemployee` (`id`, `empID`, `jobID`, `deptID`, `from_date`, `to_date`, `created_date`, `date_changed`, `action`) VALUES
(1, 94, 14, 'dep2', '2020-10-06', '2020-10-06', '2020-10-06 14:33:16', '2020-10-07 14:55:54', ''),
(2, 93, 14, 'dep2', '2021-02-07', '2020-03-22', '2020-10-07 09:18:25', '2020-10-07 15:05:58', ''),
(3, 93, 1, 'dep0', '2020-10-07', '2020-10-07', '2020-10-07 09:05:23', '2020-10-07 15:10:28', ''),
(4, 93, 14, 'dep1', '2020-10-01', '2022-10-01', '2020-10-07 10:10:17', '2020-10-07 15:10:42', ''),
(5, 93, 15, '1001', '2020-10-07', '2020-10-17', '2020-10-07 10:28:06', '2020-10-07 15:28:06', 'insert'),
(6, 94, 14, 'dep3', '2020-10-06', '2021-10-06', '2020-10-06 14:33:42', '2020-10-07 15:29:27', 'deletion'),
(7, 94, 15, '1001', '2020-10-07', '2020-10-31', '2020-10-07 10:30:05', '2020-10-07 15:30:05', 'insert'),
(8, 94, 16, 'dep0', '2020-10-09', '2020-11-28', '2020-10-07 10:41:14', '2020-10-07 15:41:14', 'insert'),
(25, 0, 1, '1001', '2004-12-22', '2003-10-21', '2020-10-07 11:25:14', '2020-10-07 16:25:14', 'insert'),
(26, 0, 14, 'dep9', '1973-06-12', '2018-07-31', '2020-10-07 11:28:06', '2020-10-07 16:28:06', 'insert'),
(28, 93, 1, '1001', '2004-12-22', '2003-10-21', '2020-10-07 11:25:14', '2020-10-08 00:09:16', 'deletion'),
(29, 0, 17, 'dep8', '2020-10-08', '2020-11-07', '2020-10-07 19:10:07', '2020-10-08 00:10:07', 'insert'),
(30, 0, 22, 'dep1', '2020-10-11', '2021-02-06', '2020-10-07 19:38:04', '2020-10-08 00:38:04', 'update'),
(31, 0, 16, 'dep5', '2011-08-19', '2020-10-07', '2020-10-07 20:50:16', '2020-10-08 01:50:16', 'insert'),
(32, 0, 1, 'dep4', '1995-11-25', '2001-03-07', '2020-10-07 21:17:37', '2020-10-08 02:17:37', 'insert'),
(33, 0, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:02:01', '2020-10-09 17:02:01', 'insert'),
(34, 0, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:02:41', '2020-10-09 17:02:41', 'insert'),
(35, 0, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:12:54', '2020-10-09 17:12:54', 'insert'),
(36, 0, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:13:27', '2020-10-09 17:13:27', 'insert'),
(37, 0, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:19:33', '2020-10-09 17:19:33', 'insert'),
(38, 0, 18, 'dep8', '1981-02-07', '2004-05-01', '2020-10-09 12:28:02', '2020-10-09 17:28:02', 'insert'),
(39, 0, 18, 'dep8', '1975-12-14', '1970-03-30', '2020-10-09 13:38:23', '2020-10-09 18:38:23', 'insert'),
(40, 0, 18, 'dep8', '1975-12-14', '1970-03-30', '2020-10-09 13:39:27', '2020-10-09 18:39:27', 'insert'),
(41, 0, 23, 'dep5', '2001-05-07', '2017-05-22', '2020-10-09 13:41:46', '2020-10-09 18:41:46', 'insert'),
(42, 0, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:50:38', '2020-10-09 18:50:38', 'insert'),
(43, 0, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:51:14', '2020-10-09 18:51:14', 'insert'),
(44, 0, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:52:10', '2020-10-09 18:52:10', 'insert'),
(45, 0, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:54:33', '2020-10-09 18:54:33', 'insert'),
(46, 0, 14, 'dep8', '2012-08-09', '1983-02-14', '2020-10-09 13:55:47', '2020-10-09 18:55:47', 'insert'),
(47, 0, 24, 'dep8', '2016-08-16', '1975-03-30', '2020-10-09 13:55:53', '2020-10-09 18:55:53', 'insert'),
(48, 0, 24, 'dep8', '2016-08-16', '1975-03-30', '2020-10-09 14:03:48', '2020-10-09 19:03:48', 'insert'),
(49, 93, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:52:10', '2020-10-09 19:04:09', 'deletion'),
(50, 93, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:54:33', '2020-10-09 19:04:46', 'deletion'),
(51, 93, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:51:14', '2020-10-09 19:04:59', 'deletion'),
(52, 93, 24, 'dep1', '2020-10-24', '2020-10-29', '2020-10-09 13:50:38', '2020-10-09 19:05:06', 'deletion'),
(53, 0, 25, 'dep2', '1986-09-15', '1995-11-17', '2020-10-09 14:08:04', '2020-10-09 19:08:04', 'insert'),
(54, 0, 24, 'dep2', '2001-07-06', '2008-12-05', '2020-10-09 14:08:29', '2020-10-09 19:08:29', 'insert'),
(55, 0, 24, 'dep2', '2010-04-26', '2002-09-25', '2020-10-09 14:15:28', '2020-10-09 19:15:28', 'insert'),
(56, 0, 24, '1001', '2010-12-02', '2018-10-20', '2020-10-09 15:09:00', '2020-10-09 20:09:00', 'insert'),
(57, 0, 24, 'dep2', '2010-04-26', '2002-09-25', '2020-10-09 15:36:53', '2020-10-09 20:36:53', 'insert'),
(58, 94, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:02:01', '2020-10-10 14:35:21', 'deletion'),
(59, 94, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:02:41', '2020-10-10 14:35:21', 'deletion'),
(60, 94, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:12:54', '2020-10-10 14:35:21', 'deletion'),
(61, 94, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:13:27', '2020-10-10 14:35:21', 'deletion'),
(62, 94, 24, 'dep6', '2006-10-17', '2020-10-09', '2020-10-09 12:19:33', '2020-10-10 14:35:21', 'deletion'),
(63, 93, 24, 'dep8', '2016-08-16', '1975-03-30', '2020-10-09 13:55:53', '2020-10-10 14:35:21', 'deletion'),
(64, 93, 24, 'dep8', '2016-08-16', '1975-03-30', '2020-10-09 14:03:48', '2020-10-10 14:35:21', 'deletion'),
(65, 159, 24, 'dep2', '2001-07-06', '2008-12-05', '2020-10-09 14:08:29', '2020-10-10 14:35:21', 'deletion'),
(66, 159, 24, 'dep2', '2010-04-26', '2002-09-25', '2020-10-09 14:15:28', '2020-10-10 14:35:22', 'deletion'),
(67, 93, 24, '1001', '2010-12-02', '2018-10-20', '2020-10-09 15:09:00', '2020-10-10 14:35:22', 'deletion'),
(68, 159, 24, 'dep2', '2010-04-26', '2002-09-25', '2020-10-09 15:36:53', '2020-10-10 14:35:22', 'deletion'),
(69, 0, 24, '1001', '2014-03-09', '2020-11-07', '2020-10-10 09:35:44', '2020-10-10 14:35:44', 'insert'),
(70, 166, 24, '1001', '2014-03-09', '2020-11-07', '2020-10-10 09:35:44', '2020-10-10 14:38:14', 'deletion'),
(71, 0, 24, 'dep9', '1978-05-05', '2020-11-07', '2020-10-10 09:38:25', '2020-10-10 14:38:25', 'insert'),
(72, 0, 24, 'dep5', '2020-02-12', '2021-04-29', '2020-10-10 09:43:24', '2020-10-10 14:43:24', 'insert'),
(73, 0, 1, 'dep5', '2020-10-10', '2021-01-01', '2020-10-10 09:44:35', '2020-10-10 14:44:35', 'insert'),
(74, 0, 20, 'dep6', '2020-11-28', '2021-04-02', '2020-10-10 09:45:00', '2020-10-10 14:45:00', 'insert'),
(75, 0, 25, 'dep5', '2020-12-12', '2020-10-10', '2020-10-10 09:47:35', '2020-10-10 14:47:35', 'insert'),
(76, 0, 25, 'dep2', '1997-10-05', '2002-05-14', '2020-10-10 11:21:52', '2020-10-10 16:21:52', 'insert'),
(77, 0, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:22:42', '2020-10-10 16:22:42', 'insert'),
(78, 0, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:37:04', '2020-10-10 16:37:04', 'insert'),
(79, 0, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:37:43', '2020-10-10 16:37:43', 'insert'),
(80, 0, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:38:12', '2020-10-10 16:38:12', 'insert'),
(81, 166, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:22:42', '2020-10-10 16:38:43', 'deletion'),
(82, 166, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:37:04', '2020-10-10 16:38:46', 'deletion'),
(83, 166, 24, 'dep9', '1978-05-05', '2020-11-07', '2020-10-10 09:38:25', '2020-10-10 16:38:50', 'deletion'),
(84, 166, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:37:43', '2020-10-10 16:38:52', 'deletion'),
(85, 166, 24, 'dep9', '1972-04-16', '2000-07-25', '2020-10-10 11:38:12', '2020-10-10 16:38:57', 'deletion'),
(86, 0, 16, '1001', '1998-12-14', '2020-10-10', '2020-10-10 11:39:33', '2020-10-10 16:39:33', 'insert'),
(87, 0, 24, '1001', '1998-12-14', '2020-10-10', '2020-10-10 11:39:41', '2020-10-10 16:39:41', 'update'),
(88, 0, 24, '1001', '1998-12-14', '2020-10-10', '2020-10-10 11:40:25', '2020-10-10 16:40:25', 'update'),
(89, 0, 24, '1001', '1998-12-14', '2020-10-10', '2020-10-10 11:40:57', '2020-10-10 16:40:57', 'update'),
(90, 0, 24, '1001', '1998-12-14', '2020-10-10', '2020-10-10 11:41:08', '2020-10-10 16:41:08', 'update'),
(91, 0, 24, '1001', '1998-12-14', '2020-10-10', '2020-10-10 11:41:16', '2020-10-10 16:41:16', 'update'),
(92, 120, 24, '1001', '1998-12-14', '2020-10-10', '2020-10-10 11:39:33', '2020-10-10 16:42:31', 'deletion'),
(93, 0, 22, 'dep0', '1971-12-03', '2020-10-10', '2020-10-10 11:42:43', '2020-10-10 16:42:43', 'insert'),
(94, 0, 24, 'dep0', '1971-12-03', '2020-10-10', '2020-10-10 11:42:54', '2020-10-10 16:42:54', 'update'),
(95, 0, 1, 'dep0', '1971-12-03', '2020-10-10', '2020-10-10 11:44:40', '2020-10-10 16:44:40', 'update'),
(96, 0, 24, 'dep0', '1971-12-03', '2020-10-10', '2020-10-10 11:47:36', '2020-10-10 16:47:36', 'update'),
(97, 120, 24, 'dep0', '1971-12-03', '2020-10-10', '2020-10-10 11:42:43', '2020-10-10 16:48:44', 'deletion'),
(98, 0, 18, 'dep5', '1978-01-28', '1984-06-05', '2020-10-10 11:48:58', '2020-10-10 16:48:58', 'insert'),
(99, 0, 24, 'dep5', '1978-01-28', '1984-06-05', '2020-10-10 11:49:12', '2020-10-10 16:49:12', 'update'),
(100, 0, 24, 'dep5', '1978-01-28', '1984-06-05', '2020-10-10 11:50:32', '2020-10-10 16:50:32', 'update'),
(101, 0, 20, 'dep1', '2011-05-23', '1979-08-18', '2020-10-10 11:52:00', '2020-10-10 16:52:00', 'insert'),
(102, 0, 24, 'dep1', '2011-05-23', '1979-08-18', '2020-10-10 11:52:22', '2020-10-10 16:52:22', 'update'),
(103, 0, 24, 'dep1', '2011-05-23', '1979-08-18', '2020-10-10 11:55:49', '2020-10-10 16:55:49', 'update'),
(104, 0, 24, 'dep1', '2011-05-23', '1979-08-18', '2020-10-10 11:56:57', '2020-10-10 16:56:57', 'update'),
(105, 0, 24, 'dep1', '2011-05-23', '1979-08-18', '2020-10-10 11:57:40', '2020-10-10 16:57:40', 'update'),
(106, 0, 24, 'dep1', '2011-05-23', '1979-08-18', '2020-10-10 11:57:48', '2020-10-10 16:57:48', 'update'),
(107, 0, 24, 'dep1', '2011-05-23', '1979-08-18', '2020-10-10 11:58:57', '2020-10-10 16:58:57', 'update'),
(108, 0, 24, 'dep0', '2011-05-23', '1979-08-18', '2020-10-10 11:59:02', '2020-10-10 16:59:02', 'update'),
(109, 0, 24, 'dep0', '2020-10-10', '1979-08-18', '2020-10-10 11:59:28', '2020-10-10 16:59:28', 'update'),
(110, 0, 24, 'dep1', '2020-10-10', '1979-08-18', '2020-10-10 11:59:54', '2020-10-10 16:59:54', 'update'),
(111, 0, 24, 'dep3', '2020-10-10', '1979-08-18', '2020-10-10 12:01:45', '2020-10-10 17:01:45', 'update'),
(112, 0, 24, 'dep3', '2020-10-10', '2020-12-25', '2020-10-10 12:03:03', '2020-10-10 17:03:03', 'update'),
(113, 0, 16, 'dep2', '2020-11-27', '2021-02-05', '2020-10-10 12:06:49', '2020-10-10 17:06:49', 'insert'),
(114, 0, 24, 'dep2', '2020-11-27', '2021-02-05', '2020-10-10 12:07:01', '2020-10-10 17:07:01', 'update'),
(115, 0, 25, 'dep2', '2020-11-27', '2021-02-05', '2020-10-10 12:07:09', '2020-10-10 17:07:09', 'update'),
(116, 0, 25, 'dep2', '2020-11-27', '2021-02-05', '2020-10-10 12:10:14', '2020-10-10 17:10:14', 'update'),
(117, 0, 25, 'dep2', '2020-12-05', '2002-05-14', '2020-10-10 12:11:27', '2020-10-10 17:11:27', 'update'),
(118, 0, 24, 'dep1', '2020-10-17', '2020-10-31', '2020-10-16 11:28:01', '2020-10-16 16:28:01', 'insert'),
(119, 0, 24, 'dep1', '2020-10-17', '2020-10-31', '2020-10-16 11:28:04', '2020-10-16 16:28:04', 'insert'),
(120, 0, 1, 'dep3', '1989-09-06', '2008-04-13', '2020-10-16 11:29:00', '2020-10-16 16:29:00', 'insert'),
(121, 0, 1, 'dep3', '2020-10-16', '2008-04-13', '2020-10-16 11:29:17', '2020-10-16 16:29:17', 'update'),
(122, 93, 24, 'dep1', '2020-10-17', '2020-10-31', '2020-10-16 11:28:04', '2020-10-16 16:29:29', 'deletion'),
(123, 0, 1, 'dep3', '2020-10-19', '2008-04-13', '2020-10-16 11:29:38', '2020-10-16 16:29:38', 'update'),
(124, 0, 24, 'dep1', '2020-10-17', '2020-10-31', '2020-10-16 11:53:37', '2020-10-16 16:53:37', 'insert'),
(125, 0, 24, 'dep10', '2020-10-16', '1986-06-12', '2020-10-16 11:54:02', '2020-10-16 16:54:02', 'insert'),
(126, 93, 24, 'dep1', '2020-10-17', '2020-10-31', '2020-10-16 11:28:01', '2020-10-16 16:55:05', 'deletion'),
(127, 93, 24, 'dep1', '2020-10-17', '2020-10-31', '2020-10-16 11:53:37', '2020-10-16 16:55:08', 'deletion'),
(128, 94, 24, 'dep10', '2020-10-16', '1986-06-12', '2020-10-16 11:54:02', '2020-10-16 16:55:18', 'deletion'),
(129, 0, 24, 'dep1', '2020-10-16', '2020-10-31', '2020-10-16 12:00:02', '2020-10-16 17:00:02', 'insert'),
(130, 109, 20, 'dep6', '2020-11-28', '2021-04-02', '2020-10-10 09:45:00', '2020-10-16 17:20:22', 'deletion'),
(131, 109, 1, 'dep5', '2020-10-10', '2021-01-01', '2020-10-10 09:44:35', '2020-10-16 17:20:25', 'deletion'),
(132, 109, 25, 'dep5', '2020-12-12', '2020-10-10', '2020-10-10 09:47:35', '2020-10-16 17:20:28', 'deletion'),
(133, 0, 25, 'dep5', '2020-10-16', '2020-10-31', '2020-10-16 12:20:41', '2020-10-16 17:20:41', 'insert'),
(134, 102, 24, 'dep5', '2020-02-12', '2021-04-29', '2020-10-10 09:43:24', '2020-10-16 17:20:57', 'deletion'),
(135, 0, 24, 'dep5', '2020-10-16', '2020-11-07', '2020-10-16 12:21:08', '2020-10-16 17:21:08', 'insert'),
(136, 93, 18, 'dep8', '1975-12-14', '1970-03-30', '2020-10-09 13:38:23', '2020-10-16 17:23:03', 'deletion'),
(137, 93, 14, 'dep8', '2012-08-09', '1983-02-14', '2020-10-09 13:55:47', '2020-10-16 17:23:06', 'deletion'),
(138, 93, 18, 'dep8', '1975-12-14', '1970-03-30', '2020-10-09 13:39:27', '2020-10-16 17:23:09', 'deletion'),
(139, 93, 23, 'dep5', '2001-05-07', '2017-05-22', '2020-10-09 13:41:46', '2020-10-16 17:23:12', 'deletion'),
(140, 93, 22, 'dep1', '2020-10-11', '2021-02-06', '2020-10-07 10:28:06', '2020-10-16 17:23:15', 'deletion'),
(141, 93, 17, 'dep8', '2020-10-08', '2020-11-07', '2020-10-07 19:10:07', '2020-10-16 17:23:18', 'deletion'),
(142, 93, 1, 'dep3', '2020-10-19', '2008-04-13', '2020-10-16 11:29:00', '2020-10-16 17:23:20', 'deletion'),
(143, 0, 24, 'dep8', '2020-10-16', '2020-10-16', '2020-10-16 12:23:37', '2020-10-16 17:23:37', 'insert'),
(144, 94, 18, 'dep8', '1981-02-07', '2004-05-01', '2020-10-09 12:28:02', '2020-10-16 17:24:06', 'deletion'),
(145, 94, 16, 'dep0', '2020-10-09', '2020-11-28', '2020-10-07 10:41:14', '2020-10-16 17:24:09', 'deletion'),
(146, 0, 18, 'dep8', '1977-04-03', '1994-10-22', '2020-10-16 12:24:18', '2020-10-16 17:24:18', 'insert'),
(147, 160, 25, 'dep2', '2020-11-27', '2021-02-05', '2020-10-10 12:06:49', '2020-10-16 17:24:35', 'deletion'),
(148, 160, 24, 'dep3', '2020-10-10', '2020-12-25', '2020-10-10 11:52:00', '2020-10-16 17:24:38', 'deletion'),
(149, 0, 25, 'dep2', '2020-10-16', '2020-11-07', '2020-10-16 12:24:50', '2020-10-16 17:24:50', 'insert'),
(150, 0, 15, 'dep10', '2009-03-20', '2002-02-21', '2020-10-16 12:28:01', '2020-10-16 17:28:01', 'insert'),
(151, 0, 22, 'Reici', '2007-05-10', '2018-02-19', '2020-10-16 12:39:01', '2020-10-16 17:39:01', 'insert');

-- --------------------------------------------------------

--
-- Table structure for table `archives_employees`
--

CREATE TABLE `archives_employees` (
  `id` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `empDOB` date NOT NULL,
  `retirementDate` date NOT NULL,
  `nis` char(9) DEFAULT NULL,
  `trn` char(9) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `hire_date` date NOT NULL,
  `address` text,
  `city` varchar(20) DEFAULT NULL,
  `parish` varchar(45) DEFAULT NULL,
  `phoneOne` varchar(14) DEFAULT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  `internalEmail` varchar(50) DEFAULT NULL,
  `externalEmail` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `action` enum('delete','insert','update','') NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `archives_employees`
--

INSERT INTO `archives_employees` (`id`, `empID`, `first_name`, `middle_name`, `last_name`, `empDOB`, `retirementDate`, `nis`, `trn`, `gender`, `hire_date`, `address`, `city`, `parish`, `phoneOne`, `mobile`, `internalEmail`, `externalEmail`, `photo`, `created_date`, `modified_at`, `created_by`, `action`) VALUES
(1, 0, 'Bree', 'Demetria Dyer', 'Key', '2020-10-06', '2085-10-06', 'VT363636', '0', 'Male', '1954-12-28', '', '', 'Hanover', '', '', NULL, '', NULL, '2020-10-06 16:54:23', '2020-10-08 02:24:11', 7, 'update'),
(2, 93, 'Ryders', 'Jayme', 'Chapman', '1950-01-31', '2015-01-31', 'BX4532', '0', 'Male', '1982-05-29', '14 Tom Road', 'Mandeville', 'Manchester', '876-555-5555', '876-555-6666', 'gyqyhas@mailinator.com', 'test@email.com', NULL, '2020-09-11 15:06:20', '2020-10-08 01:26:16', 7, 'delete'),
(3, 97, 'Roanna', 'Alea Cortez', 'Ellis', '2009-12-26', '2074-12-26', NULL, '0', 'Male', '2015-05-06', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-11 15:21:12', '2020-10-08 02:05:34', 7, 'delete'),
(4, 112, 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, '0', 'Male', '2010-11-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-14 19:50:20', '2020-10-08 02:04:25', 7, 'delete'),
(5, 119, 'Josiah', 'Celeste Larson', 'Valenzuela', '1970-11-18', '2035-11-18', 'MED336', '0', 'Male', '1978-12-26', 'nded', 'hedn', 'Hanover', '876-444-2422', '876-444-2677', 'rogyl@mailinator.com', NULL, NULL, '2020-09-14 20:01:41', '2020-10-08 02:17:47', 7, 'delete'),
(6, 6369, 'Isabella', 'Thor Chase', 'Watkins', '1983-08-23', '2048-08-23', NULL, '0', 'Male', '1991-09-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-08 01:39:08', '2020-10-08 01:39:08', 7, 'insert'),
(7, 64, 'Bree', 'Demetria Dyer', 'Key', '2020-10-06', '2085-10-06', 'VT363636', '0', 'Male', '1954-12-28', '', '', 'Hanover', '', '', NULL, '', NULL, '2020-10-06 16:54:23', '2020-10-08 02:26:12', 7, 'update'),
(8, 64, 'Bree', 'Demetria Dyer', 'Key', '2020-10-06', '2085-10-06', 'VT363636', '0', 'Male', '1954-12-28', '', '', 'Hanover', '', '', NULL, '', NULL, '2020-10-06 16:54:23', '2020-10-08 02:26:12', 7, 'update'),
(9, 64, 'Bree', 'Demetria Dyer', 'Key', '2020-10-06', '2085-10-06', 'VT363636', '0', 'Male', '1954-12-28', '', '', 'Portland', '', '', NULL, '', NULL, '2020-10-06 16:54:23', '2020-10-08 02:26:27', 7, 'update'),
(10, 64, 'Bree', 'Demetria Dyer', 'Key', '2020-10-06', '2085-10-06', 'VT363636', '0', 'Male', '1954-12-28', '', '', 'Portland', '', '', NULL, '', NULL, '2020-10-06 16:54:23', '2020-10-08 02:26:27', 7, 'update'),
(11, 100, 'Suki', 'Ulric Olsen', 'Stanley', '1970-09-14', '2066-09-19', 'HT747444', '0', 'Female', '2004-04-28', 'Adipisci vitae esse', 'Ratione dolorum amet', 'St. Elizabeth', '479-249-3047', '757-624-2067', '', 'mihyjoc@mailinator.com', NULL, '2020-09-11 15:25:05', '2020-10-08 02:27:45', 7, 'update'),
(12, 100, 'Suki', 'Ulric Olsen', 'Stanley', '1970-09-14', '2030-09-14', 'HT747444', '0', 'Female', '2004-04-28', 'Adipisci vitae esse', 'Ratione dolorum amet', 'St. Elizabeth', '479-249-3047', '757-624-2067', '', 'mihyjoc@mailinator.com', NULL, '2020-09-11 15:25:05', '2020-10-08 02:27:45', 7, 'update'),
(13, 100, 'Suki', 'Ulric Olsen', 'Stanley', '1970-09-14', '2030-09-14', 'HT747444', '0', 'Female', '2004-04-28', 'Adipisci vitae esse', 'Ratione dolorum amet', 'St. Andrew', '479-249-3047', '757-624-2067', '', 'mihyjoc@mailinator.com', NULL, '2020-09-11 15:25:05', '2020-10-08 02:28:49', 7, 'update'),
(14, 100, 'Suki', 'Ulric Olsen', 'Stanley', '1970-09-14', '2030-09-14', 'HT747444', '0', 'Female', '2004-04-28', 'Adipisci vitae esse', 'Ratione dolorum amet', 'St. Andrew', '479-249-3047', '757-624-2067', '', 'mihyjoc@mailinator.com', NULL, '2020-09-11 15:25:05', '2020-10-08 02:28:49', 7, 'update'),
(15, 104, 'Serena', 'Len Dominguez', 'Albert', '2008-01-14', '2079-04-16', 'R2222T2', '0', 'Female', '1998-07-27', 'Velit ipsa veritat', 'Perferendis in sequi', 'Kingston', '922-538-9941', '682-154-7347', '', 'juwyqofela@mailinator.com', NULL, '2020-09-14 19:19:28', '2020-10-09 12:57:22', 7, 'update'),
(16, 104, 'Serena', 'Len Dominguez', 'Albert', '2008-01-14', '2068-01-14', 'R2222T2', '0', 'Female', '1998-07-27', 'Velit ipsa veritat', 'Perferendis in sequi', 'Kingston', '922-538-9941', '682-154-7347', '', 'juwyqofela@mailinator.com', NULL, '2020-09-14 19:19:28', '2020-10-09 12:57:22', 7, 'update'),
(17, 104, 'Serena', 'Len Dominguez', 'Albert', '2008-01-14', '2068-01-14', 'R2222T2', '0', 'Female', '1998-07-27', 'Velit ipsa veritat', 'Perferendis in sequi', 'Kingston', '922-538-9941', '682-154-7347', '', 'juwyqofela@mailinator.com', NULL, '2020-09-14 19:19:28', '2020-10-09 12:57:42', 7, 'update'),
(18, 104, 'Serena', 'Len Dominguez', 'Albert', '2008-01-14', '2068-01-14', 'R2222T2', '0', 'Female', '1998-07-27', 'Velit ipsa veritat', 'Perferendis in sequi', 'Kingston', '922-538-9941', '682-154-7347', '', 'juwyqofela@mailinator.com', NULL, '2020-09-14 19:19:28', '2020-10-09 12:57:42', 7, 'update'),
(19, 104, 'Serena', 'Len Dominguez', 'Albert', '2008-01-14', '2068-01-14', 'R2222T2', '0', 'Female', '1998-07-27', 'Velit ipsa veritat', 'Perferendis in sequi', 'Kingston', '922-538-9941', '682-154-7347', '', 'juwyqofela@mailinator.com', NULL, '2020-09-14 19:19:28', '2020-10-09 12:58:34', 7, 'update'),
(20, 104, 'Serena', 'Len Dominguez', 'Albert', '2008-01-14', '2068-01-14', 'R2222T2', '0', 'Female', '1998-07-27', 'Velit ipsa veritat', 'Perferendis in sequi', 'Kingston', '922-538-9941', '682-154-7347', '', 'juwyqofela@mailinator.com', NULL, '2020-09-14 19:19:28', '2020-10-09 12:58:34', 7, 'update'),
(21, 96, 'Thor', 'Ali Delgado', 'Hicks', '1977-09-06', '2037-09-06', '76NK90I', '0', 'Female', '1972-09-26', '', '', '', '', '', '', '', NULL, '2020-09-11 15:19:46', '2020-10-09 13:23:48', 7, 'update'),
(22, 96, 'Thor', 'Ali Delgado', 'Hicks', '1977-09-06', '2037-09-06', '76NK90I', '0', 'Female', '1972-09-26', '', '', '', '', '', '', '', NULL, '2020-09-11 15:19:46', '2020-10-09 13:23:48', 7, 'update'),
(23, 103, 'Roary', 'Gary Poole', 'Mathis', '2020-03-14', '2085-03-14', '', '0', 'Male', '2015-03-07', '', '', '', '', '', '', '', NULL, '2020-09-14 19:04:07', '2020-10-09 14:42:41', 7, 'update'),
(24, 103, 'Roary', 'Gary Poole', 'Mathis', '2020-03-14', '2085-03-14', '', '0', 'Male', '2015-03-07', '', '', '', '', '', '', '', NULL, '2020-09-14 19:04:07', '2020-10-09 14:42:41', 7, 'update'),
(25, 106, 'Ella', 'Kermit Tyler', 'Morse', '2001-02-19', '2066-02-19', 'TY5553', '0', 'Male', '1987-01-05', '', '', '', '', '555-268-9533', '', '', NULL, '2020-09-14 19:22:28', '2020-10-09 14:43:50', 7, 'update'),
(26, 106, 'Ella', 'Kermit Tyler', 'Morse', '2001-02-19', '2066-02-19', 'TY5553', '0', 'Male', '1987-01-05', '', '', '', '', '555-268-9533', '', '', NULL, '2020-09-14 19:22:28', '2020-10-09 14:43:50', 7, 'update'),
(27, 106, 'Ella', 'Kermit Tyler', 'Morse', '2001-02-19', '2066-02-19', 'TY5553', '0', 'Male', '1987-01-05', '', '', '', '', '555-268-9533', '', '', NULL, '2020-09-14 19:22:28', '2020-10-09 14:43:50', 7, 'delete'),
(28, 105, 'Jessie', '', 'Pateler', '2014-04-16', '2079-04-16', 'XR5333', '0', 'Male', '1998-07-27', '', '', '', '', '', '', '', NULL, '2020-09-14 19:19:48', '2020-10-09 14:44:50', 7, 'update'),
(29, 105, 'Jessie', '', 'Pateler', '2014-04-16', '2079-04-16', 'XR5333', '0', 'Male', '1998-07-27', '', '', '', '', '', '', '', NULL, '2020-09-14 19:19:48', '2020-10-09 14:44:50', 7, 'update'),
(30, 108, 'Zelda', '', 'Martinez', '1992-12-08', '2057-12-08', NULL, '0', 'Male', '1995-01-14', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:24:07', '2020-09-14 19:24:07', 7, 'delete'),
(31, 156, 'Bell', '', 'David', '1988-11-07', '2053-11-07', NULL, '0', 'Male', '1974-04-27', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:54:29', '2020-09-16 16:54:29', 7, 'delete'),
(36, 120, 'Shay', 'Zelenia Malone', 'Fryes', '2018-12-28', '2083-12-28', 'Y4Y4646', '56262626', 'Male', '1981-12-06', '', '', '', '', '', '', '', NULL, '2020-09-14 20:04:35', '2020-10-09 15:09:35', 7, 'update'),
(37, 120, 'Shay', 'Zelenia Malone', 'Fryes', '2018-12-28', '2083-12-28', 'Y4Y4646', '56262626', 'Male', '1981-12-06', '', '', '', '', '', '', '', NULL, '2020-09-14 20:04:35', '2020-10-09 15:09:35', 7, 'update'),
(38, 121, 'Rina', 'Kylee Stevenson', 'Clayson', '1983-11-10', '2043-11-10', 'HW225264', '522623623', 'Female', '1990-03-18', '', '', '', '', '', '', '', NULL, '2020-09-14 20:06:00', '2020-10-09 15:12:15', 7, 'update'),
(39, 121, 'Rina', 'Kylee Stevenson', 'Clayson', '1983-11-10', '2043-11-10', 'HW225264', '522623623', 'Female', '1990-03-18', '', '', '', '', '', '', '', NULL, '2020-09-14 20:06:00', '2020-10-09 15:12:15', 7, 'update'),
(40, 102, 'Jame', 'Daphne', 'Darcey', '1960-07-01', '2020-07-01', 'RT86915', '569368523', 'Female', '2014-02-15', '', '', '', '', '', '', '', NULL, '2020-09-12 13:42:44', '2020-10-09 15:16:32', 7, 'update'),
(41, 102, 'Jame', '', 'Darcey', '1960-07-01', '2020-07-01', 'RT86915', '569368523', 'Female', '2014-02-15', '', '', '', '', '', '', '', NULL, '2020-09-12 13:42:44', '2020-10-09 15:16:56', 7, 'update'),
(42, 102, 'Jame', '', 'Darcey', '1960-07-01', '2020-07-01', 'RT86915', '569368523', 'Female', '2014-02-15', '', '', '', '', '', '', 'test@mail.com', NULL, '2020-09-12 13:42:44', '2020-10-09 15:17:21', 7, 'update'),
(43, 93, 'Ryders', 'Jayme', 'Chapman', '1950-01-31', '2015-01-31', 'BX4532', '567345879', 'Male', '1982-06-02', '14 Tom Road', 'Mandeville', 'Portland', '876-555-5555', '876-555-6666', 'gyqyhas@mailinator.com', 'test@email.com', NULL, '2020-09-11 15:06:20', '2020-10-09 16:16:14', 7, 'update'),
(44, 157, 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:54:41', '2020-09-16 16:54:41', 7, 'delete'),
(45, 158, 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:55:59', '2020-09-16 16:55:59', 7, 'delete'),
(52, 109, 'Phoebe', 'Tamekah Benson', 'Rasmussen', '2018-07-18', '2083-07-18', NULL, NULL, 'Male', '2020-10-10', '', NULL, NULL, NULL, NULL, 'ariel@phoe.com', '', NULL, '2020-09-14 19:24:32', '2020-10-10 15:59:37', 7, 'update'),
(53, 109, 'Phoebe', 'Tamekah Benson', 'Rasmussen', '2018-07-18', '2083-07-18', '3V33222', '114657242', 'Male', '2020-10-10', '14 Camp Road', 'Kingston CSO', 'Kingston', '', '', 'ariel@phoe.com', '', NULL, '2020-09-14 19:24:32', '2020-10-14 19:43:52', 7, 'update'),
(54, 173, 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', NULL, NULL, 'Male', '1985-10-20', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:16:27', '2020-09-16 18:16:27', 7, 'delete'),
(55, 2967, 'Gabriel', 'Doris Spencer', 'Malone', '1974-04-03', '2039-04-03', NULL, NULL, 'Male', '2020-10-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 19:58:14', '2020-10-14 19:58:14', 7, 'insert'),
(56, 161, 'Bell', 'Alea Gray', 'Buck', '1987-07-21', '2047-07-21', NULL, NULL, 'Female', '2013-05-18', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:11:45', '2020-09-16 17:11:45', 7, 'delete'),
(57, 101, 'Barbara', '', 'Kinney', '1979-12-19', '2044-12-19', NULL, NULL, 'Male', '1997-07-28', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 16:39:06', '2020-09-11 16:39:06', 7, 'delete'),
(58, 162, 'Brooke', 'Channing Flowers', 'Price', '1988-04-18', '2048-04-18', NULL, NULL, 'Female', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:13:54', NULL, 7, 'delete'),
(59, 163, 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:43:15', '2020-10-14 20:12:52', 7, 'delete'),
(60, 164, 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:43:49', '2020-10-14 20:13:20', 7, 'delete'),
(61, 165, 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:45:42', '2020-10-14 20:13:25', 7, 'delete'),
(62, 96, 'Thor', 'Ali Delgado', 'Hicks', '1977-09-06', '2037-09-06', '76NK90I', '', 'Female', '1972-09-26', '', '', '', '', '', 'thicks@comp.com', '', NULL, '2020-09-11 15:19:46', '2020-10-14 20:15:21', 7, 'update'),
(63, 107, 'Zelda', 'Owen Gillespie', 'Martinez', '1992-12-08', '2052-12-08', NULL, NULL, 'Female', '1995-01-14', '', NULL, NULL, NULL, NULL, 'zmartinez@comp.com', '', NULL, '2020-09-14 19:23:53', '2020-10-16 17:27:47', 7, 'update');

-- --------------------------------------------------------

--
-- Table structure for table `tblactivitylog`
--

CREATE TABLE `tblactivitylog` (
  `idActivity` int(11) NOT NULL,
  `relUserID` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblactivitylog`
--

INSERT INTO `tblactivitylog` (`idActivity`, `relUserID`, `action`, `created_on`) VALUES
(1, 6, 'setuser', '2020-09-01 19:41:24'),
(5, 7, 'New Record', '2020-09-01 20:18:10'),
(6, 7, 'New Record created for Hayfa Lindsay', '2020-09-01 20:26:14'),
(7, 7, 'New record created for Winter Johns', '2020-09-01 20:27:34'),
(8, 7, 'New record created for Harlan Kochby admin', '2020-09-01 20:35:49'),
(9, 7, 'New record created for Tarik Batesby admin', '2020-09-01 20:37:27'),
(10, 7, 'New record created for Ira Rush', '2020-09-02 14:54:53'),
(11, 7, 'New record created in Departments for Nichole Kim', '2020-09-02 14:56:25'),
(12, 7, 'Record deleted in Departments for Harlan Koch', '2020-09-02 15:48:57'),
(13, 7, 'New record created in Departments for Gil Harrison', '2020-09-02 16:06:02'),
(14, 7, 'Record deleted in Departments for ', '2020-09-02 16:10:48'),
(15, 7, 'Record deleted in Departments for Fletcher Melendez', '2020-09-02 16:22:18'),
(16, 7, 'Record deleted in Departments for Brody Andrews', '2020-09-02 16:22:30'),
(17, 7, 'Record deleted in Departments for Keely Hubbard', '2020-09-02 16:22:36'),
(25, 7, 'New record created in Departments for Minerva Mayo', '2020-09-02 16:51:11'),
(26, 7, 'New record created in Departments for Minerva Mayo', '2020-09-02 16:51:47'),
(27, 7, 'New record created in Departments for Hammett Kramer', '2020-09-02 16:53:49'),
(28, 7, 'Record deleted in Departments for Hammett Kramer', '2020-09-02 16:54:03'),
(33, 7, 'Record deleted in Departments for Ira Rush', '2020-09-02 17:03:27'),
(34, 7, 'Record deleted in Departments for Tarik Bates', '2020-09-02 17:03:37'),
(36, 7, 'Record deleted in Departments for Gil Harrison', '2020-09-02 17:04:24'),
(37, 7, 'Record deleted in Departments for Nichole Kim', '2020-09-02 17:04:33'),
(38, 7, 'New record created in Departments for Palmer Bridges', '2020-09-02 17:04:44'),
(39, 7, 'Record deleted in Departments for Information Technology Plus - Department Code IT03', '2020-09-02 17:06:10'),
(40, 7, 'New record created in Departments for Natalie Madden', '2020-09-02 17:23:49'),
(41, 7, 'New record created in Departments for Diana Bishop - Department Code Animi', '2020-09-02 17:24:43'),
(42, 7, 'New record created in Departments for Mariam Delaney - Department Code ABE', '2020-09-02 18:52:54'),
(43, 7, 'Record updated in Departments from Quos - Natalie Madde to Quos - Natalie Madden', '2020-09-02 20:06:58'),
(44, 7, 'Record updated in Departments from dep8 - Product Management Systems to DEP1 - Product Management Systems', '2020-09-02 20:07:44'),
(45, 7, 'Department code updated from dep4 to ACC for Accounting Dept', '2020-09-02 20:14:26'),
(46, 7, 'Record updated in Departments from dep4 - Accounting Dept to ACC - Accounting Dept', '2020-09-02 20:14:26'),
(47, 7, 'Department code updated from ACC to PPLACC for Accounting Dept', '2020-09-02 20:15:44'),
(48, 7, 'Department name updated from Accounting Dept to Accounting Department', '2020-09-02 20:15:44'),
(49, 7, 'New record created in Departments for Ria Lewis - Department Code ADIP', '2020-09-04 13:26:35'),
(50, 7, 'Record deleted in Departments for ADIP - Ria Lewis', '2020-09-04 13:26:43'),
(51, 7, 'Record deleted in Departments for Animi - Diana Bishop', '2020-09-11 14:54:11'),
(52, 7, 'New record created in Departments for Dakota Bright - Department Code QUIA', '2020-09-11 15:04:36'),
(53, 7, 'Record deleted in Departments for QUIA - Dakota Bright', '2020-09-11 15:04:54'),
(54, 7, 'Department name updated from Ross Lyons to Ross Lyons34', '2020-09-11 15:05:03'),
(55, 7, 'New Employee record for EUM -  Felicia', '2020-09-11 15:11:08'),
(56, 7, 'New Employee record for: <br/> DOLORI -  Virginia', '2020-09-11 15:11:57'),
(57, 7, 'New Employee record for: <br/> ID: EST <br/> NameThorAli DelgadoHicks<br/> Gender: Female <br/> DOB:1977-09-06<br/> Hire Date: 1972-09-26', '2020-09-11 15:19:46'),
(58, 7, 'New Employee record for: <br/> Employee ID: QUASI <br/> Name: Roanna Alea Cortez Ellis<br/> Gender: Male <br/> DOB: 2009-12-26<br/> Hire Date: 2015-05-06', '2020-09-11 15:21:12'),
(59, 7, 'New Employee record for: <br/> Employee ID: PROIDE <br/> Name: <a href=\"PROIDE\"> Upton Hyacinth Freeman Ellison</a><br/> Gender: Male <br/> DOB: 1983-05-09<br/> Hire Date: 1983-10-27', '2020-09-11 15:23:17'),
(60, 7, 'New Employee record for: <br/> Employee ID: SIMILI <br/> Name: <a href=\"/employees/edit/99\"> Ruth  Hays</a><br/> Gender: Male <br/> DOB: 2002-07-23<br/> Hire Date: 1996-12-08', '2020-09-11 15:24:24'),
(61, 7, 'New Employee record for: <br/> Employee ID: IPSUM <br/> Name: <a href=\"../employees/edit/100\"> Garth Pascale Dorsey Leblanc</a><br/> Gender: Female <br/> DOB: 2006-09-19<br/> Hire Date: 2004-04-28', '2020-09-11 15:25:05'),
(62, 7, 'New Employee record for: <br/> Employee ID: VOLU <br/> Name: <a href=\"../employees/edit/101\"> Barbara  Kinney</a><br/> Gender: Male <br/> DOB: 1979-12-19<br/> Hire Date: 1997-07-28', '2020-09-11 16:39:06'),
(63, 7, 'New Employee record for: <br/> Employee ID: QUIA <br/> Name: <a href=\"../employees/edit/102\"> James Daphne Small Lindsay</a><br/> Gender: Female <br/> DOB: 1979-07-27<br/> Hire Date: 2014-02-15', '2020-09-12 13:42:44'),
(64, 7, 'New Employee record for: <br/> Employee ID: AMET <br/> Name: <a href=\"../employees/edit/103\"> Roary Gary Poole Mathis</a><br/> Gender: Male <br/> DOB: 2020-03-14<br/> Hire Date: 2015-03-07', '2020-09-14 19:04:07'),
(65, 7, 'New Employee record for: <br/> Employee ID: QUI <br/> Name: <a href=\"../employees/edit/104\"> Jessica  Patel</a><br/> Gender: Male <br/> DOB: 2014-04-16<br/> Hire Date: 1998-07-27', '2020-09-14 19:19:28'),
(66, 7, 'New Employee record for: <br/> Employee ID: QUIT <br/> Name: <a href=\"../employees/edit/105\"> Jessica  Patel</a><br/> Gender: Male <br/> DOB: 2014-04-16<br/> Hire Date: 1998-07-27', '2020-09-14 19:19:48'),
(67, 7, 'New Employee record for: <br/> Employee ID: EOS <br/> Name: <a href=\"../employees/edit/106\"> Ella Kermit Tyler Morse</a><br/> Gender: Male <br/> DOB: 2001-02-19<br/> Hire Date: 1987-01-05', '2020-09-14 19:22:28'),
(68, 7, 'New Employee record for: <br/> Employee ID: MOLE <br/> Name: <a href=\"../employees/edit/107\"> Zelda Owen Gillespie Martinez</a><br/> Gender: Female <br/> DOB: 1992-12-08<br/> Hire Date: 1995-01-14', '2020-09-14 19:23:53'),
(69, 7, 'New Employee record for: <br/> Employee ID: MOLE5 <br/> Name: <a href=\"../employees/edit/108\"> Zelda  Martinez</a><br/> Gender: Male <br/> DOB: 1992-12-08<br/> Hire Date: 1995-01-14', '2020-09-14 19:24:07'),
(70, 7, 'New Employee record for: <br/> Employee ID: VELIT <br/> Name: <a href=\"../employees/edit/109\"> Phoebe Tamekah Benson Rasmussen</a><br/> Gender: Male <br/> DOB: 2018-07-18<br/> Hire Date: 1978-08-11', '2020-09-14 19:24:32'),
(71, 7, 'New Employee record for: <br/> Employee ID: QUASI6 <br/> Name: <a href=\"../employees/edit/110\"> Bruce Shelly Howard Brewer</a><br/> Gender: Male <br/> DOB: 1975-10-22<br/> Hire Date: 2010-11-05', '2020-09-14 19:46:09'),
(72, 7, 'New Employee record for: <br/> Employee ID: QUA <br/> Name: <a href=\"../employees/edit/111\"> Bruce  Brewer</a><br/> Gender: Male <br/> DOB: 1975-10-22<br/> Hire Date: 2010-11-05', '2020-09-14 19:50:06'),
(73, 7, 'New Employee record for: <br/> Employee ID: QUAY <br/> Name: <a href=\"../employees/edit/112\"> Bruce  Brewer</a><br/> Gender: Male <br/> DOB: 1975-10-22<br/> Hire Date: 2010-11-05', '2020-09-14 19:50:20'),
(74, 7, 'New Employee record for: <br/> Employee ID: QUATY <br/> Name: <a href=\"../employees/edit/113\"> Bruce  Brewer</a><br/> Gender: Male <br/> DOB: 1975-10-22<br/> Hire Date: 2010-11-05', '2020-09-14 19:54:17'),
(75, 7, 'New Employee record for: <br/> Employee ID: QUAVA <br/> Name: <a href=\"../employees/edit/114\"> Bruce  Brewer</a><br/> Gender: Male <br/> DOB: 1975-10-22<br/> Hire Date: 2010-11-05', '2020-09-14 19:54:45'),
(76, 7, 'New Employee record for: <br/> Employee ID: RAFA <br/> Name: <a href=\"../employees/edit/115\"> Bruce  Brewer</a><br/> Gender: Male <br/> DOB: 1975-10-22<br/> Hire Date: 2010-11-05', '2020-09-14 19:55:18'),
(77, 7, 'New Employee record for: <br/> Employee ID: RAFWRW <br/> Name: <a href=\"../employees/edit/116\"> Bruce  Brewer</a><br/> Gender: Male <br/> DOB: 1975-10-22<br/> Hire Date: 2010-11-05', '2020-09-14 19:55:38'),
(78, 7, 'New Employee record for: <br/> Employee ID: IURE <br/> Name: <a href=\"../employees/edit/117\"> Dexter Cameron Farmer Frazier</a><br/> Gender: Female <br/> DOB: 1986-10-21<br/> Hire Date: 1978-09-25', '2020-09-14 19:56:01'),
(79, 7, 'New Employee record for: <br/> Employee ID: IDU <br/> Name: <a href=\"../employees/edit/118\"> Imogene Aquila Foley Gould</a><br/> Gender: Female <br/> DOB: 1979-04-22<br/> Hire Date: 1995-09-11', '2020-09-14 19:59:26'),
(80, 7, 'New Employee record for: <br/> Employee ID: DISTI <br/> Name: <a href=\"../employees/edit/119\"> Josiah Celeste Larson Valenzuela</a><br/> Gender: Male <br/> DOB: 1970-11-18<br/> Hire Date: 1986-09-07', '2020-09-14 20:01:41'),
(81, 7, 'New Employee record for: <br/> Employee ID: QUOE <br/> Name: <a href=\"../employees/edit/120\"> Shay Zelenia Malone Frye</a><br/> Gender: Male <br/> DOB: 2018-12-28<br/> Hire Date: 1981-12-06', '2020-09-14 20:04:35'),
(82, 7, 'New Employee record for: <br/> Employee ID: SUNTT <br/> Name: <a href=\"../employees/edit/121\"> Rina Kylee Stevenson Clay</a><br/> Gender: Female <br/> DOB: 1983-11-10<br/> Hire Date: 1990-03-18', '2020-09-14 20:06:00'),
(83, 7, 'New Employee record for: <br/> Employee ID: ERRO <br/> Name: <a href=\"../employees/edit/122\"> Madaline Aspen Silva Manning</a><br/> Gender: Male <br/> DOB: 1976-07-08<br/> Hire Date: 2004-12-01', '2020-09-14 20:07:42'),
(84, 7, 'New Employee record for: <br/> Employee ID: LABORU <br/> Name: <a href=\"../employees/edit/123\"> Camilla Jermaine Page Schultz</a><br/> Gender: Male <br/> DOB: 2018-09-20<br/> Hire Date: 1983-08-09', '2020-09-14 20:09:59'),
(85, 7, 'New Employee record for: <br/> Employee ID: VENIA <br/> Name: <a href=\"../employees/edit/124\"> Hayley Blossom Lindsay Mckee</a><br/> Gender: Male <br/> DOB: 2015-04-13<br/> Hire Date: 2004-11-25', '2020-09-14 20:11:07'),
(86, 7, 'New Employee record for: <br/> Employee ID: MINIM <br/> Name: <a href=\"../employees/edit/125\"> Maxwell Paki Franklin Bowman</a><br/> Gender: Female <br/> DOB: 1992-01-06<br/> Hire Date: 2011-05-09', '2020-09-14 20:42:39'),
(87, 7, 'New Employee record for: <br/> Employee ID: ESSTY <br/> Name: <a href=\"../employees/edit/126\"> Rose Lila Oneill Kirkland</a><br/> Gender: Male <br/> DOB: 1996-05-01<br/> Hire Date: 2003-01-22', '2020-09-14 20:43:06'),
(88, 7, 'New Employee record for: <br/> Employee ID: ESSTU <br/> Name: <a href=\"../employees/edit/127\"> Rose  Kirkland</a><br/> Gender: Male <br/> DOB: 1996-05-01<br/> Hire Date: 2003-01-22', '2020-09-14 20:45:01'),
(89, 7, 'New Employee record for: <br/> Employee ID: ESSTI <br/> Name: <a href=\"../employees/edit/128\"> Rose  Kirkland</a><br/> Gender: Male <br/> DOB: 1996-05-01<br/> Hire Date: 2003-01-22', '2020-09-14 20:45:35'),
(90, 7, 'New Employee record for: <br/> Employee ID: ESS <br/> Name: <a href=\"../employees/edit/129\"> Rose  Kirkland</a><br/> Gender: Male <br/> DOB: 1996-05-01<br/> Hire Date: 2003-01-22', '2020-09-14 20:48:13'),
(91, 7, 'New Employee record for: <br/> Employee ID: ESSOP <br/> Name: <a href=\"../employees/edit/130\"> Rose  Kirkland</a><br/> Gender: Male <br/> DOB: 1996-05-01<br/> Hire Date: 2003-01-22', '2020-09-14 20:48:52'),
(92, 7, 'New Employee record for: <br/> Employee ID: OPP <br/> Name: <a href=\"../employees/edit/131\"> Rose  Kirkland</a><br/> Gender: Male <br/> DOB: 1996-05-01<br/> Hire Date: 2003-01-22', '2020-09-14 20:49:42'),
(93, 7, 'New Employee record for: <br/> Employee ID: OPPIO <br/> Name: <a href=\"../employees/edit/132\"> Rose  Kirkland</a><br/> Gender: Male <br/> DOB: 1996-05-01<br/> Hire Date: 2003-01-22', '2020-09-14 20:50:05'),
(94, 7, 'New Employee record for: <br/> Employee ID: MAGNI <br/> Name: <a href=\"../employees/edit/133\"> Levi Barclay Lang Skinner</a><br/> Gender: Female <br/> DOB: 2014-01-02<br/> Hire Date: 2008-06-16', '2020-09-14 20:50:43'),
(95, 7, 'New Employee record for: <br/> Employee ID: ODIT <br/> Name: <a href=\"../employees/edit/134\"> Wesley  Battle</a><br/> Gender: Male <br/> DOB: 1979-08-09<br/> Hire Date: 1996-12-13', '2020-09-14 20:52:43'),
(96, 7, 'New Employee record for: <br/> Employee ID: PROID <br/> Name: <a href=\"../employees/edit/135\"> Jonas  Shelton</a><br/> Gender: Male <br/> DOB: 2012-11-25<br/> Hire Date: 1996-05-01', '2020-09-14 20:53:29'),
(97, 7, 'New Employee record for: <br/> Employee ID: ULLAM <br/> Name: <a href=\"../employees/edit/136\"> Martha Candace Olsen Ramos</a><br/> Gender: Female <br/> DOB: 1996-07-20<br/> Hire Date: 1990-06-19', '2020-09-14 20:53:59'),
(98, 7, 'New Employee record for: <br/> Employee ID: VERO <br/> Name: <a href=\"../employees/edit/137\"> Lillith Hayfa Simpson Gallegos</a><br/> Gender: Male <br/> DOB: 1995-01-03<br/> Hire Date: 1961-05-17', '2020-09-15 20:14:00'),
(99, 7, 'New Employee record for: <br/> Employee ID: SEDMAG <br/> Name: <a href=\"../employees/edit/138\"> Fletcher Eric Logan Ellison</a><br/> Gender: Male <br/> DOB: 2004-03-07<br/> Hire Date: 2012-12-22', '2020-09-15 20:23:09'),
(100, 7, 'New Employee record for: <br/> Employee ID: MOLEST <br/> Name: <a href=\"../employees/edit/139\"> Hermione  Mathews</a><br/> Gender: Male <br/> DOB: 2018-07-23<br/> Hire Date: 2010-05-24', '2020-09-15 20:28:46'),
(101, 7, 'New Employee record for: <br/> Employee ID: MOLE8 <br/> Name: <a href=\"../employees/edit/140\"> Hermione  Mathews</a><br/> Gender: Male <br/> DOB: 2018-07-23<br/> Hire Date: 2010-05-24', '2020-09-15 20:29:30'),
(102, 7, 'New Employee record for: <br/> Employee ID: MOLEY <br/> Name: <a href=\"../employees/edit/141\"> Hermione  Mathews</a><br/> Gender: Female <br/> DOB: 2018-07-23<br/> Hire Date: 2010-05-24', '2020-09-15 20:29:46'),
(103, 7, 'New Employee record for: <br/> Employee ID: CORRUP <br/> Name: <a href=\"../employees/edit/142\"> Julie Ann Dotson Savage</a><br/> Gender: Female <br/> DOB: 2001-10-15<br/> Hire Date: 1990-01-05', '2020-09-16 15:33:55'),
(104, 7, 'New Employee record for: <br/> Employee ID: RP <br/> Name: <a href=\"../employees/edit/143\"> Julie  Savage</a><br/> Gender: Female <br/> DOB: 2001-10-15<br/> Hire Date: 1990-01-05', '2020-09-16 15:39:08'),
(105, 7, 'New Employee record for: <br/> Employee ID: RPRT <br/> Name: <a href=\"../employees/edit/144\"> Julie  Savage</a><br/> Gender: Male <br/> DOB: 2001-10-15<br/> Hire Date: 1990-01-05', '2020-09-16 15:41:28'),
(106, 7, 'New Employee record for: <br/> Employee ID: SUSCIP <br/> Name: <a href=\"../employees/edit/145\"> Lev Imani Valdez Oneil</a><br/> Gender: Female <br/> DOB: 2002-01-17<br/> Hire Date: 1978-04-13', '2020-09-16 15:41:47'),
(107, 7, 'New Employee record for: <br/> Employee ID: OFFICI <br/> Name: <a href=\"../employees/edit/146\"> Keiko  Solis</a><br/> Gender: Male <br/> DOB: 2019-07-18<br/> Hire Date: 1998-04-19', '2020-09-16 15:44:37'),
(108, 7, 'New Employee record for: <br/> Employee ID: COMM <br/> Name: <a href=\"../employees/edit/147\"> Patricia Kylan Reilly Garner</a><br/> Gender: Male <br/> DOB: 2010-04-21<br/> Hire Date: 1995-02-04', '2020-09-16 16:01:33'),
(109, 7, 'New Employee record for: <br/> Employee ID: ABMOLE <br/> Name: <a href=\"../employees/edit/148\"> Jessamine Stone Gilmore Hubbard</a><br/> Gender: Male <br/> DOB: 2013-09-14<br/> Hire Date: 2013-09-26', '2020-09-16 16:02:06'),
(110, 7, 'New Employee record for: <br/> Employee ID: RERUM <br/> Name: <a href=\"../employees/edit/149\"> Cassandra Tamara Shaffer Stephens</a><br/> Gender: Male <br/> DOB: 1993-01-16<br/> Hire Date: 1993-08-20', '2020-09-16 16:02:32'),
(111, 7, 'New Employee record for: <br/> Employee ID: AUTALI <br/> Name: <a href=\"../employees/edit/150\"> Amir Zelda Mays Lopez</a><br/> Gender: Female <br/> DOB: 1998-06-14<br/> Hire Date: 1982-11-07', '2020-09-16 16:04:10'),
(112, 7, 'New Employee record for: <br/> Employee ID: DOLORE <br/> Name: <a href=\"../employees/edit/151\"> Deanna Gail Mercado Griffith</a><br/> Gender: Female <br/> DOB: 2015-01-06<br/> Hire Date: 2013-04-11', '2020-09-16 16:22:45'),
(117, 7, 'New Employee record for: <br/> Employee ID: INCID <br/> Name: <a href=\"../employees/edit/156\"> Bell  David</a><br/> Gender: Male <br/> DOB: 1988-11-07<br/> Hire Date: 1974-04-27', '2020-09-16 16:54:29'),
(118, 7, 'New Employee record for: <br/> Employee ID: IDNULL <br/> Name: <a href=\"../employees/edit/157\"> Ivana  Howard</a><br/> Gender: Male <br/> DOB: 1976-08-26<br/> Hire Date: 1978-01-09', '2020-09-16 16:54:41'),
(119, 7, 'New Employee record for: <br/> Employee ID: IDNU <br/> Name: <a href=\"../employees/edit/158\"> Ivana  Howard</a><br/> Gender: Male <br/> DOB: 1976-08-26<br/> Hire Date: 1978-01-09', '2020-09-16 16:55:59'),
(120, 7, 'New Employee record for: <br/> Employee ID: IDNUY <br/> Name: <a href=\"../employees/edit/159\"> Ivana  Howard</a><br/> Gender: Male <br/> DOB: 1976-08-26<br/> Hire Date: 1978-01-09', '2020-09-16 16:59:13'),
(121, 7, 'New Employee record for: <br/> Employee ID: CUMQUE <br/> Name: <a href=\"../employees/edit/160\"> Thaddeus Thane Preston Parker</a><br/> Gender: Female <br/> DOB: 1988-04-01<br/> Hire Date: 2020-02-02', '2020-09-16 17:07:01'),
(122, 7, 'New Employee record for: <br/> Employee ID: TOTAM <br/> Name: <a href=\"../employees/edit/161\"> Bell Alea Gray Buck</a><br/> Gender: Female <br/> DOB: 1987-07-21<br/> Hire Date: 2013-05-18', '2020-09-16 17:11:45'),
(123, 7, 'New Employee record for: <br/> Employee ID: NEQUE <br/> Name: <a href=\"../employees/edit/162\"> Brooke Channing Flowers Price</a><br/> Gender: Female <br/> DOB: 1988-04-18<br/> Hire Date: 2001-05-16', '2020-09-16 17:13:54'),
(124, 7, 'New Employee record for: <br/> Employee ID: NREQUE <br/> Name: <a href=\"../employees/edit/163\"> Brooke  Price</a><br/> Gender: Male <br/> DOB: 1988-04-18<br/> Hire Date: 2001-05-16', '2020-09-16 17:43:15'),
(125, 7, 'New Employee record for: <br/> Employee ID: TEQUE <br/> Name: <a href=\"../employees/edit/164\"> Brooke  Price</a><br/> Gender: Male <br/> DOB: 1988-04-18<br/> Hire Date: 2001-05-16', '2020-09-16 17:43:49'),
(126, 7, 'New Employee record for: <br/> Employee ID: TQUE <br/> Name: <a href=\"../employees/edit/165\"> Brooke  Price</a><br/> Gender: Male <br/> DOB: 1988-04-18<br/> Hire Date: 2001-05-16', '2020-09-16 17:45:42'),
(127, 7, 'New Employee record for: <br/> Employee ID: TTQUE <br/> Name: <a href=\"../employees/edit/166\"> Brooke  Price</a><br/> Gender: Male <br/> DOB: 1988-04-18<br/> Hire Date: 2001-05-16', '2020-09-16 17:51:18'),
(128, 7, 'New Employee record for: <br/> Employee ID: AUTET <br/> Name: <a href=\"../employees/edit/167\"> Kennan Aimee Schneider Sandoval</a><br/> Gender: Male <br/> DOB: 1972-01-06<br/> Hire Date: 1970-07-02', '2020-09-16 17:51:31'),
(129, 7, 'New Employee record for: <br/> Employee ID: QUIAD <br/> Name: <a href=\"../employees/edit/168\"> Uta Brielle Osborne Montgomery</a><br/> Gender: Male <br/> DOB: 1985-10-15<br/> Hire Date: 1990-10-04', '2020-09-16 17:52:07'),
(130, 7, 'New Employee record for: <br/> Employee ID: DOOR <br/> Name: <a href=\"../employees/edit/169\"> Harlan Derek Schroeder Burt</a><br/> Gender: Male <br/> DOB: 1976-12-19<br/> Hire Date: 1970-10-11', '2020-09-16 18:04:31'),
(131, 7, 'New Employee record for: <br/> Employee ID: ESTEXE <br/> Name: <a href=\"../employees/edit/170\"> Sylvester Hadley Hansen Fitzpatrick</a><br/> Gender: Female <br/> DOB: 1990-08-15<br/> Hire Date: 1985-10-20', '2020-09-16 18:14:05'),
(132, 7, 'New Employee record for: <br/> Employee ID: ESTEX <br/> Name: <a href=\"../employees/edit/171\"> Sylvester  Fitzpatrick</a><br/> Gender: Male <br/> DOB: 1990-08-15<br/> Hire Date: 1985-10-20', '2020-09-16 18:14:17'),
(133, 7, 'New Employee record for: <br/> Employee ID: ESTRE <br/> Name: <a href=\"../employees/edit/172\"> Sylvester  Fitzpatrick</a><br/> Gender: Male <br/> DOB: 1990-08-15<br/> Hire Date: 1985-10-20', '2020-09-16 18:14:38'),
(134, 7, 'New Employee record for: <br/> Employee ID: ESTRE4 <br/> Name: <a href=\"../employees/edit/173\"> Sylvester  Fitzpatrick</a><br/> Gender: Male <br/> DOB: 1990-08-15<br/> Hire Date: 1985-10-20', '2020-09-16 18:16:27'),
(135, 7, 'New Employee record for: <br/> Employee ID: UTALIQ <br/> Name: <a href=\"../employees/edit/174\"> Ainsley  Durham</a><br/> Gender: Female <br/> DOB: 1999-07-18<br/> Hire Date: 1993-04-20', '2020-09-16 18:16:48'),
(136, 7, 'New Employee record for: <br/> Employee ID: NONET <br/> Name: <a href=\"../employees/edit/175\"> Erich Otto Pittman Castro</a><br/> Gender: Female <br/> DOB: 2005-05-17<br/> Hire Date: 2020-08-23', '2020-09-16 18:18:02'),
(137, 7, 'New Employee record for: <br/> Employee ID: VOLUPT <br/> Name: <a href=\"../employees/edit/176\"> Aladdin Christen Sims Holden</a><br/> Gender: Female <br/> DOB: 1972-09-14<br/> Hire Date: 1996-06-04', '2020-09-16 18:20:12'),
(138, 7, 'New Employee record for: <br/> Employee ID: ULLAMC <br/> Name: <a href=\"../employees/edit/177\"> Cara Angela Hopper Tate</a><br/> Gender: Female <br/> DOB: 2000-09-10<br/> Hire Date: 2008-06-12', '2020-09-16 18:20:47'),
(139, 7, 'New Employee record for: <br/> Employee ID: TEMPO <br/> Name: <a href=\"../employees/edit/178\"> Jack Rhiannon Hess Kaufman</a><br/> Gender: Female <br/> DOB: 2019-09-18<br/> Hire Date: 2006-01-19', '2020-09-16 18:21:12'),
(140, 7, 'New Employee record for: <br/> Employee ID: RECUSA <br/> Name: <a href=\"../employees/edit/179\"> Quail  Jackson</a><br/> Gender: Male <br/> DOB: 1977-06-17<br/> Hire Date: 2017-01-08', '2020-09-16 18:21:23'),
(141, 7, 'New Employee record for: <br/> Employee ID: VELUME <br/> Name: <a href=\"../employees/edit/180\"> Kay Jared Mendoza Sutton</a><br/> Gender: Male <br/> DOB: 1996-09-21<br/> Hire Date: 1984-01-12', '2020-09-16 18:22:20'),
(142, 7, 'New Employee record for: <br/> Employee ID: BLANDI <br/> Name: <a href=\"../employees/edit/181\"> Zahir  Mathews</a><br/> Gender: Male <br/> DOB: 1977-11-21<br/> Hire Date: 2004-08-08', '2020-09-16 20:28:37'),
(143, 7, 'New record created in Departments for Rhea Holmes - Department Code LABORE', '2020-09-17 16:22:14'),
(144, 7, 'New Employee record for: <br/> Employee ID: RERU <br/> Name: <a href=\"../employees/edit/187\"> Halee Evan Reilly Le</a><br/> Gender: Male <br/> DOB: 1997-03-09<br/> Hire Date: 1981-11-05', '2020-09-17 19:39:50'),
(145, 7, 'New Employee record for: <br/> Employee ID: NOBIS <br/> Name: <a href=\"../employees/edit/188\"> Mason Harriet Patrick Good</a><br/> Gender: Male <br/> DOB: 1991-10-26<br/> Hire Date: 2011-09-07', '2020-09-19 15:38:39'),
(146, 7, 'New Employee record for: <br/> Employee ID: PERFE <br/> Name: <a href=\"../employees/edit/189\"> Shoshana Evan Hayes Williamson</a><br/> Gender: Female <br/> DOB: 1977-05-06<br/> Hire Date: 1978-10-12', '2020-09-19 15:39:13'),
(147, 7, 'New Employee record for: <br/> Employee ID: BEATA <br/> Name: <a href=\"../employees/edit/190\"> Evangeline Holmes Nash Patterson</a><br/> Gender: Female <br/> DOB: 2020-09-22<br/> Hire Date: 2020-09-22', '2020-09-22 21:00:13'),
(148, 7, 'New Employee record for: <br/> Employee ID: IPSAM <br/> Name: <a href=\"../employees/edit/191\"> Adele Miriam Blackburn Dillon</a><br/> Gender: Male <br/> DOB: 2020-09-25<br/> Hire Date: 2020-09-25', '2020-09-25 16:15:14'),
(149, 7, 'New Employee record for: <br/> Employee ID: ETDOL <br/> Name: <a href=\"../employees/edit/192\"> Isadora Wing Moss Ruiz</a><br/> Gender: Female <br/> DOB: 2001-01-26<br/> Hire Date: 2020-09-25', '2020-09-25 19:28:22'),
(150, 7, 'Employee First Name Ryder to Ryders for Ryder', '2020-09-26 14:36:03'),
(151, 7, '<a href=\"../employees/edit/99\">Employee Updated Ruth to Ruth Anne</a>', '2020-09-26 15:02:16'),
(152, 7, '<a href=\"../employees/profile/105\">Employee Updated Jessica to Jessie</a>', '2020-09-26 15:03:28'),
(153, 7, '<a href=\"../employees/profile/110\">Employee Updated <br/> Old First Name:Bruce<br/> New First Name: Briana</a>', '2020-09-26 15:05:21'),
(154, 7, 'Employee Updated <br/> Old First Name: Briana<br/> New First Name: <a href=\"../employees/profile/110\">Brianca</a>', '2020-09-26 15:06:23'),
(155, 7, 'Employee Updated <br/> Old Last Name: James<br/> New Last Name: <a href=\"../employees/profile/102\">Smith</a>', '2020-09-26 15:15:51'),
(156, 7, '<a href=\"../employees/profile/102\">James Smith</a> Updated <br/> Old Last Name: Smith<br/> New Last Name: <a href=\"../employees/profile/102\">Darcey', '2020-09-26 15:18:23'),
(157, 7, '<a href=\"../employees/profile/110\">Brianca Brewer</a> Updated <br/> New Last Name: Brewers', '2020-09-26 15:19:21'),
(158, 7, '<a href=\"../employees/profile/102\">James Darcey</a> Updated <br/> New Last Name: Jame', '2020-09-26 15:20:28'),
(159, 7, '<a href=\"../employees/profile/102\">Jame Darcey</a> Gender changed from Male to Female', '2020-09-26 15:22:36'),
(160, 7, '<a href=\"../employees/profile/102\">Jame Darcey</a> Gender changed from Female to Male<br/> New retirement Date : 2039-07-27', '2020-09-26 15:24:17'),
(161, 7, '<a href=\"../employees/profile/102\">Jame Darcey</a> Gender changed from Male to Female<br/> New retirement Date : 2044-07-27', '2020-09-26 15:26:11'),
(162, 7, '<a href=\"../employees/profile/102\">Jame Darcey</a> DOB Updated 1979-07-27 to 1960-07-01', '2020-09-26 15:27:56'),
(163, 7, '<a href=\"../employees/profile/106\">Ella Morse</a> TRN Updated: 567555337', '2020-09-26 15:37:47'),
(164, 7, '<a href=\"../employees/profile/106\">Ella Morse</a> TRN Updated: 567555337', '2020-09-26 15:37:47'),
(165, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN Updated: 567565333', '2020-09-26 15:39:12'),
(166, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN Updated: 567565333', '2020-09-26 15:39:12'),
(167, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN added: 567565333', '2020-09-26 15:40:30'),
(168, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> NIS Updated: AAFQ3', '2020-09-26 15:40:30'),
(169, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN added: 567565333', '2020-09-26 15:40:30'),
(170, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> NIS added: AAFQ3', '2020-09-26 15:40:30'),
(171, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN added: 567565333', '2020-09-26 15:43:02'),
(172, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> NIS Updated: 56FQ3', '2020-09-26 15:43:02'),
(173, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN added: 567565333', '2020-09-26 15:43:02'),
(174, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> NIS added: 56FQ3', '2020-09-26 15:43:02'),
(175, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN added: 567565333', '2020-09-26 15:43:26'),
(176, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> NIS added: 56FQ3', '2020-09-26 15:43:26'),
(177, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> TRN added: 567565333', '2020-09-26 15:43:26'),
(178, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> NIS added: 56FQ3', '2020-09-26 15:43:26'),
(179, 7, '<a href=\"../employees/profile/167\">Kennan Sandoval</a><br/> TRN added: 567345987', '2020-09-26 15:53:39'),
(180, 7, '<a href=\"../employees/profile/167\">Kennan Sandoval</a><br/> NIS added: THY2522', '2020-09-26 15:53:39'),
(181, 7, '<a href=\"../employees/profile/167\">Kennan Sandoval</a><br/> TRN added: 567345987', '2020-09-26 15:53:39'),
(182, 7, '<a href=\"../employees/profile/167\">Kennan Sandoval</a><br/> TRN added: 567345987', '2020-09-26 15:53:51'),
(183, 7, '<a href=\"../employees/profile/167\">Kennan Sandoval</a><br/> NIS Updated: THS2522', '2020-09-26 15:53:51'),
(184, 7, '<a href=\"../employees/profile/167\">Kennan Sandoval</a><br/> TRN added: 567345987', '2020-09-26 15:53:51'),
(185, 7, '<a href=\"../employees/profile/170\">Sylvester Fitzpatrick</a><br/> Address Updated: My adresss', '2020-09-26 16:02:47'),
(186, 7, 'Department name updated from Rhea Holmes to Accounting', '2020-09-26 23:23:26'),
(187, 7, '<a href=\"../employees/profile/171\">Sylvester Fitzpatrick</a><br/> TRN added: 56732245', '2020-09-27 00:05:30'),
(188, 7, '<a href=\"../employees/profile/171\">Sylvester Fitzpatrick</a><br/> NIS added: ft52353', '2020-09-27 00:05:30'),
(189, 7, '<a href=\"../employees/profile/171\">Sylvester Fitzpatrick</a><br/> Address Updated: Spray Town', '2020-09-27 01:07:34'),
(190, 7, 'Record deleted in Departments for ABE - Mariam Delaney', '2020-09-28 16:45:23'),
(191, 7, 'Record deleted in Departments for PERS - Quail Dyer', '2020-09-28 16:49:04'),
(192, 7, 'Record deleted in Departments for QUIS - Ross Lyons34', '2020-09-28 17:08:55'),
(193, 7, 'Record deleted in Departments for UTE - Noah Santana', '2020-09-30 15:00:50'),
(194, 7, 'Department name updated from Accounting to Corporate Department', '2020-10-02 14:52:12'),
(195, 7, '<a href=\"../employees/profile/97\">Roanna Ellis</a><br/> TRN added: 252222623', '2020-10-02 15:22:16'),
(196, 7, '<a href=\"../employees/profile/97\">Roanna Ellis</a><br/> NIS added: EHWY2T2', '2020-10-02 15:22:16'),
(197, 7, 'New record created in Departments for Manufacturing - Department Code MGM', '2020-10-03 21:05:02'),
(198, 7, 'New record created in Departments for tom - Department Code 1=1', '2020-10-04 19:23:28'),
(199, 7, 'Record deleted in Departments for dep7 - Sales', '2020-10-05 17:45:35'),
(200, 7, 'New record created: <br/> ID:1001<br/> DepartmentProductionS', '2020-10-05 18:01:57'),
(201, 7, 'Department name updated from Bindery to Binderys', '2020-10-05 18:32:51'),
(202, 7, 'Department name updated from Binderys to Productioner', '2020-10-05 19:17:44'),
(203, 7, 'Department name updated from ProductionS to Production Dept', '2020-10-05 19:21:41'),
(204, 7, 'Department name updated from Production Dept to Sales', '2020-10-05 19:21:46'),
(205, 7, 'New Employee record for: <br/> Employee ID: 10001 <br/> Name: <a href=\"../employees/edit/10001\"> Imelda Nero Harrell Galloway</a><br/> Gender: Male <br/> DOB: 2020-10-05<br/> Hire Date: 1929-01-04', '2020-10-05 20:30:24'),
(206, 7, 'New Employee record for: <br/> Employee ID: 34002 <br/> Name: <a href=\"../employees/edit/34002\"> Claire May Maynard Lester</a><br/> Gender: Female <br/> DOB: 2020-10-05<br/> Hire Date: 1924-01-03', '2020-10-05 20:31:29'),
(207, 7, 'New Employee record for: <br/> Employee ID: 7305 <br/> Name: <a href=\"../employees/edit/7305\"> Karly Tashya Kerr Logan</a><br/> Gender: Female <br/> DOB: 2020-10-05<br/> Hire Date: 2020-10-05', '2020-10-05 20:32:13'),
(208, 7, '<a href=\"../jobs/edit/6\">6 melconaju</a><br/> Updated <br/> New Job Title Machine Operator', '2020-10-06 01:16:56'),
(209, 7, 'Updated Job Title: <a href=\"../jobs/edit/6\">Machine Operator</a><br/> New Job Title Machine Operators', '2020-10-06 01:18:41'),
(210, 7, 'Updated <br/>Job Title: 6\">Machine Operators<br/> New Job Title <a href=\"../jobs/edit/6\">Machine Operator</a>', '2020-10-06 01:19:58'),
(211, 7, 'Updated Job Title <br/>Old: 1\">jtjtt<br/> New Job Title <a href=\"../jobs/edit/1\">Binder</a>', '2020-10-06 01:21:21'),
(212, 7, 'Updated Job Title <br/>Old: Binder<br/> New: <a href=\"../jobs/edit/1\">Plotter</a>', '2020-10-06 01:22:14'),
(213, 7, 'New record created: <br/> ID: 8<br/> Job: test3', '2020-10-06 01:29:33'),
(214, 7, 'Record deleted in Jobs for 8 - test3', '2020-10-06 01:30:11'),
(215, 7, 'Record deleted in Jobs for 7 - test', '2020-10-06 16:07:05'),
(216, 7, 'Record deleted in Jobs for 6 - Machine Operator', '2020-10-06 16:07:49'),
(217, 7, 'New Job Title record created: <br/> ID: 9<br/> Job: Machine Operator', '2020-10-06 16:07:57'),
(218, 7, 'Record deleted in Jobs for 9 - Machine Operator', '2020-10-06 16:08:02'),
(219, 7, 'New Job Title record created: <br/> ID: 10<br/> Job: wfwfww', '2020-10-06 16:10:37'),
(220, 7, 'New Job Title record created: <br/> ID: 11<br/> Job: gehehe', '2020-10-06 16:47:45'),
(221, 7, 'Record deleted in Jobs for 11 - gehehe', '2020-10-06 16:47:51'),
(222, 7, 'Record deleted in Jobs for 10 - wfwfww', '2020-10-06 16:47:54'),
(223, 7, 'New Job Title record created: <br/> ID: 12<br/> Job: Accountant', '2020-10-06 16:53:16'),
(224, 7, 'New Job Title record created: <br/> ID: 13<br/> Job: egege', '2020-10-06 16:53:35'),
(225, 7, 'Record deleted in Jobs for 13 - egege', '2020-10-06 16:53:38'),
(226, 7, 'Record deleted in Jobs for 12 - Accountant', '2020-10-06 16:53:40'),
(227, 7, 'New Job Title record created: <br/> ID: 14<br/> Job: Accountant', '2020-10-06 16:53:49'),
(228, 7, 'New Employee record for: <br/> Employee ID: 64 <br/> Name: <a href=\"../employees/edit/64\"> Bree Demetria Dyer Key</a><br/> Gender: Male <br/> DOB: 2020-10-06<br/> Hire Date: 1954-12-28', '2020-10-06 16:54:23'),
(229, 7, 'New Job Title record created: <br/> ID: 15<br/> Job: Customer Service', '2020-10-06 18:16:02'),
(230, 7, 'New Job Title record created: <br/> ID: 16<br/> Job: Senior Engineer', '2020-10-06 18:16:24'),
(231, 7, 'New Job Title record created: <br/> ID: 17<br/> Job: Engineer', '2020-10-06 18:16:32'),
(232, 7, 'New Job Title record created: <br/> ID: 18<br/> Job: Assistant Engineer', '2020-10-06 18:16:38'),
(233, 7, 'New Job Title record created: <br/> ID: 19<br/> Job: Accountant', '2020-10-06 18:16:44'),
(234, 7, 'New Job Title record created: <br/> ID: 20<br/> Job: Pressman', '2020-10-06 18:16:50'),
(235, 7, 'New Job Title record created: <br/> ID: 21<br/> Job: Accountant', '2020-10-06 18:16:55'),
(236, 7, 'Record deleted in Jobs for 19 - Accountant', '2020-10-06 18:17:03'),
(237, 7, 'Record deleted in Jobs for 21 - Accountant', '2020-10-06 18:17:05'),
(238, 7, 'New Job Title record created: <br/> ID: 22<br/> Job: CEO', '2020-10-06 18:17:10'),
(239, 7, 'New Job Title record created: <br/> ID: 23<br/> Job: Chief Accountant', '2020-10-06 18:17:17'),
(240, 7, 'Record deleted in Departments for 1001 - Sales', '2020-10-06 19:26:29'),
(241, 7, 'Record deleted in Departments for dep0 - Productioner', '2020-10-06 19:26:29'),
(242, 7, 'Record deleted in Departments for dep1 - Marketing', '2020-10-06 19:26:29'),
(243, 7, 'Record deleted in Departments for dep2 - Finance', '2020-10-06 19:26:29'),
(244, 7, 'Record deleted in Departments for dep3 - Human Resources', '2020-10-06 19:26:29'),
(245, 7, 'Record deleted in Departments for dep4 - Production', '2020-10-06 19:26:29'),
(246, 7, 'Record deleted in Departments for dep5 - Development', '2020-10-06 19:26:29'),
(247, 7, 'Record deleted in Departments for dep6 - Quality Management', '2020-10-06 19:26:29'),
(248, 7, 'Record deleted in Departments for dep8 - Research', '2020-10-06 19:26:29'),
(249, 7, 'Record deleted in Departments for dep9 - Customer Service', '2020-10-06 19:26:29'),
(250, 7, 'New record created: <br/> ID: 1001<br/> Department: Sales', '2020-10-06 19:29:56'),
(251, 7, 'New record created: <br/> ID: dep0<br/> Department: Productioner', '2020-10-06 19:29:56'),
(252, 7, 'New record created: <br/> ID: dep1<br/> Department: Marketing', '2020-10-06 19:29:56'),
(253, 7, 'New record created: <br/> ID: dep2<br/> Department: Finance', '2020-10-06 19:29:56'),
(254, 7, 'New record created: <br/> ID: dep3<br/> Department: Human Resources', '2020-10-06 19:29:56'),
(255, 7, 'New record created: <br/> ID: dep4<br/> Department: Production', '2020-10-06 19:29:56'),
(256, 7, 'New record created: <br/> ID: dep5<br/> Department: Development', '2020-10-06 19:29:56'),
(257, 7, 'New record created: <br/> ID: dep6<br/> Department: Quality Management', '2020-10-06 19:29:56'),
(258, 7, 'New record created: <br/> ID: dep8<br/> Department: Research', '2020-10-06 19:29:56'),
(259, 7, 'New record created: <br/> ID: dep9<br/> Department: Customer Service', '2020-10-06 19:29:56'),
(260, 7, '<a href=\"../employees/profile/93\">Ryders Chapman</a><br/> DOB Updated 1949-12-19 to 1950-01-31', '2020-10-08 01:06:11'),
(261, 7, '<a href=\"../employees/profile/93\">Ryders Chapman</a><br/> Gender changed from Female to Male', '2020-10-08 01:06:24'),
(262, 7, '<a href=\"../employees/profile/93\">Ryders Chapman</a><br/> Address Updated: 14 Tom Road', '2020-10-08 01:09:03'),
(264, 7, 'New Employee record for: <br/> Employee ID: 60601 <br/> Name: <a href=\"../employees/edit/60601\"> Kasimir Brielle Yates Carey</a><br/> Gender: Female <br/> DOB: 1976-01-03<br/> Hire Date: 2013-01-17', '2020-10-08 01:37:54'),
(266, 7, 'New Employee record for: <br/> Employee ID: 6369 <br/> Name: <a href=\"../employees/edit/6369\"> Isabella Thor Chase Watkins</a><br/> Gender: Male <br/> DOB: 1983-08-23<br/> Hire Date: 1991-09-17', '2020-10-08 01:39:08'),
(267, 7, '<a href=\"../employees/profile/97\">Roanna Ellis</a><br/> Address Updated: DD', '2020-10-08 02:05:27'),
(268, 7, '<a href=\"../employees/profile/119\">Josiah Valenzuela</a><br/> TRN added: 43383885', '2020-10-08 02:16:59'),
(269, 7, '<a href=\"../employees/profile/119\">Josiah Valenzuela</a><br/> NIS added: MED336', '2020-10-08 02:16:59'),
(270, 7, '<a href=\"../employees/profile/119\">Josiah Valenzuela</a><br/> Address Updated: nded', '2020-10-08 02:16:59'),
(271, 7, '<a href=\"../employees/profile/64\">Bree Key</a><br/> TRN added: 47464674', '2020-10-08 02:24:11'),
(272, 7, '<a href=\"../employees/profile/64\">Bree Key</a><br/> NIS added: VT363636', '2020-10-08 02:24:11'),
(273, 7, '<a href=\"../employees/profile/64\">Bree Key</a><br/> Address Updated: ', '2020-10-08 02:24:11'),
(274, 7, '<a href=\"../employees/profile/100\">Garth Leblanc</a><br/> Updated <br/> New First Name: Suki', '2020-10-08 02:27:45'),
(275, 7, '<a href=\"../employees/profile/100\">Garth Leblanc</a> Updated <br/> New Last Name: Stanley', '2020-10-08 02:27:45'),
(276, 7, '<a href=\"../employees/profile/100\">Garth Leblanc</a><br/> DOB Updated 2006-09-19 to 1970-09-14', '2020-10-08 02:27:45'),
(277, 7, '<a href=\"../employees/profile/100\">Garth Leblanc</a><br/> TRN added: 743626262', '2020-10-08 02:27:45'),
(278, 7, '<a href=\"../employees/profile/100\">Garth Leblanc</a><br/> NIS added: HT747444', '2020-10-08 02:27:45'),
(279, 7, '<a href=\"../employees/profile/100\">Garth Leblanc</a><br/> Address Updated: Adipisci vitae esse', '2020-10-08 02:27:45'),
(280, 7, '<a href=\"../employees/profile/104\">Jessica Patel</a><br/> Updated <br/> New First Name: Serena', '2020-10-09 12:57:22'),
(281, 7, '<a href=\"../employees/profile/104\">Jessica Patel</a> Updated <br/> New Last Name: Albert', '2020-10-09 12:57:22'),
(282, 7, '<a href=\"../employees/profile/104\">Jessica Patel</a><br/> Gender changed from Male to Female', '2020-10-09 12:57:22'),
(283, 7, '<a href=\"../employees/profile/104\">Jessica Patel</a><br/> DOB Updated 2014-04-16 to 2008-01-14', '2020-10-09 12:57:22'),
(284, 7, '<a href=\"../employees/profile/104\">Jessica Patel</a><br/> TRN added: 985952326', '2020-10-09 12:57:22'),
(285, 7, '<a href=\"../employees/profile/104\">Jessica Patel</a><br/> NIS added: R2222T2', '2020-10-09 12:57:22'),
(286, 7, '<a href=\"../employees/profile/104\">Jessica Patel</a><br/> Address Updated: Velit ipsa veritat', '2020-10-09 12:57:22'),
(287, 7, '<a href=\"../employees/profile/104\">Serena Albert</a><br/> TRN Updated: 98595232', '2020-10-09 12:57:42'),
(288, 7, '<a href=\"../employees/profile/104\">Serena Albert</a><br/> TRN Updated: 985952326', '2020-10-09 12:58:34'),
(289, 7, '<a href=\"../employees/profile/96\">Thor Hicks</a><br/> TRN added: ', '2020-10-09 13:23:48'),
(290, 7, '<a href=\"../employees/profile/96\">Thor Hicks</a><br/> NIS added: 76NK90I', '2020-10-09 13:23:48'),
(291, 7, '<a href=\"../employees/profile/103\">Roary Mathis</a><br/> TRN added: 115256895', '2020-10-09 14:42:41'),
(292, 7, '<a href=\"../employees/profile/103\">Roary Mathis</a><br/> NIS added: ', '2020-10-09 14:42:41'),
(293, 7, '<a href=\"../employees/profile/105\">Jessie Patel</a> Updated <br/> New Last Name: Pateler', '2020-10-09 14:44:50'),
(294, 7, '<a href=\"../employees/profile/120\">Shay Frye</a> Updated <br/> New Last Name: Fryes', '2020-10-09 15:09:35'),
(295, 7, '<a href=\"../employees/profile/120\">Shay Frye</a><br/> TRN added: 56262626', '2020-10-09 15:09:35'),
(296, 7, '<a href=\"../employees/profile/120\">Shay Frye</a><br/> NIS added: Y4Y4646', '2020-10-09 15:09:35'),
(297, 7, '<a href=\"../employees/profile/121\">Rina Clay</a> Updated <br/> New Last Name: Clayson', '2020-10-09 15:12:15'),
(298, 7, '<a href=\"../employees/profile/121\">Rina Clay</a><br/> TRN added: 522623623', '2020-10-09 15:12:15'),
(299, 7, '<a href=\"../employees/profile/121\">Rina Clay</a><br/> NIS added: HW225264', '2020-10-09 15:12:15'),
(300, 7, 'New Job Title record created: <br/> ID: 24<br/> Job: Supervisor', '2020-10-09 16:26:46'),
(301, 7, 'New Job Title record created: <br/> ID: 25<br/> Job: Manager', '2020-10-09 16:26:51'),
(302, 7, 'New record created: <br/> ID: Conse<br/> Department: Distiliary', '2020-10-10 18:32:34'),
(303, 7, 'Record deleted in Departments for 1001 - Sales', '2020-10-10 18:33:36'),
(304, 7, 'Record deleted in Departments for Conse - Distiliary', '2020-10-10 18:33:57'),
(305, 7, 'New record created: <br/> ID: Cons<br/> Department: Distiliary', '2020-10-10 18:34:04'),
(306, 7, 'New record created: <br/> ID: dep90<br/> Department: Distillery', '2020-10-10 18:34:19'),
(307, 7, 'New record created: <br/> ID: dep91<br/> Department: Distillerys', '2020-10-10 18:35:05'),
(308, 7, 'Record deleted in Departments for dep91 - Distillerys', '2020-10-10 18:44:20'),
(309, 7, 'Record deleted in Departments for dep90 - Distillery', '2020-10-10 18:44:23'),
(310, 7, 'New record created: <br/> ID: Quis<br/> Department: Valentine Good', '2020-10-10 18:44:32'),
(311, 7, 'Record deleted in Departments for Quis - Valentine Good', '2020-10-10 18:46:04'),
(312, 7, 'Record deleted in Departments for Cons - Distiliary', '2020-10-10 18:46:06'),
(313, 7, 'New record created: <br/> ID: Volu<br/> Department: Rogan Mccarty', '2020-10-10 19:19:00'),
(314, 7, 'New record created: <br/> ID: Dignis<br/> Department: Brooke Harrell', '2020-10-10 19:33:48'),
(315, 7, 'Record deleted in Departments for Volu - Rogan Mccarty', '2020-10-10 19:34:27'),
(316, 7, 'Record deleted in Departments for Dignis - Brooke Harrell', '2020-10-10 19:34:31'),
(317, 7, 'New record created: <br/> ID: dep10<br/> Department: Sunset', '2020-10-10 19:34:57'),
(318, 7, 'New record created: <br/> ID: Sin<br/> Department: Lionel Fulton', '2020-10-10 19:38:35'),
(319, 7, 'New record created: <br/> ID: AutY<br/> Department: Brady Medina', '2020-10-10 19:39:42'),
(320, 7, 'New record created: <br/> ID: VoluU<br/> Department: May Wong', '2020-10-10 19:40:36'),
(321, 7, 'New record created: <br/> ID: Ipsam<br/> Department: Sydney Miller', '2020-10-10 19:41:06'),
(322, 7, 'New record created: <br/> ID: Ipsa<br/> Department: Sydney', '2020-10-10 19:43:10'),
(323, 7, 'Record deleted in Departments for VoluU - May Wong', '2020-10-10 19:43:17'),
(324, 7, 'Record deleted in Departments for Sin - Lionel Fulton', '2020-10-10 19:43:20'),
(325, 7, 'Record deleted in Departments for Ipsam - Sydney Miller', '2020-10-10 19:43:23'),
(326, 7, 'Record deleted in Departments for Ipsa - Sydney', '2020-10-10 19:43:27'),
(327, 7, 'Record deleted in Departments for AutY - Brady Medina', '2020-10-10 19:47:05'),
(328, 7, 'Record deleted in Departments for dep9 - Customer Service', '2020-10-10 19:47:09'),
(329, 7, 'New Employee record for: <br/> Employee ID: 2967 <br/> Name: <a href=\"../employees/edit/2967\"> Gabriel Doris Spencer Malone</a><br/> Gender: Male <br/> DOB: 1974-04-03<br/> Hire Date: 2020-10-14', '2020-10-14 19:58:14'),
(330, 7, 'New record created: <br/> ID: test<br/> Department: Test DP', '2020-10-16 14:35:43'),
(331, 7, 'New record created: <br/> ID: Omnis<br/> Department: Thaddeus Mcguire', '2020-10-16 16:32:58'),
(332, 7, 'Department name updated from Thaddeus Mcguire to Thaddeus', '2020-10-16 16:33:09'),
(333, 7, 'Record deleted in Departments for test - Test DP', '2020-10-16 16:34:16'),
(334, 7, 'Record deleted in Departments for Omnis - Thaddeus', '2020-10-16 17:32:01'),
(335, 7, 'New record created: <br/> ID: Reici<br/> Department: Solomon Holman', '2020-10-16 17:36:08'),
(336, 7, 'Record deleted in Departments for dep10 - Sunset', '2020-10-16 17:38:35'),
(337, 7, 'Record deleted in Departments for Reici - Solomon Holman', '2020-10-16 17:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment`
--

CREATE TABLE `tbldepartment` (
  `id` char(6) CHARACTER SET utf8 NOT NULL,
  `name` varchar(55) CHARACTER SET utf8 NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `modified_on` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbldepartment`
--

INSERT INTO `tbldepartment` (`id`, `name`, `created_date`, `created_by`, `modified_on`) VALUES
('dep0', 'Productioner', '2020-10-05 22:33:32', 7, '2020-10-06 00:18:03'),
('dep1', 'Marketing', '2020-10-05 22:33:32', 7, '2020-10-16 14:31:52'),
('dep2', 'Finance', '2020-10-05 22:33:32', 7, NULL),
('dep3', 'Human Resources', '2020-10-05 22:33:32', 7, '2020-10-14 20:26:58'),
('dep4', 'Production', '2020-10-05 22:33:32', 7, '2020-10-14 20:27:18'),
('dep5', 'Development', '2020-10-05 22:33:32', 7, '2020-10-10 20:27:36'),
('dep6', 'Quality Management', '2020-10-05 22:33:32', 7, NULL),
('dep8', 'Research', '2020-10-05 22:33:32', 7, NULL);

--
-- Triggers `tbldepartment`
--
DELIMITER $$
CREATE TRIGGER `tblDepartment_AFTER_DELETE` AFTER DELETE ON `tbldepartment` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = OLD.created_by,
action = CONCAT('Record deleted in Departments for ', OLD.id, ' - ',  OLD.name);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tblDepartment_AFTER_INSERT` BEFORE INSERT ON `tbldepartment` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = NEW.created_by,
action = CONCAT('New record created: <br/> ID: ', NEW.id, '<br/> Department: ', NEW.name);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tblDepartment_AFTER_UPDATE` AFTER UPDATE ON `tbldepartment` FOR EACH ROW BEGIN

IF OLD.id <> new.id THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('Department code updated from ', OLD.id, ' to ', NEW.id, ' for ',  OLD.name));
END IF;

IF OLD.name <> new.name THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('Department name updated from ', OLD.name, ' to ', NEW.name));
END IF;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment_employee`
--

CREATE TABLE `tbldepartment_employee` (
  `id` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `deptID` char(6) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldepartment_employee`
--

INSERT INTO `tbldepartment_employee` (`id`, `empID`, `jobID`, `deptID`, `from_date`, `to_date`, `created_date`, `modified_on`, `created_by`) VALUES
(46, 159, 25, 'dep2', '1986-09-15', '1995-11-17', '2020-10-09 19:08:04', NULL, 7),
(57, 166, 25, 'dep2', '2020-12-05', '2002-05-14', '2020-10-10 16:21:52', '2020-10-10 17:11:27', 7),
(64, 120, 24, 'dep5', '1978-01-28', '1984-06-05', '2020-10-10 16:48:58', '2020-10-10 16:50:32', 7),
(72, 99, 24, 'dep1', '2020-10-16', '2020-10-31', '2020-10-16 17:00:02', NULL, 7),
(73, 109, 25, 'dep5', '2020-10-16', '2020-10-31', '2020-10-16 17:20:41', NULL, 7),
(74, 102, 24, 'dep5', '2020-10-16', '2020-11-07', '2020-10-16 17:21:08', NULL, 7),
(75, 93, 24, 'dep8', '2020-10-16', '2020-10-16', '2020-10-16 17:23:37', NULL, 7),
(76, 94, 18, 'dep8', '1977-04-03', '1994-10-22', '2020-10-16 17:24:18', NULL, 7),
(77, 160, 25, 'dep2', '2020-10-16', '2020-11-07', '2020-10-16 17:24:50', NULL, 7);

--
-- Triggers `tbldepartment_employee`
--
DELIMITER $$
CREATE TRIGGER `tbldepartment_employee_AFTER_UPATE` AFTER UPDATE ON `tbldepartment_employee` FOR EACH ROW BEGIN
 INSERT INTO ArchivesDepartmentEmployee (empID, jobID, deptID, from_date, to_date, created_date, action)
    VALUES(empID, NEW.jobID, NEW.deptID, NEW.from_date, NEW.to_date, NEW.modified_on, "update");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbldepartment_employee_BEFORE_DELETE` BEFORE DELETE ON `tbldepartment_employee` FOR EACH ROW BEGIN
    INSERT INTO ArchivesDepartmentEmployee (empID, jobID, deptID, from_date, to_date, created_date, action)
    VALUES(OLD.empID, OLD.jobID, OLD.deptID, OLD.from_date, OLD.to_date, OLD.created_date, "deletion");
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tbldepartment_employee_BEFORE_INSERT` BEFORE INSERT ON `tbldepartment_employee` FOR EACH ROW BEGIN
 INSERT INTO ArchivesDepartmentEmployee (empID, jobID, deptID, from_date, to_date, created_date, action)
    VALUES(empID, NEW.jobID, NEW.deptID, NEW.from_date, NEW.to_date, NEW.created_date, "insert");
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment_manager`
--

CREATE TABLE `tbldepartment_manager` (
  `empID` int(11) NOT NULL,
  `deptID` char(6) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldepartment_manager`
--

INSERT INTO `tbldepartment_manager` (`empID`, `deptID`, `from_date`, `to_date`) VALUES
(109, 'dep5', '2020-10-16', '2020-10-31'),
(160, 'dep2', '2020-10-16', '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartment_supervisor`
--

CREATE TABLE `tbldepartment_supervisor` (
  `empID` int(11) NOT NULL,
  `deptID` char(6) NOT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldepartment_supervisor`
--

INSERT INTO `tbldepartment_supervisor` (`empID`, `deptID`, `from_date`, `to_date`) VALUES
(93, 'dep8', '2020-10-16', '2020-10-16'),
(99, 'dep1', '2020-10-16', '2020-10-31'),
(102, 'dep5', '2020-10-16', '2020-11-07');

-- --------------------------------------------------------

--
-- Table structure for table `tblempaddress`
--

CREATE TABLE `tblempaddress` (
  `id` int(11) NOT NULL,
  `relEMPID` char(6) NOT NULL,
  `relAddressID` int(11) DEFAULT NULL,
  `relParishID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `empID` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `empDOB` date NOT NULL,
  `retirementDate` date NOT NULL,
  `trn` char(9) DEFAULT NULL,
  `nis` char(9) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `hire_date` date NOT NULL,
  `address` text,
  `city` varchar(20) DEFAULT NULL,
  `parish` varchar(45) DEFAULT NULL,
  `phoneOne` varchar(14) DEFAULT NULL,
  `mobile` varchar(14) DEFAULT NULL,
  `internalEmail` varchar(50) DEFAULT NULL,
  `externalEmail` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`empID`, `first_name`, `middle_name`, `last_name`, `empDOB`, `retirementDate`, `trn`, `nis`, `gender`, `hire_date`, `address`, `city`, `parish`, `phoneOne`, `mobile`, `internalEmail`, `externalEmail`, `photo`, `created_date`, `modified_at`, `created_by`) VALUES
(64, 'Bree', 'Demetria Dyer', 'Key', '2020-10-06', '2085-10-06', '47464674', 'VT363636', 'Male', '1954-12-28', '', '', 'Portland', '', '', NULL, '', NULL, '2020-10-06 16:54:23', '2020-10-08 02:26:27', 7),
(93, 'Ryders', 'Jayme', 'Chapman', '1950-01-31', '2015-01-31', '567345879', 'BX4532', 'Male', '1982-06-02', '14 Tom Road', 'Mandeville', 'Portland', '876-555-5555', '876-555-6666', 'gyqyhas@mailinator.com', 'test@email.com', NULL, '2020-09-11 15:06:20', '2020-10-09 16:16:14', 7),
(94, 'Joan', 'Elvis', 'Stafford', '1961-08-26', '2021-08-26', '556932641', 'ctr266', 'Female', '2002-06-12', 'Et at corporis ut su', 'Qui eum sit adipisc', 'St. Elizabeth', '2856698223', '20', '', 'nugoxol@mailinator.com', NULL, '2020-09-11 15:11:08', '2020-09-22 13:26:47', 7),
(96, 'Thor', 'Ali Delgado', 'Hicks', '1977-09-06', '2037-09-06', '', '76NK90I', 'Female', '1972-09-26', '', '', '', '', '', 'thicks@comp.com', '', NULL, '2020-09-11 15:19:46', '2020-10-14 20:15:21', 7),
(98, 'Upton', 'Hyacinth Freeman', 'Ellison', '1983-05-09', '2048-05-09', NULL, NULL, 'Male', '1983-10-27', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:23:17', '2020-09-11 15:23:17', 7),
(99, 'Ruth Anne', '', 'Hays', '2002-07-23', '2067-07-23', '896325678', 'SW86256', 'Male', '1996-12-08', '', '', '', '555-555-5555', '', '', 'manifest@email.com', NULL, '2020-09-11 15:24:24', '2020-09-26 15:02:15', 7),
(100, 'Suki', 'Ulric Olsen', 'Stanley', '1970-09-14', '2030-09-14', '743626262', 'HT747444', 'Female', '2004-04-28', 'Adipisci vitae esse', 'Ratione dolorum amet', 'St. Andrew', '479-249-3047', '757-624-2067', '', 'mihyjoc@mailinator.com', NULL, '2020-09-11 15:25:05', '2020-10-08 02:28:49', 7),
(102, 'Jame', '', 'Darcey', '1960-07-01', '2020-07-01', '569368523', 'RT86915', 'Female', '2014-02-15', '', '', '', '', '', '', 'test@mail.com', NULL, '2020-09-12 13:42:44', '2020-10-09 15:17:21', 7),
(103, 'Roary', 'Gary Poole', 'Mathis', '2020-03-14', '2085-03-14', '115256895', '', 'Male', '2015-03-07', '', '', '', '', '', '', '', NULL, '2020-09-14 19:04:07', '2020-10-09 14:42:41', 7),
(104, 'Serena', 'Len Dominguez', 'Albert', '2008-01-14', '2068-01-14', '985952326', 'R2222T2', 'Female', '1998-07-27', 'Velit ipsa veritat', 'Perferendis in sequi', 'Kingston', '922-538-9941', '682-154-7347', '', 'juwyqofela@mailinator.com', NULL, '2020-09-14 19:19:28', '2020-10-09 12:58:34', 7),
(105, 'Jessie', '', 'Pateler', '2014-04-16', '2079-04-16', '899698523', 'XR5333', 'Male', '1998-07-27', '', '', '', '', '', '', '', NULL, '2020-09-14 19:19:48', '2020-10-09 14:44:50', 7),
(107, 'Zelda', 'Owen Gillespie', 'Martinez', '1992-12-08', '2052-12-08', NULL, NULL, 'Female', '1995-01-14', '', NULL, NULL, NULL, NULL, 'zmartinez@comp.com', '', NULL, '2020-09-14 19:23:53', '2020-10-16 17:27:47', 7),
(109, 'Phoebe', 'Tamekah Benson', 'Rasmussen', '2018-07-18', '2083-07-18', '114657242', '3V33222', 'Male', '2020-10-10', '14 Camp Road', 'Kingston CSO', 'Kingston', '', '', 'ariel@phoe.com', '', NULL, '2020-09-14 19:24:32', '2020-10-14 19:43:52', 7),
(110, 'Brianca', 'Shelly Howard', 'Brewers', '1974-10-01', '2039-10-01', '56734512', 'VT3335', 'Male', '2010-11-05', '', '', '', '', '', '', '', NULL, '2020-09-14 19:46:09', '2020-09-26 15:19:21', 7),
(117, 'Dexter', 'Cameron Farmer', 'Frazier', '1986-10-21', '2046-10-21', NULL, NULL, 'Female', '1978-09-25', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:56:01', '2020-09-14 19:56:01', 7),
(118, 'Imogene', 'Aquila Foley', 'Gould', '1979-04-22', '2039-04-22', NULL, NULL, 'Female', '1995-09-11', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:59:26', '2020-09-14 19:59:26', 7),
(120, 'Shay', 'Zelenia Malone', 'Fryes', '2018-12-28', '2083-12-28', '56262626', 'Y4Y4646', 'Male', '1981-12-06', '', '', '', '', '', '', '', NULL, '2020-09-14 20:04:35', '2020-10-09 15:09:35', 7),
(121, 'Rina', 'Kylee Stevenson', 'Clayson', '1983-11-10', '2043-11-10', '522623623', 'HW225264', 'Female', '1990-03-18', '', '', '', '', '', '', '', NULL, '2020-09-14 20:06:00', '2020-10-09 15:12:15', 7),
(122, 'Madaline', 'Aspen Silva', 'Manning', '1976-07-08', '2041-07-08', NULL, NULL, 'Male', '2004-12-01', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:07:42', '2020-09-14 20:07:42', 7),
(151, 'Deanna', 'Gail Mercado', 'Griffith', '2015-01-06', '2075-01-06', NULL, NULL, 'Female', '2013-04-11', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:22:45', '2020-09-16 16:22:45', 7),
(159, 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:59:13', '2020-09-16 16:59:13', 7),
(160, 'Thaddeus', 'Thane Preston', 'Parker', '1988-04-01', '2048-04-01', NULL, NULL, 'Female', '2020-02-02', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:07:01', '2020-09-16 17:07:01', 7),
(166, 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:51:18', '2020-09-16 17:51:18', 7),
(167, 'Kennan', 'Aimee Schneider', 'Sandoval', '1972-01-06', '2037-01-06', '567345987', 'THS2522', 'Male', '1970-07-02', '', '', '', '', '', '', '', NULL, '2020-09-16 17:51:31', '2020-09-26 15:53:51', 7),
(168, 'Uta', 'Brielle Osborne', 'Montgomery', '1985-10-15', '2050-10-15', NULL, NULL, 'Male', '1990-10-04', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:52:07', '2020-09-16 17:52:07', 7),
(169, 'Harlan', 'Derek Schroeder', 'Burt', '1976-12-19', '2041-12-19', NULL, NULL, 'Male', '1970-10-11', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:04:31', '2020-09-16 18:04:31', 7),
(170, 'Sylvester', 'Hadley Hansen', 'Fitzpatrick', '1990-08-15', '2050-08-15', '567565333', '56FQ3', 'Female', '2004-05-25', 'My adresss', 'Loisville', 'Clarendon', '', '', '', '', NULL, '2020-09-16 18:14:05', '2020-09-26 22:02:10', 7),
(171, 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', '56732245', 'FT52353', 'Male', '1985-02-01', 'Spray Town', 'Spoonville', 'Kingston', '555-555-5555', '876-555-5559', 'jmurray3@gmail.com', 'teflot@sun.com', NULL, '2020-09-16 18:14:17', '2020-09-27 01:10:51', 7),
(172, 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', NULL, NULL, 'Male', '1985-10-20', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:14:38', '2020-09-16 18:14:38', 7),
(174, 'Ainsley', '', 'Durham', '1999-07-18', '2059-07-18', NULL, NULL, 'Female', '1993-04-20', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:16:48', '2020-09-16 18:16:48', 7),
(175, 'Erich', 'Otto Pittman', 'Castro', '2005-05-17', '2065-05-17', NULL, NULL, 'Female', '2020-08-23', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:18:02', '2020-09-16 18:18:02', 7),
(176, 'Aladdin', 'Christen Sims', 'Holden', '1972-09-14', '2032-09-14', NULL, NULL, 'Female', '1996-06-04', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:20:12', '2020-09-16 18:20:12', 7),
(177, 'Cara', 'Angela Hopper', 'Tate', '2000-09-10', '2060-09-10', NULL, NULL, 'Female', '2008-06-12', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:20:47', '2020-09-16 18:20:47', 7),
(178, 'Jack', 'Rhiannon Hess', 'Kaufman', '2019-09-18', '2079-09-18', NULL, NULL, 'Female', '2006-01-19', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:21:12', '2020-09-16 18:21:12', 7),
(179, 'Quail', '', 'Jackson', '1977-06-17', '2042-06-17', NULL, NULL, 'Male', '2017-01-08', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:21:23', '2020-09-16 18:21:23', 7),
(180, 'Kay', 'Jared Mendoza', 'Sutton', '1996-09-21', '2061-09-21', NULL, NULL, 'Male', '1984-01-12', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:22:20', '2020-09-16 18:22:20', 7),
(187, 'Halee', 'Evan Reilly', 'Le', '1997-03-09', '2062-03-09', NULL, NULL, 'Male', '1981-11-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 19:39:50', '2020-09-17 19:39:50', 7),
(188, 'Mason', 'Harriet Patrick', 'Good', '1991-10-26', '2056-10-26', NULL, NULL, 'Male', '2011-09-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-19 15:38:39', '2020-09-19 15:38:39', 7),
(189, 'Shoshana', 'Evan Hayes', 'Williamson', '1977-05-06', '2037-05-06', NULL, NULL, 'Female', '1978-10-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-19 15:39:13', '2020-09-19 15:39:13', 7),
(190, 'Evangeline', 'Holmes Nash', 'Patterson', '1997-01-03', '2057-01-03', '636363362', 'XY46363', 'Female', '2020-09-22', '', '', '', '', '', NULL, '', NULL, '2020-09-22 21:00:13', '2020-09-25 17:52:22', 7),
(191, 'Adele', 'Miriam Blackburn', 'Dillon', '2020-09-25', '2085-09-25', NULL, NULL, 'Male', '2020-09-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-25 16:15:13', '2020-09-25 16:15:14', 7),
(192, 'Isadora', 'Wing Moss', 'Ruiz', '1987-01-08', '2047-01-08', '125398212', 'XCVDGTG', 'Female', '2020-09-25', '', '', '', '', '', NULL, '', NULL, '2020-09-25 19:28:22', '2020-09-25 19:29:02', 7),
(2967, 'Gabriel', 'Doris Spencer', 'Malone', '1974-04-03', '2039-04-03', NULL, NULL, 'Male', '2020-10-14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-14 19:58:14', '2020-10-14 19:58:14', 7),
(6369, 'Isabella', 'Thor Chase', 'Watkins', '1983-08-23', '2048-08-23', NULL, NULL, 'Male', '1991-09-17', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-08 01:39:08', '2020-10-08 01:39:08', 7),
(7305, 'Karly', 'Tashya Kerr', 'Logan', '2020-10-05', '2080-10-05', NULL, NULL, 'Female', '2020-10-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-05 20:32:13', '2020-10-05 20:32:13', 7),
(34002, 'Claire', 'May Maynard', 'Lester', '2020-10-05', '2080-10-05', NULL, NULL, 'Female', '1924-01-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-05 20:31:29', '2020-10-05 20:31:29', 7);

--
-- Triggers `tblemployees`
--
DELIMITER $$
CREATE TRIGGER `archives_AFTER_INSERT_RECORD` AFTER INSERT ON `tblemployees` FOR EACH ROW BEGIN

 INSERT INTO archives_employees (empID, first_name, middle_name, last_name, empDOB, retirementDate, gender, hire_date, created_date, created_by, action)
    VALUES (NEW.empID, NEW.first_name, NEW.middle_name, NEW.last_name,  NEW.empDOB, NEW.retirementDate, NEW.gender, NEW.hire_date, NEW.created_date,  NEW.created_by, "insert");
    
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `archives_AFTER_UPDATE` BEFORE UPDATE ON `tblemployees` FOR EACH ROW BEGIN
IF 
OLD.empID <> NEW.empID || 
OLD.first_name <> NEW.first_name || 
OLD.middle_name <> NEW.middle_name || 
OLD.last_name <> NEW.last_name || 
OLD.empDOB <> NEW.empDOB || 
OLD.retirementDate <> NEW.retirementDate || 
OLD.trn <> NEW.trn || 
OLD.nis <> NEW.nis || 
OLD.gender <> NEW.gender || 
OLD.hire_date <> NEW.hire_date || 
OLD.address <> NEW.address || 
OLD.city <> NEW.city || 
OLD.parish <> NEW.parish || 
OLD.phoneOne <> NEW.phoneOne || 
OLD.mobile <> NEW.mobile || 
OLD.internalEmail <> NEW.internalEmail || 
OLD.externalEmail <> NEW.externalEmail || 
OLD.photo <> NEW.photo THEN

    INSERT INTO archives_employees (empID, first_name, middle_name, last_name, empDOB, retirementDate, trn, nis, gender, hire_date, address, city, parish, phoneOne, mobile, internalEmail, externalEmail, photo, created_date, modified_at, created_by, action)
    VALUES (NEW.empID, NEW.first_name, NEW.middle_name, NEW.last_name,  NEW.empDOB, NEW.retirementDate, NEW.trn, NEW.nis, NEW.gender, NEW.hire_date, NEW.address, NEW.city, NEW.parish, NEW.phoneOne, NEW.mobile, NEW.internalEmail, NEW.externalEmail, NEW.photo, NEW.created_date, NEW.modified_at, NEW.created_by, "update");
    
END IF;
   
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `archives_BEFORE_DELETE` BEFORE DELETE ON `tblemployees` FOR EACH ROW BEGIN
 INSERT INTO archives_employees (empID, first_name, middle_name, last_name, empDOB, retirementDate, trn, nis, gender, hire_date, address, city, parish, phoneOne, mobile, internalEmail, externalEmail, photo, created_date, modified_at, created_by, action)
    VALUES (OLD.empID, OLD.first_name, OLD.middle_name, OLD.last_name,  OLD.empDOB, OLD.retirementDate, OLD.trn, OLD.nis, OLD.gender, OLD.hire_date, OLD.address, OLD.city, OLD.parish, OLD.phoneOne, OLD.mobile, OLD.internalEmail, OLD.externalEmail, OLD.photo, OLD.created_date, NOW(), OLD.created_by, "delete");
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblgender`
--

CREATE TABLE `tblgender` (
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblgender`
--

INSERT INTO `tblgender` (`gender`) VALUES
('Male'),
('Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobtitles`
--

CREATE TABLE `tbljobtitles` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jobDesc` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbljobtitles`
--

INSERT INTO `tbljobtitles` (`id`, `title`, `jobDesc`, `created_date`, `modified_date`, `created_by`) VALUES
(1, 'Plotter', '', '2020-10-06 01:22:14', '2020-10-06 01:22:14', 7),
(14, 'Accountant', NULL, '2020-10-06 16:53:49', '2020-10-06 16:53:49', 7),
(15, 'Customer Service', NULL, '2020-10-06 18:16:02', '2020-10-06 18:16:02', 7),
(16, 'Senior Engineer', NULL, '2020-10-06 18:16:24', '2020-10-06 18:16:24', 7),
(17, 'Engineer', NULL, '2020-10-06 18:16:32', '2020-10-06 18:16:32', 7),
(18, 'Assistant Engineer', NULL, '2020-10-06 18:16:38', '2020-10-06 18:16:38', 7),
(20, 'Pressman', NULL, '2020-10-06 18:16:50', '2020-10-06 18:16:50', 7),
(22, 'CEO', NULL, '2020-10-06 18:17:10', '2020-10-06 18:17:10', 7),
(23, 'Chief Accountant', NULL, '2020-10-06 18:17:17', '2020-10-06 18:17:17', 7),
(24, 'Supervisor', NULL, '2020-10-09 16:26:46', '2020-10-09 16:26:46', 7),
(25, 'Manager', NULL, '2020-10-09 16:26:51', '2020-10-09 16:26:51', 7);

--
-- Triggers `tbljobtitles`
--
DELIMITER $$
CREATE TRIGGER `tbljobtitles_AFTER_INSERT` AFTER INSERT ON `tbljobtitles` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = NEW.created_by,
action = CONCAT('New Job Title record created: <br/> ID: ', NEW.id, '<br/> Job: ', NEW.title);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updateLog` AFTER UPDATE ON `tbljobtitles` FOR EACH ROW BEGIN
IF OLD.title <> new.title THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('Updated Job Title <br/>Old: ', OLD.title , '<br/> New: <a href="../jobs/edit/', NEW.id ,'">', NEW.title, '</a>' ));
END IF;


IF OLD.jobDesc <> new.jobDesc THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by, 'Job Description Upated');
END IF;


END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelog_after_delete` AFTER DELETE ON `tbljobtitles` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = OLD.created_by,
action = CONCAT('Record deleted in Jobs for ', OLD.id, ' - ',  OLD.title);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbloptions`
--

CREATE TABLE `tbloptions` (
  `id` enum('') COLLATE utf8_unicode_ci NOT NULL,
  `compName` longtext COLLATE utf8_unicode_ci NOT NULL,
  `compTRN` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `compNIS` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `compUrl` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parish` varchar(45) COLLATE utf8_unicode_ci DEFAULT 'Kingston',
  `contactPerson` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` longtext COLLATE utf8_unicode_ci,
  `main_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `secondary_phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `modified_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbloptions`
--

INSERT INTO `tbloptions` (`id`, `compName`, `compTRN`, `compNIS`, `compUrl`, `address`, `city`, `parish`, `contactPerson`, `email`, `main_phone`, `secondary_phone`, `modified_date`, `created_date`) VALUES
('', 'Surea Seefa', '555626262', 'X2Y2362', 'https://www.ravulo.me.uk', 'Maiores distinctio', 'Nisi sunt iusto ut m', 'Portland', 'Sue Storm', 'hijijy@mailinator.com', '+1 (406) 723-2072', '+1 (589) 184-4601', '2020-09-13 21:40:58', '2020-09-12 19:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `tblparish`
--

CREATE TABLE `tblparish` (
  `id` int(11) NOT NULL,
  `parishName` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblparish`
--

INSERT INTO `tblparish` (`id`, `parishName`) VALUES
(1, 'Clarendon'),
(2, 'Hanover'),
(3, 'Kingston'),
(4, 'Manchester'),
(5, 'Portland'),
(6, 'St. Andrew'),
(7, 'St. Ann'),
(8, 'St. Catherine'),
(9, 'St. Elizabeth'),
(10, 'St. James'),
(11, 'St. Mary'),
(12, 'St. Thomas'),
(13, 'Trelawny'),
(14, 'Westmoreland');

-- --------------------------------------------------------

--
-- Table structure for table `tblretirement`
--

CREATE TABLE `tblretirement` (
  `id` int(3) NOT NULL,
  `years` int(11) NOT NULL,
  `gender` enum('Male','Female') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblretirement`
--

INSERT INTO `tblretirement` (`id`, `years`, `gender`) VALUES
(1, 65, 'Male'),
(2, 60, 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlogs`
--

CREATE TABLE `tbluserlogs` (
  `idLogs` int(11) NOT NULL,
  `relUserID` int(11) NOT NULL,
  `userSession` varchar(255) DEFAULT NULL,
  `timeLog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actionPerformed` varchar(45) DEFAULT NULL,
  `userAgent` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbluserlogs`
--

INSERT INTO `tbluserlogs` (`idLogs`, `relUserID`, `userSession`, `timeLog`, `actionPerformed`, `userAgent`) VALUES
(6, 7, '1596486090', '2020-08-03 20:21:30', 'login', NULL),
(7, 8, '1596487124', '2020-08-03 20:38:44', 'login', NULL),
(8, 8, '1596487419', '2020-08-03 20:43:39', 'Login Event', NULL),
(9, 8, '1596487419', '2020-08-03 20:43:41', 'Logout Event', NULL),
(10, 7, '1596488777', '2020-08-03 21:06:17', 'Login Event', NULL),
(11, 7, '1596488777', '2020-08-03 21:09:03', 'Logout Event', NULL),
(12, 7, '1596489002', '2020-08-03 21:10:02', 'adminLogin', NULL),
(13, 7, '1596489002', '2020-08-03 21:15:11', 'Logout', NULL),
(14, 8, '1596489335', '2020-08-03 21:15:35', 'Login', NULL),
(15, 8, '1596489335', '2020-08-03 21:15:37', 'Logout', NULL),
(16, 7, '1596489396', '2020-08-03 21:16:36', 'Login', NULL),
(17, 7, '1596549084', '2020-08-04 13:51:24', 'Login', NULL),
(18, 7, '1596549084', '2020-08-04 16:20:56', 'Logout', NULL),
(19, 7, '1596558063', '2020-08-04 16:21:03', 'Login', NULL),
(20, 7, '1596558063', '2020-08-04 16:21:40', 'Logout', NULL),
(21, 7, '1596558850', '2020-08-04 16:34:10', 'Login', NULL),
(22, 7, '1596558850', '2020-08-04 16:53:20', 'Logout', NULL),
(23, 7, '1596560008', '2020-08-04 16:53:28', 'Login', NULL),
(24, 7, '1596576759', '2020-08-04 21:32:39', 'Login', NULL),
(25, 7, '1597066073', '2020-08-10 13:27:53', 'Login', NULL),
(26, 7, '1597160423', '2020-08-11 15:40:23', 'Login', NULL),
(27, 7, '1597160423', '2020-08-11 16:38:53', 'Logout', NULL),
(28, 7, '1597167518', '2020-08-11 17:38:38', 'Login', NULL),
(29, 7, '1597167518', '2020-08-11 17:42:20', 'Logout', NULL),
(30, 7, '1597167747', '2020-08-11 17:42:27', 'Login', NULL),
(31, 7, '1597167747', '2020-08-11 17:43:36', 'Logout', NULL),
(32, 7, '1597167829', '2020-08-11 17:43:49', 'Login', NULL),
(33, 7, '1597167829', '2020-08-11 17:44:27', 'Logout', NULL),
(34, 7, '1597167874', '2020-08-11 17:44:34', 'Login', NULL),
(35, 7, '1597167874', '2020-08-11 20:28:54', 'Logout', NULL),
(36, 7, '1597177739', '2020-08-11 20:28:59', 'Login', NULL),
(37, 7, '1597177739', '2020-08-11 20:29:17', 'Logout', NULL),
(38, 7, '1597177777', '2020-08-11 20:29:37', 'Login', NULL),
(39, 7, '1597177777', '2020-08-11 21:06:33', 'Logout', NULL),
(40, 7, '1597180007', '2020-08-11 21:06:47', 'Login', NULL),
(41, 7, '1597180007', '2020-08-11 21:13:35', 'Logout', NULL),
(42, 7, '1597180712', '2020-08-11 21:18:32', 'Login', NULL),
(43, 7, '1597180712', '2020-08-11 21:18:36', 'Logout', NULL),
(44, 7, '1597181775', '2020-08-11 21:36:15', 'Login', NULL),
(45, 7, '1597181775', '2020-08-11 21:43:14', 'Logout', NULL),
(46, 7, '1597182592', '2020-08-11 21:49:52', 'Login', NULL),
(47, 7, '1597182592', '2020-08-11 21:50:46', 'Logout', NULL),
(48, 7, '1597182654', '2020-08-11 21:50:54', 'Login', NULL),
(49, 7, '1597243625', '2020-08-12 14:47:05', 'Login', NULL),
(50, 7, '1597243625', '2020-08-12 15:40:51', 'Logout', NULL),
(51, 7, '1597250714', '2020-08-12 16:45:14', 'Login', NULL),
(52, 7, '1597250775', '2020-08-12 16:46:15', 'Login', NULL),
(53, 7, '1597250900', '2020-08-12 16:48:20', 'Login', NULL),
(54, 7, '1597250931', '2020-08-12 16:48:51', 'Login', NULL),
(55, 7, '1597250957', '2020-08-12 16:49:17', 'User Login', NULL),
(56, 7, '1597250980', '2020-08-12 16:49:40', 'User Login', NULL),
(57, 7, '1597250986', '2020-08-12 16:49:46', 'User Login', NULL),
(58, 7, '1597251078', '2020-08-12 16:51:18', 'User Login', NULL),
(59, 7, '1597251078', '2020-08-12 16:51:24', 'User Logout', NULL),
(60, 8, '1597251166', '2020-08-12 16:52:46', 'Login', NULL),
(61, 8, '1597251166', '2020-08-12 16:53:05', 'User Logout', NULL),
(62, 8, '1597251526', '2020-08-12 16:58:46', 'Login', NULL),
(63, 8, '1597251526', '2020-08-12 17:04:14', 'User Logout', NULL),
(64, 7, '1597252368', '2020-08-12 17:12:48', 'User Login', NULL),
(65, 7, '1597252368', '2020-08-12 17:13:23', 'User Logout', NULL),
(66, 8, '1597252419', '2020-08-12 17:13:39', 'Login', NULL),
(67, 8, '1597252419', '2020-08-12 17:14:54', 'User Logout', NULL),
(68, 8, '1597252561', '2020-08-12 17:16:01', 'Login', NULL),
(69, 8, '1597252561', '2020-08-12 17:16:05', 'User Logout', NULL),
(70, 7, '1597252661', '2020-08-12 17:17:41', 'User Login', NULL),
(71, 7, '1597252661', '2020-08-12 17:17:52', 'User Logout', NULL),
(72, 7, '1597253047', '2020-08-12 17:24:07', 'User Login', NULL),
(73, 7, '1597253047', '2020-08-12 17:24:18', 'User Logout', NULL),
(74, 7, '1597253226', '2020-08-12 17:27:06', 'User Login', NULL),
(75, 8, '1597253540', '2020-08-12 17:32:20', 'Login', NULL),
(76, 8, '1597253635', '2020-08-12 17:33:55', 'Login', NULL),
(77, 7, '1597255377', '2020-08-12 18:02:57', 'User Login', NULL),
(78, 7, '1597255462', '2020-08-12 18:04:22', 'User Login', NULL),
(79, 8, '1597255585', '2020-08-12 18:06:25', 'Login', NULL),
(80, 7, '1597255599', '2020-08-12 18:06:39', 'User Login', NULL),
(81, 7, '1597259664', '2020-08-12 19:14:24', 'User Login', NULL),
(82, 7, NULL, '2020-08-12 19:33:21', 'User Login', NULL),
(83, 7, '1597260921', '2020-08-12 19:35:21', 'User Login', NULL),
(84, 7, '1597260980', '2020-08-12 19:36:20', 'User Login', NULL),
(85, 7, '1597261771', '2020-08-12 19:49:31', 'User Login', NULL),
(86, 7, '1597261816', '2020-08-12 19:50:16', 'User Login', NULL),
(87, 8, '1597261831', '2020-08-12 19:50:31', 'Login', NULL),
(88, 8, '1597261884', '2020-08-12 19:51:24', 'Login', NULL),
(89, 7, '1597262034', '2020-08-12 19:53:54', 'User Login', NULL),
(90, 8, '1597262085', '2020-08-12 19:54:45', 'Login', NULL),
(91, 7, '1597262241', '2020-08-12 19:57:21', 'User Login', NULL),
(92, 8, '1597262254', '2020-08-12 19:57:34', 'Login', NULL),
(93, 8, '1597262411', '2020-08-12 20:00:11', 'Login', NULL),
(94, 8, '1597262534', '2020-08-12 20:02:14', 'Login', NULL),
(95, 7, '1597262549', '2020-08-12 20:02:29', 'User Login', NULL),
(96, 8, '1597262592', '2020-08-12 20:03:12', 'Login', NULL),
(97, 8, '1597262642', '2020-08-12 20:04:02', 'Login', NULL),
(98, 8, '1597262786', '2020-08-12 20:06:26', 'Login', NULL),
(99, 8, '1597262873', '2020-08-12 20:07:53', 'Login', NULL),
(100, 7, '1597262889', '2020-08-12 20:08:09', 'User Login', NULL),
(101, 7, '1597265249', '2020-08-12 20:47:29', 'User Login', NULL),
(102, 7, '1597265733', '2020-08-12 20:57:52', 'User Logout', NULL),
(103, 7, NULL, '2020-08-12 21:15:24', 'User Logout', NULL),
(104, 7, NULL, '2020-08-12 21:23:37', 'User Login', NULL),
(105, 7, NULL, '2020-08-12 21:26:47', 'User Logout', NULL),
(106, 7, NULL, '2020-08-12 21:28:10', 'User Login', NULL),
(107, 7, NULL, '2020-08-12 21:28:37', 'User Logout', NULL),
(108, 7, NULL, '2020-08-12 21:30:26', 'User Login', NULL),
(109, 7, NULL, '2020-08-12 21:30:33', 'User Logout', NULL),
(110, 7, NULL, '2020-08-12 21:47:16', 'User Login', NULL),
(111, 7, NULL, '2020-08-12 21:47:38', 'User Logout', NULL),
(112, 7, NULL, '2020-08-13 13:03:52', 'User Login', NULL),
(113, 7, NULL, '2020-08-13 13:04:00', 'User Logout', NULL),
(114, 7, NULL, '2020-08-13 14:11:15', 'User Login', NULL),
(115, 7, NULL, '2020-08-13 14:11:17', 'User Logout', NULL),
(116, 7, NULL, '2020-08-13 14:11:25', 'User Login', NULL),
(117, 7, NULL, '2020-08-13 14:11:36', 'User Logout', NULL),
(118, 7, NULL, '2020-08-14 14:48:21', 'User Login', NULL),
(119, 7, NULL, '2020-08-14 14:49:02', 'User Logout', NULL),
(120, 7, NULL, '2020-08-14 15:03:17', 'User Login', NULL),
(121, 7, NULL, '2020-08-14 15:03:27', 'User Logout', NULL),
(122, 8, NULL, '2020-08-14 15:06:51', 'User Logout', NULL),
(123, 7, NULL, '2020-08-14 15:06:57', 'User Login', NULL),
(124, 7, NULL, '2020-08-14 15:07:34', 'User Logout', NULL),
(125, 7, NULL, '2020-08-14 15:08:16', 'User Login', NULL),
(126, 7, NULL, '2020-08-14 15:08:22', 'User Logout', NULL),
(127, 8, NULL, '2020-08-14 15:11:26', 'User Logout', NULL),
(128, 7, NULL, '2020-08-14 15:14:15', 'User Logout', NULL),
(129, 7, NULL, '2020-08-14 15:14:33', 'User Logout', NULL),
(130, 7, NULL, '2020-08-14 15:15:45', 'User Logout', NULL),
(131, 8, NULL, '2020-08-14 15:30:43', 'User Logout', NULL),
(132, 7, NULL, '2020-08-14 15:41:10', 'User Logout', NULL),
(133, 8, NULL, '2020-08-14 15:44:49', 'User Logout', NULL),
(134, 7, NULL, '2020-08-14 15:46:34', 'User Logout', NULL),
(135, 7, NULL, '2020-08-14 15:47:36', 'User Logout', NULL),
(136, 7, NULL, '2020-08-14 15:48:04', 'User Logout', NULL),
(137, 8, NULL, '2020-08-14 15:48:39', 'User Logout', NULL),
(138, 8, NULL, '2020-08-14 15:51:47', 'User Logout', NULL),
(139, 7, NULL, '2020-08-14 15:52:54', 'User Logout', NULL),
(140, 8, NULL, '2020-08-14 15:54:32', 'User Logout', NULL),
(141, 7, NULL, '2020-08-14 15:54:58', 'User Logout', NULL),
(142, 7, NULL, '2020-08-14 15:56:23', 'User Logout', NULL),
(143, 7, NULL, '2020-08-14 15:56:57', 'User Logout', NULL),
(144, 7, NULL, '2020-08-14 15:57:39', 'User Logout', NULL),
(145, 8, NULL, '2020-08-14 15:59:22', 'User Logout', NULL),
(146, 8, NULL, '2020-08-14 16:01:15', 'User Logout', NULL),
(147, 7, NULL, '2020-08-14 16:01:24', 'User Logout', NULL),
(148, 8, NULL, '2020-08-14 16:05:13', 'User Logout', NULL),
(149, 7, NULL, '2020-08-14 16:06:59', 'User Logout', NULL),
(150, 8, NULL, '2020-08-14 16:07:22', 'User Logout', NULL),
(151, 8, NULL, '2020-08-14 16:08:12', 'User Logout', NULL),
(152, 7, NULL, '2020-08-14 16:08:23', 'User Logout', NULL),
(153, 7, NULL, '2020-08-14 16:12:11', 'User Logout', NULL),
(154, 7, NULL, '2020-08-14 16:12:20', 'User Logout', NULL),
(155, 8, NULL, '2020-08-14 16:13:28', 'User Logout', NULL),
(156, 8, NULL, '2020-08-14 16:16:17', 'User Logout', NULL),
(157, 8, NULL, '2020-08-14 16:16:35', 'User Logout', NULL),
(158, 8, NULL, '2020-08-14 16:19:22', 'User Logout', NULL),
(159, 7, NULL, '2020-08-14 16:19:44', 'User Logout', NULL),
(160, 8, NULL, '2020-08-14 16:22:07', 'User Logout', NULL),
(161, 8, NULL, '2020-08-14 16:22:23', 'User Logout', NULL),
(162, 7, NULL, '2020-08-14 16:23:00', 'User Logout', NULL),
(163, 8, NULL, '2020-08-14 16:24:28', 'User Logout', NULL),
(164, 8, NULL, '2020-08-14 16:24:36', 'User Logout', NULL),
(165, 7, NULL, '2020-08-14 16:42:55', 'User Logout', NULL),
(166, 7, NULL, '2020-08-14 16:43:04', 'User Logout', NULL),
(167, 8, NULL, '2020-08-14 16:43:13', 'User Logout', NULL),
(168, 7, NULL, '2020-08-14 17:21:11', 'User Logout', NULL),
(169, 8, NULL, '2020-08-14 17:21:34', 'User Logout', NULL),
(170, 8, NULL, '2020-08-14 18:53:00', 'User Logout', NULL),
(171, 7, NULL, '2020-08-14 18:54:52', 'User Logout', NULL),
(172, 7, NULL, '2020-08-14 19:24:16', 'User Logout', NULL),
(173, 7, NULL, '2020-08-18 13:10:04', 'User Logout', NULL),
(174, 7, NULL, '2020-08-18 13:11:52', 'User Login', NULL),
(175, 7, NULL, '2020-08-18 13:14:29', 'User Logout', NULL),
(176, 7, NULL, '2020-08-18 13:15:34', 'User Login', NULL),
(177, 7, NULL, '2020-08-18 13:15:36', 'User Logout', NULL),
(178, 7, NULL, '2020-08-18 14:04:40', 'User Login', NULL),
(179, 7, NULL, '2020-08-18 14:04:43', 'User Logout', NULL),
(180, 7, NULL, '2020-08-18 14:27:52', 'User Login', NULL),
(181, 7, NULL, '2020-08-18 14:28:10', 'User Logout', NULL),
(182, 7, NULL, '2020-08-18 14:28:17', 'User Login', NULL),
(183, 7, NULL, '2020-08-18 14:30:51', 'User Logout', NULL),
(184, 7, NULL, '2020-08-18 14:31:02', 'User Login', NULL),
(185, 7, NULL, '2020-08-18 17:48:45', 'User Logout', NULL),
(186, 7, NULL, '2020-08-18 17:48:51', 'User Login', NULL),
(187, 7, NULL, '2020-08-18 17:52:35', 'User Logout', NULL),
(188, 7, NULL, '2020-08-18 17:52:42', 'User Login', NULL),
(189, 7, NULL, '2020-08-18 20:29:32', 'User Logout', NULL),
(190, 7, NULL, '2020-08-18 20:33:17', 'User Login', NULL),
(191, 7, NULL, '2020-08-18 20:35:22', 'User Logout', NULL),
(192, 7, NULL, '2020-08-18 20:35:34', 'User Login', NULL),
(193, 7, NULL, '2020-08-18 20:35:41', 'User Logout', NULL),
(194, 7, NULL, '2020-08-18 20:35:50', 'User Login', NULL),
(195, 7, NULL, '2020-08-18 20:39:50', 'User Logout', NULL),
(196, 8, NULL, '2020-08-18 20:40:04', 'User Login', NULL),
(197, 8, NULL, '2020-08-18 20:40:21', 'User Logout', NULL),
(198, 7, NULL, '2020-08-18 21:31:39', 'User Login', NULL),
(199, 7, NULL, '2020-08-18 21:41:57', 'User Logout', NULL),
(200, 7, NULL, '2020-08-18 21:42:04', 'User Login', NULL),
(201, 7, NULL, '2020-08-21 16:22:12', 'User Login', NULL),
(202, 7, NULL, '2020-08-21 16:31:06', 'User Logout', NULL),
(203, 8, NULL, '2020-08-21 16:31:11', 'User Login', NULL),
(204, 8, NULL, '2020-08-21 16:37:40', 'User Logout', NULL),
(205, 8, NULL, '2020-08-21 16:38:03', 'User Login', NULL),
(206, 8, NULL, '2020-08-21 17:02:13', 'User Logout', NULL),
(207, 7, NULL, '2020-08-21 17:02:20', 'User Login', NULL),
(208, 7, NULL, '2020-08-21 17:04:15', 'User Login', NULL),
(209, 7, NULL, '2020-08-21 17:06:15', 'User Login', NULL),
(210, 7, NULL, '2020-08-21 17:06:23', 'User Login', NULL),
(211, 7, NULL, '2020-08-21 17:07:51', 'User Logout', NULL),
(212, 7, NULL, '2020-08-21 17:07:56', 'User Login', NULL),
(213, 7, NULL, '2020-08-21 17:07:59', 'User Logout', NULL),
(214, 8, NULL, '2020-08-21 17:08:05', 'User Login', NULL),
(215, 8, NULL, '2020-08-21 17:08:54', 'User Login', NULL),
(216, 8, NULL, '2020-08-21 17:10:03', 'User Login', NULL),
(217, 8, NULL, '2020-08-21 17:10:12', 'User Login', NULL),
(218, 8, NULL, '2020-08-21 17:10:41', 'User Login', NULL),
(219, 8, NULL, '2020-08-21 17:11:34', 'User Login', NULL),
(220, 8, NULL, '2020-08-21 17:13:24', 'User Logout', NULL),
(221, 7, NULL, '2020-08-21 17:14:17', 'User Login', NULL),
(222, 7, NULL, '2020-08-21 17:21:18', 'User Logout', NULL),
(223, 8, NULL, '2020-08-21 17:21:25', 'User Login', NULL),
(224, 8, NULL, '2020-08-21 17:22:26', 'User Logout', NULL),
(225, 7, NULL, '2020-08-21 17:22:39', 'User Login', NULL),
(226, 7, NULL, '2020-08-21 17:26:09', 'User Logout', NULL),
(227, 7, NULL, '2020-08-21 17:26:15', 'User Login', NULL),
(228, 7, NULL, '2020-08-21 17:59:27', 'User Logout', NULL),
(229, 7, NULL, '2020-08-21 18:08:57', 'User Login', NULL),
(230, 7, NULL, '2020-08-21 18:46:17', 'User Logout', NULL),
(231, 7, NULL, '2020-08-21 18:46:26', 'User Login', NULL),
(232, 8, NULL, '2020-08-21 20:16:57', 'User Login', NULL),
(233, 7, NULL, '2020-08-28 17:42:44', 'User Login', NULL),
(234, 7, NULL, '2020-08-28 17:44:31', 'User Logout', NULL),
(235, 7, NULL, '2020-08-28 17:47:22', 'User Login', NULL),
(236, 7, NULL, '2020-08-28 17:48:59', 'User Logout', NULL),
(237, 7, NULL, '2020-08-28 17:49:15', 'User Login', NULL),
(238, 7, NULL, '2020-08-31 16:49:19', 'User Login', NULL),
(239, 7, NULL, '2020-08-31 16:53:00', 'User Logout', NULL),
(240, 7, NULL, '2020-08-31 16:53:05', 'User Login', NULL),
(241, 7, NULL, '2020-09-01 16:23:34', 'User Login', NULL),
(242, 7, NULL, '2020-09-01 20:03:38', 'User Logout', NULL),
(243, 7, NULL, '2020-09-01 20:03:45', 'User Login', NULL),
(244, 8, NULL, '2020-09-02 13:02:47', 'User Login', NULL),
(245, 8, NULL, '2020-09-02 13:02:58', 'User Logout', NULL),
(246, 7, NULL, '2020-09-02 13:03:04', 'User Login', NULL),
(247, 7, NULL, '2020-09-02 13:30:28', 'User Logout', NULL),
(248, 7, NULL, '2020-09-02 13:30:33', 'User Login', NULL),
(249, 7, NULL, '2020-09-02 20:20:40', 'User Logout', NULL),
(250, 7, NULL, '2020-09-04 13:24:45', 'User Login', NULL),
(251, 7, NULL, '2020-09-05 21:22:31', 'User Login', NULL),
(252, 7, NULL, '2020-09-07 12:56:28', 'User Login', NULL),
(253, 7, NULL, '2020-09-08 13:53:49', 'User Login', NULL),
(254, 7, NULL, '2020-09-08 14:41:18', 'User Login', NULL),
(255, 7, NULL, '2020-09-10 18:35:21', 'User Login', NULL),
(256, 7, NULL, '2020-09-11 18:01:22', 'User Logout', NULL),
(257, 7, NULL, '2020-09-12 13:40:07', 'User Login', NULL),
(258, 7, NULL, '2020-09-12 14:02:51', 'User Logout', NULL),
(259, 7, NULL, '2020-09-12 14:02:58', 'User Login', NULL),
(260, 7, NULL, '2020-09-12 15:25:53', 'User Login', NULL),
(261, 7, NULL, '2020-09-13 13:36:31', 'User Login', NULL),
(262, 7, NULL, '2020-09-13 13:43:21', 'User Logout', NULL),
(263, 7, NULL, '2020-09-13 13:43:26', 'User Login', NULL),
(264, 7, NULL, '2020-09-14 12:19:20', 'User Login', NULL),
(265, 7, NULL, '2020-09-14 12:19:21', 'User Login', NULL),
(266, 7, NULL, '2020-09-14 18:21:02', 'User Login', NULL),
(267, 7, NULL, '2020-09-15 14:52:17', 'User Logout', NULL),
(268, 7, NULL, '2020-09-15 14:52:23', 'User Login', NULL),
(269, 8, NULL, '2020-09-15 14:52:52', 'User Login', NULL),
(270, 8, NULL, '2020-09-15 14:52:54', 'User Logout', NULL),
(271, 7, NULL, '2020-09-15 14:53:00', 'User Login', NULL),
(272, 7, NULL, '2020-09-15 15:40:16', 'User Login', NULL),
(273, 7, NULL, '2020-09-15 16:45:31', 'User Login', NULL),
(274, 7, NULL, '2020-09-15 18:13:23', 'User Login', NULL),
(275, 7, NULL, '2020-09-16 13:10:45', 'User Login', NULL),
(276, 7, NULL, '2020-09-16 20:29:45', 'User Logout', NULL),
(277, 7, NULL, '2020-09-17 12:46:25', 'User Login', NULL),
(278, 7, NULL, '2020-09-20 13:42:46', 'User Login', NULL),
(279, 7, NULL, '2020-09-21 11:39:01', 'User Login', NULL),
(280, 7, NULL, '2020-09-22 12:50:48', 'User Login', NULL),
(281, 7, NULL, '2020-09-25 12:27:34', 'User Login', NULL),
(282, 7, NULL, '2020-09-26 13:50:54', 'User Login', NULL),
(283, 7, NULL, '2020-09-28 14:16:31', 'User Login', NULL),
(284, 7, NULL, '2020-09-29 15:10:45', 'User Login', NULL),
(285, 7, NULL, '2020-10-04 15:08:07', 'User Login', NULL),
(286, 7, NULL, '2020-10-05 16:33:38', 'User Login', NULL),
(287, 7, NULL, '2020-10-05 22:12:45', 'User Login', NULL),
(288, 7, NULL, '2020-10-06 15:21:50', 'User Login', NULL),
(289, 7, NULL, '2020-10-09 12:37:32', 'User Login', NULL),
(290, 7, NULL, '2020-10-10 14:17:43', 'User Login', NULL),
(291, 7, NULL, '2020-10-16 15:43:45', 'User Login', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token_auth`
--

CREATE TABLE `tbl_token_auth` (
  `id` int(11) NOT NULL,
  `relUsername` varchar(15) NOT NULL,
  `relUserRoleID` int(11) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_expired` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_token_auth`
--

INSERT INTO `tbl_token_auth` (`id`, `relUsername`, `relUserRoleID`, `selector`, `token`, `expires`, `is_expired`) VALUES
(23, 'admin', 0, '$2y$10$vPaJvrqsW.CDZjDUpv3i/erc1VZHHZPC61kUjrIK8hll0NmCkUklu', '$2y$10$qpxkxq6FkfWv42nPYjqt5epkG0TYfyIVMbUjtn00S3KX5yGZ49pMa', '2020-09-17 20:33:17', 0),
(24, 'admin', 0, '$2y$10$gxRKPmdgv9JAiQ1hkeOiC.YonIwUKKgzIUnGZUCEm2ZjSgavcWUW6', '$2y$10$T7LnIvby2fbAMeqjZ2Jqr.rtqnaWjtoFVZDYKAMfhop7Vld2xfgey', '2020-09-17 20:35:50', 0),
(25, 'test', 0, '$2y$10$cxM2DSKXXOWNdrYwQqvW9umjkFazsEmLIGHmxlvpjjgacqS4IvUUa', '$2y$10$P7K7d.O8vnl68aGOjWILTewuI7R.CUo/K9kbGSDCLdGiQQczY.76C', '2020-09-17 20:40:04', 0),
(26, 'admin', 1, '$2y$10$TafHuzoE.ZI2QYL9SaCxFOFMWemSCQRn.LLicEey/QyDyilibaZoq', '$2y$10$CFXFfoabeJ6sgMC.3K5QauMgBF1c/kQOhgfpQiEDPgNEsVBHqnvAm', '2020-08-21 16:58:19', 0),
(27, 'test', 5, '$2y$10$VGQdxn9bbL.KBHGvx9lc..akLP.Ysiu2njYHwRRaKvTSBFQgnw30i', '$2y$10$53hgHT0kGf0jtj9EjidKDOmBJYsrbF8hOWi7mPYorQzUumCu8vBpS', '2020-08-21 17:08:43', 0),
(28, 'test', 5, '$2y$10$vi1xwlXsWsM1zDi726kUluaGgXi8mYb5Nnhk/xOMaEC8lp/zT7iMK', '$2y$10$agmULcO87ZfvnuCAEU6iiO458EYw8oW7.lH6kIDKv.MsylZuLPoIa', '2020-08-22 17:11:34', 0),
(29, 'admin', 1, '$2y$10$v81/xaJT5I/uyTDadb9wu.e6yH7WbgrD1LETF34.NkRG1Lxb4fXXW', '$2y$10$eR9P.Bdq8UCHa2O/6V4vfOPmRef1XZp4Z/rIJNDQ8Dzmz4.KPpaqq', '2020-08-22 17:14:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL,
  `roleID` int(11) NOT NULL DEFAULT '4',
  `active` varchar(255) DEFAULT NULL,
  `resetToken` varchar(255) DEFAULT NULL,
  `resetComplete` varchar(255) DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `first_name`, `last_name`, `username`, `password`, `email`, `created_at`, `modified_at`, `deleted_at`, `roleID`, `active`, `resetToken`, `resetComplete`) VALUES
(6, 'Cumo', 'Lima', 'cunoheli', '$2y$12$VVU6oAs0ADNw7JDZ/q10tOfXptXIBNcMxgk1VeIKycmkkBt6NzPea', 'qekytehof@mailinator.net', '2020-07-29 18:14:56', '2020-07-29 13:14:56', NULL, 2, NULL, NULL, 'No'),
(7, 'Amoy', 'Nick', 'admin', '$2y$12$xjW/d8QZA4S7c8Un13Fa3uvF.hGpntFit6IOsFUsQCW9lQykneHC.', 'test@email.com', '2020-07-29 18:20:21', '2020-07-29 13:20:21', NULL, 1, NULL, NULL, 'No'),
(8, 'Test', 'User', 'test', '$2y$12$SRWCaMy2JEg2Giq3EVZHauMc5NTR2Vz1d8sphXBc5FoJEL0xrfX6m', 'tewyposy@mailinator.com', '2020-07-29 18:43:49', '2020-07-29 13:43:49', NULL, 5, NULL, NULL, 'No');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `archivesdepartmentemployee`
--
ALTER TABLE `archivesdepartmentemployee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archives_employees`
--
ALTER TABLE `archives_employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relUserIDFK` (`created_by`);

--
-- Indexes for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  ADD PRIMARY KEY (`idActivity`),
  ADD KEY `UserID` (`relUserID`);

--
-- Indexes for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userFK` (`created_by`);

--
-- Indexes for table `tbldepartment_employee`
--
ALTER TABLE `tbldepartment_employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_emp_ibfk_1_idx` (`empID`),
  ADD KEY `job_emp_ibfk_2_idx` (`jobID`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `tbldepartment_manager`
--
ALTER TABLE `tbldepartment_manager`
  ADD PRIMARY KEY (`empID`,`deptID`),
  ADD KEY `deptID` (`deptID`);

--
-- Indexes for table `tbldepartment_supervisor`
--
ALTER TABLE `tbldepartment_supervisor`
  ADD PRIMARY KEY (`empID`,`deptID`),
  ADD KEY `dept_id` (`deptID`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`empID`),
  ADD UNIQUE KEY `id_UNIQUE` (`empID`),
  ADD UNIQUE KEY `trn_UNIQUE` (`trn`),
  ADD UNIQUE KEY `nis_UNIQUE` (`nis`),
  ADD KEY `relUserFK` (`created_by`);

--
-- Indexes for table `tbljobtitles`
--
ALTER TABLE `tbljobtitles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcreatedfk` (`created_by`);

--
-- Indexes for table `tbloptions`
--
ALTER TABLE `tbloptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblparish`
--
ALTER TABLE `tblparish`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `parishName_UNIQUE` (`parishName`);

--
-- Indexes for table `tblretirement`
--
ALTER TABLE `tblretirement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  ADD PRIMARY KEY (`idLogs`),
  ADD KEY `relUserID_idx` (`relUserID`);

--
-- Indexes for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD KEY `role_id_fk_idx` (`roleID`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `archivesdepartmentemployee`
--
ALTER TABLE `archivesdepartmentemployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT for table `archives_employees`
--
ALTER TABLE `archives_employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `tbldepartment_employee`
--
ALTER TABLE `tbldepartment_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `tbljobtitles`
--
ALTER TABLE `tbljobtitles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblparish`
--
ALTER TABLE `tblparish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tblretirement`
--
ALTER TABLE `tblretirement`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=292;

--
-- AUTO_INCREMENT for table `tbl_token_auth`
--
ALTER TABLE `tbl_token_auth`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `archives_employees`
--
ALTER TABLE `archives_employees`
  ADD CONSTRAINT `relUserIDFK` FOREIGN KEY (`created_by`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`relUserID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldepartment`
--
ALTER TABLE `tbldepartment`
  ADD CONSTRAINT `userFK` FOREIGN KEY (`created_by`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbldepartment_employee`
--
ALTER TABLE `tbldepartment_employee`
  ADD CONSTRAINT `dept_emp_ibfk_2` FOREIGN KEY (`deptID`) REFERENCES `tbldepartment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_emp_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `tblemployees` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_emp_ibfk_2` FOREIGN KEY (`jobID`) REFERENCES `tbljobtitles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldepartment_manager`
--
ALTER TABLE `tbldepartment_manager`
  ADD CONSTRAINT `dept_manager_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `tblemployees` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dept_manager_ibfk_2` FOREIGN KEY (`deptID`) REFERENCES `tbldepartment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbldepartment_supervisor`
--
ALTER TABLE `tbldepartment_supervisor`
  ADD CONSTRAINT `dept_sup_ibfk_1` FOREIGN KEY (`empID`) REFERENCES `tblemployees` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dept_sup_ibfk_2` FOREIGN KEY (`deptID`) REFERENCES `tbldepartment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD CONSTRAINT `relUserFK` FOREIGN KEY (`created_by`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbljobtitles`
--
ALTER TABLE `tbljobtitles`
  ADD CONSTRAINT `idcreatedfk` FOREIGN KEY (`created_by`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  ADD CONSTRAINT `relUserID` FOREIGN KEY (`relUserID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
