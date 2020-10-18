-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 16, 2020 at 06:39 PM
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
CREATE DEFINER=`root`@`localhost` PROCEDURE `EmployeeDept` (IN `relEmpID` CHAR(6), IN `relDeptID` INT(11), IN `created_date` TIMESTAMP)  NO SQL
BEGIN
	INSERT INTO tblempdepartment(relEmpID, relDeptID, created_date) 
    VALUES(relEmpID, relDeptID, CURRENT_TIMESTAMP);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEmail` (IN `relEmpID` VARCHAR(6), IN `emailAddress` VARCHAR(50), IN `created_at` TIMESTAMP)  BEGIN
	INSERT INTO tblemails(relEmpID, emailAddress, created_at) 
    VALUES(relEmpID, emailAddress, CURRENT_TIMESTAMP);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `insertEmpLog` (IN `relUserID` INT(11), IN `action` VARCHAR(255), IN `created_on` TIMESTAMP)  NO SQL
BEGIN
	INSERT INTO tblActivityLog(relEmpID, action, created_date) 
    VALUES(relEmpID, relDeptID, CURRENT_TIMESTAMP);
END$$

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
(141, 7, 'New Employee record for: <br/> Employee ID: VELUME <br/> Name: <a href=\"../employees/edit/180\"> Kay Jared Mendoza Sutton</a><br/> Gender: Male <br/> DOB: 1996-09-21<br/> Hire Date: 1984-01-12', '2020-09-16 18:22:20');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(11) NOT NULL,
  `deptCode` char(6) NOT NULL,
  `deptName` varchar(45) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_on` timestamp NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `deptCode`, `deptName`, `created_date`, `modified_on`, `created_by`) VALUES
(2, 'DEP78', 'Product Management Systems', '2020-07-29 19:01:09', '2020-09-11 13:39:06', 7),
(4, 'PPLACC', 'Accounting Department', '2020-07-29 19:01:09', '2020-09-02 20:15:44', 7),
(5, 'dep3', 'Information Technology', '2020-07-29 19:01:09', '2020-07-31 15:32:13', 7),
(7, 'SUN', 'Bindery', '2020-08-04 14:45:54', '2020-09-02 19:55:56', 7),
(39, 'ABE', 'Mariam Delaney', '2020-09-02 18:52:54', NULL, 7),
(41, 'PERS', 'Quail Dyer', '2020-09-05 21:36:23', NULL, 7),
(42, 'QUIS', 'Ross Lyons34', '2020-09-07 18:52:54', '2020-09-11 15:05:03', 7),
(43, 'UTE', 'Noah Santana', '2020-09-11 15:04:12', NULL, 7);

--
-- Triggers `tbldepartments`
--
DELIMITER $$
CREATE TRIGGER `tblDepartments_AFTER_DELETE` AFTER DELETE ON `tbldepartments` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = OLD.created_by,
action = CONCAT('Record deleted in Departments for ', OLD.deptCode, ' - ',  OLD.deptName);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tblDepartments_AFTER_INSERT` AFTER INSERT ON `tbldepartments` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = NEW.created_by,
action = CONCAT('New record created in Departments for ', NEW.deptName, ' - Department Code ', NEW.deptCode);
END
$$
DELIMITER ;
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
-- Table structure for table `tblemails`
--

CREATE TABLE `tblemails` (
  `emailID` int(11) NOT NULL,
  `relEmpID` varchar(6) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemails`
--

