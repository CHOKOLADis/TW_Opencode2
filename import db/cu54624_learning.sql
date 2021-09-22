-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 22 2021 г., 13:00
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `cu54624_learning`
--

-- --------------------------------------------------------

--
-- Структура таблицы `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `lrn_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `groups`
--

INSERT INTO `groups` (`id`, `lrn_group`) VALUES
(1, '1 ПКС'),
(2, '2 ПКС');

-- --------------------------------------------------------

--
-- Структура таблицы `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `lrn_group` varchar(10) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `sname` varchar(35) NOT NULL,
  `tname` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `students`
--

INSERT INTO `students` (`id`, `lrn_group`, `fname`, `sname`, `tname`) VALUES
(1, '1 ПКС', 'Иван', 'Харламов', 'Игнатович'),
(2, '1 ПКС', 'Михаил', 'Круг', 'Александрович'),
(3, '2 ПКС', 'Дмитрий', 'Носков', 'Игоревич'),
(4, '2 ПКС', 'Ирина', 'Золотухина', 'Алексеевна'),
(11, '2 ПКС', 'Григорий', 'Попов', 'Артемович'),
(12, '1 ПКС', 'Полина', 'Бобова', 'Павловна'),
(13, '1 ПКС', 'Кирилл', 'Спиридонов', 'Олегович'),
(14, '2 ПКС', 'Игорь', 'Ушаков', 'Александрович');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn_group` (`lrn_group`);

--
-- Индексы таблицы `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lrn_group` (`lrn_group`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `Students_ibfk_1` FOREIGN KEY (`lrn_group`) REFERENCES `groups` (`lrn_group`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
