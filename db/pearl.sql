-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 19, 2015 at 06:25 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

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
-- Table structure for table `pl_account_type`
--

CREATE TABLE IF NOT EXISTS `pl_account_type` (
  `acc_id` int(2) NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(200) NOT NULL,
  PRIMARY KEY (`acc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `pl_account_type`
--

INSERT INTO `pl_account_type` (`acc_id`, `acc_name`) VALUES
(1, 'company'),
(2, 'individual');

-- --------------------------------------------------------

--
-- Table structure for table `pl_user`
--

CREATE TABLE IF NOT EXISTS `pl_user` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(50) NOT NULL,
  `acc_id` int(2) NOT NULL,
  `acc_active` int(2) NOT NULL,
  `is_active` int(2) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pl_user`
--

INSERT INTO `pl_user` (`user_id`, `email`, `password`, `role_id`, `acc_id`, `acc_active`, `is_active`) VALUES
(1, 'admin@pearl.com', '9283a03246ef2dacdc21a9b137817ec1', 1, 3, 1, 1),
(2, 'test@sdfdf.com', 'c293048f9e4415de9d3c28705d5c4646', 2, 0, 0, 1),
(3, 'tessst@sdfdf.com', 'c293048f9e4415de9d3c28705d5c4646', 2, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pl_usermeta`
--

CREATE TABLE IF NOT EXISTS `pl_usermeta` (
  `umeta_id` int(255) NOT NULL AUTO_INCREMENT,
  `user_id` int(255) NOT NULL,
  `meta_key` varchar(200) NOT NULL,
  `meta_value` varchar(200) NOT NULL,
  PRIMARY KEY (`umeta_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `pl_usermeta`
--

INSERT INTO `pl_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', '0'),
(2, 1, 'last_name', 'Kumar'),
(3, 2, 'first_name', '0'),
(4, 2, 'last_name', 'kl'),
(5, 2, 'company_name', 'Test'),
(6, 2, 'company_reg_num', '1223'),
(7, 3, 'first_name', '0'),
(8, 3, 'last_name', '22221111');

-- --------------------------------------------------------

--
-- Table structure for table `pl_user_role`
--

CREATE TABLE IF NOT EXISTS `pl_user_role` (
  `role_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `priority` int(10) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `pl_user_role`
--

INSERT INTO `pl_user_role` (`role_id`, `name`, `priority`) VALUES
(1, 'admin', 1),
(2, 'user', 2),
(3, 'cl_admin', 3),
(4, 'cl_transaction_initiator', 4),
(5, 'cl_transaction_reviewer', 5),
(6, 'cl_transaction_approver1', 6),
(7, 'cl_transaction_approver2', 7);

-- --------------------------------------------------------

--
-- Table structure for table `sa_super_admin`
--

CREATE TABLE IF NOT EXISTS `sa_super_admin` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `sa_super_admin`
--

INSERT INTO `sa_super_admin` (`p_id`, `username`, `password`) VALUES
(1, 'admin', '83218ac34c1834c26781fe4bde918ee4');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
