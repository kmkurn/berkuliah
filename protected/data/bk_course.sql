-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2013 at 11:09 AM
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
-- Dumping data for table `bk_course`
--

INSERT INTO `bk_course` (`id`, `name`, `faculty_id`) VALUES
(1, 'Administrasi Bisnis', 1),
(2, 'Administrasi Sistem', 1),
(3, 'Aljabar Linier', 1),
(4, 'Aljabar Linier Numerik', 1),
(5, 'Analisis Numerik', 1),
(6, 'Aproksimasi & Sistem Nonlinier', 1),
(7, 'Basis Data Lanjut', 1),
(8, 'Bioinformatika', 1),
(9, 'Business Intelligence', 1),
(10, 'Computational Geometry', 1),
(11, 'Customer Relationship Management', 1),
(12, 'Dasar-Dasar Arsitektur Komputer', 1),
(13, 'Dasar-Dasar Audit SI', 1),
(14, 'Dasar-Dasar Pemrograman', 1),
(15, 'Data Mining', 1),
(16, 'Desain & Analisis Algoritma', 1),
(17, 'E-Commerce', 1),
(18, 'Embedded Systems', 1),
(19, 'Enterprise Application Integration', 1),
(20, 'Enterprise Resource Planning', 1),
(21, 'Fisika Dasar 1', 1),
(22, 'Fisika Dasar 2', 1),
(23, 'Game Development', 1),
(24, 'Geometric Modelling', 1),
(25, 'Grafika Komputer', 1),
(26, 'Infrastruktur TI Modern', 1),
(27, 'Jaringan Komputer', 1),
(28, 'Jaringan Komunikasi Data', 1),
(29, 'Kerja Praktik', 1),
(30, 'Komputasi Lunak', 1),
(31, 'Komputer & Masyarakat', 1),
(32, 'Komunikasi Bisnis dan Teknis', 1),
(33, 'Konfigurasi ERP', 1),
(34, 'Kriptografi & Keamanan Informasi', 1),
(35, 'Layanan & Aplikasi Web', 1),
(36, 'Logika Komputasional', 1),
(37, 'Manajemen Keamanan Informasi', 1),
(38, 'Manajemen Layanan TI', 1),
(39, 'Manajemen Pengetahuan', 1),
(40, 'Manajemen Proyek TI', 1),
(41, 'Manajemen Sistem Informasi', 1),
(42, 'Manajemen Sumber Daya Manusia', 1),
(43, 'Matematika Dasar 1', 1),
(44, 'Matematika Dasar 2', 1),
(45, 'Matematika Diskret 1', 1),
(46, 'Matematika Diskret 2', 1),
(47, 'Metode Formal', 1),
(48, 'Metodologi Penelitian & Penulisan Ilmiah', 1),
(49, 'MPK Agama', 1),
(50, 'MPK Bahasa Inggris', 1),
(51, 'MPK Seni & Olahraga', 1),
(52, 'MPKT A', 1),
(53, 'MPKT B', 1),
(54, 'Organisasi Sistem Komputer', 1),
(55, 'Pemelajaran Mesin', 1),
(56, 'Pemrograman Deklaratif', 1),
(57, 'Pemrograman Konkuren & Parallel', 1),
(58, 'Pemrograman Logika', 1),
(59, 'Pemrograman Sistem', 1),
(60, 'Pengajaran Berbantuan Komputer', 1),
(61, 'Pengantar Organisasi Komputer', 1),
(62, 'Pengantar Sistem Dijital', 1),
(63, 'Pengembangan dan Pemasaran Produk', 1),
(64, 'Pengembangan Perangkat Lunak Open Source', 1),
(65, 'Pengolahan Bahasa Manusia', 1),
(66, 'Pengolahan Citra', 1),
(67, 'Pengolahan Multimedia', 1),
(68, 'Pengolahan Sinyal Dijital', 1),
(69, 'Penjaminan Mutu Perangkat Lunak', 1),
(70, 'Penulisan Ilmiah', 1),
(71, 'Perancangan & Pemrograman Web', 1),
(72, 'Perilaku Organisasi', 1),
(73, 'Perolehan Informasi', 1),
(74, 'Persamaan Diferensial', 1),
(75, 'Prinsip-Prinsip Manajemen', 1),
(76, 'Prinsip-Prinsip Sistem Informasi', 1),
(77, 'Proyek Pengembangan Sistem Informasi', 1),
(78, 'Proyek Perangkat Lunak', 1),
(79, 'Rancangan Sistem Dijital', 1),
(80, 'Rekayasa Perangkat Lunak', 1),
(81, 'Riset Operasi', 1),
(82, 'Robotika', 1),
(83, 'Semantic Web', 1),
(84, 'Simulasi & Pemodelan', 1),
(85, 'Sistem Cerdas', 1),
(86, 'Sistem Informasi Akuntansi dan Keuangan', 1),
(87, 'Sistem Informasi Geografis', 1),
(88, 'Sistem Informasi Kesehatan', 1),
(89, 'Sistem Interaksi', 1),
(90, 'Sistem Operasi', 1),
(91, 'Sistem Terdistribusi', 1),
(92, 'Statistika & Probabilitas', 1),
(93, 'Struktur Data & Algoritma', 1),
(94, 'Supply Chain Management', 1),
(95, 'Technopreneurship', 1),
(96, 'Teknik Kompilator', 1),
(97, 'Teknologi Mobile', 1),
(98, 'Teori Bahasa & Automata', 1),
(99, 'Teori Informasi', 1),
(100, 'Topik Khusus Arsitektur & Infrastruktur', 1),
(101, 'Topik Khusus Bidang Minat Enterprise System', 1),
(102, 'Topik Khusus Bidang Minat Teknologi Informasi', 1),
(103, 'Topik Khusus Kecerdasan Komputasional', 1),
(104, 'Topik Khusus Pengolahan Informasi Multimedia', 1),
(105, 'Topik Khusus Teknologi Perangkat Lunak', 1),
(106, 'Tugas Akhir', 1),
(107, 'Ubiquitous & Net-Centric Computing', 1),
(108, 'Basis Data', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
