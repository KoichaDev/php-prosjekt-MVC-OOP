-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2020 at 03:52 PM
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
(246, 1, 13, 'Super Admin', 1, 'Hello!', '2020-05-22 23:32:02'),
(247, 3, 13, 'Super Admin', 3, 'Yooo', '2020-05-22 23:32:17'),
(248, 1, 13, 'Super Admin', 1, 'Dritt post', '2020-05-23 18:36:30');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_post_id` int(11) NOT NULL,
  `event_invite_member_id` int(11) NOT NULL,
  `event_add_members_username` varchar(255) NOT NULL,
  `event_author_id` int(11) NOT NULL,
  `event_author_post` varchar(255) NOT NULL,
  `event_image` text NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_text` text NOT NULL,
  `event_created` datetime NOT NULL DEFAULT current_timestamp(),
  `event_going` varchar(255) NOT NULL,
  `event_not_going` varchar(255) NOT NULL,
  `event_interested` varchar(255) NOT NULL,
  `event_pending` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_post_id`, `event_invite_member_id`, `event_add_members_username`, `event_author_id`, `event_author_post`, `event_image`, `event_title`, `event_text`, `event_created`, `event_going`, `event_not_going`, `event_interested`, `event_pending`) VALUES
(1, 0, '0', 13, 'Super Admin', 'https://images.unsplash.com/photo-1523580494863-6f3031224c94?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', 'adasd', 'asdasdasd', '2020-05-18 00:00:00', '', '', '', ''),
(9, 21, 'user@gmail.com', 13, 'Super Admin', 'https://images.unsplash.com/photo-1529835299686-53bd13fb3ee1?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', 'sadasdasd', 'sadasd', '2020-05-18 00:00:00', '', '', '', '');

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
(1, 13, 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', 'Blog # 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempor dignissim elit, ac interdum ante fermentum nec. Etiam et bibendum lectus, vitae pulvinar felis. Fusce placerat facilisis ex, nec faucibus velit dictum at. Morbi dapibus purus nec cursus tempor. Pellentesque pharetra lectus eu erat bibendum, non porttitor sapien tristique. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam ac mauris ligula. Nunc tellus nisi, varius ac enim consequat, rhoncus convallis risus. Sed id porttitor libero, sed tristique mi. Vivamus aliquet feugiat lorem vel accumsan. Proin molestie risus quis nisi pulvinar fringilla. Integer eu dapibus arcu. Pellentesque placerat lectus convallis ante sollicitudin, eu convallis metus scelerisque. Nulla eu convallis massa. Curabitur sit amet tempus eros. Maecenas vitae suscipit felis.\r\n\r\nAliquam eget lectus accumsan, posuere ante et, ultricies felis. Maecenas a maximus lacus, nec dictum purus. Maecenas mollis ut sem nec porta. Ut bibendum tristique leo, quis pharetra leo feugiat eget. Curabitur nec maximus metus. Ut suscipit mi quis tempus ornare. Vivamus tempus iaculis elit nec rutrum. Aliquam id convallis nibh. Sed commodo sapien nec commodo ullamcorper. Sed eu quam vitae velit faucibus imperdiet et vitae eros. Pellentesque at ullamcorper velit, at interdum eros. Fusce arcu libero, posuere at accumsan vitae, consectetur et mauris. Fusce eleifend mi et nunc sollicitudin consequat. Aliquam mollis eleifend ultricies. Phasellus vel purus ac risus convallis ullamcorper nec eu lectus.', 'Test', '2020-05-12 00:00:00'),
(2, 13, 'https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80', 'Lorem', 'Lorem Ipsum', 'Jimmy', '2020-05-12 00:00:00'),
(3, 21, 'https://images.unsplash.com/photo-1472653431158-6364773b2a56?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1049&q=80', 'Blog #3', 'helloo wooorld', 'Test', '2020-05-12 00:00:00'),
(22, 21, '', 'guest again', 'guuuest writing this', '', '2020-05-17 00:00:00'),
(23, 13, '', 'Admin typing here!', 'I am admin typing this post', '', '2020-05-17 00:00:00'),
(24, 21, '', 'Blogg Post # 99999', 'hei hei hei', '', '2020-05-18 00:00:00'),
(25, 13, '', 'sadsad', 'sadsadsad', '', '2020-05-18 00:00:00');

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
(1, 13, 213, 'This user is asshole!', 1, '2020-05-22 23:08:55'),
(2, 21, 203, 'This user is shit!', 1, '2020-05-22 23:15:34'),
(3, 13, 247, 'You suck!', 1, '2020-05-22 23:32:38'),
(4, 13, 248, 'Slem post!', 1, '2020-05-23 18:36:41');

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
(13, 'https://www.w3schools.com/howto/img_avatar.png', 'Super Admin', 'admin@gmail.com', '$2y$10$RzYJR3mt8boCHe3Rq5QJYOiouppu6MdNPJ5BHig/k.9Tkpoy9hf2u', '2020-05-13 19:13:34', 'admin', 'unbanned', 'enabled'),
(21, 'https://www.w3schools.com/howto/img_avatar2.png', 'Just User', 'user@gmail.com', '$2y$10$Ojs5zgcgnAaCXR/Py6AYeOW/x6N/lk9wKAY8B0xF1UvyffVmB168y', '2020-05-15 01:51:29', 'regular', 'unbanned', 'enabled');

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
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `report_users`
--
ALTER TABLE `report_users`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
