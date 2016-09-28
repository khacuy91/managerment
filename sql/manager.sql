-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Apr 22, 2016 at 04:57 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_administrators`
--

CREATE TABLE `t_administrators` (
  `id` int(10) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_administrators`
--

INSERT INTO `t_administrators` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '25d55ad283aa400af464c76d713c07ad', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_day_off`
--

CREATE TABLE `t_day_off` (
  `id` int(10) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) NOT NULL,
  `other_leader_id` int(10) DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `judge_work` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_day_off`
--

INSERT INTO `t_day_off` (`id`, `full_name`, `user_id`, `other_leader_id`, `start_date`, `end_date`, `phone`, `judge_work`, `content`, `status`, `created`, `updated`) VALUES
(1, 'Nguyen Van A', 1, NULL, '2016/04/01 10:30 PM', '2016/04/02 10:30 PM', '', '', '', 0, '0000-00-00', '0000-00-00'),
(2, 'Nguyen Van A', 1, NULL, '0000-00-00', '0000-00-00', '0986941722', 'sasa', 'sas', 0, '2016-04-13', '0000-00-00'),
(3, 'Nguyen Van A', 1, NULL, '2016/04/14 10:30 PM', '2016/04/21 10:30 PM', '0986941722', 'a', 'a', 0, '2016-04-13', '0000-00-00'),
(4, 'Nguyen Van A', 1, NULL, '2016/04/14 12:00 AM', '2016/04/21 12:00 AM', '0986941722', 's', 's', 0, '2016-04-13', '0000-00-00'),
(5, 'Jenay', 2, NULL, '2016/04/14 08:15 AM', '2016/04/16 12:00 AM', '0986941722', 'a', 'a', 2, '2016-04-14', '0000-00-00'),
(9, 'Jenay', 2, NULL, '2016/04/15 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'adef', 'abc', 2, '2016-04-14', '0000-00-00'),
(10, 'Jenay', 2, NULL, '2016/04/14 09:58 AM', '2016/04/15 12:00 AM', '0986941722', 's', 's', 1, '2016-04-14', '0000-00-00'),
(11, 'Jenay', 2, NULL, '2016/04/14 09:29 AM', '2016/04/15 12:00 AM', '0986941722', 'v', 'v', 1, '2016-04-14', '0000-00-00'),
(12, 'Jenay', 2, NULL, '2016/04/15 11:00 PM', '2016/04/16 12:00 AM', '0986941722', 'iiiiiiiiiii', 'iiiii', 0, '2016-04-14', '2016-04-15'),
(13, 'Jenay', 2, NULL, '2016/05/01 12:00 AM', '2016/05/29 12:00 AM', '0986941722', 'l', 'l', 1, '2016-04-14', '0000-00-00'),
(15, 'Jenay', 2, NULL, '2016/04/15 12:00 AM', '2016/04/22 12:00 AM', '0986941722', 'ab', 'ab', 0, '2016-04-14', '0000-00-00'),
(16, 'Jenay', 2, 5, '2016/04/14 02:49 PM', '2016/04/16 12:00 AM', '0986941722', 'abab', 'aba', 1, '2016-04-14', '0000-00-00'),
(17, 'Jenay', 2, 0, '2016/04/15 03:09 PM', '2016/04/22 12:00 AM', '0986941722', 'ab', 'a', 0, '2016-04-15', '2016-04-15'),
(19, 'Jenay', 2, 0, '2016/04/16 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'khong anh huong gi', 'text', 0, '2016-04-15', '0000-00-00'),
(20, 'Jenay', 2, 0, '2016/04/15 03:18 PM', '2016/04/23 12:00 AM', '0924585252', 'text', 'text', 0, '2016-04-15', '0000-00-00'),
(21, 'Jenay', 2, 0, '2016/04/15 03:19 PM', '2016/04/23 12:00 AM', '0986941722', 'ds', 'ds', 0, '2016-04-15', '0000-00-00'),
(22, 'Jenay', 2, 0, '2016/04/15 03:20 PM', '2016/04/23 12:00 AM', '0986941722', 'dsa', 'taxt', 0, '2016-04-15', '0000-00-00'),
(23, 'Jenay', 2, 0, '2016/04/15 03:21 PM', '2016/04/23 03:21 PM', '0986941722', 'khong anh huong gi', 'day la doan text', 0, '2016-04-15', '0000-00-00'),
(24, 'Jenay', 2, 0, '2016/04/15 03:23 PM', '2016/04/22 03:23 PM', '0986941722', 'khong anh huong gi', 'day la doan text', 0, '2016-04-15', '0000-00-00'),
(25, 'Jenay', 2, 0, '2016/04/15 03:24 PM', '2016/04/23 12:00 AM', '0986941722', 'ababc', 'ababc', 0, '2016-04-15', '0000-00-00'),
(26, 'Jenay', 2, 4, '2016/04/28 12:00 AM', '2016/04/30 12:00 AM', '0986941722', 'terter', 'text', 0, '2016-04-15', '0000-00-00'),
(27, 'peter', 4, NULL, '2016/04/22 12:00 AM', '2016/04/29 12:00 AM', '0986941722', 'textr', 'text', 1, '2016-04-15', '0000-00-00'),
(28, 'Jenay', 2, 0, '2016/04/20 08:43 AM', '2016/04/21 12:00 AM', '0986941722', 'text new run as', 'text new run as', 0, '2016-04-20', '0000-00-00'),
(29, 'Jenay', 2, 0, '2016/04/21 12:00 AM', '2016/04/22 12:00 AM', '0986941722', 'dsdsdsdsds', 'dsd', 0, '2016-04-20', '0000-00-00'),
(30, 'Jenay', 2, 5, '2016/04/21 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'ddsadadas', 'sdasdsa', 0, '2016-04-20', '0000-00-00'),
(31, 'Jenay', 2, 4, '2016/04/21 12:00 AM', '2016/04/22 12:00 AM', '0986941722', 'ddsadadas', 'sdasdsa', 0, '2016-04-20', '0000-00-00'),
(32, 'Jenay', 2, 4, '2016/04/21 12:00 AM', '2016/04/29 12:00 AM', '0986941722', 'ffdsfdsfds', 'fd', 2, '2016-04-20', '0000-00-00'),
(33, 'peter', 4, NULL, '2016/04/20 11:00 AM', '2016/04/21 12:00 AM', '0986941722', 'leader', 'leadr', 1, '2016-04-20', '0000-00-00'),
(34, 'Jenay', 2, 0, '2016/04/21 12:00 AM', '2016/04/22 12:00 AM', '0986941722', 'zczxc', 'cxzcxzc', 0, '2016-04-20', '0000-00-00'),
(35, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'mailmoilaptucthio', 'mailmoialptuctyhi', 0, '2016-04-20', '0000-00-00'),
(36, 'Jenay', 2, 0, '2016/04/21 12:00 AM', '2016/04/29 12:00 AM', '0986941722', '22dsa', '222sda', 0, '2016-04-20', '0000-00-00'),
(37, 'Jenay', 2, 0, '2016/04/21 12:00 AM', '2016/04/29 12:00 AM', '0986941722', 'test lan 2', 'test lan 2', 0, '2016-04-20', '0000-00-00'),
(38, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'mailmoialptucthi', 'mailmoialptucthi', 0, '2016-04-20', '0000-00-00'),
(39, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'dsadasdas', 'dad', 0, '2016-04-20', '0000-00-00'),
(40, 'peter', 4, NULL, '2016/04/21 01:30 AM', '2016/04/29 12:00 AM', '0986941722', 'dsadasdasdas', 'dsad', 0, '2016-04-20', '0000-00-00'),
(41, 'peter', 4, NULL, '2016/04/20 03:17 PM', '2016/04/21 12:00 AM', '0986941722', 'dsadasdasdsadas', 'dsadas', 0, '2016-04-20', '0000-00-00'),
(42, 'peter', 4, NULL, '2016/04/22 12:00 AM', '2016/04/30 12:00 AM', '0924585252', 'dsa', 'dsa', 0, '2016-04-20', '0000-00-00'),
(43, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'd', 'd', 0, '2016-04-20', '0000-00-00'),
(44, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/29 12:00 AM', '0986941722', 'dsa', 'dsa', 0, '2016-04-20', '0000-00-00'),
(45, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/30 12:00 AM', '0986941722', 'dsadasdas', 'dsd', 0, '2016-04-20', '0000-00-00'),
(46, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/30 12:00 AM', '0986941722', 'fds', 'fdf', 0, '2016-04-20', '0000-00-00'),
(47, 'peter', 4, NULL, '2016/04/21 12:00 AM', '2016/04/28 12:00 AM', '0986941722', 'dsa', 'das', 0, '2016-04-20', '0000-00-00'),
(48, 'peter', 4, NULL, '2016/04/20 03:35 PM', '2016/04/22 12:00 AM', '0986941722', 'dsadsadas', '1ddd', 0, '2016-04-20', '0000-00-00'),
(49, 'peter', 4, NULL, '2016/04/22 12:00 AM', '2016/04/23 12:00 AM', '0986941722', 'fdsfds', 'fdsf', 0, '2016-04-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_projects`
--

CREATE TABLE `t_projects` (
  `id` int(111) NOT NULL,
  `team_id` int(10) NOT NULL,
  `leader_id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_projects`
--

INSERT INTO `t_projects` (`id`, `team_id`, `leader_id`, `name`, `start_date`, `end_date`, `description`, `status`, `created`, `updated`) VALUES
(1, 1, 5, 'Moss', '2016-04-01', '2016-04-06', '', 2, '0000-00-00', '0000-00-00'),
(2, 2, 3, 'Sle', '2016-04-07', '2016-04-22', '', 2, '0000-00-00', '0000-00-00'),
(3, 3, 4, 'Elea', '0000-00-00', '0000-00-00', '', 2, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_teams`
--

CREATE TABLE `t_teams` (
  `id` int(10) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_teams`
--

INSERT INTO `t_teams` (`id`, `name`, `description`, `status`, `created`, `updated`) VALUES
(1, 'Moss', 'this is a team moisss', 2, '2016-04-19', '0000-00-00'),
(2, 'Team demo', 'dsadsad', 2, '2016-04-19', '0000-00-00'),
(3, 'team3', 'team3', 2, '2016-04-19', '0000-00-00'),
(4, 'dsa', 'dsadsadsa', 0, '2016-04-20', '0000-00-00'),
(5, 'la ki', 'dadsa', 0, '2016-04-20', '0000-00-00'),
(6, 'nonono', 'ddasdsad', 0, '2016-04-20', '0000-00-00'),
(7, 'dsdsadas', 'dsadasdas', 0, '2016-04-20', '0000-00-00'),
(8, 'dsdsadas', 'dada', 0, '2016-04-20', '0000-00-00'),
(9, 'dsdsadas', 'fdsfdsfsd', 0, '2016-04-20', '0000-00-00'),
(10, 'dsad', 'dsadasdasd', 0, '2016-04-20', '0000-00-00'),
(11, 'f', 'f', 0, '2016-04-20', '0000-00-00'),
(12, 'adsad', 'dsadasd', 0, '2016-04-20', '0000-00-00'),
(13, 'dsadas', 'dsadasd', 0, '2016-04-20', '0000-00-00'),
(14, 'dsadasd', 'dsadas', 0, '0000-00-00', '0000-00-00'),
(15, 'ee', 'eee', 0, '2016-04-21', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id` int(111) NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `birthday` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date_join` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `experience` text COLLATE utf8_unicode_ci NOT NULL,
  `created` date NOT NULL,
  `updated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id`, `full_name`, `email`, `birthday`, `address`, `phone`, `password`, `date_join`, `role`, `description`, `experience`, `created`, `updated`) VALUES
(1, 'Nguyen Van A', 'tutu@gmail.com', '2016-04-06', '', '', 'c4ca4238a0b923820dcc509a6f75849b', '2016-04-10', 'Dev', 's', 's', '0000-00-00', '0000-00-00'),
(2, 'Jenay', 'vuongvo1991@gmail.com', '1990/04/28', 'Quang Ngaiiiii', '0924585252', 'c4ca4238a0b923820dcc509a6f75849b', '2015/01/28', 'testtestrtter', 'test1', 'yesy1b', '0000-00-00', '2016-04-15'),
(3, 'kenny', 'vuongvo91@gmail.com', '2016-04-26', '', '', 'c4ca4238a0b923820dcc509a6f75849b', '2016-04-04', 'test', 's', 's', '0000-00-00', '0000-00-00'),
(4, 'peter', 'mailmoilaptucthi11@gmail.com', '2016-04-24', '', '', 'c4ca4238a0b923820dcc509a6f75849b', '2016-04-20', 'test', 's', 's', '0000-00-00', '0000-00-00'),
(5, 'Hehe', 'titi@gmail.com', '2016-04-17', '', '', 'c4ca4238a0b923820dcc509a6f75849b', '2016-04-28', 'test', 's', 's', '0000-00-00', '0000-00-00'),
(6, 'd', 'd@gmail.com', '2016-04-12', 'dsa', '0986941722', 'c4ca4238a0b923820dcc509a6f75849b', '2016-04-13', 'Developer', 'd', 'd', '2016-04-14', '0000-00-00'),
(7, 'Dante', 'vuongvt@nal.vn', '', 'admin', '0986941722', '25d55ad283aa400af464c76d713c07ad', '2016/04/22', 'Developer', 'yes', 'yes', '2016-04-19', '0000-00-00'),
(8, 'vaava', 'fdds@yahoo.com', '', 'admin', '0986941722', '25d55ad283aa400af464c76d713c07ad', '2016/04/13', 'Tester', 'da', 'dsa', '2016-04-19', '0000-00-00'),
(9, 'henry', 'vuong_v@yahoo.com', '1991/08/06', 'Da Nang', '0986941722', 'd41d8cd98f00b204e9800998ecf8427e', '2016/04/12', 'Developer', 'dsad', 'dsa', '2016-04-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_team`
--

CREATE TABLE `t_user_team` (
  `id` int(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `t_user_team`
--

INSERT INTO `t_user_team` (`id`, `user_id`, `team_id`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 2),
(4, 4, 3),
(5, 5, 1),
(6, 3, 1),
(7, 6, 1),
(8, 6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_administrators`
--
ALTER TABLE `t_administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_day_off`
--
ALTER TABLE `t_day_off`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_projects`
--
ALTER TABLE `t_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_teams`
--
ALTER TABLE `t_teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_user_team`
--
ALTER TABLE `t_user_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_administrators`
--
ALTER TABLE `t_administrators`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_day_off`
--
ALTER TABLE `t_day_off`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `t_projects`
--
ALTER TABLE `t_projects`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `t_teams`
--
ALTER TABLE `t_teams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id` int(111) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `t_user_team`
--
ALTER TABLE `t_user_team`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
