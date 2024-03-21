-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2024 at 12:13 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_projects`
--

-- --------------------------------------------------------

--
-- Table structure for table `bulletin_board`
--

CREATE TABLE `bulletin_board` (
  `announcement_subject` varchar(100) DEFAULT NULL,
  `announcement_detail` text DEFAULT NULL,
  `id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bulletin_board`
--

INSERT INTO `bulletin_board` (`announcement_subject`, `announcement_detail`, `id`, `created_at`) VALUES
('as', 'as', 16, '2024-03-13 17:05:28'),
('asa', 'asas', 17, '2024-03-13 17:26:50'),
(NULL, NULL, 18, '2024-03-13 17:27:03'),
(NULL, NULL, 19, '2024-03-13 17:27:05'),
(NULL, NULL, 20, '2024-03-13 17:27:48'),
(NULL, NULL, 21, '2024-03-13 17:27:48'),
(NULL, NULL, 22, '2024-03-13 17:27:53'),
(NULL, NULL, 23, '2024-03-13 17:27:53'),
(NULL, NULL, 24, '2024-03-13 17:27:55'),
(NULL, NULL, 25, '2024-03-13 17:28:00'),
('sdsd', 'sdsd', 26, '2024-03-13 17:28:57'),
('&#60;script&#62;alert(&#39;Hello&#39;);&#60;/script&#62;', 'aAA', 27, '2024-03-13 17:32:11'),
('sdsd', 'SDSDSDSD', 28, '2024-03-13 17:32:20'),
('newest', 'SDSDSDSD', 29, '2024-03-13 17:42:18'),
('baddest', 'zxzx', 30, '2024-03-13 17:43:42'),
('baddest', 'zxzx', 31, '2024-03-13 17:47:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bulletin_board`
--
ALTER TABLE `bulletin_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
