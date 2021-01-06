-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 16 май 2019 в 22:20
-- Версия на сървъра: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Структура на таблица `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` text COLLATE utf8_unicode_ci NOT NULL,
  `book_shortDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `book_longDesc` text COLLATE utf8_unicode_ci NOT NULL,
  `book_author` text COLLATE utf8_unicode_ci NOT NULL,
  `book_genre` text COLLATE utf8_unicode_ci NOT NULL,
  `book_recipient` text COLLATE utf8_unicode_ci NOT NULL,
  `book_recipient_address` text COLLATE utf8_unicode_ci NOT NULL,
  `book_recipient_birthdate` date NOT NULL,
  `book_recipient_mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `book_presence` text COLLATE utf8_unicode_ci NOT NULL,
  `book_count` int(11) NOT NULL,
  `book_period` date NOT NULL,
  `book_period_devoted` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `books`
--

INSERT INTO `books` (`book_id`, `book_name`, `book_shortDesc`, `book_longDesc`, `book_author`, `book_genre`, `book_recipient`, `book_recipient_address`, `book_recipient_birthdate`, `book_recipient_mobile`, `book_presence`, `book_count`, `book_period`, `book_period_devoted`) VALUES
(1, 'Под Игото', 'Под Игото е роман, който е създаден от Иван Вазов!', 'Под Игото е роман, който е създаден от Иван Вазов!', 'Иван Вазов', 'Роман', 'Мартин Станимиров', 'ул.Ален мак, №10', '1988-01-12', '0896239867', 'Не', 4, '2018-04-20', '2018-04-17');

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Схема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
