DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `calcularPrecioPromedioCategoria`(`idCategoria` INT) RETURNS decimal(10,2)
BEGIN
    DECLARE avgPrice DECIMAL(10,2);

    SELECT AVG(precio_prod) INTO avgPrice
    FROM producto
    WHERE id_Categoria = idCategoria AND status_prod = 1;

    RETURN avgPrice;
END$$
DELIMITER ;
