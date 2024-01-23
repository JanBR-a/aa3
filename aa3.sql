-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Temps de generació: 23-01-2024 a les 22:14:27
-- Versió del servidor: 10.4.32-MariaDB
-- Versió de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `aa3`
--

-- --------------------------------------------------------

--
-- Estructura de la taula `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `available` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `librarian`
--

CREATE TABLE `librarian` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `payment`
--

INSERT INTO `payment` (`id`, `user_id`, `amount`, `date`) VALUES
(11, 9, 1, '2024-01-23');

-- --------------------------------------------------------

--
-- Estructura de la taula `reader`
--

CREATE TABLE `reader` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `subscription`
--

INSERT INTO `subscription` (`id`, `user_id`, `start_date`, `end_date`, `is_active`) VALUES
(9, 9, '2024-01-23', '2024-02-23', 1),
(10, 9, '2024-01-23', '2024-02-23', 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Bolcament de dades per a la taula `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(9, 'toni', '$2y$10$ZkO80zdaihKneoy0lvkuPO4y6LSmesuxqbZXxHjR4cVPY/KmMbYcy', 'tonicambiado@gmail.com', NULL);

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `librarian`
--
ALTER TABLE `librarian`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índexs per a la taula `reader`
--
ALTER TABLE `reader`
  ADD PRIMARY KEY (`id`);

--
-- Índexs per a la taula `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índexs per a la taula `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la taula `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Restriccions per a la taula `subscription`
--
ALTER TABLE `subscription`
  ADD CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
