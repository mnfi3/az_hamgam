-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 04, 2019 at 08:00 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advices`
--

INSERT INTO `advices` (`id`, `user_id`, `title`, `question`, `answer`, `adviser_id`, `is_seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'جدید1', 'this is a text', 'this answer from admin', 0, 1, '2019-08-27 10:52:00', '2019-09-01 10:00:47', NULL),
(2, 2, 'جدید2', 'matne soale moshavere', 'this is consultant answer to user', 4, 1, '2019-08-27 10:52:00', '2019-09-04 07:41:51', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `title`, `description`, `image`, `master_id`, `time`, `term`, `price`, `capacity`, `gender`, `deadline`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'آموزش Solid Work 1', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/suggest.jpg', '3', 'شنبه ها ساعت 15', 1, 0, 10, 'female', '2019-09-26', NULL, NULL, NULL),
(2, 'آموزش Solid Work 2', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/suggest.jpg', '3', 'شنبه ها ساعت 14', 2, 0, 20, 'mixed', '2019-08-31', NULL, NULL, NULL),
(3, 'آموزش Solid Work 3', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/suggest.jpg', '3', 'شنبه ها ساعت 12', 3, 0, 2, 'male', '2019-08-31', NULL, '2019-09-01 10:50:08', NULL),
(4, '1new course', '1this is a test course', 'uploads/images/2019/09/25change.jpg', '3', 'sundays at 1', 2, 0, 11, 'mixed', '2019-09-01', '2019-09-01 11:37:37', '2019-09-01 12:27:54', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_fields`
--

INSERT INTO `course_fields` (`id`, `course_id`, `field_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, NULL, NULL, NULL),
(2, 2, 2, NULL, NULL, NULL),
(3, 3, 2, NULL, NULL, NULL),
(4, 4, 3, '2019-09-01 11:37:37', '2019-09-01 11:37:37', NULL),
(5, 4, 1, '2019-09-01 11:37:37', '2019-09-01 11:37:37', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'it', '2019-08-26 19:30:00', '2019-08-26 19:30:00', NULL),
(2, 'mechanic', '2019-08-25 19:30:00', NULL, NULL),
(3, 'electronic', '2019-08-26 19:30:00', '2019-08-26 19:30:00', NULL),
(4, 'psychology', NULL, NULL, NULL),
(5, 'software', '2019-09-01 08:40:54', '2019-09-01 08:40:54', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `field_jobs`
--

INSERT INTO `field_jobs` (`id`, `field_id`, `job_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, NULL),
(2, 1, 2, NULL, NULL, NULL),
(3, 2, 3, NULL, NULL, NULL),
(4, 2, 4, NULL, NULL, NULL),
(5, 3, 5, NULL, NULL, NULL),
(6, 5, 6, '2019-09-01 08:52:26', '2019-09-01 08:52:26', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `frequently_questions`
--

INSERT INTO `frequently_questions` (`id`, `question`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'سامانه همگام چگونه فعالیت می کند؟1', ' لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.', NULL, NULL, NULL),
(2, 'چگونه ایده های خود را مطرح کنیم؟1', ' لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.', NULL, NULL, NULL),
(3, 'چه دوره هایی در این سامانه ارائه می شود؟1', ' لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.', NULL, NULL, NULL),
(4, 'سامانه همگام چگونه فعالیت می کند؟', ' لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.', NULL, NULL, NULL),
(5, 'چگونه ایده های خود را مطرح کنیم؟', ' لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.', NULL, NULL, NULL),
(6, 'چه دوره هایی در این سامانه ارائه می شود؟', ' لورم ایپسوم یا طرح‌نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی‌معنی در صنعت چاپ، صفحه‌آرایی و طراحی گرافیک گفته می‌شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد.', NULL, NULL, NULL),
(7, 'test question', 'test answer', '2019-08-31 11:16:51', '2019-08-31 11:17:01', '2019-08-31 11:17:01');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `graduates_employeds`
--

INSERT INTO `graduates_employeds` (`id`, `name`, `image`, `description`, `job`, `field`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'محسن فرجامی', '/img/startup.jpg', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', 'برنامه نویس', 'فناوری اطلاعات', NULL, NULL, NULL),
(2, 'محسن فرجامی', '/img/startup.jpg', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', 'برنامه نویس', 'فناوری اطلاعات', NULL, NULL, NULL),
(3, 'محسن فرجامی', '/img/startup.jpg', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', 'برنامه نویس', 'فناوری اطلاعات', NULL, '2019-09-02 10:39:44', NULL),
(4, 'mohsen farjami', 'uploads/images/2019/09/83change.jpg', 'this is a programmer sample', 'programmer', 'information technology', '2019-09-02 10:44:48', '2019-09-02 10:44:48', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ideas`
--

INSERT INTO `ideas` (`id`, `user_id`, `title`, `file`, `answer`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'new idea', 'uploads/files/2019/08/15SQLQuery1.sql', 'was good idea', '2019-08-29 10:54:57', '2019-08-29 10:54:57', NULL),
(2, 2, 'new idea', 'uploads/files/2019/08/15SQLQuery1.sql', 'answer to idea', '2019-08-29 10:54:57', '2019-09-02 10:11:56', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'برنامه نویسی', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/programing.jpg', NULL, NULL, NULL),
(2, '2برنامه نویسی', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/programing.jpg', NULL, NULL, NULL),
(3, '3برنامه نویسی', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/programing.jpg', NULL, NULL, NULL),
(4, '4برنامه نویسی', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/programing.jpg', NULL, NULL, NULL),
(5, '5برنامه نویسی', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/programing.jpg', NULL, NULL, NULL),
(6, 'new job', 'new job description', 'uploads/images/2019/09/60job.jpg', '2019-09-01 08:37:53', '2019-09-01 08:37:53', NULL);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `question`, `answer`, `is_seen`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'mohsen', 'mohsen2@gmail.com', 'this is a question', 'this is a answer', 1, NULL, NULL, NULL),
(2, 2, 'محسن فرجامی', 'mohsen2@gmail.com', 'hello from user', '', 0, '2019-08-29 10:35:27', '2019-08-29 10:35:27', NULL),
(3, 2, 'محسن فرجامی', 'mohsen2@gmail.com', 'fefef', 'hello', 0, '2019-08-29 10:38:08', '2019-08-31 12:32:01', NULL),
(4, NULL, 'user quest', 'email', 'this is a  message', NULL, NULL, '2019-08-31 11:58:43', '2019-08-31 11:58:43', NULL),
(5, NULL, 'user name2', 'user@user.com', 'user mess', NULL, NULL, '2019-08-31 12:37:54', '2019-08-31 12:37:54', NULL),
(6, NULL, 'mess', 'mess@mee.com', 'msg', NULL, NULL, '2019-08-31 12:38:40', '2019-08-31 12:38:40', NULL),
(7, 2, 'fefefe', 'fefef@fefefe.com', 'jfelkfjekljfkejoif', NULL, NULL, '2019-08-31 12:39:19', '2019-08-31 12:39:19', NULL),
(8, 3, 'محسن فرجامی', 'mohsen3@gmail.com', 'شبتیشبتثخه', 'hello from admin to master', 0, '2019-09-03 09:03:37', '2019-09-03 09:08:16', NULL),
(9, 4, 'محسن فرجامی', 'mohsen3@gmail.com', 'شبتیشبتثخه', 'hello from admin to master', 0, '2019-09-03 09:03:37', '2019-09-03 09:08:16', NULL),
(10, 4, 'fefefe', 'fefef@fefefe.com', 'jfelkfjekljfkejoif', NULL, NULL, '2019-08-31 12:39:19', '2019-08-31 12:39:19', NULL),
(11, 4, 'محسن فرجامی', 'mohsen4@gmail.com', 'test', NULL, NULL, '2019-09-04 07:58:16', '2019-09-04 07:58:16', NULL),
(12, 4, 'محسن فرجامی', 'mohsen4@gmail.com', 'hello to admin', NULL, NULL, '2019-09-04 07:58:55', '2019-09-04 07:58:55', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(36, '2019_09_02_140941_add_capacity_to_visit_industries_table', 21);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prerequisites`
--

INSERT INTO `prerequisites` (`id`, `course_id`, `requisite_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, NULL, NULL, NULL),
(2, 3, 2, NULL, NULL, NULL),
(3, 3, 1, NULL, NULL, NULL),
(5, 4, 2, '2019-09-01 11:37:37', '2019-09-01 11:37:37', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `link`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'test1', 'https://google.com', 'https://mdbootstrap.com/img/Photos/Slides/img%20(68).jpg', '2019-08-26 19:30:00', '2019-08-31 10:16:53', NULL),
(2, 'test2', NULL, 'https://mdbootstrap.com/img/Photos/Slides/img%20(6).jpg', '2019-08-26 19:30:00', '2019-08-26 19:30:00', NULL),
(3, 'test3', 'http://azaruniv.ac.ir', 'https://mdbootstrap.com/img/Photos/Slides/img%20(9).jpg', '2019-08-26 19:30:00', '2019-08-26 19:30:00', NULL),
(4, 'fefe', 'description', 'uploads/images/2019/08/89lifeMo-logo-png-web.png', '2019-08-31 10:22:21', '2019-08-31 10:22:21', '2019-08-02 19:30:00');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `startups`
--

INSERT INTO `startups` (`id`, `title`, `description`, `image`, `field`, `place`, `boss`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'گروه نوآوران برتر', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/startup.jpg', 'اینترنت اشیا', 'مرکز نوآوری دانشگاه', 'مهدی مهدوی کیا', NULL, NULL, NULL),
(2, 'گروه نوآوران برتر', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/startup.jpg', 'اینترنت اشیا', 'مرکز نوآوری دانشگاه', 'مهدی مهدوی کیا', NULL, NULL, NULL),
(3, 'گروه نوآوران برتر', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/startup.jpg', 'اینترنت اشیا', 'مرکز نوآوری دانشگاه', 'مهدی مهدوی کیا', NULL, NULL, NULL),
(4, 'گروه نوآوران برتر', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/startup.jpg', 'اینترنت اشیا', 'مرکز نوآوری دانشگاه', 'مهدی مهدوی کیا', NULL, NULL, NULL),
(5, 'ezitehch', 'description', 'uploads/images/2019/09/43workshop.png', 'programming', 'roshd', 'mohsen', '2019-09-02 11:09:32', '2019-09-02 11:09:32', NULL),
(6, 'startup2', 'desc', 'uploads/images/2019/09/43workshop.png', 'programming', 'roshd', 'mohsen', '2019-09-02 11:11:01', '2019-09-02 11:14:07', '2019-09-02 11:14:07');

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`id`, `student_id`, `course_id`, `has_certificate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 3, 1, 0, '2019-08-31 09:56:32', '2019-09-01 12:52:41', NULL),
(4, 2, 1, 1, '2019-08-31 09:56:32', '2019-09-01 12:52:38', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_workshops`
--

INSERT INTO `student_workshops` (`id`, `student_id`, `workshop_id`, `has_certificate`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 1, NULL, '2019-09-02 08:31:15', NULL),
(4, 2, 2, 0, '2019-08-31 09:35:44', '2019-08-31 09:35:44', NULL),
(5, 3, 1, 0, NULL, '2019-09-02 08:29:41', NULL),
(6, 4, 1, 0, NULL, '2019-09-02 08:29:44', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `suggests`
--

INSERT INTO `suggests` (`id`, `user_id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'feffefef', '2019-08-28 11:34:05', '2019-08-28 11:34:05', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `is_male`, `mobile`, `student_number`, `national_code`, `field_id`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'محسن', 'فرجامی', 1, '01234567890', '132456781', '12345678998', NULL, 'admin', 'mohsen1@gmail.com', '$2y$10$QBVusB717/Sv9g5NdsTRz.hqdQqAnkQYnWOZdNwGlpnxww7pb1F.u', NULL, '2019-08-27 09:01:45', '2019-08-27 09:01:45', NULL),
(2, 'محسن', 'فرجامی', 1, '01234567896', '132456782', '12345678998', 2, 'student', 'mohsen2@gmail.com', '$2y$10$0MVxazOFZeYgKie2jgsA2uNdS7CiicO6shakljTuvEs0IE.09xyIu', NULL, '2019-08-27 09:01:45', '2019-08-29 11:10:53', NULL),
(3, 'محسن', 'فرجامی', 1, '01234567895', '132456783', '12345678998', NULL, 'master', 'mohsen3@gmail.com', '$2y$10$mYyzu7wcYqAj./kyOcX.BeIRQSx.B5MBgOvLZCJ3ZfMGO2H4XRloe', NULL, '2019-08-27 09:01:45', '2019-09-03 08:53:30', NULL),
(4, 'محسن', 'فرجامی', 1, '01234567898', '132456784', '12345678998', NULL, 'consultant', 'mohsen4@gmail.com', '$2y$10$S6OS.HdZKOg6Flht.1K/f.9j4q1kNe91hEuGj.W2SqRBAWfKH7Dj.', NULL, '2019-08-27 09:01:45', '2019-09-04 07:46:59', NULL),
(5, 'علیرضا', 'احمدی', 1, '025878963214', NULL, '2587419632', NULL, 'master', 'alireza@gmail.com', '$2y$10$J0LzpmiP28V4JbBjUg7G5eSSM.MECNaqhJt1d6h4IWk6HRV9SFDde', NULL, '2019-09-03 07:42:22', '2019-09-03 07:42:22', NULL),
(6, 'علی', 'عادلی', 1, '0258754415', NULL, '2262322323', NULL, 'consultant', 'ali@gmail.com', '$2y$10$LWov6jkVza5O0OLI7IOJm.6GMieO2I5bjarDJuDpw.zA/4tL0PMFO', NULL, '2019-09-03 07:56:26', '2019-09-03 07:56:26', NULL),
(7, 'name', 'last_name', 1, '654654564', NULL, '558584545', NULL, 'forum', 'test@test.com', '$2y$10$jJ7wpDUm0ce/WIcOjzN9HOkBCKic1InvhDwpZAp.crgN08Z3NrtZq', NULL, '2019-09-03 08:23:50', '2019-09-03 08:23:50', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_visits`
--

INSERT INTO `user_visits` (`id`, `user_id`, `visit_industry_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, NULL, NULL, NULL),
(2, 1, 2, '2019-09-02 09:45:12', '2019-09-02 09:45:12', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utils`
--

INSERT INTO `utils` (`id`, `key`, `title`, `description`, `image`, `file`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'academic-guidance', '', 'section guidance', NULL, '/uploads/files/file.zip', '2019-08-26 19:30:00', '2019-09-01 07:57:35', NULL),
(4, 'academic-guidance-purpose', '', '<p><em><strong>سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید</strong></em></p>', 'uploads/images/2019/09/94purpose.jpg', 'uploads/files/2019/09/57SQLQuery1.zip', '2019-08-26 19:30:00', '2019-09-01 08:11:18', NULL),
(6, 'academic-guidance-change-field', '', '<p>سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید.</p>', 'uploads/images/2019/09/60change.jpg', 'uploads/files/2019/09/26SQLQuery1.zip', '2019-08-26 19:30:00', '2019-09-01 10:12:54', NULL),
(14, 'academic-guidance-consult', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', 'uploads/images/2019/09/13consultation.jpg', '/uploads/files/file.zip', '2019-08-26 19:30:00', '2019-09-01 09:37:26', NULL),
(10, 'skill', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', NULL, NULL, '2019-08-26 19:30:00', '2019-09-01 10:39:45', NULL),
(11, 'skill-term', '', 'termination', 'uploads/images/2019/09/82termination.jpg', 'uploads/files/2019/09/65SQLQuery1.zip', '2019-08-26 19:30:00', '2019-09-01 13:17:57', NULL),
(12, 'skill-courses', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', 'uploads/images/2019/09/14training.jpg', NULL, '2019-08-26 19:30:00', '2019-09-01 10:57:05', NULL),
(13, 'skill-suggest', '', 'kjekgjejkg', 'uploads/images/2019/09/65suggest.jpg', NULL, '2019-08-26 19:30:00', '2019-09-01 13:09:43', NULL),
(15, 'academic-guidance-jobs', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', 'uploads/images/2019/09/97job.jpg', '/uploads/files/file.zip', '2019-08-26 19:30:00', '2019-09-01 08:28:02', NULL),
(16, 'gathering', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', '', '', '2019-08-26 19:30:00', '2019-09-02 07:17:54', NULL),
(17, 'gathering-industry-invite', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', '/img/invite.jpg', '', '2019-08-26 19:30:00', '2019-08-27 19:30:00', NULL),
(18, 'gathering-industry-visit', '', '111111111111سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', 'uploads/images/2019/09/94industry.jpg', '', '2019-08-26 19:30:00', '2019-09-02 08:43:03', NULL),
(19, 'gathering-workshop', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', 'uploads/images/2019/09/62workshop.png', '', '2019-08-26 19:30:00', '2019-09-02 07:29:33', NULL),
(20, 'idea', '', '111سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', '', '', '2019-08-26 19:30:00', '2019-09-02 09:52:41', NULL),
(21, 'idea-support', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', 'uploads/images/2019/09/98idea.jpg', '/uploads/files/file.zip', '2019-08-26 19:30:00', '2019-09-02 10:06:34', NULL),
(22, 'idea-startup', '', '<p><span style=\"color:#7f8c8d\">سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید</span></p>', 'uploads/images/2019/09/53group.png', '/uploads/files/file.zip', '2019-08-26 19:30:00', '2019-09-02 10:20:51', NULL),
(23, 'success', '', '11111سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', '', '', '2019-08-26 19:30:00', '2019-09-02 10:28:51', NULL),
(24, 'success-startup', '', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', '/img/startup.jpg', '/uploads/files/file.zip', '2019-08-26 19:30:00', '2019-08-27 19:30:00', NULL),
(25, 'success-graduation', '', '1111سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید. سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد. یکی از مهمترین اهداف این سامانه را می توان مدیریت متمرکز کارآموزان در طول دوره کارآموزی به منظور ارتباط فعال صنعت و دانشگاه جهت شناسایی و حل مسائل موجود در صنایع بیان نمود. دانشگاه صنعتی امیرکبیر مفتخر است که با امید به خدا، تعهد اساتید، توجه صنایع و تلاش کارآموزان، مهندسین کارآزموده ای برای این مرزوبوم تربیت نماید', 'uploads/images/2019/09/12graduation.jpg', '/uploads/files/file.zip', '2019-08-26 19:30:00', '2019-09-02 10:36:54', NULL),
(26, 'about', NULL, '<p>لورم ایپسوم یا طرح&zwnj;نما (به انگلیسی: Lorem ipsum) به متنی آزمایشی و بی&zwnj;معنی در صنعت چاپ، صفحه&zwnj;آرایی و طراحی گرافیک گفته می&zwnj;شود. طراح گرافیک از این متن به عنوان عنصری از ترکیب بندی برای پر کردن صفحه و ارایه اولیه شکل ظاهری و کلی طرح سفارش گرفته شده استفاده می نماید، تا از نظر گرافیکی نشانگر چگونگی نوع و اندازه فونت و ظاهر متن باشد</p>', NULL, NULL, '2019-08-31 10:32:58', '2019-08-31 10:32:58', NULL),
(27, 'phone', NULL, '8888778787', NULL, NULL, '2019-08-31 11:34:35', '2019-08-31 11:34:35', NULL),
(28, 'address', NULL, 'تبریز - کیلومتر 35 جاده تبریز مراغه - دانشگاه شهید مدنی اذربایجان ', NULL, NULL, '2019-08-31 11:34:35', '2019-08-31 11:34:35', NULL),
(29, 'email', NULL, 'email@email.com', NULL, NULL, '2019-08-31 11:34:35', '2019-08-31 11:34:35', NULL),
(30, 'link1', 'title1', 'https://google.com', NULL, NULL, '2019-08-31 11:34:35', '2019-08-31 11:34:35', NULL),
(31, 'link2', 'title2', 'https://google.com', NULL, NULL, '2019-08-31 11:34:35', '2019-08-31 11:34:35', NULL),
(32, 'link3', 'title3', 'https://google.com', NULL, NULL, '2019-08-31 11:34:35', '2019-08-31 11:34:35', NULL),
(33, 'link4', '1title4', 'https://google.com', NULL, NULL, '2019-08-31 11:34:35', '2019-08-31 11:37:34', NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `visit_industries`
--

INSERT INTO `visit_industries` (`id`, `title`, `description`, `image`, `time_place`, `deadline`, `capacity`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'بازدید از شرکت پالاز', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/industry.jpg', 'شنبه ساعت 11، روبروی علوم پایه', '2019-09-05', 10, NULL, '2019-09-02 09:46:07', NULL),
(2, '2بازدید از شرکت پالاز', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مابین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/industry.jpg', 'شنبه ساعت 11، روبروی علوم پایه', '2019-09-05', 20, NULL, '2019-09-02 08:43:31', NULL),
(3, 'new visit1', 'description1', 'uploads/images/2019/09/51industry.jpg', 'shirin asal1', '2019-09-05', 12, '2019-09-02 08:53:34', '2019-09-02 09:21:21', NULL);

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
  `capacity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT '0',
  `deadline` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `workshops`
--

INSERT INTO `workshops` (`id`, `title`, `description`, `image`, `master_id`, `time`, `capacity`, `price`, `deadline`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'بازاریابی دیجیتال', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/workshop.png', 3, '2019-08-28', 50, 0, '2019-08-31', NULL, NULL, NULL),
(2, 'برنامه نویسی', 'سامانه همگام به منظور برقراری ارتباط فعال و سازنده مین دانشجویان، اساتید و صنایع در شهریور ماه 1398 راه اندازی شد.', '/img/workshop.png', 3, '2019-08-28', 50, 0, '2019-08-31', NULL, '2019-09-02 07:29:44', NULL),
(3, 'new workhsop11', '111description', 'uploads/images/2019/09/69workshop.png', 3, '2019-09-04', 10, 0, '2019-09-04', '2019-09-02 07:45:46', '2019-09-02 08:15:48', NULL),
(4, 'programming', 'fefefaefe', 'uploads/images/2019/09/70workshop.png', 3, '2019-09-02', 10, 0, '2019-09-02', '2019-09-02 07:49:54', '2019-09-02 07:49:54', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
