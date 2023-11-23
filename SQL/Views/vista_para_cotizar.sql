-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 04:38:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistemadeventas`
--

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_para_cotizar`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_para_cotizar`  AS SELECT `producto`.`ID_producto` AS `ID_producto`, `producto`.`nombre_prod` AS `NombreProducto`, `producto`.`descripcion_prod` AS `DescripcionProducto`, `producto`.`precio_prod` AS `PrecioProducto`, `producto`.`status_prod` AS `EstadoProducto`, `producto`.`cantDisp_prod` AS `CantidadDisponible`, `producto`.`calificacion_prod` AS `CalificacionProducto`, `producto`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `producto`.`id_Categoria` AS `id_Categoria`, `producto`.`id_Usuario` AS `id_Usuario`, `producto`.`baja_producto` AS `baja_producto`, `producto`.`venta_cotizar` AS `venta_cotizar`, `producto`.`imagenP_1` AS `imagenP_1`, `producto`.`imagenP_2` AS `imagenP_2`, `producto`.`imagenP_3` AS `imagenP_3`, `producto`.`VideoP` AS `VideoP` FROM `producto` WHERE `producto`.`baja_producto` = 1 AND `producto`.`status_prod` = 1 AND `producto`.`venta_cotizar` = 0 ;

--
-- VIEW `vista_para_cotizar`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
