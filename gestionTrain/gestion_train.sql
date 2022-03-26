-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2022 at 11:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gestion_train`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$Cw1vyMhMdvNDy71BgQ5Iee6QZky2onMiKbdEKqGJq5Z64rQ/LLoqi');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_client` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id_client`, `username`, `password`, `id_user_fk`) VALUES
(2, 'saad09', '$2y$10$TJHjWz2TppiHwkSCrJu3IOp89pqP.kmLWi6zsYvqXfVbyFh4UQ/4W', 10);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id_reserv` int(11) NOT NULL,
  `aller_retour` tinyint(1) NOT NULL,
  `date_voyage` varchar(250) NOT NULL,
  `date_retour` varchar(250) DEFAULT NULL,
  `data_reser` varchar(250) NOT NULL,
  `id_voyage_fk` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id_reserv`, `aller_retour`, `date_voyage`, `date_retour`, `data_reser`, `id_voyage_fk`, `id_user_fk`) VALUES
(1, 0, '2022-03-14', NULL, '2022-03-14 23:28:59', 9, 11),
(2, 1, '2022-03-16', '2022-03-18', '2012-03-24 17:45:12', 9, 12),
(3, 1, '2022-03-14', '2022-03-16', '2022-03-14 00:08:11', 9, 20),
(4, 1, '2022-03-14', '2022-03-16', '2022-03-14 00:08:11', 9, 21),
(5, 1, '2022-03-15', '2022-03-17', '2022-03-14 00:10:13', 9, 22),
(6, 0, '2022-03-15', 'null', '2022-03-14 00:11:31', 10, 23),
(7, 0, '2022-03-15', 'null', '2022-03-14 00:11:31', 10, 24),
(8, 1, '2022-03-15', 'null', '2022-03-14 00:13:36', 10, 25),
(9, 0, '2022-03-15', 'null', '2022-03-14 00:20:41', 10, 10),
(10, 0, '2022-03-23', 'null', '2022-03-14 00:20:41', 10, 26),
(12, 0, '2022-03-23', 'null', '2022-03-14 00:22:32', 10, 27),
(13, 0, '2022-03-16', 'null', '2022-03-16 11:46:17', 14, 10),
(14, 0, '2022-03-16', 'null', '2022-03-16 11:46:17', 14, 28),
(17, 0, '2022-03-18', 'null', '2022-03-17 07:12:17', 13, 10),
(18, 0, '2022-03-21', 'null', '2022-03-17 07:44:32', 9, 10),
(19, 0, '2022-03-22', 'null', '2022-03-17 11:52:03', 15, 10),
(20, 0, '2022-03-22', 'null', '2022-03-17 11:55:24', 15, 10),
(21, 0, '2022-03-22', 'null', '2022-03-17 11:55:47', 15, 10),
(22, 0, '2022-03-22', 'null', '2022-03-17 11:56:32', 15, 10),
(23, 0, '2022-03-22', 'null', '2022-03-17 11:57:40', 15, 10),
(24, 0, '2022-03-22', 'null', '2022-03-17 11:58:15', 15, 10),
(25, 0, '2022-03-22', 'null', '2022-03-17 11:59:19', 15, 10),
(26, 0, '2022-03-22', 'null', '2022-03-17 11:59:19', 15, 29),
(27, 0, '2022-03-17', 'null', '2022-03-17 12:11:52', 15, 10),
(28, 0, '2022-03-18', 'null', '2022-03-17 12:22:48', 14, 10),
(29, 0, '2022-03-25', 'null', '2022-03-17 12:30:12', 14, 10),
(30, 0, '2022-03-25', 'null', '2022-03-17 12:48:56', 14, 10),
(34, 0, '2022-03-19', 'null', '2022-03-18 07:08:39', 14, 30),
(35, 0, '2022-03-19', 'null', '2022-03-18 07:08:39', 14, 31),
(36, 0, '2022-03-26', 'null', '2022-03-18 07:14:58', 9, 32),
(37, 0, '2022-03-20', 'null', '2022-03-18 07:18:24', 13, 33),
(38, 0, '2022-03-20', 'null', '2022-03-18 07:20:01', 13, 34),
(39, 0, '2022-03-20', 'null', '2022-03-18 07:20:59', 13, 35),
(40, 0, '2022-03-20', 'null', '2022-03-18 07:22:29', 13, 36),
(41, 0, '2022-03-19', 'null', '2022-03-18 07:23:18', 9, 37),
(42, 0, '2022-03-19', 'null', '2022-03-18 07:24:04', 9, 38),
(43, 0, '2022-03-19', 'null', '2022-03-18 07:26:43', 9, 39),
(44, 0, '2022-03-20', 'null', '2022-03-18 07:32:01', 13, 40),
(45, 0, '2022-03-20', 'null', '2022-03-18 07:35:07', 13, 41),
(46, 0, '2022-03-19', 'null', '2022-03-18 08:04:21', 9, 42),
(47, 0, '2022-03-19', 'null', '2022-03-18 08:04:43', 13, 43),
(48, 0, '2022-03-20', 'null', '2022-03-18 08:05:57', 15, 44),
(49, 0, '2022-03-20', 'null', '2022-03-18 08:07:40', 15, 45),
(50, 0, '2022-03-20', 'null', '2022-03-18 08:08:26', 13, 46),
(51, 0, '2022-03-20', 'null', '2022-03-18 08:09:10', 13, 47),
(52, 0, '2022-03-20', 'null', '2022-03-18 08:11:34', 13, 48),
(53, 0, '2022-03-23', 'null', '2022-03-18 08:12:34', 15, 49),
(54, 0, '2022-03-25', 'null', '2022-03-18 08:13:35', 15, 50),
(55, 0, '2022-03-20', 'null', '2022-03-18 08:15:30', 9, 51),
(56, 0, '2022-03-20', 'null', '2022-03-18 08:18:00', 9, 52),
(57, 0, '2022-03-20', 'null', '2022-03-18 08:18:20', 9, 53),
(58, 0, '2022-03-20', 'null', '2022-03-18 08:20:44', 9, 54),
(59, 0, '2022-03-20', 'null', '2022-03-18 08:20:57', 9, 55),
(60, 0, '2022-03-20', 'null', '2022-03-18 08:21:58', 9, 56),
(61, 0, '2022-03-20', 'null', '2022-03-18 08:23:06', 9, 57),
(64, 0, '2022-03-24', 'null', '2022-03-18 09:01:51', 15, 58),
(65, 0, '2022-03-19', 'null', '2022-03-18 09:07:37', 15, 59),
(66, 0, '2022-03-25', 'null', '2022-03-18 09:09:37', 15, 60),
(67, 0, '2022-03-25', 'null', '2022-03-18 09:09:37', 15, 61),
(68, 0, '2022-03-25', 'null', '2022-03-18 09:10:11', 15, 62),
(69, 0, '2022-03-25', 'null', '2022-03-18 09:10:11', 15, 63),
(70, 0, '2022-03-21', 'null', '2022-03-18 09:33:07', 16, 64),
(71, 0, '2022-03-19', 'null', '2022-03-18 10:00:02', 16, 10),
(72, 0, '2022-03-21', 'null', '2022-03-19 13:35:59', 15, 10);

--
-- Triggers `reservations`
--
DELIMITER $$
CREATE TRIGGER `delete_resv` BEFORE DELETE ON `reservations` FOR EACH ROW BEGIN
    DELETE FROM tickets WHERE `id_reserv_fk` = OLD.id_reserv;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id_ticket` int(11) NOT NULL,
  `nm_ticket` varchar(255) NOT NULL,
  `id_reserv_fk` int(11) NOT NULL,
  `id_users_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id_ticket`, `nm_ticket`, `id_reserv_fk`, `id_users_fk`) VALUES
