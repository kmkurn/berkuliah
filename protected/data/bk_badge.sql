-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 24, 2013 at 03:55 PM
-- Server version: 5.5.30-MariaDB-log
-- PHP Version: 5.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `berkuliah`
--

-- --------------------------------------------------------

--
-- Table structure for table `bk_badge`
--

CREATE TABLE IF NOT EXISTS `bk_badge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `location` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `bk_badge`
--

INSERT INTO `bk_badge` (`id`, `name`, `location`) VALUES
(1, 'Bronze Upload', 'unggahan_bronze.png'),
(2, 'Silver Upload', 'unggahan_silver.png'),
(3, 'Gold Upload', 'unggahan_gold.png');
