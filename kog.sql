-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Vært: 192.168.112.124
-- Genereringstid: 28. 03 2017 kl. 17:00:49
-- Serverversion: 5.7.17-0ubuntu0.16.04.1
-- PHP-version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kog`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `kog_education`
--

CREATE TABLE `kog_education` (
  `id_education` int(11) NOT NULL,
  `education_name` varchar(255) NOT NULL,
  `education_time_year` int(11) NOT NULL,
  `education_time_month` int(11) NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `kog_education`
--

INSERT INTO `kog_education` (`id_education`, `education_name`, `education_time_year`, `education_time_month`, `date_upd`, `date_add`) VALUES
(1, 'IT-Supporter', 2, 6, '2017-03-28 06:34:45', '2017-03-28 06:34:45'),
(2, 'Datatekniker med speciale i programmering', 5, 6, '2017-03-28 06:36:38', '2017-03-28 06:36:38'),
(3, 'Datatekniker med speciale i infrastruktur', 5, 6, '2017-03-28 06:37:44', '2017-03-28 06:37:44'),
(4, 'Elektronikfagtekniker', 4, 0, '2017-03-28 06:37:11', '2017-03-28 06:37:11');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `kog_logins`
--

CREATE TABLE `kog_logins` (
  `id` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `password_token` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `kog_logins`
--

INSERT INTO `kog_logins` (`id`, `id_student`, `email`, `password`, `password_token`, `admin`, `date_upd`, `date_add`) VALUES
(1, 1, 'Jona456i@edu.mercantec.dk', '$2y$10$419Oewbjc1/iG1adXY7zSON93mer8eH0mz9G6K4RwnwvpmmA2e0Jy', '481aab0e1118ad4d6d5d2218254d95e9', 2, '2017-01-19 14:01:57', '2017-01-19 14:01:57'),
(2, 2, 'mads@mads.dk', '$2y$10$aXVn4u5NLt0Ccyfqvfr2RunDUGfsMphCtZFq0A8XLxX/tMtpj3gB.', '1ZVyRgSGcEGzBUKuvc40QtFIqwwL9o3b', 0, '2017-03-26 22:00:00', '2017-03-26 22:00:00');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `kog_student`
--

CREATE TABLE `kog_student` (
  `id_student` int(11) NOT NULL,
  `birth` date NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `id_education` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump for tabellen `kog_student`
--

INSERT INTO `kog_student` (`id_student`, `birth`, `first_name`, `last_name`, `id_education`, `active`, `date_upd`, `date_add`) VALUES
(1, '1996-10-06', 'Jonathan', 'Kristensen', 1, 1, '2017-03-28 07:38:22', '2017-01-18 12:35:12'),
(2, '1995-02-27', 'Mads', 'Linneberg', 1, 1, '2017-03-26 22:00:00', '2017-03-26 22:00:00'),
(3, '2017-03-27', 'Michael Andersen', 'Andersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(4, '2017-03-27', 'Asger Fastrup', 'Fastrup', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(5, '2017-03-27', 'August Quist Rannes', 'Rannes', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(6, '2017-03-27', 'Miralem Zilic', 'Zilic', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(7, '2017-03-27', 'Sebastian Ørts Felletoft', 'Felletoft', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(8, '2017-03-27', 'Jonas Kallehave Grendslev', 'Grendslev', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(9, '2017-03-27', 'Jens Christian Nør Laugesen', 'Laugesen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(10, '2017-03-27', 'Andreas Kaae', 'Kaae', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(11, '2017-03-27', 'Magnus Offersen', 'Offersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(12, '2017-03-27', 'Lukas Alexander Brandenborg', 'Brandenborg', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(13, '2017-03-27', 'Asbjørn Aggerholm Lyngs', 'Lyngs', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(14, '2017-03-27', 'Mads Loch', 'Loch', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(15, '2017-03-27', 'Martin Weibrecht Jensen', 'Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(16, '2017-03-27', 'Kristoffer gram Rasmussen', 'Rasmussen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(17, '2017-03-27', 'Jonas Benjamin Kristensen', 'Kristensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(18, '2017-03-27', 'Jesper Lund Thomsen', 'Thomsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(19, '2017-03-27', 'Ronni Børsting Elkjær Iversen', 'Iversen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(20, '2017-03-27', 'Nicolai Kristensen Hardorff', 'Hardorff', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(21, '2017-03-27', 'Carsten Norup Nielsen', 'Nielsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(22, '2017-03-27', 'Heine Kristian Kristensen', 'Kristensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(23, '2017-03-27', 'Bodil Berg', 'Berg', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(24, '2017-03-27', 'Jonas Hagen', 'Hagen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(25, '2017-03-27', 'Mads Appelon Mikkelsen', 'Mikkelsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(26, '2017-03-27', 'Martin Christian Poulsen', 'Poulsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(27, '2017-03-27', 'Rasmus Poul Vilhelmsen', 'Vilhelmsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(28, '2017-03-27', 'Patrick Ernst Andersen', 'Andersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(29, '2017-03-27', 'Lasse Skou Løhde', 'Løhde', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(30, '2017-03-27', 'Bastian Lystrup Bech', 'Bech', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(31, '2017-03-27', 'Arne Jørgensen', 'Jørgensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(32, '2017-03-27', 'Asger Riisbøl', 'Rissbøl', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(33, '2017-03-27', 'Guo Li Xiao', 'Xiao', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(34, '2017-03-27', 'Jan Møller Andersen', 'Andersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(35, '2017-03-27', 'Benjamin David Olesen', 'Olesen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(36, '2017-03-27', 'Johannes Hejle Basballe Langfeldt', 'Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(37, '2017-03-27', 'Mladen pantic', 'Pantic', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(38, '2017-03-27', 'Jesper Jakobsen', 'Jakobsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(39, '2017-03-27', 'Andreas Haagh', 'Haagh', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(40, '2017-03-27', 'Filip Winthereig', 'Winthereig', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(41, '2017-03-27', 'Jeppe huy Hansen Lillelund', 'Huy Hansen Lillelund', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(42, '2017-03-27', 'Hans Christian Hajslund Eskildsen', 'Eskildsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(43, '2017-03-27', 'Henrik Olesen', 'Olesen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(44, '2017-03-27', 'Kasper Riis ', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(45, '2017-03-27', 'Mathias Lohmann', 'Mikkelsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(46, '2017-03-27', 'Thomas Bergholdt', 'Larsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(47, '2017-03-27', 'Mads Moth', 'Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(48, '2017-03-27', 'Frederik Møller', 'Møller', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(49, '2017-03-27', 'Malthe Rasmussen', 'Rasmussen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(50, '2017-03-27', 'Thomas Sandgaard', 'Jacobsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(51, '2017-03-27', 'Asger S. Nielsen', 'S. Nielsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(52, '2017-03-27', 'Theis Bækdal madsen', 'Bækdal madsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(53, '2017-03-27', 'Benjamin Ørts Felletoft', 'Felletoft', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(54, '2017-03-27', 'Daniel Borup Christiansen', 'Christiansen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(55, '2017-03-27', 'Jonas Holm Pedersen', 'Holm Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(56, '2017-03-27', 'Oliver Ingemann Stephansen', 'Stephansen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(57, '2017-03-27', 'Frederikke Rose Hansen', 'Hansen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(58, '2017-03-27', 'Max Lerager', 'Lerager', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(59, '2017-03-27', 'Yazdan Ali Hassani', 'Hassani', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(60, '2017-03-27', 'Søren Laurids', 'Laurids', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(61, '2017-03-27', 'Adnan Batlak', 'Batlak', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(62, '2017-03-27', 'Rasmus Sørensen', 'Sørensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(63, '2017-03-27', 'Oliver t Petersen', 'Petersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(64, '2017-03-27', 'Jesper W. Christensen', 'Christensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(65, '2017-03-27', 'Mads Jørgensen', 'Jørgensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(66, '2017-03-27', 'Ras Brandt thomassen', 'thomassen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(67, '2017-03-27', 'Nicolai Morgen Hansen', 'Hansen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(68, '2017-03-27', 'Mads Pedersen', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(69, '2017-03-27', 'Adam Robert Damtoft Mølgaard', 'Mølgaard', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(70, '2017-03-27', 'Ronnie Kirkegaard', 'Kirkegaard', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(71, '2017-03-27', 'Mads Skjødsholm', 'Skjødsholm', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(72, '2017-03-27', 'Casper Bondrup', 'Bondrup', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(73, '2017-03-27', 'Stefan Rosgaard', 'Rosgaard', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(74, '2017-03-27', 'Rasmus Luther Jensen', 'Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(75, '2017-03-27', 'Mikal Skogsted Kristensen', 'Kristensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(76, '2017-03-27', 'Morten von der Hude Sall', 'Sall', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(77, '2017-03-27', 'Bora Zivkovic', 'Zivkovic', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(78, '2017-03-27', 'Thomas Mark', 'Lynge', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(79, '2017-03-27', 'Jens Christian Rasmussen', 'Rasmussen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(80, '2017-03-27', 'Jonas Simonsen', 'Simonsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(81, '2017-03-27', 'Mads Linneberg', 'Linneberg', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(82, '2017-03-27', 'Leon Svane Jensen', 'Svane Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(83, '2017-03-27', 'Tomi Kivilo', 'Kivilo', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(84, '2017-03-27', 'Peter Olesen', 'Olesen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(85, '2017-03-27', 'Lasse Munk Nielsen', 'Nielsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(86, '2017-03-27', 'Mads Dueholm', 'Dueholm', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(87, '2017-03-27', 'Morten Søndermølle', 'Søndermølle', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(88, '2017-03-27', 'Kristoffer Vangsgaard', 'Andersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(89, '2017-03-27', 'Sergiy', 'Lymar', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(90, '2017-03-27', 'Mads Buus Rasmussen', 'Rasmussen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(91, '2017-03-27', 'Morten Mikaelsen Smed', 'Smed', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(92, '2017-03-27', 'Benjamin Møller Pihl ', 'Pihl', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(93, '2017-03-27', 'Jens Christian Rasmussen', 'Rasmussen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(94, '2017-03-27', 'Jesper Jespersen', 'Jespersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(95, '2017-03-27', 'Joan Agnethe Horte Pedersen', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(96, '2017-03-27', 'Jonas Cramer', 'Cramer', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(97, '2017-03-27', 'Jonatan Thinggaard Pedersen', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(98, '2017-03-27', 'Jonathan Ralf Kristensen', 'Kristensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(99, '2017-03-27', 'Jonas Simonsen', 'Simonsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(100, '2017-03-27', 'Kristian Lind Yde', 'Yde', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(101, '2017-03-27', 'Lasse Hofmann Larsen', 'Larsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(102, '2017-03-27', 'Mads Dueholm', 'Dueholm', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(103, '2017-03-27', 'Martin Krejberg Lauridsen', 'Lauridsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(104, '2017-03-27', 'Martin Tormod Bøndergaard', 'Bøndergaard', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(105, '2017-03-27', 'Mathias Daa Rønning', 'Rønning', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(106, '2017-03-27', 'Michael Bedholm Laursen', 'Laursen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(107, '2017-03-27', 'Nicolaj Fuglsang Sandgaard ', 'Sandgaard', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(108, '2017-03-27', 'Philip Hassing', 'Hassing', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(109, '2017-03-27', 'Simon Rebbe', 'Rebbe', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(110, '2017-03-27', 'Søren Rindom Kahr', 'Kahr', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(111, '2017-03-27', 'Tæst Æt', 'Et', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(112, '2017-03-27', 'Christian Brøchner', 'Hansen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(113, '2017-03-27', 'Mads Nicolaj Nielsen', 'Nielsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(114, '2017-03-27', 'Jonathan Kristensen', 'Kristensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(115, '2017-03-27', 'Birger Magnus Hebsgaard', 'Hebsgaard', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(116, '2017-03-27', 'Jeppe Smedegaard Marquardt', 'Marquardt', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(117, '2017-03-27', 'Steffen Nørskov Sørensen', 'Sørensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(118, '2017-03-27', 'Jacob-Daniel Hieronymus', 'Mynster Nielsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(119, '2017-03-27', 'Mads Skovby Rasmussen', 'Rasmussen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(120, '2017-03-27', 'Jimmi Berg Larsen', 'Larsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(121, '2017-03-27', 'Jan Hoppe Winther ', 'Nielsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(122, '2017-03-27', 'Jonathan Gross', 'Gross', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(123, '2017-03-27', 'Sune Pedersen', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(124, '2017-03-27', 'Oliver Dalgaard', 'Dalgaard', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(125, '2017-03-27', 'Billy Andersen', 'Andersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(126, '2017-03-27', 'Martin Løvig', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(127, '2017-03-27', 'Rasmus Jespersen', 'Jespersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(128, '2017-03-27', 'Mathias Munk', 'Munk', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(129, '2017-03-27', 'Jonas Henriksen', 'Henriksen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(130, '2017-03-27', 'Casper Lahn', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(131, '2017-03-27', 'Johan Pedersen', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(132, '2017-03-27', 'Morten Hansen', 'Hansen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(133, '2017-03-27', 'Alexander Nymark', 'Nymark', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(134, '2017-03-27', 'Michael Madsen', 'Madsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(135, '2017-03-27', 'Volodymyr Hlamazda', 'Hlamazda', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(136, '2017-03-27', 'Philip Almtoft', 'Olesen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(137, '2017-03-27', 'Morten Mynster Nørby', 'Kristensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(138, '2017-03-27', 'Steffen Kirkeby', 'Silkjær', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(139, '2017-03-27', 'Simon Rosenlund', 'Rosenlund', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(140, '2017-03-27', 'Rasmus Brodersen', 'Brodersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(141, '2017-03-27', 'Jack Jensen', 'Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(142, '2017-03-27', 'Thomas Olesen', 'Olesen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(143, '2017-03-27', 'Andreas Zacho', 'Zacho', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(144, '2017-03-27', 'Frederik Jensen', 'Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(145, '2017-03-27', 'Kasper Tousgaard', 'Mikkelsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(146, '2017-03-27', 'Andreas Nehls Kjems', 'Kjems', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(147, '2017-03-27', 'Sabrina Maria Silke', 'Iversen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(148, '2017-03-27', 'Danni Bundgaard', 'Petersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(149, '2017-03-27', 'Rasmus Møller Jensen', 'Jensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(150, '2017-03-27', 'Richard Brown Thomsen', 'Thomsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(151, '2017-03-27', 'Christian Normann Sørensen', 'Normann Sørensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(152, '2017-03-27', 'Christian Pedersen', 'Pedersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(153, '2017-03-27', 'Nicolaj Holm', 'Holm', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(154, '2017-03-27', 'Kim Mærsk Andersen', 'Andersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(155, '2017-03-27', 'Lasse Dyrby', 'Dyrby', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(156, '2017-03-27', 'Ulrik Petersen', 'Petersen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(157, '2017-03-27', 'Per Holst', 'Holst', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(158, '2017-03-27', 'Kristian Lind Kristensen', 'Lind Kristensen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(159, '2017-03-27', 'Jens Peter', 'Neumann', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(160, '2017-03-27', 'Kim Mølgaard', 'Kjeldsen', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(161, '2017-03-27', 'Oliver Højmose Korsholm', 'korsholm', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32'),
(162, '2017-03-27', 'Daniel Glob', 'Prøhl', 1, 1, '2017-03-27 13:14:32', '2017-03-27 13:14:32');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `kog_team`
--

CREATE TABLE `kog_team` (
  `id_team` int(11) NOT NULL,
  `team_number` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `kog_team_student`
--

CREATE TABLE `kog_team_student` (
  `id_team_student` int(11) NOT NULL,
  `id_team` int(11) NOT NULL,
  `id_student` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `date_upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `kog_education`
