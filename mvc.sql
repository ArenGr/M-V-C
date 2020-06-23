-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2020 at 02:13 AM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `body` text CHARACTER SET utf8 NOT NULL,
  `date` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `seen` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_id`, `to_id`, `body`, `date`, `seen`) VALUES
(259, 125, 126, 'Hello, John', '2020-06-23 11:28:10.000000', 0),
(260, 125, 126, 'How are you?', '2020-06-23 11:29:41.000000', 0),
(261, 125, 126, 'How are you?', '2020-06-23 11:44:54.000000', 0),
(262, 125, 126, 'How are you?', '2020-06-23 11:47:18.000000', 0),
(263, 125, 126, 'How are you?', '2020-06-23 11:49:30.000000', 0),
(264, 125, 126, 'How are you?', '2020-06-23 11:50:45.000000', 0),
(265, 125, 126, 'How are you?', '2020-06-23 11:52:18.000000', 0),
(266, 126, 125, 'Hi Test, ', '2020-06-23 11:59:29.000000', 0),
(267, 126, 125, 'I am ok, ', '2020-06-23 11:59:42.000000', 0),
(268, 126, 125, 'I am ok, ', '2020-06-23 11:59:48.000000', 0),
(269, 125, 129, 'Hello, Jack', '2020-06-23 22:08:15.000000', 0),
(270, 125, 129, 'Hello, Jack', '2020-06-23 22:08:19.000000', 0),
(271, 129, 125, 'Hello test', '2020-06-23 22:08:46.000000', 0),
(272, 129, 125, 'Hello test', '2020-06-23 22:08:49.000000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `avatar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `email`, `password`, `avatar`) VALUES
(125, 'test', 'test@test.com', '098f6bcd4621d373cade4e832627b4f6', '1592719582836.jpg'),
(126, 'john', 'john@mail.ru', '527bd5b5d689e2c32ae974c6229ff785', '1592679993762.jpg'),
(127, 'bill', 'bill@gmail.com', 'e8375d7cd983efcbf956da5937050ffc', '1592680039546.jpg'),
(128, 'steve', 'steve@gmail.com', 'd69403e2673e611d4cbd3fad6fd1788e', '1592680087067.jpg'),
(129, 'jack', 'jack@gmail.com', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', '1592680137525.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=273;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
