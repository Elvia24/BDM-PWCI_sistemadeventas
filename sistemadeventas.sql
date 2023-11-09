-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2023 a las 12:08:50
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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `totalDEcarrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`ID_carrito`, `id_usuario`, `totalDEcarrito`) VALUES
(1, 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `nombre_cate` varchar(200) NOT NULL,
  `descripcion_cate` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `status_categoria` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `nombre_cate`, `descripcion_cate`, `id_usuario`, `status_categoria`) VALUES
(1, 'Ropa Invierno', 'Ropa Para Invierno', 3, 1),
(2, 'Zapatos de Dama', 'Tacones', 3, 1),
(3, 'ropa1', '', 4, 0),
(8, 'Ropa Mujer', 'Verano', 1, 1),
(9, 'Ropa Hombre', 'Verano', 1, 1),
(10, 'Ropa Niño', 'Verano', 1, 1),
(11, 'Ropa de  Bebe', 'Ropa Para Bebe ', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_Compra` int(11) NOT NULL,
  `id_carrito` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `Total` float NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`ID_Compra`, `id_carrito`, `id_usuario`, `Total`, `fechaCreacion`) VALUES
(1, 1, 1, 92, '2023-11-09 04:47:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizar`
--

CREATE TABLE `cotizar` (
  `ID_Cotizar` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `Mensaje_Cliente` text NOT NULL,
  `Mensaje_Vendedor` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_carrito`
--

CREATE TABLE `detalle_carrito` (
  `ID_detalle_carrito` int(11) NOT NULL,
  `id_carrito` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_carrito`
--

INSERT INTO `detalle_carrito` (`ID_detalle_carrito`, `id_carrito`, `id_producto`, `cantidad`, `subTotal`) VALUES
(1, 1, 1, 1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `ID_producto` int(11) NOT NULL,
  `nombre_prod` varchar(200) NOT NULL,
  `descripcion_prod` varchar(200) NOT NULL,
  `precio_prod` float DEFAULT 0,
  `status_prod` int(11) NOT NULL DEFAULT 0,
  `cantDisp_prod` int(11) NOT NULL DEFAULT 0,
  `calificacion_prod` float NOT NULL DEFAULT 0,
  `fechaCreacion_prod` date NOT NULL DEFAULT current_timestamp(),
  `id_Categoria` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `baja_producto` int(11) NOT NULL DEFAULT 1,
  `venta_cotizar` int(11) NOT NULL,
  `imagenP_1` text NOT NULL,
  `imagenP_2` text NOT NULL,
  `imagenP_3` text NOT NULL,
  `VideoP` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`ID_producto`, `nombre_prod`, `descripcion_prod`, `precio_prod`, `status_prod`, `cantDisp_prod`, `calificacion_prod`, `fechaCreacion_prod`, `id_Categoria`, `id_Usuario`, `baja_producto`, `venta_cotizar`, `imagenP_1`, `imagenP_2`, `imagenP_3`, `VideoP`) VALUES
(1, 'blusa mujer', 'bonita', 59, 1, 54, 0, '2023-11-03', 8, 1, 1, 1, 'a91a5499fff4a13a7358223823d2b670.jpg', 'a661e95ded195f2a79a4191f141dc39b.jpg', 'a7c5b1b616310f70ecbbd1ae5202b78b.jpg', 'sistema solar.mp4'),
(2, 'camiseta hombre', 'hombre', 0, 1, 35, 0, '2023-11-03', 9, 1, 1, 0, '5a2f16cdecb42cda18f8d649b2c15a16.jpg', '5cbfd112b8b0c5a4156ec8c0d881e2b6.jpg', '5cbfd112b8b0c5a4156ec8c0d881e2b6.jpg', '9d0e380720b58cac0efa752e5b444020.jpg'),
(3, 'ZAPATOS', 'ZAPATOS', 0, 0, 150, 0, '2023-11-04', 2, 1, 1, 0, '2023-11-05-06-44-38__1d6652573d8fe16d20b3f2e63ded20d1.jpg', '2023-11-05-06-44-38__7203f9966a7d9967144f0cfce9341841.jpg', '2023-11-05-06-44-38__322908e348d4d1a3378ff42b0a7ff5f8.jpg', '2023-11-05-06-44-38__2023-10-20 01-47-55.mp4'),
(4, 'prueba1', 'prueba1', 0, 0, 25, 0, '2023-11-04', 1, 1, 0, 0, '2023-11-04-08-14-45__26b8840bf90d9f66ebe9f48c458ff9d1.jpg', '2023-11-04-08-14-45__04b59c0ae1814fbb487ecb37ec997c1b.jpg', '2023-11-04-08-14-45__8c90ac726cc78efdb7e1f0ec881532bb.jpg', '2023-11-04-08-14-45__2023-10-20 01-47-55.mp4'),
(5, 'FALDA', 'NEGRA', 50, 1, 100, 0, '2023-11-05', 8, 3, 1, 1, '2023-11-05-07-47-32__22bbc338d05a1fa2a2fa1d8bdaf3f6b4.jpg', '2023-11-05-07-47-32__d8ebad75187f84c62bd1fc819b82c579.jpg', '2023-11-05-07-47-32__e3ba8d6eedc4f2fed0ee7b44ff69e993.jpg', '2023-11-05-07-47-32__2023-09-27 01-08-25.mp4'),
(6, 'overol', 'BONITO DE COLOR', 95, 1, 150, 0, '2023-11-05', 8, 3, 1, 1, '2023-11-06-04-15-42__3cdb245aa053ca9ae19824674801f9d8.jpg', '2023-11-06-04-15-42__4eecb6fef2d21964ba6e25323ae943a0.jpg', '2023-11-06-04-15-42__4190c344cdbcd09e05ea2c2fc4643049.jpg', '2023-11-06-04-15-42__sistema solar.mp4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `ID_Rol` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`ID_Rol`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'EL Administrador'),
(2, 'Vendedor', 'Quienes solo Realizaran ventas'),
(3, 'Privado', 'Quienes únicamente deseen Comprar\n'),
(4, 'Publico', 'Quienes deseen Vender O Comprar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(11) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `nombreUsuario` varchar(200) NOT NULL,
  `contraseña` text NOT NULL,
  `ID_rol` int(11) NOT NULL,
  `Nombres` varchar(200) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `Sexo` varchar(200) NOT NULL,
  `Imagen` text NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT current_timestamp(),
  `status_usuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `correo`, `nombreUsuario`, `contraseña`, `ID_rol`, `Nombres`, `fechaNacimiento`, `Sexo`, `Imagen`, `fechaCreacion`, `status_usuario`) VALUES
(1, 'EL@gmail.com', 'el_', 'EL', 1, 'ELA', '2001-10-24', 'Mujer', '2023-10-27-03-57-13__4979fbd70a3e245a3d71c0f7f30d220d.jpg', '2023-10-26 19:53:21', 1),
(3, 'PA@gmail.com', 'pa_', 'P@ssw0PA', 2, 'PAA', '2001-10-24', 'Mujer', '2023-10-27-04-37-02__25ffd9a3dc860065d95a59aa55929c2a.jpg', '2023-10-26 20:37:02', 1),
(4, 'prueba@gmail.com', 'prueba_', '123', 2, 'PRUEBA', '2014-10-08', 'Mujer', '', '2023-10-29 16:22:39', 0);

--
-- Disparadores `usuario`
--
DELIMITER $$
CREATE TRIGGER `ActualizarStatusCategoria` AFTER UPDATE ON `usuario` FOR EACH ROW BEGIN
  DECLARE usuario_id_to_update INT;
  DECLARE nuevo_status_usuario INT;
  
  SET usuario_id_to_update = NEW.ID_usuario;
  SET nuevo_status_usuario = NEW.status_usuario;
  
  IF nuevo_status_usuario = 0 THEN
    UPDATE categoria SET status_categoria = 0 WHERE ID_usuario = usuario_id_to_update;
  END IF;
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID_carrito`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`ID_Compra`),
  ADD KEY `id_carrito` (`id_carrito`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  ADD PRIMARY KEY (`ID_Cotizar`),
  ADD KEY `id_usuario` (`id_usuario`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  ADD PRIMARY KEY (`ID_detalle_carrito`),
  ADD KEY `id_carrito` (`id_carrito`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`ID_producto`),
  ADD KEY `id_Categoria` (`id_Categoria`,`id_Usuario`),
  ADD KEY `id_Usuario` (`id_Usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`ID_Rol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  MODIFY `ID_Cotizar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  MODIFY `ID_detalle_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`ID_carrito`) ON UPDATE CASCADE,
  ADD CONSTRAINT `compra_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cotizar`
--
ALTER TABLE `cotizar`
  ADD CONSTRAINT `cotizar_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cotizar_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`ID_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  ADD CONSTRAINT `detalle_carrito_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carrito` (`ID_carrito`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`ID_producto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_Categoria`) REFERENCES `categoria` (`ID_categoria`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_Rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
