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
-- Table structure for table `ta_admin_to_client_transaction`
--

CREATE TABLE IF NOT EXISTS `ta_admin_to_client_transaction` (
`trans_id` int(255) NOT NULL,
  `last_admin_topup_id` int(255) NOT NULL,
  `trans_admin_id` int(255) NOT NULL,
  `trans_received_client_id` int(255) NOT NULL,
  `trans_amount` int(255) NOT NULL,
  `trans_request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trans_received_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `trans_approved` int(1) NOT NULL DEFAULT '0',
  `trans_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_admin_to_client_transaction`
--

INSERT INTO `ta_admin_to_client_transaction` (`trans_id`, `last_admin_topup_id`, `trans_admin_id`, `trans_received_client_id`, `trans_amount`, `trans_request_date`, `trans_received_date`, `trans_approved`, `trans_active`) VALUES
(1, 0, 0, 2, 12345, '2015-03-30 19:07:30', '2015-03-30 19:07:30', 0, 1),
(2, 0, 0, 2, 20000, '2015-03-30 19:09:01', '0000-00-00 00:00:00', 0, 1),
(3, 0, 0, 2, 6000, '2015-03-30 19:09:37', '2015-03-30 19:10:43', 0, 1),
(4, 0, 0, 2, 3, '2015-03-30 19:11:20', '2015-03-30 19:11:41', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ta_admin_to_client_transaction`
--
ALTER TABLE `ta_admin_to_client_transaction`
 ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ta_admin_to_client_transaction`
--
ALTER TABLE `ta_admin_to_client_transaction`
MODIFY `trans_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
