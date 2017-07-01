-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-07-2017 a las 02:01:18
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `materia_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `materia_id` (`materia_id`),
  KEY `division_id` (`division_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `materia_id`, `division_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 14, 1),
(4, 14, 2),
(5, 21, 1),
(6, 21, 2),
(7, 6, 1),
(8, 6, 2),
(9, 2, 3),
(10, 2, 4),
(11, 15, 3),
(12, 15, 4),
(13, 7, 3),
(14, 7, 4),
(15, 25, 3),
(16, 25, 4),
(17, 3, 5),
(18, 3, 6),
(19, 16, 5),
(20, 16, 6),
(21, 23, 5),
(22, 23, 6),
(23, 24, 5),
(24, 24, 6),
(25, 22, 3),
(26, 22, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_encuestas`
--

DROP TABLE IF EXISTS `cursos_encuestas`;
CREATE TABLE IF NOT EXISTS `cursos_encuestas` (
  `curso_id` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL,
  KEY `materia_division_id` (`curso_id`),
  KEY `encuesta_id` (`encuesta_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisiones`
--

DROP TABLE IF EXISTS `divisiones`;
CREATE TABLE IF NOT EXISTS `divisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `divisiones`
--

INSERT INTO `divisiones` (`id`, `codigo`) VALUES
(1, '1A'),
(2, '1B'),
(3, '2A'),
(4, '2B'),
(5, '3A'),
(6, '3B'),
(7, '4A'),
(8, '4B');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `direccion`, `latitud`, `longitud`, `created_at`, `updated_at`) VALUES
(1, 'Av. Medrano 925', -34.598, -58.4163, '2017-05-29 16:08:32', '2017-05-29 16:08:32'),
(2, 'Av. Administrativos 123', 0, 0, '2017-06-29 01:53:15', '2017-06-29 01:53:15'),
(3, 'Av. Admin 123', 0, 0, '2017-06-29 01:53:52', '2017-06-29 01:53:52'),
(4, 'Av. Profesores 123', 0, 0, '2017-06-29 01:54:22', '2017-06-29 01:54:22'),
(5, 'Av. Profesores 126', 0, 0, '2017-06-29 01:54:57', '2017-06-29 01:54:57'),
(6, 'Av. Alumnos 123', 0, 0, '2017-06-29 01:55:34', '2017-06-29 01:55:34'),
(7, 'Av. Alumnos 125', 0, 0, '2017-06-29 01:55:55', '2017-06-29 01:55:55'),
(8, 'Av. Alumnos 126', 0, 0, '2017-06-29 01:56:14', '2017-06-29 01:56:14'),
(9, 'Av. Alumnos 127', 0, 0, '2017-06-29 01:56:40', '2017-06-29 01:56:40');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`id`, `tema`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '', NULL, '2017-06-21 05:39:37', '2017-06-21 05:39:37'),
(2, 'Hola', NULL, '2017-06-21 05:41:35', '2017-06-21 05:41:35'),
(3, '', NULL, '2017-06-21 05:43:52', '2017-06-21 05:43:52'),
(4, '', NULL, '2017-06-21 05:44:52', '2017-06-21 05:44:52'),
(5, '', NULL, '2017-06-21 05:45:10', '2017-06-21 05:45:10'),
(6, '', NULL, '2017-06-22 02:49:12', '2017-06-22 02:49:12'),
(7, 'Lkjhlkjh', NULL, '2017-06-22 04:44:28', '2017-06-22 04:44:28'),
(8, 'Lkjhlkjh', NULL, '2017-06-22 04:55:20', '2017-06-22 04:55:20'),
(9, 'Dfasdf', NULL, '2017-06-22 05:11:26', '2017-06-22 05:11:26'),
(10, 'Lalala', NULL, '2017-06-24 04:55:50', '2017-06-24 04:55:50'),
(11, 'Asdf', NULL, '2017-06-24 04:58:21', '2017-06-24 04:58:21'),
(12, 'fasdf', NULL, '2017-06-24 05:13:36', '2017-06-24 05:13:36'),
(13, 'asdf', NULL, '2017-06-24 05:14:51', '2017-06-24 05:14:51'),
(14, 'asdfa', NULL, '2017-06-24 05:21:07', '2017-06-24 05:21:07'),
(15, 'asdfasf', NULL, '2017-06-24 06:01:28', '2017-06-24 06:01:28'),
(16, 'asdfasf', NULL, '2017-06-24 06:08:45', '2017-06-24 06:08:45'),
(17, 'asdfasf', NULL, '2017-06-24 06:22:12', '2017-06-24 06:22:12'),
(18, 'Matematicas', NULL, '2017-06-26 05:46:47', '2017-06-26 05:46:47'),
(19, 'Historia', NULL, '2017-06-26 05:49:37', '2017-06-26 05:49:37'),
(20, 'muchas preguntas', NULL, '2017-06-27 02:09:28', '2017-06-27 02:09:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

DROP TABLE IF EXISTS `inscripciones`;
CREATE TABLE IF NOT EXISTS `inscripciones` (
  `legajo` int(11) NOT NULL,
  `curso_id` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  KEY `curso_id` (`curso_id`),
  KEY `legajo` (`legajo`)
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `legajos`
--

INSERT INTO `legajos` (`legajo`, `user_id`) VALUES
(1, 7),
(3, 7),
(2, 8),
(4, 8),
(5, 9),
(6, 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `nombre`) VALUES
(1, 'LABORATORIO I'),
(2, 'LABORATORIO II'),
(3, 'LABORATORIO III'),
(4, 'LABORATORIO IV'),
(5, 'LABORATORIO V'),
(6, 'SISTEMAS Y PROCESAMIENTO DE DATOS'),
(7, 'SISTEMAS OPERATIVOS'),
(8, 'METODOLOGIA DE SISTEMAS'),
(9, 'PROGRAMACION I'),
(10, 'PROGRAMACION II'),
(11, 'PROGRAMACION III'),
(12, 'PROGRAMACION IV'),
(13, 'PROGRAMACION V'),
(14, 'MATEMATICA'),
(15, 'ESTADISTICA'),
(16, 'INVESTIGACION OPERATIVA'),
(17, 'MATEMATICA II'),
(18, 'LEGISLACION'),
(19, 'BASE DE DATOS I'),
(20, 'BASE DE DATOS II'),
(21, 'INGLES I'),
(22, 'INGLES II'),
(23, 'ORGANIZACION EMPRESARIAL'),
(24, 'ORGANIZACION CONTABLE DE LA EMPRESA'),
(25, 'METODOLOGIA DE LA INVESTIGACION');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`id`, `texto`, `pregunta_id`, `created_at`, `updated_at`) VALUES
(1, 'asdfa', 4, '2017-06-24 06:08:45', '2017-06-24 06:08:45'),
(2, 'asdfasdf', 4, '2017-06-24 06:08:45', '2017-06-24 06:08:45'),
(3, 'asdfasfd', 4, '2017-06-24 06:08:45', '2017-06-24 06:08:45'),
(4, 'asdf', 5, '2017-06-24 06:22:12', '2017-06-24 06:22:12'),
(5, 'asdf', 5, '2017-06-24 06:22:12', '2017-06-24 06:22:12'),
(6, 'asdf', 5, '2017-06-24 06:22:12', '2017-06-24 06:22:12'),
(7, '1', 6, '2017-06-26 05:46:47', '2017-06-26 05:46:47'),
(8, '2', 6, '2017-06-26 05:46:47', '2017-06-26 05:46:47'),
(9, '3', 6, '2017-06-26 05:46:47', '2017-06-26 05:46:47'),
(10, 'blanco', 7, '2017-06-26 05:49:37', '2017-06-26 05:49:37'),
(11, '8', 8, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(12, '9', 8, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(13, '33', 8, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(14, 'a', 9, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(15, 'b', 9, '2017-06-27 02:09:29', '2017-06-27 02:09:29'),
(16, 'e', 9, '2017-06-27 02:09:29', '2017-06-27 02:09:29'),
(17, '30', 10, '2017-06-27 02:09:29', '2017-06-27 02:09:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`id`, `tipo_id`, `texto`, `encuesta_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'asdfasdf', 14, '2017-06-24 05:21:07', '2017-06-24 05:21:07'),
(3, 1, 'adfasdf', 15, '2017-06-24 06:01:29', '2017-06-24 06:01:29'),
(4, 1, 'asdfsaf', 16, '2017-06-24 06:08:45', '2017-06-24 06:08:45'),
(5, 1, 'asdfasdf', 17, '2017-06-24 06:22:12', '2017-06-24 06:22:12'),
(6, 2, 'Cuanto es 1 + 1', 18, '2017-06-26 05:46:47', '2017-06-26 05:46:47'),
(7, 3, 'De que color es el caballo blanco de San Martin?', 19, '2017-06-26 05:49:37', '2017-06-26 05:49:37'),
(8, 1, 'multiplos de 3', 20, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(9, 2, 'segunda vocal del abecedario', 20, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(10, 3, '5+5*5', 20, '2017-06-27 02:09:29', '2017-06-27 02:09:29');

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

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`pregunta_id`, `opcion_id`, `created_at`, `updated_at`) VALUES
(5, 4, '2017-06-24 06:22:12', '2017-06-24 06:22:12'),
(6, 8, '2017-06-26 05:46:47', '2017-06-26 05:46:47'),
(8, 12, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(8, 13, '2017-06-27 02:09:28', '2017-06-27 02:09:28'),
(9, 16, '2017-06-27 02:09:29', '2017-06-27 02:09:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultados`
--

DROP TABLE IF EXISTS `resultados`;
CREATE TABLE IF NOT EXISTS `resultados` (
  `pregunta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resultado` tinyint(1) NOT NULL,
  KEY `fk_contestada_encuesta` (`pregunta_id`),
  KEY `fk_contestada_user` (`user_id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Alumno'),
(4, 'Administrativo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

DROP TABLE IF EXISTS `tipos`;
CREATE TABLE IF NOT EXISTS `tipos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `nombre`) VALUES
(1, 'Checks'),
(2, 'Radio'),
(3, 'Text');

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
  `activo` int(11) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_rol` (`rol_id`),
  KEY `fk_user_domicilio` (`domicilio_id`),
  KEY `idxActiveUsers` (`activo`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `documento`, `email`, `password`, `fnacimiento`, `rol_id`, `image`, `sexo`, `domicilio_id`, `activo`, `created_at`, `updated_at`) VALUES
(2, 'John', 'Doe', '11111111', 'john.doe@slim.com', '$2y$10$v6k4EwSTUPuBZXOmzTbgIOBOArY/H4PrR2jKy4s3K7sZWG3BQQqda', '1996-05-28', 1, NULL, 'm', 1, 1, '2017-05-29 16:08:51', '2017-05-29 16:08:51'),
(3, 'Personal', 'Administrativo', '15915915', 'administrativo@slim.com', '$2y$10$Mgosv.HuLq4V8OcwlrdXv.KZtdMt2fR7j80.FUiNZlWaRukmQHM2i', '1979-12-26', 4, NULL, 'f', 2, 1, '2017-06-29 01:53:15', '2017-06-29 01:53:15'),
(4, 'Admin', 'App', '15915978', 'admin@slim.com', '$2y$10$dzmztU1VqGgGKejB5Ysr0OPCsmmvGfpOcmsjxMc3Ptf4B/rDYW0r6', '1980-12-26', 1, NULL, 'f', 3, 1, '2017-06-29 01:53:52', '2017-06-29 01:53:52'),
(5, 'Primer', 'Profesor', '15915989', 'profesor1@slim.com', '$2y$10$z6Gf7sGG6/xTE5xfSTpibe24sodf.opMPkNG0RhyMRMom9hBQGKve', '1980-12-26', 2, NULL, 'm', 4, 1, '2017-06-29 01:54:22', '2017-06-29 01:54:22'),
(6, 'Segundo', 'Profesor', '15915996', 'profesor2@slim.com', '$2y$10$Q5v8BR4m2egnWMWvkVOfxeGz618TEWNyDZmNeBRoJhpkI5nlCwaV2', '1985-08-16', 2, NULL, 'm', 5, 1, '2017-06-29 01:54:57', '2017-06-29 01:54:57'),
(7, 'Primer', 'Alumno', '15915996', 'alumno1@slim.com', '$2y$10$fnb2qo3czu534xTW4S/au.YkvD6tlQrvCUStExSCjpd1217K90n0m', '1991-08-16', 3, NULL, 'm', 6, 1, '2017-06-29 01:55:34', '2017-06-29 01:55:34'),
(8, 'Segundo', 'Alumno', '15915996', 'alumno2@slim.com', '$2y$10$U9RPawCdY2Z6UEozMfvzm.the5er.l2J2fPHgMi15Vx5dzhE2Cl0q', '1991-04-13', 3, NULL, 'f', 7, 1, '2017-06-29 01:55:55', '2017-06-29 01:55:55'),
(9, 'Tercer', 'Alumno', '15915955', 'alumno3@slim.com', '$2y$10$NO065dL2B8TfHMC93fasQ.LlWhjMT8ra6ChiYe4Qo8.odZCJKqXay', '1994-04-13', 3, NULL, 'm', 8, 1, '2017-06-29 01:56:14', '2017-06-29 01:56:14'),
(10, 'Cuarto', 'Alumno', '15915933', 'alumno4@slim.com', '$2y$10$8320gcqEeHCcuLvDfBa.CuauA2S7E9nn0yWoG50NakJ2DrOYXmZjq', '1988-01-09', 3, NULL, 'm', 9, 1, '2017-06-29 01:56:40', '2017-06-30 23:37:10');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD CONSTRAINT `fk_curso_divisiones` FOREIGN KEY (`division_id`) REFERENCES `divisiones` (`id`),
  ADD CONSTRAINT `fk_curso_materias` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

--
-- Filtros para la tabla `cursos_encuestas`
--
ALTER TABLE `cursos_encuestas`
  ADD CONSTRAINT `fk_asignacion_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `fk_asignacion_encuesta` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`);

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `fk_encuenta_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `fk_inscripcion_curso` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`id`),
  ADD CONSTRAINT `fk_inscripcion_legajo` FOREIGN KEY (`legajo`) REFERENCES `legajos` (`legajo`);

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
-- Filtros para la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD CONSTRAINT `fk_contestada_encuesta` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `fk_contestada_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_domicilio` FOREIGN KEY (`domicilio_id`) REFERENCES `domicilios` (`id`),
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
