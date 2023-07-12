-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-07-2023 a las 22:18:13
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_mysql_crud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `dni` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellido` varchar(250) NOT NULL,
  `edad` int(11) NOT NULL,
  `fecha_nac` date timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`dni`, `id`, `titulo`, `descripcion`, `created_at`, `nombre`, `apellido`, `edad`, `fecha_nac`) VALUES
(0, 52, 'prueba', '1', '2023-07-04 19:24:23', '', '', 0, NULL),
(0, 53, 'prueba ', '2', '2023-07-04 19:24:30', '', '', 0, NULL),
(0, 54, 'prueba', '3', '2023-07-04 19:24:34', '', '', 0, NULL),
(0, 55, 'php1', 'desarrollo', '2023-07-04 19:26:26', '', '', 0, NULL),
(0, 56, 'aaaaaaa', 'aaaaaaaa', '2023-07-04 19:43:48', '', '', 0, NULL),
(0, 57, 'eeeeeee', 'eeeeeeeee', '2023-07-04 19:49:42', '', '', 0, NULL),
(0, 59, '44', '55', '2023-07-04 20:02:19', '', '', 0, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
