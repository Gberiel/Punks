-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-09-2023 a las 20:53:57
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

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
-- Estructura de tabla para la tabla `inicio_sesion`
--

CREATE TABLE `inicio_sesion` (
  `id_sesion` int(200) NOT NULL,
  `usuario` text NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `tipoUsuario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio_sesion`
--

INSERT INTO `inicio_sesion` (`id_sesion`, `usuario`, `contraseña`, `tipoUsuario`) VALUES
(1, 'Gabi', 'medic12', 1),
(2, 'Fabri', 'medic12', 2),
(3, 'Lucho', 'medic12', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_usuario`
--

CREATE TABLE `inicio_usuario` (
  `id_usuario` int(200) NOT NULL,
  `usuario` text NOT NULL,
  `correo` varchar(200) NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio_usuario`
--

INSERT INTO `inicio_usuario` (`id_usuario`, `usuario`, `correo`, `contraseña`) VALUES
(3, 'fabricio rossi', 'fabri_rossi@gmail.com', 'fabryygabi'),
(4, 'Gabi Barron', 'gabribarron16@gmail.com', 'wiwi');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inicio_sesion`
--
ALTER TABLE `inicio_sesion`
  ADD PRIMARY KEY (`id_sesion`);

--
-- Indices de la tabla `inicio_usuario`
--
ALTER TABLE `inicio_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inicio_sesion`
--
ALTER TABLE `inicio_sesion`
  MODIFY `id_sesion` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inicio_usuario`
--
ALTER TABLE `inicio_usuario`
  MODIFY `id_usuario` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
