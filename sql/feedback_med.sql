-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: mysql-feedback.alwaysdata.net
-- Generation Time: Aug 23, 2020 at 01:18 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `feedback_med`
--

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `email` tinytext NOT NULL,
  `pseudo` text NOT NULL,
  `note` int(11) NOT NULL,
  `commentaire` text NOT NULL,
  `photo` text NOT NULL,
  `dateCreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `email`, `pseudo`, `note`, `commentaire`, `photo`, `dateCreate`) VALUES
(70, 'benkhalid@gmail.com', 'Linus', 5, '1er commentaire', 'avatar_100_100.jpg', '2020-08-22'),
(71, 'minus@yahoo.fr', 'Minus', 4, '2ème commentaire ... ', 'avatar_pika.gif', '2020-08-23'),
(72, 'man@linux.com', 'Linus man', 3, '3eme commentaire', 'avatar_linux.jpg', '2020-08-23'),
(73, 'avatar@av.com', 'avatar', 4, '4eme commentaire...', 'avatar_idea.png', '2020-08-23'),
(74, 'Mika@mail.com', 'Mika', 5, '<p><strong>5eme commentaire...</strong></p>\r\n', 'avatar_100_100.jpg', '2020-08-23');

-- --------------------------------------------------------

--
-- Table structure for table `uploadedimage`
--

CREATE TABLE `uploadedimage` (
  `Id` int(11) NOT NULL,
  `imagename` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploadedimage`
--

INSERT INTO `uploadedimage` (`Id`, `imagename`) VALUES
(1, 'genere_cle_ssh.png'),
(2, 'genere_cle_ssh.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uploadedimage`
--
ALTER TABLE `uploadedimage`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `uploadedimage`
--
ALTER TABLE `uploadedimage`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
