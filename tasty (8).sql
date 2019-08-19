-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-08-2019 a las 01:16:04
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tasty`
--
CREATE DATABASE IF NOT EXISTS `tasty` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `tasty`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingredientes`
--

CREATE TABLE `ingredientes` (
  `cod_ingrediente` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` smallint(4) NOT NULL,
  `categoria` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ingredientes`
--

INSERT INTO `ingredientes` (`cod_ingrediente`, `nombre`, `precio`, `categoria`, `deleted_at`) VALUES
(1, 'Salame', 501, 'C', NULL),
(2, 'Carne', 500, 'C', NULL),
(3, 'Tocino', 500, 'C', NULL),
(4, 'Pollo Furay', 500, 'C', NULL),
(5, 'Pollo Normal', 500, 'C', NULL),
(6, 'Salchicha', 500, 'C', NULL),
(7, 'Chorizo', 500, 'C', NULL),
(8, 'Extra Queso', 500, 'O', NULL),
(9, 'Aceituna', 500, 'V', NULL),
(10, 'Champiñon', 500, 'V', NULL),
(11, 'Tomate', 500, 'V', NULL),
(12, 'Pimentón', 500, 'V', NULL),
(13, 'Piña', 500, 'O', NULL),
(14, 'Palmito', 500, 'V', NULL),
(15, 'Choclo', 500, 'V', NULL),
(16, 'Jamón', 500, 'C', NULL),
(17, 'Cebolla Morada', 500, 'V', NULL),
(18, 'Camarón', 800, 'C', NULL),
(19, 'Longaniza', 500, 'C', NULL),
(20, 'Zanahoria', 500, 'V', '2019-08-06 22:25:18'),
(21, 'Naranja', 0, 'V', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_pedido` int(6) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `estado_pedido` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `total_pedido` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_pedido`, `id_usuario`, `estado_pedido`, `descripcion`, `total_pedido`, `fecha`, `telefono`, `direccion`, `nombre_completo`) VALUES
(3, 4, 'P', 'ai dice gratis', 17600, '2019-08-18 05:44:11', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(4, 4, 'P', NULL, 4800, '2019-08-18 05:44:50', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(5, 5, 'P', 'hahduwa', 4800, '2019-08-18 05:46:23', '9918048018', 'Av. Costa de montemar', 'Luis Muñoz'),
(6, 4, 'P', NULL, 4800, '2019-08-18 05:47:59', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas`
--

CREATE TABLE `pizzas` (
  `cod_pizza` int(11) NOT NULL,
  `tamaño` char(2) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pizzas`
--

INSERT INTO `pizzas` (`cod_pizza`, `tamaño`, `precio`) VALUES
(1, 'Fa', 7900),
(2, 'Fa', 8000),
(3, 'Fa', 8000),
(4, 'Me', 6500),
(5, 'Me', 6500),
(6, 'Fa', 8000),
(7, 'Fa', 8000),
(8, 'Me', 6500),
(9, 'Fa', 8000),
(10, 'Fa', 8000),
(11, 'Fa', 8000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas_ingredientes`
--

CREATE TABLE `pizzas_ingredientes` (
  `cod_pi` int(11) NOT NULL,
  `cod_pizza` int(11) NOT NULL,
  `cod_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pizzas_ingredientes`
--

INSERT INTO `pizzas_ingredientes` (`cod_pi`, `cod_pizza`, `cod_ingrediente`) VALUES
(25, 9, 2),
(26, 9, 3),
(27, 9, 4),
(28, 9, 10),
(29, 9, 8),
(30, 10, 10),
(31, 10, 11),
(32, 10, 12),
(33, 10, 14),
(34, 11, 1),
(35, 11, 9),
(36, 11, 10),
(37, 11, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza_pedido`
--

CREATE TABLE `pizza_pedido` (
  `id_pizza` int(11) NOT NULL,
  `cod_pizza` int(11) NOT NULL,
  `cod_pedido` int(6) NOT NULL,
  `cantidad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pizza_pedido`
--

INSERT INTO `pizza_pedido` (`id_pizza`, `cod_pizza`, `cod_pedido`, `cantidad`) VALUES
(4, 11, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza_tamaños`
--

CREATE TABLE `pizza_tamaños` (
  `cod_tamaño` tinyint(4) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` smallint(5) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pizza_tamaños`
--

INSERT INTO `pizza_tamaños` (`cod_tamaño`, `nombre`, `precio`, `imagen`, `deleted_at`) VALUES
(2, 'Mediana', 6500, 'http://localhost:8000/image/YfuIQzJxuK85QNceB0tInBymBO3828ko3mVoYTUN.jpeg', NULL),
(3, 'Familiar', 8000, 'http://localhost:8000/image/2jO3kqrSsPDvvPJZNwrwBgQAonIO4P29htY7Oi2Q.jpeg', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sushis`
--

CREATE TABLE `sushis` (
  `cod_sushi` int(11) NOT NULL,
  `envoltura` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cortes` int(3) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sushis`
--

INSERT INTO `sushis` (`cod_sushi`, `envoltura`, `descripcion`, `cortes`, `imagen`) VALUES
(1, 'Sesamo', 'Relleno de Kanikama, queso, palta', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(2, 'Panko (Frito) ', 'Relleno de Pollo, queso, cebollin', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(3, 'Ciboulette', 'Relleno de Salmon, Queso, Palta', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(4, 'Panko', 'Relleno de Camaron, Queso, Ciboulete', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(5, 'Queso', 'Relleno de Camaron, Palta, Palmito', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(6, 'Palta', 'Relleno de Pollo, Queso, Cibulette', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(7, 'Panko', 'Relleno de  Kanikama, Queso, Palta', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(8, 'kakadwqdqwd', 'dqwdq', 11, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_pedido`
--

CREATE TABLE `tabla_pedido` (
  `id_tabla` int(11) NOT NULL,
  `cod_pedido` int(6) NOT NULL,
  `cod_tabla` int(11) NOT NULL,
  `cantidad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tabla_pedido`
--

INSERT INTO `tabla_pedido` (`id_tabla`, `cod_pedido`, `cod_tabla`, `cantidad`) VALUES
(9, 3, 1, 2),
(10, 4, 1, 1),
(11, 5, 1, 1),
(12, 6, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_sushis`
--

CREATE TABLE `tabla_sushis` (
  `cod_tabla` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(5) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tabla_sushis`
--

INSERT INTO `tabla_sushis` (`cod_tabla`, `nombre`, `precio`, `imagen`) VALUES
(1, 'Tabla 24 Piezas', 4800, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(2, 'Tabla 36 Piezas', 7300, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(3, 'Tabla 50 Piezas', 9300, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(4, 'Tabla 60 Piezas', 12400, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(5, 'Tabla 70 Piezas', 14900, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg'),
(8, 'Tabla 100 piezas', 100000, 'http://localhost:8000/image/wpvbMVEmQCjXFArKtfq8zQSC0tUxwn6kYTPmrGW1.jpeg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tsushi_sushis`
--

CREATE TABLE `tsushi_sushis` (
  `cod_inter` int(11) NOT NULL,
  `cod_tabla` int(11) NOT NULL,
  `cod_sushi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tsushi_sushis`
--

INSERT INTO `tsushi_sushis` (`cod_inter`, `cod_tabla`, `cod_sushi`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `rut` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `remember_token`, `updated_at`, `created_at`, `rol`, `rut`, `nombre_completo`, `telefono`, `direccion`) VALUES
(2, '', '$2y$10$GVaG66imsu4OrhjwEElbQexmQAaX1Rb0OsP8pz2/3qfA9Y8JR3g56', NULL, '2019-04-15 02:36:02', '2019-04-15 06:34:48', 'cliente', '1', '', '', ''),
(3, 'fonder', '$2y$10$HU0c98S5hEE4TE84oRwEoOS02XCMBvM4sbkSkigdkRrvikcrApMlC', NULL, '2019-04-15 06:52:56', '2019-04-15 06:52:56', 'cliente', '199584367', 'Martin De La Horra', '+56991804801', 'Duble Almeyda 5595, 804'),
(4, 'martin', '$2y$10$2gmBwFfMcrJauHWFCWEp/ObRfmKhKV3BQzm3p09bwYVB3/d8xuF.i', NULL, '2019-05-17 07:21:41', '2019-05-17 07:21:41', 'cliente', '199584367', 'Martin De La Horra', '91804801', 'Duble Almeyda 5595'),
(5, 'kulvins', '$2y$10$jKcDeRdxw306Ziel3kK3bueTz7nbYRZ/9BvjU0T7ZP8XSVfHkLiRK', NULL, '2019-08-06 04:14:10', '2019-08-06 06:43:37', 'administrador', '108', 'Luis Muñoz', '88690639', 'Av. acuzenas'),
(6, 'ricaro', '$2y$10$Fnp6AZGAZ5RIvdSYbDyxSunBSg9KF45fG7kNM7JO88rLAneqMRDhO', NULL, '2019-08-06 22:15:40', '2019-08-06 22:15:40', 'cliente', '199584367', 'Ricadro Cahe', '88690639', 'Av montemar'),
(7, 'nuevo', '$2y$10$4ZlRlfaBBH8YkKqMBta1E.Z9upBE99FXtwfhl4gqPAgb04F4tmnqC', NULL, '2019-08-07 22:16:30', '2019-08-07 22:16:30', 'cliente', '19.958.436-7', 'Nuevo nuevo', '91804801', 'av las castañas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`cod_ingrediente`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `fk_pedidos_usuarios` (`id_usuario`);

--
-- Indices de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`cod_pizza`);

--
-- Indices de la tabla `pizzas_ingredientes`
--
ALTER TABLE `pizzas_ingredientes`
  ADD PRIMARY KEY (`cod_pi`),
  ADD KEY `fk_pizza_ingrediente` (`cod_pizza`),
  ADD KEY `fk_ingredientes_pizzas` (`cod_ingrediente`);

--
-- Indices de la tabla `pizza_pedido`
--
ALTER TABLE `pizza_pedido`
  ADD PRIMARY KEY (`id_pizza`),
  ADD KEY `cod_pizza` (`cod_pizza`),
  ADD KEY `cod_pedido` (`cod_pedido`);

--
-- Indices de la tabla `pizza_tamaños`
--
ALTER TABLE `pizza_tamaños`
  ADD PRIMARY KEY (`cod_tamaño`);

--
-- Indices de la tabla `sushis`
--
ALTER TABLE `sushis`
  ADD PRIMARY KEY (`cod_sushi`);

--
-- Indices de la tabla `tabla_pedido`
--
ALTER TABLE `tabla_pedido`
  ADD PRIMARY KEY (`id_tabla`),
  ADD KEY `cod_pedido` (`cod_pedido`),
  ADD KEY `cod_tabla` (`cod_tabla`);

--
-- Indices de la tabla `tabla_sushis`
--
ALTER TABLE `tabla_sushis`
  ADD PRIMARY KEY (`cod_tabla`);

--
-- Indices de la tabla `tsushi_sushis`
--
ALTER TABLE `tsushi_sushis`
  ADD PRIMARY KEY (`cod_inter`),
  ADD KEY `fk_tabla_sushi` (`cod_tabla`),
  ADD KEY `fk_sushi_tabla` (`cod_sushi`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `cod_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_pedido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `cod_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `pizzas_ingredientes`
--
ALTER TABLE `pizzas_ingredientes`
  MODIFY `cod_pi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `pizza_pedido`
--
ALTER TABLE `pizza_pedido`
  MODIFY `id_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `pizza_tamaños`
--
ALTER TABLE `pizza_tamaños`
  MODIFY `cod_tamaño` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sushis`
--
ALTER TABLE `sushis`
  MODIFY `cod_sushi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tabla_pedido`
--
ALTER TABLE `tabla_pedido`
  MODIFY `id_tabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tabla_sushis`
--
ALTER TABLE `tabla_sushis`
  MODIFY `cod_tabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tsushi_sushis`
--
ALTER TABLE `tsushi_sushis`
  MODIFY `cod_inter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `pizzas_ingredientes`
--
ALTER TABLE `pizzas_ingredientes`
  ADD CONSTRAINT `fk_ingredientes_pizzas` FOREIGN KEY (`cod_ingrediente`) REFERENCES `ingredientes` (`cod_ingrediente`),
  ADD CONSTRAINT `fk_pizza_ingrediente` FOREIGN KEY (`cod_pizza`) REFERENCES `pizzas` (`cod_pizza`);

--
-- Filtros para la tabla `pizza_pedido`
--
ALTER TABLE `pizza_pedido`
  ADD CONSTRAINT `pizza_pedido_ibfk_1` FOREIGN KEY (`cod_pizza`) REFERENCES `pizzas` (`cod_pizza`),
  ADD CONSTRAINT `pizza_pedido_ibfk_2` FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos` (`cod_pedido`);

--
-- Filtros para la tabla `tabla_pedido`
--
ALTER TABLE `tabla_pedido`
  ADD CONSTRAINT `tabla_pedido_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos` (`cod_pedido`),
  ADD CONSTRAINT `tabla_pedido_ibfk_2` FOREIGN KEY (`cod_tabla`) REFERENCES `tabla_sushis` (`cod_tabla`);

--
-- Filtros para la tabla `tsushi_sushis`
--
ALTER TABLE `tsushi_sushis`
  ADD CONSTRAINT `fk_sushi_tabla` FOREIGN KEY (`cod_sushi`) REFERENCES `sushis` (`cod_sushi`),
  ADD CONSTRAINT `fk_tabla_sushi` FOREIGN KEY (`cod_tabla`) REFERENCES `tabla_sushis` (`cod_tabla`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
