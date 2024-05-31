-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2024 a las 19:09:38
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
-- Creación de usuario 'user' con privilegios 
--

CREATE USER 'user' IDENTIFIED BY 'password';
GRANT SELECT, INSERT, UPDATE ON *.* TO 'user';


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
(141, 'Q87654321', 'Gestión de redes'),
(142, 'Q87654321', 'prueba'),
(143, 'Q87654321', 'Pito doble'),
(144, 'Q87654321', 'Pito triple'),
(145, 'Q87654321', 'Prueba textos');

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
('miguel@varlud.com', '$2y$10$9RDnBgRMFB/19yHLmpsK1uf8BJJAph.uBn415PnOk9rrcXS2b4Tby'),
('prueba@gmail.com', '$2y$10$vXuoZGngXP9w5RTa3Iba8e0oQN6ATgJnMiYY9Z0zcaMvtIozOdO7a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_check`
--

CREATE TABLE `op_check` (
  `ID_op_chk` int(11) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `valor` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `op_check`
--

INSERT INTO `op_check` (`ID_op_chk`, `ID_pregunta`, `valor`) VALUES
(13, 347, 'Monitoreo de la salud de la red.'),
(14, 347, 'Gestión de configuraciones y cambios.'),
(15, 347, 'Seguridad en red y prevención de intrusiones.'),
(16, 347, 'Administración de ancho de banda y optimización del tráfico.'),
(17, 347, 'Gestión de dispositivos de red (routes, switches, FW, etc...)'),
(18, 347, 'Gestión de la conectividad inalámbrica (WI-FI)'),
(19, 351, 'Router.'),
(20, 351, 'Switch.'),
(21, 351, 'FireWall.'),
(22, 351, 'Puntos de acceso inalámbricos (AP)'),
(23, 351, 'Servidores de seguridad.'),
(24, 351, 'Dispositivos de almacenamiento en red (NAS)'),
(37, 379, 'Ketchup'),
(38, 379, 'Mostaza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_radio`
--

CREATE TABLE `op_radio` (
  `ID_op_rad` int(50) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `valor` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `op_radio`
--

INSERT INTO `op_radio` (`ID_op_rad`, `ID_pregunta`, `valor`) VALUES
(65, 348, 'Muy satisfecho'),
(66, 348, 'Satisfecho'),
(67, 348, 'Neutral'),
(68, 348, 'Insatisfecho'),
(69, 348, 'Muy insatisfecho'),
(70, 350, 'Acceso no autorizado a datos confidenciales.'),
(71, 350, 'Interrupción del servicio debido a ataques de denegación de servicio (DDoS).'),
(72, 350, 'Pérdida de datos debido a brechas de seguridad.'),
(73, 350, 'Malware y virus que afectan a la red.'),
(74, 350, 'Vulnerabilidades en la infraestructura de red.'),
(75, 354, 'Experiencia y reputación en el mercado.'),
(76, 354, 'Costo de los servicios'),
(77, 354, 'Nivel de soporte técnico ofrecido'),
(78, 354, 'Gama de servicios y funcionalidades disponibles.'),
(79, 354, 'Flexibilidad para adaptarse a las necesidades específicas de la empresa.'),
(95, 377, 'Si '),
(96, 377, 'No'),
(97, 380, 'SOY VEGANO'),
(98, 380, 'Nah flaco, dame un chuletón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `op_select`
--

CREATE TABLE `op_select` (
  `ID_op_sel` int(11) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `valor` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `op_select`
--

INSERT INTO `op_select` (`ID_op_sel`, `ID_pregunta`, `valor`) VALUES
(15, 346, 'Mejorar la seguridad de la red.'),
(16, 346, 'Optimizar el rendimiento de la red.'),
(17, 346, 'Reducir costos operativos.'),
(18, 346, 'Simplificar la administración de la red.'),
(19, 346, 'Implementar nuevas tecnologías de red.'),
(20, 352, 'Muy importante'),
(21, 352, 'Importante'),
(22, 352, 'Neutral'),
(23, 352, 'Poco imporante'),
(24, 352, 'Me la pela'),
(35, 382, 'Real'),
(36, 382, 'Madrid'),
(37, 382, 'CF');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `ID_pregunta` int(11) NOT NULL,
  `ID_encuesta` int(11) NOT NULL,
  `tipo` varchar(3) NOT NULL,
  `texto` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `preguntas`
--

INSERT INTO `preguntas` (`ID_pregunta`, `ID_encuesta`, `tipo`, `texto`) VALUES
(346, 141, 'sel', '¿Cuál es tu principal objetivo al buscar servicios de gestión de redes para tu empresa?'),
(347, 141, 'che', '¿Qué aspectos de la gestión de redes son más importantes para tú empresa?'),
(348, 141, 'rad', '¿Qué nivel de satisfacción tienes con tus servicios actuales de gestión de redes?'),
(349, 141, 'tex', '¿Qué funcionalidades específicas te gustaría ver en una solución de gestión de redes que aún no estés utilizando?'),
(350, 141, 'rad', '¿Cuál es tu principal preocupación en cuanto a la seguridad de red de tu empresa se refiere?'),
(351, 141, 'che', '¿Qué tipos de dispositivos de red utilizas en tu infraestructura?'),
(352, 141, 'sel', '¿Qué nivel de importancia le das a la monitorización en tiempo real de la red de tu empresa?'),
(353, 141, 'tex', '¿Cuáles son los principales desafíos que enfrentas actualmente en la gestión de redes de tu empresa?'),
(354, 141, 'rad', '¿Cuál es el principal criterio que consideras al seleccionar un proveedor de servicios de gestión de red?'),
(355, 141, 'tex', '¿Qué mejoras o actualizaciones te gustaria ver en los servicios de gestión de redes que actualmente utilices?'),
(376, 142, 'tex', 'Prueba 1'),
(377, 142, 'rad', 'Prueba 2'),
(378, 143, 'tex', 'Salchipapa'),
(379, 143, 'che', 'Perrito'),
(380, 143, 'rad', 'SOS VEGANO?'),
(381, 143, 'tex', 'Chorrada'),
(382, 143, 'sel', 'De que equipo sos?'),
(385, 144, 'tex', 'Fedelobo'),
(386, 144, 'tex', 'Hola chata como estás'),
(387, 145, 'tex', 'Prueba texto 1'),
(388, 145, 'tex', 'Prueba texto 2'),
(389, 145, 'tex', 'Prueba texto 1'),
(390, 145, 'tex', 'Prueba texto 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `ID_respuesta` int(11) NOT NULL,
  `ID_pregunta` int(11) NOT NULL,
  `ID_encuesta` int(11) NOT NULL,
  `DNI` varchar(9) NOT NULL,
  `respuesta` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`ID_respuesta`, `ID_pregunta`, `ID_encuesta`, `DNI`, `respuesta`) VALUES
(44, 346, 141, '12345678Q', 'Optimizar el rendimiento de la red.'),
(45, 347, 141, '12345678Q', 'Administración de ancho de banda y optimización del tráfico.'),
(46, 348, 141, '12345678Q', 'Muy satisfecho'),
(47, 349, 141, '12345678Q', 'Pito'),
(48, 350, 141, '12345678Q', 'Interrupción del servicio debido a ataques de denegación de servicio (DDoS).'),
(49, 351, 141, '12345678Q', 'Dispositivos de almacenamiento en red (NAS)'),
(50, 352, 141, '12345678Q', 'Me la pela'),
(51, 353, 141, '12345678Q', 'pito doble'),
(52, 354, 141, '12345678Q', 'Costo de los servicios'),
(53, 355, 141, '12345678Q', 'Pito triple'),
(54, 376, 142, '12345678Q', 'Pito'),
(55, 377, 142, '12345678Q', 'Si '),
(56, 387, 145, '12345678Q', 'Pito'),
(57, 388, 145, '12345678Q', 'Pito doble'),
(58, 389, 145, '12345678Q', 'Pito triple'),
(59, 390, 145, '12345678Q', 'Pito meteórico'),
(60, 376, 142, '12345678Q', 'Pito'),
(61, 377, 142, '12345678Q', 'No');

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
('Miguel Ángel', 'Ludeña', '2000-06-15', 'miguel@varlud.com', '12345678F', 'Q87654321', 1),
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
  ADD KEY `ID_pregunta` (`ID_pregunta`) USING BTREE;

--
-- Indices de la tabla `op_radio`
--
ALTER TABLE `op_radio`
  ADD PRIMARY KEY (`ID_op_rad`),
  ADD KEY `ID_pregunta` (`ID_pregunta`) USING BTREE;

--
-- Indices de la tabla `op_select`
--
ALTER TABLE `op_select`
  ADD PRIMARY KEY (`ID_op_sel`),
  ADD KEY `ID_pregunta` (`ID_pregunta`) USING BTREE;

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`ID_pregunta`) USING BTREE,
  ADD KEY `ID_encuesta` (`ID_encuesta`) USING BTREE;

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`ID_respuesta`),
  ADD KEY `ID_pregunta` (`ID_pregunta`) USING BTREE,
  ADD KEY `DNI` (`DNI`) USING BTREE,
  ADD KEY `ID_encuesta` (`ID_encuesta`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`DNI`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD KEY `CIF` (`CIF`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `ID_encuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT de la tabla `op_check`
--
ALTER TABLE `op_check`
  MODIFY `ID_op_chk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `op_radio`
--
ALTER TABLE `op_radio`
  MODIFY `ID_op_rad` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT de la tabla `op_select`
--
ALTER TABLE `op_select`
  MODIFY `ID_op_sel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `ID_pregunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=391;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `ID_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

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
