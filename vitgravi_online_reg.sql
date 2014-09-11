-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2013 at 08:32 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gravitas_online_reg`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE IF NOT EXISTS `bill` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(30) NOT NULL,
  `contingent` int(5) NOT NULL,
  `member1` varchar(30) NOT NULL,
  `member2` varchar(30) NOT NULL,
  `member3` varchar(30) NOT NULL,
  `member4` varchar(30) NOT NULL,
  `cost` varchar(4) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`srno`, `event_name`, `contingent`, `member1`, `member2`, `member3`, `member4`, `cost`) VALUES
(3, 'Hello World', 10002, 'sid', 'prerak', '', '', '300'),
(4, 'Hello World', 10003, 'simrandeep', 'manu', 'prerak', '', '300'),
(5, 'crack the code', 10003, 'manu', 'prerak', 'hello', '', '300'),
(6, 'Hello World', 10004, 'simrandeep', '', '', '', '300'),
(7, 'Hello World', 10006, 'manu', 'prerak', 'selvam', '', '300'),
(8, 'C bombing', 10008, 'nhghvh', 'gsg', 'gbvghjgf', '', '100'),
(9, 'C bombing', 10009, 'alksdf', 'asdfasdf', '', '', '100'),
(10, 'Hello World', 10010, 'jljlkllkjl', '', '', '', '300');

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `college_name` varchar(30) NOT NULL,
  `contingent` int(5) NOT NULL,
  `contingent_password` varchar(15) NOT NULL,
  `events_cost` int(5) NOT NULL,
  `events_approved` int(1) NOT NULL DEFAULT '0',
  `accomodation_cost` int(5) NOT NULL,
  `accomodation_approved` int(1) NOT NULL DEFAULT '0',
  `confirm` int(1) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL,
  `no_of_participants` int(3) NOT NULL,
  PRIMARY KEY (`srno`),
  UNIQUE KEY `contingent` (`contingent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`srno`, `name`, `phone`, `college_name`, `contingent`, `contingent_password`, `events_cost`, `events_approved`, `accomodation_cost`, `accomodation_approved`, `confirm`, `email`, `no_of_participants`) VALUES
