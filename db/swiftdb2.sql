-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 07, 2020 at 08:38 PM
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

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `insertEmail`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEmail` (IN `relEmpID` INT(11), IN `emailAddress` VARCHAR(45), IN `created_at` TIMESTAMP)  BEGIN
	INSERT INTO tblemails(relEmpID, emailAddress, created_at) 
    VALUES(relEmpID, emailAddress, CURRENT_TIMESTAMP);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblactivitylog`
--

DROP TABLE IF EXISTS `tblactivitylog`;
CREATE TABLE IF NOT EXISTS `tblactivitylog` (
  `idActivity` int(11) NOT NULL AUTO_INCREMENT,
  `relUserID` int(11) NOT NULL,
  `action` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idActivity`),
  KEY `UserID` (`relUserID`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblactivitylog`
--

INSERT INTO `tblactivitylog` (`idActivity`, `relUserID`, `action`, `timestamp`) VALUES
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
(50, 7, 'Record deleted in Departments for ADIP - Ria Lewis', '2020-09-04 13:26:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

DROP TABLE IF EXISTS `tbldepartments`;
CREATE TABLE IF NOT EXISTS `tbldepartments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deptCode` char(6) NOT NULL,
  `deptName` varchar(45) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `deptID_UNIQUE` (`deptCode`),
  UNIQUE KEY `deptName_UNIQUE` (`deptName`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `deptCode`, `deptName`, `created_date`, `modified_on`, `created_by`) VALUES
(2, 'DEP1', 'Product Management Systems', '2020-07-29 19:01:09', '2020-09-02 20:07:44', 7),
(4, 'PPLACC', 'Accounting Department', '2020-07-29 19:01:09', '2020-09-02 20:15:44', 7),
(5, 'dep3', 'Information Technology', '2020-07-29 19:01:09', '2020-07-31 15:32:13', 7),
(7, 'SUN', 'Bindery', '2020-08-04 14:45:54', '2020-09-02 19:55:56', 7),
(36, 'Minim', 'Palmer Bridges', '2020-09-02 17:04:44', NULL, 7),
(37, 'Quos', 'Natalie Madden', '2020-09-02 17:23:49', '2020-09-02 20:06:58', 7),
(38, 'Animi', 'Diana Bishop', '2020-09-02 17:24:43', NULL, 7),
(39, 'ABE', 'Mariam Delaney', '2020-09-02 18:52:54', NULL, 7),
(41, 'PERS', 'Quail Dyer', '2020-09-05 21:36:23', NULL, 7),
(42, 'QUIS', 'Ross Lyons', '2020-09-07 18:52:54', NULL, 7);

--
-- Triggers `tbldepartments`
--
DROP TRIGGER IF EXISTS `tblDepartments_AFTER_DELETE`;
DELIMITER $$
CREATE TRIGGER `tblDepartments_AFTER_DELETE` AFTER DELETE ON `tbldepartments` FOR EACH ROW BEGIN
INSERT INTO swiftdb.tblActivityLog
SET 
relUserID = OLD.created_by,
action = CONCAT('Record deleted in Departments for ', OLD.deptCode, ' - ',  OLD.deptName);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `tblDepartments_AFTER_INSERT`;
DELIMITER $$
CREATE TRIGGER `tblDepartments_AFTER_INSERT` AFTER INSERT ON `tbldepartments` FOR EACH ROW BEGIN
INSERT INTO swiftdb.tblActivityLog
SET 
relUserID = NEW.created_by,
action = CONCAT('New record created in Departments for ', NEW.deptName, ' - Department Code ', NEW.deptCode);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `tblDepartments_AFTER_UPDATE`;
DELIMITER $$
CREATE TRIGGER `tblDepartments_AFTER_UPDATE` AFTER UPDATE ON `tbldepartments` FOR EACH ROW BEGIN

IF OLD.deptCode <> new.deptCode THEN
	INSERT INTO swiftdb.tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('Department code updated from ', OLD.deptCode, ' to ', NEW.deptCode, ' for ',  OLD.deptName));
END IF;

IF OLD.deptName <> new.deptName THEN
	INSERT INTO swiftdb.tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('Department name updated from ', OLD.deptName, ' to ', NEW.deptName));
