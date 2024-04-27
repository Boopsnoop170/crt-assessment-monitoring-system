-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 27, 2024 at 03:11 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `register_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `act_bsit`
--

CREATE TABLE `act_bsit` (
  `id` int(11) NOT NULL,
  `learnerID` varchar(100) NOT NULL,
  `assessmentDate` date DEFAULT NULL,
  `qualification` varchar(100) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bsais`
--

CREATE TABLE `bsais` (
  `id` int(11) NOT NULL,
  `learnerID` varchar(100) NOT NULL,
  `assessmentDate` date DEFAULT NULL,
  `qualification` varchar(100) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bstm`
--

CREATE TABLE `bstm` (
  `id` int(11) NOT NULL,
  `learnerID` varchar(100) NOT NULL,
  `assessmentDate` date DEFAULT NULL,
  `qualification` varchar(100) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `btvte`
--

CREATE TABLE `btvte` (
  `id` int(11) NOT NULL,
  `learnerID` varchar(100) NOT NULL,
  `assessmentDate` date DEFAULT NULL,
  `qualification` varchar(100) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `delete_learners`
--

CREATE TABLE `delete_learners` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `courses` varchar(100) DEFAULT NULL,
  `specialization` varchar(255) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `delete_learners`
--

INSERT INTO `delete_learners` (`id`, `learner_id`, `lastname`, `firstname`, `middlename`, `image`, `courses`, `specialization`, `status`) VALUES
(115, 'ininin909', 'momomo', 'lplp', 'ubub', 'Screenshot (13).png', 'ACT/BSIT', 'BSIT: COMPUTER SYSTEM SERVICING NC II', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `graduate_report`
--

CREATE TABLE `graduate_report` (
  `id` int(11) NOT NULL,
  `learnerID` varchar(100) NOT NULL,
  `assessmentDate` date NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `dateOfGraduation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hm`
--

CREATE TABLE `hm` (
  `id` int(11) NOT NULL,
  `learnerID` varchar(100) NOT NULL,
  `assessmentDate` date DEFAULT NULL,
  `qualification` varchar(100) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `learners`
--

CREATE TABLE `learners` (
  `id` int(11) NOT NULL,
  `learner_id` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `courses` varchar(100) DEFAULT NULL,
  `specialization` varchar(255) NOT NULL,
  `status` enum('Pending','Approved','Rejected') NOT NULL DEFAULT 'Pending',
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `learners`
--

INSERT INTO `learners` (`id`, `learner_id`, `lastname`, `firstname`, `middlename`, `image`, `courses`, `specialization`, `status`, `password`) VALUES
(154, 'bsit1', 'bsit1 lastname', 'bsit1 firstname', 'bsit1 middlename', 'james.jpg', 'ACT/BSIT', 'BSIT: COMPUTER SYSTEM SERVICING NC II, BSAIS: EVENT MANAGEMENT SERVICES NC III', 'Approved', '$2y$10$gRhKMvMfPy1q8qZAVfvb7O5sth4Q8eKcUKsTm6P5pZzK6nImOH8Li'),
(155, 'hm1', 'hm1 lastname', 'hm1 firstname', 'hm1 middlename', 'jerick.jpg', 'HM', ', HM: HOUSE KEEPING NC II', 'Approved', '$2y$10$nJ0vErcYvZWQGg1B9V1zE.AdFrmJxDDE2PzRByRh3pvlyxetTSsaW'),
(156, 'bsit3', 'Gaboy', 'Micha', 'Legada', 'james.jpg', 'ACT/BSIT', 'BSIT: COMPUTER SYSTEM SERVICING NC II, BSIT: EVENT MANAGEMENT SERVICES NC III', 'Approved', '$2y$10$M8/OG8aEoPLjiOfasgC3seePk6GOJgzEsjIogTBMciTkNiYMnABg2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `act_bsit`
--
ALTER TABLE `act_bsit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bsais`
--
ALTER TABLE `bsais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bstm`
--
ALTER TABLE `bstm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `btvte`
--
ALTER TABLE `btvte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delete_learners`
--
ALTER TABLE `delete_learners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `graduate_report`
--
ALTER TABLE `graduate_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hm`
--
ALTER TABLE `hm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `learners`
--
ALTER TABLE `learners`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `act_bsit`
--
ALTER TABLE `act_bsit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `bsais`
--
ALTER TABLE `bsais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `bstm`
--
ALTER TABLE `bstm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `btvte`
--
ALTER TABLE `btvte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `delete_learners`
--
ALTER TABLE `delete_learners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `graduate_report`
--
ALTER TABLE `graduate_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `hm`
--
ALTER TABLE `hm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `learners`
--
ALTER TABLE `learners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
