-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2015 at 05:52 PM
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
-- Table structure for table `ta_transaction_admin`
--

CREATE TABLE IF NOT EXISTS `ta_transaction_admin` (
`trans_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `topup_amount` int(255) NOT NULL,
  `payment_amount` int(255) NOT NULL,
  `payment_to` int(255) NOT NULL,
  `transaction_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ta_transaction_admin`
--

INSERT INTO `ta_transaction_admin` (`trans_id`, `user_id`, `topup_amount`, `payment_amount`, `payment_to`, `transaction_time`, `is_active`) VALUES
(1, 1, 200, 0, 2, '2015-03-29 11:42:49', 1),
(2, 1, 10000, 0, 0, '2015-03-29 15:09:54', 1),
(3, 0, 1000, 0, 0, '2015-03-29 15:30:55', 1),
(4, 0, 2000, 0, 0, '2015-03-29 15:31:21', 1),
(5, 1, 2000, 0, 0, '2015-03-29 15:32:06', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ta_transaction_admin`
--
ALTER TABLE `ta_transaction_admin`
 ADD PRIMARY KEY (`trans_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ta_transaction_admin`
--
ALTER TABLE `ta_transaction_admin`
MODIFY `trans_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
