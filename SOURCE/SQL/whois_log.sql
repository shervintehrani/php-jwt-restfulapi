-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2025 at 12:35 PM
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
-- Database: `api`
--

-- --------------------------------------------------------

--
-- Table structure for table `whois_log`
--

CREATE TABLE `whois_log` (
  `log_id` int(11) NOT NULL,
  `domain_name` varchar(500) NOT NULL,
  `domain_updated_date` varchar(50) DEFAULT NULL,
  `domain_creation_date` varchar(50) DEFAULT NULL,
  `domain_registry_expiry_date` varchar(20) DEFAULT NULL,
  `ip` varchar(50) NOT NULL,
  `favicon_largest_path` varchar(500) DEFAULT NULL,
  `favicon_largest_width` varchar(100) DEFAULT NULL,
  `favicon_largest_height` varchar(100) DEFAULT NULL,
  `instagram` mediumtext DEFAULT NULL,
  `linkedin` mediumtext DEFAULT NULL,
  `twitter` mediumtext DEFAULT NULL,
  `youtube` mediumtext DEFAULT NULL,
  `facebook` mediumtext DEFAULT NULL,
  `telegram` mediumtext DEFAULT NULL,
  `aparat` mediumtext DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `data_center` varchar(300) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `edate` varchar(100) DEFAULT NULL,
  `pdate` varchar(20) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `lang` mediumtext DEFAULT NULL,
  `charset` varchar(50) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `author` varchar(200) DEFAULT NULL,
  `sitemap_xml` mediumtext DEFAULT NULL,
  `robots_txt` mediumtext DEFAULT NULL,
  `manifest_json` mediumtext DEFAULT NULL,
  `manifest` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `whois_log`
--

INSERT INTO `whois_log` (`log_id`, `domain_name`, `domain_updated_date`, `domain_creation_date`, `domain_registry_expiry_date`, `ip`, `favicon_largest_path`, `favicon_largest_width`, `favicon_largest_height`, `instagram`, `linkedin`, `twitter`, `youtube`, `facebook`, `telegram`, `aparat`, `province`, `city`, `data_center`, `timezone`, `edate`, `pdate`, `timestamp`, `lang`, `charset`, `title`, `description`, `keywords`, `author`, `sitemap_xml`, `robots_txt`, `manifest_json`, `manifest`) VALUES
(26, 'pagac.biz', NULL, '1988-10-26', NULL, '24.110.239.39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:33:10', '1398/10/17-22:33:10', '2020-01-07 19:03:10', NULL, NULL, 'Quos accusamus voluptatibus.', '', '', '', NULL, NULL, NULL, NULL),
(27, 'wisoky.com', NULL, '1990-12-11', NULL, '195.128.17.41', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:36:44', '1398/10/17-22:36:44', '2020-01-07 19:06:44', NULL, NULL, 'Ab perspiciatis voluptates dolores.', '', '', '', NULL, NULL, NULL, NULL),
(28, 'baumbach.info', NULL, '1995-06-25', NULL, '81.107.13.91', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:42:09', '1398/10/17-22:42:09', '2020-01-07 19:12:09', NULL, NULL, 'Aut tempora rem.', '', '', '', NULL, NULL, NULL, NULL),
(29, 'konopelski.info', NULL, '1995-05-18', NULL, '163.73.74.154', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:44:51', '1398/10/17-22:44:51', '2020-01-07 19:14:51', NULL, NULL, 'Numquam animi laborum et.', '', '', '', NULL, NULL, NULL, NULL),
(30, 'kreiger.net', NULL, '2006-01-29', NULL, '208.95.167.113', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:48:39', '1398/10/17-22:48:39', '2020-01-07 19:18:39', NULL, NULL, 'Eaque doloribus qui.', '', '', '', NULL, NULL, NULL, NULL),
(31, 'strosin.com', NULL, '2012-01-10', NULL, '167.26.177.57', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:49:32', '1398/10/17-22:49:32', '2020-01-07 19:19:32', NULL, NULL, 'Unde distinctio sunt.', '', '', '', NULL, NULL, NULL, NULL),
(32, 'kohler.com', NULL, '2008-01-02', NULL, '230.85.108.232', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:51:34', '1398/10/17-22:51:34', '2020-01-07 19:21:34', NULL, NULL, 'Consequatur et accusantium.', '', '', '', NULL, NULL, NULL, NULL),
(33, 'jacobi.net', NULL, '1994-07-14', NULL, '115.130.117.52', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:57:26', '1398/10/17-22:57:26', '2020-01-07 19:27:26', NULL, NULL, 'Impedit quaerat iusto accusamus.', '', '', '', NULL, NULL, NULL, NULL),
(34, 'haley.net', NULL, '1987-08-21', NULL, '150.201.154.45', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 22:58:31', '1398/10/17-22:58:31', '2020-01-07 19:28:31', NULL, NULL, 'Et sunt sint impedit.', '', '', '', NULL, NULL, NULL, NULL),
(35, 'bechtelar.biz', NULL, '1974-03-17', NULL, '40.100.241.120', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 23:01:11', '1398/10/17-23:01:11', '2020-01-07 19:31:11', NULL, NULL, 'Sunt sit et.', '', '', '', NULL, NULL, NULL, NULL),
(36, 'dooley.com', NULL, '1989-01-29', NULL, '14.17.170.178', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 23:02:01', '1398/10/17-23:02:01', '2020-01-07 19:32:01', NULL, NULL, 'Odit eum.', '', '', '', NULL, NULL, NULL, NULL),
(37, 'blanda.com', NULL, '2003-09-01', NULL, '5.182.70.68', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 07 23:05:57', '1398/10/17-23:05:57', '2020-01-07 19:35:57', NULL, NULL, 'Temporibus ad autem.', '', '', '', NULL, NULL, NULL, NULL),
(38, 'king.com', NULL, '1978-02-17', NULL, '83.94.23.14', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 08 07:17:06', '1398/10/18-07:17:06', '2020-01-08 03:47:06', NULL, NULL, 'Maiores vel id.', '', '', '', NULL, NULL, NULL, NULL),
(39, 'kilback.com', NULL, '2018-10-16', NULL, '179.63.215.67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 08 07:17:55', '1398/10/18-07:17:55', '2020-01-08 03:47:55', NULL, NULL, 'Sed illo non dolorum.', '', '', '', NULL, NULL, NULL, NULL),
(40, 'smitham.info', NULL, '1990-02-27', NULL, '30.55.249.83', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 08 15:39:24', '1398/10/18-15:39:24', '2020-01-08 12:09:24', NULL, NULL, 'Aliquid totam non vel.', '', '', '', NULL, NULL, NULL, NULL),
(41, 'graham.com', NULL, '1980-12-29', NULL, '79.230.87.22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 08 15:40:44', '1398/10/18-15:40:44', '2020-01-08 12:10:44', NULL, NULL, 'Molestiae qui ipsa aut.', '', '', '', NULL, NULL, NULL, NULL),
(42, 'wilderman.com', NULL, '2003-04-15', NULL, '11.220.169.212', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 11:58:38', '1398/10/19-11:58:38', '2020-01-09 08:28:38', NULL, NULL, 'Aliquid provident saepe magni.', '', '', '', NULL, NULL, NULL, NULL),
(43, 'harber.net', NULL, '1990-03-12', NULL, '239.111.137.67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 12:01:10', '1398/10/19-12:01:10', '2020-01-09 08:31:10', NULL, NULL, 'Iusto rerum et.', '', '', '', NULL, NULL, NULL, NULL),
(44, 'goldner.com', NULL, '1989-11-01', NULL, '62.108.188.106', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 12:02:07', '1398/10/19-12:02:07', '2020-01-09 08:32:07', NULL, NULL, 'Cum eum dolorem sunt.', '', '', '', NULL, NULL, NULL, NULL),
(45, 'howe.biz', NULL, '2009-03-18', NULL, '53.86.51.157', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 12:02:36', '1398/10/19-12:02:36', '2020-01-09 08:32:36', NULL, NULL, 'Sit deserunt accusamus sequi.', '', '', '', NULL, NULL, NULL, NULL),
(46, 'walter.net', NULL, '1990-04-15', NULL, '204.215.64.247', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 12:04:09', '1398/10/19-12:04:09', '2020-01-09 08:34:09', NULL, NULL, 'Rem et ut quia.', '', '', '', NULL, NULL, NULL, NULL),
(47, 'mckenzie.com', NULL, '1988-09-16', NULL, '198.129.210.125', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 12:05:05', '1398/10/19-12:05:05', '2020-01-09 08:35:05', NULL, NULL, 'Qui error.', '', '', '', NULL, NULL, NULL, NULL),
(48, 'barton.net', NULL, '1987-11-06', NULL, '83.239.231.167', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 12:11:15', '1398/10/19-12:11:15', '2020-01-09 08:41:15', NULL, NULL, 'Unde ut est magnam beatae.', '', '', '', NULL, NULL, NULL, NULL),
(49, 'mueller.com', NULL, '1976-05-26', NULL, '210.65.43.114', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 12:12:11', '1398/10/19-12:12:11', '2020-01-09 08:42:11', NULL, NULL, 'Mollitia quo recusandae.', '', '', '', NULL, NULL, NULL, NULL),
(50, 'rutherford.net', NULL, '2016-10-04', NULL, '142.194.180.170', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '2020 01 09 18:30:28', '1398/10/19-18:30:28', '2020-01-09 15:00:28', NULL, NULL, 'Tempore odio molestiae.', '', '', '', NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `whois_log`
--
ALTER TABLE `whois_log`
  ADD PRIMARY KEY (`log_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `whois_log`
--
ALTER TABLE `whois_log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5232;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
