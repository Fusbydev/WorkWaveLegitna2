-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 06, 2023 at 03:51 AM
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
-- Database: `workwave`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `setup` int(11) DEFAULT NULL,
  `profile_picture` varchar(1000) NOT NULL,
  `bio` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `username`, `email`, `password`, `setup`, `profile_picture`, `bio`) VALUES
(48, 'fusbai', 'example@gmail.com', 'costacashman', 1, '', ''),
(49, 'marwene', 'merlin@gmail.com', '12345678', 1, 'IMG-656fcbf84eefb8.00227609.', 'asdasd'),
(58, 'aikawa', 'aikawa@gmail.com', '123456789', 1, '', ''),
(59, 'steve', 'steve@gmail.com', '123456789', 1, 'IMG-656f545ab05672.37338582.jpg', 'dahshjdad');

-- --------------------------------------------------------

--
-- Table structure for table `client_hunting`
--

CREATE TABLE `client_hunting` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `looking_for` varchar(10000) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client_hunting`
--

INSERT INTO `client_hunting` (`id`, `username`, `looking_for`, `description`) VALUES
(176, 'marwene', 'marwene', 'hello'),
(177, 'steve', 'steve', 'tekken');

-- --------------------------------------------------------

--
-- Table structure for table `pending_clients`
--

CREATE TABLE `pending_clients` (
  `id` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `looking_for` varchar(1000) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `applicants` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pending_clients`
--

INSERT INTO `pending_clients` (`id`, `username`, `looking_for`, `description`, `applicants`) VALUES
(6, 'marwene', 'marwene', 'hello', 'steve'),
(7, 'steve', 'steve', 'tekken', 'marwene');

-- --------------------------------------------------------

--
-- Table structure for table `pending_services`
--

CREATE TABLE `pending_services` (
  `id` int(100) NOT NULL,
  `freelancer_name` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(100) NOT NULL,
  `client_username` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `description`, `name`, `price`) VALUES
(61, 'macho dancer', 'lkasd', 'marwene', 123123),
(62, 'jasnd', 'lasjdk', 'steve', 12313);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `client_hunting`
--
ALTER TABLE `client_hunting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_clients`
--
ALTER TABLE `pending_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending_services`
--
ALTER TABLE `pending_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `client_hunting`
--
ALTER TABLE `client_hunting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `pending_clients`
--
ALTER TABLE `pending_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pending_services`
--
ALTER TABLE `pending_services`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