INSERT INTO `tblemails` (`emailID`, `relEmpID`, `emailAddress`, `created_at`) VALUES
(5, '616', 'test@email.com', '2020-09-06 17:56:19'),
(6, '616', 'test@email.com', '2020-09-06 17:56:33'),
(7, '735', 'xilyzibu@mailinator.com', '2020-09-06 18:06:12'),
(8, 'Iste', NULL, '2020-09-08 16:17:57'),
(9, 'Atin', 'haluwoxa@mailinator.net', '2020-09-08 16:19:33'),
(10, 'Etatq', '', '2020-09-08 18:10:47'),
(11, 'QUODE', 'jutuxaz@mailinator.net', '2020-09-08 18:31:46'),
(12, 'VITAE', 'qaqyw@mailinator.com', '2020-09-08 18:35:21'),
(13, 'DOLOR', 'cuzyzuliw@mailinator', '2020-09-08 18:42:15'),
(14, 'INWWEE', 'kazisexyx@mailinator.net', '2020-09-08 19:05:17'),
(15, 'PERSPI', 'xopicora@mailinator.net', '2020-09-08 19:28:33'),
(16, 'AMETS', 'gyvojy@mailinator.com', '2020-09-08 19:40:27'),
(17, 'AUTEM', 'xujenuteci@mailinator.net', '2020-09-08 19:41:57'),
(18, 'RERUM', 'weqamapyqi@mailinator.net', '2020-09-08 19:44:57'),
(19, 'EVENIE', 'fanozedige@mailinator.com', '2020-09-08 19:46:17'),
(20, 'EVENIS', 'fanozedige@mailinator.com', '2020-09-08 19:47:17'),
(21, 'EVESIS', 'fanozedige@mailinator.com', '2020-09-08 19:49:52'),
(22, 'AAAAA', 'gavukani@mailinator.net', '2020-09-08 19:54:13'),
(23, 'QUIIN', 'maxileri@mailinator.net', '2020-09-08 19:58:49'),
(24, 'TOTAM', 'hobu@mailinator.com', '2020-09-08 19:59:30'),
(25, 'CONSEQ', 'vosuxiwyv@mailinator.com', '2020-09-08 20:00:12'),
(26, 'ULLAM', 'lavypof@mailinator.com', '2020-09-08 20:05:27'),
(27, 'ET', 'vymadyvi@mailinator.net', '2020-09-08 20:36:13'),
(28, 'ELIGEN', 'rowanip@mailinator.net', '2020-09-10 14:56:24'),
(29, 'ETCOM', 'pidapecidi@mailinator.com', '2020-09-10 15:07:15'),
(30, 'AUT', 'rysasymy@mailinator.com', '2020-09-10 15:08:29'),
(31, 'LABORE', 'lafijo@mailinator.com', '2020-09-10 15:09:32'),
(32, 'MAXIME', 'pofel@mailinator.net', '2020-09-10 15:09:56'),
(33, 'CONSER', 'romi@mailinator.net', '2020-09-10 15:11:03'),
(34, 'QUOD', 'jinami@mailinator.net', '2020-09-10 15:12:09'),
(35, 'ADIPI', 'docexox@mailinator.net', '2020-09-10 15:12:33'),
(36, 'QUAM4', 'runa@mailinator.net', '2020-09-10 15:29:33'),
(37, 'REPRE', 'fycysojica@mailinator.net', '2020-09-10 15:33:14'),
(38, 'REPREE', 'fycysojica@mailinator.net', '2020-09-10 15:33:52'),
(39, 'REP23', 'fycysojica@mailinator.net', '2020-09-10 15:36:19'),
(40, 'ODITM', 'pyqikeve@mailinator.net', '2020-09-10 15:36:34'),
(41, 'QUODE', '', '2020-09-10 15:51:21'),
(42, 'QUIS', 'bidaf@mailinator.com', '2020-09-10 17:00:49'),
(43, 'AUT', 'hafohis@mailinator.com', '2020-09-10 17:08:57'),
(44, 'QUISQ', 'mozaxixuny@mailinator.com', '2020-09-10 17:10:36'),
(45, 'DOLO', 'vuwikawija@mailinator.net', '2020-09-10 17:12:41'),
(46, 'MAGNA', 'qipyqozo@mailinator.com', '2020-09-10 17:19:39'),
(47, 'UTVIT', 'zobod@mailinator.net', '2020-09-10 18:36:01'),
(48, 'PERSPI', 'qere@mailinator.com', '2020-09-10 18:54:54'),
(49, 'QUOE', 'guhexuq@mailinator.com', '2020-09-10 19:52:08'),
(50, 'VOLU', 'lisige@mailinator.com', '2020-09-10 19:52:48'),
(51, 'SIT', 'caqij@mailinator.net', '2020-09-10 19:53:43'),
(52, 'EALO', 'cagudoj@mailinator.net', '2020-09-10 20:01:09'),
(53, 'CUPID', 'zubede@mailinator.com', '2020-09-10 20:02:33'),
(54, 'SILL', 'gomur@mailinator.net', '2020-09-10 20:32:45'),
(55, 'SILLR', 'gomur@mailinator.net', '2020-09-10 20:33:26'),
(56, 'SILLXX', 'gomur@mailinator.net', '2020-09-10 20:34:32'),
(57, 'UTSIT', 'byjex@mailinator.net', '2020-09-10 20:36:15'),
(58, 'QUIS6', 'vuxyma@mailinator.net', '2020-09-10 20:41:45'),
(59, 'AUTMI', 'qyre@mailinator.com', '2020-09-11 12:12:23'),
(60, 'AUTMT', 'qyre@mailinator.com', '2020-09-11 12:13:11'),
(61, 'MOLLIT', 'tirozihuda@mailinator.com', '2020-09-11 13:07:27'),
(62, 'MOLLI', 'tirozihuda@mailinator.com', '2020-09-11 13:08:15'),
(63, 'MOLL', 'tirozihuda@mailinator.com', '2020-09-11 13:10:35'),
(64, 'ESSE', 'mamu@mailinator.com', '2020-09-11 13:19:17'),
(65, 'DOEN', 'zona@mailinator.com', '2020-09-11 15:06:21'),
(66, 'EUM', 'tazusaj@mailinator.com', '2020-09-11 15:11:08'),
(67, 'DOLORI', 'wizitasyj@mailinator.com', '2020-09-11 15:11:57'),
(68, 'EST', 'lixuzak@mailinator.com', '2020-09-11 15:19:47'),
(69, 'QUASI', 'myqomaj@mailinator.com', '2020-09-11 15:21:12'),
(70, 'PROIDE', 'gutapywu@mailinator.com', '2020-09-11 15:23:17'),
(71, 'SIMILI', 'gawihoj@mailinator.com', '2020-09-11 15:24:24'),
(72, 'IPSUM', 'jekifuzo@mailinator.com', '2020-09-11 15:25:05'),
(73, 'VOLU', 'vujypysyd@mailinator.com', '2020-09-11 16:39:07'),
(74, 'QUIA', 'bymuvylos@mailinator.com', '2020-09-12 13:42:45'),
(75, 'AMET', 'cozatizip@mailinator.com', '2020-09-14 19:04:07'),
(76, 'QUI', 'hifedyc@mailinator.com', '2020-09-14 19:19:29'),
(77, 'QUIT', 'hifedyc@mailinator.com', '2020-09-14 19:19:48'),
(78, 'EOS', 'curive@mailinator.com', '2020-09-14 19:22:28'),
(79, 'MOLE', 'tejusu@mailinator.com', '2020-09-14 19:23:53'),
(80, 'MOLE5', 'tejusu@mailinator.com', '2020-09-14 19:24:07'),
(81, 'VELIT', 'jity@mailinator.com', '2020-09-14 19:24:32'),
(82, 'QUASI6', 'miqo@mailinator.com', '2020-09-14 19:46:09'),
(83, 'QUA', 'miqo@mailinator.com', '2020-09-14 19:50:06'),
(84, 'QUAY', 'miqo@mailinator.com', '2020-09-14 19:50:20'),
(85, 'QUATY', 'miqo@mailinator.com', '2020-09-14 19:54:17'),
(86, 'QUAVA', 'miqo@mailinator.com', '2020-09-14 19:54:45'),
(87, 'RAFA', 'miqo@mailinator.com', '2020-09-14 19:55:18'),
(88, 'RAFWRW', 'miqo@mailinator.com', '2020-09-14 19:55:38'),
(89, 'IURE', 'fybi@mailinator.com', '2020-09-14 19:56:01'),
(90, 'IDU', 'hofykybe@mailinator.com', '2020-09-14 19:59:26'),
(91, 'DISTI', 'lynixyqux@mailinator.com', '2020-09-14 20:01:41'),
(92, 'QUOE', 'kolegu@mailinator.com', '2020-09-14 20:04:35'),
(93, 'SUNTT', 'koqoz@mailinator.com', '2020-09-14 20:06:00'),
(94, 'ERRO', 'jaqowuz@mailinator.com', '2020-09-14 20:07:42'),
(95, 'LABORU', 'zokoto@mailinator.com', '2020-09-14 20:10:00'),
(96, 'VENIA', 'sacid@mailinator.com', '2020-09-14 20:11:07'),
(97, 'MINIM', 'wedavol@mailinator.com', '2020-09-14 20:42:39'),
(98, 'ESSTY', 'decipu@mailinator.com', '2020-09-14 20:43:06'),
(99, 'ESSTU', 'decipu@mailinator.com', '2020-09-14 20:45:01'),
(100, 'ESSTI', 'decipu@mailinator.com', '2020-09-14 20:45:35'),
(101, 'ESS', 'decipu@mailinator.com', '2020-09-14 20:48:13'),
(102, 'ESSOP', 'decipu@mailinator.com', '2020-09-14 20:48:52'),
(103, 'OPP', 'decipu@mailinator.com', '2020-09-14 20:49:42'),
(104, 'OPPIO', 'decipu@mailinator.com', '2020-09-14 20:50:05'),
(105, 'MAGNI', 'hiwuvivi@mailinator.com', '2020-09-14 20:50:43'),
(106, 'ODIT', 'tevotufep@mailinator.com', '2020-09-14 20:52:43'),
(107, 'PROID', 'hebehury@mailinator.com', '2020-09-14 20:53:29'),
(108, 'ULLAM', 'qygexygese@mailinator.com', '2020-09-14 20:53:59'),
(109, 'VERO', 'sygy@mailinator.com', '2020-09-15 20:14:00'),
(110, 'SEDMAG', 'coqavot@mailinator.com', '2020-09-15 20:23:09'),
(111, 'MOLEST', 'firazenoj@mailinator.com', '2020-09-15 20:28:46'),
(112, 'MOLE8', 'firazenoj@mailinator.com', '2020-09-15 20:29:30'),
(113, 'MOLEY', 'firazenoj@mailinator.com', '2020-09-15 20:29:46'),
(114, 'CORRUP', 'kyryny@mailinator.com', '2020-09-16 15:33:55'),
(115, 'RP', 'kyryny@mailinator.com', '2020-09-16 15:39:08'),
(116, 'RPRT', 'kyryny@mailinator.com', '2020-09-16 15:41:28'),
(117, 'SUSCIP', 'wyceqydeje@mailinator.net', '2020-09-16 15:41:47'),
(118, 'OFFICI', 'xyqopiz@mailinator.com', '2020-09-16 15:44:37'),
(119, 'COMM', 'jicucer@mailinator.net', '2020-09-16 16:01:33'),
(120, 'ABMOLE', 'murydesar@mailinator.net', '2020-09-16 16:02:06'),
(121, 'RERUM', 'rygapyqib@mailinator.com', '2020-09-16 16:02:32'),
(122, 'AUTALI', 'lakyc@mailinator.net', '2020-09-16 16:04:10'),
(123, 'DOLORE', 'wucelilyf@mailinator.com', '2020-09-16 16:22:45'),
(124, 'IDNUY', 'tymu@mailinator.com', '2020-09-16 16:59:13'),
(125, 'CUMQUE', 'vumapu@mailinator.net', '2020-09-16 17:07:01'),
(126, 'TOTAM', 'zyjab@mailinator.com', '2020-09-16 17:11:45'),
(127, 'DOOR', 'gevobaha@mailinator.com', '2020-09-16 18:04:31'),
(128, 'ESTEXE', 'junodaj@mailinator.net', '2020-09-16 18:14:05'),
(129, 'ESTEX', 'junodaj@mailinator.net', '2020-09-16 18:14:17'),
(130, 'ESTRE', 'junodaj@mailinator.net', '2020-09-16 18:14:38'),
(131, 'ESTRE4', 'junodaj@mailinator.net', '2020-09-16 18:16:27'),
(132, 'UTALIQ', 'xabaxary@mailinator.com', '2020-09-16 18:16:48'),
(133, 'NONET', 'cypazoge@mailinator.com', '2020-09-16 18:18:02'),
(134, 'VOLUPT', 'sategomesi@mailinator.net', '2020-09-16 18:20:12'),
(135, 'ULLAMC', 'kiwydiga@mailinator.net', '2020-09-16 18:20:47'),
(136, 'TEMPO', 'webufi@mailinator.com', '2020-09-16 18:21:12'),
(137, 'RECUSA', 'qecaxof@mailinator.com', '2020-09-16 18:21:23'),
(138, 'VELUME', 'xumis@mailinator.net', '2020-09-16 18:22:20');

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
-- Table structure for table `tblempdepartment`
--

