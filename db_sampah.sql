-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jul 2024 pada 05.55
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sampah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(20) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `pswd_admin` varchar(100) NOT NULL,
  `level` enum('administrator','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `pswd_admin`, `level`) VALUES
('ADM1', 'ALBERT', '9d9e86a6e63f728c8354f129f0e7dd4e', 'administrator');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_sampah`
--

CREATE TABLE `kategori_sampah` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `deskripsi` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori_sampah`
--

INSERT INTO `kategori_sampah` (`id_kategori`, `nama_kategori`, `deskripsi`) VALUES
(1, 'RONGSOK', 'Sampah yang dikategorikan sebagai sampah RONGSOK adalah barang-barang bekas atau limbah yang masih memiliki nilai ekonomi dan dapat dijual atau didaur ulang. Biasanya, sampah rongsok mencakup berbagai jenis barang seperti logam, plastik, kertas, kaca, dan barang elektronik bekas.'),
(2, 'BOSOK', 'Sampah yang dikategorikan sebagai sampah BOSOK adalah sampah yang sudah sangat kotor, tidak terpakai, atau tidak dapat lagi dimanfaatkan secara langsung. Sampah bosok biasanya tidak memiliki nilai ekonomi yang tinggi seperti sampah rongsok, karena kondisinya yang sudah sangat buruk atau tidak layak '),
(3, 'GONDONG TOK', 'Sampah yang dikategorikan sebagai sampah GONDONG TOK adalah sampah yang tergolong ringan atau organik yang berupa daun-daunan. Sampah ini akan dialokasikan ke pakan maggot.'),
(4, 'POPOK', 'Sampah yang dikategorikan sebagai sampah POPOK adalah sampah yang terdiri dari popok bayi atau pembalut wanita yang nantinya akan dipisahkan oleh mesin untuk diambil hidrogel, sebagai bahan campuran untuk kompos tanaman.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` varchar(30) NOT NULL,
  `nama_nasabah` varchar(100) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `alamat` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nama_nasabah`, `saldo`, `no_hp`, `alamat`) VALUES
('NSB001', 'HALIM', 28000.00, '081234567890', 'Desa Guwosari'),
('NSB002', 'MEDY', 52000.00, '08987654321', 'Desa Guwosari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah_masuk`
--

CREATE TABLE `sampah_masuk` (
  `id_sampah_masuk` int NOT NULL,
  `tgl_pengumpulan` date NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `id_nasabah` varchar(30) NOT NULL,
  `id_kategori` int NOT NULL,
  `id_subkategori` int NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `sampah_masuk`
--

INSERT INTO `sampah_masuk` (`id_sampah_masuk`, `tgl_pengumpulan`, `id_admin`, `id_nasabah`, `id_kategori`, `id_subkategori`, `berat`, `harga`) VALUES
(2, '2024-05-30', 'ADM1', 'NSB001', 1, 1, 15.00, 15000.00),
(3, '2024-06-30', 'ADM1', 'NSB001', 2, 7, 10.00, 20000.00),
(4, '2024-04-30', 'ADM1', 'NSB002', 3, 8, 10.00, 10000.00),
(6, '2024-07-26', 'ADM1', 'NSB002', 3, 9, 6.00, 12000.00),
(7, '2024-06-14', 'ADM1', 'NSB002', 4, 11, 15.00, 30000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sampah_terjual`
--

CREATE TABLE `sampah_terjual` (
  `id_sampah_terjual` int NOT NULL,
  `tgl_terjual` date NOT NULL,
  `id_kategori` int NOT NULL,
  `berat` decimal(10,2) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `id_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `sampah_terjual`
--

INSERT INTO `sampah_terjual` (`id_sampah_terjual`, `tgl_terjual`, `id_kategori`, `berat`, `harga`, `id_admin`) VALUES
(1, '2024-05-30', 1, 5.00, 10000.00, 'ADM1'),
(2, '2024-06-18', 2, 10.00, 10000.00, 'ADM1'),
(3, '2024-07-31', 3, 15.00, 15000.00, 'ADM1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subkategori_sampah`
--

CREATE TABLE `subkategori_sampah` (
  `id_subkategori` int NOT NULL,
  `id_kategori` int NOT NULL,
  `jenis_sampah` varchar(300) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `harga` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `subkategori_sampah`
--

INSERT INTO `subkategori_sampah` (`id_subkategori`, `id_kategori`, `jenis_sampah`, `deskripsi`, `harga`) VALUES
(1, 1, 'Contoh Sub Rongsok 1', 'Contoh Deskripsi Sub Rongsok 1', 1000.00),
(2, 1, 'Contoh Sub Rongsok 2', 'Contoh Deskripsi Sub Rongsok 2', 2000.00),
(3, 2, 'Contoh Sub Bosok 1', 'Contoh Deskripsi Sub Bosok 1', 1000.00),
(7, 2, 'Contoh Sub Bosok 2', 'Contoh Deskripsi Sub Bosok 2', 2000.00),
(8, 3, 'Contoh Sub Gondong Tok 1', 'Contoh Deskripsi Sub Gondong Tok 1', 1000.00),
(9, 3, 'Contoh Sub Gondong Tok 2', 'Contoh Deskripsi Sub Gondong Tok 2', 2000.00),
(10, 4, 'Contoh Sub Popok 1', 'Contoh Deskripsi Sub Popok 1', 1000.00),
(11, 4, 'Contoh Sub Popok 2', 'Contoh Deskripsi Sub Popok 2', 2000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tarik`
--

CREATE TABLE `tarik` (
  `id_tarik` int NOT NULL,
  `tgl_tarik` date NOT NULL,
  `id_nasabah` varchar(30) NOT NULL,
  `saldo_awal` decimal(10,2) NOT NULL,
  `jumlah_tarik` decimal(10,2) NOT NULL,
  `saldo_akhir` decimal(10,2) NOT NULL,
  `id_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tarik`
--

INSERT INTO `tarik` (`id_tarik`, `tgl_tarik`, `id_nasabah`, `saldo_awal`, `jumlah_tarik`, `saldo_akhir`, `id_admin`) VALUES
(1, '2024-07-12', 'NSB001', 35000.00, 5000.00, 30000.00, 'ADM1'),
(2, '2024-07-31', 'NSB001', 30000.00, 2000.00, 28000.00, 'ADM1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `kategori_sampah`
--
ALTER TABLE `kategori_sampah`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indeks untuk tabel `sampah_masuk`
--
ALTER TABLE `sampah_masuk`
  ADD PRIMARY KEY (`id_sampah_masuk`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_subkategori` (`id_subkategori`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_nasabah` (`id_nasabah`);

--
-- Indeks untuk tabel `sampah_terjual`
--
ALTER TABLE `sampah_terjual`
  ADD PRIMARY KEY (`id_sampah_terjual`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `subkategori_sampah`
--
ALTER TABLE `subkategori_sampah`
  ADD PRIMARY KEY (`id_subkategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tarik`
--
ALTER TABLE `tarik`
  ADD PRIMARY KEY (`id_tarik`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_nasabah` (`id_nasabah`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori_sampah`
--
ALTER TABLE `kategori_sampah`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `sampah_masuk`
--
ALTER TABLE `sampah_masuk`
  MODIFY `id_sampah_masuk` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `sampah_terjual`
--
ALTER TABLE `sampah_terjual`
  MODIFY `id_sampah_terjual` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `subkategori_sampah`
--
ALTER TABLE `subkategori_sampah`
  MODIFY `id_subkategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tarik`
--
ALTER TABLE `tarik`
  MODIFY `id_tarik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `sampah_masuk`
--
ALTER TABLE `sampah_masuk`
  ADD CONSTRAINT `sampah_masuk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_sampah` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampah_masuk_ibfk_3` FOREIGN KEY (`id_subkategori`) REFERENCES `subkategori_sampah` (`id_subkategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampah_masuk_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampah_masuk_ibfk_5` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sampah_terjual`
--
ALTER TABLE `sampah_terjual`
  ADD CONSTRAINT `sampah_terjual_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_sampah` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sampah_terjual_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `subkategori_sampah`
--
ALTER TABLE `subkategori_sampah`
  ADD CONSTRAINT `subkategori_sampah_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_sampah` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tarik`
--
ALTER TABLE `tarik`
  ADD CONSTRAINT `tarik_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tarik_ibfk_2` FOREIGN KEY (`id_nasabah`) REFERENCES `nasabah` (`id_nasabah`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
