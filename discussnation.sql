-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2023 at 08:55 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `discussnation`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_description` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `category_description`, `createdAt`) VALUES
(1, 'Javascript', 'JavaScript (JS) is a lightweight, interpreted, or just-in-time compiled programming language with first-class functions. While it is most well-known as the scripting language for Web pages, many non-browser environments also use it, such as Node.js, Apach', '2023-02-20 18:42:26'),
(2, 'Python', 'Python is a high-level, general-purpose programming language. Its design philosophy emphasizes code readability with the use of significant indentation.', '2023-02-20 18:44:27'),
(3, 'Django', 'Django is a free and open-source, Python-based web framework that follows the model–template–views architectural pattern. It is maintained by the Django Software Foundation, an independent organization established in the US as a 501 non-profit. ', '2023-03-02 15:49:11'),
(4, 'PHP', 'PHP is a general-purpose scripting language geared toward web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1993 and released in 1995.', '2023-03-02 15:49:41');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(7) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_by` int(11) NOT NULL,
  `thread_id` int(7) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_content`, `comment_by`, `thread_id`, `createdAt`) VALUES
(1, 'try exploring api docs', 4, 1, '2023-03-12 10:53:22'),
(2, 'hello Kunj', 5, 2, '2023-03-12 11:06:57'),
(3, 'hello', 2, 2, '2023-03-12 11:09:18'),
(4, 'try breaking up with your gf\r\n', 3, 1, '2023-03-12 11:09:42'),
(5, 'kunj', 6, 1, '2023-03-13 08:11:37'),
(6, 'hello\r\n', 4, 1, '2023-03-13 08:20:44'),
(7, 'hello', 6, 7, '2023-03-13 08:41:19'),
(8, 'hello', 7, 9, '2023-03-13 08:41:29'),
(9, 'Lorem Ipsum is simply dummy text of the printing and typ', 2, 9, '2023-03-13 08:42:07'),
(10, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 5, 1, '2023-03-13 08:43:06'),
(16, 'sdahflasdhfjfh', 6, 1, '2023-03-13 09:14:39'),
(22, 'Easily realign text to components with text alignment classes. For start, end, and center alignment, responsive classes are available that use the same viewport width breakpoints as the grid system.', 6, 1, '2023-03-13 09:20:45'),
(23, 'hello nigger', 2, 8, '2023-03-16 13:43:01'),
(29, 'ha\r\n', 13, 43, '2023-03-19 16:22:47'),
(34, 'she left me when i specifically asked her not to\r\n', 13, 43, '2023-03-19 16:26:14'),
(35, 'could you be more lonely?', 7, 43, '2023-03-19 16:26:38'),
(36, '&lt;script&gt; alert(\"hello\") &lt;/script&gt;', 13, 44, '2023-03-20 16:13:56');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `thread_id` int(7) NOT NULL,
  `thread_title` varchar(255) NOT NULL,
  `thread_desc` text NOT NULL,
  `thread_cat_id` int(7) NOT NULL,
  `thread_user_id` int(7) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`thread_id`, `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `createdAt`) VALUES
(32, 'ex', 'demanding too much money ', 1, 7, '2023-03-17 16:42:50'),
(33, 'problem no.1', 'hello\r\n', 1, 1, '2023-03-17 16:47:26'),
(34, 'problem no.1', 'hello\r\n', 1, 1, '2023-03-17 16:47:29'),
(35, 'problem no.1', 'hello\r\n', 1, 7, '2023-03-17 16:47:56'),
(36, 'us moment nahi ho raha', 'dukh dard kasht pida', 2, 1, '2023-03-17 16:51:19'),
(40, 'hello', 'hello3', 2, 7, '2023-03-19 16:08:22'),
(41, 'hello', 'hello3', 2, 7, '2023-03-19 16:08:37'),
(42, 'hello', 'hello3', 2, 7, '2023-03-19 16:08:59'),
(43, 'this is very hard', 'thats what she said', 3, 13, '2023-03-19 16:11:00'),
(44, '&lt;script&gt; alert(\"hello\") &lt;/script&gt;', '&lt;script&gt; alert(\"hello\") &lt;/script&gt;', 1, 13, '2023-03-20 16:13:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sno` int(7) NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `user_email`, `user_pass`, `createdAt`) VALUES
(1, 'jim@theoffice.com', 'pam', '0000-00-00 00:00:00'),
(3, 'kunj@kunj.com', '$2y$10$y7KkdVjXQ7wx74lbuVkf0uErjwmRtgHxvhUg5FCK6hLc1jlOe9iHG', '2023-03-13 16:43:26'),
(4, 'hello@world.co', '$2y$10$l4gwW6NMTt038bkJCWOn0OKsNefgr4jpO8fztsCQ1nYlkYfH8kVya', '2023-03-13 16:47:07'),
(5, 'kunj@hello.com', '$2y$10$U.P3bRS4MFU.9cU.17k7DeV0rDvNQuSl39hx1A7E89zVvL//oa3di', '2023-03-13 18:05:54'),
(6, '123@gmail.com', '$2y$10$wvh1BCschW9S1CqdELagW.bfQXKGBxrArgPZXBcoBSY00OGYa5Lyy', '2023-03-13 18:06:09'),
(7, 'chandler@friends.com', '$2y$10$JjlpgTcDLTnIY9ZjTxDLFuZetoGnd7h0BDyA3dSnuvJRkP3T8AWXq', '2023-03-14 08:11:20'),
(12, '', '$2y$10$PCymeJRRsJwCjgNjdg6djutPocE121w63FOky5E6ywjMdHEHQsw4q', '2023-03-17 16:07:40'),
(13, 'micheal@theoffice.com', '$2y$10$no/aeLXBXiym/L7lKWXy9.soQgmf2ccMXdEjyQQnlUvxPBsftiwDG', '2023-03-19 16:10:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`thread_id`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title` (`thread_title`,`thread_desc`);
ALTER TABLE `threads` ADD FULLTEXT KEY `thread_title_2` (`thread_title`,`thread_desc`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `thread_id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sno` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
