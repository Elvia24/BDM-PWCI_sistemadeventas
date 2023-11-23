CREATE TRIGGER `actualizarStock` AFTER INSERT ON `detalle_carrito`
 FOR EACH ROW BEGIN
    -- Actualiza el stock en la tabla producto
    UPDATE producto
    SET cantDisp_prod = cantDisp_prod - NEW.cantidad
    WHERE ID_producto = NEW.id_producto;
END
