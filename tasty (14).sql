-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2019 a las 22:48:11
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
-- Estructura de tabla para la tabla `agregados`
--

CREATE TABLE `agregados` (
  `cod_agre` int(7) NOT NULL,
  `precio` int(6) NOT NULL,
  `nom_agre` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `tipo` char(1) COLLATE utf8_spanish2_ci NOT NULL,
  `sugerido` tinyint(1) NOT NULL,
  `imagen` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `bebida_litros` text COLLATE utf8_spanish2_ci,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agregados`
--

INSERT INTO `agregados` (`cod_agre`, `precio`, `nom_agre`, `descripcion`, `tipo`, `sugerido`, `imagen`, `bebida_litros`, `deleted_at`) VALUES
(1, 9400, 'Pizza, Borde de Queso', 'Pizza mediana 3 ingredientes + Bebida 1.5L', 'P', 0, 'http://localhost:8000/image/evGanFSsgCoTdxW9F7dbNiwMmzkLafoacS7E7zWE.jpeg', '1.5L', NULL),
(3, 1500, 'Bebida 2L', 'Bebida a elección de 2 litros', 'B', 1, 'http://localhost:8000/image/GSO2AaQh9ATFPaOyK5vbKDshEkqaCszX7wzKsxGs.jpeg', '2L', NULL),
(4, 1200, 'Bebida 1 Litro', 'Bebida 1 Litro a elección', 'B', 0, 'http://localhost:8000/image/auYpsTfuopSGwJETfSQ1ggLgnVS8HoCt8CLqMpTO.jpeg', '1L', NULL),
(10, 3000, 'Mega Hand Rolls', 'Mega Hand Rolls de Pollo, Queso, Cebollín\r\n(Agregado de palta $300)', 'S', 1, 'http://localhost:8000/image/XQrsqLJfDWDmrfBkzAbtZugGzZYQGof9SVe2Wtev.jpeg', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `agregado_pedido`
--

CREATE TABLE `agregado_pedido` (
  `cantidad` int(11) NOT NULL,
  `cod_pedido` int(6) NOT NULL,
  `cod_agre` int(7) NOT NULL,
  `id_agregado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `agregado_pedido`
--

INSERT INTO `agregado_pedido` (`cantidad`, `cod_pedido`, `cod_agre`, `id_agregado`) VALUES
(1, 29, 10, 1),
(1, 29, 4, 2),
(1, 29, 1, 3),
(1, 33, 1, 4),
(1, 34, 3, 5),
(1, 35, 10, 6),
(1, 39, 10, 7),
(1, 41, 10, 9),
(1, 41, 3, 10),
(3, 42, 10, 11),
(3, 45, 10, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `cod_bebida` int(11) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `tamaño` text COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`cod_bebida`, `nombre`, `tamaño`) VALUES
(1, 'CocaCola 3 Litros', '3L'),
(2, 'Pepsi 3 Litros', '3L'),
(3, 'CocaCola 1.5Litros', '1.5L'),
(4, 'CocaCola 1 Litro', '1L'),
(5, 'CocaCola 2 Litros', '2L');

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
(10, 'Champiñon', 500, 'O', NULL),
(11, 'Tomate', 500, 'V', NULL),
(12, 'Pimentón', 500, 'V', NULL),
(13, 'Piña', 500, 'O', NULL),
(14, 'Palmito', 500, 'V', NULL),
(15, 'Choclo', 500, 'V', NULL),
(16, 'Jamón', 500, 'C', NULL),
(17, 'Cebolla Morada', 500, 'V', NULL),
(18, 'Camarón', 800, 'C', NULL),
(19, 'Longaniza', 500, 'C', NULL),
(20, 'Zanahoria', 500, 'V', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodos_pago`
--

CREATE TABLE `metodos_pago` (
  `id_metodo` tinyint(4) NOT NULL,
  `nombre_metodo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
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
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telefono` varchar(12) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_completo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `delivery` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_pedido`, `id_usuario`, `id_metodo`, `estado_pedido`, `descripcion`, `total_pedido`, `fecha`, `telefono`, `direccion`, `nombre_completo`, `delivery`) VALUES
(29, 5, 1, 'P', '1L: CocaCola 1 Litro;1.5L: CocaCola 1.5Litros;Ingredientes: Naranja;', 13600, '2019-09-09 01:55:48', '88690639', 'Av. acuzenas', 'Luis Muñoz', 0),
(30, 4, 3, 'C', ';', 35000, '2019-09-09 16:15:05', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 0),
(33, 4, 2, 'P', '|1.5L: CocaCola 1.5Litros;Ingredientes: Aceituna, Champiñon;', 9400, '2019-09-09 16:25:06', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 1),
(34, 4, 2, 'P', '|2L: CocaCola 2 Litros;', 1500, '2019-09-09 16:55:31', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 0),
(35, 4, 2, 'P', '|', 3000, '2019-09-09 21:25:41', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 0),
(36, 4, 2, 'E', '|', 48000, '2019-09-10 01:27:39', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 0),
(37, 4, 3, 'P', '|', 96000, '2019-09-10 01:37:54', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 0),
(38, 5, 1, 'C', '|', 48000, '2019-09-10 02:26:45', '88690639', 'Av. acuzenas', 'Luis Muñoz', 0),
(39, 4, 1, 'P', '|', 154000, '2019-09-10 04:44:34', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 1),
(41, 4, 3, 'C', '|2L: CocaCola 2 Litros;', 52500, '2019-09-10 04:47:12', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 0),
(42, 4, 1, 'C', '|', 9000, '2019-09-10 04:55:06', '91804801', 'Duble Almeyda 5595', 'Martin De La Horra', 0),
(43, 5, 1, 'C', '|', 48000, '2019-09-10 05:18:33', '88690639', 'Av. acuzenas', 'Luis Muñoz', 0),
(44, 7, 1, 'C', 'Harto champiñon|', 6500, '2019-09-10 05:36:05', '+5691554376', 'Av. Psja Carmelitas 333', 'Ivan Rodriguez', 0),
(45, 5, 1, 'M', '|', 9000, '2019-09-10 17:01:15', '88690639', 'Av. acuzenas', 'Luis Muñoz', 0),
(46, 8, 3, 'A', 'Estoy apurado|', 226000, '2019-09-10 17:19:52', '88660639', 'Duble Almeyda 5595, 804', 'Martin Fernandez', 0),
(47, 8, 1, 'C', '|', 48000, '2019-09-10 17:23:03', '88660639', 'Duble Almeyda 5595, 804', 'Martin Fernandez', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pizzas`
--

CREATE TABLE `pizzas` (
  `cod_pizza` int(11) NOT NULL,
  `precio` int(5) NOT NULL,
  `cod_tamaño` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pizzas`
--

INSERT INTO `pizzas` (`cod_pizza`, `precio`, `cod_tamaño`) VALUES
(20, 7000, 2),
(21, 7000, 2),
(22, 6500, 3),
(23, 6500, 2),
(24, 7000, 2),
(25, 7000, 2),
(26, 6500, 3),
(27, 7000, 2);

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
(73, 20, 5),
(74, 20, 16),
(75, 20, 12),
(76, 20, 17),
(77, 21, 5),
(78, 21, 6),
(79, 21, 14),
(80, 21, 15),
(81, 22, 1),
(82, 22, 10),
(83, 22, 8),
(84, 23, 2),
(85, 24, 1),
(86, 24, 9),
(87, 24, 12),
(88, 24, 14),
(89, 25, 2),
(90, 25, 3),
(91, 25, 9),
(92, 25, 10),
(93, 26, 10),
(94, 27, 1),
(95, 27, 2),
(96, 27, 11),
(97, 27, 14);

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
(12, 24, 30, 5),
(13, 25, 39, 1),
(14, 26, 44, 1),
(15, 27, 46, 1);

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
(2, 'Mediana', 6500, 'http://localhost:8000/image/YfuIQzJxuK85QNceB0tInBymBO3828ko3mVoYTUN.jpeg', '2019-09-10 20:28:20'),
(3, 'Familiar', 8000, 'http://localhost:8000/image/2jO3kqrSsPDvvPJZNwrwBgQAonIO4P29htY7Oi2Q.jpeg', NULL),
(4, 'Individual', 5000, 'http://localhost:8000/image/XOPiZgnR8o72IcM7yqVRN9XoPUZItGj9adxeHDdy.jpeg', NULL),
(5, 'nuevo', 7000, 'http://localhost:8000/image/gh6fVQPGGcqPeeG9BMoK1nPP2VGGXjHfU2APmZ2L.jpeg', NULL);

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
  `precio` int(5) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `sushis`
--

INSERT INTO `sushis` (`cod_sushi`, `envoltura`, `descripcion`, `cortes`, `imagen`, `precio`, `deleted_at`) VALUES
(1, 'Sesamo', 'Relleno de Kanikama, queso, palta', 10, 'http://localhost:8000/image/fvyUoc9Ryh0NT0Ry3xvRTgsohIgmppFQPFkBcVXT.jpeg', 5000, '2019-09-10 20:32:22'),
(2, 'Panko (Frito)', 'Relleno de Pollo, queso, cebollin', 10, 'http://localhost:8000/image/jr20NR8nEO7dYKM71y2jmSnBHGf2lPiukblTLgZU.jpeg', 4000, NULL),
(3, 'Ciboulette', 'Relleno de Salmon, Queso, Palta', 10, 'http://localhost:8000/image/3vPC1XONMcRqWv1UqWjh0wQbdRhvdFhl5JNTu70r.jpeg', 3500, NULL),
(4, 'Panko', 'Relleno de Camaron, Queso, Ciboulete', 10, 'http://localhost:8000/image/93K4huWH41XC4DaGijkpI7gKEzHScDHyD1hyAdp6.jpeg', 6000, NULL),
(5, 'Queso', 'Relleno de Camaron, Palta, Palmito', 10, 'http://localhost:8000/image/VHs7xbApsQ110VD8W5RBBJho5acSyE3Tq1XbyIhr.jpeg', 7500, NULL),
(6, 'Palta', 'Relleno de Pollo, Queso, Cibulette', 10, 'http://localhost:8000/image/TbK2uJMWGDQFkvZrrlo2CUdc0e1L0H6guIvhA5wN.jpeg', 8000, NULL),
(7, 'Panko', 'Relleno de  Kanikama, Queso, Palta', 10, 'http://localhost:8000/image/rRfp3TAy5gYgloI7k7ZQ3IJ0IVeLRqMz8u3Zcp7X.jpeg', 4300, NULL);

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
(1, 36, 1, 1),
(2, 37, 1, 2),
(3, 38, 1, 1),
(4, 39, 1, 3),
(6, 41, 1, 1),
(7, 43, 1, 1),
(8, 46, 2, 3),
(9, 47, 1, 1);

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
(1, 'Tabla 24 Piezas', 48000, 'http://localhost:8000/image/Hs6YtSLF0EJF8haweAtZfNAELt2JLRBX8XHBwqGM.jpeg', NULL),
(2, 'Tabla 36 Piezas', 73000, 'http://localhost:8000/image/SgAhgCbuRZwz3uuS9R1MhSII4cTPOlqtTtKSVAcB.jpeg', NULL),
(3, 'Tabla 50 Piezas', 12000, 'http://localhost:8000/image/7tGRoZlnT5YOWIX6ZDEVsFkC2fuqGTAdPLZ67rL0.jpeg', '2019-08-27 06:04:12'),
(12, 'Tabla nueva ejemplo', 12000, 'http://localhost:8000/image/w1QrVMiVjDImtdFdqxyzhYXRtG56ha8sOwyt5lvE.jpeg', NULL),
(13, 'Nueva tabla', 25000, 'http://localhost:8000/image/4dS0Xr8wfPCogNnvE0bs7EYv6IE21oKQ8CX6LBLu.jpeg', NULL),
(14, 'Nueva tabla', 12000, 'http://localhost:8000/image/aQ5vFFivREJBdOaJdFpZ0zIEucpxZjG9jSJUGJg9.jpeg', NULL);

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
(32, 12, 1),
(33, 12, 2),
(34, 12, 4),
(35, 12, 5),
(36, 12, 7),
(37, 2, 1),
(38, 2, 2),
(39, 2, 5),
(40, 13, 1),
(41, 13, 3),
(42, 13, 4),
(44, 1, 1),
(45, 1, 2),
(46, 1, 7),
(50, 14, 3),
(51, 14, 4),
(52, 14, 5),
(53, 14, 6),
(54, 14, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(6) NOT NULL,
  `username` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `rut` varchar(22) COLLATE utf8_spanish2_ci NOT NULL,
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
(5, 'kulvins', '$2y$10$jKcDeRdxw306Ziel3kK3bueTz7nbYRZ/9BvjU0T7ZP8XSVfHkLiRK', NULL, '2019-09-10 17:40:19', '2019-08-06 06:43:37', 'administrador', '8354063-k', 'Luis Muñoz', '88690639', 'Av. acuzenas'),
(6, 'ricaro', '$2y$10$Fnp6AZGAZ5RIvdSYbDyxSunBSg9KF45fG7kNM7JO88rLAneqMRDhO', NULL, '2019-08-06 22:15:40', '2019-08-06 22:15:40', 'cliente', '199584367', 'Ricadro Cahe', '88690639', 'Av montemar'),
(7, 'ivanRod', '$2y$10$.dpqRPbgIubn4QJwzpQHx.HECfGmDQcNmi.xCVmnYKYvhxrv8M7rq', NULL, '2019-09-10 08:30:52', '2019-09-10 08:30:52', 'cliente', '193374697', 'Ivan Rodriguez', '+5691554376', 'Av. Psja Carmelitas 333'),
(8, 'ejemplo', '$2y$10$E3GMLaxBj8De7mkGq0fLV.SK3ImW6aAV713FdL63QRrPvdiRZ0Oly', NULL, '2019-09-10 20:12:32', '2019-09-10 20:11:29', 'cliente', '199584367', 'Martin Fernandez', '88660639', 'Duble Almeyda 5595, 804');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `cod_pedido` int(6) NOT NULL,
  `monto_total` int(11) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `cod_pedido`, `monto_total`, `fecha_venta`) VALUES
(1, 38, 48000, '2019-09-10 02:49:39'),
(2, 41, 52500, '2019-09-10 04:50:06'),
(3, 42, 9000, '2019-09-10 05:08:20'),
(4, 43, 48000, '2019-09-10 05:18:57'),
(5, 44, 6500, '2019-09-10 05:38:20'),
(6, 47, 48000, '2019-09-10 17:24:50');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `agregados`
--
ALTER TABLE `agregados`
  ADD PRIMARY KEY (`cod_agre`);

--
-- Indices de la tabla `agregado_pedido`
--
ALTER TABLE `agregado_pedido`
  ADD PRIMARY KEY (`id_agregado`),
  ADD KEY `cod_pedido` (`cod_pedido`),
  ADD KEY `cod_agregado` (`cod_agre`);

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`cod_bebida`);

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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `cod_pedido` (`cod_pedido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `agregados`
--
ALTER TABLE `agregados`
  MODIFY `cod_agre` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `agregado_pedido`
--
ALTER TABLE `agregado_pedido`
  MODIFY `id_agregado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `cod_bebida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ingredientes`
--
ALTER TABLE `ingredientes`
  MODIFY `cod_ingrediente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `metodos_pago`
--
ALTER TABLE `metodos_pago`
  MODIFY `id_metodo` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_pedido` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `cod_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pizzas_ingredientes`
--
ALTER TABLE `pizzas_ingredientes`
  MODIFY `cod_pi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `pizza_pedido`
--
ALTER TABLE `pizza_pedido`
  MODIFY `id_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pizza_tamaños`
--
ALTER TABLE `pizza_tamaños`
  MODIFY `cod_tamaño` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sushis`
--
ALTER TABLE `sushis`
  MODIFY `cod_sushi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `sushi_pedido`
--
ALTER TABLE `sushi_pedido`
  MODIFY `id_sushi` tinyint(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tabla_pedido`
--
ALTER TABLE `tabla_pedido`
  MODIFY `id_tabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tabla_sushis`
--
ALTER TABLE `tabla_sushis`
  MODIFY `cod_tabla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `tsushi_sushis`
--
ALTER TABLE `tsushi_sushis`
  MODIFY `cod_inter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `agregado_pedido`
--
ALTER TABLE `agregado_pedido`
  ADD CONSTRAINT `agregado_pedido_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos` (`cod_pedido`),
  ADD CONSTRAINT `agregado_pedido_ibfk_2` FOREIGN KEY (`cod_agre`) REFERENCES `agregados` (`cod_agre`);

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

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`cod_pedido`) REFERENCES `pedidos` (`cod_pedido`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