CREATE TABLE `tblempdepartment` (
  `id` int(11) NOT NULL,
  `relEmpID` varchar(6) NOT NULL,
  `relDeptID` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tblemployees`
--

CREATE TABLE `tblemployees` (
  `id` int(11) NOT NULL,
  `empID` varchar(6) NOT NULL,
  `empTitle` varchar(5) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `middle_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `suffix` varchar(15) DEFAULT NULL,
  `empDOB` date NOT NULL,
  `retirementDate` date DEFAULT NULL,
  `trn` char(12) DEFAULT NULL,
  `nis` char(12) DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `hire_date` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `empID`, `empTitle`, `first_name`, `middle_name`, `last_name`, `suffix`, `empDOB`, `retirementDate`, `trn`, `nis`, `gender`, `hire_date`, `photo`, `created_date`, `modified_at`, `created_by`) VALUES
(93, 'DOEN', 'Mr.', 'Ryder', 'Jayme Whitney', 'Chapman', NULL, '1949-12-19', '2009-12-19', NULL, NULL, 'Female', '1981-02-26', NULL, '2020-09-11 15:06:20', '2020-09-11 15:06:20', 7),
(94, 'EUM', 'Miss', 'Felicia', 'Adam Pickett', 'Leon', NULL, '1961-08-26', '2021-08-26', NULL, NULL, 'Female', '2002-06-12', NULL, '2020-09-11 15:11:08', '2020-09-11 15:11:08', 7),
(95, 'DOLORI', 'Mr.', 'Virginia', 'Simone Mcmillan', 'Bass', NULL, '2000-06-18', '2060-06-18', NULL, NULL, 'Female', '2006-02-13', NULL, '2020-09-11 15:11:57', '2020-09-11 15:11:57', 7),
(96, 'EST', 'Mrs.', 'Thor', 'Ali Delgado', 'Hicks', NULL, '1977-09-06', '2037-09-06', NULL, NULL, 'Female', '1972-09-26', NULL, '2020-09-11 15:19:46', '2020-09-11 15:19:46', 7),
(97, 'QUASI', 'Miss', 'Roanna', 'Alea Cortez', 'Ellis', NULL, '2009-12-26', '2074-12-26', NULL, NULL, 'Male', '2015-05-06', NULL, '2020-09-11 15:21:12', '2020-09-11 15:21:12', 7),
(98, 'PROIDE', 'Ms.', 'Upton', 'Hyacinth Freeman', 'Ellison', NULL, '1983-05-09', '2048-05-09', NULL, NULL, 'Male', '1983-10-27', NULL, '2020-09-11 15:23:17', '2020-09-11 15:23:17', 7),
(99, 'SIMILI', 'Mr.', 'Ruth', '', 'Hays', NULL, '2002-07-23', '2067-07-23', NULL, NULL, 'Male', '1996-12-08', NULL, '2020-09-11 15:24:24', '2020-09-11 15:24:24', 7),
(100, 'IPSUM', 'Mr.', 'Garth', 'Pascale Dorsey', 'Leblanc', NULL, '2006-09-19', '2066-09-19', NULL, NULL, 'Female', '2004-04-28', NULL, '2020-09-11 15:25:05', '2020-09-11 15:25:05', 7),
(101, 'VOLU', 'Mr.', 'Barbara', '', 'Kinney', NULL, '1979-12-19', '2044-12-19', NULL, NULL, 'Male', '1997-07-28', NULL, '2020-09-11 16:39:06', '2020-09-11 16:39:06', 7),
(102, 'QUIA', 'Ms.', 'James', 'Daphne Small', 'Lindsay', NULL, '1979-07-27', '2039-07-27', NULL, NULL, 'Female', '2014-02-15', NULL, '2020-09-12 13:42:44', '2020-09-12 13:42:44', 7),
(103, 'AMET', 'Ms.', 'Roary', 'Gary Poole', 'Mathis', NULL, '2020-03-14', '2085-03-14', NULL, NULL, 'Male', '2015-03-07', NULL, '2020-09-14 19:04:07', '2020-09-14 19:04:07', 7),
(104, 'QUI', 'Mr.', 'Jessica', '', 'Patel', NULL, '2014-04-16', '2079-04-16', NULL, NULL, 'Male', '1998-07-27', NULL, '2020-09-14 19:19:28', '2020-09-14 19:19:28', 7),
(105, 'QUIT', 'Mr.', 'Jessica', '', 'Patel', NULL, '2014-04-16', '2079-04-16', NULL, NULL, 'Male', '1998-07-27', NULL, '2020-09-14 19:19:48', '2020-09-14 19:19:48', 7),
(106, 'EOS', 'Ms.', 'Ella', 'Kermit Tyler', 'Morse', NULL, '2001-02-19', '2066-02-19', NULL, NULL, 'Male', '1987-01-05', NULL, '2020-09-14 19:22:28', '2020-09-14 19:22:28', 7),
(107, 'MOLE', 'Ms.', 'Zelda', 'Owen Gillespie', 'Martinez', NULL, '1992-12-08', '2052-12-08', NULL, NULL, 'Female', '1995-01-14', NULL, '2020-09-14 19:23:53', '2020-09-14 19:23:53', 7),
(108, 'MOLE5', 'Mr.', 'Zelda', '', 'Martinez', NULL, '1992-12-08', '2057-12-08', NULL, NULL, 'Male', '1995-01-14', NULL, '2020-09-14 19:24:07', '2020-09-14 19:24:07', 7),
(109, 'VELIT', 'Ms.', 'Phoebe', 'Tamekah Benson', 'Rasmussen', NULL, '2018-07-18', '2083-07-18', NULL, NULL, 'Male', '1978-08-11', NULL, '2020-09-14 19:24:32', '2020-09-14 19:24:32', 7),
(110, 'QUASI6', 'Mrs.', 'Bruce', 'Shelly Howard', 'Brewer', NULL, '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, '2020-09-14 19:46:09', '2020-09-14 19:46:09', 7),
(111, 'QUA', 'Mr.', 'Bruce', '', 'Brewer', NULL, '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, '2020-09-14 19:50:06', '2020-09-14 19:50:06', 7),
(112, 'QUAY', 'Mr.', 'Bruce', '', 'Brewer', NULL, '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, '2020-09-14 19:50:20', '2020-09-14 19:50:20', 7),
(113, 'QUATY', 'Mr.', 'Bruce', '', 'Brewer', NULL, '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, '2020-09-14 19:54:17', '2020-09-14 19:54:17', 7),
(114, 'QUAVA', 'Mr.', 'Bruce', '', 'Brewer', NULL, '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, '2020-09-14 19:54:45', '2020-09-14 19:54:45', 7),
(115, 'RAFA', 'Mr.', 'Bruce', '', 'Brewer', NULL, '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, '2020-09-14 19:55:18', '2020-09-14 19:55:18', 7),
(116, 'RAFWRW', 'Mr.', 'Bruce', '', 'Brewer', NULL, '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', NULL, '2020-09-14 19:55:38', '2020-09-14 19:55:38', 7),
(117, 'IURE', 'Miss', 'Dexter', 'Cameron Farmer', 'Frazier', NULL, '1986-10-21', '2046-10-21', NULL, NULL, 'Female', '1978-09-25', NULL, '2020-09-14 19:56:01', '2020-09-14 19:56:01', 7),
(118, 'IDU', 'Miss', 'Imogene', 'Aquila Foley', 'Gould', NULL, '1979-04-22', '2039-04-22', NULL, NULL, 'Female', '1995-09-11', NULL, '2020-09-14 19:59:26', '2020-09-14 19:59:26', 7),
(119, 'DISTI', 'Mrs.', 'Josiah', 'Celeste Larson', 'Valenzuela', NULL, '1970-11-18', '2035-11-18', NULL, NULL, 'Male', '1986-09-07', NULL, '2020-09-14 20:01:41', '2020-09-14 20:01:41', 7),
(120, 'QUOE', 'Miss', 'Shay', 'Zelenia Malone', 'Frye', NULL, '2018-12-28', '2083-12-28', NULL, NULL, 'Male', '1981-12-06', NULL, '2020-09-14 20:04:35', '2020-09-14 20:04:35', 7),
(121, 'SUNTT', 'Mr.', 'Rina', 'Kylee Stevenson', 'Clay', NULL, '1983-11-10', '2043-11-10', NULL, NULL, 'Female', '1990-03-18', NULL, '2020-09-14 20:06:00', '2020-09-14 20:06:00', 7),
(122, 'ERRO', 'Mrs.', 'Madaline', 'Aspen Silva', 'Manning', NULL, '1976-07-08', '2041-07-08', NULL, NULL, 'Male', '2004-12-01', NULL, '2020-09-14 20:07:42', '2020-09-14 20:07:42', 7),
(151, 'DOLORE', 'Miss', 'Deanna', 'Gail Mercado', 'Griffith', NULL, '2015-01-06', '2075-01-06', NULL, NULL, 'Female', '2013-04-11', NULL, '2020-09-16 16:22:45', '2020-09-16 16:22:45', 7),
(156, 'INCID', 'Mr.', 'Bell', '', 'David', NULL, '1988-11-07', '2053-11-07', NULL, NULL, 'Male', '1974-04-27', NULL, '2020-09-16 16:54:29', '2020-09-16 16:54:29', 7),
(157, 'IDNULL', 'Mr.', 'Ivana', '', 'Howard', NULL, '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', NULL, '2020-09-16 16:54:41', '2020-09-16 16:54:41', 7),
(158, 'IDNU', 'Mr.', 'Ivana', '', 'Howard', NULL, '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', NULL, '2020-09-16 16:55:59', '2020-09-16 16:55:59', 7),
(159, 'IDNUY', 'Mr.', 'Ivana', '', 'Howard', NULL, '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', NULL, '2020-09-16 16:59:13', '2020-09-16 16:59:13', 7),
(160, 'CUMQUE', 'Mr.', 'Thaddeus', 'Thane Preston', 'Parker', NULL, '1988-04-01', NULL, NULL, NULL, 'Female', '2020-02-02', NULL, '2020-09-16 17:07:01', '2020-09-16 17:07:01', 7),
(161, 'TOTAM', 'Ms.', 'Bell', 'Alea Gray', 'Buck', NULL, '1987-07-21', '2021-01-16', NULL, NULL, 'Female', '2013-05-18', NULL, '2020-09-16 17:11:45', '2020-09-16 17:11:45', 7),
(162, 'NEQUE', 'Miss', 'Brooke', 'Channing Flowers', 'Price', NULL, '1988-04-18', NULL, NULL, NULL, 'Female', '2001-05-16', NULL, '2020-09-16 17:13:54', '2020-09-16 17:13:54', 7),
(163, 'NREQUE', 'Mr.', 'Brooke', '', 'Price', NULL, '1988-04-18', NULL, NULL, NULL, 'Male', '2001-05-16', NULL, '2020-09-16 17:43:15', '2020-09-16 17:43:15', 7),
(164, 'TEQUE', 'Mr.', 'Brooke', '', 'Price', NULL, '1988-04-18', NULL, NULL, NULL, 'Male', '2001-05-16', NULL, '2020-09-16 17:43:49', '2020-09-16 17:43:49', 7),
(165, 'TQUE', 'Mr.', 'Brooke', '', 'Price', NULL, '1988-04-18', NULL, NULL, NULL, 'Male', '2001-05-16', NULL, '2020-09-16 17:45:42', '2020-09-16 17:45:42', 7),
(166, 'TTQUE', 'Mr.', 'Brooke', '', 'Price', NULL, '1988-04-18', NULL, NULL, NULL, 'Male', '2001-05-16', NULL, '2020-09-16 17:51:18', '2020-09-16 17:51:18', 7),
(167, 'AUTET', 'Mr.', 'Kennan', 'Aimee Schneider', 'Sandoval', NULL, '1972-01-06', NULL, NULL, NULL, 'Male', '1970-07-02', NULL, '2020-09-16 17:51:31', '2020-09-16 17:51:31', 7),
(168, 'QUIAD', 'Mrs.', 'Uta', 'Brielle Osborne', 'Montgomery', NULL, '1985-10-15', NULL, NULL, NULL, 'Male', '1990-10-04', NULL, '2020-09-16 17:52:07', '2020-09-16 17:52:07', 7),
(169, 'DOOR', 'Miss', 'Harlan', 'Derek Schroeder', 'Burt', NULL, '1976-12-19', '2041-12-19', NULL, NULL, 'Male', '1970-10-11', NULL, '2020-09-16 18:04:31', '2020-09-16 18:04:31', 7),
(170, 'ESTEXE', 'Mrs.', 'Sylvester', 'Hadley Hansen', 'Fitzpatrick', NULL, '1990-08-15', NULL, NULL, NULL, 'Female', '1985-10-20', NULL, '2020-09-16 18:14:05', '2020-09-16 18:14:05', 7),
(171, 'ESTEX', 'Mr.', 'Sylvester', '', 'Fitzpatrick', NULL, '1990-08-15', NULL, NULL, NULL, 'Male', '1985-10-20', NULL, '2020-09-16 18:14:17', '2020-09-16 18:14:17', 7),
(172, 'ESTRE', 'Mr.', 'Sylvester', '', 'Fitzpatrick', NULL, '1990-08-15', NULL, NULL, NULL, 'Male', '1985-10-20', NULL, '2020-09-16 18:14:38', '2020-09-16 18:14:38', 7),
(173, 'ESTRE4', 'Mr.', 'Sylvester', '', 'Fitzpatrick', NULL, '1990-08-15', '2055-08-15', NULL, NULL, 'Male', '1985-10-20', NULL, '2020-09-16 18:16:27', '2020-09-16 18:16:27', 7),
(174, 'UTALIQ', 'Mr.', 'Ainsley', '', 'Durham', NULL, '1999-07-18', '2064-07-18', NULL, NULL, 'Female', '1993-04-20', NULL, '2020-09-16 18:16:48', '2020-09-16 18:16:48', 7),
(175, 'NONET', 'Miss', 'Erich', 'Otto Pittman', 'Castro', NULL, '2005-05-17', '2070-05-17', NULL, NULL, 'Female', '2020-08-23', NULL, '2020-09-16 18:18:02', '2020-09-16 18:18:02', 7),
(176, 'VOLUPT', 'Ms.', 'Aladdin', 'Christen Sims', 'Holden', NULL, '1972-09-14', '2032-09-14', NULL, NULL, 'Female', '1996-06-04', NULL, '2020-09-16 18:20:12', '2020-09-16 18:20:12', 7),
(177, 'ULLAMC', 'Miss', 'Cara', 'Angela Hopper', 'Tate', NULL, '2000-09-10', '2060-09-10', NULL, NULL, 'Female', '2008-06-12', NULL, '2020-09-16 18:20:47', '2020-09-16 18:20:47', 7),
(178, 'TEMPO', 'Ms.', 'Jack', 'Rhiannon Hess', 'Kaufman', NULL, '2019-09-18', '2079-09-18', NULL, NULL, 'Female', '2006-01-19', NULL, '2020-09-16 18:21:12', '2020-09-16 18:21:12', 7),
(179, 'RECUSA', 'Mr.', 'Quail', '', 'Jackson', NULL, '1977-06-17', '2042-06-17', NULL, NULL, 'Male', '2017-01-08', NULL, '2020-09-16 18:21:23', '2020-09-16 18:21:23', 7),
(180, 'VELUME', 'Miss', 'Kay', 'Jared Mendoza', 'Sutton', NULL, '1996-09-21', '2061-09-21', NULL, NULL, 'Male', '1984-01-12', NULL, '2020-09-16 18:22:20', '2020-09-16 18:22:20', 7);

--
-- Triggers `tblemployees`
--
DELIMITER $$
CREATE TRIGGER `insertNewEmployee` AFTER INSERT ON `tblemployees` FOR EACH ROW BEGIN
INSERT INTO tblActivityLog
SET 
relUserID = NEW.created_by,
action = CONCAT('New Employee record for: <br/> Employee ID: ', NEW.empID, ' <br/> Name: <a href="../employees/edit/', NEW.id ,'"> ', NEW.first_name, ' ', NEW.middle_name, ' ', NEW.last_name, '</a><br/> Gender: ', NEW.gender, ' <br/> DOB: ', NEW.empDOB, '<br/> Hire Date: ', NEW.hire_date );

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
(275, 7, NULL, '2020-09-16 13:10:45', 'User Login', NULL);

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
-- Indexes for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  ADD PRIMARY KEY (`idActivity`),
  ADD KEY `UserID` (`relUserID`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `deptID_UNIQUE` (`deptCode`),
  ADD UNIQUE KEY `deptName_UNIQUE` (`deptName`);

--
-- Indexes for table `tblemails`
--
ALTER TABLE `tblemails`
  ADD PRIMARY KEY (`emailID`),
  ADD KEY `employee_id` (`relEmpID`);

--
-- Indexes for table `tblempdepartment`
--
ALTER TABLE `tblempdepartment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relDeptID` (`relDeptID`),
  ADD KEY `relEmpID_idx` (`relEmpID`);

--
-- Indexes for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD PRIMARY KEY (`id`,`empID`),
  ADD UNIQUE KEY `id_UNIQUE` (`id`),
  ADD UNIQUE KEY `empID_UNIQUE` (`empID`),
  ADD UNIQUE KEY `trn_UNIQUE` (`trn`),
  ADD UNIQUE KEY `nis_UNIQUE` (`nis`),
  ADD KEY `relUserFK` (`created_by`);

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
-- AUTO_INCREMENT for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  MODIFY `idActivity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tblemails`
--
ALTER TABLE `tblemails`
  MODIFY `emailID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `tblempdepartment`
--
ALTER TABLE `tblempdepartment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblemployees`
--
ALTER TABLE `tblemployees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

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
  MODIFY `idLogs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=276;

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
-- Constraints for table `tblactivitylog`
--
ALTER TABLE `tblactivitylog`
  ADD CONSTRAINT `UserID` FOREIGN KEY (`relUserID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblempdepartment`
--
ALTER TABLE `tblempdepartment`
  ADD CONSTRAINT `relDeptID` FOREIGN KEY (`relDeptID`) REFERENCES `tbldepartments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `relEmpID` FOREIGN KEY (`relEmpID`) REFERENCES `tblemployees` (`empID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD CONSTRAINT `relUserFK` FOREIGN KEY (`created_by`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `tbluserlogs`
--
ALTER TABLE `tbluserlogs`
  ADD CONSTRAINT `relUserID` FOREIGN KEY (`relUserID`) REFERENCES `users` (`userID`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
