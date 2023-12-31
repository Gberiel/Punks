-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 02-10-2023 a las 21:54:31
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
  `ocupado` enum('Ocupada','Libre','Fuera de servicio') NOT NULL,
  `enfermero` text NOT NULL,
  `medico` text NOT NULL,
  `paciente` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id_area`, `tipo_de_area`, `ocupado`, `enfermero`, `medico`, `paciente`) VALUES
(4, 'CARDIOLOGÍA', 'Ocupada', 'Gabi', 'Fabri', 'Lucian');

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
(19, 'Luciano', 'lindo', 351612, 'luci@gmail.com', 'Quiropraxia');

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
-- Estructura de tabla para la tabla `llamadas`
--

CREATE TABLE `llamadas` (
  `id_llamadas` int(250) NOT NULL,
  `quien` varchar(250) NOT NULL,
  `zona` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `id_medico` int(11) NOT NULL,
  `Nombre` text NOT NULL,
  `Apellido` text NOT NULL,
  `Telefono` varchar(100) NOT NULL,
  `Correo_medico` varchar(300) NOT NULL,
  `Quirofano` int(100) NOT NULL,
  `Area` text NOT NULL,
  `Disponible` enum('Si','No') NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(200) NOT NULL,
  `nombre` text DEFAULT NULL,
  `apellido` text DEFAULT NULL,
  `edad` int(150) DEFAULT NULL,
  `fecha_ingreso` varchar(200) DEFAULT NULL,
  `sintomas` varchar(200) DEFAULT NULL,
  `historial_medico` varchar(300) DEFAULT NULL,
  `historial_penal` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `nombre`, `apellido`, `edad`, `fecha_ingreso`, `sintomas`, `historial_medico`, `historial_penal`) VALUES
(20, 'Profe', 'fachera', 12, '20-20-2004', 'si', 'as', 'assa'),
(21, 'Gabi', 'asd', 2, 'asdsa', 'ad', 'ad', 'asd');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `registro_llamada`
--

INSERT INTO `registro_llamada` (`id_llamada`, `tipo_llamado`, `respuesta`, `duracion`, `fecha`, `hora`) VALUES
(1, 'Normal', 'Si', '2min', '2023-10-12', '14:05'),
(2, 'Emergencia', 'No', '3min', '2023-10-24', '22:03'),
(3, 'Normal', 'Si', '10min', '2023-11-01', '13:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_llamado`
--

CREATE TABLE `tipo_llamado` (
  `Id_llamado` int(11) NOT NULL,
  `cant_llamado` int(11) NOT NULL,
  `antendido` enum('Si','No') NOT NULL,
  `iniciada_llamada` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `finalizacion_llamda` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id_area`);

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
-- Indices de la tabla `llamadas`
--
ALTER TABLE `llamadas`
  ADD PRIMARY KEY (`id_llamadas`);

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`id_medico`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `registro_llamada`
--
ALTER TABLE `registro_llamada`
  ADD PRIMARY KEY (`id_llamada`);

--
-- Indices de la tabla `tipo_llamado`
--
ALTER TABLE `tipo_llamado`
  ADD PRIMARY KEY (`Id_llamado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id_area` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  MODIFY `id_enfermero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `inicio_sesion`
--
ALTER TABLE `inicio_sesion`
  MODIFY `id_sesion` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inicio_usuario`
--
ALTER TABLE `inicio_usuario`
  MODIFY `id_usuario` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `llamadas`
--
ALTER TABLE `llamadas`
  MODIFY `id_llamadas` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medico`
--
ALTER TABLE `medico`
  MODIFY `id_medico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `registro_llamada`
--
ALTER TABLE `registro_llamada`
  MODIFY `id_llamada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_llamado`
--
ALTER TABLE `tipo_llamado`
  MODIFY `Id_llamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
