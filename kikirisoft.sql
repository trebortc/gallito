-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-02-2019 a las 20:38:28
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kikirisoft`
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `criadero`
--

INSERT INTO `criadero` (`ID_CRIADEROS`, `NOMBRE`, `DESCRIPCION`, `ESTADO`, `updated_at`, `created_at`) VALUES
(133, 'Cielo McDermott III', 'Kenny Torp', 'C', '2019-02-07 08:34:31', '2019-02-07 08:34:31'),
(134, 'Chesley Lubowitz Sr.', 'Monte Bauch', 'S', '2019-02-20 04:20:50', '2019-02-07 08:34:31'),
(135, 'Prof. Colby Morissette', 'Joannie Hodkiewicz', 'A', '2019-02-07 08:34:31', '2019-02-07 08:34:31'),
(136, 'Makenna Russel', 'Lauriane Halvorson', 'A', '2019-02-07 08:34:31', '2019-02-07 08:34:31'),
(137, 'Mr. Donato Fritsch', 'Dariana Leuschke', 'S', '2019-02-20 04:21:22', '2019-02-07 08:34:31'),
(138, 'Carlos Ziemann', 'Kale Johns', 'A', '2019-02-07 08:34:31', '2019-02-07 08:34:31'),
(139, 'Lawrence Will', 'Wilhelm Dietrich', 'A', '2019-02-07 08:34:31', '2019-02-07 08:34:31'),
(140, 'Heber Mayert', 'Beryl Brakus Jr.', 'S', '2019-02-20 04:20:55', '2019-02-07 08:34:31'),
(141, 'Dr. Izaiah Konopelski', 'Tanya Crona', 'S', '2019-02-20 04:21:38', '2019-02-07 08:34:31'),
(142, 'Zola Blanda', 'Prof. Cristian Terry', 'A', '2019-02-07 08:34:31', '2019-02-07 08:34:31'),
(143, 'Zola Blanda', 'Prof. Cristian Terry', 'A', '2019-02-07 08:34:31', '2019-02-07 08:34:31');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gallo`
--

