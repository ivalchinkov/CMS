-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 11:14 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(30, 'PHP'),
(31, 'CMS'),
(32, 'Bootstrap'),
(33, 'Procedural programming');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(100) NOT NULL,
  `comment_email` varchar(100) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(100) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(20, 77, 'Ivaylo', 'i.valchinkov@abv.bg', '<p>Cyrly girl.</p>', 'Approved', '2020-12-17'),
(21, 81, 'Ivaylo', 'i.valchinkov@abv.bg', '<p>Nice laptop.</p>', 'Approved', '2020-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_author` varchar(50) NOT NULL,
  `post_user` varchar(100) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(118, 30, 'CMS', '', 'scoobydoo', '2020-12-18 13:21:25', 'thom-XyNi3rUEReE-unsplash.jpg', '<p>post.</p>', 'CMS, Learning, Technologies, ', 0, 'published', 2),
(119, 31, 'CMS', '', 'Maria', '2020-12-18 13:50:40', 'christina-wocintechchat-com-F75IfIWSqRY-unsplash.jpg', '<p>CMS</p>', 'CMS, Learning, Technologies, ', 0, 'published', 0),
(122, 32, 'Tutorial', '', 'Maria', '2020-12-18 14:23:53', 'christina-wocintechchat-com-9-ohfp-Dicg-unsplash.jpg', '<p>test</p>', 'PHP, MySQL, Bootstrap,Test', 0, 'published', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_first_name` varchar(100) NOT NULL,
  `user_last_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `rand_salt` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_first_name`, `user_last_name`, `user_email`, `user_image`, `user_role`, `rand_salt`) VALUES
(23, 'scoobydoo', '$2y$10$b0W5wBvGFp76BNvrmRHU4uxLE69tE6FwGqWDvStoPRv9ZfBZNyHFa', 'Scooby', 'Doo', 'scoobydoo@yahoo.com', '', 'Admin', '$2y$10$iusesomecrazystrings22'),
(27, 'Maria', '$2y$10$EzIOVFyKCeHe6W5Qyyauge3rGphWrPAGoDvKAW8JSo5mZ0ARu8t.y', 'Maria', 'Valchinkova', 'mimiv@abv.bg', '', 'Admin', '$2y$10$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `user_online_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`user_online_id`, `session`, `time`) VALUES
(1, '', 1608031521),
(2, '0kohk7euantg4ltr09i6ns1t6k', 1608035147),
(3, '06jl72rt9pnrait9v08ek47ir2', 1608032878),
(4, '2lgcg5ei5evo5jd69mcipan11e', 1608032898),
(5, 'bktaurkjg4sae5ds69fbtq0eqv', 1608033107),
(6, '7701b8qnarogc8as5uunu9hpl3', 1608033914),
(7, 'pb701ecobgfdr8osvn7p5tmm0v', 1608034951),
(8, 'jhote0a41can4nlfev3b1phigg', 1608034957),
(9, '2kahdfvhqor1jv2m6hbaf2imia', 1608034970),
(10, 'oj0hd4kev6sbf7296jqrp9uk40', 1608034986),
(11, 'ift59uojelk824sg1k3h4bqq5u', 1608309722),
(12, 'djk1e2g133d979ljim6pga6hvc', 1608119211),
(13, 'um8jchdefui3vs5h1md3qgsouq', 1608119215),
(14, 'so21tupvo05tvt2md3uke9u60d', 1608119230),
(15, 'ai81432h3uhgtlovcr1783ji1a', 1608119232),
(16, 'plb7ko4bke3qoevls6g86qigpt', 1608119264),
(17, 'cle5oenrqou81pdfg2i4jgdh7f', 1608119267),
(18, 'b1prkpqekubmfiq63f7uf77cra', 1608119561),
(19, 'is6h2n0q1ieekvrhiaqi7pegei', 1608125334);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`user_online_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `user_online_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
