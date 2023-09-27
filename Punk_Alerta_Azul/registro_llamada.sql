-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-09-2023 a las 19:04:05
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Punk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_llamada`
--

CREATE TABLE `registro_llamada` (
  `id_llamada` int(11) NOT NULL,
  `tipo_llamado` enum('Normal','Emergencia') NOT NULL,
  `respuesta` enum('Si','No') NOT NULL,
  `duracion` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `hora` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_llamada`
--

INSERT INTO `registro_llamada` (`id_llamada`, `tipo_llamado`, `respuesta`, `duracion`, `fecha`, `hora`) VALUES
(34, 'Emergencia', 'Si', '3min', '2023-09-30', '13:30'),
(36, 'Emergencia', 'No', '00min', '2012-02-15', '03:23'),
(37, 'Emergencia', 'No', '5min', '2222-05-18', '03:33'),
(60, 'Normal', 'Si', '8min', '3030-06-14', '12:12'),
(61, 'Normal', 'Si', '8min', '3030-06-14', '12:12'),
(62, 'Normal', 'Si', '8min', '3030-06-14', '12:12');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `registro_llamada`
--
ALTER TABLE `registro_llamada`
  ADD PRIMARY KEY (`id_llamada`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro_llamada`
--
ALTER TABLE `registro_llamada`
  MODIFY `id_llamada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
