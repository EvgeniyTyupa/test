-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Дек 15 2019 г., 22:59
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
(15, 'oruw', 'images/3.jpg', 324, 'Ultra-soft light weight 4.3 oz combed ring-spun 100% cotton short-sleeve shirt (Sport Grey is 90/10 cotton/polyester) Regular Unisex fit (i.e. not athletic/tight-fit) - Great for men and women Pre-shrunk to minimize shrinkage Tear-away label Available sizes: S to 2XL (for sizes 3XL to 6XL, please select the Big & Tall option) Brand: Next Level or equivalent');

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
(1, 'Nadai', '$2y$10$Ny4C8paR5Od24knHnuxjGeDhwU6hFY.qsWhRH.YK3YVxss158Xw6.', 'electroperedachi@gmail.com', '+3800970529754', 1, 'images/users/echo.jpg'),
(2, 'qq', '$2y$10$HKMbKcfeRvyaJH0PL/t9.eyoB.LDVDKXI08ozETiVKbXm9g43LJLG', 'asd@gmail.com', '+3800970529754', 0, ''),
(3, 'dj', '$2y$10$FV2MCQJHyvLZgHIiSvcbLO6pjWp2XiU7B3Kh2YgFUqI4hDSAk4sby', 'tank28@ukr.net', '+38055773342', 0, ''),
(4, 'zx', '$2y$10$nGKu86P0hq1ZGewpf3T7eefjufx05NJO2vGjK09lDuNP.ZgUtH7je', 'zx@gmail.com', '+3800970529754', 0, ''),
(5, 'cx', '$2y$10$KOsk6EbSOGH6Jb3SkgxoGeFqpDTLPHLJPKrBh7fG8fK8zgORCdilK', 'cx@gmail.com', '+3800970529754', 0, ''),
(7, '123', '$2y$10$SObnwg60FtldL8pEfwbe8ujwQ79816j/TsdePtAFUK6jdV.DnOlPm', 'qwe@mail.ru', '+380112', 0, ''),
(9, 'gav', '$2y$10$CcckokXdFz3omFhZ9j2ekunEbTBu.1T28lT8wMUz.k3BRicxqLzK2', 'gav@gmail.com', '+380123', 0, ''),
(10, 'asd', '$2y$10$HBMtnImSPf7I2ermt.v36Op.RaDMxwb7wgmL.PvfYp5KN7gkHf4dO', 'fgh@gmail.com', '+380123', 0, ''),
(11, 'zek', '$2y$10$PxuAPcpDKNYea.9IK1Kf8O8H0nGLgOSKGCo1pL0nO.YoVegzTU.yW', 'zek@gmail.com', '+380123', 0, ''),
(12, 'Sinok', '$2y$10$TQag9himekoxdyo3YojRruvQRo1OzsffkzGhqDtpldoZqv/B.p1/2', 'sinok@gmail.com', '+380123', 0, 'images/users/FullSizeRender.jpg');

--
-- Индексы сохранённых таблиц
--

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
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