--
ALTER TABLE `kog_education`
  ADD PRIMARY KEY (`id_education`);

--
-- Indeks for tabel `kog_logins`
--
ALTER TABLE `kog_logins`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `kog_student`
--
ALTER TABLE `kog_student`
  ADD PRIMARY KEY (`id_student`);

--
-- Indeks for tabel `kog_team`
--
ALTER TABLE `kog_team`
  ADD PRIMARY KEY (`id_team`);

--
-- Indeks for tabel `kog_team_student`
--
ALTER TABLE `kog_team_student`
  ADD PRIMARY KEY (`id_team_student`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `kog_education`
--
ALTER TABLE `kog_education`
  MODIFY `id_education` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Tilføj AUTO_INCREMENT i tabel `kog_logins`
--
ALTER TABLE `kog_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Tilføj AUTO_INCREMENT i tabel `kog_student`
--
ALTER TABLE `kog_student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=333;
--
-- Tilføj AUTO_INCREMENT i tabel `kog_team`
--
ALTER TABLE `kog_team`
  MODIFY `id_team` int(11) NOT NULL AUTO_INCREMENT;
--
-- Tilføj AUTO_INCREMENT i tabel `kog_team_student`
--
ALTER TABLE `kog_team_student`
  MODIFY `id_team_student` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
