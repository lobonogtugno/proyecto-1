-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2022 a las 02:03:20
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teejutji`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `id` int(11) NOT NULL,
  `nivel_acceso` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id`, `nivel_acceso`) VALUES
(1, 'administrador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre_categoria` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`) VALUES
(1, 'MEZCAL'),
(2, 'COMPUESTOS'),
(3, 'ARTESANIAS'),
(4, 'BlUSAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadoventas`
--

CREATE TABLE `estadoventas` (
  `id` int(11) NOT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estadoventas`
--

INSERT INTO `estadoventas` (`id`, `estado`) VALUES
(1, 'pendiente'),
(2, 'entregado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario` int(11) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  `ciudad` varchar(50) DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario`, `direccion`, `ciudad`, `telefono`, `estado`, `nombre`) VALUES
(1, 40, 'estado bien', 'Huajuapan', 9531174288, 1, 'uno'),
(2, 40, 'tlaxiaco', 'Huajuapan', 9531174288, 1, 'uno'),
(3, 41, 'njknjk', 'Tlaxiaco', 59289289298, 1, 'uhyuhih'),
(4, 41, 'lomazata', 'Tlaxiaco', 12312414, 1, 'uhyuhih');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `imagen` varchar(50) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL,
  `descuento` int(11) DEFAULT NULL,
  `imagen1` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `cantidad`, `imagen`, `categoria`, `descuento`, `imagen1`) VALUES
(1, 'compuesto de piña', 'botella de vidrio  de 750ml', 160, 45, 'images/lol/17.jpg', 2, 1, NULL),
(2, 'compuesto artesanal', 'botella de vidrio de 1L', 220, 50, 'images/lol/2.jpg', 2, 1, NULL),
(3, 'mezcal minero', 'botella de vidrio de 750ml', 380, 50, 'images/lol/3.jpg', 1, 10, NULL),
(4, 'santo tomas ocotepec', ' ', 1600, 50, 'images/lol/4.jpg', 4, 9, NULL),
(5, 'San Pablo Tijaltepec', NULL, 2000, 63, 'images/lol/5.jpg', 4, 6, NULL),
(6, 'San pablo tijaltepec', NULL, 2000, 5, 'images/lol/6.jpg', 4, 5, NULL),
(7, 'curado artesanal', 'sabor fruto rojo botella de plastico', 160, 50, 'images/lol/7.jpg', 2, 1, NULL),
(8, 'curado artesanal', 'sabor maracuya botella de plastico', 160, 50, 'images/lol/8.jpg', 2, 10, NULL),
(10, 'artesanal de pechuga', NULL, 550, 50, 'images/lol/10.jpg', 1, 6, NULL),
(12, 'mezcal tepextate ', NULL, 280, 50, 'images/lol/12.jpg', 1, 10, NULL),
(13, 'niño', 'artesania de barro negro', 160, 10, 'images/lol/13.jpg', 3, 10, NULL),
(14, 'niña', 'artesania de barro negro', 160, 10, 'images/lol/14.jpg', 3, 10, NULL),
(15, 'mezcal pechuga', 'barro negro 500ml', 110, 10, 'images/lol/15.jpg', 1, 12, NULL),
(16, 'mezcal pechuga 1/4', '500ml', 70, 14, 'images/lol/16.jpg', 1, 13, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `acceso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `edad`, `correo`, `usuario`, `pass`, `acceso`) VALUES
(2, 'adrian', 20, 'adri@gmail.com', 'adri', 'adrian', 1),
(39, 'chaday', 20, 'chaday.1497@gmail.com', 'admin', 'admin', 2),
(40, 'uno', 12, 'sf@h.co', 'uno', 'uno', 2),
(41, 'uhyuhih', 18, 'knj@ygbuh.com', 'root', 'root', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estadoventas`
--
ALTER TABLE `estadoventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `estado` (`estado`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria` (`categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pass` (`pass`),
  ADD KEY `acceso` (`acceso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`estado`) REFERENCES `estadoventas` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`acceso`) REFERENCES `acceso` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
