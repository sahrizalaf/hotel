-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2022 at 04:03 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_fasilitas_hotel` int(11) NOT NULL,
  `nama_fasilitas_hotel` varchar(100) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_fasilitas_hotel`, `nama_fasilitas_hotel`, `keterangan`, `gambar`) VALUES
(1, 'Kolam Renang Indoor', 'Lorem ipsum dolor', 'kolam.jpg'),
(2, 'Gym Center', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, error animi facilis enim quisquam ex adipisci, laboriosam voluptatum, eius nobis numquam rerum repudiandae rem sit quas dicta fugiat possimus accusamus.', 'gym.jpg'),
(3, 'Cafetaria', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, error animi facilis enim quisquam ex adipisci, laboriosam voluptatum, eius nobis numquam rerum repudiandae rem sit quas dicta fugiat possimus accusamus.', 'cafetaria.jpg'),
(4, 'Ballroom', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, error animi facilis enim quisquam ex adipisci, laboriosam voluptatum, eius nobis numquam rerum repudiandae rem sit quas dicta fugiat possimus accusamus.', 'ballroom.jpg'),
(5, 'Meeting Room', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, error animi facilis enim quisquam ex adipisci, laboriosam voluptatum, eius nobis numquam rerum repudiandae rem sit quas dicta fugiat possimus accusamus.', 'meetingroom.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `tipe_kamar` varchar(100) DEFAULT NULL,
  `fasilitas_kamar` text DEFAULT NULL,
  `jumlah_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `tipe_kamar`, `fasilitas_kamar`, `jumlah_kamar`) VALUES
(1, 'Superior', 'TV LED 50\"\r\nKing Size Bed\r\nKamar Mandi Shower & Bathtub\r\nSofa\r\nAC\r\nCoffee Maker\r\nWiFi\r\nGRATIS Snack & Makan di Cafetaria 3x', 22),
(2, 'Deluxe', 'TV LED 42\"\r\nDouble Size Bed\r\nKamar Mandi Shower\r\nAC\r\nWiFi\r\nGRATIS Snack & Makan di Cafetaria 2x', 30),
(3, 'Basic Plus Plus', 'TV LED 42\"\r\nSingle Size Bed\r\nKamar Mandi Shower\r\nAC\r\nWiFi\r\nGRATIS Snack & Makan di Cafetaria 1x', 30);

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `nama_tamu` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `no_handphone` varchar(13) DEFAULT NULL,
  `tanggal_cek_in` date DEFAULT NULL,
  `tanggal_cek_out` date DEFAULT NULL,
  `status` enum('Cek In','Cek Out') DEFAULT NULL,
  `jumlah_kamar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_kamar`, `nama_tamu`, `email`, `no_handphone`, `tanggal_cek_in`, `tanggal_cek_out`, `status`, `jumlah_kamar`) VALUES
(1, 1, 'Jajang', 'jajang@mail.com', '0812121212', '2022-03-16', '2022-03-19', 'Cek In', 1),
(2, 2, 'Suci', 'suci@mail.com', '0821212121', '2022-03-16', '2022-03-17', 'Cek In', 3),
(3, 3, 'Unang', 'unang@mail.com', '0876761261212', '2022-03-16', '2022-03-17', 'Cek In', 2),
(4, 1, 'Santoso', 'santoso@mail.com', '08123123123', '2022-03-16', '2022-03-21', 'Cek In', 4),
(5, 2, 'Santoso', 'santoso@mail.com', '08123123123', '2022-03-16', '2022-03-17', 'Cek In', 5),
(11, 3, 'Santoso', 'santoso@mail.com', '08123123123', '2022-03-16', '2022-03-24', 'Cek In', 3),
(12, 2, 'Sugiono', 'sugiono@mail.com', '089121212', '2022-03-17', '2022-03-19', 'Cek In', 1),
(13, 3, 'Haikal', 'haikal@mail.com', '08112312323', '2022-03-18', '2022-03-19', 'Cek In', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `level` enum('admin','resepsionis') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '$2y$10$MoPNPUOijDF7UNItXi6wGOkd/i4DEiyDuro8hd.mX5kuoESsxjwsO', 'admin'),
(2, 'resepsionis', '$2y$10$Q7CPYr0SmRpcee2FTXaMhO7TPJDBPFPXE1eDEJUD4064wM2CSJkvS', 'resepsionis'),
(3, 'usep', '$2y$10$AG./GH4.AG8KJt7soD.LQeDCbqqWBbJlvI79fRfHvNIAUrylicc5u', 'admin'),
(4, 'adnin', '$2y$10$.x28IUY6YN9TmhvlpCOKLuoRmVZGm4dnEGuXKfRbgdNq9s8AIWgnK', 'resepsionis'),
(5, 'jajang', '$2y$10$hsCh4lh.rjWCWeYsRRNPeOf5tpoL6Dp8oHMTa.LgMzbl7naJCz5/W', 'resepsionis'),
(6, 'sugiono', '$2y$10$aJABXutHhArqLhWe1o8PhuGzZvaYWak.AL468mXmnOYMFjCDbryKK', 'admin'),
(7, 'hanna', '$2y$10$.3k4QGoPSbOW5RdilPEwZu/LidvhqOFzejHFFSvLYaLTRkDc.R3nC', 'resepsionis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas_hotel`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_fasilitas_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
