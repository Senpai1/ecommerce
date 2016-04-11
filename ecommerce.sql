-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2016 at 12:57 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_bestellingen`
--

CREATE TABLE `cart_bestellingen` (
  `id` int(11) NOT NULL,
  `klant_id` int(11) NOT NULL,
  `totaal_prijs` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_bestellingen`
--

INSERT INTO `cart_bestellingen` (`id`, `klant_id`, `totaal_prijs`) VALUES
(1, 2, '22');

-- --------------------------------------------------------

--
-- Table structure for table `cart_bestellingregels`
--

CREATE TABLE `cart_bestellingregels` (
  `id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `bestelling_id` int(11) DEFAULT NULL,
  `aantal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_klanten`
--

CREATE TABLE `cart_klanten` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_klanten`
--

INSERT INTO `cart_klanten` (`id`, `name`, `email`) VALUES
(1, 'Jay', '1016498@idcollege.nl'),
(2, 'Jay', '1016498@idcollege.nl');

-- --------------------------------------------------------

--
-- Table structure for table `cart_producten`
--

CREATE TABLE `cart_producten` (
  `id` int(4) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_producten`
--

INSERT INTO `cart_producten` (`id`, `name`, `price`) VALUES
(1, 'Hitchhiker guide to the Galaxy', '42'),
(2, 'Sjaqiel de katoenplukker', '22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_bestellingen`
--
ALTER TABLE `cart_bestellingen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_bestellingregels`
--
ALTER TABLE `cart_bestellingregels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_klanten`
--
ALTER TABLE `cart_klanten`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_producten`
--
ALTER TABLE `cart_producten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_bestellingen`
--
ALTER TABLE `cart_bestellingen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cart_bestellingregels`
--
ALTER TABLE `cart_bestellingregels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cart_klanten`
--
ALTER TABLE `cart_klanten`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `cart_producten`
--
ALTER TABLE `cart_producten`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
