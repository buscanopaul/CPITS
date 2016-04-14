-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2016 at 07:02 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cpits`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE IF NOT EXISTS `application` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `departmentId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `name`, `description`, `departmentId`) VALUES
(1, 'QnE Business Solutions', '', NULL),
(2, 'MSI Payroll XP', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkin`
--

CREATE TABLE IF NOT EXISTS `checkin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `application` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `priority` int(11) DEFAULT NULL,
  `details` text NOT NULL,
  `instruction` text NOT NULL,
  `file` varchar(100) NOT NULL,
  `tagDate` datetime DEFAULT NULL,
  `processDate` datetime DEFAULT NULL,
  `processId` int(11) DEFAULT NULL,
  `processNote` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1011 ;

--
-- Dumping data for table `checkin`
--

INSERT INTO `checkin` (`id`, `date`, `userId`, `status`, `department`, `application`, `type`, `priority`, `details`, `instruction`, `file`, `tagDate`, `processDate`, `processId`, `processNote`) VALUES
(1000, '2015-08-05 09:01:30', 7, 3, 1, 2, 3, NULL, 'Details.', 'Special instructions.', 'SA-2027.png', '2015-08-06 09:29:17', '2015-08-06 09:34:12', 6, 'wow'),
(1001, '2015-08-05 12:56:02', 7, 3, 2, 1, 1, NULL, 'Details...', 'Special Instruction...', 'SA-2027.png', '2015-08-06 09:34:40', '2015-08-07 09:38:10', 6, 'Processed.'),
(1002, '2015-08-05 15:17:11', 7, 2, 2, 1, 2, NULL, '...', '...', 'SA-2027.png', '2015-08-05 17:47:08', NULL, 7, ''),
(1003, '2015-08-06 14:42:40', 7, 3, 1, 1, 1, NULL, 'a', 'a', 'SA-2027.png', '2015-08-07 10:50:18', '2015-08-07 10:54:38', 16, 'Kenth Test'),
(1004, '2015-08-07 09:29:30', 7, 4, 3, 1, 1, NULL, 'a', 'a', 'SA-2027.png', '2015-08-07 11:05:14', '2015-08-07 11:17:21', 16, 'Added note in checkin - assigne=d'),
(1005, '2015-08-07 09:43:46', 15, 4, 1, 1, 1, NULL, 'rwrwrwr#!$!432', '424244243323', 'BI Assignment.xls', '2015-08-07 15:55:36', '2015-08-07 15:56:07', 6, 'Incomplete docs.'),
(1006, '2015-08-07 10:04:33', 15, 3, 1, 2, 1, NULL, '46', '4646', 'GENiiSYS Release Notes.docx', '2015-08-07 15:57:58', '2015-08-11 15:48:42', 6, 'aw'),
(1007, '2015-08-07 16:36:11', 7, 3, 1, 1, 1, NULL, 'a', 'a', 'SA-2027.png', '2015-08-10 13:59:01', '2015-08-10 15:07:52', 16, 'sgs'),
(1008, '2015-08-10 14:56:18', 15, 3, 1, 1, 1, NULL, 'Test Data - Checkin', 'Test Data - Checkin', 'rcmtestfunc.xls', '2015-08-10 15:06:32', '2015-08-10 15:07:56', 16, 'gs'),
(1009, '2015-08-11 15:59:44', 7, 1, 1, 1, 1, NULL, 'aw', 'aw', 'geniisys.png', NULL, NULL, NULL, ''),
(1010, '2015-08-24 10:38:15', 15, 3, 1, 2, 1, NULL, 'FILENAME - CHECKIN', 'checkin', 'Content Review.xlsx', '2015-08-24 10:43:34', '2015-08-24 10:44:27', 16, 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE IF NOT EXISTS `checkout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `userId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `application` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `file` text NOT NULL,
  `note` text NOT NULL,
  `version` text NOT NULL,
  `tagDate` datetime DEFAULT NULL,
  `processDate` datetime DEFAULT NULL,
  `processId` int(11) DEFAULT NULL,
  `processNote` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1007 ;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `date`, `userId`, `status`, `department`, `application`, `type`, `file`, `note`, `version`, `tagDate`, `processDate`, `processId`, `processNote`) VALUES
(1000, '2015-08-06 09:12:22', 7, 3, 1, 1, 1, 'file.exe', '', 'latest version', '2015-08-06 10:12:07', '2015-08-07 11:01:30', 6, 'Sent.'),
(1001, '2015-08-07 09:56:59', 15, 3, 1, 1, 1, 'rwr', '', 'yry', '2015-08-07 15:57:27', '2015-08-11 15:50:52', 6, 'aw'),
(1002, '2015-08-07 10:03:48', 15, 3, 2, 1, 1, 'ada', '', '10/07/1964 10:00 PM', '2015-08-10 14:22:30', '2015-08-10 14:22:39', 16, 'wqwq'),
(1003, '2015-08-07 14:55:46', 7, 4, 1, 1, 1, 'a', '', 'a', '2015-08-10 14:22:50', '2015-08-10 14:22:54', 16, 'wqw'),
(1004, '2015-08-07 16:40:01', 7, 4, 1, 1, 1, 'a', '', 'a', '2015-08-10 14:23:22', '2015-08-10 14:23:26', 16, 'wqw'),
(1005, '2015-08-10 14:56:56', 15, 4, 1, 2, 2, 'Test Data - Checkout', 'Test Data - Checkout', 'Test Data - Checkout', '2015-08-10 15:06:48', '2015-08-10 15:06:54', 16, 'ada'),
(1006, '2015-08-24 10:39:06', 15, 1, 1, 2, 2, 'checkout', 'ewewewe', '12121212', NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`) VALUES
(1, 'Accounting', ''),
(2, 'Marketing', ''),
(3, 'Human Resource', ''),
(4, 'App Dev', '');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `permissions`) VALUES
(1, 'Standard user', ''),
(2, 'Administrator', '{"admin": 1}');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(64) NOT NULL,
  `salt` varchar(32) NOT NULL,
  `name` varchar(50) NOT NULL,
  `joined` datetime NOT NULL,
  `group` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `salt`, `name`, `joined`, `group`) VALUES
(15, 'user', 'eb57a0494a98bc24ce8a50abf6becfe6250af89953ccb33f3cf1b4d184849ec0', 'ŒPp&ËÓÉ¥"’ÿÆ³ÚuÞZˆ9·Z2s¨¯', 'NJ Diaz', '2015-08-06 15:00:29', 2),
(16, 'admin', '1192e3ba158f4e84c297056edcaac3155fb5ab250b4f0bba3788a3b17455e4a3', '¸­¢È§ wB™ÀvHð•Ÿ`¿9äPÔOuX£G%AŠ', 'Joey Diaz', '2015-08-06 15:00:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users_session`
--

CREATE TABLE IF NOT EXISTS `users_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
