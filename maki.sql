-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 03:47 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maki`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `performer` varchar(256) NOT NULL,
  `venue` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `dateStart` datetime NOT NULL,
  `dateEnd` datetime NOT NULL,
  `ticket_price` varchar(256) NOT NULL,
  `status` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `performer`, `venue`, `description`, `dateStart`, `dateEnd`, `ticket_price`, `status`, `created_at`) VALUES
(1, 'OPM Artists', 'Parokya ni Edgar,Imago, Moonstar88, 6cyclemind', 'Araneta Coliseum', 'Sa Araneta may OPM Artist', '2021-12-16 18:00:00', '2021-12-16 21:00:00', 'Canceled', '900', '2021-12-16 18:00:00'),
(2, 'Awit Para Sa Mga Bata', 'Lea Salonga', 'Kia Theatre', 'Awit para sayo', '2021-12-17 13:00:00', '2021-12-17 16:00:00', 'Done', '550', '2021-12-17 03:00:00'),
(10, 'Hiraya', 'Cup of Joe', 'CCA Theatre', 'Kakantahin ng cup of joe yung Hiraya sa CCA Theatre', '2021-12-25 17:00:00', '2021-12-25 19:30:00', 'Upcoming', '250', '2021-12-18 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `event_id` int(11) UNSIGNED NOT NULL,
  `type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_user`
--

INSERT INTO `event_user` (`user_id`, `event_id`, `type`) VALUES
(1, 1, 'owner'),
(1, 2, 'member'),
(2, 2, 'owner'),
(3, 3, 'member'),
(4, 1, 'member'),
(4, 2, 'member'),
(4, 3, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `userName` varchar(128) NOT NULL,
  `givenName` varchar(128) NOT NULL,
  `surName` varchar(128) NOT NULL,
  `phoneNum` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `userName`, `givenName`, `surName`, `phoneNum`, `type`, `email`, `password`, `created_at`) VALUES
(1, 'bottomless', 'Neville', 'Longbottom', '09274411993', 'member', 'swordgryffindor@gmail.com', 'ridikkulus', '2021-12-16 00:00:00'),
(2, 'hermyone', 'Hermione', 'Granger', '09274411987', 'event manager', 'hermsgranny@gmail.com', 'obliviate', '2021-09-23 00:00:00'),
(3, 'ginger', 'Ron', 'Weasley', '09274411988', 'member', 'weasleyrooon@gmail.com', 'leviosa', '2021-10-11 00:00:00'),
(4, 'drake', 'Draco', 'Malfoy', '09274411989', 'member', 'malfoy456@gmail.com', 'expelliarmus', '2021-08-17 00:00:00'),
(5, 'lunalove', 'Luna', 'Lovegood', '09274411990', 'member', 'lovelunalove143@gmail.com', 'episkey', '2021-10-13 00:00:00'),
(6, 'sniper', 'Severus', 'Snape', '09274411991', 'member', 'halfbloodprince@gmail.com', 'sectumsempra', '2021-07-05 00:00:00'),
(7, 'antiminerva', 'Minerva', 'Mcgonagall', '09274411992', 'member', 'pusacatmeow@gmail.com', 'locomotor', '2021-10-15 00:00:00'),
(8, 'bottomless', 'Neville', 'Longbottom', '09274411993', 'member', 'swordgryffindor@gmail.com', 'ridikkulus', '2021-12-16 00:00:00'),
(9, 'gin', 'Ginny', 'Weasley', '09274411994', 'member', 'c2gin@gmail.com', 'reducto', '2021-10-17 00:00:00'),
(10, 'dambledoor', 'Albus', 'Dumbledore', '09274411995', 'event manager', 'elderwand@gmail.com', 'kedavra', '2021-05-09 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD UNIQUE KEY `uk_user_event` (`user_id`,`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
