-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2023 at 03:29 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20222_wp2_412021021`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `id_login`, `nama`, `no_telpon`) VALUES
(3, 26, 'sabrina', '087765756757656');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `konten` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `judul`, `konten`, `gambar`, `link`) VALUES
(1, 'Harga Berlian Berdasarkan Karat beserta Tips Memilihnya', 'Harga berlian dipengaruhi oleh beratnya yang diukur dengan karat atau carat. Berlian 1 karat setara dengan 0,2 gram. Dikutip dari laman Naturally Colored, berikut kisaran harga berlian berdasarkan karatnya.', '01ggxmxhth6vq62kt670w92nr3.jpg', 'https://kumparan.com/berita-hari-ini/harga-berlian-berdasarkan-karat-beserta-tips-memilihnya-1zd8xCq90MA/full'),
(2, 'Investasi Emas: Apa Kelebihan Jenis Investasi Ini?', 'Selain saham, investasi emas juga dianggap sebagai salah satu bentuk investasi yang menjanjikan serta bisa memberikan keuntungan menarik untuk Anda. Jenis investasi ini merupakan pilihan investasi yang tengah naik daun di masa pandemi COVID-19. Ada beberapa cara investasi emas yang bisa dilakukan.Emas sendiri tidak hanya populer sebagai perhiasan saja, tapi juga dianggap sebagai pilihan investasi yang sangat menguntungkan. Pasalnya, investasi emas merupakan barang yang harganya cenderung naik serta jarang mengalami penurunan dalam jumlah yang signifikan.', '5f9c243c224db.jpg', 'https://www.cimbniaga.co.id/id/inspirasi/perencanaan/investasi-emas-apa-kelebihan-jenis-investasi-ini');

-- --------------------------------------------------------

--
-- Table structure for table `blok`
--

CREATE TABLE `blok` (
  `id` int(11) NOT NULL,
  `nama_blok` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blok`
--

