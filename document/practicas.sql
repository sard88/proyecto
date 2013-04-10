-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-04-2013 a las 00:19:20
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.3.10-1ubuntu3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `practicas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `codigo` char(9) NOT NULL,
  `carrera` char(5) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `flag` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE IF NOT EXISTS `maestro` (
  `codigo` char(7) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(70) NOT NULL,
  `rol` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `flag` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservar`
--

CREATE TABLE IF NOT EXISTS `reservar` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `salon` int(11) NOT NULL,
  `espacios_reservados` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `motivo` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salon`
--

CREATE TABLE IF NOT EXISTS `salon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `edificio` char(10) NOT NULL,
  `aula` char(10) NOT NULL,
  `cupo` int(11) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `espacios` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `Edificio` (`edificio`,`aula`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_alumno`
--

CREATE TABLE IF NOT EXISTS `sesion_alumno` (
  `codigo` char(9) NOT NULL,
  `pass` char(32) NOT NULL,
  `permisos` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesion_maestro`
--

CREATE TABLE IF NOT EXISTS `sesion_maestro` (
  `codigo` char(7) NOT NULL,
  `pass` char(32) NOT NULL,
  `permisos` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `sesion_usuario`
--
CREATE TABLE IF NOT EXISTS `sesion_usuario` (
`codigo` char(9)
,`pass` char(32)
,`permisos` int(11)
,`activo` tinyint(4)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `usuario`
--
CREATE TABLE IF NOT EXISTS `usuario` (
`codigo` char(9)
,`carrera` varchar(5)
,`nombre` varchar(100)
,`apellido` varchar(100)
,`flag` tinyint(4)
,`correo` varchar(100)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_practicas`
--

CREATE TABLE IF NOT EXISTS `usuario_practicas` (
  `id_usuario` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `sesion_usuario`
--
DROP TABLE IF EXISTS `sesion_usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `sesion_usuario` AS select `sesion_alumno`.`codigo` AS `codigo`,`sesion_alumno`.`pass` AS `pass`,`sesion_alumno`.`permisos` AS `permisos`,`sesion_alumno`.`activo` AS `activo` from `sesion_alumno` union all select `sesion_maestro`.`codigo` AS `codigo`,`sesion_maestro`.`pass` AS `pass`,`sesion_maestro`.`permisos` AS `permisos`,`sesion_maestro`.`activo` AS `activo` from `sesion_maestro`;

-- --------------------------------------------------------

--
-- Estructura para la vista `usuario`
--
DROP TABLE IF EXISTS `usuario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `usuario` AS select `alumno`.`codigo` AS `codigo`,`alumno`.`carrera` AS `carrera`,`alumno`.`nombre` AS `nombre`,`alumno`.`apellido` AS `apellido`,`alumno`.`flag` AS `flag`,'' AS `correo` from `alumno` union select `maestro`.`codigo` AS `codigo`,'' AS `carrera`,`maestro`.`nombre` AS `nombre`,`maestro`.`apellido` AS `apellido`,`maestro`.`flag` AS `flag`,`maestro`.`correo` AS `correo` from `maestro`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
