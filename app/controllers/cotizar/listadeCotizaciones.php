<?php 

// $email_sesion= $_SESSION['sesion_email'];
$sql_pedidos = "SELECT c.ID_Cotizar, 
c.id_usuario AS id_CLIENTE, 
c.id_producto, 
c.Mensaje_Cliente, 
c.Mensaje_Vendedor, 
c.status_cotizar, 
p.ID_producto , 
p.nombre_prod, 
p.descripcion_prod, 
p.precio_prod, 
p.status_prod, 
p.cantDisp_prod, p.calificacion_prod, p.fechaCreacion_prod, p.id_Categoria, p.id_Usuario, p.baja_producto, p.venta_cotizar, p.imagenP_1, p.imagenP_2, p.imagenP_3, p.VideoP,
u.ID_usuario ,
u.correo ,
u.nombreUsuario
FROM cotizar c
INNER JOIN producto p ON c.id_producto = p.ID_producto
INNER JOIN usuario u ON c.id_usuario = u.ID_usuario
WHERE p.id_Usuario =$ID_usuario_sesion AND c.status_cotizar=1;";



$query_pedidos = $pdo->prepare($sql_pedidos);
$query_pedidos->execute();

$pedidos_tabla = $query_pedidos->fetchAll(PDO::FETCH_ASSOC);
?>