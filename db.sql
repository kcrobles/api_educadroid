-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2017 a las 17:17:48
-- Versión del servidor: 5.7.9
-- Versión de PHP: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_droid`
--
CREATE DATABASE IF NOT EXISTS `api_droid` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `api_droid`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contestadas`
--

DROP TABLE IF EXISTS `contestadas`;
CREATE TABLE IF NOT EXISTS `contestadas` (
  `encuesta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  KEY `fk_contestada_encuesta` (`encuesta_id`),
  KEY `fk_contestada_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisiones`
--

DROP TABLE IF EXISTS `divisiones`;
CREATE TABLE IF NOT EXISTS `divisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisiones_alumnos`
--

DROP TABLE IF EXISTS `divisiones_alumnos`;
CREATE TABLE IF NOT EXISTS `divisiones_alumnos` (
  `division_id` int(11) NOT NULL,
  `legajo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

DROP TABLE IF EXISTS `domicilios`;
CREATE TABLE IF NOT EXISTS `domicilios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `direccion` text,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `direccion`, `latitud`, `longitud`, `created_at`, `updated_at`) VALUES
(1, 'Av. Medrano 925', -34.598, -58.4163, '2017-05-29 16:08:32', '2017-05-29 16:08:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

DROP TABLE IF EXISTS `encuestas`;
CREATE TABLE IF NOT EXISTS `encuestas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_encuenta_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legajos`
--

DROP TABLE IF EXISTS `legajos`;
CREATE TABLE IF NOT EXISTS `legajos` (
  `legajo` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`legajo`),
  KEY `fk_legajos_user` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

DROP TABLE IF EXISTS `opciones`;
CREATE TABLE IF NOT EXISTS `opciones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text,
  `pregunta_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_opciones_pregunta` (`pregunta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

DROP TABLE IF EXISTS `preguntas`;
CREATE TABLE IF NOT EXISTS `preguntas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_id` int(11) DEFAULT NULL,
  `texto` text,
  `encuesta_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_preguntas_tipos` (`tipo_id`),
  KEY `fk_preguntas_encuesta` (`encuesta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `pregunta_id` int(11) NOT NULL,
  `opcion_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  KEY `fk_respuesta_pregunta` (`pregunta_id`),
  KEY `fk_respuesta_opcion` (`opcion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `documento` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` text,
  `fnacimiento` date DEFAULT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `image` text,
  `sexo` char(1) DEFAULT NULL,
  `domicilio_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_rol` (`rol_id`),
  KEY `fk_user_domicilio` (`domicilio_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `documento`, `email`, `password`, `fnacimiento`, `rol_id`, `image`, `sexo`, `domicilio_id`, `created_at`, `updated_at`) VALUES
(2, 'John', 'Doe', '11111111', 'john.doe@slim.com', '$2y$10$v6k4EwSTUPuBZXOmzTbgIOBOArY/H4PrR2jKy4s3K7sZWG3BQQqda', NULL, 1, NULL, 'm', 1, '2017-05-29 16:08:51', '2017-05-29 16:08:51');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contestadas`
--
ALTER TABLE `contestadas`
  ADD CONSTRAINT `fk_contestada_encuesta` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`),
  ADD CONSTRAINT `fk_contestada_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `fk_encuenta_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `legajos`
--
ALTER TABLE `legajos`
  ADD CONSTRAINT `fk_legajos_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD CONSTRAINT `fk_opciones_pregunta` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`);

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `fk_preguntas_encuesta` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`),
  ADD CONSTRAINT `fk_preguntas_tipos` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`id`);

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `fk_respuesta_opcion` FOREIGN KEY (`opcion_id`) REFERENCES `opciones` (`id`),
  ADD CONSTRAINT `fk_respuesta_pregunta` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_domicilio` FOREIGN KEY (`domicilio_id`) REFERENCES `domicilios` (`id`),
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
