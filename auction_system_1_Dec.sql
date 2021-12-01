-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2021-12-01 18:49:17
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
-- 数据库： `auction_system`
--

-- --------------------------------------------------------

--
-- 表的结构 `archive`
--

CREATE TABLE `archive` (
  `archive_id` int(12) NOT NULL,
  `item_id` int(11) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `name` int(11) NOT NULL,
  `category` varchar(10) NOT NULL,
  `description` int(11) DEFAULT NULL,
  `final_price` varchar(100) NOT NULL,
  `buyer_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `buyer`
--

CREATE TABLE `buyer` (
  `buyer_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `recommendation` varchar(100) DEFAULT NULL,
  `previous_bid` varchar(100) DEFAULT NULL,
  `current_bid` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `buyer`
--

INSERT INTO `buyer` (`buyer_id`, `user_id`, `recommendation`, `previous_bid`, `current_bid`) VALUES
(1, 1, NULL, '1', '2'),
(2, 2, NULL, '3', '4');

-- --------------------------------------------------------

--
-- 表的结构 `historical_auction_price`
--

CREATE TABLE `historical_auction_price` (
  `auction_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bid_price` varchar(100) NOT NULL,
  `bid_time` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `historical_auction_price`
--

INSERT INTO `historical_auction_price` (`auction_id`, `item_id`, `user_id`, `bid_price`, `bid_time`) VALUES
(1, 1, 3, '230', NULL),
(2, 1, 4, '250', NULL),
(3, 1, 5, '260', NULL),
(4, 1, 6, '300', NULL),
(5, 1, 7, '400', NULL),
(6, 1, 8, '299', NULL),
(7, 2, 3, '300', NULL),
(8, 3, 4, '500', NULL),
(9, 4, 5, '600', NULL),
(10, 2, 6, '700', '2021-12-01 17:56:19.000000'),
(11, 3, 7, '800', '2021-12-01 18:00:11.000000'),
(12, 4, 8, '900', '2021-12-01 18:23:36.000000'),
(13, 5, 7, '2', '2021-12-01 18:29:42.000000'),
(14, 6, 6, '300', '2021-12-01 18:30:46.000000'),
(15, 7, 5, '901', '2021-12-01 18:32:37.000000');

-- --------------------------------------------------------

--
-- 表的结构 `item`
--

CREATE TABLE `item` (
  `item_id` int(12) NOT NULL,
  `seller_id` int(10) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(10) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text,
  `quantity` int(10) DEFAULT '1',
  `start_price` varchar(100) NOT NULL,
  `reserve_price` varchar(100) DEFAULT NULL,
  `current_price` varchar(100) DEFAULT NULL,
  `num_bids` int(100) NOT NULL DEFAULT '0',
  `final_price` varchar(100) DEFAULT NULL,
  `buyer_id` int(10) DEFAULT NULL,
  `end_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `item`
--

INSERT INTO `item` (`item_id`, `seller_id`, `category`, `status`, `title`, `description`, `quantity`, `start_price`, `reserve_price`, `current_price`, `num_bids`, `final_price`, `buyer_id`, `end_date`) VALUES
(1, 1, 'electronics', '0', 'iPhone', '4th Gen', 1, '200', '50', '901', 12, '200', 2, '2021-12-03 16:39:30'),
(2, 1, 'electronics', '0', 'MacBook', 'MacBook Pro 2021', 1, '500', '40', '350', 5, '400', 2, '2021-12-20 16:39:27'),
(3, 1, 'electronics', '0', 'iPad', '11th Gen', 1, '300', '30', '300', 8, '300', 2, '2021-12-12 16:39:29'),
(4, 1, 'electronics', '0', 'AirPods', 'AirPods Pro', 1, '199', '80', '300', 1, NULL, 2, '2021-12-19 16:55:00'),
(5, 1, 'earphone', '0', 'X Display', 'X Pro Display', 1, '10000', '500', '500', 0, NULL, NULL, '2021-12-23 17:07:00'),
(6, 1, 'electronics', '0', 'Apple Watch', 'Apple Watch Series 7', 1, '369', '300', '500', 0, NULL, NULL, '2021-12-27 19:36:00'),
(7, 1, 'electronics', '0', 'HomePod Mini', 'HomePod mini, colour: yellow.', 1, '80', '50', '500', 0, NULL, NULL, '2021-12-25 19:37:00'),
(8, 1, 'electronics', '1', 'MacBook Air', 'MacBook Air 2020', 1, '900', '500', '500', 0, NULL, NULL, '2021-11-20 19:38:00'),
(9, 1, 'electronics', '1', 'Mac Mini', 'Mac mini M1', 1, '699', '600', '500', 0, NULL, NULL, '2021-11-21 19:38:00'),
(10, 1, 'earphone', '1', 'Polishing Cloth', 'Polishing Cloth', 1, '19', '5', '50', 0, NULL, NULL, '2021-11-12 15:29:00'),
(11, 1, 'electronics', '1', 'AirTag', '', 1, '29', '10', '500', 0, NULL, NULL, '2021-11-05 15:29:00'),
(12, 1, 'earphone', '1', 'Beats Flex', 'All Day Wireless Earphones', 1, '59', '20', '500', 0, NULL, NULL, '2021-11-19 15:32:00'),
(13, 2, 'earphone', '1', 'YITING CAO', 'Come from China', 1, '200', '50', '500', 0, NULL, NULL, '2021-11-28 15:18:00'),
(14, 1, 'earphone', '1', 'YY', '', 1, '', '', '500', 0, NULL, NULL, '2021-11-05 15:43:00'),
(15, 1, 'earphone', '1', 'ZZ', 'ZZZ', 1, '20', '200', '500', 0, NULL, NULL, '2021-11-12 15:59:00'),
(16, 5, 'earphone', '1', 'MM', 'as', 1, '20', '200', '500', 0, NULL, NULL, '2021-11-12 15:59:00'),
(17, 5, 'earphone', '1', 'KK', 'ss', 1, '20', '200', '500', 0, NULL, NULL, '2021-11-10 16:14:00'),
(18, 2, 'earphone', '0', 'ajssfhgaesg', '', 1, '20', '200', '500', 0, NULL, NULL, '2029-11-25 18:28:00'),
(19, 2, 'jewellery', '0', 'dfghj', '', 1, '1', '', '300', 0, NULL, NULL, '2021-12-09 18:18:00'),
(20, 2, 'jewellery', '0', 'dfghjk', '', 1, '123', '', '140', 0, NULL, NULL, '2022-01-06 18:18:00'),
(21, 2, 'jewellery', '1', 'sdfg', '', 1, '1', '', '2', 1, NULL, 2, '2021-12-01 18:30:00');

-- --------------------------------------------------------

--
-- 表的结构 `seller`
--

CREATE TABLE `seller` (
  `seller_id` int(10) NOT NULL,
  `total_revenue` varchar(12) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bank_detail` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `account_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `bank_detail`, `address`, `phone`, `account_type`) VALUES
(1, 'buyer1@gmail.com', '12345678', NULL, NULL, NULL, 'buyer'),
(2, 'seller1@gmail.com', '12345678', NULL, NULL, NULL, 'seller'),
(3, 'l18252084368@gmail.com', '12345678', NULL, NULL, NULL, 'buyer'),
(4, 'zhouyingbo14@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(5, 'zuanw416hl6@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(6, 'suo1906708147@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(7, 'yiting_cao@163.com', '12345678', NULL, NULL, NULL, 'buyer'),
(8, 'diancibo0@gmail.com', '12345678', NULL, NULL, NULL, 'buyer'),
(9, 'cao36670696@gmail.com', '12345678', NULL, NULL, NULL, 'seller'),
(10, 'zhouyingbo2000@gmail.com', '12345678', NULL, NULL, NULL, 'seller');

-- --------------------------------------------------------

--
-- 表的结构 `watch_list`
--

CREATE TABLE `watch_list` (
  `watch_id` int(20) NOT NULL,
  `item_id` int(20) DEFAULT NULL,
  `user_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `watch_list`
--

INSERT INTO `watch_list` (`watch_id`, `item_id`, `user_id`) VALUES
(16, 2, 1),
(17, 3, 1),
(18, 4, 1),
(20, 1, 1);

--
-- 转储表的索引
--

--
-- 表的索引 `archive`
--
ALTER TABLE `archive`
  ADD PRIMARY KEY (`archive_id`);

--
-- 表的索引 `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`buyer_id`);

--
-- 表的索引 `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  ADD PRIMARY KEY (`auction_id`);

--
-- 表的索引 `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- 表的索引 `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`seller_id`);

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- 表的索引 `watch_list`
--
ALTER TABLE `watch_list`
  ADD PRIMARY KEY (`watch_id`),
  ADD KEY `user_id` (`user_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `archive`
--
ALTER TABLE `archive`
  MODIFY `archive_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `buyer`
--
ALTER TABLE `buyer`
  MODIFY `buyer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  MODIFY `auction_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 使用表AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 使用表AUTO_INCREMENT `watch_list`
--
ALTER TABLE `watch_list`
  MODIFY `watch_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
