-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 20 2016 г., 18:35
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `i_magazin`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`, `status`) VALUES
(1, 'Персональные компьютеры', 1),
(2, 'Ноутбуки', 1),
(3, 'Телефоны', 1),
(4, 'Планшеты', 1),
(5, 'Куртки', 1),
(6, 'Рубашки', 1),
(7, 'Туфли', 1),
(8, 'Кроссовки', 1),
(9, 'Ботинки', 1),
(10, 'Мокасины', 1),
(12, 'Книги', 1),
(13, 'Рыба', 1),
(17, 'Курица', 2),
(18, 'Рис', 7),
(19, 'Греча', 1),
(20, 'Апельсиновый сок', 3),
(21, 'Мерседес', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ordercontent`
--

CREATE TABLE IF NOT EXISTS `ordercontent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Дамп данных таблицы `ordercontent`
--

INSERT INTO `ordercontent` (`id`, `id_order`, `id_product`, `price`, `count`) VALUES
(1, 1, 7, 552170, 5),
(2, 2, 2, 141029, 3),
(3, 7, 41, 25990, 10),
(4, 4, 1, 202709, 7),
(5, 6, 8, 82642, 1),
(6, 3, 4, 143070, 8),
(7, 5, 10, 79684, 5),
(12, 9, 43, 39130, 13),
(13, 13, 1, 202709, 1),
(14, 24, 43, 12040, 4),
(15, 24, 1, 608127, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date_order` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date_order`, `status`) VALUES
(1, 7, '2016-01-07', 3),
(2, 3, '2016-02-17', 1),
(3, 9, '2016-02-01', 2),
(4, 2, '2016-02-14', 1),
(5, 1, '2015-12-15', 3),
(6, 4, '2016-02-17', 2),
(7, 6, '2016-02-24', 1),
(8, 10, '2016-02-15', 2),
(9, 50, '2016-03-01', 3),
(10, 38, '2016-03-01', 2),
(12, 38, '2016-03-01', 1),
(13, 40, '2016-03-10', 1),
(24, 51, '2016-03-14', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_catalog` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `mark` varchar(30) NOT NULL,
  `count` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=53 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `id_catalog`, `title`, `mark`, `count`, `price`, `description`, `image`, `status`) VALUES
