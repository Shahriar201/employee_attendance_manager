-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2022 at 05:42 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employee_attendance_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1=active, 0=inactive',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `status`, `password`, `google_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Shahriar', 'shahriar@gmail.com', 1, '$2a$12$MwvLc5XU8IqPRqUTZACl7uuVf.lNNXr3688chq/SvAQXNZC9btiG6', NULL, NULL, NULL, NULL, NULL),
(5, 'Galvin Long', 'negecisoto@mailinator.com', 1, '$2y$10$QpC5frO1dyXnhPyYBS0Wi.HEqKCDV9nokxdC7E72.k38aAQQxdBhi', NULL, 1, NULL, '2022-11-09 00:03:56', '2022-11-09 00:03:56'),
(6, 'Amethyst Guy', 'rykewi@mailinator.com', 1, '$2y$10$ZLr/I.KDdCH5cF41Lvdy5O5T1uOoKRCuPCBiwgA63WjSRiYfEMdRK', NULL, 1, NULL, '2022-11-09 00:05:03', '2022-11-09 00:05:03'),
(7, 'Brady Wyatt', 'nyjafive@mailinator.com', 0, '$2y$10$dfJ1FY9vUaLsDyRjiBxmiupHwrDNQ.dugjoGyjz6n7tsgeRUHfqdm', NULL, 1, 1, '2022-11-09 00:09:31', '2022-11-10 00:17:38'),
(8, 'Ivy Weber', 'qysarob@mailinator.com', 1, '$2y$10$h3xdvZ6x3e1XZGVZaXP2z.AvnuYzNVhPQJHoUVOUdjabV.GBcPVpC', NULL, 1, NULL, '2022-11-09 00:11:20', '2022-11-09 00:11:20'),
(10, 'Phillip Howard', 'vupij@mailinator.com', 1, '$2y$10$/E/CQsYsc5.qSttF97Z0BexSRb3.PfRzDoCnnDtKi85z0hianY20S', NULL, 1, NULL, '2022-11-09 00:15:04', '2022-11-09 00:15:04'),
(12, 'Nicole Blankenship', 'muher@mailinator.com', 1, '$2y$10$p7AWSSKBVLR2lE.0iYoA0OT.KYLOPWgFl2OKkdZz06/.Cx8e1qnWS', NULL, 1, NULL, '2022-11-10 00:32:11', '2022-11-10 00:32:11'),
(15, 'Sacha Fletcher', 'zygyluco@mailinator.com', 1, '$2y$10$9R7Zg.jIxa2bmlt.CKUlyePDSTjXLKzgyLVh9NjGroXxjZm4eap3O', NULL, 1, NULL, '2022-11-10 09:26:39', '2022-11-10 09:26:39'),
(16, 'Thane Ratliff', 'sivedydi@mailinator.com', 0, '$2y$10$gWxvvzWoCwkoUpjCRAD4yegBXgl0x76Q6DuNzg9Lg.TSbhXLexfdO', NULL, 1, NULL, '2022-11-10 09:26:51', '2022-11-10 09:26:51'),
(17, 'Addison Manning', 'pybepano@mailinator.com', 0, '$2y$10$zKKvWufp3zi1IZ4eo8bxw./q3/3eaLAAjL6phmhIhsTinmboFeL0W', NULL, 1, 1, '2022-11-10 09:27:01', '2022-11-10 17:03:48'),
(20, 'Charde Ashley', 'jonasofok@mailinator.com', 0, '$2y$10$tAX355EwI.YJXAVVBF80s.7fWKBIbmzpSn7W3Ypukl9NSh6NJIpny', NULL, 1, 1, '2022-11-10 17:05:05', '2022-11-10 17:05:19'),
(21, 'Candice Underwood', 'lecexyfita@mailinator.com', 0, '$2y$10$CBOsCH3TYFaxpFyiPlEtn.9kHz7OBDoMShGH4d1tRd1eSExR2QZqe', NULL, 1, NULL, '2022-11-10 17:18:23', '2022-11-10 17:18:23'),
(22, 'Amela Turner', 'nace@mailinator.com', 0, '$2y$10$2W1qzHSv2h64uCul8b90SeHPvSc6mn/8BrDFIJ0F0J/5ejkYzPtlG', NULL, 1, NULL, '2022-11-11 04:58:30', '2022-11-11 04:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee_attendances`
--

CREATE TABLE `employee_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_attendances`
--

INSERT INTO `employee_attendances` (`id`, `employee_id`, `date`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 21, '10-11-2022', NULL, NULL, '2022-11-10 17:43:10', '2022-11-10 17:44:21'),
(6, 1, '11-11-2022', NULL, NULL, '2022-11-10 18:20:02', '2022-11-11 04:41:18'),
(7, 22, '11-11-2022', NULL, NULL, '2022-11-11 04:59:07', '2022-11-11 04:59:07');

-- --------------------------------------------------------

--
-- Table structure for table `employee_contacts`
--

CREATE TABLE `employee_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_contacts`
--

INSERT INTO `employee_contacts` (`id`, `employee_id`, `contact_name`, `contact_email`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(2, 15, 'Cameron Herrera', 'rafutor@mailinator.com', 1, NULL, '2022-11-10 09:26:39', '2022-11-10 09:26:39'),
(3, 16, 'Hedwig Morgan', 'nygisydit@mailinator.com', 1, NULL, '2022-11-10 09:26:51', '2022-11-10 09:26:51'),
(4, 17, 'Preston Calhoun', 'nezomi@mailinator.com', 1, 1, '2022-11-10 09:27:01', '2022-11-10 17:03:48'),
(7, 20, 'Wylie Chaney', 'qazyhyhevu@mailinator.com', 1, 1, '2022-11-10 17:05:05', '2022-11-10 17:05:19'),
(8, 21, 'Piper Mayer', 'ralabicyx@mailinator.com', 1, NULL, '2022-11-10 17:18:23', '2022-11-10 17:18:23'),
(9, 22, 'Adara Rivers', 'vikemudo@mailinator.com', 1, NULL, '2022-11-11 04:58:30', '2022-11-11 04:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `employee_details`
--

CREATE TABLE `employee_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` tinyint(4) DEFAULT NULL,
  `updated_by` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee_details`
--

INSERT INTO `employee_details` (`id`, `employee_id`, `address`, `image`, `mobile`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 5, 'Sed id enim ea qui', NULL, 'Ut temporibus aut qu', 1, NULL, '2022-11-09 00:03:56', '2022-11-09 00:03:56'),
(5, 6, 'Praesentium in sit', '202211090605Screenshot 2022-02-22 153231.png', 'Sunt proident dolo', 1, NULL, '2022-11-09 00:05:03', '2022-11-09 00:05:03'),
(6, 7, 'Animi porro vitae e', '202211090609Screenshot 2022-03-11 001904.png', 'Distinctio Ut velit', 1, 1, '2022-11-09 00:09:31', '2022-11-10 00:17:38'),
(7, 8, 'Eligendi nobis debit', '202211090611Screenshot 2022-02-22 153231.png', 'Velit et beatae elit', 1, NULL, '2022-11-09 00:11:20', '2022-11-09 00:11:20'),
(9, 10, 'Tempor hic ut volupt', '202211090615Screenshot 2022-02-08 112236.png', 'Reprehenderit volupt', 1, NULL, '2022-11-09 00:15:04', '2022-11-09 00:15:04'),
(11, 12, 'Cillum obcaecati nul', '202211100632Screenshot 2022-04-09 161737.png', 'Fugit dolore vel ex', 1, NULL, '2022-11-10 00:32:11', '2022-11-10 00:32:11'),
(14, 15, 'Amet nostrud sit pl', NULL, 'Exercitation est ea', 1, NULL, '2022-11-10 09:26:39', '2022-11-10 09:26:39'),
(15, 16, 'Ut veniam do ullamc', NULL, 'Minus consequat Qui', 1, NULL, '2022-11-10 09:26:51', '2022-11-10 09:26:51'),
(16, 17, 'Perferendis nemo cul', NULL, 'Aspernatur cillum qu', 1, 1, '2022-11-10 09:27:01', '2022-11-10 17:03:48'),
(19, 20, 'Alias cum necessitat', NULL, 'Id voluptatem optio', 1, 1, '2022-11-10 17:05:05', '2022-11-10 17:05:19'),
(20, 21, 'Ut maxime aliqua Fu', NULL, 'Officia dolor aspern', 1, NULL, '2022-11-10 17:18:23', '2022-11-10 17:18:23'),
(21, 22, 'A incidunt sed fuga', NULL, 'Deserunt laborum Do', 1, NULL, '2022-11-11 04:58:30', '2022-11-11 04:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2022_11_07_134556_create_employees_table', 1),
(4, '2022_11_08_083618_create_permission_tables', 1),
(5, '2022_11_09_035927_create_employee_details_table', 1),
(6, '2022_11_10_120210_create_employee_contacts_table', 2),
(7, '2022_11_10_153757_create_employee_attendances_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 5),
(2, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(2, 'App\\Models\\User', 8),
(2, 'App\\Models\\User', 10),
(1, 'App\\Models\\User', 12),
(2, 'App\\Models\\User', 15),
(1, 'App\\Models\\User', 16),
(1, 'App\\Models\\User', 17),
(2, 'App\\Models\\User', 20),
(2, 'App\\Models\\User', 21),
(2, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view permission', 'web', '2022-11-08 23:46:52', '2022-11-08 23:46:52'),
(2, 'add permission', 'web', '2022-11-08 23:46:59', '2022-11-08 23:46:59'),
(3, 'delete permission', 'web', '2022-11-08 23:47:24', '2022-11-08 23:47:24'),
(4, 'view role', 'web', '2022-11-11 16:19:54', '2022-11-11 16:19:54'),
(5, 'add role', 'web', '2022-11-11 16:20:00', '2022-11-11 16:20:00'),
(6, 'delete role', 'web', '2022-11-11 16:20:09', '2022-11-11 16:20:09'),
(7, 'view employee', 'web', '2022-11-11 16:20:44', '2022-11-11 16:20:44'),
(8, 'add employee', 'web', '2022-11-11 16:20:54', '2022-11-11 16:20:54'),
(9, 'delete employee', 'web', '2022-11-11 16:21:02', '2022-11-11 16:21:02'),
(10, 'employee details', 'web', '2022-11-11 16:21:32', '2022-11-11 16:21:32'),
(11, 'employee contact', 'web', '2022-11-11 16:21:47', '2022-11-11 16:21:47'),
(12, 'all attendance list', 'web', '2022-11-11 16:22:29', '2022-11-11 16:22:29'),
(13, 'all attendance reports', 'web', '2022-11-11 16:22:50', '2022-11-11 16:22:50'),
(14, 'access control', 'web', '2022-11-11 16:46:50', '2022-11-11 16:46:50'),
(15, 'employee', 'web', '2022-11-11 17:07:22', '2022-11-11 17:07:22'),
(16, 'attendance', 'web', '2022-11-11 17:08:55', '2022-11-11 17:08:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2022-11-08 23:48:10', '2022-11-08 23:48:10'),
(2, 'employee', 'web', '2022-11-08 23:48:20', '2022-11-08 23:48:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(16, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indexes for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_attendances_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_contacts_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_details_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employee_details`
--
ALTER TABLE `employee_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee_attendances`
--
ALTER TABLE `employee_attendances`
  ADD CONSTRAINT `employee_attendances_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `employee_contacts`
--
ALTER TABLE `employee_contacts`
  ADD CONSTRAINT `employee_contacts_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `employee_details`
--
ALTER TABLE `employee_details`
  ADD CONSTRAINT `employee_details_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