(3, '', 0, 'IIT Madras', 10000, 'madras', 0, 0, 0, 0, 0, '', 0),
(4, '', 0, 'IIT Madras', 10001, 'madras', 0, 0, 0, 0, 0, '', 0),
(5, '', 0, 'IIT Madras', 10002, 'iit', 300, 0, 0, 0, 0, '', 0),
(6, '', 0, 'Anna University', 10003, 'anna', 600, 0, 0, 0, 0, '', 0),
(7, '', 0, 'IIT Madras', 10004, 'mnb', 300, 0, 0, 0, 0, '', 0),
(8, '', 0, 'IIT Madras', 10005, 'madras', 0, 0, 0, 0, 0, '', 0),
(9, '', 0, 'IIT Madras', 10006, 'iit', 300, 0, 0, 0, 0, '', 0),
(10, '', 0, '', 10007, 'srm', 0, 0, 0, 0, 0, '', 0),
(11, '', 0, '', 10008, 'srm', 100, 0, 0, 0, 0, '', 0),
(12, '', 0, '', 10009, 'srm', 100, 0, 0, 0, 0, '', 0),
(13, '', 0, '', 10010, 'srm', 300, 0, 0, 0, 1, '', 0),
(14, '', 0, '', 10011, 'srm', 0, 0, 0, 0, 0, '', 0),
(15, '', 0, '', 10012, 'srm', 0, 0, 0, 0, 0, '', 0),
(16, '', 0, '', 10013, 'madras', 0, 0, 0, 0, 0, '', 0),
(17, '', 0, '', 10014, 'qwerty', 0, 0, 0, 0, 0, '', 0),
(18, '', 0, '', 10015, 'man', 0, 0, 0, 0, 0, '', 0),
(19, '', 0, '', 10016, 'asd', 0, 0, 0, 0, 0, '', 0),
(20, '', 0, '', 10017, 'asd', 0, 0, 0, 0, 0, '', 0),
(21, '', 0, '', 10018, 'sad', 0, 0, 0, 0, 0, '', 0),
(22, '', 0, '', 10019, 'asd', 0, 0, 0, 0, 0, '', 0),
(23, '', 0, '', 10020, 'mad', 0, 0, 0, 0, 0, 'prerakmody@gmai.com', 3),
(24, '', 0, '', 10021, 'asd', 0, 0, 450, 0, 0, 'prerakmody@gmai.com', 3),
(25, '', 0, '', 10022, 'asdf', 0, 0, 0, 0, 0, 'asd@dfg.com', 2),
(26, 'prerak', 2222222222, 'SRM ', 10023, 'srm', 0, 0, 0, 0, 0, 'prer@gail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `college_names`
--

CREATE TABLE IF NOT EXISTS `college_names` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `college_names`
--

INSERT INTO `college_names` (`srno`, `name`) VALUES
(1, 'IIT Madras'),
(2, 'SRM ');

-- --------------------------------------------------------

--
-- Table structure for table `dd`
--

CREATE TABLE IF NOT EXISTS `dd` (
  `srno` int(4) NOT NULL AUTO_INCREMENT,
  `contingent` int(5) NOT NULL,
  `purpose` varchar(30) NOT NULL,
  `dd_num` int(10) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `amount` int(6) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `dd`
--


-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(30) NOT NULL,
  `type` int(1) NOT NULL,
  `max_seats` int(1) NOT NULL,
  `seats_total` int(3) NOT NULL,
  `seats_available` int(3) NOT NULL,
  `cost` int(4) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`srno`, `event_name`, `type`, `max_seats`, `seats_total`, `seats_available`, `cost`) VALUES
(1, 'Hamaari maange poori karo', 2, 3, 150, 137, 150),
(2, 'crack the code', 2, 3, 150, 128, 300),
(3, 'Hello World', 1, 3, 150, 95, 300),
(4, 'C bombing', 0, 3, 200, 145, 100);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `contingent` int(5) NOT NULL,
  `college_name` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `accomodation` int(1) NOT NULL DEFAULT '0',
  `contingent_head` int(1) NOT NULL,
  `s_date` date NOT NULL,
  `e_date` date NOT NULL,
  `gender` varchar(1) NOT NULL,
  `no_of_participants` int(3) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=80 ;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`srno`, `contingent`, `college_name`, `name`, `phone`, `email`, `accomodation`, `contingent_head`, `s_date`, `e_date`, `gender`, `no_of_participants`) VALUES
