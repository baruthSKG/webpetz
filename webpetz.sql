-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2022 at 02:19 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webpetz`
--

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `species` varchar(3) COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `sex` varchar(6) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `date_adopted` date NOT NULL,
  `birthday` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`name`, `species`, `color`, `sex`, `avatar`, `date_adopted`, `birthday`) VALUES
('Whiskers', 'Cat', 'red', 'Male', 'cat.jpeg', '2022-11-30', '2020-06-14'),
('Mr. Meow', 'Cat', 'purple', 'Male', 'cat2.png', '2022-12-01', '2018-11-11'),
('Bob the Cat', 'Cat', 'orange', 'Female', 'cat3.jpg', '2022-12-01', '2013-01-05'),
('Bobo the Dog', 'Dog', 'orange', 'Male', 'dog1.jpg', '2022-12-01', '2013-01-05'),
('Sparky', 'Dog', 'indigo', 'Female', 'dog2.jpg', '2022-11-30', '2021-12-29'),
('Spunky', 'Dog', 'blue', 'Female', 'dog3.jpg', '2022-12-03', '2009-04-29');

-- --------------------------------------------------------

--
-- Table structure for table `selected_pet`
--

CREATE TABLE `selected_pet` (
  `pet_check` tinyint(1) NOT NULL,
  `current_pet` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `selected_pet`
--

INSERT INTO `selected_pet` (`pet_check`, `current_pet`) VALUES
(1, 'Whiskers');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
