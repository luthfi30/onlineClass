-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2022 at 09:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlineclass`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `thumbnail`, `created_at`, `updated_at`) VALUES
(1, 'Web Development', 'web-development', NULL, '2021-06-02 21:56:36', '2021-06-02 21:56:36'),
(2, 'Mobile Development', 'mobile-development', NULL, '2021-06-03 06:21:20', '2021-06-03 06:21:20'),
(4, 'Database', 'database', NULL, '2022-01-09 02:10:27', '2022-01-09 02:10:27');

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mycourse_id` bigint(20) UNSIGNED DEFAULT NULL,
  `link_project` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','success') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `username`, `email`, `mycourse_id`, `link_project`, `image1`, `description`, `status`, `created_at`, `updated_at`) VALUES
(19, 'alex', 'student@gmail.com', 242, 'https://luthfi30.github.io/', '1628304710_p2.png', 'Personal Portofolio website', 'success', '2021-08-06 15:47:35', '2022-01-16 22:59:41'),
(20, 'hilmy', 'hilmy@gmail.com', 256, 'https://github.com/LaravelDaily/QuickLMS', '\"1642393408_1-4.png\"', NULL, 'success', '2022-01-16 21:23:28', '2022-02-03 00:18:19');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `course_id`, `created_at`, `updated_at`) VALUES
(1, 'Persiapan', 1, '2021-06-02 21:59:36', '2021-06-02 21:59:36'),
(2, 'Merancang Database', 1, NULL, NULL),
(4, 'Tahap Backend', 1, '2021-06-05 17:25:00', '2021-06-05 17:25:00'),
(7, 'Persiapan node', 10, '2021-12-12 20:59:50', '2021-12-12 22:39:46'),
(8, 'Tahapan Crud', 10, '2021-12-14 21:03:45', '2021-12-14 21:03:45'),
(9, 'Database Introduction', 20, '2022-01-09 02:18:37', '2022-01-09 02:18:37'),
(10, 'Database Query', 20, '2022-01-09 02:22:36', '2022-01-09 02:22:36'),
(11, 'Mengenal Query Join', 20, '2022-01-09 02:36:30', '2022-01-09 02:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(20) NOT NULL,
  `konten` longtext NOT NULL,
  `user_id` int(20) NOT NULL,
  `forum_id` int(20) NOT NULL,
  `parent` int(20) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `konten`, `user_id`, `forum_id`, `parent`, `created_at`, `updated_at`) VALUES
(2, 'test', 7, 1, 0, '2021-12-21 02:13:22', '2021-12-21 02:13:22'),
(3, 'adas', 7, 1, 0, '2021-12-21 02:19:34', '2021-12-21 02:19:34'),
(4, 'gimana bos', 7, 1, 3, '2021-12-21 02:36:26', '2021-12-21 02:36:26'),
(5, 'asdfca', 7, 4, 0, '2021-12-21 04:38:04', '2021-12-21 04:38:04'),
(6, 'bagaimana cara passing data ke view', 3, 6, 0, '2021-12-21 04:45:17', '2021-12-21 04:45:17'),
(7, 'maksudnya ?', 3, 4, 5, '2021-12-21 04:59:59', '2021-12-21 04:59:59'),
(8, 'lagi test komen', 7, 4, 5, '2021-12-21 05:05:03', '2021-12-21 05:05:03'),
(9, 'gimana cara filter data by date ?', 3, 4, 0, '2021-12-28 07:55:39', '2021-12-28 07:55:39'),
(10, 'oh...', 3, 4, 5, '2021-12-28 08:00:27', '2021-12-28 08:00:27'),
(11, '?', 3, 4, 9, '2021-12-28 22:57:15', '2021-12-28 22:57:15'),
(16, 'bagaimana sudah bisa ?', 7, 4, 9, '2022-01-08 01:16:47', '2022-01-08 01:16:47'),
(19, 'adasdasd', 7, 4, 9, '2022-01-13 02:23:57', '2022-01-13 02:23:57'),
(20, 'asdasda', 7, 13, 0, '2022-01-13 03:37:15', '2022-01-13 03:37:15'),
(21, 'test', 24, 14, 0, '2022-01-13 08:10:15', '2022-01-13 08:10:15'),
(22, 'test', 28, 14, 0, '2022-01-16 15:34:58', '2022-01-16 15:34:58'),
(23, 'test', 29, 15, 0, '2022-01-16 21:22:18', '2022-01-16 21:22:18'),
(24, 'dengan menambahkan controller yang menghubungkan ke view', 7, 7, 0, '2022-02-25 19:33:57', '2022-02-25 19:33:57'),
(25, 'dengan membuat controller untuk mengupload gambar', 7, 13, 0, '2022-02-25 19:45:00', '2022-02-25 19:45:00'),
(26, '<span style=\"color: #8a909d; font-family: Roboto, sans-serif; font-size: 15.68px; background-color: #ffffff;\">dengan membuat controller untuk mengupload gambar</span>', 7, 13, 0, '2022-02-25 19:51:26', '2022-02-25 19:51:26'),
(27, 'dengan membuat controller upload gambar', 7, 13, 0, '2022-02-25 19:51:50', '2022-02-25 19:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mentor_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('beginner','intermediate','advance','') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `materi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('free','premium') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('draft','published') COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT 0,
  `about` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `mentor_id`, `category_id`, `title`, `level`, `thumbnail`, `materi`, `type`, `status`, `price`, `about`, `description`, `created_at`, `updated_at`) VALUES
