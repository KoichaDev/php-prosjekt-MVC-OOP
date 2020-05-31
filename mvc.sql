-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2020 at 12:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `blog_id` int(11) NOT NULL,
  `blog_post_id` int(11) NOT NULL,
  `blog_user_id` int(11) NOT NULL,
  `blog_user_name` varchar(255) NOT NULL,
  `blog_id_comments_from_post` int(11) NOT NULL,
  `blog_text` text NOT NULL,
  `blog_published_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`blog_id`, `blog_post_id`, `blog_user_id`, `blog_user_name`, `blog_id_comments_from_post`, `blog_text`, `blog_published_date`) VALUES
(251, 1, 21, 'Just User', 1, 'This is a comment from user@gmail.com', '2020-05-27 17:01:09'),
(252, 2, 102, 'test', 2, 'I am a user who wrote this blog comment', '2020-05-27 17:02:01'),
(253, 3, 102, 'test', 3, 'Another test@gmail.com writing this comment', '2020-05-27 17:02:13'),
(254, 1, 13, 'Super Admin', 1, 'This is admin writing here', '2020-05-27 17:02:29'),
(255, 2, 13, 'Super Admin', 2, 'fuck u', '2020-05-28 20:19:55'),
(256, 2, 13, 'Super Admin', 2, 'aisdjoasjdoasjdo', '2020-05-30 00:47:53'),
(257, 1, 21, 'Just User', 1, 'Jeg er user@gmail.com', '2020-05-30 00:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_post_id` int(11) NOT NULL,
  `event_author_id` int(11) NOT NULL,
  `event_author_post` varchar(255) NOT NULL,
  `event_image` text NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_text` text NOT NULL,
  `event_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_post_id`, `event_author_id`, `event_author_post`, `event_image`, `event_title`, `event_text`, `event_created`) VALUES
(521, 105, 'test', 'feat13-1140x855.jpg', 'Beautiful Fashion', 'This is A fashion post', '2020-05-28 02:20:54'),
(522, 105, 'test', 'graham-holtshausen-fUnfEz3VLv4-unsplash.jpg', 'Galaxy Event', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur in posuere magna. In ut velit tempor, interdum diam vel, scelerisque ante. Vestibulum tempus tellus urna, eget ornare quam tincidunt eu. Pellentesque varius eros eros, et lacinia ligula scelerisque a. Proin nec feugiat neque. Aliquam pellentesque enim eu enim tempor eleifend. Fusce sagittis tellus sit amet sem gravida, ut pharetra neque faucibus. Quisque eros diam, sollicitudin id tempus quis, efficitur sit amet turpis. Curabitur at euismod libero. Ut sit amet erat faucibus, pretium lorem nec, scelerisque erat. Pellentesque mattis, nulla consequat semper pretium, nulla augue malesuada urna, facilisis lacinia est libero vel justo. Mauris quis dolor ut nisi ultrices auctor ac nec sem. Nunc tellus mi, luctus eget vestibulum et, facilisis vitae nisl. Proin at neque sit amet risus cursus blandit.', '2020-05-28 02:23:07'),
(523, 13, 'Super Admin', 'graham-holtshausen-fUnfEz3VLv4-unsplash.jpg', '', '', '2020-05-28 02:37:13'),
(526, 13, 'Super Admin', '2020-05-29_18-20-11.png', 'hello world', 'Hello World', '2020-05-30 00:53:40'),
(527, 13, 'Super Admin', '2020-05-29_18-20-11.png', 'hello worlddddd', 'hello world', '2020-05-30 00:54:34');

-- --------------------------------------------------------

--
-- Table structure for table `event_users`
--

CREATE TABLE `event_users` (
  `event_user_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `event_id` int(11) NOT NULL,
  `event_status` enum('PENDING','GOING','INTERRESTED','NOT_GOING') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `event_users`
--

