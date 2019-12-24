-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 23 2019 г., 15:26
-- Версия сервера: 8.0.18
-- Версия PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cart`
--

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(100) NOT NULL,
  `userId` int(100) NOT NULL,
  `itemId` int(100) NOT NULL,
  `itemCount` int(100) NOT NULL,
  `createAt` date NOT NULL,
  `orderName` int(100) NOT NULL,
  `proved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `userId`, `itemId`, `itemCount`, `createAt`, `orderName`, `proved`) VALUES
(18, 1, 26, 2, '2019-12-17', 1262, 1),
(19, 1, 2, 1, '2019-12-17', 1262, 0),
(20, 1, 7, 12, '2019-12-18', 17, 0),
(21, 1, 15, 1, '2019-12-18', 1152, 1),
(22, 1, 2, 1, '2019-12-18', 1152, 0),
(23, 1, 27, 1, '2019-12-20', 127, 1),
(24, 1, 27, 2, '2019-12-22', 1271, 1),
(25, 1, 1, 3, '2019-12-22', 1271, 0),
(28, 1, 27, 1, '2019-12-23', 128, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `photos`
--

CREATE TABLE `photos` (
  `id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `date` date NOT NULL,
  `isHeader` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Дамп данных таблицы `photos`
--

INSERT INTO `photos` (`id`, `name`, `img`, `date`, `isHeader`) VALUES
(31, 'aaa', 'images/photo/ZXC_4332-03-12/9CDB03EA-957E-45AD-9E5A-2DEF6295D0B7.jpeg', '4332-03-12', 1),
(32, 'aaa', 'images/photo/ZXC_4332-03-12/9E2C71B7-167C-4AEC-9A55-97C9B99E27A3.jpeg', '4332-03-12', 0),
(35, 'Евгений', 'images/photo/Евгений_4432-03-12/1837F1F8-37BC-43C3-9A68-ACB99DBA1A7E.jpeg', '4432-03-12', 1),
(42, 'BMV', 'images/photo/BMV_2019-12-20/92C31A59-867B-49F5-B517-DC78C016C815.jpeg', '2019-12-20', 1),
(45, 'hhhh', 'images/photo/hhhh_3211-02-22/DSC_3385.jpg', '3211-02-22', 1),
(48, 'hhhh', 'images/photo/hhhh_3211-02-22/DSC_3477.jpg', '3211-02-22', 0),
(49, 'hhhh', 'images/photo/hhhh_3211-02-22/DSC_3490.jpg', '3211-02-22', 0),
(50, 'BMV', 'images/photo//2DB9C0A9-D519-436F-92A3-AF0990A5C7EC.jpeg', '1241-03-12', 0),
(51, 'BMV', 'images/photo//6A98D738-89E9-415F-BC4B-AF764C971D95.jpeg', '2322-03-12', 0),
(53, 'BMV', 'images/photo//0B650D03-2442-470C-809A-855EEC9411DD.jpeg', '0121-03-12', 0),
(54, 'hhhh', 'images/photo//1024E041-C519-4EC3-9F5D-86BB10BE3082.jpeg', '1241-03-12', 0),
(55, 'BMV', 'images/photo/BMV_2019-12-20/1C915132-F04D-41F2-8B2A-813985B1B0E6.jpeg', '1111-03-12', 0),
(56, 'BMV', 'images/photo/BMV_2019-12-20/E48D0825-93EB-435F-9CEA-CA0A148A5A11.jpeg', '1111-03-12', 0),
(57, 'zzz', 'images/photo/zzz_1231-12-12/DSC_0004.jpg', '1231-12-12', 1),
(58, 'zzz', 'images/photo/zzz_1231-12-12/DSC_0024.jpg', '1111-12-23', 0),
(59, 'zzz', 'images/photo/zzz_1231-12-12/DSC_0172.jpg', '1111-12-23', 0),
(60, 'zzz', 'images/photo/zzz_1231-12-12/DSC_0542.jpg', '1111-12-23', 0),
(61, 'zzz', 'images/photo/zzz_1231-12-12/DSC_0544.jpg', '1111-12-23', 0),
(62, 'jhjj', 'images/photo/jhjj_1211-03-12/DSC_0086.jpg', '1211-03-12', 1),
(64, 'jhjj', 'images/photo/jhjj_1211-03-12/DSC_0177.jpg', '1211-03-12', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `name` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `img` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `price` int(100) NOT NULL,
  `info` longtext CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `img`, `price`, `info`) VALUES
(1, 'oruw', 'images/one.jpg', 150, 'Ultra-soft light weight 4.3 oz combed ring-spun 100% cotton short-sleeve shirt (Sport Grey is 90/10 cotton/polyester) Regular Unisex fit (i.e. not athletic/tight-fit) - Great for men and women Pre-shrunk to minimize shrinkage Tear-away label Available sizes: S to 2XL (for sizes 3XL to 6XL, please select the Big & Tall option) Brand: Next Level or equivalent'),
(2, 'rt', 'images/rose-blue-flower-rose-blooms-67636.jpeg', 55, 'Ultra-soft light weight 4.3 oz combed ring-spun 100% cotton short-sleeve shirt (Sport Grey is 90/10 cotton/polyester) Regular Unisex fit (i.e. not athletic/tight-fit) - Great for men and women Pre-shrunk to minimize shrinkage Tear-away label Available sizes: S to 2XL (for sizes 3XL to 6XL, please select the Big & Tall option) Brand: Next Level or equivalent'),
(3, 'asd', 'images/three.jpg', 34, 'Ultra-soft light weight 4.3 oz combed ring-spun 100% cotton short-sleeve shirt (Sport Grey is 90/10 cotton/polyester) Regular Unisex fit (i.e. not athletic/tight-fit) - Great for men and women Pre-shrunk to minimize shrinkage Tear-away label Available sizes: S to 2XL (for sizes 3XL to 6XL, please select the Big & Tall option) Brand: Next Level or equivalent'),
(7, 'peredas', 'images/photo_2019-08-02_01-13-31.jpg', 45, 'ninja'),
(15, 'oruw', 'images/3.jpg', 324, 'Ultra-soft light weight 4.3 oz combed ring-spun 100% cotton short-sleeve shirt (Sport Grey is 90/10 cotton/polyester) Regular Unisex fit (i.e. not athletic/tight-fit) - Great for men and women Pre-shrunk to minimize shrinkage Tear-away label Available sizes: S to 2XL (for sizes 3XL to 6XL, please select the Big & Tall option) Brand: Next Level or equivalent'),
(26, 'BMV', 'images/crystalninjaNvN.jpg', 50, 'svet'),
(27, 'norm', 'images/electroperedachi_city.jpg', 5000, 'BMW');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8_german2_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_german2_ci NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_german2_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL,
  `user_img` varchar(255) COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`, `phone`, `is_admin`, `user_img`) VALUES
(1, 'Nadai', '$2y$10$Ny4C8paR5Od24knHnuxjGeDhwU6hFY.qsWhRH.YK3YVxss158Xw6.', 'electroperedachi@gmail.com', '+380970529754', 1, 'images/users/76F0218A-A4B1-4F56-8A56-E5400588E2E6.jpeg'),
(2, 'qq', '$2y$10$HKMbKcfeRvyaJH0PL/t9.eyoB.LDVDKXI08ozETiVKbXm9g43LJLG', 'asd@gmail.com', '+380970529754', 0, ''),
(3, 'dj', '$2y$10$FV2MCQJHyvLZgHIiSvcbLO6pjWp2XiU7B3Kh2YgFUqI4hDSAk4sby', 'tank28@ukr.net', '+38055773342', 0, ''),
(4, 'zx', '$2y$10$nGKu86P0hq1ZGewpf3T7eefjufx05NJO2vGjK09lDuNP.ZgUtH7je', 'zx@gmail.com', '+380970529754', 0, ''),
(5, 'cx', '$2y$10$KOsk6EbSOGH6Jb3SkgxoGeFqpDTLPHLJPKrBh7fG8fK8zgORCdilK', 'cx@gmail.com', '+380970529754', 0, ''),
(7, '123', '$2y$10$SObnwg60FtldL8pEfwbe8ujwQ79816j/TsdePtAFUK6jdV.DnOlPm', 'qwe@mail.ru', '+380112', 0, ''),
(9, 'gav', '$2y$10$CcckokXdFz3omFhZ9j2ekunEbTBu.1T28lT8wMUz.k3BRicxqLzK2', 'gav@gmail.com', '+380123', 0, ''),
(10, 'asd', '$2y$10$HBMtnImSPf7I2ermt.v36Op.RaDMxwb7wgmL.PvfYp5KN7gkHf4dO', 'fgh@gmail.com', '+380123', 0, ''),
(11, 'zek', '$2y$10$PxuAPcpDKNYea.9IK1Kf8O8H0nGLgOSKGCo1pL0nO.YoVegzTU.yW', 'zek@gmail.com', '+380123', 0, ''),
(12, 'Sinok', '$2y$10$TQag9himekoxdyo3YojRruvQRo1OzsffkzGhqDtpldoZqv/B.p1/2', 'sinok@gmail.com', '+380123', 0, 'images/users/FullSizeRender.jpg'),
(13, 'June', '$2y$10$oNM41TVPdSe/Xc0TaDVV1OazpicMIWe0ZN5RHbX23eG3.r8ZaCtB6', 'boogee2820@gmail.com', '+3806757567', 0, '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
