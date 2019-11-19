-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql
-- 生成日時: 2019 年 11 月 08 日 14:08
-- サーバのバージョン： 5.7.28
-- PHP のバージョン: 7.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `sample`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `carts`
--

CREATE TABLE `carts` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- テーブルの構造 `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `items`
--

INSERT INTO `items` (`item_id`, `name`, `stock`, `price`, `image`, `status`, `created`, `updated`) VALUES
(33, 'ハリネズミ', 22, 50000, '16scmunsexdwcosw88g0.jpg', 1, '2019-08-09 09:13:33', '2019-11-07 09:15:02'),
(38, '<h1>お料理</h1>', 49, 398, '4ow70qic4k8w8k08kcg8.jpg', 1, '2019-11-05 19:58:22', '2019-11-07 09:14:32');

-- --------------------------------------------------------

--
-- テーブルの構造 `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `type` int(11) NOT NULL DEFAULT '2',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルのデータのダンプ `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`, `type`, `created`, `updated`) VALUES
(1, 'sampleuser', 'password', 2, '2019-08-07 01:17:12', '2019-08-07 01:17:12'),
(4, 'admin', 'admin', 1, '2019-08-07 10:45:11', '2019-08-07 10:45:11');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルの構造`purchase_history`
--

CREATE TABLE `purchase_history` (
  `order_id` int(11) NOT NULL,
  `user_id`  int(11) NOT NULL,
  `purchase_datetime`     datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `purchase_total_price`  int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- テーブルの構造`purchase_details`
--

CREATE TABLE `purchase_details`(
  `details_id`  int(11) NOT NULL,
  `order_id`     int(11) NOT NULL,
  `item_id`     int(11) NOT NULL,
  `purchase_item_price`   int(11) NOT NULL,
  `purchase_item_amount`  int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- テーブルのインデックス `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- テーブルのインデックス `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- テーブルのインデックス `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`order_id`);

--
--
ALTER TABLE `purchase_details`
  ADD PRIMARY KEY (`details_id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `carts`
--
ALTER TABLE `carts`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- テーブルのAUTO_INCREMENT `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
--
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
--
--
ALTER TABLE `purchase_history`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
--
--
ALTER TABLE `purchase_details`
  MODIFY `details_id` int(11) NOT NULL AUTO_INCREMENT;
  
--
-- ダンプしたテーブルの制約
--

--
-- テーブルの制約 `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `items` (`item_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
