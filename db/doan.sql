-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2023 at 03:48 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Business, Finance & Economics', NULL, NULL),
(2, 'Computers, Science & Technology', NULL, NULL),
(3, 'Sport & Leisure', NULL, NULL),
(4, 'Health & Medicine', NULL, NULL),
(5, 'Entertainment, Art & Culture', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classroom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `classroom_name`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, '10A', 1, NULL, NULL),
(2, '10B', 1, NULL, NULL),
(3, '10C', 1, NULL, NULL),
(4, '11A', 2, NULL, NULL),
(5, '11B', 2, NULL, NULL),
(6, '11C', 2, NULL, NULL),
(7, '12A', 3, NULL, NULL),
(8, '12B', 3, NULL, NULL),
(9, '12C', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `headline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `topic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view_counts` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade_name`, `created_at`, `updated_at`) VALUES
(1, '10', '2023-04-18 07:06:47', '2023-04-18 07:06:47'),
(2, '11', '2023-04-18 07:06:47', '2023-04-18 07:06:47'),
(3, '12', '2023-04-18 07:06:47', '2023-04-18 07:06:47');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2023_03_24_093830_create_categories_table', 1),
(11, '2023_03_27_142310_create_subjects_table', 1),
(12, '2023_03_27_142831_create_teachers_table', 1),
(13, '2023_03_27_221020_create_grades_table', 1),
(14, '2023_03_27_221213_create_classrooms_table', 1),
(15, '2023_03_27_221307_create_students_table', 1),
(16, '2023_04_03_210829_add_field_users_table', 1),
(17, '2023_04_03_220342_create_news_table', 1),
(18, '2023_04_04_141135_create_scores_table', 1),
(19, '2023_04_04_172555_create_documents_table', 1),
(20, '2023_04_08_114729_create_contacts_table', 1),
(21, '2023_04_15_133522_create_teacher_classroom_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('a79909cd56f390d67f0f2f7e67e966ce70c25d61d3a5f3896caf9e0bf3cc3ee1839bcc3f176ef92d', 4, 1, 'newit-token', '[]', 0, '2023-04-27 19:48:56', '2023-04-27 19:48:56', '2024-04-28 02:48:56');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'rylFwioYcP6MQRSPcCuZM1YngbJv6akZpI55UvSW', NULL, 'http://localhost', 1, 0, 0, '2023-04-27 19:48:49', '2023-04-27 19:48:49'),
(2, NULL, 'Laravel Password Grant Client', 'MIEgAE4ObQ4sUZs4ANxCQ8Z5mxj7C6Abye2l7dRx', 'users', 'http://localhost', 0, 1, 0, '2023-04-27 19:48:49', '2023-04-27 19:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-04-27 19:48:49', '2023-04-27 19:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `oral_exam_1` double(8,2) DEFAULT NULL,
  `oral_exam_2` double(8,2) DEFAULT NULL,
  `oral_exam_3` double(8,2) DEFAULT NULL,
  `exam_15m_1` double(8,2) DEFAULT NULL,
  `exam_15m_2` double(8,2) DEFAULT NULL,
  `exam_15m_3` double(8,2) DEFAULT NULL,
  `exam_45m_1` double(8,2) DEFAULT NULL,
  `exam_45m_2` double(8,2) DEFAULT NULL,
  `exam_45m_3` double(8,2) DEFAULT NULL,
  `final_exam` double(8,2) DEFAULT NULL,
  `spa` double(8,2) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `school_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `classroom_id`, `student_id`, `subject_id`, `oral_exam_1`, `oral_exam_2`, `oral_exam_3`, `exam_15m_1`, `exam_15m_2`, `exam_15m_3`, `exam_45m_1`, `exam_45m_2`, `exam_45m_3`, `final_exam`, `spa`, `semester`, `school_year`, `created_at`, `updated_at`) VALUES
(312, 7, 1, 1, 7.00, 10.00, 9.00, 5.50, 9.50, 9.60, 9.30, 8.70, NULL, 6.50, 8.16, 2, '2022-2023', '2023-04-18 08:40:02', '2023-04-20 04:09:53'),
(313, 7, 2, 1, 9.00, 5.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 7.00, NULL, NULL, '2023-04-18 08:40:03', '2023-04-19 10:57:51'),
(314, 7, 17, 1, 8.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 8.00, NULL, NULL, '2023-04-18 08:40:03', '2023-04-19 10:44:14'),
(315, 7, 21, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-18 08:40:03', '2023-04-19 06:52:55'),
(316, 6, 5, 1, 2.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5.00, NULL, NULL, '2023-04-19 04:38:32', '2023-04-19 05:15:15'),
(317, 6, 9, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-04-19 04:38:32', '2023-04-19 10:44:27'),
(318, 7, 17, 2, 8.00, 1.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 4.50, NULL, NULL, '2023-04-19 10:32:12', '2023-04-19 14:39:13'),
(319, 7, 1, 2, 8.00, 8.00, NULL, 8.00, 8.00, NULL, 8.00, 8.00, NULL, 8.00, 8.00, NULL, NULL, NULL, NULL),
(320, 7, 1, 3, 7.00, NULL, NULL, 7.00, NULL, NULL, 7.00, NULL, NULL, 7.00, 7.00, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `academic_year` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizen_identity_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `grade_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `first_name`, `last_name`, `gender`, `phone`, `email`, `date_of_birth`, `academic_year`, `citizen_identity_card`, `nation`, `religion`, `address`, `state`, `city`, `user_id`, `grade_id`, `classroom_id`, `created_at`, `updated_at`) VALUES
(1, 'Victor', 'Robertson', 'Male', '127991638', 'robertson@gmail.com', '2005-12-08', '2020-2023', '030205861731', 'Hoa', 'None', 'Pham Ngu Lao', 'Go Vap', 'TPHCM', 4, 3, 7, '2023-04-18 07:06:48', '2023-04-18 07:06:48'),
(2, 'Taylor', 'Swift', 'Female', '330182912', 'swift@gmail.com', '2005-11-02', '2020-2023', '040305799102', 'Kinh', 'None', 'Le Loi', 'Go Vap', 'TPHCM', 5, 3, 7, '2023-04-18 07:06:48', '2023-04-18 07:06:48'),
(3, 'Selena', 'Gomez', 'Female', '126891091', 'gomez@gmail.com', '2005-06-04', '2020-2023', '030205019012', 'Kinh', 'None', 'No Trang Long', 'Binh Thanh', 'TPHCM', 6, 3, 9, '2023-04-18 07:06:48', '2023-04-18 07:06:48'),
(4, 'Elliot', 'Leannon', 'Male', '990021355', 'kiley.gutmann@example.org', '2005-11-14', '2020-2023', '068956741270', 'Kinh', 'Roman Catholicism', 'Kha Van Can', 'Thu Duc', 'TPHCM', 27, 1, 1, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(5, 'Randy', 'Murphy', 'Female', '360677115', 'klocko.leanna@example.org', '2007-02-16', '2022-2025', '052533873519', 'Kinh', 'Roman Catholicism', 'Nguyen Huu Tho', '12', 'TPHCM', 28, 2, 6, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(6, 'Devyn', 'Gibson', 'Male', '116617867', 'mavis.labadie@example.org', '2005-09-11', '2020-2023', '041351943574', 'Kinh', 'Buddhist', 'To Ngoc Van', 'Thu Duc', 'TPHCM', 29, 2, 5, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(7, 'Everette', 'Rowe', 'Female', '740815652', 'hillard.murazik@example.com', '2005-05-29', '2020-2023', '075512536556', 'Kinh', 'None', 'Le Loi', 'Go Vap', 'TPHCM', 30, 3, 9, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(8, 'Darrick', 'Klein', 'Male', '201294418', 'madonna83@example.net', '2007-06-16', '2022-2025', '082173596096', 'Kinh', 'Buddhist', 'Pham Ngu Lao', 'Go Vap', 'TPHCM', 31, 2, 4, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(9, 'Dayna', 'Fritsch', 'Female', '988433587', 'fritsch.selmer@example.com', '2006-05-02', '2021-2024', '071545119649', 'Kinh', 'Buddhist', 'Phan Van Hon', '12', 'TPHCM', 32, 2, 6, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(10, 'Trevor', 'Graham', 'Female', '794340155', 'dillan.boyer@example.com', '2007-08-10', '2022-2025', '045615533959', 'Kinh', 'Roman Catholicism', 'Kha Van Can', 'Thu Duc', 'TPHCM', 33, 3, 8, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(11, 'Darius', 'Marks', 'Female', '147388598', 'domenico90@example.net', '2005-11-17', '2020-2023', '051681732016', 'Kinh', 'Roman Catholicism', 'Hiep Thanh', '12', 'TPHCM', 34, 3, 9, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(12, 'Johathan', 'Ward', 'Male', '829467430', 'ygrimes@example.org', '2007-06-19', '2022-2025', '042674750214', 'Kinh', 'Buddhist', 'Kha Van Can', 'Thu Duc', 'TPHCM', 35, 2, 5, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(13, 'Cleo', 'Dare', 'Female', '915973039', 'hand.ruben@example.com', '2006-04-19', '2021-2024', '045930327009', 'Kinh', 'Roman Catholicism', 'No Trang Long', 'Binh Thanh', 'TPHCM', 36, 1, 2, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(14, 'Cora', 'Metz', 'Female', '738472657', 'travis.rowe@example.org', '2006-10-22', '2021-2024', '092427648529', 'Kinh', 'Buddhist', 'To Ngoc Van', 'Thu Duc', 'TPHCM', 37, 1, 1, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(15, 'Camren', 'Schimmel', 'Male', '296476181', 'deven01@example.net', '2007-03-30', '2022-2025', '043582493538', 'Kinh', 'Buddhist', 'Phan Van Hon', '12', 'TPHCM', 38, 1, 3, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(16, 'Thad', 'Connelly', 'Female', '351590717', 'gabrielle.hills@example.org', '2005-10-30', '2020-2023', '059816847078', 'Kinh', 'None', 'To Ngoc Van', 'Thu Duc', 'TPHCM', 39, 3, 8, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(17, 'Erika', 'Koelpin', 'Male', '293083790', 'xfunk@example.net', '2006-04-12', '2021-2024', '052086303491', 'Kinh', 'Buddhist', 'Le Van Khuong', '12', 'TPHCM', 40, 3, 7, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(18, 'Adell', 'Breitenberg', 'Male', '274683883', 'tessie.boyer@example.org', '2006-10-12', '2021-2024', '090531620535', 'Kinh', 'None', 'Song Hanh', '12', 'TPHCM', 41, 1, 3, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(19, 'Marlen', 'Herman', 'Female', '740565631', 'okon.audie@example.net', '2007-04-12', '2022-2025', '055282352790', 'Kinh', 'None', 'Vo Van Ngan', 'Thu Duc', 'TPHCM', 42, 2, 4, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(20, 'Brett', 'Nolan', 'Female', '402319531', 'natalia.dare@example.net', '2005-11-01', '2020-2023', '059965824397', 'Kinh', 'None', 'Phan Xich Long', 'Binh Thanh', 'TPHCM', 43, 1, 3, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(21, 'Phoebe', 'Schuppe', 'Male', '756713529', 'zachariah14@example.org', '2006-06-24', '2021-2024', '062920116538', 'Kinh', 'Buddhist', 'Phan Van Tri', 'Binh Thanh', 'TPHCM', 44, 3, 7, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(22, 'Wendell', 'Bergnaum', 'Male', '517776728', 'oosinski@example.org', '2005-10-24', '2020-2023', '097373732143', 'Kinh', 'None', 'Kha Van Can', 'Thu Duc', 'TPHCM', 45, 3, 8, '2023-04-18 07:06:51', '2023-04-18 07:06:51'),
(23, 'Valerie', 'Casper', 'Female', '648042384', 'cassidy.kuhn@example.com', '2006-12-17', '2021-2024', '048465413027', 'Kinh', 'Roman Catholicism', 'Phan Dinh Phung', 'Phu Nhuan', 'TPHCM', 46, 1, 3, '2023-04-18 07:06:51', '2023-04-18 07:06:51');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `created_at`, `updated_at`) VALUES
(1, 'Maths', NULL, NULL),
(2, 'Physics', NULL, NULL),
(3, 'Chemistry', NULL, NULL),
(4, 'Biology', NULL, NULL),
(5, 'Informatics', NULL, NULL),
(6, 'Literature', NULL, NULL),
(7, 'History', NULL, NULL),
(8, 'Geography', NULL, NULL),
(9, 'Foreign Language', NULL, NULL),
(10, 'Civic Education', NULL, NULL),
(11, 'Technology', NULL, NULL),
(12, 'Physical Education', NULL, NULL),
(13, 'National Defense Education', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `citizen_identity_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `first_name`, `last_name`, `gender`, `phone`, `email`, `date_of_birth`, `joining_date`, `degree`, `citizen_identity_card`, `nation`, `religion`, `address`, `state`, `city`, `user_id`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 'Dominic', 'Simon', 'Male', 334050356, 'simon@gmail.com', '1993-09-27', '2019-08-08', 'Master', '070093100295', 'Kinh', 'None', 'Phan Van Tri', 'Go Vap', 'TPHCM', 2, 1, '2023-04-18 07:06:48', '2023-04-18 07:06:48'),
(2, 'Kai', 'Havert', 'Male', 345112837, 'havert@gmail.com', '1994-01-11', '2020-03-18', 'Bachelor', '062094671001', 'Kinh', 'None', 'Le Duc Tho', 'Go Vap', 'TPHCM', 3, 2, '2023-04-18 07:06:48', '2023-04-18 07:06:48'),
(3, 'Garry', 'Block', 'Female', 442823157, 'justice52@example.net', '1998-06-18', '1976-11-18', 'Master', '058258766381', 'Kinh', 'None', 'Cong Hoa', 'Tan Binh', 'TPHCM', 7, 3, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(4, 'Kristin', 'Veum', 'Male', 784895764, 'madie.haag@example.com', '1974-10-17', '1988-12-03', 'Doctoral', '086891445567', 'Kinh', 'Roman Catholicism', 'Cong Hoa', 'Tan Binh', 'TPHCM', 8, 1, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(5, 'Reynold', 'Wiza', 'Male', 687721126, 'mthiel@example.org', '1988-08-22', '2012-11-13', 'Doctoral', '055379786974', 'Kinh', 'Roman Catholicism', 'Dao Duy Anh', 'Phu Nhuan', 'TPHCM', 9, 9, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(6, 'Easton', 'Koepp', 'Female', 648029061, 'romaguera.alyson@example.net', '1988-08-21', '2013-10-23', 'Master', '037384273997', 'Kinh', 'Buddhist', 'Le Thi Rieng', '12', 'TPHCM', 10, 10, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(7, 'Kirstin', 'Herman', 'Male', 645723683, 'qspencer@example.net', '1994-09-24', '2002-10-11', 'Master', '056619290893', 'Kinh', 'Roman Catholicism', 'Phan Van Hon', '12', 'TPHCM', 11, 11, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(8, 'Rocky', 'Rogahn', 'Female', 404669556, 'lang.katharina@example.net', '1999-12-02', '2004-07-06', 'Master', '025718694144', 'Kinh', 'Buddhist', 'Vo Van Ngan', 'Thu Duc', 'TPHCM', 12, 7, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(9, 'Makayla', 'Bahringer', 'Male', 659575555, 'mkeebler@example.net', '1989-06-28', '1977-10-26', 'Doctoral', '051068632842', 'Kinh', 'Roman Catholicism', 'No Trang Long', 'Binh Thanh', 'TPHCM', 13, 3, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(10, 'Jamil', 'Schultz', 'Male', 187814571, 'sophia.bailey@example.org', '1998-07-03', '1999-12-01', 'Doctoral', '015889202610', 'Kinh', 'Roman Catholicism', 'Le Thi Rieng', '12', 'TPHCM', 14, 4, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(11, 'Vallie', 'Corwin', 'Female', 594215809, 'kacey10@example.com', '1978-10-11', '1978-10-05', 'Bachelor', '033520088640', 'Kinh', 'Buddhist', 'Nguyen Van Luong', '12', 'TPHCM', 15, 5, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(12, 'Tess', 'Spinka', 'Male', 817800990, 'lmoen@example.net', '1990-11-12', '1987-12-08', 'Master', '095356872427', 'Kinh', 'Buddhist', 'To Ngoc Van', 'Thu Duc', 'TPHCM', 16, 3, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(13, 'Ernesto', 'Dietrich', 'Male', 611278284, 'carolyn.reichert@example.net', '1999-07-25', '1972-12-08', 'Master', '068373474582', 'Kinh', 'Buddhist', 'Nguyen Kiem', 'Phu Nhuan', 'TPHCM', 17, 12, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(14, 'Melissa', 'Roberts', 'Male', 477550911, 'clementina.leannon@example.net', '2000-11-05', '2012-09-10', 'Master', '045051774956', 'Kinh', 'Roman Catholicism', 'Nguyen Huu Tho', '12', 'TPHCM', 18, 4, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(15, 'Berneice', 'Willms', 'Female', 347247039, 'jacynthe.kuhn@example.net', '1988-06-03', '1999-02-04', 'Doctoral', '033836655645', 'Kinh', 'None', 'Le Duc Tho', 'Go Vap', 'TPHCM', 19, 2, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(16, 'Felton', 'Yost', 'Male', 862344275, 'steuber.danika@example.net', '1971-04-24', '1977-07-25', 'Doctoral', '077876331489', 'Kinh', 'None', 'Le Van Khuong', '12', 'TPHCM', 20, 10, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(17, 'Kayleigh', 'Shanahan', 'Female', 955261821, 'eric.powlowski@example.com', '1980-11-07', '1986-09-18', 'Doctoral', '062752067835', 'Kinh', 'Buddhist', 'Cong Hoa', 'Tan Binh', 'TPHCM', 21, 5, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(18, 'Max', 'Hyatt', 'Male', 250053753, 'kathlyn87@example.org', '1994-10-27', '2014-10-12', 'Doctoral', '030715465786', 'Kinh', 'Buddhist', 'Le Van Tho', 'Go Vap', 'TPHCM', 22, 3, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(19, 'Claudia', 'Rippin', 'Female', 476064851, 'clementine.howe@example.net', '1991-08-17', '2017-08-10', 'Bachelor', '000735008153', 'Kinh', 'None', 'Nguyen Xi', 'Binh Thanh', 'TPHCM', 23, 12, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(20, 'Pamela', 'Marks', 'Male', 863722489, 'emelie13@example.org', '1982-12-22', '2017-03-15', 'Master', '077897059280', 'Kinh', 'None', 'Bui Quang La', 'Go Vap', 'TPHCM', 24, 2, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(21, 'Edyth', 'Zieme', 'Female', 343722721, 'enrico21@example.com', '1980-06-05', '1975-03-27', 'Master', '076996783537', 'Kinh', 'None', 'Song Hanh', '12', 'TPHCM', 25, 1, '2023-04-18 07:06:49', '2023-04-18 07:06:49'),
(22, 'Gerald', 'Wiegand', 'Female', 464302447, 'epadberg@example.net', '1978-06-12', '2017-11-19', 'Master', '043056408359', 'Kinh', 'None', 'Hiep Thanh', '12', 'TPHCM', 26, 7, '2023-04-18 07:06:49', '2023-04-18 07:06:49');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classrooms`
--

CREATE TABLE `teacher_classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `classroom_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_classrooms`
--

INSERT INTO `teacher_classrooms` (`id`, `teacher_id`, `classroom_id`, `classroom_name`, `subject_id`, `created_at`, `updated_at`) VALUES
(1, 1, 7, '12A', 1, '2023-04-18 07:07:05', '2023-04-18 07:07:05'),
(2, 1, 6, '11C', 1, '2023-04-19 04:38:12', '2023-04-19 04:38:12'),
(3, 2, 7, '12A', 2, '2023-04-19 10:31:15', '2023-04-19 10:31:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `groups` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_teacher` tinyint(1) NOT NULL DEFAULT 0,
  `is_student` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_user`, `password`, `groups`, `profile_picture`, `remember_token`, `created_at`, `updated_at`, `is_admin`, `is_teacher`, `is_student`) VALUES
(1, 'Admin', '$2y$10$gGOgb8ADFZpbrfs4SxOgSe6KIXbYdtrC6GQY9yQFV/ReG.4FIiGyK', 'Administrator', NULL, NULL, '2023-04-18 07:06:47', '2023-04-18 07:06:47', 1, 0, 0),
(2, '19498271', '$2y$10$ySPh..0eqLLPPjWdAL/5LOzKUj2wNN1aNE9qquGB1842GrjabKssS', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(3, '19502951', '$2y$10$Y3fCGu3IczcKxT.1eflzyesb7xJOrG1EVZgTvmszd64/4Ie2vlnX.', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(4, '11223344', '$2y$10$UNjO6ZRuBIy2vcKsiC40JeZSYmzj5HgrjOvt3LR9cPOSjhcfrYym6', 'Student', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 0, 1),
(5, '11112222', '$2y$10$wkOMVWKdy9.2mvFrHpQ.J.SahNWzcKbynKb4ZJ6fTCxPdoGtTIlIS', 'Student', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 0, 1),
(6, '12345678', '$2y$10$EXiFzl3Nkl1vw5KkXZ6X/eDlLoq09CwHvq0jqsnebnTYpuiZyvcSq', 'Student', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 0, 1),
(7, '23249748', '$2y$10$zbLdUUnI16BpT6Id.NSXZuyyw66r.cuOlVWKDhDe6dT3F9.H/NYXa', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(8, '23469093', '$2y$10$IKvl9NyHtLv/3AIO7PBUruFOE1qBeOuhkiH8iJ1gKPJAb4CqngqyO', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(9, '23917893', '$2y$10$fPJxzSwPIFM1aqoSYD/ei.N9cUJwSC9a9S67EUsV9SYTEKiPkEsmy', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(10, '23273074', '$2y$10$/RFuaOR8t8ayCEgZ1g2jnepC2tlmTku0lPRNEjpdpR9M2P/rPLd52', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(11, '23150634', '$2y$10$F.ICRJAhdZjOXbXwSxySk.q54Kd/7IblPpT2QwwCZqlE7mpquFgdq', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(12, '23860490', '$2y$10$O1zUhOIKl9dRPU9oYvyoh.xYGW6BNKaIQzsy218HDFJphJG4hZIxK', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(13, '23082532', '$2y$10$DjiWOBe0THAHWMHst95ozegHHxUnjwFgZ.yYZGc8BoAH301PaFNFK', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(14, '23251405', '$2y$10$zPR7yo1vVE4rPcT6xOJQ/.2haF8odJooFbthhmRI27tV2sszVg3BS', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(15, '23056862', '$2y$10$lkNNMyC3hPA5LKEek1E2B.vtDzte0J0/ElqULrI5mUwZLbmglpNk.', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(16, '23971336', '$2y$10$1ekgbUUyDl0hfFKN9z38meyuZWoVvxVYjom7EyYv2irRDu1wLCNgS', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(17, '23743950', '$2y$10$qd4DYnT05mrXAMhwG2e5quGMJcnlEstGamVt1Y23fiqr/nCYcM5ca', 'Teacher', NULL, NULL, '2023-04-18 07:06:48', '2023-04-18 07:06:48', 0, 1, 0),
(18, '23294489', '$2y$10$EIprPbWrSXaQaf8ESLWrj.JZLwX7hL3M2W97X00ewOCStSNEGzSZG', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(19, '23732760', '$2y$10$Pth1Fj/9BgbHokHplvvcIe0qbeM4ofz1g5dFQ0WJts2fyRsIoAwe2', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(20, '23352692', '$2y$10$OwWaodkjsLhZ2.pWwEvU4udAlen7FC7P2fSEMbZmMx/F78V1I/Weq', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(21, '23385903', '$2y$10$9xh8dgmjYU20HM6ob/DmxOawvXzG4TmR03pFEH10jymI5KE0e3jFG', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(22, '23327854', '$2y$10$6XDtUE0FaYFfDK.2UOMmjeIv45LsOj/f/YzBKvuDEG63V8o4R7Qkm', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(23, '23210479', '$2y$10$UV0fCgYnWha735Z2aAZRL.P6FVYCdDpYMe.1Yi4TDDK0qbqh6vaje', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(24, '23031744', '$2y$10$/kG4wgJWTtrlXKymeQigwet81IYEulQmcQexjHvVgWuT.Cd003EXG', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(25, '23070937', '$2y$10$uLe6I/czRg19ja6JJ17/8.H1zsVYog4ewe1qePxiJMYt39OGt4PNW', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(26, '23834379', '$2y$10$6AZkP1ttdZlYurWlGXkxaenUKPSCE2HHCZcTN.VweGu0z848g3XzK', 'Teacher', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 1, 0),
(27, '23191498', '$2y$10$zAvj5KMqzTHfpjMhdyMjuOo75P8FMPWxiGMiJzm7TwLMsF1CgS/j.', 'Student', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 0, 1),
(28, '23321546', '$2y$10$IWWjBi5.cFvIFo0OD3/aZOumvi2JEsV7Z5nS9Ca9QqRsUjov/.UPW', 'Student', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 0, 1),
(29, '23491058', '$2y$10$FYkyeA9mzCjJIDBX9IkXoO1EJlJ/Zr/LixprBRp.eIWvAz3COVmqW', 'Student', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 0, 1),
(30, '23379920', '$2y$10$9M7WFuxduiNYpsb6Xmf0BOHJxUjnAsBqndtSWitOqdqPCIHwm/U6q', 'Student', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 0, 1),
(31, '23208623', '$2y$10$CjMSZ9KzaWeEgQDDzF1Td.Yj9aNqfBT7Ep8sX9nNELCaeqAf/U6XC', 'Student', NULL, NULL, '2023-04-18 07:06:49', '2023-04-18 07:06:49', 0, 0, 1),
(32, '23345265', '$2y$10$Z3ZgsuOqeCqIA3zL8sUG2.SRbQMC0gJNtiJKzT.ruKz2oDQQZGaza', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(33, '23732480', '$2y$10$bvUirtaLmpQjoV396rsYeeL2qw2aABiZZfdUQRKLCeW3yf/.bU5XS', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(34, '23735511', '$2y$10$QjtNSUaJYQS1mPw0mj8nsuZoVjfLADeBBXAzJ7Z1QV2f.kbT1oeLK', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(35, '23186759', '$2y$10$IqbwpsKnJ5BIrly2GmP0i.kdzQezWcnRw6UcJDYMpVEg3hFfgp5pO', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(36, '23249601', '$2y$10$QpH5IP1kZ99VxNy1Qb05DO3HSRcHAuUA4wofTIWmVYUMhygOIFRgC', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(37, '23851671', '$2y$10$2N3gx0r58AVQrt6qqJ7wxuYjNRFcN6X7eW2iMQdY0avciwP0/J6QW', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(38, '23904845', '$2y$10$yL1lZFNJPUPjmNmiC5Q6XOZdj2yQ8SmaWzRm538WcddpB9opI6Qga', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(39, '23486824', '$2y$10$/ggGbWWYDtbJi3fnFgWPTuS8alaFtiQr0Nl3gvEP7fkBCtXly4qb6', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(40, '23569469', '$2y$10$ShbG9ln.xu//3ZVU.R.CZurMv8Fu9oQgaDxMwNrIAjqOb/M4sfsVG', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(41, '23601374', '$2y$10$P7p03wjXPUEYKRiVjcTEdO0K6ssmLOPajI0JPY6oxalnnJepI646e', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(42, '23333475', '$2y$10$MCyFJXyCV7QQ9IqFxXljnOJGOBVaKFI71nzLUxQZFfYc6knwTyaUK', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(43, '23755735', '$2y$10$N6cmWw1XjLHS.b9wom9gEe2nb42m/VicgWF//yYBePnhlhhs07R.2', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(44, '23752639', '$2y$10$d1fIlOZlsLpdOiepSpczFer6zpt8/kc2Nu46DWpccU7ptl1vjJT0a', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(45, '23310554', '$2y$10$9CriSa5sC/8xC2nLkJcFd.z8eUniX5eEqWefjrj1XcZQQbAnffmN6', 'Student', NULL, NULL, '2023-04-18 07:06:50', '2023-04-18 07:06:50', 0, 0, 1),
(46, '23469742', '$2y$10$LHqT2nU7x2a7n9wh.2Pq0uz2qyN8GQBBUCy7IIescxGzhbwRvIzM.', 'Student', NULL, NULL, '2023-04-18 07:06:51', '2023-04-18 07:06:51', 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_category_name_unique` (`category_name`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `classrooms_classroom_name_unique` (`classroom_name`),
  ADD KEY `classrooms_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_grade_name_unique` (`grade_name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `news_title_unique` (`title`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_classroom_id_foreign` (`classroom_id`),
  ADD KEY `scores_student_id_foreign` (`student_id`),
  ADD KEY `scores_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_phone_unique` (`phone`),
  ADD UNIQUE KEY `students_email_unique` (`email`),
  ADD UNIQUE KEY `students_citizen_identity_card_unique` (`citizen_identity_card`),
  ADD KEY `students_user_id_foreign` (`user_id`),
  ADD KEY `students_grade_id_foreign` (`grade_id`),
  ADD KEY `students_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_phone_unique` (`phone`),
  ADD UNIQUE KEY `teachers_email_unique` (`email`),
  ADD UNIQUE KEY `teachers_citizen_identity_card_unique` (`citizen_identity_card`),
  ADD KEY `teachers_user_id_foreign` (`user_id`),
  ADD KEY `teachers_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `teacher_classrooms`
--
ALTER TABLE `teacher_classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_classrooms_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teacher_classrooms_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `teacher_classrooms`
--
ALTER TABLE `teacher_classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `scores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `students_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`),
  ADD CONSTRAINT `students_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `teachers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `teacher_classrooms`
--
ALTER TABLE `teacher_classrooms`
  ADD CONSTRAINT `teacher_classrooms_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teacher_classrooms_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