(1, 1, 'НИКС', 'X9000/ULTIMATE', 3, 202709, 'Мощный игровой компьютер\nИспользование твердотельного накопителя SSD позволяет существенно ускорить загрузку операционной системы и работу дисковой подсистемы.\n250 Гб SSD + 2 Тб, Intel Core i7-5930K, \nСерия процессора компьютера НИКС	Intel® High End Desktop Processor\nКол-во процессоров	1\nИнтерфейс накопителя (накопителей)	M.2 SATA, SATA 6Gb/s\nТип накопителя	SSD, HDD\nВидео компьютера	GeForce GTX980Ti OC\nОперативная память	16 Гб\nСетевая карта компьютера	10/100/1000 Мбит/сек', '../img/218491_2254_draft_large.jpg', 1),
(2, 1, 'НИКС', 'X6000/ULTIMATE', 7, 141029, 'Процессор\r\nПроцессор компьютера	Intel Core i7-6700K\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® Core™ i7 6-го поколения\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	M.2 SATA, SATA 6Gb/s\r\nТип накопителя	SSD, HDD\r\nВидео компьютера	GeForce GTX980 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	10/100/1000 Мбит/сек', '../img/Mr Black.jpg', 1),
(3, 1, 'НИКС', 'X6000-ITX/ULTIMATE', 2, 131428, 'Процессор\r\nПроцессор компьютера	Intel Core i7-6700\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® Core™ i7 6-го поколения\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\r\nТип накопителя	SSD, HDD\r\nВидео компьютера	GeForce GTX980 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	10/100/1000 Мбит/сек', '0', 1),
(4, 1, 'НИКС', 'X9000/PREMIUM', 3, 143070, 'Процессор\r\nПроцессор компьютера	Intel Core i7-5820K\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® High End Desktop Processor\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\r\nТип накопителя	SSD, HDD\r\nВидео компьютера	GeForce GTX970 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	10/100/1000 Мбит/сек', '0', 1),
(5, 1, 'НИКС', 'X6000/PREMIUM', 7, 115883, 'Конфигурация\nСерия процессора компьютера НИКС	Intel® Core™ i7 6-го поколения\nКол-во процессоров	1\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\nТип накопителя	SSD, HDD\nВидео компьютера	GeForce GTX970 OC\nОперативная память	16 Гб\nСетевая карта компьютера	10/100/1000 Мбит/сек', '0', 1),
(6, 1, 'НИКС', 'X6000-ITX/PREMIUM', 8, 112174, 'Процессор\r\nПроцессор компьютера	Intel Core i7-6700\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® Core™ i7 6-го поколения\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\r\nТип накопителя	SSD, HDD\r\nВидео компьютера	GeForce GTX970 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	2 x 10/100/1000 Мбит/сек', '0', 1),
(7, 1, 'НИКС', 'X5000/PREMIUM', 1, 110434, 'Процессор\r\nПроцессор компьютера	Intel Core i7-4790\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® Core™ i7 4-го поколения\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\r\nТип накопителя	SSD, HDD\r\nВидео компьютера	GeForce GTX970 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	10/100/1000 Мбит/сек', '0', 1),
(8, 1, 'НИКС', 'X6000/PRO', 10, 82642, 'Процессор\r\nПроцессор компьютера	Intel Core i5-6500\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® Core™ i5 6-го поколения\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\r\nТип накопителя	SSHD\r\nВидео компьютера	GeForce GTX960 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	10/100/1000 Мбит/сек', '0', 1),
(9, 1, 'НИКС', 'X6000-ITX/PRO', 7, 83280, 'Процессор\r\nПроцессор компьютера	Intel Core i5-6590\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® Core™ i5 6-го поколения\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\r\nТип накопителя	SSHD\r\nВидео компьютера	GeForce GTX960 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	10/100/1000 Мбит/сек', '0', 1),
(10, 1, 'НИКС', 'X5000/PRO', 12, 79684, 'Процессор компьютера	Intel Core i5-4590\r\nКонфигурация\r\nСерия процессора компьютера НИКС	Intel® Core™ i5 4-го поколения\r\nКол-во процессоров	1\r\nИнтерфейс накопителя (накопителей)	SATA 6Gb/s\r\nТип накопителя	SSHD\r\nВидео компьютера	GeForce GTX960 OC\r\nОперативная память	16 Гб\r\nСетевая карта компьютера	10/100/1000 Мбит/сек', '0', 1),
(41, 3, 'Apple', 'Apple iPhone 5s 16Gb', 50, 25990, 'Процессор : Apple A7\r\nКол-во ядер : 2\r\nПамять\r\nВстроенная память (Мб)   : 16000\r\nОперативная память (Мб)   : 1024', '0', 1),
(42, 2, 'HP', '15-r151nr', 7, 30999, 'Надежный ноутбук HP 15-r151nr — модель бюджетного класса линейки Energy Star, созданная для повседневной работы дома или в офисе. Лэптоп позволит повысить производительность и эффективность работы, а также всегда оставаться на связи. Корпус лэптопа выполнен из прочных и качественных материалов, имеет привлекательный лаконичный внешний вид.', '0', 1),
(43, 6, 'Mavango', '2285007', 25, 3010, 'Мужская рубашка в клетку, всегда модный тренд, выполнена из яркой и качественной ткани. Модель с длинным рукавом и классическим манжетом на пуговице. Укороченный и свободный крой, полукруглые разрезы по бокам добавляют комфорта при движении. Украшение модели - накладной нагрудный карман, декорированный дополнительным кармашком, это создают оригинальный стиль. Яркость расцветки этой рубашки обязательно привлечет внимание окружающих. В этом изделии всегда можно чувствовать себя на волне моды. Изысканная и практичная, эта рубашка станет любимой среди остальных вещей.', '../img/2285007-2.jpg', 1),
(44, 7, 'Tesoro', '2664335', 5, 5980, 'По назначению	Повседневные\r\nМатериал подошвы	Полимер\r\nВид застежки	Шнуровка\r\nВысота каблука	Высота: 4 см\r\nМатериал подкладки	натуральная кожа; текстиль\r\nВид обуви	низкие\r\nВид каблука	кирпичик\r\nВид мыска	острый\r\nСезон	демисезон\r\nПол	Мужской\r\nСтрана бренда	Россия\r\nСтрана производитель	Китай\r\nКомплектация:	туфли', '0', 1),
(51, 8, 'ASICS', 'PATRIOT', 15, 3590, 'Беговые кроссовки резина повышенной износостойкости, продлевает срок службы обуви. Технология Trusstic System обеспечивает легкость и предотвращает скручивание стопы. Детали: специальная колодка California Slip Lasting - для стабильности и комфорта, съемная стелька EVA, дышащий сетчатый верх со вставками из искусственной кожи для воздухопроницаемости и прочности.', '../img/2679005-1.jpg', 1),
(52, 12, 'Остров сокровищ', 'Приключение', 30, 750, '«О́стров сокро́вищ» — роман шотландского писателя Роберта Стивенсона о приключениях, связанных с поиском сокровищ, спрятанных пиратом Флинтом на необитаемом острове. Впервые опубликован в 1883 году, до этого в период 1881—1882 годов выходил сериями в детском журнале «Young Folks».\r\n\r\nРоман состоит из 34 глав, разбитых на 6 частей. Повествование ведётся от лица главного героя, сына владельцев трактира — юного Джима Хокинса (за исключением глав 16—18, где рассказчиком выступает доктор Ливси).', '../img/ostrov-sokrovishh.jpg', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `is_active` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `last_update` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `lastname`, `birthday`, `email`, `password`, `is_active`, `reg_date`, `last_update`, `status`) VALUES
(2, 'Максим', 'Волков', '1980-06-12', 'dkuzmin@example.net', 'e6329ff4-7526-383e-a', 1, '2000-12-08', '1994-03-28', 5),
(3, 'Болеслав', 'Андреев', '1973-05-15', 'nina.aleksandrov@exa', '387121e0-f8a1-3210-b', 1, '2014-02-03', '1988-09-27', 1),
(4, 'Ульяна', 'Захаров', '1976-08-28', 'ssemenov@example.net', '9bbb8463-3a5f-352b-8', 1, '1979-11-02', '2003-09-20', 1),
(5, 'Юлий', 'Логинов', '1998-06-05', 'ddyckov@example.com', '23413fb3-cf2e-3f12-9', 1, '2007-02-28', '2011-09-10', 3),
(6, 'Ксения', 'Суханов', '1986-10-03', 'veselov.izabella@exa', 'c8ee798f-f113-3cb9-8', 1, '1981-06-10', '1975-04-25', 2),
(7, 'Инна', 'Князев', '1993-07-30', 'koklov.iskra@example', '8d54c45c-c4fb-3ae2-9', 0, '2016-02-21', '1980-03-11', 1),
(8, 'Иосиф', 'Пахомов', '2009-06-06', 'matveev.garri@exampl', '0af72434-b4fc-33be-b', 0, '1997-09-11', '1971-05-04', 5),
(9, 'Зинаида', 'Анисимов', '2008-09-02', 'stepanov.nazar@examp', 'cff5fff5-3de1-379f-b', 1, '1978-05-24', '1980-02-28', 3),
(10, 'Егор', 'Евдокимов', '1991-03-22', 'eduard58@example.net', '6efa4d21-710f-3bf0-8', 0, '1985-06-15', '2005-11-04', 3),
(11, 'Рада', 'Бобров', '1995-06-02', 'zakar.sukin@example.', '737c559e-8b79-3cb7-b', 1, '1978-07-01', '1986-12-24', 5),
(12, 'Юлия', 'Иванов', '1984-02-16', 'smoiseev@example.net', '806c8be3-ad4c-3722-9', 1, '1984-04-10', '2003-08-08', 5),
(13, 'Нонна', 'Мартынов', '1971-11-25', 'ily57@example.com', 'cf2b4be9-c97c-3d1f-8', 1, '1970-09-24', '1991-02-05', 3),
(14, 'Милан', 'Мухин', '1989-07-24', 'alena.sestakov@examp', 'd64b0602-6118-3132-a', 0, '1971-09-05', '1991-09-27', 4),
(15, 'Алёна', 'Ширяев', '2006-09-28', 'izolda42@example.com', '8fba2ca7-5be6-3a41-8', 1, '1977-04-06', '1976-08-04', 3),
(16, 'Евгений', 'Фомин', '1988-03-27', 'kuzma68@example.org', '5f9511ac-8173-3554-8', 1, '1979-04-08', '1983-07-22', 5),
(17, 'Тит', 'Семёнов', '2013-08-04', 'bnoskov@example.net', 'e7d2661b-4499-3db7-8', 0, '1983-04-18', '2003-09-16', 5),
(18, 'Марк', 'Тимофеев', '1993-04-08', 'molcanov.rafail@exam', 'f8df91a1-212c-3c75-8', 1, '1981-05-04', '1984-06-23', 1),
(19, 'Валерия', 'Шашков', '1984-03-21', 'nina.artemev@example', '69ac0c5b-c576-3a3c-8', 0, '1972-06-30', '2005-10-16', 1),
(20, 'Ананий', 'Шестаков', '2013-01-01', 'pkalasnikov@example.', '5a09e2f3-abc0-3431-9', 1, '1974-03-26', '1995-02-04', 5),
(21, 'Руслан', 'Иванов', '2000-09-01', 'fedosy.turov@example', '18db1ead-2f64-37ec-8', 0, '1982-04-12', '1987-11-10', 1),
(22, 'Нонна', 'Буров', '1993-04-05', 'okrykov@example.org', '52e1416b-d078-31d0-b', 1, '1990-02-21', '1994-11-22', 4),
(23, 'Степан', 'Виноградов', '2006-05-14', 'naumov.alisa@example', 'cc36e631-00cb-32e8-a', 0, '2002-09-24', '1970-12-16', 2),
(24, 'Аполлон', 'Ширяев', '1996-11-24', 'nikita66@example.net', 'e10ea85d-19cd-30ac-9', 1, '2001-11-03', '2001-06-23', 5),
(25, 'Вероника', 'Сысоев', '1972-04-28', 'hkonstantinov@exampl', '276c91c6-ef97-36d7-a', 1, '2003-03-09', '1984-11-22', 5),
(26, 'Анна', 'Казаков', '1988-05-04', 'koselev.svytoslav@ex', 'b5adf3cc-3d44-35af-9', 0, '1979-05-01', '2006-05-11', 5),
(27, 'Владимир', 'Романов', '1990-12-19', 'ustinov.renata@examp', '70432959-9061-3bb8-8', 0, '1985-01-11', '1990-05-12', 1),
(28, 'Николай', 'Дементьев', '1979-12-01', 'krylov.inessa@exampl', 'ab870579-a273-3e15-8', 0, '1980-03-28', '1975-10-03', 3),
(56, 'Магомед', 'Сиражудинов', '2016-03-17', 'php_raz@mail.ru', '$1$8k2.vl/.$ovGrRGwBWkAmz18fBc', 1, '2016-03-16', '2016-03-16', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;