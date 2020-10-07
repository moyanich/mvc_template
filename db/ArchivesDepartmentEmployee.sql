-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 07, 2020 at 02:59 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `ArchivesDepartmentEmployee`
--

CREATE TABLE `ArchivesDepartmentEmployee` (
  `id` int(11) NOT NULL,
  `empID` int(11) NOT NULL,
  `jobID` int(11) NOT NULL,
  `deptID` char(6) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `deletedAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ArchivesDepartmentEmployee`
--

INSERT INTO `ArchivesDepartmentEmployee` (`id`, `empID`, `jobID`, `deptID`, `from_date`, `to_date`, `created_date`, `deletedAt`) VALUES
(1, 94, 14, 'dep2', '2020-10-06', '2020-10-06', '2020-10-06 14:33:16', '2020-10-07 14:55:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ArchivesDepartmentEmployee`
--
ALTER TABLE `ArchivesDepartmentEmployee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ArchivesDepartmentEmployee`
--
ALTER TABLE `ArchivesDepartmentEmployee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
