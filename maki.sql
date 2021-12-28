-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 06:00 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

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
(1, 'OPM ARTISTS', 'Parokya ni Edgar,Imago, Moonstar88, 6cyclemind', 'Araneta Coliseum', 'dami nilang kakanta', '2021-12-21 18:00:00', '2021-12-22 18:00:00', 5000, 'Ongoing', '2021-12-16 18:00:00'),
(2, 'Awit Para Sa Mga Bata', 'Lea Salonga', 'Kia Theatre', 'Awit para sayo', '2021-12-17 13:00:00', '2021-12-17 16:00:00', 0, '550', '2021-12-17 03:00:00'),
(10, 'Hiraya', 'Cup of Joe', 'CCA Theatre', 'Kakantahin ng cup of joe yung Hiraya sa CCA Theatre', '2021-12-25 17:00:00', '2021-12-25 19:30:00', 0, '250', '2021-12-18 17:00:00'),
(11, 'World Tour', 'TWICE', 'MOA', 'is sana gae', '2021-12-20 06:00:00', '2021-12-23 20:00:00', 1000, 'Ongoing', '2021-12-20 17:54:18'),
(13, 'sample', 'sample', 'sample', 'sample', '2021-12-21 02:10:00', '2021-12-22 02:10:00', 100, 'sample', '2021-12-21 02:10:22'),
(14, 'asdf', 'aasdf', 'asdf', 'asdf', '2021-12-22 11:52:00', '2021-12-22 11:52:00', 12, 'Done', '2021-12-21 08:27:31'),
(15, 'asdf', 'a', 'asdf', 'asdf', '2021-12-01 11:40:00', '2021-12-08 11:40:00', 1, 'dasf', '2021-12-21 11:40:13'),
(16, 'asdf', 'a', 'asdf', 'asdf', '2021-12-01 11:40:00', '2021-12-08 11:40:00', 1, 'dasf', '2021-12-21 11:41:27'),
(17, 'asd', 'asd', 'asd', 'asd', '2021-12-09 11:41:00', '2021-12-17 11:41:00', 1232, 'asdasd', '2021-12-21 11:41:40'),
(18, 'sadf', 'asdf', 'asdf', 'asdf', '2021-12-22 11:45:00', '2021-12-22 11:45:00', 1334, 'adfasdf', '2021-12-21 11:45:24'),
(19, 'asdf', 'asdf', 'asdf', 'asdf', '2021-12-21 11:45:00', '2021-12-16 11:45:00', 0, 'asdf', '2021-12-21 11:45:34'),
(22, 'Concert', 'Maki', 'MOA', 'Singing ', '2021-12-21 13:38:00', '2021-12-25 13:38:00', 1000, 'Done', '2021-12-21 13:36:55'),
(23, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '2021-12-21 13:45:44'),
(24, '<h1>Programming</h1>', '<h1>maki</h1>', '<h1>samcis</h1>', '<h1>demo</h1>', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '2021-12-21 13:47:12'),
(25, 'digital arts', 'maki', 'samcis', 'demo', '2021-12-01 13:49:00', '2021-11-01 13:49:00', 0, '', '2021-12-21 13:49:31'),
(26, '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, '', '2021-12-21 13:50:57'),
(28, 'adsfcsrd', 'eargfer', 'esrgverfgv', 'ergverfv', '2021-12-30 00:15:00', '2021-12-08 00:15:00', 455, 'Ongoing', '2021-12-28 00:15:15'),
(29, 'wsefewsr', 'wergerfg', 'ergverf', 'ergerfg', '2021-12-09 00:19:00', '2021-12-01 00:18:00', 5666, 'Upcoming', '2021-12-28 00:18:21'),
(30, 'hat', 'dog', 'gaerg', 'ergertf', '2021-12-07 14:38:00', '2021-12-15 17:42:00', 5600, 'Upcoming', '2021-12-28 00:37:34'),
(31, 'hatdig', 'hatdig', 'aferg', 'eargerg', '2021-12-07 23:27:00', '2021-12-16 23:27:00', 25, 'Finished', '2021-12-28 23:27:56'),
(32, 'sferg', 'etrgderg', 'ertge5rg', 'etrgerg', '2021-11-04 23:28:00', '2021-11-07 23:28:00', 123, 'Finished', '2021-12-28 23:28:19'),
(33, 'sdegferg', 'ergsrdetg', 'tderbhrfgth', 'gyhrdfth', '2021-12-09 23:28:00', '2021-12-31 23:28:00', 4854, 'Finished', '2021-12-28 23:28:45');

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
(13, 0, '');

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
(13, 'user1', 'user1', 'user1', '444241414', 'member', 'user1@gmail.com', 'user1', '2021-12-21 12:53:51'),
(14, 'smrej', 'Jermel Mari', 'Danganan', '09398444128', 'member', 'jm.danganan08@gmail.com', 'smrej', '2021-12-24 14:30:00');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
