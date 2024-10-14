-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2024 pada 14.20
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `novel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_novel`
--

CREATE TABLE `buku_novel` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `penulis` varchar(50) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku_novel`
--

INSERT INTO `buku_novel` (`id`, `judul`, `penulis`, `tanggal_terbit`, `cover`) VALUES
(5, 'Bumi Manusia', 'Pramoedya Ananta Toer', '2024-08-14', '670d0b9076d5c.jpg'),
(6, 'Laskar Pelangi', 'Andrea Hirata', '2024-08-09', '670d0b2f47558.jpg'),
(7, 'Perahu kertas', ' Dee Lestari ', '2024-04-24', '670d0b99ba54d.jpg'),
(8, 'Laut Bercerita', 'Leila S. Chudori', '2024-10-14', 'LAUT_BERCERITA.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_novel`
--
ALTER TABLE `buku_novel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_novel`
--
ALTER TABLE `buku_novel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
