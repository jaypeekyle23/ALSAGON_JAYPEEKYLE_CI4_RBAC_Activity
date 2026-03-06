-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2026 at 04:38 PM
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
-- Database: `adminpanel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-06-15-113925', 'App\\Database\\Migrations\\Session', 'default', 'App', 1771568546, 1),
(2, '2025-06-15-114014', 'App\\Database\\Migrations\\UserManagement', 'default', 'App', 1771568546, 1),
(3, '2026-02-23-083508', 'App\\Database\\Migrations\\CreateStudentsTable', 'default', 'App', 1771835838, 2),
(4, '2026-03-01-071117', 'App\\Database\\Migrations\\AddFieldsToStudentsTable', 'default', 'App', 1772349405, 3);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `description` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `email`, `course`, `created_at`, `description`, `updated_at`) VALUES
(23, 'Jaypee Kyle Mangabat Alsagon', '423003306@ntc.edu.ph', 'BSIT', '2026-03-01 08:12:09', 'This is Jaypee Kyle Alsagon. He is from 3.7 BSIT.', '2026-03-01 14:04:03'),
(25, 'Ivy Rose De Luna Plata', 'ivyroseplata@gmail.com', 'BSED - English', '2026-03-01 13:35:08', 'This is Ivy Rose Plata.', '2026-03-01 13:35:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(5) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'developer@mail.io', '$2y$12$9DA9gjUw4ZVRMSWSEEiFKOSdxjIFec9feT282S8VueyZHO42fr/k.', 1, '2026-02-20 06:22:39', '0000-00-00 00:00:00'),
(2, 'Jaypee Kyle Alsagon', '423003306@ntc.edu.ph', '$2y$10$9xMMI/s.SP1SRVLV8WJpFObGKrqbWOdK68uXD4srOluXrdhn6gHza', 1, '2026-02-20 06:24:53', '0000-00-00 00:00:00'),
(3, 'Jaypee Alsagon', 'jaypeejaypeealsagon23@gmail.com', '$2y$10$hnoWlEMrVC11QX5E9nn2BOwKuIcl3tKkZqmkcvUUUcHtw.w6l5/4i', 1, '2026-02-23 09:40:24', '0000-00-00 00:00:00'),
(4, 'Deivid Yap', 'deividyap@gmail.com', '$2y$10$.ZCVWUI3iCbRcCoS4XCVKuYWZqtRezrTUNxHdZlOHj63ELaWLIr/.', 1, '2026-02-25 03:03:45', '0000-00-00 00:00:00'),
(5, 'Carla Angeline Gahol', 'carlagahol@gmail.com', '$2y$10$VqbTj1F1Z32pFaDlvNYOGeQuuoqtbR57sW/COZlND7baa1lKCFMQy', 1, '2026-02-25 03:05:34', '0000-00-00 00:00:00'),
(6, 'Jaypee Kyle Alsagon', 'jaypeekylealsagon23@gmail.com', '$2y$10$z3I0LRs9sckD7QZvY5oOw.XOW/Du9xbTbk6Tv62oj9zbP.yV59/N6', 1, '2026-03-01 02:02:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_id` int(11) UNSIGNED NOT NULL,
  `menu_category_id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) UNSIGNED NOT NULL,
  `submenu_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`id`, `role_id`, `menu_category_id`, `menu_id`, `submenu_id`) VALUES
(1, 1, 1, 0, 0),
(2, 1, 0, 1, 0),
(3, 1, 2, 0, 0),
(4, 1, 0, 2, 0),
(5, 1, 0, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `parent` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu_category`, `title`, `url`, `icon`, `parent`) VALUES
(1, 1, 'Dashboard', 'dashboard', 'home', 0),
(2, 2, 'Users', 'users', 'user', 0),
(3, 2, 'Menu Management', 'menu-management', 'command', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu_category`
--

CREATE TABLE `user_menu_category` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_menu_category`
--

INSERT INTO `user_menu_category` (`id`, `menu_category`) VALUES
(1, 'Common Page'),
(2, 'Settings');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role_name`) VALUES
(1, 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `user_submenu`
--

CREATE TABLE `user_submenu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`timestamp`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu_category`
--
ALTER TABLE `user_menu_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_submenu`
--
ALTER TABLE `user_submenu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_menu_category`
--
ALTER TABLE `user_menu_category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_submenu`
--
ALTER TABLE `user_submenu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
