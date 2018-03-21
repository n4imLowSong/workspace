-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2017 at 11:15 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezr`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `mk_uid` int(11) NOT NULL,
  `tarikh_borang` date NOT NULL,
  `sebab_cuti` varchar(128) NOT NULL,
  `mk_tarikh_mula` date NOT NULL,
  `mk_tarikh_akhir` date NOT NULL,
  `bh_am` int(11) NOT NULL,
  `bh_rehat` int(11) NOT NULL,
  `bh_sabtu` int(11) NOT NULL,
  `bh_dipohon` int(11) NOT NULL,
  `bh_seluruh` int(11) NOT NULL,
  `mp_uid` int(11) NOT NULL,
  `mp_pengesahan` tinyint(1) DEFAULT NULL,
  `mp_tarikh_sah` date DEFAULT NULL,
  `mk_pengesahan` tinyint(1) DEFAULT NULL,
  `sp_uid` int(11) NOT NULL,
  `sp_sokongan` tinyint(1) DEFAULT NULL,
  `sp_tarikh_sah` date DEFAULT NULL,
  `kp_uid` int(11) NOT NULL,
  `kp_baki_sebelum` int(11) DEFAULT NULL,
  `kp_baki_selepas` int(11) DEFAULT NULL,
  `kp_rekod` varchar(64) DEFAULT NULL,
  `kp_tarikh_rekod` date DEFAULT NULL,
  `kpk_uid` int(11) NOT NULL,
  `kp_kelulusan` tinyint(1) DEFAULT NULL,
  `kp_tarikh_lulus` date DEFAULT NULL,
  `is_read` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `mk_uid`, `tarikh_borang`, `sebab_cuti`, `mk_tarikh_mula`, `mk_tarikh_akhir`, `bh_am`, `bh_rehat`, `bh_sabtu`, `bh_dipohon`, `bh_seluruh`, `mp_uid`, `mp_pengesahan`, `mp_tarikh_sah`, `mk_pengesahan`, `sp_uid`, `sp_sokongan`, `sp_tarikh_sah`, `kp_uid`, `kp_baki_sebelum`, `kp_baki_selepas`, `kp_rekod`, `kp_tarikh_rekod`, `kpk_uid`, `kp_kelulusan`, `kp_tarikh_lulus`, `is_read`) VALUES
(80, 8, '2016-12-29', 'REHAT', '2016-12-29', '2017-01-01', 0, 1, 1, 2, 4, 6, 1, '2016-12-29', 1, 4, 1, '2016-12-29', 1, 27, 25, NULL, NULL, 0, 1, '2017-01-03', ',6,4,'),
(81, 8, '2017-01-03', 'REHAT', '2017-01-04', '2017-01-31', 2, 4, 3, 18, 27, 6, 1, '2017-01-03', 1, 4, 1, '2017-01-03', 3, 25, 7, NULL, NULL, 0, 1, '2017-01-03', ',6,4,');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(86) NOT NULL,
  `ic` varchar(12) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `jawatan` varchar(64) NOT NULL,
  `jabatan` varchar(86) NOT NULL,
  `baki_cuti` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `ic`, `nama`, `pass`, `jawatan`, `jabatan`, `baki_cuti`) VALUES
(1, 'admin', '1111-11-1111', 'ADMIN', 'admin123', 'admin', 'PENGARAH', 2017),
(2, 'ceo', '9999-99-9999', 'RUDDY AFENDDY BIN NEKMAS', 'ceo123', 'PENGARAH URUSAN', 'HR', 34),
(3, 'hr_one', '2222-22-2222', 'KAMARUL HISHAM BIN ELIAS', 'hr123', 'PENYELARAS KEWANGAN & PENTADBIRAN', 'HR', 17),
(4, 'dev_one', '3333-33-3333', 'WAN MOHD SABRI BIN WAN ABDUL RASHID', 'dev123', 'KETUA UNIT PEMBANGUNAN PERISIAN', 'DEV', 17),
(5, 'sup_one', '4444-44-4444', 'MOHD AZIZIE BIN SHAMSUDDIN', 'sup123', 'KETUA UNIT SOKONGAN TEKNIKAL', 'SUP', 17),
(6, 'dev_three', '7777-77-7777', 'SYED MOHD'' AIZAT HADRI BIN SYED SALLEH', 'dev123', 'STAFF UNIT PEMBANGUNAN PERISIAN', 'DEV', 17),
(7, 'hr_two', '8888-88-8888', 'ABDUL HALIM BIN ABDUL RAHMAN', 'hr123', 'STAFF PENYELARAS KEWANGAN & PENTADBIRAN', 'HR', 17),
(8, 'dev_two', '930316115519', 'MUHAMMAD NAIM BIN MUHAMAD', 'dev123', 'STAFF PEMBANGUNAN PERISIAN', 'DEV', 7),
(9, 'sup_two', '6666-66-6666', 'AHMAD AFIQ BIN ABD WAHAB', 'sup123', 'STAFF SOKONGAN TEKNIKAL', 'SUP', 17);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ic` (`ic`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
