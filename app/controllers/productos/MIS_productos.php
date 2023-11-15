<?php 




// $email_sesion= $_SESSION['sesion_email'];
$sql_productos = "SELECT 
p.ID_producto , 
p.nombre_prod AS NombreProducto,
p.descripcion_prod AS DescripcionProducto, 
p.precio_prod AS PrecioProducto, 
p.status_prod AS EstadoProducto, 
p.cantDisp_prod AS CantidadDisponible, 
p.calificacion_prod AS CalificacionProducto, 
p.fechaCreacion_prod, 
p.baja_producto, 
p.venta_cotizar, 
p.imagenP_1, 
p.imagenP_2, 
p.imagenP_3, 
p.VideoP,
u.ID_usuario, 
u.nombreUsuario AS NombreUsuario, 
c.ID_categoria, 
c.nombre_cate AS NombreCategoria
FROM producto p
JOIN usuario u ON p.id_Usuario = u.ID_usuario
JOIN categoria c ON p.id_Categoria = c.ID_categoria
WHERE  p.baja_producto=1 AND p.id_Usuario = $ID_usuario_sesion ";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_tabla = $query_productos->fetchAll(PDO::FETCH_ASSOC);





?>