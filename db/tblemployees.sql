-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2020 at 07:06 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `empmanagedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

DROP TABLE IF EXISTS `tblemployees`;
CREATE TABLE IF NOT EXISTS `tblemployees` (
  `idEmployee` int(11) NOT NULL AUTO_INCREMENT,
  `emp_no` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_date` date NOT NULL,
  `gender` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `nis` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trn` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deptno` int(11) DEFAULT NULL,
  `phone` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_address` varchar(55) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idParishes_fk` int(5) DEFAULT NULL,
  `other_address_details` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idDepartment_fk` int(11) DEFAULT NULL,
  `supervisor_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manager_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idEmployee`,`emp_no`),
  UNIQUE KEY `idEmployee_UNIQUE` (`idEmployee`),
  UNIQUE KEY `nis_UNIQUE` (`nis`),
  UNIQUE KEY `trn_UNIQUE` (`trn`),
  UNIQUE KEY `emp_no_UNIQUE` (`emp_no`),
  KEY `idParishes_fk_idx` (`idParishes_fk`),
  KEY `supervisor_id` (`supervisor_id`),
  KEY `manager_id` (`manager_id`),
  KEY `idept` (`deptno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD CONSTRAINT `idept` FOREIGN KEY (`deptno`) REFERENCES `tbldepartments` (`iddept`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `manager_id` FOREIGN KEY (`manager_id`) REFERENCES `tblemployees` (`emp_no`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `parish_fk` FOREIGN KEY (`idParishes_fk`) REFERENCES `tblparishes` (`idParishes`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `supervisor_id` FOREIGN KEY (`supervisor_id`) REFERENCES `tblemployees` (`emp_no`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
