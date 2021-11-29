-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： localhost:8889
-- 生成日期： 2021-11-25 16:47:26
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

-- --------------------------------------------------------

--
-- 表的结构 `historical_auction_price`
--

CREATE TABLE `historical_auction_price` (
  `auction_id` int(10) NOT NULL,
  `item_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `bid_price` varchar(100) NOT NULL,
  `bid_time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `end_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `item`
--

INSERT INTO `item` (`item_id`, `seller_id`, `category`, `status`, `title`, `description`, `quantity`, `start_price`, `reserve_price`, `current_price`, `num_bids`, `final_price`, `buyer_id`, `end_date`) VALUES
(1, 1, 'phone', '0', 'iPhone', '4th Gen', 1, '200', '50', '150', 10, '200', 2, '2027-11-20 16:39:30.000000'),
(2, 1, 'computer', '0', 'MacBook', 'MacBook Pro 2021', 1, '500', '40', '350', 5, '400', 2, '2021-11-20 16:39:27.000000'),
(3, 1, 'tablet', '0', 'iPad', '11th Gen', 1, '300', '30', '250', 8, '300', 2, '2021-11-20 16:39:29.000000'),
(4, 1, 'earphone', '0', 'AirPods', 'AirPods Pro', 1, '199', '80', NULL, 0, NULL, NULL, '2021-11-19 16:55:00.000000'),
(5, 1, 'earphone', '0', 'X Display', 'X Pro Display', 1, '10000', '500', NULL, 0, NULL, NULL, '2021-11-20 17:07:00.000000'),
(6, 1, 'earphone', '0', 'Apple Watch', 'Apple Watch Series 7', 1, '369', '300', NULL, 0, NULL, NULL, '2021-11-21 19:36:00.000000'),
(7, 1, 'earphone', '0', 'HomePod Mini', 'HomePod mini, colour: yellow.', 1, '80', '50', NULL, 0, NULL, NULL, '2021-11-21 19:37:00.000000'),
(8, 1, 'earphone', '0', 'MacBook Air', 'MacBook Air 2020', 1, '900', '500', NULL, 0, NULL, NULL, '2021-11-20 19:38:00.000000'),
(9, 1, 'earphone', '0', 'Mac Mini', 'Mac mini M1', 1, '699', '600', NULL, 0, NULL, NULL, '2021-11-21 19:38:00.000000'),
(10, 1, 'earphone', '0', 'Polishing Cloth', '', 1, '19', '5', NULL, 0, NULL, NULL, '2021-11-12 15:29:00.000000'),
(11, 1, 'earphone', '0', 'AirTag', '', 1, '29', '10', NULL, 0, NULL, NULL, '2021-11-05 15:29:00.000000'),
(12, 1, 'earphone', '0', 'Beats Flex', 'All Day Wireless Earphones', 1, '59', '20', NULL, 0, NULL, NULL, '2021-11-19 15:32:00.000000'),
(13, 1, 'earphone', '0', 'YY', '', 1, '', '', NULL, 0, NULL, NULL, '2021-11-05 15:43:00.000000'),
(14, 1, 'earphone', '0', 'ZZ', 'ZZZ', 1, '20', '200', NULL, 0, NULL, NULL, '2021-11-12 15:59:00.000000'),
(15, 5, 'earphone', '0', 'MM', 'as', 1, '20', '200', NULL, 0, NULL, NULL, '2021-11-12 15:59:00.000000'),
(16, 5, 'earphone', '0', 'KK', 'ss', 1, '20', '200', NULL, 0, NULL, NULL, '2021-11-10 16:14:00.000000');

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
(2, 'buyer1@gmail.com', '12345678', NULL, NULL, NULL, 'buyer'),
(5, 'seller1@gmail.com', '12345678', NULL, NULL, NULL, 'seller');

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
  MODIFY `buyer_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `historical_auction_price`
--
ALTER TABLE `historical_auction_price`
  MODIFY `auction_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- 使用表AUTO_INCREMENT `seller`
--
ALTER TABLE `seller`
  MODIFY `seller_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
