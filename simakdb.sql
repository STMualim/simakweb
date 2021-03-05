-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2021 at 04:50 PM
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
  `id_pegawai_kelas` int(11) DEFAULT NULL,
  `kode_kelas` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_kelas` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_ta_kelas`, `id_pegawai_kelas`, `kode_kelas`, `nama_kelas`, `buat_kelas`) VALUES
(4, 13, 31, 'X MM 1', 'X Multimedia 1', '2021-03-04 15:45:32'),
(5, 13, 45, 'X MM 2', 'X Multimedia 2', '2021-03-04 15:47:33'),
(6, 13, 46, 'X MM 3', 'X Multimedia 3', '2021-03-04 15:47:48');

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
(47, 13, 1, '004', 'Andre', NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 1, 'Multimedia', NULL, NULL, NULL, NULL, NULL, '083813154402', NULL, 553697, 2, NULL, '2021-03-03 12:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `ruangan`
--

CREATE TABLE `ruangan` (
  `id_ruangan` bigint(20) UNSIGNED NOT NULL,
  `id_ta_ruangan` int(11) NOT NULL,
  `id_kelas_ruangan` int(11) NOT NULL,
  `kode_ruangan` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ruangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `buat_ruangan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ruangan`
--

INSERT INTO `ruangan` (`id_ruangan`, `id_ta_ruangan`, `id_kelas_ruangan`, `kode_ruangan`, `nama_ruangan`, `buat_ruangan`) VALUES
(3, 13, 4, '101', 'Ruang Kelas', '2021-03-04 15:48:33'),
(4, 13, 5, '102', 'Ruang Kelas', '2021-03-04 15:48:44'),
(5, 13, 6, '103', 'Ruang Kelas', '2021-03-04 15:48:54');

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

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurusan`
--
ALTER TABLE `jurusan`
  MODIFY `id_jurusan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1007119;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- AUTO_INCREMENT for table `ruangan`
--
ALTER TABLE `ruangan`
  MODIFY `id_ruangan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
