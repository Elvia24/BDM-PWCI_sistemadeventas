CREATE TRIGGER `insert_ventas` AFTER INSERT ON `detalle_carrito`
 FOR EACH ROW BEGIN
    INSERT INTO ventas (Id_producto, fechaCreacion)
    VALUES (NEW.id_producto, NOW());
END
