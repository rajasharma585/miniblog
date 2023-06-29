-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 07:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `miniblog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(255) DEFAULT NULL,
  `blog_desc` text DEFAULT NULL,
  `blog_img` varchar(300) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>Published 0=>Unpublished',
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='Stores Data';

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `blog_title`, `blog_desc`, `blog_img`, `status`, `created_on`, `updated_on`) VALUES
(9, 'BLOG TEST WITH CKEDITOR', '<h3>HI I AM BLOG DESCRIPTION FROM CKEDITOR</h3>\r\n\r\n<p>ANYTHING</p>\r\n\r\n<p><del><span class=\"marker\">JUST FOR TESTING</span></del></p>\r\n', 'assests/upload/blogimg/BeautyPlus_20201107141741320_save2.jpg', 1, '2023-06-28 10:03:15', '2023-06-29 02:18:24'),
(10, 'just testing blog website', '<h2 style=\"font-style:italic\">blogging website created language used html css bootstrap js ajax php codeignitor mysql</h2>\r\n', 'assests/upload/blogimg/BeautyPlus_20200818150204769_save1.jpg', 1, '2023-06-29 02:09:58', '2023-06-29 02:14:53'),
(12, 'hello', '<p>how are you</p>\r\n', 'assests/upload/blogimg/BeautyPlus_20201206183808820_save.jpg', 1, '2023-06-29 03:14:32', '2023-06-29 03:15:15'),
(14, 'mr developer', '<p>Learn Coding Here ..</p>\r\n', 'assests/upload/blogimg/BeautyPlus_20201127233529501_save.jpg', 1, '2023-06-29 03:42:46', '2023-06-29 03:43:20');

-- --------------------------------------------------------

--
-- Table structure for table `backenduser`
--

CREATE TABLE `backenduser` (
  `uid` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1 COMMENT '1=>Active 0=>Blocked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `backenduser`
--

INSERT INTO `backenduser` (`uid`, `username`, `password`, `status`) VALUES
(1, 'admin', '123', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `backenduser`
--
ALTER TABLE `backenduser`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `backenduser`
--
ALTER TABLE `backenduser`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
