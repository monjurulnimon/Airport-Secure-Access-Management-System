-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2026 at 02:59 PM
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
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `visitor_type` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(255) NOT NULL DEFAULT 'default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `password`, `contact`, `address`, `city`, `country`, `designation`, `visitor_type`, `created_at`, `profile_image`) VALUES
(1, 'qqq', 'qqq@', 'qqqqqq', 'wqwqwq', 'wqwq', 'wqwq', 'wqwq', 'wewe', 'guest', '2026-01-16 10:23:42', ''),
(2, 'qqq', 'qqq@gmail.com', 'qqqqqq', 'wq', 'wqwq', 'w', 'w', 'qw', 'guest', '2026-01-16 10:25:16', ''),
(3, 'Nimon', 'j@g.com', 'nimon11', '01724567856', 'a', '1', 'a', 'a', 'vendor', '2026-01-20 10:51:18', ''),
(7, 'Nimon', 'n@gmail.com', 'nnnnnn', 'a', 'a', 'a', 'a', 'a', 'vendor', '2026-01-20 12:03:22', 'profile_696f6f0a01c109.86109990.jpeg'),
(8, 'Nimon', 'monjurul.nimon@gmail.com', '111111', '1', '1', '1', '1', '1', 'guest', '2026-01-20 12:06:27', 'profile_696f6fc35c3260.03088669.png');

-- --------------------------------------------------------

--
-- Table structure for table `security_officers`
--

CREATE TABLE `security_officers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `profile` varchar(255) DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security_officers`
--

INSERT INTO `security_officers` (`id`, `email`, `pass`, `profile`, `created_at`) VALUES
(2, 'dipro@gmail.com', '111111', 'officer_696f87a6c0703.png', '2026-01-20 13:48:22');

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
(3, '<script>alert(\"QWER\")</script>', 'active', '2026-01-16 13:48:01');

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
(1, 'qqq', 'qqq@gmail.com', 'Terminal A', 'qqq', '2026-01-24', 3, 'approved', 'qqq is accepted by nimon', '2026-01-16 10:41:34'),
(2, 'Nimon', 'monjurul.nimon@gmail.com', 'Terminal A', 'sad', '2026-01-28', 1, 'approved', 'dsfsfds', '2026-01-20 12:50:49'),
(3, 'Nimon', 'monjurul.nimon@gmail.com', 'Control Room', 'Testing', '2026-01-22', 1, 'approved', 'You are welcome boss', '2026-01-20 13:00:39'),
(4, 'Nimon', 'monjurul.nimon@gmail.com', 'Control Room', 'Bombing', '2026-01-31', 1, 'rejected', 'Sorry bombing is not allowed here, sir.', '2026-01-20 13:01:16');

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
  ADD UNIQUE KEY `email` (`email`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `security_officers`
--
ALTER TABLE `security_officers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `zone_access_requests`
--
ALTER TABLE `zone_access_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zone_rules`
--
ALTER TABLE `zone_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
