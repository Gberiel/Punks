-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-09-2023 a las 19:46:18
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
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id_area` int(200) NOT NULL,
  `tipo_de_area` enum('CARDIOLOGÍA','RADIODIAGNÓSTICO','CIRUGÍA GENERAL Y DIGESTIVA','DERMATOLOGÍA','CIRUGÍA ORTOPÉDICA Y TRAUMATOLOGÍA') NOT NULL,
  `id_enfermero` int(11) NOT NULL,
  `id_medico` int(11) NOT NULL,
  `id_paciente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `fecha_nac` date NOT NULL,
  `area` text NOT NULL,
  `disponible` enum('Si','No') NOT NULL,
  `id_area` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `enfermeros`
--

INSERT INTO `enfermeros` (`id_enfermero`, `nombre`, `apellido`, `telefono`, `correo`, `fecha_nac`, `area`, `disponible`, `id_area`) VALUES
(1, 'Gabi', 'Barron', 156172808, 'gabribarron16@gmail.com', '2004-11-11', 'Neurocirugia', 'Si', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inicio_sesion`
--

CREATE TABLE `inicio_sesion` (
  `id_sesion` int(200) NOT NULL,
  `usuario` text NOT NULL,
  `contraseña` varchar(200) NOT NULL,
  `tipoUsuario` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(24, 'Emergencia', 'Si', '10min', '2023-09-13', '00:00'),
(25, 'Normal', 'No', '2min', '2023-09-25', '00:00'),
(26, 'Emergencia', 'No', '00min', '2023-09-14', '15:30'),
(27, 'Emergencia', 'No', '00min', '2023-09-14', '15:30'),
(28, 'Emergencia', 'No', '7min', '2023-09-13', '15:41');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `veces_fue_medic`
--

CREATE TABLE `veces_fue_medic` (
  `id_paciente` int(11) NOT NULL,
  `veces_fue_medico` int(250) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `veces_fue_medic`
--

INSERT INTO `veces_fue_medic` (`id_paciente`, `veces_fue_medico`, `fecha`) VALUES
(1, 2, '2022-11-16 00:00:00');

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
  ADD PRIMARY KEY (`id_paciente`),
  ADD KEY `fk_id_area` (`id_area`),
  ADD KEY `fk_id_enfermero` (`id_enfermero`);

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
  MODIFY `id_area` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `enfermeros`
--
ALTER TABLE `enfermeros`
  MODIFY `id_enfermero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id_paciente` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_llamada`
--
ALTER TABLE `registro_llamada`
  MODIFY `id_llamada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tipo_llamado`
--
ALTER TABLE `tipo_llamado`
  MODIFY `Id_llamado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
