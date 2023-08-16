-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2023 at 11:09 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `scholarshipId` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `userId`, `scholarshipId`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2023-07-05 13:46:38', '2023-07-05 19:00:37');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_07_03_233709_create_scholarships_table', 2);

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
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Leeds appoint Farke as manager on four-year deal', '<div class=\"ncpost-content\" id=\"ncpost-list-post-content-6132228\" style=\"margin: 0px; padding: 0px; grid-gap: var(--post-padding-m); display: grid; grid-template-columns: 1fr; color: rgb(17, 17, 17); font-family: &quot;Sky Text&quot;, sans-serif;\"><p ncpost-position=\"0\" style=\"font-size: 16px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\"><b style=\"margin: 0px; padding: 0px;\">Daniel Farke</b>&nbsp;has been appointed as<b style=\"margin: 0px; padding: 0px;\">&nbsp;Leeds</b>\' new manager on a four-year deal ahead of their first season back in the Championship.<br style=\"margin: 0px; padding: 0px;\"></p><p ncpost-position=\"1\" style=\"font-size: 16px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Farke replaces Sam Allardyce, who failed to keep the Whites in the Premier League and left his role in early June having been appointed two months earlier until the end of the season.</p><p ncpost-position=\"2\" style=\"font-size: 16px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">Farke was at Bundesliga club Borussia Monchengladbach last season but was sacked after just one campaign after guiding them to a 10th-placed finish.</p><p ncpost-position=\"3\" style=\"font-size: 16px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">His appointment at Leeds is Farke\'s first job in English football since his four-year spell at Norwich - where he won the Championship twice in 2019 and 2021 before being sacked by the club nearly two years ago.</p><p ncpost-position=\"4\" style=\"font-size: 16px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px;\">After his stint at Norwich, Farke was appointed as manager of Russian club Krasnodar in January 2022 but left the club two months later without managing any games for them following the country\'s invasion of Ukraine.</p><div data-priority=\"10\" data-id=\"BILDE_59\" style=\"margin: 0px; padding: 0px;\"><img class=\"ncpost-image\" decoding=\"async\" loading=\"lazy\" src=\"https://liveblog.digitalimages.sky/lc-images-sky/lcimg-e2a6c343-8de2-4f67-ae15-8263d724dcaa.jpeg\" width=\"1024\" height=\"683\" srcset=\"https://liveblog.digitalimages.sky/lc-images-sky/lcimg-7a64208a-702e-4d98-bb38-7b947481016a.jpeg 640w,https://liveblog.digitalimages.sky/lc-images-sky/lcimg-e2a6c343-8de2-4f67-ae15-8263d724dcaa.jpeg 2048w\" alt=\"New Leeds United boss Daniel Farke has signed a four-year contract at Elland Road\" style=\"margin: 0px; padding: 0px; border: 0px; max-width: 100%; opacity: 1; display: block; height: auto; width: 491.812px; will-change: transform;\"><p class=\"ncpost-image-byline\" aria-hidden=\"true\" style=\"font-size: var(--label-text); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: .75em var(--post-padding-m); background: var(--post-caption-bg); color: var(--post-caption-color); display: flex; flex-direction: column;\"><span class=\"ncpost-image-byline-description\" style=\"font-size: 14px; margin: 0px; padding: 0px;\">New Leeds United boss Daniel Farke has signed a four-year contract at Elland Road</span></p></div></div><div class=\"ncpost-footer\" style=\"margin: 0px; padding: 0px; display: var(--post-footer-display); align-items: center; line-height: 1; color: rgb(17, 17, 17); font-family: &quot;Sky Text&quot;, sans-serif;\"><div class=\"ncpost-label\" aria-hidden=\"true\" style=\"margin: 0px; padding: 0px;\"></div><div class=\"ncpost-share-links\" style=\"margin: 0px 0px 0px auto; padding: 0px; display: var(--post-share-display); flex-wrap: wrap; gap: 5px;\"><a href=\"https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.skysports.com%2Ftransfer%2Fnews%2F12691%2F12476234%2Ftransfer-centre-harry-kane-declan-rice-david-de-gea-latest-updates%3Fpostid%3D6132228%23liveblog-body&amp;t=Leeds%20appoint%20Farke%20as%20manager%20on%20four-year%20deal\" class=\"ncpost-share-link ncpost-share-link--facebook\" target=\"_blank\" rel=\"noreferrer\" title=\"Share on Facebook\" style=\"margin: 0px; padding: 0px; fill: inherit; color: var(--post-link-color); text-decoration-line: var(--post-link-underline); text-decoration-thickness: 1px; align-items: center; cursor: pointer; display: flex; height: 30px; justify-content: center; position: relative; top: 1px; width: 30px; font-weight: 700; text-underline-offset: 1px;\"><svg viewBox=\"0 0 32 32\" aria-hidden=\"true\" focusable=\"false\"><path d=\"m31.65 16c0 8.6433-7.0067 15.65-15.65 15.65-8.64326 0-15.65-7.0067-15.65-15.65 0-8.64326 7.00674-15.65 15.65-15.65 8.6433 0 15.65 7.00674 15.65 15.65z\"></path><path d=\"m21 10.0692v-2.73376c-2.8261-.84117-6.9565-.21029-6.9565 3.15436v3.3647h-3.0435v3.3647h3.0435v7.7808h3.6956v-7.7808h2.6087l.4348-3.3647h-3.2609v-2.3132c0-1.68235 2.3913-1.4721 3.4783-1.4721z\"></path></svg></a><a href=\"https://twitter.com/intent/tweet?text=Leeds%20appoint%20Farke%20as%20manager%20on%20four-year%20deal&amp;url=https%3A%2F%2Fwww.skysports.com%2Ftransfer%2Fnews%2F12691%2F12476234%2Ftransfer-centre-harry-kane-declan-rice-david-de-gea-latest-updates%3Fpostid%3D6132228%23liveblog-body\" class=\"ncpost-share-link ncpost-share-link--twitter\" target=\"_blank\" rel=\"noreferrer\" title=\"Share on Twitter\" style=\"margin: 0px; padding: 0px; fill: inherit; color: var(--post-link-color); text-decoration-line: var(--post-link-underline); text-decoration-thickness: 1px; align-items: center; cursor: pointer; display: flex; height: 30px; justify-content: center; position: relative; top: 1px; width: 30px; font-weight: 700; text-underline-offset: 1px;\"><svg viewBox=\"0 0 32 32\" aria-hidden=\"true\" focusable=\"false\"><path d=\"M31.65 16C31.65 24.6433 24.6433 31.65 16 31.65C7.35674 31.65 0.35 24.6433 0.35 16C0.35 7.35674 7.35674 0.35 16 0.35C24.6433 0.35 31.65 7.35674 31.65 16Z\"></path><path d=\"M24.55 9.30805C23.875 9.52131 22.975 9.94784 22.075 10.1611C20.5 7.8152 15.325 9.09478 15.775 13.3601C12.175 13.1468 10.6 11.8672 8.125 9.73457C7.225 12.0805 7.45 13.1468 9.25 14.2131C8.575 14.4264 8.125 14.2131 7.675 13.9998C7.675 15.7059 9.025 17.1988 10.6 17.4121C10.15 17.6253 9.475 17.4121 9.025 17.4121C9.25 18.9049 10.825 19.758 12.4 19.9712C11.275 21.0375 8.575 21.4641 7 21.4641L7.225 21.6773C13.3 25.0895 22.075 21.6773 23.2 13.9998C23.2 13.5733 23.2 12.9335 23.2 12.507C23.65 12.0805 24.775 11.2274 25 10.5876C24.55 10.8009 23.65 11.0142 22.975 11.2274C23.65 10.5876 24.325 9.94784 24.55 9.30805Z\"></path></svg></a><a href=\"mailto:?to=&amp;subject=Leeds%20appoint%20Farke%20as%20manager%20on%20four-year%20deal&amp;body=Leeds%20appoint%20Farke%20as%20manager%20on%20four-year%20deal%20-%20https%3A%2F%2Fwww.skysports.com%2Ftransfer%2Fnews%2F12691%2F12476234%2Ftransfer-centre-harry-kane-declan-rice-david-de-gea-latest-updates%3Fpostid%3D6132228%23liveblog-body\" class=\"ncpost-share-link ncpost-share-link--email\" target=\"_blank\" rel=\"noreferrer\" title=\"Share by email\" style=\"margin: 0px; padding: 0px; fill: inherit; color: var(--post-link-color); text-decoration-line: var(--post-link-underline); text-decoration-thickness: 1px; align-items: center; cursor: pointer; display: flex; height: 30px; justify-content: center; position: relative; top: 1px; width: 30px; font-weight: 700; text-underline-offset: 1px;\"><svg viewBox=\"0 0 32 32\" aria-hidden=\"true\" focusable=\"false\"><path d=\"m31.65 16c0 8.6433-7.0067 15.65-15.65 15.65-8.64326 0-15.65-7.0067-15.65-15.65 0-8.64326 7.00674-15.65 15.65-15.65 8.6433 0 15.65 7.00674 15.65 15.65z\"></path><path d=\"m8.575 10h14.85c.225 0 .225.2143.45.2143-.9.8571-6.3 7.0714-7.875 7.0714-1.8 0-7.2-6.2143-7.875-7.0714.225 0 .225-.2143.45-.2143zm16.2 1.0714c.225.2143.225.2143.225.4286v9 .4286c-.675-.4286-2.925-3-4.95-4.9286 2.25-1.9286 4.275-4.2857 4.725-4.9286zm-.9 10.9286c-.225 0-.225 0-.45 0h-14.85c-.225 0-.45 0-.45 0 .225-.2143 2.475-3 4.725-5.1429 1.125 1.0715 2.25 1.7143 3.15 1.7143.675 0 1.8-.6428 2.925-1.7143 2.25 2.1429 4.725 4.7143 4.95 5.1429zm-16.875-1.0714s0-.2143 0-.4286v-9c0-.2143 0-.2143 0-.4286.675.6429 2.7 3 4.725 4.9286-2.025 1.9286-4.05 4.2857-4.725 4.9286z\"></path></svg></a><a href=\"https://www.skysports.com/transfer/news/12691/12476234/transfer-centre-harry-kane-declan-rice-david-de-gea-latest-updates?postid=6132228#liveblog-body\" class=\"ncpost-share-link ncpost-share-link--copy\" target=\"_blank\" rel=\"noreferrer\" data-title=\"Copy link\" style=\"margin: 0px; padding: 0px; fill: inherit; color: var(--post-link-color); text-decoration-line: var(--post-link-underline); text-decoration-thickness: 1px; align-items: center; cursor: pointer; display: flex; height: 30px; justify-content: center; position: relative; top: 1px; width: 30px; font-weight: 700; text-underline-offset: 1px;\"><svg viewBox=\"0 0 32 32\" aria-hidden=\"true\" focusable=\"false\"><path d=\"m31.65 16c0 8.6433-7.0067 15.65-15.65 15.65-8.64326 0-15.65-7.0067-15.65-15.65 0-8.64326 7.00674-15.65 15.65-15.65 8.6433 0 15.65 7.00674 15.65 15.65z\"></path><path d=\"m14.6449 13.9043c1.3225-.8112 2.9263-.8177 4.213-.1581l.3004.154-1.8042 1.1131-.0722-.0107c-.5766-.0858-1.1851.0068-1.7103.3329l-5.67562 3.4944c-1.16217.7106-1.51125 2.2181-.78406 3.3481.73437 1.1309 2.27078 1.4765 3.43298.7598l5.675-3.494c.5265-.3208.8814-.812 1.0433-1.3597l.0206-.0699 1.8053-1.1138.0132.3312c.0563 1.416-.6469 2.8321-1.9626 3.6435l-5.675 3.494c-1.9633 1.2103-4.57935.6258-5.81734-1.2921-1.23824-1.9182-.64748-4.4751 1.32243-5.6852z\"></path><path d=\"m18.5288 7.63089c1.9697-1.20993 4.5857-.62581 5.8238 1.29227 1.2383 1.91824.6475 4.47494-1.3222 5.68504l-5.675 3.4941c-1.3225.8112-2.9266.8179-4.2133.1583l-.3004-.154 1.8041-1.1131.072.0106c.5835.0858 1.1854-.0067 1.7106-.3329l5.6751-3.494c1.1573-.7178 1.511-2.2258.7781-3.35473-.7343-1.1311-2.2709-1.47691-3.4332-.76015l-5.675 3.49408c-.525.3199-.8749.8171-1.0441 1.3621l-.0211.0682-1.8041 1.113-.0131-.3312c-.0563-1.4159.6469-2.832 1.9626-3.6434z\"></path></svg><div class=\"ncpost-share-link-tooltip\" data-copied-text=\"Link copied!\" style=\"font-size: 13px; margin: 0px; padding: 4px 6px; background: var(--component-shade); border-radius: 5px; bottom: 30.5938px; color: var(--text-color); content: var(--post-share-label-copy); opacity: 0; pointer-events: none; position: absolute; right: -8px; text-wrap: nowrap;\">C</div></a></div></div>', '1688493584.jpg', 0, '2023-07-04 16:59:44', '2023-07-04 16:59:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(7) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `lga` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('100','200') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '200',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `gender`, `dob`, `lga`, `phone`, `school`, `image`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ED6I4TMqjzgx414.q2SoU.sUKrNdhHcAWWksfvBbMhskAtP.GYDYG', '100', NULL, '2023-07-03 15:45:42', '2023-07-03 15:45:42'),
(2, 'Igbashio Kalifort Kashimana', 'kalifort@gmail.com', 'Female', '2007-01-01', 'Kurmi', '07018277223', 'Taraba State university', '1688556099.jpg', NULL, '$2y$10$.egUh4Q8fKU4RF7N3GCqP.5G2mwkD/FtYr2ol5t8wHpVVwA6ipX/6', '200', NULL, '2023-07-05 05:41:40', '2023-07-05 10:21:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
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
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
