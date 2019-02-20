-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2019 at 09:58 PM
-- Server version: 5.5.60-MariaDB
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `DonationDatabase`
--
CREATE DATABASE IF NOT EXISTS DonationDatabase;
USE DonationDatabase
-- --------------------------------------------------------

--
-- Table structure for table `Donations`
--

CREATE TABLE IF NOT EXISTS `Donations` (
  `TransactionID` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `method` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=166 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Donations`
--

INSERT INTO `Donations` (`TransactionID`, `username`, `amount`, `method`) VALUES
(156, 'dwallace', 30, 'Mastercard'),
(157, 'dwallace', 25, 'Key Bank'),
(158, 'michaelscott', 100, 'Visa'),
(159, 'kmalone123', 69, 'Chase'),
(160, 'kmalone123', 10, 'Chase'),
(161, 'dwightkschrute', 1, 'Schrute Farms'),
(162, 'jhalp215', 66, 'Santander'),
(163, 'angela', 50, 'Visa'),
(164, 'angela', 50, 'Visa'),
(165, 'angela', 75, 'Visa');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `ID` int(11) NOT NULL,
  `user` varchar(30) NOT NULL,
  `cardName` varchar(30) NOT NULL,
  `cardNumber` varchar(16) NOT NULL,
  `cardBack` int(11) NOT NULL,
  `expDate` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`ID`, `user`, `cardName`, `cardNumber`, `cardBack`, `expDate`) VALUES
(8, 'dwallace', 'Mastercard', '1234567891011123', 12, '01/20'),
(9, 'dwallace', 'Key Bank', '694208675309', 101, '02/21'),
(10, 'michaelscott', 'Visa', '1937520985123456', 999, '10/19'),
(11, 'kmalone123', 'Chase', '1111222233334444', 888, '12/21'),
(12, 'dwightkschrute', 'Schrute Farms', '9876543219876543', 456, '09/19'),
(13, 'jhalp215', 'Mastercard', '9999888877776666', 777, '12/25'),
(14, 'jhalp215', 'Santander', '6666666666666666', 666, '06/66'),
(15, 'jhalp215', 'Visa', '1346798527946132', 215, '11/23'),
(16, 'angela', 'Visa', '7412589632587412', 123, '12/26');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `user` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `NumOfDonations` int(11) NOT NULL,
  `Amount` int(11) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`user`, `password`, `NumOfDonations`, `Amount`, `admin`) VALUES
('admin', '2fe034142e972bceee39bd5f2d55b3fd', 0, 0, 1),
('angela', 'd077f244def8a70e5ea758bd8352fcd8', 3, 175, 0),
('dwallace', '061117da4e327cac66b31d2b35068c0a', 2, 55, 0),
('dwightkschrute', 'db25580715a4e8552232e145c74bc70d', 1, 1, 0),
('jhalp215', '5f4dcc3b5aa765d61d8327deb882cf99', 1, 66, 0),
('kmalone123', '7cf2db5ec261a0fa27a502d3196a6f60', 2, 79, 0),
('michaelscott', '9c8f7638edff647b9a5e95bc406a25b5', 1, 100, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Donations`
--
ALTER TABLE `Donations`
  ADD PRIMARY KEY (`TransactionID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user`),
  ADD KEY `user` (`user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Donations`
--
ALTER TABLE `Donations`
  MODIFY `TransactionID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=166;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
