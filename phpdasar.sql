-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 04:12 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `anime`
--

CREATE TABLE `anime` (
  `id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Studio` varchar(100) NOT NULL,
  `Genre` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manga`
--

CREATE TABLE `manga` (
  `id` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Genre` varchar(100) NOT NULL,
  `Author` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manga`
--

INSERT INTO `manga` (`id`, `Title`, `Genre`, `Author`, `image`) VALUES
(1, 'JoJo\'s Bizarre Adventure Part 7: Steel Ball Run', 'Action, Adventure, Horror, Mystery, Supernatural', 'Araki, Hirohiko ', 'sbr.jpg'),
(2, 'How to Grill Our Love', 'Gourmet, Romance, Slice of Life', 'Hanatsuka, Shiori', 'grill.jpg'),
(3, 'Chainsaw Man', ' Action, Adventure, Award Winning', 'Fujimoto, Tatsuki', 'chainsawman.jpg'),
(7, 'I Sold My Life for Ten Thousand Yen per Year', 'Drama', 'Miaki, Sugaru', '62ecba103daf3.jpg'),
(8, 'asdasda', 'asdasdasd', 'sdasdasd', '62ecddd1c08d9.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`) VALUES
(1, 'raihan', '$2y$10$HnjSsZ9jwePc5tjBcXOek.NrfUwt6q5FXjvFo5Tb.34TJvaQXSNVe'),
(3, 'rai', '$2y$10$nuOz7bcZpV5O/2nGr61Im.YwoHiA4gbKqM6oGC4WqDxBGriK2rzGm'),
(4, 'han', '$2y$10$642f9zbQbIEGP2r.5IAmFOsgQLAjHYyH8.I6znPUfrJlDMqpk0OIe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manga`
--
ALTER TABLE `manga`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anime`
--
ALTER TABLE `anime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `manga`
--
ALTER TABLE `manga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
