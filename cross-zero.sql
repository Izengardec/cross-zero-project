-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 30 2020 г., 03:21
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `cross-zero`
--

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `idUser` int(11) NOT NULL,
  `idGame` int(11) NOT NULL AUTO_INCREMENT,
  `Result` int(11) NOT NULL,
  `gameCourse` varchar(255) NOT NULL,
  PRIMARY KEY (`idGame`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`idUser`, `idGame`, `Result`, `gameCourse`) VALUES
(4, 1, 1, '0185674!'),
(2, 2, 1, '0643728!'),
(2, 3, 1, '0643728!'),
(2, 4, 2, '68417205?'),
(2, 5, 1, '436017582!'),
(2, 6, 1, '054673218!'),
(2, 7, 0, '054672'),
(2, 8, 1, '01478!'),
(2, 9, 1, '367851024!'),
(2, 10, 1, '42078!'),
(2, 11, 1, '647135280!'),
(2, 12, 1, '467581230!'),
(2, 13, 3, '647302185-'),
(2, 14, 1, '874061352!'),
(2, 15, 1, '85736!'),
(2, 16, 3, '064571382-'),
(5, 17, 2, '326081?'),
(5, 18, 1, '4065718!'),
(5, 19, 0, '4167'),
(5, 20, 1, '84706!'),
(5, 21, 3, '084173625-');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`,`nickname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `nickname`) VALUES
(1, 'qwe@qw.ry', '123', '45'),
(2, 'partanskjj@mail.ru', '123', 'Izengardec'),
(3, 'rty@g.com', '123', '123'),
(4, '1@1.ru', '123', 'wetty'),
(5, 'ser@mail.ru', '123', 'Serge');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `games`
--
ALTER TABLE `games`
  ADD CONSTRAINT `games_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
