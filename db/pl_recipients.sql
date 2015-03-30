-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2015 at 07:29 AM
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
-- Table structure for table `pl_recipients`
--

CREATE TABLE IF NOT EXISTS `pl_recipients` (
`recipient_id` int(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `ref_num` varchar(20) NOT NULL,
  `email` varchar(80) NOT NULL,
  `location` varchar(300) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ref_id` int(255) NOT NULL,
  `is_active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pl_recipients`
--

INSERT INTO `pl_recipients` (`recipient_id`, `first_name`, `middle_name`, `last_name`, `gender`, `phone`, `ref_num`, `email`, `location`, `datetime`, `ref_id`, `is_active`) VALUES
(3, 'seeeegandddddddddfdffddfgfgdfh', 'ganndfdsfsfgfdg', 'hhhhhdfgdf', 'Female', '76396164942        ', '7639616494', 'sssss8@gmail.com', 'dusygfsdfhj,\r\nsdjgfduf,\r\ndshgfydfy...', '2015-03-22 23:28:09', 2, 1),
(4, 'sujiinntrtrrtrr', 'kkkkkkk', '', 'Male', '7639515282 ', '7639515282', 'sksujikuma2222r8@gmail.com', 'sdusdfvuds,\r\nsdghvds,\r\nsdghcfgdsvs..', '2015-03-23 23:27:07', 8, 1),
(5, 'sujii', 'kkkkkkk', '', 'Female', '7639515282 ', '7639515282', 'sksujikuma2222r8@gmail.com', 'sdusdfvuds,\r\nsdghvds,\r\nsdghcfgdsvs..', '2015-03-24 02:23:40', 8, 1),
(6, 'rajesh', 'kkkkkkk', 'dfsgvdfgdfg', 'Male', '7639515282   ', '7639515282', 'sksujikuma2222r8@gmail.com', 'thundathuvilai', '2015-03-24 02:24:40', 8, 1),
(7, 'sujiiiiikuummarrr', 'jjjjjjj', 'kkkkkkkk', 'Male', '1234567890 ', '1234567890', 'sdfdgfdgdfgfd@gmail.com', 'safsadg\r\nfghjfj\r\ncfnhgfhgf', '2015-03-24 03:17:42', 2, 1),
(8, 'ddddd', 'gdhghf', 'gfhgf', 'Male', '7418731399', '7418731399', 'asfdsfdsf@gmail.com', 'sayugfdsyuf,asdyusyug\r\nsdhbfhjdsbv\r\nhvdgsh7634674832', '2015-03-25 11:41:22', 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pl_recipients`
--
ALTER TABLE `pl_recipients`
 ADD PRIMARY KEY (`recipient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pl_recipients`
--
ALTER TABLE `pl_recipients`
MODIFY `recipient_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
