-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- 主機: localhost:3306
-- 產生時間： 2019 年 04 月 21 日 17:01
-- 伺服器版本: 5.7.25-0ubuntu0.18.04.2
-- PHP 版本： 7.2.15-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `OJWP`
--

-- --------------------------------------------------------

--
-- 資料表結構 `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `token` tinytext,
  `count` int(11) NOT NULL DEFAULT '0',
  `善表達` int(11) DEFAULT '0',
  `愛冒險` int(11) DEFAULT '0',
  `善解人意` int(11) DEFAULT '0',
  `體貼` int(11) DEFAULT '0',
  `浪漫` int(11) DEFAULT '0',
  `勇敢` int(11) NOT NULL DEFAULT '0',
  `念舊` int(11) NOT NULL DEFAULT '0',
  `有度量` int(11) NOT NULL DEFAULT '0',
  `衝動` int(11) NOT NULL DEFAULT '0',
  `友善` int(11) NOT NULL DEFAULT '0',
  `善良` int(11) NOT NULL DEFAULT '0',
  `夢幻` int(11) NOT NULL DEFAULT '0',
  `真誠` int(11) NOT NULL DEFAULT '0',
  `有愛心` int(11) NOT NULL DEFAULT '0',
  `樂於助人` int(11) NOT NULL DEFAULT '0',
  `慷慨` int(11) NOT NULL DEFAULT '0',
  `果斷` int(11) NOT NULL DEFAULT '0',
  `有正義感` int(11) NOT NULL DEFAULT '0',
  `活潑` int(11) NOT NULL DEFAULT '0',
  `合群` int(11) NOT NULL DEFAULT '0',
  `不切實際` int(11) NOT NULL DEFAULT '0',
  `重感情` int(11) NOT NULL DEFAULT '0',
  `有創意` int(11) NOT NULL DEFAULT '0',
  `富想像力` int(11) NOT NULL DEFAULT '0',
  `情緒化` int(11) NOT NULL DEFAULT '0',
  `悲觀` int(11) NOT NULL DEFAULT '0',
  `溫暖` int(11) NOT NULL DEFAULT '0',
  `自信` int(11) NOT NULL DEFAULT '0',
  `幽默` int(11) NOT NULL DEFAULT '0',
  `隨和` int(11) NOT NULL DEFAULT '0',
  `負責任` int(11) NOT NULL DEFAULT '0',
  `天真` int(11) NOT NULL DEFAULT '0',
  `保守` int(11) NOT NULL DEFAULT '0',
  `拘謹` int(11) NOT NULL DEFAULT '0',
  `勤奮` int(11) NOT NULL DEFAULT '0',
  `含蓄` int(11) NOT NULL DEFAULT '0',
  `謙虛` int(11) NOT NULL DEFAULT '0',
  `樂觀` int(11) NOT NULL DEFAULT '0',
  `懶散` int(11) NOT NULL DEFAULT '0',
  `驕傲` int(11) NOT NULL DEFAULT '0',
  `不拘小節` int(11) NOT NULL DEFAULT '0',
  `有效率` int(11) NOT NULL DEFAULT '0',
  `守規矩` int(11) NOT NULL DEFAULT '0',
  `認真` int(11) NOT NULL DEFAULT '0',
  `自私` int(11) NOT NULL DEFAULT '0',
  `討人喜歡` int(11) DEFAULT '0',
  `節儉` int(11) DEFAULT '0',
  `害羞` int(11) NOT NULL DEFAULT '0',
  `憂慮` int(11) NOT NULL DEFAULT '0',
  `冷漠` int(11) NOT NULL DEFAULT '0',
  `有恆心` int(11) NOT NULL DEFAULT '0',
  `內向` int(11) NOT NULL DEFAULT '0',
  `簡樸` int(11) NOT NULL DEFAULT '0',
  `有耐心` int(11) NOT NULL DEFAULT '0',
  `有主見` int(11) NOT NULL DEFAULT '0',
  `穩重` int(11) NOT NULL DEFAULT '0',
  `有條理` int(11) NOT NULL DEFAULT '0',
  `坦率` int(11) NOT NULL DEFAULT '0',
  `誠實` int(11) NOT NULL DEFAULT '0',
  `吝嗇` int(11) NOT NULL DEFAULT '0',
  `壓抑` int(11) NOT NULL DEFAULT '0',
  `常反省` int(11) DEFAULT '0',
  `獨立` int(11) DEFAULT '0',
  `固執` int(11) NOT NULL DEFAULT '0',
  `細心` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='記錄使用者回覆';

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `token` tinytext,
  `nickname` text,
  `traits` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用戶資料紀錄表';

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
