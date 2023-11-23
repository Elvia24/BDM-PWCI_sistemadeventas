-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2023 a las 04:37:30
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
-- Estructura para la vista `vista_menorprecio`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_menorprecio`  AS SELECT `p`.`ID_producto` AS `ID_producto`, `p`.`nombre_prod` AS `NombreProducto`, `p`.`descripcion_prod` AS `DescripcionProducto`, `p`.`precio_prod` AS `PrecioProducto`, `p`.`status_prod` AS `EstadoProducto`, `p`.`cantDisp_prod` AS `CantidadDisponible`, `p`.`calificacion_prod` AS `CalificacionProducto`, `p`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `p`.`baja_producto` AS `baja_producto`, `p`.`venta_cotizar` AS `venta_cotizar`, `p`.`imagenP_1` AS `imagenP_1`, `p`.`imagenP_2` AS `imagenP_2`, `p`.`imagenP_3` AS `imagenP_3`, `p`.`VideoP` AS `VideoP`, `u`.`ID_usuario` AS `ID_usuario`, `u`.`nombreUsuario` AS `NombreUsuario`, `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `NombreCategoria` FROM ((`producto` `p` join `usuario` `u` on(`p`.`id_Usuario` = `u`.`ID_usuario`)) join `categoria` `c` on(`p`.`id_Categoria` = `c`.`ID_categoria`)) WHERE `p`.`baja_producto` = 1 AND `p`.`status_prod` = 1 AND `p`.`venta_cotizar` = 1 ORDER BY `p`.`precio_prod` ASC ;

--
-- VIEW `vista_menorprecio`
-- Datos: Ninguna
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
