-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 01:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simakdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `id_hari` bigint(20) UNSIGNED NOT NULL,
  `id_ta_hari` int(11) NOT NULL,
  `nama_hari` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_hari` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`id_hari`, `id_ta_hari`, `nama_hari`, `buat_hari`) VALUES
(1, 13, 'Senin', '2021-03-05 15:01:47'),
(2, 13, 'Selasa', '2021-03-05 15:01:50'),
(3, 13, 'Rabu', '2021-03-05 15:01:52'),
(4, 13, 'Kamis', '2021-03-05 15:01:54'),
(5, 13, 'Jumat', '2021-03-05 15:01:57'),
(6, 13, 'Sabtu', '2021-03-05 15:02:00');

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` bigint(20) UNSIGNED NOT NULL,
  `id_ta_jurusan` int(11) NOT NULL,
  `kode_jurusan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_jurusan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_jurusan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `id_ta_jurusan`, `kode_jurusan`, `nama_jurusan`, `buat_jurusan`) VALUES
(1007111, 14, 'TPTU', 'Teknik Pendingin & Tata Udara', '2021-02-23 12:24:29'),
(1007112, 14, 'TMK', 'Teknik Mekatronika', '2021-02-23 12:24:43'),
(1007113, 14, 'TITL', 'Teknik Instalasi Tenaga Listrik', '2021-02-23 12:25:09'),
(1007114, 14, 'TEI', 'Teknik Elektronika Industri', '2021-02-23 12:25:22'),
(1007115, 13, 'TPTU', 'Teknik Pendingin & Tata Udara', '2021-02-23 12:35:19'),
(1007116, 13, 'TMK', 'Teknik Mekatronika', '2021-02-23 12:36:04'),
(1007117, 13, 'TITL', 'Teknik Instalasi Tenaga Listrik', '2021-02-23 12:36:21'),
(1007118, 13, 'TEI', 'Teknik Elektronika Industri', '2021-02-23 12:36:33');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` bigint(20) UNSIGNED NOT NULL,
  `id_ta_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_kelas` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_ta_kelas`, `nama_kelas`, `buat_kelas`) VALUES
(4, 13, 'X ', '2021-03-04 15:45:32'),
(5, 13, 'XI', '2021-03-04 15:47:33'),
(6, 13, 'XII', '2021-03-04 15:47:48');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id_mapel` bigint(20) UNSIGNED NOT NULL,
  `id_ta_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_mapel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_mapel` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `id_ta_mapel`, `kode_mapel`, `nama_mapel`, `buat_mapel`) VALUES
(1, 13, 'MTK', 'Matematika', '2021-03-03 14:40:39'),
(2, 13, 'BINDO', 'Bahasa Indonesia', '2021-03-03 14:40:52'),
(3, 13, 'BING', 'Bahasa Inggris', '2021-03-03 14:41:02'),
(4, 13, 'KIMIA', 'Kimia', '2021-03-03 14:42:29');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` bigint(20) UNSIGNED NOT NULL,
  `id_ta_pegawai` int(11) NOT NULL,
  `jenis_pegawai` int(11) NOT NULL,
  `kode_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nip_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ktp_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `npwp_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tmp_lahir_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tgl_lahir_pegawai` date DEFAULT NULL,
  `alamat_pegawai` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenkel_pegawai` int(11) NOT NULL,
  `agama_pegawai` int(11) NOT NULL,
  `status_kawin_pegawai` int(11) NOT NULL,
  `pend_akhir_pegawai` int(11) NOT NULL,
  `jurusan_pend_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_depan_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gelar_belakang_pegawai` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mulai_tugas_pegawai` date DEFAULT NULL,
  `bp_pegawai` int(11) DEFAULT NULL,
  `admin_pegawai` int(11) DEFAULT NULL,
  `tlp_pegawai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pegawai` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pin_pegawai` int(6) DEFAULT NULL,
  `level_pegawai` int(11) DEFAULT NULL,
  `foto_pegawai` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buat_pegawai` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_ta_pegawai`, `jenis_pegawai`, `kode_pegawai`, `nama_pegawai`, `nip_pegawai`, `ktp_pegawai`, `npwp_pegawai`, `tmp_lahir_pegawai`, `tgl_lahir_pegawai`, `alamat_pegawai`, `jenkel_pegawai`, `agama_pegawai`, `status_kawin_pegawai`, `pend_akhir_pegawai`, `jurusan_pend_pegawai`, `gelar_depan_pegawai`, `gelar_belakang_pegawai`, `mulai_tugas_pegawai`, `bp_pegawai`, `admin_pegawai`, `tlp_pegawai`, `email_pegawai`, `pin_pegawai`, `level_pegawai`, `foto_pegawai`, `buat_pegawai`) VALUES
(31, 13, 1, '001', 'Mulyadi', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 2, 3, 'Teknik Informatika', NULL, 'S.Kom.', NULL, NULL, NULL, '083813154407', NULL, 536005, 2, NULL, '2021-03-02 14:07:03'),
(44, 13, 2, NULL, 'Anton', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, '083813154408', NULL, NULL, NULL, NULL, '2021-03-03 00:01:50'),
(45, 13, 1, '002', 'Koswara', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 3, 'Pendidikan Olahraga', NULL, 'S.Pd.', NULL, NULL, NULL, '083813154409', NULL, 568750, 2, NULL, '2021-03-03 12:32:24'),
(46, 13, 1, '003', 'Ismail', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 3, 'Teknik Informatika', NULL, 'S.Kom.', NULL, NULL, NULL, '083813154401', 'ismail@gmail.com', 951383, 2, NULL, '2021-03-03 12:33:40'),
(47, 13, 1, '004', 'Andre', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 3, 'Desain Komunikasi Visual', NULL, 'S.Sen.', NULL, NULL, NULL, '083813154402', NULL, 553697, 2, NULL, '2021-03-03 12:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `rombel`
--

CREATE TABLE `rombel` (
  `id_rombel` bigint(20) UNSIGNED NOT NULL,
  `id_ta_rombel` int(11) NOT NULL,
  `id_kelas_rombel` int(11) NOT NULL,
  `id_pegawai_rombel` int(11) DEFAULT NULL,
  `nama_rombel` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_rombel` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rombel`
--

INSERT INTO `rombel` (`id_rombel`, `id_ta_rombel`, `id_kelas_rombel`, `id_pegawai_rombel`, `nama_rombel`, `buat_rombel`) VALUES
(1, 13, 4, 31, 'X TMK 1', '2021-03-05 14:14:24'),
(2, 13, 4, 45, 'X TMK 2', '2021-03-05 14:14:47'),
(3, 13, 4, 46, 'X TMK 3', '2021-03-05 14:17:45'),
(4, 13, 5, 47, 'XI TMK 1', '2021-03-05 14:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` bigint(20) UNSIGNED NOT NULL,
  `id_ta_ruangan` int(11) NOT NULL,
  `id_rombel_ruangan` int(11) NOT NULL,
  `nama_ruangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_ruangan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_ta_ruangan`, `id_rombel_ruangan`, `nama_ruangan`, `buat_ruangan`) VALUES
