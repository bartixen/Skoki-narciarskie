SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `authentication` (
  `user` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `authentication` (`user`, `password`) VALUES
('admin', '');

CREATE TABLE `status` (
  `id` int(100) NOT NULL,
  `id_authorization` varchar(25) NOT NULL,
  `user` varchar(150) NOT NULL,
  `date` varchar(50) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `status` (`id`, `id_authorization`, `user`, `date`, `ip`, `info`) VALUES
(1, 'l&^9qy', 'admin', '2022-11-24 20:11:25pm', '**********', 'Użytkownik wyczyścił logi'),
(2, 'l&^9qy', 'admin', '2022-11-24 20:14:54pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(3, 'yb!bh6', 'admin', '2022-11-24 20:14:59pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(4, 'yb!bh6', 'admin', '2022-11-24 20:15:01pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(5, 'tnQHx^', 'admin', '2022-11-24 20:15:03pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(6, 'tnQHx^', 'admin', '2022-11-24 20:15:04pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(7, 'L871gZ', 'admin', '2022-11-24 20:15:09pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(8, 'L871gZ', 'admin', '2022-11-24 20:15:10pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(9, 'FnW!UP', 'admin', '2022-11-24 20:15:12pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(10, 'FnW!UP', 'admin', '2022-11-24 20:15:14pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(11, '^L@H^6', 'admin', '2022-11-24 20:15:15pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(12, '^L@H^6', 'admin', '2022-11-24 20:15:16pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(13, 'gkEnd1', 'admin', '2022-11-24 20:15:18pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(14, 'gkEnd1', 'admin', '2022-11-24 20:15:19pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(15, '^HguAK', 'admin', '2022-11-24 20:15:21pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(16, '^HguAK', 'admin', '2022-11-24 20:15:22pm', '**********', 'Cofniecie autoryzacji dla użytkownika'),
(17, 'Iz1fT&', 'admin', '2022-11-24 20:15:24pm', '**********', 'Pomyślna autoryzacja użytkownika'),
(18, 'Iz1fT&', 'admin', '2022-11-24 20:15:46pm', '**********', 'Użytkownik dodał nowego zawodnika'),
(19, 'Iz1fT&', 'admin', '2022-11-24 20:15:53pm', '**********', 'Użytkownik usunął zawodnika');

CREATE TABLE `zawodnicy` (
  `id` int(100) NOT NULL,
  `nazwisko` varchar(50) DEFAULT NULL,
  `imie` varchar(50) DEFAULT NULL,
  `narodowosc` varchar(50) DEFAULT NULL,
  `ilosc_wystapien` varchar(100) DEFAULT NULL,
  `wynik` int(100) DEFAULT NULL,
  `wiek` varchar(100) DEFAULT NULL,
  `wzrost` varchar(100) DEFAULT NULL,
  `nazwisko_trenera` varchar(50) DEFAULT NULL,
  `uwagi` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

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

ALTER TABLE `authentication`
  ADD PRIMARY KEY (`user`);

ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `zawodnicy`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `status`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

ALTER TABLE `zawodnicy`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;
