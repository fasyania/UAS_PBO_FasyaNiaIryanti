-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2026 at 08:07 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_uas_pbo_ti1d_fasyaniairyanti`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabel_mahasiswa`
--

CREATE TABLE `tabel_mahasiswa` (
  `id_mahasiswa` int NOT NULL,
  `nama_mahasiswa` varchar(100) NOT NULL,
  `nim` varchar(15) NOT NULL,
  `semester` int NOT NULL,
  `tarif_ukt_nominal` decimal(10,2) NOT NULL,
  `jenis_pembayaran` enum('Mandiri','Bidikmisi','Prestasi') NOT NULL,
  `golongan_ukt` varchar(10) DEFAULT NULL,
  `nama_wali` varchar(100) DEFAULT NULL,
  `nomor_kip_kuliah` varchar(30) DEFAULT NULL,
  `dana_saku_subsidi` decimal(10,2) DEFAULT NULL,
  `nama_instansi_beasiswa` varchar(100) DEFAULT NULL,
  `minimal_ipk_syarat` decimal(3,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tabel_mahasiswa`
--

INSERT INTO `tabel_mahasiswa` (`id_mahasiswa`, `nama_mahasiswa`, `nim`, `semester`, `tarif_ukt_nominal`, `jenis_pembayaran`, `golongan_ukt`, `nama_wali`, `nomor_kip_kuliah`, `dana_saku_subsidi`, `nama_instansi_beasiswa`, `minimal_ipk_syarat`) VALUES
(1, 'Fasya Nia Iryanti', '230102001', 4, '4500000.00', 'Mandiri', 'Golongan 4', 'Budi Iryanto', NULL, NULL, NULL, NULL),
(2, 'Rian Adi Wijaya', '230102002', 4, '5000000.00', 'Mandiri', 'Golongan 5', 'Ahmad Supriadi', NULL, NULL, NULL, NULL),
(3, 'Siti Aminah', '230102003', 2, '3500000.00', 'Mandiri', 'Golongan 3', 'Toto Susanto', NULL, NULL, NULL, NULL),
(4, 'Dewi Lestari', '230102004', 6, '4500000.00', 'Mandiri', 'Golongan 4', 'Hendra Gunawan', NULL, NULL, NULL, NULL),
(5, 'Fajar Nugroho', '230102005', 2, '5500000.00', 'Mandiri', 'Golongan 5', 'Eko Prasetyo', NULL, NULL, NULL, NULL),
(6, 'Agus Setiawan', '230102006', 4, '3500000.00', 'Mandiri', 'Golongan 3', 'Mulyono', NULL, NULL, NULL, NULL),
(7, 'Anisa Rahmawati', '230102007', 6, '4500000.00', 'Mandiri', 'Golongan 4', 'Slamet Riyadi', NULL, NULL, NULL, NULL),
(8, 'Bagas Pratama', '230102008', 4, '0.00', 'Bidikmisi', NULL, NULL, 'KIP-2023-99101', '700000.00', NULL, NULL),
(9, 'Citra Kirana', '230102009', 2, '0.00', 'Bidikmisi', NULL, NULL, 'KIP-2024-88202', '750000.00', NULL, NULL),
(10, 'Dimas Saputra', '230102010', 4, '0.00', 'Bidikmisi', NULL, NULL, 'KIP-2023-77303', '700000.00', NULL, NULL),
(11, 'Eka Mahendra', '230102011', 6, '0.00', 'Bidikmisi', NULL, NULL, 'KIP-2022-66404', '700000.00', NULL, NULL),
(12, 'Gita Gutawa', '230102012', 2, '0.00', 'Bidikmisi', NULL, NULL, 'KIP-2024-55505', '750000.00', NULL, NULL),
(13, 'Hadi Wijaya', '230102013', 6, '0.00', 'Bidikmisi', NULL, NULL, 'KIP-2022-44606', '700000.00', NULL, NULL),
(14, 'Indah Permata', '230102014', 4, '0.00', 'Bidikmisi', NULL, NULL, 'KIP-2023-33707', '700000.00', NULL, NULL),
(15, 'Kevin Sanjaya', '230102015', 4, '1500000.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', '3.50'),
(16, 'Lesti Kejora', '230102016', 4, '1000000.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Pertamina Foundation', '3.60'),
(17, 'Muhammad Ali', '230102017', 2, '2000000.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', '3.40'),
(18, 'Nadia Vega', '230102018', 6, '0.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Yayasan Toyota Astra', '3.75'),
(19, 'Oki Setiana', '230102019', 2, '1500000.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Djarum Foundation', '3.50'),
(20, 'Putra Petir', '230102020', 6, '1000000.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Pertamina Foundation', '3.60'),
(21, 'Rara Wilis', '230102021', 4, '2000000.00', 'Prestasi', NULL, NULL, NULL, NULL, 'Beasiswa Bank Indonesia', '3.40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  ADD PRIMARY KEY (`id_mahasiswa`),
  ADD UNIQUE KEY `nim` (`nim`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabel_mahasiswa`
--
ALTER TABLE `tabel_mahasiswa`
  MODIFY `id_mahasiswa` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
