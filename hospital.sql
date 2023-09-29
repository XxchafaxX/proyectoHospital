-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2023 a las 01:15:23
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
-- Base de datos: `hospital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamado`
--

CREATE TABLE `llamado` (
  `id` int(11) NOT NULL,
  `fechahorainicio` date NOT NULL,
  `estado` enum('atendido','noatendido','finalizado') NOT NULL,
  `fechahorafin` date NOT NULL,
  `idpaciente` int(100) NOT NULL,
  `idsala` int(100) NOT NULL,
  `prioridadllamada` enum('normal','emergencia') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `llamadodelpersonal`
--

CREATE TABLE `llamadodelpersonal` (
  `id` int(11) NOT NULL,
  `idllamado` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nombre` varchar(110) NOT NULL,
  `apellido` varchar(11) NOT NULL,
  `dni` int(110) NOT NULL,
  `telefono` text NOT NULL,
  `obrasocial` text NOT NULL,
  `historialclinico` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`id`, `nombre`, `apellido`, `dni`, `telefono`, `obrasocial`, `historialclinico`) VALUES
(1, 'gonzalo ', 'carrigal', 46264193, '54558441', 'ioma', 'todas las vacunas ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(110) NOT NULL,
  `apellido` varchar(110) NOT NULL,
  `cargo` text NOT NULL,
  `matricula` text NOT NULL,
  `tipo` enum('medico','enfermero') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `habitacion` text NOT NULL,
  `piso` text NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `tipodehabitacion` enum('habitacion','quirofano') NOT NULL,
  `capacidadmaxima` text NOT NULL,
  `ocupacionactual` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salapaciente`
--

CREATE TABLE `salapaciente` (
  `id` int(11) NOT NULL,
  `idsala` int(11) NOT NULL,
  `idpaciente` int(11) NOT NULL,
  `fechainicio` date NOT NULL,
  `fechasalida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salapersonalasignada`
--

CREATE TABLE `salapersonalasignada` (
  `id` int(11) NOT NULL,
  `idpersonal` int(11) NOT NULL,
  `idsala` int(11) NOT NULL,
  `dias` text NOT NULL,
  `turno` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(110) NOT NULL,
  `contraseña` varchar(110) NOT NULL,
  `tipo` enum('admin','generico') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `llamado`
--
ALTER TABLE `llamado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpaciente` (`idpaciente`),
  ADD KEY `idsala` (`idsala`);

--
-- Indices de la tabla `llamadodelpersonal`
--
ALTER TABLE `llamadodelpersonal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idllamado` (`idllamado`),
  ADD KEY `idpersonal` (`idpersonal`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `salapaciente`
--
ALTER TABLE `salapaciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idsala` (`idsala`),
  ADD KEY `idpaciente` (`idpaciente`);

--
-- Indices de la tabla `salapersonalasignada`
--
ALTER TABLE `salapersonalasignada`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpersonal` (`idpersonal`),
  ADD KEY `idsala` (`idsala`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `llamado`
--
ALTER TABLE `llamado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `llamadodelpersonal`
--
ALTER TABLE `llamadodelpersonal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salapaciente`
--
ALTER TABLE `salapaciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `salapersonalasignada`
--
ALTER TABLE `salapersonalasignada`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `llamado`
--
ALTER TABLE `llamado`
  ADD CONSTRAINT `llamado_ibfk_1` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`id`),
  ADD CONSTRAINT `llamado_ibfk_2` FOREIGN KEY (`idsala`) REFERENCES `sala` (`id`);

--
-- Filtros para la tabla `llamadodelpersonal`
--
ALTER TABLE `llamadodelpersonal`
  ADD CONSTRAINT `llamadodelpersonal_ibfk_1` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `llamadodelpersonal_ibfk_2` FOREIGN KEY (`idllamado`) REFERENCES `llamado` (`id`);

--
-- Filtros para la tabla `salapaciente`
--
ALTER TABLE `salapaciente`
  ADD CONSTRAINT `salapaciente_ibfk_1` FOREIGN KEY (`idsala`) REFERENCES `sala` (`id`),
  ADD CONSTRAINT `salapaciente_ibfk_2` FOREIGN KEY (`idpaciente`) REFERENCES `paciente` (`id`);

--
-- Filtros para la tabla `salapersonalasignada`
--
ALTER TABLE `salapersonalasignada`
  ADD CONSTRAINT `salapersonalasignada_ibfk_1` FOREIGN KEY (`idpersonal`) REFERENCES `personal` (`id`),
  ADD CONSTRAINT `salapersonalasignada_ibfk_2` FOREIGN KEY (`idsala`) REFERENCES `sala` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
