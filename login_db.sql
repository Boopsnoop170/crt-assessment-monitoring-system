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
-- Database: `login_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Account_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Account_name`, `password`) VALUES
('admin', '$2y$10$/dRH8KRctdCnHr4rl44gl.gYSCUE06LfRlsJ6Bh387cib7TBOcV8q'),
('edrossadmin', '$2y$10$P/qHrXfsb0K64d4iDJNQiOjQXGS4NpNjKWGM4DL1ItKZ7ppWKHeRC');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Account_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Account_name`, `password`) VALUES
('edross', '$2y$10$1BeMysl9fWj8lNn6iPnLOOi1kjR3nWMoQWsxLWJ6XRrLzSu6jhMte'),
('james', '$2y$10$bhP.KgcbpFkniTO0.2TMVuTfjb/RMlN1UgZ4QMsRt3.1b9kMyycgu'),
('student_user', '$2y$10$a3JAP5SZCrsqqJ7iqEL2IeSzTwEniF.E7ncF7dXvGj4nrY7Q3xxH2'),
('student_user9', '$2y$10$Si292K0e9UAs/uyozVTdA.27dc.k2O07.dpRVNxMvvQ8Pz/8/7jBi'),
('user', '$2y$10$uQZxi5LQnQqZ.bEv.2ekHuOthTwn728xdVU7vd6EamXxvy3Jmcumq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Account_name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Account_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
