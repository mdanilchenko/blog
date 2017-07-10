-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Июл 10 2017 г., 06:15
-- Версия сервера: 5.5.51-38.2
-- Версия PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `runaway_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `mail` varchar(30) NOT NULL DEFAULT '',
  `url` varchar(50) NOT NULL DEFAULT '',
  `text` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `ip` varchar(15) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ind_post_id` (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` int(11) NOT NULL,
  `comments` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `ind_user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `user_id`, `date`, `time`, `comments`) VALUES
(1, 'Welcome, from Maksim', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean purus nunc, malesuada id pulvinar sit amet, feugiat aliquet tortor. Nunc ac magna dapibus nibh egestas pulvinar. Nulla facilisi. Donec nibh orci, lacinia in bibendum ac, tincidunt nec massa. Nullam tincidunt fringilla ante, vel tempus enim malesuada id. Nam nec rutrum mi. Aliquam eget eleifend nisl. Vivamus pretium, dolor et pharetra malesuada, lectus lacus aliquet tellus, sed consequat nisl ligula blandit mauris. Phasellus at ornare nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras vehicula ex ultrices nibh scelerisque, a cursus nibh tincidunt.\r\n\r\nMaecenas sed arcu nec nibh malesuada iaculis. In ultrices justo at est sodales posuere. Aenean non dui non justo sollicitudin accumsan. Donec tempus et dui viverra accumsan. Quisque a mi nisi. Morbi elementum tempus risus in tincidunt. Maecenas aliquet nunc at urna elementum, ut feugiat metus aliquet. Ut faucibus luctus enim, sed imperdiet erat bibendum finibus. Duis ut finibus ipsum, vitae varius nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce vestibulum ut sapien quis hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tempus diam id ex fringilla, at suscipit arcu iaculis.\r\n\r\nProin pulvinar accumsan consequat. Nam finibus mollis venenatis. Phasellus ullamcorper metus eget magna commodo, id vestibulum arcu condimentum. Phasellus urna velit, dignissim at turpis ut, lacinia dignissim massa. In ornare posuere enim non lacinia. Praesent semper nisl ac porta posuere. Cras suscipit tellus eleifend risus sollicitudin tempus. Vivamus commodo, sapien ut convallis blandit, tellus ex dignissim dolor, vitae iaculis tellus sem nec nisi. Proin tempus rhoncus malesuada. Maecenas feugiat aliquet nisi, a tempus ligula interdum eget. Donec et purus ex. Pellentesque viverra mauris neque, ut molestie urna pharetra vel. Etiam vehicula massa at erat tincidunt congue. Phasellus et sapien in sem sagittis placerat porta bibendum sapien.\r\n\r\nSed mattis dapibus ipsum, vitae imperdiet dui porta nec. Vestibulum ac aliquam tellus. Sed cursus nisl at tellus hendrerit, nec sollicitudin felis convallis. Cras orci nulla, tempor vel ornare in, elementum quis erat. Donec dictum porttitor pharetra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc semper dapibus felis, id maximus orci varius id. Aliquam vel mi sit amet diam imperdiet pharetra. Donec accumsan nibh ac ipsum fermentum, at mollis purus interdum. Nam lacus sapien, luctus ut cursus quis, imperdiet et nunc. Phasellus ac ligula velit. Nunc urna massa, suscipit eu nisi non, malesuada vestibulum ex.\r\n\r\nSed ac odio ultricies ex finibus eleifend in ut eros. Mauris malesuada massa eu nisl dapibus hendrerit. Suspendisse bibendum ornare massa sit amet tincidunt. Nulla ac nibh nec diam convallis elementum. Vestibulum consectetur neque nunc, ut aliquam neque hendrerit a. Morbi fringilla tempor lorem, at ullamcorper mi facilisis faucibus. Donec interdum elit sed molestie dapibus. Aenean ac lobortis turpis. Fusce fermentum pharetra nunc, eu pretium est rutrum ac. Integer sodales, ipsum quis gravida tempor, ipsum dolor fermentum sem, et feugiat nisi metus sed purus. Cras a ullamcorper diam. Suspendisse ultricies ante facilisis odio tempus, ut ullamcorper orci ornare. Maecenas et condimentum diam. Integer in aliquam ex. Donec accumsan sed nunc id egestas.', 1, '2017-07-09', 1499601600, 0),
(2, 'Welcom, from Lorian', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean purus nunc, malesuada id pulvinar sit amet, feugiat aliquet tortor. Nunc ac magna dapibus nibh egestas pulvinar. Nulla facilisi. Donec nibh orci, lacinia in bibendum ac, tincidunt nec massa. Nullam tincidunt fringilla ante, vel tempus enim malesuada id. Nam nec rutrum mi. Aliquam eget eleifend nisl. Vivamus pretium, dolor et pharetra malesuada, lectus lacus aliquet tellus, sed consequat nisl ligula blandit mauris. Phasellus at ornare nisl. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Cras vehicula ex ultrices nibh scelerisque, a cursus nibh tincidunt.\r\n\r\nMaecenas sed arcu nec nibh malesuada iaculis. In ultrices justo at est sodales posuere. Aenean non dui non justo sollicitudin accumsan. Donec tempus et dui viverra accumsan. Quisque a mi nisi. Morbi elementum tempus risus in tincidunt. Maecenas aliquet nunc at urna elementum, ut feugiat metus aliquet. Ut faucibus luctus enim, sed imperdiet erat bibendum finibus. Duis ut finibus ipsum, vitae varius nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Fusce vestibulum ut sapien quis hendrerit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus tempus diam id ex fringilla, at suscipit arcu iaculis.\r\n\r\nProin pulvinar accumsan consequat. Nam finibus mollis venenatis. Phasellus ullamcorper metus eget magna commodo, id vestibulum arcu condimentum. Phasellus urna velit, dignissim at turpis ut, lacinia dignissim massa. In ornare posuere enim non lacinia. Praesent semper nisl ac porta posuere. Cras suscipit tellus eleifend risus sollicitudin tempus. Vivamus commodo, sapien ut convallis blandit, tellus ex dignissim dolor, vitae iaculis tellus sem nec nisi. Proin tempus rhoncus malesuada. Maecenas feugiat aliquet nisi, a tempus ligula interdum eget. Donec et purus ex. Pellentesque viverra mauris neque, ut molestie urna pharetra vel. Etiam vehicula massa at erat tincidunt congue. Phasellus et sapien in sem sagittis placerat porta bibendum sapien.\r\n\r\nSed mattis dapibus ipsum, vitae imperdiet dui porta nec. Vestibulum ac aliquam tellus. Sed cursus nisl at tellus hendrerit, nec sollicitudin felis convallis. Cras orci nulla, tempor vel ornare in, elementum quis erat. Donec dictum porttitor pharetra. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nunc semper dapibus felis, id maximus orci varius id. Aliquam vel mi sit amet diam imperdiet pharetra. Donec accumsan nibh ac ipsum fermentum, at mollis purus interdum. Nam lacus sapien, luctus ut cursus quis, imperdiet et nunc. Phasellus ac ligula velit. Nunc urna massa, suscipit eu nisi non, malesuada vestibulum ex.\r\n\r\nSed ac odio ultricies ex finibus eleifend in ut eros. Mauris malesuada massa eu nisl dapibus hendrerit. Suspendisse bibendum ornare massa sit amet tincidunt. Nulla ac nibh nec diam convallis elementum. Vestibulum consectetur neque nunc, ut aliquam neque hendrerit a. Morbi fringilla tempor lorem, at ullamcorper mi facilisis faucibus. Donec interdum elit sed molestie dapibus. Aenean ac lobortis turpis. Fusce fermentum pharetra nunc, eu pretium est rutrum ac. Integer sodales, ipsum quis gravida tempor, ipsum dolor fermentum sem, et feugiat nisi metus sed purus. Cras a ullamcorper diam. Suspendisse ultricies ante facilisis odio tempus, ut ullamcorper orci ornare. Maecenas et condimentum diam. Integer in aliquam ex. Donec accumsan sed nunc id egestas.', 2, '2017-07-10', 1499680535, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `pass` varchar(32) NOT NULL COMMENT 'password md5',
  `full_name` varchar(50) NOT NULL DEFAULT '',
  `street` varchar(50) NOT NULL DEFAULT '',
  `postcode` varchar(20) NOT NULL DEFAULT '',
  `place` varchar(20) NOT NULL DEFAULT '',
  `mail` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uniq_login` (`login`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `full_name`, `street`, `postcode`, `place`, `mail`) VALUES
(1, 'Maksim', 'e10adc3949ba59abbe56e057f20f883e', 'Maksim Danilchanka', 'Backer str', '24819L', 'Gomel, Belarus', 'ms.danilchenko@gmail.com'),
(2, 'Someone', 'e10adc3949ba59abbe56e057f20f883e', 'Lorian Grunt', 'Backer str', '24819L', 'Gomel, Belarus', 'dummy@mail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
