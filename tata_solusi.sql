-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2021 at 09:58 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tata_solusi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `role` int(11) DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `photo` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `role`, `created_by`, `updated_by`, `photo`) VALUES
(1, 'ardi', 'HQrJx4AGGyjCFOxc67OsznuwtfyLOkRy', '$2y$13$K.eeO.jjCO6S3mO405TtKe0EwXN6.jc812kCmaROUxTcsV3rla712', NULL, 'tan.ardi94@gmail.com', 10, '2020-07-08 11:00:00', '2020-07-08 11:00:00', 11, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1603550793),
('m130524_201442_init', 1603550835),
('m201024_140034_create_product_table', 1603550835),
('m201024_141329_create_product_details_table', 1603550835),
('m201024_143218_create_product_images_table', 1603550835),
('m201024_143948_create_promos_table', 1603550835),
('m201029_053209_create_product_category_table', 1604237055),
('m201101_132232_add_column_unique_products_table', 1604237086);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(40) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `overview` text DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT -1,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `unique_id`, `name`, `description`, `overview`, `category`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, '444005203115fa6254ca34866.22684496', 'BenQ EH600 Smart Projector', 'BenQ EH600 smart projector menjadi solusi yang inovatif dengan memberikan kemudahan dalam pengoperasiannya, dengan EH600 kita tidak perlu kabel, driver maupun PC.', '<p>Wireless Projection</p>\r\n<p>Cukup bawa smartphone, tablet, atau PC laptop Anda sendiri untuk secara instan mencerminkan apa yang ditampilkan pada perangkat Anda ke layar proyeksi. Solusi wireless ini menghilangkan kekacauan kabel, memfasilitasi kolaborasi segera dan nyaman untuk meningkatkan kerja tim dan memenuhi produktivitas.</p>\r\n<p>Take Control in Your Hand</p>\r\n<p>BenQ Smart Control dengan cepat mengubah ponsel cerdas Anda menjadi remote control yang cerdas, memungkinkan Anda memimpin rapat dengan lancar dan menyelesaikan tugas-tugas Anda di tempat.</p>\r\n<p>USB Supported-Completely PC free</p>\r\n<p>BenQ EH600 smart projector telah mendukung berbagai format file termasuk JPEG, PDF, Microsoft Word, Excel, file Power Point, dan banyak lagi. Dengan port type-A memungkinkan Anda untuk dengan mudah memproyeksikan gambar atau dokumen langsung ke layar tanpe perlu PC.</p>\r\n<p>Lead a Seamless Meeting with Apps</p>\r\n<p>Blizz memungkinkan Anda untuk melakukan konferensi video dan membagikan layar Anda dengan rekan kerja Anda. Aplikasi TeamViewer Quick Support memungkinkan pengguna jarak jauh untuk menghubungkan dan memecahkan masalah proyektor dengan aman. Aplikasi WPS Office memungkinkan Anda menggunakan Microsoft Word, Excel, PowerPoint, melalui USB atau menggunakan penyimpanan bawaan pada BenQ EH600. Browser Firefox bawaan memungkinkan pengguna untuk berselancar di internet selama rapat Anda.</p>', 3, 1, '2020-11-07 12:40:44', 1, '2020-11-22 21:11:30', 1),
(2, '090306203115fa62a8d54fcc2.45340293', 'BenQ EW600 Smart Projector', 'BenQ EW600 smart projector menjadi solusi yang inovatif dengan memberikan kemudahan dalam pengoperasiannya, dengan EW600 kita tidak perlu kabel, driver maupun PC.', '<h3 class=\"fusion-responsive-typography-calculated\" data-fontsize=\"21\" data-lineheight=\"31.5px\">USB Supported-Completely PC free</h3>\r\n<p>BenQ EW600 smart projector telah mendukung berbagai format file termasuk JPEG, PDF, Microsoft Word, Excel, file Power Point, dan banyak lagi. Dengan port type-A memungkinkan Anda untuk dengan mudah memproyeksikan gambar atau dokumen langsung ke layar tanpe perlu PC.</p>\r\n<h3 class=\"fusion-responsive-typography-calculated\" data-fontsize=\"21\" data-lineheight=\"31.5px\">Wireless Projection</h3>\r\n<p>Cukup bawa smartphone, tablet, atau PC laptop Anda sendiri untuk secara instan mencerminkan apa yang ditampilkan pada perangkat Anda ke layar proyeksi. Solusi wireless ini menghilangkan kekacauan kabel, memfasilitasi kolaborasi segera dan nyaman untuk meningkatkan kerja tim dan memenuhi produktivitas.</p>\r\n<h3 class=\"fusion-responsive-typography-calculated\" data-fontsize=\"21\" data-lineheight=\"31.5px\">Take Control in Your Hand</h3>\r\n<p>BenQ Smart Control dengan cepat mengubah ponsel cerdas Anda menjadi remote control yang cerdas, memungkinkan Anda memimpin rapat dengan lancar dan menyelesaikan tugas-tugas Anda di tempat.</p>\r\n<h3 class=\"fusion-responsive-typography-calculated\" data-fontsize=\"21\" data-lineheight=\"31.5px\">Lead a Seamless Meeting with Apps</h3>\r\n<p>Blizz memungkinkan Anda untuk melakukan konferensi video dan membagikan layar Anda dengan rekan kerja Anda. Aplikasi TeamViewer Quick Support memungkinkan pengguna jarak jauh untuk menghubungkan dan memecahkan masalah proyektor dengan aman. Aplikasi WPS Office memungkinkan Anda menggunakan Microsoft Word, Excel, PowerPoint, melalui USB atau menggunakan penyimpanan bawaan pada BenQ EW600. Browser Firefox bawaan memungkinkan pengguna untuk berselancar di internet selama rapat Anda.</p>', 3, 1, '2020-11-07 13:03:09', 1, '2020-11-07 13:03:09', 1),
(3, '011913203265fba573556f419.36380722', 'Cutting Machine dong', 'ini cuma sebuah cutting machine', '', 5, 1, '2020-11-22 20:19:01', 1, '2020-11-22 21:17:35', 1),
(4, '092813203265fba59593bc7a5.19015437', 'vids', 'aigoo kapan ak bisa upload pic ini', '<p>ahhahahah</p>', 1, 1, '2020-11-22 20:28:09', 1, '2020-11-22 20:28:09', 1),
(5, '263513203265fba5b0ecd9a80.92711965', 'printer dong', 'akwakwkaw', '<p>yeyeyeyey</p>', 4, 1, '2020-11-22 20:35:26', 1, '2020-11-22 20:35:26', 1),
(6, '573613203265fba5b69674601.95960477', 'wall video', 'semoga ini berhasil rek', '<p>capek ak error terus aigoooo</p>', 1, 1, '2020-11-22 20:36:57', 1, '2020-11-22 20:36:57', 1),
(7, '373813203265fba5bcdc2e7b8.01503928', 'proyektor baru', 'harganya mahal bos', '<p>mohon digunakan dengan sebaiknya</p>', 3, 1, '2020-11-22 20:38:37', 1, '2020-11-22 20:38:37', 1),
(8, '265513203265fba5fbe0b2720.26809283', 'vvvv', 'qqqq', '<p>eeee</p>', 1, 1, '2020-11-22 20:55:26', 1, '2020-11-22 21:05:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `used_by` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT -1,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `used_by`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Video Wall', 0, 1, '2020-11-07 12:36:22', 1, '2020-11-07 12:36:22', 1),
(2, 'Interactive Flat Panel', 0, 1, '2020-11-07 12:36:37', 1, '2020-11-07 12:36:37', 1),
(3, 'Projector', 0, 1, '2020-11-07 12:36:49', 1, '2020-11-07 12:36:49', 1),
(4, 'Sublimation Printer', 1, 1, '2020-11-07 12:37:04', 1, '2020-11-07 12:37:04', 1),
(5, 'Cutting Machine', 1, 1, '2020-11-07 12:37:19', 1, '2020-11-07 12:37:19', 1),
(6, 'Industrial Printer', 1, 1, '2020-11-07 12:37:36', 1, '2020-11-07 12:37:36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT -1,
  `level` int(11) DEFAULT 1,
  `specification` varchar(255) DEFAULT NULL,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT -1,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `seq` int(11) NOT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT -1,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `seq`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 1, 'BenQ EH600 Smart Projector-731-444005203115fa6254ca34866.22684496.jpg', 5, 1, '2020-11-07 12:40:44', 1, '2020-11-25 22:02:51', 1),
