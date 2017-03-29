-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2015 a las 20:23:44
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `control`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionarios`
--

CREATE TABLE IF NOT EXISTS `funcionarios` (
  `cedula` int(12) ,
  `nombre` varchar(30) ,
  `apellido` varchar(30) ,
  `direccion` varchar(30) ,
  `telefono` int(10) DEFAULT NULL,
  `email` varchar(30) 
) 

--
-- Volcado de datos para la tabla `funcionarios`
--

INSERT INTO `funcionarios` (`cedula`, `nombre`, `apellido`, `direccion`, `telefono`, `email`) VALUES
(1, 'dfser', 'jghfhvvbcbvgv', 'nnaaaa', 38998768, '5@'),
(2, 'MVNHF', 'NBNC', 'CBF', 654564, 'KJHJJK'),
(22, 'amnngh', 'a', 'a', 2, 'aaaaaaa'),
(34, 'rsdfgdg', 'zxcasdf', ' <d', 34, '4'),
(321, 'andresSSSS', 'rodriguez', 'Pasto00', 2147483647, 'carlos@hotmail.com'),
(546, 'manuel', 'muï¿½oz', 'florida', 316, 'manuel@gmail.com'),
(566, 'Dolores', 'Cruz', 'Miraflores', 3214, 'dololes@hotmail.com'),
(1235, 'e', 'e', 'e', 4, 'RR'),
(12345, 'pedro', 'rosero', 'pasto', 3155, 'pedro@gmail.com'),
(567778, 'yasmin', 'perez', 'pasto', 87767, 'yuly@'),
(876875, ' nbv ', 'nvn', 'bv', 654, 'hffr'),
(1131456, 'carlos', 'muÃ±oz', 'pasto', 5678, 'mjsmfhsdj@mhxcj'),
(1115910913, 'Albeiro', 'Catimay', 'NariÃ±o', 2147483647, 'mnbxhgsdjh');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
`codigo` int(15) ,
  `cedula` int(13) ,
  `fecha` date ,
  `hora` time(6) ,
  `jornada` int(1) ,
  `ingreso` char(1) 
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`codigo`, `cedula`, `fecha`, `hora`, `jornada`, `ingreso`) VALUES
(4, 12, '2015-09-12', '23:59:00.000000', 1, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(12) NOT NULL,
  `nombre` varchar(30) ,
  `password` varchar(45) ,
  `tipo` int(1) NOT NULL
) 

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `tipo`) VALUES
(123, 'Silvana Gòmez', '202cb962ac59075b964b07152d234b70', 2),
(456, 'Luis Delgado', '202cb962ac59075b964b07152d234b70', 1),
(1234, 'silvana', '81dc9bdb52d04dc20036dbd8313ed055', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `funcionarios`
--
ALTER TABLE `funcionarios`
 ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
 ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
MODIFY `codigo` int(15) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
