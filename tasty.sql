-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-03-2019 a las 00:23:51
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

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
-- Estructura de tabla para la tabla `pizzas`
--

CREATE TABLE `pizzas` (
  `cod_pizza` int(11) NOT NULL,
  `precio_pizza` int(11) NOT NULL,
  `tamaño` varchar(2) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `ingredientes` varchar(50) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `imagen` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pizzas`
--

INSERT INTO `pizzas` (`cod_pizza`, `precio_pizza`, `tamaño`, `descripcion`, `disponible`, `ingredientes`, `imagen`) VALUES
(1, 5490, 'Me', 'Pizza Mediana con derecho a 3 ingredientes.\r\n*Camarón (+300 adicional).\r\n**+500 por Ingrediente extra.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sushis`
--

CREATE TABLE `sushis` (
  `cod_sushi` int(11) NOT NULL,
  `envoltura` varchar(60) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `cortes` int(11) NOT NULL,
  `precio_roll` int(11) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(40) COLLATE utf8_spanish2_ci NOT NULL,
  `remember_token` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `rol` varchar(20) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  ADD PRIMARY KEY (`cod_pizza`);

--
-- Indices de la tabla `sushis`
--
ALTER TABLE `sushis`
  ADD PRIMARY KEY (`cod_sushi`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `cod_pizza` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sushis`
--
ALTER TABLE `sushis`
  MODIFY `cod_sushi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