(1, 7, 1, 'Membuat Aplikasi Online Class Dengan Laravel 7', 'beginner', '1622727987_image-37.png', '20211228073618.zip', 'premium', 'published', 450000, 'In this course, you will learn laravel 7 Core Functionalities, Laravel 7 CRUD and Default Authentication System.', '<div>\r\n<div style=\"box-sizing: border-box; margin: 0px; padding: 0px; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; font-size: 16px; background-color: #ffffff;\" data-purpose=\"safely-set-inner-html:course-taking:course-description\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold;\">Laravel 8 Framework Course on Udemy.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">Laravel is an open-source PHP framework, which is robust and easy to understand. It follows a model-view-controller design pattern. Laravel reuses the existing components of different frameworks which helps in creating a web application. The web application thus designed is more structured and pragmatic.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold;\">Why We Should Learn Laravel?</span></p>\r\n<ul style=\"box-sizing: border-box; margin: 0.8rem 0px 10.5px 2.4rem; padding: 0px 0px 0px 2.4rem; list-style: none; font-size: inherit; max-width: 60rem;\">\r\n<li style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">Laravel is a first development life cycle and less code functionality</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">it\'s easy to learn</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">making web applications faster</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">configuration error and exception handling</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">automation testing work.</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">URL Routing Configuration is very high in Laravel.</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">Scheduling tasks configuration and management</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">It has a huge community</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">Unlimited resource.</p>\r\n</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">Most importantly it\'s very easy to get a job if you have Laravel skills.</p>\r\n</li>\r\n</ul>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold;\">This course you will not just learn you actually doing it. Learn and apply this on a live project with me.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold;\">Sound Great right?</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">&nbsp;---------------------------------------------------------------------------------------------------------------------</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold;\">Click the \"Enroll Now\" button at the top right now!</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\">I am excited to&nbsp;see you in this course!</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold;\">Sincerely,</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: inherit; max-width: 60rem;\"><span style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-weight: bold;\">Kazi Ariyan</span></p>\r\n</div>\r\n<div class=\"course-overview--course-description-sets--LhVPO\" style=\"box-sizing: border-box; margin: 2.4rem 0px 0px; padding: 0px; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; font-size: 16px; background-color: #ffffff;\">\r\n<h4 class=\"udlite-heading-sm\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; line-height: 1.2; color: inherit; font-size: 1.4rem; max-width: 60rem; font-family: \'sf pro display\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; letter-spacing: -0.02rem;\">What you&rsquo;ll learn</h4>\r\n<ul style=\"box-sizing: border-box; margin: 0px 0px 10.5px 2.4rem; padding: 0px 0px 0px 2.4rem; list-style: none; font-size: inherit; max-width: 60rem;\">\r\n<li style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">Laravel 6 Fundamental</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">Laravel 6 CRUD Functions</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">How to insert Data in Database</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">How to Read Data From Database</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">How to Update Data in Database</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">How to Delete Data From the Database</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">Laravel 6 Default Authentication System</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">How to Set Up Reset Password Option</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">How to Create Change Password Option</li>\r\n</ul>\r\n<h4 class=\"udlite-heading-sm\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; line-height: 1.2; color: inherit; font-size: 1.4rem; max-width: 60rem; font-family: \'sf pro display\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; letter-spacing: -0.02rem;\">Are there any course requirements or prerequisites?</h4>\r\n<ul style=\"box-sizing: border-box; margin: 0px 0px 10.5px 2.4rem; padding: 0px 0px 0px 2.4rem; list-style: none; font-size: inherit; max-width: 60rem;\">\r\n<li style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">OOP (Basic)</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">Basic HTML, CSS, Bootstrap</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">Local Server : Xampp/Wampp/Vertrigo/Mamp</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">Text Editor/IDE: Sublime Text, Visual Studio Code, Netbeans, PHPStrom, Atom etc</li>\r\n</ul>\r\n<h4 class=\"udlite-heading-sm\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; line-height: 1.2; color: inherit; font-size: 1.4rem; max-width: 60rem; font-family: \'sf pro display\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; letter-spacing: -0.02rem;\">Who this course is for:</h4>\r\n<ul style=\"box-sizing: border-box; margin: 0px 0px 10.5px 2.4rem; padding: 0px 0px 0px 2.4rem; list-style: none; font-size: inherit; max-width: 60rem;\">\r\n<li style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">This course only for Beginner</li>\r\n<li style=\"box-sizing: border-box; margin: 0.4rem 0px 0px; padding: 0px 0px 0px 0.8rem; list-style: disc;\">Who are not familiar with Laravel 8</li>\r\n</ul>\r\n</div>\r\n</div>', '2021-06-02 21:59:17', '2022-01-13 02:39:01'),
(10, 7, 1, 'Learn and Understand NodeJS', 'beginner', '1639366771_68747470733a2f2f7777772e68696b6b692e69642f6173736574732f696d672f61626f75742f6e6f64656a735f706963742e706e67.png', '20211228073618.zip', 'premium', 'published', 150000, 'Dive deep under the hood of NodeJS. Learn V8, Express, the MEAN stack, core Javascript concepts, and more.', '<div style=\"text-align: justify;\"><span style=\"font-size: 24pt; font-family: arial, helvetica, sans-serif; color: #000000;\"><strong>Requirements</strong></span></div>\r\n<div style=\"text-align: justify;\">\r\n<ul>\r\n<li>\r\n<p style=\"line-height: 2;\"><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif; color: #000000;\">Basic Javascript knowladge (variables, loops, basic functions)</span></p>\r\n</li>\r\n<li style=\"line-height: 2;\">\r\n<p><span style=\"font-family: arial, helvetica, sans-serif; color: #000000;\">Basic Html<span style=\"font-size: 12pt;\"> </span>knowladge</span></p>\r\n</li>\r\n<li style=\"line-height: 2;\">\r\n<p><span style=\"font-size: 12pt; font-family: arial, helvetica, sans-serif; color: #000000;\">A text editor</span></p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class=\"udlite-heading-xl styles--description__header--3SNsO\" style=\"box-sizing: border-box; margin: 0px 0px 1.6rem; padding: 0px; font-size: 2.4rem; max-width: 118.4rem; font-family: \'sf pro display\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2; letter-spacing: -0.02rem; color: #1c1d1f; text-align: justify;\"><span style=\"font-family: arial, helvetica, sans-serif;\"><strong><span style=\"font-size: 24pt;\">Description</span></strong></span></div>\r\n<div style=\"box-sizing: border-box; margin: 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 2;\"><span style=\"font-family: arial, helvetica, sans-serif;\">NodeJS is a rapidy growing web server technology, and Node developers are among the highest paid in the industry. Knowing NodeJS well will get you a job or improve your current one by enabling you to build high quality, robust web applications.&nbsp;In this course you will gain a deep understanding of Node, learn how NodeJS works under the hood, and how that knowledge helps you avoid common pitfalls and&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">drastically improve your ability to debug problems</em>.In this course we\'ll look at&nbsp;<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">how the C++ written V8 Javascript engine works and how NodeJS uses it to expand the abilities of Javascript</strong>. You\'ll learn how to structure your code for reuse and to be easier to understand, manage, and expand using&nbsp;<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">modules and understand how modules really work</strong>. You\'ll learn <strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">how asynchronous code works in Node and the Node event loop</strong>, as well as how to use the&nbsp;<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">event emitter, streams, buffers, pipes, and work with files</strong>. We\'ll see how that leads to&nbsp;<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">building a web server in Node</strong>.We\'ll dive into<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">&nbsp;web sites, web apps and APIs with Express</strong>&nbsp;and learn how Express can save us time as Node developers.You\'ll also gain an understanding of&nbsp;<strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">npm, connecting to databases, and the MEAN stack</strong>! During it all you\'ll gain a deep understanding of the Javascript concepts and other computer science concepts that power Node.NodeJS doesn\'t have to be hard to learn. The biggest mistake most coding tutorials make is expecting someone to learn simply by imitating others\' code. Real world situations are never exactly like the tutorial.&nbsp;I believe the best way to learn is to understand how a tool works and what it does for you, look at examples, and then try it yourself. That\'s how this course is built, with the goal to help you both learn and understand NodeJS.&nbsp;<em style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">Note: In this course you\'ll also get&nbsp;</em><strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\"><em style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">downloadable source code</em></strong><em style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">. You will often be provided with \'starter\' code, giving you the base for you to start writing your code, and \'finished\' code to compare your code to.<br /><br /><br /><br /><br /></em></span></div>', '2021-12-12 20:39:31', '2021-12-12 21:59:01'),
(20, 1, 4, 'Database Mysql', 'beginner', '1641719875_1-4.png', '20211228073618.zip', 'free', 'published', 0, 'Belajar MySQL untuk pemula sampai mahir. Di kelas ini kita akan belajar MySQL dari mulai awal sekali, sehingga cocok untuk pemula.', '<h3><span style=\"font-size: 18pt;\">Requirements</span></h3>\r\n<span style=\"font-size: 12pt;\">A PC (Windows or Linux) or Mac is required</span><br />\r\n<p><span style=\"font-size: 12pt;\">No prior knowledge of Databases, SQL or MySQL is needed.</span></p>\r\n<p class=\"udlite-heading-xl styles--description__header--3SNsO\" style=\"box-sizing: border-box; margin: 0px 0px 1.6rem; padding: 0px; font-size: 2.4rem; max-width: 118.4rem; font-family: \'sf pro display\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1; letter-spacing: -0.02rem; color: #1c1d1f;\"><span style=\"font-size: 18pt;\"><strong>Description</strong><br /><span style=\"font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; font-size: 14px;\">Have you heard that database skills are essential for developers to be skilled in and understand?<br /></span></span><span style=\"font-size: 12pt;\">Are you wanting to understand SQL and databases in general, but don\'t know where to start?</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Maybe you have a pressing need to learn about Database Design and/or Data Analysis but have not found a good place to learn.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Or perhaps you are a developer who wants to improve your career options by having skills in SQL and MySQL, one of the worlds most popular databases.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Whatever the reason you have arrived here, this course will...</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\"><strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">Help you understand and apply SQL with&nbsp;MySQL, including Database Design and&nbsp;Data Analysis.</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Having database skills is absolutely vital for developers to avoid getting left behind and to maximise job and consulting opportunities.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\"><strong style=\"box-sizing: border-box; margin: 0px; padding: 0px;\">Key concepts you will learn and work with in this course.</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">SQL&nbsp;(Structured Query&nbsp;Language - very much an in-demand technology).<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />MySQL (one of the worlds most popular and widely used databases).<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Database Design<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Data Analysis</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">The database design section (normalization and relationships) isn\'t covered in the majority of SQL courses on Udemy. &nbsp;You will struggle to find another&nbsp;MySQL course that has a section on this. &nbsp; This section alone, will give you a huge edge over other applicants for jobs.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Through the course&nbsp;you will&nbsp;go through creating an example database for a cinema online booking system using concepts taught in the database design section.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Creating, Modifying and Deleting Tables in a Database (DDL)<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Inserting, Updating and Deleting Data from Tables (DML)<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Select Queries<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Joins<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Aggregate Functions<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Subqueries<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Database Design<br style=\"box-sizing: border-box; margin: 0px; padding: 0px;\" />Creating Databases.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">In addition there are installation videos covering MySQL on Windows, Mac or Linux.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Not only does the course teach you SQL, but there&nbsp;are multiple exercises for you to try&nbsp;with video solutions to further&nbsp;help you understand the material.</p>\r\n<p style=\"box-sizing: border-box; margin: 0.8rem 0px 0px; padding: 0px; font-size: 14px; max-width: 118.4rem; color: #1c1d1f; font-family: \'sf pro text\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2;\">Also note that while MySQL is the database of choice in this course, the SQL skills you acquire will work largely with any database.<br /><br /></p>\r\n<p class=\"udlite-heading-xl styles--audience__title--1Sob_\" style=\"box-sizing: border-box; margin: 0px 0px 1.6rem; padding: 0px; font-size: 2.4rem; max-width: 118.4rem; font-family: \'sf pro display\', -apple-system, BlinkMacSystemFont, Roboto, \'segoe ui\', Helvetica, Arial, sans-serif, \'apple color emoji\', \'segoe ui emoji\', \'segoe ui symbol\'; line-height: 1.2; letter-spacing: -0.02rem; color: #1c1d1f;\"><span style=\"font-size: 18pt;\"><strong>Who this course is for:</strong><br /><span style=\"font-size: 12pt;\">Anyone who wants to learn how to use SQL and MySQL</span><br /></span></p>', '2022-01-09 02:17:55', '2022-01-09 02:17:55');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(20) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `konten` longtext NOT NULL,
  `user_id` int(20) NOT NULL,
  `mycourse_id` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `judul`, `slug`, `konten`, `user_id`, `mycourse_id`, `created_at`, `updated_at`) VALUES
