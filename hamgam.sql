-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 01, 2020 at 09:44 AM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hamgam`
--

-- --------------------------------------------------------

--
-- Table structure for table `advices`
--

DROP TABLE IF EXISTS `advices`;
CREATE TABLE IF NOT EXISTS `advices` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `question` text,
  `answer` text,
  `adviser_id` int(11) DEFAULT NULL,
  `is_seen` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advices`
--

INSERT INTO `advices` (`id`, `user_id`, `title`, `question`, `answer`, `adviser_id`, `is_seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'this is consult title', 'this is consult description', '2', 6, 1, '2020-01-22 08:39:28', '2020-01-22 09:07:12', NULL),
(2, 2, 'this is a consult title2', 'this is a consult desc2', 'this is a answer from consultant', 4, 0, '2020-01-22 08:52:11', '2020-01-22 09:08:45', NULL),
(3, 2, 'جدید1', 'یه سوال جدید از مشاور', NULL, 6, 0, '2020-01-22 09:05:30', '2020-01-22 09:05:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `master_id` varchar(255) DEFAULT NULL,
  `time` varchar(255) DEFAULT NULL,
  `term` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `capacity` int(11) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `course_fields`
--

DROP TABLE IF EXISTS `course_fields`;
CREATE TABLE IF NOT EXISTS `course_fields` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `festivals`
--

DROP TABLE IF EXISTS `festivals`;
CREATE TABLE IF NOT EXISTS `festivals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `festivals`
--

INSERT INTO `festivals` (`id`, `title`, `description`, `image`, `file`, `date`, `hour`, `price`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'title', 'desc', 'image', 'file', '2020-01-23', '14', 20000, '2020-01-20 20:30:00', '2020-01-21 12:33:56', NULL),
(2, 'title2', 'desc2', 'uploads/images/2020/01/6524ترم بندی.jpg', 'uploads/files/2020/01/9024ترم بندی.jpg', '2020-01-21', '5', 10000, '2020-01-21 12:14:20', '2020-01-21 12:14:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

DROP TABLE IF EXISTS `fields`;
CREATE TABLE IF NOT EXISTS `fields` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'mechanic', '2020-01-14 20:30:00', '2020-01-21 20:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `field_jobs`
--

DROP TABLE IF EXISTS `field_jobs`;
CREATE TABLE IF NOT EXISTS `field_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `field_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `free_courses`
--

DROP TABLE IF EXISTS `free_courses`;
CREATE TABLE IF NOT EXISTS `free_courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `master_id` int(11) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `deadline` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `free_courses`
--

INSERT INTO `free_courses` (`id`, `title`, `description`, `image`, `master_id`, `time`, `hour`, `capacity`, `price`, `deadline`, `duration`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'new free course', 'description', 'uploads/images/2019/10/5924ترم بندی.jpg', 3, '2019-10-02', '18', 8, 0, '2019-10-23', 1, '2019-10-02 10:29:58', '2019-10-02 10:37:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `frequently_questions`
--

DROP TABLE IF EXISTS `frequently_questions`;
CREATE TABLE IF NOT EXISTS `frequently_questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text,
  `answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `graduates_employeds`
--

DROP TABLE IF EXISTS `graduates_employeds`;
CREATE TABLE IF NOT EXISTS `graduates_employeds` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `job` varchar(255) DEFAULT NULL,
  `field` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ideas`
--

DROP TABLE IF EXISTS `ideas`;
CREATE TABLE IF NOT EXISTS `ideas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `answer` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `industry_posts`
--

DROP TABLE IF EXISTS `industry_posts`;
CREATE TABLE IF NOT EXISTS `industry_posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `industry_posts`
--

INSERT INTO `industry_posts` (`id`, `title`, `description`, `image`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'new', '<p>fefef</p>', 'uploads/images/2019/10/4424ترم بندی.jpg', '', '2019-10-02 12:54:52', '2019-10-02 12:54:56', '2019-10-02 12:54:56'),
(2, 'fefe', '<p>fefefaefeafafeafeaf</p>', 'uploads/images/2019/10/4824ترم بندی.jpg', '', '2019-10-02 12:55:23', '2019-10-02 12:55:27', '2019-10-02 12:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `job_ads`
--

DROP TABLE IF EXISTS `job_ads`;
CREATE TABLE IF NOT EXISTS `job_ads` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `job_ads`
--

INSERT INTO `job_ads` (`id`, `title`, `image`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'job', NULL, 'eafeawfawf\r\nfewafeaw\r\naefa', '2020-01-21 13:10:54', '2020-01-21 13:11:52', NULL),
(2, 'new job2', NULL, 'jobnfewfaefwakf', '2020-01-21 13:11:05', '2020-01-21 13:11:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `question` text,
  `answer` text,
  `is_seen` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_26_084556_create_fields_table', 1),
(4, '2019_08_26_085049_create_sliders_table', 1),
(5, '2019_08_26_085356_create_questions_table', 1),
(6, '2019_08_26_085853_create_frequently_questions_table', 1),
(7, '2019_08_26_090145_create_jobs_table', 1),
(8, '2019_08_26_090615_create_field_jobs_table', 1),
(9, '2019_08_26_091037_create_advices_table', 1),
(10, '2019_08_26_093036_create_courses_table', 1),
(11, '2019_08_26_094956_create_prerequisites_table', 1),
(12, '2019_08_26_095618_create_suggests_table', 1),
(13, '2019_08_26_100227_create_workshops_table', 1),
(14, '2019_08_26_100850_create_visit_industries_table', 1),
(15, '2019_08_27_074222_create_ideas_table', 1),
(16, '2019_08_27_075123_create_utils_table', 1),
(17, '2019_08_27_151102_add_user_id_to_advices-table', 2),
(18, '2019_08_28_142525_create_course_fields_table', 3),
(19, '2019_08_28_163940_add_capacity_to_courses_table', 4),
(20, '2019_08_28_164948_add_type_to_prerequisites_table', 5),
(21, '2019_08_28_170529_add_image_to_visit_industries_table', 6),
(22, '2019_08_28_175039_create_graduates_employeds_table', 7),
(23, '2019_08_29_113753_create_startups_table', 8),
(24, '2019_08_29_114210_add_image_to_startups_table', 9),
(25, '2019_08_29_114530_add_soft_delete_to_startups_table', 10),
(26, '2019_08_29_122912_create_student_courses_table', 11),
(27, '2019_08_29_124904_create_student_workshops_table', 12),
(28, '2019_08_29_144655_create_messages_table', 13),
(29, '2019_08_29_150957_add_user_id_to_ideas_table', 14),
(30, '2019_08_31_124105_add_deadline_to_courses_table', 15),
(31, '2019_08_31_130708_add_has_certificate_to_student_courses_table', 16),
(32, '2019_08_31_134955_add_has_certificate_to_student_workshops_table', 17),
(33, '2019_09_01_154613_add_gender_to_courses_table', 18),
(34, '2019_09_02_131634_add_deadline_to_visit_industries_table', 19),
(35, '2019_09_02_132653_create_user_visits_table', 20),
(36, '2019_09_02_140941_add_capacity_to_visit_industries_table', 21),
(37, '2019_09_17_141442_create_industry_posts_table', 22),
(38, '2019_09_17_163525_create_orders_table', 23),
(39, '2019_09_17_164216_create_payments_table', 24),
(40, '2019_09_18_142803_add_hour_to_workshops_table', 25),
(41, '2019_09_18_145700_add_is_deleted_to_messages_table', 26),
(42, '2019_09_18_155404_add_duration_to_courses_table', 27),
(43, '2019_09_18_155517_add_duration_to_workshops_table', 27),
(44, '2019_09_22_180005_create_posts_table', 28),
(45, '2019_10_02_130655_create_free_courses_table', 29),
(46, '2019_10_02_132519_create_student_free_courses_table', 30),
(47, '2020_01_21_132507_create_festivals_table', 31),
(48, '2020_01_21_132755_create_student_festivals_table', 31),
(49, '2020_01_21_163038_create_job_ads_table', 32);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `orderable_id` int(11) DEFAULT NULL,
  `orderable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `paymentable_id` int(11) DEFAULT NULL,
  `paymentable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `retrival_ref_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `system_trace_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `user_id`, `paymentable_id`, `paymentable_type`, `amount`, `retrival_ref_no`, `system_trace_no`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'App\\Festival', 200, 'fewafe', 'feafe', '2020-01-21 20:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prerequisites`
--

DROP TABLE IF EXISTS `prerequisites`;
CREATE TABLE IF NOT EXISTS `prerequisites` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `requisite_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `question` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
CREATE TABLE IF NOT EXISTS `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `link`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'slide', NULL, 'uploads/images/2019/10/6224ترم بندی.jpg', '2019-10-07 06:45:36', '2019-10-07 06:45:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `startups`
--

DROP TABLE IF EXISTS `startups`;
CREATE TABLE IF NOT EXISTS `startups` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boss` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

DROP TABLE IF EXISTS `student_courses`;
CREATE TABLE IF NOT EXISTS `student_courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `has_certificate` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `student_festivals`
--

DROP TABLE IF EXISTS `student_festivals`;
CREATE TABLE IF NOT EXISTS `student_festivals` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `festival_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_festivals`
--

INSERT INTO `student_festivals` (`id`, `student_id`, `festival_id`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 'uploads/files/2020/01/14centos_network.txt', '2020-01-21 10:52:35', '2020-01-21 11:34:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_free_courses`
--

DROP TABLE IF EXISTS `student_free_courses`;
CREATE TABLE IF NOT EXISTS `student_free_courses` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `free_course_id` int(11) DEFAULT NULL,
  `has_certificate` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_free_courses`
--

INSERT INTO `student_free_courses` (`id`, `student_id`, `free_course_id`, `has_certificate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 1, 1, '2019-10-02 11:34:58', '2020-01-21 11:43:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_workshops`
--

DROP TABLE IF EXISTS `student_workshops`;
CREATE TABLE IF NOT EXISTS `student_workshops` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `workshop_id` int(11) DEFAULT NULL,
  `has_certificate` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `suggests`
--

DROP TABLE IF EXISTS `suggests`;
CREATE TABLE IF NOT EXISTS `suggests` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `title` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `is_male` tinyint(1) NOT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `student_number` varchar(255) DEFAULT NULL,
  `national_code` varchar(255) DEFAULT NULL,
  `field_id` int(11) DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `is_male`, `mobile`, `student_number`, `national_code`, `field_id`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'محسن', 'فرجامی', 1, '01234567890', '132456781', '12345678998', NULL, 'admin', 'mohsen1@gmail.com', '$2y$10$QBVusB717/Sv9g5NdsTRz.hqdQqAnkQYnWOZdNwGlpnxww7pb1F.u', NULL, '2019-08-27 09:01:45', '2019-08-27 09:01:45', NULL),
(2, 'محسن', 'فرجامی', 1, '01234567896', '132456782', '12345678998', 2, 'student', 'mohsen2@gmail.com', '$2y$10$0MVxazOFZeYgKie2jgsA2uNdS7CiicO6shakljTuvEs0IE.09xyIu', NULL, '2019-08-27 09:01:45', '2019-08-29 11:10:53', NULL),
(3, 'محسن', 'فرجامی', 1, '01234567895', '132456783', '12345678998', NULL, 'master', 'mohsen3@gmail.com', '$2y$10$mYyzu7wcYqAj./kyOcX.BeIRQSx.B5MBgOvLZCJ3ZfMGO2H4XRloe', NULL, '2019-08-27 09:01:45', '2019-09-03 08:53:30', NULL),
(4, 'محسن', 'فرجامی', 1, '01234567898', '132456784', '12345678998', NULL, 'consultant', 'mohsen4@gmail.com', '$2y$10$S6OS.HdZKOg6Flht.1K/f.9j4q1kNe91hEuGj.W2SqRBAWfKH7Dj.', NULL, '2019-08-27 09:01:45', '2019-09-04 07:46:59', NULL),
(5, 'علیرضا', 'احمدی', 1, '025878963214', NULL, '2587419632', NULL, 'master', 'alireza@gmail.com', '$2y$10$J0LzpmiP28V4JbBjUg7G5eSSM.MECNaqhJt1d6h4IWk6HRV9SFDde', NULL, '2019-09-03 07:42:22', '2020-01-22 08:31:57', NULL),
(6, 'علی', 'عادلی', 1, '0258754415', NULL, '2262322323', NULL, 'consultant', 'ali@gmail.com', '$2y$10$LWov6jkVza5O0OLI7IOJm.6GMieO2I5bjarDJuDpw.zA/4tL0PMFO', NULL, '2019-09-03 07:56:26', '2020-01-22 09:58:01', '2020-01-22 09:58:01'),
(7, 'name', 'last_name', 1, '654654564', NULL, '558584545', NULL, 'forum', 'test@test.com', '$2y$10$jJ7wpDUm0ce/WIcOjzN9HOkBCKic1InvhDwpZAp.crgN08Z3NrtZq', NULL, '2019-09-03 08:23:50', '2019-09-03 08:23:50', NULL),
(8, 'industry1', '', 1, '0123456', NULL, '', NULL, 'industry', 'industry1@gmail.com', '$2y$10$tpsGSf91ukJvmjsbHvrAz.od4SmW45CaD2B478/PSys.S17WCK/.S', NULL, '2019-09-17 09:34:52', '2019-09-17 11:20:26', NULL),
(9, 'forum1', '', 1, '0123456', NULL, '', NULL, 'forum', 'forum1@gmail.com', '$2y$10$Y04Hshg8txSV1337n8t07OGP4wKIO2FU.O7Xp42eaLPrX9mrI5sNi', NULL, '2019-09-17 09:34:52', '2019-09-17 11:09:41', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_visits`
--

DROP TABLE IF EXISTS `user_visits`;
CREATE TABLE IF NOT EXISTS `user_visits` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `visit_industry_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `utils`
--

DROP TABLE IF EXISTS `utils`;
CREATE TABLE IF NOT EXISTS `utils` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` text,
  `image` varchar(300) DEFAULT NULL,
  `file` varchar(300) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utils`
--

INSERT INTO `utils` (`id`, `key`, `title`, `description`, `image`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'skill-free-courses', NULL, 'fefe', 'uploads/images/2019/10/5624ترم بندی.jpg', NULL, '2019-10-02 10:25:53', '2019-10-02 10:25:53', NULL),
(2, 'gathering-industry-invite', NULL, 'fefeffefawf', 'uploads/images/2019/10/9824ترم بندی.jpg', NULL, '2019-10-02 12:51:46', '2019-10-02 12:55:11', NULL),
(3, 'idea-festivals', NULL, 'fefefvedaewfae', 'uploads/images/2020/01/68IMG_20191109_172631_995.jpg', NULL, '2020-01-21 12:02:01', '2020-01-21 12:04:25', NULL),
(4, 'academic-guidance-job-adds', NULL, 'feafeaw', 'uploads/images/2020/01/3824ترم بندی.jpg', NULL, '2020-01-21 13:21:37', '2020-01-21 13:21:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `visit_industries`
--

DROP TABLE IF EXISTS `visit_industries`;
CREATE TABLE IF NOT EXISTS `visit_industries` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `time_place` text,
  `deadline` date DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

DROP TABLE IF EXISTS `workshops`;
CREATE TABLE IF NOT EXISTS `workshops` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL,
  `master_id` int(11) DEFAULT NULL,
  `time` date DEFAULT NULL,
  `hour` varchar(255) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `deadline` date DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
