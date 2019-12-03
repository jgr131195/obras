-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2019 a las 23:42:02
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
-- Base de datos: `obras`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `obra_id` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `Material_ID` int(5) NOT NULL,
  `Material_Nombre` varchar(80) NOT NULL,
  `Material_Precio` float(6,2) DEFAULT NULL,
  `Material_Peso` float(10,2) NOT NULL,
  `Material_Dimensiones_alto` float(10,2) DEFAULT NULL,
  `Material_Dimensiones_ancho` float(10,2) DEFAULT NULL,
  `Material_Dimensiones_profundo` float(10,2) DEFAULT NULL,
  `Material_Proveedor_ID` int(5) DEFAULT NULL,
  `Material_Foto` varchar(100) DEFAULT NULL,
  `Material_Descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_obra`
--

CREATE TABLE `materiales_obra` (
  `materiales_id` int(15) NOT NULL,
  `obras_id` int(15) NOT NULL,
  `usuario_id` int(15) NOT NULL,
  `cantidad` int(15) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `obras`
--

CREATE TABLE `obras` (
  `Obra_id` int(15) NOT NULL,
  `Obra_nombre` varchar(64) NOT NULL,
  `Obra_direccion` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Obra_jefe` int(15) NOT NULL,
  `Obra_latitud` float(13,10) NOT NULL,
  `Obra_longitud` float(13,10) NOT NULL,
  `Obra_cliente` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `obras`
--

INSERT INTO `obras` (`Obra_id`, `Obra_nombre`, `Obra_direccion`, `Obra_jefe`, `Obra_latitud`, `Obra_longitud`, `Obra_cliente`) VALUES
(1, 'Murazo', 'C/ Murito solitario abandonado', 2, 13.0000000000, 13.0000000000, 6),
(3, 'Reforma sorpresa', 'C/ Rivera del duero 14', 4, 80.0000000000, 55.0000000000, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Proveedor_ID` int(5) NOT NULL,
  `Proveedor_Nombre` varchar(45) NOT NULL,
  `Proveedor_Direccion` varchar(100) DEFAULT NULL,
  `Proveedor_CIF` varchar(10) NOT NULL,
  `Proveedor_Persona_Contacto` varchar(100) NOT NULL,
  `Proveedor_Telefono` int(9) NOT NULL,
  `Proveedor_URL` varchar(100) DEFAULT NULL,
  `Proveedor_Email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores_obra`
--

CREATE TABLE `trabajadores_obra` (
  `obra_id` int(15) NOT NULL,
  `usuario_id` int(15) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `Usuario_id` int(15) NOT NULL,
  `Usuario_nombre` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_apellido1` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_apellido2` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_nick` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_clave` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_fecha_alta` date NOT NULL,
  `Usuario_email` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Usuario_bloqueado` tinyint(1) NOT NULL,
  `Usuario_fecha_bloqueo` date DEFAULT NULL,
  `Usuario_numero_intentos` int(1) NOT NULL,
  `Usuario_fecha_ultima_conexion` date DEFAULT NULL,
  `Usuario_token_aleatorio` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `Usuario_domicilio` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `Usuario_poblacion` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `Usuario_provincia` varchar(45) CHARACTER SET utf8 DEFAULT NULL,
  `Usuario_perfil` varchar(45) DEFAULT NULL,
  `Usuario_nif` varchar(10) CHARACTER SET utf8 DEFAULT NULL,
  `Usuario_numero_telefono` int(12) DEFAULT NULL,
  `Usuario_fotografia` varchar(255) DEFAULT NULL,
  `Usuario_fecha_contratacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`Usuario_id`, `Usuario_nombre`, `Usuario_apellido1`, `Usuario_apellido2`, `Usuario_nick`, `Usuario_clave`, `Usuario_fecha_alta`, `Usuario_email`, `Usuario_bloqueado`, `Usuario_fecha_bloqueo`, `Usuario_numero_intentos`, `Usuario_fecha_ultima_conexion`, `Usuario_token_aleatorio`, `Usuario_domicilio`, `Usuario_poblacion`, `Usuario_provincia`, `Usuario_perfil`, `Usuario_nif`, `Usuario_numero_telefono`, `Usuario_fotografia`, `Usuario_fecha_contratacion`) VALUES
(1, 'Juan', 'gandullo', 'ramirez', 'diosito', '$2y$10$elezNUd8MlwzRraGwM90De97s/fwdK0sREiJYibCu91k73qE7rP.C', '2019-11-27', 'masterpicoteo@gmail.com', 0, NULL, 0, NULL, NULL, 'C/ Pizarro', 'Lebrija', 'Sevilla', 'admin', '12345678P', 654321987, NULL, NULL),
(2, 'Pedro', '', '', 'Pedro', '$2y$10$fRY338d5Hv3r.8gVoS5.iuuFreltl12WLIKlS24Mlb3SDmYxuGjD.', '0000-00-00', 'pedrito@gmail.com', 0, NULL, 0, NULL, NULL, '', '', '', 'trabajador', '', 0, NULL, NULL),
(3, 'Alejandro', '', '', 'Buque', '$2y$10$wkUbyiSCRqU/CG3NRsOl/uJ9TG/B0KbBzPVtTgILkwEYT0fs2LUUS', '0000-00-00', 'picoteaPicotea@gmail.com', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'trabajador', NULL, NULL, NULL, NULL),
(4, 'Gines Miguel', '', '', 'Ginele', '$2y$10$niD5Y7WnzZQRkdWUY5uGJOqTx5HZFZlONkiqgGmRLghBiqPDOPsxu', '0000-00-00', 'erChacho@gmail.com', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'trabajador', NULL, NULL, NULL, NULL),
(5, 'Jose Antonio', '', '', 'Tate', '$2y$10$D3l/O6LPdbMtfia58jzsseoZJlRUNDy6Qdd5WbMC2AM2B4KA28rh2', '0000-00-00', 'elTate@gmail.com', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL, NULL),
(6, 'Cristina', '', '', 'CrisPick', '$2y$10$zS1E3wa5bBhC6xb69oSzZOKGooD0IOjljwmbmBjjK4csRWqjSK8Au', '0000-00-00', 'noMeVes@gmail.com', 0, NULL, 0, NULL, NULL, NULL, NULL, NULL, 'cliente', NULL, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD KEY `obra_id` (`obra_id`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`Material_ID`),
  ADD KEY `Material_Proveedor_ID` (`Material_Proveedor_ID`);

--
-- Indices de la tabla `materiales_obra`
--
ALTER TABLE `materiales_obra`
  ADD KEY `materiales_id` (`materiales_id`),
  ADD KEY `obras_id` (`obras_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `obras`
--
ALTER TABLE `obras`
  ADD PRIMARY KEY (`Obra_id`),
  ADD KEY `Obra_jefe` (`Obra_jefe`),
  ADD KEY `Obra_cliente` (`Obra_cliente`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Proveedor_ID`);

--
-- Indices de la tabla `trabajadores_obra`
--
ALTER TABLE `trabajadores_obra`
  ADD KEY `obra_id` (`obra_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`Usuario_id`),
  ADD UNIQUE KEY `Usuario_email` (`Usuario_email`),
  ADD UNIQUE KEY `Usuario_nick` (`Usuario_nick`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `obras`
--
ALTER TABLE `obras`
  MODIFY `Obra_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `Usuario_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD CONSTRAINT `fotos_ibfk_1` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`Obra_id`);

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`Material_Proveedor_ID`) REFERENCES `proveedores` (`Proveedor_ID`);

--
-- Filtros para la tabla `materiales_obra`
--
ALTER TABLE `materiales_obra`
  ADD CONSTRAINT `materiales_obra_ibfk_1` FOREIGN KEY (`materiales_id`) REFERENCES `materiales` (`Material_ID`),
  ADD CONSTRAINT `materiales_obra_ibfk_2` FOREIGN KEY (`obras_id`) REFERENCES `obras` (`Obra_id`),
  ADD CONSTRAINT `materiales_obra_ibfk_3` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`Usuario_id`);

--
-- Filtros para la tabla `obras`
--
ALTER TABLE `obras`
  ADD CONSTRAINT `obras_ibfk_1` FOREIGN KEY (`Obra_jefe`) REFERENCES `usuarios` (`Usuario_id`),
  ADD CONSTRAINT `obras_ibfk_2` FOREIGN KEY (`Obra_cliente`) REFERENCES `usuarios` (`Usuario_id`);

--
-- Filtros para la tabla `trabajadores_obra`
--
ALTER TABLE `trabajadores_obra`
  ADD CONSTRAINT `trabajadores_obra_ibfk_1` FOREIGN KEY (`obra_id`) REFERENCES `obras` (`Obra_id`),
  ADD CONSTRAINT `trabajadores_obra_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`Usuario_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
