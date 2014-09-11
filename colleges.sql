-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 07, 2013 at 08:27 AM
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
