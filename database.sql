-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 22 Lis 2022, 20:20
-- Wersja serwera: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- Wersja PHP: 8.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `www10735_database`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `authentication`
--

CREATE TABLE `authentication` (
  `user` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `authentication`
--

INSERT INTO `authentication` (`user`, `password`) VALUES
('admin', '$2y$10$yK5Tyc.9JQGC.X8oSJZbZuDxH439TQeJWGgGlPB0SwrcFEkUjLIqy');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `last_logins`
--

CREATE TABLE `last_logins` (
  `id` int(100) NOT NULL,
  `user` varchar(150) NOT NULL,
  `date` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `last_logins`
--

INSERT INTO `last_logins` (`id`, `user`, `date`, `ip`) VALUES
(1, 'admin', '2022-11-20 20:56:33pm', '83.27.23*****'),
(2, 'admin', '2022-11-20 20:57:25pm', '2a00:f41:4829:5712:b2e9:b418:3108*****'),
(3, 'admin', '2022-11-20 21:27:31pm', '83.27.23*****'),
(4, 'admin', '2022-11-20 22:29:45pm', '83.27.23*****'),
(5, 'admin', '2022-11-20 22:32:09pm', '83.27.23*****'),
(6, 'admin', '2022-11-20 22:37:20pm', '83.27.23*****'),
(7, 'admin', '2022-11-20 23:13:43pm', '83.27.23*****'),
(8, 'admin', '2022-11-20 23:22:35pm', '83.27.23*****'),
(9, 'admin@', '2022-11-20 23:49:20pm', '83.27.23*****'),
(10, 'admin@', '2022-11-21 14:22:25pm', '83.17.17*****'),
(11, 'admin@', '2022-11-22 18:34:11pm', '83.27.23*****'),
(12, 'admin@', '2022-11-22 18:37:12pm', '83.27.23*****'),
(13, 'admin@', '2022-11-22 18:55:36pm', '83.27.23*****'),
(14, 'admin@', '2022-11-22 19:31:05pm', '83.27.23*****'),
(15, 'admin@', '2022-11-22 19:48:12pm', '83.27.23*****'),
(16, 'admin@', '2022-11-22 19:55:13pm', '83.27.23*****'),
(17, 'admin@', '2022-11-22 20:43:15pm', '83.27.23*****'),
(18, 'admin@', '2022-11-22 20:45:51pm', '83.27.23*****'),
(19, 'admin@', '2022-11-22 20:52:55pm', '83.27.23*****'),
(20, 'admin@', '2022-11-22 20:53:34pm', '83.27.23*****'),
(21, 'admin@', '2022-11-22 20:53:56pm', '83.27.23*****'),
(22, 'admin@', '2022-11-22 20:57:41pm', '83.27.23*****'),
(23, 'admin@', '2022-11-22 20:58:14pm', '83.27.23*****');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zawodnicy`
--

CREATE TABLE `zawodnicy` (
  `id` int(100) NOT NULL,
  `nazwisko` varchar(50) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `imie` varchar(50) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `narodowosc` varchar(50) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `ilosc_wystapien` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `wynik` int(100) DEFAULT NULL,
  `wiek` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `wzrost` varchar(100) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `nazwisko_trenera` varchar(50) COLLATE utf8mb4_polish_ci DEFAULT NULL,
  `uwagi` varchar(500) COLLATE utf8mb4_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

--
-- Zrzut danych tabeli `zawodnicy`
--

INSERT INTO `zawodnicy` (`id`, `nazwisko`, `imie`, `narodowosc`, `ilosc_wystapien`, `wynik`, `wiek`, `wzrost`, `nazwisko_trenera`, `uwagi`) VALUES
(1, 'JOJKO', 'Arkadiusz', 'Polska', '20', 145, '20', '168', 'Skrobot', 'Młody bardzo dobry skoczek'),
(2, 'HARAT', 'Jakub', 'Polska', '23', 126, '21', '177', 'Klimczok', 'Brak'),
(3, 'HULA', 'Stefan', 'Polska', '51', 236, '36', '174', 'Stowański', 'Jest żonaty i posiada dwójkę dzieci'),
(4, 'KOT', 'Maciej', 'Polska', '43', 245, '21', '178', 'Makowski', 'Urodził się w Limanowie'),
(5, 'HABDAS', 'Jan', 'Polska', '9', 135, '18', '175', 'Kowalski', 'Waży 54kg'),
(6, 'IWASA', 'Yuken', 'Japonia', '32', 189, '23', '178', 'Sapporo', 'Brak'),
(7, 'SATO', 'Keiichi', 'Japonia', '27', 198, '26', '178', 'Oberstdorf', 'Debiut w zawodach FIS w 2014 roku'),
(8, 'FORFANG', 'Johann Andre', 'Norwegia', '43', 246, '27', '191', 'Tromso', 'Jest kawalerem'),
(9, 'MARKENG', 'Thomas Aasen', 'Norwegia', '32', 200, '22', '182', 'Lensbygda', 'Brak'),
(10, 'FELDOREAN', 'Andrei', 'Rumunia', '21', 197, '26', '186', 'Brak', 'Brak'),
(11, 'TKACZENKO', 'Siergiej', 'Kachazstan', '29', 200, '23', '170', 'Brak', 'Trenuje w klubie Ski Club VKO'),
(12, 'AMMANN', 'Simon', 'Szwajcaria', '41', 240, '41', '173', 'Schindellegi', 'Posiada syna i córkę');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`user`);

--
-- Indeksy dla tabeli `last_logins`
--
ALTER TABLE `last_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `zawodnicy`
--
ALTER TABLE `zawodnicy`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `last_logins`
--
ALTER TABLE `last_logins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT dla tabeli `zawodnicy`
--
ALTER TABLE `zawodnicy`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
