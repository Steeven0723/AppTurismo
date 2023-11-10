-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2023 a las 22:56:20
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `guiaturistico`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aliados`
--

CREATE TABLE `aliados` (
  `id` int(11) NOT NULL,
  `documento` varchar(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `comercio` varchar(50) NOT NULL,
  `correo` text NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `estado` tinyint(1) DEFAULT 0,
  `latitud` text DEFAULT NULL,
  `longitud` text DEFAULT NULL,
  `plan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `aliados`
--

INSERT INTO `aliados` (`id`, `documento`, `nombre`, `telefono`, `comercio`, `correo`, `tipo_id`, `estado`, `latitud`, `longitud`, `plan_id`) VALUES
(1, '13241', 'edwdw', '235', 'Steeven0', 'steeve@gmail.com', 1, 1, '35', '233', 2),
(2, '23424234', 'dfsefd', '342232', 'sdfsdf', 'fsfsd', 2, 1, '', '34342', 2),
(3, '100324', 'dsaascas', 'acdascsa', 'ascdasdc', 'sdacasc', 2, 1, '', '', 2),
(6, '10032453', 'Steeven', '3212313', 'JW', 'JW@gmail.com', 3, 0, NULL, NULL, 2),
(7, '322424', 'jaun', '4232424', 'TR', 'TR', 1, 0, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aliado_plan`
--

CREATE TABLE `aliado_plan` (
  `id` int(11) NOT NULL,
  `aliado_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `estado` double NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `planes`
--

CREATE TABLE `planes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `descripcion` text NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `nota` text NOT NULL,
  `aliado_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `nombre`) VALUES
(1, 'Comida'),
(4, 'Droguería'),
(3, 'Hoteles'),
(2, 'Turismo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` text NOT NULL,
  `clave` text NOT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `clave`, `tipo`) VALUES
(1, 'steeven0723', '123456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aliados`
--
ALTER TABLE `aliados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_id` (`plan_id`),
  ADD KEY `tipo_id` (`tipo_id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `aliado_plan`
--
ALTER TABLE `aliado_plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aliado_id` (`aliado_id`),
  ADD KEY `plan_id` (`plan_id`);

--
-- Indices de la tabla `planes`
--
ALTER TABLE `planes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `aliado_id` (`aliado_id`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aliados`
--
ALTER TABLE `aliados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `aliado_plan`
--
ALTER TABLE `aliado_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `planes`
--
ALTER TABLE `planes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `aliados`
--
ALTER TABLE `aliados`
  ADD CONSTRAINT `aliados_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `aliado_plan`
--
ALTER TABLE `aliado_plan`
  ADD CONSTRAINT `aliado_plan_ibfk_1` FOREIGN KEY (`aliado_id`) REFERENCES `aliados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `aliado_plan_ibfk_2` FOREIGN KEY (`plan_id`) REFERENCES `planes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `planes`
--
ALTER TABLE `planes`
  ADD CONSTRAINT `planes_ibfk_1` FOREIGN KEY (`id`) REFERENCES `aliados` (`plan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`aliado_id`) REFERENCES `aliados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
