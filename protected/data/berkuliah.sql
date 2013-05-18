-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 18, 2013 at 03:44 PM
-- Server version: 5.5.31-0ubuntu0.13.04.1
-- PHP Version: 5.4.9-4ubuntu2

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
-- Table structure for table `bk_badge`
--

CREATE TABLE IF NOT EXISTS `bk_badge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `location` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=216 ;

--
-- Dumping data for table `bk_course`
--

INSERT INTO `bk_course` (`id`, `name`, `faculty_id`) VALUES
(109, 'Administrasi Bisnis', 1),
(110, 'Administrasi Sistem', 1),
(111, 'Aljabar Linier', 1),
(112, 'Aljabar Linier Numerik', 1),
(113, 'Analisis Numerik', 1),
(114, 'Aproksimasi & Sistem Nonlinier', 1),
(115, 'Basis Data Lanjut', 1),
(116, 'Bioinformatika', 1),
(117, 'Business Intelligence', 1),
(118, 'Computational Geometry', 1),
(119, 'Customer Relationship Management', 1),
(120, 'Dasar-Dasar Arsitektur Komputer', 1),
(121, 'Dasar-Dasar Audit SI', 1),
(122, 'Dasar-Dasar Pemrograman', 1),
(123, 'Data Mining', 1),
(124, 'Desain & Analisis Algoritma', 1),
(125, 'E-Commerce', 1),
(126, 'Embedded Systems', 1),
(127, 'Enterprise Application Integration', 1),
(128, 'Enterprise Resource Planning', 1),
(129, 'Fisika Dasar 1', 1),
(130, 'Fisika Dasar 2', 1),
(131, 'Game Development', 1),
(132, 'Geometric Modelling', 1),
(133, 'Grafika Komputer', 1),
(134, 'Infrastruktur TI Modern', 1),
(135, 'Jaringan Komputer', 1),
(136, 'Jaringan Komunikasi Data', 1),
(137, 'Kerja Praktik', 1),
(138, 'Komputasi Lunak', 1),
(139, 'Komputer & Masyarakat', 1),
(140, 'Komunikasi Bisnis dan Teknis', 1),
(141, 'Konfigurasi ERP', 1),
(142, 'Kriptografi & Keamanan Informasi', 1),
(143, 'Layanan & Aplikasi Web', 1),
(144, 'Logika Komputasional', 1),
(145, 'Manajemen Keamanan Informasi', 1),
(146, 'Manajemen Layanan TI', 1),
(147, 'Manajemen Pengetahuan', 1),
(148, 'Manajemen Proyek TI', 1),
(149, 'Manajemen Sistem Informasi', 1),
(150, 'Manajemen Sumber Daya Manusia', 1),
(151, 'Matematika Dasar 1', 1),
(152, 'Matematika Dasar 2', 1),
(153, 'Matematika Diskret 1', 1),
(154, 'Matematika Diskret 2', 1),
(155, 'Metode Formal', 1),
(156, 'Metodologi Penelitian & Penulisan Ilmiah', 1),
(157, 'MPK Agama', 1),
(158, 'MPK Bahasa Inggris', 1),
(159, 'MPK Seni & Olahraga', 1),
(160, 'MPKT A', 1),
(161, 'MPKT B', 1),
(162, 'Organisasi Sistem Komputer', 1),
(163, 'Pemelajaran Mesin', 1),
(164, 'Pemrograman Deklaratif', 1),
(165, 'Pemrograman Konkuren & Parallel', 1),
(166, 'Pemrograman Logika', 1),
(167, 'Pemrograman Sistem', 1),
(168, 'Pengajaran Berbantuan Komputer', 1),
(169, 'Pengantar Organisasi Komputer', 1),
(170, 'Pengantar Sistem Dijital', 1),
(171, 'Pengembangan dan Pemasaran Produk', 1),
(172, 'Pengembangan Perangkat Lunak Open Source', 1),
(173, 'Pengolahan Bahasa Manusia', 1),
(174, 'Pengolahan Citra', 1),
(175, 'Pengolahan Multimedia', 1),
(176, 'Pengolahan Sinyal Dijital', 1),
(177, 'Penjaminan Mutu Perangkat Lunak', 1),
(178, 'Penulisan Ilmiah', 1),
(179, 'Perancangan & Pemrograman Web', 1),
(180, 'Perilaku Organisasi', 1),
(181, 'Perolehan Informasi', 1),
(182, 'Persamaan Diferensial', 1),
(183, 'Prinsip-Prinsip Manajemen', 1),
(184, 'Prinsip-Prinsip Sistem Informasi', 1),
(185, 'Proyek Pengembangan Sistem Informasi', 1),
(186, 'Proyek Perangkat Lunak', 1),
(187, 'Rancangan Sistem Dijital', 1),
(188, 'Rekayasa Perangkat Lunak', 1),
(189, 'Riset Operasi', 1),
(190, 'Robotika', 1),
(191, 'Semantic Web', 1),
(192, 'Simulasi & Pemodelan', 1),
(193, 'Sistem Cerdas', 1),
(194, 'Sistem Informasi Akuntansi dan Keuangan', 1),
(195, 'Sistem Informasi Geografis', 1),
(196, 'Sistem Informasi Kesehatan', 1),
(197, 'Sistem Interaksi', 1),
(198, 'Sistem Operasi', 1),
(199, 'Sistem Terdistribusi', 1),
(200, 'Statistika & Probabilitas', 1),
(201, 'Struktur Data & Algoritma', 1),
(202, 'Supply Chain Management', 1),
(203, 'Technopreneurship', 1),
(204, 'Teknik Kompilator', 1),
(205, 'Teknologi Mobile', 1),
(206, 'Teori Bahasa & Automata', 1),
(207, 'Teori Informasi', 1),
(208, 'Topik Khusus Arsitektur & Infrastruktur', 1),
(209, 'Topik Khusus Bidang Minat Enterprise System', 1),
(210, 'Topik Khusus Bidang Minat Teknologi Informasi', 1),
(211, 'Topik Khusus Kecerdasan Komputasional', 1),
(212, 'Topik Khusus Pengolahan Informasi Multimedia', 1),
(213, 'Topik Khusus Teknologi Perangkat Lunak', 1),
(214, 'Tugas Akhir', 1),
(215, 'Ubiquitous & Net-Centric Computing', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_faculty`
--

