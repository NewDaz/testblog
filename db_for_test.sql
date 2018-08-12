-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 12 2018 г., 20:48
-- Версия сервера: 5.6.38-log
-- Версия PHP: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_for_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `Data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `news_id`, `user_id`, `comment`, `Data_create`) VALUES
(1, 1, 3, 'erer', '2018-08-12 18:27:22'),
(3, 1, 1, 'Hi2', '2018-08-12 19:22:33'),
(4, 4, 1, 'hohoho', '2018-08-12 20:07:31'),
(5, 3, 1, 'hihihi', '2018-08-12 20:07:38'),
(6, 3, 1, 'lalalala', '2018-08-12 20:07:41');

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_content` varchar(255) NOT NULL,
  `content` varchar(20000) NOT NULL,
  `author` varchar(255) NOT NULL,
  `Data_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`news_id`, `title`, `short_content`, `content`, `author`, `Data_create`) VALUES
(1, 'Indonesia plane crash: Boy, 12, survives Papua accident', 'The boy was travelling with eight other people when the aircraft came down in Papua, Indonesia.                 ', 'A 12-year-old boy has been found alive in the wreckage of a plane crash which killed eight people in Indonesia.\r\nPhotos from the scene show the boy conscious and looking at the camera.\r\nHe was found with the wreckage on a mountainside near the border with Papua New Guinea on Sunday morning.\r\nThe Swiss-made Pilatus aircraft he had been travelling in lost contact with air traffic control on Saturday afternoon, shortly before it was due to land at Oksibil airport.\r\nThe plane, owned by private charter Dimonim Air, had been travelling from Tanah Merah, about 40 minutes flight south, to Oksibil in the province of Papua when it went down.                 ', 'Paul Seol', '2018-08-12 17:53:22'),
(3, 'Taliban attack on Afghan city of Ghazni enters third day', 'A reporter for news agency AFP in Ghazni said the Taliban were not hiding at all, but roaming across the city, where they are in control of several police checkpoints and have been setting fire to government offices.', 'A Taliban attack on the Afghan city of Ghazni has entered its third day - with intense fighting and conflicting claims over who controls the strategic city. Mohammad Sharif Yaftali, the Afghan army\'s chief-of-staff, said Ghazni was not under threat of falling into the militants\' hands. But people inside Ghazni say it has been overrun, with very little still under government control. The Taliban launched the assault in the early hours of Friday. By late Friday morning, at at least 16 people had been killed and many more injured. Local television station 1TV says the number of fatalities has risen to more than 100, but there is no official confirmation. News of what exactly is happening in Ghazni, a provincial capital on the key road between Kabul and Kandahar, is difficult to get after the militants damaged a telecommunications tower.', 'Abdula lalala', '2018-08-12 20:05:47'),
(4, 'Hippo bite kills Chinese tourist in Kenya', 'Hippos, which are aggressive, have sharp teeth and weigh up to 2,750kg (three tons), kill an estimated 500 people every year in Africa.', 'A Chinese tourist has died after being bitten in the chest by a hippo he was trying to photograph in Kenya. Chang Ming Chuang, 66, was tracking the animal at a wildlife resort on Lake Naivasha, 90km (56 miles) north-west of the capital, Nairobi. A second Chinese tourist was injured in the attack. Six people have been killed by hippos in the area this year. High water levels have seen hippos - the world\'s deadliest large land mammal - stray on to resorts for pasture.', 'Some one', '2018-08-12 20:06:37');

-- --------------------------------------------------------

--
-- Структура таблицы `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `roles`
--

INSERT INTO `roles` (`role_id`, `name`) VALUES
(1, 'user'),
(2, 'writer');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `role_id`) VALUES
(1, 'dizs', 'dizi@zzz.com', '37cc3687f0e0ca2268f12d0366e41dec', 1),
(2, 'admin', 'admin@admin.admin', 'bcfd01a282ef2266287d3f6ac1310f43', 2),
(3, 'aaaa', 'aaaa@aaaa.com', '7dfefea92a20fc099596fcef67abbcd3', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Индексы таблицы `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
