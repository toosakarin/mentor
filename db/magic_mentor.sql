-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- 主機: localhost
-- 產生時間： 2015 年 09 月 25 日 12:10
-- 伺服器版本: 5.6.21
-- PHP 版本： 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 資料庫： `magic_mentor`
--

-- --------------------------------------------------------

--
-- 資料表結構 `Deck`
--

CREATE TABLE IF NOT EXISTS `Deck` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `lineup` int(11) NOT NULL,
  `decks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `Discuss`
--

CREATE TABLE IF NOT EXISTS `Discuss` (
  `id` int(10) unsigned NOT NULL,
  `user_id` int(11) NOT NULL,
  `deck_id` int(11) NOT NULL,
  `content` varchar(512) DEFAULT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 資料表結構 `User`
--

CREATE TABLE IF NOT EXISTS `User` (
`id` int(10) unsigned NOT NULL,
  `name` varchar(32) NOT NULL,
  `password` varchar(16) NOT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `device_id` varchar(256) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `User`
--

INSERT INTO `User` (`id`, `name`, `password`, `create_date`, `device_id`) VALUES
(1, 'root', 'root', '2015-09-25 03:22:03', NULL),
(4, 'jack', 'jack', '2015-09-25 03:24:19', NULL);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `Deck`
--
ALTER TABLE `Deck`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `Discuss`
--
ALTER TABLE `Discuss`
 ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `User`
--
ALTER TABLE `User`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`), ADD UNIQUE KEY `name` (`name`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `User`
--
ALTER TABLE `User`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