CREATE TABLE IF NOT EXISTS `bk_faculty` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bk_faculty`
--

INSERT INTO `bk_faculty` (`id`, `name`) VALUES
(1, 'Fakultas Ilmu Komputer');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_rate`
--

CREATE TABLE IF NOT EXISTS `bk_rate` (
  `student_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `value` double NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`student_id`,`note_id`),
  KEY `note_id` (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bk_report`
--

CREATE TABLE IF NOT EXISTS `bk_report` (
  `student_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  PRIMARY KEY (`student_id`,`note_id`),
  KEY `note_id` (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bk_review`
--

CREATE TABLE IF NOT EXISTS `bk_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `timestamp` datetime NOT NULL,
  `student_id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`,`note_id`),
  KEY `note_id` (`note_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_student`
--

CREATE TABLE IF NOT EXISTS `bk_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(64) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `bio` text,
  `photo` varchar(64) DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `last_login_timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `bk_student_badge`
--

CREATE TABLE IF NOT EXISTS `bk_student_badge` (
  `student_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`,`badge_id`),
  KEY `badge_id` (`badge_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bk_testimonial`
--

CREATE TABLE IF NOT EXISTS `bk_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `status` int(11) NOT NULL,
  `timestamp` datetime NOT NULL,
  `student_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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

--
-- Constraints for table `bk_rate`
--
ALTER TABLE `bk_rate`
  ADD CONSTRAINT `bk_rate_ibfk_2` FOREIGN KEY (`note_id`) REFERENCES `bk_note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bk_rate_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bk_report`
--
ALTER TABLE `bk_report`
  ADD CONSTRAINT `bk_report_ibfk_2` FOREIGN KEY (`note_id`) REFERENCES `bk_note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bk_report_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bk_review`
--
ALTER TABLE `bk_review`
  ADD CONSTRAINT `bk_review_ibfk_2` FOREIGN KEY (`note_id`) REFERENCES `bk_note` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bk_review_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bk_student_badge`
--
ALTER TABLE `bk_student_badge`
  ADD CONSTRAINT `bk_student_badge_ibfk_2` FOREIGN KEY (`badge_id`) REFERENCES `bk_badge` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bk_student_badge_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bk_testimonial`
--
ALTER TABLE `bk_testimonial`
  ADD CONSTRAINT `bk_testimonial_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `bk_student` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
