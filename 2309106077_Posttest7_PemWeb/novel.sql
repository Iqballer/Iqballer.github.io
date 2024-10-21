-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2024 pada 11.18
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
(8, 'Laut Bercerita', 'Leila S. Chudori', '2024-10-14', 'LAUT_BERCERITA.jpg'),
(9, 'Ubur-Ubur Lembur', 'Raditya Dika', '2024-10-14', 'ubur_ubur_lembur.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(4, 'baler', '$2y$10$LGRrkqN9ISJ1083W/fl9oelA4MKj0CLkXenaPuQjWLrn/GgL24ulq', 'Admin'),
(6, 'asep', '$2y$10$.iOJ2xB9G/gjWSsbmeu3ZeU6/fy8H1RV/XaX83QO28hqxzh8Yy.KS', 'User'),
(7, 'gubaz', '$2y$10$KKVTlt8AxR/BcB/OY0wd2uwBZT4TfPawv3h3jAZw8VVkTah2hyr6S', 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku_novel`
--
ALTER TABLE `buku_novel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku_novel`
--
ALTER TABLE `buku_novel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
