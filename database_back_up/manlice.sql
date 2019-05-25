-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2019 at 08:02 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manlice`
--

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_name` varchar(100) DEFAULT NULL,
  `contact_email` varchar(255) DEFAULT NULL,
  `contact_number` varchar(50) DEFAULT NULL,
  `order_email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `google_plus_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `pinterest_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `rssfeed_url` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `contact_email`, `contact_number`, `order_email`, `address`, `facebook_link`, `google_plus_link`, `twitter_link`, `pinterest_link`, `instagram_link`, `youtube_link`, `rssfeed_url`, `created_at`, `updated_at`) VALUES
(1, 'Manlice', 'support@manlice.com', '9876543210', 'support@manlice.com', 'Kolkata', 'https://www.facebook.com', 'https://www.flipkart.com', 'https://twitter.com', 'https://in.pinterest.com', 'https://www.instagram.com', 'https://www.youtube.com', NULL, '2018-12-07 08:13:02', '2019-05-25 11:39:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `mobile` varchar(50) NOT NULL DEFAULT '' COMMENT 'With std code',
  `user_type` enum('A','C','F','G','AG','GU') NOT NULL DEFAULT 'C' COMMENT 'A => Admin, C => Customer/Normal User, F => Facebook, G => GPlus, AG => Agent,GU=>Guest User',
  `remember_token` varchar(255) NOT NULL DEFAULT '',
  `email_token` varchar(255) DEFAULT NULL COMMENT 'Reset password token',
  `email_verified` enum('Y','N') NOT NULL DEFAULT 'N',
  `created_by` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `is_block` enum('Y','N') NOT NULL DEFAULT 'N',
  `status` enum('A','I') NOT NULL DEFAULT 'A' COMMENT 'A => Active, I => Inactive',
  `last_login` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `dob`, `mobile`, `user_type`, `remember_token`, `email_token`, `email_verified`, `created_by`, `created_at`, `updated_at`, `is_block`, `status`, `last_login`, `deleted_at`) VALUES
(1, 'Super Admin', 'admin@manlice.com', '$2y$10$IMr0v5EHOvj.F8j0kxbO7OwNVO9.Pfs9kxntRTFgQQDEBC/s4UByK', '0000-00-00', '0', 'A', 'Vhn1PH1CfpTkJYkeaTamZtc4evAanpmj7bGwLaLDxH0Cf8gibNF20RuQxlZz', '', 'Y', 1, '2019-05-25 00:00:00', '2019-05-25 12:43:19', 'N', 'A', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
