-- phpMyAdmin SQL Dump
-- version 4.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 25, 2013 at 07:43 PM
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

--
-- Dumping data for table `bk_badge`
--

INSERT INTO `bk_badge` (`id`, `name`, `caption`, `description`, `location`) VALUES
('First Upload', 'Unggahan Perdana', 'Yeeaay! Selamat, Anda telah berhasil mengunggah berkas kuliah untuk pertama kalinya di Berkuliah! Teruslah mengunggah berkas kuliah Anda karena setiap berkas kuliah Anda akan sangat membantu kelancaran perkuliahan di Fasilkom UI.', 'firstUpload.png'),
('Bronze Upload', 'Unggahan Kelima', 'Wow keren parah! Anda telah berhasil mengunggah untuk kelima kalinya di Berkuliah! Teruskan semangatmu untuk membantu perkuliahan di Fasilkom kita tercinta dengan mengunggah setiap berkas kuliah Anda, karena berkas Anda sangat berarti :")', 'bronzeUpload.png'),
('Silver Upload', 'Unggahan Ke-20', 'Anda telah berhasil menggunggah berkas untuk ke-20 kalinya di Berkuliah! Kami percaya bahwa tidak ada niat baik yang berakhir sia-sia di muka bumi ini. Unggahan Anda adalah salah satu niat baik yang telah terwujud menjadi sebuah perbuatan mulia. Teruslah semangat untuk mengunggah di Berkuliah!', 'silverUpload.png'),
('Gold Upload', 'Unggahan Ke-50', 'Seluruh pengguna Berkuliah harus berterima kasih kepada Anda karena Anda telah setia menggunggah di Berkuliah :") Anda telah membuktikan bahwa kepedulian akan sesama mahasiswa sungguh ada. Anda telah berkontribusi besar bagi para pengguna Berkuliah untuk mencapai kelulusan yang memuaskan.', 'goldUpload.png'),
('First Download', 'Unduhan Perdana', 'Selamat, Anda telah sukses mengunduh untuk pertama kalinya dari Berkuliah! Kami berharap berkas ini dapat membantu kelancaran perkuliahan Anda. Berkuliah akan senantiasa berusaha membantu Anda agar Anda dapat lulus dengan baik dari Universitas Indonesia.', 'firstDownload.png'),
('Bronze Download', 'Unduhan Kelima', 'Yeaaay! Anda telah mengunduh kelima kalinya dari Berkuliah! Kami sangat senang dapat hadir dan mendedikasikan Berkuliah untuk membantu perkuliahan Anda. Teruslah semangat menggunakan Berkuliah untuk mencari berkas yang Anda butuhkan.', 'bronzeDownload.png'),
('Silver Download', 'Unduhan Ke-20', 'Kami ucapkan selamat karena Anda telah setia mengunduh di Berkuliah! Kami berterima kasih Anda telah memercayakan kebutuhan pencarian berkas kuliah Anda pada Berkuliah. Kami akan terus berusaha mengembangkan diri karena kepuasan Anda adalah sukacita kami. Terus semangat ya!', 'silverDownload.png'),
('Gold Download', 'Unduhan Ke-50', 'Wooow, selamat Anda telah mengunduh berkas di Berkuliah untuk ke-50 kalinya. Kami percaya bahwa keputusan Anda untuk menggunakan Berkuliah sebagai media berbagi berkas akan berbuah manis bagi jalan menuju kelulusan Anda. Teruslah semangat untuk mengunduh berkas dari Berkuliah :)', 'goldDownload.png');
