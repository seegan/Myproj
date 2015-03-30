-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 09:29 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pearl`
--

-- --------------------------------------------------------

--
-- Table structure for table `ta_admin_topup`
--

CREATE TABLE IF NOT EXISTS `ta_admin_topup` (
`admin_topup_id` int(255) NOT NULL,
  `admin_id` int(255) NOT NULL,
  `topup_amount` int(255) NOT NULL,
  `topup_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `topup_status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_admin_topup`
--

INSERT INTO `ta_admin_topup` (`admin_topup_id`, `admin_id`, `topup_amount`, `topup_time`, `topup_status`) VALUES
(1, 1, 12345, '2015-03-30 18:58:06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ta_admin_topup`
--
ALTER TABLE `ta_admin_topup`
 ADD PRIMARY KEY (`admin_topup_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ta_admin_topup`
--
ALTER TABLE `ta_admin_topup`
MODIFY `admin_topup_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
