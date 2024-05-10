-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-05-2024 a las 22:36:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `varlud`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `CIF` varchar(9) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresas`
--

INSERT INTO `empresas` (`CIF`, `nombre`) VALUES
('Q87654321', 'VarLud');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `ID_encuesta` int(11) NOT NULL,
  `CIF` varchar(9) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `encuestas`
--

INSERT INTO `encuestas` (`ID_encuesta`, `CIF`, `nombre`) VALUES
(26, 'Q87654321', 'pito'),
(27, 'Q87654321', 'Pitoniso'),
(28, 'Q87654321', 'Pitoniso'),
(29, 'Q87654321', 'Pitoniso'),
(30, 'Q87654321', 'Salchipapa'),
(31, 'Q87654321', 'Salchipapa'),
(32, 'Q87654321', 'Salchipapa'),
(33, 'Q87654321', 'Salchipapa'),
(34, 'Q87654321', 'Salchipaposo'),
(35, 'Q87654321', 'Best of you'),
(36, 'Q87654321', 'Pour oublier'),
(37, 'Q87654321', 'Francisco'),
(38, 'Q87654321', 'Francisco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `correo` varchar(50) NOT NULL,
  `contraseña` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`correo`, `contraseña`) VALUES
('pito@gmail.com', '$2y$10$aXXup/L0vU0Kc.PRTyMxvu8A8yEL0oZoCmd2rNljIDwmAXVrj1.YK'),
('prueba@gmail.com', '$2y$10$vXuoZGngXP9w5RTa3Iba8e0oQN6ATgJnMiYY9Z0zcaMvtIozOdO7a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_check`
--

CREATE TABLE `op_check` (
  `ID_op_chk` varchar(50) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_radio`
--

CREATE TABLE `op_radio` (
  `ID_op_rad` varchar(50) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_select`
--

CREATE TABLE `op_select` (
  `ID_op_sel` varchar(50) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `ID_pregunta` int(11) NOT NULL,
  `ID_encuesta` int(11) NOT NULL,
  `tipo` varchar(3) NOT NULL DEFAULT 'txt',
  `texto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`ID_pregunta`, `ID_encuesta`, `tipo`, `texto`) VALUES
(3, 34, 'rad', '¿Tetas o culo?'),
(5, 35, 'rad', '¿Tetas o culo?'),
(8, 36, 'rad', '¿Tetas o culo?'),
(16, 37, 'rad', 'Que te diga una pregunta?'),
(17, 38, 'rad', 'aaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `ID_respuesta` varchar(500) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `ID_encuesta` int(11) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `respuesta` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `fecha_nac` date NOT NULL,
  `correo` varchar(50) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `CIF` varchar(9) NOT NULL,
  `admin` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nombre`, `apellidos`, `fecha_nac`, `correo`, `DNI`, `CIF`, `admin`) VALUES
('Francisco', 'Vargas', '2024-04-01', 'prueba@gmail.com', '12345678Q', 'Q87654321', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`CIF`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`ID_encuesta`),
  ADD KEY `CIF` (`CIF`) USING BTREE;

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `op_check`
--
ALTER TABLE `op_check`
  ADD PRIMARY KEY (`ID_op_chk`),
  ADD UNIQUE KEY `ID_pregunta` (`ID_pregunta`);

--
-- Indices de la tabla `op_radio`
--
ALTER TABLE `op_radio`
  ADD PRIMARY KEY (`ID_op_rad`),
  ADD UNIQUE KEY `ID_pregunta` (`ID_pregunta`);

--
-- Indices de la tabla `op_select`
--
ALTER TABLE `op_select`
  ADD PRIMARY KEY (`ID_op_sel`),
  ADD UNIQUE KEY `ID_pregunta` (`ID_pregunta`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID_pregunta`),
  ADD UNIQUE KEY `ID_encuesta` (`ID_encuesta`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`ID_respuesta`),
  ADD UNIQUE KEY `ID_pregunta` (`ID_pregunta`),
  ADD UNIQUE KEY `DNI` (`DNI`),
  ADD UNIQUE KEY `ID_encuesta` (`ID_encuesta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `CIF` (`CIF`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `ID_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `ID_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD CONSTRAINT `encuestas_ibfk_1` FOREIGN KEY (`CIF`) REFERENCES `empresas` (`CIF`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `op_check`
--
ALTER TABLE `op_check`
  ADD CONSTRAINT `op_check_ibfk_1` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `op_radio`
--
ALTER TABLE `op_radio`
  ADD CONSTRAINT `op_radio_ibfk_1` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `op_select`
--
ALTER TABLE `op_select`
  ADD CONSTRAINT `op_select_ibfk_1` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD CONSTRAINT `preguntas_ibfk_1` FOREIGN KEY (`ID_encuesta`) REFERENCES `encuestas` (`ID_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`DNI`) REFERENCES `usuarios` (`DNI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`ID_encuesta`) REFERENCES `encuestas` (`ID_encuesta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respuestas_ibfk_3` FOREIGN KEY (`ID_pregunta`) REFERENCES `preguntas` (`ID_pregunta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`correo`) REFERENCES `login` (`correo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`CIF`) REFERENCES `empresas` (`CIF`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