END IF;


END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblemails`
--

DROP TABLE IF EXISTS `tblemails`;
CREATE TABLE IF NOT EXISTS `tblemails` (
  `emailID` int(11) NOT NULL AUTO_INCREMENT,
  `relEmpID` varchar(6) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`emailID`),
  KEY `employee_id` (`relEmpID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemails`
--

INSERT INTO `tblemails` (`emailID`, `relEmpID`, `emailAddress`, `created_at`) VALUES
(5, '616', 'test@email.com', '2020-09-06 17:56:19'),
(6, '616', 'test@email.com', '2020-09-06 17:56:33'),
(7, '735', 'xilyzibu@mailinator.com', '2020-09-06 18:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `tblempaddress`
--

DROP TABLE IF EXISTS `tblempaddress`;
CREATE TABLE IF NOT EXISTS `tblempaddress` (
  `id` int(11) NOT NULL,
  `relEMPID` char(6) NOT NULL,
  `relAddressID` int(11) DEFAULT NULL,
  `relParishID` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblempdepartment`
--

DROP TABLE IF EXISTS `tblempdepartment`;
CREATE TABLE IF NOT EXISTS `tblempdepartment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relEmpID` char(6) NOT NULL,
  `relDeptID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `relDeptID` (`relDeptID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

DROP TABLE IF EXISTS `tblemployees`;
CREATE TABLE IF NOT EXISTS `tblemployees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empID` varchar(6) NOT NULL,
  `title` varchar(5) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `suffix` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `trn` char(12) DEFAULT NULL,
  `nis` char(12) DEFAULT NULL,
  `relGender` varchar(10) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`empID`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `empID_UNIQUE` (`empID`),
  UNIQUE KEY `trn_UNIQUE` (`trn`),
  UNIQUE KEY `nis_UNIQUE` (`nis`),
  KEY `relGender_idx` (`relGender`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `empID`, `title`, `first_name`, `middle_name`, `last_name`, `suffix`, `dob`, `trn`, `nis`, `relGender`, `photo`, `created_date`, `modified_at`) VALUES
