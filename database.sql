-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Kwi 2023, 13:30
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `skoki`
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
('admin', '$2y$10$yw5wxf.OxJyJI8b9jDX1neSteHSUCxjV5WV/cgkYxkwuFr5QqPInS');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `status`
--

CREATE TABLE `status` (
  `id` int(100) NOT NULL,
  `id_authorization` varchar(25) NOT NULL,
  `user` varchar(150) NOT NULL,
  `date` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `status`
--

INSERT INTO `status` (`id`, `id_authorization`, `user`, `date`, `ip`, `info`) VALUES
(1, 'U8KmoX', 'admin', '2023-04-05 13:05:31pm', '*****', 'Użytkownik wyczyścił logi'),
(2, 'U8KmoX', 'admin', '2023-04-05 13:17:42pm', '*****', 'Użytkownik usunął zawodnika'),
(3, 'U8KmoX', 'admin', '2023-04-05 13:29:15pm', '*****', 'Cofniecie autoryzacji dla użytkownika'),
(4, 'fmbvEH', '', '2023-04-05 13:29:16pm', '*****', 'Niepoprawne dane przy autoryzacji');

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
(2, 'HARAT', 'Jakub', 'Polska', '23', 126, '22', '177', 'Klimczok', 'Brak'),
(3, 'HULA', 'Stefan', 'Polska', '51', 236, '36', '174', 'Stowański', 'Jest żonaty i posiada dwójkę dzieci'),
(4, 'KOT', 'Maciej', 'Polska', '43', 245, '21', '178', 'Makowski', 'Urodził się w Limanowie'),
(5, 'HABDAS', 'Jan', 'Polska', '9', 135, '18', '175', 'Kowalski', 'Waży 180kg wzrostu'),
(6, 'IWASA', 'Yuken', 'Japonia', '32', 189, '23', '178', 'Sapporo', 'Brak'),
(7, 'SATO', 'Keiichi', 'Japonia', '27', 198, '26', '178', 'Oberstdorf', 'Debiut w zawodach FIS w 2014 roku'),
(8, 'FORFANG', 'Johann Andre', 'Norwegia', '43', 246, '27', '191', 'Tromso', 'Jest kawalerem'),
(9, 'MARKENG', 'Thomas Aasen', 'Norwegia', '32', 200, '22', '182', 'Lensbygda', 'Brak'),
(10, 'FELDOREAN', 'Andrei', 'Rumunia', '22', 197, '26', '186', 'Brak', 'Brak'),
(11, 'TKACZENKO', 'Siergiej', 'Kachazstan', '29', 200, '23', '170', 'Brak', 'Trenuje w klubie Ski Club VKO'),
(12, 'AMMANN', 'Simon', 'Szwajcaria', '42', 240, '41', '173', 'Schindellegi', 'Posiada syna i córkę');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`user`);

--
-- Indeksy dla tabeli `status`
--
ALTER TABLE `status`
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
-- AUTO_INCREMENT dla tabeli `status`
--
ALTER TABLE `status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `zawodnicy`
--
ALTER TABLE `zawodnicy`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