(2, 'forum kedua', 'forum-kedua', 'bagaimana cara buat header', 4, 242, '2021-12-15 15:03:13', '2021-12-15 15:03:13'),
(4, 'Forum Belajar laravel', 'forum-belajar-laravel', 'Diskusikan Materi belajar Pada Kursus Ini', 7, 242, '2021-12-21 03:30:37', '2022-01-08 05:26:15'),
(6, 'Forum Diskusi Kursus Node Js', 'forum-diskusi-kursus-node-js', 'Silahkan berdiskusi mengenai materi kursus', 7, 244, '2021-12-21 04:41:22', '2021-12-21 04:41:22'),
(7, 'Bagaimana passing data ke view', 'bagaimana-passing-data-ke-view', '', 3, 244, '2021-12-21 04:44:35', '2021-12-21 04:44:35'),
(13, 'Cara Upload Gambar Laravel', 'cara-upload-gambar-laravel', 'Bagaimana Cara mengupload gambar menggunakan laravel', 3, 242, '2022-01-08 04:16:26', '2022-01-08 05:17:53'),
(14, 'bagaimana cara menggunakan query join 3 tabel', 'bagaimana-cara-menggunakan-query-join-3-tabel', 'bagaimana cara menggunakan query join 3 tabel ?', 23, 251, '2022-01-13 02:07:00', '2022-01-13 02:07:00'),
(15, 'cara join table', 'cara-join-table', 'bagaimana cara join 3 table ?', 29, 251, '2022-01-16 21:21:52', '2022-01-16 21:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url_video` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `name`, `url_video`, `time`, `chapter_id`, `created_at`, `updated_at`) VALUES
(1, 'Installasi laravel', 'kCA1wTh_PZ8', '12 mins', 1, '2021-06-02 22:00:19', '2021-06-07 20:52:57'),
(3, 'membuat database baru', 'uOQ5ARiAs0Y', '18 mins', 2, NULL, '2021-06-07 20:53:08'),
(5, 'Integrasi View laravel', 'wYL6Ivd7N-0', '20 mins', 4, '2021-06-05 17:26:06', '2021-06-07 20:53:30'),
(7, 'Pemrograman Web : REST API Node.Js dan MySQL', '8B5tzVtFG18', '17 mins', 7, '2021-12-12 21:00:26', '2021-12-13 00:03:46'),
(8, 'Membuat Database', '8B5tzVtFG18', '20 mins', 7, '2021-12-14 21:00:43', '2021-12-14 21:00:43'),
(9, 'Koneksi Github', 'AsH0TJxwjmc', '19 mins', 7, '2021-12-14 21:01:20', '2021-12-14 21:01:20'),
(10, 'Install Package', 'O-kDST8gjFA', '12 mins', 7, '2021-12-14 21:01:54', '2021-12-14 21:01:54'),
(11, 'Server Node.Js', 'uzxTDseZHNo', '15 mins', 7, '2021-12-14 21:02:41', '2021-12-14 21:34:35'),
(12, 'KONEKSI, RESPONSE,CONTROLLER', 'HylZLtLLUY0', '10 mins', 8, '2021-12-14 21:04:07', '2021-12-14 21:04:07'),
(13, 'GET DATA', 'WrI48embuHI', '12 mins', 8, '2021-12-14 21:04:30', '2021-12-14 21:04:30'),
(14, 'Post Data', 'MAaKmvLQBBE', '17 mins', 8, '2021-12-14 21:04:47', '2021-12-14 21:04:47'),
(15, 'Put Data', '8_T4faMgM7Q', '11 mins', 8, '2021-12-14 21:05:06', '2021-12-14 21:05:06'),
(16, 'Delete Data', 'yTPjeFnqVBU', '12 mins', 8, '2021-12-14 21:05:25', '2021-12-14 21:05:25'),
(17, 'Blade Components', 'nvdwOF40hxA', '22 mins', 4, '2021-12-14 21:12:18', '2021-12-14 21:12:18'),
(18, 'Form Validation', 'QxLWqj2OH6g', '14 mins', 4, '2021-12-14 21:12:43', '2021-12-14 21:12:43'),
(19, 'Membuat Crud', '-QsjnWW3K_g', '40 mins', 4, '2021-12-14 21:13:14', '2021-12-14 21:13:14'),
(20, 'Export Data Pdf', 'ILaPHDERLYQ', '18 mins', 4, '2021-12-14 21:13:46', '2021-12-14 21:14:07'),
(21, 'Pengenalan Database', 'BfwEPIOKTsg', '06 mins', 9, '2022-01-09 02:19:54', '2022-01-09 02:19:54'),
(22, 'Install Mysql', 'huk3WKIOwTw', '02 mins', 9, '2022-01-09 02:20:45', '2022-01-09 02:20:45'),
(23, 'Menjalankan Mysql', 'l31Vpq8Uvng', '03 mins', 9, '2022-01-09 02:21:15', '2022-01-09 02:21:15'),
(24, 'Membuat Tabel', 'ja-dIYIqJ5c', '09 mins', 10, '2022-01-09 02:23:00', '2022-01-09 02:23:00'),
(25, 'Foreign Key', 'Gz7z10s46D0', '09 mins', 10, '2022-01-09 02:31:39', '2022-01-09 02:31:39'),
(26, 'Drop & Alter Table', 'Lzs9hrdLIBg&list', '05 mins', 10, '2022-01-09 02:32:11', '2022-01-09 02:32:11'),
(27, 'Query Insert', 'xMEnOhrJ60g', '05 mins', 10, '2022-01-09 02:33:00', '2022-01-09 02:33:00'),
(28, 'Query Update', 'E44zaFkYsRk', '05 mins', 10, '2022-01-09 02:33:23', '2022-01-09 02:33:23'),
(29, 'Query Update', 'lZhcp9LuU94&list', '05 mins', 10, '2022-01-09 02:33:45', '2022-01-09 02:33:45'),
(30, 'Query Select', '2ySAIpI3FJA&list', '04 mins', 10, '2022-01-09 02:34:28', '2022-01-09 02:34:28'),
(31, 'Query Where', 'twofooNcd5A', '08 mins', 10, '2022-01-09 02:34:53', '2022-01-09 02:34:53'),
(32, 'Query Where Like', 'ClG1ayejVT0', '07 mins', 10, '2022-01-09 02:35:32', '2022-01-09 02:35:32'),
(33, 'Query Order By', 'GMDXjHPPwqU', '07 mins', 10, '2022-01-09 02:35:59', '2022-01-09 02:35:59'),
(34, 'Inner Join', 'vYMpSQfsRJo', '08 mins', 11, '2022-01-09 02:36:59', '2022-01-09 02:36:59'),
(35, 'Left Join', '3FSnlnxC4qE', '04 mins', 11, '2022-01-09 02:37:22', '2022-01-09 02:37:22'),
(36, 'Self Join', 'Nw2BPaJjz-w', '04 mins', 11, '2022-01-09 02:38:29', '2022-01-09 02:38:29');

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`id`, `name`, `profile`, `email`, `profession`, `created_at`, `updated_at`) VALUES
(1, 'Luthfirrahman', '1622696231_14345-young-lex.jpg', 'lurrah30@gmail.com', 'Web Developer', '2021-06-02 21:57:11', '2021-06-02 21:57:11');

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
(9, '2021_05_31_015943_create_permission_tables', 2),
(10, '2014_10_12_000000_create_users_table', 3),
(11, '2014_10_12_100000_create_password_resets_table', 3),
(12, '2019_08_19_000000_create_failed_jobs_table', 3),
(13, '2021_05_20_105604_create_categories_table', 3),
(14, '2021_05_26_023533_create_mentors_table', 3),
(15, '2021_05_26_024501_create_courses_table', 3),
(16, '2021_05_26_104112_create_chapters_table', 3),
(17, '2021_05_26_104655_create_lessons_table', 3),
(18, '2021_06_03_030022_create_permission_tables', 4),
(19, '2021_06_04_130443_create_my_courses', 5),
(20, '2021_06_04_131820_create_reviews', 6),
(21, '2021_06_30_170445_create_certificate_table', 7),
(22, '2021_07_05_075123_create_cetrificates_table', 8),
(23, '2021_07_05_075739_create_certificates_table', 9),
(24, '2021_07_23_110310_create_orders_table', 10),
(25, '2021_07_23_142845_create_orders_table', 11),
(26, '2021_07_25_190538_create_orders_table', 12),
(27, '2021_07_27_163837_create_site_table', 13),
(28, '2021_07_27_164854_create_site_table', 14),
(29, '2021_08_03_012109_create_reviews', 15);