(1, '616', NULL, 'Hannah', NULL, 'Ellison', NULL, NULL, NULL, NULL, 'on', NULL, '2020-09-06 16:55:15', '2020-09-06 16:55:15'),
(2, '310', NULL, 'Jeanette', NULL, 'Weaver', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-06 16:58:16', '2020-09-06 16:58:16'),
(3, '434', NULL, 'Lilah', NULL, 'Hays', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-06 17:14:42', '2020-09-06 17:14:42'),
(5, '134', NULL, 'Dacey', NULL, 'Ellison', NULL, NULL, NULL, NULL, 'Male', NULL, '2020-09-06 17:33:43', '2020-09-06 17:33:43'),
(7, '624', NULL, 'Dalton', NULL, 'Ramos', NULL, NULL, NULL, NULL, 'Male', NULL, '2020-09-06 17:35:50', '2020-09-06 17:35:50'),
(9, '336', NULL, 'Denton', NULL, 'Hyde', NULL, NULL, NULL, NULL, 'Male', NULL, '2020-09-06 17:58:41', '2020-09-06 17:58:41'),
(11, '42', NULL, 'Wendy', NULL, 'Sims', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-06 18:04:25', '2020-09-06 18:04:25'),
(13, '792', NULL, 'Peter', NULL, 'Prince', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-06 18:04:46', '2020-09-06 18:04:46'),
(15, '264', NULL, 'Darius', NULL, 'Mcgowan', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-06 18:05:41', '2020-09-06 18:05:41'),
(17, '735', NULL, 'Oscar', NULL, 'Sykes', NULL, NULL, NULL, NULL, 'Male', NULL, '2020-09-06 18:06:12', '2020-09-06 18:06:12'),
(24, 'Duis', NULL, 'Lareina', NULL, 'Horn', NULL, NULL, NULL, NULL, 'Male', NULL, '2020-09-07 19:00:30', '2020-09-07 19:00:30'),
(25, 'Ipsu', NULL, 'Michelle', NULL, 'Thomas', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-07 19:15:31', '2020-09-07 19:15:31'),
(26, 'Ipsu6', NULL, 'Michelle', NULL, 'Thomas', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-07 19:16:08', '2020-09-07 19:16:08'),
(27, 'Ipsu66', NULL, 'Michelle', NULL, 'Thomas', NULL, NULL, NULL, NULL, 'Female', NULL, '2020-09-07 19:17:56', '2020-09-07 19:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblgenders`
--

DROP TABLE IF EXISTS `tblgenders`;
CREATE TABLE IF NOT EXISTS `tblgenders` (
  `gender` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblgenders`
--

INSERT INTO `tblgenders` (`gender`) VALUES
('Male'),
('Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbluserlogs`
--

DROP TABLE IF EXISTS `tbluserlogs`;
CREATE TABLE IF NOT EXISTS `tbluserlogs` (
  `idLogs` int(11) NOT NULL AUTO_INCREMENT,
  `relUserID` int(11) NOT NULL,
  `userSession` varchar(255) DEFAULT NULL,
  `timeLog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actionPerformed` varchar(45) DEFAULT NULL,
  `userAgent` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idLogs`),
  KEY `relUserID_idx` (`relUserID`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=utf8;

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
(252, 7, NULL, '2020-09-07 12:56:28', 'User Login', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token_auth`
--

DROP TABLE IF EXISTS `tbl_token_auth`;
CREATE TABLE IF NOT EXISTS `tbl_token_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relUsername` varchar(15) NOT NULL,
  `relUserRoleID` int(11) NOT NULL,
  `selector` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expires` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_expired` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL AUTO_INCREMENT,
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
  `resetComplete` varchar(255) DEFAULT 'No',
  PRIMARY KEY (`userID`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  KEY `role_id_fk_idx` (`roleID`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `first_name`, `last_name`, `username`, `password`, `email`, `created_at`, `modified_at`, `deleted_at`, `roleID`, `active`, `resetToken`, `resetComplete`) VALUES
(6, 'Cumo', 'Lima', 'cunoheli', '$2y$12$VVU6oAs0ADNw7JDZ/q10tOfXptXIBNcMxgk1VeIKycmkkBt6NzPea', 'qekytehof@mailinator.net', '2020-07-29 18:14:56', '2020-07-29 13:14:56', NULL, 2, NULL, NULL, 'No'),
(7, 'Amoy', 'Nick', 'admin', '$2y$12$xjW/d8QZA4S7c8Un13Fa3uvF.hGpntFit6IOsFUsQCW9lQykneHC.', 'test@email.com', '2020-07-29 18:20:21', '2020-07-29 13:20:21', NULL, 1, NULL, NULL, 'No'),
(8, 'Test', 'User', 'test', '$2y$12$SRWCaMy2JEg2Giq3EVZHauMc5NTR2Vz1d8sphXBc5FoJEL0xrfX6m', 'tewyposy@mailinator.com', '2020-07-29 18:43:49', '2020-07-29 13:43:49', NULL, 5, NULL, NULL, 'No');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`relUserID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblemails`
--
ALTER TABLE `tblemails`
  ADD CONSTRAINT `employee_id` FOREIGN KEY (`relEmpID`) REFERENCES `tblemployees` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblempdepartment`
--
ALTER TABLE `tblempdepartment`
  ADD CONSTRAINT `relDeptID` FOREIGN KEY (`relDeptID`) REFERENCES `tbldepartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  ADD CONSTRAINT `relUserID` FOREIGN KEY (`relUserID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
