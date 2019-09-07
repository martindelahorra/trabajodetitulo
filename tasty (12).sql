-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-09-2019 a las 19:37:44
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

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
-- Estructura de tabla para la tabla `agregados`
--

CREATE TABLE `agregados` (
  `cod_agre` int(7) NOT NULL,
  `precio` int(6) NOT NULL,
  `nom_agre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `sugerido` tinyint(1) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agregados`
--

INSERT INTO `agregados` (`cod_agre`, `precio`, `nom_agre`, `descripcion`, `tipo`, `sugerido`, `imagen`) VALUES
(1, 9400, 'Pizza, Borde de Queso', 'Pizza mediana 3 ingredientes + Bebida 1.5L', 'P', 0, ''),
(2, 1500, 'Promo Handroll', 'Pizza grande 2 ingredientes + Tabla 26 piezas', 'P', 1, '');

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
(20, 'Zanahoria', 500, 'V', NULL),
(21, 'Naranja', 0, 'V', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_metodo` tinyint(4) NOT NULL,
  `nombre_metodo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `metodos_pago`
--

INSERT INTO `metodos_pago` (`id_metodo`, `nombre_metodo`, `deleted_at`) VALUES
(1, 'Tarjeta', NULL),
(2, 'Transferencia', NULL),
(3, 'Efectivo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_pedido` int(6) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_metodo` tinyint(4) NOT NULL,
  `estado_pedido` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `total_pedido` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_pedido`, `id_usuario`, `id_metodo`, `estado_pedido`, `descripcion`, `total_pedido`, `fecha`, `telefono`, `direccion`, `nombre_completo`) VALUES
(8, 4, 1, 'P', 'hola', 308000, '2019-09-04 04:37:20', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(12, 4, 1, 'P', 'ej', 56033, '2019-09-04 04:37:24', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(13, 4, 1, 'P', NULL, 10300, '2019-09-04 04:37:27', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(14, 4, 1, 'P', NULL, 56000, '2019-09-04 04:37:30', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(15, 4, 1, 'P', NULL, 48000, '2019-09-04 04:37:33', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(16, 4, 1, 'P', NULL, 48000, '2019-09-04 04:37:36', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(17, 4, 1, 'P', NULL, 48000, '2019-09-04 04:37:39', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra'),
(18, 4, 3, 'P', 'Ejemplo metodos', 96000, '2019-09-04 05:02:12', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas`
--

CREATE TABLE `pizzas` (
  `cod_pizza` int(11) NOT NULL,
  `precio` int(5) NOT NULL,
  `cod_tamaño` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas_ingredientes`
--

CREATE TABLE `pizzas_ingredientes` (
  `cod_pi` int(11) NOT NULL,
  `cod_pizza` int(11) NOT NULL,
  `cod_ingrediente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizza_tamaños`
--

CREATE TABLE `pizza_tamaños` (
  `cod_tamaño` tinyint(4) NOT NULL,
  `nombre` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` smallint(5) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
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
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sushis`
--

INSERT INTO `sushis` (`cod_sushi`, `envoltura`, `descripcion`, `cortes`, `imagen`, `precio`) VALUES
(1, 'Sesamo', 'Relleno de Kanikama, queso, palta', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', 5000),
(2, 'Panko (Frito)', 'Relleno de Pollo, queso, cebollin', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', 4000),
(3, 'Ciboulette', 'Relleno de Salmon, Queso, Palta', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', 3500),
(4, 'Panko', 'Relleno de Camaron, Queso, Ciboulete', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', 6000),
(5, 'Queso', 'Relleno de Camaron, Palta, Palmito', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', 7500),
(6, 'Palta', 'Relleno de Pollo, Queso, Cibulette', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', 8000),
(7, 'Panko', 'Relleno de  Kanikama, Queso, Palta', 10, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', 4300),
(9, 'Nueva', 'Hola', 11, 'http://localhost:8000/image/LwELHGaKKAPLN8xv13CLxnpWaMTqBrKpLvID6CEa.jpeg', 130);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sushi_pedido`
--

CREATE TABLE `sushi_pedido` (
  `id_sushi` tinyint(4) NOT NULL,
  `cod_pedido` int(6) NOT NULL,
  `cod_sushi` int(11) NOT NULL,
  `cantidad` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sushi_pedido`
--

INSERT INTO `sushi_pedido` (`id_sushi`, `cod_pedido`, `cod_sushi`, `cantidad`) VALUES
(3, 12, 9, 3),
(4, 13, 4, 1),
(5, 13, 7, 1);

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
(14, 8, 2, 4),
(15, 12, 1, 1),
(16, 14, 1, 1),
(17, 15, 1, 1),
(18, 16, 1, 1),
(19, 17, 1, 1),
(20, 18, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_sushis`
--

CREATE TABLE `tabla_sushis` (
  `cod_tabla` int(11) NOT NULL,
  `nombre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `precio` int(5) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `tabla_sushis`
--

INSERT INTO `tabla_sushis` (`cod_tabla`, `nombre`, `precio`, `imagen`, `deleted_at`) VALUES
(1, 'Tabla 24 Piezas', 48000, 'http://localhost:8000/image/WSAyQG4ixehz87NlVKvCfLbsIb3gVI6yxpyj3olk.jpeg', NULL),
(2, 'Tabla 36 Piezas', 73000, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', NULL),
(3, 'Tabla 50 Piezas', 12000, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', '2019-08-27 06:04:12'),
(12, 'Tabla nueva ejemplo', 12000, 'http://localhost:8000/image/eZIlCwjBPAUvaP9tr8FEVjLjSmNlwuEaV24DbI9P.jpeg', NULL);

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
(20, 12, 7),
(24, 1, 1),
(25, 1, 2),
(26, 1, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `rut` int(11) NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `username`, `password`, `remember_token`, `updated_at`, `created_at`, `rol`, `rut`, `nombre_completo`, `telefono`, `direccion`) VALUES
(2, '', '$2y$10$GVaG66imsu4OrhjwEElbQexmQAaX1Rb0OsP8pz2/3qfA9Y8JR3g56', NULL, '2019-04-15 02:36:02', '2019-04-15 06:34:48', 'cliente', 1, '', '', ''),
(3, 'fonder', '$2y$10$HU0c98S5hEE4TE84oRwEoOS02XCMBvM4sbkSkigdkRrvikcrApMlC', NULL, '2019-04-15 06:52:56', '2019-04-15 06:52:56', 'cliente', 199584367, 'Martin De La Horra', '+56991804801', 'Duble Almeyda 5595, 804'),
(4, 'martin', '$2y$10$2gmBwFfMcrJauHWFCWEp/ObRfmKhKV3BQzm3p09bwYVB3/d8xuF.i', NULL, '2019-05-17 07:21:41', '2019-05-17 07:21:41', 'cliente', 199584367, 'Martin De La Horra', '91804801', 'Duble Almeyda 5595'),
(5, 'kulvins', '$2y$10$jKcDeRdxw306Ziel3kK3bueTz7nbYRZ/9BvjU0T7ZP8XSVfHkLiRK', NULL, '2019-08-20 02:29:28', '2019-08-06 06:43:37', 'administrador', 108, 'Luis Muñoz', '88690639', 'Av. acuzenas'),
(6, 'ricaro', '$2y$10$Fnp6AZGAZ5RIvdSYbDyxSunBSg9KF45fG7kNM7JO88rLAneqMRDhO', NULL, '2019-08-06 22:15:40', '2019-08-06 22:15:40', 'cliente', 199584367, 'Ricadro Cahe', '88690639', 'Av montemar');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agregados`
--
ALTER TABLE `agregados`
  ADD PRIMARY KEY (`cod_agre`);

--
-- Indices de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  ADD PRIMARY KEY (`cod_ingrediente`);

--
-- Indices de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  ADD PRIMARY KEY (`id_metodo`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_pedido`),
  ADD KEY `fk_pedidos_usuarios` (`id_usuario`),
  ADD KEY `id_metodo` (`id_metodo`);

--
-- Indices de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`cod_pizza`),
  ADD KEY `cod_tamaño` (`cod_tamaño`);

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
-- Indices de la tabla `sushi_pedido`
--
ALTER TABLE `sushi_pedido`
  ADD PRIMARY KEY (`id_sushi`),
  ADD KEY `cod_pedido` (`cod_pedido`),
  ADD KEY `cod_sushi` (`cod_sushi`);

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
-- AUTO_INCREMENT de la tabla `agregados`
--
ALTER TABLE `agregados`
  MODIFY `cod_agre` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `cod_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_pedido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `cod_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pizzas_ingredientes`
--
ALTER TABLE `pizzas_ingredientes`
  MODIFY `cod_pi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `pizza_pedido`
--
ALTER TABLE `pizza_pedido`
  MODIFY `id_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `pizza_tamaños`
--
ALTER TABLE `pizza_tamaños`
  MODIFY `cod_tamaño` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sushis`
--
ALTER TABLE `sushis`
  MODIFY `cod_sushi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `sushi_pedido`
--
ALTER TABLE `sushi_pedido`
  MODIFY `id_sushi` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tabla_pedido`
--
ALTER TABLE `tabla_pedido`
  MODIFY `id_tabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tabla_sushis`
--
ALTER TABLE `tabla_sushis`
  MODIFY `cod_tabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tsushi_sushis`
--
ALTER TABLE `tsushi_sushis`
  MODIFY `cod_inter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_pedidos_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_metodo`) REFERENCES `metodos_pago` (`id_metodo`);

--
-- Filtros para la tabla `pizzas`
--
ALTER TABLE `pizzas`
  ADD CONSTRAINT `pizzas_ibfk_1` FOREIGN KEY (`cod_tamaño`) REFERENCES `pizza_tamaños` (`cod_tamaño`);

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
-- Filtros para la tabla `sushi_pedido`
--
ALTER TABLE `sushi_pedido`
  ADD CONSTRAINT `sushi_pedido_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos` (`cod_pedido`),
  ADD CONSTRAINT `sushi_pedido_ibfk_2` FOREIGN KEY (`cod_sushi`) REFERENCES `sushis` (`cod_sushi`);

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
