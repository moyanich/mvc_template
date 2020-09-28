-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2020 at 06:45 PM
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
DROP PROCEDURE IF EXISTS `EmployeeDept`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `EmployeeDept` (IN `relEmpID` CHAR(6), IN `relDeptID` INT(11), IN `created_date` TIMESTAMP)  NO SQL
BEGIN
	INSERT INTO tblempdepartment(relEmpID, relDeptID, created_date) 
    VALUES(relEmpID, relDeptID, CURRENT_TIMESTAMP);
END$$

DROP PROCEDURE IF EXISTS `insertEmpLog`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEmpLog` (IN `relUserID` INT(11), IN `action` VARCHAR(255), IN `created_on` TIMESTAMP)  NO SQL
BEGIN
	INSERT INTO tblActivityLog(relEmpID, action, created_date) 
    VALUES(relEmpID, relDeptID, CURRENT_TIMESTAMP);
END$$

DROP PROCEDURE IF EXISTS `retireFemale`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `retireFemale` (IN `years` INT)  NO SQL
BEGIN
UPDATE tblemployees SET 
retirementDate = DATE_ADD(empDOB, INTERVAL years YEAR )
WHERE gender = "Female";
 
END$$

DROP PROCEDURE IF EXISTS `updateMaleRetirement`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `updateMaleRetirement` (IN `years` INT)  NO SQL
BEGIN
UPDATE tblemployees SET 
retirementDate = DATE_ADD(empDOB, INTERVAL years YEAR )
 WHERE gender = "Male";
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
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`idActivity`),
  KEY `UserID` (`relUserID`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

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
(192, 7, 'Record deleted in Departments for QUIS - Ross Lyons34', '2020-09-28 17:08:55');

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
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `deptCode`, `deptName`, `created_date`, `modified_on`, `created_by`) VALUES
(2, 'DEP78', 'Product Management Systems', '2020-07-29 19:01:09', '2020-09-11 13:39:06', 7),
(4, 'PPLACC', 'Accounting Department', '2020-07-29 19:01:09', '2020-09-02 20:15:44', 7),
(5, 'dep3', 'Information Technology', '2020-07-29 19:01:09', '2020-07-31 15:32:13', 7),
(7, 'SUN', 'Bindery', '2020-08-04 14:45:54', '2020-09-02 19:55:56', 7),
(43, 'UTE', 'Noah Santana', '2020-09-11 15:04:12', NULL, 7),
(44, 'LABORE', 'Accounting', '2020-09-17 16:22:14', '2020-09-26 23:23:26', 7);

--
-- Triggers `tbldepartments`
--
DROP TRIGGER IF EXISTS `tblDepartments_AFTER_DELETE`;
DELIMITER $$
CREATE TRIGGER `tblDepartments_AFTER_DELETE` AFTER DELETE ON `tbldepartments` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = OLD.created_by,
action = CONCAT('Record deleted in Departments for ', OLD.deptCode, ' - ',  OLD.deptName);
END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `tblDepartments_AFTER_INSERT`;
DELIMITER $$
CREATE TRIGGER `tblDepartments_AFTER_INSERT` AFTER INSERT ON `tbldepartments` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
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
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('Department code updated from ', OLD.deptCode, ' to ', NEW.deptCode, ' for ',  OLD.deptName));
END IF;

IF OLD.deptName <> new.deptName THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('Department name updated from ', OLD.deptName, ' to ', NEW.deptName));
END IF;


END
$$
DELIMITER ;

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
-- Table structure for table `tblempjobhistory`
--

DROP TABLE IF EXISTS `tblempjobhistory`;
CREATE TABLE IF NOT EXISTS `tblempjobhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job` varchar(55) CHARACTER SET utf8 NOT NULL,
  `relEmpID` int(11) NOT NULL,
  `relDeptID` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `IDkf` (`relEmpID`),
  KEY `tblempjobhistory_ibfk_1` (`relDeptID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblempjobhistory`
--

INSERT INTO `tblempjobhistory` (`id`, `job`, `relEmpID`, `relDeptID`, `created_date`) VALUES
(1, 'Merchant of  Venice', 171, 2, '2020-09-26 23:45:24'),
(4, 'Cruncher', 93, NULL, '2020-09-28 16:30:56'),
(5, 'Technician', 93, 4, '2020-09-28 16:49:34');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

DROP TABLE IF EXISTS `tblemployees`;
CREATE TABLE IF NOT EXISTS `tblemployees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empID` varchar(6) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) NOT NULL,
  `empDOB` date NOT NULL,
  `retirementDate` date NOT NULL,
  `trn` char(9) DEFAULT NULL,
  `nis` char(9) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `hire_date` date NOT NULL,
  `position` varchar(55) DEFAULT NULL,
  `relDeptID` int(11) DEFAULT NULL,
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
  PRIMARY KEY (`id`,`empID`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `empID_UNIQUE` (`empID`),
  UNIQUE KEY `trn_UNIQUE` (`trn`),
  UNIQUE KEY `nis_UNIQUE` (`nis`),
  KEY `relUserFK` (`created_by`),
  KEY `relDeptIDfk` (`relDeptID`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `empID`, `first_name`, `middle_name`, `last_name`, `empDOB`, `retirementDate`, `trn`, `nis`, `gender`, `hire_date`, `position`, `relDeptID`, `address`, `city`, `parish`, `phoneOne`, `mobile`, `internalEmail`, `externalEmail`, `photo`, `created_date`, `modified_at`, `created_by`) VALUES
(93, 'DOEN', 'Ryders', 'Jayme Whitney', 'Chapman', '1949-12-19', '2009-12-19', '567345879', 'BX4532', 'Female', '1981-02-26', 'Technician', 5, '14 Terry Road', 'Spanish Town', 'Clarendon', '', '', '', 'test@email.com', NULL, '2020-09-11 15:06:20', '2020-09-26 22:18:00', 7),
(94, 'EUM', 'Joan', 'Elvis', 'Stafford', '1961-08-26', '2021-08-26', '556932641', 'ctr266', 'Female', '2002-06-12', NULL, NULL, 'Et at corporis ut su', 'Qui eum sit adipisc', 'St. Elizabeth', '2856698223', '20', '', 'nugoxol@mailinator.com', NULL, '2020-09-11 15:11:08', '2020-09-22 13:26:47', 7),
(95, 'DOLORI', 'Virginia', 'Simone Mcmillan', 'Bass', '2000-06-18', '2060-06-18', NULL, NULL, 'Female', '2006-02-13', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:11:57', '2020-09-11 15:11:57', 7),
(96, 'EST', 'Thor', 'Ali Delgado', 'Hicks', '1977-09-06', '2037-09-06', NULL, NULL, 'Female', '1972-09-26', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:19:46', '2020-09-11 15:19:46', 7),
(97, 'QUASI', 'Roanna', 'Alea Cortez', 'Ellis', '2009-12-26', '2074-12-26', NULL, NULL, 'Male', '2015-05-06', NULL, NULL, '', NULL, NULL, '875555555', '8755555554', '', '', NULL, '2020-09-11 15:21:12', '2020-09-11 15:21:12', 7),
(98, 'PROIDE', 'Upton', 'Hyacinth Freeman', 'Ellison', '1983-05-09', '2048-05-09', NULL, NULL, 'Male', '1983-10-27', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:23:17', '2020-09-11 15:23:17', 7),
(99, 'SIMILI', 'Ruth Anne', '', 'Hays', '2002-07-23', '2067-07-23', '896325678', 'SW86256', 'Male', '1996-12-08', NULL, NULL, '', '', '', '555-555-5555', '', '', 'manifest@email.com', NULL, '2020-09-11 15:24:24', '2020-09-26 15:02:15', 7),
(100, 'IPSUM', 'Garth', 'Pascale Dorsey', 'Leblanc', '2006-09-19', '2066-09-19', NULL, NULL, 'Female', '2004-04-28', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:25:05', '2020-09-11 15:25:05', 7),
(101, 'VOLU', 'Barbara', '', 'Kinney', '1979-12-19', '2044-12-19', NULL, NULL, 'Male', '1997-07-28', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 16:39:06', '2020-09-11 16:39:06', 7),
(102, 'QUIA', 'Jame', 'Daphne Small', 'Darcey', '1960-07-01', '2020-07-01', '569368523', 'RT86915', 'Female', '2014-02-15', NULL, NULL, '', '', '', '', '', '', '', NULL, '2020-09-12 13:42:44', '2020-09-26 15:27:56', 7),
(103, 'AMET', 'Roary', 'Gary Poole', 'Mathis', '2020-03-14', '2085-03-14', NULL, NULL, 'Male', '2015-03-07', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:04:07', '2020-09-14 19:04:07', 7),
(104, 'QUI', 'Jessica', '', 'Patel', '2014-04-16', '2079-04-16', NULL, NULL, 'Male', '1998-07-27', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:19:28', '2020-09-14 19:19:28', 7),
(105, 'QUIT', 'Jessie', '', 'Patel', '2014-04-16', '2079-04-16', '899698523', 'XR5333', 'Male', '1998-07-27', NULL, NULL, '', '', '', '', '', '', '', NULL, '2020-09-14 19:19:48', '2020-09-26 15:03:28', 7),
(106, 'EOS', 'Ella', 'Kermit Tyler', 'Morse', '2001-02-19', '2066-02-19', '567555337', 'TY5553', 'Male', '1987-01-05', NULL, NULL, '', '', '', '', '', '', '', NULL, '2020-09-14 19:22:28', '2020-09-26 15:37:47', 7),
(107, 'MOLE', 'Zelda', 'Owen Gillespie', 'Martinez', '1992-12-08', '2052-12-08', NULL, NULL, 'Female', '1995-01-14', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:23:53', '2020-09-14 19:23:53', 7),
(108, 'MOLE5', 'Zelda', '', 'Martinez', '1992-12-08', '2057-12-08', NULL, NULL, 'Male', '1995-01-14', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:24:07', '2020-09-14 19:24:07', 7),
(109, 'VELIT', 'Phoebe', 'Tamekah Benson', 'Rasmussen', '2018-07-18', '2083-07-18', NULL, NULL, 'Male', '1978-08-11', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:24:32', '2020-09-14 19:24:32', 7),
(110, 'QUASI6', 'Brianca', 'Shelly Howard', 'Brewers', '1974-10-01', '2039-10-01', '56734512', 'VT3335', 'Male', '2010-11-05', NULL, NULL, '', '', '', '', '', '', '', NULL, '2020-09-14 19:46:09', '2020-09-26 15:19:21', 7),
(111, 'QUA', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:50:06', '2020-09-14 19:50:06', 7),
(112, 'QUAY', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:50:20', '2020-09-14 19:50:20', 7),
(113, 'QUATY', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:54:17', '2020-09-14 19:54:17', 7),
(114, 'QUAVA', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:54:45', '2020-09-14 19:54:45', 7),
(115, 'RAFA', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:55:18', '2020-09-14 19:55:18', 7),
(116, 'RAFWRW', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', '567555333', 'TR5222', 'Male', '2010-11-05', NULL, NULL, '', '', '', '', '', '', '', NULL, '2020-09-14 19:55:38', '2020-09-26 15:30:05', 7),
(117, 'IURE', 'Dexter', 'Cameron Farmer', 'Frazier', '1986-10-21', '2046-10-21', NULL, NULL, 'Female', '1978-09-25', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:56:01', '2020-09-14 19:56:01', 7),
(118, 'IDU', 'Imogene', 'Aquila Foley', 'Gould', '1979-04-22', '2039-04-22', NULL, NULL, 'Female', '1995-09-11', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:59:26', '2020-09-14 19:59:26', 7),
(119, 'DISTI', 'Josiah', 'Celeste Larson', 'Valenzuela', '1970-11-18', '2035-11-18', NULL, NULL, 'Male', '1986-09-07', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:01:41', '2020-09-14 20:01:41', 7),
(120, 'QUOE', 'Shay', 'Zelenia Malone', 'Frye', '2018-12-28', '2083-12-28', NULL, NULL, 'Male', '1981-12-06', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:04:35', '2020-09-14 20:04:35', 7),
(121, 'SUNTT', 'Rina', 'Kylee Stevenson', 'Clay', '1983-11-10', '2043-11-10', NULL, NULL, 'Female', '1990-03-18', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:06:00', '2020-09-14 20:06:00', 7),
(122, 'ERRO', 'Madaline', 'Aspen Silva', 'Manning', '1976-07-08', '2041-07-08', NULL, NULL, 'Male', '2004-12-01', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:07:42', '2020-09-14 20:07:42', 7),
(151, 'DOLORE', 'Deanna', 'Gail Mercado', 'Griffith', '2015-01-06', '2075-01-06', NULL, NULL, 'Female', '2013-04-11', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:22:45', '2020-09-16 16:22:45', 7),
(156, 'INCID', 'Bell', '', 'David', '1988-11-07', '2053-11-07', NULL, NULL, 'Male', '1974-04-27', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:54:29', '2020-09-16 16:54:29', 7),
(157, 'IDNULL', 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:54:41', '2020-09-16 16:54:41', 7),
(158, 'IDNU', 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:55:59', '2020-09-16 16:55:59', 7),
(159, 'IDNUY', 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:59:13', '2020-09-16 16:59:13', 7),
(160, 'CUMQUE', 'Thaddeus', 'Thane Preston', 'Parker', '1988-04-01', '2048-04-01', NULL, NULL, 'Female', '2020-02-02', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:07:01', '2020-09-16 17:07:01', 7),
(161, 'TOTAM', 'Bell', 'Alea Gray', 'Buck', '1987-07-21', '2047-07-21', NULL, NULL, 'Female', '2013-05-18', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:11:45', '2020-09-16 17:11:45', 7),
(162, 'NEQUE', 'Brooke', 'Channing Flowers', 'Price', '1988-04-18', '2048-04-18', NULL, NULL, 'Female', '2001-05-16', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:13:54', '2020-09-16 17:13:54', 7),
(163, 'NREQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:43:15', '2020-09-16 17:43:15', 7),
(164, 'TEQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:43:49', '2020-09-16 17:43:49', 7),
(165, 'TQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:45:42', '2020-09-16 17:45:42', 7),
(166, 'TTQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:51:18', '2020-09-16 17:51:18', 7),
(167, 'AUTET', 'Kennan', 'Aimee Schneider', 'Sandoval', '1972-01-06', '2037-01-06', '567345987', 'THS2522', 'Male', '1970-07-02', NULL, NULL, '', '', '', '', '', '', '', NULL, '2020-09-16 17:51:31', '2020-09-26 15:53:51', 7),
(168, 'QUIAD', 'Uta', 'Brielle Osborne', 'Montgomery', '1985-10-15', '2050-10-15', NULL, NULL, 'Male', '1990-10-04', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:52:07', '2020-09-16 17:52:07', 7),
(169, 'DOOR', 'Harlan', 'Derek Schroeder', 'Burt', '1976-12-19', '2041-12-19', NULL, NULL, 'Male', '1970-10-11', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:04:31', '2020-09-16 18:04:31', 7),
(170, 'ESTEXE', 'Sylvester', 'Hadley Hansen', 'Fitzpatrick', '1990-08-15', '2050-08-15', '567565333', '56FQ3', 'Female', '2004-05-25', NULL, NULL, 'My adresss', 'Loisville', 'Clarendon', '', '', '', '', NULL, '2020-09-16 18:14:05', '2020-09-26 22:02:10', 7),
(171, 'ESTEX', 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', '56732245', 'FT52353', 'Male', '1985-02-01', NULL, NULL, 'Spray Town', 'Spoonville', 'Kingston', '555-555-5555', '876-555-5559', 'jmurray3@gmail.com', 'teflot@sun.com', NULL, '2020-09-16 18:14:17', '2020-09-27 01:10:51', 7),
(172, 'ESTRE', 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', NULL, NULL, 'Male', '1985-10-20', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:14:38', '2020-09-16 18:14:38', 7),
(173, 'ESTRE4', 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', NULL, NULL, 'Male', '1985-10-20', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:16:27', '2020-09-16 18:16:27', 7),
(174, 'UTALIQ', 'Ainsley', '', 'Durham', '1999-07-18', '2059-07-18', NULL, NULL, 'Female', '1993-04-20', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:16:48', '2020-09-16 18:16:48', 7),
(175, 'NONET', 'Erich', 'Otto Pittman', 'Castro', '2005-05-17', '2065-05-17', NULL, NULL, 'Female', '2020-08-23', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:18:02', '2020-09-16 18:18:02', 7),
(176, 'VOLUPT', 'Aladdin', 'Christen Sims', 'Holden', '1972-09-14', '2032-09-14', NULL, NULL, 'Female', '1996-06-04', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:20:12', '2020-09-16 18:20:12', 7),
(177, 'ULLAMC', 'Cara', 'Angela Hopper', 'Tate', '2000-09-10', '2060-09-10', NULL, NULL, 'Female', '2008-06-12', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:20:47', '2020-09-16 18:20:47', 7),
(178, 'TEMPO', 'Jack', 'Rhiannon Hess', 'Kaufman', '2019-09-18', '2079-09-18', NULL, NULL, 'Female', '2006-01-19', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:21:12', '2020-09-16 18:21:12', 7),
(179, 'RECUSA', 'Quail', '', 'Jackson', '1977-06-17', '2042-06-17', NULL, NULL, 'Male', '2017-01-08', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:21:23', '2020-09-16 18:21:23', 7),
(180, 'VELUME', 'Kay', 'Jared Mendoza', 'Sutton', '1996-09-21', '2061-09-21', NULL, NULL, 'Male', '1984-01-12', NULL, NULL, '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:22:20', '2020-09-16 18:22:20', 7),
(187, 'RERU', 'Halee', 'Evan Reilly', 'Le', '1997-03-09', '2062-03-09', NULL, NULL, 'Male', '1981-11-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 19:39:50', '2020-09-17 19:39:50', 7),
(188, 'NOBIS', 'Mason', 'Harriet Patrick', 'Good', '1991-10-26', '2056-10-26', NULL, NULL, 'Male', '2011-09-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-19 15:38:39', '2020-09-19 15:38:39', 7),
(189, 'PERFE', 'Shoshana', 'Evan Hayes', 'Williamson', '1977-05-06', '2037-05-06', NULL, NULL, 'Female', '1978-10-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-19 15:39:13', '2020-09-19 15:39:13', 7),
(190, 'BEATA', 'Evangeline', 'Holmes Nash', 'Patterson', '1997-01-03', '2057-01-03', '636363362', 'XY46363', 'Female', '2020-09-22', NULL, NULL, '', '', '', '', '', NULL, '', NULL, '2020-09-22 21:00:13', '2020-09-25 17:52:22', 7),
(191, 'IPSAM', 'Adele', 'Miriam Blackburn', 'Dillon', '2020-09-25', '2085-09-25', NULL, NULL, 'Male', '2020-09-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-25 16:15:13', '2020-09-25 16:15:14', 7),
(192, 'ETDOL', 'Isadora', 'Wing Moss', 'Ruiz', '1987-01-08', '2047-01-08', '125398212', 'XCVDGTG', 'Female', '2020-09-25', NULL, NULL, '', '', '', '', '', NULL, '', NULL, '2020-09-25 19:28:22', '2020-09-25 19:29:02', 7);

--
-- Triggers `tblemployees`
--
DROP TRIGGER IF EXISTS `insertNewEmployee`;
DELIMITER $$
CREATE TRIGGER `insertNewEmployee` AFTER INSERT ON `tblemployees` FOR EACH ROW BEGIN
INSERT INTO tblactivitylog
SET 
relUserID = NEW.created_by,
action = CONCAT('New Employee record for: <br/> Employee ID: ', NEW.empID, ' <br/> Name: <a href="../employees/edit/', NEW.id ,'"> ', NEW.first_name, ' ', NEW.middle_name, ' ', NEW.last_name, '</a><br/> Gender: ', NEW.gender, ' <br/> DOB: ', NEW.empDOB, '<br/> Hire Date: ', NEW.hire_date );

END
$$
DELIMITER ;
DROP TRIGGER IF EXISTS `tblemployees_AFTER_UPDATE`;
DELIMITER $$
CREATE TRIGGER `tblemployees_AFTER_UPDATE` BEFORE UPDATE ON `tblemployees` FOR EACH ROW BEGIN
IF OLD.first_name <> new.first_name THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Updated <br/> New First Name: ', NEW.first_name));
END IF;

IF OLD.last_name <> new.last_name THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a> Updated <br/> New Last Name: ', NEW.last_name ));
END IF;

IF OLD.gender <> new.gender THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Gender changed from ', OLD.gender, ' to ', NEW.gender));
END IF;

IF OLD.empDOB <> new.empDOB THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> DOB Updated ', OLD.empDOB, ' to ', NEW.empDOB));
END IF;
	 
IF OLD.trn <> new.trn THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> TRN Updated: ', NEW.trn));
    
   ELSEIF OLD.trn IS NULL THEN
    INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> TRN added: ', NEW.trn));
END IF;

IF OLD.nis <> new.nis THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> NIS Updated: ', NEW.nis));
    
    ELSEIF OLD.nis IS NULL THEN
    INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> NIS added: ', NEW.nis));
END IF;


IF OLD.address <> new.address || OLD.address IS NULL THEN
	INSERT INTO tblActivityLog (relUserID, action)
	VALUES(OLD.created_by,
	CONCAT('<a href="../employees/profile/', NEW.id ,'">' , OLD.first_name, ' ', OLD.last_name, '</a><br/> Address Updated: ', NEW.address));
    
   
END IF;



END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblgender`
--

