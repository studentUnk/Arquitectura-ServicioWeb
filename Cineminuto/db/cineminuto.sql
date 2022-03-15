-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-03-2022 a las 23:44:46
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cineminuto`
--
CREATE DATABASE IF NOT EXISTS `cineminuto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cineminuto`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE `asiento` (
  `numero_asiento` int(11) NOT NULL,
  `disponible` varchar(20) DEFAULT NULL,
  `numero_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `documento` varchar(30) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `genero` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `telefono` int(10) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fecha_nacimiento` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`documento`, `nombre`, `apellido`, `genero`, `celular`, `telefono`, `correo`, `direccion`, `password`, `fecha_nacimiento`) VALUES
('123', '123', '123', '123', '123', 123, '123', '123', '123', NULL),
('456', '45645', '456456', '45645', '645645', 645645, '645645', '6456456', '456', NULL),
('789', '789', '789', '789', '789', 789, '789', '789', '789', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reserva`
--

CREATE TABLE `detalle_reserva` (
  `numero_reserva_detalle` int(11) NOT NULL,
  `numero_reserva` int(11) DEFAULT NULL,
  `documento_cliente` varchar(30) DEFAULT NULL,
  `fecha_creacion` varchar(45) DEFAULT NULL,
  `numero_funcion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion_pelicula`
--

CREATE TABLE `funcion_pelicula` (
  `numero_funcion` int(11) NOT NULL,
  `numero_sala` int(11) DEFAULT NULL,
  `numero_pelicula` int(11) DEFAULT NULL,
  `numero_horario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horario`
--

CREATE TABLE `horario` (
  `numero_horario` int(11) NOT NULL,
  `hora_inicio` varchar(45) DEFAULT NULL,
  `hora_fin` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `horario`
--

INSERT INTO `horario` (`numero_horario`, `hora_inicio`, `hora_fin`) VALUES
(1, '5442', '5424'),
(4, '234', '234'),
(5, '51253', '12341'),
(6, '434f', '23f');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE `ingreso` (
  `numero_reserva` int(11) NOT NULL,
  `documento_cliente` varchar(30) DEFAULT NULL,
  `fecha_creacion` varchar(45) DEFAULT NULL,
  `numero_funcion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pago`
--

CREATE TABLE `pago` (
  `numero_pago` int(11) NOT NULL,
  `fecha_pago` varchar(45) DEFAULT NULL,
  `valor_pagado` double DEFAULT NULL,
  `numero_reserva` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `numero_pelicula` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `director` varchar(45) DEFAULT NULL,
  `fecha_publicacion` varchar(45) DEFAULT NULL,
  `duracion` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`numero_pelicula`, `nombre`, `director`, `fecha_publicacion`, `duracion`) VALUES
(1, 'Rapidos & Furiosos 3', '??', '2010', '2:00'),
(2, 'fdsfdsf', 'ASDF', 'ASDF', 'ASDF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sala`
--

CREATE TABLE `sala` (
  `numero_sala` int(11) NOT NULL,
  `nombre_sala` varchar(25) DEFAULT NULL,
  `tipo_sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposala`
--

CREATE TABLE `tiposala` (
  `id` int(11) NOT NULL,
  `tipo_sala` varchar(45) DEFAULT NULL,
  `desc_sala` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD PRIMARY KEY (`numero_asiento`),
  ADD KEY `numero_sala` (`numero_sala`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`documento`);

--
-- Indices de la tabla `detalle_reserva`
--
ALTER TABLE `detalle_reserva`
  ADD PRIMARY KEY (`numero_reserva_detalle`),
  ADD KEY `documento_cliente` (`documento_cliente`),
  ADD KEY `numero_funcion` (`numero_funcion`),
  ADD KEY `numero_reserva` (`numero_reserva`);

--
-- Indices de la tabla `funcion_pelicula`
--
ALTER TABLE `funcion_pelicula`
  ADD PRIMARY KEY (`numero_funcion`),
  ADD KEY `numero_sala` (`numero_sala`),
  ADD KEY `numero_pelicula` (`numero_pelicula`),
  ADD KEY `numero_horario` (`numero_horario`);

--
-- Indices de la tabla `horario`
--
ALTER TABLE `horario`
  ADD PRIMARY KEY (`numero_horario`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD PRIMARY KEY (`numero_reserva`),
  ADD KEY `documento_cliente` (`documento_cliente`),
  ADD KEY `numero_funcion` (`numero_funcion`);

--
-- Indices de la tabla `pago`
--
ALTER TABLE `pago`
  ADD PRIMARY KEY (`numero_pago`),
  ADD KEY `numero_reserva` (`numero_reserva`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`numero_pelicula`);

--
-- Indices de la tabla `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`numero_sala`),
  ADD KEY `tipo_sala` (`tipo_sala`);

--
-- Indices de la tabla `tiposala`
--
ALTER TABLE `tiposala`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asiento`
--
ALTER TABLE `asiento`
  MODIFY `numero_asiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_reserva`
--
ALTER TABLE `detalle_reserva`
  MODIFY `numero_reserva_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcion_pelicula`
--
ALTER TABLE `funcion_pelicula`
  MODIFY `numero_funcion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horario`
--
ALTER TABLE `horario`
  MODIFY `numero_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
  MODIFY `numero_reserva` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pago`
--
ALTER TABLE `pago`
  MODIFY `numero_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `numero_pelicula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sala`
--
ALTER TABLE `sala`
  MODIFY `numero_sala` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tiposala`
--
ALTER TABLE `tiposala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`numero_sala`) REFERENCES `sala` (`numero_sala`);

--
-- Filtros para la tabla `detalle_reserva`
--
ALTER TABLE `detalle_reserva`
  ADD CONSTRAINT `detalle_reserva_ibfk_1` FOREIGN KEY (`documento_cliente`) REFERENCES `ingreso` (`documento_cliente`),
  ADD CONSTRAINT `detalle_reserva_ibfk_2` FOREIGN KEY (`numero_funcion`) REFERENCES `funcion_pelicula` (`numero_funcion`),
  ADD CONSTRAINT `detalle_reserva_ibfk_3` FOREIGN KEY (`numero_reserva`) REFERENCES `ingreso` (`numero_reserva`);

--
-- Filtros para la tabla `funcion_pelicula`
--
ALTER TABLE `funcion_pelicula`
  ADD CONSTRAINT `funcion_pelicula_ibfk_1` FOREIGN KEY (`numero_sala`) REFERENCES `sala` (`numero_sala`),
  ADD CONSTRAINT `funcion_pelicula_ibfk_2` FOREIGN KEY (`numero_pelicula`) REFERENCES `pelicula` (`numero_pelicula`),
  ADD CONSTRAINT `funcion_pelicula_ibfk_3` FOREIGN KEY (`numero_horario`) REFERENCES `horario` (`numero_horario`);

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
  ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`documento_cliente`) REFERENCES `cliente` (`documento`),
  ADD CONSTRAINT `ingreso_ibfk_2` FOREIGN KEY (`numero_funcion`) REFERENCES `funcion_pelicula` (`numero_funcion`);

--
-- Filtros para la tabla `pago`
--
ALTER TABLE `pago`
  ADD CONSTRAINT `pago_ibfk_1` FOREIGN KEY (`numero_reserva`) REFERENCES `ingreso` (`numero_reserva`);

--
-- Filtros para la tabla `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`tipo_sala`) REFERENCES `tiposala` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
