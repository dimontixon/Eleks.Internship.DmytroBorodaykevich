-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Дек 25 2017 г., 15:47
-- Версия сервера: 5.7.20-log
-- Версия PHP: 5.2.12

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `video`
--

-- --------------------------------------------------------

--
-- Структура таблицы `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `user` text NOT NULL,
  `url` text NOT NULL,
  `genre` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп данных таблицы `about`
--

INSERT INTO `about` (`id`, `name`, `description`, `user`, `url`, `genre`, `date`) VALUES
(1, 'Кліп "Белые розы"', 'Кліп на пісню "Белые розы"', 'Михайло123', 'https://www.youtube.com/watch?v=BPsRX7m6CX4', 'Музика', '2017-11-23'),
(2, 'Вечірній квартал', 'Шоу на 1+1 Володимира Зеленського та компанії.', 'Петро222', 'https://www.youtube.com/watch?v=izPKLdfZo64&t=4452s', 'Жарти', '2017-11-11'),
(3, 'Шерлок Холмс', 'Серіал про видатного детектива Шелока Холмса та його помічника Доктора Ватсона.', 'Ігнат Перелко', 'https://www.youtube.com/watch?v=tkRzaPiES4s', 'Серіал', '2017-10-09'),
(4, 'Trap Music 2018 ', 'Magic Music Mix 2018 Best Trap & Bass Mix', 'Magic Music', 'https://www.youtube.com/watch?v=tPAP_3lE3e0', 'Музика', '2017-11-23'),
(5, 'Кожному своє', 'Серіал про кохання', 'Jaw Dropper', 'https://www.youtube.com/watch?v=H9eydWTE9Yg', 'Серіал', '2017-10-05'),
(6, 'Розіграш Юрія Ткача', 'Відео про розіграш гумориста Юрія Ткача.', 'Вечірній Квартал', 'https://www.youtube.com/watch?v=gTBro8O0-uM', 'Жарти', '2017-12-14');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
