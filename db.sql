-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 14, 2022 at 08:05 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csc385_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`user`, `password`) VALUES
('monah', '$2y$10$5RrYJnnh7b9fbo.grKiqYufmhk.gDGqSogzhQaBMIEI4mfOeHw9k6');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(255) NOT NULL,
  `purpose` enum('feedback','support','question','problem','general') COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `purpose`, `comments`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'john', 'john@doe.com', 1111111, 'feedback', 'dfgdf', '2022-12-09 21:13:48', '2022-12-09 21:13:48', '2022-12-10 15:05:28'),
(2, 'usa', 'usa@usa.coma', 222222222, 'feedback', 'gfdsgsfdgg', '2022-12-09 21:26:41', '2022-12-09 21:26:41', '2022-12-12 12:33:37'),
(3, 'america', 'usa@usa.gov', 333333333, 'feedback', 'gfdsgsfdgg', '2022-12-09 21:26:53', '2022-12-09 21:26:53', '2022-12-12 12:33:38'),
(12, 'john', 'john@doe.com', 96171143125, 'feedback', 'fdg', '2022-12-10 15:39:19', '2022-12-10 15:39:19', NULL),
(13, 'john', 'john@doe.com', 9617114312, 'feedback', 'fdg', '2022-12-10 15:39:43', '2022-12-10 15:39:43', NULL),
(14, 'john', 'john@doe.com', 9617114312, 'feedback', 'fdg', '2022-12-10 15:40:04', '2022-12-10 15:40:04', NULL),
(15, 'john', 'john@doe.com', 9613143125, 'feedback', 'fdg', '2022-12-10 15:42:30', '2022-12-10 15:42:30', NULL),
(16, 'john', 'john@doe.com', 9613143125, 'feedback', 'fdg', '2022-12-10 15:42:42', '2022-12-10 15:42:42', NULL),
(17, 'john', 'john@doe.com', 96181143125, 'feedback', 'fdg', '2022-12-10 15:42:49', '2022-12-10 15:42:49', NULL),
(18, 'john', 'john@doe.com', 9618114312, 'feedback', 'fdg', '2022-12-10 15:42:52', '2022-12-10 15:42:52', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rank` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logo`, `rank`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Argentina', 'argentina.jpg', 5, '2022-12-08 23:58:54', '2022-12-08 23:58:54', NULL),
(2, 'Brazil', 'brazil.png', 10, '2022-12-08 23:58:54', '2022-12-08 23:58:54', NULL),
(3, 'England', 'england.png', 3, '2022-12-08 23:58:54', '2022-12-08 23:58:54', NULL),
(4, 'France', 'france.jpg', 1, '2022-12-08 23:58:54', '2022-12-08 23:58:54', NULL),
(90, 'Morocco', '639616ea473bb_morocco.png', 0, '2022-12-11 19:58:47', '2022-12-12 12:33:03', NULL),
(91, 'Netherlands', '63960c65da85e_netherlands.png', 8, '2022-12-11 19:59:17', '2022-12-11 19:59:17', '2022-12-12 12:31:56');

-- --------------------------------------------------------

--
-- Table structure for table `team_players`
--

CREATE TABLE `team_players` (
  `player_id` int(11) NOT NULL,
  `team_id` int(20) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `team_players`
--

INSERT INTO `team_players` (`player_id`, `team_id`, `name`, `photo`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'Alario', 'alario.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(2, 1, 'Celso', 'celso.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(3, 1, 'Di Maria', 'diMaria.png', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(4, 1, 'Dorada', 'dorada.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(5, 1, 'Dybala', 'dybala.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(6, 1, 'Gomez', 'gomez.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(7, 1, 'Messi', 'messi.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(8, 1, 'Otamendi', 'otamendi.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(9, 1, 'Palacio', 'palacio.png', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(10, 1, 'Pereyra', 'pereyra.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(11, 1, 'Pezella', 'pezella.png', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(12, 1, 'Romero', 'romero.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(13, 2, 'Alves', 'alves.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(14, 2, 'Claudinho', 'claudinho.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(15, 2, 'Coutinho', 'coutinho.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(16, 2, 'Fabinho', 'fabinho.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(17, 2, 'Firmino', 'firmino.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(18, 2, 'Hulk', 'hulk.png', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(19, 2, 'Menino', 'menino.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(20, 2, 'Neymar', 'neymar.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(21, 2, 'Raphinha', 'raphinha.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(22, 2, 'Richarlison', 'richarlison.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(23, 2, 'Sandro', 'sandro.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(24, 2, 'Silva', 'silva.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(25, 3, 'White', 'white.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(26, 3, 'Arnold', 'arnold.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(27, 3, 'Bowen', 'bowen.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(28, 3, 'Guehi', 'guehi.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(29, 3, 'Henderson', 'henderson.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(30, 3, 'Kane', 'kane.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(31, 3, 'Henderson', 'keeperhenderson.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(32, 3, 'Mount', 'mount.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(33, 3, 'Shaw', 'shaw.png', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(34, 3, 'Stones', 'stones.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(35, 3, 'Tomori', 'tomori.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(36, 3, 'Walker', 'walker.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(37, 4, 'Dembele', 'dembele.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(38, 4, 'Digne', 'digne.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(39, 4, 'Kante', 'kante.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(40, 4, 'Kimpembe', 'kimpembe.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(41, 4, 'Iloris', 'iloris.jpeg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(42, 4, 'Martial', 'martial.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(43, 4, 'Mbappe', 'mbappe.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(44, 4, 'Mendy', 'mendy.png', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(45, 4, 'Sissoko', 'sissoko.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(46, 4, 'Tchouameni', 'tchouameni.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(47, 4, 'Toulisso', 'toulisso.png', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL),
(48, 4, 'Varane', 'varane.jpg', '2022-12-08 23:59:58', '2022-12-08 23:59:58', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_players`
--
ALTER TABLE `team_players`
  ADD PRIMARY KEY (`player_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `team_players`
--
ALTER TABLE `team_players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
