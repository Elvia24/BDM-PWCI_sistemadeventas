-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 19:58:57
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

--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `calcularEdadUsuario` (`idUsuario` INT) RETURNS INT(11)  BEGIN
    DECLARE edad INT;

    -- Obtener la fecha de nacimiento del usuario
    DECLARE fechaNacimientoUsuario DATE;
    SELECT fechaNacimiento INTO fechaNacimientoUsuario
    FROM usuario
    WHERE ID_usuario = idUsuario;

    -- Calcular la edad usando la fecha actual del sistema
    SET edad = YEAR(CURDATE()) - YEAR(fechaNacimientoUsuario) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(fechaNacimientoUsuario, '%m%d'));

    RETURN COALESCE(edad, 0);
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `calcularPrecioPromedioCategoria` (`idCategoria` INT) RETURNS DECIMAL(10,2)  BEGIN
    DECLARE avgPrice DECIMAL(10,2);

    SELECT AVG(precio_prod) INTO avgPrice
    FROM producto
    WHERE id_Categoria = idCategoria AND status_prod = 1;

    RETURN avgPrice;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `totalDEcarrito` int(11) NOT NULL,
  `TotalProductos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`ID_carrito`, `id_usuario`, `totalDEcarrito`, `TotalProductos`) VALUES
(1, 1, 25, 2),
(2, 1, 2, 109),
(3, 1, 1, 99),
(4, 5, 1, 95);

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
(11, 'Ropa de  Bebe', 'Ropa Para Bebe ', 1, 1),
(12, 'Zapatos Hombre', 'Verano hombre', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `ID_Compra` int(11) NOT NULL,
  `id_carrito` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `Total` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`ID_Compra`, `id_carrito`, `id_usuario`, `Total`, `cantidad`, `fechaCreacion`) VALUES
(1, 1, 1, 92, 0, '2023-11-09'),
(2, 2, 1, 109, 2, '2023-11-11'),
(3, 3, 1, 99, 1, '2023-11-15'),
(4, 4, 5, 95, 1, '2023-11-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizar`
--

