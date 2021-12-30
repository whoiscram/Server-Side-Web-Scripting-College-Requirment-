-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 07:07 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

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
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(256) NOT NULL,
  `performer` varchar(256) NOT NULL,
  `venue` varchar(256) NOT NULL,
  `description` varchar(256) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `ticket_price` double NOT NULL,
  `status` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `performer`, `venue`, `description`, `date_start`, `date_end`, `ticket_price`, `status`, `created_at`) VALUES
(1, 'OPM ARTISTS', 'Parokya ni Edgar,Imago, Moonstar88, 6cyclemind', 'Araneta Coliseum', 'dami nilang kakanta', '2021-12-21 18:00:00', '2021-12-22 18:00:00', 5000, 'Finished', '2021-12-16 18:00:00'),
(2, 'Awit Para Sa Mga Bata', 'Lea Salonga', 'Kia Theatre', 'Awit para sayo', '2021-12-17 13:00:00', '2021-12-17 16:00:00', 0, 'Finished', '2021-12-17 03:00:00'),
(3, 'Hiraya', 'Cup of Joe', 'CCA Theatre', 'Kakantahin ng cup of joe yung Hiraya sa CCA Theatre', '2023-01-01 08:00:00', '2022-01-01 10:00:00', 100, 'Upcoming', '2021-12-30 13:44:52'),
(4, 'World Tour', 'TWICE', 'MOA', 'is sana gae', '2021-12-20 06:00:00', '2021-12-23 20:00:00', 1000, 'Cancelled', '2021-12-20 17:54:18'),
(5, 'Arthur\'s Cause', 'Arthur Nery', 'Casa Generosa Building 86 Upper Gen. Luna Road Extention Brgy, Baguio, 2600 Benguet', 'Arthurs Philippine Tour', '2023-01-05 10:00:00', '2023-01-05 12:00:00', 500, 'Upcoming', '2021-12-30 13:52:14'),
(6, 'Because its for a Cause', 'Because, Kiyo , Shorttone and Al James', '33 Legarda Rd, Barangay Burnham - Legarda, Baguio, 2600 Benguet', '4 local rappers are going to sing and rap for a cause', '2022-01-06 12:00:00', '2022-01-06 13:00:00', 500, 'Cancelled', '2021-12-30 13:52:14'),
(7, 'Ben and ben and ben and ben', 'Ben & Ben', '#39 Tan Building, Lower Session Road, Baguio, 2600 Benguet', 'Open Mic for aspiring singers held by the band\r\nBen & Ben', '2022-01-01 15:00:00', '2022-01-01 16:00:00', 500, 'Ongoing', '2021-12-30 13:59:06'),
(8, 'All for one we as ONE', 'Juan Carlos, SUD, Up Dharma Down', 'SM City Baguio Luneta Hill, Upper Session Rd, Baguio, 2600 Benguet', 'Join and be one of the most underrated singers and bands ', '2022-01-06 15:20:00', '2022-01-06 18:20:00', 450, 'Ongoing', '2021-12-30 13:59:06');

-- --------------------------------------------------------

--
-- Table structure for table `event_users`
--

CREATE TABLE `event_users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `type` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_users`
--

INSERT INTO `event_users` (`user_id`, `event_id`, `type`) VALUES
(1, 1, 'member'),
(1, 2, 'member'),
(2, 2, 'admin'),
(3, 3, 'member'),
(4, 1, 'member'),
(4, 2, 'member'),
(4, 3, 'member'),
(11, 5, 'member'),
(11, 8, 'member'),
(14, 7, 'member'),
(14, 8, 'member'),
(15, 5, 'member'),
(16, 3, 'member'),
(16, 5, 'member'),
(17, 3, 'member'),
(18, 7, 'member');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `username` varchar(256) NOT NULL,
  `given_name` varchar(256) NOT NULL,
  `surname` varchar(256) NOT NULL,
  `phone_number` varchar(256) NOT NULL,
  `type` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `given_name`, `surname`, `phone_number`, `type`, `email`, `password`, `created_at`) VALUES
(1, 'bottomless', 'Neville', 'Longbottom', '09274411993', 'member', 'swordgryffindor@gmail.com', 'ridikkulus', '2021-12-16 00:00:00'),
(2, 'hermyone', 'Hermione', 'Granger', '09274411987', 'admin', 'hermsgranny@gmail.com', 'obliviate', '2021-09-23 00:00:00'),
(3, 'ginger', 'Ron', 'Weasley', '09274411988', 'member', 'weasleyrooon@gmail.com', 'leviosa', '2021-10-11 00:00:00'),
(4, 'drake', 'Draco', 'Malfoy', '09274411989', 'member', 'malfoy456@gmail.com', 'expelliarmus', '2021-08-17 00:00:00'),
(5, 'lunalove', 'Luna', 'Lovegood', '09274411990', 'member', 'lovelunalove143@gmail.com', 'episkey', '2021-10-13 00:00:00'),
(6, 'sniper', 'Severus', 'Snape', '09274411991', 'member', 'halfbloodprince@gmail.com', 'sectumsempra', '2021-07-05 00:00:00'),
(7, 'antiminerva', 'Minerva', 'Mcgonagall', '09274411992', 'member', 'pusacatmeow@gmail.com', 'locomotor', '2021-10-15 00:00:00'),
(8, 'bottomless', 'Neville', 'Longbottom', '09274411993', 'member', 'swordgryffindor@gmail.com', 'ridikkulus', '2021-12-16 00:00:00'),
(9, 'gin', 'Ginny', 'Weasley', '09274411994', 'member', 'c2gin@gmail.com', 'reducto', '2021-10-17 00:00:00'),
(10, 'dambledoor', 'Albus', 'Dumbledore', '09274411995', 'admin', 'elderwand@gmail.com', 'kedavra', '2021-05-09 00:00:00'),
(11, 'marc', 'Marc Justine', 'Torres', '09994580043', 'member', 'torreshehe@gmail.com', 'cram', '2021-12-21 12:52:08'),
(12, 'maki', 'maki', 'maki', 'maki', 'admin', 'maki@maki.com', 'maki', '2021-12-21 12:52:31'),
(14, 'smrej', 'Jermel Mari', 'Danganan', '09398444128', 'member', 'jm.danganan08@gmail.com', 'smrej', '2021-12-24 14:30:00'),
(15, 'chey', 'Cheynadine Marlene', 'Dauz', '0997333394', 'member', 'cheynadine@gmail.com', 'chey', '2021-12-30 13:32:41'),
(16, 'luwy', 'Luwy', 'Colina', '0998924346', 'member', 'luwycol@gmail.com', 'luwy', '2021-12-30 13:32:41'),
(17, 'sheena', 'Sheena ', 'Costales', '0997349158', 'member', 'sheenacos@gmail.com', 'sheena', '2021-12-30 13:34:20'),
(18, 'yverre', 'Yverre John', 'Cabintos', '0998131309', 'member', 'yverrecab@gmail.com', 'yverre', '2021-12-30 13:34:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_users`
--
ALTER TABLE `event_users`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
