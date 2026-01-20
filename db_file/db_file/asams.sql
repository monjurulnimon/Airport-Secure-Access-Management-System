-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2026 at 12:09 PM
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
-- Database: `asams`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `visitor_type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `contact`, `address`, `city`, `country`, `designation`, `visitor_type`, `created_at`) VALUES
(1, 'qqq', 'qqq@', 'qqqqqq', 'wqwqwq', 'wqwq', 'wqwq', 'wqwq', 'wewe', 'guest', '2026-01-16 10:23:42'),
(2, 'qqq', 'qqq@gmail.com', 'qqqqqq', 'wq', 'wqwq', 'w', 'w', 'qw', 'guest', '2026-01-16 10:25:16'),
(3, 'ppoo', 'po@gmail.com', 'pppooo', 'qq', 'www', 'ww', 'www', 'qq', 'guest', '2026-01-19 20:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `security_officers`
--

CREATE TABLE `security_officers` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security_officers`
--

INSERT INTO `security_officers` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ww', 'www', '2026-01-16 10:35:53'),
(3, 'yyyyyyyyy', 'yyyyy', '2026-01-16 13:32:03'),
(4, 'popoopopo', '1234', '2026-01-19 22:37:46'),
(5, 'sakib@gmail.com', 'sakib', '2026-01-20 10:53:57');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(11) NOT NULL,
  `zone_name` varchar(100) DEFAULT NULL,
  `status` enum('active','inactive') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zones`
--

INSERT INTO `zones` (`id`, `zone_name`, `status`, `created_at`) VALUES
(1, 'qqqqqqqqqq', 'active', '2026-01-16 10:36:19'),
(2, 'eeeeeeeeeee', 'active', '2026-01-16 10:36:23'),
(3, '<script>alert(\"QWER\")</script>', 'active', '2026-01-16 13:48:01'),
(4, 'aaaaa', 'active', '2026-01-19 22:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `zone_access_requests`
--

CREATE TABLE `zone_access_requests` (
  `id` int(11) NOT NULL,
  `employee_name` varchar(100) DEFAULT NULL,
  `employee_email` varchar(100) DEFAULT NULL,
  `zone_name` varchar(100) DEFAULT NULL,
  `visit_purpose` text DEFAULT NULL,
  `visit_date` date DEFAULT NULL,
  `duration_hours` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') DEFAULT 'pending',
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone_access_requests`
--

INSERT INTO `zone_access_requests` (`id`, `employee_name`, `employee_email`, `zone_name`, `visit_purpose`, `visit_date`, `duration_hours`, `status`, `remarks`, `created_at`) VALUES
(1, 'qqq', 'qqq@gmail.com', 'Terminal A', 'qqq', '2026-01-24', 3, 'approved', 'sss', '2026-01-16 10:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `zone_rules`
--

CREATE TABLE `zone_rules` (
  `id` int(11) NOT NULL,
  `rule_text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zone_rules`
--

INSERT INTO `zone_rules` (`id`, `rule_text`, `created_at`) VALUES
(2, 'qqqqqqqqqqqqqqqq1111111111', '2026-01-16 10:37:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zone_access_requests`
--
ALTER TABLE `zone_access_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `zone_rules`
--
ALTER TABLE `zone_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
