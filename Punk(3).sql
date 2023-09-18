-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 19-09-2023 a las 00:06:47
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
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(200) NOT NULL,
  `tipo_de_area` enum('CARDIOLOGÍA','RADIODIAGNÓSTICO','CIRUGÍA GENERAL Y DIGESTIVA','DERMATOLOGÍA','CIRUGÍA ORTOPÉDICA Y TRAUMATOLOGÍA') NOT NULL,
  `id_enfermero` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `enfermeros`
--

CREATE TABLE `enfermeros` (
  `id_enfermero` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `telefono` int(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `area` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `enfermeros`
--

INSERT INTO `enfermeros` (`id_enfermero`, `nombre`, `apellido`, `telefono`, `correo`, `area`) VALUES
(1, 'gabi', 'asd', 123, 'asda@gmail.com', 'as'),
(2, 'gabi', 'asd', 123, 'asda@gmail.com', 'as'),
(3, 'gabi', 'asd', 123, 'asda@gmail.com', 'as');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_sesion`
--

CREATE TABLE `inicio_sesion` (
  `id_sesion` int(200) NOT NULL,
  `usuario` text NOT NULL,
  `contraseña` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inicio_sesion`
--

INSERT INTO `inicio_sesion` (`id_sesion`, `usuario`, `contraseña`) VALUES
(1, 'Gabi', 'medic12'),
(2, 'Fabri', 'medic12'),
(3, 'Lucho', 'medic12');

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(200) NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  `edad` int(150) NOT NULL,
  `fecha` date NOT NULL,
  `sintomas` varchar(200) NOT NULL,
  `historial_medico` varchar(300) NOT NULL,
  `historial_penal` varchar(300) NOT NULL,
  `id_enfermero` int(200) NOT NULL,
  `id_area` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`),
  ADD KEY `fk_id_medico` (`id_medico`),
  ADD KEY `fk_id_paciente` (`id_paciente`),
  ADD KEY `fk_enfermero` (`id_enfermero`);

--
-- Indices de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  ADD PRIMARY KEY (`id_enfermero`);

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
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_id_area` (`id_area`),
  ADD KEY `fk_id_enfermero` (`id_enfermero`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  MODIFY `id_enfermero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(200) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `areas`
--
ALTER TABLE `areas`
  ADD CONSTRAINT `fk_enfermero` FOREIGN KEY (`id_enfermero`) REFERENCES `enfermeros` (`id_enfermero`),
  ADD CONSTRAINT `fk_id_medico` FOREIGN KEY (`id_medico`) REFERENCES `medico` (`id_medico`),
  ADD CONSTRAINT `fk_id_paciente` FOREIGN KEY (`id_paciente`) REFERENCES `pacientes` (`id_paciente`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `fk_id_area` FOREIGN KEY (`id_area`) REFERENCES `pacientes` (`id_paciente`),
  ADD CONSTRAINT `fk_id_enfermero` FOREIGN KEY (`id_enfermero`) REFERENCES `pacientes` (`id_paciente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
