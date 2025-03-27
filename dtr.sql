-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 12:58 AM
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
-- Database: `oras`
--

-- --------------------------------------------------------

--
-- Table structure for table `dtr`
--

CREATE TABLE `dtr` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` smallint(5) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time DEFAULT NULL,
  `task` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `interns`
--

CREATE TABLE `interns` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `school_id` smallint(5) UNSIGNED NOT NULL,
  `course` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `req_hrs` smallint(3) UNSIGNED NOT NULL,
  `department` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interns`
--

INSERT INTO `interns` (`id`, `username`, `email`, `pw`, `img`, `name`, `school_id`, `course`, `contact`, `req_hrs`, `department`, `start_date`, `end_date`, `is_active`, `created_at`, `updated_at`) VALUES
(8, 'fghjkbdfg', 'dfgs@dfghrs.com', '$2y$10$wzraTFxw9uZVGYV57lueB.WMRz3i523.j2G9dg89fakWru4c/jrR2', '1742988849_d967cbc5f2471b1be83f.png', 'dfghs', 1, 'dsfg', '4563', 567, 'ghr', '2025-03-26', '2025-03-26', 1, '2025-03-26 11:34:09', '2025-03-26 11:39:11');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`) VALUES
(1, 'harrel porned'),
(2, 'saint jerome');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pw`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'yeye@aguilar.com', '$2y$10$aAf2CwFp5MCimrs3gfHNXOgV0aE0kHNEcH0ksigRKZ88Ue75pdwxe', 1, '2025-02-01 08:51:18', '2025-02-04 09:55:27'),
(2, 'yeye@balanza.com', '$2y$10$yLzYO1qOTscZChnNvqnWTe1eKyZhPKRuTwSfCfxW/O6XIpCnP9Rc.', 1, '2025-02-02 07:29:13', '2025-02-02 07:53:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dtr`
--
ALTER TABLE `dtr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dtr_ibfk_1` (`user_id`);

--
-- Indexes for table `interns`
--
ALTER TABLE `interns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dtr`
--
ALTER TABLE `dtr`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `interns`
--
ALTER TABLE `interns`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dtr`
--
ALTER TABLE `dtr`
  ADD CONSTRAINT `dtr_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `interns` (`id`);

--
-- Constraints for table `interns`
--
ALTER TABLE `interns`
  ADD CONSTRAINT `interns_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
