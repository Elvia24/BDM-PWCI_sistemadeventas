<?php 




// $email_sesion= $_SESSION['sesion_email'];
$sql_productos = "SELECT
p.ID_producto,
p.nombre_prod AS NombreProducto,
p.descripcion_prod AS DescripcionProducto,
p.precio_prod AS PrecioProducto,
p.status_prod AS EstadoProducto,
p.cantDisp_prod AS CantidadDisponible,
p.calificacion_prod AS CalificacionProducto,
p.fechaCreacion_prod AS FechaCreacionProducto,
p.id_Categoria,
c.nombre_cate AS NombreCategoria,
u.ID_usuario AS IDUsuario,
u.nombreUsuario AS NombreUsuario
FROM producto AS p
LEFT JOIN categoria AS c ON p.id_Categoria = c.ID_categoria
LEFT JOIN usuario AS u ON p.id_Usuario = u.ID_usuario
WHERE u.ID_usuario = $ID_usuario_sesion 
GROUP BY p.ID_producto; ";


$query_productos = $pdo->prepare($sql_productos);
$query_productos->execute();

$productos_tabla = $query_productos->fetchAll(PDO::FETCH_ASSOC);





?>