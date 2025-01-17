-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 16, 2025 at 09:23 PM
-- Server version: 9.1.0
-- PHP Version: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `databas`
--

-- --------------------------------------------------------

--
-- Table structure for table `Words`
--

CREATE TABLE `Words` (
  `WordID` int NOT NULL,
  `Word` varchar(50) NOT NULL,
  `Definition` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Words`
--

INSERT INTO `Words` (`WordID`, `Word`, `Definition`) VALUES
(1, 'Abate', 'To reduce in amount, degree, or severity'),
(2, 'Cogent', 'Clear, logical, and convincing'),
(3, 'Effervescent', 'Bubbly, lively, and enthusiastic'),
(4, 'Harangue', 'A lengthy and aggressive speech'),
(5, 'Luminous', 'Bright or shining, especially in the dark'),
(6, 'Mundane', 'Lacking interest or excitement; dull'),
(7, 'Profligate', 'Recklessly extravagant or wasteful in the use of resources'),
(8, 'Quixotic', 'Exceedingly idealistic; unrealistic and impractical'),
(9, 'Rhetoric', 'The art of effective or persuasive speaking or writing'),
(10, 'Sanguine', 'Optimistic or positive, especially in a bad situation');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Words`
--
ALTER TABLE `Words`
  ADD PRIMARY KEY (`WordID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Words`
--
ALTER TABLE `Words`
  MODIFY `WordID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
