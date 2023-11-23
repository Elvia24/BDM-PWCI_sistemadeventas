DELIMITER $$
CREATE DEFINER=`root`@`localhost` FUNCTION `calcularEdadUsuario`(`idUsuario` INT) RETURNS int(11)
BEGIN
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
DELIMITER ;
