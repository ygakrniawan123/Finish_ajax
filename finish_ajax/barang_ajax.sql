-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2025 pada 18.21
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finish_ajax`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_ajax`
--

CREATE TABLE `barang_ajax` (
  `Id` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Stok` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_ajax`
--

INSERT INTO `barang_ajax` (`Id`, `Nama`, `Stok`) VALUES
(1, 'Buku kamu', 12),
(11, 'Buku Ku', 10),
(12, 'Penggaris', 12),
(13, 'Pensil', 100),
(14, 'Penghapus', 50);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_ajax`
--
ALTER TABLE `barang_ajax`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_ajax`
--
ALTER TABLE `barang_ajax`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
