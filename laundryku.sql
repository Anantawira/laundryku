-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Apr 2021 pada 18.04
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundryku`
--

DELIMITER $$
--
-- Prosedur
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AddKategoriPaket` (IN `sNamaKategori` VARCHAR(35))  BEGIN
INSERT INTO tb_kategori_paket (nama_kategori) values (sNamaKategori);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddOutlet` (IN `sNama` VARCHAR(100), IN `sAlamat` TEXT, IN `sTelp` VARCHAR(15))  BEGIN
INSERT INTO tb_outlet (nama_outlet,alamat_outlet,telp_outlet) values (sNama,sAlamat,sTelp);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPaket` (IN `sIdOutlet` INT(11), IN `sIdJenis` INT(11), IN `sNama` VARCHAR(100), IN `sHarga` VARCHAR(11))  BEGIN
INSERT INTO tb_paket (id_outlet, id_kategori_paket, nama_paket, harga_paket) values (sIdOutlet, sIdJenis, sNama, sHarga);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPelanggan` (IN `sNama` VARCHAR(100), IN `sAlamat` TEXT, IN `sKtp` VARCHAR(30), IN `sTlp` VARCHAR(15), IN `sJK` ENUM('L','P'))  BEGIN
INSERT INTO tb_member (nama_member,alamat_member,no_ktp,telp_member,jenis_kelamin) values (sNama, sAlamat, sKtp, sTlp, sJK);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPengguna` (IN `sNama` VARCHAR(100), IN `sUsername` VARCHAR(32), IN `sPassword` VARCHAR(150), IN `sRole` ENUM('admin','kasir','owner'))  BEGIN
INSERT INTO tb_user (nama_user,username,password,role) values (sNama,sUsername,sPassword,sRole);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AddPenggunaIdOutlet` (IN `sNama` VARCHAR(100), IN `sUsername` VARCHAR(32), IN `sPassword` VARCHAR(150), IN `sIdOutlet` INT(11) UNSIGNED, IN `sRole` ENUM('admin','kasir','owner'))  BEGIN
INSERT INTO tb_user (nama_user,username,password,id_outlet,role) values (sNama,sUsername,sPassword,sIdOutlet,sRole);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteKategoriPaket` (IN `sId` INT(11))  BEGIN
DELETE FROM tb_kategori_paket WHERE id_kategori_paket = sId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeleteOutlet` (IN `sId` INT(11))  BEGIN
DELETE FROM tb_outlet WHERE id_outlet = sId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeletePaket` (IN `sId` INT(11))  BEGIN
DELETE FROM tb_paket WHERE id_paket = sId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeletePelanggan` (IN `sId` INT(11))  BEGIN
DELETE FROM tb_member WHERE id_member = sId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `DeletePengguna` (IN `sId` INT(11))  BEGIN
DELETE FROM tb_user WHERE id_user = sId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllJenisPaket` ()  SELECT * FROM tb_kategori_paket$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllOutlet` ()  BEGIN
SELECT tb_outlet.*, tb_user.nama_user FROM tb_outlet LEFT JOIN tb_user ON tb_user.id_outlet = tb_outlet.id_outlet;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllPaket` ()  BEGIN
SELECT tb_outlet.nama_outlet, tb_kategori_paket.nama_kategori, tb_paket.* FROM tb_paket INNER JOIN tb_outlet ON tb_paket.id_outlet = tb_outlet.id_outlet INNER JOIN tb_kategori_paket ON tb_paket.id_kategori_paket = tb_kategori_paket.id_kategori_paket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllPelanggan` ()  BEGIN
SELECT * FROM tb_member;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllPelangganId` (IN `sId` INT(11))  BEGIN
SELECT * FROM tb_member WHERE id_member = sId;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllPengguna` ()  BEGIN
SELECT * FROM tb_user ORDER BY role DESC;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetAllTransaksi` ()  BEGIN
SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `GetTransaksiTerbaru` ()  BEGIN
SELECT tb_transaksi.*,tb_member.nama_member , tb_detail_transaksi.total_harga FROM tb_transaksi INNER JOIN tb_member ON tb_member.id_member = tb_transaksi.id_member INNER JOIN tb_detail_transaksi ON tb_detail_transaksi.id_transaksi = tb_transaksi.id_transaksi ORDER BY tb_transaksi.id_transaksi DESC LIMIT 10;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePaket` (IN `sNama` VARCHAR(100), IN `sIdJenis` INT(11), IN `sHarga` VARCHAR(11), IN `sIdOutlet` INT(11), IN `sIdPaket` INT(11))  BEGIN
UPDATE tb_paket SET nama_paket = sNama, id_kategori_paket = sIdJenis, harga_paket = sHarga, id_outlet = sIdOutlet WHERE id_paket = sIdPaket;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePelanggan` (IN `sNama` VARCHAR(100), IN `sAlamat` TEXT, IN `sKtp` VARCHAR(30), IN `sTelp` VARCHAR(15), IN `sJK` ENUM('L','P'), IN `sId` INT(11))  BEGIN
UPDATE tb_member SET nama_member = sNama, alamat_member = sAlamat, no_ktp = sKtp, telp_member = sTelp, jenis_kelamin = sJK WHERE id_member = sId;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_transaksi`
--

CREATE TABLE `tb_detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_paket` int(11) NOT NULL,
  `qty` double NOT NULL,
  `total_harga` int(35) NOT NULL,
  `total_bayar` int(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_transaksi`