(1, '848579966', 24, 10),
(2, '1126615739', 25, 10),
(3, '1970038534', 27, 10),
(4, '594243718', 28, 10),
(5, '2012441595', 29, 10),
(6, '1118718202', 30, 10),
(29, '491312391', 61, 57),
(32, '601509163', 64, 58),
(33, '1637756616', 65, 59),
(34, '984731220', 67, 61),
(35, '1414874702', 69, 63),
(36, '1621097533', 70, 64),
(37, '1451128300', 71, 10),
(38, '627422505', 72, 10);

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id_train` int(11) NOT NULL,
  `train_name` varchar(255) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  `places` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id_train`, `train_name`, `prix`, `places`) VALUES
(1, 'Atlas', '27', 120),
(2, 'Al boraq', '120', 95);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `full_name`, `email`, `telephone`) VALUES
(10, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(11, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(12, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(13, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(14, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(15, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(16, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(17, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(18, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(19, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(20, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(21, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(22, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(23, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(24, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(25, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(26, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(27, 'saad', 'chaaysaad@gmail.com', '0615207417'),
(28, '45321345', 'zpgge@uafl.com', '45321345'),
(29, '45321345', 'n9six@d4sr.com', '45321345'),
(30, '45321345', 'mwrom@3ke8.com', '45321345'),
(31, '45321345', 'huagx@cxqp.com', '45321345'),
(32, '45321345', 'egkj9@8ngw.com', '45321345'),
(33, '45321345', 'dgkkb@1q3n.com', '45321345'),
(34, '45321345', 'lwc8t@5jsa.com', '45321345'),
(35, '45321345', '7fmkq@pdry.com', '45321345'),
(36, '45321345', 'atx0e@3qho.com', '45321345'),
(37, '45321345', 'hjqvq@zyep.com', '45321345'),
(38, '45321345', 'rtgyx@rgg2.com', '45321345'),
(39, '45321345', 'dwjxw@gmuw.com', '45321345'),
(40, '45321345', '7xbvj@pxhg.com', '45321345'),
(41, '45321345', 'nb0vq@bmex.com', '45321345'),
(42, '45321345', 'tebwh@dvmt.com', '45321345'),
(43, '45321345', 's212j@p1su.com', '45321345'),
(44, '45321345', 'sd6af@2h0m.com', '45321345'),
(45, '45321345', 'a4b0d@hp7q.com', '45321345'),
(46, '45321345', 'h736i@6hqm.com', '45321345'),
(47, '45321345', 'ibwei@shlk.com', '45321345'),
(48, '45321345', '5k1cm@twuw.com', '45321345'),
(49, '45321345', 'ctjko@dzkl.com', '45321345'),
(50, '45321345', 'dldkv@iuue.com', '45321345'),
(51, '45321345', 'bnjzg@gcxw.com', '45321345'),
(52, '45321345', 'akymb@tctc.com', '45321345'),
(53, '45321345', 'xewja@qzwj.com', '45321345'),
(54, '45321345', 'x3ny3@lpfr.com', '45321345'),
(55, '45321345', 'z07u6@eltz.com', '45321345'),
(56, '45321345', 'p0pgl@1kad.com', '45321345'),
(57, '45321345', 's4ml8@2dgp.com', '45321345'),
(58, '45321345', 'hosf6@2ec3.com', '45321345'),
(59, '45321345', 'aleze@1vcc.com', '45321345'),
(60, '45321345', '43t0e@7zli.com', '45321345'),
(61, '45321345', 'uowus@rhok.com', '45321345'),
(62, '45321345', 'ddkw3@udst.com', '45321345'),
(63, '45321345', '7ksbk@85pe.com', '45321345'),
(64, 'saad', 'saad@gmail.com', '0615207417');

-- --------------------------------------------------------

--
-- Table structure for table `voyages`
--

CREATE TABLE `voyages` (
  `id_voyage` int(11) NOT NULL,
  `garre_depart` varchar(255) NOT NULL,
  `garre_destination` varchar(255) NOT NULL,
  `heure_depart` varchar(250) NOT NULL,
  `heure_destination` varchar(250) NOT NULL,
  `id_train_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voyages`
--

INSERT INTO `voyages` (`id_voyage`, `garre_depart`, `garre_destination`, `heure_depart`, `heure_destination`, `id_train_fk`) VALUES
(8, 'Safi', 'Taourirt', '17:39', '18:39', 2),
(9, 'Fes', 'El Jadida', '17:51', '20:51', 1),
(10, 'Oujda', 'Fes', '12:51', '12:51', 1),
(11, 'Fes', 'Benguerir', '17:53', '19:53', 1),
(12, 'Nador', 'Tangier', '17:02', '18:02', 1),
(13, 'Fes', 'El Jadida', '20:40', '23:51', 1),
(14, 'Fes', 'El Jadida', '17:14', '19:17', 1),
(15, 'Nador', 'Casablanca', '08:48', '14:48', 2),
(16, 'Safi', 'Tangier', '14:31', '17:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `voyages_annule`
--

CREATE TABLE `voyages_annule` (
  `id_VA` int(11) NOT NULL,
  `date_VA` varchar(250) NOT NULL,
  `id_voyage_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `voyages_annule`
--

INSERT INTO `voyages_annule` (`id_VA`, `date_VA`, `id_voyage_fk`) VALUES
(7, '2022-02-25', 8),
(8, '2022-03-09', 9),
(9, '2022-03-09', 13),
(10, '2022-03-14', 10),
(11, '2022-03-20', 14),
(12, '2022-03-20', 16);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_client`),
  ADD KEY `client_user` (`id_user_fk`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id_reserv`),
  ADD KEY `Reservation_voyage` (`id_voyage_fk`),
  ADD KEY `Reservation_user` (`id_user_fk`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `Ticket_Reserv` (`id_reserv_fk`),
  ADD KEY `tickets_users` (`id_users_fk`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id_train`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `voyages`
--
ALTER TABLE `voyages`
  ADD PRIMARY KEY (`id_voyage`),
  ADD KEY `Voyage_train` (`id_train_fk`);

--
-- Indexes for table `voyages_annule`
--
ALTER TABLE `voyages_annule`
  ADD PRIMARY KEY (`id_VA`),
  ADD KEY `voyage_annule` (`id_voyage_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id_reserv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id_train` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `voyages`
--
ALTER TABLE `voyages`
  MODIFY `id_voyage` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `voyages_annule`
--
ALTER TABLE `voyages_annule`
  MODIFY `id_VA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `client_user` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `Reservation_user` FOREIGN KEY (`id_user_fk`) REFERENCES `users` (`id_user`),
  ADD CONSTRAINT `Reservation_voyage` FOREIGN KEY (`id_voyage_fk`) REFERENCES `voyages` (`id_voyage`);

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `Ticket_Reserv` FOREIGN KEY (`id_reserv_fk`) REFERENCES `reservations` (`id_reserv`),
  ADD CONSTRAINT `tickets_users` FOREIGN KEY (`id_users_fk`) REFERENCES `users` (`id_user`);

--
-- Constraints for table `voyages`
--
ALTER TABLE `voyages`
  ADD CONSTRAINT `Voyage_train` FOREIGN KEY (`id_train_fk`) REFERENCES `trains` (`id_train`);

--
-- Constraints for table `voyages_annule`
--
ALTER TABLE `voyages_annule`
  ADD CONSTRAINT `voyage_annule` FOREIGN KEY (`id_voyage_fk`) REFERENCES `voyages` (`id_voyage`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
