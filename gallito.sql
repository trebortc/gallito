-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2021 a las 06:05:38
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gallito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `criadero`
--

CREATE TABLE `criadero` (
  `ID_CRIADEROS` bigint(20) NOT NULL,
  `NOMBRE` varchar(64) DEFAULT NULL,
  `DESCRIPCION` varchar(256) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gallo`
--

CREATE TABLE `gallo` (
  `ID_GALLO` bigint(20) NOT NULL,
  `ID_REPRESENTANTE` bigint(20) DEFAULT NULL,
  `PLACA` varchar(64) DEFAULT NULL,
  `PESO` decimal(10,3) DEFAULT NULL,
  `EDAD` decimal(10,3) DEFAULT NULL,
  `TALLA` decimal(10,3) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion_torneo`
--

CREATE TABLE `inscripcion_torneo` (
  `ID_DESCRIPCION` int(11) NOT NULL,
  `ID_TORNEO` bigint(20) DEFAULT NULL,
  `ID_CRIADEROS` bigint(20) DEFAULT NULL,
  `ID_REPRESENTANTE` bigint(20) DEFAULT NULL,
  `ID_GALLO` bigint(20) DEFAULT NULL,
  `NOMBRE_CRIADERO` varchar(256) DEFAULT NULL,
  `NOMBRE_REPRESENTANTE` varchar(256) DEFAULT NULL,
  `PLACA_GALLO` varchar(64) DEFAULT NULL,
  `PESO_GALLO` decimal(10,3) DEFAULT NULL,
  `EDAD_GALLO` decimal(10,3) DEFAULT NULL,
  `TALLA_GALLO` decimal(10,3) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `NOMBRE_PARAMETRO` varchar(64) NOT NULL,
  `VALOR` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`NOMBRE_PARAMETRO`, `VALOR`, `updated_at`, `created_at`) VALUES
('PESO MAXIMO', '5.0', '2019-03-19 05:45:13', '2019-02-05 08:37:12'),
('PESO MINIMO', '3.0', '2019-03-19 05:45:03', '2019-02-05 08:37:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelea_gallos`
--

CREATE TABLE `pelea_gallos` (
  `ID_PELEA` bigint(20) NOT NULL,
  `ID_DESCRIPCION` int(11) DEFAULT NULL,
  `INS_ID_DESCRIPCION` int(11) DEFAULT NULL,
  `RESULTADO` varchar(64) DEFAULT NULL,
  `TIEMPO` time(6) DEFAULT NULL,
  `OBSERVACION` varchar(256) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `representante`
--

CREATE TABLE `representante` (
  `ID_REPRESENTANTE` bigint(20) NOT NULL,
  `ID_CRIADEROS` bigint(20) DEFAULT NULL,
  `IDENTIFICACION` varchar(16) DEFAULT NULL,
  `NOMBRES` varchar(64) DEFAULT NULL,
  `TELEFONOS` varchar(64) DEFAULT NULL,
  `CORREO` varchar(64) DEFAULT NULL,
  `DESCRIPCION` varchar(256) DEFAULT NULL,
  `ETADO` varchar(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `torneo`
--

CREATE TABLE `torneo` (
  `ID_TORNEO` bigint(20) NOT NULL,
  `NOMBRE` varchar(64) DEFAULT NULL,
  `DESCRIPCION` varchar(256) DEFAULT NULL,
  `FECHA` date DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NICK` varchar(64) NOT NULL,
  `CLAVE` varchar(64) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `criadero`
--
ALTER TABLE `criadero`
  ADD PRIMARY KEY (`ID_CRIADEROS`);

--
-- Indices de la tabla `gallo`
--
ALTER TABLE `gallo`
  ADD PRIMARY KEY (`ID_GALLO`),
  ADD KEY `FK_RELATIONSHIP_3` (`ID_REPRESENTANTE`);

--
-- Indices de la tabla `inscripcion_torneo`
--
ALTER TABLE `inscripcion_torneo`
  ADD PRIMARY KEY (`ID_DESCRIPCION`),
  ADD KEY `FK_RELATIONSHIP_5` (`ID_TORNEO`),
  ADD KEY `FK_RELATIONSHIP_7` (`ID_CRIADEROS`),
  ADD KEY `FK_RELATIONSHIP_8` (`ID_REPRESENTANTE`),
  ADD KEY `FK_RELATIONSHIP_9` (`ID_GALLO`);

--
-- Indices de la tabla `parametro`
--
ALTER TABLE `parametro`
  ADD PRIMARY KEY (`NOMBRE_PARAMETRO`);

--
-- Indices de la tabla `pelea_gallos`
--
ALTER TABLE `pelea_gallos`
  ADD PRIMARY KEY (`ID_PELEA`),
  ADD KEY `FK_RELATIONSHIP_10` (`ID_DESCRIPCION`),
  ADD KEY `FK_GALLO_PELEA1` (`INS_ID_DESCRIPCION`);

--
-- Indices de la tabla `representante`
--
ALTER TABLE `representante`
  ADD PRIMARY KEY (`ID_REPRESENTANTE`),
  ADD KEY `FK_RELATIONSHIP_6` (`ID_CRIADEROS`);

--
-- Indices de la tabla `torneo`
--
ALTER TABLE `torneo`
  ADD PRIMARY KEY (`ID_TORNEO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NICK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `criadero`
--
ALTER TABLE `criadero`
  MODIFY `ID_CRIADEROS` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `gallo`
--
ALTER TABLE `gallo`
  MODIFY `ID_GALLO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `inscripcion_torneo`
--
ALTER TABLE `inscripcion_torneo`
  MODIFY `ID_DESCRIPCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `pelea_gallos`
--
ALTER TABLE `pelea_gallos`
  MODIFY `ID_PELEA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;

--
-- AUTO_INCREMENT de la tabla `representante`
--
ALTER TABLE `representante`
  MODIFY `ID_REPRESENTANTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `ID_TORNEO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gallo`
--
ALTER TABLE `gallo`
  ADD CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`ID_REPRESENTANTE`) REFERENCES `representante` (`ID_REPRESENTANTE`);

--
-- Filtros para la tabla `inscripcion_torneo`
--
ALTER TABLE `inscripcion_torneo`
  ADD CONSTRAINT `FK_RELATIONSHIP_5` FOREIGN KEY (`ID_TORNEO`) REFERENCES `torneo` (`ID_TORNEO`),
  ADD CONSTRAINT `FK_RELATIONSHIP_7` FOREIGN KEY (`ID_CRIADEROS`) REFERENCES `criadero` (`ID_CRIADEROS`),
  ADD CONSTRAINT `FK_RELATIONSHIP_8` FOREIGN KEY (`ID_REPRESENTANTE`) REFERENCES `representante` (`ID_REPRESENTANTE`),
  ADD CONSTRAINT `FK_RELATIONSHIP_9` FOREIGN KEY (`ID_GALLO`) REFERENCES `gallo` (`ID_GALLO`);

--
-- Filtros para la tabla `pelea_gallos`
--
ALTER TABLE `pelea_gallos`
  ADD CONSTRAINT `FK_GALLO_PELEA1` FOREIGN KEY (`INS_ID_DESCRIPCION`) REFERENCES `inscripcion_torneo` (`ID_DESCRIPCION`),
  ADD CONSTRAINT `FK_RELATIONSHIP_10` FOREIGN KEY (`ID_DESCRIPCION`) REFERENCES `inscripcion_torneo` (`ID_DESCRIPCION`);

--
-- Filtros para la tabla `representante`
--
ALTER TABLE `representante`
  ADD CONSTRAINT `FK_RELATIONSHIP_6` FOREIGN KEY (`ID_CRIADEROS`) REFERENCES `criadero` (`ID_CRIADEROS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
