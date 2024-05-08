-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 08, 2024 at 05:09 PM
-- Server version: 5.7.36
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `seat_numbers` varchar(255) NOT NULL,
  `bus_details` varchar(255) NOT NULL,
  `booking_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `seat_numbers`, `bus_details`, `booking_date`) VALUES
(1, 1, '39', 'Bus schedule ID: ', '2024-05-08 17:02:42');

-- --------------------------------------------------------

--
-- Table structure for table `bus_schedule`
--

DROP TABLE IF EXISTS `bus_schedule`;
CREATE TABLE IF NOT EXISTS `bus_schedule` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `schedule_id` varchar(100) DEFAULT NULL,
  `route_from` varchar(100) DEFAULT NULL,
  `route_to` varchar(100) DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `bus_model` varchar(50) DEFAULT NULL,
  `depot_name` varchar(100) DEFAULT NULL,
  `fare` decimal(10,2) DEFAULT NULL,
  `available_seats` int(11) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `bus_type` varchar(100) DEFAULT NULL,
  `schedule_date` date NOT NULL,
  `bus_image` varchar(255) NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'Y',
  `is_delete` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_schedule`
--

INSERT INTO `bus_schedule` (`id`, `schedule_id`, `route_from`, `route_to`, `departure_time`, `bus_model`, `depot_name`, `fare`, `available_seats`, `duration`, `bus_type`, `schedule_date`, `bus_image`, `status`, `is_delete`) VALUES
(1, 'WLP21-2200-PW', 'COLOMBO', 'KANDY', '22:00:00', 'Ashok Leyland', 'Walapane', '924.50', 30, '04:00', 'Normal Bus', '2024-05-08', '', 'Y', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `district` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postal_code` int(10) DEFAULT NULL,
  `user_type` enum('admin','user') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `password`, `telephone`, `email`, `province`, `district`, `address`, `postal_code`, `user_type`) VALUES
(1, 'Hansini', 'Gunasekara', '$2y$10$SwrWeFKwTB5kCt9ehLjtPenCfftZEVKjcrx1SIZqDwQh21dpO4phO', '0773636644', 'ghlakshani@gmail.com', 'Western', 'Colombo', '', 0, 'user');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
