-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2021-11-16 20:46:12
-- 服务器版本： 5.7.34
-- PHP 版本： 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- 表的结构 `auction`
--

CREATE TABLE `auction` (
  `title` varchar(20) NOT NULL,
  `details` varchar(200) DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `StartPrice` int(20) NOT NULL,
  `ReservePrice` int(20) DEFAULT NULL,
  `EndDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `auction`
--

INSERT INTO `auction` (`title`, `details`, `category`, `StartPrice`, `ReservePrice`, `EndDate`) VALUES
('iPhone', 'iPhone 4S', NULL, 200, 50, '2021-11-17 20:44:00');

-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'ZYB', '$2y$10$hW0UHpOYlsLFVNwA9KiPj.F.PbS1XAARYgCXO0LtdpegbC66vtk62', '2021-11-13 12:39:24'),
(2, 'Test', '$2y$10$xMxmye/0XBtik9Z0NlXdcue2HiksexW91Ggr5ED/liBXwwKH.nCXy', '2021-11-15 20:14:15');

--
-- 转储表的索引
--

--
-- 表的索引 `auction`
--
ALTER TABLE `auction`
  ADD UNIQUE KEY `auction_title_uindex` (`title`);

--
-- 表的索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