(35, 10001, 'IIT Madras', 'manu', 9892981583, '', 100, 1, '2013-09-26', '2013-09-26', 'm', 5),
(36, 10001, 'IIT Madras', 'manu', 9892981583, '', 100, 0, '2013-09-26', '2013-09-27', 'M', 0),
(37, 10002, 'IIT Madras', 'sid', 9892981583, '', 100, 1, '2013-09-26', '2013-09-26', 'm', 5),
(38, 10002, 'IIT Madras', 'prerak', 9098765432, '', 100, 0, '2013-09-26', '2013-09-26', 'M', 0),
(39, 10003, 'Anna University', 'simrandeep', 9892981583, '', 100, 1, '2013-09-26', '2013-09-27', 'm', 5),
(40, 10003, 'Anna University', 'manu', 9892981683, '', 100, 0, '2013-09-26', '2013-09-29', 'M', 0),
(41, 10003, 'Anna University', 'prerak', 9999098765, '', 100, 0, '2013-09-26', '2013-09-26', 'M', 0),
(42, 10003, 'Anna University', 'hello', 9090909090, '', 0, 0, '0000-00-00', '0000-00-00', 'F', 0),
(43, 10004, 'IIT Madras', 'simrandeep', 9892981583, '', 100, 1, '2013-09-26', '2013-09-26', 'f', 5),
(44, 10005, 'IIT Madras', 'danish', 9892981583, '', 100, 1, '2013-09-26', '2013-09-27', 'm', 5),
(45, 10005, 'IIT Madras', 'manu', 9897908767, '', 100, 0, '0000-00-00', '0000-00-00', 'M', 0),
(46, 10006, 'IIT Madras', 'manu', 9098098990, '', 100, 1, '2013-09-26', '2013-09-27', 'm', 5),
(47, 10006, 'IIT Madras', 'prerak', 9892981583, '', 100, 0, '2013-09-26', '2013-09-27', 'M', 0),
(48, 10006, 'IIT Madras', 'selvam', 9089786756, '', 100, 0, '2013-09-26', '2013-09-26', 'F', 0),
(49, 10006, 'IIT Madras', 'manu', 9892981583, '', 100, 0, '2013-09-26', '2013-09-28', 'F', 0),
(50, 10006, 'IIT Madras', 'prerak', 9098765432, '', 0, 0, '0000-00-00', '0000-00-00', 'M', 0),
(51, 10008, '', 'Prerak Mody', 9597369015, 'prerakmody@gmai.com', 100, 1, '2013-09-27', '2013-09-29', 'm', 3),
(52, 10008, '', 'Prerak Mody', 9597879878, '', 0, 0, '0000-00-00', '0000-00-00', 'M', 0),
(53, 10008, '', 'akjfhasdkj', 4444444444, '', 0, 0, '0000-00-00', '0000-00-00', 'M', 0),
(54, 10008, '', 'ghfghfgf', 56436545, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(55, 10008, '', 'jghjghjg', 76567575, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(56, 10008, '', 'nhghvh', 6756675675, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(57, 10008, '', 'gsg', 5766886799, '', 100, 0, '2013-09-26', '2013-09-26', 'm', 0),
(58, 10008, '', 'gfj', 6586787898, '', 100, 0, '2013-09-26', '2013-09-26', 'm', 0),
(59, 10008, '', 'gbvghjgf', 4444444444, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(60, 10008, '', 'argf', 2341111111, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(61, 10008, '', 'sfdsdfsf', 1111111111, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(62, 10008, '', 'sdfsdfsdfsdfsdfdssdfsdf', 1213123123, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(63, 10008, '', 'asdf', 1231231231, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(64, 10008, '', 'aa', 1111111111, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(65, 10008, '', 'adasd', 2222222222, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(66, 10009, '', 'alksdf', 1231231231, 'prer@gail.com', 0, 1, '0000-00-00', '0000-00-00', 'm', 1),
(67, 10009, '', 'asdfasdf', 1111111111, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(68, 10010, '', 'jljlkllkjl', 1111111111, 's@gmale.com', 100, 1, '2013-09-26', '2013-09-27', 'm', 5),
(69, 10010, '', 'jksd', 8978111111, '', 100, 0, '2013-09-26', '2013-09-26', 'm', 0),
(70, 10021, '', 'argf', 1222222222, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(71, 10021, '', 'asssssssssss', 1111111111, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(72, 10021, '', 'aaaaaaaa', 1111111111, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(73, 10021, '', 'aaa', 1111111122, '', 100, 0, '2013-09-26', '2013-09-27', 'f', 0),
(74, 10021, '', 'qwerty', 9999999999, '', 100, 0, '2013-09-26', '2013-09-26', 'm', 0),
(75, 10021, '', 'asdfg', 1111111111, '', 100, 0, '2013-09-26', '2013-09-28', 'm', 0),
(76, 10023, 'SRM ', 'prerak', 1111111111, '', 100, 0, '2013-09-26', '2013-09-27', 'm', 0),
(77, 10023, 'SRM ', 'manu', 9892981583, '', 100, 0, '2013-09-27', '2013-09-28', 'm', 0),
(78, 10023, 'SRM ', 'prerak', 2222222222, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0),
(79, 10023, 'SRM ', 'jksd', 8978111111, '', 0, 0, '0000-00-00', '0000-00-00', 'm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `srno` int(2) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`srno`, `username`, `password`) VALUES
(1, 'prerakmody', 'ihategravitas'),
(2, 'aditi', 'shelovegravitas');
