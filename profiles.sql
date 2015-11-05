-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2015 a las 07:20:39
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `profiles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `correo` varchar(20) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`id`, `nombre`, `apellido`, `correo`, `fecha`) VALUES
(1, 'manuel ', 'oliveira', 'manueloliveira@gmail', '2015-10-25'),
(2, 'keila', 'garcia', 'garica@gmail.cm', '2015-10-25'),
(3, 'jose', 'malave', '@gmai.com', '2015-10-25'),
(20, 'gabriel', 'marcano', 'marcanogabo@gmail.co', '2015-10-25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
