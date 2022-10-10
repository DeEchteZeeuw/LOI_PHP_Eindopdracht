-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Gegenereerd op: 10 okt 2022 om 10:11
-- Serverversie: 5.7.34
-- PHP-versie: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ledenadministratie`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `boekjaar`
--

CREATE TABLE `boekjaar` (
  `ID` int(11) NOT NULL,
  `Jaar` year(4) NOT NULL,
  `Bedrag` float NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `boekjaar`
--

INSERT INTO `boekjaar` (`ID`, `Jaar`, `Bedrag`) VALUES
(2, 2021, 150),
(3, 2020, 110),
(5, 2022, 50);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `contributie`
--

CREATE TABLE `contributie` (
  `ID` int(11) NOT NULL,
  `Lid` int(100) NOT NULL,
  `Betaald` float NOT NULL DEFAULT '0',
  `Boekjaar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `contributie`
--

INSERT INTO `contributie` (`ID`, `Lid`, `Betaald`, `Boekjaar`) VALUES
(2, 1, 75, 2),
(3, 1, 100, 3);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `familie`
--

CREATE TABLE `familie` (
  `ID` int(100) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Adres` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `familie`
--

INSERT INTO `familie` (`ID`, `Naam`, `Adres`) VALUES
(1, 'Sandersen', 'Nieuwmarkt 24, 1012 CR Amsterdam');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `familielid`
--

CREATE TABLE `familielid` (
  `ID` int(100) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Familie` int(11) NOT NULL,
  `Geboortedatum` date NOT NULL,
  `SoortLid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `familielid`
--

INSERT INTO `familielid` (`ID`, `Naam`, `Familie`, `Geboortedatum`, `SoortLid`) VALUES
(1, 'Mark', 1, '2022-10-03', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `gebruikers`
--

CREATE TABLE `gebruikers` (
  `ID` int(100) NOT NULL,
  `Email` varchar(254) NOT NULL,
  `Wachtwoord` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `gebruikers`
--

INSERT INTO `gebruikers` (`ID`, `Email`, `Wachtwoord`) VALUES
(1, 'admin@ledenadministratie.nl', '$2y$10$AcFhrN7vbnO.OHUXVTROqOOK4fCEVgM8rSEp5FPLaiNb1WbrApyTC');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `soort lid`
--

CREATE TABLE `soort lid` (
  `ID` int(100) NOT NULL,
  `Naam` varchar(255) NOT NULL,
  `Contributie Percentage` int(3) NOT NULL DEFAULT '100',
  `Omschrijving` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `soort lid`
--

INSERT INTO `soort lid` (`ID`, `Naam`, `Contributie Percentage`, `Omschrijving`) VALUES
(1, 'Standaard', 100, 'Dit lid is een standaard lid en betaald het normale contributie bedrag.'),
(2, 'Speciaal', 110, 'Dit lid kan buiten de standaard tijden het club terrein betreden voor vrije tijds besteding.'),
(3, 'Exceptioneel', 125, 'Dit lid kan buiten de standaard tijden het club terrein betreden voor vrije tijds besteding en niet leden als gast meenemen.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `boekjaar`
--
ALTER TABLE `boekjaar`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Jaar` (`Jaar`);

--
-- Indexen voor tabel `contributie`
--
ALTER TABLE `contributie`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Soort Lid` (`Soort Lid`),
  ADD KEY `Lid` (`Lid`),
  ADD KEY `Boekjaar` (`Boekjaar`);

--
-- Indexen voor tabel `familie`
--
ALTER TABLE `familie`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Adres` (`Adres`);

--
-- Indexen voor tabel `familielid`
--
ALTER TABLE `familielid`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Familie` (`Familie`),
  ADD KEY `Soort lid` (`SoortLid`);

--
-- Indexen voor tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexen voor tabel `soort lid`
--
ALTER TABLE `soort lid`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Naam` (`Naam`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `boekjaar`
--
ALTER TABLE `boekjaar`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT voor een tabel `contributie`
--
ALTER TABLE `contributie`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `familie`
--
ALTER TABLE `familie`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `familielid`
--
ALTER TABLE `familielid`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `gebruikers`
--
ALTER TABLE `gebruikers`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT voor een tabel `soort lid`
--
ALTER TABLE `soort lid`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `contributie`
--
ALTER TABLE `contributie`
  ADD CONSTRAINT `contributie_ibfk_2` FOREIGN KEY (`Soort Lid`) REFERENCES `soort lid` (`ID`),
  ADD CONSTRAINT `contributie_ibfk_3` FOREIGN KEY (`Boekjaar`) REFERENCES `boekjaar` (`ID`),
  ADD CONSTRAINT `contributie_ibfk_4` FOREIGN KEY (`Lid`) REFERENCES `familielid` (`ID`);

--
-- Beperkingen voor tabel `familielid`
--
ALTER TABLE `familielid`
  ADD CONSTRAINT `familielid_ibfk_1` FOREIGN KEY (`Familie`) REFERENCES `familie` (`ID`),
  ADD CONSTRAINT `familielid_ibfk_2` FOREIGN KEY (`SoortLid`) REFERENCES `soort lid` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