(2, 2, '', 1, 1, '2020-11-07 13:03:09', 1, '2020-11-07 13:03:09', 1),
(3, 2, 'BenQ EW600 Smart Projector-589-090306203115fa62a8d54fcc2.45340293.jpg', 2, 1, '2020-11-07 13:03:09', 1, '2020-11-25 22:16:34', 1),
(4, 2, '', 3, 1, '2020-11-07 13:03:09', 1, '2020-11-07 13:03:09', 1),
(5, 3, NULL, 1, 1, '2020-11-22 20:19:01', 1, '2020-11-22 21:24:23', 1),
(6, 4, '', 1, 1, '2020-11-22 20:28:09', 1, '2020-11-22 20:28:09', 1),
(7, 5, '', 1, 1, '2020-11-22 20:35:26', 1, '2020-11-22 20:35:26', 1),
(8, 6, '', 3, 1, '2020-11-22 20:36:57', 1, '2020-11-22 20:36:57', 1),
(9, 7, '', 1, 1, '2020-11-22 20:38:37', 1, '2020-11-22 20:38:37', 1),
(10, 8, 'vvvv-932-265513203265fba5fbe0b2720.26809283-3.jpg', 3, 1, '2020-11-22 20:55:26', 1, '2020-11-22 21:05:56', 1),
(11, 5, 'printer dong-160-263513203265fba5b0ecd9a80.92711965.jpg', 1, 1, '2020-11-25 22:03:25', 1, '2020-11-25 22:03:25', 1),
(12, 7, 'proyektor baru-557-373813203265fba5bcdc2e7b8.01503928.jpg', 1, 1, '2020-11-25 22:04:35', 1, '2020-11-25 22:04:35', 1),
(13, 7, 'proyektor baru-199-373813203265fba5bcdc2e7b8.01503928.jpg', 1, 1, '2020-11-25 22:05:24', 1, '2020-11-25 22:05:24', 1),
(14, 7, 'proyektor baru-481-373813203265fba5bcdc2e7b8.01503928.jpg', 2, 1, '2020-11-25 22:27:24', 1, '2020-11-25 22:27:24', 1),
(15, 7, 'proyektor baru-613-373813203265fba5bcdc2e7b8.01503928.jpg', 3, 1, '2020-11-25 22:29:57', 1, '2020-11-25 22:30:27', 1),
(16, 7, 'proyektor baru-550-373813203265fba5bcdc2e7b8.01503928.jpg', 4, 1, '2020-11-25 22:30:37', 1, '2020-11-25 22:30:37', 1);

