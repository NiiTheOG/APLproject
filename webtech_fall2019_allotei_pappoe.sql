-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 22, 2019 at 07:57 PM
-- Server version: 5.5.64-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtech_fall2019_allotei_pappoe`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('allotei', '7c8b10694698f0188542acdd38313d9d');

-- --------------------------------------------------------

--
-- Table structure for table `FANTASY_MATCHDAY_STATS`
--

CREATE TABLE `FANTASY_MATCHDAY_STATS` (
  `Match_day` int(11) NOT NULL,
  `Team_id` int(11) NOT NULL,
  `Points` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FANTASY_MATCHDAY_STATS`
--

INSERT INTO `FANTASY_MATCHDAY_STATS` (`Match_day`, `Team_id`, `Points`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 11),
(2, 1, 0),
(2, 2, 50),
(2, 3, 51),
(2, 4, 51),
(2, 5, 43),
(2, 6, 39),
(2, 7, 46),
(2, 8, 35),
(2, 9, 0),
(2, 10, 46),
(2, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `FANTASY_TEAM`
--

CREATE TABLE `FANTASY_TEAM` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(225) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `FANTASY_TEAM`
--

INSERT INTO `FANTASY_TEAM` (`team_id`, `team_name`, `user_id`) VALUES
(1, 'allotei fc', 1),
(2, 'paps fc', 2),
(3, 'og fc', 3),
(4, 'b fc', 4),
(5, 'Jones fc', 5),
(6, 'a fc', 6),
(7, 'simon fc', 7),
(8, 'otibo fc', 8),
(9, 'ey fc', 9),
(10, 'fred fc', 10),
(11, 'Fred FC', 11);

-- --------------------------------------------------------

--
-- Table structure for table `F_TEAM_PLAYERS`
--

CREATE TABLE `F_TEAM_PLAYERS` (
  `ft_id` int(11) NOT NULL,
  `player_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `F_TEAM_PLAYERS`
--

INSERT INTO `F_TEAM_PLAYERS` (`ft_id`, `player_id`) VALUES
(2, 'G1'),
(2, 'D1'),
(2, 'D5'),
(2, 'D9'),
(2, 'D0'),
(2, 'M1'),
(2, 'M5'),
(2, 'M9'),
(2, 'F1'),
(2, 'F5'),
(2, 'F6'),
(3, 'G1'),
(3, 'D1'),
(3, 'D5'),
(3, 'D9'),
(3, 'M1'),
(3, 'M5'),
(3, 'M6'),
(3, 'M7'),
(3, 'F1'),
(3, 'F5'),
(3, 'F9'),
(4, 'G1'),
(4, 'D1'),
(4, 'D5'),
(4, 'D6'),
(4, 'M1'),
(4, 'M2'),
(4, 'M5'),
(4, 'M6'),
(4, 'F1'),
(4, 'F5'),
(4, 'F9'),
(5, 'G1'),
(5, 'D1'),
(5, 'D2'),
(5, 'D3'),
(5, 'M1'),
(5, 'M2'),
(5, 'M3'),
(5, 'M4'),
(5, 'F1'),
(5, 'F2'),
(5, 'F3'),
(6, 'G3'),
(6, 'D1'),
(6, 'D2'),
(6, 'D3'),
(6, 'D4'),
(6, 'M1'),
(6, 'M2'),
(6, 'M3'),
(6, 'M4'),
(6, 'F1'),
(6, 'F2'),
(7, 'G1'),
(7, 'D1'),
(7, 'D5'),
(7, 'D9'),
(7, 'D0'),
(7, 'M1'),
(7, 'M5'),
(7, 'M9'),
(7, 'F1'),
(7, 'F5'),
(7, 'F9'),
(8, 'G2'),
(8, 'D1'),
(8, 'D2'),
(8, 'D3'),
(8, 'D4'),
(8, 'M1'),
(8, 'M2'),
(8, 'M3'),
(8, 'M4'),
(8, 'F2'),
(8, 'F3'),
(10, 'G1'),
(10, 'D1'),
(10, 'D5'),
(10, 'D9'),
(10, 'M1'),
(10, 'M5'),
(10, 'M9'),
(10, 'M0'),
(10, 'F1'),
(10, 'F5'),
(10, 'F9');

-- --------------------------------------------------------

--
-- Table structure for table `MATCHDAY_STATS`
--

CREATE TABLE `MATCHDAY_STATS` (
  `Match_day` int(11) NOT NULL,
  `Player_id` varchar(10) NOT NULL,
  `Played` tinyint(1) NOT NULL,
  `GOALS` int(11) NOT NULL,
  `ASSISTS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `MATCHDAY_STATS`
--

INSERT INTO `MATCHDAY_STATS` (`Match_day`, `Player_id`, `Played`, `GOALS`, `ASSISTS`) VALUES
(1, 'D0', 1, 0, 0),
(1, 'D1', 1, 0, 0),
(1, 'D2', 1, 0, 0),
(1, 'D3', 1, 0, 0),
(1, 'D4', 1, 0, 0),
(1, 'D5', 1, 0, 0),
(1, 'D6', 1, 0, 0),
(1, 'D7', 1, 0, 0),
(1, 'D8', 1, 0, 0),
(1, 'D9', 1, 0, 0),
(1, 'F0', 1, 0, 0),
(1, 'F1', 1, 0, 0),
(1, 'F2', 1, 0, 0),
(1, 'F3', 1, 0, 0),
(1, 'F4', 1, 0, 0),
(1, 'F5', 1, 0, 0),
(1, 'F6', 1, 0, 0),
(1, 'F7', 1, 0, 0),
(1, 'F8', 1, 0, 0),
(1, 'F9', 1, 0, 0),
(1, 'G1', 1, 0, 0),
(1, 'G2', 1, 0, 0),
(1, 'G3', 1, 0, 0),
(1, 'G4', 1, 0, 0),
(1, 'G5', 1, 0, 0),
(1, 'M0', 1, 0, 0),
(1, 'M1', 1, 0, 0),
(1, 'M2', 1, 0, 0),
(1, 'M3', 1, 0, 0),
(1, 'M4', 1, 0, 0),
(1, 'M5', 1, 0, 0),
(1, 'M6', 1, 0, 0),
(1, 'M7', 1, 0, 0),
(1, 'M8', 1, 0, 0),
(1, 'M9', 1, 0, 0),
(2, 'D0', 1, 0, 0),
(2, 'D1', 1, 0, 0),
(2, 'D2', 1, 0, 0),
(2, 'D3', 1, 0, 0),
(2, 'D4', 1, 0, 0),
(2, 'D5', 1, 0, 0),
(2, 'D6', 1, 0, 0),
(2, 'D7', 1, 0, 0),
(2, 'D8', 1, 0, 0),
(2, 'D9', 1, 0, 0),
(2, 'F0', 1, 0, 1),
(2, 'F1', 1, 0, 2),
(2, 'F2', 1, 0, 0),
(2, 'F3', 1, 0, 1),
(2, 'F4', 1, 0, 2),
(2, 'F5', 1, 0, 3),
(2, 'F6', 1, 0, 1),
(2, 'F7', 1, 0, 0),
(2, 'F8', 1, 0, 1),
(2, 'F9', 1, 0, 0),
(2, 'G1', 1, 0, 0),
(2, 'G2', 1, 0, 0),
(2, 'G3', 1, 0, 0),
(2, 'G4', 1, 0, 0),
(2, 'G5', 1, 0, 0),
(2, 'M0', 1, 0, 0),
(2, 'M1', 1, 1, 0),
(2, 'M2', 1, 1, 0),
(2, 'M3', 1, 1, 0),
(2, 'M4', 1, 1, 0),
(2, 'M5', 1, 1, 0),
(2, 'M6', 1, 1, 0),
(2, 'M7', 1, 1, 0),
(2, 'M8', 1, 1, 0),
(2, 'M9', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `PLAYERS`
--

CREATE TABLE `PLAYERS` (
  `player_id` varchar(10) NOT NULL,
  `player_name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `PLAYERS`
--

INSERT INTO `PLAYERS` (`player_id`, `player_name`) VALUES
('D0', 'Derek'),
('D1', 'Petit'),
('D2', 'Abbey'),
('D3', 'Mustapha'),
('D4', 'Nadeem'),
('D5', 'Ransford'),
('D6', 'Seyram'),
('D7', 'Barnabas'),
('D8', 'Emma'),
('D9', 'Alexis'),
('F0', 'Hudson'),
('F1', 'Daniel'),
('F2', 'Benjamin'),
('F3', 'Bright'),
('F4', 'Philip'),
('F5', 'Yaw'),
('F6', 'John'),
('F7', 'Meli'),
('F8', 'Dominic'),
('F9', 'Kofi'),
('G1', 'Prince'),
('G2', 'Akwasi Boateng'),
('G3', 'Kadmiel'),
('G4', 'Evans'),
('G5', 'Blueskirt'),
('M0', 'Yesu'),
('M1', 'Maison'),
('M2', 'Elvis'),
('M3', 'Stephen'),
('M4', 'Kobby'),
('M5', 'Jesse'),
('M6', 'Atule'),
('M7', 'Nico'),
('M8', 'Joel'),
('M9', 'Yaw');

-- --------------------------------------------------------

--
-- Table structure for table `SEASON_POINTS`
--

CREATE TABLE `SEASON_POINTS` (
  `team_id` int(11) NOT NULL,
  `Season_points` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `SEASON_POINTS`
--

INSERT INTO `SEASON_POINTS` (`team_id`, `Season_points`) VALUES
(1, '0'),
(2, '50'),
(3, '62'),
(4, '51'),
(5, '43'),
(6, '39'),
(7, '46'),
(8, '35'),
(9, '0'),
(10, '46'),
(11, '0');

-- --------------------------------------------------------

--
-- Table structure for table `USER_T`
--

CREATE TABLE `USER_T` (
  `user_id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `u_password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `USER_T`
--

INSERT INTO `USER_T` (`user_id`, `username`, `u_password`) VALUES
(1, 'Allotei', '7c8b10694698f0188542acdd38313d9d'),
(2, 'Pappoe', '7c8b10694698f0188542acdd38313d9d'),
(3, 'godlove08', '7c8b10694698f0188542acdd38313d9d'),
(4, 'bag', '0b2520985f35b63da78f07d0abcc6cd2'),
(5, 'Jones', 'd53479a8b3f397627ec70537707e0b99'),
(6, 'Arlen', '7824d28c22a80a8f3bc4aac21aa2d0fb'),
(7, 'Simon', '7c8b10694698f0188542acdd38313d9d'),
(8, 'otibo', '0b2520985f35b63da78f07d0abcc6cd2'),
(9, 'edem', '0b2520985f35b63da78f07d0abcc6cd2'),
(10, 'Frederick', '7c8b10694698f0188542acdd38313d9d'),
(11, 'David', '7c8b10694698f0188542acdd38313d9d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `FANTASY_MATCHDAY_STATS`
--
ALTER TABLE `FANTASY_MATCHDAY_STATS`
  ADD PRIMARY KEY (`Match_day`,`Team_id`),
  ADD KEY `Team_id` (`Team_id`);

--
-- Indexes for table `FANTASY_TEAM`
--
ALTER TABLE `FANTASY_TEAM`
  ADD PRIMARY KEY (`team_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `F_TEAM_PLAYERS`
--
ALTER TABLE `F_TEAM_PLAYERS`
  ADD KEY `ft_id` (`ft_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indexes for table `MATCHDAY_STATS`
--
ALTER TABLE `MATCHDAY_STATS`
  ADD PRIMARY KEY (`Match_day`,`Player_id`),
  ADD KEY `Player_id` (`Player_id`);

--
-- Indexes for table `PLAYERS`
--
ALTER TABLE `PLAYERS`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `USER_T`
--
ALTER TABLE `USER_T`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `FANTASY_TEAM`
--
ALTER TABLE `FANTASY_TEAM`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `USER_T`
--
ALTER TABLE `USER_T`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `FANTASY_MATCHDAY_STATS`
--
ALTER TABLE `FANTASY_MATCHDAY_STATS`
  ADD CONSTRAINT `FANTASY_MATCHDAY_STATS_ibfk_1` FOREIGN KEY (`Match_day`) REFERENCES `MATCHDAY_STATS` (`Match_day`),
  ADD CONSTRAINT `FANTASY_MATCHDAY_STATS_ibfk_2` FOREIGN KEY (`Team_id`) REFERENCES `FANTASY_TEAM` (`team_id`);

--
-- Constraints for table `FANTASY_TEAM`
--
ALTER TABLE `FANTASY_TEAM`
  ADD CONSTRAINT `FANTASY_TEAM_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `USER_T` (`user_id`);

--
-- Constraints for table `F_TEAM_PLAYERS`
--
ALTER TABLE `F_TEAM_PLAYERS`
  ADD CONSTRAINT `F_TEAM_PLAYERS_ibfk_1` FOREIGN KEY (`ft_id`) REFERENCES `FANTASY_TEAM` (`team_id`),
  ADD CONSTRAINT `F_TEAM_PLAYERS_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `PLAYERS` (`player_id`);

--
-- Constraints for table `MATCHDAY_STATS`
--
ALTER TABLE `MATCHDAY_STATS`
  ADD CONSTRAINT `MATCHDAY_STATS_ibfk_1` FOREIGN KEY (`Player_id`) REFERENCES `PLAYERS` (`player_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
