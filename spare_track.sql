-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 09, 2023 at 09:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spare_track`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) DEFAULT NULL,
  `added_at` int(128) NOT NULL,
  `deleted_at` int(11) DEFAULT NULL,
  `kategori` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `foto`, `harga`, `stok`, `terjual`, `added_at`, `deleted_at`, `kategori`, `merk`, `id_admin`) VALUES
(7, 'Ampas rem', '8ca18001a0da509b6425e997093d36fe.jpg', 20000, 100, NULL, 1688656884, NULL, 'REM', 'UNIVERSAL', 1),
(8, 'Kaca spion', 'e116a76df630de2de97ac6bf92b1ff5d.jpg', 20000, 100, NULL, 1688657081, NULL, 'OLI', 'UNIVERSAL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `checkout_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`checkout_id`, `user_id`, `total`, `tanggal`) VALUES
(2, 10, 60000, 1688869132),
(3, 10, 60000, 1688869173),
(4, 10, 20000, 1688869194),
(5, 10, 80000, 1688880734);

-- --------------------------------------------------------

--
-- Table structure for table `checkout_product`
--

CREATE TABLE `checkout_product` (
  `id` int(11) NOT NULL,
  `checkout_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout_product`
--

INSERT INTO `checkout_product` (`id`, `checkout_id`, `product_id`, `quantity`, `status`) VALUES
(57, 0, 7, 3, 1),
(61, 0, 8, 1, 1),
(62, 0, 7, 2, 1),
(65, 1, 7, 1, 1),
(66, 1, 8, 2, 1),
(67, 2, 7, 1, 1),
(68, 2, 8, 2, 1),
(69, 3, 7, 1, 1),
(70, 3, 8, 2, 1),
(71, 4, 7, 1, 1),
(73, 5, 7, 1, 1),
(74, 5, 8, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'OLI'),
(2, 'REM');

-- --------------------------------------------------------

--
-- Table structure for table `merk`
--

CREATE TABLE `merk` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `merk`
--

INSERT INTO `merk` (`id`, `nama`) VALUES
(1, 'UNIVERSAL'),
(2, 'YAMAHA'),
(3, 'HONDA');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'fnaiofen', 'Irgiyansy@gmail.com', '$2y$10$.4pN7SFcgrAKcZ885Vq1U.7kjAWi1kTOWSm5rnxMhFbMECr1Qcm3O', '8d47a8bc1fb68e72c079881c8e15ae88.jpg', 2, 1, 1684915086),
(2, 'Dodo', 'dodo@gmail.com', '$2y$10$Qqan7ruFVjZnr8ZWS9E9H.rB5U/cs9zn3/Qast4sNeZCWzYPg5OuS', 'default.jpg', 2, 1, 1684917419),
(3, 'test', 'tes@gmail.com', '$2y$10$iR/Fm20/hTS27aSBmLiiqes5YWDIRJ.AsLH8Zn5N.dk7GO2wXvoym', 'default.jpg', 2, 1, 1684917563),
(4, 'irgi', 'irgiyansyah54@smk.belajar.id', '$2y$10$4fcFpzd0FTCOFEccLCVSjOxyb8kdG2V033pPIZeqnUFYDETy3BUw2', 'default.jpg', 2, 1, 1684917668),
(5, 'asman', 'asman@gmail.com', '$2y$10$R4P64NQqw4Z.mKFgIvJzLe.oKlj83kOIlPmjAodmZleXhRfI.77qa', 'default.jpg', 2, 1, 1684987013),
(6, 'feofeanon', 'pasd@gmail.com', '$2y$10$HfbZjg3IvmdE1udCgr2UPeXXIf03QU/q2XGUXjUJ418EbNUG5e5BC', 'default.jpg', 2, 1, 1684987701),
(7, 'daofo', 'foafn@gmail.com', '$2y$10$IGVKraLbHmLpwxCmmDUuq.DjvEjdmR9FrpKSoTFV.HQmLTCepfZtW', 'default.jpg', 2, 1, 1684988134),
(8, 'Irgiyansyah', 'irgiirgi@gmail.com', '$2y$10$sM9E4qBokoGQRrjfinqPWeP0oSna0VxGPZT8NOm7MoRqSSAZWUbGm', 'default.jpg', 2, 1, 1688223447),
(9, 'mori', 'mori@gmail.com', '$2y$10$ImO1ewKJ0rbaCA27DpEeC.VXrG5EZhmXYCx./sm.wGWdv801Sudby', 'default.jpg', 1, 1, 1688224520),
(10, 'Irgiyansyah12', 'irgi12@gmail.com', '$2y$10$Db3t.GwVg8x5kXsKCOuOku0Gvm.kbdDSdYpwrcaIWXCRFFHZVDNe.', 'default.jpg', 1, 1, 1688824232);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`id`, `role`) VALUES
(1, 'operator'),
(2, 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `checkout_product`
--
ALTER TABLE `checkout_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `checkout_product`
--
ALTER TABLE `checkout_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `merk`
--
ALTER TABLE `merk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `users_role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
