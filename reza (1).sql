-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Des 2022 pada 15.37
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reza`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `latif`
--

CREATE TABLE `latif` (
  `Id_pembeli` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `HP` varchar(20) NOT NULL,
  `Tgl_Transaksi` date NOT NULL,
  `Jenis_barang` varchar(25) NOT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Jumlah` int(20) NOT NULL,
  `Harga` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `latif`
--

INSERT INTO `latif` (`Id_pembeli`, `nama`, `alamat`, `HP`, `Tgl_Transaksi`, `Jenis_barang`, `Nama_Barang`, `Jumlah`, `Harga`) VALUES
(101001, 'Reza Hans Latif', 'Tangerang  Banten', '6288976985525', '2022-01-12', 'komplementer', 'Motor Pcx', 3, 30000000),
(101002, 'Ikhsan', 'Jakarta', '6288976985522', '2022-01-12', 'komplementer', 'Motor Vario', 3, 2000000),
(101003, 'Ipul', 'Cibinong Bogor', '6288976985533', '2022-01-13', 'komplementer', 'Motor Vega R', 2, 10000000),
(101004, 'Feyy', 'Priuk JakartaUtara', '6288976985544', '2022-02-12', 'komplementer', 'Motor Adv', 2, 15000000),
(101005, 'Iman', 'Batu Ampar JakartaTimur', '6288976985588', '2022-03-14', 'komplementer', 'Motor Rxking', 5, 15000000),
(101006, 'Ayub', 'Galaxy Bekasi', '6288976982525', '2022-04-14', 'komplementer', 'Motor Mio', 10, 5000000),
(101007, 'Sahat', 'Cibinong Bogor', '6288976985511', '2022-05-14', 'komplementer', 'Motor Supra', 7, 12000000),
(101008, 'Iqbal', 'Cibubur', '6288976985599', '2022-03-14', 'komplementer', 'Motor Klx', 3, 1200000),
(101009, 'Hasan', 'Tangerang  Banten', '6288976985522', '2022-07-15', 'komplementer', 'Motor VegaR', 7, 12000000),
(101010, 'Ade', 'Mampang Depok', '6288976985512', '2022-09-15', 'komplementer', 'Honda Pcx', 4, 30000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'rezahans', 'rezahans', 'rezahans03@gmail.com', '$2y$10$V8g.gbEWtUVmqjjqysd.Zu2uqz8t2YHX7K0zkKneyR1Lp1LZt1/fW'),
(2, 'Hasan', 'hasann', 'hasanhans03@gmail.com', '$2y$10$94Fdm1kd2yqWT9hTuVD9DeOhjd9RjNpqFHwgYawvvFGbFLa.HRz/i'),
(3, 'HanHans', 'Rezahl', 'rezahans03@gmail.com', '$2y$10$G4vB04i0/V1qF7GMxdjuyOANpV1OlqMjojW/9Zamco2d7J/ILexHi'),
(4, 'Reza', 'Reza', 'rezahans03@gmail.com', '$2y$10$LbJUfk7O10vn.uVate3BvebSwcuecELGVvqK3XMw8PrI2DClQLQTW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `latif`
--
ALTER TABLE `latif`
  ADD PRIMARY KEY (`Id_pembeli`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