DROP TABLE IF EXISTS `tblgender`;
CREATE TABLE IF NOT EXISTS `tblgender` (
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tblgender`
--

INSERT INTO `tblgender` (`gender`) VALUES
('Male'),
('Female');

-- --------------------------------------------------------

--
-- Table structure for table `tbljobs`
--

DROP TABLE IF EXISTS `tbljobs`;
CREATE TABLE IF NOT EXISTS `tbljobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `relDeptID` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbljobs`
--

INSERT INTO `tbljobs` (`id`, `job`, `relDeptID`, `created_date`, `modified_date`) VALUES
(1, 'Accountant', 1, '2020-09-28 18:41:55', '2020-09-28 18:41:55'),
(2, 'Binder', 2, '2020-09-28 18:41:55', '2020-09-28 18:41:55');

-- --------------------------------------------------------

--
-- Table structure for table `tbloptions`
--

DROP TABLE IF EXISTS `tbloptions`;
CREATE TABLE IF NOT EXISTS `tbloptions` (
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
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
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

DROP TABLE IF EXISTS `tblparish`;
CREATE TABLE IF NOT EXISTS `tblparish` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parishName` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `parishName_UNIQUE` (`parishName`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `tblretirement`;
CREATE TABLE IF NOT EXISTS `tblretirement` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `years` int(11) NOT NULL,
  `gender` enum('Male','Female') CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8;

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
(283, 7, NULL, '2020-09-28 14:16:31', 'User Login', NULL);

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
-- Constraints for table `tblempjobhistory`
--
ALTER TABLE `tblempjobhistory`
  ADD CONSTRAINT `IDkf` FOREIGN KEY (`relEmpID`) REFERENCES `tblemployees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblempjobhistory_ibfk_1` FOREIGN KEY (`relDeptID`) REFERENCES `tbldepartments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD CONSTRAINT `relDeptIDfk` FOREIGN KEY (`relDeptID`) REFERENCES `tbldepartments` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `relUserFK` FOREIGN KEY (`created_by`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  ADD CONSTRAINT `relUserID` FOREIGN KEY (`relUserID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