CREATE TABLE `cotizar` (
  `ID_Cotizar` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `Mensaje_Cliente` text NOT NULL,
  `Mensaje_Vendedor` text DEFAULT NULL,
  `status_cotizar` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cotizar`
--

INSERT INTO `cotizar` (`ID_Cotizar`, `id_usuario`, `id_producto`, `Mensaje_Cliente`, `Mensaje_Vendedor`, `status_cotizar`) VALUES
(1, 1, 2, ' hola prueba1', 'vendedor', 0),
(2, 3, 2, 'hola prueba otro correo', 'pruebaaaaa', 1),
(3, 1, 2, 'wenas', NULL, 0),
(4, 5, 2, 'prueba por 1', NULL, 1);

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
(1, 1, 1, 1, 25),
(2, 1, 2, 1, 1),
(3, 2, 1, 1, 59),
(4, 2, 5, 1, 50),
(5, 3, 7, 1, 99),
(6, 4, 6, 1, 95);

--
-- Disparadores `detalle_carrito`
--
DELIMITER $$
CREATE TRIGGER `actualizarStock` AFTER INSERT ON `detalle_carrito` FOR EACH ROW BEGIN
    -- Actualiza el stock en la tabla producto
    UPDATE producto
    SET cantDisp_prod = cantDisp_prod - NEW.cantidad
    WHERE ID_producto = NEW.id_producto;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `insert_ventas` AFTER INSERT ON `detalle_carrito` FOR EACH ROW BEGIN
    INSERT INTO ventas (Id_producto, fechaCreacion)
    VALUES (NEW.id_producto, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_lista`
--

CREATE TABLE `detalle_lista` (
  `ID_detalle_lista` int(11) NOT NULL,
  `id_lista` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `status_detalle_lista` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_lista`
--

INSERT INTO `detalle_lista` (`ID_detalle_lista`, `id_lista`, `id_producto`, `status_detalle_lista`) VALUES
(1, 1, 1, 0),
(2, 1, 5, 0),
(4, 1, 2, 0),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 1, 2, 0),
(8, 3, 3, 0),
(9, 3, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `ID_lista` int(11) NOT NULL,
  `nombre_lista` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `status_lista` int(11) NOT NULL DEFAULT 1,
  `Publica_Privada` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`ID_lista`, `nombre_lista`, `descripcion`, `status_lista`, `Publica_Privada`, `id_usuario`) VALUES
(1, '[value-2]', '[value-3]', 0, '[value-5]', 1),
(2, 'zapatos', 'lo que sea', 1, 'Privada', 1),
(3, 'ZAPATOS BONITOS', 'BONITOS', 1, 'Publica', 6);

--
-- Disparadores `lista`
--
DELIMITER $$
CREATE TRIGGER `detalle_lista_status` AFTER UPDATE ON `lista` FOR EACH ROW BEGIN
    IF NEW.status_lista = 0 THEN
        UPDATE detalle_lista
        SET status_detalle_lista = 0
        WHERE id_lista = NEW.ID_lista;
    END IF;
END
$$
DELIMITER ;

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
(1, 'blusa mujer', 'bonita', 59, 1, 45, 0, '2023-11-03', 8, 1, 1, 1, 'a91a5499fff4a13a7358223823d2b670.jpg', 'a661e95ded195f2a79a4191f141dc39b.jpg', 'a7c5b1b616310f70ecbbd1ae5202b78b.jpg', 'sistema solar.mp4'),
(2, 'camiseta hombre', 'hombre', 0, 1, 35, 0, '2023-11-03', 9, 1, 1, 0, '5a2f16cdecb42cda18f8d649b2c15a16.jpg', '5cbfd112b8b0c5a4156ec8c0d881e2b6.jpg', '5cbfd112b8b0c5a4156ec8c0d881e2b6.jpg', '9d0e380720b58cac0efa752e5b444020.jpg'),
(3, 'ZAPATOS', 'ZAPATOS', 0, 1, 150, 0, '2023-11-04', 2, 1, 1, 0, '2023-11-05-06-44-38__1d6652573d8fe16d20b3f2e63ded20d1.jpg', '2023-11-05-06-44-38__7203f9966a7d9967144f0cfce9341841.jpg', '2023-11-05-06-44-38__322908e348d4d1a3378ff42b0a7ff5f8.jpg', '2023-11-05-06-44-38__2023-10-20 01-47-55.mp4'),
(4, 'prueba1', 'prueba1', 0, 0, 25, 0, '2023-11-04', 1, 1, 0, 0, '2023-11-04-08-14-45__26b8840bf90d9f66ebe9f48c458ff9d1.jpg', '2023-11-04-08-14-45__04b59c0ae1814fbb487ecb37ec997c1b.jpg', '2023-11-04-08-14-45__8c90ac726cc78efdb7e1f0ec881532bb.jpg', '2023-11-04-08-14-45__2023-10-20 01-47-55.mp4'),
(5, 'FALDA', 'NEGRA', 50, 1, 100, 0, '2023-11-05', 8, 3, 1, 1, '2023-11-05-07-47-32__22bbc338d05a1fa2a2fa1d8bdaf3f6b4.jpg', '2023-11-05-07-47-32__d8ebad75187f84c62bd1fc819b82c579.jpg', '2023-11-05-07-47-32__e3ba8d6eedc4f2fed0ee7b44ff69e993.jpg', '2023-11-05-07-47-32__2023-09-27 01-08-25.mp4'),
(6, 'overol', 'BONITO DE COLOR', 95, 1, 149, 0, '2023-11-05', 8, 3, 1, 1, '2023-11-06-04-15-42__3cdb245aa053ca9ae19824674801f9d8.jpg', '2023-11-06-04-15-42__4eecb6fef2d21964ba6e25323ae943a0.jpg', '2023-11-06-04-15-42__4190c344cdbcd09e05ea2c2fc4643049.jpg', '2023-11-06-04-15-42__sistema solar.mp4'),
(7, 'TACONES', 'NEGROS ', 99, 1, 150, 0, '2023-11-15', 2, 1, 1, 1, '2023-11-15-08-55-01__157378432b22c68ea3b72da14beb0ee2.jpg', '2023-11-15-08-55-01__da94d2006300d9b1e9846f69e1fd919b.jpg', '2023-11-15-08-55-01__e1fbd5c5ddde6093fbfef94105b44dfa.jpg', '2023-11-15-08-55-01__2023-11-15 00-11-55.mp4');

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
(4, 'prueba@gmail.com', 'prueba_', '123', 2, 'PRUEBA', '2014-10-08', 'Mujer', '', '2023-10-29 16:22:39', 0),
(5, 'ED@gmail.com', 'ED_', 'E@ssw0ED', 3, 'ED', '2009-01-03', 'Hombre', '2023-11-15-11-13-43__3905de828ab0bd3b4ffe52ad880cdcba.jpg', '2023-11-15 04:13:43', 1),
(6, 'CL@gmail.com', 'CL_', 'C@ssw0CL', 4, 'CL', '2016-08-16', 'Mujer', '2023-11-15-11-20-28__89c1037ac7cadef0fc4bf2989ca64383.jpg', '2023-11-15 04:20:28', 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `ID_venta` int(11) NOT NULL,
  `Id_producto` int(11) NOT NULL,
  `fechaCreacion` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`ID_venta`, `Id_producto`, `fechaCreacion`) VALUES
(1, 7, '2023-11-15'),
(2, 1, '2023-11-09'),
(3, 2, '2023-11-09'),
(4, 1, '2023-11-11'),
(5, 5, '2023-11-11'),
(6, 6, '2023-11-15');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_categorias`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_categorias` (
`ID_categoria` int(11)
,`nombre_cate` varchar(200)
,`descripcion_cate` varchar(200)
,`id_usuario` int(11)
,`nombreUsuario` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_listaautorizados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_listaautorizados` (
`ID_producto` int(11)
,`NombreProducto` varchar(200)
,`DescripcionProducto` varchar(200)
,`PrecioProducto` float
,`EstadoProducto` int(11)
,`CantidadDisponible` int(11)
,`CalificacionProducto` float
,`fechaCreacion_prod` date
,`baja_producto` int(11)
,`venta_cotizar` int(11)
,`imagenP_1` text
,`imagenP_2` text
,`imagenP_3` text
,`VideoP` text
,`ID_usuario` int(11)
,`NombreUsuario` varchar(200)
,`ID_categoria` int(11)
,`NombreCategoria` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_mas_vendido`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_mas_vendido` (
`ID_producto` int(11)
,`NombreProducto` varchar(200)
,`DescripcionProducto` varchar(200)
,`PrecioProducto` float
,`EstadoProducto` int(11)
,`CantidadDisponible` int(11)
,`CalificacionProducto` float
,`fechaCreacion_prod` date
,`baja_producto` int(11)
,`venta_cotizar` int(11)
,`imagenP_1` text
,`imagenP_2` text
,`imagenP_3` text
,`VideoP` text
,`ID_usuario` int(11)
,`NombreUsuario` varchar(200)
,`ID_categoria` int(11)
,`NombreCategoria` varchar(200)
,`VentasRealizadas` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_mayorprecio`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_mayorprecio` (
`ID_producto` int(11)
,`NombreProducto` varchar(200)
,`DescripcionProducto` varchar(200)
,`PrecioProducto` float
,`EstadoProducto` int(11)
,`CantidadDisponible` int(11)
,`CalificacionProducto` float
,`fechaCreacion_prod` date
,`baja_producto` int(11)
,`venta_cotizar` int(11)
,`imagenP_1` text
,`imagenP_2` text
,`imagenP_3` text
,`VideoP` text
,`ID_usuario` int(11)
,`NombreUsuario` varchar(200)
,`ID_categoria` int(11)
,`NombreCategoria` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_menorprecio`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_menorprecio` (
`ID_producto` int(11)
,`NombreProducto` varchar(200)
,`DescripcionProducto` varchar(200)
,`PrecioProducto` float
,`EstadoProducto` int(11)
,`CantidadDisponible` int(11)
,`CalificacionProducto` float
,`fechaCreacion_prod` date
,`baja_producto` int(11)
,`venta_cotizar` int(11)
,`imagenP_1` text
,`imagenP_2` text
,`imagenP_3` text
,`VideoP` text
,`ID_usuario` int(11)
,`NombreUsuario` varchar(200)
,`ID_categoria` int(11)
,`NombreCategoria` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_menos_vendidos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_menos_vendidos` (
`ID_producto` int(11)
,`NombreProducto` varchar(200)
,`DescripcionProducto` varchar(200)
,`PrecioProducto` float
,`EstadoProducto` int(11)
,`CantidadDisponible` int(11)
,`CalificacionProducto` float
,`fechaCreacion_prod` date
,`baja_producto` int(11)
,`venta_cotizar` int(11)
,`imagenP_1` text
,`imagenP_2` text
,`imagenP_3` text
,`VideoP` text
,`ID_usuario` int(11)
,`NombreUsuario` varchar(200)
,`ID_categoria` int(11)
,`NombreCategoria` varchar(200)
,`VentasRealizadas` bigint(21)
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_para_cotizar`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_para_cotizar` (
`ID_producto` int(11)
,`NombreProducto` varchar(200)
,`DescripcionProducto` varchar(200)
,`PrecioProducto` float
,`EstadoProducto` int(11)
,`CantidadDisponible` int(11)
,`CalificacionProducto` float
,`fechaCreacion_prod` date
,`id_Categoria` int(11)
,`id_Usuario` int(11)
,`baja_producto` int(11)
,`venta_cotizar` int(11)
,`imagenP_1` text
,`imagenP_2` text
,`imagenP_3` text
,`VideoP` text
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_productos_no_autorizados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vista_productos_no_autorizados` (
`ID_producto` int(11)
,`NombreProducto` varchar(200)
,`DescripcionProducto` varchar(200)
,`PrecioProducto` float
,`EstadoProducto` int(11)
,`CantidadDisponible` int(11)
,`CalificacionProducto` float
,`fechaCreacion_prod` date
,`baja_producto` int(11)
,`venta_cotizar` int(11)
,`imagenP_1` text
,`imagenP_2` text
,`imagenP_3` text
,`VideoP` text
,`ID_usuario` int(11)
,`NombreUsuario` varchar(200)
,`ID_categoria` int(11)
,`NombreCategoria` varchar(200)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_categorias`
--
DROP TABLE IF EXISTS `vista_categorias`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_categorias`  AS SELECT `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `nombre_cate`, `c`.`descripcion_cate` AS `descripcion_cate`, `c`.`id_usuario` AS `id_usuario`, `u`.`nombreUsuario` AS `nombreUsuario` FROM (`categoria` `c` join `usuario` `u` on(`c`.`id_usuario` = `u`.`ID_usuario`)) WHERE `c`.`status_categoria` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_listaautorizados`
--
DROP TABLE IF EXISTS `vista_listaautorizados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_listaautorizados`  AS SELECT `p`.`ID_producto` AS `ID_producto`, `p`.`nombre_prod` AS `NombreProducto`, `p`.`descripcion_prod` AS `DescripcionProducto`, `p`.`precio_prod` AS `PrecioProducto`, `p`.`status_prod` AS `EstadoProducto`, `p`.`cantDisp_prod` AS `CantidadDisponible`, `p`.`calificacion_prod` AS `CalificacionProducto`, `p`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `p`.`baja_producto` AS `baja_producto`, `p`.`venta_cotizar` AS `venta_cotizar`, `p`.`imagenP_1` AS `imagenP_1`, `p`.`imagenP_2` AS `imagenP_2`, `p`.`imagenP_3` AS `imagenP_3`, `p`.`VideoP` AS `VideoP`, `u`.`ID_usuario` AS `ID_usuario`, `u`.`nombreUsuario` AS `NombreUsuario`, `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `NombreCategoria` FROM ((`producto` `p` join `usuario` `u` on(`p`.`id_Usuario` = `u`.`ID_usuario`)) join `categoria` `c` on(`p`.`id_Categoria` = `c`.`ID_categoria`)) WHERE `p`.`baja_producto` = 1 AND `p`.`status_prod` = 1 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_mas_vendido`
--
DROP TABLE IF EXISTS `vista_mas_vendido`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_mas_vendido`  AS SELECT `p`.`ID_producto` AS `ID_producto`, `p`.`nombre_prod` AS `NombreProducto`, `p`.`descripcion_prod` AS `DescripcionProducto`, `p`.`precio_prod` AS `PrecioProducto`, `p`.`status_prod` AS `EstadoProducto`, `p`.`cantDisp_prod` AS `CantidadDisponible`, `p`.`calificacion_prod` AS `CalificacionProducto`, `p`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `p`.`baja_producto` AS `baja_producto`, `p`.`venta_cotizar` AS `venta_cotizar`, `p`.`imagenP_1` AS `imagenP_1`, `p`.`imagenP_2` AS `imagenP_2`, `p`.`imagenP_3` AS `imagenP_3`, `p`.`VideoP` AS `VideoP`, `u`.`ID_usuario` AS `ID_usuario`, `u`.`nombreUsuario` AS `NombreUsuario`, `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `NombreCategoria`, count(`v`.`ID_venta`) AS `VentasRealizadas` FROM (((`producto` `p` join `usuario` `u` on(`p`.`id_Usuario` = `u`.`ID_usuario`)) join `categoria` `c` on(`p`.`id_Categoria` = `c`.`ID_categoria`)) left join `ventas` `v` on(`p`.`ID_producto` = `v`.`Id_producto`)) WHERE `p`.`baja_producto` = 1 AND `p`.`status_prod` = 1 AND `p`.`venta_cotizar` = 1 GROUP BY `p`.`ID_producto` ORDER BY count(`v`.`ID_venta`) DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_mayorprecio`
--
DROP TABLE IF EXISTS `vista_mayorprecio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_mayorprecio`  AS SELECT `p`.`ID_producto` AS `ID_producto`, `p`.`nombre_prod` AS `NombreProducto`, `p`.`descripcion_prod` AS `DescripcionProducto`, `p`.`precio_prod` AS `PrecioProducto`, `p`.`status_prod` AS `EstadoProducto`, `p`.`cantDisp_prod` AS `CantidadDisponible`, `p`.`calificacion_prod` AS `CalificacionProducto`, `p`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `p`.`baja_producto` AS `baja_producto`, `p`.`venta_cotizar` AS `venta_cotizar`, `p`.`imagenP_1` AS `imagenP_1`, `p`.`imagenP_2` AS `imagenP_2`, `p`.`imagenP_3` AS `imagenP_3`, `p`.`VideoP` AS `VideoP`, `u`.`ID_usuario` AS `ID_usuario`, `u`.`nombreUsuario` AS `NombreUsuario`, `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `NombreCategoria` FROM ((`producto` `p` join `usuario` `u` on(`p`.`id_Usuario` = `u`.`ID_usuario`)) join `categoria` `c` on(`p`.`id_Categoria` = `c`.`ID_categoria`)) WHERE `p`.`baja_producto` = 1 AND `p`.`status_prod` = 1 AND `p`.`venta_cotizar` = 1 ORDER BY `p`.`precio_prod` DESC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_menorprecio`
--
DROP TABLE IF EXISTS `vista_menorprecio`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_menorprecio`  AS SELECT `p`.`ID_producto` AS `ID_producto`, `p`.`nombre_prod` AS `NombreProducto`, `p`.`descripcion_prod` AS `DescripcionProducto`, `p`.`precio_prod` AS `PrecioProducto`, `p`.`status_prod` AS `EstadoProducto`, `p`.`cantDisp_prod` AS `CantidadDisponible`, `p`.`calificacion_prod` AS `CalificacionProducto`, `p`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `p`.`baja_producto` AS `baja_producto`, `p`.`venta_cotizar` AS `venta_cotizar`, `p`.`imagenP_1` AS `imagenP_1`, `p`.`imagenP_2` AS `imagenP_2`, `p`.`imagenP_3` AS `imagenP_3`, `p`.`VideoP` AS `VideoP`, `u`.`ID_usuario` AS `ID_usuario`, `u`.`nombreUsuario` AS `NombreUsuario`, `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `NombreCategoria` FROM ((`producto` `p` join `usuario` `u` on(`p`.`id_Usuario` = `u`.`ID_usuario`)) join `categoria` `c` on(`p`.`id_Categoria` = `c`.`ID_categoria`)) WHERE `p`.`baja_producto` = 1 AND `p`.`status_prod` = 1 AND `p`.`venta_cotizar` = 1 ORDER BY `p`.`precio_prod` ASC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_menos_vendidos`
--
DROP TABLE IF EXISTS `vista_menos_vendidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_menos_vendidos`  AS SELECT `p`.`ID_producto` AS `ID_producto`, `p`.`nombre_prod` AS `NombreProducto`, `p`.`descripcion_prod` AS `DescripcionProducto`, `p`.`precio_prod` AS `PrecioProducto`, `p`.`status_prod` AS `EstadoProducto`, `p`.`cantDisp_prod` AS `CantidadDisponible`, `p`.`calificacion_prod` AS `CalificacionProducto`, `p`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `p`.`baja_producto` AS `baja_producto`, `p`.`venta_cotizar` AS `venta_cotizar`, `p`.`imagenP_1` AS `imagenP_1`, `p`.`imagenP_2` AS `imagenP_2`, `p`.`imagenP_3` AS `imagenP_3`, `p`.`VideoP` AS `VideoP`, `u`.`ID_usuario` AS `ID_usuario`, `u`.`nombreUsuario` AS `NombreUsuario`, `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `NombreCategoria`, count(`v`.`ID_venta`) AS `VentasRealizadas` FROM (((`producto` `p` join `usuario` `u` on(`p`.`id_Usuario` = `u`.`ID_usuario`)) join `categoria` `c` on(`p`.`id_Categoria` = `c`.`ID_categoria`)) left join `ventas` `v` on(`p`.`ID_producto` = `v`.`Id_producto`)) WHERE `p`.`baja_producto` = 1 AND `p`.`status_prod` = 1 AND `p`.`venta_cotizar` = 1 GROUP BY `p`.`ID_producto` ORDER BY count(`v`.`ID_venta`) ASC ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_para_cotizar`
--
DROP TABLE IF EXISTS `vista_para_cotizar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_para_cotizar`  AS SELECT `producto`.`ID_producto` AS `ID_producto`, `producto`.`nombre_prod` AS `NombreProducto`, `producto`.`descripcion_prod` AS `DescripcionProducto`, `producto`.`precio_prod` AS `PrecioProducto`, `producto`.`status_prod` AS `EstadoProducto`, `producto`.`cantDisp_prod` AS `CantidadDisponible`, `producto`.`calificacion_prod` AS `CalificacionProducto`, `producto`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `producto`.`id_Categoria` AS `id_Categoria`, `producto`.`id_Usuario` AS `id_Usuario`, `producto`.`baja_producto` AS `baja_producto`, `producto`.`venta_cotizar` AS `venta_cotizar`, `producto`.`imagenP_1` AS `imagenP_1`, `producto`.`imagenP_2` AS `imagenP_2`, `producto`.`imagenP_3` AS `imagenP_3`, `producto`.`VideoP` AS `VideoP` FROM `producto` WHERE `producto`.`baja_producto` = 1 AND `producto`.`status_prod` = 1 AND `producto`.`venta_cotizar` = 0 ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_productos_no_autorizados`
--
DROP TABLE IF EXISTS `vista_productos_no_autorizados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_productos_no_autorizados`  AS SELECT `p`.`ID_producto` AS `ID_producto`, `p`.`nombre_prod` AS `NombreProducto`, `p`.`descripcion_prod` AS `DescripcionProducto`, `p`.`precio_prod` AS `PrecioProducto`, `p`.`status_prod` AS `EstadoProducto`, `p`.`cantDisp_prod` AS `CantidadDisponible`, `p`.`calificacion_prod` AS `CalificacionProducto`, `p`.`fechaCreacion_prod` AS `fechaCreacion_prod`, `p`.`baja_producto` AS `baja_producto`, `p`.`venta_cotizar` AS `venta_cotizar`, `p`.`imagenP_1` AS `imagenP_1`, `p`.`imagenP_2` AS `imagenP_2`, `p`.`imagenP_3` AS `imagenP_3`, `p`.`VideoP` AS `VideoP`, `u`.`ID_usuario` AS `ID_usuario`, `u`.`nombreUsuario` AS `NombreUsuario`, `c`.`ID_categoria` AS `ID_categoria`, `c`.`nombre_cate` AS `NombreCategoria` FROM ((`producto` `p` join `usuario` `u` on(`p`.`id_Usuario` = `u`.`ID_usuario`)) join `categoria` `c` on(`p`.`id_Categoria` = `c`.`ID_categoria`)) WHERE `p`.`baja_producto` = 1 AND `p`.`status_prod` = 0 ;

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
-- Indices de la tabla `detalle_lista`
--
ALTER TABLE `detalle_lista`
  ADD PRIMARY KEY (`ID_detalle_lista`),
  ADD KEY `ID_detalle_lista` (`ID_detalle_lista`,`id_lista`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_lista` (`id_lista`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`ID_lista`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`ID_venta`),
  ADD KEY `Id_producto` (`Id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `ID_Compra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cotizar`
--
ALTER TABLE `cotizar`
  MODIFY `ID_Cotizar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_carrito`
--
ALTER TABLE `detalle_carrito`
  MODIFY `ID_detalle_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_lista`
--
ALTER TABLE `detalle_lista`
  MODIFY `ID_detalle_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `ID_lista` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `ID_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `ID_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `ID_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
-- Filtros para la tabla `detalle_lista`
--
ALTER TABLE `detalle_lista`
  ADD CONSTRAINT `detalle_lista_ibfk_1` FOREIGN KEY (`id_lista`) REFERENCES `lista` (`ID_lista`) ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_lista_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`ID_producto`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `lista_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`ID_usuario`) ON UPDATE CASCADE;

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

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`Id_producto`) REFERENCES `producto` (`ID_producto`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
