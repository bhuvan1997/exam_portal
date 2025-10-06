-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2025 at 08:25 AM
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
-- Database: `exam_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_24_110936_add_otp_fields_to_users_table', 2),
(5, '2025_07_24_111038_add_otp_fields_to_users_table', 3),
(6, '2025_07_24_111432_2025_07_24_create_profile_table', 4),
(7, '2025_07_25_082842_add_role_fields_to_users_table', 4),
(8, '2025_10_05_160820_create_personal_access_tokens_table', 5),
(9, '2025_10_05_112913_add_role_to_users_table', 6);

-- --------------------------------------------------------

--
-- Table structure for table `m_menu`
--

CREATE TABLE `m_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `desc` varchar(100) NOT NULL,
  `parent_id` varchar(100) DEFAULT NULL,
  `prefix` varchar(100) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `position` int(11) DEFAULT NULL,
  `role` int(10) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `m_menu`
--

INSERT INTO `m_menu` (`id`, `desc`, `parent_id`, `prefix`, `link`, `icon`, `position`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Dashboard', '0', 'user', 'Dashboard', 'ri-dashboard-3-line', 1, 1, 1, '2025-04-08 05:10:47', '2025-10-04 15:58:27'),
(2, 'Profile', '0', 'user', 'Profile', 'ri-dashboard-3-line', 2, 1, 1, '2025-04-08 05:10:47', '2025-10-04 15:58:27'),
(3, 'Dashboard', '0', 'admin', 'Dashboard', 'ri-dashboard-3-line', 1, 2, 1, '2025-04-08 05:10:47', '2025-10-04 15:59:16'),
(4, 'Manage User', '0', 'admin', 'manage-user', 'ri-dashboard-3-line', 2, 2, 1, '2025-04-08 05:10:47', '2025-10-04 16:01:04'),
(11, 'Course', '0', 'admin', '#', 'ri-dashboard-3-line', 3, 2, 1, '2025-04-08 05:10:47', '2025-10-04 17:39:50'),
(12, 'Exam Form', '0', 'admin', '#', 'ri-dashboard-3-line', 4, 2, 1, '2025-04-08 05:10:47', '2025-10-04 19:50:25'),
(13, 'Manage Exam Form Submission', '0', 'admin', 'manage-exam-form-submission', 'ri-dashboard-3-line', 5, 2, 1, '2025-04-08 05:10:47', '2025-10-04 16:00:11'),
(14, 'Manage Payments', '0', 'admin', 'manage-payments', 'ri-dashboard-3-line', 6, 2, 1, '2025-04-08 05:10:47', '2025-10-04 16:00:11'),
(15, 'Add Course', '11', 'admin', 'add-course', 'ri-dashboard-3-line', 3, 2, 1, '2025-04-08 05:10:47', '2025-10-04 17:03:25'),
(16, 'Manage Course', '11', 'admin', 'manage-course', 'ri-dashboard-3-line', 3, 2, 1, '2025-04-08 05:10:47', '2025-10-04 17:03:25'),
(17, 'Add Exam Form', '12', 'admin', 'add-exam-form', 'ri-dashboard-3-line', 4, 2, 1, '2025-04-08 05:10:47', '2025-10-04 19:51:09'),
(18, 'Manage Exam Form', '12', 'admin', 'manage-exam-form', 'ri-dashboard-3-line', 4, 2, 1, '2025-04-08 05:10:47', '2025-10-04 19:51:06'),
(20, 'Exam Form', '0', 'user', '#', 'ri-dashboard-3-line', 3, 1, 1, '2025-04-08 05:10:47', '2025-10-04 15:58:27'),
(21, 'Fill Exam Form', '20', 'user', 'fill-exam-form', 'ri-dashboard-3-line', 3, 1, 1, '2025-04-08 05:10:47', '2025-10-04 15:58:27'),
(22, 'Application Payment Submit', '20', 'user', 'exam-form-payment', 'ri-dashboard-3-line', 3, 1, 1, '2025-04-08 05:10:47', '2025-10-04 15:58:27');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` text NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('2fAgXI0R7WipPsdlo0R1ZbwwQgd0PVyNbO8QSigW', 9, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMVlWdVJXRWVhVzh2NFZaMnl0NzdEVDdQS1NpdmQxazNqU1FTRjJEZCI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozNzoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkbWluL0Rhc2hib2FyZCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjU1OiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYWRtaW4vbWFuYWdlLWV4YW0tZm9ybS1zdWJtaXNzaW9uIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxMjoiY2FwdGNoYV90ZXh0IjtzOjY6IkxVMEI0RCI7czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6OTt9', 1759730490),
('MavakJO77X7gf7SLs0YQuEkLQFJmgTtxoeeP4HsM', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWW54ZWc3ejZIS0dmZDR4VzhLZFV1Nkh2amVsaTJFUWFlRVUwR29TUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jYXB0Y2hhLWltYWdlP3Q9MTc1OTczMTMzMSI7fXM6MTI6ImNhcHRjaGFfdGV4dCI7czo2OiJUTzFOVEsiO30=', 1759731331);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appln_form`
--

CREATE TABLE `tbl_appln_form` (
  `id` int(11) NOT NULL,
  `appln_no` varchar(20) NOT NULL,
  `exam_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `roll_no` varchar(30) NOT NULL,
  `college` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `payment_status` enum('P','S','F') DEFAULT 'P',
  `payment_order_id` varchar(64) DEFAULT NULL,
  `payment_id` varchar(64) DEFAULT NULL,
  `paid_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_appln_form`
--

INSERT INTO `tbl_appln_form` (`id`, `appln_no`, `exam_id`, `user_id`, `full_name`, `father_name`, `roll_no`, `college`, `university`, `status`, `payment_status`, `payment_order_id`, `payment_id`, `paid_at`, `created_at`, `updated_at`) VALUES
(1, '20251006080331', 1, 7, 'Bhuvan Gupta', 'Rajesh Kumar', '1122003332', 'Rajasthan Swayat Shasan Mahavidyalaya', 'University of Rajasthan', 'pending', 'S', 'order_RQ3CxKhfP67pyc', 'pay_RQ3D61TxF7PCkB', '2025-10-06 09:41:43', '2025-10-06 08:03:31', '2025-10-06 08:03:31');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(11) NOT NULL,
  `year_of_study` int(3) NOT NULL,
  `course_code` varchar(50) DEFAULT NULL,
  `program` varchar(255) DEFAULT NULL,
  `status` enum('A','I') NOT NULL COMMENT 'A=active, I=inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `year_of_study`, `course_code`, `program`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'BCom', 'Bachelors of Commerce', 'A', '2025-10-04 17:55:04', '2025-10-04 17:55:04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course_subject`
--

CREATE TABLE `tbl_course_subject` (
  `id` int(11) NOT NULL,
  `course_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `status` enum('A','I') NOT NULL COMMENT 'A=active, I=inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_course_subject`
--

INSERT INTO `tbl_course_subject` (`id`, `course_id`, `subject_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'A', '2025-10-04 19:16:27', '2025-10-04 19:16:27'),
(2, 1, 4, 'A', '2025-10-04 19:16:27', '2025-10-04 19:16:27'),
(3, 1, 7, 'A', '2025-10-04 19:16:27', '2025-10-04 19:16:27'),
(4, 1, 10, 'A', '2025-10-04 19:16:27', '2025-10-04 19:16:27'),
(5, 1, 13, 'A', '2025-10-04 19:16:27', '2025-10-04 19:16:27'),
(8, 1, 16, 'A', '2025-10-04 19:26:10', '2025-10-04 19:26:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam`
--

CREATE TABLE `tbl_exam` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `session_id` tinyint(4) NOT NULL,
  `exam_type` tinyint(4) NOT NULL,
  `form_start_at` datetime DEFAULT NULL,
  `form_end_at` datetime DEFAULT NULL,
  `exam_fee` decimal(6,2) NOT NULL,
  `status` enum('draft','published','closed') NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_exam`
--

INSERT INTO `tbl_exam` (`id`, `title`, `course_id`, `session_id`, `exam_type`, `form_start_at`, `form_end_at`, `exam_fee`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Session 2025 (Bcom Course Exam Form 1st Year)', 1, 2, 1, '2025-10-05 11:00:00', '2025-10-08 12:00:00', 2500.00, 'published', '2025-10-04 20:45:45', '2025-10-05 11:36:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_type`
--

CREATE TABLE `tbl_exam_type` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` enum('A','I') NOT NULL COMMENT 'A=active,I=inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_exam_type`
--

INSERT INTO `tbl_exam_type` (`id`, `type`, `status`, `created_at`) VALUES
(1, 'Regular', 'A', '2025-10-05 10:31:17'),
(2, 'Supplementary', 'A', '2025-10-05 10:31:17'),
(3, 'Ex-Student', 'A', '2025-10-05 10:31:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `appln_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(64) NOT NULL,
  `payment_id` varchar(64) DEFAULT NULL,
  `signature` varchar(128) DEFAULT NULL,
  `amount` int(11) NOT NULL,
  `currency` varchar(10) DEFAULT 'INR',
  `status` enum('created','paid','failed') DEFAULT 'created',
  `method` varchar(50) DEFAULT NULL,
  `email` varchar(120) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `notes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`notes`)),
  `raw_response` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`raw_response`)),
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `user_id`, `appln_id`, `order_id`, `payment_id`, `signature`, `amount`, `currency`, `status`, `method`, `email`, `contact`, `notes`, `raw_response`, `created_at`, `updated_at`) VALUES
(5, 7, 1, 'order_RQ3CxKhfP67pyc', 'pay_RQ3D61TxF7PCkB', '6b3aae9f04a8bf0b22e859c181555554cc642ff866e344e9b3fce81d991bccce', 250000, 'INR', 'paid', NULL, NULL, NULL, NULL, NULL, '2025-10-06 04:11:20', '2025-10-06 04:11:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`id`, `name`) VALUES
(1, 'user'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_session`
--

CREATE TABLE `tbl_session` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `status` enum('A','I') NOT NULL COMMENT 'A=active, I=inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_session`
--

INSERT INTO `tbl_session` (`id`, `name`, `status`, `created_at`) VALUES
(1, '2024', 'A', '2025-10-05 01:32:03'),
(2, '2025', 'A', '2025-10-05 01:32:03'),
(3, '2026', 'A', '2025-10-05 01:32:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_exam_allowed`
--

CREATE TABLE `tbl_student_exam_allowed` (
  `id` int(11) NOT NULL,
  `roll_no` varchar(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `college` varchar(255) DEFAULT NULL,
  `university` varchar(255) DEFAULT NULL,
  `session` varchar(20) DEFAULT NULL,
  `exam_type` varchar(20) DEFAULT NULL,
  `course` varchar(20) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_student_exam_allowed`
--

INSERT INTO `tbl_student_exam_allowed` (`id`, `roll_no`, `name`, `father_name`, `college`, `university`, `session`, `exam_type`, `course`, `created_at`, `updated_at`) VALUES
(1, '202501001', 'Amit Sharma', 'Rajesh Sharma', 'DAV College', 'Panjab University', '2025', 'Regular', 'BCA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(2, '202501002', 'Neha Gupta', 'Ramesh Gupta', 'DAV College', 'Panjab University', '2025', 'Regular', 'BCA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(3, '202501003', 'Rohit Mehta', 'Suresh Mehta', 'Government College', 'Kurukshetra University', '2025', 'Regular', 'BCom', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(4, '202501004', 'Simran Kaur', 'Harbhajan Singh', 'Khalsa College', 'GNDU', '2025', 'Regular', 'BBA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(5, '202501005', 'Deepak Kumar', 'Vijay Kumar', 'Hindu College', 'Delhi University', '2025', 'Regular', 'BA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(6, '202501006', 'Anjali Verma', 'Mahesh Verma', 'DAV College', 'Panjab University', '2025', 'Reappear', 'BCA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(7, '202501007', 'Pankaj Thakur', 'Madan Thakur', 'Government College', 'HP University', '2025', 'Regular', 'BSc', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(8, '202501008', 'Priya Rani', 'Mukesh Rani', 'DAV College', 'Panjab University', '2025', 'Regular', 'BCA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(9, '202501009', 'Karan Singh', 'Manmohan Singh', 'Khalsa College', 'GNDU', '2025', 'Reappear', 'BCom', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(10, '202501010', 'Divya Sharma', 'Om Prakash', 'Hindu College', 'Delhi University', '2025', 'Regular', 'BA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(11, '202501011', 'Ajay Kumar', 'Sanjay Kumar', 'Government College', 'HP University', '2025', 'Regular', 'BSc', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(12, '202501012', 'Nidhi Chauhan', 'Pratap Chauhan', 'DAV College', 'Panjab University', '2025', 'Regular', 'BBA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(13, '202501013', 'Vivek Saini', 'Narender Saini', 'Khalsa College', 'GNDU', '2025', 'Reappear', 'BCom', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(14, '202501014', 'Pooja Rani', 'Ramesh Lal', 'Hindu College', 'Delhi University', '2025', 'Regular', 'BCA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(15, '202501015', 'Sahil Arora', 'Vinod Arora', 'DAV College', 'Panjab University', '2025', 'Regular', 'BCA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(16, '202501016', 'Aman Kumar', 'Raj Kumar', 'Government College', 'HP University', '2025', 'Regular', 'BSc', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(17, '202501017', 'Sneha Gupta', 'Ajay Gupta', 'DAV College', 'Panjab University', '2025', 'Regular', 'BBA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(18, '202501018', 'Mohit Yadav', 'Satish Yadav', 'Khalsa College', 'GNDU', '2025', 'Reappear', 'BCom', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(19, '202501019', 'Komal Sharma', 'Deepak Sharma', 'Hindu College', 'Delhi University', '2025', 'Regular', 'BA', '2025-10-06 00:00:52', '2025-10-06 00:00:52'),
(20, '202501020', 'Ritika Chauhan', 'Manoj Chauhan', 'DAV College', 'Panjab University', '2025', 'Regular', 'BCA', '2025-10-06 00:00:52', '2025-10-06 00:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `status` enum('A','I') NOT NULL COMMENT 'A=active, I=inactive',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Mathematics', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(2, 'Physics', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(3, 'Chemistry', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(4, 'Biology', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(5, 'English Literature', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(6, 'Computer Science', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(7, 'Economics', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(8, 'Political Science', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(9, 'History', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(10, 'Geography', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(11, 'Philosophy', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(12, 'Psychology', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(13, 'Sociology', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(14, 'Business Administration', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(15, 'Accountancy', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(16, 'Statistics', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(17, 'Environmental Science', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(18, 'Fine Arts', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(19, 'Education', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43'),
(20, 'Law', 'A', '2025-10-05 00:24:43', '2025-10-05 00:24:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE `tbl_user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('M','F','O') DEFAULT NULL COMMENT 'M=Male,F=Female,O=Others',
  `email` varchar(100) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `pincode` varchar(10) DEFAULT NULL,
  `marital_status` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `user_photo` varchar(255) DEFAULT NULL,
  `user_sign` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`id`, `user_id`, `name`, `dob`, `gender`, `email`, `mobile`, `address`, `city`, `state`, `pincode`, `marital_status`, `category`, `profile_img`, `user_photo`, `user_sign`, `created_at`, `updated_at`) VALUES
(1, 7, 'Bhuvan Gupta', '1997-01-08', 'M', 'bhuvan.veritos@gmail.com', '8118879069', 'Plot 89, Shahi Majra, Mohali', 'Mohali', 'Punjab', '146001', 'single', 'general', '1755082406_689c6ea64f4d3.png', '1759728337_68e352d17bf9e.jpg', '1759728337_68e352d17d957.jpg', '2025-07-27 20:19:00', NULL),
(2, 12, 'Vishal Singh', '2025-10-06', 'M', 'vishalddd@gmail.com', '8887772223', 'ddssdd', 'Mohali', 'Punjab', '146001', 'single', 'general', NULL, '1759731321_68e35e79292c7.jpg', '1759731321_68e35e7929e4b.jpg', '2025-10-06 11:38:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `mobile` varchar(25) DEFAULT NULL,
  `mobile_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('1','2') NOT NULL COMMENT '1=Candidate, 2=Employer',
  `is_profile_updated` datetime DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `mobile`, `mobile_verified_at`, `password`, `role`, `is_profile_updated`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'Bhuvan Gupta', 'bhuvan.veritos@gmail.com', NULL, '8118879069', NULL, '$2y$12$M/2WgxOAoffMqeM.uFAxM.eksBrjaX5.M0iQ2T8VaXxUt9XAp9CaW', '1', '2025-10-06 10:55:37', NULL, '2025-07-27 09:19:00', '2025-07-27 09:19:00'),
(9, 'Admin', 'admin@gmail.com', NULL, '8882373333', NULL, '$2y$12$M/2WgxOAoffMqeM.uFAxM.eksBrjaX5.M0iQ2T8VaXxUt9XAp9CaW', '2', NULL, NULL, '2025-08-06 15:27:37', '2025-08-06 15:27:37'),
(12, 'Vishal Singh', 'vishalddd@gmail.com', NULL, '8887772223', NULL, '$2y$12$/4dCEYxzeImwutC.sXwfZOhS8y5NkCCJ5M34xDdcZIklyFhd3DIL.', '1', '2025-10-06 11:45:21', NULL, '2025-10-06 06:08:42', '2025-10-06 06:08:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`),
  ADD KEY `personal_access_tokens_expires_at_index` (`expires_at`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_appln_form`
--
ALTER TABLE `tbl_appln_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `year_of_study` (`year_of_study`,`course_code`);

--
-- Indexes for table `tbl_course_subject`
--
ALTER TABLE `tbl_course_subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`,`subject_id`);

--
-- Indexes for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `course_id` (`course_id`,`session_id`,`exam_type`) USING BTREE;

--
-- Indexes for table `tbl_exam_type`
--
ALTER TABLE `tbl_exam_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_order_id` (`order_id`),
  ADD KEY `idx_payment_id` (`payment_id`,`appln_id`) USING BTREE,
  ADD KEY `idx_exam_user` (`appln_id`) USING BTREE;

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_session`
--
ALTER TABLE `tbl_session`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_student_exam_allowed`
--
ALTER TABLE `tbl_student_exam_allowed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `m_menu`
--
ALTER TABLE `m_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_appln_form`
--
ALTER TABLE `tbl_appln_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_course_subject`
--
ALTER TABLE `tbl_course_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_exam`
--
ALTER TABLE `tbl_exam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_exam_type`
--
ALTER TABLE `tbl_exam_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_session`
--
ALTER TABLE `tbl_session`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_student_exam_allowed`
--
ALTER TABLE `tbl_student_exam_allowed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
