-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Янв 01 2024 г., 16:55
-- Версия сервера: 5.7.27-30
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `u2403240_plb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'sunkist', '20172010');

-- --------------------------------------------------------

--
-- Структура таблицы `applications`
--

CREATE TABLE `applications` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL,
  `organization` varchar(255) DEFAULT NULL,
  `inn` varchar(10) DEFAULT NULL,
  `consent` tinyint(1) NOT NULL,
  `timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `deal_completed` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `applications`
--

INSERT INTO `applications` (`id`, `name`, `email`, `phone`, `message`, `organization`, `inn`, `consent`, `timestamp`, `deal_completed`) VALUES
(1, 'Егор', 'egor.k.s@mail.ru', '+79097702112', 'Хочу купить гелик)))', NULL, NULL, 1, '2023-12-31 20:04:28', 0),
(2, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702114', 'Проверка', NULL, NULL, 1, '2023-12-31 20:11:09', 0),
(3, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702115', 'ghjdthr', NULL, NULL, 1, '2023-12-31 20:14:00', 0),
(4, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702117', 'проверка', NULL, NULL, 1, '2023-12-31 20:17:05', 0),
(5, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702118', '123', NULL, NULL, 1, '2023-12-31 20:19:19', 0),
(6, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702119', '123', NULL, NULL, 1, '2023-12-31 20:21:51', 0),
(7, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702110', '123', NULL, NULL, 1, '2023-12-31 20:27:18', 0),
(8, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702122', '123', 'PLBCOM', '1234567980', 1, '2024-01-01 13:00:01', 0),
(9, 'Игорь', 'korkishkoegor2019@gmail.com', '+79097702121', '123', 'PLBCOM', '1234567980', 1, '2024-01-01 13:17:12', 0),
(10, 'Игорь', 'korkishkoegor2019@gmail.com', '+79097702123', '123', 'PLBCOM', '1234567980', 1, '2024-01-01 13:20:49', 0),
(11, 'Егор', 'korkishkoegor2019@gmail.com', '+79097702124', '123', NULL, NULL, 1, '2024-01-01 13:51:56', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `chat_ids`
--

CREATE TABLE `chat_ids` (
  `id` int(11) NOT NULL,
  `chat_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `chat_ids`
--

INSERT INTO `chat_ids` (`id`, `chat_id`) VALUES
(1, '1320865933');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `chat_ids`
--
ALTER TABLE `chat_ids`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `applications`
--
ALTER TABLE `applications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `chat_ids`
--
ALTER TABLE `chat_ids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