INSERT INTO `gallo` (`ID_GALLO`, `ID_REPRESENTANTE`, `PLACA`, `PESO`, `EDAD`, `TALLA`, `ESTADO`, `updated_at`, `created_at`) VALUES
(3, 82, 'Keith Purdy', '4.600', '3.000', '3.000', 'E', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(4, 92, 'Mr. Braxton Considine DDS', '4.200', '2.000', '2.000', 'A', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(5, 89, 'Bradly Stoltenberg', '4.600', '3.000', '3.000', 'E', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(6, 66, 'Winona Walsh Jr.', '3.500', '1.000', '1.000', 'A', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(7, 76, 'Ms. Cleora Cummerata I', '4.200', '2.000', '2.000', 'S', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(8, 78, 'Lue Cartwright', '3.700', '3.000', '4.000', 'A', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(9, 83, 'Dr. Arvel Roberts', '4.100', '3.000', '3.000', 'A', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(10, 82, 'Adonis Rau', '3.400', '1.000', '1.000', 'E', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(11, 70, 'Kathleen Bosco', '3.500', '3.000', '4.000', 'S', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(12, 70, 'Larue Nitzsche', '3.500', '4.000', '3.000', 'S', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(13, 92, 'Terrill Braun', '3.900', '3.000', '3.000', 'S', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(14, 72, 'Fred Balistreri', '4.600', '2.000', '2.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(15, 89, 'Dora Lebsack', '4.400', '3.000', '4.000', 'A', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(16, 75, 'Dr. Vicente Crooks', '3.400', '3.000', '3.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(17, 73, 'Lucile Barrows', '4.200', '4.000', '1.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(18, 82, 'Prof. Myrna Quitzon MD', '4.200', '4.000', '4.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(19, 88, 'Modesto Wisozk Jr.', '3.700', '4.000', '2.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(20, 69, 'Ransom Price IV', '3.500', '3.000', '2.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(21, 89, 'Mrs. Vivienne Kassulke', '4.500', '2.000', '1.000', 'A', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(22, 78, 'Augustus West', '3.300', '2.000', '4.000', 'S', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(23, 64, 'Arnold Schmitt', '4.000', '3.000', '2.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(24, 85, 'Lura Carter', '3.300', '2.000', '1.000', 'A', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(25, 80, 'Ines Breitenberg', '4.000', '1.000', '4.000', 'A', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(26, 66, 'Elnora Anderson', '3.700', '2.000', '2.000', 'S', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(27, 69, 'Lisandro Friesen', '4.400', '1.000', '2.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(28, 92, 'Ms. Roberta Reichel', '4.600', '2.000', '1.000', 'S', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(29, 72, 'Prof. Jay Hegmann Jr.', '3.800', '2.000', '2.000', 'A', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(30, 84, 'Marilou Kulas', '4.100', '3.000', '4.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(31, 92, 'Prof. Garrett Powlowski', '4.600', '1.000', '1.000', 'S', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(32, 81, 'Josefa Schaefer PhD', '3.500', '4.000', '2.000', 'S', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(33, 65, 'Brenden Sporer', '4.500', '3.000', '4.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(34, 65, 'Roxane Berge', '3.700', '1.000', '2.000', 'E', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(35, 86, 'Ulises Zieme PhD', '3.500', '4.000', '1.000', 'A', '2019-02-07 08:34:34', '2019-02-07 08:34:34'),
(36, 82, 'Blaise Crist', '4.000', '1.000', '1.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(37, 73, 'Cassidy Boyer', '4.400', '4.000', '3.000', 'A', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(38, 66, 'Josephine Goldner', '4.600', '4.000', '1.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(39, 70, 'Linnie Leuschke', '4.100', '1.000', '4.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(40, 78, 'Dr. D\'angelo Hamill DVM', '4.300', '1.000', '2.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(41, 86, 'Alysha Littel', '3.400', '2.000', '4.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(42, 82, 'Retta Wilkinson', '4.600', '1.000', '3.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(43, 89, 'Lia Stiedemann PhD', '3.500', '2.000', '4.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(44, 86, 'Kiley Bartoletti', '4.500', '1.000', '1.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(45, 88, 'Mrs. Lelia Lang', '3.900', '1.000', '3.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(46, 64, 'Michaela Schmeler', '4.100', '3.000', '2.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(47, 88, 'Noemie Cassin', '3.400', '2.000', '2.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(48, 85, 'Jewel Bednar IV', '4.200', '1.000', '1.000', 'A', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(49, 90, 'Deja Robel', '3.900', '4.000', '2.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(50, 83, 'Flo Boehm', '3.800', '3.000', '3.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(51, 76, 'Name Flatley', '4.000', '1.000', '4.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(52, 76, 'Maia Hudson II', '3.800', '3.000', '2.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(53, 77, 'Frederik Leannon', '3.400', '4.000', '3.000', 'S', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(54, 79, 'Gilbert Kuhn', '4.400', '4.000', '1.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(55, 85, 'Amber Erdman', '4.600', '3.000', '2.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(56, 88, 'Grover Marquardt', '3.800', '1.000', '2.000', 'A', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(57, 68, 'Dr. Kurt Auer DVM', '4.500', '2.000', '2.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(58, 68, 'Mrs. Julie Schuster', '4.100', '4.000', '3.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(59, 68, 'Dr. Kevin Upton', '4.500', '2.000', '1.000', 'A', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(60, 70, 'Francisca Dooley DDS', '3.900', '3.000', '4.000', 'A', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(61, 80, 'Doris Mosciski', '4.600', '4.000', '4.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(62, 90, 'Fredy Rowe', '3.400', '2.000', '1.000', 'A', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(63, 67, 'Cicero Hintz', '4.200', '1.000', '4.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(64, 76, 'Mrs. Laura Windler MD', '4.200', '2.000', '2.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(65, 87, 'Alessia Grady', '4.300', '3.000', '1.000', 'A', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(66, 76, 'Federico Nolan', '3.700', '3.000', '1.000', 'E', '2019-02-07 08:34:35', '2019-02-07 08:34:35'),
(67, 66, 'Donnell King', '3.300', '2.000', '3.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(68, 66, 'Darrick Nicolas Sr.', '4.100', '4.000', '3.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(69, 79, 'Juana Ebert', '3.800', '4.000', '3.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(70, 92, 'Treva Heller', '3.600', '1.000', '2.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(71, 78, 'Mrs. Natalia Klein PhD', '3.600', '1.000', '3.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(72, 89, 'Adolf Steuber', '3.300', '3.000', '4.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(73, 69, 'Prof. Lennie Funk', '3.400', '2.000', '4.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(74, 69, 'Michale Monahan', '3.800', '4.000', '4.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(75, 72, 'Prof. Simeon Wolf V', '3.700', '3.000', '2.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(76, 83, 'Miss Marlee Bayer', '4.600', '3.000', '4.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(77, 84, 'Eloise Welch DDS', '3.300', '4.000', '2.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(78, 83, 'Isac Lesch', '4.600', '3.000', '1.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(79, 83, 'Selina Windler', '3.800', '4.000', '4.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(80, 63, 'Jack Watsica Sr.', '4.600', '4.000', '2.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(81, 92, 'Damaris Larkin', '4.100', '1.000', '1.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(82, 88, 'Anne Gusikowski', '3.300', '1.000', '3.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(83, 65, 'Cindy Botsford', '3.900', '4.000', '3.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(84, 84, 'Icie Gottlieb', '3.300', '3.000', '2.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(85, 79, 'Willis Borer', '4.000', '2.000', '4.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(86, 81, 'Elinor Upton', '4.000', '2.000', '3.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(87, 64, 'Tanya Feil', '3.400', '2.000', '3.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(88, 91, 'Dawson Cummerata', '4.300', '1.000', '3.000', 'E', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(89, 84, 'Ms. Susie Rice Jr.', '4.000', '2.000', '2.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(90, 78, 'Mauricio Tromp', '4.300', '2.000', '2.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(91, 91, 'Christop Daugherty', '3.500', '4.000', '2.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(92, 74, 'Ms. Nicolette Anderson Sr.', '3.500', '1.000', '2.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(93, 91, 'Fidel Bahringer', '4.400', '2.000', '2.000', 'S', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(94, 70, 'Charlotte Nikolaus', '4.200', '4.000', '2.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(95, 79, 'Keven Breitenberg', '4.100', '4.000', '1.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(96, 87, 'Gilda Grimes', '4.200', '3.000', '2.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(97, 76, 'Prof. Haylie Bogisich', '4.300', '1.000', '3.000', 'A', '2019-02-07 08:34:36', '2019-02-07 08:34:36'),
(98, 89, 'Pasquale Heller', '4.400', '4.000', '4.000', 'S', '2019-02-07 08:34:37', '2019-02-07 08:34:37'),
(99, 90, 'Litzy Boyer', '3.300', '3.000', '1.000', 'S', '2019-02-07 08:34:37', '2019-02-07 08:34:37'),
(100, 63, 'Abigale Runolfsson', '4.300', '1.000', '1.000', 'S', '2019-02-07 08:34:37', '2019-02-07 08:34:37'),
(101, 74, 'Mr. Clifford Labadie Sr.', '3.700', '1.000', '4.000', 'A', '2019-02-07 08:34:37', '2019-02-07 08:34:37'),
(102, 76, 'Helga Green PhD', '4.300', '1.000', '4.000', 'E', '2019-02-07 08:34:37', '2019-02-07 08:34:37');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inscripcion_torneo`
--

INSERT INTO `inscripcion_torneo` (`ID_DESCRIPCION`, `ID_TORNEO`, `ID_CRIADEROS`, `ID_REPRESENTANTE`, `ID_GALLO`, `NOMBRE_CRIADERO`, `NOMBRE_REPRESENTANTE`, `PLACA_GALLO`, `PESO_GALLO`, `EDAD_GALLO`, `TALLA_GALLO`, `ESTADO`, `updated_at`, `created_at`) VALUES
(101, 10, 136, 86, 41, 'Makenna Russel', 'Myron Rohan', 'Alysha Littel', '3.400', '2.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(102, 10, 135, 74, 92, 'Prof. Colby Morissette', 'Cristina Veum', 'Ms. Nicolette Anderson Sr.', '3.500', '1.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(103, 10, 133, 70, 11, 'Cielo McDermott III', 'Bell Schiller', 'Kathleen Bosco', '3.500', '3.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(104, 10, 135, 65, 33, 'Prof. Colby Morissette', 'Jaclyn Hoeger', 'Brenden Sporer', '4.500', '3.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(105, 10, 140, 83, 76, 'Heber Mayert', 'Barry Wolf', 'Miss Marlee Bayer', '4.600', '3.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(106, 10, 141, 88, 56, 'Dr. Izaiah Konopelski', 'Jenifer Auer', 'Grover Marquardt', '3.800', '1.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(107, 10, 139, 84, 30, 'Lawrence Will', 'Madeline Blanda', 'Marilou Kulas', '4.100', '3.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(108, 10, 140, 83, 76, 'Heber Mayert', 'Barry Wolf', 'Miss Marlee Bayer', '4.600', '3.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(109, 10, 134, 69, 73, 'Chesley Lubowitz Sr.', 'Amie Hamill', 'Prof. Lennie Funk', '3.400', '2.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(110, 10, 139, 76, 97, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Prof. Haylie Bogisich', '4.300', '1.000', '3.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(111, 10, 139, 84, 89, 'Lawrence Will', 'Madeline Blanda', 'Ms. Susie Rice Jr.', '4.000', '2.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(112, 10, 133, 70, 11, 'Cielo McDermott III', 'Bell Schiller', 'Kathleen Bosco', '3.500', '3.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(113, 10, 137, 92, 28, 'Mr. Donato Fritsch', 'Ms. Hailee Fisher', 'Ms. Roberta Reichel', '4.600', '2.000', '1.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(114, 10, 141, 85, 48, 'Dr. Izaiah Konopelski', 'Jonathan Steuber Jr.', 'Jewel Bednar IV', '4.200', '1.000', '1.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(115, 10, 142, 68, 58, 'Zola Blanda', 'Mason Marquardt', 'Mrs. Julie Schuster', '4.100', '4.000', '3.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(116, 10, 133, 78, 22, 'Cielo McDermott III', 'Kelton Legros', 'Augustus West', '3.300', '2.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(117, 10, 138, 81, 32, 'Carlos Ziemann', 'Mr. Kieran Vandervort', 'Josefa Schaefer PhD', '3.500', '4.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(118, 10, 141, 64, 46, 'Dr. Izaiah Konopelski', 'Webster Moen', 'Michaela Schmeler', '4.100', '3.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(119, 10, 139, 84, 84, 'Lawrence Will', 'Madeline Blanda', 'Icie Gottlieb', '3.300', '3.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(120, 10, 141, 88, 56, 'Dr. Izaiah Konopelski', 'Jenifer Auer', 'Grover Marquardt', '3.800', '1.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(121, 10, 139, 76, 7, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Ms. Cleora Cummerata I', '4.200', '2.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(122, 10, 141, 88, 45, 'Dr. Izaiah Konopelski', 'Jenifer Auer', 'Mrs. Lelia Lang', '3.900', '1.000', '3.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(123, 10, 133, 89, 43, 'Cielo McDermott III', 'Carolyn Glover III', 'Lia Stiedemann PhD', '3.500', '2.000', '4.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(124, 10, 134, 69, 20, 'Chesley Lubowitz Sr.', 'Amie Hamill', 'Ransom Price IV', '3.500', '3.000', '2.000', 'A', '2019-02-08 02:17:57', '2019-02-08 02:17:57'),
(125, 10, 135, 82, 3, 'Prof. Colby Morissette', 'Leslie Hane PhD', 'Keith Purdy', '4.600', '3.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(126, 10, 136, 66, 6, 'Makenna Russel', 'Kaylah Mraz', 'Winona Walsh Jr.', '3.500', '1.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(127, 10, 134, 69, 27, 'Chesley Lubowitz Sr.', 'Amie Hamill', 'Lisandro Friesen', '4.400', '1.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(128, 10, 133, 70, 39, 'Cielo McDermott III', 'Bell Schiller', 'Linnie Leuschke', '4.100', '1.000', '4.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(129, 10, 133, 78, 90, 'Cielo McDermott III', 'Kelton Legros', 'Mauricio Tromp', '4.300', '2.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(130, 10, 136, 66, 67, 'Makenna Russel', 'Kaylah Mraz', 'Donnell King', '3.300', '2.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(131, 10, 135, 82, 10, 'Prof. Colby Morissette', 'Leslie Hane PhD', 'Adonis Rau', '3.400', '1.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(132, 10, 141, 88, 82, 'Dr. Izaiah Konopelski', 'Jenifer Auer', 'Anne Gusikowski', '3.300', '1.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(133, 10, 136, 86, 44, 'Makenna Russel', 'Myron Rohan', 'Kiley Bartoletti', '4.500', '1.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(134, 10, 141, 64, 46, 'Dr. Izaiah Konopelski', 'Webster Moen', 'Michaela Schmeler', '4.100', '3.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(135, 10, 136, 86, 44, 'Makenna Russel', 'Myron Rohan', 'Kiley Bartoletti', '4.500', '1.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(136, 10, 133, 89, 43, 'Cielo McDermott III', 'Carolyn Glover III', 'Lia Stiedemann PhD', '3.500', '2.000', '4.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(137, 10, 134, 69, 74, 'Chesley Lubowitz Sr.', 'Amie Hamill', 'Michale Monahan', '3.800', '4.000', '4.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(138, 10, 136, 80, 25, 'Makenna Russel', 'Dr. Jorge Hirthe', 'Ines Breitenberg', '4.000', '1.000', '4.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(139, 10, 142, 68, 58, 'Zola Blanda', 'Mason Marquardt', 'Mrs. Julie Schuster', '4.100', '4.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(140, 10, 133, 78, 90, 'Cielo McDermott III', 'Kelton Legros', 'Mauricio Tromp', '4.300', '2.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(141, 10, 137, 92, 81, 'Mr. Donato Fritsch', 'Ms. Hailee Fisher', 'Damaris Larkin', '4.100', '1.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(142, 10, 141, 85, 48, 'Dr. Izaiah Konopelski', 'Jonathan Steuber Jr.', 'Jewel Bednar IV', '4.200', '1.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(143, 10, 135, 65, 34, 'Prof. Colby Morissette', 'Jaclyn Hoeger', 'Roxane Berge', '3.700', '1.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(144, 10, 141, 88, 47, 'Dr. Izaiah Konopelski', 'Jenifer Auer', 'Noemie Cassin', '3.400', '2.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(145, 10, 136, 79, 69, 'Makenna Russel', 'Prof. Christina Kertzmann Jr.', 'Juana Ebert', '3.800', '4.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(146, 10, 136, 86, 35, 'Makenna Russel', 'Myron Rohan', 'Ulises Zieme PhD', '3.500', '4.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(147, 10, 136, 91, 88, 'Makenna Russel', 'Dr. Kellie Anderson', 'Dawson Cummerata', '4.300', '1.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(148, 10, 139, 76, 64, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Mrs. Laura Windler MD', '4.200', '2.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(149, 10, 136, 66, 38, 'Makenna Russel', 'Kaylah Mraz', 'Josephine Goldner', '4.600', '4.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(150, 10, 142, 87, 65, 'Zola Blanda', 'Dixie Gleason DVM', 'Alessia Grady', '4.300', '3.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(151, 10, 140, 73, 17, 'Heber Mayert', 'Mr. Erin Pagac II', 'Lucile Barrows', '4.200', '4.000', '1.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(152, 10, 136, 66, 26, 'Makenna Russel', 'Kaylah Mraz', 'Elnora Anderson', '3.700', '2.000', '2.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(153, 10, 139, 76, 102, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Helga Green PhD', '4.300', '1.000', '4.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(154, 10, 140, 83, 76, 'Heber Mayert', 'Barry Wolf', 'Miss Marlee Bayer', '4.600', '3.000', '4.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(155, 10, 139, 84, 30, 'Lawrence Will', 'Madeline Blanda', 'Marilou Kulas', '4.100', '3.000', '4.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(156, 10, 141, 88, 82, 'Dr. Izaiah Konopelski', 'Jenifer Auer', 'Anne Gusikowski', '3.300', '1.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(157, 10, 140, 73, 37, 'Heber Mayert', 'Mr. Erin Pagac II', 'Cassidy Boyer', '4.400', '4.000', '3.000', 'A', '2019-02-08 02:17:58', '2019-02-08 02:17:58'),
(158, 10, 133, 89, 72, 'Cielo McDermott III', 'Carolyn Glover III', 'Adolf Steuber', '3.300', '3.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(159, 10, 141, 88, 56, 'Dr. Izaiah Konopelski', 'Jenifer Auer', 'Grover Marquardt', '3.800', '1.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(160, 10, 135, 65, 83, 'Prof. Colby Morissette', 'Jaclyn Hoeger', 'Cindy Botsford', '3.900', '4.000', '3.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(161, 10, 133, 70, 39, 'Cielo McDermott III', 'Bell Schiller', 'Linnie Leuschke', '4.100', '1.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(162, 10, 142, 68, 57, 'Zola Blanda', 'Mason Marquardt', 'Dr. Kurt Auer DVM', '4.500', '2.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(163, 10, 134, 69, 74, 'Chesley Lubowitz Sr.', 'Amie Hamill', 'Michale Monahan', '3.800', '4.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(164, 10, 136, 91, 91, 'Makenna Russel', 'Dr. Kellie Anderson', 'Christop Daugherty', '3.500', '4.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(165, 10, 139, 76, 64, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Mrs. Laura Windler MD', '4.200', '2.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(166, 10, 136, 79, 54, 'Makenna Russel', 'Prof. Christina Kertzmann Jr.', 'Gilbert Kuhn', '4.400', '4.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(167, 10, 136, 66, 6, 'Makenna Russel', 'Kaylah Mraz', 'Winona Walsh Jr.', '3.500', '1.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(168, 10, 135, 72, 75, 'Prof. Colby Morissette', 'Barry Grimes', 'Prof. Simeon Wolf V', '3.700', '3.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(169, 10, 141, 64, 46, 'Dr. Izaiah Konopelski', 'Webster Moen', 'Michaela Schmeler', '4.100', '3.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(170, 10, 136, 86, 35, 'Makenna Russel', 'Myron Rohan', 'Ulises Zieme PhD', '3.500', '4.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(171, 10, 133, 89, 43, 'Cielo McDermott III', 'Carolyn Glover III', 'Lia Stiedemann PhD', '3.500', '2.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(172, 10, 139, 76, 7, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Ms. Cleora Cummerata I', '4.200', '2.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(173, 10, 136, 66, 6, 'Makenna Russel', 'Kaylah Mraz', 'Winona Walsh Jr.', '3.500', '1.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(174, 10, 136, 86, 41, 'Makenna Russel', 'Myron Rohan', 'Alysha Littel', '3.400', '2.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(175, 10, 135, 65, 83, 'Prof. Colby Morissette', 'Jaclyn Hoeger', 'Cindy Botsford', '3.900', '4.000', '3.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(176, 10, 133, 78, 22, 'Cielo McDermott III', 'Kelton Legros', 'Augustus West', '3.300', '2.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(177, 10, 141, 85, 24, 'Dr. Izaiah Konopelski', 'Jonathan Steuber Jr.', 'Lura Carter', '3.300', '2.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(178, 10, 133, 89, 15, 'Cielo McDermott III', 'Carolyn Glover III', 'Dora Lebsack', '4.400', '3.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(179, 10, 140, 83, 78, 'Heber Mayert', 'Barry Wolf', 'Isac Lesch', '4.600', '3.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(180, 10, 133, 78, 40, 'Cielo McDermott III', 'Kelton Legros', 'Dr. D\'angelo Hamill DVM', '4.300', '1.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(181, 10, 140, 83, 78, 'Heber Mayert', 'Barry Wolf', 'Isac Lesch', '4.600', '3.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(182, 10, 142, 87, 65, 'Zola Blanda', 'Dixie Gleason DVM', 'Alessia Grady', '4.300', '3.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(183, 10, 142, 87, 65, 'Zola Blanda', 'Dixie Gleason DVM', 'Alessia Grady', '4.300', '3.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(184, 10, 136, 86, 44, 'Makenna Russel', 'Myron Rohan', 'Kiley Bartoletti', '4.500', '1.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(185, 10, 133, 70, 94, 'Cielo McDermott III', 'Bell Schiller', 'Charlotte Nikolaus', '4.200', '4.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(186, 10, 135, 65, 34, 'Prof. Colby Morissette', 'Jaclyn Hoeger', 'Roxane Berge', '3.700', '1.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(187, 10, 137, 63, 100, 'Mr. Donato Fritsch', 'Ms. Gerda Dickens', 'Abigale Runolfsson', '4.300', '1.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(188, 10, 135, 72, 29, 'Prof. Colby Morissette', 'Barry Grimes', 'Prof. Jay Hegmann Jr.', '3.800', '2.000', '2.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(189, 10, 136, 79, 54, 'Makenna Russel', 'Prof. Christina Kertzmann Jr.', 'Gilbert Kuhn', '4.400', '4.000', '1.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(190, 10, 133, 78, 8, 'Cielo McDermott III', 'Kelton Legros', 'Lue Cartwright', '3.700', '3.000', '4.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(191, 10, 139, 76, 97, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Prof. Haylie Bogisich', '4.300', '1.000', '3.000', 'A', '2019-02-08 02:17:59', '2019-02-08 02:17:59'),
(192, 10, 137, 92, 28, 'Mr. Donato Fritsch', 'Ms. Hailee Fisher', 'Ms. Roberta Reichel', '4.600', '2.000', '1.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(193, 10, 140, 83, 9, 'Heber Mayert', 'Barry Wolf', 'Dr. Arvel Roberts', '4.100', '3.000', '3.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(194, 10, 133, 89, 15, 'Cielo McDermott III', 'Carolyn Glover III', 'Dora Lebsack', '4.400', '3.000', '4.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(195, 10, 135, 65, 34, 'Prof. Colby Morissette', 'Jaclyn Hoeger', 'Roxane Berge', '3.700', '1.000', '2.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(196, 10, 138, 81, 32, 'Carlos Ziemann', 'Mr. Kieran Vandervort', 'Josefa Schaefer PhD', '3.500', '4.000', '2.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(197, 10, 136, 66, 6, 'Makenna Russel', 'Kaylah Mraz', 'Winona Walsh Jr.', '3.500', '1.000', '1.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(198, 10, 139, 76, 52, 'Lawrence Will', 'Prof. Cheyenne Runolfsson DVM', 'Maia Hudson II', '3.800', '3.000', '2.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(199, 10, 139, 84, 77, 'Lawrence Will', 'Madeline Blanda', 'Eloise Welch DDS', '3.300', '4.000', '2.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00'),
(200, 10, 142, 67, 63, 'Zola Blanda', 'Prof. Georgianna Marvin', 'Cicero Hintz', '4.200', '1.000', '4.000', 'A', '2019-02-08 02:18:00', '2019-02-08 02:18:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametro`
--

CREATE TABLE `parametro` (
  `NOMBRE_PARAMETRO` varchar(64) NOT NULL,
  `VALOR` varchar(64) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametro`
--

INSERT INTO `parametro` (`NOMBRE_PARAMETRO`, `VALOR`, `updated_at`, `created_at`) VALUES
('PESO MAXIMO', '4.6', '2019-02-05 08:37:12', '2019-02-05 08:37:12'),
('PESO MINIMO', '3.3', '2019-02-05 08:37:12', '2019-02-05 08:37:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelea_gallos`
--

CREATE TABLE `pelea_gallos` (
  `ID_PELEA` bigint(20) NOT NULL,
  `ID_DESCRIPCION` int(11) DEFAULT NULL,
  `INS_ID_DESCRIPCION` int(11) DEFAULT NULL,
  `RESULTADO` varchar(64) DEFAULT NULL,
  `TIEMPO` time DEFAULT NULL,
  `OBSERVACION` varchar(256) DEFAULT NULL,
  `ESTADO` varchar(1) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pelea_gallos`
--

INSERT INTO `pelea_gallos` (`ID_PELEA`, `ID_DESCRIPCION`, `INS_ID_DESCRIPCION`, `RESULTADO`, `TIEMPO`, `OBSERVACION`, `ESTADO`, `updated_at`, `created_at`) VALUES
(2, 199, 130, 'Donnell King', '00:05:00', 'Sin novedad', 'F', '2019-02-15 11:07:31', '2019-02-12 21:33:54'),
(3, 116, 176, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(4, 132, 156, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(5, 109, 144, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(6, 101, 174, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(7, 197, 173, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(8, 167, 126, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(9, 170, 146, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(10, 124, 102, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(11, 123, 136, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(12, 171, 103, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(13, 112, 117, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(14, 196, 164, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(15, 143, 186, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(16, 195, 168, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(17, 190, 152, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(18, 188, 137, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(19, 163, 198, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(20, 145, 106, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(21, 120, 159, NULL, NULL, NULL, 'A', '2019-02-12 21:33:54', '2019-02-12 21:33:54'),
(22, 122, 160, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(23, 111, 138, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(24, 139, 115, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(25, 118, 169, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(26, 134, 155, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(27, 107, 161, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(28, 128, 193, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(29, 121, 172, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(30, 148, 165, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(31, 151, 114, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(32, 142, 200, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(33, 110, 191, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(34, 140, 129, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(35, 153, 180, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(36, 147, 150, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(37, 182, 183, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(38, 127, 166, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(39, 189, 178, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(40, 194, 157, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(41, 133, 135, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(42, 184, 162, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(43, 113, 192, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(44, 105, 108, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(45, 154, 125, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55'),
(46, 149, 179, NULL, NULL, NULL, 'A', '2019-02-12 21:33:55', '2019-02-12 21:33:55');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `representante`
--

INSERT INTO `representante` (`ID_REPRESENTANTE`, `ID_CRIADEROS`, `IDENTIFICACION`, `NOMBRES`, `TELEFONOS`, `CORREO`, `DESCRIPCION`, `ETADO`, `updated_at`, `created_at`) VALUES
(63, 137, '7559146774', 'Ms. Gerda Dickens', '660828', 'gerry55@runolfsson.biz', 'Sit ullam perspiciatis eum sit ipsam.', 'A', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(64, 141, '1136269863', 'Webster Moen', '305632', 'oharvey@bartoletti.biz', 'Consequatur debitis id est tempore itaque.', 'B', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(65, 135, '7009948255', 'Jaclyn Hoeger', '369459', 'janet.vonrueden@dicki.com', 'Facilis aut sit ut ut placeat repudiandae.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(66, 136, '4273808636', 'Kaylah Mraz', '572642', 'laurine59@yahoo.com', 'Perferendis adipisci reiciendis nulla ut recusandae ipsum.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(67, 142, '7444131938', 'Prof. Georgianna Marvin', '638268', 'acruickshank@gmail.com', 'Labore eligendi consequatur sit quam.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(68, 142, '5052625419', 'Mason Marquardt', '983351', 'qbarton@yahoo.com', 'Voluptates dolorum ea et reprehenderit.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(69, 134, '7683283896', 'Amie Hamill', '729154', 'lindsey.lang@gmail.com', 'Perspiciatis odio asperiores aut atque temporibus et incidunt.', 'A', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(70, 133, '7497270334', 'Bell Schiller', '613373', 'josianne.dickens@gmail.com', 'Labore reiciendis reprehenderit ea delectus cumque consectetur dolor molestiae.', 'A', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(71, 136, '4917338031', 'Melany Wilderman', '784681', 'lyundt@balistreri.net', 'Similique nemo quas ipsum fuga est et quo.', 'B', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(72, 135, '5951713648', 'Barry Grimes', '528772', 'gabe.thiel@gmail.com', 'Esse at rem velit doloremque.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(73, 140, '9103661887', 'Mr. Erin Pagac II', '948499', 'pink.satterfield@mraz.biz', 'Consequatur corrupti voluptatibus perferendis nulla voluptatibus voluptatum.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(74, 135, '8412789679', 'Cristina Veum', '871983', 'elissa51@hotmail.com', 'Consequatur nesciunt vel fugit molestias odio.', 'B', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(75, 141, '5312178582', 'Prof. Heath Roberts', '292415', 'kdenesik@hotmail.com', 'Laborum dolores esse voluptatem veniam.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(76, 139, '3484862185', 'Prof. Cheyenne Runolfsson DVM', '096534', 'jakubowski.general@daniel.info', 'Laboriosam aut est aperiam minus nisi esse ipsa.', 'A', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(77, 139, '9766880010', 'Dr. Norris Klocko IV', '343837', 'thelma.pfannerstill@orn.org', 'Omnis et ab excepturi et qui molestiae eum.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(78, 133, '8821799773', 'Kelton Legros', '327639', 'orville.konopelski@hotmail.com', 'Quasi officiis et omnis et eos id necessitatibus.', 'A', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(79, 136, '0471556195', 'Prof. Christina Kertzmann Jr.', '116739', 'gbotsford@gmail.com', 'Unde minus blanditiis quas sint quo.', 'B', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(80, 136, '2515791160', 'Dr. Jorge Hirthe', '080993', 'ublanda@hotmail.com', 'Aut earum dolor est perferendis quia qui adipisci nemo.', 'C', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(81, 138, '4851115062', 'Mr. Kieran Vandervort', '854181', 'theodora52@cruickshank.info', 'Perferendis est et enim mollitia rem expedita.', 'B', '2019-02-07 08:34:32', '2019-02-07 08:34:32'),
(82, 135, '1725638124', 'Leslie Hane PhD', '486976', 'rasheed00@abernathy.com', 'Consequatur molestias et et modi ullam cupiditate.', 'A', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(83, 140, '0957146718', 'Barry Wolf', '814002', 'noemie.wilkinson@gmail.com', 'Fugit ullam est vero quo voluptatem amet beatae.', 'B', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(84, 139, '0080577824', 'Madeline Blanda', '208023', 'tbrekke@yahoo.com', 'Soluta dolore est repudiandae unde magnam eum.', 'B', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(85, 141, '1364388719', 'Jonathan Steuber Jr.', '698049', 'xwalsh@baumbach.com', 'Quibusdam praesentium dignissimos dolores facilis cumque.', 'A', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(86, 136, '9129900429', 'Myron Rohan', '791640', 'daphney24@gmail.com', 'Illum incidunt vitae nemo repudiandae consectetur quo.', 'A', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(87, 142, '5874539883', 'Dixie Gleason DVM', '402629', 'kreiger.timmothy@yahoo.com', 'Rem possimus ut blanditiis eum alias qui.', 'C', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(88, 141, '8999956191', 'Jenifer Auer', '336371', 'dolores.turcotte@gottlieb.com', 'Voluptate pariatur modi asperiores voluptatem sed molestiae.', 'B', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(89, 133, '5206329249', 'Carolyn Glover III', '371657', 'daniel.timmy@gmail.com', 'Sint distinctio est in error animi et.', 'C', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(90, 138, '8172808289', 'Albin Muller', '974151', 'wfriesen@hotmail.com', 'Est minus facere accusamus similique nulla.', 'C', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(91, 136, '7918195044', 'Dr. Kellie Anderson', '283909', 'gmarquardt@hotmail.com', 'Velit suscipit dolor porro impedit quibusdam accusamus iusto.', 'C', '2019-02-07 08:34:33', '2019-02-07 08:34:33'),
(92, 137, '8877368129', 'Ms. Hailee Fisher', '686287', 'justice60@gmail.com', 'Debitis at aperiam alias alias natus sint.', 'C', '2019-02-07 08:34:33', '2019-02-07 08:34:33');

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `torneo`
--

INSERT INTO `torneo` (`ID_TORNEO`, `NOMBRE`, `DESCRIPCION`, `FECHA`, `ESTADO`, `updated_at`, `created_at`) VALUES
(10, 'Marina Wolff', 'Labore ut nihil voluptas enim tempore. Totam qui ipsa deserunt ipsam porro modi qui.', '2017-11-16', 'A', '2019-02-07 08:34:31', '2019-02-07 08:34:31');

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
  MODIFY `ID_CRIADEROS` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT de la tabla `gallo`
--
ALTER TABLE `gallo`
  MODIFY `ID_GALLO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT de la tabla `inscripcion_torneo`
--
ALTER TABLE `inscripcion_torneo`
  MODIFY `ID_DESCRIPCION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT de la tabla `pelea_gallos`
--
ALTER TABLE `pelea_gallos`
  MODIFY `ID_PELEA` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `representante`
--
ALTER TABLE `representante`
  MODIFY `ID_REPRESENTANTE` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de la tabla `torneo`
--
ALTER TABLE `torneo`
  MODIFY `ID_TORNEO` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
