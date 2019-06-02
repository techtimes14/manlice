-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2019 at 08:40 PM
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
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `is_block` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'N => Active, Y => Inactive',
  `sort` int(11) NOT NULL DEFAULT '0',
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` text,
  `meta_description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `content`, `is_block`, `sort`, `created_by`, `created_at`, `updated_at`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(2, 'About us', 'about-us', '', 'N', 0, 1, '2018-04-09 14:02:53', '2019-06-01 14:00:32', 'About Us', 'About Us', 'About Us'),
(4, 'Contact Us', 'contact-us', '', 'N', 0, 1, '2018-08-31 06:41:26', '2019-05-10 13:31:32', 'Contact Us', 'Contact Us', 'Contact Us'),
(5, 'Terms and Conditions', 'terms-and-conditions', '', 'N', 0, 1, '2019-01-03 05:38:39', '2019-03-06 12:15:23', 'Terms and Conditions', 'Terms and Conditions', 'Terms and Conditions'),
(7, 'Privacy Policy', 'privacy-policy', '', 'N', 0, 1, '2019-01-03 07:52:40', '2019-05-26 16:31:05', 'Privacy Policy', 'Privacy Policy', 'Privacy Policy');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `sku` varchar(200) DEFAULT NULL,
  `price` float(10,2) DEFAULT NULL,
  `special_price` float(10,2) DEFAULT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A',
  `is_deleted` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '''Y''=>deleted,''N''=>Not Deleted',
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_keyword` text,
  `meta_description` text,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `slug`, `sku`, `price`, `special_price`, `status`, `is_deleted`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test', 'test', NULL, 100.00, 70.00, 'A', 'N', NULL, NULL, NULL, '2019-05-31 18:56:04', '2019-06-01 13:28:28', NULL),
(2, 'Product New1', 'product-new1', NULL, 801.00, 751.00, 'A', 'N', NULL, NULL, NULL, '2019-05-31 19:00:32', '2019-06-01 13:28:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` enum('A','I') NOT NULL DEFAULT 'A' COMMENT 'A->''Active'',I->''Inactive''',
  `default_image` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '''Y''=>Default,''N''=>Not default',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `name`, `status`, `default_image`, `created_at`, `updated_at`) VALUES
(2, 2, 'manlice-product-10270671559372242489.jpg', 'A', 'Y', '2019-06-01 06:57:23', '2019-06-01 06:57:32'),
(3, 2, 'manlice-product-10457781559372495468.jpg', 'A', 'N', '2019-06-01 07:01:35', '2019-06-01 07:01:35'),
(4, 2, 'manlice-product-4300961559372502351.jpg', 'A', 'N', '2019-06-01 07:01:42', '2019-06-01 07:01:42'),
(5, 1, 'manlice-product-2660661559372570361.jpg', 'A', 'N', '2019-06-01 07:02:50', '2019-06-01 07:17:27'),
(8, 1, 'manlice-product-6367411559373444649.jpg', 'A', 'Y', '2019-06-01 07:17:24', '2019-06-01 07:17:27'),
(9, 2, 'manlice-product-7805381559408302518.jpg', 'A', 'N', '2019-06-01 16:58:23', '2019-06-01 16:58:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_locale`
--

CREATE TABLE `product_locale` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `lang_code` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_locale`
--

INSERT INTO `product_locale` (`id`, `product_id`, `lang_code`, `product_name`, `description`) VALUES
(1, 1, 'en', 'Test', '<p>Test8</p>'),
(2, 1, 'zh', 'Test 1', '<p>Test9</p>'),
(3, 1, 'fr', 'Test 2', '<p>Test10</p>'),
(4, 1, 'de', 'Test 3', '<p>Test11</p>'),
(5, 1, 'es', 'Test 4', '<p>Test12</p>'),
(6, 1, 'ru', 'Test 5', '<p>Test13</p>'),
(7, 1, 'ja', 'Test 6', '<p>Test14</p>'),
(8, 1, 'ko', 'Test 7', '<p>Test15</p>'),
(9, 2, 'en', 'Product New1', '<p>Product New 81</p>'),
(10, 2, 'zh', 'Product New 11', '<p>Product New 91</p>'),
(11, 2, 'fr', 'Product New 21', '<p>Product New 101</p>'),
(12, 2, 'de', 'Product New 31', '<p>Product New 111</p>'),
(13, 2, 'es', 'Product New 41', '<p>Product New 121</p>'),
(14, 2, 'ru', 'Product New 51', '<p>Product New 131</p>'),
(15, 2, 'ja', 'Product New 61', '<p>Product New 141</p>'),
(16, 2, 'ko', 'Product New 71', '<p>Product New 151</p>');

-- --------------------------------------------------------

--
-- Table structure for table `related_products`
--

CREATE TABLE `related_products` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `related_product_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `related_products`
--

INSERT INTO `related_products` (`id`, `product_id`, `related_product_id`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '2019-06-01 13:17:04', '2019-06-01 13:17:04');

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
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_block` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT 'N => Active, Y => Inactive',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `title`, `content`, `image`, `is_block`, `created_at`, `updated_at`) VALUES
(1, 'Testimonial 1', '<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>', 'manlice-testimonial-1559409966.jpg', 'N', '2018-07-23 09:21:00', '2019-06-01 17:27:18'),
(2, 'Testimonial 2', '<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>', 'manlice-testimonial-1559410052.jpg', 'N', '2018-07-31 11:51:41', '2019-06-01 17:27:32'),
(3, 'Testimonial 3', '<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>', 'manlice-testimonial-1559410062.jpg', 'N', '2018-07-31 13:45:28', '2019-06-01 17:27:42'),
(4, 'Testimonial 4', '<p>In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.</p>', 'manlice-testimonial-1559410072.jpg', 'N', '2018-07-31 13:45:41', '2019-06-01 17:27:52');

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
(1, 'Super Admin', 'admin@manlice.com', '$2y$10$IMr0v5EHOvj.F8j0kxbO7OwNVO9.Pfs9kxntRTFgQQDEBC/s4UByK', '0000-00-00', '0', 'A', 'E0hbB2VmHcGGjIFzgGkLjtzjsAbNDP9HbBCoIO5jnldBDLo66ITSTewVDyFw', '', 'Y', 1, '2019-05-25 00:00:00', '2019-05-25 12:43:19', 'N', 'A', '0000-00-00 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_locale`
--
ALTER TABLE `product_locale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `related_products`
--
ALTER TABLE `related_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
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
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `product_locale`
--
ALTER TABLE `product_locale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `related_products`
--
ALTER TABLE `related_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
