SELECT ID_producto, nombre_prod, descripcion_prod, precio_prod, status_prod, cantDisp_prod, calificacion_prod, fechaCreacion_prod, id_Categoria, id_Usuario, baja_producto FROM producto WHERE 1;

SELECT producto.ID_producto,producto.nombre_prod,
producto.descripcion_prod, 
producto.precio, 
producto.Nombres, 
producto.fechaNacimiento, 
producto.Sexo, 
producto.Imagen, 
producto.fechaCreacion,
rol.nombre AS RolNombre
       FROM usuario 
       INNER JOIN rol ON usuario.ID_Rol = rol.ID_Rol
       WHERE  usuario.ID_usuario <> $ID_usuario_sesion AND status_usuario=1;