INSERT INTO `blok` (`id`, `nama_blok`, `deskripsi`, `gambar`) VALUES
(1, 'Blok A', 'Deskripsi Blok A', 'blok_a.jpg'),
(2, 'Blok B', 'Deskripsi Blok B', 'blok_b.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_pemesanan`
--

CREATE TABLE `bukti_pemesanan` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_pemesanan` int(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bukti_pemesanan`
--

INSERT INTO `bukti_pemesanan` (`id`, `nama`, `id_pemesanan`, `foto`) VALUES
(1, 'sabrina', 13672448, 'Untitled design (4).png'),
(2, 'lili', 38649494, '5f9c243c224db.jpg'),
(3, 'cjjshfvb', 27464894, 'Untitled design (2).png'),
(4, 'shvcsdjbv', 27364894, 'Untitled design (2).png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(8, 'Necklace'),
(9, 'Rings'),
(10, 'Bracelet'),
(11, 'Earings');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('admin','pelanggan') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `level`) VALUES
(2, 'pelanggan1', 'pelanggan1pass', 'pelanggan'),
(3, '', '', 'pelanggan'),
(4, '', '', 'pelanggan'),
(5, '', '', 'pelanggan'),
(6, 'adc', 'jhv', 'pelanggan'),
(7, 'sasa', 'sasa', 'pelanggan'),
(8, 'sa', 'ascf', 'pelanggan'),
(9, 'sa', 'cmfn', 'pelanggan'),
(10, 'sasasa', 'sdc', 'pelanggan'),
(11, 'sasasauy', '756', 'pelanggan'),
(12, 'sadsv', 'ksdcbn', 'pelanggan'),
(13, 'ksdjcg', 'kvnk', 'pelanggan'),
(14, 'ascasc', 'sd,vmn', 'pelanggan'),
(15, 'user12', 'user12', 'pelanggan'),
(16, 'user12', 'rdcx', 'pelanggan'),
(17, 'user12', 'fcx', 'pelanggan'),
(18, 'idrus', '12345', 'pelanggan'),
(19, 'sabrina', 'sasa', 'pelanggan'),
(20, 'Sabrina1234', 'sasa', 'pelanggan'),
(21, 'reynaldo', '1234567', 'pelanggan'),
(22, 'fdcx', 'fdcx', 'pelanggan'),
(23, 'dsxz', 'fdcx', 'pelanggan'),
(24, 'rsdxz', 'dsxz', 'pelanggan'),
(25, 'tes', '$2y$10$/PToacwspdVAUXsNiUUKr.bKVZ4tJd.rfofBoHQvoakgwUouLZbuC', 'pelanggan'),
(26, 'admin', '$2y$10$i3xKt.XSxVGYzM5Eja4Y6edSBzSvLEvF6GmxQnAGFM6CUgwPaOu22', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `id_login` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `no_telpon` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `id_login`, `nama`, `no_telpon`, `email`, `alamat`) VALUES
(1, 2, 'Pelanggan Satu', '089876543210', 'pelanggan1@example.com', 'Alamat Pelanggan Satu'),
(12, 13, 'ksjdbcjksdc', '39471901', 'mascbkabj@gmail.com', ',embdvke'),
(13, 14, 'sdcvsdv', '0860', 'aksjcalcs@gmail.com', 'askcdjba'),
(14, 15, 'user12', '081286768', 'tes@gmail.com', 'gvcx'),
(15, 16, 'user12', '081286768', 'tes@gmail.com', 'gvcx'),
(16, 17, 'user12', '081286768', 'tes@gmail.com', 'gvcx'),
(17, 18, 'idrus', '0899797', 'idrus@gmail.com', 'rsdxzesz'),
(24, 25, 'sasa', '087672767', 'sasa@gmail.com', 'jakarta barat'),
(25, 26, 'admin', '08189273', 'admin@gmail.com', 'jakarta barat');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_pemesanan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `messenge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `messenge`) VALUES
(3, 'sasa', 'da@gmail.com', 'adjcbad'),
(4, 'didi', 'didi@gmail.com', 'sadhcvadskwvjc kasdfvoawudvbjwsdv');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `harga` mediumtext DEFAULT NULL,
  `gambar` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `id_kategori`, `nama`, `harga`, `gambar`) VALUES
(8, 8, 'Riri Necklace', '3000000', 'uploads/Roundabout Diamond Necklace - 14K White Gold(1).png'),
(9, 9, 'Theresia Ring', '1500000', 'uploads/Solitaire Flower Design 1 Carat Round Cut Vivid Ocean Blue Aquamarine.jpeg'),
(10, 10, 'Gugi Bracelet', '2000000', 'uploads/Subtle Drops bracelet White, Rhodium plated.jpeg'),
(11, 11, 'Jinji Earings', '1000000', 'uploads/Tiny Heart Huggies.jpeg'),
(13, 8, 'kiki', 'Rp.40000000', 'uploads/Diamond Cluster Necklace, 7 Bezel Diamond Necklace, Curved Bezel Diamond Necklace, Natural Diamond Minimalist Necklace, Anniversary Necklace.jpg'),
(14, 8, 'popi', 'Rp.6000000', 'uploads/Jacklin 1_05ct Diamond Necklace - Etsy.jpg'),
(15, 8, 'huhi', 'Rp. 5000000', 'uploads/3 Diamond Necklace.jpg'),
(16, 9, 'diku', 'Rp.7000000', 'uploads/This item is unavailable Etsy.jpg'),
(17, 9, 'rika', 'Rp.7000000', 'uploads/XdYqhyjL.jpg'),
(18, 9, 'jipi', 'Rp.9000000', 'uploads/nTzOWfmC.png'),
(19, 10, 'fifi', 'Rp.8000000', 'uploads/Swarovski Subtle Double Bracelet - Rhodium White.jpg'),
(20, 10, 'gigi', 'Rp.7000000', 'uploads/Kay Diamond Bolo Bracelet 1_4 ct tw Round-cut Sterling Silver.jpg'),
(21, 10, 'yiyi', 'Rp.6000000', 'uploads/Subtle Drops bracelet White, Rhodium plated.jpg'),
(22, 11, 'yiyo', 'Rp.7000000', 'uploads/PENNY PREVILLE Diamond Cluster Hoops.jpg'),
(23, 11, 'hihi', 'Rp.7000000', 'uploads/Mini Crystal Hoops.jpg'),
(24, 11, 'riri', 'Rp.7000000', 'uploads/Moderne Baguette Hoop Earrings.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `status` enum('proses','dibayar') NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_riwayat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_pemesanan` int(11) DEFAULT NULL,
  `total_harga` decimal(10,2) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blok`
--
ALTER TABLE `blok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bukti_pemesanan`
--
ALTER TABLE `bukti_pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_login` (`id_login`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_transaksi_ibfk_1` (`id_transaksi`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_ibfk_1` (`id_pemesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blok`
--
ALTER TABLE `blok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bukti_pemesanan`
--
ALTER TABLE `bukti_pemesanan`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `pelanggan_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `login` (`id`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD CONSTRAINT `riwayat_transaksi_ibfk_1` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
