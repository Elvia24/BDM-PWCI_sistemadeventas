-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2023 a las 22:36:23
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

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuario` (IN `userID ` INT)   BEGIN
  DECLARE categoria_count INT;
  DECLARE mensaje VARCHAR(255); -- Declarar la variable mensaje
  DECLARE icono VARCHAR(20);    -- Declarar la variable icono
  
  -- Verificar si existen registros en la tabla de categorías para el usuario
  SELECT COUNT(*) INTO categoria_count FROM categoria WHERE id_usuario = userID;
  
  -- Si existen registros de categorías, establecer el mensaje y el icono
  IF categoria_count > 0 THEN
    SET mensaje = 'No es posible eliminar el usuario. Existen registros de categorías relacionados.';
    SET icono = 'error';
  ELSE
    -- Si no existen registros de categorías, eliminar al usuario y establecer el mensaje y el icono
    DELETE FROM usuario WHERE id = userID;
    SET mensaje = 'Usuario eliminado correctamente.';
    SET icono = 'success';
  END IF;
  
  -- Devolver el valor de mensaje e icono como resultado
  SELECT mensaje, icono;
END$$

DELIMITER ;

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
(1, 'Ropa Invierno', 'Ropa Para Invierno', 13),
(2, 'Zapatos', '', 13);

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
(2, 'Vendedor', 'es el vendedor'),
(3, 'Privado', 'Cliente Privado'),
(4, 'Publico', 'Cliente Publico');

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
  `fechaNacimiento` datetime NOT NULL,
  `Sexo` varchar(200) NOT NULL,
  `Imagen` text NOT NULL,
  `fechaCreacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `correo`, `nombreUsuario`, `contraseña`, `ID_rol`, `Nombres`, `fechaNacimiento`, `Sexo`, `Imagen`, `fechaCreacion`) VALUES
(2, 'EL@gmail.com', 'EL', 'EL', 1, 'EL', '2001-10-24 00:00:00', 'Mujer', '2023-10-27-08-59-12__40e748567fe1c31a8ce5f015662a67f8.jpg', '2023-10-09 14:47:55'),
(11, 'ED@gmail.com', 'ED_', 'ed', 2, 'ED', '2009-01-03 00:00:00', 'Hombre', '2023-10-12-08-11-38__0ddf5e06b259e3ffa07a66debfcee974.jpg', '2023-10-12 00:11:38'),
(12, 'CL@gmail.com', 'CL_', 'cl', 4, 'CL', '2013-09-16 00:00:00', 'Mujer', '2023-10-12-09-31-48__5f6434408b73f26ed9753f510a6049c2.jpg', '2023-10-12 01:31:48'),
(13, 'ed2@gamil.com', 'ed_2', '', 2, 'ed2', '2010-01-13 00:00:00', 'Hombre', '2023-10-13-05-45-56__3a64d721a30e75957019cd0d2bf060de.jpg', '2023-10-12 04:55:51'),
(14, 'RO@gmail.com', 'RO_', 'ro', 3, 'Ro', '2013-08-20 00:00:00', 'Mujer', '2023-10-12-03-36-59__26b8840bf90d9f66ebe9f48c458ff9d1.jpg', '2023-10-12 07:36:59'),
(16, 'ALGO@gmail.com', 'algo_a', 'as', 3, 'ALGO', '2008-02-14 00:00:00', 'Mujer', '2023-10-13-06-17-01__3e0dced1b9024f1bd253b10988cb6659.gif', '2023-10-12 21:58:12'),
(17, 'ALGO_2@gmail.com', 'algo_2', '@aS12345', 4, 'ALGO S', '2005-05-05 00:00:00', 'Hombre', '2023-10-19-07-34-50__aeb4faa0b3c6b4d2c8feaa6577fcf226.jpg', '2023-10-18 23:34:50'),
(18, 'prueba2@gmail.com', 'prueba_2', '@aS12345', 3, 'prueba2', '2015-01-10 00:00:00', 'Mujer', '2023-10-20-02-42-01__555e89e150a9798ab0fa6ca867a32d2d.jpg', '2023-10-19 18:41:10'),
(19, 'prueba3@gmail.com', 'prueba_3', '@aS12345', 3, 'prueba a', '2020-02-19 00:00:00', 'Mujer', '2023-10-21-03-45-59__555e89e150a9798ab0fa6ca867a32d2d.jpg', '2023-10-20 19:45:59');

--
-- Índices para tablas volcadas
--

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
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `rol` (`ID_Rol`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
