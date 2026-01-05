-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 05, 2026 at 10:50 AM
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
-- Database: `asams`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `visitor_type` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `contact`, `address`, `city`, `country`, `designation`, `visitor_type`, `created_at`) VALUES
(1, 'Monjurul Islam', 'nimon09.11@gmail.com', '123456', '01724567856', 'null', 'null', 'Bangladesh', 'Security Officer', 'guest', '2025-12-29 10:32:39'),
(3, 'Risha', 'rishapatra16@gmail.com', 'risha123', '+918267812', 'null', 'null', 'India', 'Guest', 'guest', '2026-01-05 09:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `security_officers`
--

CREATE TABLE `security_officers` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security_officers`
--

INSERT INTO `security_officers` (`id`, `username`, `password`, `created_at`) VALUES
(3, 's@gmail.com', 'ssssss', '2025-12-30 20:18:15'),
(5, 'security@gmail.com', 'security123', '2026-01-05 07:19:13');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `zone_name` varchar(100) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone_name`, `status`, `created_at`) VALUES
(2, 'qqqqq', 'active', '2025-12-30 21:23:28'),
(3, 'Mar-a-Logo', 'active', '2026-01-05 07:20:07');

-- --------------------------------------------------------

--
-- Table structure for table `zone_access_requests`
--

CREATE TABLE `zone_access_requests` (
  `request_id` int(11) NOT NULL,
  `employee_name` varchar(150) NOT NULL,
  `employee_email` varchar(255) NOT NULL,
  `zone_name` varchar(100) NOT NULL,
  `visit_purpose` text NOT NULL,
  `visit_date` date NOT NULL,
  `duration_hours` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `requested_at` datetime DEFAULT current_timestamp(),
  `officer_remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone_access_requests`
--

INSERT INTO `zone_access_requests` (`request_id`, `employee_name`, `employee_email`, `zone_name`, `visit_purpose`, `visit_date`, `duration_hours`, `status`, `requested_at`, `officer_remarks`) VALUES
(1, 'Monjurul Islam', 'nimon09.11@gmail.com', 'Cargo Area', 'trail', '2025-12-31', 1, 'approved', '2025-12-29 15:01:39', 'welcome boss'),
(3, 'Monjurul Islam', 'nimon09.11@gmail.com', 'Terminal A', 'A', '2025-12-24', 1, 'approved', '2025-12-31 01:20:25', 'ffffff'),
(6, 'Risha', 'rishapatra16@gmail.com', 'Control Room', 'As a guest', '2026-01-20', 2, 'rejected', '2026-01-05 15:49:06', 'You are not a citizen');

-- --------------------------------------------------------

--
-- Table structure for table `zone_rules`
--

CREATE TABLE `zone_rules` (
  `id` int(11) NOT NULL,
  `rule_text` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone_rules`
--

INSERT INTO `zone_rules` (`id`, `rule_text`, `created_at`) VALUES
(2, 'NIMON IS PROHIBITTED...', '2025-12-30 22:04:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `security_officers`
--
ALTER TABLE `security_officers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `zone_name` (`zone_name`);

--
-- Indexes for table `zone_access_requests`
--
ALTER TABLE `zone_access_requests`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `zone_rules`
--
ALTER TABLE `zone_rules`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `security_officers`
--
ALTER TABLE `security_officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zone_access_requests`
--
ALTER TABLE `zone_access_requests`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zone_rules`
--
ALTER TABLE `zone_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
