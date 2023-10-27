-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2023 a las 08:08:57
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
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_categoria` int(11) NOT NULL,
  `nombre_cate` varchar(200) NOT NULL,
  `descripcion_cate` varchar(200) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_categoria`, `nombre_cate`, `descripcion_cate`, `id_usuario`) VALUES
(1, 'Ropa Invierno', 'Ropa Para Invierno', 3),
(2, 'Zapatos', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen_video`
--

CREATE TABLE `imagen_video` (
  `ID_Img_Vid` int(11) NOT NULL,
  `Imagen_Video` text NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `calificacion_prod` float NOT NULL,
  `fechaCreacion_prod` date NOT NULL DEFAULT current_timestamp(),
  `id_Categoria` int(11) NOT NULL,
  `id_Usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

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
  `fechaCreacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `correo`, `nombreUsuario`, `contraseña`, `ID_rol`, `Nombres`, `fechaNacimiento`, `Sexo`, `Imagen`, `fechaCreacion`) VALUES
(1, 'EL@gmail.com', 'el_', 'EL', 1, 'ELA', '2001-10-24', 'Mujer', '2023-10-27-03-57-13__4979fbd70a3e245a3d71c0f7f30d220d.jpg', '2023-10-26 19:53:21'),
(3, 'PA@gmail.com', 'pa_', 'P@ssw0PA', 2, 'PAA', '2001-10-24', 'Mujer', '2023-10-27-04-37-02__25ffd9a3dc860065d95a59aa55929c2a.jpg', '2023-10-26 20:37:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_categoria`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `imagen_video`
--
ALTER TABLE `imagen_video`
  ADD PRIMARY KEY (`ID_Img_Vid`),
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
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagen_video`
--
ALTER TABLE `imagen_video`
  MODIFY `ID_Img_Vid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `imagen_video`
--
ALTER TABLE `imagen_video`
  ADD CONSTRAINT `imagen_video_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`ID_producto`) ON UPDATE CASCADE;

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
