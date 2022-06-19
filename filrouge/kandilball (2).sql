-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 04:14 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kandilball`
--

-- --------------------------------------------------------

--
-- Table structure for table `agence`
--

CREATE TABLE `agence` (
  `id_station` int(100) NOT NULL,
  `adresse` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agence`
--

INSERT INTO `agence` (`id_station`, `adresse`) VALUES
(1, 'Branes 2 n 137 / Tanger ');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `fname` varchar(254) DEFAULT NULL,
  `lname` varchar(254) DEFAULT NULL,
  `phone` varchar(254) DEFAULT NULL,
  `adresse` varchar(254) DEFAULT NULL,
  `CIN` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `fname`, `lname`, `phone`, `adresse`, `CIN`) VALUES
(17, 'Fati', 'elboubekri', '0932329322', 'fatiboub27@gmail.com', 'K12345'),
(18, 'Kandil', 'Omar', '0661234567', 'omarkandildev@gmail.com', 'k593088');

-- --------------------------------------------------------

--
-- Table structure for table `gestionnaire`
--

CREATE TABLE `gestionnaire` (
  `id_gestionnaire` int(10) NOT NULL,
  `id_station` int(10) NOT NULL,
  `email` varchar(254) DEFAULT NULL,
  `pwd` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gestionnaire`
--

INSERT INTO `gestionnaire` (`id_gestionnaire`, `id_station`, `email`, `pwd`) VALUES
(4, 1, 'omarkandildw@gmail.com', 'omaromar');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id_reservation` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `cin` varchar(10) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `hour` varchar(100) NOT NULL,
  `jour` date NOT NULL,
  `stade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id_reservation`, `id_client`, `cin`, `fname`, `hour`, `jour`, `stade`) VALUES
(164, 17, 'K12345', 'Fati', '11->12', '2022-06-16', 'ibn battouta 2'),
(163, 17, 'K12345', 'Fati', '12->13', '2022-06-15', 'Branes 2'),
(165, 18, 'k593088', 'Kandil', '12->13', '2022-06-17', 'Branes 2'),
(162, 17, 'K12345', 'Fati', '13->14', '2022-06-15', 'ibn battouta 2');

-- --------------------------------------------------------

--
-- Table structure for table `stade`
--

CREATE TABLE `stade` (
  `stade_id` int(10) NOT NULL,
  `id_station` int(10) NOT NULL,
  `stadename` varchar(254) DEFAULT NULL,
  `stadeimage` varchar(254) DEFAULT NULL,
  `stadetype` varchar(254) DEFAULT NULL,
  `categorie` varchar(254) DEFAULT NULL,
  `size` varchar(254) DEFAULT NULL,
  `prix_par_heure` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stade`
--

INSERT INTO `stade` (`stade_id`, `id_station`, `stadename`, `stadeimage`, `stadetype`, `categorie`, `size`, `prix_par_heure`) VALUES
(1, 1, 'Ibn battouta 2', 'images/ibn battouta.jpg', 'pelouse synthétique', 'à ciel ouvert', '4500 \n m²', 25),
(2, 1, 'Branes 2', 'images/futsal1.jpg', 'terrain de  handball', 'salle', '648 \n m²', 10),
(3, 1, 'hilal indoor', 'images/indoor.jpg', 'pelouse synthétique', 'salle', '670 m²', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agence`
--
ALTER TABLE `agence`
  ADD PRIMARY KEY (`id_station`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD PRIMARY KEY (`id_gestionnaire`),
  ADD KEY `FK_Association_4` (`id_station`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`hour`,`jour`,`stade`),
  ADD UNIQUE KEY `id_reservation` (`id_reservation`),
  ADD KEY `FK_Association_7` (`id_client`);

--
-- Indexes for table `stade`
--
ALTER TABLE `stade`
  ADD PRIMARY KEY (`stade_id`),
  ADD KEY `FK_Association_8` (`id_station`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agence`
--
ALTER TABLE `agence`
  MODIFY `id_station` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  MODIFY `id_gestionnaire` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id_reservation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `stade`
--
ALTER TABLE `stade`
  MODIFY `stade_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gestionnaire`
--
ALTER TABLE `gestionnaire`
  ADD CONSTRAINT `FK_Association_4` FOREIGN KEY (`id_station`) REFERENCES `agence` (`id_station`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `FK_Association_7` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Constraints for table `stade`
--
ALTER TABLE `stade`
  ADD CONSTRAINT `FK_Association_8` FOREIGN KEY (`id_station`) REFERENCES `agence` (`id_station`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
