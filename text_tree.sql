-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Мар 08 2023 г., 16:26
-- Версия сервера: 10.4.19-MariaDB
-- Версия PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `text_tree`
--

-- --------------------------------------------------------

--
-- Структура таблицы `nodes`
--

CREATE TABLE `nodes` (
  `id` int(11) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `nodes`
--

INSERT INTO `nodes` (`id`, `name`, `parent_id`) VALUES
(15, '', NULL),
(67, '', 15),
(76, 'Root number', 67),
(78, '', 67),
(86, 'Testing', NULL),
(113, 'Header 2', 76),
(155, '', 67),
(156, 'Bootstrap Footer', 155),
(157, 'Footer', 155),
(220, 'QWE', 113);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `nodes`
--
ALTER TABLE `nodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
