-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2019 at 05:40 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dentalclinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `dentist_id` bigint(20) NOT NULL,
  `patient_id` bigint(20) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_time` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `notes_dentist` text COLLATE utf8mb4_unicode_ci,
  `cancelled` bigint(20) DEFAULT NULL,
  `finished` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dentists`
--

CREATE TABLE `dentists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `specialities` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timetable` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `cellphone` bigint(20) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoicedetails`
--

CREATE TABLE `invoicedetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `grand_total` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bill_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `particular_id` int(10) NOT NULL,
  `particular` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_amount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `patient_id`, `invoice_no`, `particular_id`, `particular`, `rate`, `quantity`, `discount`, `total_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1254, 1, 'abc', '10', '5', NULL, '50', '2019-12-20 01:09:30', '2019-12-20 01:09:30'),
(2, 2, 123, 1, 'abc', '10', '5', NULL, '50', '2019-12-20 01:34:37', '2019-12-20 01:34:37'),
(3, 1, 14, 1, 'abc', '10', '10', NULL, '100', '2019-12-20 01:39:14', '2019-12-20 01:39:14'),
(4, 1, 100, 1, 'abc', '10', '40', NULL, '400', '2019-12-20 01:41:48', '2019-12-20 01:41:48'),
(5, 1, 11, 1, 'abc', '10', '20', NULL, '200', '2019-12-20 01:47:32', '2019-12-20 01:47:32'),
(6, 2, 101, 1, 'abc', '10', '10', NULL, '100', '2019-12-20 01:48:46', '2019-12-20 01:48:46'),
(7, 1, 1010, 2, 'cde', '20', '10', NULL, '200', '2019-12-20 01:52:44', '2019-12-20 01:52:44'),
(8, 5, 1001, 2, 'cde', '20', '10', NULL, '200', '2019-12-20 01:55:52', '2019-12-20 01:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_11_11_070044_create_dentists_table', 1),
(5, '2019_11_11_070208_create_patients_table', 1),
(6, '2019_11_11_070316_create_appointments_table', 1),
(7, '2019_11_17_064720_add_user_id_and_type_to_users', 1),
(8, '2019_11_19_022130_create_admins_table', 1),
(9, '2019_11_19_022255_create_receptionists_table', 1),
(10, '2019_11_28_064455_create_services_table', 1),
(11, '2019_11_28_064620_create_subservices_table', 1),
(12, '2019_12_13_062346_create_invoices_table', 2),
(13, '2019_12_13_063134_create_invoicedetails_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cellphone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `avatar`, `address`, `phone`, `cellphone`, `gender`, `bio`, `birthdate`, `created_at`, `updated_at`) VALUES
(1, 1, 'Test', 'as', 'One', '63.jpg', 'ktm', '123654', '987456', 'male', 'abcde', '1998-10-10', '2019-12-06 03:34:48', '2019-12-06 03:57:47'),
(2, 2, 'Test', 'as', 'Two', 'Test59.jpg', 'ktm', '123654', '987456', 'male', 'abcde', '1997-10-20', '2019-12-06 03:38:18', '2019-12-06 03:38:18'),
(3, 5, 'Test', NULL, 'Five', NULL, 'pokhara', NULL, '1452369', 'female', NULL, '2001-01-20', '2019-12-09 08:35:44', '2019-12-09 08:35:44'),
(4, 6, 'abc', NULL, 'abc', NULL, 'abc', NULL, '123', 'female', NULL, '1999-02-15', '2019-12-09 08:43:23', '2019-12-09 08:43:23'),
(5, 7, 'Test', NULL, 'Six', NULL, 'ktm', NULL, '123456', 'female', NULL, '2017-02-07', '2019-12-09 08:52:07', '2019-12-09 08:52:07'),
(6, 8, 'Test', NULL, 'Seven', NULL, 'Ktm', NULL, '9874563201', 'female', NULL, '1995-03-26', '2019-12-09 09:08:01', '2019-12-09 09:08:01'),
(7, 9, 'Test', NULL, 'Eight', NULL, 'pokhara', NULL, '1452', 'male', NULL, '1995-06-20', '2019-12-10 00:27:06', '2019-12-10 00:27:06');

-- --------------------------------------------------------

--
-- Table structure for table `receptionists`
--

CREATE TABLE `receptionists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) DEFAULT NULL,
  `cellphone` bigint(20) NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receptionists`
--

INSERT INTO `receptionists` (`id`, `user_id`, `first_name`, `middle_name`, `last_name`, `avatar`, `address`, `phone`, `cellphone`, `gender`, `bio`, `birthdate`, `created_at`, `updated_at`) VALUES
(1, 3, 'Test', NULL, 'Three', 'Test57.jpg', 'ktm', 123654, 125478, 'male', 'abcde', '2000-12-02', '2019-12-06 03:40:55', '2019-12-06 04:27:16'),
(2, 4, 'Testing', NULL, 'Four', 'Test50.jpg', 'kathmandu', 145236, 985632, 'male', 'jaskdjhbjak', '2010-11-22', '2019-12-06 03:50:37', '2019-12-06 03:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'abcde', '2019-12-06 03:55:15', '2019-12-06 03:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `subservices`
--

CREATE TABLE `subservices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subservices`
--

INSERT INTO `subservices` (`id`, `service_id`, `subname`, `rate`, `created_at`, `updated_at`) VALUES
(1, 1, 'abc', '10', '2019-12-06 03:55:15', '2019-12-06 03:55:15'),
(2, 1, 'cde', '20', '2019-12-06 03:55:15', '2019-12-06 03:55:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_id`, `type`) VALUES
(1, 'test 1', 'test1@test.com', NULL, '$2y$10$/jG24K/WkKkXoq8GalYuDetkn11ZAjGaKZ4gHvW1e9EhBQY/QLTfS', NULL, '2019-12-06 03:33:03', '2019-12-06 03:33:03', 'test 177321', '4'),
(2, 'test 2', 'test2@test.com', NULL, '$2y$10$5y0N9ik0XBXw0tOqe/F4.eNHMdi9IoayUEUroY5aHe90F5a/rVadW', NULL, '2019-12-06 03:37:23', '2019-12-06 03:37:23', 'test 220898', '4'),
(3, 'test 3', 'test3@test.com', NULL, '$2y$10$aOJc0RfPaL0GI5vKz/n0ju60VmUu0RvGKOwdpxbkI0GJotvI5xkGe', NULL, '2019-12-06 03:38:55', '2019-12-06 03:38:55', 'test 351424', '2'),
(4, 'test 4', 'test4@test.com', NULL, '$2y$10$I73qjyogUtaSJd1YOkzfK.TOfQ/adPLjuoH1RTDUwCieQXIScWXca', NULL, '2019-12-06 03:49:47', '2019-12-06 03:49:47', 'test 486029', '2'),
(5, 'test 5', 'test5@test.com', NULL, '$2y$10$weO7SWxU9WqeBs8E02cT3OD4INaGegIfT4hbm4XMqk38OYwLf4BXu', NULL, '2019-12-09 08:35:44', '2019-12-09 08:35:44', 'test 591151', '4'),
(6, 'abc', 'abc@test.com', NULL, '$2y$10$IgzvsfWjGOIG7lg4sQdmkePFyYc8WUVLF04KYDJGajAGRyX8QJuDm', NULL, '2019-12-09 08:43:22', '2019-12-09 08:43:22', 'abc73736', '4'),
(7, 'test 6', 'test6@test.com', NULL, '$2y$10$R6ob8AD/ssElCXWXIfbuXOGc7JLDgtzW/PoIhikd1d4iqdgHrCPYC', NULL, '2019-12-09 08:52:07', '2019-12-09 08:52:07', 'test 625878', '4'),
(8, 'test 7', 'test7@test.com', NULL, '$2y$10$89TzlrSEZfhO4Aa5ysk4Ke8AYnsG8dEau0d2JQbH8abwadVplQ0bO', NULL, '2019-12-09 09:08:01', '2019-12-09 09:08:01', 'test 736251', '4'),
(9, 'test 8', 'test8@test.com', NULL, '$2y$10$rlU5SmnZob.c1iu2FgkbsOXHS0i1N7V1q462IJbmkY8zjWXzh7AVG', NULL, '2019-12-10 00:27:05', '2019-12-10 00:27:05', 'test 854808', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `dentists`
--
ALTER TABLE `dentists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dentists_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoicedetails_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patients_user_id_foreign` (`user_id`);

--
-- Indexes for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receptionists_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subservices`
--
ALTER TABLE `subservices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subservices_service_id_foreign` (`service_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dentists`
--
ALTER TABLE `dentists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `receptionists`
--
ALTER TABLE `receptionists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subservices`
--
ALTER TABLE `subservices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dentists`
--
ALTER TABLE `dentists`
  ADD CONSTRAINT `dentists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoicedetails`
--
ALTER TABLE `invoicedetails`
  ADD CONSTRAINT `invoicedetails_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receptionists`
--
ALTER TABLE `receptionists`
  ADD CONSTRAINT `receptionists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subservices`
--
ALTER TABLE `subservices`
  ADD CONSTRAINT `subservices_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