-- --------------------------------------------------------

--
-- Table structure for table `promos`
--

CREATE TABLE `promos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `use_alert` int(11) DEFAULT 0,
  `status` int(11) DEFAULT 1,
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT -1,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 10,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `unique_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `encrypted_password` varchar(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `salt` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_password` int(4) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL DEFAULT -1,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT -1,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Male',
  `token` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `unique_id`, `username`, `name`, `email`, `photo`, `encrypted_password`, `salt`, `auth_key`, `updated_password`, `created_at`, `created_by`, `updated_at`, `updated_by`, `gender`, `token`, `password_reset_token`, `phone`, `address`) VALUES
(10001, 1, '291008191845d1db475e58c86.31984671', 'tanardi', 'ardi tan', 'valouriee22@yopmail.com', NULL, 'mb6NE7G9Wzk4ghwhRQDB4V5J1EkzNjU4YjkzNmNk', '3658b936cd', NULL, 0, '2019-07-04 15:10:30', -1, '2019-07-04 15:10:30', -1, 'Male', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_fk` (`category`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `details_product_fk` (`product_id`),
  ADD KEY `details_parent_fk` (`parent_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_product_fk` (`product_id`);

--
-- Indexes for table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_id` (`unique_id`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `promos`
--
ALTER TABLE `promos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_fk` FOREIGN KEY (`category`) REFERENCES `product_category` (`id`);

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `details_parent_fk` FOREIGN KEY (`parent_id`) REFERENCES `product_details` (`id`),
  ADD CONSTRAINT `details_product_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `image_product_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
