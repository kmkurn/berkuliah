-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 26, 2013 at 06:51 PM
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

--
-- Dumping data for table `bk_badge`
--

INSERT INTO `bk_badge` (`id`, `name`, `caption`, `description`, `location`) VALUES
(1, 'First Upload', 'Unggahan Perdana', 'Yeeaay! Teruslah mengunggah karena setiap berkas kuliah Anda akan sangat membantu kelancaran perkuliahan di Fasilkom UI.', 'firstUpload.png'),
(2, 'Bronze Upload', 'Unggahan ke-5', 'Wow keren parah! Teruskan semangatmu untuk membantu perkuliahan di Fasilkom UI, karena berkas Anda sangat berarti :")', 'bronzeUpload.png'),
(3, 'Silver Upload', 'Unggahan ke-20', 'Kami percaya bahwa tidak ada niat baik yang berakhir sia-sia di muka bumi ini. Teruslah semangat untuk mengunggah di Berkuliah!', 'silverUpload.png'),
(4, 'Gold Upload', 'Unggahan ke-50', 'Seluruh pengguna BerKuliah harus berterima kasih kepada Anda karena Anda telah setia menggunggah di Berkuliah. \nTerima kasih!', 'goldUpload.png'),
(5, 'First Download', 'Unduhan Perdana', 'Kami berharap berkas ini dapat membantu kelancaran perkuliahan Anda. Kami doakan semoga Anda cepat lulus dengan baik dari UI!', 'firstDownload.png'),
(6, 'Bronze Download', 'Unduhan ke-5', 'Yeeaay! Kami senang membantu perkuliahan Anda. Teruslah semangat menggunakan Berkuliah untuk mencari berkas yang Anda butuhkan.', 'bronzeDownload.png'),
(7, 'Silver Download', 'Unduhan ke-20', 'Kami berterima kasih Anda telah memercayakan kebutuhan pencarian berkas kuliah Anda pada Berkuliah. Terus semangat ya!', 'silverDownload.png'),
(8, 'Gold Download', 'Unduhan ke-50', 'Woooow! Kami percaya bahwa keputusan Anda untuk menggunakan BerKuliah akan berbuah manis bagi jalan menuju kelulusan Anda.', 'goldDownload.png');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
