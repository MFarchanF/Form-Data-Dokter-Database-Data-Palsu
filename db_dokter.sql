-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jul 2021 pada 14.20
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_dokter`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_dokter`
--

CREATE TABLE `data_dokter` (
  `id_dokter` varchar(25) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `jenis_dokter` varchar(100) NOT NULL,
  `hari_praktik` varchar(50) NOT NULL,
  `jam_praktik` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_dokter`
--

INSERT INTO `data_dokter` (`id_dokter`, `nama_dokter`, `alamat`, `jenis_kelamin`, `no_telp`, `jenis_dokter`, `hari_praktik`, `jam_praktik`) VALUES
('A002', 'dr. Nur, Sp.OG', 'Jl. Elang / 50', 'Perempuan', '0812312313', 'Dokter Spesialis Obstetri &amp; Ginekologi (Kebidanan dan Kandungan)', 'Senin', '07.00 - 12.00'),
('A003', 'dr. Syarief', 'Jl. Jawa X / 50', 'Laki-laki', '0812312313', 'Dokter Umum', 'Selasa', '07.00 - 15.00'),
('A004', 'dr. Frans, Sp.A', 'Jalan May XIX', 'Laki-laki', '0812312313', 'Dokter Spesialis Anak', 'Senin dan Sabtu', '09.00 - 13.00'),
('A005', 'dr. Rafli, Sp.A', 'Jl Enggano Barat II', 'Laki-laki', '0812312313', 'Dokter Spesialis Anak', 'Senin dan Sabtu', '09.00 - 13.00'),
('A006', 'dr. Syahputra, Sp.A', 'Jl Kapuas XII', 'Laki-laki', '0812312313', 'Dokter Spesialis THT', 'Senin', '09.00 - 13.00'),
('A007', 'dr. A', 'Jalan Veteran XX / 20', 'Laki-laki', '0812312313', 'Dokter Umum', 'Sabtu', '18.00 - 22.00'),
('A008', 'dr. N, Sp.GK', 'Jalan Dr.Soetomo XX / 04', 'Perempuan', '08645576672', 'Dokter Spesialis Gizi Klinik', 'Rabu dan Jumat', '15.00 - 18.00'),
('A009', 'dr. J N, Sp.A', 'Jalan Jawa X / 10', 'Perempuan', '08563423575', 'Dokter Spesialis Anak', 'Senin dan Sabtu', '14.00 - 18.00'),
('A010', 'dr. Alyssa ', 'Jalan Citraland CitraS Blok B / 40', 'Perempuan', '08562467867', 'Dokter Umum', 'Sabtu', '19.00 - 21.00'),
('A011', 'dr. Muhammad, Sp.A', 'Gresik', 'Laki- laki', '0812312313', 'Dokter Spesialis Anak', 'Rabu', '08.00 - 10.00'),
('A012', 'dr. S, Sp.A.K', 'Jl Enggano India XX /04', 'Perempuan', '0812312313', 'Dokter Spesialis Anak (Konsultan)', 'Minggu', '08.00 - 12.00');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `jenis_dokter_tersedia`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `jenis_dokter_tersedia` (
`macam_macam_dokter` varchar(100)
,`jumlah_dokter` bigint(21)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `level`) VALUES
(19, 'adminhash', 'adminhash', '$2y$10$0lOCbyLVwSFiX5BU00uX1upnZMtK8V7sQfmVgkBmrC/rTLoU2aMMa', 'administrator'),
(20, 'umumhash', 'umumhash', '$2y$10$xP0ph5Sq9.vBrI99e.auLugAUVecZrz2Fv2QG0p0u8keUEd3ognYS', 'umum'),
(25, 'admin', 'admin', '$2y$10$yQb51hL72u1tDUDsfOH2CO0ZOe5K6063Nc7YGE49oU/ToeGO2p8QW', 'administrator');

-- --------------------------------------------------------

--
-- Struktur untuk view `jenis_dokter_tersedia`
--
DROP TABLE IF EXISTS `jenis_dokter_tersedia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jenis_dokter_tersedia`  AS SELECT DISTINCT `data_dokter`.`jenis_dokter` AS `macam_macam_dokter`, count(`data_dokter`.`jenis_dokter`) AS `jumlah_dokter` FROM `data_dokter` GROUP BY `data_dokter`.`jenis_dokter` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_dokter`
--
ALTER TABLE `data_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
