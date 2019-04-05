-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2019 at 07:38 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pafandb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dummy`
--

CREATE TABLE `dummy` (
  `id` int(11) NOT NULL,
  `dummy1` varchar(256) COLLATE utf8_bin NOT NULL,
  `dummy2` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `dummy`
--

INSERT INTO `dummy` (`id`, `dummy1`, `dummy2`) VALUES
(1, 'NV', 'NV'),
(2, 'NV', 'NV'),
(3, 'alpha', 'beta');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `category` varchar(64) COLLATE utf8_bin NOT NULL,
  `game_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `game_description` varchar(2048) COLLATE utf8_bin NOT NULL,
  `game_rules` varchar(2048) COLLATE utf8_bin NOT NULL,
  `min_players` int(11) NOT NULL,
  `max_players` int(11) NOT NULL,
  `age_limit` int(11) NOT NULL,
  `comment` varchar(256) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `category`, `game_name`, `game_description`, `game_rules`, `min_players`, `max_players`, `age_limit`, `comment`) VALUES
(1, 'Action', 'Kungfu', 'Fight between two players', 'Rule 1\r\nRule 2\r\nRule 3\r\n', 2, 2, 6, 'This game is fun!!!'),
(2, 'Puzzle', 'Sudoku', 'Rearranging the numbers', 'Rule 1\r\nRule 2\r\nRule 3', 1, 2, 8, 'Cool Game!!'),
(3, 'Puzzle', 'Sudoku', 'Rearranging the numbers', 'Rule 1\r\nRule 2\r\nRule 3', 1, 2, 8, 'Cool Game!!'),
(4, 'Puzzle', 'Sudoku', 'Rearranging the numbers', 'Rule 1\r\nRule 2\r\nRule 3', 1, 2, 8, 'Cool Game!!');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` enum('User','Admin') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `username`, `password`, `type`) VALUES
(1, 'phani.sidhanthi03@gmail.com', 'phani', 'phani', 'Admin'),
(2, 'john.doe@gmail.com', 'john', 'doe', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dummy`
--
ALTER TABLE `dummy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dummy`
--
ALTER TABLE `dummy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
