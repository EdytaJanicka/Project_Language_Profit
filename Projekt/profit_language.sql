-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Kwi 2020, 00:14
-- Wersja serwera: 10.4.8-MariaDB
-- Wersja PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `profit_language`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzial`
--

CREATE TABLE `dzial` (
  `id_dzialu` varchar(255) NOT NULL,
  `dzial` varchar(40) NOT NULL,
  `id_kursu` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `dzial`
--

INSERT INTO `dzial` (`id_dzialu`, `dzial`, `id_kursu`) VALUES
('1', 'Komputer', '12'),
('2', 'Narzędzia', '12'),
('3', 'Programy', '12'),
('4', 'Sieć - Sprzęt', '13'),
('5', 'Narzędzia', '13'),
('6', 'Serwer', '13'),
('7', 'Bazy danych', '14'),
('8', 'Programowanie', '14'),
('9', 'Grafika', '14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `id_kursu` varchar(255) NOT NULL,
  `kurs` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`id_kursu`, `kurs`) VALUES
('12', 'E12'),
('13', 'E13'),
('14', 'E14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `slowa`
--

CREATE TABLE `slowa` (
  `id_slowka` int(11) NOT NULL,
  `slowo` varchar(255) DEFAULT NULL,
  `slowo_ang` varchar(255) DEFAULT NULL,
  `id_dzialu` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `slowa`
--

INSERT INTO `slowa` (`id_slowka`, `slowo`, `slowo_ang`, `id_dzialu`) VALUES
(1, 'Sprzęt', 'Hardware', '1'),
(2, 'Myszka', 'Mouse', '1'),
(3, 'Klawiatura', 'Keyboard', '1'),
(4, 'Śrubokręt', 'Screwdriver', '2'),
(5, 'Sprężone powietrze', 'Compressed air', '2'),
(6, 'Rejestr', 'Register', '3'),
(7, 'Powłoka', 'Shell', '3'),
(8, 'Ruter', 'Router', '4'),
(9, 'Modem', 'Modem', '4'),
(10, 'Resetnik', 'Resetor', '5'),
(11, 'Serwer', 'Server', '6'),
(12, 'Domena', 'Domain', '6'),
(13, 'Serwer Pocztowy', 'Mail Server', '6'),
(14, 'Tabela', 'Table', '7'),
(15, 'Baza Danych', 'Database', '7'),
(16, 'Kwerenda', 'Query', '7'),
(17, 'Zmienna', 'Variable', '8'),
(18, 'Funkcja', 'Function', '8'),
(19, 'Pętla', 'Loop', '8'),
(20, 'Obrazek', 'Picture', '9'),
(21, 'Wektor', 'Vector', '9'),
(22, 'Piksel', 'Pixel', '9'),
(23, 'Renderowanie', 'Render', '9');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `login` varchar(30) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `administrator` varchar(1) NOT NULL DEFAULT '1',
  `mail` varchar(50) NOT NULL DEFAULT 'No'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`login`, `haslo`, `administrator`, `mail`) VALUES
('Janusz', 'Qwerty1', '2', 'janusz@gmail.com'),
('Edyta', 'Janicka123', '1', 'aria.edi.7@gmail.com'),
('admin', 'aDministrator*', '3', 'No');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdane_polaczenie`
--

CREATE TABLE `zdane_polaczenie` (
  `login` varchar(255) DEFAULT NULL,
  `id_slowka` varchar(255) DEFAULT NULL,
  `zdane` varchar(3) NOT NULL DEFAULT 'No',
  `id_zdane` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `zdane_polaczenie`
--

INSERT INTO `zdane_polaczenie` (`login`, `id_slowka`, `zdane`, `id_zdane`) VALUES
('Edyta', '1', 'Yes', '1'),
('Edyta', '2', 'Yes', '2'),
('Edyta', '3', 'No', '3'),
('Edyta', '4', 'Yes', '4'),
('Edyta', '5', 'No', '5'),
('Edyta', '6', 'No', '6'),
('Edyta', '7', 'Yes', '7'),
('Edyta', '8', 'No', '8'),
('Edyta', '9', 'No', '9'),
('Edyta', '10', 'No', '10'),
('Edyta', '11', 'No', '11'),
('Edyta', '12', 'No', '12'),
('Edyta', '13', 'No', '13'),
('Edyta', '14', 'No', '14'),
('Edyta', '15', 'No', '15'),
('Edyta', '16', 'No', '16'),
('Edyta', '17', 'No', '17'),
('Edyta', '18', 'No', '18'),
('Edyta', '19', 'No', '19'),
('Edyta', '20', 'No', '20'),
('Edyta', '21', 'No', '21'),
('Edyta', '22', 'No', '22'),
('Edyta', '23', 'No', '23');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dzial`
--
ALTER TABLE `dzial`
  ADD PRIMARY KEY (`id_dzialu`),
  ADD KEY `id_dzialu` (`id_dzialu`),
  ADD KEY `id_kursu` (`id_kursu`);

--
-- Indeksy dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kursu`),
  ADD KEY `kurs` (`kurs`);

--
-- Indeksy dla tabeli `slowa`
--
ALTER TABLE `slowa`
  ADD PRIMARY KEY (`id_slowka`),
  ADD KEY `id_dzialu` (`id_dzialu`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`login`);

--
-- Indeksy dla tabeli `zdane_polaczenie`
--
ALTER TABLE `zdane_polaczenie`
  ADD PRIMARY KEY (`id_zdane`),
  ADD KEY `id_tlumaczenia` (`id_slowka`),
  ADD KEY `id_zdane` (`id_zdane`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `slowa`
--
ALTER TABLE `slowa`
  MODIFY `id_slowka` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
