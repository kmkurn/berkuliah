-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2013 at 11:02 AM
-- Server version: 5.5.30-MariaDB-log
-- PHP Version: 5.4.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `bk_course`
--

CREATE TABLE IF NOT EXISTS `bk_course` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `faculty_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `faculty_id` (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_download_info`
--

CREATE TABLE IF NOT EXISTS `bk_download_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`,`note_id`),
  KEY `note_id` (`note_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_faculty`
--

CREATE TABLE IF NOT EXISTS `bk_faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_note`
--

CREATE TABLE IF NOT EXISTS `bk_note` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `description` text,
  `type` int(11) NOT NULL,
  `location` varchar(64) NOT NULL,
  `course_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `upload_timestamp` datetime NOT NULL,
  `edit_timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  KEY `upload_user_id` (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_student`
--

CREATE TABLE IF NOT EXISTS `bk_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `photo` varchar(64) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bk_course`
--
ALTER TABLE `bk_course`
  ADD CONSTRAINT `bk_course_ibfk_1` FOREIGN KEY (`faculty_id`) REFERENCES `bk_faculty` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bk_download_info`
--
ALTER TABLE `bk_download_info`
  ADD CONSTRAINT `bk_download_info_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bk_download_info_ibfk_2` FOREIGN KEY (`note_id`) REFERENCES `bk_note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bk_note`
--
ALTER TABLE `bk_note`
  ADD CONSTRAINT `bk_note_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `bk_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bk_note_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
