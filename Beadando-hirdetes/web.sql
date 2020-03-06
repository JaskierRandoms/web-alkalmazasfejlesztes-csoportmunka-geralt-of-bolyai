-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2020. Feb 28. 22:14
-- Kiszolgáló verziója: 10.4.11-MariaDB
-- PHP verzió: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `web`
--
CREATE DATABASE IF NOT EXISTS `web` DEFAULT CHARACTER SET utf8 COLLATE utf8_hungarian_ci;
USE `web`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `content2`
--

CREATE TABLE `content2` (
  `userid` int(11) DEFAULT NULL,
  `kep` longtext COLLATE utf8_hungarian_ci DEFAULT NULL,
  `nev` tinytext COLLATE utf8_hungarian_ci DEFAULT NULL,
  `szoveg` tinytext COLLATE utf8_hungarian_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `content2`
--

INSERT INTO `content2` (`userid`, `kep`, `nev`, `szoveg`) VALUES
(2, NULL, 'asd hirdetése', 'asd vagyok eladó'),
(2, NULL, 'asd2', '1231'),
(2, NULL, 'asd asd', '32312312');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user` tinytext COLLATE utf8_hungarian_ci NOT NULL,
  `password` longtext COLLATE utf8_hungarian_ci NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`id`, `user`, `password`, `admin`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1),
(2, 'asd', 'f10e2821bbbea527ea02200352313bc059445190', 0);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `content2`
--
ALTER TABLE `content2`
  ADD KEY `userid` (`userid`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `content2`
--
ALTER TABLE `content2`
  ADD CONSTRAINT `content2_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
