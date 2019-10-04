-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-10-2019 a las 02:48:47
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `spotify`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cancion`
--

CREATE TABLE `cancion` (
  `id` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `pedido_por` varchar(100) NOT NULL,
  `solicitado_en` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `borrado_en` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cancion`
--

INSERT INTO `cancion` (`id`, `link`, `pedido_por`, `solicitado_en`, `borrado_en`) VALUES
(26, '5UWwZ5lm5PKu6eKsHAGxOk?si=kMS53DYKSsimnCAhy_c3FA', 'Alberto', '2019-10-04 00:16:22', NULL),
(27, '7p4vHnYXkxlzvfePJVpcTr?si=EwM4_-ROReGhnWGzfKrh9Q', 'Alberto', '2019-10-04 00:36:03', '2019-10-04 07:36:03'),
(28, '0aTMBEfPCCkKkneU6gLmDD?si=va3KMYmyTWOWA9ks7S1ddg', 'Alberto', '2019-10-04 00:27:41', NULL),
(29, '0m3Ze0cy8qBHSsV2exAfCw?si=PDE4WrD8RpyawYY0BhixWA', 'Alberto', '2019-10-04 00:32:37', NULL),
(30, '2nejvFyJeTDtMRP2nUMt0J?si=9vY7GckTSd-HFKp2JpJoSA', 'Carlos Sanchez', '2019-10-04 00:40:07', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cancion`
--
ALTER TABLE `cancion`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cancion`
--
ALTER TABLE `cancion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
