-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 05, 2020 at 07:51 PM
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
-- Table structure for table `tblemployees`
--

DROP TABLE IF EXISTS `tblemployees`;
CREATE TABLE IF NOT EXISTS `tblemployees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `empID` char(6) NOT NULL,
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
  `created_by` int(11) NOT NULL,
  PRIMARY KEY (`id`,`empID`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `empID_UNIQUE` (`empID`),
  UNIQUE KEY `trn_UNIQUE` (`trn`),
  UNIQUE KEY `nis_UNIQUE` (`nis`),
  KEY `relUserFK` (`created_by`)
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tblemployees`
--

INSERT INTO `tblemployees` (`id`, `empID`, `first_name`, `middle_name`, `last_name`, `empDOB`, `retirementDate`, `trn`, `nis`, `gender`, `hire_date`, `address`, `city`, `parish`, `phoneOne`, `mobile`, `internalEmail`, `externalEmail`, `photo`, `created_date`, `modified_at`, `created_by`) VALUES
(93, 'DOEN', 'Ryders', 'Jayme Whitney', 'Chapman', '1949-12-19', '2009-12-19', '567345879', 'BX4532', 'Female', '1981-02-26', '14 Terry Road', 'Spanish Town', 'Clarendon', '', '', '', 'test@email.com', NULL, '2020-09-11 15:06:20', '2020-09-26 22:18:00', 7),
(94, 'EUM', 'Joan', 'Elvis', 'Stafford', '1961-08-26', '2021-08-26', '556932641', 'ctr266', 'Female', '2002-06-12', 'Et at corporis ut su', 'Qui eum sit adipisc', 'St. Elizabeth', '2856698223', '20', '', 'nugoxol@mailinator.com', NULL, '2020-09-11 15:11:08', '2020-09-22 13:26:47', 7),
(95, 'DOLORI', 'Virginia', 'Simone Mcmillan', 'Bass', '2000-06-18', '2060-06-18', NULL, NULL, 'Female', '2006-02-13', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:11:57', '2020-09-11 15:11:57', 7),
(96, 'EST', 'Thor', 'Ali Delgado', 'Hicks', '1977-09-06', '2037-09-06', NULL, NULL, 'Female', '1972-09-26', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:19:46', '2020-09-11 15:19:46', 7),
(97, 'QUASI', 'Roanna', 'Alea Cortez', 'Ellis', '2009-12-26', '2074-12-26', '252222623', 'EHWY2T2', 'Male', '2015-05-06', '', '', '', '875-555-5555', '875-555-5666', '', '', NULL, '2020-09-11 15:21:12', '2020-10-02 15:24:50', 7),
(98, 'PROIDE', 'Upton', 'Hyacinth Freeman', 'Ellison', '1983-05-09', '2048-05-09', NULL, NULL, 'Male', '1983-10-27', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:23:17', '2020-09-11 15:23:17', 7),
(99, 'SIMILI', 'Ruth Anne', '', 'Hays', '2002-07-23', '2067-07-23', '896325678', 'SW86256', 'Male', '1996-12-08', '', '', '', '555-555-5555', '', '', 'manifest@email.com', NULL, '2020-09-11 15:24:24', '2020-09-26 15:02:15', 7),
(100, 'IPSUM', 'Garth', 'Pascale Dorsey', 'Leblanc', '2006-09-19', '2066-09-19', NULL, NULL, 'Female', '2004-04-28', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 15:25:05', '2020-09-11 15:25:05', 7),
(101, 'VOLU', 'Barbara', '', 'Kinney', '1979-12-19', '2044-12-19', NULL, NULL, 'Male', '1997-07-28', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-11 16:39:06', '2020-09-11 16:39:06', 7),
(102, 'QUIA', 'Jame', 'Daphne Small', 'Darcey', '1960-07-01', '2020-07-01', '569368523', 'RT86915', 'Female', '2014-02-15', '', '', '', '', '', '', '', NULL, '2020-09-12 13:42:44', '2020-09-26 15:27:56', 7),
(103, 'AMET', 'Roary', 'Gary Poole', 'Mathis', '2020-03-14', '2085-03-14', NULL, NULL, 'Male', '2015-03-07', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:04:07', '2020-09-14 19:04:07', 7),
(104, 'QUI', 'Jessica', '', 'Patel', '2014-04-16', '2079-04-16', NULL, NULL, 'Male', '1998-07-27', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:19:28', '2020-09-14 19:19:28', 7),
(105, 'QUIT', 'Jessie', '', 'Patel', '2014-04-16', '2079-04-16', '899698523', 'XR5333', 'Male', '1998-07-27', '', '', '', '', '', '', '', NULL, '2020-09-14 19:19:48', '2020-09-26 15:03:28', 7),
(106, 'EOS', 'Ella', 'Kermit Tyler', 'Morse', '2001-02-19', '2066-02-19', '567555337', 'TY5553', 'Male', '1987-01-05', '', '', '', '', '', '', '', NULL, '2020-09-14 19:22:28', '2020-09-26 15:37:47', 7),
(107, 'MOLE', 'Zelda', 'Owen Gillespie', 'Martinez', '1992-12-08', '2052-12-08', NULL, NULL, 'Female', '1995-01-14', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:23:53', '2020-09-14 19:23:53', 7),
(108, 'MOLE5', 'Zelda', '', 'Martinez', '1992-12-08', '2057-12-08', NULL, NULL, 'Male', '1995-01-14', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:24:07', '2020-09-14 19:24:07', 7),
(109, 'VELIT', 'Phoebe', 'Tamekah Benson', 'Rasmussen', '2018-07-18', '2083-07-18', NULL, NULL, 'Male', '1978-08-11', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:24:32', '2020-09-14 19:24:32', 7),
(110, 'QUASI6', 'Brianca', 'Shelly Howard', 'Brewers', '1974-10-01', '2039-10-01', '56734512', 'VT3335', 'Male', '2010-11-05', '', '', '', '', '', '', '', NULL, '2020-09-14 19:46:09', '2020-09-26 15:19:21', 7),
(111, 'QUA', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:50:06', '2020-09-14 19:50:06', 7),
(112, 'QUAY', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:50:20', '2020-09-14 19:50:20', 7),
(113, 'QUATY', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:54:17', '2020-09-14 19:54:17', 7),
(114, 'QUAVA', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:54:45', '2020-09-14 19:54:45', 7),
(115, 'RAFA', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', NULL, NULL, 'Male', '2010-11-05', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:55:18', '2020-09-14 19:55:18', 7),
(116, 'RAFWRW', 'Bruce', '', 'Brewer', '1975-10-22', '2040-10-22', '567555333', 'TR5222', 'Male', '2010-11-05', '', '', '', '', '', '', '', NULL, '2020-09-14 19:55:38', '2020-09-26 15:30:05', 7),
(117, 'IURE', 'Dexter', 'Cameron Farmer', 'Frazier', '1986-10-21', '2046-10-21', NULL, NULL, 'Female', '1978-09-25', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:56:01', '2020-09-14 19:56:01', 7),
(118, 'IDU', 'Imogene', 'Aquila Foley', 'Gould', '1979-04-22', '2039-04-22', NULL, NULL, 'Female', '1995-09-11', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 19:59:26', '2020-09-14 19:59:26', 7),
(119, 'DISTI', 'Josiah', 'Celeste Larson', 'Valenzuela', '1970-11-18', '2035-11-18', NULL, NULL, 'Male', '1986-09-07', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:01:41', '2020-09-14 20:01:41', 7),
(120, 'QUOE', 'Shay', 'Zelenia Malone', 'Frye', '2018-12-28', '2083-12-28', NULL, NULL, 'Male', '1981-12-06', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:04:35', '2020-09-14 20:04:35', 7),
(121, 'SUNTT', 'Rina', 'Kylee Stevenson', 'Clay', '1983-11-10', '2043-11-10', NULL, NULL, 'Female', '1990-03-18', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:06:00', '2020-09-14 20:06:00', 7),
(122, 'ERRO', 'Madaline', 'Aspen Silva', 'Manning', '1976-07-08', '2041-07-08', NULL, NULL, 'Male', '2004-12-01', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-14 20:07:42', '2020-09-14 20:07:42', 7),
(151, 'DOLORE', 'Deanna', 'Gail Mercado', 'Griffith', '2015-01-06', '2075-01-06', NULL, NULL, 'Female', '2013-04-11', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:22:45', '2020-09-16 16:22:45', 7),
(156, 'INCID', 'Bell', '', 'David', '1988-11-07', '2053-11-07', NULL, NULL, 'Male', '1974-04-27', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:54:29', '2020-09-16 16:54:29', 7),
(157, 'IDNULL', 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:54:41', '2020-09-16 16:54:41', 7),
(158, 'IDNU', 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:55:59', '2020-09-16 16:55:59', 7),
(159, 'IDNUY', 'Ivana', '', 'Howard', '1976-08-26', '2041-08-26', NULL, NULL, 'Male', '1978-01-09', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 16:59:13', '2020-09-16 16:59:13', 7),
(160, 'CUMQUE', 'Thaddeus', 'Thane Preston', 'Parker', '1988-04-01', '2048-04-01', NULL, NULL, 'Female', '2020-02-02', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:07:01', '2020-09-16 17:07:01', 7),
(161, 'TOTAM', 'Bell', 'Alea Gray', 'Buck', '1987-07-21', '2047-07-21', NULL, NULL, 'Female', '2013-05-18', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:11:45', '2020-09-16 17:11:45', 7),
(162, 'NEQUE', 'Brooke', 'Channing Flowers', 'Price', '1988-04-18', '2048-04-18', NULL, NULL, 'Female', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:13:54', '2020-09-16 17:13:54', 7),
(163, 'NREQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:43:15', '2020-09-16 17:43:15', 7),
(164, 'TEQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:43:49', '2020-09-16 17:43:49', 7),
(165, 'TQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:45:42', '2020-09-16 17:45:42', 7),
(166, 'TTQUE', 'Brooke', '', 'Price', '1988-04-18', '2053-04-18', NULL, NULL, 'Male', '2001-05-16', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:51:18', '2020-09-16 17:51:18', 7),
(167, 'AUTET', 'Kennan', 'Aimee Schneider', 'Sandoval', '1972-01-06', '2037-01-06', '567345987', 'THS2522', 'Male', '1970-07-02', '', '', '', '', '', '', '', NULL, '2020-09-16 17:51:31', '2020-09-26 15:53:51', 7),
(168, 'QUIAD', 'Uta', 'Brielle Osborne', 'Montgomery', '1985-10-15', '2050-10-15', NULL, NULL, 'Male', '1990-10-04', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 17:52:07', '2020-09-16 17:52:07', 7),
(169, 'DOOR', 'Harlan', 'Derek Schroeder', 'Burt', '1976-12-19', '2041-12-19', NULL, NULL, 'Male', '1970-10-11', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:04:31', '2020-09-16 18:04:31', 7),
(170, 'ESTEXE', 'Sylvester', 'Hadley Hansen', 'Fitzpatrick', '1990-08-15', '2050-08-15', '567565333', '56FQ3', 'Female', '2004-05-25', 'My adresss', 'Loisville', 'Clarendon', '', '', '', '', NULL, '2020-09-16 18:14:05', '2020-09-26 22:02:10', 7),
(171, 'ESTEX', 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', '56732245', 'FT52353', 'Male', '1985-02-01', 'Spray Town', 'Spoonville', 'Kingston', '555-555-5555', '876-555-5559', 'jmurray3@gmail.com', 'teflot@sun.com', NULL, '2020-09-16 18:14:17', '2020-09-27 01:10:51', 7),
(172, 'ESTRE', 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', NULL, NULL, 'Male', '1985-10-20', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:14:38', '2020-09-16 18:14:38', 7),
(173, 'ESTRE4', 'Sylvester', '', 'Fitzpatrick', '1990-08-15', '2055-08-15', NULL, NULL, 'Male', '1985-10-20', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:16:27', '2020-09-16 18:16:27', 7),
(174, 'UTALIQ', 'Ainsley', '', 'Durham', '1999-07-18', '2059-07-18', NULL, NULL, 'Female', '1993-04-20', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:16:48', '2020-09-16 18:16:48', 7),
(175, 'NONET', 'Erich', 'Otto Pittman', 'Castro', '2005-05-17', '2065-05-17', NULL, NULL, 'Female', '2020-08-23', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:18:02', '2020-09-16 18:18:02', 7),
(176, 'VOLUPT', 'Aladdin', 'Christen Sims', 'Holden', '1972-09-14', '2032-09-14', NULL, NULL, 'Female', '1996-06-04', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:20:12', '2020-09-16 18:20:12', 7),
(177, 'ULLAMC', 'Cara', 'Angela Hopper', 'Tate', '2000-09-10', '2060-09-10', NULL, NULL, 'Female', '2008-06-12', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:20:47', '2020-09-16 18:20:47', 7),
(178, 'TEMPO', 'Jack', 'Rhiannon Hess', 'Kaufman', '2019-09-18', '2079-09-18', NULL, NULL, 'Female', '2006-01-19', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:21:12', '2020-09-16 18:21:12', 7),
(179, 'RECUSA', 'Quail', '', 'Jackson', '1977-06-17', '2042-06-17', NULL, NULL, 'Male', '2017-01-08', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:21:23', '2020-09-16 18:21:23', 7),
(180, 'VELUME', 'Kay', 'Jared Mendoza', 'Sutton', '1996-09-21', '2061-09-21', NULL, NULL, 'Male', '1984-01-12', '', NULL, NULL, NULL, NULL, '', '', NULL, '2020-09-16 18:22:20', '2020-09-16 18:22:20', 7),
(187, 'RERU', 'Halee', 'Evan Reilly', 'Le', '1997-03-09', '2062-03-09', NULL, NULL, 'Male', '1981-11-05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-17 19:39:50', '2020-09-17 19:39:50', 7),
(188, 'NOBIS', 'Mason', 'Harriet Patrick', 'Good', '1991-10-26', '2056-10-26', NULL, NULL, 'Male', '2011-09-07', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-19 15:38:39', '2020-09-19 15:38:39', 7),
(189, 'PERFE', 'Shoshana', 'Evan Hayes', 'Williamson', '1977-05-06', '2037-05-06', NULL, NULL, 'Female', '1978-10-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-19 15:39:13', '2020-09-19 15:39:13', 7),
(190, 'BEATA', 'Evangeline', 'Holmes Nash', 'Patterson', '1997-01-03', '2057-01-03', '636363362', 'XY46363', 'Female', '2020-09-22', '', '', '', '', '', NULL, '', NULL, '2020-09-22 21:00:13', '2020-09-25 17:52:22', 7),
(191, 'IPSAM', 'Adele', 'Miriam Blackburn', 'Dillon', '2020-09-25', '2085-09-25', NULL, NULL, 'Male', '2020-09-25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-25 16:15:13', '2020-09-25 16:15:14', 7),
(192, 'ETDOL', 'Isadora', 'Wing Moss', 'Ruiz', '1987-01-08', '2047-01-08', '125398212', 'XCVDGTG', 'Female', '2020-09-25', '', '', '', '', '', NULL, '', NULL, '2020-09-25 19:28:22', '2020-09-25 19:29:02', 7);

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblemployees`
--
ALTER TABLE `tblemployees`
  ADD CONSTRAINT `relUserFK` FOREIGN KEY (`created_by`) REFERENCES `users` (`userID`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
