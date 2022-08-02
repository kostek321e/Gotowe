-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Sie 2022, 14:35
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `praca`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `dzialy`
--

CREATE TABLE `dzialy` (
  `id` int(11) NOT NULL,
  `Dzial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `dzialy`
--

INSERT INTO `dzialy` (`id`, `Dzial`) VALUES
(1, 'Dział 1'),
(2, 'Dział 2'),
(3, 'Dzial 3'),
(4, 'Dzial 5'),
(5, 'Dzial 5'),
(6, 'Dzial 6'),
(7, 'Dzial 9'),
(8, 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `firmy`
--

CREATE TABLE `firmy` (
  `id` int(11) NOT NULL,
  `Firma` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `firmy`
--

INSERT INTO `firmy` (`id`, `Firma`) VALUES
(1, 'Grupa DBK'),
(2, 'Firma2'),
(3, 'POLBRUK'),
(4, 'CocaCola'),
(14, 'ORLEN'),
(15, 'ORLEN'),
(17, 'Orlen'),
(18, 'Firma18'),
(19, 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `glowna`
--

CREATE TABLE `glowna` (
  `id` int(11) NOT NULL,
  `Imie` text NOT NULL,
  `Nazwisko` text NOT NULL,
  `Firma` text NOT NULL,
  `Oddzial` text NOT NULL,
  `Dzial` text DEFAULT NULL,
  `Stanowisko` text NOT NULL,
  `numerStacjonarny` text DEFAULT NULL,
  `numerKomorkowy` text DEFAULT NULL,
  `adresEmail` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `glowna`
--

INSERT INTO `glowna` (`id`, `Imie`, `Nazwisko`, `Firma`, `Oddzial`, `Dzial`, `Stanowisko`, `numerStacjonarny`, `numerKomorkowy`, `adresEmail`) VALUES
(1, 'Kamil', 'Kostun', 'Grupa DBK', 'Pierwszy Oddzial', 'Dział 1', 'Programista', '123456789', '965874123', 'kostek123e@gmail.com'),
(2, 'Marcin', 'Skrzynka', 'POLBRUK', 'Drugi Oddzial', '', 'Programista', '456987123', '654123987', 'skrzyneczka@bis.pl'),
(3, 'Kacper', 'Pawłowski', 'Firma2', 'Drugi Oddzial', 'Dział 2', 'Dyrektor', '654123987', '561324987', 'Powlo@dynks.com'),
(4, 'Null', 'Test', 'Grupa DBK', 'Pierwszy Oddzial', 'Dzial 3', 'ksiegowa', '456987123', '', 'test@test.com'),
(5, 'Null', 'Test', 'Firma2', 'Drugi Oddzial', 'Dział 1', 'Programista', '456987123', '', 'hanna.kostun@onet.pl'),
(46, 'final', 'final', 'Grupa DBK', 'Pierwszy Oddzial', '', 'Programista', '123564982', '568423917', 'test@test.com');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oddzialy`
--

CREATE TABLE `oddzialy` (
  `id` int(11) NOT NULL,
  `Oddzial` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `oddzialy`
--

INSERT INTO `oddzialy` (`id`, `Oddzial`) VALUES
(1, 'Pierwszy Oddzial'),
(2, 'Drugi Oddzial'),
(3, 'Trzeci Oddzial'),
(4, 'Czwarty Oddzial'),
(5, 'Oddzial6'),
(6, 'test');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowiska`
--

CREATE TABLE `stanowiska` (
  `id` int(11) NOT NULL,
  `stanowisko` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `stanowiska`
--

INSERT INTO `stanowiska` (`id`, `stanowisko`) VALUES
(1, 'Dyrektor'),
(2, 'Programista'),
(3, 'ksiegowa'),
(4, 'Stanowisko1'),
(5, 'Stanowisko5'),
(6, 'test');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `dzialy`
--
ALTER TABLE `dzialy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `firmy`
--
ALTER TABLE `firmy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `glowna`
--
ALTER TABLE `glowna`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `oddzialy`
--
ALTER TABLE `oddzialy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `dzialy`
--
ALTER TABLE `dzialy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `firmy`
--
ALTER TABLE `firmy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT dla tabeli `glowna`
--
ALTER TABLE `glowna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT dla tabeli `oddzialy`
--
ALTER TABLE `oddzialy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