INSERT INTO `event_users` (`event_user_id`, `user_id`, `user_email`, `event_id`, `event_status`) VALUES
(14, 0, 'user@gmail.com', 521, 'PENDING'),
(15, 0, 'test@gmail.com', 521, 'INTERRESTED'),
(16, 0, 'admin@gmail.com', 522, 'INTERRESTED'),
(17, 0, 'women@gmail.com', 522, 'PENDING'),
(18, 0, 'user@gmail.com', 526, 'INTERRESTED'),
(19, 0, 'user@gmail.com', 527, 'NOT_GOING'),
(20, 0, 'test@gmail.com', 527, 'PENDING'),
(21, 0, '', 527, 'PENDING');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `msg_from_id_user` int(11) NOT NULL,
  `msg_from_user_email` varchar(255) NOT NULL,
  `msg_to_user_email` varchar(255) NOT NULL,
  `msg_title` varchar(255) NOT NULL,
  `msg_text` text NOT NULL,
  `msg_created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `msg_from_id_user`, `msg_from_user_email`, `msg_to_user_email`, `msg_title`, `msg_text`, `msg_created_at`) VALUES
(113, 13, 'admin@gmail.com', 'user@gmail.com', 'Admin typing here!', 'Yes, I am adming!', '2020-05-17 00:00:00'),
(115, 13, 'admin@gmail.com', 'user@gmail.com', 'hello world', 'Jeg sender deg melding', '2020-05-23 18:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `image` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `published_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `author_id`, `image`, `title`, `text`, `author`, `published_at`) VALUES
(1, 13, 'photo-1492684223066-81342ee5ff30.jfif', 'Blog # 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempor dignissim elit, ac interdum ante fermentum nec. Etiam et bibendum lectus, vitae pulvinar felis. Fusce placerat facilisis ex, nec faucibus velit dictum at. Morbi dapibus purus nec cursus tempor. Pellentesque pharetra lectus eu erat bibendum, non porttitor sapien tristique. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam ac mauris ligula. Nunc tellus nisi, varius ac enim consequat, rhoncus convallis risus. Sed id porttitor libero, sed tristique mi. Vivamus aliquet feugiat lorem vel accumsan. Proin molestie risus quis nisi pulvinar fringilla. Integer eu dapibus arcu. Pellentesque placerat lectus convallis ante sollicitudin, eu convallis metus scelerisque. Nulla eu convallis massa. Curabitur sit amet tempus eros. Maecenas vitae suscipit felis.\r\n\r\nAliquam eget lectus accumsan, posuere ante et, ultricies felis. Maecenas a maximus lacus, nec dictum purus. Maecenas mollis ut sem nec porta. Ut bibendum tristique leo, quis pharetra leo feugiat eget. Curabitur nec maximus metus. Ut suscipit mi quis tempus ornare. Vivamus tempus iaculis elit nec rutrum. Aliquam id convallis nibh. Sed commodo sapien nec commodo ullamcorper. Sed eu quam vitae velit faucibus imperdiet et vitae eros. Pellentesque at ullamcorper velit, at interdum eros. Fusce arcu libero, posuere at accumsan vitae, consectetur et mauris. Fusce eleifend mi et nunc sollicitudin consequat. Aliquam mollis eleifend ultricies. Phasellus vel purus ac risus convallis ullamcorper nec eu lectus.', 'Test', '2020-05-12 00:00:00'),
(2, 13, 'photo-1501281668745-f7f57925c3b4.jfif', 'Lorem', 'Lorem Ipsum', 'Jimmy', '2020-05-12 00:00:00'),
(3, 21, 'photo-1472653431158-6364773b2a56.jfif', 'Blog #3', 'helloo wooorld', 'Test', '2020-05-12 00:00:00'),
(22, 21, 'photo-1590542981619-227634a41617.jfif', 'guest again', 'guuuest writing this', '', '2020-05-17 00:00:00'),
(24, 21, 'photo-1590591061261-799077be8a31.jfif', 'Blogg Post # 99999', 'hei hei hei', '', '2020-05-18 00:00:00'),
(26, 13, 'photo-1523580494863-6f3031224c94.jfif', 'This is a new Image Post', 'Post here!', '', '2020-05-28 01:36:11');

-- --------------------------------------------------------

--
-- Table structure for table `report_users`
--

CREATE TABLE `report_users` (
  `report_id` int(11) NOT NULL,
  `report_user_id` int(11) NOT NULL,
  `report_from_post_id` int(11) NOT NULL,
  `report_reason` text NOT NULL,
  `report_count` int(11) NOT NULL,
  `report_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `report_users`
--

INSERT INTO `report_users` (`report_id`, `report_user_id`, `report_from_post_id`, `report_reason`, `report_count`, `report_date`) VALUES
(12, 13, 255, 'dritt!!!', 1, '2020-05-28 20:20:01'),
(13, 13, 255, 'Slem bruker', 1, '2020-05-30 00:48:07'),
(14, 21, 257, 'user@gmail.com fy fy', 1, '2020-05-30 00:50:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(255) NOT NULL DEFAULT 'regular',
  `status` varchar(255) NOT NULL,
  `active` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `password`, `created_at`, `role`, `status`, `active`) VALUES
(13, 'img_avatar_male.png', 'Super Admin', 'admin@gmail.com', '$2y$10$RzYJR3mt8boCHe3Rq5QJYOiouppu6MdNPJ5BHig/k.9Tkpoy9hf2u', '2020-05-13 19:13:34', 'admin', 'unbanned', 'enabled'),
(21, 'img_avatar_female.png', 'Just User', 'user@gmail.com', '$2y$10$Ojs5zgcgnAaCXR/Py6AYeOW/x6N/lk9wKAY8B0xF1UvyffVmB168y', '2020-05-15 01:51:29', 'regular', 'unbanned', 'enabled'),
(105, 'photo-1587613990051-1b291c1a7080.jpg', 'test', 'test@gmail.com', '$2y$10$xKEDH2mSxuu2ZcRMByZuce5ZLQbujckG8YPaQygMXbl0RbJaxg.Xe', '2020-05-27 20:15:09', 'regular', 'unbanned', 'enabled'),
(106, 'img_avatar_male.png', 'James Bond', 'bond@gmail.com', '$2y$10$EUXgTaQ.MpvPZmMc/gaFSO3KgCvt2CouKdeElp2fG9f.9xlY7yzJy', '2020-05-28 01:32:20', 'regular', 'unbanned', 'enabled'),
(107, 'img_avatar2.png', 'Wonder Women', 'women@gmail.com', '$2y$10$gErlNO2DQuj7Jy.LY5431eSgjfWrASY.RnV6SGmoLV1FyVF/wkSDK', '2020-05-28 01:32:33', 'regular', 'unbanned', 'enabled');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_post_id`);

--
-- Indexes for table `event_users`
--
ALTER TABLE `event_users`
  ADD PRIMARY KEY (`event_user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report_users`
--
ALTER TABLE `report_users`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=258;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;

--
-- AUTO_INCREMENT for table `event_users`
--
ALTER TABLE `event_users`
  MODIFY `event_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `report_users`
--
ALTER TABLE `report_users`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
