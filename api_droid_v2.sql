-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2017 a las 06:59:10
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

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

CREATE TABLE `cursos` (
  `id` int(10) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `division_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos_encuestas`
--

CREATE TABLE `cursos_encuestas` (
  `curso_id` int(11) NOT NULL,
  `encuesta_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisiones`
--

CREATE TABLE `divisiones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `codigo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` int(11) NOT NULL,
  `direccion` text,
  `latitud` float DEFAULT NULL,
  `longitud` float DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `direccion`, `latitud`, `longitud`, `created_at`, `updated_at`) VALUES
(1, 'Av. Medrano 925', -34.598, -58.4163, '2017-05-29 16:08:32', '2017-05-29 16:08:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `id` int(11) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `inscripciones` (
  `legajo` int(11) NOT NULL,
  `curso_id` int(10) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `legajos`
--

CREATE TABLE `legajos` (
  `legajo` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE `opciones` (
  `id` int(11) NOT NULL,
  `texto` text,
  `pregunta_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `preguntas` (
  `id` int(11) NOT NULL,
  `tipo_id` int(11) DEFAULT NULL,
  `texto` text,
  `encuesta_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `respuestas` (
  `pregunta_id` int(11) NOT NULL,
  `opcion_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
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

CREATE TABLE `resultados` (
  `encuesta_id` int(11) NOT NULL,
  `pregunta_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `resultado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `tipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
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
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `documento`, `email`, `password`, `fnacimiento`, `rol_id`, `image`, `sexo`, `domicilio_id`, `created_at`, `updated_at`) VALUES
(2, 'John', 'Doe', '11111111', 'john.doe@slim.com', '$2y$10$v6k4EwSTUPuBZXOmzTbgIOBOArY/H4PrR2jKy4s3K7sZWG3BQQqda', NULL, 1, NULL, 'm', 1, '2017-05-29 16:08:51', '2017-05-29 16:08:51');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia_id` (`materia_id`),
  ADD KEY `division_id` (`division_id`);

--
-- Indices de la tabla `cursos_encuestas`
--
ALTER TABLE `cursos_encuestas`
  ADD KEY `materia_division_id` (`curso_id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- Indices de la tabla `divisiones`
--
ALTER TABLE `divisiones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_encuenta_user` (`user_id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD KEY `curso_id` (`curso_id`),
  ADD KEY `legajo` (`legajo`);

--
-- Indices de la tabla `legajos`
--
ALTER TABLE `legajos`
  ADD PRIMARY KEY (`legajo`),
  ADD KEY `fk_legajos_user` (`user_id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `opciones`
--
ALTER TABLE `opciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_opciones_pregunta` (`pregunta_id`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_preguntas_tipos` (`tipo_id`),
  ADD KEY `fk_preguntas_encuesta` (`encuesta_id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD KEY `fk_respuesta_pregunta` (`pregunta_id`),
  ADD KEY `fk_respuesta_opcion` (`opcion_id`);

--
-- Indices de la tabla `resultados`
--
ALTER TABLE `resultados`
  ADD KEY `fk_contestada_encuesta` (`pregunta_id`),
  ADD KEY `fk_contestada_user` (`user_id`),
  ADD KEY `encuesta_id` (`encuesta_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_rol` (`rol_id`),
  ADD KEY `fk_user_domicilio` (`domicilio_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `divisiones`
--
ALTER TABLE `divisiones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `legajos`
--
ALTER TABLE `legajos`
  MODIFY `legajo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `opciones`
--
ALTER TABLE `opciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  ADD CONSTRAINT `fk_resultado_encuesta` FOREIGN KEY (`encuesta_id`) REFERENCES `encuestas` (`id`),
  ADD CONSTRAINT `fk_resultado_pregunta` FOREIGN KEY (`pregunta_id`) REFERENCES `preguntas` (`id`),
  ADD CONSTRAINT `fk_resultado_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_domicilio` FOREIGN KEY (`domicilio_id`) REFERENCES `domicilios` (`id`),
  ADD CONSTRAINT `fk_user_rol` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
