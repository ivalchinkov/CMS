-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2020 at 04:53 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_author` varchar(50) NOT NULL,
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

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(77, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 11:35:40', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 1),
(79, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-14 22:01:27', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(80, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 10:47:20', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(81, 31, 'CMS test', 'MImi', '2020-12-15 10:57:52', 'christina-wocintechchat-com-F75IfIWSqRY-unsplash.jpg', '<p>tetsing pagination</p>', 'CMS, Learning, Technologies, ', 0, 'published', 0),
(82, 33, 'Tutorial', 'Ivaylo Valchinkov', '2020-12-15 10:58:32', 'christina-wocintechchat-com-9-ohfp-Dicg-unsplash.jpg', '<p>PHP pp</p>', 'PHP, MySQL, Bootstrap', 0, 'published', 0),
(83, 33, 'Processing', 'cat', '2020-12-15 10:59:09', 'loan-7AIDE8PrvA0-unsplash.jpg', '<p>cat post</p>', 'post', 0, 'published', 0),
(84, 33, 'Processing', 'cat', '2020-12-15 10:59:21', 'loan-7AIDE8PrvA0-unsplash.jpg', '<p>cat post</p>', 'post', 0, 'published', 0),
(85, 33, 'Tutorial', 'Ivaylo Valchinkov', '2020-12-15 10:59:21', 'christina-wocintechchat-com-9-ohfp-Dicg-unsplash.jpg', '<p>PHP pp</p>', 'PHP, MySQL, Bootstrap', 0, 'published', 0),
(86, 31, 'CMS test', 'MImi', '2020-12-15 10:59:21', 'christina-wocintechchat-com-F75IfIWSqRY-unsplash.jpg', '<p>tetsing pagination</p>', 'CMS, Learning, Technologies, ', 0, 'published', 0),
(87, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 11:23:33', 'thom-XyNi3rUEReE-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(88, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:14:23', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 4),
(89, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 11:23:14', 'luca-bravo-XJXWbfSo2f0-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(90, 33, 'Processing', 'cat', '2020-12-15 11:03:14', 'loan-7AIDE8PrvA0-unsplash.jpg', '<p>cat post</p>', 'post', 0, 'published', 0),
(91, 33, 'Tutorial', 'Ivaylo Valchinkov', '2020-12-15 11:03:15', 'christina-wocintechchat-com-9-ohfp-Dicg-unsplash.jpg', '<p>PHP pp</p>', 'PHP, MySQL, Bootstrap', 0, 'published', 0),
(92, 31, 'CMS test', 'MImi', '2020-12-15 11:03:15', 'christina-wocintechchat-com-F75IfIWSqRY-unsplash.jpg', '<p>tetsing pagination</p>', 'CMS, Learning, Technologies, ', 0, 'published', 0),
(93, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 11:03:15', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(94, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 11:03:15', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(95, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:06:00', 'ben-Bj6ENZDMSDY-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 1),
(96, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'ben-Bj6ENZDMSDY-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(97, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(98, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(99, 31, 'CMS test', 'MImi', '2020-12-15 12:32:16', 'christina-wocintechchat-com-F75IfIWSqRY-unsplash.jpg', '<p>tetsing pagination</p>', 'CMS, Learning, Technologies, ', 0, 'published', 0),
(100, 33, 'Tutorial', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-9-ohfp-Dicg-unsplash.jpg', '<p>PHP pp</p>', 'PHP, MySQL, Bootstrap', 0, 'published', 0),
(101, 33, 'Processing', 'cat', '2020-12-15 12:32:16', 'loan-7AIDE8PrvA0-unsplash.jpg', '<p>cat post</p>', 'post', 0, 'published', 0),
(102, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'luca-bravo-XJXWbfSo2f0-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(103, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(104, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'thom-XyNi3rUEReE-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(105, 31, 'CMS test', 'MImi', '2020-12-15 12:32:16', 'christina-wocintechchat-com-F75IfIWSqRY-unsplash.jpg', '<p>tetsing pagination</p>', 'CMS, Learning, Technologies, ', 0, 'published', 0),
(106, 33, 'Tutorial', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-9-ohfp-Dicg-unsplash.jpg', '<p>PHP pp</p>', 'PHP, MySQL, Bootstrap', 0, 'published', 0),
(107, 33, 'Processing', 'cat', '2020-12-15 12:32:16', 'loan-7AIDE8PrvA0-unsplash.jpg', '<p>cat post</p>', 'post', 0, 'published', 0),
(108, 33, 'Processing', 'cat', '2020-12-15 12:32:16', 'loan-7AIDE8PrvA0-unsplash.jpg', '<p>cat post</p>', 'post', 0, 'published', 0),
(109, 33, 'Tutorial', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-9-ohfp-Dicg-unsplash.jpg', '<p>PHP pp</p>', 'PHP, MySQL, Bootstrap', 0, 'published', 0),
(110, 31, 'CMS test', 'MImi', '2020-12-15 12:32:16', 'christina-wocintechchat-com-F75IfIWSqRY-unsplash.jpg', '<p>tetsing pagination</p>', 'CMS, Learning, Technologies, ', 0, 'published', 0),
(111, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(112, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0),
(113, 30, 'CMS test', 'Ivaylo Valchinkov', '2020-12-15 12:32:16', 'christina-wocintechchat-com-L85a1k-XqH8-unsplash.jpg', '<p>testing</p>', 'PHP, MySQL, Bootstrap, Test', 0, 'published', 0);

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
(4, 'Maria', '$2y$10$iusesomecrazystrings2uVvlyU2UIRwnPdXCmMhFVDuffwDEM7IW', 'Maria', 'Valchinkova', 'mimiv@abv.bg', '', 'Admin', '$2y$10$iusesomecrazystrings22'),
(23, 'scoobydoo', '$2y$10$iusesomecrazystrings2uVvlyU2UIRwnPdXCmMhFVDuffwDEM7IW', '', '', 'scoobydoo@yahoo.com', '', 'Admin', '$2y$10$iusesomecrazystrings22');

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
(10, 'oj0hd4kev6sbf7296jqrp9uk40', 1608034986);

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
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `user_online_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
