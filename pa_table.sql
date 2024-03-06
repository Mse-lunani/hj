-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 06, 2024 at 07:39 PM
-- Server version: 5.7.44-cll-lve
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hayahafr_hayah`
--

-- --------------------------------------------------------

--
-- Table structure for table `pa`
--

CREATE TABLE `pa` (
  `TransactionType` varchar(255) DEFAULT NULL,
  `TransID` varchar(255) DEFAULT NULL,
  `TransTime` varchar(255) DEFAULT NULL,
  `TransAmount` varchar(255) DEFAULT NULL,
  `BillRefNumber` varchar(255) DEFAULT NULL,
  `MSISDN` varchar(255) DEFAULT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `MiddleName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) DEFAULT NULL,
  `BusinessShortCode` varchar(255) DEFAULT NULL,
  `InvoiceNumber` varchar(255) DEFAULT NULL,
  `ThirdPartyTransID` varchar(255) DEFAULT NULL,
  `OrgAccountBalance` varchar(255) DEFAULT NULL,
  `date_created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pa`
--
ALTER TABLE `pa`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pa`
--
ALTER TABLE `pa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