--

INSERT INTO `tb_detail_transaksi` (`id_detail_transaksi`, `id_transaksi`, `id_paket`, `qty`, `total_harga`, `total_bayar`) VALUES
(2, 25, 10, 10, 153000, 155000),
(3, 26, 7, 5, 29500, 30000),
(4, 27, 11, 4, 45500, 0),
(6, 29, 10, 4, 64500, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori_paket`
--

CREATE TABLE `tb_kategori_paket` (
  `id_kategori_paket` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategori_paket`
--

INSERT INTO `tb_kategori_paket` (`id_kategori_paket`, `nama_kategori`) VALUES
(3, 'Selimut'),
(4, 'Kiloan'),
(5, 'Kaos'),
(6, 'Karpet'),
(7, 'Boneka'),
(9, 'Jaket ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_member`
--

CREATE TABLE `tb_member` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(100) NOT NULL,
  `alamat_member` text NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `telp_member` varchar(15) NOT NULL,
  `no_ktp` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_member`
--

INSERT INTO `tb_member` (`id_member`, `nama_member`, `alamat_member`, `jenis_kelamin`, `telp_member`, `no_ktp`) VALUES
(1, 'Amiruddin Fadhillah', 'Jalan Sawojajar 1', 'L', '08578341234', '12345678910'),
(2, 'Aldy Yuan', 'Perumahan Gadang Aseri 22', 'L', '082134567894', '12345678911'),
(3, 'Muhamad Hanafi ', 'Jalan Sawojajar 2', 'L', '085712348765', '12345678912'),
(4, 'Muhammad Tegar', 'Jalan Wisnuwardhana ', 'L', '0821345677998', '12345678913'),
(5, 'Ananta Wira', 'Jalan Sekarpuro', 'L', '086908739845', '12345678919');

--
-- Trigger `tb_member`
--
DELIMITER $$
CREATE TRIGGER `Menghapus Member` AFTER DELETE ON `tb_member` FOR EACH ROW BEGIN
DELETE FROM tb_transaksi WHERE tb_transaksi.id_member=old.id_member;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_outlet`
--

CREATE TABLE `tb_outlet` (
  `id_outlet` int(11) NOT NULL,
  `nama_outlet` varchar(100) NOT NULL,
  `alamat_outlet` text NOT NULL,
  `telp_outlet` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_outlet`
--

INSERT INTO `tb_outlet` (`id_outlet`, `nama_outlet`, `alamat_outlet`, `telp_outlet`) VALUES
(1, 'Laundry Barokah', 'Jalan Sawojajar 2', '085712349876'),
(2, 'Laundry Ceria Selalu', 'Jalan Jakarta No. 21 Malang', '089712348765'),
(3, 'Laundry Semeru ', 'Jalan Semeru No.23 Malang', '089123457342');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga_paket` varchar(11) NOT NULL,
  `id_kategori_paket` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `id_outlet`, `nama_paket`, `harga_paket`, `id_kategori_paket`) VALUES
(7, 1, 'Paket Cepat Kaos', '5000', 5),
(8, 3, 'Paket Boneka Spesial ', '15000', 7),
(9, 3, 'Paket Express Selimut 1', '20000', 3),
(10, 1, 'Paket Express', '15000', 4),
(11, 1, 'Paket Spesial 10k', '10000', 5),
(12, 1, 'Paket Biasa ', '5000', 4),
(14, 1, 'Paket Spesial Ramdhan Karem', '12000', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_outlet` int(11) NOT NULL,
  `kode_transaksi` varchar(100) NOT NULL,
  `id_member` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `batas_waktu` datetime NOT NULL,
  `tgl_bayar` datetime NOT NULL,
  `biaya_tambahan` int(225) NOT NULL,
  `diskon` double NOT NULL,
  `pajak` int(11) NOT NULL,
  `status` enum('baru','proses','selesai','diambil') NOT NULL,
  `status_bayar` enum('dibayar','belum') NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id_transaksi`, `id_outlet`, `kode_transaksi`, `id_member`, `tgl_transaksi`, `batas_waktu`, `tgl_bayar`, `biaya_tambahan`, `diskon`, `pajak`, `status`, `status_bayar`, `id_user`) VALUES
(18, 1, 'TRX202104231418', 5, '2021-04-23 06:18:35', '2021-04-30 12:00:00', '2021-04-23 08:28:36', 5000, 0, 500, 'diambil', 'dibayar', 20),
(19, 1, 'TRX202104230746', 3, '2021-04-23 06:46:25', '2021-04-30 12:00:00', '2021-04-23 08:29:09', 5000, 1500, 500, 'baru', 'dibayar', 20),
(20, 1, 'TRX202104230726', 4, '2021-04-23 07:26:30', '2021-04-30 12:00:00', '2021-04-23 08:29:33', 5000, 2000, 500, 'baru', 'dibayar', 20),
(22, 1, 'TRX202104234535', 2, '2021-04-23 07:36:06', '2021-04-30 12:00:00', '0000-00-00 00:00:00', 3000, 500, 500, 'baru', 'belum', 20),
(23, 1, 'TRX202104230139', 1, '2021-04-23 07:39:20', '2021-04-30 12:00:00', '2021-04-23 08:29:22', 5000, 1500, 500, 'baru', 'dibayar', 20),
(25, 1, 'TRX202104242327', 3, '2021-04-24 01:27:37', '2021-05-01 12:00:00', '2021-04-24 01:32:35', 5000, 2500, 500, 'proses', 'dibayar', 20),
(26, 1, 'TRX202104240829', 5, '2021-04-24 01:29:26', '2021-05-01 12:00:00', '2021-04-24 01:33:13', 4500, 500, 500, 'baru', 'dibayar', 20),
(27, 1, 'TRX202104240531', 4, '2021-04-24 01:31:26', '2021-05-01 12:00:00', '0000-00-00 00:00:00', 5000, 0, 500, 'baru', 'belum', 20),
(29, 1, 'TRX202104254401', 4, '2021-04-25 06:02:15', '2021-05-02 12:00:00', '0000-00-00 00:00:00', 4000, 0, 500, 'baru', 'belum', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(150) DEFAULT NULL,
  `role` enum('admin','kasir','owner') NOT NULL,
  `id_outlet` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `role`, `id_outlet`) VALUES
(3, 'Admin Ananta', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', NULL),
(5, 'Owner Ananta', 'owner', '72122ce96bfec66e2396d2e25225d70a', 'owner', 2),
(20, 'Ananta Kasir Utama', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`),
  ADD KEY `id_transaksi` (`id_transaksi`),
  ADD KEY `id_paket` (`id_paket`);

--
-- Indeks untuk tabel `tb_kategori_paket`
--
ALTER TABLE `tb_kategori_paket`
  ADD PRIMARY KEY (`id_kategori_paket`);

--
-- Indeks untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_kategori_paket` (`id_kategori_paket`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_outlet` (`id_outlet`),
  ADD KEY `id_member` (`id_member`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_outlet` (`id_outlet`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori_paket`
--
ALTER TABLE `tb_kategori_paket`
  MODIFY `id_kategori_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_member`
--
ALTER TABLE `tb_member`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tb_outlet`
--
ALTER TABLE `tb_outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_detail_transaksi`
--
ALTER TABLE `tb_detail_transaksi`
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_1` FOREIGN KEY (`id_paket`) REFERENCES `tb_paket` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_detail_transaksi_ibfk_2` FOREIGN KEY (`id_transaksi`) REFERENCES `tb_transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD CONSTRAINT `tb_paket_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_paket_ibfk_2` FOREIGN KEY (`id_kategori_paket`) REFERENCES `tb_kategori_paket` (`id_kategori_paket`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD CONSTRAINT `tb_transaksi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_2` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_transaksi_ibfk_3` FOREIGN KEY (`id_member`) REFERENCES `tb_member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`id_outlet`) REFERENCES `tb_outlet` (`id_outlet`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
