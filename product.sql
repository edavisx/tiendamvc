-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2025 a las 20:25:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tiendamvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `provider_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`product_id`, `name`, `description`, `img`, `stock`, `price`, `created_at`, `updated_at`, `category_id`, `provider_id`) VALUES
(1, 'ttt', 'descrip Producto 1', NULL, 456, 8.00, '2025-02-28 16:27:44', '2025-02-28 16:27:44', 2, 1),
(2, 'product 2', 'descrip Producto 2', NULL, 34, 7.00, '2025-02-28 17:06:07', '2025-02-28 17:06:07', 1, 2),
(3, 'product 3', 'descrip Producto 3', NULL, 67, 3.00, '2025-02-28 17:08:00', '2025-02-28 17:08:00', 2, 2),
(4, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:08:20', '2025-02-28 17:08:20', 3, 2),
(5, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:11', '2025-02-28 17:26:11', 3, 2),
(6, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:12', '2025-02-28 17:26:12', 3, 2),
(7, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:13', '2025-02-28 17:26:13', 3, 2),
(8, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:13', '2025-02-28 17:26:13', 3, 2),
(9, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:14', '2025-02-28 17:26:14', 3, 2),
(10, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:14', '2025-02-28 17:26:14', 3, 2),
(11, 'product 4', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:14', '2025-02-28 17:26:14', 3, 2),
(12, 'product 445', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:20', '2025-02-28 17:26:20', 3, 2),
(13, 'product 445', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:21', '2025-02-28 17:26:21', 3, 2),
(14, 'product 445', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:21', '2025-02-28 17:26:21', 3, 2),
(15, 'product 445', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:26', '2025-02-28 17:26:26', 1, 5),
(16, 'product 445', 'descrip Producto 4', NULL, 67, 3.00, '2025-02-28 17:26:30', '2025-02-28 17:26:30', 2, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `fk_product_category1_idx` (`category_id`),
  ADD KEY `fk_product_provider1_idx` (`provider_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_category1` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_product_provider1` FOREIGN KEY (`provider_id`) REFERENCES `provider` (`provider_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
