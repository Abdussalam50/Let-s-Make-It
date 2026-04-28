-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 21, 2025 at 08:02 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `databases_2025_alfathra_olahraga_beban`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_admin`
--

CREATE TABLE IF NOT EXISTS `data_admin` (
  `id_admin` varchar(50) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_artikel_tips`
--

CREATE TABLE IF NOT EXISTS `data_artikel_tips` (
  `id_artikel_tips` varchar(50) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `artikel` text NOT NULL,
  PRIMARY KEY (`id_artikel_tips`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_detail_latihan`
--

CREATE TABLE IF NOT EXISTS `data_detail_latihan` (
  `id_detail_latihan` varchar(50) NOT NULL,
  `id_jenis_latihan` varchar(50) NOT NULL,
  `id_tipe_latihan` varchar(50) NOT NULL,
  `gerakkan` varchar(100) NOT NULL,
  `set` enum('1','2','3','4','5') NOT NULL,
  `repetisi` enum('6','7','8,','9','10','11') NOT NULL,
  `durasi` varchar(10) NOT NULL,
  `link_video` varchar(400) NOT NULL,
  `level_latihan` enum('Pemula','Menengah','Lanjutan') NOT NULL,
  PRIMARY KEY (`id_detail_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_detail_program`
--

CREATE TABLE IF NOT EXISTS `data_detail_program` (
  `id_detail_program` varchar(50) NOT NULL,
  `id_program_latihan` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `id_detail_latihan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_detail_program`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_hasil_quiz`
--

CREATE TABLE IF NOT EXISTS `data_hasil_quiz` (
  `id_hasil_quiz` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `nilai` varchar(10) NOT NULL,
  `level_latihan` enum('Pemula','Menengah','Lanjutan') NOT NULL,
  PRIMARY KEY (`id_hasil_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_jenis_latihan`
--

CREATE TABLE IF NOT EXISTS `data_jenis_latihan` (
  `id_jenis_latihan` varchar(50) NOT NULL,
  `jenis_latihan` enum('Fullbody','Upper body','Lower Body','Push day','Pull day','Leg Day','Arm day','Cardio') NOT NULL,
  PRIMARY KEY (`id_jenis_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_program_latihan`
--

CREATE TABLE IF NOT EXISTS `data_program_latihan` (
  `id_program_latihan` varchar(50) NOT NULL,
  `nama_program` varchar(200) NOT NULL,
  `level_latihan` enum('Pemula','Menengah','Lanjutan') NOT NULL,
  PRIMARY KEY (`id_program_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_quiz`
--

CREATE TABLE IF NOT EXISTS `data_quiz` (
  `id_quiz` varchar(50) NOT NULL,
  `no_quiz` varchar(10) NOT NULL,
  `quiz` text NOT NULL,
  `pilihan_a` varchar(200) NOT NULL,
  `pilihan_b` varchar(200) NOT NULL,
  `pilihan_c` varchar(200) NOT NULL,
  `pilihan_d` varchar(200) NOT NULL,
  `bobot_a` int(4) NOT NULL,
  `bobot_b` int(4) NOT NULL,
  `bobot_c` int(4) NOT NULL,
  `bobot_d` int(4) NOT NULL,
  PRIMARY KEY (`id_quiz`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_riwayat_latihan`
--

CREATE TABLE IF NOT EXISTS `data_riwayat_latihan` (
  `id_riwayat_latihan` varchar(50) NOT NULL,
  `id_user` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL,
  `id_program_latihan` varchar(50) NOT NULL,
  `id_tipe_latihan` varchar(50) NOT NULL,
  PRIMARY KEY (`id_riwayat_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_tipe_latihan`
--

CREATE TABLE IF NOT EXISTS `data_tipe_latihan` (
  `id_tipe_latihan` varchar(50) NOT NULL,
  `tipe_latihan` enum('Gym','Rumah') NOT NULL,
  PRIMARY KEY (`id_tipe_latihan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
--

CREATE TABLE IF NOT EXISTS `data_user` (
  `id_user` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `berat_badan` varchar(30) NOT NULL,
  `tinggi_badan` varchar(30) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
