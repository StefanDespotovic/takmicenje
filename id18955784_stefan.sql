-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2022 at 12:02 PM
-- Server version: 10.5.12-MariaDB
-- PHP Version: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id18955784_stefan_anida`
--

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dog_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `breed` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `likes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`, `name`, `email`, `password`, `dog_name`, `breed`, `year`, `likes`) VALUES
(13, 'maltese.jpg', '2022-06-13 15:20:37', '1', 'Anida', 'anida@mail.com', 'anida', 'Pasha', 'Maltese', 9, 2),
(14, 'poodle.jpg', '2022-06-13 15:21:37', '1', 'Stefan', 'stefan@mail.com', 'stefan', 'Max', 'Poodle', 3, 2),
(15, 'bernese.jpg', '2022-06-13 15:22:43', '1', 'Erik', 'erik@mail.com', 'erik', 'Oscar', 'Bernese', 6, 2),
(16, 'shepherd.jpg', '2022-06-13 15:23:24', '1', 'Chris', 'chris@mail.com', 'chris', 'Chip', 'Shepherd', 6, 1),
(17, 'labrador.jpg', '2022-06-13 15:24:00', '1', 'Ana', 'ana@mail.com', 'ana', 'Rex', 'Labrador', 5, 1),
(18, 'golden retriever.jpg', '2022-06-13 15:24:48', '1', 'Elena', 'elena@mail.com', 'elena', 'Jasper', 'Golder Retriever', 3, NULL),
(19, 'dachshund.jpg', '2022-06-13 15:25:40', '1', 'Sandra', 'sandra@mail.com', 'sandra', 'Teddy', 'Dachshund', 5, NULL),
(20, 'bulldog.jpg', '2022-06-13 15:26:19', '1', 'Tom', 'tom@mail.com', 'tom', 'Milo', 'Bulldog', 6, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `judge`
--

CREATE TABLE `judge` (
  `id` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `judge`
--

INSERT INTO `judge` (`id`, `email`, `password`) VALUES
(1, 'sudija1@mail.com', 'sudija1'),
(2, 'sudija2@mail.com', 'sudija2'),
(3, 'sudija3@mail.com', 'sudija3'),
(4, 'sudija4@mail.com', 'sudija4'),
(5, 'sudija5@mail.com', 'sudija5'),
(6, 'sudija6@mail.com', 'sudija6'),
(7, 'sudija7@mail.com', 'sudija7');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userid`, `postid`) VALUES
(77, 1, 17),
(78, 1, 14),
(79, 1, 13),
(80, 1, 16),
(81, 2, 14),
(82, 2, 15),
(83, 2, 13),
(84, 2, 16);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judge`
--
ALTER TABLE `judge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `judge`
--
ALTER TABLE `judge`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
