-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 14 2023 г., 13:10
-- Версия сервера: 5.7.39
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `children`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `image`) VALUES
(1, 'Возраст 4-5', NULL),
(2, 'Возраст 7-11', NULL),
(3, 'Возраст 7-14', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `circle`
--

CREATE TABLE `circle` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `opisanie` text NOT NULL,
  `age` varchar(256) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `circle`
--

INSERT INTO `circle` (`id`, `name`, `opisanie`, `age`, `category_id`, `image`, `date`) VALUES
(1, 'Создание компьютерных игр', 'Ваш ребенок любит компьютерные игры? У него масса идей для создания своей игры, и он любит проводить время за компьютером?\r\n\r\n\r\n', '7-14', 3, '1.png', '2023-10-31 21:00:00'),
(2, 'Занятия в кружке краеведения.', 'занимаемся и исследованием своего родного края: его истории, географии, культуры, археологии и прочих аспектов.', '7-11', 2, '3.png', '2023-11-07 11:08:31'),
(3, 'Изобразилия', 'Цель программы – раскрытие и развитие потенциальных способностей, заложенных в ребёнке через использование педагогических технологий на занятиях по изобразительному искусству. Программа предусматривает процесс знакомства с живописью, графикой, скульптурой, декоративно-прикладным искусством, дизайном.', '7-14', 3, '2.png', '2023-11-10 11:08:31'),
(4, 'Робототехника', ' дети осваивают базовые понятия программирования, механики и инженерии, учатся совместной работе и собирают роботов. Несмотря на то, что значительная часть учебной программы выходит за рамки того, что преподают в школе, детям занятия нравятся. ', '7-14', 3, '4.png', '2023-11-10 11:08:31'),
(5, '\r\nПроводим занятия по художественной гимнастике', 'Хорошо подходит для тех кто хочет подчеркнуть свою грацию', '12', 1, '123.png', '2023-11-10 11:08:31'),
(6, 'Приглашаем на открытые уроки по кикбоксингу\r\n', '4 и 14 ноября во Vnukovo Sport Club наш тренер Георгий Клим проведет мастер-классы по кикбоксингу! В 13:00 пройдут занятия для детей 10+, а в 14:00 для тех, кто старше 18 лет.\r\nПриходите, будет весело!', '12', 3, '1234.png', '2023-11-10 11:08:31'),
(7, 'Проба', 'Проба пагинации', '12', 1, '1.png', '2023-11-10 11:25:09');

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(1) DEFAULT '1',
  `user_id` int(11) DEFAULT NULL,
  `circle_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id`, `body`, `created_at`, `status`, `user_id`, `circle_id`) VALUES
(64, 'Хорошие, а главное полезные кружки.', '2023-11-08 13:28:33', 1, 2, NULL),
(69, 'Хороший преподаватель\r\n', '2023-11-08 17:59:49', 1, 2, NULL),
(70, 'qw', '2023-11-09 12:28:36', 1, 2, NULL),
(71, 'круто!', '2023-11-10 19:56:05', 1, 5, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `prepod`
--

CREATE TABLE `prepod` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `patronymic` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `prepod`
--

INSERT INTO `prepod` (`id`, `name`, `surname`, `patronymic`) VALUES
(1, 'Игорь', 'Волков', 'Антонович'),
(2, 'Анна', 'Волкова', 'Юрьевна');

-- --------------------------------------------------------

--
-- Структура таблицы `proposal`
--

CREATE TABLE `proposal` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `patronymic` varchar(256) NOT NULL,
  `telefon` varchar(256) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `circle_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `proposal`
--

INSERT INTO `proposal` (`id`, `name`, `surname`, `patronymic`, `telefon`, `category_id`, `status`, `circle_id`, `image`, `user_id`) VALUES
(6, 'Максим', 'Лапин', 'Владимирович', '+7 (123) 123 12 31', 1, 1, 1, NULL, 2),
(7, 'Настя', 'Лапин', 'Владимировна', '+7 (121) 212 21 21', 2, 2, 3, NULL, 2),
(8, 'Никита', 'Лапин', 'Владимирович', '+7 (123) 123 12 31', 1, 2, 1, NULL, 2),
(9, 'Дарья', 'Лапина', 'Владимировна', '+7 (919) 575 27 95', 3, 2, 4, NULL, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `timelist`
--

CREATE TABLE `timelist` (
  `id` int(11) NOT NULL,
  `circle_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `den` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `timelist`
--

INSERT INTO `timelist` (`id`, `circle_id`, `category_id`, `data`, `time`, `den`) VALUES
(1, 2, 1, '2023-10-11', '18:23:45', 'Пятница'),
(3, 2, 3, '2023-10-10', '34:38:11', 'Суббота');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `patronymic` varchar(256) DEFAULT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `is_admin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `authKey` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `surname`, `patronymic`, `email`, `password`, `is_admin`, `created_at`, `authKey`) VALUES
(2, 'nikita', 'Никита', 'Лапин', 'Владимирович', 'Lamin-2004@mail.ru', '$2y$13$lu/SyFgjlyjAo6/1Dywi5e/fGRaBNxcrH/n5eE2jR.3NZyyiV6UEq', 0, '2023-10-31 12:19:02', NULL),
(4, 'admin', 'Никита', 'Лапин', 'Владимирович', 'qwe@gmail.com', '$2y$13$EcjlK2Hij5aqqF9RoUMZc.hH.ZSnR3xDDrBglWhE8bp7e5x5fr03u', 1, '2023-11-03 06:22:09', NULL),
(5, 'maksim228', 'максим', 'Лапин', 'Владимирович', 'ml1352533@gmail.com', '$2y$13$XppY5oR0/FFSQzWEWJ4Wxukcoie7b8vhW6HP7nyTBST65/DzOtu7y', 0, '2023-11-10 19:53:23', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `circle`
--
ALTER TABLE `circle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `circle_id` (`circle_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `prepod`
--
ALTER TABLE `prepod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `circle_id` (`circle_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Индексы таблицы `timelist`
--
ALTER TABLE `timelist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `circle_id` (`circle_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `circle`
--
ALTER TABLE `circle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT для таблицы `prepod`
--
ALTER TABLE `prepod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `proposal`
--
ALTER TABLE `proposal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `timelist`
--
ALTER TABLE `timelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `circle`
--
ALTER TABLE `circle`
  ADD CONSTRAINT `circle_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`circle_id`) REFERENCES `circle` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`circle_id`) REFERENCES `circle` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposal_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `timelist`
--
ALTER TABLE `timelist`
  ADD CONSTRAINT `timelist_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `timelist_ibfk_2` FOREIGN KEY (`circle_id`) REFERENCES `circle` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
