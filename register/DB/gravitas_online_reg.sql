-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 30, 2013 at 09:22 AM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `college_name` varchar(30) NOT NULL,
  `contingent` int(5) NOT NULL,
  `contingent_password` varchar(15) NOT NULL,
  `events_cost` int(5) NOT NULL,
  `events_approved` int(1) NOT NULL DEFAULT '0',
  `accomodation_cost` int(5) NOT NULL,
  `accomodation_approved` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`srno`),
  UNIQUE KEY `contingent` (`contingent`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `colleges`
--

INSERT INTO `colleges` (`srno`, `college_name`, `contingent`, `contingent_password`, `events_cost`, `events_approved`, `accomodation_cost`, `accomodation_approved`) VALUES
(1, 'Sample', 10000, 'sample', 300, 1, 300, 0),
(10, 'IIT Madras', 10001, 'madras', 0, 0, 0, 0),
(11, 'NIT Trichy', 10002, 'trichy', 0, 0, 0, 0),
(12, 'IIT Madras', 10003, 'madras', 0, 0, 0, 0),
(13, 'IIT Madras', 10004, 'madras', 0, 0, 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`srno`, `event_name`, `type`, `max_seats`, `seats_total`, `seats_available`, `cost`) VALUES
(1, 'Hamaari maange poori karo', 2, 3, 150, 150, 150),
(2, 'crack the code', 2, 3, 150, 152, 300),
(3, 'Hello World', 1, 3, 150, 150, 300);

-- --------------------------------------------------------

--
-- Table structure for table `participants`
--

CREATE TABLE IF NOT EXISTS `participants` (
  `srno` int(5) NOT NULL AUTO_INCREMENT,
  `contingent` int(5) NOT NULL,
  `college_name` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` int(10) NOT NULL,
  `accomodation` int(1) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  PRIMARY KEY (`srno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `participants`
--

INSERT INTO `participants` (`srno`, `contingent`, `college_name`, `name`, `phone`, `accomodation`, `date`) VALUES
(15, 10001, 'IIT Madras', 'Prerak Mody', 2147483647, 2, '0000-00-00'),
(16, 10001, 'IIT Madras', 'Pranjal', 123456789, 1, '0000-00-00'),
(20, 10001, 'IIT Madras', 'Aditi', 789456123, 1, '2013-08-08'),
(21, 10001, 'IIT Madras', 'Sample', 1234567900, 3, '2013-07-31'),
(22, 10002, 'NIT Trichy', 'Prerak', 2147483647, 1, '2013-07-30'),
(23, 10002, 'NIT Trichy', 'Aditi', 789456123, 3, '2013-09-26'),
(24, 10002, 'NIT Trichy', 'askdfjlal;ksdj`', 654564654, 0, '0000-00-00'),
(25, 10002, 'NIT Trichy', 'Hello', 97654321, 4, '0000-00-00'),
(26, 10003, 'IIT Madras', 'Preak', 2147483647, 1, '2013-07-31'),
(27, 10003, 'IIT Madras', 'Pranjal', 789456123, 1, '2013-07-30'),
(28, 10003, 'IIT Madras', 'Aditi', 789654123, 0, '0000-00-00'),
(29, 10003, 'IIT Madras', 'Sample', 1598654785, 0, '0000-00-00'),
(30, 10004, 'IIT Madras', 'Prerak', 2147483647, 2, '2013-09-26'),
(31, 10004, 'IIT Madras', 'Aditi', 2147483647, 2, '2013-09-27'),
(32, 10004, 'IIT Madras', 'Pranjal', 2147483647, 3, '2013-09-25');

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