(3, 13, 1, '101', '2021-03-04 15:48:33'),
(4, 13, 2, '102', '2021-03-04 15:48:44'),
(5, 13, 3, '103', '2021-03-04 15:48:54'),
(6, 13, 4, '201', '2021-03-05 14:33:46');

-- --------------------------------------------------------

--
-- Table structure for table `ta`
--

CREATE TABLE `ta` (
  `id_ta` bigint(20) UNSIGNED NOT NULL,
  `tahun_ta` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_ta` int(11) NOT NULL,
  `buat_ta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ta`
--

INSERT INTO `ta` (`id_ta`, `tahun_ta`, `status_ta`, `buat_ta`) VALUES
(13, '2020/2021 Semester Genap', 1, '2021-02-22 12:19:00'),
(14, '2021/2022 Semester Ganjil', 2, '2021-02-22 12:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `nama_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username_user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_user` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user` int(11) NOT NULL,
  `buat_user` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `username_user`, `pin_user`, `level_user`, `buat_user`) VALUES
(1, 'Super Admin', '@superadmin', 'd6112f0e996da4acd2baab2729dfb183', 0, '2021-02-19 11:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `id_waktu` bigint(20) UNSIGNED NOT NULL,
  `id_ta_waktu` int(11) NOT NULL,
  `jam_waktu` int(11) DEFAULT NULL,
  `nama_waktu` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`id_waktu`, `id_ta_waktu`, `jam_waktu`, `nama_waktu`, `buat_waktu`) VALUES
(1, 13, 1, '07:00 - 07:30', '2021-03-06 00:15:40'),
(2, 13, 2, '07:30 - 08:00', '2021-03-06 00:52:13'),
(3, 13, 3, '08:00 - 08:30', '2021-03-06 00:53:01'),
(4, 13, 4, '08:30 - 09:00', '2021-03-06 00:53:13'),
(5, 13, 5, '09:00 - 09:30', '2021-03-06 00:53:26'),
(6, 13, 6, '09:30 - 10:00', '2021-03-06 00:53:42'),
(7, 13, 7, '10:00 - 10:30', '2021-03-06 00:53:56'),
(8, 13, 8, '10:30 - 11:00', '2021-03-06 00:54:09'),
(9, 13, 9, '11:00 - 11:30', '2021-03-06 00:54:35'),
(10, 13, 10, '11:30 - 12:00', '2021-03-06 00:54:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`id_hari`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `rombel`
--
ALTER TABLE `rombel`
  ADD PRIMARY KEY (`id_rombel`);

--
-- Indexes for table `ruangan`
--
ALTER TABLE `ruangan`
  ADD PRIMARY KEY (`id_ruangan`);

--
-- Indexes for table `ta`
--
ALTER TABLE `ta`
  ADD PRIMARY KEY (`id_ta`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`id_waktu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hari`
--
ALTER TABLE `hari`
  MODIFY `id_hari` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007119;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id_mapel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `rombel`
--
ALTER TABLE `rombel`
  MODIFY `id_rombel` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ta`
--
ALTER TABLE `ta`
  MODIFY `id_ta` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `id_waktu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