-- --------------------------------------------------------

--
-- Table structure for table `my_courses`
--

CREATE TABLE `my_courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `item_price` int(11) NOT NULL,
  `status` enum('success','pending','','') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_courses`
--

INSERT INTO `my_courses` (`id`, `course_id`, `user_id`, `order_id`, `item_price`, `status`, `created_at`, `updated_at`) VALUES
(242, 1, 3, 203, 450000, 'pending', '2021-08-03 10:50:49', '2021-12-23 00:15:18'),
(243, 1, 4, 205, 450000, 'success', '2021-08-03 13:53:36', '2021-08-03 13:54:39'),
(244, 10, 3, 206, 150000, 'success', '2021-12-12 20:52:35', '2021-12-23 00:11:40'),
(249, 10, 22, 210, 150000, 'pending', '2022-01-09 05:33:51', '2022-01-09 05:33:51'),
(251, 20, 23, 212, 0, 'success', '2022-01-13 02:04:34', '2022-01-13 02:04:34'),
(253, 10, 23, 213, 150000, 'pending', '2022-01-13 02:08:45', '2022-01-13 02:08:45'),
(254, 20, 24, 214, 0, 'success', '2022-01-13 08:08:09', '2022-01-13 08:08:09'),
(255, 20, 28, 215, 0, 'success', '2022-01-16 15:33:27', '2022-01-16 15:33:27'),
(256, 20, 29, 216, 0, 'success', '2022-01-16 21:19:30', '2022-01-16 21:19:30'),
(257, 1, 30, 217, 450000, 'pending', '2022-01-16 22:51:45', '2022-01-16 22:51:45'),
(258, 20, 31, 218, 0, 'success', '2022-01-17 06:26:52', '2022-01-17 06:26:52'),
(259, 10, 32, 219, 150000, 'pending', '2022-02-03 00:22:50', '2022-02-03 00:22:50'),
(260, 10, 33, 220, 150000, 'pending', '2022-02-25 19:27:30', '2022-02-25 19:27:30'),
(261, 1, 33, 221, 450000, 'pending', '2022-02-25 19:42:36', '2022-02-25 19:42:36'),
(262, 10, 34, 222, 150000, 'pending', '2022-02-25 19:49:15', '2022-02-25 19:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) DEFAULT 0,
  `kode` int(11) NOT NULL,
  `status` enum('pending','success','checkout') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `kode`, `status`, `foto`, `created_at`, `updated_at`) VALUES
