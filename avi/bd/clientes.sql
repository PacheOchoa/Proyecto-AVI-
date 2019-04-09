-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-04-2019 a las 04:28:23
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `avi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoPaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoMaterno` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `presupuesto` int(11) NOT NULL,
  `autoridad` int(11) NOT NULL,
  `necesidad` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  `id_medio` int(11) NOT NULL,
  `fecha` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `hora` time NOT NULL,
  `empresaActual` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(14) COLLATE utf8_spanish_ci NOT NULL,
  `colonia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `presupuesto_dinero` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `estadoCivil` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Comentarios` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `perfila` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `numeroCompras` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `intensionCompra` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `mascotas` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ClubSocial` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `deportes` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `centrosComerciales` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `parques` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `restaurantes` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `vidaNocturna` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `actividadesCulturales` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `ingresoFamiliar` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `actividadEconomica` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `EsContactCenter` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `telefono`, `correo`, `edad`, `presupuesto`, `autoridad`, `necesidad`, `tiempo`, `id_medio`, `fecha`, `hora`, `empresaActual`, `sexo`, `colonia`, `direccion`, `presupuesto_dinero`, `estadoCivil`, `Comentarios`, `perfila`, `numeroCompras`, `intensionCompra`, `mascotas`, `ClubSocial`, `deportes`, `centrosComerciales`, `parques`, `restaurantes`, `vidaNocturna`, `actividadesCulturales`, `ingresoFamiliar`, `actividadEconomica`, `EsContactCenter`, `id_usuario`) VALUES
(1, 'SERGIO', 'OCHOA', '', '', 'sergio.ochoazamora@gmail.com', '20 o menos', 0, 0, 0, 0, 4, '2019-04-27', '03:02:00', '', 'MASCULINO', '', 'SAN JOSE DE GRACIA 44', '', 'divorciado', '', 'SI', 'A', 'A', 'A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'A', 'A', 'si', 3),
(2, 'ROBERTOS', '', '', '', '', '20 o menos', 0, 0, 0, 0, 8, '', '00:00:00', '', 'MASCULINO', '', '', '', 'divorciado', '', 'SI', 'A', 'A', 'A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', 'A', 'si', 2),
(5, 'RRRR', '', '', '', '', '20 O MENOS', 0, 0, 0, 0, 4, '04/06/2019 11:03pm', '03:03:00', '', 'MASCULINO', '', '', '', 'DIVORCIADO', '', 'SI', '', '', '', 'no', 'no', 'no', 'no', 'no', 'no', 'no', '', '', 'si', 2),
(11, 'PPPPPPPPP', '', '', '', '', '20 O MENOS', 0, 0, 0, 0, 8, '04/07/2019 3:54am', '07:54:00', '', 'MASCULINO', '', 'SSSS', '', 'DIVORCIADO', '', 'SI', 'A', 'A', 'A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'A', 'A', 'si', 3),
(12, 'HHHHHH', '', '', '', '', '20 O MENOS', 0, 0, 0, 0, 8, '04/07/2019 3:55am', '07:55:00', '', 'MASCULINO', '', '', '', 'DIVORCIADO', '', 'SI', 'A', 'A', 'A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'A', 'A', 'si', 3),
(13, 'PPPPPP', '', '', '', '', '20 O MENOS', 0, 0, 0, 0, 7, '04/07/2019 4:13am', '08:13:00', '', 'MASCULINO', '', 'PROVIDENCIA 4A. SECCION, GUADA', '', 'DIVORCIADO', '', 'SI', 'A', 'A', 'A', 'no', 'no', 'no', 'no', 'no', 'no', 'no', 'A', 'A', 'si', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_medio` (`id_medio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_medio`) REFERENCES `medios` (`id`),
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
