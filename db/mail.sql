-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2018 at 07:03 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mail`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposition`
--

CREATE TABLE `disposition` (
  `id_disposition` int(4) NOT NULL,
  `disposition_at` varchar(50) NOT NULL,
  `disposition_date` date NOT NULL,
  `dess` text NOT NULL,
  `notification` varchar(50) NOT NULL,
  `id_mail` int(2) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `disposition`
--

INSERT INTO `disposition` (`id_disposition`, `disposition_at`, `disposition_date`, `dess`, `notification`, `id_mail`, `id_user`) VALUES
(2, 'RPL', '2018-02-28', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'biasa', 16, 1),
(4, 'RPL', '2018-02-28', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'biasa', 15, 4);

--
-- Triggers `disposition`
--
DELIMITER $$
CREATE TRIGGER `status_disposisi` AFTER INSERT ON `disposition` FOR EACH ROW update mail_in set status = '1' where id_mail = new.id_mail
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(4) NOT NULL,
  `instansi_name` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `instansi_name`, `address`, `telp`, `fax`, `website`, `contact`, `file`) VALUES
(1, 'SEKOLAH MENENGAH KEJURUAN NEGERI 1 DENPASAR', 'Jalan Hos Cokroaminoto No. 84 Denpasar', '(0361) 422401', '(0361) 425603', 'www.smkn1denpasar.sch.id', 'contact@smkn1denpasar.sch.id', 'logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `mail_in`
--

CREATE TABLE `mail_in` (
  `id_mail` int(4) NOT NULL,
  `mail_code` varchar(50) NOT NULL,
  `incoming_at` date NOT NULL,
  `mail_date` date NOT NULL,
  `mail_from` varchar(50) NOT NULL,
  `mail_to` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `dess` text NOT NULL,
  `status` int(5) NOT NULL,
  `file` varchar(50) NOT NULL,
  `id_mail_type` int(2) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_in`
--

INSERT INTO `mail_in` (`id_mail`, `mail_code`, `incoming_at`, `mail_date`, `mail_from`, `mail_to`, `subject`, `dess`, `status`, `file`, `id_mail_type`, `id_user`) VALUES
(14, '046/AFK/VII/2018', '2018-02-28', '2018-02-28', 'Kemendigbud', 'SMK N 1 Denpasar', 'Sosialisasi Kurikulum Baru', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '-', 1, 1),
(15, '002/GSD/XXI/2018', '2018-02-28', '2018-02-27', 'Stikom Bali', 'SMK N 1 Denpasar', 'Sosialisasi Kampus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, '-', 1, 1),
(16, '091/STK/IV/2018', '2018-02-28', '2018-02-26', 'Stokom Bali', 'SMK N 1 Denpasar', 'Lomba Web Design', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1, 'surat_03.jpg', 1, 1),
(18, '002/DPS/VII/2018', '2018-02-28', '2018-02-22', 'Pemkot Denpasar', 'SMK N 1 Denpasar', 'Memeriahkan Hut Kota Denpasar', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'surat_01.jpg', 2, 6),
(19, '068/GGW/XIV/2018', '2018-02-28', '2018-02-27', 'Politeknik Negeri Bali', 'SMK N 1 Denpasar', 'Lomba Database', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '-', 2, 6),
(20, '123/ASSS/2018', '2018-02-28', '2018-02-27', 'stikom', 'Kepala Sekolah SMK N 1 Denpasar', 'Undangan Lomba', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, 'surat_01.jpg', 2, 6);

--
-- Triggers `mail_in`
--
DELIMITER $$
CREATE TRIGGER `delete_disposisi` AFTER DELETE ON `mail_in` FOR EACH ROW DELETE FROM disposition WHERE id_mail=old.id_mail
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mail_out`
--

CREATE TABLE `mail_out` (
  `id_mail_out` int(4) NOT NULL,
  `mail_code` varchar(50) NOT NULL,
  `mail_date` date NOT NULL,
  `mail_to` varchar(50) NOT NULL,
  `subject` varchar(50) NOT NULL,
  `dess` text NOT NULL,
  `file` varchar(50) NOT NULL,
  `id_mail_type` int(2) NOT NULL,
  `id_user` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_out`
--

INSERT INTO `mail_out` (`id_mail_out`, `mail_code`, `mail_date`, `mail_to`, `subject`, `dess`, `file`, `id_mail_type`, `id_user`) VALUES
(8, '087/YUI/XII/2018', '2018-02-28', 'Seluruh Siswa Kelas XII', 'Study Tour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '-', 1, 1),
(9, '122/ASS/XVI/2018', '2018-02-28', 'Bambu Media', 'Penyuluhan Praktek Kerja Indistri', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'surat_02.jpg', 2, 1),
(10, '123/HSJ/XIV/2018', '2018-02-28', 'Stiki Indonesia', 'Penyuluhan Kampus', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '-', 2, 1),
(11, '940/ASF/XXV/2018', '2018-02-28', 'Seluruh Siswa SMK N 1 Denpasar', 'Rapat Orang Tua', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '-', 2, 6),
(12, '445/ERDF/2018', '2018-02-28', 'Kepala Sekolah SMA N 7 Denpasar', 'Undangan memeriahkan HUT SMK  N 1 ke-58', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '-', 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `mail_type`
--

CREATE TABLE `mail_type` (
  `id_mail_type` int(4) NOT NULL,
  `mail_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mail_type`
--

INSERT INTO `mail_type` (`id_mail_type`, `mail_type`) VALUES
(1, 'pemberitahuan'),
(2, 'undangan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `fullname`, `level`) VALUES
(1, 'admin', 'admin', 'Bratha', 'admin'),
(4, 'kepala', 'kepala', 'Arip', 'kepala_kantor'),
(6, 'resepsionis', 'resepsionis', 'Ketut', 'resepsionis'),
(8, 'ocha', 'ocha', 'ocha', 'resepsionis'),
(9, 'krisna', 'krisna', 'krisna', 'resepsionis');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_disposition`
-- (See below for the actual view)
--
CREATE TABLE `view_disposition` (
`id_disposition` int(4)
,`disposition_at` varchar(50)
,`disposition_date` date
,`dess` text
,`notification` varchar(50)
,`mail_code` varchar(50)
,`incoming_at` date
,`mail_from` varchar(50)
,`fullname` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `view_disposition`
--
DROP TABLE IF EXISTS `view_disposition`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_disposition`  AS  select `disposition`.`id_disposition` AS `id_disposition`,`disposition`.`disposition_at` AS `disposition_at`,`disposition`.`disposition_date` AS `disposition_date`,`disposition`.`dess` AS `dess`,`disposition`.`notification` AS `notification`,`mail_in`.`mail_code` AS `mail_code`,`mail_in`.`incoming_at` AS `incoming_at`,`mail_in`.`mail_from` AS `mail_from`,`user`.`fullname` AS `fullname` from ((`disposition` join `mail_in`) join `user`) where ((`disposition`.`id_mail` = `mail_in`.`id_mail`) and (`disposition`.`id_user` = `user`.`id_user`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposition`
--
ALTER TABLE `disposition`
  ADD PRIMARY KEY (`id_disposition`),
  ADD KEY `id_mail` (`id_mail`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `mail_in`
--
ALTER TABLE `mail_in`
  ADD PRIMARY KEY (`id_mail`),
  ADD KEY `id_mail_type` (`id_mail_type`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mail_out`
--
ALTER TABLE `mail_out`
  ADD PRIMARY KEY (`id_mail_out`),
  ADD KEY `id_mail_type` (`id_mail_type`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `mail_type`
--
ALTER TABLE `mail_type`
  ADD PRIMARY KEY (`id_mail_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disposition`
--
ALTER TABLE `disposition`
  MODIFY `id_disposition` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_instansi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mail_in`
--
ALTER TABLE `mail_in`
  MODIFY `id_mail` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mail_out`
--
ALTER TABLE `mail_out`
  MODIFY `id_mail_out` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `mail_type`
--
ALTER TABLE `mail_type`
  MODIFY `id_mail_type` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposition`
--
ALTER TABLE `disposition`
  ADD CONSTRAINT `disposition_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `mail_in`
--
ALTER TABLE `mail_in`
  ADD CONSTRAINT `mail_in_ibfk_1` FOREIGN KEY (`id_mail_type`) REFERENCES `mail_type` (`id_mail_type`),
  ADD CONSTRAINT `mail_in_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `mail_out`
--
ALTER TABLE `mail_out`
  ADD CONSTRAINT `mail_out_ibfk_1` FOREIGN KEY (`id_mail_type`) REFERENCES `mail_type` (`id_mail_type`),
  ADD CONSTRAINT `mail_out_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