(203, 3, 450000, 189, 'success', '', '2021-08-03 10:50:06', '2021-12-23 00:16:05'),
(205, 4, 450000, 944, 'success', '', '2021-08-03 13:53:36', '2021-08-03 13:54:39'),
(206, 3, 150000, 677, 'success', '', '2021-12-12 20:52:35', '2021-12-23 00:17:28'),
(210, 22, 150000, 117, 'pending', '', '2022-01-09 05:33:51', '2022-01-13 02:18:42'),
(212, 23, 0, 0, 'success', '', '2022-01-13 02:04:34', '2022-01-13 02:04:34'),
(213, 23, 150000, 231, 'pending', '', '2022-01-13 02:08:28', '2022-01-13 02:18:40'),
(214, 24, 0, 0, 'success', '', '2022-01-13 08:08:09', '2022-01-13 08:08:09'),
(215, 28, 0, 0, 'success', '', '2022-01-16 15:33:27', '2022-01-16 15:33:27'),
(216, 29, 0, 0, 'success', '', '2022-01-16 21:19:30', '2022-01-16 21:19:30'),
(217, 30, 450000, 736, 'checkout', '', '2022-01-16 22:51:45', '2022-01-16 22:51:52'),
(218, 31, 0, 0, 'success', '', '2022-01-17 06:26:52', '2022-01-17 06:26:52'),
(219, 32, 150000, 389, 'checkout', '1643875962_class diagram.png', '2022-02-03 00:22:50', '2022-02-03 01:12:42'),
(220, 33, 150000, 891, 'success', '1645842604_IMG-20210531-WA0027.jpg', '2022-02-25 19:27:30', '2022-02-25 19:31:01'),
(221, 33, 450000, 640, 'success', '1645843374_IMG-20210531-WA0027.jpg', '2022-02-25 19:42:36', '2022-02-25 19:43:37'),
(222, 34, 150000, 355, 'success', '1645843769_IMG-20210531-WA0027.jpg', '2022-02-25 19:49:15', '2022-02-25 19:50:06');

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
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `mycourse_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `mycourse_id`, `rating`, `description`, `created_at`, `updated_at`) VALUES
(5, 3, 242, 4, 'Materi Kelas nya Bagus Sekali, Penjelasan Mentor Sangat Mudah dipahami', '2021-08-03 23:14:44', '2021-08-03 23:14:44'),
(6, 3, 242, 4, NULL, '2021-09-19 20:25:46', '2021-09-19 20:25:46'),
(7, 3, 251, 3, 'materi sangat bagus', '2022-01-13 02:04:57', '2022-01-13 02:04:57');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `header_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_title` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`id`, `site_name`, `email`, `phone`, `address`, `header_title`, `header_description`, `header_image`, `about_title`, `about_description`, `about_image`, `created_at`, `updated_at`) VALUES
(1, 'Online Class', 'mentor@gmail.com', '089625586181', 'pulo gebang permai blok h14 no 3 Cakung, Jakarta Timur', 'Learning Today, \r\nLeading Tomorrow', 'Education is not just about going to school and getting a degree.\r\nIt\'s about widening your knowledge and absorbing the truth about life.\r\nKnowledge is power.', NULL, NULL, NULL, NULL, NULL, '2021-07-27 10:28:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','student','mentor') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'student',
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(50) DEFAULT 0,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `profession`, `avatar`, `role`, `no_hp`, `email`, `password`, `status`, `cv`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reza Maulana', 'Web Developer', '1628231886_PAPA HNI bulet.jpg', 'mentor', NULL, 'rezamaulana77@gmail.com', '$2y$10$girenZ4Ja0JU7u05I/QhS.0ydj8AJGDRGvWEI5d/6O5U7NRk/a9yG', 1, '20211221132454.pdf', NULL, NULL, '2021-08-05 23:38:06'),
(2, 'Luthfirrahman', 'Student', '1625030896_3794005402.jpg', 'admin', NULL, 'lurrah@gmail.com', '$2y$10$XZwXYAe.QmcMC6c29p8CN.lTzVfCitwtOCJztoNh4CMNVrv04OGsO', 1, NULL, 'OBl4tiqohY3L8JPQx9HobJrDEfSzeOrcNGy545nR972CvUkPGZBiVnxOE5Rk', NULL, '2021-07-26 12:02:37'),
(3, 'alex', 'student', '1625030896_3794005402.jpg', 'student', NULL, 'student@gmail.com', '$2y$10$oXqplx/lVnzOWkCjd1av5Ob1w3cQzLfOtfYE2CRTV.QcVXvGVfTdC', 1, NULL, NULL, NULL, NULL),
(4, 'Cornelia Suwarno', 'Admin', NULL, 'admin', NULL, 'cornelia54@suwarno.info', '$2y$10$6vfi6Dx4.USQNpM3lPp8muXGedzxleTBhTcnF01igy7bq04rUylKa', 1, NULL, NULL, NULL, '2022-01-08 06:01:46'),
(7, 'Rahmat Wijaya', 'Android Developer', '1628578588_download (1).jpg', 'mentor', NULL, 'mentor@gmail.com', '$2y$10$1O6MpHitcsOjZqJnri8bkeXKtAvy3x6FzGb1RJmA.4CrlQrwZZzbC', 1, '20211221132454.pdf', NULL, NULL, '2021-08-09 23:56:28'),
(9, 'Shania Irma Yolanda', 'qui', NULL, 'student', NULL, 'palastri.wani@gmail.co.id', '$2y$10$gQ/osy2PtdSV0CE8rsX7yOGDEx5HRWVnydAIAl90V/cVV0xU8JE.a', 1, NULL, NULL, NULL, NULL),
(13, 'baba', 'developer', NULL, 'mentor', '08973499384', 'baba@gmail.co.id', '$2y$10$8dpl6Luc5yuxLjM9rYr7LOhVcq8tz92hKoElHPeqCAMkjY4q7pJp6', 1, '20211221132454.pdf', NULL, '2021-12-21 06:24:55', '2022-01-08 06:16:45'),
(14, 'adni', NULL, NULL, 'student', NULL, 'andi@gmail.com', '$2y$10$YjCbdg0NfJJvxkX54RvAd.RVx1c/93DfYKpLR.0sbTd5bCvQzJ6ku', 0, NULL, NULL, '2022-01-03 05:25:41', '2022-01-03 05:25:41'),
(17, 'azis', 'admin', NULL, 'admin', NULL, 'azis@gmail.com', '$2y$10$m07d3YSexNHyQ1pG.yZWc.TiJUFrp1LqH5o7zhx44N/pmri3ttLs.', 0, NULL, NULL, '2022-01-08 06:25:07', '2022-01-08 06:25:07'),
(21, 'asdasd', 'asdsad', NULL, 'admin', NULL, 'asdasdf@gmail.con', '$2y$10$Z5wiPSOJ5UcheENh.d77x.6N/Jep7qY66mbeCaaAXLY/r5deu36wq', 0, NULL, NULL, '2022-01-08 06:45:06', '2022-01-08 06:45:06'),
(22, 'ubay', NULL, '1641724349_franck-kessie_bink7b2feuz211rhup06tz3bx.jpg', 'student', NULL, 'ubay@gmail.com', '$2y$10$fFpxy/OyNXmaBSsyZ0p3DuIEcyytmRWHIzTg/DIUU0L9jAvpo1ui6', 0, NULL, NULL, '2022-01-09 02:55:49', '2022-01-09 03:32:29'),
(23, 'harry', NULL, '1642064777_franck-kessie_bink7b2feuz211rhup06tz3bx.jpg', 'student', NULL, 'harry@gmail.com', '$2y$10$fOezXyvBiCoInH94FnevWeIcPWZ.aheoN0N9C20v7YUqBl1s8DUIm', 0, NULL, NULL, '2022-01-13 02:04:19', '2022-01-13 02:06:17'),
(24, 'rivky', NULL, NULL, 'student', NULL, 'rivky@gmail.com', '$2y$10$k2LiZ0R6OVu1z.9juNeXOOhWGg0Bsj79UK1WZu4wCdcmoX0yCGcQq', 0, NULL, NULL, '2022-01-13 08:07:56', '2022-01-13 08:07:56'),
(28, 'candra', NULL, NULL, 'student', NULL, 'candra@gmail.com', '$2y$10$zpUEPwp6z9CjVASNZZRjVO7nNjmh4Y7aXPaoew22HrnEdyX7ZVzlC', 0, NULL, NULL, '2022-01-16 15:33:07', '2022-01-16 15:33:07'),
(29, 'hilmy', NULL, NULL, 'student', NULL, 'hilmy@gmail.com', '$2y$10$7q0WvvevveA3oe.YfZQqc.2DFvz10IL8QblXJJ0NcEnrg3yN/HnAC', 0, NULL, NULL, '2022-01-16 21:19:03', '2022-01-16 21:19:03'),
(30, 'romdon', NULL, NULL, 'student', NULL, 'romdon@gmail.com', '$2y$10$wX8aBvidT8o2eAPJolDEBOmPwEVdFKyKxKrxWqjFFQE4he75pH53W', 0, NULL, NULL, '2022-01-16 22:50:58', '2022-01-16 22:50:58'),
(31, 'hilmy', NULL, NULL, 'student', NULL, 'mi@gmail.com', '$2y$10$fLeuMCi9s5pB89BaTiuZU.5HdXkwslF6kwGeGv3VJjAUQsrcEy/vW', 0, NULL, NULL, '2022-01-17 06:26:21', '2022-01-17 06:26:21'),
(32, 'neymar', NULL, NULL, 'student', NULL, 'neymar@gmail.com', '$2y$10$2X2rXWV/F4k6ZuwtqZr3POoU45YO1nNlhhCcXX7WG/YnDd9e6fECW', 0, NULL, NULL, '2022-02-03 00:22:36', '2022-02-03 00:22:36'),
(33, 'fattah', NULL, NULL, 'student', NULL, 'fattah@gmail.com', '$2y$10$S6THkCTueVFfT83rkAHmLOuFmaoyw50Bq6HTdSlZ348/CBKbXiDem', 0, NULL, NULL, '2022-02-25 19:27:13', '2022-02-25 19:27:13'),
(34, 'roby', NULL, NULL, 'student', NULL, 'roby@gmail.com', '$2y$10$P4UPAfEnnIUvWwY39tzpae6ZCEq90lUXTA.azSJwUnnONg6QH/v6m', 0, NULL, NULL, '2022-02-25 19:47:38', '2022-02-25 19:47:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `certificates_mycourse_id_foreign` (`mycourse_id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_course_id_foreign` (`course_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_category_id_foreign` (`category_id`),
  ADD KEY `courses_mentor_id_foreign` (`mentor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lessons_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_courses`
--
ALTER TABLE `my_courses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `my_courses_user_id_course_id_unique` (`user_id`,`course_id`),
  ADD KEY `my_courses_course_id_foreign` (`course_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_mycourse_id_foreign` (`mycourse_id`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `my_courses`
--
ALTER TABLE `my_courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=263;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `certificates`
--
ALTER TABLE `certificates`
  ADD CONSTRAINT `certificates_mycourse_id_foreign` FOREIGN KEY (`mycourse_id`) REFERENCES `my_courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_mentor_id_foreign` FOREIGN KEY (`mentor_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `lessons`
--
ALTER TABLE `lessons`
  ADD CONSTRAINT `lessons_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `my_courses`
--
ALTER TABLE `my_courses`
  ADD CONSTRAINT `my_courses_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_mycourse_id_foreign` FOREIGN KEY (`mycourse_id`) REFERENCES `my_courses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
